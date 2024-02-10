@extends('app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    <div class="d-flex justify-content-between">
                            <h4 class="card-title tx-20 mg-b-0 p-2">Laporan Pemeriksaan AKHIR,PEMBUNGKUSAN DAN PENGHANTARAN KE STORE</h4>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                        <a href="{{route('Laporan_Pemeriksaan.create')}}" class="btn btn-primary mb-2">Create User</a>
                        </div>
                    
                        <table class="table mt-2" id="example1">
                            <thead>
                                <tr>
                                    <td>Tarikh.</td>
                                    <td>Sales Order No </td>
                                    <td>Kod Buku</td>
                                    <td>Tajuk</td>
                                    <td>Operator</td>
                                    <td>kuantiti</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>30/5/2023</td>
                                    <td>SO-001496</td>
                                    <td>CP 2940</td>
                                    <td>IQRO'S GENIUS - RUMI(NEW COVER)</td>
                                    <td>ABCD</td>
                                    <td>1440</td>
                                    <td><span style="background:yellow; padding:6px; border:1px solid yellow; border-radius:5px;">Not-initiated</span></td>
                                    <td><div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                        data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                        <div  class="dropdown-menu tx-13">
                                            <a class="dropdown-item" href="#">View</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                            <a class="dropdown-item" href="{{route('stock_Transfer_location.receive')}}">Receive</a>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

       <div class="row">
        <div class="col-md-2">
            <p style="color:golden;">
                <span>Notes:</span><br>
                Production sending Item to store
            </p>
        </div>
       </div>
    @endsection