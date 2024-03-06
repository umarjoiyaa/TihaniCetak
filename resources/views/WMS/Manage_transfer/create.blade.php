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
                                    <input type="text" readonly value="Pilih ref no" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Dikeluarkan Oleh</div>
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
                                    <div class="label">Diminta Oleh</div>
                                    <input type="text" value=" auto display - based request" readonly
                                        class="form-control">
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
                                <div class="table-responsive">
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
                                                <td>Previous Qty</td>
                                                <td>Balance Qty</td>
                                                <td>Transfer QTY</td>
                                                <td>Remaining Qty</td>
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
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

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
                                <div class="table-responsive">
                                    <table class="table mt-2" id="">
                                        <thead>
                                            <tr>
                                                <td>Stock code</td>
                                                <td>Description</td>
                                                <td>UOM</td>
                                                <td>Avaliable Qty</td>
                                                <td>Request Quantity</td>
                                                <td>Previous Qty</td>
                                                <td>Balance Qty</td>
                                                <td>Transfer QTY</td>
                                                <td>Remaining Qty</td>
                                                <td>Remarks</td>
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
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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
                                <div class="table-responsive">
                                    <table class="table mt-2" id="">
                                        <thead>
                                            <tr>
                                                <td>Stock code</td>
                                                <td>Description</td>
                                                <td>UOM</td>
                                                <td>Avaliable Qty</td>
                                                <td>Request Quantity</td>
                                                <td>Previous Qty</td>
                                                <td>Balance Qty</td>
                                                <td>Transfer QTY</td>
                                                <td>Remaining Qty</td>
                                                <td>Remarks</td>
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
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <p style="font-size:17px; color:#000;">
                        <h4> Nota :</h4><br>
                        <h6> Pengeluaran Kertas:</h6>
                        *Penerima kertas mestilah memastikan jenis, saiz , grammage and kuantiti yang dimintaa
                        adalah betul.<br>
                        *Stock card kertas mestilah dikemaskini setelah stock dikeluarkan daripada stor<br>
                        *Pemulangan stok kertas oleh Jabatan Operasi hendaklah dimaklumkan kepada Eksekutif
                        Inventori untuk pengemaskinian stock card kertas<br>

                        Pengeluaran Bahan mentah:<br>
                        *Penerima bahan mentah mestilah memastikan bahan mentah dan kuantiti yang diminta adalah
                        betul.<br>
                        *stockcard bahan mentah mestilah dikemaskini apabila bahan mentah dikeluarkan
                        daripada stor
                        </P>

                        <button type="submit" class="btn btn-primary float-right">Save</button>
                    </div>
                </div>
                <a href="{{route('Manage_tranfer')}}" class="">Back to list</a>

            </div>

        </div>
    </div>
</div>

@endsection
