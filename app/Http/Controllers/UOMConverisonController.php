<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UOMConverisonController extends Controller
{
    function index(){
        return view("Setting.Uomcon.index");
    }
    function view(){
        return view("Setting.Uomcon.view");
    }
    function create(){
        return view("Setting.Uomcon.create");
    }
}
