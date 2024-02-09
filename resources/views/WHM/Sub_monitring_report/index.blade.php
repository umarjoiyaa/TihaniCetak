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
                                <label for="">Date Range</label>
                               <input type="date" name=""placeholder="start date" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="date" name="" placeholder="End date" id="" class="form-control">
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Item Code</label>
                                <select name="" id="" class="form-control">
                                        <option value="">Search Each Code</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Discryption</label>
                                    <input type="text" name="" readonly placeholder="Auto display" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            
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
                                        <th>Date</th>
                                        <th>Sales Order No.</th>
                                        <th>Subcontractor</th>
                                        <th>Kategori</th>
                                        <th>Item Code</th>
                                        <th>Discryption</th>
                                        <th>UOM</th>
                                        <th>Quantity</th>
                                        <th>Status</th>

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
                                        <td><input type="text" name="" id="" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>1.</td>
                                        <td>12/12/2023</td>
                                        <td>S0-001469</td>
                                        <td>Subcon A </td>
                                        <td>Cover</td>
                                        <td>AA</td>
                                        <td>Item A</td>
                                        <td>Unit</td>
                                        <td>200</td>
                                        <td><span style="background:Yellow;  border:1px solid yellow; border-radius: 25px; padding:5px;">Transfer</span></td>
                                    </tr>
                                    <tr>
                                        <td>1.</td>
                                        <td>12/12/2023</td>
                                        <td>S0-001469</td>
                                        <td>Subcon A </td>
                                        <td>Cover</td>
                                        <td>AA</td>
                                        <td>Item A</td>
                                        <td>Unit</td>
                                        <td>200</td>
                                        <td><span style="background:Green; color:White; border:1px solid green; border-radius: 25px; padding:5px;">Transfer</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div style="background:golden; color:golden;">
                                    <p class="mt-2">Notes: <br>
                                    This is taking form borang Kerja Kulit buku dan teks</p>
                                    <p>Status - Transfer (Yellow) <br> Recevied - (Green)</p>
                                    <p></p>
                                </div>
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