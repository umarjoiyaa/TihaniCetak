<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MachineController extends Controller
{
    function index(){
        return view("Setting.Machine.index");
    }
    function view(){
        return view("Setting.Machine.view");
    }
    function create(){
        return view("Setting.Machine.create");
    }
}
