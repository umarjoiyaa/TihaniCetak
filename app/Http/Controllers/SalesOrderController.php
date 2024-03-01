<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\SaleOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesOrderController extends Controller
{
    public function index(){
        if (
            Auth::user()->hasPermissionTo('SaleOrder List') ||
            Auth::user()->hasPermissionTo('SaleOrder View') ||
            Auth::user()->hasPermissionTo('SaleOrder Upload') ||
            Auth::user()->hasPermissionTo('SaleOrder Approve') ||
            Auth::user()->hasPermissionTo('SaleOrder Publish')
        ) {
            Helper::logSystemActivity('SaleOrder', 'SaleOrder List');
            return view('Mes.SaleOrder.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function Data(Request $request)
    {
        if ($request->ajax() && $request->input('columnsData') != null) {
            $columnsData = $request->input('columnsData');
            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = SaleOrder::select('id', 'order_no', 'customer', 'po_no', 'date', 'status', 'order_status', 'delivery_qty', 'remaining_qty');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('order_no', 'like', '%' . $searchLower . '%')
                        ->orWhere('customer', 'like', '%' . $searchLower . '%')
                        ->orWhere('po_no', 'like', '%' . $searchLower . '%')
                        ->orWhere('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%')
                        ->orWhere('order_status', 'like', '%' . $searchLower . '%')
                        ->orWhere('delivery_qty', 'like', '%' . $searchLower . '%')
                        ->orWhere('remaining_qty', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'order_no',
                    2 => 'customer',
                    3 => 'po_no',
                    4 => 'date',
                    5 => 'status',
                    6 => 'order_status',
                    7 => 'delivery_qty',
                    8 => 'remaining_qty',
                    // Add more columns as needed
                ];
                if($orderByColumnIndex != null){
                    if($orderByColumnIndex == "0"){
                        $orderByColumn = 'created_at';
                        $orderByDirection = 'ASC';
                    }else{
                        $orderByColumn = $sortableColumns[$orderByColumnIndex];
                    }
                }else{
                    $orderByColumn = 'created_at';
                }
                if($orderByDirection == null){
                    $orderByDirection = 'ASC';
                }
                $results = $query->where(function ($q) use ($columnsData) {
                    foreach ($columnsData as $column) {
                        $searchLower = strtolower($column['value']);

                        switch ($column['index']) {
                            case 1:
                                $q->where('order_no', 'like', '%' . $searchLower . '%');
                                break;
                            case 2:
                                $q->where('customer', 'like', '%' . $searchLower . '%');
                                break;
                            case 3:
                                $q->where('po_no', 'like', '%' . $searchLower . '%');
                                break;
                            case 4:
                                $q->where('date', 'like', '%' . $searchLower . '%');
                                break;
                            case 5:
                                $q->where('status', 'like', '%' . $searchLower . '%');
                                break;
                            case 6:
                                $q->where('order_status', 'like', '%' . $searchLower . '%');
                                break;
                            case 7:
                                $q->where('delivery_qty', 'like', '%' . $searchLower . '%');
                                break;
                            case 8:
                                $q->where('remaining_qty', 'like', '%' . $searchLower . '%');
                                break;
                            default:
                                break;
                        }
                    }
                })->orderBy($orderByColumn, $orderByDirection)->get();
            }

            // Process and format the results for DataTables
            $recordsTotal = $results ? $results->count() : 0;

            // Check if there are results before applying skip and take
            if ($results->isNotEmpty()) {
                $sale = $results->skip($start)->take($length)->all();
            } else {
                $sale = [];
            }

            $index = 0;
            foreach ($sale as $row) {
                $row->sr_no = $start + $index + 1;
                if ($row->order_status == 'pending') {
                    $row->order_status = '<span class="badge badge-warning">Pending</span>';
                    $actions = '<a class="dropdown-item" href="' . route('sale_order.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('sale_order.upload', $row->id) . '">Upload</a>
                    <a class="dropdown-item" href="' . route('sale_order.approve', $row->id) . '">Approve</a>';
                } else if ($row->order_status == 'approved') {
                    $row->order_status = '<span class="badge badge-success">Approved</span>';
                    $actions = '<a class="dropdown-item" href="' . route('sale_order.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('sale_order.publish', $row->id) . '">Publish</a>';
                } else if ($row->order_status == 'declined') {
                    $row->order_status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('sale_order.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('sale_order.upload', $row->id) . '">Upload</a>
                    <a class="dropdown-item" href="' . route('sale_order.approve', $row->id) . '">Approve</a>';
                } else if ($row->order_status == 'published') {
                    $row->order_status = '<span class="badge badge-success">Published</span>';
                    $actions = '<a class="dropdown-item" href="' . route('sale_order.view', $row->id) . '">View</a>';
                }

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                    ' . $actions . '
                                </div>
                            </div>';
                $index++;
            }

            // // Continue with your response
            $salesWithoutAction = array_map(function ($row) {
                return $row;
            }, $sale);

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => array_values($salesWithoutAction),
            ]);
        } elseif ($request->ajax()) {

            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = SaleOrder::select('id', 'order_no', 'customer', 'po_no', 'date', 'status', 'order_status', 'delivery_qty', 'remaining_qty');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('order_no', 'like', '%' . $searchLower . '%')
                        ->orWhere('customer', 'like', '%' . $searchLower . '%')
                        ->orWhere('po_no', 'like', '%' . $searchLower . '%')
                        ->orWhere('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%')
                        ->orWhere('order_status', 'like', '%' . $searchLower . '%')
                        ->orWhere('delivery_qty', 'like', '%' . $searchLower . '%')
                        ->orWhere('remaining_qty', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'order_no',
                2 => 'customer',
                3 => 'po_no',
                4 => 'date',
                5 => 'status',
                6 => 'order_status',
                7 => 'delivery_qty',
                8 => 'remaining_qty',
                // Add more columns as needed
            ];
            if($orderByColumnIndex != null){
                if($orderByColumnIndex != "0"){
                    $orderByColumn = $sortableColumns[$orderByColumnIndex];
                    $query->orderBy($orderByColumn, $orderByDirection);
                }else{
                    $query->latest('created_at');
                }
            }else{
                $query->latest('created_at');
            }
            $recordsTotal = $query->count();

            $sale = $query
                ->skip($start)
                ->take($length)
                ->get();

            $sale->each(function ($row, $index)  use (&$start) {
                $row->sr_no = $start + $index + 1;
                if ($row->order_status == 'pending') {
                    $row->order_status = '<span class="badge badge-warning">Pending</span>';
                    $actions = '<a class="dropdown-item" href="' . route('sale_order.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('sale_order.upload', $row->id) . '">Upload</a>
                    <a class="dropdown-item" href="' . route('sale_order.approve', $row->id) . '">Approve</a>';
                } else if ($row->order_status == 'approved') {
                    $row->order_status = '<span class="badge badge-success">Approved</span>';
                    $actions = '<a class="dropdown-item" href="' . route('sale_order.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('sale_order.publish', $row->id) . '">Publish</a>';
                } else if ($row->order_status == 'declined') {
                    $row->order_status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('sale_order.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('sale_order.upload', $row->id) . '">Upload</a>
                    <a class="dropdown-item" href="' . route('sale_order.approve', $row->id) . '">Approve</a>';
                } else if ($row->order_status == 'published') {
                    $row->order_status = '<span class="badge badge-success">Published</span>';
                    $actions = '<a class="dropdown-item" href="' . route('sale_order.view', $row->id) . '">View</a>';
                }

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                    ' . $actions . '
                                </div>
                            </div>';
            });

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => $sale,
            ]);
        }
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('SaleOrder View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $sale_order = SaleOrder::find($id);
        Helper::logSystemActivity('SaleOrder', 'SaleOrder View');
        return view('Mes.SaleOrder.view', compact('sale_order'));
    }
    public function upload($id){
        if (!Auth::user()->hasPermissionTo('SaleOrder Upload')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $sale_order = SaleOrder::find($id);
        Helper::logSystemActivity('SaleOrder', 'SaleOrder Upload View');
        return view('Mes.SaleOrder.upload', compact('sale_order'));
    }

    public function upload_submit(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('SaleOrder Upload')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'soft_copy' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $sale_order = SaleOrder::find($id);
        if($request->file('soft_copy')){
            $file= $request->file('soft_copy');
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move('soft_copy', $filename);
            $sale_order->soft_copy =  $filename;
        }
        $sale_order->save();
        Helper::logSystemActivity('SaleOrder', 'SaleOrder Upload Submit');
        return redirect()->route('sale_order')->with('custom_success', 'SaleOrder has been Successfully Upload SoftCopy!');
    }
    public function approve($id){
        if (!Auth::user()->hasPermissionTo('SaleOrder Approve')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $sale_order = SaleOrder::find($id);
        Helper::logSystemActivity('SaleOrder', 'SaleOrder Approve View');
        return view('Mes.SaleOrder.approve', compact('sale_order'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('SaleOrder Approve')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $sale_order = SaleOrder::find($id);
        $sale_order->order_status = 'approved';
        $sale_order->approved_by_date = Carbon::now()->format('Y-m-d H:i:s');
        $sale_order->approved_by_user = Auth::user()->user_name;
        $sale_order->approved_by_designation = (Auth::user()->designations != null) ? Auth::user()->designations->name : 'not assign';
        $sale_order->approved_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $sale_order->save();
        Helper::logSystemActivity('SaleOrder', 'SaleOrder Approved');
        return redirect()->route('sale_order')->with('custom_success', 'SaleOrder has been Successfully Approved!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('SaleOrder Approve')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $sale_order = SaleOrder::find($id);
        $sale_order->order_status = 'declined';
        $sale_order->save();
        Helper::logSystemActivity('SaleOrder', 'SaleOrder Declined');
        return redirect()->route('sale_order')->with('custom_success', 'SaleOrder has been Successfully Declined!');
    }
    public function publish($id){
        if (!Auth::user()->hasPermissionTo('SaleOrder Publish')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $sale_order = SaleOrder::find($id);
        Helper::logSystemActivity('SaleOrder', 'SaleOrder Publish View');
        return view('Mes.SaleOrder.publish', compact('sale_order'));
    }

    public function publish_submit(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('SaleOrder Publish')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $sale_order = SaleOrder::find($id);
        $sale_order->order_status = 'published';
        $sale_order->published_by_date = Carbon::now()->format('Y-m-d H:i:s');
        $sale_order->published_by_user = Auth::user()->user_name;
        $sale_order->published_by_designation = (Auth::user()->designations != null) ? Auth::user()->designations->name : 'not assign';
        $sale_order->published_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $sale_order->save();
        Helper::logSystemActivity('SaleOrder', 'SaleOrder Published');
        return redirect()->route('sale_order')->with('custom_success', 'SaleOrder has been Successfully Published!');
    }
}
