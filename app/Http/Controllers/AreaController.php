<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaController extends Controller
{
    function index(){
        return view("Setting.Area.index");
    }
    function view(){
        return view("Setting.Area.view");
    }
    function create(){
        return view("Setting.Area.create");
    }
}
