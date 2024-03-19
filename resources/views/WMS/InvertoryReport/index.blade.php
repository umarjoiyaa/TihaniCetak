@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4><b>Inventory Report</b></h4>
                </div>
                <div class="card-body">
                    <div class="row py-5" style="background:#f3f6f9;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="item_code">Item Code</label>
                                <select id="item_code" class="form-select" multiple>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->item_code }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Area</label>
                                <select id="area" class="form-select" multiple>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Shelf</label>
                                <select id="shelf" class="form-select" multiple>
                                    @foreach ($shelfs as $shelf)
                                        <option value="{{ $shelf->id }}">{{ $shelf->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Level</label>
                                <select id="level" class="form-select" multiple>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right" id="generate"><i class="fa fa-search"></i> Search </button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Item code</th>
                                        <th>Discryption</th>
                                        <th>UOM</th>
                                        <th>Quantity in Stock</th>
                                        <th>Area</th>
                                        <th>Shelf</th>
                                        <th>level</th>
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
    </div>
@endsection
@push('custom-scripts')
    <script>
        var data = "{{ route('inventory_report.generate') }}";
    </script>
    <script src="{{ asset('assets/js/custom/wms/InventoryReport/index.js') }}"></script>
@endpush
