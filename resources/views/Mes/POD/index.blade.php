@extends('layouts.app')

@section('css')
<style>
    .dropdownwidth{
        width:100px;
    }
    table thead th {
            text-align: center;
        }
</style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title tx-20 mg-b-0 p-2">LAPORAN PEMERIKSAAN KUALITI - POD </h4>
                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('pod.create')}}" class="btn btn-primary mb-2">Create</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table datatable table-striped mt-2" id="example1">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-left">Date</th>
                                    <th rowspan="2" class="text-left">Time</th>
                                    <th rowspan="2" class="text-left">Sales Order NO</th>
                                    <th rowspan="2" class="text-left">Kod Buku</th>
                                    <th rowspan="2" class="text-left">Tajuk</th>
                                    <th colspan="7" class="text-center">File Artwork</th>
                                    <th colspan="11" class="text-center">First Piece</th>
                                    <th rowspan="2" class="text-left">Status</th>
                                    <th rowspan="2" class="text-left">Action</th>
                                </tr>
                                <tr>
                                    <th class="text-left">Design clearance (5mm)</th>
                                    <th class="text-left">Image artwork</th>
                                    <th class="text-left">Bleed</th>
                                    <th class="text-left">Saiz spine (perfect bind)</th>
                                    <th class="text-left">Alamat pencetak</th>
                                    <th class="text-left">Jumlah muka surat</th>
                                    <th class="text-left">Turutan muka surat</th>
                                    <th class="text-left">Jenis kertas</th>
                                    <th class="text-left">Saiz produk</th>
                                    <th class="text-left">Artwork (gambar, teks)</th>
                                    <th class="text-left">Design clearance (5mm)</th>
                                    <th class="text-left">Warna</th>
                                    <th class="text-left">Jumlah muka surat</th>
                                    <th class="text-left">Turutan muka surat</th>
                                    <th class="text-left">Bleed</th>
                                    <th class="text-left">Crop mark</th>
                                    <th class="text-left">Kedudukan cetakan depan  belakang / print register</th>
                                    <th class="text-left">Jenis penjilidan</th>
                                </tr>
                                <tr>
                                    <th><input type="text" class="all_column" placeholder="search date"></th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search time">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search sale order no">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search kod buku">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search tajuk">
                                    </th>

                                    <th>
                                        <input type="text" class="all_column" placeholder="search format file">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search saiz produk">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search bleed">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search saiz spine">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search alamat pencetak">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search jumlah muka surat">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search turutan muka surat">
                                    </th>

                                    <th>
                                        <input type="text" class="all_column" placeholder="search jenis kertasn">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search saiz produk">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search artwork (gambar, teks)">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search design clearance (5mm)">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search warna">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search jumlah muka surat">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search turutan muka surat">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search bleed">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search crop mark">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search kedudukan cetakan depan belakang / print register">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search jenis penjilidan">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search status">
                                    </th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr class="">
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

                                    <td><span class="badge badge-pill badge-warning w-100 p-2">checked</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-primary" data-toggle="dropdown"
                                                id="dropdownMenuButton" type="button">Action<i
                                                    class="fas fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item"
                                                    href="{{route('Ctp.view')}}">View</a>
                                                <a class="dropdown-item"
                                                    href="{{route('Ctp.edit')}}">Edit</a>
                                                <a class="dropdown-item"
                                                    href="{{route('Ctp.verify')}}">Verify</a>
                                                <a class="dropdown-item" href="">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>





@endsection
@push('custom-scripts')
    <script>
        var data = "{{ route('pod.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/mes/Pod/index.js') }}"></script>
@endpush
