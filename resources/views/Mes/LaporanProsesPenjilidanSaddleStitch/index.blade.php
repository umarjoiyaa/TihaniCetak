@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    <div class="d-flex justify-content-between">
                            <h4 class="card-title tx-20 mg-b-0 p-2">LAPORAN PROSES PENJILIDAN (Saddle Stitch)</h4>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                        <a href="{{route('LaporanProsesPenjilidan(SaddleStitch).create')}}" class="btn btn-primary mb-2">Create</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table mt-2" id="example1">
                                <thead>
                                    <tr>
                                        <td>Date</td>
                                        <td>time </td>
                                        <td>Sales Order no.</td>
                                        <td>Kod Buku</td>
                                        <td>Tajuk</td>
                                        <td>Jumlah Seksyen</td>
                                        <td>Saiz</td>
                                        <td>Operator</td>
                                        <td>Pamabantu</td>
                                        <td>Sataus</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td>30/5/2023 </td>
                                        <td style="font-size:11px;">10:00am</td>
                                        <td style="font-size:11px;">SO-001496</td>
                                        <td style="font-size:11px;">CP-2940</td>
                                        <td style="font-size:11px;">IQRO GENIUS - RUMI (NEW COVER)</td>
                                        <td style="font-size:11px;">7</td>
                                        <td style="font-size:11px;">15cmX21cm</td>
                                        <td style="font-size:11px;">A</td>
                                        <td>B</td>
                                        <td><span class="badge badge-pill badge-warning w-100 p-2">In-progress</span></td>
                                        <td><div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                            data-toggle="dropdown" id="dropdownMenuButton" type="button">Action<i class="fas fa-caret-down ml-1"></i></button>
                                            <div  class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('LaporanProsesPenjilidan(SaddleStitch).view')}}">View</a>
                                                <a class="dropdown-item" href="{{route('LaporanProsesPenjilidan.edit')}}">Edit</a>
                                                <a class="dropdown-item" href="{{route('LaporanProsesPenjilidan(SaddleStitch).verify')}}">Verify</a>
                                                <a class="dropdown-item" href="">Delete</a>
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-12">
                       <h5> <b>Notes: </b></h5><br>
                        when creates and save - status show “ Checked” <br>
                        In action verify, user can click “Decline” or “ Verify” <br>
                        if Decline : status change to “Decline” and user can edit again the form <br>
                        if  Verify- status changes to “Verified” [user cannot edit anymore] <br>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    

    

    @endsection

    