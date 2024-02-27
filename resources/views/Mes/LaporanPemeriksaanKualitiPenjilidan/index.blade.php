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
                            <h4 class="card-title tx-20 mg-b-0 p-2">LAPORAN PEMERIKSAAN KUALITI - PROSES PENJILIDAN PERFECT
                                BIND</h4>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('laporan_pemeriksaan_kualiti_penjilidan.create') }}" class="btn btn-primary mb-2">Create</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable mt-2">
                                <thead>
                                    <tr>
                                        <td>sr</td>
                                        <td>Date</td>
                                        <td>Time</td>
                                        <td>Mesin</td>
                                        <td>Sales Order No. </td>
                                        <td>Kod Buku</td>
                                        <td>Tajuk</td>
                                        <td>Koyakan fiber</td>
                                        <td>Kedudukan Kulit buku dan teks</td>
                                        <td>Kulit buku yang betul</td>
                                        <td>Teks yang betul</td>
                                        <td>Kedudukan gam</td>
                                        <td>Turutan muka surat</td>
                                        <td>Koyak</td>
                                        <td>Kotor</td>
                                        <td>Pematuhan SOP</td>
                                        <td>Status</td>
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
                                            <input type="text" class="all_column" placeholder="search Koyakan fiber">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kedudukan Kulit buku dan teks">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kulit buku yang betul">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Teks yang betul">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kedudukan gam">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Turutan muka surat">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Koyak">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kotor">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Pematuhan SOP">
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
        var data = "{{ route('laporan_pemeriksaan_kualiti_penjilidan.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/mes/LaporanPemeriksaanKualitiPenjilidan/index.js') }}"></script>
@endpush
