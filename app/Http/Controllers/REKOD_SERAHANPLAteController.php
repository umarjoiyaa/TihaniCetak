<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class REKOD_SERAHANPLAteController extends Controller
{
    public function index(){
        return view('Mes.REKOD_SERAHANPLAte.index');
    }
    public function Create(){
        return view('Mes.REKOD_SERAHANPLAte.create');
    }
}
