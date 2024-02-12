@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>LAPORAN PROSES PENJILIDAN (Saddle Stitch)</h5>

                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>A) Informasi</h4>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="date" readonly name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <label for="">Time</label>
                                        <input type="Time" readonly name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <div class="form-group Checked">
                                        <div class="label"> By (Operator)</div>
                                        <input type="text" value="Admin" readonly name="" id=""
                                            class="form-control mt-1">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select name="" readonly id="" class="form-control">
                                            <option value="" disabled>select sales Order no</option>
                                            <option value="">SO-001496</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text" readonly value="auto Display" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" value="auto Display" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Jumlah Seksyen</div>
                                        <input type="text" readonly value="Auto Display" name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Saiz</div>
                                        <input type="number" readonly value="Auto Display (based On SO)" name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4"></div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Operator</label>
                                        <select name="" readonly id="" class="form-control">
                                            <option value="" disabled>Pilih Operator</option>
                                            <option value="">Operator A</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for=""> Pembantu</label>
                                        <select name="" readonly id="" class="form-control">
                                            <option value="" disabled>Pilih Operator</option>
                                            <option value="">Operator A</option>
                                        </select>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="row mt-5" style="background:#f1f0f0;">
                        <div class="col-md-12 mt-5">
                            <h5>B) Pemeriksaan dan Pengesahan 1st Piece </h5>
                        </div>
                        <div class="col-md-8 mt-5">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td rowspan="2">No</td>
                                        <td rowspan="2">Kriteria</td>
                                        <td colspan="4">Status</td>

                                    </tr>
                                    <tr>
                                        <th>OK</th>
                                        <th>NG</th>
                                        <th>NA</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>1</td>
                                        <td>Kedudukan dawai pin</td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Kedudukan kulit buku dan teks</td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Artwork kulit buku dan teks</td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Turutan Seksyen/muka surat</td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Saiz potongan </td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Rosak/koyak</td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Kotor</td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Lain-lain</td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-5" style="background:#f1f0f0;">
                        <div class="col-md-12 mt-5">
                            <h5>C) Pemeriksaan semasa proses Penjilidan </h5>

                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary float-right mb-5  mr-5">+ Add</button>
                        </div>

                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td rowspan="2">Jumlah </td>
                                            <td colspan="7">Kriteria</td>
                                            <td rowspan="2">Check </td>
                                            <td rowspan="2">Username / datetime</td>
                                            <td rowspan="2">Verify</td>
                                            <td rowspan="2">Username / datetime</td>
                                            <td rowspan="2">Action</td>
                                        </tr>
                                        <tr>
                                            <th>Kedudukan dawai pin</th>
                                            <th>Kedudukan kulit buku dan teks</th>
                                            <th>Artwork kulit buku dan teks</th>
                                            <th>Turutan seksyen/muka surat</th>
                                            <th>Saiz potongan </th>
                                            <th>Rosak/koyak</th>
                                            <th>Kotor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>500</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><button class="btn btn-primary"
                                                    style="border-radius:5px; ">check</button>
                                            </td>
                                            <td>username / datetime</td>
                                            <td><button class="btn"
                                                    style="border-radius:25px; background:#000; color:white; ">Verify</button>
                                            </td>
                                            <td>username / datetime</td>
                                            <td><button class="btn btn-danger" style="border-radius:5px; ">X</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3><b>Verified By</b></h3>

                            <table class="table table-striped mt-5">
                                <thead>
                                    <tr>
                                        <th>DateTime</th>
                                        <th>UserName</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>20/09/2023 10:00 am</td>
                                        <td>Mr.A</td>
                                        <td>HOD</td>
                                        <td>QA/QC</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('LaporanProsesPenjilidan(SaddleStitch).index')}}">back to list</a>
    </div>
</div>
</div>
@endsection

