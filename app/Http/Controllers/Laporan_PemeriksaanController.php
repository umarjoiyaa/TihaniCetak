<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Laporan_PemeriksaanController extends Controller
{
    public function index(){
        return view('WMS.Laporan_Pemeriksaa.index');
    }
    public function create(){
        return view('WMS.Laporan_Pemeriksaa.create');
    }
    public function senarai(){
        return view('WMS.Laporan_Pemeriksaa.senarai');
    }
}
