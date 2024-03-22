<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\AreaLocation;
use App\Models\Location;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\Product;
use App\Models\StockTransfer;
use App\Models\StockTransferProduct;
use App\Models\StockTransferLocation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StockTransferController extends Controller
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

            $query = StockTransfer::select('id', 'sale_order_id', 'date', 'ref_no', 'supplier_id', 'description', 'created_by')->with('sale_order', 'user', 'supplier');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('ref_no', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('supplier', function ($query) use ($searchLower) {
                            $query->where('name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('description', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('user', function ($query) use ($searchLower) {
                            $query->where('full_name', 'like', '%' . $searchLower . '%');
                        });
                    // Add more columns as needed
                });
            }

            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'date',
                    2 => 'ref_no',
                    3 => 'sale_order_id',
                    4 => 'supplier_id',
                    5 => 'description',
                    6 => 'created_by',
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
                                $q->where('date', 'like', '%' . $searchLower . '%');
                                break;
                            case 2:
                                $q->where('ref_no', 'like', '%' . $searchLower . '%');
                                break;
                            case 3:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 4:
                                $q->whereHas('supplier', function ($query) use ($searchLower) {
                                    $query->where('name', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 5:
                                $q->where('description', 'like', '%' . $searchLower . '%');
                                break;
                            case 6:
                                $q->whereHas('user', function ($query) use ($searchLower) {
                                    $query->where('full_name', 'like', '%' . $searchLower . '%');
                                });
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

                $editLink = $row->status == 'Received' ? '' : '<a class="dropdown-item" href="' . route('stock_transfer.edit', $row->id) . '">Edit</a>';
                $receiveLink = $row->status == 'Received' ? '' : '<a class="dropdown-item" href="' . route('stock_transfer.receive', $row->id) . '">Receive</a>';
                $deleteLink = $row->status == 'Received' ? '' : '<a class="dropdown-item" id="swal-warning" data-delete="' . route('stock_transfer.delete', $row->id) . '">Delete</a>';

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                ' . $editLink . '
                                <a class="dropdown-item" href="' . route('stock_transfer.view', $row->id) . '">View</a>
                                ' . $receiveLink . '
                                ' . $deleteLink . '
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

            $query = StockTransfer::select('id', 'sale_order_id', 'date', 'ref_no', 'supplier_id', 'description', 'created_by')->with('sale_order', 'user', 'supplier');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('ref_no', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('supplier', function ($query) use ($searchLower) {
                            $query->where('name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('description', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('user', function ($query) use ($searchLower) {
                            $query->where('full_name', 'like', '%' . $searchLower . '%');
                        });
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'date',
                2 => 'ref_no',
                3 => 'sale_order_id',
                4 => 'supplier_id',
                5 => 'description',
                6 => 'created_by',
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

                $editLink = $row->status == 'Received' ? '' : '<a class="dropdown-item" href="' . route('stock_transfer.edit', $row->id) . '">Edit</a>';
                $receiveLink = $row->status == 'Received' ? '' : '<a class="dropdown-item" href="' . route('stock_transfer.receive', $row->id) . '">Receive</a>';
                $deleteLink = $row->status == 'Received' ? '' : '<a class="dropdown-item" id="swal-warning" data-delete="' . route('stock_transfer.delete', $row->id) . '">Delete</a>';

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                ' . $editLink . '
                                <a class="dropdown-item" href="' . route('stock_transfer.view', $row->id) . '">View</a>
                                ' . $receiveLink . '
                                ' . $deleteLink . '
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
            Auth::user()->hasPermissionTo('STOCK TRANSFER List') ||
            Auth::user()->hasPermissionTo('STOCK TRANSFER Create') ||
            Auth::user()->hasPermissionTo('STOCK TRANSFER Update') ||
            Auth::user()->hasPermissionTo('STOCK TRANSFER View') ||
            Auth::user()->hasPermissionTo('STOCK TRANSFER Delete')
        ) {
            Helper::logSystemActivity('STOCK TRANSFER', 'STOCK TRANSFER List');
            return view('WMS.StockTransfer.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('STOCK TRANSFER Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $year = Carbon::now('Asia/Kuala_Lumpur')->format('y');
        $current_year = Carbon::now('Asia/Kuala_Lumpur')->year;
        $count = StockTransfer::where(DB::raw('YEAR(STR_TO_DATE(date, "%d-%m-%Y"))'), $current_year)->count();        $suppliers = Supplier::select('id', 'name', 'code')->get();
        $customers = Customer::select('id', 'name', 'code')->get();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        $products = Product::select('id', 'item_code', 'description', 'group', 'base_uom')->get();
        Helper::logSystemActivity('STOCK TRANSFER', 'STOCK TRANSFER Create');
        return view('WMS.StockTransfer.create', compact('year', 'count', 'suppliers', 'customers', 'products', 'locations'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('STOCK TRANSFER Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'ref_no' => 'required',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $stock_transfer = new StockTransfer();
        $stock_transfer->sale_order_id = $request->sale_order;
        $stock_transfer->date = $request->date;
        $stock_transfer->ref_no = $request->ref_no;
        $stock_transfer->description = $request->description;
        $stock_transfer->do_no = $request->do_no;
        $stock_transfer->customer = ($request->customer != null) ? 1 : null;
        $stock_transfer->customer_id = ($request->customer != null) ? $request->customer_id : null;
        $stock_transfer->subcon = ($request->supplier != null) ? 1 : null;
        $stock_transfer->supplier_id = ($request->supplier_id != null) ? $request->supplier_id : null;
        $stock_transfer->created_by = Auth::user()->id;
        $stock_transfer->save();

        foreach($request->products as $value){
            $stock_transfer_product = new StockTransferProduct();
            $stock_transfer_product->stock_id = $stock_transfer->id;
            $stock_transfer_product->product_id = $value['product_id'] ?? null;
            $stock_transfer_product->qty = $value['qty'] ?? 0;
            $stock_transfer_product->save();
        }

        $storedData = json_decode($request->input('details'), true);

        $newArray = collect($storedData)->flatMap(function ($subArray) {
            return $subArray;
        })->sortBy('hiddenId')->values()->toArray();

        foreach ($newArray as $key => $value) {
            $detail = new StockTransferLocation();
            $detail->stock_id = $stock_transfer->id;
            $detail->product_id = $value['hiddenId'] ?? null;
            $detail->area_id = $value['area'] ?? null;
            $detail->shelf_id = $value['shelf'] ?? null;
            $detail->level_id = $value['level'] ?? null;
            $detail->qty = $value['qty'] ?? 0;
            $detail->available_qty = $value['available_qty'] ?? 0;
            $detail->save();

            $location = Location::where('area_id', $detail->area_id)->where('shelf_id', $detail->shelf_id)->where('level_id', $detail->level_id)->where('product_id', $detail->product_id)->first();
            if ($location) {
                $location->used_qty -= (int)$detail->qty ?? 0;
            }
            if($detail->area_id != null && $detail->shelf_id != null && $detail->level_id != null){
                $location->save();
            }
        }

        Helper::logSystemActivity('STOCK TRANSFER', 'STOCK TRANSFER Store');
        return redirect()->route('stock_transfer')->with('custom_success', 'STOCK TRANSFER has been Created Successfully !');
    }


    public function edit($id){
        if (!Auth::user()->hasPermissionTo('STOCK TRANSFER Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $suppliers = Supplier::select('id', 'name', 'code')->get();
        $customers = Customer::select('id', 'name', 'code')->get();
        $stock_transfer = StockTransfer::find($id);
        $stock_products = StockTransferProduct::where('stock_id', $id)->get();
        $stock_locations = StockTransferLocation::where('stock_id', $id)->get();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        $products = Product::select('id', 'item_code', 'description', 'group', 'base_uom')->get();
        Helper::logSystemActivity('STOCK TRANSFER', 'STOCK TRANSFER Update');
        return view('WMS.StockTransfer.edit',compact('stock_transfer', 'stock_products', 'stock_locations', 'locations', 'products', 'suppliers', 'customers'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('STOCK TRANSFER View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $suppliers = Supplier::select('id', 'name', 'code')->get();
        $customers = Customer::select('id', 'name', 'code')->get();
        $stock_transfer = StockTransfer::find($id);
        $stock_products = StockTransferProduct::where('stock_id', $id)->get();
        $stock_locations = StockTransferLocation::where('stock_id', $id)->get();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        $products = Product::select('id', 'item_code', 'description', 'group', 'base_uom')->get();
        Helper::logSystemActivity('STOCK TRANSFER', 'STOCK TRANSFER View');
        return view('WMS.StockTransfer.view',compact('stock_transfer', 'stock_products', 'stock_locations', 'locations', 'products', 'suppliers', 'customers'));
    }

    public function update(Request $request,$id)
    {
        if (!Auth::user()->hasPermissionTo('STOCK TRANSFER Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'ref_no' => 'required',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $stock_transfer = StockTransfer::find($id);
        $stock_transfer->sale_order_id = $request->sale_order;
        $stock_transfer->date = $request->date;
        $stock_transfer->description = $request->description;
        $stock_transfer->do_no = $request->do_no;
        $stock_transfer->customer = ($request->customer != null) ? 1 : null;
        $stock_transfer->customer_id = ($request->customer != null) ? $request->customer_id : null;
        $stock_transfer->subcon = ($request->supplier != null) ? 1 : null;
        $stock_transfer->supplier_id = ($request->supplier_id != null) ? $request->supplier_id : null;
        $stock_transfer->created_by = Auth::user()->id;
        $stock_transfer->save();

        $details = StockTransferProduct::where('stock_id', '=', $id)->get();
        $detailIds = $details->pluck('product_id')->toArray();
        $existingDetails = StockTransferLocation::whereIn('product_id', $detailIds)->get();

        foreach ($existingDetails as $existingDetail) {
            if($existingDetail->area_id != null && $existingDetail->shelf_id != null && $existingDetail->level_id != null){
                $location = Location::where('area_id', $existingDetail->area_id)->where('shelf_id', $existingDetail->shelf_id)->where('level_id', $existingDetail->level_id)->where('product_id', $existingDetail->product_id)->first();

                if ($location) {
                    $location->used_qty += (int)$existingDetail->qty ?? 0;
                    $location->save();
                }
            }
        }

        StockTransferProduct::where('stock_id', $id)->delete();
        StockTransferLocation::whereIn('product_id', $detailIds)->delete();

        foreach($request->products as $value){
            $stock_transfer_product = new StockTransferProduct();
            $stock_transfer_product->stock_id = $stock_transfer->id;
            $stock_transfer_product->product_id = $value['product_id'] ?? null;
            $stock_transfer_product->qty = $value['qty'] ?? 0;
            $stock_transfer_product->save();
        }

        $storedData = json_decode($request->input('details'), true);

        $newArray = collect($storedData)->flatMap(function ($subArray) {
            return $subArray;
        })->sortBy('hiddenId')->values()->toArray();

        foreach ($newArray as $key => $value) {
            $detail = new StockTransferLocation();
            $detail->stock_id = $stock_transfer->id;
            $detail->product_id = $value['hiddenId'] ?? null;
            $detail->area_id = $value['area'] ?? null;
            $detail->shelf_id = $value['shelf'] ?? null;
            $detail->level_id = $value['level'] ?? null;
            $detail->qty = $value['qty'] ?? 0;
            $detail->available_qty = $value['available_qty'] ?? 0;
            $detail->save();

            $location = Location::where('area_id', $detail->area_id)->where('shelf_id', $detail->shelf_id)->where('level_id', $detail->level_id)->where('product_id', $detail->product_id)->first();
            if ($location) {
                $location->used_qty -= (int)$detail->qty ?? 0;
            }
            if($detail->area_id != null && $detail->shelf_id != null && $detail->level_id != null){
                $location->save();
            }
        }

        Helper::logSystemActivity('STOCK TRANSFER', 'STOCK TRANSFER Update');
        return redirect()->route('stock_transfer')->with('custom_success', 'STOCK TRANSFER has been Created Successfully !');
    }

    public function receive($id){
        if (!Auth::user()->hasPermissionTo('STOCK TRANSFER Receive')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $suppliers = Supplier::select('id', 'name', 'code')->get();
        $customers = Customer::select('id', 'name', 'code')->get();
        $stock_transfer = StockTransfer::find($id);
        $stock_products = StockTransferProduct::where('stock_id', $id)->get();
        $stock_locations = StockTransferLocation::where('stock_id', $id)->get();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        $products = Product::select('id', 'item_code', 'description', 'group', 'base_uom')->get();
        Helper::logSystemActivity('STOCK TRANSFER', 'STOCK TRANSFER Receive');
        return view('WMS.StockTransfer.receive',compact('stock_transfer', 'stock_products', 'stock_locations', 'locations', 'products', 'suppliers', 'customers'));
    }

    public function receive_update(Request $request,$id)
    {
        if (!Auth::user()->hasPermissionTo('STOCK TRANSFER Receive')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $stock_transfer = StockTransfer::find($id);
        $stock_transfer->status = 'Received';
        $stock_transfer->receive_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $stock_transfer->receive_by_user = Auth::user()->user_name;
        $stock_transfer->receive_by_designation = (Auth::user()->designations != null) ? Auth::user()->designations->name : 'not assign';
        $stock_transfer->receive_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $stock_transfer->save();

        Helper::logSystemActivity('STOCK TRANSFER', 'STOCK TRANSFER Receive');
        return redirect()->route('stock_transfer')->with('custom_success', 'STOCK TRANSFER has been Created Successfully !');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('STOCK TRANSFER Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $stock_transfer = StockTransfer::find($id);

        $details = StockTransferProduct::where('stock_id', '=', $id)->get();
        $detailIds = $details->pluck('product_id')->toArray();
        $existingDetails = StockTransferLocation::whereIn('product_id', $detailIds)->get();

        foreach ($existingDetails as $existingDetail) {
            if($existingDetail->area_id != null && $existingDetail->shelf_id != null && $existingDetail->level_id != null){
                $location = Location::where('area_id', $existingDetail->area_id)->where('shelf_id', $existingDetail->shelf_id)->where('level_id', $existingDetail->level_id)->where('product_id', $existingDetail->product_id)->first();

                if ($location) {
                    $location->used_qty += (int)$existingDetail->qty ?? 0;
                    $location->save();
                }
            }
        }

        StockTransferProduct::where('stock_id', $id)->delete();
        StockTransferLocation::where('stock_id', $id)->delete();
        $stock_transfer->delete();
        Helper::logSystemActivity('STOCK TRANSFER', 'STOCK TRANSFER Delete');
        return redirect()->route('stock_transfer')->with('custom_success', 'STOCK TRANSFER has been Successfully Deleted!');
    }
}
