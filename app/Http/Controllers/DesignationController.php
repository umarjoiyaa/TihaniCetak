<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignationController extends Controller
{
    function index(){
        return view("Setting.Desgination.index");
    }
    function view(){
        return view("Setting.Desgination.view");
    }
    function create(){
        return view("Setting.Desgination.create");
    }
}
