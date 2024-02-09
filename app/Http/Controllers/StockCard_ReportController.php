<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockCard_ReportController extends Controller
{
    public function index(){
        return view("WHM.StockcardReporting.index");
    }
}
