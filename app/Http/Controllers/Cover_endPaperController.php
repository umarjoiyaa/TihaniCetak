<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cover_endPaperController extends Controller
{
    public function index(){
        return view('Production.Cover_endPaper.index');
    }

    public function create(){
        return view('Production.Cover_endPaper.create');
    }
    public function edit(){
        return view('Production.Cover_endPaper.edit');
    }

    public function proses(){
        return view('Production.Cover_endPaper.proses');
    }

    public function view(){
        return view('Production.Cover_endPaper.view');
    }
}
