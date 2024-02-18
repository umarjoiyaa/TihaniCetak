@extends('app')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    <div class="d-flex justify-content-between">
                            <h4 class="card-title tx-20 mg-b-0 p-2">Good Receiving</h4>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                        <!-- <a href="" class="btn btn-primary mb-2">Create User</a> -->
                        </div>
                    
                        <table class="table  mt-2" id="example1">
                            <thead>
                                <tr>
                                    <td>Doc Key </td>
                                    <td>Doc no</td>
                                    <td>Doc Date</td>
                                    <td>Incominig Qty</td>
                                    <td>receive Qty</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>454574</td>
                                    <td>P003654</td>
                                    <td>2/12/2023</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                        data-toggle="dropdown" id="dropdownMenuButton" type="button">Action<i class="fas fa-caret-down ml-1"></i></button>
                                        <div  class="dropdown-menu tx-13">
                                            <a class="dropdown-item" href="#">View</a>
                                            <a class="dropdown-item" href="{{route('Good_Receiving.receive')}}">receive</a>
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