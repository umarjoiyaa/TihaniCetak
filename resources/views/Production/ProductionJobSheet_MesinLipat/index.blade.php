@extends('layouts.app')

@section('css')
<style>
    table td{
        font-size:14px;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title tx-20 mg-b-0 p-2">JOBSHEET - MESIN LIPAT</h4>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{route('mesin_lipat.create')}}" class="btn btn-primary mb-2">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered datatable mt-2" id="example1">
                        <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Tarikh</th>
                                <th>Sales Order no</th>
                                <th>Pelanggan</th>
                                <th>Kod Buku</th>
                                <th>Tajuk</th>
                                <th>Jumlah Seksyen</th>
                                <th>Kuantiti</th>
                                <th>Jenis Lipatan</th>
                                <th>Mesin</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search tarikh">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search sales order no">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Pelanggan">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Kod Buku">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Tajuk">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Jumlah Seksyen">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Kuantiti">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Jenis Lipatan">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Mesin">
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
        var data = "{{ route('mesin_lipat.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/production/MesinLipat/index.js') }}"></script>
@endpush


