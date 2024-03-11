<?php

namespace App\Http\Controllers;

use App\Models\MaterialRequest;
use App\Models\MaterialRequestB;
use App\Models\MaterialRequestC;
use App\Models\MaterialRequestD;
use Illuminate\Http\Request;

class ManageTransferController extends Controller
{
    public function index(){
        return view('WMS.Manage_transfer.index');
    }
    public function create(){
        $ref_nos = MaterialRequest::all();
        return view('WMS.Manage_transfer.create', compact('ref_nos'));
    }

    public function ref(Request $request){
        $material = MaterialRequest::where('id', '=', $request->id)->with('sale_order', 'user')->first();
        $material_b = MaterialRequestB::where('material_id', '=', $material->id)->get();
        $material_c = MaterialRequestC::where('material_id', '=', $material->id)->get();
        $material_d = MaterialRequestD::where('material_id', '=', $material->id)->get();
        return response()->json(['material' => $material, 'material_b' => $material_b, 'material_c' => $material_c, 'material_d' => $material_d]);
    }
}
