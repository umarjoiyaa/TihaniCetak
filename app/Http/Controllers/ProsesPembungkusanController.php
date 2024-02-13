<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProsesPembungkusanController extends Controller
{
    public function index(){
        return view('Mes.ProsesPembungkusan.index');
}

    public function create(){
        return view('Mes.ProsesPembungkusan.create');
   }

    public function view(){
        return view('Mes.ProsesPembungkusan.view');
   }

    public function verify(){
        return view('Mes.ProsesPembungkusan.verify');
   }
}
