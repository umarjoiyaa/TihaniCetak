@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4><b>Production Report</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="background:#f1f0f0; border-radius:5px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Date Range</label>
                                            <input type="text"  name="" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Process</label>
                                            <select name="" id="" class="form-control">
                                                <option value=""></option>
                                                <option value="">Pencetakan Cover</option>
                                                <option value="">Pencetakan text</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Sales Order No</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Search So No</option>
                                            <option value="">SO-001387</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Item Code</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Search Item Code</option>
                                            <option value="">AA</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Description</label>
                                        <input type="text"  name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary float-right"><i
                                                class="fa fa-magnifying-glass"></i>Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 mt-5">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Date</th>
                                    <th>Sales Order No.Process</th>
                                    <th>Process</th>
                                    <th>Item Code</th>
                                    <th>Description</th>
                                    <th>Total Production</th>
                                    <th>Good Count</th>
                                    <th>Rejection</th>
                                    <th>Status Job Sheet</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>12/12/2023</td>
                                    <td>SO-001496</td>
                                    <td>Three Knife</td>
                                    <td>AA</td>
                                    <td>Item A</td>
                                    <td>1000</td>
                                    <td>998</td>
                                    <td>2</td>
                                    <td><span class="badge badge-pill badge-success">Completed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card" style="background:#fff9e9; color:#e1be00;">
                            <div class="card-body">
                                <h4><b>Notes</b></h4>
                                <span>
                                    This list is taking from <br> Jobsheet.
                                    <br><br>
                                    Status follow jobsheet <br> status
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary float-right"><i
                                class="fa fa-magnifying-glass"></i>Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-scripts')
<script>
     $(document).ready(function () {
        $('#example1').DataTable();
    });
</script>
@endpush