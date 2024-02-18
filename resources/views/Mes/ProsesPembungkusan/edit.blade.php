@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5>LAPORAN PROSES PENJILIDAN (PERFECT BIND)</h5>

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
                                    <input type="text" value="auto Display" readonly name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Seksyen No.</div>
                                    <input type="text" readonly value="input text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Kuantiti cetakan</div>
                                    <input type="number" readonly value="input text" name="" id="" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="">Kuantiti waste</label>
                                    <input type="text" readonly value="input text" name="" id="" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="">Operator</label>
                                    <select name="" id="" class="form-control">
                                        <option value="" disabled>select sales Order no</option>
                                        <option value="">User A</option>
                                        <option value="">User B</option>
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
                                    <td colspan="4">Seksyen</td>

                                </tr>
                                <tr>
                                    <th>Jenis lipatan</th>
                                    <th>Kedudukan lipatan</th>
                                    <th>Turutan muka surat</th>
                                    <th>kotor/koyak</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>Saiz produk (Ukur dan rujuk saiz pada Job Sheet)</td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                </tr>
                                <tr>
                                    <td>Artwork (Semak gambar dan teks)</td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-5" style="background:#f1f0f0;">
                    <div class="col-md-12 mt-5">
                        <h5>Pemeriksaan semasa proses penjilidan </h5>

                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-primary float-right  mr-5">+ Add</button>
                    </div>

                    <div class="col-md-12">

                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-1">
                                    <ul class="nav nav-tabs flex-column" style="width:100%;" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab"
                                                aria-controls="home" aria-selected="true">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-md-11">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td rowspan="2">Jumlah </td>
                                                            <td colspan="2">Seksyen 1</td>
                                                            <td rowspan="2">Check</td>
                                                            <td rowspan="2">Username / datetime</td>
                                                            <td rowspan="2">Verify</td>
                                                            <td rowspan="2">Username / datetime</td>
                                                            <td rowspan="2">Action</td>
                                                        </tr>
                                                        <tr>
                                                            <th>KL</th>
                                                            <th>K</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1000</td>
                                                            <td><input type="checkbox" name="" id=""></td>
                                                            <td><input type="checkbox" name="" id=""></td>
                                                            <td><button class="btn btn-primary"
                                                                    style="border-radius:5px; ">check</button></td>
                                                            <td>username / datetime</td>
                                                            <td><button class="btn"
                                                                    style="border-radius:25px; background:#000; color:white; ">Verify</button>
                                                            </td>
                                                            <td>username / datetime</td>
                                                            <td><button class="btn btn-danger"
                                                                    style="border-radius:5px; ">X</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td rowspan="2">Jumlah </td>
                                                        <td colspan="2">Seksyen 1</td>
                                                        <td rowspan="2">Check</td>
                                                        <td rowspan="2">Username / datetime</td>
                                                        <td rowspan="2">Verify</td>
                                                        <td rowspan="2">Username / datetime</td>
                                                        <td rowspan="2">Action</td>
                                                    </tr>
                                                    <tr>
                                                        <th>KL</th>
                                                        <th>K</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1000</td>
                                                        <td><input type="checkbox" name="" id=""></td>
                                                        <td><input type="checkbox" name="" id=""></td>
                                                        <td><button class="btn btn-primary"
                                                                style="border-radius:5px; ">check</button></td>
                                                        <td>username / datetime</td>
                                                        <td><button class="btn"
                                                                style="border-radius:25px; background:#000; color:white; ">Verify</button>
                                                        </td>
                                                        <td>username / datetime</td>
                                                        <td><button class="btn btn-danger"
                                                                style="border-radius:5px; ">X</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>





                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary float-right mt-3">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{route('LoPoranProsesLipat.index')}}">back to list</a>
</div>
@endsection

@section('Script')

@endsection