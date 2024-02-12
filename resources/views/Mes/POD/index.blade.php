@extends('app')

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
                        <table class="table mt-2" id="example1">
                            <thead>
                                <tr>
                                    <td rowspan="2">Date.</td>
                                    <td rowspan="2">Time</td>
                                    <td rowspan="2">Sales Order NO</td>
                                    <td rowspan="2">Kod Buku</td>
                                    <td rowspan="2">Tajuk</td>
                                    <td colspan="8" class="text-center">File Artwork</td>
                                    <td colspan="10" class="text-center">First Piece</td>
                                    <td rowspan="2">Status</td>
                                    <td rowspan="2">Action</td>
                                </tr>
                                <tr>
                                    <td>Desgin clearance (5mm)</td>
                                    <td>Image artwork</td>
                                    <td>Bleed</td>
                                    <td>Saiz spine (perfect bind)</td>
                                    <td>Alamat pencetak</td>
                                    <td>Jumlah muka surat</td>
                                    <td>Turutan muka surat</td>
                                    <td>Jenis kertas</td>
                                    <td>Saiz produk</td>
                                    <td>Artwork (gambar, teks)</td>
                                    <td>Design clearance (5mm)</td>
                                    <td>Warna</td>
                                    <td>Jumlah muka surat </td>
                                    <td>Turutan muka surat</td>
                                    <td>Bleed</td>
                                    <td>Crop mark</td>
                                    <td>kedudukan cetakan depan belakang/ print register</td>
                                    <td>Jenis Penjilidan</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td>1</td>
                                    <td>30/5/2023</td>
                                    <td>30/5/2023</td>
                                    <td>30/5/2023</td>
                                    <td>SO-001496</td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    
                                    <td><span
                                            style="background:yellow; padding:5px; border:1px solid yellow; border-radius:5px; font-size:5px;">Checked</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-primary" data-toggle="dropdown"
                                                id="dropdownMenuButton" type="button">Action<i
                                                    class="fas fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item"
                                                    href="">View</a>
                                                <a class="dropdown-item"
                                                    href="">Edit</a>
                                                <a class="dropdown-item"
                                                    href="}}">Verify</a>
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