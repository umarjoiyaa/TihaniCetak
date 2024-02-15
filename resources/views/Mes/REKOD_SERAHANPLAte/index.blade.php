@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    <div class="d-flex justify-content-between">
                            <h4 class="card-title tx-20 mg-b-0 p-2"><b>REKOD SERAHAN PLATE CETAX DAN SAMPLE</b></h4>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                        <a href="{{route('REKOD_SERAHANPLATE.create')}}" class="btn btn-primary mb-2">Create</a>
                        </div>

                        <table class="table table-bordered  mt-2" id="example1">
                            <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Date</th>
                                    <th>Mesin</th>
                                    <th>Sales Order NO</th>
                                    <th>SekSyen</th>
                                    <th>Kuantit palte</th>
                                    <th colspan="2">Diwajibkan untuk JOB BAHARU (OK/NG)</th>
                                    <th>Disediakan Oleh (Unit CTP)</th>
                                    <th>Diterima oleh (Operator/Pen. Operator)</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                            <tr>
                                    <th><input type="text" name="" id="" class="form-control"></th>
                                    <th><input type="text" name="" id="" class="form-control"></th>
                                    <th><input type="text" name="" id="" class="form-control"></th>
                                    <th><input type="text" name="" id="" class="form-control"></th>
                                    <th><input type="text" name="" id="" class="form-control"></th>
                                    <th><input type="text" name="" id="" class="form-control"></th>
                                    <th>Dummy Lipat</th>
                                    <th>Sample</th>
                                    <th><input type="text" name="" id="" class="form-control"></th>
                                    <th><input type="text" name="" id="" class="form-control"></th>
                                    <th></th>
                                </tr>
                                <tr class="">
                                    <td>1</td>
                                    <td>12/12/2023</td>
                                    <td>P1</td>
                                    <td>SO-001496</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td></td>
                                    <td></td>
                                    <td>Admin</td>
                                    <td>Operator</td>
                                    <td><div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                        data-toggle="dropdown" id="dropdownMenuButton" type="button">Action<i class="fas fa-caret-down ml-1"></i></button>
                                        <div  class="dropdown-menu tx-13">
                                            <a class="dropdown-item" href="{{route('REKOD_SERAHANPLATE.view')}}">View</a>
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
                <div class="row">
                    <div class="col-md-12">
                       <h5> <b>Notes: </b></h5><br>
                        when creates and save - status show “ Checked” <br>
                        In action verify, user can click “Decline” or “ Verify” <br>
                        if Decline : status change to “Decline” and user can edit again the form <br>
                        if  Verify- status changes to “Verified” [user cannot edit anymore] <br>
                    </div>
                </div>
            </div>
        </div>
    </div>





    @endsection
