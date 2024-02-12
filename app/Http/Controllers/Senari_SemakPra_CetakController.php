<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Senari_SemakPra_CetakController extends Controller
{
    public function index(){
        return view('Mes.Senari_SemakPra_Cetak.index');
    }

    public function view(){
        return view('Mes.Senari_SemakPra_Cetak.view');
    }

    public function create(){
        return view('Mes.Senari_SemakPra_Cetak.create');
    }

    public function verify(){
        return view('Mes.Senari_SemakPra_Cetak.verify');
    }
}
