<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductionJobSheet_textController extends Controller
{
    public function index(){
        return view('Production.Text.index');
    }

    public function create(){
        return view('Production.Text.create');
    }
    public function edit(){
        return view('Production.Text.edit');
    }

    public function proses(){
        return view('Production.Text.proses');
    }

    public function view(){
        return view('Production.Text.view');
    }
}
