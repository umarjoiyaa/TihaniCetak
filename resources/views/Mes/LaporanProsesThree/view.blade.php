@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="float-left">LAPORAN PROSES THREE KNIFE</h5>
                                    <p class="float-right">TCSB-B53 (Rev.0)</p>
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
                                            <label for="">Date</label>
                                            <input type="text"  name="date" value="{{ \Carbon\Carbon::parse($laporan_proses_three->date)->format('d-m-Y') }}" class="form-control" id="datepicker" disabled pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Time</label>
                                        <input type="text" name="time" value="{{ $laporan_proses_three->time }}"
                                            id="Currenttime" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Checked By (Operator)</div>
                                            <input type="text" value="{{ $laporan_proses_three->user->full_name }}"
                                                readonly name="" id="checked_by" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-label">Sales Order No.</div>
                                            <input type="text" value="{{ $laporan_proses_three->sale_order->order_no }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Tajuk</div>
                                            <input type="text"
                                                value="{{ $laporan_proses_three->sale_order->description }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Kod Buku</div>
                                            <input type="text" value="{{ $laporan_proses_three->sale_order->kod_buku }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Saiz Buku</div>
                                            <input type="text" readonly
                                                value="{{ $laporan_proses_three->sale_order->size }}" id="size"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Kuantiti SO</div>
                                            <input type="text" readonly
                                                value="{{ $laporan_proses_three->sale_order->sale_order_qty }}"
                                                id="sale_order_qty" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Good Count (Optional)</div>
                                            <input type="text" name="good_count"
                                                value="{{ $laporan_proses_three->good_count }}" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Operator</label>
                                            @php
                                                $item = json_decode($laporan_proses_three->user_id);
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

                        <div class="row mt-5" style="background:#f4f4ff;">
                            <div class="col-md-12 mt-5">
                                <h5><b>B) Pemeriksaan dan Pengesahan 1st Piece</b> </h5>
                            </div>
                            <div class="col-md-8 mt-5">

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
                                            <td>Saiz yg betul</td>
                                            <td><input type="checkbox" class="Cover1"
                                                    onchange="handleCheckboxChange('Cover',this)" name="b_1"
                                                    value="ok" @checked($laporan_proses_three->b_1 == 'ok') id=""></td>
                                            <td><input type="checkbox" class="Cover1"
                                                    onchange="handleCheckboxChange('Cover1',this)" checked name="b_1"
                                                    value="ng" @checked($laporan_proses_three->b_1 == 'ng') id=""></td>
                                            <td><input type="checkbox" class="Cover1"
                                                    onchange="handleCheckboxChange('Cover1',this)" name="b_1"
                                                    value="na" @checked($laporan_proses_three->b_1 == 'na') id=""></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Kedudukan potongan yang betul</td>
                                            <td><input type="checkbox" class="Text1"
                                                    onchange="handleCheckboxChange('Text1',this)" name="b_2"
                                                    value="ok" @checked($laporan_proses_three->b_2 == 'ok') id=""></td>
                                            <td><input type="checkbox" class="Text1"
                                                    onchange="handleCheckboxChange('Text1',this)" checked name="b_2"
                                                    value="ng" @checked($laporan_proses_three->b_2 == 'ng') id=""></td>
                                            <td><input type="checkbox" class="Text1"
                                                    onchange="handleCheckboxChange('Text1',this)" name="b_2"
                                                    value="na" @checked($laporan_proses_three->b_2 == 'na') id=""></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Teks tidak terpotong</td>
                                            <td><input type="checkbox" class="Cover2"
                                                    onchange="handleCheckboxChange('Cover2',this)" name="b_3"
                                                    value="ok" @checked($laporan_proses_three->b_3 == 'ok') id=""></td>
                                            <td><input type="checkbox" class="Cover2"
                                                    onchange="handleCheckboxChange('Cover2',this)" checked name="b_3"
                                                    value="ng" @checked($laporan_proses_three->b_3 == 'ng') id=""></td>
                                            <td><input type="checkbox" class="Cover2"
                                                    onchange="handleCheckboxChange('Cover2',this)" name="b_3"
                                                    value="na" @checked($laporan_proses_three->b_3 == 'na') id=""></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Turutan Seksyen/muka surat</td>
                                            <td><input type="checkbox" class="Text2"
                                                    onchange="handleCheckboxChange('Text2',this)" name="b_4"
                                                    value="ok" @checked($laporan_proses_three->b_4 == 'ok') id=""></td>
                                            <td><input type="checkbox" class="Text2"
                                                    onchange="handleCheckboxChange('Text2',this)" checked name="b_4"
                                                    value="ng" @checked($laporan_proses_three->b_4 == 'ng') id=""></td>
                                            <td><input type="checkbox" class="Text2"
                                                    onchange="handleCheckboxChange('Text2',this)" name="b_4"
                                                    value="na" @checked($laporan_proses_three->b_4 == 'na') id=""></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Kepetakan/ squareness</td>
                                            <td><input type="checkbox" class="Cover3"
                                                    onchange="handleCheckboxChange('Cover3',this)" name="b_5"
                                                    value="ok" @checked($laporan_proses_three->b_5 == 'ok') id=""></td>
                                            <td><input type="checkbox" class="Cover3"
                                                    onchange="handleCheckboxChange('Cover3',this)" checked name="b_5"
                                                    value="ng" @checked($laporan_proses_three->b_5 == 'ng') id=""></td>
                                            <td><input type="checkbox" class="Cover3"
                                                    onchange="handleCheckboxChange('Cover3',this)" name="b_5"
                                                    value="na" @checked($laporan_proses_three->b_5 == 'na') id=""></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Potongan yang bersih</td>
                                            <td><input type="checkbox" class="Text3"
                                                    onchange="handleCheckboxChange('Text3',this)" name="b_6"
                                                    value="ok" @checked($laporan_proses_three->b_6 == 'ok') id=""></td>
                                            <td><input type="checkbox" class="Text3"
                                                    onchange="handleCheckboxChange('Text3',this)" checked name="b_6"
                                                    value="ng" @checked($laporan_proses_three->b_6 == 'ng') id=""></td>
                                            <td><input type="checkbox" class="Text3"
                                                    onchange="handleCheckboxChange('Text3',this)" name="b_6"
                                                    value="na" @checked($laporan_proses_three->b_6 == 'na') id=""></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Turutan muka surat</td>
                                            <td><input type="checkbox" class="Cover4"
                                                    onchange="handleCheckboxChange('Cover4',this)" name="b_7"
                                                    value="ok" @checked($laporan_proses_three->b_7 == 'ok') id=""></td>
                                            <td><input type="checkbox" class="Cover4"
                                                    onchange="handleCheckboxChange('Cover4',this)" checked name="b_7"
                                                    value="ng" @checked($laporan_proses_three->b_7 == 'ng') id=""></td>
                                            <td><input type="checkbox" class="Cover4"
                                                    onchange="handleCheckboxChange('Cover4',this)" name="b_7"
                                                    value="na" @checked($laporan_proses_three->b_7 == 'na') id=""></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Kotor</td>
                                            <td><input type="checkbox" class="Text8"
                                                    onchange="handleCheckboxChange('Text8',this)" name="b_8"
                                                    value="ok" @checked($laporan_proses_three->b_8 == 'ok') id=""></td>
                                            <td><input type="checkbox" class="Text8"
                                                    onchange="handleCheckboxChange('Text8',this)" checked name="b_8"
                                                    value="ng" @checked($laporan_proses_three->b_8 == 'ng') id=""></td>
                                            <td><input type="checkbox" class="Text8"
                                                    onchange="handleCheckboxChange('Text8',this)" name="b_8"
                                                    value="na" @checked($laporan_proses_three->b_8 == 'na') id=""></td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Koyak</td>
                                            <td><input type="checkbox" class="Cover9"
                                                    onchange="handleCheckboxChange('Cover9',this)" name="b_9"
                                                    value="ok" @checked($laporan_proses_three->b_9 == 'ok') id=""></td>
                                            <td><input type="checkbox" class="Cover9"
                                                    onchange="handleCheckboxChange('Cover9',this)" checked name="b_9"
                                                    value="ng" @checked($laporan_proses_three->b_9 == 'ng') id=""></td>
                                            <td><input type="checkbox" class="Cover9"
                                                    onchange="handleCheckboxChange('Cover9',this)" name="b_9"
                                                    value="na" @checked($laporan_proses_three->b_9 == 'na') id=""></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>melekat</td>
                                            <td><input type="checkbox" class="Text10"
                                                    onchange="handleCheckboxChange('Text10',this)" name="b_10"
                                                    value="ok" @checked($laporan_proses_three->b_10 == 'ok') id=""></td>
                                            <td><input type="checkbox" class="Text10"
                                                    onchange="handleCheckboxChange('Text10',this)" checked name="b_10"
                                                    value="ng" @checked($laporan_proses_three->b_10 == 'ng') id=""></td>
                                            <td><input type="checkbox" class="Text10"
                                                    onchange="handleCheckboxChange('Text10',this)" name="b_10"
                                                    value="na" @checked($laporan_proses_three->b_10 == 'na') id=""></td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>calar/ kemik</td>
                                            <td><input type="checkbox" class="Cover11"
                                                    onchange="handleCheckboxChange('Cover11',this)" name="b_11"
                                                    value="ok" @checked($laporan_proses_three->b_11 == 'ok') id=""></td>
                                            <td><input type="checkbox" class="Cover11"
                                                    onchange="handleCheckboxChange('Cover11',this)" checked name="b_11"
                                                    value="ng" @checked($laporan_proses_three->b_11 == 'ng') id=""></td>
                                            <td><input type="checkbox" class="Cover11"
                                                    onchange="handleCheckboxChange('Cover11',this)" name="b_11"
                                                    value="na" @checked($laporan_proses_three->b_11 == 'na') id=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-5" style="background:#f4f4ff;">
                            <div class="col-md-12 mt-5">
                                <h5><b>C) Pemeriksaan semasa proses potong </b></h5>
                            </div>


                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">Jumlah </th>
                                                <th colspan="10">Kriteria</th>
                                                <th rowspan="2">Check (Operator)</th>
                                                <th rowspan="2">Username / datetime</th>
                                                <th rowspan="2">Verify</th>
                                                <th rowspan="2">Username / datetime</th>
                                            </tr>
                                            <tr>
                                                <th>Kedudukan potongan yang betul</th>
                                                <th>Teks tidak terpotong</th>
                                                <th>Kepetakan/ squareness</th>
                                                <th>Potongan yang bersih</th>
                                                <th>Turutan muka surat</th>
                                                <th>Kotor</th>
                                                <th>Koyak</th>
                                                <th>melekat</th>
                                                <th>calar</th>
                                                <th>kemik</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($details as $key => $detail)
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
                                                    <td><input type="checkbox" id=""
                                                            @checked($detail->c_9 != null)>
                                                    </td>
                                                    <td><input type="checkbox" id=""
                                                            @checked($detail->c_10 != null)>
                                                    </td>
                                                    <td><input type="checkbox" id=""
                                                            @checked($detail->c_11 != null)>
                                                    </td>
                                                    <td><button type="button" class="btn btn-primary check_btn"
                                                            style="border-radius:5px;" disabled>check</button></td>
                                                    <td><input type="text" class="check_operator form-control" readonly
                                                            value="{{ $detail->c_12 }}"></td>
                                                    <td><button type="button" class="btn btn-primary verify_btn"
                                                            disabled>Verify</button>
                                                    </td>
                                                    <td><input type="text" class="verify_operator form-control"
                                                            readonly value="{{ $detail->c_13 }}"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
                                                <th>Desgination</th>
                                                <th>Department</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $laporan_proses_three->verified_by_date }}</td>
                                                <td>{{ $laporan_proses_three->verified_by_user }}</td>
                                                <td>{{ $laporan_proses_three->verified_by_designation }}</td>
                                                <td>{{ $laporan_proses_three->verified_by_department }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('laporan_proses_three') }}">back to list</a>
        </div>
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
