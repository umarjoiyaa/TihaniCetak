@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title tx-20 mg-b-0 p-2">Sales Order list</h4>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered datatable mt-2">
                                <thead>
                                    <tr>
                                        <th style="font-size:11px;">Sr.</th>
                                        <th style="font-size:11px;">Sales Order No</th>
                                        <th style="font-size:11px;">Customer Name</th>
                                        <th style="font-size:11px;">PO No.</th>
                                        <th style="font-size:11px;">Date Issue</th>
                                        <th style="font-size:11px;">Status</th>
                                        <th style="font-size:11px;">Status Approval</th>
                                        <th style="font-size:11px;">Delivery Qty</th>
                                        <th style="font-size:11px;">Remaining Qty</th>
                                        <th style="font-size:11px;">Action</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search order no">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search customer">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search PO no">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search date issue">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search status">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search status approval">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search delivery qty">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search remaining qty">
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
        var data = "{{ route('sale_order.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/mes/SaleOrder/index.js') }}"></script>
@endpush
