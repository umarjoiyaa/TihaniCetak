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
                            <h4 class="card-title tx-20 mg-b-0 p-2">LAPORAN PEMERIKSAAN KUALITI (PROSES PENCETAKAN) </h4>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('proses_pencetakan.create') }}" class="btn btn-primary mb-2">Create</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable mt-2">
                                <thead>
                                    <tr>
                                        <td>sr</td>
                                        <td>Tarikh.</td>
                                        <td>Masa</td>
                                        <td>Mesin</td>
                                        <td>Sales Order No. </td>
                                        <td>Kod Buku</td>
                                        <td>Tajuk</td>
                                        <td>Status</td>
                                        <td>Action</td>
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
        var data = "{{ route('proses_pencetakan.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/mes/ProsesPencetakan/index.js') }}"></script>
@endpush
