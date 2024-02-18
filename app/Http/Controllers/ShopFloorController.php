<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopFloorController extends Controller
{
    public function index(){
        return view('Production.ShopFloor.index');
    }
}
