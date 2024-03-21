<?php

namespace App\Http\Controllers;
use App\Helpers\Helper;
use App\Models\Location;
use App\Models\AreaLocation;
use App\Models\GoodReceiving;
use App\Models\GoodReceivingProduct;
use App\Models\GoodReceivingLocation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GoodReceivingController extends Controller
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

            $query = GoodReceiving::select('id', 'doc_key', 'doc_no', 'doc_date', 'incomming_qty', 'receive_qty');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('doc_key', 'like', '%' . $searchLower . '%')
                        ->orWhere('doc_no', 'like', '%' . $searchLower . '%')
                        ->orWhere('doc_date', 'like', '%' . $searchLower . '%')
                        ->orWhere('incomming_qty', 'like', '%' . $searchLower . '%')
                        ->orWhere('receive_qty', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'doc_key',
                    2 => 'doc_no',
                    3 => 'doc_date',
                    4 => 'incomming_qty',
                    5 => 'receive_qty',
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
                                $q->where('doc_key', 'like', '%' . $searchLower . '%');
                                break;
                            case 2:
                                $q->where('doc_no', 'like', '%' . $searchLower . '%');
                                break;
                            case 3:
                                $q->where('doc_date', 'like', '%' . $searchLower . '%');
                                break;
                            case 4:
                                $q->where('incomming_qty', 'like', '%' . $searchLower . '%');
                                break;
                            case 5:
                                $q->where('receive_qty', 'like', '%' . $searchLower . '%');
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
                $good_receiving = $results->skip($start)->take($length)->all();
            } else {
                $good_receiving = [];
            }

            $index = 0;
            foreach ($good_receiving as $row) {
                $row->sr_no = $start + $index + 1;
                $action = ($row->incomming_qty == $row->receive_qty) ?
                    '<a class="dropdown-item" href="' . route('good_receiving.view', $row->id) . '">View</a>' :
                    '<a class="dropdown-item" href="' . route('good_receiving.receive', $row->id) . '">Receive</a>
                    <a class="dropdown-item" href="' . route('good_receiving.view', $row->id) . '">View</a>';

                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">' . ($row->incomming_qty == $row->receive_qty ? 'View' : 'Action') . ' <i class="fas fa-caret-down ml-1"></i></button>
                    <div class="dropdown-menu tx-13">
                        ' . $action . '
                    </div>
                </div>';
                $index++;
            }

            // // Continue with your response
            $good_receivingsWithoutAction = array_map(function ($row) {
                return $row;
            }, $good_receiving);

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => array_values($good_receivingsWithoutAction),
            ]);
        } elseif ($request->ajax()) {

            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = GoodReceiving::select('id', 'doc_key', 'doc_no', 'doc_date', 'incomming_qty', 'receive_qty');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('doc_key', 'like', '%' . $searchLower . '%')
                        ->orWhere('doc_no', 'like', '%' . $searchLower . '%')
                        ->orWhere('doc_date', 'like', '%' . $searchLower . '%')
                        ->orWhere('incomming_qty', 'like', '%' . $searchLower . '%')
                        ->orWhere('receive_qty', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'doc_key',
                2 => 'doc_no',
                3 => 'doc_date',
                4 => 'incomming_qty',
                5 => 'receive_qty',
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

            $good_receiving = $query
                ->skip($start)
                ->take($length)
                ->get();

            $good_receiving->each(function ($row, $index)  use (&$start) {
                $row->sr_no = $start + $index + 1;
                $action = ($row->incomming_qty == $row->receive_qty) ?
                    '<a class="dropdown-item" href="' . route('good_receiving.view', $row->id) . '">View</a>' :
                    '<a class="dropdown-item" href="' . route('good_receiving.receive', $row->id) . '">Receive</a>
                    <a class="dropdown-item" href="' . route('good_receiving.view', $row->id) . '">View</a>';

                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">' . ($row->incomming_qty == $row->receive_qty ? 'View' : 'Action') . ' <i class="fas fa-caret-down ml-1"></i></button>
                    <div class="dropdown-menu tx-13">
                        ' . $action . '
                    </div>
                </div>';
            });

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => $good_receiving,
            ]);
        }
    }

    public function index(){
        if (
            Auth::user()->hasPermissionTo('GOOD RECEIVING List') ||
            Auth::user()->hasPermissionTo('GOOD RECEIVING Receive') ||
            Auth::user()->hasPermissionTo('GOOD RECEIVING View')
        ) {
            Helper::logSystemActivity('GOOD RECEIVING', 'GOOD RECEIVING List');
            return view("WMS.GoodReceiving.index");
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function receive($id){
        if (!Auth::user()->hasPermissionTo('GOOD RECEIVING Receive')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $good_receiving = GoodReceiving::find($id);
        $good_receiving_products = GoodReceivingProduct::where('receiving_id', '=', $id)->get();
        $good_receiving_locations = GoodReceivingLocation::where('receiving_id', '=', $id)->get();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        return view('WMS.GoodReceiving.receive', compact('good_receiving', 'good_receiving_products', 'good_receiving_locations', 'locations'));
    }

    public function receive_update(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('GOOD RECEIVING Receive')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'date' => 'required'
        ]);

        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $good_receiving = GoodReceiving::find($id);
        $good_receiving->date = $request->date;
        $details = GoodReceivingProduct::where('receiving_id', '=', $id)->get();
        $detailIds = $details->pluck('id')->toArray();

        $existingDetails = GoodReceivingLocation::whereIn('product_id', $detailIds)->get();

        foreach ($existingDetails as $existingDetail) {
            $location = Location::where('area_id', $existingDetail->area_id)->where('shelf_id', $existingDetail->shelf_id)->where('level_id', $existingDetail->level_id)->where('product_id', $existingDetail->product_id)->first();

            if ($location) {
                $location->used_qty -= (int)$existingDetail->receiving_qty;
                $location->save();
            }
        }

        GoodReceivingLocation::whereIn('product_id', $detailIds)->delete();

        $storedData = json_decode($request->input('details'), true);

        foreach ($storedData as $key => $value) {
            $detail = new GoodReceivingLocation();
            $detail->receiving_id = $id;
            $detail->product_id = $value['hiddenId'] ?? null;
            $detail->area_id = $value['area'] ?? null;
            $detail->shelf_id = $value['shelf'] ?? null;
            $detail->level_id = $value['level'] ?? null;
            $detail->receiving_qty = $value['receive_qty'] ?? null;
            $detail->remarks = $value['remarks'] ?? null;
            $detail->save();

            $location = Location::where('area_id', $detail->area_id)->where('shelf_id', $detail->shelf_id)->where('level_id', $detail->level_id)->where('product_id', $detail->product_id)->first();
            $product = GoodReceivingProduct::where('receiving_id', '=', $id)->where('product_id', '=', $detail->product_id)->first();
            if($product->receiving_qty == null){
                $product->receiving_qty = (int)$detail->receiving_qty;
            }else{
                $product->receiving_qty += (int)$detail->receiving_qty;
            }
            $product->save();
            if ($location) {
                $location->used_qty += (int)$detail->receiving_qty;
            } else {
                $location = new Location();
                $location->area_id = $detail->area_id;
                $location->shelf_id = $detail->shelf_id;
                $location->level_id = $detail->level_id;
                $location->product_id = $detail->product_id;
                $location->used_qty = (int)$detail->receiving_qty;
            }

            $location->save();
        }

        $sum = GoodReceivingProduct::where('receiving_id', $id)->sum('receiving_qty');
        $good_receiving->receive_qty = $sum;
        $good_receiving->save();

        Helper::logSystemActivity('GOOD RECEIVING', 'GOOD RECEIVING Received');
        return redirect()->route('good_receiving')->with('custom_success', 'GOOD RECEIVING has been Received Successfully !');
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('GOOD RECEIVING View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $good_receiving = GoodReceiving::find($id);
        $good_receiving_products = GoodReceivingProduct::where('receiving_id', '=', $id)->get();
        $good_receiving_locations = GoodReceivingLocation::where('receiving_id', '=', $id)->get();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        return view('WMS.GoodReceiving.view', compact('good_receiving', 'good_receiving_products', 'good_receiving_locations', 'locations'));
    }

}
