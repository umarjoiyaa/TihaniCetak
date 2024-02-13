@extends('app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    <div class="d-flex justify-content-between">
                            <h4 class="card-title tx-20 mg-b-0 p-2">Sales Order list</h4>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                        <a href="{{route('Pemeriksaan_Penghantaran.create')}}" class="btn btn-primary mb-2">Create</a>
                        </div>
                    
                        <table class="table table-bordered  mt-2" id="example1">
                            <thead>
                                <tr>
                                    <th style="font-size:11px;">Sr.</th>
                                    <th style="font-size:11px;">Sales Order No</th>
                                    <th  style="font-size:11px;">Customer Name</th>
                                    <th style="font-size:11px;">PO No.</th>
                                    <th style="font-size:11px;">Date Issue</th>
                                    <th style="font-size:11px;">Status</th>
                                    <th style="font-size:11px;">Status Approveal</th>
                                    <th style="font-size:11px;">Sales Order No.</th>
                                    <th style="font-size:11px;">Delivery Qty</th>
                                    <th style="font-size:11px;">Remaining Qty</th>
                                    <th style="font-size:11px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td>1</td>
                                    <td style="font-size:11px;">SO-001496</td>
                                    <td style="font-size:11px;">EDUKID DIDTRIBUTE</td>
                                    <td style="font-size:11px;">PO-00308</td>
                                    <td>15/09/2023</td>
                                    <td ><span class="badge badge-success">Complete</span></td>
                                    <td><span class="badge badge-info">Approve</span></td>
                                    <td style="font-size:15px;">5000</td>
                                    <td style="font-size:15px;">5000</td>
                                    <td>0</td>
                                    <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                        data-toggle="dropdown" id="dropdownMenuButton" type="button">Action<i class="fas fa-caret-down ml-1"></i></button>
                                        <div  class="dropdown-menu tx-13">
                                            <a class="dropdown-item" href="{{route('SalesOrderList.view')}}">View</a>
                                            <a class="dropdown-item" href="{{route('SalesOrderList.upload')}}">Upload</a>
                                            <a class="dropdown-item" href="{{route('SalesOrderList.approve')}}">Approve</a>
                                            <a class="dropdown-item" href="{{route('SalesOrderList.publish')}}">publish</a>
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
    </div>

    

    

    @endsection