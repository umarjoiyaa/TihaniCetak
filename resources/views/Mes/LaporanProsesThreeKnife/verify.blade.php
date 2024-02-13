@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><b>LAPORAN PROSES THREE KNIFE</b></h3>

                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4><b>A) Informasi</b></h4>
                                </div>

                            </div>
                            <div class="row mt-5">
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
                                            <option value="" >select sales Order no</option>
                                            <option value="" selected>SO-001496</option>
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
                                        <div class="label">Saiz Buku</div>
                                        <input type="text" readonly placeholder="Auto Display (based SO)" name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kuantiti SO</div>
                                        <input type="number" readonly placeholder="Auto Display (based On SO)" name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Good Count (Optional)</label>
                                        <input type="text" placeholder="inpute text" readonly name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for=""> Operator</label>
                                        <select name="" readonly id="" class="form-control">
                                            <option value="" >Pilih Operator (multi-select)</option>
                                            <option value="" selected>Operator A</option>
                                        </select>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="row mt-5" style="background:#f1f0f0;">
                        <div class="col-md-12 mt-5">
                            <h6><b>B) Pemeriksaan dan Pengesahan 1st Piece</b> </h6>
                        </div>
                        <div class="col-md-8 mt-5">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Kriteria</th>
                                        <th colspan="4">Status</th>

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
                                        <td>Saiz yg betul</td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Kedudukan potongan yang betul</td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Teks tidak terpotong</td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Turutan Seksyen/muka surat</td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Kepetakan/squareness</td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>potongan yang bersih</td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Turutan muka surat</td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Kotor</td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Koyak</td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Melekat</td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Calar/kemik</td>
                                        <td><input type="checkbox"  name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-5" style="background:#f1f0f0;">
                        <div class="col-md-12 mt-5">
                            <h6><b>C) Pemeriksaan semasa proses potong</b> </h6>

                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary float-right mr-5">+ Add</button>
                        </div>

                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Jumlah </th>
                                            <th colspan="10">Kriteria</th>
                                            <th rowspan="2">Check </th>
                                            <th rowspan="2">Username / datetime</th>
                                            <th rowspan="2">Verify</th>
                                            <th rowspan="2">Username / datetime</th>
                                            <th rowspan="2">Action</th>
                                        </tr>
                                        <tr>
                                            <th>Kedudukan potongan yang betul</th>
                                            <th>Teks tidak terpotong</th>
                                            <th>Kepetakan/Sequareness</th>
                                            <th>potongan yang bersih</th>
                                            <th>Turutan muka surat</th>
                                            <th>Kotor</th>
                                            <th>Koyak</th>
                                            <th>Melekat</th>
                                            <th>calar</th>
                                            <th>kemik</th>
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
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><button class="btn btn-primary"
                                                    style="border-radius:5px; ">check</button>
                                            </td>
                                            <td>username / datetime</td>
                                            <td><button class="btn btn-primary">Verify</button>
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





                    <div class="row d-flex justify-content-end">
                        <div class="col-md-12 d-flex justify-content-end">
                        <button class="btn btn-primary float-right mt-3">Decline</button>
                            <button class="btn btn-primary float-right mt-3">Approve</button>
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

@section('Script')

@endsection