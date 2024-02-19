<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductionJobSheet_MesinLipatController extends Controller
{
    public function index(){
        return view('Production.ProductionJobSheet_MesinLipat.index');
    }

    public function create(){
        return view('Production.ProductionJobSheet_MesinLipat.create');
    }

    public function edit(){
        return view('Production.ProductionJobSheet_MesinLipat.edit');
    }

    public function proses(){
        return view('Production.ProductionJobSheet_MesinLipat.proses');
    }

    public function view(){
        return view('Production.ProductionJobSheet_MesinLipat.view');
    }
}
