<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Subcon_monitorimg_report_Controller extends Controller
{
    public function index(){
        return view("WMS.Sub_monitring_report.index");
    }
}
