<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Stock_InController extends Controller
{
    public function index(){
        return view('WMS.Stock_in.index');
    }
    public function create(){
        return view('WMS.Stock_in.create');
    }
}
