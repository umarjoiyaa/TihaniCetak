@extends('layouts.app')

@section('css')
    <style>
        .dropdownwidth {
            width: 100px;
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
                        <h4 class="card-title tx-20 mg-b-0 p-2">REKOD PEMERIKSAAN PLATE CETAK </h4>
                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('plate_cetak.create') }}" class="btn btn-primary mb-2">Create</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table datatable text-center table-bordered mt-2" border="1">
                            <thead>
                                <tr>
                                    <td rowspan="2">Sr.</td>
                                    <td rowspan="2">Tarikh</td>
                                    <td rowspan="2">Masa</td>
                                    <td rowspan="2">Sales Order No.</td>
                                    <td rowspan="2">Tajuk Buku</td>
                                    <td rowspan="2">Kod Buku</td>
                                    <td rowspan="2">Mesin</td>
                                    <td rowspan="2">Seksyen</td>
                                    <td colspan="3" class="text-center">Bahagian Plate </td>
                                    <td colspan="6" class="text-center">Warna</td>
                                    <td rowspan="2" class="text-left">Gripper</td>
                                    <td rowspan="2" class="text-left">Spacing</td>
                                    <td rowspan="2" class="text-left">Kedudukan Image/gambar</td>
                                    <td rowspan="2" class="text-left">Calar</td>
                                    <td rowspan="2" class="text-left">Kotor</td>
                                    <td rowspan="2" class="text-left">PEMERIKSAAN ARTWORK (UNTUK CETAKAN YANG MELEBIHI 1
                                        UP)</td>
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
                            </thead>
                            <thead>
                                <tr>
                                    <th></th>


                                    <th>
                                        <input type="text" class="all_column" placeholder="search tarikh">
                                    </th>

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
                                    <th colspan="3" style="background-color: #E8E7EF">

                                    </th>
                                    <th colspan="6" style="background-color: #E8E7EF">

                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search gripper">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search spacing">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column"
                                            placeholder="search kedudukan image/gambar">
                                    </th>
                                    <th style="background-color: #E8E7EF">

                                    </th>
                                    <th style="background-color: #E8E7EF">

                                    </th>
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
