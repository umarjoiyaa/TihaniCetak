@extends('layouts.app')
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title tx-20 mg-b-0 p-2">PRODUCT</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="control-group form-group">
                                <label class="form-label">Item Code</label>
                                <input disabled type="text" class="form-control required" name="code"
                                    value="{{ $product->code }}" placeholder="Item Code">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="control-group form-group">
                                <label class="form-label">Description</label>
                                <input disabled type="text" class="form-control required" name="description"
                                    value="{{ $product->description }}" placeholder="Description">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="control-group form-group">
                                <label class="form-label">Group</label>
                                <input disabled type="text" class="form-control required" name="group"
                                    value="{{ $product->group }}" placeholder="Group">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="control-group form-group">
                                <label class="form-label">Base UOM</label>
                                <input disabled type="text" class="form-control required" name="base_uom"
                                    value="{{ $product->base_uom }}" placeholder="Base UOM">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 d-flex justify-content-end">
                        {{-- <div class="col-md-4 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('product') }}" class="btn d-flex"><i class="ti-arrow-left mx-2 mt-1"></i> Back to list</a>
            </div>
        </div>
    </div>
@endsection
