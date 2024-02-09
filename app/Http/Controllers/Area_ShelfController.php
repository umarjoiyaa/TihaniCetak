<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Area_ShelfController extends Controller
{
    function index(){
        return view("Setting.area_Shelf.index");
    }
    function view(){
        return view("Setting.area_Shelf.view");
    }
    function create(){
        return view("Setting.area_Shelf.create");
    }
}
