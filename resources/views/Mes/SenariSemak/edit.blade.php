@extends('layouts.app')
@section('css')
<style>
        table th{
                text-align:left;
        }
</style>
@endsection
@section('content')
<form action="{{ route('senari_semak.update', $senari_semak->id) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="float-left"><b>Senarai Semak Pencetakan Digital</b></h5>
                                        <p class="float-right">TCSB-BO4(Rev.11)</p>
                                    </div>
                               </div>

                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="form-label">Sale Order</div>
                                        <select name="sale_order" data-id="{{ $senari_semak->sale_order_id }}"
                                            id="sale_order" class="form-control">
                                            <option value="{{ $senari_semak->sale_order_id }}" selected
                                                style="color: black; !important">
                                                {{ $senari_semak->sale_order->order_no }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="form-label">Date</div>
                                        <input type="text" name="date"
                                            value="{{ \Carbon\Carbon::parse($senari_semak->date)->format('d-m-Y') }}"
                                            class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                            placeholder="dd-mm-yyyy">

                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="form-label">kod Buku</div>
                                        <input type="text" readonly value="" name="" id="kod_buku" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="form-label">Tajuk</div>
                                        <input type="text" readonly value="" name="" id="tajuk" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                             @php
                                                $timeIn24HourFormat = Carbon\Carbon::createFromFormat('h:i A', $senari_semak->time)->format('H:i');
                                            @endphp
                                            <div class="form-label">Time</div>
                                            <input name="time" type="time" id="Currenttime"
                                                value="{{$timeIn24HourFormat}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="form-label">Checked By</div>
                                        <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                            class="form-control" name="" id="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h5><b>Bahagian A ( Semakan File)</b></h5>
                        </div>
                        <div class="col-md-9">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">kriteria</th>
                                        <th colspan="3">cover</th>
                                        <th colspan="3">text</th>

                                    </tr>
                                    <tr>
                                        <th>OK</th>
                                        <th>NG</th>
                                        <th>NA</th>
                                        <th>OK</th>
                                        <th>NG</th>
                                        <th>NA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Saiz produk (Bandingkan SO dan Job Sheet)</td>
                                        <td><input type="checkbox" class="Cover1"
                                                onchange="handleCheckboxChange('Cover1',this)" name="behagian_a_1_cover"
                                                @checked($senari_semak->bahagian_a_1_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover1"
                                                onchange="handleCheckboxChange('Cover1',this)" name="behagian_a_1_cover"
                                                @checked($senari_semak->bahagian_a_1_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover1"
                                                onchange="handleCheckboxChange('Cover1',this)" name="behagian_a_1_cover"
                                                @checked($senari_semak->bahagian_a_1_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover2"
                                                onchange="handleCheckboxChange('Cover2',this)" name="behagian_a_1_text"
                                                @checked($senari_semak->bahagian_a_1_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover2"
                                                onchange="handleCheckboxChange('Cover2',this)" name="behagian_a_1_text"
                                                @checked($senari_semak->bahagian_a_1_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover2"
                                                onchange="handleCheckboxChange('Cover2',this)" name="behagian_a_1_text"
                                                @checked($senari_semak->bahagian_a_1_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Design clearance 5mm (print to cut dan stitching binding)</td>
                                        <td><input type="checkbox" class="Cover3"
                                                onchange="handleCheckboxChange('Cover3',this)" name="behagian_a_2_cover"
                                                @checked($senari_semak->bahagian_a_2_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover3"
                                                onchange="handleCheckboxChange('Cover3',this)" name="behagian_a_2_cover"
                                                @checked($senari_semak->bahagian_a_2_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover3"
                                                onchange="handleCheckboxChange('Cover3',this)" name="behagian_a_2_cover"
                                                @checked($senari_semak->bahagian_a_2_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover4"
                                                onchange="handleCheckboxChange('Cover4',this)" name="behagian_a_2_text"
                                                @checked($senari_semak->bahagian_a_2_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover4"
                                                onchange="handleCheckboxChange('Cover4',this)" name="behagian_a_2_text"
                                                @checked($senari_semak->bahagian_a_2_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover4"
                                                onchange="handleCheckboxChange('Cover4',this)" name="behagian_a_2_text"
                                                @checked($senari_semak->bahagian_a_2_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Image artwork (Semak teks & gambar)</td>
                                        <td><input type="checkbox" class="Cover5"
                                                onchange="handleCheckboxChange('Cover5',this)" name="behagian_a_3_cover"
                                                @checked($senari_semak->bahagian_a_3_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover5"
                                                onchange="handleCheckboxChange('Cover5',this)" name="behagian_a_3_cover"
                                                @checked($senari_semak->bahagian_a_3_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover5"
                                                onchange="handleCheckboxChange('Cover5',this)" name="behagian_a_3_cover"
                                                @checked($senari_semak->bahagian_a_3_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover6"
                                                onchange="handleCheckboxChange('Cover6',this)" name="behagian_a_3_text"
                                                @checked($senari_semak->bahagian_a_3_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover6"
                                                onchange="handleCheckboxChange('Cover6',this)" name="behagian_a_3_text"
                                                @checked($senari_semak->bahagian_a_3_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover6"
                                                onchange="handleCheckboxChange('Cover6',this)" name="behagian_a_3_text"
                                                @checked($senari_semak->bahagian_a_3_text
                                            == 'na') value="na"></td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td>Bleed (3-5mm)</td>
                                        <td><input type="checkbox" class="Cover7"
                                                onchange="handleCheckboxChange('Cover7',this)" name="behagian_a_4_cover"
                                                @checked($senari_semak->bahagian_a_4_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover7"
                                                onchange="handleCheckboxChange('Cover7',this)" name="behagian_a_4_cover"
                                                @checked($senari_semak->bahagian_a_4_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover7"
                                                onchange="handleCheckboxChange('Cover7',this)" name="behagian_a_4_cover"
                                                @checked($senari_semak->bahagian_a_4_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover8"
                                                onchange="handleCheckboxChange('Cover8',this)" name="behagian_a_4_text"
                                                @checked($senari_semak->bahagian_a_4_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover8"
                                                onchange="handleCheckboxChange('Cover8',this)" name="behagian_a_4_text"
                                                @checked($senari_semak->bahagian_a_4_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover8"
                                                onchange="handleCheckboxChange('Cover8',this)" name="behagian_a_4_text"
                                                @checked($senari_semak->bahagian_a_4_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Saiz spine (perfect bind)</td>
                                        <td><input type="checkbox" class="Cover08"
                                                onchange="handleCheckboxChange('Cover08',this)"
                                                name="behagian_a_5_cover" @checked($senari_semak->bahagian_a_5_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover08"
                                                onchange="handleCheckboxChange('Cover08',this)"
                                                name="behagian_a_5_cover" @checked($senari_semak->bahagian_a_5_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover08"
                                                onchange="handleCheckboxChange('Cover08',this)"
                                                name="behagian_a_5_cover" @checked($senari_semak->bahagian_a_5_cover
                                            == 'na') value="na"></td>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Kedudukan artwork (hardcover)</td>
                                        <td><input type="checkbox" class="Cover9"
                                                onchange="handleCheckboxChange('Cover9',this)" name="behagian_a_6_cover"
                                                @checked($senari_semak->bahagian_a_6_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover9"
                                                onchange="handleCheckboxChange('Cover9',this)" name="behagian_a_6_cover"
                                                @checked($senari_semak->bahagian_a_6_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover9"
                                                onchange="handleCheckboxChange('Cover9',this)" name="behagian_a_6_cover"
                                                @checked($senari_semak->bahagian_a_6_cover
                                            == 'na') value="na"></td>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Alamat pencetak</td>
                                        <td colspan="3" readonly></td>
                                        <td><input type="checkbox" class="Cover10"
                                                onchange="handleCheckboxChange('Cover10',this)" name="behagian_a_7_text"
                                                @checked($senari_semak->bahagian_a_7_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover10"
                                                onchange="handleCheckboxChange('Cover10',this)" name="behagian_a_7_text"
                                                @checked($senari_semak->bahagian_a_7_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover10"
                                                onchange="handleCheckboxChange('Cover10',this)" name="behagian_a_7_text"
                                                @checked($senari_semak->bahagian_a_7_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Cetakan (Sila nyatakan)</td>
                                        <td colspan="3"></td>
                                        <td colspan="3"><input type="type" class="form-control"
                                                value="{{$senari_semak->bahagian_a_8_text}}" name="behagian_a_8_text"
                                                id=""></td>

                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                        <td colspan="3" readonly></td>
                                        <td><input type="checkbox" class="Cover11"
                                                onchange="handleCheckboxChange('Cover11',this)" name="behagian_a_9_text"
                                                @checked($senari_semak->bahagian_a_9_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover11"
                                                onchange="handleCheckboxChange('Cover11',this)" name="behagian_a_9_text"
                                                @checked($senari_semak->bahagian_a_9_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover11"
                                                onchange="handleCheckboxChange('Cover11',this)" name="behagian_a_9_text"
                                                @checked($senari_semak->bahagian_a_9_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Turutan mukasurat (Berturutan)</td>
                                        <td colspan="3" readonly></td>
                                        <td><input type="checkbox" class="Cover12"
                                                onchange="handleCheckboxChange('Cover12',this)"
                                                name="behagian_a_10_text" @checked($senari_semak->bahagian_a_10_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover12"
                                                onchange="handleCheckboxChange('Cover12',this)"
                                                name="behagian_a_10_text" @checked($senari_semak->bahagian_a_10_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover12"
                                                onchange="handleCheckboxChange('Cover12',this)"
                                                name="behagian_a_10_text" @checked($senari_semak->bahagian_a_10_text
                                            == 'na') value="na"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>NOTA:</h5>
                                    <p>1. Jika semakan file artwork mendapati permasalahan dan pelanggan memohon
                                        untuk
                                        pihak TCSB membuat tindakan pembetulan, pembetulan tersebut boleh
                                        diakukan
                                        oleh
                                        Operator POD. File artwork yang telah dibetulkan perlu dihantar semula
                                        kepada
                                        pelanggan untuk mendapatkan pengesahan. Setelah mendapat pengesahan
                                        pelanggan,
                                        barulah Operator POD boleh meneruskan proses seterusnya.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h5><b>Bahagian B (Pemeriksaan Dan Pengesahan 1st Piece)</b></h5>
                        </div>
                        <div class="col-md-9">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">kriteria</th>
                                        <th colspan="3">cover</th>
                                        <th colspan="3">text</th>

                                    </tr>
                                    <tr>
                                        <th>OK</th>
                                        <th>NG</th>
                                        <th>NA</th>
                                        <th>OK</th>
                                        <th>NG</th>
                                        <th>NA</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>1</td>
                                        <td>Jenis Kertas (Bandingkan SO dan Job Sheet)</td>
                                        <td><input type="checkbox" class="Cover13"
                                                onchange="handleCheckboxChange('Cover13',this)"
                                                name="behagian_b_1_cover" @checked($senari_semak->bahagian_b_1_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover13"
                                                onchange="handleCheckboxChange('Cover13',this)"
                                                name="behagian_b_1_cover" @checked($senari_semak->bahagian_b_1_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover13"
                                                onchange="handleCheckboxChange('Cover13',this)"
                                                name="behagian_b_1_cover" @checked($senari_semak->bahagian_b_1_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover14"
                                                onchange="handleCheckboxChange('Cover14',this)" name="behagian_b_1_text"
                                                @checked($senari_semak->bahagian_b_1_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover14"
                                                onchange="handleCheckboxChange('Cover14',this)" name="behagian_b_1_text"
                                                @checked($senari_semak->bahagian_b_1_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover14"
                                                onchange="handleCheckboxChange('Cover14',this)" name="behagian_b_1_text"
                                                @checked($senari_semak->bahagian_b_1_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Saiz produk (Bandingkan Job Sheet dan file art)</td>
                                        <td><input type="checkbox" class="Cover15"
                                                onchange="handleCheckboxChange('Cover15',this)"
                                                name="behagian_b_2_cover" @checked($senari_semak->bahagian_b_2_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover15"
                                                onchange="handleCheckboxChange('Cover15',this)"
                                                name="behagian_b_2_cover" @checked($senari_semak->bahagian_b_2_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover15"
                                                onchange="handleCheckboxChange('Cover15',this)"
                                                name="behagian_b_2_cover" @checked($senari_semak->bahagian_b_2_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover16"
                                                onchange="handleCheckboxChange('Cover16',this)" name="behagian_b_2_text"
                                                @checked($senari_semak->bahagian_b_2_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover16"
                                                onchange="handleCheckboxChange('Cover16',this)" name="behagian_b_2_text"
                                                @checked($senari_semak->bahagian_b_2_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover16"
                                                onchange="handleCheckboxChange('Cover16',this)" name="behagian_b_2_text"
                                                @checked($senari_semak->bahagian_b_2_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Artwork (Semak gambar dan teks)</td>
                                        <td><input type="checkbox" class="Cover17"
                                                onchange="handleCheckboxChange('Cover17',this)"
                                                name="behagian_b_3_cover" @checked($senari_semak->bahagian_b_3_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover17"
                                                onchange="handleCheckboxChange('Cover17',this)"
                                                name="behagian_b_3_cover" @checked($senari_semak->bahagian_b_3_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover17"
                                                onchange="handleCheckboxChange('Cover17',this)"
                                                name="behagian_b_3_cover" @checked($senari_semak->bahagian_b_3_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover18"
                                                onchange="handleCheckboxChange('Cover18',this)" name="behagian_b_3_text"
                                                @checked($senari_semak->bahagian_b_3_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover18"
                                                onchange="handleCheckboxChange('Cover18',this)" name="behagian_b_3_text"
                                                @checked($senari_semak->bahagian_b_3_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover18"
                                                onchange="handleCheckboxChange('Cover18',this)" name="behagian_b_3_text"
                                                @checked($senari_semak->bahagian_b_3_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td> Design clearance 5mm (print to cut dan stitching binding)</td>
                                        <td><input type="checkbox" class="Cover19"
                                                onchange="handleCheckboxChange('Cover19',this)"
                                                name="behagian_b_4_cover" @checked($senari_semak->bahagian_b_4_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover19"
                                                onchange="handleCheckboxChange('Cover19',this)"
                                                name="behagian_b_4_cover" @checked($senari_semak->bahagian_b_4_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover19"
                                                onchange="handleCheckboxChange('Cover19',this)"
                                                name="behagian_b_4_cover" @checked($senari_semak->bahagian_b_4_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover20"
                                                onchange="handleCheckboxChange('Cover20',this)" name="behagian_b_4_text"
                                                @checked($senari_semak->bahagian_b_4_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover20"
                                                onchange="handleCheckboxChange('Cover20',this)" name="behagian_b_4_text"
                                                @checked($senari_semak->bahagian_b_4_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover20"
                                                onchange="handleCheckboxChange('Cover20',this)" name="behagian_b_4_text"
                                                @checked($senari_semak->bahagian_b_4_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Jumlah mukasurat (Job Sheet dan file artwork)</td>
                                        <td><input type="checkbox" class="Cover21"
                                                onchange="handleCheckboxChange('Cover21',this)"
                                                name="behagian_b_5_cover" @checked($senari_semak->bahagian_b_5_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover21"
                                                onchange="handleCheckboxChange('Cover21',this)"
                                                name="behagian_b_5_cover" @checked($senari_semak->bahagian_b_5_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover21"
                                                onchange="handleCheckboxChange('Cover21',this)"
                                                name="behagian_b_5_cover" @checked($senari_semak->bahagian_b_5_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover22"
                                                onchange="handleCheckboxChange('Cover22',this)" name="behagian_b_5_text"
                                                @checked($senari_semak->bahagian_b_5_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover22"
                                                onchange="handleCheckboxChange('Cover22',this)" name="behagian_b_5_text"
                                                @checked($senari_semak->bahagian_b_5_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover22"
                                                onchange="handleCheckboxChange('Cover22',this)" name="behagian_b_5_text"
                                                @checked($senari_semak->bahagian_b_5_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Turutan mukasurat (Berturutan)</td>
                                        <td><input type="checkbox" class="Cover23"
                                                onchange="handleCheckboxChange('Cover23',this)"
                                                name="behagian_b_6_cover" @checked($senari_semak->bahagian_b_6_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover23"
                                                onchange="handleCheckboxChange('Cover23',this)"
                                                name="behagian_b_6_cover" @checked($senari_semak->bahagian_b_6_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover23"
                                                onchange="handleCheckboxChange('Cover23',this)"
                                                name="behagian_b_6_cover" @checked($senari_semak->bahagian_b_6_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover24"
                                                onchange="handleCheckboxChange('Cover24',this)" name="behagian_b_6_text"
                                                @checked($senari_semak->bahagian_b_6_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover24"
                                                onchange="handleCheckboxChange('Cover24',this)" name="behagian_b_6_text"
                                                @checked($senari_semak->bahagian_b_6_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover24"
                                                onchange="handleCheckboxChange('Cover24',this)" name="behagian_b_6_text"
                                                @checked($senari_semak->bahagian_b_6_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Bleed (3-5mm)</td>
                                        <td><input type="checkbox" class="Cover25"
                                                onchange="handleCheckboxChange('Cover25',this)"
                                                name="behagian_b_7_cover" @checked($senari_semak->bahagian_b_7_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover25"
                                                onchange="handleCheckboxChange('Cover25',this)"
                                                name="behagian_b_7_cover" @checked($senari_semak->bahagian_b_7_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover25"
                                                onchange="handleCheckboxChange('Cover25',this)"
                                                name="behagian_b_7_cover" @checked($senari_semak->bahagian_b_7_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover26"
                                                onchange="handleCheckboxChange('Cover26',this)" name="behagian_b_7_text"
                                                @checked($senari_semak->bahagian_b_7_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover26"
                                                onchange="handleCheckboxChange('Cover26',this)" name="behagian_b_7_text"
                                                @checked($senari_semak->bahagian_b_7_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover26"
                                                onchange="handleCheckboxChange('Cover26',this)" name="behagian_b_7_text"
                                                @checked($senari_semak->bahagian_b_7_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Crop mark (mempunyai crop mark)</td>
                                        <td><input type="checkbox" class="Cover27"
                                                onchange="handleCheckboxChange('Cover27',this)"
                                                name="behagian_b_8_cover" @checked($senari_semak->bahagian_b_8_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover27"
                                                onchange="handleCheckboxChange('Cover27',this)"
                                                name="behagian_b_8_cover" @checked($senari_semak->bahagian_b_8_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover27"
                                                onchange="handleCheckboxChange('Cover27',this)"
                                                name="behagian_b_8_cover" @checked($senari_semak->bahagian_b_8_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover28"
                                                onchange="handleCheckboxChange('Cover28',this)" name="behagian_b_8_text"
                                                @checked($senari_semak->bahagian_b_8_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover28"
                                                onchange="handleCheckboxChange('Cover28',this)" name="behagian_b_8_text"
                                                @checked($senari_semak->bahagian_b_8_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover28"
                                                onchange="handleCheckboxChange('Cover28',this)" name="behagian_b_8_text"
                                                @checked($senari_semak->bahagian_b_8_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Kedudukan cetakan depan belakang/print register</td>
                                        <td><input type="checkbox" class="Cover29"
                                                onchange="handleCheckboxChange('Cover29',this)"
                                                name="behagian_b_9_cover" @checked($senari_semak->bahagian_b_9_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover29"
                                                onchange="handleCheckboxChange('Cover29',this)"
                                                name="behagian_b_9_cover" @checked($senari_semak->bahagian_b_9_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover29"
                                                onchange="handleCheckboxChange('Cover29',this)"
                                                name="behagian_b_9_cover" @checked($senari_semak->bahagian_b_9_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover30"
                                                onchange="handleCheckboxChange('Cover30',this)" name="behagian_b_9_text"
                                                @checked($senari_semak->bahagian_b_9_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover30"
                                                onchange="handleCheckboxChange('Cover30',this)" name="behagian_b_9_text"
                                                @checked($senari_semak->bahagian_b_9_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover30"
                                                onchange="handleCheckboxChange('Cover30',this)" name="behagian_b_9_text"
                                                @checked($senari_semak->bahagian_b_9_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Jenis penjilidan (Perf bind, Lock bind, Stitching)</td>
                                        <td><input type="checkbox" class="Cover31"
                                                onchange="handleCheckboxChange('Cover31',this)"
                                                name="behagian_b_10_cover" @checked($senari_semak->bahagian_b_10_cover
                                            == 'ok') value="ok">
                                        </td>
                                        <td><input type="checkbox" class="Cover31"
                                                onchange="handleCheckboxChange('Cover31',this)"
                                                name="behagian_b_10_cover" @checked($senari_semak->bahagian_b_10_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover31"
                                                onchange="handleCheckboxChange('Cover31',this)"
                                                name="behagian_b_10_cover" @checked($senari_semak->bahagian_b_10_cover
                                            == 'na') value="na">
                                        </td>
                                        <td><input type="checkbox" class="Cover32"
                                                onchange="handleCheckboxChange('Cover32',this)"
                                                name="behagian_b_10_text" @checked($senari_semak->bahagian_b_10_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover32"
                                                onchange="handleCheckboxChange('Cover32',this)"
                                                name="behagian_b_10_text" @checked($senari_semak->bahagian_b_10_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover32"
                                                onchange="handleCheckboxChange('Cover32',this)"
                                                name="behagian_b_10_text" @checked($senari_semak->bahagian_b_10_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Spacing (Minimum 3mm)</td>
                                        <td><input type="checkbox" class="Cover33"
                                                onchange="handleCheckboxChange('Cover33',this)"
                                                name="behagian_b_11_cover" @checked($senari_semak->bahagian_b_11_cover
                                            == 'ok') value="ok">
                                        </td>
                                        <td><input type="checkbox" class="Cover33"
                                                onchange="handleCheckboxChange('Cover33',this)"
                                                name="behagian_b_11_cover" @checked($senari_semak->bahagian_b_11_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover33"
                                                onchange="handleCheckboxChange('Cover33',this)"
                                                name="behagian_b_11_cover" @checked($senari_semak->bahagian_b_11_cover
                                            == 'na') value="na">
                                        </td>
                                        <td><input type="checkbox" class="Cover34"
                                                onchange="handleCheckboxChange('Cover34',this)"
                                                name="behagian_b_11_text" @checked($senari_semak->bahagian_b_11_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover34"
                                                onchange="handleCheckboxChange('Cover34',this)"
                                                name="behagian_b_11_text" @checked($senari_semak->bahagian_b_11_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover34"
                                                onchange="handleCheckboxChange('Cover34',this)"
                                                name="behagian_b_11_text" @checked($senari_semak->bahagian_b_11_text
                                            == 'na') value="na"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>NOTA:</h5>
                                    <p>1. Cetak hanya 1 salinan untuk pemeriksaan dan pengesahan. <br>
                                        2. Mock up/sampel yang telah diluluskan oleh pelanggan hendaklah
                                        digunakan
                                        semasa membuat pemeriksaan dan pengesahan 1st piece. <br>
                                        3. Jike tiada mock up/sampel, gunakan softcopy file artwork yang
                                        digunakan
                                        untuk
                                        mencetak sebagai rujukan pemeriksaan dan pengesahan.</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <h5><b>Bahagian C (Pemeriksaan Dan Pengesahan Mock Up) - Untuk Mock Up Sahaja</b></h5>
                        </div>
                        <div class="col-md-9 mt-5">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">kriteria</th>
                                        <th colspan="3">Operator Pod</th>
                                        <th colspan="3">Qc</th>

                                    </tr>
                                    <tr>
                                        <th>OK</th>
                                        <th>NG</th>
                                        <th>NA</th>
                                        <th>OK</th>
                                        <th>NG</th>
                                        <th>NA</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>1</td>
                                        <td>Saiz produk (Ukur dan rujuk saiz pada Job Sheet)</td>
                                        <td><input type="checkbox" class="Cover35"
                                                onchange="handleCheckboxChange('Cover35',this)"
                                                name="behagian_c_1_cover" @checked($senari_semak->bahagian_c_1_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover35"
                                                onchange="handleCheckboxChange('Cover35',this)"
                                                name="behagian_c_1_cover" @checked($senari_semak->bahagian_c_1_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover35"
                                                onchange="handleCheckboxChange('Cover35',this)"
                                                name="behagian_c_1_cover" @checked($senari_semak->bahagian_c_1_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover36"
                                                onchange="handleCheckboxChange('Cover36',this)" name="behagian_c_1_text"
                                                @checked($senari_semak->bahagian_c_1_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover36"
                                                onchange="handleCheckboxChange('Cover36',this)" name="behagian_c_1_text"
                                                @checked($senari_semak->bahagian_c_1_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover36"
                                                onchange="handleCheckboxChange('Cover36',this)" name="behagian_c_1_text"
                                                @checked($senari_semak->bahagian_c_1_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Artwork (Semak gambar dan teks)</td>
                                        <td><input type="checkbox" class="Cover37"
                                                onchange="handleCheckboxChange('Cover37',this)"
                                                name="behagian_c_2_cover" @checked($senari_semak->bahagian_c_2_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover37"
                                                onchange="handleCheckboxChange('Cover37',this)"
                                                name="behagian_c_2_cover" @checked($senari_semak->bahagian_c_2_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover37"
                                                onchange="handleCheckboxChange('Cover37',this)"
                                                name="behagian_c_2_cover" @checked($senari_semak->bahagian_c_2_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover38"
                                                onchange="handleCheckboxChange('Cover38',this)" name="behagian_c_2_text"
                                                @checked($senari_semak->bahagian_c_2_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover38"
                                                onchange="handleCheckboxChange('Cover38',this)" name="behagian_c_2_text"
                                                @checked($senari_semak->bahagian_c_2_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover38"
                                                onchange="handleCheckboxChange('Cover38',this)" name="behagian_c_2_text"
                                                @checked($senari_semak->bahagian_c_2_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kotor, calar (Periksa setiap muka surat)</td>
                                        <td><input type="checkbox" class="Cover39"
                                                onchange="handleCheckboxChange('Cover39',this)"
                                                name="behagian_c_3_cover" @checked($senari_semak->bahagian_c_3_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover39"
                                                onchange="handleCheckboxChange('Cover39',this)"
                                                name="behagian_c_3_cover" @checked($senari_semak->bahagian_c_3_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover39"
                                                onchange="handleCheckboxChange('Cover39',this)"
                                                name="behagian_c_3_cover" @checked($senari_semak->bahagian_c_3_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover40"
                                                onchange="handleCheckboxChange('Cover40',this)" name="behagian_c_3_text"
                                                @checked($senari_semak->bahagian_c_3_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover40"
                                                onchange="handleCheckboxChange('Cover40',this)" name="behagian_c_3_text"
                                                @checked($senari_semak->bahagian_c_3_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover40"
                                                onchange="handleCheckboxChange('Cover40',this)" name="behagian_c_3_text"
                                                @checked($senari_semak->bahagian_c_3_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Jenis penjilidan (stitching, perfect bind, hardcover)</td>
                                        <td><input type="checkbox" class="Cover41"
                                                onchange="handleCheckboxChange('Cover41',this)"
                                                name="behagian_c_4_cover" @checked($senari_semak->bahagian_c_4_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover41"
                                                onchange="handleCheckboxChange('Cover41',this)"
                                                name="behagian_c_4_cover" @checked($senari_semak->bahagian_c_4_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover41"
                                                onchange="handleCheckboxChange('Cover41',this)"
                                                name="behagian_c_4_cover" @checked($senari_semak->bahagian_c_4_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover42"
                                                onchange="handleCheckboxChange('Cover42',this)" name="behagian_c_4_text"
                                                @checked($senari_semak->bahagian_c_4_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover42"
                                                onchange="handleCheckboxChange('Cover42',this)" name="behagian_c_4_text"
                                                @checked($senari_semak->bahagian_c_4_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover42"
                                                onchange="handleCheckboxChange('Cover42',this)" name="behagian_c_4_text"
                                                @checked($senari_semak->bahagian_c_4_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Jumlah mukasurat (Rujuk Job Sheet dan file artwork)</td>
                                        <td><input type="checkbox" class="Cover43"
                                                onchange="handleCheckboxChange('Cover43',this)"
                                                name="behagian_c_5_cover" @checked($senari_semak->bahagian_c_5_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover43"
                                                onchange="handleCheckboxChange('Cover43',this)"
                                                name="behagian_c_5_cover" @checked($senari_semak->bahagian_c_5_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover43"
                                                onchange="handleCheckboxChange('Cover43',this)"
                                                name="behagian_c_5_cover" @checked($senari_semak->bahagian_c_5_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover44"
                                                onchange="handleCheckboxChange('Cover44',this)" name="behagian_c_5_text"
                                                @checked($senari_semak->bahagian_c_5_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover44"
                                                onchange="handleCheckboxChange('Cover44',this)" name="behagian_c_5_text"
                                                @checked($senari_semak->bahagian_c_5_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover44"
                                                onchange="handleCheckboxChange('Cover44',this)" name="behagian_c_5_text"
                                                @checked($senari_semak->bahagian_c_5_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Turutan mukasurat (Berturutan)</td>
                                        <td><input type="checkbox" class="Cover45"
                                                onchange="handleCheckboxChange('Cover45',this)"
                                                name="behagian_c_6_cover" @checked($senari_semak->bahagian_c_6_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover45"
                                                onchange="handleCheckboxChange('Cover45',this)"
                                                name="behagian_c_6_cover" @checked($senari_semak->bahagian_c_6_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover45"
                                                onchange="handleCheckboxChange('Cover45',this)"
                                                name="behagian_c_6_cover" @checked($senari_semak->bahagian_c_6_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover46"
                                                onchange="handleCheckboxChange('Cover46',this)" name="behagian_c_6_text"
                                                @checked($senari_semak->bahagian_c_6_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover46"
                                                onchange="handleCheckboxChange('Cover46',this)" name="behagian_c_6_text"
                                                @checked($senari_semak->bahagian_c_6_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover46"
                                                onchange="handleCheckboxChange('Cover46',this)" name="behagian_c_6_text"
                                                @checked($senari_semak->bahagian_c_6_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Kelekatan matt/gloss lamination</td>
                                        <td><input type="checkbox" class="Cover47"
                                                onchange="handleCheckboxChange('Cover47',this)"
                                                name="behagian_c_7_cover" @checked($senari_semak->bahagian_c_7_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover47"
                                                onchange="handleCheckboxChange('Cover47',this)"
                                                name="behagian_c_7_cover" @checked($senari_semak->bahagian_c_7_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover47"
                                                onchange="handleCheckboxChange('Cover47',this)"
                                                name="behagian_c_7_cover" @checked($senari_semak->bahagian_c_7_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover48"
                                                onchange="handleCheckboxChange('Cover48',this)" name="behagian_c_7_text"
                                                @checked($senari_semak->bahagian_c_7_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover48"
                                                onchange="handleCheckboxChange('Cover48',this)" name="behagian_c_7_text"
                                                @checked($senari_semak->bahagian_c_7_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover48"
                                                onchange="handleCheckboxChange('Cover48',this)" name="behagian_c_7_text"
                                                @checked($senari_semak->bahagian_c_7_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Koyak (Terkoyak / Rosak)</td>
                                        <td><input type="checkbox" class="Cover49"
                                                onchange="handleCheckboxChange('Cover49',this)"
                                                name="behagian_c_8_cover" @checked($senari_semak->bahagian_c_8_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover49"
                                                onchange="handleCheckboxChange('Cover49',this)"
                                                name="behagian_c_8_cover" @checked($senari_semak->bahagian_c_8_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover49"
                                                onchange="handleCheckboxChange('Cover49',this)"
                                                name="behagian_c_8_cover" @checked($senari_semak->bahagian_c_8_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover50"
                                                onchange="handleCheckboxChange('Cover50',this)" name="behagian_c_8_text"
                                                @checked($senari_semak->bahagian_c_8_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover50"
                                                onchange="handleCheckboxChange('Cover50',this)" name="behagian_c_8_text"
                                                @checked($senari_semak->bahagian_c_8_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover50"
                                                onchange="handleCheckboxChange('Cover50',this)" name="behagian_c_8_text"
                                                @checked($senari_semak->bahagian_c_8_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Imej/artwork terpotong</td>
                                        <td><input type="checkbox" class="Cover51"
                                                onchange="handleCheckboxChange('Cover51',this)"
                                                name="behagian_c_9_cover" @checked($senari_semak->bahagian_c_9_cover
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover51"
                                                onchange="handleCheckboxChange('Cover51',this)"
                                                name="behagian_c_9_cover" @checked($senari_semak->bahagian_c_9_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover51"
                                                onchange="handleCheckboxChange('Cover51',this)"
                                                name="behagian_c_9_cover" @checked($senari_semak->bahagian_c_9_cover
                                            == 'na') value="na"></td>
                                        <td><input type="checkbox" class="Cover52"
                                                onchange="handleCheckboxChange('Cover52',this)" name="behagian_c_9_text"
                                                @checked($senari_semak->bahagian_c_9_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover52"
                                                onchange="handleCheckboxChange('Cover52',this)" name="behagian_c_9_text"
                                                @checked($senari_semak->bahagian_c_9_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover52"
                                                onchange="handleCheckboxChange('Cover52',this)" name="behagian_c_9_text"
                                                @checked($senari_semak->bahagian_c_9_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Cop (Cop pada setiap mockup)</td>
                                        <td><input type="checkbox" class="Cover53"
                                                onchange="handleCheckboxChange('Cover53',this)"
                                                name="behagian_c_10_cover" @checked($senari_semak->bahagian_c_10_cover
                                            == 'ok') value="ok">
                                        </td>
                                        <td><input type="checkbox" class="Cover53"
                                                onchange="handleCheckboxChange('Cover53',this)"
                                                name="behagian_c_10_cover" @checked($senari_semak->bahagian_c_10_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover53"
                                                onchange="handleCheckboxChange('Cover53',this)"
                                                name="behagian_c_10_cover" @checked($senari_semak->bahagian_c_10_cover
                                            == 'na') value="na">
                                        </td>
                                        <td><input type="checkbox" class="Cover54"
                                                onchange="handleCheckboxChange('Cover54',this)"
                                                name="behagian_c_10_text" @checked($senari_semak->bahagian_c_10_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover54"
                                                onchange="handleCheckboxChange('Cover54',this)"
                                                name="behagian_c_10_text" @checked($senari_semak->bahagian_c_10_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover54"
                                                onchange="handleCheckboxChange('Cover54',this)"
                                                name="behagian_c_10_text" @checked($senari_semak->bahagian_c_10_text
                                            == 'na') value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-5"> Lain-lain (nyatakan): </div>
                                                <div class="col-md-7"><input type="text" width=""
                                                        value="{{$senari_semak->bahagian_c_11_input}}"
                                                        name="behagian_c_11_input" id="" class="form-control"></div>
                                            </div>
                                        </td>
                                        <td><input type="checkbox" class="Cover55"
                                                onchange="handleCheckboxChange('Cover55',this)"
                                                name="behagian_c_11_cover" @checked($senari_semak->bahagian_c_11_cover
                                            == 'ok') value="ok">
                                        </td>
                                        <td><input type="checkbox" class="Cover55"
                                                onchange="handleCheckboxChange('Cover55',this)"
                                                name="behagian_c_11_cover" @checked($senari_semak->bahagian_c_11_cover
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover55"
                                                onchange="handleCheckboxChange('Cover55',this)"
                                                name="behagian_c_11_cover" @checked($senari_semak->bahagian_c_11_cover
                                            == 'na') value="na">
                                        </td>
                                        <td><input type="checkbox" class="Cover56"
                                                onchange="handleCheckboxChange('Cover56',this)"
                                                name="behagian_c_11_text" @checked($senari_semak->bahagian_c_11_text
                                            == 'ok') value="ok"></td>
                                        <td><input type="checkbox" class="Cover56"
                                                onchange="handleCheckboxChange('Cover56',this)"
                                                name="behagian_c_11_text" @checked($senari_semak->bahagian_c_11_text
                                            == 'ng') value="ng">
                                        </td>
                                        <td><input type="checkbox" class="Cover56"
                                                onchange="handleCheckboxChange('Cover56',this)"
                                                name="behagian_c_11_text" @checked($senari_semak->bahagian_c_11_text
                                            == 'na') value="na"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>NOTA:</h5>
                                    <p>1. Setiap mockup perlu di cop pada kulit buku di belakang bahagian dalam.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary float-right">Save</button>
                </div>
            </div>
            <a href="{{ route('senari_semak') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
        </div>
    </div>

</form>
@endsection


@push('custom-scripts')
<script>
    function handleCheckboxChange(className, checkbox) {
        if ($(checkbox).prop('checked')) {
            $(`.${className}`).not(checkbox).prop('checked', false);
        }
    }
    $(document).ready(function () {
        $('#sale_order').trigger('change');

        $('#sale_order').select2({
            ajax: {
                url: '{{ route('sale_order.get') }}',
                dataType: 'json',
                delay: 1000,
                data: function (params) {
                    return {
                        q: params.term,
                        page: params.page || 1,
                    };
                },
                processResults: function (data, params) {
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
            templateResult: function (data) {
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
            templateSelection: function (data) {
                return data.text || null;
            }
        });
    });

    $('#sale_order').on('change', function () {
        const id = $(this).val();
        $.ajax({
            type: 'GET',
            url: '{{ route('sale_order.detail.get') }}',
            data: {
                "id": id
            },
            success: function (data) {
                $('#kod_buku').val(data.kod_buku);
                $('#tajuk').val(data.description);
            }
        });
    });
</script>
@endpush
