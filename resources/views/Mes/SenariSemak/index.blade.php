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
        <div class="card ">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title tx-20 mg-b-0 p-2">SENARAI SEMAK PENCETAKAN DIGITAL</h4>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('senari_semak.create') }}" class="btn btn-primary mb-2">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table datatable mt-2" style="width: 100% !important">
                        <thead>
                            <tr>
                                <th class="text-left">Sr.</th>
                                <th class="text-left">Sales Order No</th>
                                <th class="text-left">Tajuk</th>
                                <th class="text-left">kod Buku</th>
                                <th class="text-left">Date</th>
                                <th class="text-left">Checked By</th>
                                <th class="text-left">Status</th>
                                <th class="text-left">Action</th>
                            </tr>

                            <tr>
                                <th></th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search sale order no">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search tajuk">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search kod buku">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search date">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search checked by">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search status">
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
    var data = "{{ route('senari_semak.data') }}";
</script>
<script src="{{ asset('assets/js/custom/mes/SenariSemak/index.js') }}"></script>
@endpush
