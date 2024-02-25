@extends('layouts.app')

@section('css')
<style>
    .dropdownwidth{
        width:100px;
    }
</style>
@endsection
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title tx-20 mg-b-0 p-2">LAPORAN PEMERIKSAAN KUALITI - PENGUMPULAN/ GATHERING</h4>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('pengumpulan_gathering.create') }}" class="btn btn-primary mb-2">Create</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable mt-2">
                                <thead>
                                    <tr>
                                        <td>sr</td>
                                        <td>Date</td>
                                        <td>Time</td>
                                        <td>Sales Order No. </td>
                                        <td>Kod Buku</td>
                                        <td>Tajuk</td>
                                        <td>Seksyen No</td>
                                        <td>Susuna Turutan</td>
                                        <td>Turutan Muka Surat</td>
                                        <td>Masalah cetakan</td>
                                        <td>Masalah Lipat</td>
                                        <td>Kotor</td>
                                        <td>Kedut</td>
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
                                            <input type="text" class="all_column" placeholder="search sale order no">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search kod_buku">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search tajuk">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search seksyen no">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Susuna Turutan">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Turutan Muka Surat">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Masalah cetakan">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Masalah Lipat">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kotor">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kedut">
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
        var data = "{{ route('pengumpulan_gathering.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/mes/PengumpulanGathering/index.js') }}"></script>
@endpush
