@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>LAPORAN PEMERIKSAAN KUALITI - PROSES THREE KNIFE</b></h5>
                            <p class="float-right">TCBS-B23 (Rev.5)</p>
                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0;">
                        <d<div class="card-body">

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
                                        <input type="text" readonly value="Admin" name="" id="" class="form-control">
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
                                        <input type="text" value="auto display " readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" readonly value="auto display" name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Mesin</div>
                                        <input type="text" value="Tk1" readonly name="" id="" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <label for="">Jumlah Seksyen</label>
                                        <input type="text" readonly value="auto display (based So)" name="" id=""
                                            class="form-control">
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
                                                    <th colspan="2">Tanda bagi yang berkenaan</th>

                                                </tr>
                                                <tr>
                                                    <th>OK</th>
                                                    <th>NG</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td style="background:wheat;">saiz yang betul</td>
                                                    <td><input type="checkbox"  name="" id=""></td>
                                                    <td><input type="checkbox" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Kedudukan potongan</td>
                                                    <td><input type="checkbox"  name="" id=""></td>
                                                    <td><input type="checkbox" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>teks tidak terpotong</td>
                                                    <td><input type="checkbox"  name="" id=""></td>
                                                    <td><input type="checkbox" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Kepetekan / squareness</td>
                                                    <td><input type="checkbox"  name="" id=""></td>
                                                    <td><input type="checkbox" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Potongan yang bersih</td>
                                                    <td><input type="checkbox"  name="" id=""></td>
                                                    <td><input type="checkbox" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Turutan muka surat</td>
                                                    <td><input type="checkbox"  name="" id=""></td>
                                                    <td><input type="checkbox" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Kotor</td>
                                                    <td><input type="checkbox"  name="" id=""></td>
                                                    <td><input type="checkbox" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Koyak</td>
                                                    <td><input type="checkbox"  name="" id=""></td>
                                                    <td><input type="checkbox" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Melekat</td>
                                                    <td><input type="checkbox"  name="" id=""></td>
                                                    <td><input type="checkbox" checked name="" id=""></td>
                                                </tr>

                                                <tr>
                                                    <td>Calar</td>
                                                    <td><input type="checkbox"  name="" id=""></td>
                                                    <td><input type="checkbox" checked name="" id=""></td>
                                                </tr>

                                                <tr>
                                                    <td>Kemik</td>
                                                    <td><input type="checkbox"  name="" id=""></td>
                                                    <td><input type="checkbox" checked name="" id=""></td>
                                                </tr>

                                                <tr>
                                                    <td>Label yang betul</td>
                                                    <td><input type="checkbox"  name="" id=""></td>
                                                    <td><input type="checkbox" checked name="" id=""></td>
                                                </tr>

                                                <tr>
                                                    <td>Pematuhan SOP</td>
                                                    <td><input type="checkbox"  name="" id=""></td>
                                                    <td><input type="checkbox" checked name="" id=""></td>
                                                </tr>



                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <h5><b>Nota :</b></h5>
                            <span>Pemeriksaan hanya dilakukan sekali semasa pengesahan 1st piece dan tidak perlu
                                dilakukan semasa proses</span>
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
            <a href="{{route('ProsesThreeKnife.index')}}"><i class="ti-angle-left mr-5 $indigo-100"></i>
                back to list</a>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('Script')

@endsection