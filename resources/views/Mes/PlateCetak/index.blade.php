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
                    <h4 class="card-title tx-20 mg-b-0 p-2"><b>REKOD PEMERIKSAAN PLATE CETAK </b></h4>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{route('plate_cetak.create')}}" class="btn btn-primary mb-2">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table datatable text-center table-bordered mt-2" border="1" id="example1">
                        <thead>
                            <tr>
                                <td rowspan="2" class="text-left">Sr.</td>
                                <td rowspan="2" class="text-left">Masa</td>
                                <td rowspan="2" class="text-left">Sales Order No.</td>
                                <td rowspan="2" class="text-left">Tajuk Buku</td>
                                <td rowspan="2" class="text-left">Kod Buku</td>
                                <td rowspan="2" class="text-left">Mesin</td>
                                <td rowspan="2" class="text-left">Seksyen</td>
                                <td colspan="3" class="text-center">Bahagian Plate </td>
                                <td colspan="6" class="text-center">Warna</td>
                                <td rowspan="2" class="text-left">Gripper</td>
                                <td rowspan="2" class="text-left">Spacing</td>
                                <td rowspan="2" class="text-left">Kedudukan Image/gambar</td>
                                <td rowspan="2" class="text-left">Calar</td>
                                <td rowspan="2" class="text-left">Kotor</td>
                                <td rowspan="2" class="text-left">PEMERIKSAAN ARTWORK (UNTUK CETAKAN YANG MELEBIHI 1 UP)</td>
                                <td rowspan="2" class="text-left">Diperiksa oleh</td>
                                <td rowspan="2" class="text-left">status</td>
                                <td rowspan="2" class="text-left">Action</td>
                            </tr>
                            <tr>
                                <th class="text-left">A</th>
                                <th class="text-left">B</th>
                                <th class="text-left">A/B</th>
                                <th class="text-left">C</th>
                                <th class="text-left">M</th>
                                <th class="text-left">Y</th>
                                <th class="text-left">K</th>
                                <th class="text-left">P1</th>
                                <th class="text-left">P2</th>
                            </tr>
                            <tr>
                                <th></th>


                                <th>
                                    <input type="text" class="all_column" placeholder="search masa">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search sale order no">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search tajuk buku">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search kod buku">
                                </th>

                                <th>
                                    <input type="text" class="all_column" placeholder="search mesin">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search seksyen">
                                </th>
                                <th colspan="3" style="background-color: #E8E7EF"></th>
                                <th colspan="6" style="background-color: #E8E7EF"></th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search gripper">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search spacing">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search kedudukan image/gambar">
                                </th>
                                <th style="background-color: #E8E7EF"></th>
                                <th style="background-color: #E8E7EF"></th>
                                <th style="background-color: #E8E7EF">

                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search diperiksa oleh">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search status">
                                </th>





                                <th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr class="">
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
        var data = "{{ route('plate_cetak.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/mes/PlateCetak/index.js') }}"></script>
@endpush
