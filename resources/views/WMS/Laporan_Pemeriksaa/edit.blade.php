@extends('layouts.app')

@section('content')

    <form action="{{ route('laporan_pemeriksaan.update', $laporan_pemeriksaan_akhir->id) }}" method="POST">
        @csrf
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
                                            <label for="">Tarikh</label>
                                            <input type="text" name="date"
                                                value="{{ $laporan_pemeriksaan_akhir->date }}"
                                                class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                                placeholder="dd-mm-yyyy">

                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Diperiksa oleh (Operator)</div>
                                            <input type="text" value="{{ $laporan_pemeriksaan_akhir->user->full_name }}" readonly
                                                name="" id="checked_by" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Sales Order No.</div>
                                            <select name="sale_order" data-id="{{ $laporan_pemeriksaan_akhir->sale_order_id }}"
                                                id="sale_order" class="form-control">
                                                <option value="{{ $laporan_pemeriksaan_akhir->sale_order_id }}" selected
                                                    style="color: black; !important">
                                                    {{ $laporan_pemeriksaan_akhir->sale_order->order_no }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Tajuk</div>
                                            <input type="text" readonly value="" id="tajuk"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Kod Buku</div>
                                            <input type="text" value="" readonly name="" id="kod_buku"
                                                class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Operator</label>
                                            @php
                                        $item = json_decode($laporan_pemeriksaan_akhir->user_id);
                                        @endphp
                                        <select name="user[]" class="form-control form-select" id="" multiple>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @if ($item) {{ in_array($user->id, $item) ?
                                                'selected' : '' }} @endif>
                                                {{ $user->full_name }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Di Bungkus Oleh</label>
                                            @php
                                            $item = json_decode($laporan_pemeriksaan_akhir->di_bungkus_oleh);
                                        @endphp
                                        <select name="user[]" class="form-control form-select" id="" multiple>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @if ($item) {{ in_array($user->id, $item) ?
                                                'selected' : '' }} @endif>
                                                {{ $user->full_name }}</option>
                                            @endforeach
                                        </select>

                                        </div>
                                    </div>

                                </div>






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
                                                    <td class="text-center d-flex justify-content-center"><input
                                                            type="checkbox" name="b_1" @checked($laporan_pemeriksaan_akhir->b_1 != null) id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Baki kuantiti produk Sebelum disimpan</td>
                                                    <td class="text-center d-flex justify-content-center"><input
                                                            type="checkbox" name="b_2" @checked($laporan_pemeriksaan_akhir->b_2 != null) id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Reject dikuarantin ditempat lain/dibuang</td>
                                                    <td class="text-center d-flex justify-content-center"><input
                                                            type="checkbox" name="b_3" @checked($laporan_pemeriksaan_akhir->b_2 != null) id=""></td>
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
                                        <input type="checkbox" name="c_1"  id="c_1" @checked($laporan_pemeriksaan_akhir->c_1 != null)  id="">
                                    </div>
                                    <div class="col-md-2">
                                        <h6>kuantiti setiap bungkusan:</h6>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="c_kuantiti_1" id="c_kuantiti_1" @disabled($laporan_pemeriksaan_akhir->c_1 == null) value="{{$laporan_pemeriksaan_akhir->c_kuantiti_1 }}"   id="" class="form-control">
                                    </div>
                                    <div class="col-md-2">naskah/helai</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-1">
                                        <input type="checkbox" name="c_2" id="c_2" @checked($laporan_pemeriksaan_akhir->c_2 != null)  id="">
                                    </div>
                                    <div class="col-md-2">
                                        <h6>Berat 1 bungkusan/kotak:</h6>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="c_berat_2" id="c_berat_2" value="{{$laporan_pemeriksaan_akhir->c_berat_2 }}" @disabled($laporan_pemeriksaan_akhir->c_2 == null) id="" class="form-control">
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
                                                    <td class="text-center d-flex justify-content-center"><input
                                                            type="checkbox" name="d_1" @checked($laporan_pemeriksaan_akhir->d_1 != null) id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Lokasi yang betul</td>
                                                    <td class="text-center d-flex justify-content-center"><input
                                                            type="checkbox" name="d_2" @checked($laporan_pemeriksaan_akhir->d_2 != null) id=""></td>
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
                                                    <td class="text-center d-flex justify-content-center"><input
                                                            type="checkbox" name="e_1" @checked($laporan_pemeriksaan_akhir->e_1 != null) id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Kod Buku dab Tajuk</td>
                                                    <td class="text-center d-flex justify-content-center"><input
                                                            type="checkbox" name="e_2" @checked($laporan_pemeriksaan_akhir->e_2 != null) id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>kuantiti</td>
                                                    <td class="text-center d-flex justify-content-center"><input
                                                            type="checkbox" name="e_3" @checked($laporan_pemeriksaan_akhir->e_3 != null) id=""></td>
                                                </tr>

                                                <tr>
                                                    <td>No ISBN (Jika ada)</td>
                                                    <td class="text-center d-flex justify-content-center"><input
                                                            type="checkbox" name="e_4" @checked($laporan_pemeriksaan_akhir->e_4 != null) id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>NO KK (jika ada)</td>
                                                    <td class="text-center d-flex justify-content-center"><input
                                                            type="checkbox" name="e_5" @checked($laporan_pemeriksaan_akhir->e_5 != null) id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Berat (jika ada)</td>
                                                    <td class="text-center d-flex justify-content-center"><input
                                                            type="checkbox" name="e_6" @checked($laporan_pemeriksaan_akhir->e_6 != null) id=""></td>
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
                                                    <td class="text-center d-flex justify-content-center"><input
                                                            type="checkbox" name="f_1" @checked($laporan_pemeriksaan_akhir->f_2 != null) id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>shirnk wrap</td>
                                                    <td class="text-center d-flex justify-content-center"><input
                                                            type="checkbox" name="f_2" @checked($laporan_pemeriksaan_akhir->f_2 != null) id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>poster / leaflet</td>
                                                    <td class="text-center d-flex justify-content-center"><input
                                                            type="checkbox" name="f_3" @checked($laporan_pemeriksaan_akhir->f_2 != null) id=""></td>
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
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mt-3">
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
                                                    <td><input type="text" class="form-control" name="subkontraktor_1"
                                                            value="{{ $laporan_pemeriksaan_akhir_section->subkontraktor_1  }}" style="width:200px ;">
                                                    </td>
                                                    <td><input type="text" class="form-control" name="jumlah_1"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->jumlah_1  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_1" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_1 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_1"
                                                            name="disahkan_oleh_1" value="{{ $laporan_pemeriksaan_akhir_section->disahkan_oleh_1  }}"
                                                            readonly style="width:360px ;"></td>
                                                    <td><input type="text" class="form-control" name="tcsb_1"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->tcsb_1  }}" style="width:200px ;"></td>
                                                    <td><input type="text" class="form-control" name="jumlah_2"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->jumlah_2  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_2"  @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_2 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_2" readonly
                                                        value="{{ $laporan_pemeriksaan_akhir_section->disahkan_oleh_2  }}" name="disahkan_oleh_2"
                                                            style="width:360px ;"></td>
                                                </tr>

                                                <tr>
                                                    <td>cetakan doubling</td>
                                                    <td><input type="text" class="form-control" name="subkontraktor_2"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->subkontraktor_2  }}" style="width:200px ;">
                                                    </td>
                                                    <td><input type="text" class="form-control" name="jumlah_3"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->jumlah_3  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_1"  @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_3 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_1"
                                                            name="disahkan_oleh_3" value="{{ $laporan_pemeriksaan_akhir_section->disahkan_oleh_3  }}"
                                                            readonly style="width:360px ;"></td>
                                                    <td><input type="text" class="form-control" name="tcsb_2"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->tcsb_2  }}" style="width:200px ;"></td>
                                                    <td><input type="text" class="form-control" name="jumlah_4"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->jumlah_4  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_2"  @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_4 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_2" readonly
                                                        value="{{ $laporan_pemeriksaan_akhir_section->disahkan_oleh_4  }}" name="disahkan_oleh_4"
                                                            style="width:360px ;"></td>
                                                </tr>

                                                <tr>
                                                    <td>Senget</td>
                                                    <td><input type="text" class="form-control" name="subkontraktor_3"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->subkontraktor_3  }}" style="width:200px ;">
                                                    </td>
                                                    <td><input type="text" class="form-control" name="jumlah_5"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->jumlah_5  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_1" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_5 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_1"
                                                            name="disahkan_oleh_5" value="{{ $laporan_pemeriksaan_akhir_section->disahkan_oleh_5  }}"
                                                            readonly style="width:360px ;"></td>
                                                    <td><input type="text" class="form-control" name="tcsb_3"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->tcsb_3  }}" style="width:200px ;"></td>
                                                    <td><input type="text" class="form-control" name="jumlah_6"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->jumlah_6  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_2" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_6 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_2" readonly
                                                        value="{{ $laporan_pemeriksaan_akhir_section->disahkan_oleh_6  }}" name="disahkan_oleh_6"
                                                            style="width:360px ;"></td>
                                                </tr>

                                                <tr>
                                                    <td>Roask/Koyak</td>
                                                    <td><input type="text" class="form-control" name="subkontraktor_4"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->subkontraktor_4  }}" style="width:200px ;">
                                                    </td>
                                                    <td><input type="text" class="form-control" name="jumlah_7"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->jumlah_7  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_1" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_7 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_1"
                                                            name="disahkan_oleh_7"  value="{{ $laporan_pemeriksaan_akhir_section->disahkan_oleh_7  }}"
                                                            readonly style="width:360px ;"></td>
                                                    <td><input type="text" class="form-control" name="tcsb_4"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->tcsb_4  }}" style="width:200px ;"></td>
                                                    <td><input type="text" class="form-control" name="jumlah_8"
                                                            v value="{{ $laporan_pemeriksaan_akhir_section->jumlah_8  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_2" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_8 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_2" readonly
                                                        value="{{ $laporan_pemeriksaan_akhir_section->disahkan_oleh_8  }}" name="disahkan_oleh_8"
                                                            style="width:360px ;"></td>
                                                </tr>

                                                <tr>
                                                    <td>Teks terpotong</td>
                                                    <td><input type="text" class="form-control" name="subkontraktor_5"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->subkontraktor_5  }}" style="width:200px ;">
                                                    </td>
                                                    <td><input type="text" class="form-control" name="jumlah_9"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->jumlah_9  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_1" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_9 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_1"
                                                            name="disahkan_oleh_9" value="{{ $laporan_pemeriksaan_akhir_section->disahkan_oleh_9  }}"
                                                            readonly style="width:360px ;"></td>
                                                    <td><input type="text" class="form-control" name="tcsb_5"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->tcsb_5  }}" style="width:200px ;"></td>
                                                    <td><input type="text" class="form-control" name="jumlah_10"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->jumlah_10  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_2" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_10 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_2" readonly
                                                        value="{{ $laporan_pemeriksaan_akhir_section->disahkan_oleh_10  }}" name="disahkan_oleh_10"
                                                            style="width:360px ;"></td>
                                                </tr>

                                                <tr>
                                                    <td>Mukasurat tidak cukup</td>
                                                    <td><input type="text" class="form-control" name="subkontraktor_6"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->subkontraktor_6  }}" style="width:200px ;">
                                                    </td>
                                                    <td><input type="text" class="form-control" name="jumlah_11"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->jumlah_11  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_1" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_11 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_1"
                                                            name="disahkan_oleh_11" value="{{ $laporan_pemeriksaan_akhir_section->disahkan_oleh_11  }}"
                                                            readonly style="width:360px ;"></td>
                                                    <td><input type="text" class="form-control" name="tcsb_6"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->tcsb_6  }}" style="width:200px ;"></td>
                                                    <td><input type="text" class="form-control" name="jumlah_12"
                                                        value="{{ $laporan_pemeriksaan_akhir_section->jumlah_12  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_2" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_12 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_2" readonly
                                                        value="{{ $laporan_pemeriksaan_akhir_section->disahkan_oleh_12  }}" name="disahkan_oleh_12"
                                                            style="width:360px ;"></td>
                                                </tr>

                                                <tr>
                                                    <td>Endpaper /cover terbalik</td>
                                                    <td><input type="text" class="form-control" name="subkontraktor_7"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->subkontraktor_7  }}" style="width:200px ;">
                                                    </td>
                                                    <td><input type="text" class="form-control" name="jumlah_13"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->jumlah_13  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_1" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_13 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_1"
                                                            name="disahkan_oleh_13" value="{{ $laporan_pemeriksaan_akhir_section2->disahkan_oleh_13  }}"
                                                            readonly style="width:360px ;"></td>
                                                    <td><input type="text" class="form-control" name="tcsb_7"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->tcsb_7  }}" style="width:200px ;"></td>
                                                    <td><input type="text" class="form-control" name="jumlah_14"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->jumlah_14  }}"style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_2" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_14 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_2" readonly
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->disahkan_oleh_14  }}" name="disahkan_oleh_14"
                                                            style="width:360px ;"></td>
                                                </tr>

                                                <tr>
                                                    <td>tiada cetakan</td>
                                                    <td><input type="text" class="form-control" name="subkontraktor_8"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->subkontraktor_8  }}" style="width:200px ;">
                                                    </td>
                                                    <td><input type="text" class="form-control" name="jumlah_15"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->jumlah_15  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_1" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_15 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_1"
                                                            name="disahkan_oleh_15"  value="{{ $laporan_pemeriksaan_akhir_section2->disahkan_oleh_15  }}"
                                                            readonly style="width:360px ;"></td>
                                                    <td><input type="text" class="form-control" name="tcsb_8"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->tcsb_8  }}" style="width:200px ;"></td>
                                                    <td><input type="text" class="form-control" name="jumlah_16"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->jumlah_16  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_2" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_16!= null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_2" readonly
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->disahkan_oleh_16  }}"
                                                            name="disahkan_oleh_16" style="width:360px ;"></td>
                                                </tr>

                                                <tr>
                                                    <td>Cover lari</td>
                                                    <td><input type="text" class="form-control" name="subkontraktor_9"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->subkontraktor_9  }}" style="width:200px ;">
                                                    </td>
                                                    <td><input type="text" class="form-control" name="jumlah_17"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->jumlah_17  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_1" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_17 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_1"
                                                            name="disahkan_oleh_17"
                                                            value="{{ $laporan_pemeriksaan_akhir_section2->disahkan_oleh_17  }}" readonly
                                                            style="width:360px ;"></td>
                                                    <td><input type="text" class="form-control" name="tcsb_9"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->tcsb_9  }}" style="width:200px ;"></td>
                                                    <td><input type="text" class="form-control" name="jumlah_18"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->jumlah_18  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_2" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_18 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_2" readonly
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->disahkan_oleh_18  }}"
                                                            name="disahkan_oleh_18" style="width:360px ;"></td>
                                                </tr>

                                                <tr>
                                                    <td>Gam tidak cukup</td>
                                                    <td><input type="text" class="form-control"
                                                            name="subkontraktor_10"
                                                            value="{{ $laporan_pemeriksaan_akhir_section2->subkontraktor_10  }}" style="width:200px ;">
                                                    </td>
                                                    <td><input type="text" class="form-control" name="jumlah_19"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->jumlah_19  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_1" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_19 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_1"
                                                            name="disahkan_oleh_19"
                                                            value="{{ $laporan_pemeriksaan_akhir_section2->disahkan_oleh_19  }}" readonly
                                                            style="width:360px ;"></td>
                                                    <td><input type="text" class="form-control" name="tcsb_10"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->tcsb_10  }}" style="width:200px ;"></td>
                                                    <td><input type="text" class="form-control" name="jumlah_20"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->jumlah_20  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_2" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_20 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_2" readonly
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->disahkan_oleh_20  }}"
                                                            name="disahkan_oleh_20" style="width:360px ;"></td>
                                                </tr>

                                                <tr>
                                                    <td>Teks terlipat</td>
                                                    <td><input type="text" class="form-control"
                                                            name="subkontraktor_11"
                                                            value="{{ $laporan_pemeriksaan_akhir_section2->subkontraktor_11  }}" style="width:200px ;">
                                                    </td>
                                                    <td><input type="text" class="form-control" name="jumlah_21"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->jumlah_21  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_1" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_21 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_1"
                                                            name="disahkan_oleh_21"
                                                            value="{{ $laporan_pemeriksaan_akhir_section2->disahkan_oleh_21  }}" readonly
                                                            style="width:360px ;"></td>
                                                    <td><input type="text" class="form-control" name="tcsb_11"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->tcsb_11  }}" style="width:200px ;"></td>
                                                    <td><input type="text" class="form-control" name="jumlah_22"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->jumlah_22  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_2" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_22 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_2" readonly
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->disahkan_oleh_22  }}"
                                                            name="disahkan_oleh_22" style="width:360px ;"></td>
                                                </tr>

                                                <tr>
                                                    <td>Lain-Lain</td>
                                                    <td><input type="text" class="form-control"
                                                            name="subkontraktor_12"
                                                            value="{{ $laporan_pemeriksaan_akhir_section2->subkontraktor_12  }}" style="width:200px ;">
                                                    </td>
                                                    <td><input type="text" class="form-control" name="jumlah_23"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->jumlah_23  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_1" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_23 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_1"
                                                            name="disahkan_oleh_23"
                                                            value="{{ $laporan_pemeriksaan_akhir_section2->disahkan_oleh_23  }}" readonly
                                                            style="width:360px ;"></td>
                                                    <td><input type="text" class="form-control" name="tcsb_12"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->tcsb_12  }}" style="width:200px ;"></td>
                                                    <td><input type="text" class="form-control" name="jumlah_24"
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->jumlah_24  }}" style="width:200px ;"></td>
                                                    <td><button class="btn btn-primary Check_2" @disabled($laporan_pemeriksaan_akhir_section->disahkan_oleh_24 != null)>Check</button></td>
                                                    <td><input type="text" class="form-control Qc_2" readonly
                                                        value="{{ $laporan_pemeriksaan_akhir_section2->disahkan_oleh_24  }}"
                                                            name="disahkan_oleh_24" style="width:360px ;"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Button trigger modal -->

                        <div class="row d-flex mt-3">
                            <div class="col-md-2">kuantiti saip:</div>
                            <div class="col-md-2">
                                <input type="text" name="kauntiti_siap_1" id=""
                                    class="form-control" value="{{ $laporan_pemeriksaan_akhir->kauntiti_siap_1 }}">
                            </div>
                            <div class="col-md-2">
                                <select name="kauntiti_siap_2" id="" class="form-control saip">

                                    <option value="Naskah" @selected($laporan_pemeriksaan_akhir->kauntiti_siap_2 == "Naskah")>Naskah</option>
                                    <option value="Helai" @selected($laporan_pemeriksaan_akhir->kauntiti_siap_2 == "Helai")>Helai</option>
                                </select>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#fullScreenModal" onclick="ModalRenderData()">
                                    Rekod Pemeriksaan AQL
                                </button>
                            </div>
                        </div>

                    <!-- Full Screen Modal -->
                    <div class="modal fade" id="fullScreenModal" data-backdrop="static" tabindex="-1" role="dialog"
                        aria-labelledby="fullScreenModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="fullScreenModalLabel">Rekod Pemeriksaan AQL</h5>

                                </div>
                                <div class="modal-body">
                                    <h5>h) Rekod Pemeriksaan AQL</h5>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="">Jumlah palet</label>
                                            @php
                                                $jumlah = count($laporan_pemeriksaan_akhir_senari);
                                            @endphp
                                            <input type="number" name="jumlah_palet" id="jumlah_palet"
                                                class="form-control" value="{{ $jumlah }}">
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mt-3" id="dynamicTable">
                                                <thead>
                                                    <tr class="tr_thead">
                                                        <th style="width: 250px;">Palet No.</th>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari as $item)

                                                        <th style="width: 250px;">
                                                            <input type="hidden" class="pallet" name="row[1][1]"
                                                                value="{{  $item->row_pallet }}">Pallet {{ $item['row_pallet'] }}
                                                        </th>
                                                        @endforeach
                                                        @else
                                                        <th style="width: 250px;">
                                                            <input type="hidden" class="pallet" name="row[1][1]"
                                                                value="1">Pallet 1
                                                        </th>
                                                        @endif


                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr class="first_tr">
                                                        <td>
                                                            <div style="width: 200px;">kuantiti bagi setiap palet</div>
                                                        </td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari as $item)
                                                        <td><input type="text"  name="row[1][2]"
                                                            class="form-control td_first" value="{{ $item['row_1'] }}"></td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text"  name="row[1][2]"
                                                            class="form-control td_first"></td>
                                                        @endif



                                                    </tr>
                                                    <tr class="second_tr">
                                                        <td>
                                                            <div style="width: 200px;">Kualiti sample</div>
                                                        </td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari as $item)
                                                        <td><input type="text"  name="row[1][3]"
                                                            class="form-control td_second" value="{{ $item['row_2'] }}"></td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text"  name="row[1][3]"
                                                            class="form-control td_second"></td>
                                                        @endif

                                                    </tr>



                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="table-responsive">
                                            <h5>Keputusan Pemeriksaan</h5>
                                            <table class="table table-bordered mt-3" id="keputusan">
                                                <thead>
                                                    <tr class="thead_row_keputusan">
                                                        <th>Kriteria</th>



                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                           {{-- @php
                                                            dd($item);
                                                        @endphp --}}
                                                        <th style="width: 250px;">
                                                            <input type="hidden" class="pallet" name="row[1][1]"
                                                                value="1">Pallet {{ $item['keputusan_row_pallet'] }}
                                                        </th>
                                                        @endforeach
                                                        @else
                                                        <th style="width: 250px;">
                                                            <input type="hidden" class="keputusan_row_pallet" name="row[1][1]"
                                                                value="1">Pallet 1
                                                        </th>
                                                        @endif



                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="first_row_keputusan">
                                                        <td>Kotor</td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][2]"
                                                            class="form-control  td_keputusan_1" value="{{ $item['keputusan_row_1'] }}">
                                                        </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][2]"
                                                            class="form-control  td_keputusan_1">
                                                         </td>
                                                        @endif



                                                    </tr>
                                                    <tr class="second_row_keputusan">
                                                        <td>Cetaken doubling</td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][3]"
                                                            class="form-control  td_keputusan_2" value="{{ $item['keputusan_row_2'] }}">
                                                        </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][3]"
                                                            class="form-control  td_keputusan_2">
                                                         </td>
                                                        @endif

                                                    </tr>
                                                    <tr class="third_row_keputusan">
                                                        <td>Senget</td>
                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][4]"
                                                            class="form-control td_keputusan_3" value="{{ $item['keputusan_row_3'] }}">
                                                    </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][4]"
                                                            class="form-control td_keputusan_3">
                                                    </td>
                                                        @endif


                                                    </tr>
                                                    <tr class="forth_row_keputusan">
                                                        <td>Rosak/Koyak</td>


                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][5]"
                                                            class="form-control td_keputusan_4" value="{{ $item['keputusan_row_4'] }}">
                                                    </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][5]"
                                                            class="form-control td_keputusan_4">
                                                    </td>
                                                        @endif



                                                    </tr>
                                                    <tr class="fifth_row_keputusan">
                                                        <td>Teks terpontong</td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][6]"
                                                            class="form-control td_keputusan_5" value="{{ $item['keputusan_row_5'] }}">
                                                    </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][6]"
                                                            class="form-control td_keputusan_5">
                                                    </td>
                                                        @endif



                                                    </tr>
                                                    <tr class="sixth_row_keputusan">
                                                        <td>Muka surat tidak cukup</td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][7]"
                                                            class="form-control td_keputusan_6" value="{{ $item['keputusan_row_6'] }}">
                                                    </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][7]"
                                                            class="form-control td_keputusan_6">
                                                    </td>
                                                        @endif



                                                    </tr>
                                                    <tr class="seventh_row_keputusan">
                                                        <td>Endpaper/cover paper terblaik</td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][8]"
                                                            class="form-control td_keputusan_7" value="{{ $item['keputusan_row_7'] }}">
                                                    </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][8]"
                                                            class="form-control td_keputusan_7">
                                                    </td>
                                                        @endif
                                                    </tr>
                                                    <tr class="eight_row_keputusan">
                                                        <td>tiada cetaken</td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][9]"
                                                            class="form-control td_keputusan_8" value="{{ $item['keputusan_row_8'] }}">
                                                    </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][9]"
                                                            class="form-control td_keputusan_8">
                                                    </td>
                                                        @endif



                                                    </tr>
                                                    <tr class="nineth_row_keputusan">
                                                        <td>Cover Lari</td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][10]"
                                                            class="form-control td_keputusan_9" value="{{ $item['keputusan_row_9'] }}">
                                                    </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][10]"
                                                            class="form-control td_keputusan_9">
                                                    </td>
                                                        @endif



                                                    </tr>
                                                    <tr class="tenth_row_keputusan">
                                                        <td>masalah UV Tarnish</td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][11]"
                                                            class="form-control td_keputusan_10" value="{{ $item['keputusan_row_10'] }}">
                                                    </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][11]"
                                                            class="form-control td_keputusan_10">
                                                    </td>
                                                        @endif


                                                    </tr>
                                                    <tr class="eleventh_row_keputusan">
                                                        <td>Gam tidak cukup</td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][12]"
                                                            class="form-control td_keputusan_11" value="{{ $item['keputusan_row_11'] }}">
                                                    </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][12]"
                                                            class="form-control td_keputusan_11">
                                                    </td>
                                                        @endif


                                                    </tr>
                                                    <tr class="twelveth_row_keputusan">
                                                        <td>Teks-terlipat</td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][13]"
                                                            class="form-control td_keputusan_12" value="{{ $item['keputusan_row_12'] }}">
                                                    </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][13]"
                                                            class="form-control td_keputusan_12">
                                                    </td>
                                                        @endif
                                                    </tr>
                                                    <tr class="thirteenth_row_keputusan">
                                                        <td>Lain-Lain</td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][14]"
                                                            class="form-control td_keputusan_13" value="{{ $item['keputusan_row_13'] }}">
                                                    </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][14]"
                                                            class="form-control td_keputusan_13">
                                                    </td>
                                                        @endif

                                                    </tr>
                                                    <tr class="forteenth_row_keputusan">
                                                        <td>Jumlah Reject</td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][15]"
                                                            class="form-control td_keputusan_14" value="{{ $item['keputusan_row_14'] }}">
                                                    </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][15]"
                                                            class="form-control td_keputusan_14">
                                                    </td>
                                                        @endif

                                                    </tr>
                                                    <tr class="fifteenth_row_keputusan">
                                                        <td>permeriksaan 100%</td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td>
                                                                <div class="d-flex justify-content-center"> <label
                                                                        class="mx-2">Yes</label>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input td_keputusan_15"
                                                                            id="customSwitch{{ $item['keputusan_row_pallet'] }}" @checked($item['keputusan_row_15'] != null)
                                                                            name="keputusan[{{ $item['keputusan_row_pallet'] }}][16]">
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch{{ $item['keputusan_row_pallet'] }}">No</label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endforeach
                                                        @else
                                                        <td>
                                                            <div class="d-flex justify-content-center"> <label
                                                                    class="mx-2">Yes</label>
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox"
                                                                        class="custom-control-input td_keputusan_15"
                                                                        id="customSwitch1"
                                                                        name="keputusan[1][16]">
                                                                    <label class="custom-control-label"
                                                                        for="customSwitch1">No</label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @endif



                                                    </tr>
                                                    <tr class="sixteenth_row_keputusan">
                                                        <td>Diperiksa Oleh</td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][17]"
                                                            class="form-control td_keputusan_16" value="{{ $item['keputusan_row_16'] }}">
                                                    </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][17]"
                                                            class="form-control td_keputusan_16">
                                                    </td>
                                                        @endif




                                                    </tr>
                                                    <tr class="seventeenth_row_keputusan">
                                                        <td>Disahkan Oleh</td>

                                                        @if(!empty($laporan_pemeriksaan_akhir_senari2))
                                                        @foreach ($laporan_pemeriksaan_akhir_senari2 as $item)
                                                        <td><input type="text" name="keputusan[1][18]"
                                                            class="form-control td_keputusan_17" value="{{ $item['keputusan_row_17'] }}">
                                                    </td>
                                                        @endforeach
                                                        @else
                                                        <td><input type="text" name="keputusan[1][18]"
                                                            class="form-control td_keputusan_17">
                                                    </td>
                                                        @endif



                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="ModalSave()" data-dismiss="modal">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>





                                <div class="row">
                                    <div class="col-md-2 mt-5"><input type="text" name="kauntiti_siap_3"
                                            id="" class="form-control" value="{{ $laporan_pemeriksaan_akhir->kauntiti_siap_3 }}"></div>
                                    <div class="col-md-2 mt-5">
                                        <h5>Bungkusan</h5>
                                    </div>
                                </div>

                                <input type="hidden"  class="Table1Data" name="row">
                                <input type="hidden" class="Table2Data"
                                    name="keputusan">

                                <button  class="btn btn-primary float-right">Save</button>

                            </div>
                        </div>

                        <a href="{{ route('Laporan_Pemeriksaan') }}" class="">Back to list</a>

                    </div>

                </div>

            </div>
        </div>



    </form>

    @endsection
    @push('custom-scripts')
        <script>



            $(document).ready(function() {
                $('input[type=hidden]').removeAttr('disabled');
                $('.saip').select2();

                function ModalRenderData(){
                      // Retrieve JSON data from session storage
    var data = JSON.parse(sessionStorage.getItem('modalData'));

// Render table_one data
var tableOneData = data.table_one[0];
var tableOneFirstRow = tableOneData[0];
var pallet = tableOneFirstRow.pallet;
var first_td = tableOneFirstRow.first_td;
var second_td = tableOneFirstRow.second_td;

// Render first row of table_one
$('#dynamicTable .tr_thead').append('<th style="width: 200px ;"><input type="hidden" class="pallet" name="row[' + pallet + '][1]" value="' + pallet + '">Palet ' + pallet + '</th>');

first_td.forEach(function(value) {
    $('#dynamicTable .first_tr').append('<td><input type="text"  name="row[' + pallet + '][2]" class="form-control td_first" style="width: 200px ;" value="' + value + '"></td>');
});

second_td.forEach(function(value) {
    $('#dynamicTable .second_tr').append('<td><input type="text"  name="row[' + pallet + '][3]" class="form-control td_second" style="width: 200px ;" value="' + value + '"></td>');
});

// Render remaining rows of table_one
for (var i = 1; i < tableOneData.length; i++) {
    var rowData = tableOneData[i];
    var pallet = rowData.pallet;
    var first_td = rowData.first_td;
    var second_td = rowData.second_td;

    // Add new row to the table
    var newRow = '<tr>' +
        '<td><input type="hidden" class="pallet" name="row[' + pallet + '][1]" value="' + pallet + '">Palet ' + pallet + '</td>';

    first_td.forEach(function(value) {
        newRow += '<td><input type="text"  name="row[' + pallet + '][2]" class="form-control td_first" style="width: 200px ;" value="' + value + '"></td>';
    });

    second_td.forEach(function(value) {
        newRow += '<td><input type="text"  name="row[' + pallet + '][3]" class="form-control td_second" style="width: 200px ;" value="' + value + '"></td>';
    });

    newRow += '</tr>';

    // Append new row to the table
    $('#dynamicTable tbody').append(newRow);
}

// Render table_two data
var tableTwoData = data.table_two[0];
var tableTwoFirstRow = tableTwoData[0];
var pallet = tableTwoFirstRow.pallet;
var keputusanData = tableTwoFirstRow;

// Render first row of table_two
$('#keputusan .thead_row_keputusan').append('<th style="width: 200px ;"><input type="hidden" name="keputusan[' + pallet + '][1]" value="' + pallet + '" class="keputusan_row_pallet">Palet ' + pallet + '</th>');

for (var key in keputusanData) {
    if (key !== 'pallet') {
        $('#keputusan .' + key + '_row_keputusan').append('<td><input type="text" name="keputusan[' + pallet + '][' + key + ']" class="form-control ' + key + '" style="width: 200px ;" value="' + keputusanData[key] + '"></td>');
    }
}

// Render remaining rows of table_two
for (var i = 1; i < tableTwoData.length; i++) {
    var rowData = tableTwoData[i];
    var pallet = rowData.pallet;
    var keputusanData = rowData;

    // Add new row to the table
    var newRow = '<tr>' +
        '<td><input type="hidden" name="keputusan[' + pallet + '][1]" value="' + pallet + '" class="keputusan_row_pallet">Palet ' + pallet + '</td>';

    for (var key in keputusanData) {
        if (key !== 'pallet') {
            newRow += '<td><input type="text" name="keputusan[' + pallet + '][' + key + ']" class="form-control ' + key + '" style="width: 200px ;" value="' + keputusanData[key] + '"></td>';
        }
    }

    newRow += '</tr>';

    // Append new row to the table
    $('#keputusan tbody').append(newRow);
}

// Adjust input width
$('.form-control').css('width', '200px');

                }


                function formatDateWithAMPM(date) {
                    const options = {
                        timeZone: 'Asia/Kuala_Lumpur',
                        hour12: true
                    };
                    const formattedDate = date.toLocaleString('en-US', options);
                    const datePart = formattedDate.split(',')[0].trim();
                    const [month, day, year] = datePart.split('/').map(part => part.padStart(2, '0'));
                    const formattedDatePart = `${day}-${month}-${year}`;
                    const timePart = formattedDate.split(',')[1].trim();
                    const formattedDateTime = `${formattedDatePart} ${timePart}`;

                    return formattedDateTime;
                }

                $(document).on('click', '.Check_1', function() {
                    $(this).attr('disabled', 'disabled');
                    const currentDate = new Date();
                    const formattedDateTime = formatDateWithAMPM(currentDate);
                    let checked_by = $('#checked_by').val();
                    const combinedValue = `${checked_by}/${formattedDateTime}`;
                    $(this).closest('tr').find('.Qc_1').val(combinedValue);
                });

                $(document).on('click', '.Check_2', function() {
                    $(this).attr('disabled', 'disabled');
                    const currentDate = new Date();
                    const formattedDateTime = formatDateWithAMPM(currentDate);
                    let checked_by = $('#checked_by').val();
                    const combinedValue = `${checked_by}/${formattedDateTime}`;
                    $(this).closest('tr').find('.Qc_2').val(combinedValue);
                });


                $('input[type=hidden]').removeAttr('disabled');

                $('#jumlah_palet').on('input', function() {
                    var jumlahPalet = parseInt($(this).val());
                    if (jumlahPalet < 1) {
                        return; // Exit the function if value is less than 1
                    }

                    var existingPalletsCount = $('#dynamicTable .tr_thead th').length -
                    1; // Subtract 1 to exclude the initial "Palet 1" header
                    var existingPalletsTable2Count = $('#keputusan .thead_row_keputusan th').length - 1
                    // Remove excess pallet columns if the new value is less than the existing count
                    if (jumlahPalet < existingPalletsCount) {
                        for (var i = existingPalletsCount; i > jumlahPalet; i--) {
                            $('#dynamicTable .tr_thead th:last-child').remove(); // Remove last header
                            $('#dynamicTable .first_tr td:last-child')
                        .remove(); // Remove last cell from first row
                            $('#dynamicTable .second_tr td:last-child')
                        .remove(); // Remove last cell from second row
                        }
                    }

                    // Add new pallet columns if the new value is greater than the existing count
                    else if (jumlahPalet > existingPalletsCount) {
                        for (var i = existingPalletsCount + 1; i <= jumlahPalet; i++) {
                            if (!$('#dynamicTable .tr_thead th:contains("Palet ' + i + '")')
                                .length) { // Check if the pallet header already exists
                                $('#dynamicTable .tr_thead').append(
                                    '<th style="width: 200px ;"><input type="hidden" class="pallet" name="row[' + i +
                                    '][1]" value="' + i + '">Palet ' + i + '</th>');
                                $('#dynamicTable .first_tr').append('<td ><input type="text"  name="row[' + i +
                                    '][2]" class="form-control td_first" style="width: 200px ;"></td>');
                                $('#dynamicTable .second_tr').append('<td ><input type="text"   name="row[' + i +
                                    '][3]" class="form-control td_second" style="width: 200px ;"></td>');
                            }
                        }
                        $('#dynamicTable .form-control').css('width', '200px')
                    }

                    if (jumlahPalet < existingPalletsTable2Count) {
                        for (var i = existingPalletsTable2Count; i > jumlahPalet; i--) {
                            $('#keputusan .thead_row_keputusan th:last-child').remove(); // Remove last header
                            $('#keputusan .first_row_keputusan td:last-child')
                        .remove(); // Remove last cell from first row
                            $('#keputusan .second_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                            $('#keputusan .third_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                            $('#keputusan .forth_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                            $('#keputusan .fifth_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                            $('#keputusan .sixth_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                            $('#keputusan .seventh_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                            $('#keputusan .eight_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                            $('#keputusan .nineth_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                            $('#keputusan .tenth_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                            $('#keputusan .eleventh_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                            $('#keputusan .twelveth_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                            $('#keputusan .thirteenth_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                            $('#keputusan .forteenth_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                            $('#keputusan .fifteenth_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                            $('#keputusan .sixteenth_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                            $('#keputusan .seventeenth_row_keputusan td:last-child')
                        .remove(); // Remove last cell from second row
                        }
                    }

                    // Add new pallet columns if the new value is greater than the existing count
                    else if (jumlahPalet > existingPalletsTable2Count) {
                        for (var i = existingPalletsTable2Count + 1; i <= jumlahPalet; i++) {
                            if (!$('#keputusan .thead_row_keputusan th:contains("Palet ' + i + '")')
                                .length) { // Check if the pallet header already exists
                                $('#keputusan .thead_row_keputusan').append(
                                    '<th style="width: 200px ;"><input type="hidden" name="keputusan[' + i +
                                    '][1]" value="' + i + '" class="keputusan_row_pallet">Palet ' + i + '</th>');
                                $('#keputusan .first_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][2]" class="form-control td_keputusan_1" style="width: 200px ;"></td>');
                                $('#keputusan .second_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][3]" class="form-control td_keputusan_2" style="width: 200px ;"></td>');
                                $('#keputusan .third_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][4]" class="form-control td_keputusan_3" style="width: 200px ;"></td>');
                                $('#keputusan .forth_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][5]" class="form-control td_keputusan_4" style="width: 200px ;"></td>');
                                $('#keputusan .fifth_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][6]" class="form-control td_keputusan_5" style="width: 200px ;"></td>');
                                $('#keputusan .sixth_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][7]" class="form-control td_keputusan_6" style="width: 200px ;"></td>');
                                $('#keputusan .seventh_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][8]" class="form-control td_keputusan_7" style="width: 200px ;"></td>');
                                $('#keputusan .eight_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][9]" class="form-control td_keputusan_8" style="width: 200px ;"></td>');
                                $('#keputusan .nineth_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][10]" class="form-control td_keputusan_9" style="width: 200px ;"></td>');
                                $('#keputusan .tenth_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][11]" class="form-control td_keputusan_10" style="width: 200px ;"></td>');
                                $('#keputusan .eleventh_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][12]" class="form-control td_keputusan_11" style="width: 200px ;"></td>');
                                $('#keputusan .twelveth_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][13]" class="form-control td_keputusan_12" style="width: 200px ;"></td>');
                                $('#keputusan .thirteenth_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][14]" class="form-control td_keputusan_13" style="width: 200px ;"></td>');
                                $('#keputusan .forteenth_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][15]" class="form-control td_keputusan_14" style="width: 200px ;"></td>');
                                $('#keputusan .fifteenth_row_keputusan').append(
                                    '<td ><div class="d-flex justify-content-center"> <label class="mx-2">Yes</label><div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input td_keputusan_15" id="customSwitch' +
                                    i + '" name="keputusan[' + i +
                                    '][16]"><label class="custom-control-label" for="customSwitch' + i +
                                    '">No</label></div></div></td>');
                                $('#keputusan .sixteenth_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][17]" class="form-control td_keputusan_16" style="width: 200px ;"></td>');
                                $('#keputusan .seventeenth_row_keputusan').append(
                                    '<td ><input type="text" name="keputusan[' + i +
                                    '][18]" class="form-control td_keputusan_17" style="width: 200px ;"></td>');
                            }
                        }
                        $('#keputusan .form-control').css('width', '200px')
                    }

                });




                $('#sale_order').trigger('change');

                $('#sale_order').select2({
                    ajax: {
                        url: '{{ route('sale_order.get') }}',
                        dataType: 'json',
                        delay: 1000,
                        data: function(params) {
                            return {
                                q: params.term,
                                page: params.page || 1,
                            };
                        },
                        processResults: function(data, params) {
                            params.page = params.page || 1;

                            return {
                                results: data.results,
                                pagination: {
                                    more: data.pagination.more
                                }
                            };
                        },
                        cache: true
                    },
                    containerCssClass: 'form-control',
                    placeholder: "Select Sales Order No",
                    templateResult: function(data) {
                        if (data.loading) {
                            return "Loading...";
                        }

                        if ($('#sale_order').data('id') == data.id) {
                            return $('<option value=' + data.id + ' selected>' + data.order_no +
                                '</option>');
                        } else {
                            return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                        }
                    },
                    templateSelection: function(data) {
                        return data.text || "Select Sales Order No";
                    }
                });




            });
            var table_1_data = [];
            var table_2_data = [];
            var td_keputusan_1 = [];
                var td_keputusan_1 = [];
                var td_keputusan_2 = [];
                var td_keputusan_3 = [];
                var td_keputusan_4 = [];
                var td_keputusan_5 = [];
                var td_keputusan_6 = [];
                var td_keputusan_7 = [];
                var td_keputusan_8 = [];
                var td_keputusan_9 = [];
                var td_keputusan_10 = [];
                var td_keputusan_11 = [];
                var td_keputusan_12 = [];
                var td_keputusan_13 = [];
                var td_keputusan_14 = [];
                var td_keputusan_15 = [];
                var td_keputusan_16 = [];
                var td_keputusan_17 = [];
             function ModalSave(){
                var pallet = [];
                var table2pallet = [];

                var first_td = [];
                var second_td = [];



                $('#dynamicTable thead tr').each(function() {
                    var $this = $(this);
                    $this.find('.pallet').each(function() {
                        pallet.push($(this).val());
                        });
                });
                $('#dynamicTable tbody tr').each(function(index) {
                    var $this = $(this);
                    if (index === 0) {

                        $this.find('.td_first').each(function() {
                        first_td.push($(this).val());
                        });
                    } else {
                        $this.find('.td_second').each(function() {
                            second_td.push($(this).val());
                        });
                    }
                });

                var rowData = [];
                for (let i = 0; i < pallet.length; i++) {
                    var table1Data = {
                    pallet: pallet[i], // Assuming there's an input with class 'pallet' for each row
                    first_td: first_td[i],
                    second_td: second_td[i],
                    };

                // Push the row data object into the array
                rowData.push(table1Data);
                }


                table_1_data.push(rowData);
                // table_1_data.push(first_td);
                // table_1_data.push(second_td);




                $('#keputusan thead tr').each(function() {
                    var $this = $(this);
                    $this.find('.keputusan_row_pallet').each(function() {
                        table2pallet.push($(this).val());
                    });
                });

                $('#keputusan tbody tr').each(function(index) {
                    var $this = $(this);
                    switch (index) {
                        case 0:
                        $this.find('.td_keputusan_1').each(function() {
                            td_keputusan_1.push($(this).val());
                        });
                            break;
                        case 1:
                        $this.find('.td_keputusan_2').each(function() {
                            td_keputusan_2.push($(this).val());
                        });
                            break;
                        case 2:
                        $this.find('.td_keputusan_3').each(function() {
                            td_keputusan_3.push($(this).val());
                        });
                            break;
                        case 3:
                        $this.find('.td_keputusan_4').each(function() {
                            td_keputusan_4.push($(this).val());
                        });
                            break;
                        case 4:
                        $this.find('.td_keputusan_5').each(function() {
                            td_keputusan_5.push($(this).val());
                        });
                            break;
                        case 5:
                        $this.find('.td_keputusan_6').each(function() {
                            td_keputusan_6.push($(this).val());
                        });
                            break;
                        case 6:
                        $this.find('.td_keputusan_7').each(function() {
                            td_keputusan_7.push($(this).val());
                        });
                            break;
                        case 7:
                        $this.find('.td_keputusan_8').each(function() {
                            td_keputusan_8.push($(this).val());
                        });
                            break;
                        case 8:
                        $this.find('.td_keputusan_9').each(function() {
                            td_keputusan_9.push($(this).val());
                        });
                            break;
                        case 9:
                        $this.find('.td_keputusan_10').each(function() {
                            td_keputusan_10.push($(this).val());
                        });
                            break;
                        case 10:
                        $this.find('.td_keputusan_11').each(function() {
                            td_keputusan_11.push($(this).val());
                        });
                            break;
                        case 11:
                        $this.find('.td_keputusan_12').each(function() {
                            td_keputusan_12.push($(this).val());
                        });
                            break;
                        case 12:
                        $this.find('.td_keputusan_13').each(function() {
                            td_keputusan_13.push($(this).val());
                        });
                            break;
                        case 13:
                        $this.find('.td_keputusan_14').each(function() {
                            td_keputusan_14.push($(this).val());
                        });
                            break;
                        case 14:
                        $this.find('.td_keputusan_15').each(function() {
                            td_keputusan_15.push($(this).val());
                        });
                            break;
                        case 15:
                        $this.find('.td_keputusan_16').each(function() {
                            td_keputusan_16.push($(this).val());
                        });
                            break;
                        case 16:
                        $this.find('.td_keputusan_17').each(function() {
                            td_keputusan_17.push($(this).val());
                        });
                            break;
                        default:
                            break;
                    }
                });



                var row2Data = [];
                for (let i = 0; i < table2pallet.length; i++) {
                    var table2Data = {
                    pallet: table2pallet[i], // Assuming there's an input with class 'pallet' for each row
                    td_keputusan_1: td_keputusan_1[i],
                    td_keputusan_2: td_keputusan_2[i],
                    td_keputusan_3: td_keputusan_3[i],
                    td_keputusan_4: td_keputusan_4[i],
                    td_keputusan_5: td_keputusan_5[i],
                    td_keputusan_6: td_keputusan_6[i],
                    td_keputusan_7: td_keputusan_7[i],
                    td_keputusan_8: td_keputusan_8[i],
                    td_keputusan_9: td_keputusan_9[i],
                    td_keputusan_10: td_keputusan_10[i],
                    td_keputusan_11: td_keputusan_11[i],
                    td_keputusan_12: td_keputusan_12[i],
                    td_keputusan_13: td_keputusan_13[i],
                    td_keputusan_14: td_keputusan_14[i],
                    td_keputusan_15: td_keputusan_15[i],
                    td_keputusan_16: td_keputusan_16[i],
                    td_keputusan_17: td_keputusan_17[i],
                    };

                // Push the row data object into the array
                row2Data.push(table2Data);
                }


                table_2_data.push(row2Data);
                $('.Table1Data').val(JSON.stringify(table_1_data));
                $('.Table2Data').val(JSON.stringify(table_2_data));

                var data = {
                    jumlah: $(`#jumlah_palet`).val(),
                    table_one: table_1_data,
                    table_two: table_2_data,
                };

                console.log(data);
                sessionStorage.setItem(`modalData`, JSON.stringify(data));
            }

            $("#c_1").change(function() {
                if ($(this).is(":checked")) {
                    $("#c_kuantiti_1").prop("disabled", false);
                } else {
                    $("#c_kuantiti_1").prop("disabled", true);
                }
            });

            $("#c_2").change(function() {
                if ($(this).is(":checked")) {
                    $("#c_berat_2").prop("disabled", false);
                } else {
                    $("#c_berat_2").prop("disabled", true);
                }
            });

            $('#sale_order').on('change', function() {
                const id = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '{{ route('sale_order_penjilidan.detail.get') }}',
                    data: {
                        "id": id
                    },
                    success: function(data) {
                        $('#kod_buku').val(data.sale_order.kod_buku);
                        $('#tajuk').val(data.sale_order.description);
                        $('#sale_order_qty').val(data.sale_order.sale_order_qty);
                        if (data.section != null) {
                            $('#jumlah').val(data.section.item_cover_text);
                        } else {
                            $('#jumlah').val(0);
                        }
                    }
                });
            });
        </script>
    @endpush
