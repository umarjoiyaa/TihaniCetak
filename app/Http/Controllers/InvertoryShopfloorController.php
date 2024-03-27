<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvertoryShopfloorController extends Controller
{
    public function index(){
        if (!Auth::user()->hasPermissionTo('INVENTORY SHOPFLOOR View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $areas = DB::table('areas')
        ->select(
            'areas.id as area_id',
            'areas.name as area_name',
            'areas.code as area_code',
            'areas.shelf_id as shelf_ids'
        )
        ->get();

        foreach ($areas as $area) {
            $area->shelf_ids = json_decode($area->shelf_ids); // Convert JSON string to array
            $area->shelves = [];

                $shelves = DB::table('area_shelves')
                ->select(
                    'area_shelves.id as shelf_id',
                    'area_shelves.name as shelf_name',
                    'area_shelves.code as shelf_code',
                    DB::raw('(SELECT SUM(used_qty) FROM locations WHERE locations.shelf_id = area_shelves.id) as total_quantity')
                )
                ->whereIn('area_shelves.id', $area->shelf_ids)
                ->get();

            $area->total_quantity = 0;

            foreach ($shelves as $shelf) {
                $area->shelves[] = $shelf;
                $area->total_quantity += $shelf->total_quantity;
            }
        }
        return view("WMS.InventoryShopfloor.index", compact('areas'));
    }

    public function generate(Request $request){
        $details = Location::where('area_id', $request->area_id)->where('shelf_id', $request->shelf_id)->with('product', 'level')->get();
        return $details;
    }
}
