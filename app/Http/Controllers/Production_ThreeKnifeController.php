<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Production_ThreeKnifeController extends Controller
{
    public function index(){
        return view('Production.Production_ThreeKnife.index');
    }

    public function create(){
        return view('Production.Production_ThreeKnife.create');
    }

    public function edit(){
        return view('Production.Production_ThreeKnife.edit');
    }

    public function proses(){
        return view('Production.Production_ThreeKnife.proses');
    }

    public function view(){
        return view('Production.Production_ThreeKnife.view');
    }
}
