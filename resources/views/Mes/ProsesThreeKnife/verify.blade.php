@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="float-left"><b>LAPORAN PEMERIKSAAN KUALITI - PROSES THREE KNIFE</b></h5>
                        <p class="float-right">TCBS-B23 (Rev.5)</p>
                    </div>
                </div>
                <div class="card" style="background:#f1f0f0;">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    @php
                                    use Carbon\Carbon;
                                    @endphp
                                    <label for="">Date</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ optional(Carbon::parse($proses_three_knife->date))->format('d-m-Y') }}">
                                </div>
                            </div>

                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="label">Time</div>
                                    <input name="time" disabled type="time" id="Currenttime"
                                        value="{{ $proses_three_knife->time }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="label">Checked By</div>
                                    <input type="text" disabled value="{{ Auth::user()->user_name }}" readonly
                                        class="form-control" name="" id="">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="label">Sales Order No</div>
                                    <input type="text" disabled value="{{ $proses_three_knife->sale_order->order_no }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="label">Tajuk</div>
                                    <input type="text" disabled
                                        value="{{ $proses_three_knife->sale_order->description }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="label">Kod Buku</div>
                                    <input type="text" disabled value="auto Display"
                                        value="{{ $proses_three_knife->sale_order->kod_buku }}" id="kod_buku"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="label">Mesin</div>
                                    <input type="text" value="TK1" readonly name="machine" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <label for="">Saiz Buku</label>
                                    <input type="text" readonly value="{{ $proses_three_knife->sale_order->size }}"
                                        name="" id="" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 mt-5">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">Kriteria</th>
                                                <th colspan="2">Tanda bagi yang berkenaan</th>

                                            </tr>
                                            <tr>
                                                <th>OK</th>
                                                <th>NG</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td style="background:wheat;">saiz yang betul</td>
                                                <td><input type="checkbox" disabled name="b_1" class="b_1"
                                                        onchange="handleCheckboxChange('b_1',this)" value="ok"
                                                        @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                <td><input type="checkbox" disabled name="b_1" class="b_1"
                                                        onchange="handleCheckboxChange('b_1',this)" value="ng"
                                                        @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Kedudukan potongan</td>
                                                <td><input type="checkbox" disabled name="b_2" class="b_2"
                                                        onchange="handleCheckboxChange('b_2',this)" value="ok"
                                                        @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                <td><input type="checkbox" disabled name="b_2" class="b_2"
                                                        onchange="handleCheckboxChange('b_2',this)" value="ng"
                                                        @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                            </tr>
                                            <tr>
                                                <td>teks tidak terpotong</td>
                                                <td><input type="checkbox" disabled name="b_3" class="b_3"
                                                        onchange="handleCheckboxChange('b_3',this)" value="ok"
                                                        @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                <td><input type="checkbox" disabled name="b_3" class="b_3"
                                                        onchange="handleCheckboxChange('b_3',this)" value="ng"
                                                        @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Kepetekan / squareness</td>
                                                <td><input type="checkbox" disabled name="b_4" class="b_4"
                                                        onchange="handleCheckboxChange('b_4',this)" value="ok"
                                                        @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                <td><input type="checkbox" disabled name="b_4" class="b_4"
                                                        onchange="handleCheckboxChange('b_4',this)" value="ng"
                                                        @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Potongan yang bersih</td>
                                                <td><input type="checkbox" disabled name="b_5" class="b_5"
                                                        onchange="handleCheckboxChange('b_5',this)" value="ok"
                                                        @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                <td><input type="checkbox" disabled name="b_5" class="b_5"
                                                        onchange="handleCheckboxChange('b_5',this)" value="ng"
                                                        @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Turutan muka surat</td>
                                                <td><input type="checkbox" disabled name="b_6" class="b_6"
                                                        onchange="handleCheckboxChange('b_6',this)" value="ok"
                                                        @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                <td><input type="checkbox" disabled name="b_6" class="b_6"
                                                        onchange="handleCheckboxChange('b_6',this)" value="ng"
                                                        @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Kotor</td>
                                                <td><input type="checkbox" disabled name="b_7" class="b_7"
                                                        onchange="handleCheckboxChange('b_7',this)" value="ok"
                                                        @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                <td><input type="checkbox" disabled name="b_7" class="b_7"
                                                        onchange="handleCheckboxChange('b_7',this)" value="ng"
                                                        @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Koyak</td>
                                                <td><input type="checkbox" disabled name="b_8" class="b_8"
                                                        onchange="handleCheckboxChange('b_8',this)" value="ok"
                                                        @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                <td><input type="checkbox" disabled name="b_8" class="b_8"
                                                        onchange="handleCheckboxChange('b_8',this)" value="ng"
                                                        @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Melekat</td>
                                                <td><input type="checkbox" disabled name="b_9" class="b_9"
                                                        onchange="handleCheckboxChange('b_9',this)" value="ok"
                                                        @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                <td><input type="checkbox" disabled name="b_9" class="b_9"
                                                        onchange="handleCheckboxChange('b_9',this)" value="ng"
                                                        @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                            </tr>

                                            <tr>
                                                <td>Calar</td>
                                                <td><input type="checkbox" disabled name="b_10" class="b_10"
                                                        onchange="handleCheckboxChange('b_10',this)" value="ok"
                                                        @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                <td><input type="checkbox" disabled name="b_10" class="b_10"
                                                        onchange="handleCheckboxChange('b_10',this)" value="ng"
                                                        @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                            </tr>

                                            <tr>
                                                <td>Kemik</td>
                                                <td><input type="checkbox" disabled name="b_11" class="b_11"
                                                        onchange="handleCheckboxChange('b_11',this)" value="ok"
                                                        @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                <td><input type="checkbox" disabled name="b_11" class="b_11"
                                                        onchange="handleCheckboxChange('b_11',this)" value="ng"
                                                        @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                            </tr>

                                            <tr>
                                                <td>Label yang betul</td>
                                                <td><input type="checkbox" disabled name="b_12" class="b_12"
                                                        onchange="handleCheckboxChange('b_12',this)" value="ok"
                                                        @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                <td><input type="checkbox" disabled name="b_12" class="b_12"
                                                        onchange="handleCheckboxChange('b_12',this)" value="ng"
                                                        @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                            </tr>

                                            <tr>
                                                <td>Pematuhan SOP</td>
                                                <td><input type="checkbox" disabled name="b_13" class="b_13"
                                                        onchange="handleCheckboxChange('b_13',this)" value="ok"
                                                        @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                <td><input type="checkbox" disabled name="b_13" class="b_13"
                                                        onchange="handleCheckboxChange('b_13',this)" value="ng"
                                                        @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4><b>Nota :</b></h4>
                        <div class="row">
                            <div class="col-md-1">
                                <div style="background:wheat; width:50px; height:20px;"></div>
                            </div>
                            <div class="col-md-11" style="margin-left:-20px;">
                                <span>Pemeriksaan hanya dilakukan sekali semasa pengesahan 1st piece dan tidak perlu
                                    dilakukan semasa proses</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-end mt-5">
                    <div class="col-md-12 d-flex justify-content-end">
                        <form action="{{ route('proses_three_knife.approve.decline', $proses_three_knife->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <button class="btn btn-danger mx-2" type="submit">Decline</button>
                        </form>
                        <form action="{{ route('proses_three_knife.approve.approve', $proses_three_knife->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <button class="btn btn-primary" type="submit"> Verify</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('proses_three_knife')}}"><i class="ti-angle-left mr-5 $indigo-100"></i>
                back to list</a>
        </div>
    </div>
</div>
</div>
@endsection
@push('custom-scripts')
$(document).ready(function() {
$('input').attr('disabled', 'disabled');
});
@endpush