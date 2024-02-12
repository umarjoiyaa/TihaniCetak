<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProsespencetakanController extends Controller
{
    public function index(){
        return view('Mes.Prosespencetakan.index');
    }

    public function view(){
        return view('Mes.Prosespencetakan.view');
    }
    public function Create(){
        return view('Mes.Prosespencetakan.create');
    }
    public function edit(){
        return view('Mes.Prosespencetakan.edit');
    }

    public function verify(){
        return view('Mes.Prosespencetakan.verify');
    }
}
