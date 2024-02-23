<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallForAssistanceController extends Controller
{
    public function index(){
        return view('Production.CallForAssistance.index');
    }

    public function edit(){
        return view('Production.CallForAssistance.edit');
    }

    public function view(){
        return view('Production.CallForAssistance.view');
    }
}
