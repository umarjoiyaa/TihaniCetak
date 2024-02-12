@extends('app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    <div class="d-flex justify-content-between">
                            <h4 class="card-title tx-20 mg-b-0 p-2">LAPORAN PROSES PENJILIDAN (PERFECT BIND)</h4>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                        <a href="{{route('LaporanProsesPenjilidan.create')}}" class="btn btn-primary mb-2">Create</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table mt-2" id="example1">
                                <thead>
                                    <tr>
                                        <td style="font-size:13px;">Tarikh</td>
                                        <td style="font-size:13px;">Sales Order No. </td>
                                        <td style="font-size:13px;">Kod Buku</td>
                                        <td style="font-size:13px;">Tajuk</td>
                                        <td style="font-size:13px;">Jumlah Seksyen</td>
                                        <td style="font-size:13px;">Jenis Penjilidan</td>
                                        <td style="font-size:13px;">Operator</td>
                                        <td style="font-size:13px;">Pamabantu</td>
                                        <td style="font-size:13px;">Sataus</td>
                                        <td style="font-size:13px;">Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td>30/5/2023 </td>
                                        <td style="font-size:11px;">SO-001496</td>
                                        <td style="font-size:11px;">CP-2940</td>
                                        <td style="font-size:11px;">IQRO GENIUS - RUMI (NEW COVER)</td>
                                        <td style="font-size:11px;">7</td>
                                        <td style="font-size:11px;">15cmX21cm</td>
                                        <td style="font-size:11px;">A</td>
                                        <td style="font-size:11px;">B</td>
                                        <td><span style="background:yellow; padding:5px; border:1px solid yellow; border-radius:5px; font-size:5px;">in-Progress</span></td>
                                        <td><div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                            data-toggle="dropdown" id="dropdownMenuButton" type="button">Action<i class="fas fa-caret-down ml-1"></i></button>
                                            <div  class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('LaporanProsesPenjilidan.view')}}">View</a>
                                                <a class="dropdown-item" href="{{route('LaporanProsesPenjilidan.edit')}}">Edit</a>
                                                <a class="dropdown-item" href="{{route('LaporanProsesPenjilidan.verify')}}">Verify</a>
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

    