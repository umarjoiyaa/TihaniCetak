<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductionJobSheet_textController extends Controller
{
    public function index(){
        return view('Production.ProductionJobSheet_text.index');
    }

    public function create(){
        return view('Production.ProductionJobSheet_text.create');
    }
    public function edit(){
        return view('Production.ProductionJobSheet_text.edit');
    }

    public function proses(){
        return view('Production.ProductionJobSheet_text.proses');
    }

    public function view(){
        return view('Production.ProductionJobSheet_text.view');
    }
}
