@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    <div class="d-flex justify-content-between">
                            <h6 class="card-title tx-20 mg-b-0 p-2"><b>LAPORAN PEMERIKSAAN KUALITI - PROSES PENJILIDAN SADDLE STITCH</b></h6>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                        <a href="{{route('ProsesPenJilidanSaddlestitch.create')}}" class="btn btn-primary mb-2">Create</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table mt-2" id="example1">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Mesin</th>
                                        <th>Sales Order No. </th>
                                        <th>Kod Buku</th>
                                        <th>Tajuk</th>

                                        <th>Kedudukan dawai</th>
                                        <th>Turutan kulit buku/teks</th>
                                        <th>Saiz yang betul</th>
                                        <th>Teks yang betul</th>
                                        <th>Kedudukan potongan</th>
                                        <th>Turutan muka surat</th>
                                        <th>Koyak</th>
                                        <th>Label yang betul</th>
                                        <th>Pematuhan SOP</th>
                                        <th>Sataus</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td>30/5/2023 </td>
                                        <td>10:00 am</td>
                                        <td>F1</td>
                                        <td>SO-001496</td>
                                        <td>CP-2940</td>
                                        <td>IQRO GENIUS - RUMI (NEW COVER)</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td><span class="badge badge-warning">Checked</span></td>
                                        <td><div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                            data-toggle="dropdown" id="dropdownMenuButton" type="button">Action<i class="fas fa-caret-down ml-1"></i></button>
                                            <div  class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('ProsesPenJilidanSaddlestitch.view')}}">View</a>
                                                <a class="dropdown-item" href="{{route('ProsesPenJilidanSaddlestitch.edit')}}">Edit</a>
                                                <a class="dropdown-item" href="{{route('ProsesPenJilidanSaddlestitch.verify')}}">Verify</a>
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

    