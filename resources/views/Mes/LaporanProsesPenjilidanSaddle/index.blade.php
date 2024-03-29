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
                            <h4 class="card-title tx-20 mg-b-0 p-2">LAPORAN PROSES PENJILIDAN (Saddle Stitch)</h4>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('laporan_proses_penjilidan_saddle.create') }}"
                                class="btn btn-primary mb-2">Create</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable mt-2">
                                <thead>
                                    <tr>
                                        <td class="text-left">Sr #</td>
                                        <td class="text-left">Date</td>
                                        <td class="text-left">time </td>
                                        <td class="text-left">Sales Order no.</td>
                                        <td class="text-left">Kod Buku</td>
                                        <td class="text-left">Tajuk</td>
                                        <td class="text-left">Jumlah Seksyen</td>
                                        <td class="text-left">Saiz</td>
                                        <td class="text-left">Operator</td>
                                        <td class="text-left">Pembantu</td>
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
                                            <input type="text" class="all_column" placeholder="search jumlah seksyen">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search size">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search operator">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search pamabantu">
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
        var data = "{{ route('laporan_proses_penjilidan_saddle.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/mes/LaporanProsesPenjilidanSaddle/index.js') }}"></script>
@endpush
