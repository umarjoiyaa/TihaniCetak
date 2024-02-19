<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductionJobSheet_PrefecBindController extends Controller
{
    public function index(){
        return view('Production.ProductionJobSheet_PrefecBind.index');
    }

    public function create(){
        return view('Production.ProductionJobSheet_PrefecBind.create');
    }

    public function edit(){
        return view('Production.ProductionJobSheet_PrefecBind.edit');
    }

    public function proses(){
        return view('Production.ProductionJobSheet_PrefecBind.proses');
    }

    public function view(){
        return view('Production.ProductionJobSheet_PrefecBind.view');
    }
}
