<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProsesPemgumpulangatheringController extends Controller
{
    public function index(){
        return view('Mes.ProsesPemgumpulangathering.index');
}

    public function create(){
        return view('Mes.ProsesPemgumpulangathering.create');
   }

    public function view(){
        return view('Mes.ProsesPemgumpulangathering.view');
   }

    public function verify(){
        return view('Mes.ProsesPemgumpulangathering.verify');
   }
}
