@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>LAPORAN PEMERIKSAAN KUALITI - PEMOTONGAN KULIT BUKU/ TEKS</b></h5>
                            <p class="float-right">TCBS-B23 (Rev.5)</p>
                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="date" readonly name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Time</div>
                                        <input type="time" value="Admin" readonly name="" id=""
                                            class="form-control mt-1">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Checked By</div>
                                        <input type="text" value="Admin" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Sales Order No</div>
                                        <select name="" id="" readonly class="form-control">
                                            <option value="" disabled>select sales Order no</option>
                                            <option value="" selected>SO-001496</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text" value="IQRO'GENIUS - RUMI" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" readonly value="CP-2490" name="" id="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5 mt-5">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">Kriteria</th>
                                                    <th colspan="3">Tanda bagi yang berkenaan</th>

                                                </tr>
                                                <tr>
                                                    <th>OK</th>
                                                    <th>NG</th>
                                                    <th>NA</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td style="background:wheat;">Susunan Turutan</td>
                                                    <td><input type="checkbox" name="" id=""></td>
                                                    <td><input type="checkbox" checked name="" id=""></td>
                                                    <td><input type="checkbox" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Turutan Muka Surat</td>
                                                    <td><input type="checkbox" name="" id=""></td>
                                                    <td><input type="checkbox" checked name="" id=""></td>
                                                    <td><input type="checkbox" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Masalah cetakan</td>
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
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <h5><b>Nota :</b></h5>
                            <span>*Pemeriksaan kelekatan OPP lamination perlu dilakukan sebelum proses pemotongan kulit
                                buku dibuat. <br>
                                *Ambil 3 keping sampel bagi setiap palet secara rawak dari bahagian atas, tengah dan
                                bawah untuk pemeriksaan kelekatan OPP Lamination. Jika hasil pemeriksaan gagal,
                                maklumkan kepada Eksekutif QA/ Pengurus Operasi untuk tindakan lanjut. Rujuk
                                Perbandingan Kelekatan OPP. </span>
                        </div>
                    </div>


                    <div class="row mt-5">
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
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('ProsesPemotonganKulitBuku.index')}}"><i class="ti-angle-left mr-5 $indigo-100"></i>
                back to list</a>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('Script')

@endsection