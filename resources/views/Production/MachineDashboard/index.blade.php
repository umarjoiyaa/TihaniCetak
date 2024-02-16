@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3><b>Machine Dashboard</b></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background:#330252;">
                <div class="card-header">
                    <div class="text-center">
                        <h2><b>Machine Status</b></h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 style="background:#fff;  padding-left:30px;"><b>Cutting</b></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width:200px; height:160px; margin-left:100px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 ><b>C1</b></h6>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Title:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">IQRO GENIUS - RUMI (NEW COVER)</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Type:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">paper</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:8px;">Planned QTy.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">5000</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Prod QTY.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">345</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px; color:black; font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Status:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:11px;"  class="badge badge-success">Started</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width:200px; height:160px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 ><b>C2</b></h6>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Title:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">IQRO GENIUS - RUMI (NEW COVER)</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Type:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">paper</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:8px;">Planned QTy.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">5000</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Prod QTY.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">345</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px; color:black; font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Status:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:11px;"  class="badge badge-danger">Stoped</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width:200px; height:160px; margin-left:-100px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 ><b>C3</b></h6>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Title:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">IQRO GENIUS - RUMI (NEW COVER)</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Type:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">paper</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:8px;">Planned QTy.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">5000</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Prod QTY.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">345</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px; color:black; font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Status:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:11px;"  class="badge badge-warning">Paused</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4 style="background:#fff;  padding-left:30px;"><b>Printing</b></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width:200px; height:160px; margin-left:100px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 ><b>p1</b></h6>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Title:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">IQRO GENIUS - RUMI (NEW COVER)</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Type:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">paper</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:8px;">Planned QTy.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">5000</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Prod QTY.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">345</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px; color:black; font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Status:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:11px;"  class="badge badge-success">Started</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width:200px; height:160px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 ><b>P2</b></h6>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Title:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;" class="p-0 m-0">IQRO GENIUS - RUMI (NEW COVER)</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Type:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">paper</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:8px;">Planned QTy.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">5000</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Prod QTY.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">345</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px; color:black; font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Status:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:11px;"  class="badge badge-danger">Stoped</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width:200px; height:160px; margin-left:-100px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 ><b>P3</b></h6>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Title:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">IQRO GENIUS - RUMI (NEW COVER)</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Type:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">paper</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:8px;">Planned QTy.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">5000</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Prod QTY.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">345</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px; color:black; font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Status:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:11px;"  class="badge badge-warning">Paused</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4 style="background:#fff;  padding-left:30px;"><b>Folding</b></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width:200px; height:160px; margin-left:100px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 ><b>F1</b></h6>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Title:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">IQRO GENIUS - RUMI (NEW COVER)</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Type:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">paper</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:8px;">Planned QTy.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">5000</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Prod QTY.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">345</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px; color:black; font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Status:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:11px;"  class="badge badge-success">Started</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width:200px; height:160px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 ><b>F2</b></h6>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Title:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">IQRO GENIUS - RUMI (NEW COVER)</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Type:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">paper</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:8px;">Planned QTy.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">5000</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Prod QTY.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">345</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px; color:black; font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Status:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:11px;"  class="badge badge-danger">Stoped</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width:200px; height:160px; margin-left:-100px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 ><b>F3</b></h6>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Title:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">IQRO GENIUS - RUMI (NEW COVER)</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Type:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">paper</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:8px;">Planned QTy.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">5000</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Prod QTY.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">345</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px; color:black; font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Status:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:11px;"  class="badge badge-warning">Paused</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                            <h4 style="background:#fff;  padding-left:30px;"><b>Binding</b></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width:200px; height:160px; margin-left:100px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 ><b>B1</b></h6>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Title:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">IQRO GENIUS - RUMI (NEW COVER)</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Type:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">paper</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:8px;">Planned QTy.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">5000</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Prod QTY.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">345</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px; color:black; font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Status:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:11px;"  class="badge badge-success">Started</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width:200px; height:160px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 ><b>B2</b></h6>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Title:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">IQRO GENIUS - RUMI (NEW COVER)</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Type:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">paper</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:8px;">Planned QTy.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">5000</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Prod QTY.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">345</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px; color:black; font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Status:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:11px;"  class="badge badge-danger">Stoped</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width:200px; height:160px; margin-left:-100px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 ><b>B3</b></h6>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Title:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">IQRO GENIUS - RUMI (NEW COVER)</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Type:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">paper</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:8px;">Planned QTy.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">5000</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Prod QTY.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">345</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px; color:black; font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Status:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:11px;"  class="badge badge-warning">Paused</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <h4 style="background:#fff;  padding-left:30px;"><b>3 knife</b></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width:200px; height:160px; margin-left:100px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 ><b>3knife1</b></h6>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Title:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">IQRO GENIUS - RUMI (NEW COVER)</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Type:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">paper</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:8px;">Planned QTy.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">5000</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Prod QTY.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">345</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px; color:black; font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Status:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:11px;"  class="badge badge-success">Started</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width:200px; height:160px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 ><b>3knife2</b></h6>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Title:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">IQRO GENIUS - RUMI (NEW COVER)</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Type:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">paper</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:8px;">Planned QTy.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">5000</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Prod QTY.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">345</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px; color:black; font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Status:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:11px;"  class="badge badge-danger">Stoped</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width:200px; height:160px; margin-left:-100px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 ><b>3knife3</b></h6>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Title:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">IQRO GENIUS - RUMI (NEW COVER)</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Type:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">paper</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:8px;">Planned QTy.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">5000</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-8px;color:black;font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Prod QTY.:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:8px;">345</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-5px; color:black; font-weight:bold;">
                                        <div class="col-md-5">
                                            <span style="font-size:10px;">Status:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <span style="font-size:11px;"  class="badge badge-warning">Paused</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection