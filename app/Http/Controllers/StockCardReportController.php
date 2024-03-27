<?php

namespace App\Http\Controllers;

use App\Models\GoodReceivingProduct;
use App\Models\ManageTransferB;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StockCardReportController extends Controller
{
    public function index(){
        if (!Auth::user()->hasPermissionTo('STOCK CARD REPORT View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $products = Product::all();
        return view("WMS.StockCardReport.index", compact('products'));
    }

    public function generate(Request $request){
        $start_date = Carbon::parse($request->start_date)->format('d-m-Y');
        $end_date = Carbon::parse($request->end_date)->format('d-m-Y');
        $good_receiving = DB::table('good_receivings')
        ->select('good_receivings.date', 'good_receivings.doc_no', 'good_receiving_products.receiving_qty', 'products.item_code', 'products.description', 'products.base_uom')
        ->join('good_receiving_products', 'good_receivings.id', '=', 'good_receiving_products.receiving_id')
        ->join('products', 'good_receiving_products.product_id', '=', 'products.id')
        ->where('good_receiving_products.product_id', '=', $request->item_code)
        ->whereBetween('good_receivings.date', [$start_date, $end_date])
        ->get();
        $manage_transfer_b = DB::table('manage_transfers')
        ->select('manage_transfers.date', 'material_requests.ref_no', 'manage_transfer_b_s.transfer_qty', 'products.item_code', 'products.description', 'products.base_uom')
        ->join('material_requests', 'manage_transfers.request_id', '=', 'material_requests.id')
        ->join('manage_transfer_b_s', 'manage_transfers.id', '=', 'manage_transfer_b_s.transfer_id')
        ->join('products', 'manage_transfer_b_s.product_id', '=', 'products.id')
        ->where('manage_transfer_b_s.product_id', '=', $request->item_code)
        ->whereBetween('manage_transfers.date', [$start_date, $end_date])
        ->get();
        $manage_transfer_c = DB::table('manage_transfers')
        ->select('manage_transfers.date', 'material_requests.ref_no', 'manage_transfer_c_s.transfer_qty', 'products.item_code', 'products.description', 'products.base_uom')
        ->join('material_requests', 'manage_transfers.request_id', '=', 'material_requests.id')
        ->join('manage_transfer_c_s', 'manage_transfers.id', '=', 'manage_transfer_c_s.transfer_id')
        ->join('products', 'manage_transfer_c_s.product_id', '=', 'products.id')
        ->where('manage_transfer_c_s.product_id', '=', $request->item_code)
        ->whereBetween('manage_transfers.date', [$start_date, $end_date])
        ->get();
        $manage_transfer_d = DB::table('manage_transfers')
        ->select('manage_transfers.date', 'material_requests.ref_no', 'manage_transfer_d_s.transfer_qty', 'products.item_code', 'products.description', 'products.base_uom')
        ->join('material_requests', 'manage_transfers.request_id', '=', 'material_requests.id')
        ->join('manage_transfer_d_s', 'manage_transfers.id', '=', 'manage_transfer_d_s.transfer_id')
        ->join('products', 'manage_transfer_d_s.product_id', '=', 'products.id')
        ->where('manage_transfer_d_s.product_id', '=', $request->item_code)
        ->whereBetween('manage_transfers.date', [$start_date, $end_date])
        ->get();
        $stock_in = DB::table('stock_ins')
        ->select('stock_ins.date', 'stock_ins.ref_no', 'stock_in_products.qty', 'products.item_code', 'products.description', 'products.base_uom')
        ->join('stock_in_products', 'stock_ins.id', '=', 'stock_in_products.stock_id')
        ->join('products', 'stock_in_products.product_id', '=', 'products.id')
        ->where('stock_in_products.product_id', '=', $request->item_code)
        ->whereBetween('stock_ins.date', [$start_date, $end_date])
        ->get();
        $stock_transfer = DB::table('stock_transfers')
        ->select('stock_transfers.date', 'stock_transfers.ref_no', 'stock_transfer_products.qty', 'products.item_code', 'products.description', 'products.base_uom')
        ->join('stock_transfer_products', 'stock_transfers.id', '=', 'stock_transfer_products.stock_id')
        ->join('products', 'stock_transfer_products.product_id', '=', 'products.id')
        ->where('stock_transfer_products.product_id', '=', $request->item_code)
        ->whereBetween('stock_transfers.date', [$start_date, $end_date])
        ->get();
        return response()->json(['good_receiving' => $good_receiving, 'manage_transfer_b' => $manage_transfer_b, 'manage_transfer_c' => $manage_transfer_c, 'manage_transfer_d' => $manage_transfer_d, 'stock_in' => $stock_in, 'stock_transfer' => $stock_transfer]);
    }
}
