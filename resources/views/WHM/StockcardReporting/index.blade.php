@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4><b>Stock Card</b></h4>
                </div>
                <div class="card-body">
                    <div class="row py-5" style="background:#f3f6f9;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Form</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select any Option</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">To</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select any Option</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Base Value</label>
                                <input type="text" name="name" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">UOM Conversion</label>
                                <input type="text" name="name" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right"><i class="fa fa-search"></i> Search </button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Data</th>
                                        <th>Scren Name</th>
                                        <th>Ref No.</th>
                                        <th>Item Code</th>
                                        <th>Description</th>
                                        <th>UOM</th>
                                        <th>Quantity</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="" id="" class="form-control"></td>
                                        <td><input type="text" name="" id="" class="form-control"></td>
                                        <td><input type="text" name="" id="" class="form-control"></td>
                                        <td><input type="text" name="" id="" class="form-control"></td>
                                        <td><input type="text" name="" id="" class="form-control"></td>
                                        <td><input type="text" name="" id="" class="form-control"></td>
                                        <td><input type="text" name="" id="" class="form-control"></td>
                                        <td><input type="text" name="" id="" class="form-control"></td>
                                        <td><input type="text" name="" id="" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>1.</td>
                                        <td>12/12/2023</td>
                                        <td>Good Receiving</td>
                                        <td>12311</td>
                                        <td>AA</td>
                                        <td>Item A</td>
                                        <td>Unit</td>
                                        <td>+20</td>
                                        <td>200</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary mt-3">Download</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endSection