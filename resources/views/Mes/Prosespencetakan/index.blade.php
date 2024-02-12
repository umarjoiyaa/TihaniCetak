@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title tx-20 mg-b-0 p-2">LAPORAN PEMERIKSAAN KUALITI (PROSES PENCETAKAN) </h4>
                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('Prosespencetakan.create')}}" class="btn btn-primary mb-2">Create</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table mt-2" border="1" id="example1">
                            <thead>
                                <tr>
                                    <td>sr</td>
                                    <td>Tarikh.</td>
                                    <td>Masa</td>
                                    <td>Mesin</td>
                                    <td>Sales Order No. </td>
                                    <td>Kod Buku</td>
                                    <td>Tajuk</td>
                                    <td>Artwork</td>
                                    <td>Turutan muka surat </td>
                                    <td>Kedudukan muka surat</td>
                                    <td>Saiz spine</td>
                                    <td>Kedudukan nombor muka surat</td>
                                    <td>Bleed (5mm)</td>
                                    <td>Warna</td>
                                    <td>Kedudukan warna</td>
                                    <td>Kedudukan Cetakan</td>
                                    <td>Periksa powder</td>
                                    <td>Minyak</td>
                                    <td>Kotor</td>
                                    <td>Doubling</td>
                                    <td>Hickies</td>
                                    <td>Frontlay & sidelay</td>
                                    <td>Gambar/teks hilang</td>
                                    <td>Pematuhan SOP</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                               
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td>30/5/2023</td>
                                    <td>10:00am</td>
                                    <td>P1</td>
                                    <td>SO-001496</td>
                                    <td>SO-001496</td>
                                    <td>CP-2940</td>
                                    <td>IQRO GENIUS - RUMI (NEW COVER)</td>
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
                                    <td><span
                                            style="background:yellow; padding:5px; border:1px solid yellow; border-radius:5px; font-size:13px;">Checked</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-primary" data-toggle="dropdown"
                                                id="dropdownMenuButton" type="button">Action<i
                                                    class="fas fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('Prosespencetakan.view')}}">View</a>
                                                <a class="dropdown-item" href="">Edit</a>
                                                <a class="dropdown-item" href="{{route('Prosespencetakan.verify')}}">Verify</a>
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