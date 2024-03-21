<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\AreaLocation;
use App\Models\Location;
use App\Models\User;
use App\Models\Product;
use App\Models\StockIn;
use App\Models\StockInProduct;
use App\Models\StockInLocation;
use Carbon\Carbon;

class StockInController extends Controller
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

            $query = StockIn::select('id', 'sale_order_id', 'date', 'ref_no', 'transfer_by', 'description', 'created_by')->with('sale_order', 'user', 'transfer_user');

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
                        ->orWhere('description', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('transfer_user', function ($query) use ($searchLower) {
                            $query->where('full_name', 'like', '%' . $searchLower . '%');
                        })
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
                    4 => 'description',
                    5 => 'transfer_by',
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
                                $q->where('description', 'like', '%' . $searchLower . '%');
                                break;
                            case 5:
                                $q->whereHas('transfer_user', function ($query) use ($searchLower) {
                                    $query->where('full_name', 'like', '%' . $searchLower . '%');
                                });
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

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                <a class="dropdown-item" href="' . route('stock_in.edit', $row->id) . '">Edit</a>
                                <a class="dropdown-item" href="' . route('stock_in.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('stock_in.delete', $row->id) . '">Delete</a>
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

            $query = StockIn::select('id', 'sale_order_id', 'date', 'ref_no', 'transfer_by', 'description', 'created_by')->with('sale_order', 'user', 'transfer_user');

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
                        ->orWhere('description', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('transfer_user', function ($query) use ($searchLower) {
                            $query->where('full_name', 'like', '%' . $searchLower . '%');
                        })
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
                4 => 'description',
                5 => 'transfer_by',
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

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                <a class="dropdown-item" href="' . route('stock_in.edit', $row->id) . '">Edit</a>
                                <a class="dropdown-item" href="' . route('stock_in.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('stock_in.delete', $row->id) . '">Delete</a>
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
            Auth::user()->hasPermissionTo('STOCK IN List') ||
            Auth::user()->hasPermissionTo('STOCK IN Create') ||
            Auth::user()->hasPermissionTo('STOCK IN Update') ||
            Auth::user()->hasPermissionTo('STOCK IN View') ||
            Auth::user()->hasPermissionTo('STOCK IN Delete')
        ) {
            Helper::logSystemActivity('STOCK IN', 'STOCK IN List');
            return view('WMS.StockIn.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('STOCK IN Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $year = Carbon::now('Asia/Kuala_Lumpur')->format('y');
        $count = StockIn::whereYear('date', $year)->count();
        $users = User::all();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        $products = Product::select('id', 'item_code', 'description', 'group', 'base_uom')->get();
        Helper::logSystemActivity('STOCK IN', 'STOCK IN Create');
        return view('WMS.StockIn.create', compact('year', 'count', 'users', 'products', 'locations'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('STOCK IN Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'ref_no' => 'required',
            'transfer_by' => 'required',
            'category' => 'required',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $stock_in = new StockIn();
        $stock_in->sale_order_id = $request->sale_order;
        $stock_in->date = $request->date;
        $stock_in->ref_no = $request->ref_no;
        $stock_in->description = $request->description;
        $stock_in->transfer_by = $request->transfer_by;
        $stock_in->category = $request->category;
        $stock_in->created_by = Auth::user()->id;
        $stock_in->save();

        foreach($request->products as $value){
            $stock_in_product = new StockInProduct();
            $stock_in_product->stock_id = $stock_in->id;
            $stock_in_product->product_id = $value['product_id'] ?? null;
            $stock_in_product->qty = $value['qty'] ?? 0;
            $stock_in_product->save();
        }

        $storedData = json_decode($request->input('details'), true);

        $newArray = collect($storedData)->flatMap(function ($subArray) {
            return $subArray;
        })->sortBy('hiddenId')->values()->toArray();

        foreach ($newArray as $key => $value) {
            $detail = new StockInLocation();
            $detail->stock_id = $stock_in->id;
            $detail->product_id = $value['hiddenId'] ?? null;
            $detail->area_id = $value['area'] ?? null;
            $detail->shelf_id = $value['shelf'] ?? null;
            $detail->level_id = $value['level'] ?? null;
            $detail->qty = $value['qty'] ?? null;
            $detail->save();

            $location = Location::where('area_id', $detail->area_id)->where('shelf_id', $detail->shelf_id)->where('level_id', $detail->level_id)->where('product_id', $detail->product_id)->first();
            if ($location) {
                $location->used_qty += (int)$detail->qty;
            } else {
                if($detail->area_id != null && $detail->shelf_id != null && $detail->level_id != null){
                    $location = new Location();
                    $location->area_id = $detail->area_id;
                    $location->shelf_id = $detail->shelf_id;
                    $location->level_id = $detail->level_id;
                    $location->product_id = $detail->product_id;
                    $location->used_qty = (int)$detail->qty;
                }
            }
            if($detail->area_id != null && $detail->shelf_id != null && $detail->level_id != null){
                $location->save();
            }
        }

        Helper::logSystemActivity('STOCK IN', 'STOCK IN Store');
        return redirect()->route('stock_in')->with('custom_success', 'STOCK IN has been Created Successfully !');
    }


    public function edit($id){
        if (!Auth::user()->hasPermissionTo('STOCK IN Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $users = User::all();
        $stock_in = StockIn::find($id);
        $stock_products = StockInProduct::where('stock_id', $id)->get();
        $stock_locations = StockInLocation::where('stock_id', $id)->get();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        $products = Product::select('id', 'item_code', 'description', 'group', 'base_uom')->get();
        Helper::logSystemActivity('STOCK IN', 'STOCK IN Update');
        return view('WMS.StockIn.edit',compact('stock_in', 'stock_products', 'stock_locations', 'locations', 'products', 'users'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('STOCK IN View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $users = User::all();
        $stock_in = StockIn::find($id);
        $stock_products = StockInProduct::where('stock_id', $id)->get();
        $stock_locations = StockInLocation::where('stock_id', $id)->get();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        $products = Product::select('id', 'item_code', 'description', 'group', 'base_uom')->get();
        Helper::logSystemActivity('STOCK IN', 'STOCK IN View');
        return view('WMS.StockIn.view',compact('stock_in', 'stock_products', 'stock_locations', 'locations', 'products', 'users'));
    }

    public function update(Request $request,$id)
    {
        if (!Auth::user()->hasPermissionTo('STOCK IN Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'ref_no' => 'required',
            'transfer_by' => 'required',
            'category' => 'required',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $stock_in = StockIn::find($id);
        $stock_in->sale_order_id = $request->sale_order;
        $stock_in->date = $request->date;
        $stock_in->description = $request->description;
        $stock_in->transfer_by = $request->transfer_by;
        $stock_in->category = $request->category;
        $stock_in->created_by = Auth::user()->id;
        $stock_in->save();

        $details = StockInProduct::where('stock_id', '=', $id)->get();
        $detailIds = $details->pluck('product_id')->toArray();
        $existingDetails = StockInLocation::whereIn('product_id', $detailIds)->get();

        foreach ($existingDetails as $existingDetail) {
            if($existingDetail->area_id != null && $existingDetail->shelf_id != null && $existingDetail->level_id != null){
                $location = Location::where('area_id', $existingDetail->area_id)->where('shelf_id', $existingDetail->shelf_id)->where('level_id', $existingDetail->level_id)->where('product_id', $existingDetail->product_id)->first();

                if ($location) {
                    $location->used_qty -= (int)$existingDetail->qty;
                    $location->save();
                }
            }
        }

        StockInProduct::where('stock_id', $id)->delete();
        StockInLocation::whereIn('product_id', $detailIds)->delete();

        foreach($request->products as $value){
            $stock_in_product = new StockInProduct();
            $stock_in_product->stock_id = $stock_in->id;
            $stock_in_product->product_id = $value['product_id'] ?? null;
            $stock_in_product->qty = $value['qty'] ?? 0;
            $stock_in_product->save();
        }

        $storedData = json_decode($request->input('details'), true);

        $newArray = collect($storedData)->flatMap(function ($subArray) {
            return $subArray;
        })->sortBy('hiddenId')->values()->toArray();

        foreach ($newArray as $key => $value) {
            $detail = new StockInLocation();
            $detail->stock_id = $stock_in->id;
            $detail->product_id = $value['hiddenId'] ?? null;
            $detail->area_id = $value['area'] ?? null;
            $detail->shelf_id = $value['shelf'] ?? null;
            $detail->level_id = $value['level'] ?? null;
            $detail->qty = $value['qty'] ?? null;
            $detail->save();

            $location = Location::where('area_id', $detail->area_id)->where('shelf_id', $detail->shelf_id)->where('level_id', $detail->level_id)->where('product_id', $detail->product_id)->first();
            if ($location) {
                $location->used_qty += (int)$detail->qty;
            } else {
                if($detail->area_id != null && $detail->shelf_id != null && $detail->level_id != null){
                    $location = new Location();
                    $location->area_id = $detail->area_id;
                    $location->shelf_id = $detail->shelf_id;
                    $location->level_id = $detail->level_id;
                    $location->product_id = $detail->product_id;
                    $location->used_qty = (int)$detail->qty;
                }
            }
            if($detail->area_id != null && $detail->shelf_id != null && $detail->level_id != null){
                $location->save();
            }
        }

        Helper::logSystemActivity('STOCK IN', 'STOCK IN update');
        return redirect()->route('stock_in')->with('custom_success', 'STOCK IN has been Created Successfully !');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('STOCK IN Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $stock_in = StockIn::find($id);

        $details = StockInProduct::where('stock_id', '=', $id)->get();
        $detailIds = $details->pluck('product_id')->toArray();
        $existingDetails = StockInLocation::whereIn('product_id', $detailIds)->get();

        foreach ($existingDetails as $existingDetail) {
            $location = Location::where('area_id', $existingDetail->area_id)->where('shelf_id', $existingDetail->shelf_id)->where('level_id', $existingDetail->level_id)->where('product_id', $existingDetail->product_id)->first();

            if ($location) {
                $location->used_qty -= (int)$existingDetail->qty;
                $location->save();
            }
        }

        StockInProduct::where('stock_id', $id)->delete();
        StockInLocation::where('stock_id', $id)->delete();
        $stock_in->delete();
        Helper::logSystemActivity('STOCK IN', 'STOCK IN Delete');
        return redirect()->route('stock_in')->with('custom_success', 'STOCK IN has been Successfully Deleted!');
    }
}
