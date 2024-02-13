<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProsesThreeKnifeController extends Controller
{
    public function index(){
        return view('Mes.ProsesThreeKnife.index');
}

    public function create(){
        return view('Mes.ProsesThreeKnife.create');
   }

    public function view(){
        return view('Mes.ProsesThreeKnife.view');
   }

    public function verify(){
        return view('Mes.ProsesThreeKnife.verify');
   }
}
