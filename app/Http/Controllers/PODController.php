<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PODController extends Controller
{
    public function index(){
        return view('Mes.POD.index');
    }

    public function view(){
        return view('Mes.POD.view');
    }
    public function Create(){
        return view('Mes.POD.create');
    }
    public function edit(){
        return view('Mes.POD.edit');
    }

    public function verify(){
        return view('Mes.POD.verify');
    }
}
