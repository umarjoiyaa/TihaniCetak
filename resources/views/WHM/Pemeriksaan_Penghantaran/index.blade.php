@extends('app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    <div class="d-flex justify-content-between">
                            <h4 class="card-title tx-20 mg-b-0 p-2">Pemeriksaan Penghantaran</h4>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                        <a href="{{route('Pemeriksaan_Penghantaran.create')}}" class="btn btn-primary mb-2">Create</a>
                        </div>
                    
                        <table class="table  mt-2" id="example1">
                            <thead>
                                <tr>
                                    <td>REef No.</td>
                                    <td>Tarikh</td>
                                    <td>Sales Order No</td>
                                    <td>Description</td>
                                    <td>Diminta Oleh</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td>ST/1/23</td>
                                    <td>30/5/2023</td>
                                    <td>SO-001496</td>
                                    <td>Stock</td>
                                    <td>UserA</td>
                                    <td><span style="background:Yellow; padding:10px; border:1px solid yellow; border-radius:5px;">Request</span></td>
                                    <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                        data-toggle="dropdown" id="dropdownMenuButton" type="button">Action<i class="fas fa-caret-down ml-1"></i></button>
                                        <div  class="dropdown-menu tx-13">
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
    </div>

    

    

    @endsection