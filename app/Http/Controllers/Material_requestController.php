<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Material_requestController extends Controller
{
    public function index(){
        return view('WMS.Material_request.index');
    }
    public function create(){
        return view('WMS.Material_request.create');
    }
}
