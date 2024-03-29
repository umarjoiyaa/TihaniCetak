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
                    <h4 class="card-title tx-20 mg-b-0 p-2">REKOD SERAHAN PLATE CETAK DAN SAMPLE</h4>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('rekod_serahan_plate.create') }}" class="btn btn-primary mb-2">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table datatable table-bordered mt-2">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-left">Sr.</th>
                                <th rowspan="2" class="text-left">Date</th>
                                <th rowspan="2" class="text-left">Mesin</th>
                                <th rowspan="2" class="text-left">Sales Order NO</th>
                                <th rowspan="2" class="text-left">Seksyen</th>
                                <th rowspan="2" class="text-left">Kuaniti plate</th>
                                <th colspan="2" class="text-left">Diwajibkan untuk JOB BAHARU (OK/NG)</th>
                                <th rowspan="2" class="text-left">Disediakan Oleh (Unit CTP)</th>
                                <th rowspan="2" class="text-left">Diterima oleh (Operator/Pen. Operator)</th>
                                <th rowspan="2" class="text-left">Action</th>
                            </tr>
                            <tr>
                                <th>Dummy Lipat</th>
                                <th>Sample</th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search date">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search mesin">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search sale order no">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search seksyen">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search kuaniti plate">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search dummy lipat">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search sample">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search user">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search operator">
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
    var data = "{{ route('rekod_serahan_plate.data') }}";
</script>
<script src="{{ asset('assets/js/custom/mes/RekodSerahanPlate/index.js') }}"></script>
@endpush