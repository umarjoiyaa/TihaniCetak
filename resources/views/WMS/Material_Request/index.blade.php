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
                        <a href="{{route('Material_request.create')}}" class="btn btn-primary float-right">Create</a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <table class="table" id="example1">
                            <thead>
                                <tr>
                                    <th>Ref No.</th>
                                    <th>Tarikh</th>
                                    <th>Sales Order No. </th>
                                    <th>Description</th>
                                    <th>Diminta oleh</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
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
    $('#example1').DataTable();
</script>
@endpush