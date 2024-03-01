@extends('layouts.app')
@section('css')
<style>
    .button{
        margin-left:150px;
    }
</style>
@endsection
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
                                        <input type="text" name="date"
                                            value="{{ \Carbon\Carbon::parse($laporan_proses_penjilidan->date)->format('d-m-Y') }}"
                                            class="form-control" disabled id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                            placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Time</label>
                                    <input type="text" name="time" value="{{ $laporan_proses_penjilidan->time }}"
                                        id="Currenttime" class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Diperiksa oleh (Operator)</div>
                                        <input type="text" value="{{ Auth::user()->full_name }}" readonly name=""
                                            id="checked_by" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <input type="text" value="{{ $laporan_proses_penjilidan->sale_order->order_no }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text"
                                            value="{{ $laporan_proses_penjilidan->sale_order->description }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" value="{{ $laporan_proses_penjilidan->sale_order->kod_buku }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Jumlah Seksyen</div>
                                        <input type="text" readonly
                                            value="{{ $laporan_proses_penjilidan->senari_semak->item_cover_text ?? 0 }}"
                                            id="jumlah" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kuantiti SO</div>
                                        <input type="number"
                                            value="{{ $laporan_proses_penjilidan->sale_order->sale_order_qty }}" readonly
                                            id="sale_order_qty" class="form-control">
                                    </div>
                                </div>



                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Jenis Penjilidan</label>
                                        <select name="jenis" id="" disabled class="form-control form-select">
                                            <option value="Perfect Bind"  @selected($laporan_proses_penjilidan->jenis ==
                                                'Perfect Bind')>Perfect Bind
                                            </option>
                                            <option value="Lock Bind"  @selected($laporan_proses_penjilidan->jenis ==
                                                'Lock Bind')>Lock Bind
                                            </option>
                                            <option value="Gather"  @selected($laporan_proses_penjilidan->jenis ==
                                                'Gather')>Gather</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Operator</label>
                                        @php
                                        $item = json_decode($laporan_proses_penjilidan->user_id);
                                        @endphp
                                        <select name="user[]" disabled class="form-control form-select" id="" multiple>
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
                                        <label for="">Pembantu</label>
                                        @php
                                            $item1 = json_decode($laporan_proses_penjilidan->pembantu);
                                        @endphp
                                        <select disabled name="pembantu[]" class="form-control form-select" id=""
                                            multiple>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    @if ($item1) {{ in_array($user->id, $item1) ? 'selected' : '' }} @endif>
                                                    {{ $user->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row mt-5">
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
                                                <td>Koyakan fiber</td>
                                                <td><input type="checkbox" readonly class="Cover1"
                                                        onchange="handleCheckboxChange('Cover',this)" name="b_1"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_1 == 'ok') id=""></td>
                                                <td><input type="checkbox" readonly class="Cover1"
                                                        onchange="handleCheckboxChange('Cover1',this)" name="b_1"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_1 == 'ng') id=""></td>
                                                <td><input type="checkbox" readonly class="Cover1"
                                                        onchange="handleCheckboxChange('Cover1',this)" name="b_1"
                                                        value="na" @checked($laporan_proses_penjilidan->b_1 == 'na') id=""></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Kedudukan Kulit buku dan teks</td>
                                                <td><input type="checkbox" readonly class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" name="b_2"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_2 == 'ok') id=""></td>
                                                <td><input type="checkbox" readonly class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" name="b_2"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_2 == 'ng') id=""></td>
                                                <td><input type="checkbox" readonly class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" name="b_2"
                                                        value="na" @checked($laporan_proses_penjilidan->b_2 == 'na') id=""></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Artwork Kulit buku dan Teks</td>
                                                <td><input type="checkbox" readonly class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" name="b_3"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_3 == 'ok') id=""></td>
                                                <td><input type="checkbox" readonly class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" name="b_3"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_3 == 'ng') id=""></td>
                                                <td><input type="checkbox" readonly class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" name="b_3"
                                                        value="na" @checked($laporan_proses_penjilidan->b_3 == 'na') id=""></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Turutan Seksyen/muka surat</td>
                                                <td><input type="checkbox" readonly class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)" name="b_4"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_4 == 'ok') id=""></td>
                                                <td><input type="checkbox" readonly class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)" name="b_4"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_4 == 'ng') id=""></td>
                                                <td><input type="checkbox" readonly class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)" name="b_4"
                                                        value="na" @checked($laporan_proses_penjilidan->b_4 == 'na') id=""></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Kedudukan gam (side gam)</td>
                                                <td><input type="checkbox" readonly class="Cover3"
                                                        onchange="handleCheckboxChange('Cover3',this)" name="b_5"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_5 == 'ok') id=""></td>
                                                <td><input type="checkbox" readonly class="Cover3"
                                                        onchange="handleCheckboxChange('Cover3',this)" name="b_5"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_5 == 'ng') id=""></td>
                                                <td><input type="checkbox" readonly class="Cover3"
                                                        onchange="handleCheckboxChange('Cover3',this)" name="b_5"
                                                        value="na" @checked($laporan_proses_penjilidan->b_5 == 'na') id=""></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Rosak/koyak</td>
                                                <td><input type="checkbox" readonly class="Text3"
                                                        onchange="handleCheckboxChange('Text3',this)" name="b_6"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_6 == 'ok') id=""></td>
                                                <td><input type="checkbox" readonly class="Text3"
                                                        onchange="handleCheckboxChange('Text3',this)" name="b_6"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_6 == 'ng') id=""></td>
                                                <td><input type="checkbox" readonly class="Text3"
                                                        onchange="handleCheckboxChange('Text3',this)" name="b_6"
                                                        value="na" @checked($laporan_proses_penjilidan->b_6 == 'na') id=""></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Kotor</td>
                                                <td><input type="checkbox" readonly class="Cover4"
                                                        onchange="handleCheckboxChange('Cover4',this)" name="b_7"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_7 == 'ok') id=""></td>
                                                <td><input type="checkbox" readonly class="Cover4"
                                                        onchange="handleCheckboxChange('Cover4',this)" name="b_7"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_7 == 'ng') id=""></td>
                                                <td><input type="checkbox" readonly class="Cover4"
                                                        onchange="handleCheckboxChange('Cover4',this)" name="b_7"
                                                        value="na" @checked($laporan_proses_penjilidan->b_7 == 'na') id=""></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Lain-lain</td>
                                                <td><input type="checkbox" readonly class="Text8"
                                                        onchange="handleCheckboxChange('Text8',this)" name="b_8"
                                                        value="ok" @checked($laporan_proses_penjilidan->b_8 == 'ok') id=""></td>
                                                <td><input type="checkbox" readonly class="Text8"
                                                        onchange="handleCheckboxChange('Text8',this)" name="b_8"
                                                        value="ng" @checked($laporan_proses_penjilidan->b_8 == 'ng') id=""></td>
                                                <td><input type="checkbox" readonly class="Text8"
                                                        onchange="handleCheckboxChange('Text8',this)" name="b_8"
                                                        value="na" @checked($laporan_proses_penjilidan->b_8 == 'na') id=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-12 ">
                                    <h5><b>C) Pemeriksaan semasa proses penjilidan </b></h5>
                                </div>


                                <form
                                action="{{ route('laporan_proses_penjilidan.approve.approve', $laporan_proses_penjilidan->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <form
                                    action="{{ route('laporan_proses_penjilidan.approve.approve', $laporan_proses_penjilidan->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">Jumlah </th>
                                                <th colspan="5s">Kriteria</th>
                                                <th rowspan="2">Check (Operator)</th>
                                                <th rowspan="2">Username / datetime</th>
                                                <th rowspan="2">Verify</th>
                                                <th rowspan="2">Username / datetime</th>
                                                <th rowspan="2">Action</th>
                                            </tr>
                                            <tr>
                                                <th>Kedudukan Kulit buku dan teks</th>
                                                <th>Artwork Kulit buku dan teks</th>
                                                <th>Turutan Seksyen/ muta surat</th>
                                                <th>Rosak/Koyak</th>
                                                <th>Kotor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($details as $key => $detail)
                                            <tr>
                                                <td>{{$detail->c_1}}</td>
                                                <td><input type="hidden" value="{{$detail->c_1}}"
                                                        name="semasa[{{$key+1}}][1]"><input type="checkbox"
                                                        name="semasa[{{$key+1}}][2]" id="" @checked($detail->c_2 !=
                                                    null)>
                                                </td>
                                                <td><input type="checkbox" name="semasa[{{$key+1}}][3]" id=""
                                                        @checked($detail->c_3 != null)>
                                                </td>
                                                <td><input type="checkbox" name="semasa[{{$key+1}}][4]" id=""
                                                        @checked($detail->c_4 != null)>
                                                </td>
                                                <td><input type="checkbox" name="semasa[{{$key+1}}][5]" id=""
                                                        @checked($detail->c_5 != null)>
                                                </td>
                                                <td><input type="checkbox" name="semasa[{{$key+1}}][6]" id=""
                                                        @checked($detail->c_6 != null)>
                                                </td>
                                                <td><button type="button" class="btn btn-primary check_btn"
                                                        style="border-radius:5px;" @disabled($detail->c_7 !=
                                                        null)>check</button></td>
                                                <td><input type="text" style="width:340px" name="semasa[{{$key+1}}][7]"
                                                        class="check_operator form-control" value="{{$detail->c_7}}"
                                                        readonly></td>
                                                <td><button type="button" class="btn btn-primary verify_btn"
                                                        >Verify</button>
                                                </td>
                                                <td><input type="text" name="semasa[{{$key+1}}][8]"
                                                        class="verify_operator  form-control"  style="width:340px"   readonly></td>
                                                <td><button type="button" class="btn btn-danger remove"
                                                        style="border-radius:5px; ">X</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-end">
                        <div class="col-md-12 d-flex justify-content-end">


                            <button class="btn btn-primary button" type="submit"> Verify</button>
                            </form>
                            <form
                                action="{{ route('laporan_proses_penjilidan.approve.decline', $laporan_proses_penjilidan->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <button class="btn btn-danger" style="margin-left: 170px" type="submit">Decline</button>
                            </form>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('laporan_proses_penjilidan') }}">back to list</a>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('input').attr('disabled', 'disabled');
            $('input[type="hidden"]').removeAttr('disabled');
            $('.verify_operator').removeAttr('disabled');
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

                $(document).on('click', '.verify_btn', function() {
                    $(this).attr('disabled', 'disabled');
                    const currentDate = new Date();
                    const formattedDateTime = formatDateWithAMPM(currentDate);
                    let checked_by = $('#checked_by').val();
                    const combinedValue = `${checked_by}/${formattedDateTime}`;
                    $(this).closest('tr').find('.verify_operator').val(combinedValue);
                });
    </script>
@endpush
