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
                <div class="card ">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title tx-20 mg-b-0 p-2">LAPORAN PEMERIKSAAN KUALITI - PROSES LIPAT </h4>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('laporan_pemeriksaan_kualiti.create') }}" class="btn btn-primary mb-2">Create</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable mt-2">
                                <thead>
                                    <tr>
                                        <td class="text-left">sr</td>
                                        <td class="text-left">Date</td>
                                        <td class="text-left">Time</td>
                                        <td class="text-left">Mesin</td>
                                        <td class="text-left">Sales Order No. </td>
                                        <td class="text-left">Kod Buku</td>
                                        <td class="text-left">Tajuk</td>
                                        <td class="text-left">Jenis Lipatan</td>
                                        <td class="text-left">Kedudukan Lipatan</td>
                                        <td class="text-left">Turutan muka surat</td>
                                        <td class="text-left">Koyak</td>
                                        <td class="text-left">Kotor</td>
                                        <td class="text-left">Kedut</td>
                                        <td class="text-left">Pematuhan SOP</td>
                                        <td class="text-left">Status</td>
                                        <td class="text-left">Action</td>
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
                                            <input type="text" class="all_column" placeholder="search jenis lipat">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kedudukan">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Turutan">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Koyak">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kotor">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kedut">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Pematuhan">
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
@endsection
@push('custom-scripts')
    <script>
        var data = "{{ route('laporan_pemeriksaan_kualiti.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/mes/LaporanPemeriksaanKualiti/index.js') }}"></script>
@endpush
