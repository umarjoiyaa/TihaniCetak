<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\AreaLevel;
use App\Models\AreaShelf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\GoodReceivingProduct;
use App\Models\Location;

class InventoryReportController extends Controller
{
    public function index(){
        // if (!Auth::user()->hasPermissionTo('INVENTORY REPORT View')) {
        //     return back()->with('custom_errors', 'You don`t have Right Permission');
        // }
        $products = GoodReceivingProduct::select('item_code', 'description')->get();
        $areas = Area::select('id', 'name')->get();
        $shelfs = AreaShelf::select('id', 'name')->get();
        $levels = AreaLevel::select('id', 'name')->get();
        return view("WMS.InvertoryReport.index", compact('products', 'areas', 'shelfs', 'levels'));
    }

    public function generate(Request $request){
        $location = Location::whereIn('area_id', $request->area_id)->whereIn('shelf_id', $request->shelf_id)->whereIn('level_id', $request->level_id)->whereIn('item_code', $request->item_code)->with('area', 'shelf', 'level')->get();
        return response()->json($location);
    }
}
