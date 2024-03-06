@extends('layouts.app')
@section('css')
<style>
    .card .card{
        width:300px;
        height:250px;
        border-radius:25px;
        margin-left:0px;
        border:1px solid #18002d;
    }
    .card .card p{
        font-size:10px;
        width:150px;
        
    }
    @media screen and (max-width:992px){
        .card .card{
            width:250px;
        }
    }

    @media screen and (max-width:832px){
        .card .card{
            width:230px;
        }
        .card .card p{
            font-size:10px;
            width:130px;
            margin-left:-10px;
        
        }
    }
    @media screen and (max-width:768px){
        .card .card{
            width:300px;
            margin-inline:auto;
        }
        .card .card p{
            font-size:10px;
            width:130px;
        
        }
    }
</style>
@endSection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card" style="">
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
                        <div class="card">
                           
                            <div class="card-body">
                                <span class="badge badge-success mb-3 p-2" style="font-size:20px; margin-top:-50px; border-radius:50%;">C1</span>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6>Title :</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>IQRO GENIUS - RUMI <br> (NEW COVER)</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6>Type :</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Paper</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6>Planned Qty.:</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>5000</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6>prod. Qty.:</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>345</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6 style="font-size:;">Status :</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="badge badge-success">Started</span>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card">
                           
                           <div class="card-body">
                               <span class="badge badge-success mb-3 p-2" style="font-size:20px; margin-top:-50px; border-radius:50%;">C2</span>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Title :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>IQRO GENIUS - RUMI <br> (NEW COVER)</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Type :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>Paper</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Planned Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>5000</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>prod. Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>345</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6 style="font-size:;">Status :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <span class="badge badge-danger">Stopped</span>
                                   </div>
                               </div>
                           </div>                            
                       </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card">
                           
                           <div class="card-body">
                               <span class="badge badge-success mb-3 p-2" style="font-size:20px; margin-top:-50px; border-radius:50%;">C3</span>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Title :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>IQRO GENIUS - RUMI <br> (NEW COVER)</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Type :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>Paper</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Planned Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>5000</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>prod. Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>345</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6 style="font-size:;">Status :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <span class="badge badge-warning">Paused</span>
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
                    <div class="card">
                           
                           <div class="card-body">
                               <span class="badge badge-success mb-3 p-2" style="font-size:20px; margin-top:-50px; border-radius:50%;">P1</span>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Title :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>IQRO GENIUS - RUMI <br> (NEW COVER)</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Type :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>Paper</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Planned Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>5000</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>prod. Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>345</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6 style="font-size:;">Status :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <span class="badge badge-success">Started</span>
                                   </div>
                               </div>
                           </div>                            
                       </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card">
                           
                           <div class="card-body">
                               <span class="badge badge-success mb-3 p-2" style="font-size:20px; margin-top:-50px; border-radius:50%;">P2</span>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Title :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>IQRO GENIUS - RUMI <br> (NEW COVER)</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Type :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>Paper</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Planned Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>5000</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>prod. Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>345</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6 style="font-size:;">Status :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <span class="badge badge-danger">Stopped</span>
                                   </div>
                               </div>
                           </div>                            
                       </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card">
                           
                           <div class="card-body">
                               <span class="badge badge-success mb-3 p-2" style="font-size:20px; margin-top:-50px; border-radius:50%;">P3</span>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Title :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>IQRO GENIUS - RUMI <br> (NEW COVER)</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Type :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>Paper</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Planned Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>5000</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>prod. Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>345</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6 style="font-size:;">Status :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <span class="badge badge-warning">Paused</span>
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
                    <div class="card">
                           
                           <div class="card-body">
                               <span class="badge badge-success mb-3 p-2" style="font-size:20px; margin-top:-50px; border-radius:50%;">F1</span>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Title :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>IQRO GENIUS - RUMI <br> (NEW COVER)</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Type :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>Paper</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Planned Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>5000</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>prod. Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>345</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6 style="font-size:;">Status :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <span class="badge badge-success">Started</span>
                                   </div>
                               </div>
                           </div>                            
                       </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card">
                           
                           <div class="card-body">
                               <span class="badge badge-success mb-3 p-2" style="font-size:20px; margin-top:-50px; border-radius:50%;">F2</span>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Title :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>IQRO GENIUS - RUMI <br> (NEW COVER)</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Type :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>Paper</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Planned Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>5000</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>prod. Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>345</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6 style="font-size:;">Status :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <span class="badge badge-danger">Stopped</span>
                                   </div>
                               </div>
                           </div>                            
                       </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card">
                           
                           <div class="card-body">
                               <span class="badge badge-success mb-3 p-2" style="font-size:20px; margin-top:-50px; border-radius:50%;">F3</span>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Title :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>IQRO GENIUS - RUMI <br> (NEW COVER)</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Type :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>Paper</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Planned Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>5000</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>prod. Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>345</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6 style="font-size:;">Status :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                   <span class="badge badge-warning">Paused</span>
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
                    <div class="card">
                           
                           <div class="card-body">
                               <span class="badge badge-success mb-3 p-2" style="font-size:20px; margin-top:-50px; border-radius:50%;">B1</span>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Title :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>IQRO GENIUS - RUMI <br> (NEW COVER)</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Type :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>Paper</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Planned Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>5000</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>prod. Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>345</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6 style="font-size:;">Status :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <span class="badge badge-success">Started</span>
                                   </div>
                               </div>
                           </div>                            
                       </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card">
                           
                           <div class="card-body">
                               <span class="badge badge-success mb-3 p-2" style="font-size:20px; margin-top:-50px; border-radius:50%;">B2</span>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Title :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>IQRO GENIUS - RUMI <br> (NEW COVER)</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Type :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>Paper</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Planned Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>5000</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>prod. Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>345</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6 style="font-size:;">Status :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                        <span class="badge badge-danger">Stopped</span>
                                   </div>
                               </div>
                           </div>                            
                       </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card">
                           
                           <div class="card-body">
                               <span class="badge badge-success mb-3 p-2" style="font-size:20px; margin-top:-50px; border-radius:50%;">B3</span>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Title :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>IQRO GENIUS - RUMI <br> (NEW COVER)</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Type :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>Paper</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Planned Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>5000</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>prod. Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>345</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6 style="font-size:;">Status :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                        <span class="badge badge-warning">Paused</span>
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
                    <div class="card">
                           
                           <div class="card-body">
                               <span class="badge badge-success mb-3 p-2" style="font-size:20px; margin-top:-50px; border-radius:10px;">3KNIFE1</span>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Title :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>IQRO GENIUS - RUMI <br> (NEW COVER)</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Type :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>Paper</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Planned Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>5000</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>prod. Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>345</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6 style="font-size:;">Status :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <span class="badge badge-success">Started</span>
                                   </div>
                               </div>
                           </div>                            
                       </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card">
                           
                           <div class="card-body">
                               <span class="badge badge-success mb-3 p-2" style="font-size:20px; margin-top:-50px; border-radius:10px;">3KNIFE2</span>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Title :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>IQRO GENIUS - RUMI <br> (NEW COVER)</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Type :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>Paper</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>Planned Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>5000</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6>prod. Qty.:</h6>
                                   </div>
                                   <div class="col-sm-6">
                                       <p>345</p>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <h6 style="font-size:;">Status :</h6>
                                   </div>
                                   <div class="col-sm-6">
                                   <span class="badge badge-danger">Stopped</span>
                                   </div>
                               </div>
                           </div>                            
                       </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            
                            <div class="card-body">
                                <span class="badge badge-success mb-3 p-2" style="font-size:20px; margin-top:-50px; border-radius:10px;">3KNIFE3</span>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6>Title :</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>IQRO GENIUS - RUMI <br> (NEW COVER)</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6>Type :</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Paper</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6>Planned Qty.:</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>5000</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6>prod. Qty.:</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>345</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6 style="font-size:;">Status :</h6>
                                    </div>
                                    <div class="col-sm-6">
                                    <span class="badge badge-warning">Pause</span>
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