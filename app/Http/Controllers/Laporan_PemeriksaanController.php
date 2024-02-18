<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Laporan_PemeriksaanController extends Controller
{
    public function index(){
        return view('WHM.Laporan_Pemeriksaa.index');
    }
    public function create(){
        return view('WHM.Laporan_Pemeriksaa.create');
    }
    public function senarai(){
        return view('WHM.Laporan_Pemeriksaa.senarai');
    }
}
