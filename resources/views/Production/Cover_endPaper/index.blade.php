@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title tx-20 mg-b-0 p-2">PRODUCTION JOBSHEET LIST- COVER & ENDPAPER </h4>
                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('Cover_endPaper.create')}}" class="btn btn-primary mb-2">Create</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mt-2" id="example1">
                            <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Tarikh</th>
                                    <th>Sales Order NO</th>
                                    <th>Pelanggan</th>
                                    <th>Kod Buku</th>
                                    <th>Tajuk</th>
                                    <th>Jenis</th>
                                    <th>Kuantiti</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                               
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td>1</td>
                                    <td>30/5/2023</td>
                                    <td>SO-001496</td>
                                    <td>EDUKID DISTRIBUTORS SDN BHD</td>
                                    <td>CP-2940</td>
                                    <td>BUKU</td>
                                    <td>Cover</td>
                                    <td>5000</td>
                                    <td><span class="badge badge-pill badge-success w-100 p-2 mt-2  ">Completed</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-primary" data-toggle="dropdown"
                                                id="dropdownMenuButton" type="button">Action<i
                                                    class="fas fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item"
                                                    href="{{route('Cover_endPaper.view')}}">View</a>
                                                <a class="dropdown-item"
                                                    href="{{route('Cover_endPaper.edit')}}">Edit</a>
                                                <a class="dropdown-item"
                                                    href="{{route('Cover_endPaper.proses')}}">Proses</a>
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
