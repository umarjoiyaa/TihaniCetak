<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanProsesPenjilidanController extends Controller
{
    public function index(){
        return view('Mes.LaporanProsesPenjilidan.index');
    }

    public function view(){
        return view('Mes.LaporanProsesPenjilidan.view');
    }
    public function Create(){
        return view('Mes.LaporanProsesPenjilidan.create');
    }
    public function edit(){
        return view('Mes.LaporanProsesPenjilidan.edit');
    }

    public function verify(){
        return view('Mes.LaporanProsesPenjilidan.verify');
    }
}
