<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProsesLipatController extends Controller
{
    public function index(){
        return view('Mes.prosesLipat.index');
    }

    public function create(){
        return view('Mes.prosesLipat.create');
    }

    public function view(){
        return view('Mes.prosesLipat.view');
    }

    public function verify(){
        return view('Mes.prosesLipat.verify');
    }
}
