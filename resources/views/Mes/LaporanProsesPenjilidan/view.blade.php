@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>LAPORAN PROSES PENJILIDAN (PERFECT BIND)</h5>

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
                                        <label for="">Tarikh</label>
                                        <input type="date" readonly name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Diperiksa oleh (Operator)</div>
                                        <input type="text" value="Admin" readonly name="" id=""
                                            class="form-control mt-1">
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select readonly name="" id="" class="form-control">
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
                                <!-- <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kuantiti SO</div>
                                        <input type="number" readonly value="Auto Display" name="" id=""
                                            class="form-control">
                                    </div>
                                </div> -->

                                    
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Jenis Penjilidan</label>
                                        <select readonly name="" id="" class="form-control">
                                            <option value="" disabled>select sales Order no</option>
                                            <option value="" selected>Perfect Bind</option>
                                            <option value="">Lock Bind</option>
                                            <option value="">Gather</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Operator</label>
                                        <select readonly name="" id="" class="form-control">
                                            <option value="" disabled>select sales Order no</option>
                                            <option value="" selected>User A</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Pembantu</label>
                                        <select readonly name="" id="" class="form-control">
                                            <option value="" disabled>select Pembantu (multi select)</option>
                                            <option value="" selected>B,C,D</option>
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
                                        <td>Koyakan fiber</td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Kedudukan Kulit buku dan teks</td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Artwork Kulit buku dan Teks</td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Turutan Seksyen/muka surat</td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Kedudukan gam (side gam)</td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Rosak/koyak</td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Kotor</td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Lain-lain</td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-5" style="background:#f1f0f0;">
                        <div class="col-md-12 mt-5">
                            <h5>C) Pemeriksaan semasa proses lipat </h5>
                            <h5><b>Petunjuk:</b></h5>
                            <span><b>KL = Kedudukan Lipatan</b></span><br>
                            <span><b> K= Koyak/Kotor/Kedut</b></span>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary float-right mb-5  mr-5">+ Add</button>
                        </div>

                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td rowspan="2">Jumlah </td>
                                        <td colspan="5s">Seksyen 1</td>       
                                        <td rowspan="2">Check (Operator)</td>
                                        <td rowspan="2">Username / datetime</td>
                                        <td rowspan="2">Verify</td>
                                        <td rowspan="2">Username / datetime</td>
                                        <td rowspan="2">Action</td>
                                    </tr>
                                    <tr>
                                        <th>Kedudukan Kulit buku  dan teks</th>
                                        <th>Artwork Kulit buku  dan teks</th>
                                        <th>Turutan Seksyen/ muta surat</th>
                                        <th>Rosak/Koyak</th>
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
                                        <td><button class="btn btn-primary" style="border-radius:5px; ">check</button>
                                        </td>
                                        <td>username / datetime</td>
                                        <td><button class="btn"
                                                style="border-radius:25px; background:#000; color:white; ">Verify</button>
                                        </td>
                                        <td>username / datetime</td>
                                        <td><button class="btn btn-danger" style="border-radius:5px; ">X</button></td>
                                    </tr>
                                </tbody>
                            </table>

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
        <a href="{{route('LaporanProsesPenjilidan.index')}}">back to list</a>
    </div>
</div>
</div>
@endsection

@section('Script')

@endsection