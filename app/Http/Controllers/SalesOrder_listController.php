<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesOrder_listController extends Controller
{
    public function index(){
        return view('Mes.SalesOrderList.index');
    }
    public function view(){
        return view('Mes.SalesOrderList.view');
    }
    public function upload(){
        return view('Mes.SalesOrderList.upload');
    }
    public function approve(){
        return view('Mes.SalesOrderList.approve');
    }
    public function publish(){
        return view('Mes.SalesOrderList.publish');
    }
}
