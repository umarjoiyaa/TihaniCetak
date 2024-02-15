<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorangeSerahKerja_TeksController extends Controller
{
    public function index(){
        return view('Production.BorangeSerahKerja_Teks.index');
    }

    public function create(){
        return view('Production.BorangeSerahKerja_Teks.create');
    }

    public function view(){
        return view('Production.BorangeSerahKerja_Teks.view');
    }

    public function verify(){
        return view('Production.BorangeSerahKerja_Teks.verify');
    }
}
