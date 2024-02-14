@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title tx-20 mg-b-0 p-2">USER LIST</h4>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('user.create') }}" class="btn btn-primary mb-2">Create User</a>
                        </div>

                        <table class="table mt-2 datatable">
                            <thead>
                                <tr>
                                    <td>Sr.</td>
                                    <td>User Name</td>
                                    <td>Full Name</td>
                                    <td>Email</td>
                                    <td>Active</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search user name">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search full name">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search email">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search active">
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
        var data = "{{ route('user.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/settings/User/index.js') }}"></script>
@endpush
