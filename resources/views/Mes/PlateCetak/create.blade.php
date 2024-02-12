@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left">REKOD PEMERIKSAAN PLATE CETAK </h5>
                            <p class="float-right">TCSB-B44 (Rev .2)</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <div class="form-group">
                                <label for="">Tarikh</label>
                                <input type="date" readonly name="" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Masa</label>
                            <input type="time" value="Admin" readonly name="" id="" class="form-control">
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="form-group">
                                <div class="label">Diperiksa oleh</div>
                                <input type="text" value="Admin" readonly name="" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="label">Sales Order No.</div>
                                <select name="" id="" readonly class="form-control">
                                    <option value="" disabled>select sales Order no</option>
                                    <option value="" selected>SO-001496</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="label">Tajuk</div>
                                <input type="text" readonly value="IQRO’ GENIUS - RUMI (NEW COVER)" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="label">Kod Buku</div>
                                <input type="text" value="auto Display" readonly name="" id="" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <h5><b>PEMERIKSAAN PLATE CETAK   </b></h5>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""></label>
                                <select name="" id="" class="form-control">
                                    <option value="">philih Mesin</option>
                                    <option value="">p1</option>
                                    <option value="">P2</option>
                                    <option value="">P3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""></label>
                                <input type="number" name="" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""></label>
                                <select name="" id="" class="form-control">
                                    <option value="">philih Mesin</option>
                                    <option value="">A</option>
                                    <option value="">B</option>
                                    <option value="">A/B</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-10 mt-3">
                            <table class="table" border="1">
                                <thead>
                                    <tr>
                                        <td colspan="6">Warna</td>
                                        <td rowspan="2">Gripper</td>
                                        <td rowspan="2">Spacing</td>
                                        <td rowspan="2">Kedudukan Image/gambar</td>
                                        <td rowspan="2">Calar</td>
                                        <td rowspan="2">Kotor</td>
                                        <td rowspan="2">Pemeriksaan artwork (untuk cetakan yang melebihi 1 up)</td>
                                    </tr>
                                    <tr>
                                        <th>C</th>
                                        <th>M</th>
                                        <th>Y</th>
                                        <th>K</th>
                                        <th>P1</th>
                                        <th>P2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="text" name="" id="" class="form-control"></td>
                                        <td><input type="text" name="" id="" class="form-control"></td>
                                        <td><input type="text" name="" id="" class="form-control"></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h5><b>Nota</b></h5>
                            <span>
                                Periksa setiap plate cetak yang keluar dari plate processor mengikut kriteria yang ditetapkan diatas
                            </span>
                        </div>
                        <div class="col-md-12">
                            <table class="table" border='1'>
                                <thead>
                                    <tr>
                                        <td colspan="2">Mesin</td>
                                        <th>Saiz Gripper</th>
                                        <th>Saiz plate</th>
                                        <th>Kedudukan tengah (mm)</th>
                                        <th>Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>P1</td>
                                        <td>8C</td>
                                        <td>52mm</td>
                                        <td>1030 X 800</td>
                                        <td>515</td>
                                        <td class="text-center">-</td>
                                    </tr>
                                    <tr>
                                        <td>P3</td>
                                        <td>2C</td>
                                        <td>60mm</td>
                                        <td>1030 X 770</td>
                                        <td>515</td>
                                        <td class="text-center">-</td>
                                    </tr>
                                    <tr>
                                        <td>P4</td>
                                        <td>4C</td>
                                        <td rowspan="2">
                                            28mm
                                        </td>
                                        <td>
                                            910 X 665
                                        </td>
                                        <td>455</td>
                                        <td class="text-center">1. Tambahan 5mm gripper margin jika cetakan ada hotstamping yang meliputi kawasan gripper.</td>
                                    </tr>
                                </tbody>
                            </table>
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
        <a href="{{route('PlateCetak.index')}}">back to list</a>
    </div>
</div>
</div>
@endsection