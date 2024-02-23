@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3> Material Request</h3>
            </div>
            <div class="card-body">
                <div class="card" style="background:#f6f7f7;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>A) Informasi</h4>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Tarikh</div>
                                    <input type="date" readonly value="13-12-2023" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Ref No</div>
                                    <input type="text" readonly value="auto display" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Diminta Oleh</div>
                                    <input type="text" value="Admin" readonly class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Sales Orders No</div>
                                    <select name="" id="" readonly class="form-control">
                                        <option value="" disabled>Select Sale Order No.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Discription</div>
                                    <input type="text" value="Input Text" readonly class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Location</div>
                                    <input type="text" value="Input text" readonly class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Remark</div>
                                    <input type="text" value="User Input" readonly class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4><b>B) PERMINTAAN KERTAS</b></h4>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary my-3">Search</button>
                            </div>
                            <div class="col-md-12">
                                <table class="table mt-2" id="">
                                    <thead>
                                        <tr>
                                            <td>Stock code</td>
                                            <td>Description</td>
                                            <td>Grammage</td>
                                            <td>Saiz</td>
                                            <td>UOM</td>
                                            <td>Avaliable Qty</td>
                                            <td>UOM Request</td>
                                            <td>Request Quantity</td>
                                            <td>Remarks</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>No</td>
                                            <td>data</td>
                                            <td></td>
                                            <td>available</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4><b>C) PERMINTAAN BAHAN MENTAH</b></h4>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary my-3">Search</button>
                            </div>
                            <div class="col-md-12">
                                <table class="table mt-2" id="">
                                    <thead>
                                        <tr>
                                            <td>Stock code</td>
                                            <td>Description</td>
                                            <td>UOM</td>
                                            <td>Avaliable Qty</td>
                                            <td>Request Quantity</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>No data available</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4><b>D) PERMINTAAN WIP/SEMI FG</b></h4>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary my-3">Search</button>
                            </div>
                            <div class="col-md-12">
                                <table class="table mt-2" id="">
                                    <thead>
                                        <tr>
                                            <td>Stock code</td>
                                            <td>Description</td>
                                            <td>UOM</td>
                                            <td>Avaliable Qty</td>
                                            <td>Request Quantity</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>No data available</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary float-right">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('Material_request.index')}}" class="">Back to list</a>
    </div>
</div>
@endsection
