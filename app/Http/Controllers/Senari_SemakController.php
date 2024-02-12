<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Senari_SemakController extends Controller
{
    public function index(){
        return view('Mes.Senari_semak.index');
    }

    public function create(){
        return view('Mes.Senari_semak.create');
    }
}
