@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4><b>Inventory Report</b></h4>
                </div>
                <div class="card-body">
                    <div class="row py-5" style="background:#f3f6f9;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Item Code</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select any Option</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Discryption</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select any Option</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Area</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select Item Code</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Shelf</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Auto Display</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Level</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Auto Display</option>
                                    </select>
                            </div>
                        </div>
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
                                        <th>Item code</th>
                                        <th>Discryption</th>
                                        <th>UOM</th>
                                        <th>Quantity in Stock</th>
                                        <th>Area</th>
                                        <th>Shelf</th>
                                        <th>level</th>
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
                                    </tr>
                                    <tr>
                                        <td>1.</td>
                                        <td>AA</td>
                                        <td>Item A</td>
                                        <td>Unit </td>
                                        <td>2000</td>
                                        <td>A</td>
                                        <td>S1</td>
                                        <td>R1</td>
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