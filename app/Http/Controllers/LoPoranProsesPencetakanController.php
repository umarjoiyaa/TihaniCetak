<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoPoranProsesPencetakanController extends Controller
{
    public function index(){
        return view('Mes.LoPoranProsesPencetakan.index');
    }

    public function view(){
        return view('Mes.LoPoranProsesPencetakan.view');
    }
    public function Create(){
        return view('Mes.LoPoranProsesPencetakan.create');
    }
    public function edit(){
        return view('Mes.LoPoranProsesPencetakan.edit');
    }

    public function verify(){
        return view('Mes.LoPoranProsesPencetakan.verify');
    }
}
