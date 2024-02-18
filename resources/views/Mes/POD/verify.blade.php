@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="float-left">LAPORAN PEMERIKSAAN KUALITI -POD </h5>
                        <p class="float-right">TCSB-B23 (Rev.5)</p>
                    </div>
                </div>
                <div class="card" style="background:#f1f0f0;">
                    <<div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="date" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Time</label>
                                    <input type="time" value="Admin" readonly name="" id="" class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Checked BY</div>
                                        <input type="text" value="Admin" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select name="" id="" readonly class="form-control">
                                            <option value="">select sales Order no</option>
                                            <option value="" selected>SO-001496</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text" readonly value="auto Display" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" value="auto Display" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <h6><b>File Artwork</b></h6>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">kriteria</th>
                                                <th colspan="3">Tanda bagi Yang bekenaan</th>

                                            </tr>
                                            <tr>
                                                <th>OK</th>
                                                <th>NG</th>
                                                <th>NA</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>Design clearance (5mm)</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Image artwork</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Bleed</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Saiz spine (perfect bind)</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat pencetak</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah muka surat</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Turutan muka surat</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h6><b>impositions</b></h6>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">kriteria</th>
                                                <th colspan="3">Tanda bagi Yang bekenaan</th>

                                            </tr>
                                            <tr>
                                                <th>OK</th>
                                                <th>NG</th>
                                                <th>NA</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <tr>
                                                <td>Jenis kertasn</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Saiz produk</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Artwork (gambar, teks)</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Design clearance (5mm)</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Warna</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah muka surat </td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Turutan muka surat </td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>

                                            </tr>
                                            <tr>
                                                <td>Bleed</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>

                                            </tr>
                                            <tr>
                                                <td>Crop mark</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>

                                            </tr>
                                            <tr>
                                                <td>Kedudukan cetakan depan belakang / print register</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>

                                            </tr>
                                            <tr>
                                                <td>Jenis penjilidan</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>

                                            </tr>


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                </div>

                <div class="row d-flex justify-content-end ">
                    <div class="col-md-12 d-flex justify-content-end">
                        <button class="btn btn-danger mx-2">Decline</button>
                        <button class="btn btn-primary ">Approve</button>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('POD.index')}}">back to list</a>
    </div>
</div>


@endsection