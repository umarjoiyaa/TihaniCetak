<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){
        return view("Setting.product.index");
    }
    function view(){
        return view("Setting.product.view");
    }
    function create(){
        return view("Setting.product.create");
    }
}
