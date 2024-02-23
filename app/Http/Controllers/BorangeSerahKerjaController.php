<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorangeSerahKerjaController extends Controller
{
    public function index(){
        return view('Production.BorangeSerahKerja.index');
    }

    public function create(){
        return view('Production.BorangeSerahKerja.create');
    }

    public function edit(){
        return view('Production.BorangeSerahKerja.edit');
    }

    public function view(){
        return view('Production.BorangeSerahKerja.view');
    }

    public function purchasing(){
        return view('Production.BorangeSerahKerja.purchasing');
    }
    public function transfer(){
        return view('Production.BorangeSerahKerja.Transfer');
    }
    public function receive(){
        return view('Production.BorangeSerahKerja.receive');
    }
}
