@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title tx-20 mg-b-0 p-2">LAPORAN PROSES LIPAT</h4>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('laporan_proses_lipat.create') }}" class="btn btn-primary mb-2">Create</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable mt-2">
                                <thead>
                                    <tr>
                                        <td>Sr.</td>
                                        <td>Date</td>
                                        <td>Time</td>
                                        <td>Mesin</td>
                                        <td>Sales Order NO</td>
                                        <td>Kod Buku</td>
                                        <td>Tajuk</td>
                                        <td>Operator</td>
                                        <td>Sataus</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search date">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search time">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search mesin">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search sale order no">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search kod_buku">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search tajuk">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search operator">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search status">
                                        </th>
                                        <th></th>
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
    </div>
@endsection
@push('custom-scripts')
    <script>
        var data = "{{ route('laporan_proses_lipat.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/mes/LaporanProsesLipat/index.js') }}"></script>
@endpush