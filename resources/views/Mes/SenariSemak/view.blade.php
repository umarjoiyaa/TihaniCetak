@extends('layouts.app')

@section('content')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Senarai Semak Pencetakan Digital</h5>

                            <div class="card" style="background:#f1f0f0;">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Tarikh</div>
                                                <input type="text" value="{{ $senari_semak->sale_order->order_no }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Date</div>
                                                <input type="date" name="date" value="{{ $senari_semak->date }}"
                                                    class="form-control" id="Currentdate">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">kod Buku</div>
                                                <input type="text" readonly
                                                    value="{{ $senari_semak->sale_order->kod_buku }}" name=""
                                                    id="kod_buku" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Tajuk</div>
                                                <input type="text" readonly
                                                    value="{{ $senari_semak->sale_order->description }}" name=""
                                                    id="tajuk" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Time</div>
                                                <input name="time" type="time" id="Currenttime"
                                                    value="{{ $senari_semak->time }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Checked By</div>
                                                <input type="text" value="{{ $senari_semak->user->full_name }}" readonly
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
                                                <th rowspan="2">
                                                    <div class="text-center">kriteria</div>
                                                </th>
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
                                                <td>Design clearance 5mm (print to cut dan stitching binding)</td>
                                                <td><input type="checkbox" name="behagian_a_1_cover"
                                                        @checked($senari_semak->bahagian_a_1_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_a_1_cover"
                                                        @checked($senari_semak->bahagian_a_1_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_a_1_cover"
                                                        @checked($senari_semak->bahagian_a_1_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_a_1_text"
                                                        @checked($senari_semak->bahagian_a_1_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_a_1_text"
                                                        @checked($senari_semak->bahagian_a_1_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_a_1_text"
                                                        @checked($senari_semak->bahagian_a_1_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Image artwork (Semak teks & gambar)</td>
                                                <td><input type="checkbox" name="behagian_a_2_cover"
                                                        @checked($senari_semak->bahagian_a_2_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_a_2_cover"
                                                        @checked($senari_semak->bahagian_a_2_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_a_2_cover"
                                                        @checked($senari_semak->bahagian_a_2_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_a_2_text"
                                                        @checked($senari_semak->bahagian_a_2_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_a_2_text"
                                                        @checked($senari_semak->bahagian_a_2_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_a_2_text"
                                                        @checked($senari_semak->bahagian_a_2_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Bleed (3-5mm)</td>
                                                <td><input type="checkbox" name="behagian_a_3_cover"
                                                        @checked($senari_semak->bahagian_a_3_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_a_3_cover"
                                                        @checked($senari_semak->bahagian_a_3_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_a_3_cover"
                                                        @checked($senari_semak->bahagian_a_3_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_a_3_text"
                                                        @checked($senari_semak->bahagian_a_3_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_a_3_text"
                                                        @checked($senari_semak->bahagian_a_3_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_a_3_text"
                                                        @checked($senari_semak->bahagian_a_3_text == 'na') value="na"></td>
                                            </tr>

                                            <tr>
                                                <td>4</td>
                                                <td>Alamat pencetak</td>
                                                <td><input type="checkbox" name="behagian_a_4_cover"
                                                        @checked($senari_semak->bahagian_a_4_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_a_4_cover"
                                                        @checked($senari_semak->bahagian_a_4_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_a_4_cover"
                                                        @checked($senari_semak->bahagian_a_4_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_a_4_text"
                                                        @checked($senari_semak->bahagian_a_4_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_a_4_text"
                                                        @checked($senari_semak->bahagian_a_4_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_a_4_text"
                                                        @checked($senari_semak->bahagian_a_4_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Saiz spine (perfect bind)</td>
                                                <td><input type="checkbox" name="behagian_a_5_cover"
                                                        @checked($senari_semak->bahagian_a_5_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_a_5_cover"
                                                        @checked($senari_semak->bahagian_a_5_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_a_5_cover"
                                                        @checked($senari_semak->bahagian_a_5_cover == 'na') value="na"></td>
                                                <td colspan="3"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Kedudukan artwork (hardcover)</td>
                                                <td><input type="checkbox" name="behagian_a_6_cover"
                                                        @checked($senari_semak->bahagian_a_6_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_a_6_cover"
                                                        @checked($senari_semak->bahagian_a_6_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_a_6_cover"
                                                        @checked($senari_semak->bahagian_a_6_cover == 'na') value="na"></td>
                                                <td colspan="3"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                                <td colspan="3" readonly></td>
                                                <td><input type="checkbox" name="behagian_a_7_text"
                                                        @checked($senari_semak->bahagian_a_7_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_a_7_text"
                                                        @checked($senari_semak->bahagian_a_7_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_a_7_text"
                                                        @checked($senari_semak->bahagian_a_7_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Cetakan (Sila nyatakan)</td>
                                                <td colspan="3"></td>
                                                <td colspan="3"><input type="type" class="form-control"
                                                        value="{{ $senari_semak->bahagian_a_8_text }}"
                                                        name="behagian_a_8_text" id=""></td>

                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Turutan mukasurat (Berturutan)</td>
                                                <td colspan="3" readonly></td>
                                                <td><input type="checkbox" name="behagian_a_9_text"
                                                        @checked($senari_semak->bahagian_a_9_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_a_9_text"
                                                        @checked($senari_semak->bahagian_a_9_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_a_9_text"
                                                        @checked($senari_semak->bahagian_a_9_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Turutan mukasurat (Berturutan)</td>
                                                <td colspan="3" readonly></td>
                                                <td><input type="checkbox" name="behagian_a_10_text"
                                                        @checked($senari_semak->bahagian_a_10_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_a_10_text"
                                                        @checked($senari_semak->bahagian_a_10_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_a_10_text"
                                                        @checked($senari_semak->bahagian_a_10_text == 'na') value="na"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card" style="background:#f1f0f0;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>NOTA:</h5>
                                            <p>1. Jika semakan file artwork mendapati permasalahan dan pelanggan memohon
                                                untuk
                                                pihak TCSB membuat tindakan pembetulan, pembetulan tersebut boleh diakukan
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
                                                <th rowspan="2">
                                                    <div class="text-center">kriteria</div>
                                                </th>
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
                                                <td><input type="checkbox" name="behagian_b_1_cover"
                                                        @checked($senari_semak->bahagian_b_1_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_1_cover"
                                                        @checked($senari_semak->bahagian_b_1_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_1_cover"
                                                        @checked($senari_semak->bahagian_b_1_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_b_1_text"
                                                        @checked($senari_semak->bahagian_b_1_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_1_text"
                                                        @checked($senari_semak->bahagian_b_1_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_1_text"
                                                        @checked($senari_semak->bahagian_b_1_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Saiz produk (Bandingkan Job Sheet dan file art)</td>
                                                <td><input type="checkbox" name="behagian_b_2_cover"
                                                        @checked($senari_semak->bahagian_b_2_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_2_cover"
                                                        @checked($senari_semak->bahagian_b_2_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_2_cover"
                                                        @checked($senari_semak->bahagian_b_2_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_b_2_text"
                                                        @checked($senari_semak->bahagian_b_2_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_2_text"
                                                        @checked($senari_semak->bahagian_b_2_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_2_text"
                                                        @checked($senari_semak->bahagian_b_2_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Artwork (Semak gambar dan teks)</td>
                                                <td><input type="checkbox" name="behagian_b_3_cover"
                                                        @checked($senari_semak->bahagian_b_3_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_3_cover"
                                                        @checked($senari_semak->bahagian_b_3_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_3_cover"
                                                        @checked($senari_semak->bahagian_b_3_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_b_3_text"
                                                        @checked($senari_semak->bahagian_b_3_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_3_text"
                                                        @checked($senari_semak->bahagian_b_3_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_3_text"
                                                        @checked($senari_semak->bahagian_b_3_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td> Design clearance 5mm (print to cut dan stitching binding)</td>
                                                <td><input type="checkbox" name="behagian_b_4_cover"
                                                        @checked($senari_semak->bahagian_b_4_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_4_cover"
                                                        @checked($senari_semak->bahagian_b_4_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_4_cover"
                                                        @checked($senari_semak->bahagian_b_4_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_b_4_text"
                                                        @checked($senari_semak->bahagian_b_4_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_4_text"
                                                        @checked($senari_semak->bahagian_b_4_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_4_text"
                                                        @checked($senari_semak->bahagian_b_4_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Jumlah mukasurat (Job Sheet dan file artwork)</td>
                                                <td><input type="checkbox" name="behagian_b_5_cover"
                                                        @checked($senari_semak->bahagian_b_5_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_5_cover"
                                                        @checked($senari_semak->bahagian_b_5_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_5_cover"
                                                        @checked($senari_semak->bahagian_b_5_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_b_5_text"
                                                        @checked($senari_semak->bahagian_b_5_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_5_text"
                                                        @checked($senari_semak->bahagian_b_5_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_5_text"
                                                        @checked($senari_semak->bahagian_b_5_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Turutan mukasurat (Berturutan)</td>
                                                <td><input type="checkbox" name="behagian_b_6_cover"
                                                        @checked($senari_semak->bahagian_b_6_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_6_cover"
                                                        @checked($senari_semak->bahagian_b_6_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_6_cover"
                                                        @checked($senari_semak->bahagian_b_6_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_b_6_text"
                                                        @checked($senari_semak->bahagian_b_6_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_6_text"
                                                        @checked($senari_semak->bahagian_b_6_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_6_text"
                                                        @checked($senari_semak->bahagian_b_6_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Bleed (3-5mm)</td>
                                                <td><input type="checkbox" name="behagian_b_7_cover"
                                                        @checked($senari_semak->bahagian_b_7_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_7_cover"
                                                        @checked($senari_semak->bahagian_b_7_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_7_cover"
                                                        @checked($senari_semak->bahagian_b_7_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_b_7_text"
                                                        @checked($senari_semak->bahagian_b_7_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_7_text"
                                                        @checked($senari_semak->bahagian_b_7_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_7_text"
                                                        @checked($senari_semak->bahagian_b_7_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Crop mark (mempunyai crop mark)</td>
                                                <td><input type="checkbox" name="behagian_b_8_cover"
                                                        @checked($senari_semak->bahagian_b_8_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_8_cover"
                                                        @checked($senari_semak->bahagian_b_8_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_8_cover"
                                                        @checked($senari_semak->bahagian_b_8_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_b_8_text"
                                                        @checked($senari_semak->bahagian_b_8_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_8_text"
                                                        @checked($senari_semak->bahagian_b_8_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_8_text"
                                                        @checked($senari_semak->bahagian_b_8_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Kedudukan cetakan depan belakang/print register</td>
                                                <td><input type="checkbox" name="behagian_b_9_cover"
                                                        @checked($senari_semak->bahagian_b_9_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_9_cover"
                                                        @checked($senari_semak->bahagian_b_9_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_9_cover"
                                                        @checked($senari_semak->bahagian_b_9_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_b_9_text"
                                                        @checked($senari_semak->bahagian_b_9_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_9_text"
                                                        @checked($senari_semak->bahagian_b_9_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_9_text"
                                                        @checked($senari_semak->bahagian_b_9_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Jenis penjilidan (Perf bind, Lock bind, Stitching)</td>
                                                <td><input type="checkbox" name="behagian_b_10_cover"
                                                        @checked($senari_semak->bahagian_b_10_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_10_cover"
                                                        @checked($senari_semak->bahagian_b_10_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_10_cover"
                                                        @checked($senari_semak->bahagian_b_10_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_b_10_text"
                                                        @checked($senari_semak->bahagian_b_10_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_10_text"
                                                        @checked($senari_semak->bahagian_b_10_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_10_text"
                                                        @checked($senari_semak->bahagian_b_10_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>Spacing (Minimum 3mm)</td>
                                                <td><input type="checkbox" name="behagian_b_11_cover"
                                                        @checked($senari_semak->bahagian_b_11_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_11_cover"
                                                        @checked($senari_semak->bahagian_b_11_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_11_cover"
                                                        @checked($senari_semak->bahagian_b_11_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_b_11_text"
                                                        @checked($senari_semak->bahagian_b_11_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_b_11_text"
                                                        @checked($senari_semak->bahagian_b_11_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_b_11_text"
                                                        @checked($senari_semak->bahagian_b_11_text == 'na') value="na"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card" style="background:#f1f0f0;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>NOTA:</h5>
                                            <p>1. Cetak hanya 1 salinan untuk pemeriksaan dan pengesahan. <br>
                                                2. Mock up/sampel yang telah diluluskan oleh pelanggan hendaklah digunakan
                                                semasa membuat pemeriksaan dan pengesahan 1st piece. <br>
                                                3. Jike tiada mock up/sampel, gunakan softcopy file artwork yang digunakan
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
                                                <th rowspan="2">
                                                    <div class="text-center">kriteria</div>
                                                </th>
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
                                                <td>Saiz produk (Ukur dan rujuk saiz pada Job Sheet)</td>
                                                <td><input type="checkbox" name="behagian_c_1_cover"
                                                        @checked($senari_semak->bahagian_c_1_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_1_cover"
                                                        @checked($senari_semak->bahagian_c_1_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_1_cover"
                                                        @checked($senari_semak->bahagian_c_1_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_c_1_text"
                                                        @checked($senari_semak->bahagian_c_1_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_1_text"
                                                        @checked($senari_semak->bahagian_c_1_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_1_text"
                                                        @checked($senari_semak->bahagian_c_1_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Artwork (Semak gambar dan teks)</td>
                                                <td><input type="checkbox" name="behagian_c_2_cover"
                                                        @checked($senari_semak->bahagian_c_2_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_2_cover"
                                                        @checked($senari_semak->bahagian_c_2_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_2_cover"
                                                        @checked($senari_semak->bahagian_c_2_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_c_2_text"
                                                        @checked($senari_semak->bahagian_c_2_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_2_text"
                                                        @checked($senari_semak->bahagian_c_2_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_2_text"
                                                        @checked($senari_semak->bahagian_c_2_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Kotor, calar (Periksa setiap muka surat)</td>
                                                <td><input type="checkbox" name="behagian_c_3_cover"
                                                        @checked($senari_semak->bahagian_c_3_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_3_cover"
                                                        @checked($senari_semak->bahagian_c_3_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_3_cover"
                                                        @checked($senari_semak->bahagian_c_3_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_c_3_text"
                                                        @checked($senari_semak->bahagian_c_3_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_3_text"
                                                        @checked($senari_semak->bahagian_c_3_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_3_text"
                                                        @checked($senari_semak->bahagian_c_3_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Jenis penjilidan (stitching, perfect bind, hardcover)</td>
                                                <td><input type="checkbox" name="behagian_c_4_cover"
                                                        @checked($senari_semak->bahagian_c_4_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_4_cover"
                                                        @checked($senari_semak->bahagian_c_4_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_4_cover"
                                                        @checked($senari_semak->bahagian_c_4_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_c_4_text"
                                                        @checked($senari_semak->bahagian_c_4_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_4_text"
                                                        @checked($senari_semak->bahagian_c_4_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_4_text"
                                                        @checked($senari_semak->bahagian_c_4_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Jumlah mukasurat (Rujuk Job Sheet dan file artwork)</td>
                                                <td><input type="checkbox" name="behagian_c_5_cover"
                                                        @checked($senari_semak->bahagian_c_5_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_5_cover"
                                                        @checked($senari_semak->bahagian_c_5_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_5_cover"
                                                        @checked($senari_semak->bahagian_c_5_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_c_5_text"
                                                        @checked($senari_semak->bahagian_c_5_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_5_text"
                                                        @checked($senari_semak->bahagian_c_5_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_5_text"
                                                        @checked($senari_semak->bahagian_c_5_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Turutan mukasurat (Berturutan)</td>
                                                <td><input type="checkbox" name="behagian_c_6_cover"
                                                        @checked($senari_semak->bahagian_c_6_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_6_cover"
                                                        @checked($senari_semak->bahagian_c_6_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_6_cover"
                                                        @checked($senari_semak->bahagian_c_6_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_c_6_text"
                                                        @checked($senari_semak->bahagian_c_6_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_6_text"
                                                        @checked($senari_semak->bahagian_c_6_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_6_text"
                                                        @checked($senari_semak->bahagian_c_6_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Kelekatan matt/gloss lamination</td>
                                                <td><input type="checkbox" name="behagian_c_7_cover"
                                                        @checked($senari_semak->bahagian_c_7_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_7_cover"
                                                        @checked($senari_semak->bahagian_c_7_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_7_cover"
                                                        @checked($senari_semak->bahagian_c_7_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_c_7_text"
                                                        @checked($senari_semak->bahagian_c_7_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_7_text"
                                                        @checked($senari_semak->bahagian_c_7_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_7_text"
                                                        @checked($senari_semak->bahagian_c_7_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Koyak (Terkoyak / Rosak)</td>
                                                <td><input type="checkbox" name="behagian_c_8_cover"
                                                        @checked($senari_semak->bahagian_c_8_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_8_cover"
                                                        @checked($senari_semak->bahagian_c_8_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_8_cover"
                                                        @checked($senari_semak->bahagian_c_8_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_c_8_text"
                                                        @checked($senari_semak->bahagian_c_8_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_8_text"
                                                        @checked($senari_semak->bahagian_c_8_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_8_text"
                                                        @checked($senari_semak->bahagian_c_8_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Imej/artwork terpotong</td>
                                                <td><input type="checkbox" name="behagian_c_9_cover"
                                                        @checked($senari_semak->bahagian_c_9_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_9_cover"
                                                        @checked($senari_semak->bahagian_c_9_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_9_cover"
                                                        @checked($senari_semak->bahagian_c_9_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_c_9_text"
                                                        @checked($senari_semak->bahagian_c_9_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_9_text"
                                                        @checked($senari_semak->bahagian_c_9_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_9_text"
                                                        @checked($senari_semak->bahagian_c_9_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Cop (Cop pada setiap mockup)</td>
                                                <td><input type="checkbox" name="behagian_c_10_cover"
                                                        @checked($senari_semak->bahagian_c_10_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_10_cover"
                                                        @checked($senari_semak->bahagian_c_10_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_10_cover"
                                                        @checked($senari_semak->bahagian_c_10_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_c_10_text"
                                                        @checked($senari_semak->bahagian_c_10_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_10_text"
                                                        @checked($senari_semak->bahagian_c_10_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_10_text"
                                                        @checked($senari_semak->bahagian_c_10_text == 'na') value="na"></td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-5"> Lain-lain (nyatakan): </div>
                                                        <div class="col-md-7"><input type="text" width=""
                                                                placeholder="Text input"
                                                                value="{{ $senari_semak->bahagian_c_11_input }}"
                                                                name="behagian_c_11_input" id=""
                                                                class="form-control"></div>
                                                    </div>
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_11_cover"
                                                        @checked($senari_semak->bahagian_c_11_cover == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_11_cover"
                                                        @checked($senari_semak->bahagian_c_11_cover == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_11_cover"
                                                        @checked($senari_semak->bahagian_c_11_cover == 'na') value="na"></td>
                                                <td><input type="checkbox" name="behagian_c_11_text"
                                                        @checked($senari_semak->bahagian_c_11_text == 'ok') value="ok"></td>
                                                <td><input type="checkbox" name="behagian_c_11_text"
                                                        @checked($senari_semak->bahagian_c_11_text == 'ng') value="ng">
                                                </td>
                                                <td><input type="checkbox" name="behagian_c_11_text"
                                                        @checked($senari_semak->bahagian_c_11_text == 'na') value="na"></td>
                                            </tr>
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
                                                <td>{{ $senari_semak->verified_by_date }}</td>
                                                <td>{{ $senari_semak->verified_by_user }}</td>
                                                <td>{{ $senari_semak->verified_by_designation }}</td>
                                                <td>{{ $senari_semak->verified_by_department }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card" style="background:#f1f0f0;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>NOTA:</h5>
                                            <p>1. Setiap mockup perlu di cop pada kulit buku di belakang bahagian dalam.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('senari_semak') }}">back to list</a>
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
