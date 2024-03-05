@extends('layouts.app')
@section('content')
    <form action="{{ route('material_request.store') }}" method="POST">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3> Material Request</h3>
                    </div>
                    <div class="card-body">
                        <div class="card" style="background:#f6f7f7;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>A) Informasi</h4>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Tarikh</label>
                                            <input type="text" name="date"
                                                value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" class="form-control"
                                                id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Ref No</div>
                                            <input type="text" name="ref_no" readonly value="auto display"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="col-md-4 mt-3">
                                            <label for="">Diminta Oleh</label>
                                            <input type="text" readonly name=""
                                                value="{{ Auth::user()->full_name }}" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Sales Order No.</div>
                                            <select name="sale_order" id="sale_order" class="form-control">
                                                <option value="" selected disabled>Select a Sale Order</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Discription</div>
                                            <textarea name="description" rows="1" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Location</div>
                                            <textarea name="location" rows="1" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Remarks</div>
                                            <textarea name="remarks" rows="1" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><b>B) PERMINTAAN KERTAS</b></h4>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary my-3">Search</button>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table mt-2" id="">
                                            <thead>
                                                <tr>
                                                    <td>Stock code</td>
                                                    <td>Description</td>
                                                    <td>Grammage</td>
                                                    <td>Saiz</td>
                                                    <td>UOM</td>
                                                    <td>Avaliable Qty</td>
                                                    <td>UOM Request</td>
                                                    <td>Request Quantity</td>
                                                    <td>Remarks</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>A-123</td>
                                                    <td>A/CARD 260gr</td>
                                                    <td><input type="text" class="form-control"></td>
                                                    <td><input type="text" class="form-control"></td>
                                                    <td>RIM</td>
                                                    <td>24</td>
                                                    <td><select class="form-control"><option value="RIM">RIM</option><option value="PKT">PKT</option><option value="SHEET">SHEET</option></select></td>
                                                    <td><input type="text" class="form-control"></td>
                                                    <td><textarea class="form-control"></textarea></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><b>C) PERMINTAAN BAHAN MENTAH</b></h4>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary my-3">Search</button>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table mt-2" id="">
                                            <thead>
                                                <tr>
                                                    <td>Stock code</td>
                                                    <td>Description</td>
                                                    <td>UOM</td>
                                                    <td>Avaliable Qty</td>
                                                    <td>Request Quantity</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>No data available</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><b>D) PERMINTAAN WIP/SEMI FG</b></h4>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary my-3">Search</button>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table mt-2" id="">
                                            <thead>
                                                <tr>
                                                    <td>Stock code</td>
                                                    <td>Description</td>
                                                    <td>UOM</td>
                                                    <td>Avaliable Qty</td>
                                                    <td>Request Quantity</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>No data available</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('material_request') }}" class="">Back to list</a>
            </div>
        </div>
    </form>
@endsection
@push('custom-scripts')
    <script>
        $('#sale_order').select2({
            ajax: {
                url: '{{ route('sale_order.get') }}',
                dataType: 'json',
                delay: 1000,
                data: function(params) {
                    return {
                        q: params.term,
                        page: params.page || 1,
                    };
                },
                processResults: function(data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data.results,
                        pagination: {
                            more: data.pagination.more
                        }
                    };
                },
                cache: true
            },
            containerCssClass: 'form-control',
            placeholder: "Select Sales Order No",
            templateResult: function(data) {
                if (data.loading) {
                    return "Loading...";
                }

                return $('<option value=' + data.id + '>' + data.order_no + '</option>');
            },
            templateSelection: function(data) {
                return data.order_no || "Select Sales Order No";
            }
        });
    </script>
@endpush
