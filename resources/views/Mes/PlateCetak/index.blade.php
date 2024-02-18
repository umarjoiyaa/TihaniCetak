@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title tx-20 mg-b-0 p-2">REKOD PEMERIKSAAN PLATE CETAK </h4>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{route('PlateCetak.create')}}" class="btn btn-primary mb-2">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table mt-2" border="1" id="example1">
                        <thead>
                            <tr>
                                <td>sr</td>
                                <td rowspan="2">Tarikh.</td>
                                <td rowspan="2">Masa</td>
                                <td rowspan="2">Sales Order No.</td>
                                <td rowspan="2">Tajuk Buku</td>
                                <td rowspan="2">Kod Buku</td>
                                <td rowspan="2">Mesin</td>
                                <td rowspan="2">Seksyen</td>
                                <td colspan="2" class="text-center">Bahagian Plate </td>
                                <td colspan="6" class="text-center">Warna</td>
                                <td rowspan="2">Gripper</td>
                                <td rowspan="2">Spacing</td>
                                <td rowspan="2">Kedudukan Image/gambar</td>
                                <td rowspan="2">Calar</td>
                                <td rowspan="2">Kotor</td>
                                <td rowspan="2">Lain-lain (nyatakan)</td>
                                <td rowspan="2">Diperiksa oleh</td>
                                <td rowspan="2">status</td>
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

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td>1</td>
                                <td>12/12/2023</td>
                                <td>11:35 am</td>
                                <td>SO-001496</td>
                                <td>Tajuk Buku Search IQRO GENIUS - RUMI (NEW COVER)</td>
                                <td>CP-2940</td>
                                <td>P4</td>
                                <td>1</td>
                                <td><i class="fa fa-check"></i></td>
                                <td></td>
                                <td><i class="fa fa-check"></td>
                                <td><i class="fa fa-check"></td>
                                <td><i class="fa fa-check"></td>
                                <td><i class="fa fa-check"></td>
                                <td></td>
                                <td></td>
                                <td>28</td>
                                <td>8</td>
                                <td>87</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Admin</td>

                                <td><span class="badge badge-pill badge-warning w-100 p-2">Checked</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true"
                                            class="btn ripple btn-primary" data-toggle="dropdown"
                                            id="dropdownMenuButton" type="button">Action<i
                                                class="fas fa-caret-down ml-1"></i></button>
                                        <div class="dropdown-menu tx-13">
                                            <a class="dropdown-item" href="{{route('PlateCetak.view')}}">View</a>
                                            <a class="dropdown-item" href="">Edit</a>
                                            <a class="dropdown-item" href="{{route('PlateCetak.verify')}}">Verify</a>
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
    </div>
</div>





@endsection