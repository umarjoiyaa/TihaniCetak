@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4><b>Stock Card</b></h4>
                </div>
                <div class="card-body">
                    <div class="row py-5" style="background:#f3f6f9;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="item_code">Item Code</label>
                                <select id="item_code" class="form-select">
                                    <option value="" selected disabled>Select Item Code</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" data-id="{{ $product->description }}">
                                            {{ $product->item_code }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" readonly class="form-control" id="description">
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" id="start_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" id="end_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right" id="generate"><i class="fa fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Date</th>
                                        <th>Screen Name</th>
                                        <th>Ref No.</th>
                                        <th>Item Code</th>
                                        <th>Description</th>
                                        <th>UOM</th>
                                        <th>Quantity</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary mt-3" id="export-btn">Download</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection
@push('custom-scripts')
    <script>
        var data = "{{ route('stock_card_report.generate') }}";
    </script>
    <script src="{{ asset('assets/js/custom/wms/StockCardReport/index.js') }}"></script>
@endpush
