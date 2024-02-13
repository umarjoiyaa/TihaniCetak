<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProsesPenJilidanSaddlestitchController extends Controller
{
    public function index(){
        return view('Mes.ProsesPenJilidanSaddlestitch.index');
}

    public function create(){
        return view('Mes.ProsesPenJilidanSaddlestitch.create');
   }

    public function view(){
        return view('Mes.ProsesPenJilidanSaddlestitch.view');
   }

    public function verify(){
        return view('Mes.ProsesPenJilidanSaddlestitch.verify');
   }
}
