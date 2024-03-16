@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title tx-20 mg-b-0 p-2">Good Receiving</h4>
                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                    </div>

                    <table class="table datatable mt-2">
                        <thead>
                            <tr>
                                <td>Sr #</td>
                                <td>Doc Key</td>
                                <td>Doc No</td>
                                <td>Doc Date</td>
                                <td>Incominig Qty</td>
                                <td>Receive Qty</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Doc Key">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Doc No">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Doc Date">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Incominig Qty">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Receive Qty">
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
@endsection
@push('custom-scripts')
    <script>
        var data = "{{ route('good_receiving.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/wms/GoodReceiving/index.js') }}"></script>
@endpush
