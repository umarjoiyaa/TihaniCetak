<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanProsesPenjilidanSaddleStitchController extends Controller
{
    public function index(){
        return view('Mes.LaporanProsesPenjilidanSaddleStitch.index');
    }

    public function view(){
        return view('Mes.LaporanProsesPenjilidanSaddleStitch.view');
    }
    public function Create(){
        return view('Mes.LaporanProsesPenjilidanSaddleStitch.create');
    }
    public function edit(){
        return view('Mes.LaporanProsesPenjilidanSaddleStitch.edit');
    }

    public function verify(){
        return view('Mes.LaporanProsesPenjilidanSaddleStitch.verify');
    }
}
