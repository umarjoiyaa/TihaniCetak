@extends('app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    <div class="d-flex justify-content-between">
                            <h4 class="card-title tx-20 mg-b-0 p-2">SENARAI SEMAK PRA CETAK</h4>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                        <a href="{{route('REKOD_SERAHANPLATE.create')}}" class="btn btn-primary mb-2">Create</a>
                        </div>
                    
                        <table class="table  mt-2" id="example1">
                            <thead>
                                <tr>
                                    <td>Sr.</td>
                                    <td>Date</td>
                                    <td>Mesin</td>
                                    <td>Sales Order NO</td>
                                    <td>SekSyen</td>
                                    <td>Kuantit palte</td>
                                    <td>Diwajibkan untuk JOB BAHARU (OK/NG)</td>
                                    <td>Disediakan Oleh (Unit CTP)</td>
                                    <td>Diterima oleh (Operator/Pen. Operator)</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td>1</td>
                                    <td>12/12/2023</td>
                                    <td>P1</td>
                                    <td>SO-001496</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td></td>
                                    <td>Admin</td>
                                    <td>Operator</td>
                                    <td><div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                        data-toggle="dropdown" id="dropdownMenuButton" type="button">Action<i class="fas fa-caret-down ml-1"></i></button>
                                        <div  class="dropdown-menu tx-13">
                                            <a class="dropdown-item" href="">View</a>
                                            <a class="dropdown-item" href="">Edit</a>
                                            <a class="dropdown-item" href="">Verify</a>
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