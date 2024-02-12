 public function Create(){
        return view('Mes.LoPoranProsesPencetakan.create');
    }@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>LAPORAN PROSES LIPAT</h5>

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
                                        <div class="label">Seksyen No.</div>
                                        <input type="text" readonly value="input text" name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kuantiti cetakan</div>
                                        <input type="number" readonly value="input text" name="" id=""
                                            class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Kuantiti waste</label>
                                        <input type="text" readonly value="input text" name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Operator</label>
                                        <select name="" readonly id="" class="form-control">
                                            <option value="" disabled>select sales Order no</option>
                                            <option value="">User A</option>
                                            <option value="">User B</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row" style="background:#f1f0f0;">
                        <div class="col-md-5">
                            <h5>B) Pemeriksaan dan Pengesahan 1st Piece </h5>
                        </div>
                        <div class="col-md-11 mt-5">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td rowspan="2">No</td>
                                        <td rowspan="2">kriteria</td>
                                        <td colspan="3">cover</td>

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

                    <div class="row mt-5" style="background:#f1f0f0;">
                        <div class="col-md-12 mt-3">
                            <h5>C) Pemeriksaan semasa proses Pencetakan</h5>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td rowspan="2">Jumlah</td>
                                            <td colspan="7">Kriteria</td>
                                            <td rowspan="2">Check</td>
                                            <td rowspan="2">Check (Operator)</td>
                                            <td rowspan="2">Verify (QC)</td>
                                            <td rowspan="2">Verify</td>
                                            <td rowspan="2">Action</td>
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

                    <!-- <div class="row d-flex justify-content-end mt-5">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button class="btn btn-danger mx-2">Decline</button>
                            <button class="btn btn-primary ">Approve</button>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <a href="{{route('LoPoranProsesPencetakan.index')}}">back to list</a>
</div>
</div>
</div>
@endsection