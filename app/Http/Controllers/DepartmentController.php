<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    function index(){
        return view("Setting.Department.index");
    }
    function view(){
        return view("Setting.Department.view");
    }
    function create(){
        return view("Setting.Department.create");
    }
}
