<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\AreaLevel;
use App\Models\AreaShelf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Location;

class InventoryReportController extends Controller
{
    public function index(){
        if (!Auth::user()->hasPermissionTo('INVENTORY REPORT View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $products = Product::select('id', 'item_code', 'description')->get();
        $areas = Area::select('id', 'name')->get();
        $shelfs = AreaShelf::select('id', 'name')->get();
        $levels = AreaLevel::select('id', 'name')->get();
        return view("WMS.InvertoryReport.index", compact('products', 'areas', 'shelfs', 'levels'));
    }

    public function generate(Request $request){
        $location = Location::select('area_id', 'shelf_id', 'level_id', 'product_id', 'used_qty');
        if(isset($request->area_id)){
            $location = $location->whereIn('area_id', $request->area_id);
        } elseif(isset($request->shelf_id)){
            $location = $location->whereIn('shelf_id', $request->shelf_id);
        } elseif(isset($request->level_id)){
            $location = $location->whereIn('level_id', $request->level_id);
        } elseif(isset($request->product_id)){
            $location = $location->whereIn('product_id', $request->product_id);
        }
        $location = $location->with('area', 'shelf', 'level', 'product')->get();
        return response()->json($location);
    }
}
