<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DigitalPrintingController extends Controller
{
    public function index(){
        return view('Production.DigitalPrinting.index');
    }

    public function create(){
        return view('Production.DigitalPrinting.create');
    }

    public function proses(){
        return view('Production.DigitalPrinting.proses');
    }

    public function view(){
        return view('Production.DigitalPrinting.view');
    }
}
