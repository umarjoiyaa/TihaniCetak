@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>LAPORAN PROSES PENCETAKANl</b></h5>
                            <p class="float-right">TCBS-B61 (Rev.0)</p>
                        </div>
                    </div>

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
                                        <div class="label">Checked By (Operator)</div>
                                        <input type="text" value="Admin" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select name="" id="" class="form-control">
                                            <option value="">select sales Order no</option>
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
                                        <div class="label">Seksyen No.</div>
                                        <input type="text" readonly placeholder="input text" name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kuantiti cetakan</div>
                                        <input type="number" readonly placeholder="input text" name="" id=""
                                            class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Kuantiti waste</label>
                                        <input type="text" readonly placeholder="input text" name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Operator</label>
                                        <select name="" multiple id="" class="form-control">
                                            <option value="">select sales Order no</option>
                                            <option value="" selected> A</option>
                                            <option value="" selected> B</option>
                                            <option value="" selected> C</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5><b>B) Pemeriksaan dan Pengesahan 1st Piece</b> </h5>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-7 mt-3">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">kriteria</th>
                                                <th colspan="3">cover</th>

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
                                                <td>Saiz produk (Ukur dan rujuk saiz pada Job Sheet)</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Artwork (Semak gambar dan teks)</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Kotor, calar (Periksa setiap muka surat)</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Jenis penjilidan (stitching, perfect bind, hardcover)</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Jumlah mukasurat (Rujuk Job Sheet dan file artwork)</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Turutan mukasurat (Berturutan)</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Kelekatan matt/gloss lamination</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Koyak (Terkoyak / Rosak)</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>

                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Imej/artwork terpotong</td>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td><input type="checkbox" checked name="" id=""></td>
                                                <td><input type="checkbox" name="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Cop (Cop pada setiap mockup)</td>
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

                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <h5><b>C) Pemeriksaan semasa proses Pencetakan</b></h5>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">Jumlah</th>
                                                    <th colspan="7">Kriteria</th>
                                                    <th rowspan="2">Check</th>
                                                    <th rowspan="2">Check (Operator)</th>
                                                    <th rowspan="2">Verify (QC)</th>
                                                    <th rowspan="2">Verify</th>
                                                    <th rowspan="2">Action</th>
                                                </tr>
                                                <tr>
                                                    <th>Gambar/teks</th>
                                                    <th>warna</th>
                                                    <th>Register depan belakang</th>
                                                    <th>Tiada set off, kotor, hickies</th>
                                                    <th>Tiada doubling</th>
                                                    <th>Periksa powder</th>
                                                    <th>Frontlay & sidelay</th>
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
                                                            style="border-radius:5px; ">check</button></td>
                                                    <td>username / datetime</td>
                                                    <td><button class="btn btn-primary">Verify</button>
                                                    </td>
                                                    <td>username / datetime</td>
                                                    <td><button class="btn btn-danger"
                                                            style="border-radius:5px; ">X</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-end mt-5">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button class="btn btn-danger mx-2">Decline</button>
                            <button class="btn btn-primary ">Approve</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="{{route('LoPoranProsesPencetakan.index')}}">back to list</a>
</div>
</div>
</div>
@endsection