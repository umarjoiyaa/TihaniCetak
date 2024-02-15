<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductionJobSheet_StapleBINDController extends Controller
{
    public function index(){
        return view('Production.ProductionJobSheet_StapleBIND.index');
    }

    public function create(){
        return view('Production.ProductionJobSheet_StapleBIND.create');
    }

    public function proses(){
        return view('Production.ProductionJobSheet_StapleBIND.proses');
    }

    public function view(){
        return view('Production.ProductionJobSheet_StapleBIND.view');
    }
}
