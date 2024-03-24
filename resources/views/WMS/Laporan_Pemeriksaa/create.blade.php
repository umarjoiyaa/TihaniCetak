@extends('layouts.app')

@section('content')

<form action="" method="POST">
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
                                        value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}"
                                        class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                        placeholder="dd-mm-yyyy">

                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Time</label>
                                <input name="time" type="time" id="Currenttime"
                                    value="{{ Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('H:i') }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="form-label">Diperiksa oleh (Operator)</div>
                                    <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                        name="" id="checked_by" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="form-label">Sales Order No.</div>
                                    <select name="sale_order" id="sale_order" class="form-control">
                                        @if (old('sale_order') != null)
                                            @php
                                                $name = App\Models\SaleOrder::find(old('sale_order'));
                                            @endphp
                                            <option value="{{ old('sale_order') }}" selected
                                                style="color: black; !important">
                                                {{ $name->order_no }}</option>
                                        @else
                                            <option value="" selected disabled>Select any Sale Order
                                            </option>
                                        @endif

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
                                    <select name="user[]" class="form-control form-select" id="" multiple>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                @if (old('user')) {{ in_array($user->id, old('user')) ? 'selected' : '' }} @endif>
                                                {{ $user->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="">Pembantu</label>
                                    <select name="pembantu[]" class="form-control form-select" id=""
                                        multiple>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                @if (old('pembantu')) {{ in_array($user->id, old('pembantu')) ? 'selected' : '' }} @endif>
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
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="b_1" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Baki kuantiti produk Sebelum disimpan</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="b_2" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Reject dikuarantin ditempat lain/dibuang</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="b_3" id=""></td>
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
                                <input type="checkbox" name="c_1" id="">
                            </div>
                            <div class="col-md-2">
                                <h6>kuantiti setiap bungkusan:</h6>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="c_kuantiti_1" id="" class="form-control">
                            </div>
                            <div class="col-md-2">naskah/helai</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-1">
                                <input type="checkbox" name="c_2" id="">
                            </div>
                            <div class="col-md-2">
                                <h6>Berat 1 bungkusan/kotak:</h6>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="c_berat_2" id="" class="form-control">
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
                                                    name="d_1" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Lokasi yang betul</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="d_2" id=""></td>
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
                                                    name="e_1" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Kod Buku dab Tajuk</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="e_2" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>kuantiti</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="e_3" id=""></td>
                                        </tr>

                                        <tr>
                                            <td>No ISBN (Jika ada)</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="e_4" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>NO KK (jika ada)</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="e_5" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Berat (jika ada)</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="e_6" id=""></td>
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
                                                    name="f_1" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>shirnk wrap</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="f_2" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>poster / leaflet</td>
                                            <td class="text-center d-flex justify-content-center"><input type="checkbox"
                                                    name="f_3" id=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fullScreenModal">
    Launch Full Screen Modal
  </button>

  <!-- Full Screen Modal -->
<div class="modal fade" id="fullScreenModal" tabindex="-1" role="dialog" aria-labelledby="fullScreenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="fullScreenModalLabel">Full Screen Modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Modal content goes here -->
          This is a full-screen modal.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
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
                                        <td><input type="text"  class="form-control" name="subkontraktor_1" value="{{ old('subkontraktor_1') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_1" value="{{ old('jumlah_1') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_1">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_1" name="disahkan_oleh_1" value="{{ old('disahkan_oleh_1') }}" readonly style="width:360px ;"></td>
                                        <td><input type="text"  class="form-control" name="tcsb_1" value="{{ old('tcsb_1') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_2" value="{{ old('jumlah_2') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_2">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_2" readonly value="{{ old('disahkan_oleh_2') }}" name="disahkan_oleh_2" style="width:360px ;"></td>
                                    </tr>

                                    <tr>
                                        <td>cetakan doubling</td>
                                        <td><input type="text"  class="form-control" name="subkontraktor_2" value="{{ old('subkontraktor_2') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_3" value="{{ old('jumlah_3') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_1">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_1" name="disahkan_oleh_3" value="{{ old('disahkan_oleh_3') }}" readonly style="width:360px ;"></td>
                                        <td><input type="text"  class="form-control" name="tcsb_2" value="{{ old('tcsb_2') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_4" value="{{ old('jumlah_4') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_2">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_2" readonly value="{{ old('disahkan_oleh_4') }}" name="disahkan_oleh_4" style="width:360px ;"></td>
                                    </tr>

                                    <tr>
                                        <td>Senget</td>
                                        <td><input type="text"  class="form-control" name="subkontraktor_3" value="{{ old('subkontraktor_3') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_5" value="{{ old('jumlah_5') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_1">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_1" name="disahkan_oleh_5" value="{{ old('disahkan_oleh_5') }}" readonly style="width:360px ;"></td>
                                        <td><input type="text"  class="form-control" name="tcsb_3" value="{{ old('tcsb_3') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_6" value="{{ old('jumlah_6') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_2">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_2" readonly value="{{ old('disahkan_oleh_6') }}" name="disahkan_oleh_6" style="width:360px ;"></td>
                                    </tr>

                                    <tr>
                                        <td>Roask/Koyak</td>
                                        <td><input type="text"  class="form-control" name="subkontraktor_4" value="{{ old('subkontraktor_4') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_7" value="{{ old('jumlah_7') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_1">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_1" name="disahkan_oleh_7" value="{{ old('disahkan_oleh_7') }}" readonly style="width:360px ;"></td>
                                        <td><input type="text"  class="form-control" name="tcsb_4" value="{{ old('tcsb_4') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_8" value="{{ old('jumlah_8') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_2">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_2" readonly value="{{ old('disahkan_oleh_8') }}" name="disahkan_oleh_8" style="width:360px ;"></td>
                                    </tr>

                                    <tr>
                                        <td>Teks terpotong</td>
                                        <td><input type="text"  class="form-control" name="subkontraktor_5" value="{{ old('subkontraktor_5') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_9" value="{{ old('jumlah_9') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_1">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_1" name="disahkan_oleh_9" value="{{ old('disahkan_oleh_9') }}" readonly style="width:360px ;"></td>
                                        <td><input type="text"  class="form-control" name="tcsb_5" value="{{ old('tcsb_5') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_10" value="{{ old('jumlah_10') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_2">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_2" readonly value="{{ old('disahkan_oleh_10') }}" name="disahkan_oleh_10" style="width:360px ;"></td>
                                    </tr>

                                    <tr>
                                        <td>Mukasurat tidak cukup</td>
                                        <td><input type="text"  class="form-control" name="subkontraktor_6" value="{{ old('subkontraktor_6') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_11" value="{{ old('jumlah_11') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_1">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_1" name="disahkan_oleh_11" value="{{ old('disahkan_oleh_11') }}" readonly style="width:360px ;"></td>
                                        <td><input type="text"  class="form-control" name="tcsb_6" value="{{ old('tcsb_6') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_12" value="{{ old('jumlah_12') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_2">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_2" readonly value="{{ old('disahkan_oleh_12') }}" name="disahkan_oleh_12" style="width:360px ;"></td>
                                    </tr>

                                    <tr>
                                        <td>Endpaper /cover terbalik</td>
                                        <td><input type="text"  class="form-control" name="subkontraktor_7" value="{{ old('subkontraktor_7') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_13" value="{{ old('jumlah_13') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_1">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_1" name="disahkan_oleh_13" value="{{ old('disahkan_oleh_13') }}" readonly style="width:360px ;"></td>
                                        <td><input type="text"  class="form-control" name="tcsb_7" value="{{ old('tcsb_7') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_14" value="{{ old('jumlah_14') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_2">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_2" readonly value="{{ old('disahkan_oleh_14') }}" name="disahkan_oleh_14" style="width:360px ;"></td>
                                    </tr>

                                    <tr>
                                        <td>tiada cetakan</td>
                                        <td><input type="text"  class="form-control" name="subkontraktor_8" value="{{ old('subkontraktor_8') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_15" value="{{ old('jumlah_15') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_1">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_1" name="disahkan_oleh_15" value="{{ old('disahkan_oleh_15') }}" readonly style="width:360px ;"></td>
                                        <td><input type="text"  class="form-control" name="tcsb_8" value="{{ old('tcsb_8') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_16" value="{{ old('jumlah_16') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_2">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_2" readonly value="{{ old('disahkan_oleh_16') }}" name="disahkan_oleh_16" style="width:360px ;"></td>
                                    </tr>

                                    <tr>
                                        <td>Cover lari</td>
                                        <td><input type="text"  class="form-control" name="subkontraktor_9" value="{{ old('subkontraktor_9') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_17" value="{{ old('jumlah_17') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_1">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_1" name="disahkan_oleh_17" value="{{ old('disahkan_oleh_17') }}" readonly style="width:360px ;"></td>
                                        <td><input type="text"  class="form-control" name="tcsb_9" value="{{ old('tcsb_9') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_18" value="{{ old('jumlah_18') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_2">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_2" readonly value="{{ old('disahkan_oleh_18') }}" name="disahkan_oleh_18" style="width:360px ;"></td>
                                    </tr>

                                    <tr>
                                        <td>Gam tidak cukup</td>
                                        <td><input type="text"  class="form-control" name="subkontraktor_10" value="{{ old('subkontraktor_10') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_19" value="{{ old('jumlah_19') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_1">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_1" name="disahkan_oleh_19" value="{{ old('disahkan_oleh_19') }}" readonly style="width:360px ;"></td>
                                        <td><input type="text"  class="form-control" name="tcsb_10" value="{{ old('tcsb_10') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_20" value="{{ old('jumlah_20') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_2">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_2" readonly value="{{ old('disahkan_oleh_20') }}" name="disahkan_oleh_20" style="width:360px ;"></td>
                                    </tr>

                                    <tr>
                                        <td>Teks terlipat</td>
                                        <td><input type="text"  class="form-control" name="subkontraktor_11" value="{{ old('subkontraktor_11') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_21" value="{{ old('jumlah_21') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_1">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_1" name="disahkan_oleh_21" value="{{ old('disahkan_oleh_21') }}" readonly style="width:360px ;"></td>
                                        <td><input type="text"  class="form-control" name="tcsb_11" value="{{ old('tcsb_11') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_22" value="{{ old('jumlah_22') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_2">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_2" readonly value="{{ old('disahkan_oleh_22') }}" name="disahkan_oleh_22" style="width:360px ;"></td>
                                    </tr>

                                    <tr>
                                        <td>Lain-Lain</td>
                                        <td><input type="text"  class="form-control" name="subkontraktor_12" value="{{ old('subkontraktor_12') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_23" value="{{ old('jumlah_23') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_1">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_1" name="disahkan_oleh_23" value="{{ old('disahkan_oleh_23') }}" readonly style="width:360px ;"></td>
                                        <td><input type="text"  class="form-control" name="tcsb_12" value="{{ old('tcsb_12') }}" style="width:200px ;"></td>
                                        <td><input type="text"  class="form-control" name="jumlah_24" value="{{ old('jumlah_24') }}" style="width:200px ;"></td>
                                        <td><button class="btn btn-primary Check_2">Check</button></td>
                                        <td><input type="text"  class="form-control Qc_2" readonly value="{{ old('disahkan_oleh_24') }}" name="disahkan_oleh_24" style="width:360px ;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                            <a href="{{route('Laporan_Pemeriksaan.senarai')}}"
                                class="btn btn-primary float-right mt-3">Rekod Pemeriksaan AQL</a>

                            <div class="row mt-3">
                                <div class="col-md-2">kuantiti saip:</div>
                                <div class="col-md-2">
                                    <input type="text" name="kauntiti_siap_1" id="" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <select name="kauntiti_siap_2" id="" class="form-control saip">

                                        <option value="Naskah">Naskah</option>
                                        <option value="Helai">Helai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 mt-5"><input type="text" name="kauntiti_siap_3" id="" class="form-control"></div>
                                <div class="col-md-2 mt-5">
                                    <h5>Bungkusan</h5>
                                </div>
                            </div>

                            <input type="hidden" value="{{ $laporan_pemeriksaan_akhir_senari }}" name="row">
                            <input type="hidden" value="{{ $laporan_pemeriksaan_akhir_senari2 }}" name="keputusan">

                            <button type="submit" class="btn btn-primary float-right">Save</button>

                    </div>
                </div>

                <a href="{{route('Laporan_Pemeriksaan')}}" class="">Back to list</a>

            </div>

        </div>

    </div>
        </div>





    @endsection
    @push('custom-scripts')
    <script>


        $(document).ready(function() {
            $('.saip').select2();

            function formatDateWithAMPM(date) {
                    const options = { timeZone: 'Asia/Kuala_Lumpur', hour12: true };
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
