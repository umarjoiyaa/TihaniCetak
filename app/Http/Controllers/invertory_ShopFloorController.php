<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class invertory_ShopFloorController extends Controller
{
    public function index(){
        return view("WHM.invertory_shopfloor.index");
    }
}
