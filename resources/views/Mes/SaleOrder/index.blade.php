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
                    <h4 class="card-title tx-20 mg-b-0 p-2">Sales Order list</h4>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered datatable mt-2">
                        <thead>
                            <tr>
                                <th style="font-size:11px;" class="text-left">Sr.</th>
                                <th style="font-size:11px;" class="text-left">Sales Order No</th>
                                <th style="font-size:11px;" class="text-left">Customer Name</th>
                                <th style="font-size:11px;" class="text-left">PO No.</th>
                                <th style="font-size:11px;" class="text-left">Date Issue</th>
                                <th style="font-size:11px;" class="text-left">Status</th>
                                <th style="font-size:11px;" class="text-left">Status Approval</th>
                                <th style="font-size:11px;" class="text-left">Sale Order Qty</th>
                                <th style="font-size:11px;" class="text-left">Delivery Qty</th>
                                <th style="font-size:11px;" class="text-left">Remaining Qty</th>
                                <th style="font-size:11px;" class="text-left">Action</th>
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
                                    <input type="text" class="all_column" placeholder="search sale order qty">
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
@endsection
@push('custom-scripts')
<script>
    var data = "{{ route('sale_order.data') }}";
</script>
<script src="{{ asset('assets/js/custom/mes/SaleOrder/index.js') }}"></script>
@endpush
