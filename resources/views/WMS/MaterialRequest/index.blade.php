@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5><b>Material Request</b></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('material_request.create') }}" class="btn btn-primary float-right">Create</a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>SR #</th>
                                        <th>Ref No.</th>
                                        <th>Tarikh</th>
                                        <th>Sales Order No. </th>
                                        <th>Description</th>
                                        <th>Diminta oleh</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search ref no.">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search tarikh">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search sales order no">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search description">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Diminta olehajuk">
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
    </div>
@endsection
@push('custom-scripts')
    <script>
        var data = "{{ route('material_request.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/wms/MaterialRequest/index.js') }}"></script>
@endpush
