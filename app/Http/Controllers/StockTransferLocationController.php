<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\AreaLocation;
use App\Models\Location;
use App\Models\Product;
use App\Models\StockLocation;
use App\Models\StockLocationProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StockTransferLocationController extends Controller
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

            $query = StockLocation::select('id', 'sale_order_id', 'date', 'ref_no', 'description', 'created_by')->with('sale_order', 'user');

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
                        ->orWhereHas('user', function ($query) use ($searchLower) {
                            $query->where('user_name', 'like', '%' . $searchLower . '%');
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
                    5 => 'created_by',
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
                                $q->whereHas('user', function ($query) use ($searchLower) {
                                    $query->where('user_name', 'like', '%' . $searchLower . '%');
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
                                <a class="dropdown-item" href="' . route('stock_transfer_location.edit', $row->id) . '">Edit</a>
                                <a class="dropdown-item" href="' . route('stock_transfer_location.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('stock_transfer_location.delete', $row->id) . '">Delete</a>
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

            $query = StockLocation::select('id', 'sale_order_id', 'date', 'ref_no', 'description', 'created_by')->with('sale_order', 'user');

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
                        ->orWhereHas('user', function ($query) use ($searchLower) {
                            $query->where('user_name', 'like', '%' . $searchLower . '%');
                        });
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'date',
                2 => 'ref_no',
                3 => 'sale_order_id',
                4 => 'description',
                5 => 'created_by',
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
                                <a class="dropdown-item" href="' . route('stock_transfer_location.edit', $row->id) . '">Edit</a>
                                <a class="dropdown-item" href="' . route('stock_transfer_location.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('stock_transfer_location.delete', $row->id) . '">Delete</a>
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
            Auth::user()->hasPermissionTo('STOCK TRANSFER LOCATION List') ||
            Auth::user()->hasPermissionTo('STOCK TRANSFER LOCATION Create') ||
            Auth::user()->hasPermissionTo('STOCK TRANSFER LOCATION Update') ||
            Auth::user()->hasPermissionTo('STOCK TRANSFER LOCATION View') ||
            Auth::user()->hasPermissionTo('STOCK TRANSFER LOCATION Delete')
        ) {
            Helper::logSystemActivity('STOCK TRANSFER LOCATION', 'STOCK TRANSFER LOCATION List');
            return view('WMS.StockTransferLocation.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('STOCK TRANSFER LOCATION Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $year = Carbon::now('Asia/Kuala_Lumpur')->format('y');
        $current_year = Carbon::now('Asia/Kuala_Lumpur')->year;
        $count = StockLocation::where(DB::raw('YEAR(STR_TO_DATE(date, "%d-%m-%Y"))'), $current_year)->count() + 1;
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        Helper::logSystemActivity('STOCK TRANSFER LOCATION', 'STOCK TRANSFER LOCATION Create');
        return view('WMS.StockTransferLocation.create', compact('year', 'count', 'locations'));
    }

    public function products(Request $request){
        $products = Location::where('area_id', '=', $request->area_id)->where('shelf_id', '=', $request->shelf_id)->where('level_id', '=', $request->level_id)->with('product')->get();
        return $products;
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('STOCK TRANSFER LOCATION Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'ref_no' => 'required',
            'previous_location' => 'required',
            'new_location' => 'required',
            'products' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $stock_transfer_location = new StockLocation();
        $stock_transfer_location->sale_order_id = $request->sale_order;
        $stock_transfer_location->date = $request->date;
        $stock_transfer_location->ref_no = $request->ref_no;
        $stock_transfer_location->description = $request->description;

        $stock_transfer_location->previous_area_id = $request->previous_area_id;
        $stock_transfer_location->previous_shelf_id = $request->previous_shelf_id;
        $stock_transfer_location->previous_level_id = $request->previous_level_id;
        $stock_transfer_location->new_area_id = $request->new_area_id;
        $stock_transfer_location->new_shelf_id = $request->new_shelf_id;
        $stock_transfer_location->new_level_id = $request->new_level_id;

        $stock_transfer_location->created_by = Auth::user()->id;
        $stock_transfer_location->save();

        foreach($request->products as $value){
            $stock_transfer_location_product = new StockLocationProduct();
            $stock_transfer_location_product->stock_id = $stock_transfer_location->id;
            $stock_transfer_location_product->product_id = $value['product_id'] ?? null;
            $stock_transfer_location_product->available_qty = $value['available_qty'] ?? 0;
            $stock_transfer_location_product->qty = $value['qty'] ?? 0;
            $stock_transfer_location_product->save();

            $location = Location::where('area_id', $stock_transfer_location->previous_area_id)->where('shelf_id', $stock_transfer_location->previous_shelf_id)->where('level_id', $stock_transfer_location->previous_level_id)->where('product_id', $stock_transfer_location_product->product_id)->first();
            if ($location) {
                $location->used_qty -= $stock_transfer_location_product->qty ?? 0;
                $location->save();
            }

            $location1 = Location::where('area_id', $stock_transfer_location->new_area_id)->where('shelf_id', $stock_transfer_location->new_shelf_id)->where('level_id', $stock_transfer_location->new_level_id)->where('product_id', $stock_transfer_location_product->product_id)->first();
            if ($location1) {
                $location1->used_qty += $stock_transfer_location_product->qty ?? 0;
            }else{
                $location1 = new Location();
                $location1->area_id = $stock_transfer_location->new_area_id;
                $location1->shelf_id = $stock_transfer_location->new_shelf_id;
                $location1->level_id = $stock_transfer_location->new_level_id;
                $location1->product_id = $stock_transfer_location->product_id;
                $location1->used_qty = $stock_transfer_location_product->qty ?? 0;
            }
            $location1->save();
        }

        Helper::logSystemActivity('STOCK TRANSFER LOCATION', 'STOCK TRANSFER LOCATION Store');
        return redirect()->route('stock_transfer_location')->with('custom_success', 'STOCK TRANSFER LOCATION has been Created Successfully !');
    }


    public function edit($id){
        if (!Auth::user()->hasPermissionTo('STOCK TRANSFER LOCATION Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $stock_transfer_location = StockLocation::find($id);
        $stock_products = StockLocationProduct::where('stock_id', $id)->get();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        Helper::logSystemActivity('STOCK TRANSFER LOCATION', 'STOCK TRANSFER LOCATION Edit');
        return view('WMS.StockTransferLocation.edit',compact('stock_transfer_location', 'stock_products', 'locations'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('STOCK TRANSFER LOCATION View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $stock_transfer_location = StockLocation::find($id);
        $stock_products = StockLocationProduct::where('stock_id', $id)->get();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        Helper::logSystemActivity('STOCK TRANSFER LOCATION', 'STOCK TRANSFER LOCATION View');
        return view('WMS.StockTransferLocation.view',compact('stock_transfer_location', 'stock_products', 'locations'));
    }

    public function update(Request $request,$id)
    {
        if (!Auth::user()->hasPermissionTo('STOCK TRANSFER LOCATION Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'ref_no' => 'required',
            'previous_location' => 'required',
            'new_location' => 'required',
            'products' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        foreach($request->products as $value){
            $location = Location::where('area_id', $request->previous_area_id)->where('shelf_id', $request->previous_shelf_id)->where('level_id', $request->previous_level_id)->where('product_id', $value['product_id'])->first();
            if ($location) {
                if (($location->used_qty - $value['qty']) < 0) {
                    return back()->with('custom_errors', 'Insufficient quantity in previous location!');
                }
            }
        }

        $stock_transfer_location = StockLocation::find($id);
        $stock_transfer_location->sale_order_id = $request->sale_order;
        $stock_transfer_location->date = $request->date;
        $stock_transfer_location->ref_no = $request->ref_no;
        $stock_transfer_location->description = $request->description;

        $stock_transfer_location->previous_area_id = $request->previous_area_id;
        $stock_transfer_location->previous_shelf_id = $request->previous_shelf_id;
        $stock_transfer_location->previous_level_id = $request->previous_level_id;
        $stock_transfer_location->new_area_id = $request->new_area_id;
        $stock_transfer_location->new_shelf_id = $request->new_shelf_id;
        $stock_transfer_location->new_level_id = $request->new_level_id;

        $stock_transfer_location->created_by = Auth::user()->id;

        $previousProducts = StockLocationProduct::where('stock_id', '=', $stock_transfer_location)->get();
        foreach ($previousProducts as $prevProduct) {
            $prevLocation = Location::where('area_id', $stock_transfer_location->new_area_id)->where('shelf_id', $stock_transfer_location->new_shelf_id)->where('level_id', $stock_transfer_location->new_level_id)->where('product_id', $prevProduct->product_id)->first();
            if ($prevLocation) {
                $prevLocation->used_qty -= $prevProduct->qty ?? 0;
                $prevLocation->save();
            }

            $newLocation = Location::where('area_id', $stock_transfer_location->previous_area_id)->where('shelf_id', $stock_transfer_location->previous_shelf_id)->where('level_id', $stock_transfer_location->previous_level_id)->where('product_id', $prevProduct->product_id)->first();
            if ($newLocation) {
                $newLocation->used_qty += $prevProduct->qty ?? 0;
                $newLocation->save();
            }
        }

        $stock_transfer_location->save();

        StockLocationProduct::where('stock_id', '=', $stock_transfer_location)->delete();

        foreach($request->products as $value){
            $stock_transfer_location_product = new StockLocationProduct();
            $stock_transfer_location_product->stock_id = $stock_transfer_location->id;
            $stock_transfer_location_product->product_id = $value['product_id'] ?? null;
            $stock_transfer_location_product->available_qty = $value['available_qty'] ?? 0;
            $stock_transfer_location_product->qty = $value['qty'] ?? 0;
            $stock_transfer_location_product->save();

            $location = Location::where('area_id', $stock_transfer_location->previous_area_id)->where('shelf_id', $stock_transfer_location->previous_shelf_id)->where('level_id', $stock_transfer_location->previous_level_id)->where('product_id', $stock_transfer_location_product->product_id)->first();
            if ($location) {
                $location->used_qty -= $stock_transfer_location_product->qty ?? 0;
                $location->save();
            }

            $location1 = Location::where('area_id', $stock_transfer_location->new_area_id)->where('shelf_id', $stock_transfer_location->new_shelf_id)->where('level_id', $stock_transfer_location->new_level_id)->where('product_id', $stock_transfer_location_product->product_id)->first();
            if ($location1) {
                $location1->used_qty += $stock_transfer_location_product->qty ?? 0;
            }else{
                $location1 = new Location();
                $location1->area_id = $stock_transfer_location->new_area_id;
                $location1->shelf_id = $stock_transfer_location->new_shelf_id;
                $location1->level_id = $stock_transfer_location->new_level_id;
                $location1->product_id = $stock_transfer_location->product_id;
                $location1->used_qty = $stock_transfer_location_product->qty ?? 0;
            }
            $location1->save();
        }

        Helper::logSystemActivity('STOCK TRANSFER LOCATION', 'STOCK TRANSFER LOCATION Update');
        return redirect()->route('stock_transfer_location')->with('custom_success', 'STOCK TRANSFER LOCATION has been Created Successfully !');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('STOCK TRANSFER LOCATION Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $stock_transfer_location = StockLocation::find($id);

        $previousProducts = StockLocationProduct::where('stock_id', '=', $stock_transfer_location)->get();
        foreach ($previousProducts as $prevProduct) {
            $prevLocation = Location::where('area_id', $stock_transfer_location->new_area_id)->where('shelf_id', $stock_transfer_location->new_shelf_id)->where('level_id', $stock_transfer_location->new_level_id)->where('product_id', $prevProduct->product_id)->first();
            if ($prevLocation) {
                if (($prevLocation->used_qty - $prevProduct->qty) < 0) {
                    return back()->with('custom_errors', 'Insufficient quantity in location!');
                }
                $prevLocation->used_qty -= $prevProduct->qty ?? 0;
                $prevLocation->save();
            }

            $newLocation = Location::where('area_id', $stock_transfer_location->previous_area_id)->where('shelf_id', $stock_transfer_location->previous_shelf_id)->where('level_id', $stock_transfer_location->previous_level_id)->where('product_id', $prevProduct->product_id)->first();
            if ($newLocation) {
                $newLocation->used_qty += $prevProduct->qty ?? 0;
                $newLocation->save();
            }
        }

        StockLocationProduct::where('stock_id', $id)->delete();
        $stock_transfer_location->delete();
        Helper::logSystemActivity('STOCK TRANSFER LOCATION', 'STOCK TRANSFER LOCATION Delete');
        return redirect()->route('stock_transfer_location')->with('custom_success', 'STOCK TRANSFER LOCATION has been Successfully Deleted!');
    }
}
