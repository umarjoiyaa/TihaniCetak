<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoPoranProsesLipatController extends Controller
{
    public function index(){
        return view('Mes.LoPoranProsesLipat.index');
    }

    public function view(){
        return view('Mes.LoPoranProsesLipat.view');
    }
    public function Create(){
        return view('Mes.LoPoranProsesLipat.create');
    }
    public function edit(){
        return view('Mes.LoPoranProsesLipat.edit');
    }

    public function verify(){
        return view('Mes.LoPoranProsesLipat.verify');
    }
}


