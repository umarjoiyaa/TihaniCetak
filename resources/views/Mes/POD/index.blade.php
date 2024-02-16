@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title tx-20 mg-b-0 p-2">LAPORAN PEMERIKSAAN KUALITI - POD (FILE ARTWORK) </h4>
                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('POD.create')}}" class="btn btn-primary mb-2">Create</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mt-2" id="example1">
                            <thead>
                                <tr>
                                    <th rowspan="2">Date.</th>
                                    <th rowspan="2">Time</th>
                                    <th rowspan="2">Sales Order NO</th>
                                    <th rowspan="2">Kod Buku</th>
                                    <th rowspan="2">Tajuk</th>
                                    <th colspan="8" class="text-center">File Artwork</th>
                                    <th colspan="10" class="text-center">First Piece</th>
                                    <th rowspan="2">Status</th>
                                    <th rowspan="2">Action</th>
                                </tr>
                                <tr>
                                    <th>Desgin clearance (5mm)</th>
                                    <th>Image artwork</th>
                                    <th>Bleed</th>
                                    <th>Saiz spine (perfect bind)</th>
                                    <th>Alamat pencetak</th>
                                    <th>Jumlah muka surat</th>
                                    <th>Turutan muka surat</th>
                                    <th>Jenis kertas</th>
                                    <th>Saiz produk</th>
                                    <th>Artwork (gambar, teks)</th>
                                    <th>Design clearance (5mm)</th>
                                    <th>Warna</th>
                                    <th>Jumlah muka surat </th>
                                    <th>Turutan muka surat</th>
                                    <th>Bleed</th>
                                    <th>Crop mark</th>
                                    <th>kedudukan cetakan depan belakang/ print register</th>
                                    <th>Jenis Penjilidan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td>1</td>
                                    <td>30/5/2023</td>
                                    <td>30/5/2023</td>
                                    <td>30/5/2023</td>
                                    <td>SO-001496</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    <td>OK</td>
                                    
                                    <td><span class="badge badge-pill badge-warning w-100 p-3">Checked</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-primary" data-toggle="dropdown"
                                                id="dropdownMenuButton" type="button">Action<i
                                                    class="fas fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item"
                                                    href="{{route('POD.view')}}">View</a>
                                                <a class="dropdown-item"
                                                    href="">Edit</a>
                                                <a class="dropdown-item"
                                                    href="{{route('POD.verify')}}">Verify</a>
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