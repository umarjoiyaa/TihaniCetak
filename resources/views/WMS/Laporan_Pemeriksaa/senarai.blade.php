@extends('app')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Senarai Semak Pram Cetak</h5>
            </div>
            <div class="card-body">
                <div class="card" style="background:#f6f7f7;">
                    <div class="card-body">
                        <h5>h) Rekod Pemeriksaan AQL</h5>
                        <div class="row mt-5">
                            <div class="col-md-4">
                                <label for="">Jumlah palet</label>
                                <input type="number" class="form-control">
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <table class="table table-bordered mt-3">
                                    <thead>
                                        <tr>
                                            <th>Palet No.</th>
                                            <th>Palte 1</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>kuantiti bagi setiap palet</td>
                                            <td><input type="text" class="form-control" placeholder="User Input"></td>
                                        </tr>
                                        <tr>
                                            <td>Kualiti sample</td>
                                            <td><input type="text" class="form-control" placeholder="User Input"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <h5>Keputusan Pemeriksaan</h5>
                                <table class="table table-bordered mt-3">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th>Palet 1</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Kotor</td>
                                            <td><input type="text" placeholder="input intenger" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Cetaken doubling</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Senget</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Rosak/Koyak</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Teks terpontong</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Muka surat tidak cukup</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Endpaper/cover paper terblaik</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>tiada cetaken</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Cover Lari</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>masalah UV Tarnish</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Gam tidak cukup</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Teks-terlipat</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Lain-Lain</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Reject</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>permeriksaan 100%</td>
                                            <td><label for="">yes</label><input type="radio" name=""
                                                    placeholder="Input integer" id=""><label for="">no</label></td>
                                        </tr>
                                        <tr>
                                            <td>Diperiksa Oleh</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Disahkan Oleh</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <h5><b>Nota:</b></h5>
                                <p>1. Kuantiti sample berdasarkan Pelan Persamplean Rawak, AQL 0.25, Pemeriksaan Am
                                    Tahap II (Rujuk jadual AQL).</p>
                                <p>2. Jika keputusan pemeriksaan persamplean rawak gagal, pemeriksaan 100% hendaklah
                                    dilalkukan bagi palet yang terlibat.</p>
                            </div>
                        </div>
                    </div>
                    Nota:


                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary float-right">save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection