@extends('layouts.app')
@section('content')
    <form action="{{ route('laporan_proses_three.store') }}" method="POST">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5></h5>
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
                                                <input type="text" name="date" value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">

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
                                                <div class="form-label">Checked By (Operator)</div>
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
                                                <div class="form-label">Saiz Buku</div>
                                                <input type="text" readonly value="" id="size"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="form-label">Kuantiti SO</div>
                                                <input type="text" readonly value="" id="sale_order_qty"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="form-label">Good Count (Optional)</div>
                                                <input type="text" name="good_count" value="" id=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="">Operator</label>
                                                <select name="user[]" class="form-control form-select" id=""
                                                    multiple>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}"
                                                            @if (old('user')) {{ in_array($user->id, old('user')) ? 'selected' : '' }} @endif>
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
                                                        onchange="handleCheckboxChange('Cover1',this)" name="b_1" @checked(old('b_1') == 'ok')
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover1"
                                                        onchange="handleCheckboxChange('Cover1',this)" @checked(old('b_1') == 'ng')
                                                        @if (old('b_1')) @else checked @endif
                                                        name="b_1" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover1"
                                                        onchange="handleCheckboxChange('Cover1',this)" name="b_1" @checked(old('b_1') == 'na')
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Kedudukan potongan yang betul</td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" name="b_2" @checked(old('b_2') == 'ok')
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" @checked(old('b_2') == 'ng')
                                                        @if (old('b_2')) @else checked @endif
                                                        name="b_2" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" name="b_2"  @checked(old('b_2') == 'na')
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Teks tidak terpotong</td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" name="b_3" @checked(old('b_3') == 'ok')
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" @checked(old('b_3') == 'ng')
                                                        @if (old('b_3')) @else checked @endif
                                                        name="b_3" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" name="b_3" @checked(old('b_3') == 'na')
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Turutan Seksyen/muka surat</td>
                                                <td><input type="checkbox" class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)" name="b_4" @checked(old('b_4') == 'ok')
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)"  @checked(old('b_4') == 'ng')
                                                        @if (old('b_4')) @else checked @endif
                                                        name="b_4" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)" name="b_4"  @checked(old('b_4') == 'na')
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Kepetakan/ squareness</td>
                                                <td><input type="checkbox" class="Cover3"
                                                        onchange="handleCheckboxChange('Cover3',this)" name="b_5" @checked(old('b_5') == 'ok')
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover3"
                                                        onchange="handleCheckboxChange('Cover3',this)" @checked(old('b_5') == 'ng')
                                                        @if (old('b_5')) @else checked @endif
                                                        name="b_5" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover3"
                                                        onchange="handleCheckboxChange('Cover3',this)" name="b_5" @checked(old('b_5') == 'na')
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Potongan yang bersih</td>
                                                <td><input type="checkbox" class="Text3"
                                                        onchange="handleCheckboxChange('Text3',this)" name="b_6" @checked(old('b_6') == 'ok')
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text3"
                                                        onchange="handleCheckboxChange('Text3',this)" @checked(old('b_6') == 'ng')
                                                        @if (old('b_6')) @else checked @endif
                                                        name="b_6" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text3"
                                                        onchange="handleCheckboxChange('Text3',this)" name="b_6"  @checked(old('b_6') == 'na')
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Turutan muka surat</td>
                                                <td><input type="checkbox" class="Cover4"
                                                        onchange="handleCheckboxChange('Cover4',this)" name="b_7" @checked(old('b_7') == 'ok')
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover4"
                                                        onchange="handleCheckboxChange('Cover4',this)" @checked(old('b_7') == 'ng')
                                                        @if (old('b_7')) @else checked @endif
                                                        name="b_7" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover4"
                                                        onchange="handleCheckboxChange('Cover4',this)" name="b_7" @checked(old('b_7') == 'na')
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Kotor</td>
                                                <td><input type="checkbox" class="Text8"
                                                        onchange="handleCheckboxChange('Text8',this)" name="b_8" @checked(old('b_8') == 'ok')
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text8"
                                                        onchange="handleCheckboxChange('Text8',this)" @checked(old('b_8') == 'ng')
                                                        @if (old('b_8')) @else checked @endif
                                                        name="b_8" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text8"
                                                        onchange="handleCheckboxChange('Text8',this)" name="b_8" @checked(old('b_8') == 'na')
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Koyak</td>
                                                <td><input type="checkbox" class="Cover9"
                                                        onchange="handleCheckboxChange('Cover9',this)" name="b_9" @checked(old('b_9') == 'ok')
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover9"
                                                        onchange="handleCheckboxChange('Cover9',this)" @checked(old('b_9') == 'ng')
                                                        @if (old('b_8')) @else checked @endif
                                                        name="b_9" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover9"
                                                        onchange="handleCheckboxChange('Cover9',this)" name="b_9" @checked(old('b_9') == 'na')
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>melekat</td>
                                                <td><input type="checkbox" class="Text10"
                                                        onchange="handleCheckboxChange('Text10',this)" name="b_10"  @checked(old('b_10') == 'ok')
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text10"
                                                        onchange="handleCheckboxChange('Text10',this)" @checked(old('b_10') == 'ng')
                                                        @if (old('b_8')) @else checked @endif
                                                        name="b_10" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text10"
                                                        onchange="handleCheckboxChange('Text10',this)" name="b_10" @checked(old('b_10') == 'na')
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>calar/ kemik</td>
                                                <td><input type="checkbox" class="Cover11"
                                                        onchange="handleCheckboxChange('Cover11',this)" name="b_11"  @checked(old('b_11') == 'ok')
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover11"
                                                        onchange="handleCheckboxChange('Cover11',this)"  @checked(old('b_11') == 'ng')
                                                        @if (old('b_8')) @else checked @endif
                                                        name="b_11" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover11"
                                                        onchange="handleCheckboxChange('Cover11',this)" name="b_11" @checked(old('b_11') == 'na')
                                                        value="na" id=""></td>
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
                                    <button class="btn btn-primary mb-3 float-right" type="button" id="AddRow">Add
                                        Row</button>
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
                                                    <th rowspan="2">Action</th>
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


                                                @if (old('semasa'))

                                                @foreach (old('semasa') as $key => $value)
                                                @php
                                                    $length = count(old('semasa'));
                                                @endphp
                                                @if($length == 1)
                                                    <tr>
                                                        <td>
                                                            {{ $value[1]  ?? '' }}
                                                        </td>
                                                        <td>
                                                            <input type="hidden" value="{{ $value[1]  ?? ''}}"
                                                                name="{{ "semasa[$key][1]" }}"><input type="checkbox"
                                                                name="{{ "semasa[$key][2]" }}"
                                                                @checked($value[2] ?? '' == 'on')
                                                                value="{{ $value[2]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][3]" }}"
                                                                @checked($value[3] ?? '' == 'on')
                                                                value="{{ $value[3] ?? '' }}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][4]" }}"
                                                                @checked($value[4] ?? '' == 'on')
                                                                value="{{ $value[4]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][5]" }}"
                                                                @checked($value[5] ?? '' == 'on')
                                                                value="{{ $value[5]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][6]" }}"
                                                                @checked($value[6] ?? '' == 'on')
                                                                value="{{ $value[6]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][7]" }}"
                                                                @checked($value[7] ?? '' == 'on')
                                                                value="{{ $value[7]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][8]" }}"
                                                                @checked($value[8] ?? '' == 'on')
                                                                value="{{ $value[8]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][9]" }}"
                                                                @checked($value[9] ?? '' == 'on')
                                                                value="{{ $value[9]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][10]" }}"
                                                                @checked($value[10] ?? '' == 'on')
                                                                value="{{ $value[10]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][11]" }}"
                                                                @checked($value[11] ?? '' == 'on')
                                                                value="{{ $value[11]  ?? ''}}" id="">
                                                        </td>
                                                        <td><button type="button" class="btn btn-primary check_btn"
                                                                style="border-radius:5px; " @disabled($value[12])>check</button></td>
                                                        <td><input type="text" style="width:340px;"
                                                                name="{{ "semasa[$key][12]" }}"
                                                                class="check_operator form-control"
                                                                value="{{ $value[12] ?? '' }}" readonly></td>
                                                                <td><button type="button" class="btn btn-primary verify_btn"
                                                                    disabled>Verify</button>
                                                            </td>

                                                        <td><input type="text"name="{{ "semasa[$key][13]" }}"
                                                                class="verify_operator form-control"
                                                                value="{{ $value[13] ?? '' }}" readonly></td>
                                                        <td><button type="button" class="btn btn-danger remove d-none"
                                                                style="border-radius:5px; ">X</button>
                                                        </td>

                                                    </tr>
                                                    @else
                                                    <tr>
                                                        <td>
                                                            {{ $value[1]  ?? '' }}
                                                        </td>
                                                        <td>
                                                            <input type="hidden" value="{{ $value[1]  ?? ''}}"
                                                                name="{{ "semasa[$key][1]" }}"><input type="checkbox"
                                                                name="{{ "semasa[$key][2]" }}"
                                                                @checked($value[2] ?? '' == 'on')
                                                                value="{{ $value[2]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][3]" }}"
                                                                @checked($value[3] ?? '' == 'on')
                                                                value="{{ $value[3] ?? '' }}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][4]" }}"
                                                                @checked($value[4] ?? '' == 'on')
                                                                value="{{ $value[4]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][5]" }}"
                                                                @checked($value[5] ?? '' == 'on')
                                                                value="{{ $value[5]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][6]" }}"
                                                                @checked($value[6] ?? '' == 'on')
                                                                value="{{ $value[6]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][7]" }}"
                                                                @checked($value[7] ?? '' == 'on')
                                                                value="{{ $value[7]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][8]" }}"
                                                                @checked($value[8] ?? '' == 'on')
                                                                value="{{ $value[8]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][9]" }}"
                                                                @checked($value[9] ?? '' == 'on')
                                                                value="{{ $value[9]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][10]" }}"
                                                                @checked($value[10] ?? '' == 'on')
                                                                value="{{ $value[10]  ?? ''}}" id="">
                                                        </td>
                                                        <td><input type="checkbox" name="{{ "semasa[$key][11]" }}"
                                                                @checked($value[11] ?? '' == 'on')
                                                                value="{{ $value[11]  ?? ''}}" id="">
                                                        </td>
                                                        <td><button type="button" class="btn btn-primary check_btn"
                                                                style="border-radius:5px; " @disabled($value[12])>check</button></td>
                                                        <td><input type="text" style="width:340px;"
                                                                name="{{ "semasa[$key][12]" }}"
                                                                class="check_operator form-control"
                                                                value="{{ $value[12] ?? '' }}" readonly></td>
                                                                <td><button type="button" class="btn btn-primary verify_btn"
                                                                    disabled>Verify</button>
                                                            </td>

                                                        <td><input type="text"name="{{ "semasa[$key][13]" }}"
                                                                class="verify_operator form-control"
                                                                value="{{ $value[13] ?? '' }}" readonly></td>
                                                        <td><button type="button" class="btn btn-danger remove"
                                                                style="border-radius:5px; ">X</button>
                                                        </td>

                                                    </tr>
                                                    @endif
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td>500</td>
                                                    <td><input type="hidden" value="500" name="semasa[1][1]"><input
                                                            type="checkbox" name="semasa[1][2]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][3]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][4]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][5]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][6]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][7]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][8]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][9]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][10]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][11]" id="">
                                                    </td>
                                                    <td><button type="button"  class="btn btn-primary check_btn"
                                                            style="border-radius:5px; ">check</button></td>
                                                    <td><input type="text" style="width:340px;" name="semasa[1][12]"
                                                            class="check_operator form-control" readonly></td>
                                                    <td><button type="button" class="btn btn-primary verify_btn"
                                                            disabled>Verify</button>
                                                    </td>
                                                    <td><input type="text" name="semasa[1][13]"
                                                            class="verify_operator form-control" readonly></td>
                                                    <td><button type="button" class="btn btn-danger remove d-none"
                                                            style="border-radius:5px; ">X</button>
                                                    </td>
                                                </tr>
                                            @endif




                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary float-right mt-3">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('laporan_proses_three') }}"><i class="ti-arrow-left mx-2 mt-1"></i>back to list</a>
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

        var increment = 1000;
        $(document).on('click', '#AddRow', function() {
            if ($('#table tbody tr').length == 0) {
                increment = 500;
            }else if ($('#table tbody tr').length == 1) {
                $('#table tbody tr .remove').removeClass('d-none');
                    }
            let length = $('#table tbody tr').length + 1;
            $('#table tbody').append(`<tr>
                                                            <td>${increment}</td>
                                                            <td><input type="hidden" value="${increment}" name="semasa[${length}][1]"><input type="checkbox" name="semasa[${length}][2]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][3]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][4]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][5]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][6]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][7]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][8]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][9]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][10]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][11]" id="">
                                                            </td>
                                                            <td><button class="btn btn-primary check_btn"
                                                                    style="border-radius:5px; " type="button">check</button></td>
                                                            <td><input type="text" style="width:340px;" name="semasa[${length}][12]" class="check_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-primary verify_btn" disabled>Verify</button>
                                                            </td>
                                                            <td><input type="text" name="semasa[${length}][13]" class="verify_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-danger remove"
                                                                    style="border-radius:5px; ">X</button>
                                                            </td>`);
            increment += 500;
        });

        $(document).on('click', '.remove', function() {
            increment -= 500;
           $(this).closest('tr').remove();
           updateSequence($('#table'))
            if ($('#table tbody tr:visible').length === 1) {
                $('#table tbody tr:visible .remove').addClass('d-none');
            }
        });

        function updateSequence(table) {
            var visibleRows = table.find('tbody tr:visible');
            visibleRows.each(function(index) {
                $(this).find('td:eq(0)').text((index + 1) * 500);
            });
        }

        $(document).ready(function() {
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

                $(document).on('click', '.check_btn', function() {
                    $(this).attr('disabled', 'disabled');
                    const currentDate = new Date();
                    const formattedDateTime = formatDateWithAMPM(currentDate);
                    let checked_by = $('#checked_by').val();
                    const combinedValue = `${checked_by}/${formattedDateTime}`;
                    $(this).closest('tr').find('.check_operator').val(combinedValue);
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
                        $('#size').val(data.sale_order.size);
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
