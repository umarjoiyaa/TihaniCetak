@extends('layouts.app')

@section('css')
<style>
     .dropdownwidth{
                width:100px;
            }
    table td{
        font-size:15px;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title tx-20 mg-b-0 p-2">PRODUCTION JOBSHEET - TEXT </h4>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{route('text.create')}}" class="btn btn-primary mb-2">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table datatable table-bordered mt-2">
                        <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Tarikh</th>
                                <th>Sales Order no</th>
                                <th>Pelanggan</th>
                                <th>Kod Buku</th>
                                <th>Tajuk</th>
                                <th>Kuantiti</th>
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
                                    <input type="text" class="all_column" placeholder="search Kuantiti">
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
        var data = "{{ route('text.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/production/Text/index.js') }}"></script>
@endpush
