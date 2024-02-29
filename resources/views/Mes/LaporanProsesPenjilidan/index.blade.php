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
                            <h4 class="card-title tx-20 mg-b-0 p-2">LAPORAN PROSES PENJILIDAN (PERFECT BIND)</h4>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('laporan_proses_penjilidan.create') }}" class="btn btn-primary mb-2">Create</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable mt-2">
                                <thead>
                                    <tr>
                                        <td style="font-size:13px;">Sr #</td>
                                        <td style="font-size:13px;">Tarikh</td>
                                        <td style="font-size:13px;">Time</td>
                                        <td style="font-size:13px;">Sales Order No. </td>
                                        <td style="font-size:13px;">Kod Buku</td>
                                        <td style="font-size:13px;">Tajuk</td>
                                        <td style="font-size:13px;">Jumlah Seksyen</td>
                                        <td style="font-size:13px;">Jenis Penjilidan</td>
                                        <td style="font-size:13px;">Operator</td>
                                        <td style="font-size:13px;">Pembantu</td>
                                        <td style="font-size:13px;">Status</td>
                                        <td style="font-size:13px;">Action</td>
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
                                            <input type="text" class="all_column" placeholder="search kod_buku">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search tajuk">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search jumlah seksyen">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search jenis penjilidan">
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
        var data = "{{ route('laporan_proses_penjilidan.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/mes/LaporanProsesPenjilidan/index.js') }}"></script>
@endpush
