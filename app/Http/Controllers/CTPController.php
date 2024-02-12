<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CTPController extends Controller
{
    public function index(){
        return view('Mes.Ctp.index');
    }

    public function view(){
        return view('Mes.Ctp.view');
    }
    public function Create(){
        return view('Mes.Ctp.create');
    }
    public function edit(){
        return view('Mes.Ctp.edit');
    }

    public function verify(){
        return view('Mes.Ctp.verify');
    }
}
