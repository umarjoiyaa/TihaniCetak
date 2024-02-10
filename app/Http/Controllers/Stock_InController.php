<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Stock_InController extends Controller
{
    public function index(){
        return view('WHM.Stock_in.index');
    }
    public function create(){
        return view('WHM.Stock_in.create');
    }
}
