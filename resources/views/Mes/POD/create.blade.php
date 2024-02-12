@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>LAPORAN PEMERIKSAAN KUALITI -POD </h5>

                    <div class="card" style="background:#f1f0f0;">
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
                                        <select name="" id="" class="form-control">
                                            <option value="" disabled>select sales Order no</option>
                                            <option value="">SO-001496</option>
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
                                                <td rowspan="2">kriteria</td>
                                                <td colspan="3">Tanda bagi Yang bekenaan</td>

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
                                                <td rowspan="2">kriteria</td>
                                                <td colspan="3">Tanda bagi Yang bekenaan</td>

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
                                                <td>Turutan muka surat  </td>
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
                                                <td>Kedudukan cetakan depan  belakang / print register</td>
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

                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('POD.index')}}">back to list</a>
    </div>
</div>
</div>
@endsection