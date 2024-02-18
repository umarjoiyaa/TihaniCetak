@extends('app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title tx-20 mg-b-0 p-2">Transfer Location</h4>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{route('stock_Transfer_location.create')}}" class="btn btn-primary mb-2">Create User</a>
                </div>

                <table class="table mt-2" id="example1">
                    <thead>
                        <tr>
                            <td>Sr.</td>
                            <td>Date</td>
                            <td>Ref No.</td>
                            <td>Sales Order No.</td>
                            <td>Description</td>
                            <td>Transfer By</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>12/12/2023</td>
                            <td>001</td>
                            <td>1231-1</td>
                            <td>Extra Material</td>
                            <td>User A</td>
                            <td>
                                <div class="dropdown">
                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                        data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i
                                            class="fas fa-caret-down ml-1"></i></button>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="#">View</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                        <a class="dropdown-item"
                                            href="{{route('stock_Transfer_location.receive')}}">Receive</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection