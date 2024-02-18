@extends('app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Pemeriksaan Penghantaran</h3>
            </div>
            <div class="card-body">
                <div class="card" style="background:#f6f7f7;">
                    <div class="card-body">
                        <h5>A) Informasi</h5>
                        <div class="row">

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Tarikh</div>
                                    <input type="date" readonly value="Auto Display" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Diperiksa Oleh</div>
                                    <input type="text" readonly value="Admin" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Search Sales Order No.</div>
                                    <select readonly name="" id="" class="form-control">
                                        <option value="">Search Sales Order no</option>
                                        <option value="">SO - 001387</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Tajuk</div>
                                    <input type="text" readonly placeholder="Auto Display" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Kod Buku</div>
                                    <input type="text" value="Auto Display" readonly class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="label">Pelanggan</div>
                                    <input type="text" value="Auto Display" readonly class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">kuantiti</label>
                                    <input type="text" placeholder="user input" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">+</button>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th>Tanda bagi yang bekenaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Label Produk Sebelum Dibaung</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Baki kuantiti produk Sebelum disimpan</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Reject dikuarantin ditempat lain/dibuang</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h6> Nota :</h6>
                        <p>1. Bandingkan maklumat pada DO dengan barangan yang akan dihantar</p>
                        <p>2. Pemeriksaan hendaklah dilakukan bagi setiap palet oleh Pemandu/Eksekutif Inventori dan
                            disahkanoleh QA/QC</p>
                        <p>3. 1 label/borang ditampal pagi setiap palet.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="mt-3 btn btn-primary float-right">Save</button>
                        <a href="{{route('stock_Transfer_location.index')}}" class="float-left">Back to list</a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width:1000px; margin-left:-250px;">
            <div class="modal-header">
                <h5 class="float-left">Item <span>: A-123</span></h5>
                <h5 class="float-right">Total QTY : 24 Total tranfer QTY : 0</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>UOM</th>
                            <th>Available Qty</th>
                            <th>QTY</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><select name="" id="" class="form-control">
                                    <option value="">Store>R1>S1</option>
                                </select></td>
                            <td>UNITS</td>
                            <td>2000</td>
                            <td><input type="text" placeholder="user Input" class="form-control"></td>
                            <td>
                                <button class="btn btn-primary">+</button>
                                <button class="btn btn-danger">-</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

    @endsection