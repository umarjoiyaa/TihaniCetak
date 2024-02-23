<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintingProcess_TextController extends Controller
{
    public function index(){
        return view('Production.PrintingProcess_Text.index');
    }
    public function edit(){
        return view('Production.PrintingProcess_Text.edit');
    }
}
