<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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

            $query = Product::select('id', 'item_code', 'description', 'group', 'base_uom');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('item_code', 'like', '%' . $searchLower . '%')
                        ->orWhere('description', 'like', '%' . $searchLower . '%')
                        ->orWhere('group', 'like', '%' . $searchLower . '%')
                        ->orWhere('base_uom', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'item_code',
                    2 => 'description',
                    3 => 'group',
                    4 => 'base_uom',
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
                                $q->where('item_code', 'like', '%' . $searchLower . '%');
                                break;
                            case 2:
                                $q->where('description', 'like', '%' . $searchLower . '%');
                                break;
                            case 3:
                                $q->where('group', 'like', '%' . $searchLower . '%');
                                break;
                            case 4:
                                $q->where('base_uom', 'like', '%' . $searchLower . '%');
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
                $product = $results->skip($start)->take($length)->all();
            } else {
                $product = [];
            }

            $index = 0;
            foreach ($product as $row) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                    <a class="dropdown-item" href="' . route('product.view', $row->id) . '">View</a>
                    </div>
                </div>';
                $index++;
            }

            // // Continue with your response
            $productsWithoutAction = array_map(function ($row) {
                return $row;
            }, $product);

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => array_values($productsWithoutAction),
            ]);
        } elseif ($request->ajax()) {

            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = Product::select('id', 'item_code', 'description', 'group', 'base_uom');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('item_code', 'like', '%' . $searchLower . '%')
                        ->orWhere('description', 'like', '%' . $searchLower . '%')
                        ->orWhere('group', 'like', '%' . $searchLower . '%')
                        ->orWhere('base_uom', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'item_code',
                2 => 'description',
                3 => 'group',
                4 => 'base_uom',
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

            $product = $query
                ->skip($start)
                ->take($length)
                ->get();

            $product->each(function ($row, $index)  use (&$start) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                        <a class="dropdown-item" href="' . route('product.view', $row->id) . '">View</a>
                    </div>
                </div>';
            });

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => $product,
            ]);
        }
    }

    public function index()
    {
        if (
            Auth::user()->hasPermissionTo('Product List') ||
            Auth::user()->hasPermissionTo('Product Create') ||
            Auth::user()->hasPermissionTo('Product Update') ||
            Auth::user()->hasPermissionTo('Product Delete')
        ) {
            Helper::logSystemActivity('Product', 'Product List');
            return view('Setting.Product.Index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function view($id)
    {
        if (!Auth::user()->hasPermissionTo('Product View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $product = Product::find($id);
        Helper::logSystemActivity('Product', 'Product View');
        return view('Setting.Product.View', compact('product'));
    }

}
