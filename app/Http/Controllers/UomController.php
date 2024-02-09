<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UomController extends Controller
{
    public function Index(){
        return view('Setting.Uom.Index');
    }
    public function Create(){
        return view('Setting.Uom.Create');
    }
}
