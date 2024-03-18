<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\AreaLocation;
use App\Models\Location;
use App\Models\ManageTransfer;
use App\Models\MaterialRequest;
use App\Models\MaterialRequestB;
use App\Models\MaterialRequestC;
use App\Models\MaterialRequestD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageTransferController extends Controller
{
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

            $query = ManageTransfer::select('id', 'request_id', 'date', 'status', 'created_by')->with('material_request.sale_order', 'material_request.user', 'user');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->whereHas('material_request', function ($query) use ($searchLower) {
                            $query->where('ref_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('date', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('material_request.sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('material_request', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('material_request.user', function ($query) use ($searchLower) {
                            $query->where('full_name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('user', function ($query) use ($searchLower) {
                            $query->where('full_name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'request_id',
                    2 => 'date',
                    3 => 'request_id',
                    4 => 'request_id',
                    5 => 'request_id',
                    6 => 'created_by',
                    7 => 'status',
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
                                $q->whereHas('material_request', function ($query) use ($searchLower) {
                                    $query->where('ref_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 2:
                                $q->where('date', 'like', '%' . $searchLower . '%');
                                break;
                            case 3:
                                $q->whereHas('material_request.sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 4:
                                $q->whereHas('material_request', function ($query) use ($searchLower) {
                                    $query->where('description', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 5:
                                $q->whereHas('material_request.user', function ($query) use ($searchLower) {
                                    $query->where('full_name', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 6:
                                $q->whereHas('material_request.user', function ($query) use ($searchLower) {
                                    $query->where('full_name', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 7:
                                $q->where('status', 'like', '%' . $searchLower . '%');
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
                $uom = $results->skip($start)->take($length)->all();
            } else {
                $uom = [];
            }

            $index = 0;
            foreach ($uom as $row) {
                $row->sr_no = $start + $index + 1;
                $row->status = ($row->status == 'Request') ? '<span class="badge badge-warning">Request</span>' : '<span class="badge badge-success">Completed</span>';
                $Link = ($row->status != 'Completed') ? '<a class="dropdown-item" href="' . route('manage_transfer.edit', $row->id) . '">Edit</a><a class="dropdown-item" href="' . route('manage_transfer.view', $row->id) . '">View</a><a class="dropdown-item" href="' . route('manage_transfer.receive', $row->id) . '">Receive</a><a class="dropdown-item" id="swal-warning" data-delete="' . route('manage_transfer.delete', $row->id) . '">Delete</a>' : '<a class="dropdown-item" href="' . route('manage_transfer.view', $row->id) . '">View</a>';

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div class="dropdown-menu tx-13">
                                ' . $Link . '
                                </div>
                            </div>';

                $index++;
            }

            // // Continue with your response
            $uomsWithoutAction = array_map(function ($row) {
                return $row;
            }, $uom);

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => array_values($uomsWithoutAction),
            ]);
        } elseif ($request->ajax()) {

            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = ManageTransfer::select('id', 'request_id', 'date', 'status', 'created_by')->with('material_request.sale_order', 'material_request.user', 'user');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->whereHas('material_request', function ($query) use ($searchLower) {
                            $query->where('ref_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('date', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('material_request.sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('material_request', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('material_request.user', function ($query) use ($searchLower) {
                            $query->where('full_name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('user', function ($query) use ($searchLower) {
                            $query->where('full_name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'request_id',
                2 => 'date',
                3 => 'request_id',
                4 => 'request_id',
                5 => 'request_id',
                6 => 'created_by',
                7 => 'status',
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

            $uom = $query
                ->skip($start)
                ->take($length)
                ->get();

            $uom->each(function ($row, $index)  use (&$start) {
                $row->sr_no = $start + $index + 1;
                $row->status = ($row->status == 'Request') ? '<span class="badge badge-warning">Request</span>' : '<span class="badge badge-success">Completed</span>';
                $Link = ($row->status != 'Completed') ? '<a class="dropdown-item" href="' . route('manage_transfer.edit', $row->id) . '">Edit</a><a class="dropdown-item" href="' . route('manage_transfer.view', $row->id) . '">View</a><a class="dropdown-item" href="' . route('manage_transfer.receive', $row->id) . '">Receive</a><a class="dropdown-item" id="swal-warning" data-delete="' . route('manage_transfer.delete', $row->id) . '">Delete</a>' : '<a class="dropdown-item" href="' . route('manage_transfer.view', $row->id) . '">View</a>';

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div class="dropdown-menu tx-13">
                                ' . $Link . '
                                </div>
                            </div>';
                            $index++;
            });

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => $uom,
            ]);
        }
    }

    public function index(){
        if (
            Auth::user()->hasPermissionTo('MANAGE TRANSFER List') ||
            Auth::user()->hasPermissionTo('MANAGE TRANSFER Create') ||
            Auth::user()->hasPermissionTo('MANAGE TRANSFER Update') ||
            Auth::user()->hasPermissionTo('MANAGE TRANSFER View') ||
            Auth::user()->hasPermissionTo('MANAGE TRANSFER Receive') ||
            Auth::user()->hasPermissionTo('MANAGE TRANSFER Delete')
        ) {
            Helper::logSystemActivity('MANAGE TRANSFER', 'MANAGE TRANSFER List');
            return view('WMS.ManageTransfer.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }
    public function create(){
        if (!Auth::user()->hasPermissionTo('MANAGE TRANSFER Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $ref_nos = MaterialRequest::all();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        return view('WMS.ManageTransfer.create', compact('ref_nos', 'locations'));
    }

    public function ref(Request $request){
        $material = MaterialRequest::where('id', '=', $request->id)->with('sale_order', 'user')->first();
        $material_b = MaterialRequestB::where('material_id', '=', $material->id)->with('manage_transfer_b')->get();
        $material_c = MaterialRequestC::where('material_id', '=', $material->id)->with('manage_transfer_c')->get();
        $material_d = MaterialRequestD::where('material_id', '=', $material->id)->with('manage_transfer_d')->get();
        return response()->json(['material' => $material, 'material_b' => $material_b, 'material_c' => $material_c, 'material_d' => $material_d]);
    }

    public function available_qty(Request $request){
        $qty = Location::select('used_qty')->where('area_id', '=', $request->area_id)->where('shelf_id', '=', $request->shelf_id)->where('level_id', '=', $request->level_id)->first();
        return $qty;
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('MANAGE TRANSFER Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'ref_no' => 'required',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $manage_transfer = new ManageTransfer();
        $manage_transfer->request_id = $request->ref_no;
        $manage_transfer->date = $request->date;
        $manage_transfer->created_by = Auth::user()->id;
        $manage_transfer->status = 'Request';
        $manage_transfer->save();

        foreach($request->kertas as $value){
            $manage_transfer_detail_b = new MaterialRequestB();
            $manage_transfer_detail_b->transfer_id = $manage_transfer->id;
            $manage_transfer_detail_b->stock_code = $value['stock_code'] ?? null;
            $manage_transfer_detail_b->previous_qty = $value['previous_qty'] ?? 0;
            $manage_transfer_detail_b->balance_qty = $value['balance_qty'] ?? 0;
            $manage_transfer_detail_b->transfer_qty = $value['transfer_qty'] ?? 0;
            $manage_transfer_detail_b->remaining_qty = $value['remaining_qty'] ?? 0;
            $manage_transfer_detail_b->remarks = $value['remarks'] ?? null;
            $manage_transfer_detail_b->save();
        }

        foreach($request->bahan as $value){
            $manage_transfer_detail_c = new MaterialRequestB();
            $manage_transfer_detail_c->transfer_id = $manage_transfer->id;
            $manage_transfer_detail_c->stock_code = $value['stock_code'] ?? null;
            $manage_transfer_detail_c->previous_qty = $value['previous_qty'] ?? 0;
            $manage_transfer_detail_c->balance_qty = $value['balance_qty'] ?? 0;
            $manage_transfer_detail_c->transfer_qty = $value['transfer_qty'] ?? 0;
            $manage_transfer_detail_c->remaining_qty = $value['remaining_qty'] ?? 0;
            $manage_transfer_detail_c->remarks = $value['remarks'] ?? null;
            $manage_transfer_detail_c->save();
        }

        foreach($request->wip as $value){
            $manage_transfer_detail_d = new MaterialRequestB();
            $manage_transfer_detail_d->transfer_id = $manage_transfer->id;
            $manage_transfer_detail_d->stock_code = $value['stock_code'] ?? null;
            $manage_transfer_detail_d->previous_qty = $value['previous_qty'] ?? 0;
            $manage_transfer_detail_d->balance_qty = $value['balance_qty'] ?? 0;
            $manage_transfer_detail_d->transfer_qty = $value['transfer_qty'] ?? 0;
            $manage_transfer_detail_d->remaining_qty = $value['remaining_qty'] ?? 0;
            $manage_transfer_detail_d->remarks = $value['remarks'] ?? null;
            $manage_transfer_detail_d->save();
        }

        Helper::logSystemActivity('MANAGE TRANSFER', 'MANAGE TRANSFER Store');
        return redirect()->route('manage_transfer')->with('custom_success', 'MANAGE TRANSFER has been Created Successfully !');
    }
}
