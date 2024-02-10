<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Manage_TransferController extends Controller
{
    public function index(){
        return view('WHM.Manage_transfer.index');
    }
    public function create(){
        return view('WHM.Manage_transfer.create');
    }
}
