        @extends('layouts.app')

        @section('content')
            <form action="{{ route('senari_semak.store') }}" method="POST">
                @csrf
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
                                                    <div class="label">Saler Order No.</div>
                                                    <select name="sale_order" id="sale_order" class="form-control">
                                                        <option value="" selected disabled>Select any Sale Order</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4 mt-3">
                                                <div class="form-group">
                                                    <div class="label">Date</div>
                                                    <input type="text" name="date" value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <div class="form-group">
                                                    <div class="label">kod Buku</div>
                                                    <input type="text" readonly value="" name=""
                                                        id="kod_buku" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <div class="form-group">
                                                    <div class="label">Tajuk</div>
                                                    <input type="text" readonly value="" name=""
                                                        id="tajuk" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <div class="form-group">
                                                    <div class="label">Time</div>
                                                    <input name="time" type="time" id="Currenttime"
                                                        value="{{ Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('H:i') }}"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4 mt-3">
                                                <div class="form-group">
                                                    <div class="label">Checked By</div>
                                                    <input type="text" value="{{ Auth::user()->user_name }}" readonly
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
                                                    <td><input type="checkbox" class="Cover1"
                                                            onchange="handleCheckboxChange('Cover1',this)"
                                                            name="behagian_a_1_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover1"
                                                            onchange="handleCheckboxChange('Cover1',this)" checked
                                                            name="behagian_a_1_cover" value="ng">
                                                    </td>
                                                    <td><input type="checkbox" class="Cover1"
                                                            onchange="handleCheckboxChange('Cover1',this)"
                                                            name="behagian_a_1_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Text1"
                                                            onchange="handleCheckboxChange('Text1',this)"
                                                            name="behagian_a_1_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Text1"
                                                            onchange="handleCheckboxChange('Text1',this)" checked
                                                            name="behagian_a_1_text" value="ng">
                                                    </td>
                                                    <td><input type="checkbox" class="Text1"
                                                            onchange="handleCheckboxChange('Text1',this)"
                                                            name="behagian_a_1_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Image artwork (Semak teks & gambar)</td>
                                                    <td><input type="checkbox" class="Cover2"
                                                            onchange="handleCheckboxChange('Cover2',this)"
                                                            name="behagian_a_2_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover2"
                                                            onchange="handleCheckboxChange('Cover2',this)" checked
                                                            name="behagian_a_2_cover" value="ng">
                                                    </td>
                                                    <td><input type="checkbox" class="Cover2"
                                                            onchange="handleCheckboxChange('Cover2',this)"
                                                            name="behagian_a_2_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Text2"
                                                            onchange="handleCheckboxChange('Text2',this)"
                                                            name="behagian_a_2_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Text2"
                                                            onchange="handleCheckboxChange('Text2',this)" checked
                                                            name="behagian_a_2_text" value="ng">
                                                    </td>
                                                    <td><input type="checkbox" class="Text2"
                                                            onchange="handleCheckboxChange('Text2',this)"
                                                            name="behagian_a_2_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Bleed (3-5mm)</td>
                                                    <td><input type="checkbox" class="Cover3"
                                                            onchange="handleCheckboxChange('Cover3',this)"
                                                            name="behagian_a_3_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover3"
                                                            onchange="handleCheckboxChange('Cover3',this)" checked
                                                            name="behagian_a_3_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover3"
                                                            onchange="handleCheckboxChange('Cover3',this)"
                                                            name="behagian_a_3_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Text3"
                                                            onchange="handleCheckboxChange('Text3',this)"
                                                            name="behagian_a_3_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Text3"
                                                            onchange="handleCheckboxChange('Text3',this)" checked
                                                            name="behagian_a_3_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Text3"
                                                            onchange="handleCheckboxChange('Text3',this)"
                                                            name="behagian_a_3_text" value="na"></td>
                                                </tr>

                                                <tr>
                                                    <td>4</td>
                                                    <td>Alamat pencetak</td>
                                                    <td><input type="checkbox" class="Cover4"
                                                            onchange="handleCheckboxChange('Cover4',this)"
                                                            name="behagian_a_4_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover4"
                                                            onchange="handleCheckboxChange('Cover4',this)" checked
                                                            name="behagian_a_4_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover4"
                                                            onchange="handleCheckboxChange('Cover4',this)"
                                                            name="behagian_a_4_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Text4"
                                                            onchange="handleCheckboxChange('Text4',this)"
                                                            name="behagian_a_4_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Text4"
                                                            onchange="handleCheckboxChange('Text4',this)" checked
                                                            name="behagian_a_4_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Text4"
                                                            onchange="handleCheckboxChange('Text4',this)"
                                                            name="behagian_a_4_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Saiz spine (perfect bind)</td>
                                                    <td><input type="checkbox" class="Cover5"
                                                            onchange="handleCheckboxChange('Cover5',this)"
                                                            name="behagian_a_5_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover5"
                                                            onchange="handleCheckboxChange('Cover5',this)" checked
                                                            name="behagian_a_5_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover5"
                                                            onchange="handleCheckboxChange('Cover5',this)"
                                                            name="behagian_a_5_cover" value="na"></td>
                                                    <td colspan="3" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Kedudukan artwork (hardcover)</td>
                                                    <td><input type="checkbox" class="Text5"
                                                            onchange="handleCheckboxChange('Text5',this)"
                                                            name="behagian_a_6_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text5"
                                                            onchange="handleCheckboxChange('Text5',this)" checked
                                                            name="behagian_a_6_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text5"
                                                            onchange="handleCheckboxChange('Text5',this)"
                                                            name="behagian_a_6_cover" value="na"></td>
                                                    <td colspan="3" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                                    <td colspan="3" readonly></td>
                                                    <td><input type="checkbox" class="Cover6"
                                                            onchange="handleCheckboxChange('Cover6',this)"
                                                            name="behagian_a_7_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover6"
                                                            onchange="handleCheckboxChange('Cover6',this)" checked
                                                            name="behagian_a_7_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover6"
                                                            onchange="handleCheckboxChange('Cover6',this)"
                                                            name="behagian_a_7_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Cetakan (Sila nyatakan)</td>
                                                    <td colspan="3" readonly></td>
                                                    <td colspan="3"><input type="type" class="form-control"
                                                             name="behagian_a_8_text" id="">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>Turutan mukasurat (Berturutan)</td>
                                                    <td colspan="3" readonly></td>
                                                    <td><input type="checkbox" class="Text6"
                                                            onchange="handleCheckboxChange('Text6',this)"
                                                            name="behagian_a_9_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Text6"
                                                            onchange="handleCheckboxChange('Text6',this)" checked
                                                            name="behagian_a_9_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Text6"
                                                            onchange="handleCheckboxChange('Text6',this)"
                                                            name="behagian_a_9_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td>Turutan mukasurat (Berturutan)</td>
                                                    <td colspan="3" readonly></td>
                                                    <td><input type="checkbox" class="Cover7"
                                                            onchange="handleCheckboxChange('Cover7',this)"
                                                            name="behagian_a_10_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover7"
                                                            onchange="handleCheckboxChange('Cover7',this)" checked
                                                            name="behagian_a_10_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover7"
                                                            onchange="handleCheckboxChange('Cover7',this)"
                                                            name="behagian_a_10_text" value="na"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- <div class="card" style="background:#f1f0f0;">
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
                                </div> -->

                                <div class="row mt-4">
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
                                                    <td><input type="checkbox" class="Text7"
                                                            onchange="handleCheckboxChange('Text7',this)"
                                                            name="behagian_b_1_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text7"
                                                            onchange="handleCheckboxChange('Text7',this)" checked
                                                            name="behagian_b_1_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text7"
                                                            onchange="handleCheckboxChange('Text7',this)"
                                                            name="behagian_b_1_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover8"
                                                            onchange="handleCheckboxChange('Cover8',this)"
                                                            name="behagian_b_1_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover8"
                                                            onchange="handleCheckboxChange('Cover8',this)" checked
                                                            name="behagian_b_1_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover8"
                                                            onchange="handleCheckboxChange('Cover8',this)"
                                                            name="behagian_b_1_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Saiz produk (Bandingkan Job Sheet dan file art)</td>
                                                    <td><input type="checkbox" class="Text8"
                                                            onchange="handleCheckboxChange('Text8',this)"
                                                            name="behagian_b_2_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text8"
                                                            onchange="handleCheckboxChange('Text8',this)" checked
                                                            name="behagian_b_2_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text8"
                                                            onchange="handleCheckboxChange('Text8',this)"
                                                            name="behagian_b_2_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover9"
                                                            onchange="handleCheckboxChange('Cover9',this)"
                                                            name="behagian_b_2_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover9"
                                                            onchange="handleCheckboxChange('Cover9',this)" checked
                                                            name="behagian_b_2_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover9"
                                                            onchange="handleCheckboxChange('Cover9',this)"
                                                            name="behagian_b_2_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Artwork (Semak gambar dan teks)</td>
                                                    <td><input type="checkbox" class="Text9"
                                                            onchange="handleCheckboxChange('Text9',this)"
                                                            name="behagian_b_3_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text9"
                                                            onchange="handleCheckboxChange('Text9',this)" checked
                                                            name="behagian_b_3_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text9"
                                                            onchange="handleCheckboxChange('Text9',this)"
                                                            name="behagian_b_3_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover10"
                                                            onchange="handleCheckboxChange('Cover10',this)"
                                                            name="behagian_b_3_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover10"
                                                            onchange="handleCheckboxChange('Cover10',this)" checked
                                                            name="behagian_b_3_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover10"
                                                            onchange="handleCheckboxChange('Cover10',this)"
                                                            name="behagian_b_3_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td> Design clearance 5mm (print to cut dan stitching binding)</td>
                                                    <td><input type="checkbox" class="Text10"
                                                            onchange="handleCheckboxChange('Text10',this)"
                                                            name="behagian_b_4_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text10"
                                                            onchange="handleCheckboxChange('Text10',this)" checked
                                                            name="behagian_b_4_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text10"
                                                            onchange="handleCheckboxChange('Text10',this)"
                                                            name="behagian_b_4_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover11"
                                                            onchange="handleCheckboxChange('Cover11',this)"
                                                            name="behagian_b_4_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover11"
                                                            onchange="handleCheckboxChange('Cover11',this)" checked
                                                            name="behagian_b_4_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover11"
                                                            onchange="handleCheckboxChange('Cover11',this)"
                                                            name="behagian_b_4_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Jumlah mukasurat (Job Sheet dan file artwork)</td>
                                                    <td><input type="checkbox" class="Text11"
                                                            onchange="handleCheckboxChange('Text11',this)"
                                                            name="behagian_b_5_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text11"
                                                            onchange="handleCheckboxChange('Text11',this)" checked
                                                            name="behagian_b_5_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text11"
                                                            onchange="handleCheckboxChange('Text11',this)"
                                                            name="behagian_b_5_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover12"
                                                            onchange="handleCheckboxChange('Cover12',this)"
                                                            name="behagian_b_5_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover12"
                                                            onchange="handleCheckboxChange('Cover12',this)" checked
                                                            name="behagian_b_5_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover12"
                                                            onchange="handleCheckboxChange('Cover12',this)"
                                                            name="behagian_b_5_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Turutan mukasurat (Berturutan)</td>
                                                    <td><input type="checkbox" class="Text12"
                                                            onchange="handleCheckboxChange('Text12',this)"
                                                            name="behagian_b_6_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text12"
                                                            onchange="handleCheckboxChange('Text12',this)" checked
                                                            name="behagian_b_6_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text12"
                                                            onchange="handleCheckboxChange('Text12',this)"
                                                            name="behagian_b_6_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover13"
                                                            onchange="handleCheckboxChange('Cover13',this)"
                                                            name="behagian_b_6_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover13"
                                                            onchange="handleCheckboxChange('Cover13',this)" checked
                                                            name="behagian_b_6_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover13"
                                                            onchange="handleCheckboxChange('Cover13',this)"
                                                            name="behagian_b_6_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>Bleed (3-5mm)</td>
                                                    <td><input type="checkbox" class="Text13"
                                                            onchange="handleCheckboxChange('Text13',this)"
                                                            name="behagian_b_7_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text13"
                                                            onchange="handleCheckboxChange('Text13',this)" checked
                                                            name="behagian_b_7_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text13"
                                                            onchange="handleCheckboxChange('Text13',this)"
                                                            name="behagian_b_7_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover14"
                                                            onchange="handleCheckboxChange('Cover14',this)"
                                                            name="behagian_b_7_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover14"
                                                            onchange="handleCheckboxChange('Cover14',this)" checked
                                                            name="behagian_b_7_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover14"
                                                            onchange="handleCheckboxChange('Cover14',this)"
                                                            name="behagian_b_7_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Crop mark (mempunyai crop mark)</td>
                                                    <td><input type="checkbox" class="Text14"
                                                            onchange="handleCheckboxChange('Text14',this)"
                                                            name="behagian_b_8_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text14"
                                                            onchange="handleCheckboxChange('Text14',this)" checked
                                                            name="behagian_b_8_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text14"
                                                            onchange="handleCheckboxChange('Text14',this)"
                                                            name="behagian_b_8_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover15"
                                                            onchange="handleCheckboxChange('Cover15',this)"
                                                            name="behagian_b_8_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover15"
                                                            onchange="handleCheckboxChange('Cover15',this)" checked
                                                            name="behagian_b_8_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover15"
                                                            onchange="handleCheckboxChange('Cover15',this)"
                                                            name="behagian_b_8_text" value="na"></td>

                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>Kedudukan cetakan depan belakang/print register</td>
                                                    <td><input type="checkbox" class="Text15"
                                                            onchange="handleCheckboxChange('Text15',this)"
                                                            name="behagian_b_9_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text15"
                                                            onchange="handleCheckboxChange('Text15',this)" checked
                                                            name="behagian_b_9_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text15"
                                                            onchange="handleCheckboxChange('Text15',this)"
                                                            name="behagian_b_9_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover16"
                                                            onchange="handleCheckboxChange('Cover16',this)"
                                                            name="behagian_b_9_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover16"
                                                            onchange="handleCheckboxChange('Cover16',this)" checked
                                                            name="behagian_b_9_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover16"
                                                            onchange="handleCheckboxChange('Cover16',this)"
                                                            name="behagian_b_9_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td>Jenis penjilidan (Perf bind, Lock bind, Stitching)</td>
                                                    <td><input type="checkbox" class="Text16"
                                                            onchange="handleCheckboxChange('Text16',this)"
                                                            name="behagian_b_10_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text16"
                                                            onchange="handleCheckboxChange('Text16',this)" checked
                                                            name="behagian_b_10_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text16"
                                                            onchange="handleCheckboxChange('Text16',this)"
                                                            name="behagian_b_10_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover17"
                                                            onchange="handleCheckboxChange('Cover17',this)"
                                                            name="behagian_b_10_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover17"
                                                            onchange="handleCheckboxChange('Cover17',this)" checked
                                                            name="behagian_b_10_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover17"
                                                            onchange="handleCheckboxChange('Cover17',this)"
                                                            name="behagian_b_10_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td>Spacing (Minimum 3mm)</td>
                                                    <td><input type="checkbox" class="Text17"
                                                            onchange="handleCheckboxChange('Text17',this)"
                                                            name="behagian_b_11_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text17"
                                                            onchange="handleCheckboxChange('Text17',this)" checked
                                                            name="behagian_b_11_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text17"
                                                            onchange="handleCheckboxChange('Text17',this)"
                                                            name="behagian_b_11_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover18"
                                                            onchange="handleCheckboxChange('Cover18',this)"
                                                            name="behagian_b_11_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover18"
                                                            onchange="handleCheckboxChange('Cover18',this)" checked
                                                            name="behagian_b_11_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover18"
                                                            onchange="handleCheckboxChange('Cover18',this)"
                                                            name="behagian_b_11_text" value="na"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- <div class="card" style="background:#f1f0f0;">
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
                                </div> -->

                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <h5><b>Bahagian C (Pemeriksaan Dan Pengesahan Mock Up) - Untuk Mock Up Sahaja</b>
                                        </h5>
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
                                                    <td><input type="checkbox" class="Text18"
                                                            onchange="handleCheckboxChange('Text18',this)"
                                                            name="behagian_c_1_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text18"
                                                            onchange="handleCheckboxChange('Text18',this)" checked
                                                            name="behagian_c_1_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text18"
                                                            onchange="handleCheckboxChange('Text18',this)"
                                                            name="behagian_c_1_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover19"
                                                            onchange="handleCheckboxChange('Cover19',this)"
                                                            name="behagian_c_1_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover19"
                                                            onchange="handleCheckboxChange('Cover19',this)" checked
                                                            name="behagian_c_1_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover19"
                                                            onchange="handleCheckboxChange('Cover19',this)"
                                                            name="behagian_c_1_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Artwork (Semak gambar dan teks)</td>
                                                    <td><input type="checkbox" class="Text19"
                                                            onchange="handleCheckboxChange('Text19',this)"
                                                            name="behagian_c_2_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text19"
                                                            onchange="handleCheckboxChange('Text19',this)" checked
                                                            name="behagian_c_2_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text19"
                                                            onchange="handleCheckboxChange('Text19',this)"
                                                            name="behagian_c_2_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover20"
                                                            onchange="handleCheckboxChange('Cover20',this)"
                                                            name="behagian_c_2_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover20"
                                                            onchange="handleCheckboxChange('Cover20',this)" checked
                                                            name="behagian_c_2_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover20"
                                                            onchange="handleCheckboxChange('Cover20',this)"
                                                            name="behagian_c_2_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Kotor, calar (Periksa setiap muka surat)</td>
                                                    <td><input type="checkbox" class="Text20"
                                                            onchange="handleCheckboxChange('Text20',this)"
                                                            name="behagian_c_3_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text20"
                                                            onchange="handleCheckboxChange('Text20',this)" checked
                                                            name="behagian_c_3_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text20"
                                                            onchange="handleCheckboxChange('Text20',this)"
                                                            name="behagian_c_3_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover21"
                                                            onchange="handleCheckboxChange('Cover21',this)"
                                                            name="behagian_c_3_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover21"
                                                            onchange="handleCheckboxChange('Cover21',this)" checked
                                                            name="behagian_c_3_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover21"
                                                            onchange="handleCheckboxChange('Cover21',this)"
                                                            name="behagian_c_3_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Jenis penjilidan (stitching, perfect bind, hardcover)</td>
                                                    <td><input type="checkbox" class="Text21"
                                                            onchange="handleCheckboxChange('Text21',this)"
                                                            name="behagian_c_4_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text21"
                                                            onchange="handleCheckboxChange('Text21',this)" checked
                                                            name="behagian_c_4_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text21"
                                                            onchange="handleCheckboxChange('Text21',this)"
                                                            name="behagian_c_4_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover22"
                                                            onchange="handleCheckboxChange('Cover22',this)"
                                                            name="behagian_c_4_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover22"
                                                            onchange="handleCheckboxChange('Cover22',this)" checked
                                                            name="behagian_c_4_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover22"
                                                            onchange="handleCheckboxChange('Cover22',this)"
                                                            name="behagian_c_4_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Jumlah mukasurat (Rujuk Job Sheet dan file artwork)</td>
                                                    <td><input type="checkbox" class="Text22"
                                                            onchange="handleCheckboxChange('Text22',this)"
                                                            name="behagian_c_5_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text22"
                                                            onchange="handleCheckboxChange('Text22',this)" checked
                                                            name="behagian_c_5_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text22"
                                                            onchange="handleCheckboxChange('Text22',this)"
                                                            name="behagian_c_5_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover23"
                                                            onchange="handleCheckboxChange('Cover23',this)"
                                                            name="behagian_c_5_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover23"
                                                            onchange="handleCheckboxChange('Cover23',this)" checked
                                                            name="behagian_c_5_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover23"
                                                            onchange="handleCheckboxChange('Cover23',this)"
                                                            name="behagian_c_5_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Turutan mukasurat (Berturutan)</td>
                                                    <td><input type="checkbox" class="Text23"
                                                            onchange="handleCheckboxChange('Text23',this)"
                                                            name="behagian_c_6_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text23"
                                                            onchange="handleCheckboxChange('Text23',this)" checked
                                                            name="behagian_c_6_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text23"
                                                            onchange="handleCheckboxChange('Text23',this)"
                                                            name="behagian_c_6_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover24"
                                                            onchange="handleCheckboxChange('Cover24',this)"
                                                            name="behagian_c_6_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover24"
                                                            onchange="handleCheckboxChange('Cover24',this)" checked
                                                            name="behagian_c_6_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover24"
                                                            onchange="handleCheckboxChange('Cover24',this)"
                                                            name="behagian_c_6_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>Kelekatan matt/gloss lamination</td>
                                                    <td><input type="checkbox" class="Text24"
                                                            onchange="handleCheckboxChange('Text24',this)"
                                                            name="behagian_c_7_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text24"
                                                            onchange="handleCheckboxChange('Text24',this)" checked
                                                            name="behagian_c_7_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text24"
                                                            onchange="handleCheckboxChange('Text24',this)"
                                                            name="behagian_c_7_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover25"
                                                            onchange="handleCheckboxChange('Cover25',this)"
                                                            name="behagian_c_7_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover25"
                                                            onchange="handleCheckboxChange('Cover25',this)" checked
                                                            name="behagian_c_7_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover25"
                                                            onchange="handleCheckboxChange('Cover25',this)"
                                                            name="behagian_c_7_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Koyak (Terkoyak / Rosak)</td>
                                                    <td><input type="checkbox" class="Text25"
                                                            onchange="handleCheckboxChange('Text25',this)"
                                                            name="behagian_c_8_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text25"
                                                            onchange="handleCheckboxChange('Text25',this)" checked
                                                            name="behagian_c_8_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text25"
                                                            onchange="handleCheckboxChange('Text25',this)"
                                                            name="behagian_c_8_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover26"
                                                            onchange="handleCheckboxChange('Cover26',this)"
                                                            name="behagian_c_8_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover26"
                                                            onchange="handleCheckboxChange('Cover26',this)" checked
                                                            name="behagian_c_8_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover26"
                                                            onchange="handleCheckboxChange('Cover26',this)"
                                                            name="behagian_c_8_text" value="na"></td>

                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>Imej/artwork terpotong</td>
                                                    <td><input type="checkbox" class="Text26"
                                                            onchange="handleCheckboxChange('Text26',this)"
                                                            name="behagian_c_9_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text26"
                                                            onchange="handleCheckboxChange('Text26',this)" checked
                                                            name="behagian_c_9_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text26"
                                                            onchange="handleCheckboxChange('Text26',this)"
                                                            name="behagian_c_9_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover27"
                                                            onchange="handleCheckboxChange('Cover27',this)"
                                                            name="behagian_c_9_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover27"
                                                            onchange="handleCheckboxChange('Cover27',this)" checked
                                                            name="behagian_c_9_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover27"
                                                            onchange="handleCheckboxChange('Cover27',this)"
                                                            name="behagian_c_9_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td>Cop (Cop pada setiap mockup)</td>
                                                    <td><input type="checkbox" class="Text27"
                                                            onchange="handleCheckboxChange('Text27',this)"
                                                            name="behagian_c_10_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text27"
                                                            onchange="handleCheckboxChange('Text27',this)" checked
                                                            name="behagian_c_10_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text27"
                                                            onchange="handleCheckboxChange('Text27',this)"
                                                            name="behagian_c_10_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover28"
                                                            onchange="handleCheckboxChange('Cover28',this)"
                                                            name="behagian_c_10_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover28"
                                                            onchange="handleCheckboxChange('Cover28',this)" checked
                                                            name="behagian_c_10_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover28"
                                                            onchange="handleCheckboxChange('Cover28',this)"
                                                            name="behagian_c_10_text" value="na"></td>
                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-5"> Lain-lain (nyatakan): </div>
                                                            <div class="col-md-7"><input type="text" width=""
                                                                    name="behagian_c_11_input"
                                                                    id="" class="form-control"></div>
                                                        </div>
                                                    </td>
                                                    <td><input type="checkbox" class="Text28"
                                                            onchange="handleCheckboxChange('Text28',this)"
                                                            name="behagian_c_11_cover" value="ok"></td>
                                                    <td><input type="checkbox" class="Text28"
                                                            onchange="handleCheckboxChange('Text28',this)" checked
                                                            name="behagian_c_11_cover" value="ng"></td>
                                                    <td><input type="checkbox" class="Text28"
                                                            onchange="handleCheckboxChange('Text28',this)"
                                                            name="behagian_c_11_cover" value="na"></td>
                                                    <td><input type="checkbox" class="Cover29"
                                                            onchange="handleCheckboxChange('Cover29',this)"
                                                            name="behagian_c_11_text" value="ok"></td>
                                                    <td><input type="checkbox" class="Cover29"
                                                            onchange="handleCheckboxChange('Cover29',this)" checked
                                                            name="behagian_c_11_text" value="ng"></td>
                                                    <td><input type="checkbox" class="Cover29"
                                                            onchange="handleCheckboxChange('Cover29',this)"
                                                            name="behagian_c_11_text" value="na"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- <div class="card" style="background:#f1f0f0;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5>NOTA:</h5>
                                                <p>1. Setiap mockup perlu di cop pada kulit buku di belakang bahagian dalam.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <button class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                        <a href="{{ route('senari_semak') }}">back to list</a>
                    </div>
                </div>
            </form>
        @endsection


        @push('custom-scripts')
            <script>
                function handleCheckboxChange(className, checkbox) {
                    if ($(checkbox).prop('checked')) {
                        $(`.${ className }`).not(checkbox).prop('checked', false);
                    }
                }
                $(document).ready(function() {
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
                        templateResult: function(data) {
                            if (data.loading) {
                                return "Loading...";
                            }

                            return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                        },
                        templateSelection: function(data) {
                            return data.order_no || null;
                        }
                    });

                    $('#sale_order').on('change', function() {
                        const id = $(this).val();
                        $.ajax({
                            type: 'GET',
                            url: '{{ route('sale_order.detail.get') }}',
                            data: {
                                "id": id
                            },
                            success: function(data) {
                                $('#kod_buku').val(data.kod_buku);
                                $('#tajuk').val(data.description);
                            }
                        });
                    });
                });
            </script>
        @endpush
