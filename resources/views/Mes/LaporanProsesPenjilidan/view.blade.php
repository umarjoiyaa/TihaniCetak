@extends('layouts.app')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="float-left">LAPORAN PROSES PENJILIDAN (PERFECT BIND)</h5>
                                    <p class="float-right">TCSB-B61 (Rev.0)</p>
                                </div>
                            </div>

                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5><b>A) Informasi</b></h5>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Tarikh</label>
                                            <input type="text"  name="date" value="{{ \Carbon\Carbon::parse($laporan_proses_penjilidan->date)->format('d-m-Y') }}" class="form-control" id="datepicker" disabled pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Time</label>
                                        <input type="text" name="time" value="{{ $laporan_proses_penjilidan->time }}"
                                            id="Currenttime" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Diperiksa oleh (Operator)</div>
                                            <input type="text" value="{{ $laporan_proses_penjilidan->user->user_name }}" readonly
                                                name="" id="checked_by" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-label">Sales Order No.</div>
                                            <input type="text"
                                                value="{{ $laporan_proses_penjilidan->sale_order->order_no }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Tajuk</div>
                                            <input type="text"
                                                value="{{ $laporan_proses_penjilidan->sale_order->description }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Kod Buku</div>
                                            <input type="text"
                                                value="{{ $laporan_proses_penjilidan->sale_order->kod_buku }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Jumlah Seksyen</div>
                                            <input type="text" readonly
                                                value="{{ $laporan_proses_penjilidan->senari_semak->item_cover_text ?? 0 }}"
                                                id="jumlah" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Kuantiti SO</div>
                                            <input type="number"
                                                value="{{ $laporan_proses_penjilidan->sale_order->sale_order_qty }}"
                                                readonly id="sale_order_qty" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Jenis Penjilidan</label>
                                            <input type="text" class="form-control"
                                                value="{{ $laporan_proses_penjilidan->jenis }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Operator</label>
                                            @php
                                                $item = json_decode($laporan_proses_penjilidan->user_id);
                                            @endphp
                                            <select disabled name="user[]" class="form-control form-select" id=""
                                                multiple>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        @if ($item) {{ in_array($user->id, $item) ? 'selected' : '' }} @endif>
                                                        {{ $user->user_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Pembantu</label>
                                            @php
                                                $item1 = json_decode($laporan_proses_penjilidan->pembantu);
                                            @endphp
                                            <select disabled name="pembantu[]" class="form-control form-select"
                                                id="" multiple>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        @if ($item1) {{ in_array($user->id, $item1) ? 'selected' : '' }} @endif>
                                                        {{ $user->user_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row mt-5" style="background:#f4f4ff;">
                            <div class="col-md-12 mt-5">
                                <h5><b>B) Pemeriksaan dan Pengesahan 1st Piece</b> </h5>
                            </div>
                            <div class="col-md-8 mt-5">

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">Kriteria</th>
                                                <th colspan="4">Status</th>

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
                                                <td>Koyakan fiber</td>
                                                <td><input type="checkbox" class="Cover1"
                                                        onchange="handleCheckboxChange('Cover',this)" name="b_1"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_1 == 'ok') id=""></td>
                                                <td><input type="checkbox" class="Cover1"
                                                        onchange="handleCheckboxChange('Cover1',this)" name="b_1"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_1 == 'ng') id=""></td>
                                                <td><input type="checkbox" class="Cover1"
                                                        onchange="handleCheckboxChange('Cover1',this)" name="b_1"
                                                        value="na" @checked($laporan_proses_penjilidan->b_1 == 'na') id=""></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Kedudukan Kulit buku dan teks</td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" name="b_2"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_2 == 'ok') id=""></td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" name="b_2"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_2 == 'ng') id=""></td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" name="b_2"
                                                        value="na" @checked($laporan_proses_penjilidan->b_2 == 'na') id=""></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Artwork Kulit buku dan Teks</td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" name="b_3"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_3 == 'ok') id=""></td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" name="b_3"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_3 == 'ng') id=""></td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" name="b_3"
                                                        value="na" @checked($laporan_proses_penjilidan->b_3 == 'na') id=""></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Turutan Seksyen/muka surat</td>
                                                <td><input type="checkbox" class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)" name="b_4"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_4 == 'ok') id=""></td>
                                                <td><input type="checkbox" class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)" name="b_4"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_4 == 'ng') id=""></td>
                                                <td><input type="checkbox" class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)" name="b_4"
                                                        value="na" @checked($laporan_proses_penjilidan->b_4 == 'na') id=""></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Kedudukan gam (side gam)</td>
                                                <td><input type="checkbox" class="Cover3"
                                                        onchange="handleCheckboxChange('Cover3',this)" name="b_5"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_5 == 'ok') id=""></td>
                                                <td><input type="checkbox" class="Cover3"
                                                        onchange="handleCheckboxChange('Cover3',this)" name="b_5"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_5 == 'ng') id=""></td>
                                                <td><input type="checkbox" class="Cover3"
                                                        onchange="handleCheckboxChange('Cover3',this)" name="b_5"
                                                        value="na" @checked($laporan_proses_penjilidan->b_5 == 'na') id=""></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Rosak/koyak</td>
                                                <td><input type="checkbox" class="Text3"
                                                        onchange="handleCheckboxChange('Text3',this)" name="b_6"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_6 == 'ok') id=""></td>
                                                <td><input type="checkbox" class="Text3"
                                                        onchange="handleCheckboxChange('Text3',this)" name="b_6"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_6 == 'ng') id=""></td>
                                                <td><input type="checkbox" class="Text3"
                                                        onchange="handleCheckboxChange('Text3',this)" name="b_6"
                                                        value="na" @checked($laporan_proses_penjilidan->b_6 == 'na') id=""></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Kotor</td>
                                                <td><input type="checkbox" class="Cover4"
                                                        onchange="handleCheckboxChange('Cover4',this)" name="b_7"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_7 == 'ok') id=""></td>
                                                <td><input type="checkbox" class="Cover4"
                                                        onchange="handleCheckboxChange('Cover4',this)" name="b_7"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_7 == 'ng') id=""></td>
                                                <td><input type="checkbox" class="Cover4"
                                                        onchange="handleCheckboxChange('Cover4',this)" name="b_7"
                                                        value="na" @checked($laporan_proses_penjilidan->b_7 == 'na') id=""></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Lain-lain</td>
                                                <td><input type="checkbox" class="Text8"
                                                        onchange="handleCheckboxChange('Text8',this)" name="b_8"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_8 == 'ok') id=""></td>
                                                <td><input type="checkbox" class="Text8"
                                                        onchange="handleCheckboxChange('Text8',this)" name="b_8"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_8 == 'ng') id=""></td>
                                                <td><input type="checkbox" class="Text8"
                                                        onchange="handleCheckboxChange('Text8',this)" name="b_8"
                                                        value="na" @checked($laporan_proses_penjilidan->b_8 == 'na') id=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5" style="background:#f4f4ff;">
                            <div class="col-md-12 mt-5">
                                <h5><b>C) Pemeriksaan semasa proses penjilidan </b></h5>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">Jumlah </th>
                                                <th colspan="5s">Kriteria</th>
                                                <th rowspan="2">Check (Operator)</th>
                                                <th rowspan="2">Username / datetime</th>
                                                <th rowspan="2">Verify</th>
                                                <th rowspan="2">Username / datetime</th>
                                            </tr>
                                            <tr>
                                                <th>Kedudukan Kulit buku dan teks</th>
                                                <th>Artwork Kulit buku dan teks</th>
                                                <th>Turutan Seksyen/ muka surat</th>
                                                <th>Rosak/Koyak</th>
                                                <th>Kotor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($details as $key => $detail)
                                                <tr>
                                                    <td>{{ $detail->c_1 }}</td>
                                                    <td><input type="hidden" value="{{ $detail->c_1 }}"><input
                                                            type="checkbox" id="" @checked($detail->c_2 != null)>
                                                    </td>
                                                    <td><input type="checkbox" id="" @checked($detail->c_3 != null)>
                                                    </td>
                                                    <td><input type="checkbox" id="" @checked($detail->c_4 != null)>
                                                    </td>
                                                    <td><input type="checkbox" id="" @checked($detail->c_5 != null)>
                                                    </td>
                                                    <td><input type="checkbox" id="" @checked($detail->c_6 != null)>
                                                    </td>
                                                    <td><button type="button" class="btn btn-primary check_btn"
                                                            style="border-radius:5px;"
                                                            @disabled($detail->c_7 != null)>check</button></td>
                                                    <td><input type="text" class="check_operator form-control"
                                                            value="{{ $detail->c_7 }}" readonly></td>
                                                    <td><button type="button" class="btn btn-primary verify_btn"
                                                            disabled>Verify</button>
                                                    </td>
                                                    <td><input type="text" class="verify_operator form-control"
                                                            value="{{ $detail->c_8 }}" readonly></td>
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
                                <div class="table-responsive">
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
                                            <td>{{ $laporan_proses_penjilidan->verified_by_date }}</td>
                                            <td>{{ $laporan_proses_penjilidan->verified_by_user }}</td>
                                            <td>{{ $laporan_proses_penjilidan->verified_by_designation }}</td>
                                            <td>{{ $laporan_proses_penjilidan->verified_by_department }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('laporan_proses_penjilidan') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('input').attr('disabled', 'disabled');
        });
    </script>
@endpush
