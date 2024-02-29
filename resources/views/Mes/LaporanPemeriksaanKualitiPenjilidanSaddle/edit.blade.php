@extends('layouts.app')
@section('content')
    <form action="{{ route('laporan_pemeriksaan_kualiti_penjilidan_saddle.update', $laporan_pemeriksaan_kualiti_penjilidan_saddle->id) }}" method="POST">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="float-left">LAPORAN PEMERIKSAAN KUALITI - PROSES PENJILIDAN SADDLE STITCH</h5>
                                    <p class="float-right">TCSB-B23 (Rev.5)</p>
                                </div>
                            </div>
                            <div class="card" style="background:#f4f4ff;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="">Tarikh</label>
                                                <input type="text"  name="date" value="{{ \Carbon\Carbon::parse($laporan_pemeriksaan_kualiti_penjilidan_saddle->date)->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">

                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            @php
                                                $timeIn24HourFormat = Carbon\Carbon::createFromFormat('h:i A', $laporan_pemeriksaan_kualiti_penjilidan_saddle->time)->format('H:i');
                                            @endphp
                                            <div class="label">Masa</div>
                                            <input name="time" type="time" id="Currenttime"
                                                value="{{$timeIn24HourFormat}}" class="form-control">

                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Disemak Oleh</div>
                                                <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                                    name="" id="checked_by" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3" >
                                            <div class="form-group">
                                                <div class="label">Sales Order No.</div>
                                                <select name="sale_order" data-id="{{ $laporan_pemeriksaan_kualiti_penjilidan_saddle->so_id }}"
                                                    id="sale_order" class="form-control">
                                                    <option value="{{ $laporan_pemeriksaan_kualiti_penjilidan_saddle->so_id }}" selected
                                                        style="color: black; !important">
                                                        {{ $laporan_pemeriksaan_kualiti_penjilidan_saddle->sale_order->order_no }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Tajuk</div>
                                                <input type="text" readonly value="" id="tajuk"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Kod Buku</div>
                                                <input type="text" value="" readonly name="" id="kod_buku"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="label">Mesin</div>
                                                <input type="text" readonly name="mesin" class="form-control" value="SS1">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="label">Jumlah Seksyen</div>
                                                <input type="text" readonly id="jumlah" name="seksyen_no" class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">


                                        <div class="col-md-5 mt-3">
                                            <table class="table" border="1">
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
                                                        <td  style="background:wheat">Kedudukan dawai</td>
                                                        <td><input type="checkbox" class="Cover1"
                                                                onchange="handleCheckboxChange('Cover1',this)"
                                                                name="b_1" value="ok" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_1 == 'ok') id=""></td>
                                                        <td><input type="checkbox" class="Cover1"
                                                                onchange="handleCheckboxChange('Cover1',this)"
                                                                name="b_1" value="ng" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_1 == 'ng') id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kedudukan kulit buku/teks</td>
                                                        <td><input type="checkbox" class="Text1"
                                                                onchange="handleCheckboxChange('Text1',this)"
                                                                name="b_2" value="ok" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_2 == 'ok') id=""></td>
                                                        <td><input type="checkbox" class="Text1"
                                                                onchange="handleCheckboxChange('Text1',this)"
                                                                name="b_2" value="ng" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_2 == 'ng') id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Saiz yang betul</td>
                                                        <td><input type="checkbox" class="Cover2"
                                                                onchange="handleCheckboxChange('Cover2',this)"
                                                                name="b_3" value="ok" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_3 == 'ok') id=""></td>
                                                        <td><input type="checkbox" class="Cover2"
                                                                onchange="handleCheckboxChange('Cover2',this)"
                                                                name="b_3" value="ng" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_3 == 'ng') id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kulit buku yang betul</td>
                                                        <td><input type="checkbox" class="Text2"
                                                                onchange="handleCheckboxChange('Text2',this)"
                                                                name="b_4" value="ok" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_4 == 'ok') id=""></td>
                                                        <td><input type="checkbox" class="Text2"
                                                                onchange="handleCheckboxChange('Text2',this)"
                                                                name="b_4" value="ng" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_4 == 'ng') id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Teks yang betul</td>
                                                        <td><input type="checkbox" class="Cover3"
                                                                onchange="handleCheckboxChange('Cover3',this)"
                                                                name="b_5" value="ok" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_5 == 'ok') id=""></td>
                                                        <td><input type="checkbox" class="Cover3"
                                                                onchange="handleCheckboxChange('Cover3',this)"
                                                                name="b_5" value="ng" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_5 == 'ng') id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kedudukan potongan</td>
                                                        <td><input type="checkbox" class="Text3"
                                                                onchange="handleCheckboxChange('Text3',this)"
                                                                name="b_6" value="ok" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_6 == 'ok') id=""></td>
                                                        <td><input type="checkbox" class="Text3"
                                                                onchange="handleCheckboxChange('Text3',this)"
                                                                name="b_6" value="ng" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_6 == 'ng') id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Turutan muka surat</td>
                                                        <td><input type="checkbox" class="Cover4"
                                                                onchange="handleCheckboxChange('Cover4',this)"
                                                                name="b_7" value="ok" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_7 == 'ok') id=""></td>
                                                        <td><input type="checkbox" class="Cover4"
                                                                onchange="handleCheckboxChange('Cover4',this)"
                                                                name="b_7" value="ng" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_7 == 'ng') id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Koyak</td>
                                                        <td><input type="checkbox" class="Text4"
                                                                onchange="handleCheckboxChange('Text4',this)"
                                                                name="b_8" value="ok" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_8 == 'ok') id=""></td>
                                                        <td><input type="checkbox" class="Text4"
                                                                onchange="handleCheckboxChange('Text4',this)"
                                                                name="b_8" value="ng" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_8 == 'ng') id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Label yang betul</td>
                                                        <td><input type="checkbox" class="Cover5"
                                                                onchange="handleCheckboxChange('Cover5',this)"
                                                                name="b_9" value="ok" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_9 == 'ok') id=""></td>
                                                        <td><input type="checkbox" class="Cover5"
                                                                onchange="handleCheckboxChange('Cover5',this)"
                                                                name="b_9" value="ng" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_9 == 'ng') id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pematuhan SOP</td>
                                                        <td><input type="checkbox" class="Text5"
                                                                onchange="handleCheckboxChange('Text5',this)"
                                                                name="b_10" value="ok" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_10 == 'ok') id=""></td>
                                                        <td><input type="checkbox" class="Text5"
                                                                onchange="handleCheckboxChange('Text5',this)"
                                                                name="b_10" value="ng" @checked($laporan_pemeriksaan_kualiti_penjilidan_saddle->b_10 == 'ng') id="">
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><b>Nota :</b></h4>
                                    <div class="row">
                                        <div class="col-md-1"><div style="background:wheat; width:50px; height:20px;"></div></div>
                                        <div class="col-md-11" style="margin-left:-40px;">
                                            <span>Pemeriksaan hanya dilakukan sekali semasa pengesahan 1st piece dan tidak perlu dilakukan semasa proses</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary float-right">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('laporan_pemeriksaan_kualiti_penjilidan_saddle') }}">back to list</a>
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
                templateResult: function(data) {
                    if (data.loading) {
                        return "Loading...";
                    }

                    return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                },
                templateSelection: function(data) {
                    return data.text || null;
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
                    if(data.senari_semak != null){
                        $('#jumlah').val(data.senari_semak.item_cover_text);
                    }else{
                        $('#jumlah').val(0);
                    }
                }
            });
        });
    </script>
@endpush
