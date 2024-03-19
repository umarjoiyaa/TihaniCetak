@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title tx-20 mg-b-0 p-2">Stock In</h4>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{route('Stock_in.create')}}" class="btn btn-primary mb-2">Create</a>
                </div>

                <table class="table  mt-2" id="example1">
                    <thead>
                        <tr>
                            <td>Sr.</td>
                            <td>Date</td>
                            <td>Ref no.</td>
                            <td>Sales Order No</td>
                            <td>Description</td>
                            <td>Transfer By</td>
                            <td>Receive By</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td>1</td>
                            <td>12/12/2023</td>
                            <td>001</td>
                            <td>123-11</td>
                            <td>Extra Material</td>
                            <td>UserA</td>
                            <td>User B</td>
                            <td>
                                <div class="dropdown">
                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                        data-toggle="dropdown" id="dropdownMenuButton" type="button">Action<i
                                            class="fas fa-caret-down ml-1"></i></button>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="#">View</a>
                                        <a class="dropdown-item" href="">Edit</a>
                                        <a class="dropdown-item" href="">Delete</a>
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
