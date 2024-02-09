<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view("Setting.user.index");
    }   
    public function view(){
        return view("Setting.user.view");
    }
    public function create(){
        return view("Setting.user.create");
    } 
}
