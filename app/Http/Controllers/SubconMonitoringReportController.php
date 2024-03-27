<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubconMonitoringReportController extends Controller
{
    public function index(){
        if (!Auth::user()->hasPermissionTo('SUBCON MONITORING REPORT View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        return view("WMS.SubconMonitoringReport.index");
    }
}
