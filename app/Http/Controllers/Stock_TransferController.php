<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Stock_TransferController extends Controller
{
    public function index(){
        return view('WHM.Stock_Transfer.index');
    }

    public function create(){
        return view('WHM.Stock_Transfer.create');
    }

    public function receive(){
        return view('WHM.Stock_Transfer.receive');
    }
}
