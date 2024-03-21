@extends('layouts.app')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="float-left"><b>LAPORAN PROSES PENCETAKAN</b></h5>
                                <p class="float-right">TCBS-B61 (Rev.0)</p>
                            </div>
                        </div>

                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Date</label>
                                            <input type="text" disabled  name="date" value="{{ \Carbon\Carbon::parse($laporan_proses_pencetakani->date)->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">

                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Time</label>
                                        <input type="text" name="time" value="{{ $laporan_proses_pencetakani->time }}"
                                            id="Currenttime" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Checked By (Operator)</label>
                                            <input type="text" value="{{ $laporan_proses_pencetakani->user->full_name }}" readonly
                                                name="" id="checked_by" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Sales Order No.</label>
                                            <input type="text"
                                                value="{{ $laporan_proses_pencetakani->sale_order->order_no }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Tajuk</label>
                                            <input type="text"
                                                value="{{ $laporan_proses_pencetakani->sale_order->description }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Kod Buku</label>
                                            <input type="text"
                                                value="{{ $laporan_proses_pencetakani->sale_order->kod_buku }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Seksyen No.</label>
                                            <input type="text" name="seksyen_no" id=""
                                                value="{{ $laporan_proses_pencetakani->seksyen_no }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Kuantiti cetakan</label>
                                            <input type="number" value="{{ $laporan_proses_pencetakani->kuaniti_cetakan }}"
                                                name="kuaniti_cetakan" id="" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Kuantiti waste</label>
                                            <input type="number" value="{{ $laporan_proses_pencetakani->kuaniti_waste }}"
                                                name="kuaniti_waste" id="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Operator</label>
                                            @php
                                                $item = json_decode($laporan_proses_pencetakani->user_id);
                                            @endphp
                                            <select disabled name="user[]" class="form-control form-select" id=""
                                                multiple>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        @if ($item) {{ in_array($user->id, $item) ? 'selected' : '' }} @endif>
                                                        {{ $user->full_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="card">
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
                                                    <th colspan="3">Status</th>

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
                                                    <td>Artwork (Gambar/teks)</td>
                                                    <td><input type="checkbox" name="b_1" id="" value="ok"
                                                            @checked($laporan_proses_pencetakani->b_1 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_1" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_1 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_1" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_1 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Warna</td>
                                                    <td><input type="checkbox" name="b_2" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_2 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_2" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_2 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_2" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_2 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Bleed</td>
                                                    <td><input type="checkbox" name="b_3" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_3 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_3" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_3 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_3" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_3 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Saiz spine (untuk cover sahaja) </td>
                                                    <td><input type="checkbox" name="b_4" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_4 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_4" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_4 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_4" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_4 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Register depan belakang</td>
                                                    <td><input type="checkbox" name="b_5" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_5 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_5" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_5 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_5" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_5 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Turutan muka surat</td>
                                                    <td><input type="checkbox" name="b_6" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_6 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_6" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_6 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_6" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_6 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>Tiada set off, kotor, hickies</td>
                                                    <td><input type="checkbox" name="b_7" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_7 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_7" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_7 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_7" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_7 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Periksa powder</td>
                                                    <td><input type="checkbox" name="b_8" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_8 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_8" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_8 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_8" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_8 == 'na')></td>

                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>Tiada doubling</td>
                                                    <td><input type="checkbox" name="b_9" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_9 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_9" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_9 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_9" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_9 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td>Frontlay & sidelay</td>
                                                    <td><input type="checkbox" name="b_10" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_10 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_10" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_10 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_10" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_10 == 'na')></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <h5>C) Pemeriksaan semasa proses Pencetakan</h5>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="table-responsive">

                                            <table class="table table-bordered" id="table">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">Jumlah</th>
                                                        <th colspan="7">Kriteria</th>
                                                        <th rowspan="2">Check</th>
                                                        <th rowspan="2">Check (Operator)</th>
                                                        <th rowspan="2">Verify (QC)</th>
                                                        <th rowspan="2">Verify</th>
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
                                                    @foreach ($details as $detail)
                                                        <tr>
                                                            <td>{{ $detail->c_1 }}</td>
                                                            <td><input type="checkbox" id=""
                                                                    @checked($detail->c_2 != null)>
                                                            </td>
                                                            <td><input type="checkbox" id=""
                                                                    @checked($detail->c_3 != null)>
                                                            </td>
                                                            <td><input type="checkbox" id=""
                                                                    @checked($detail->c_4 != null)>
                                                            </td>
                                                            <td><input type="checkbox" id=""
                                                                    @checked($detail->c_5 != null)>
                                                            </td>
                                                            <td><input type="checkbox" id=""
                                                                    @checked($detail->c_6 != null)>
                                                            </td>
                                                            <td><input type="checkbox" id=""
                                                                    @checked($detail->c_7 != null)>
                                                            </td>
                                                            <td><input type="checkbox" id=""
                                                                    @checked($detail->c_8 != null)>
                                                            </td>
                                                            <td><button type="button" class="btn btn-primary check_btn"
                                                                    style="border-radius:5px;" disabled>check</button>
                                                            </td>
                                                            <td><input type="text" value="{{ $detail->c_9 }}"
                                                                    class="check_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-primary verify_btn"
                                                                    disabled>Verify</button>
                                                            </td>
                                                            <td><input type="text" value="{{ $detail->c_10 }}"
                                                                    class="verify_operator form-control" readonly></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <h3><b>Verified By</b></h3>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Username</th>
                                                    <th>Designation</th>
                                                    <th>Department</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $laporan_proses_pencetakani->verified_by_date }}</td>
                                                    <td>{{ $laporan_proses_pencetakani->verified_by_user }}</td>
                                                    <td>{{ $laporan_proses_pencetakani->verified_by_designation }}</td>
                                                    <td>{{ $laporan_proses_pencetakani->verified_by_department }}</td>
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
            <a href="{{ route('laporan_proses_pencetakani') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
        </div>

@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('input').attr('disabled', 'disabled');
        });
    </script>
@endpush
