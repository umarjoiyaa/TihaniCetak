<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlateCetakController extends Controller
{
    public function index(){
        return view('Mes.PlateCetak.index');
    }

    public function view(){
        return view('Mes.PlateCetak.view');
    }
    public function Create(){
        return view('Mes.PlateCetak.create');
    }
    public function edit(){
        return view('Mes.PlateCetak.edit');
    }

    public function verify(){
        return view('Mes.PlateCetak.verify');
    }
}
