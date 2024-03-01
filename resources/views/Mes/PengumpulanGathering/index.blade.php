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
                                        <th class="text-left">sr</th>
                                        <th class="text-left">Date</th>
                                        <th class="text-left">Time</th>
                                        <th class="text-left">Sales Order No. </th>
                                        <th class="text-left">Kod Buku</th>
                                        <th class="text-left">Tajuk</th>
                                        <th class="text-left">Seksyen No</th>
                                        <th class="text-left">Susuna Turutan</th>
                                        <th class="text-left">Turutan Muka Surat</th>
                                        <th class="text-left">Masalah cetakan</th>
                                        <th class="text-left">Masalah Lipat</th>
                                        <th class="text-left">Kotor</th>
                                        <th class="text-left">Kedut</th>
                                        <th class="text-left">Pematuhan SOP</th>
                                        <th class="text-left">Status</th>
                                        <th class="text-left">Action</th>
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
