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
                    <h4 class="card-title tx-20 mg-b-0 p-2">LAPORAN PROSES PENCETAKAN</h4>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('laporan_proses_pencetakani.create') }}" class="btn btn-primary mb-2">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table datatable mt-2">
                        <thead>
                            <tr>
                                <td class="text-left">Sr.</td>
                                <td class="text-left">Date</td>
                                <td class="text-left">Time</td>
                                <td class="text-left">Sales Order NO</td>
                                <td class="text-left">Kod Buku</td>
                                <td class="text-left">Tajuk</td>
                                <td class="text-left">No SekSyen</td>
                                <td class="text-left">Operator</td>
                                <td class="text-left">Kuantiti Cetakan</td>
                                <td class="text-left">Kuantiti Waste</td>
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
                                    <input type="text" class="all_column" placeholder="search sale order no">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search kod_buku">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search tajuk">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search seksyen_no">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search operator">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search kuaniti_cetakan">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search kuaniti_waste">
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
    var data = "{{ route('laporan_proses_pencetakani.data') }}";
</script>
<script src="{{ asset('assets/js/custom/mes/LaporanProsesPencetakani/index.js') }}"></script>
@endpush