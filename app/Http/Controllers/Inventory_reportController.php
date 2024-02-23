<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Inventory_reportController extends Controller
{
    public function index(){
        return view("WMS.Invertory_report.index");
    }
}
