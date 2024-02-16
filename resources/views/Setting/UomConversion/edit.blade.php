@extends('layouts.app')
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title tx-20 mg-b-0 p-2">UOM CONVERSION</h4>

                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('uom_conversion.update', $UomConversion->id) }}" method="post">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="control-group form-group">
                                    <label class="form-label">From</label>
                                    <select name="from" class="form-select" id="from">
                                        <option value="" disabled selected>Select any option</option>
                                        @foreach ($uoms as $uom)
                                            <option value="{{ $uom->id }}" @selected($UomConversion->from_unit_id == $uom->id)>
                                                {{ $uom->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="control-group form-group">
                                    <label class="form-label">To</label>
                                    <select name="to" class="form-select" id="to">
                                        <option value="" disabled selected>Select any option</option>
                                        @foreach ($uoms as $uom)
                                            <option value="{{ $uom->id }}" @selected($UomConversion->to_unit_id == $uom->id)>
                                                {{ $uom->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="control-group form-group">
                                    <label class="form-label">Base Value</label>
                                    <input type="number" class="form-control required" name="base_value"
                                        value="{{ $UomConversion->from_value }}" placeholder="Base Value">
                                </div>
                            </div>
                        </div>
                            <div class="row">
                            <div class="col-md-4">
                                <div class="control-group form-group">
                                    <label class="form-label">Conversion Ratio</label>
                                    <input type="number" class="form-control required" name="conversion_ratio"
                                        value="{{ $UomConversion->to_value }}" placeholder="Conversion Ratio">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 d-flex justify-content-end">
                            <div class="col-md-4 d-flex justify-content-end">
                                <button class="btn btn-primary submit" type="button">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('uom_conversion') }}" class="btn d-flex"><i class="ti-arrow-left mx-2 mt-1"></i> Back to
                    list</a>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script src="{{ asset('assets/js/custom/settings/UOM_Conversion/create.js') }}"></script>
@endpush
