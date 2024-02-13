<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProsesPenJilidanPrefectBindController extends Controller
{
    public function index(){
        return view('Mes.ProsesPenJilidanPrefectBind.index');
    }

    public function create(){
        return view('Mes.ProsesPenJilidanPrefectBind.create');
    }

    public function view(){
        return view('Mes.ProsesPenJilidanPrefectBind.view');
    }

    public function verify(){
        return view('Mes.ProsesPenJilidanPrefectBind.verify');
    }
}
