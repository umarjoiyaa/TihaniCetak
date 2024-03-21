@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title tx-20 mg-b-0 p-2">Stock In</h4>
                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('stock_in.create') }}" class="btn btn-primary mb-2">Create</a>
                    </div>

                    <table class="table datatable mt-2">
                        <thead>
                            <tr>
                                <td>Sr.</td>
                                <td>Date</td>
                                <td>Ref no.</td>
                                <td>Sales Order No</td>
                                <td>Description</td>
                                <td>Transfer By</td>
                                <td>Receive By</td>
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
                                    <input type="text" class="all_column" placeholder="search ref no.">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search sales order no">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search description">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search transfer by">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search receive by">
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
@endsection
@push('custom-scripts')
    <script>
        var data = "{{ route('stock_in.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/wms/StockIn/index.js') }}"></script>
@endpush
