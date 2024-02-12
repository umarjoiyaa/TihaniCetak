<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanProsesThreeKnifeController extends Controller
{
    public function index(){
        return view('Mes.LaporanProsesThreeKnife.index');
    }

    public function view(){
        return view('Mes.LaporanProsesThreeKnife.view');
    }
    public function Create(){
        return view('Mes.LaporanProsesThreeKnife.create');
    }
    public function edit(){
        return view('Mes.LaporanProsesThreeKnife.edit');
    }

    public function verify(){
        return view('Mes.LaporanProsesPenjilidanSaddleStitch.verify');
    }
}
