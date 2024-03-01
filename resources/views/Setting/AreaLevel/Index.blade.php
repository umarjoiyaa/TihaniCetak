@extends('layouts.app')
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title tx-20 mg-b-0 p-2">AREA LEVEL</h4>

                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('area_level.create') }}" class="btn btn-primary  mb-3">Create</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-md-nowrap datatable">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Sr.</th>
                                    <th class="wd-15p border-bottom-0">name</th>
                                    <th class="wd-15p border-bottom-0">code</th>
                                    <th class="wd-25p border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search name">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search code">
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
        var data = "{{ route('area_level.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/settings/AreaLevel/index.js') }}"></script>
@endpush
