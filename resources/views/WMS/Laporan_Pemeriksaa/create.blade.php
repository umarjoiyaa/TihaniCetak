@extends('app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Laporan Pemeriksaan AKHIR,PEMBUNGKUSAN DAN PENGHANTARAN KE STORE</h3>
            </div>
            <div class="card-body">
                <div class="card" style="background:#f6f7f7;">
                    <div class="card-body">
                        <h5>A) Informasi</h5>
                        <div class="row">

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Tarikh</div>
                                    <input type="date" readonly value="Auto Display" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Diperiksa Oleh</div>
                                    <input type="text" readonly value="Admin" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Search Sales Order No.</div>
                                    <select readonly name="" id="" class="form-control">
                                        <option value="">Search Sales Order no</option>
                                        <option value="">SO - 001387</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Tajuk</div>
                                    <input type="text" readonly placeholder="Auto Display" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Kod Buku</div>
                                    <input type="text" value="Auto Display" readonly class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="label">Pelanggan</div>
                                    <input type="text" value="Auto Display" readonly class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Operator</div>
                                    <select name="" id="" class="form-control">
                                        <option value="" disabled>Select Operator</option>
                                        <option value="">Operator A</option>
                                        <option value="">Operator B</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Di bungkus oleh </div>
                                    <select name="" id="" class="form-control">
                                        <option value="" disabled>Select Operator</option>
                                        <option value="">Operator A</option>
                                        <option value="">Operator B</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary float-right mb-2" class="btn btn-primary"
                                    data-toggle="modal" data-target="#exampleModal">+ Add Product</button>
                            </div>
                        </div>
                        <button type="submit" class="mt-3 btn btn-primary float-right">Save</button>
                    </div>
                </div>

                <div class="card" style="background:#f6f7f7;">
                    <div class="card-body">
                        <h5>B) Pembersihan Kawasan kejra</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th>Tanda bagi yang bekenaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Label Produk Sebelum Dibaung</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Baki kuantiti produk Sebelum disimpan</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Reject dikuarantin ditempat lain/dibuang</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card" style="background:#f6f7f7;">
                    <div class="card-body">
                        <h5>C) Pengesahan kuantiti</h5>
                        <div class="row mt-5">
                            <div class="col-md-1">
                                <input type="checkbox" name="" id="">
                            </div>
                            <div class="col-md-2">
                                <h6>kuantiti setiap bungkusan:</h6>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-md-2">naskah/helai</div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-1">
                                <input type="checkbox" name="" id="">
                            </div>
                            <div class="col-md-2">
                                <h6>Berat 1 bungkusan/kotak:</h6>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-md-2">kg</div>
                        </div>
                    </div>
                </div>

                <div class="card" style="background:#f6f7f7;">
                    <div class="card-body">
                        <h5>D) Pelekat Hologram (jika ada)</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th>Tanda bagi yang bekenaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Menggunakan Pelekat Hologram</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Lokasi yang betul</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card" style="background:#f6f7f7;">
                    <div class="card-body">
                        <h5>E) Pengesahan label</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th>Tanda bagi yang bekenaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Nama Pelanggan</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Kod Buku dab Tajuk</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>kuantiti</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>

                                        <tr>
                                            <td>No ISBN (Jika ada)</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>NO KK (jika ada)</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Berat (jika ada)</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card" style="background:#f6f7f7;">
                    <div class="card-body">
                        <h5>F) Lain-lain </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th>Tanda bagi yang bekenaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Bookmark</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>shirnk wrap</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>poster / leaflet</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="" id=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card" style="background:#f6f7f7;">
                    <div class="card-body">
                        <h5>G) Jenis masalah yang terlibate </h5>
                        <div class="table-reponsive">
                            <table class="table table-bordered mt-5">
                                <thead>
                                    <tr>
                                        <th>Kriteria</th>
                                        <th>Subkontraktor</th>
                                        <th>Jumlah</th>
                                        <th>Disahkan oleh (QA/QC)</th>
                                        <th>Disahkan oleh (QA/QC)</th>
                                        <th>TCSB</th>
                                        <th>Jumlah</th>
                                        <th>Disahkan oleh (QA/QC)</th>
                                        <th>Disahkan oleh (QA/QC)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Kotor</td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td>cetakan doubling</td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td>Senget</td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td>Roask/Koyak</td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td>Teks terpoting</td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td>Mukasurat tidak cukup</td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td>Endpaper /cover terbalik</td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td>tiada cetakan</td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td>Cover lari</td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td>Gam tidak cukup</td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td>Teks terlipat</td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td>Lain-Lain</td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><input type="text" placeholder="input teks" class="form-control"></td>
                                        <td><button class="btn btn-primary">Check</button></td>
                                        <td><input type="text" placeholder="Username /date" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{route('Laporan_Pemeriksaan.senarai')}}"
                                class="btn btn-primary float-right mt-3">Rekod Pemeriksaan AQL</a>

                            <div class="row">
                                <div class="col-md-2">kuantiti saip:</div>
                                <div class="col-md-2">
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <select name="" id="" class="form-control">
                                        <option value=""></option>
                                        <option value="">Naskah</option>
                                        <option value="">Helai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 mt-5"><input type="text" name="" id="" class="form-control"></div>
                                <div class="col-md-2 mt-5">
                                    <h5>Bungkusan</h5>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Save</button>
                        </div>
                    </div>
                </div>

                <a href="{{route('stock_Transfer_location.index')}}" class="">Back to list</a>

            </div>

        </div>

    </div>




    @endsection