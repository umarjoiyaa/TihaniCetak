<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProsesPemotonganKulitBukuController extends Controller
{
    public function index(){
        return view('Mes.ProsesPemotonganKulitBuku.index');
    }
    public function create(){
        return view('Mes.ProsesPemotonganKulitBuku.create');
    }
    public function view(){
        return view('Mes.ProsesPemotonganKulitBuku.view');
    }
    public function verify(){
        return view('Mes.ProsesPemotonganKulitBuku.verify');
    }
}
