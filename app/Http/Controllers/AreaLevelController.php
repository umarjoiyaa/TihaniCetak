<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaLevelController extends Controller
{
        function index(){
            return view("Setting.Area_level.index");
        }
        function view(){
            return view("Setting.Area_level.view");
        }
        function create(){
            return view("Setting.Area_level.create");
        }
}
