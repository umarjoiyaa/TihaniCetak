<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pemeriksaan_PenghantaranController extends Controller
{
    public function index(){
        return view('WMS.Pemeriksaan_Penghantaran.index');
    }
    public function create(){
        return view('WMS.Pemeriksaan_Penghantaran.create');
    }
}
