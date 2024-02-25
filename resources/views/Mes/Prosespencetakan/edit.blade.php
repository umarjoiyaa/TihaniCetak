@extends('layouts.app')
@section('content')
    <form action="{{ route('proses_pencetakan.update', $proses_pencetakan->id) }}" method="POST">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="float-left">LAPORAN PEMERIKSAAN KUALITI (PROSES PENCETAKAN)</h5>
                                    <p class="float-right">TCSB-B24 (Rev.5)</p>
                                </div>
                            </div>
                            <div class="card" style="background:#f1f0f0;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="">Tarikh</label>
                                                <input type="text"  name="date" value="{{ \Carbon\Carbon::parse($proses_pencetakan->date)->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="">Masa</label>
                                            <input type="time" name="time" value="{{ $proses_pencetakan->time }}"
                                                id="Currenttime" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Diperiksa oleh</div>
                                                <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                                    name="" id="checked_by" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Sales Order No.</div>
                                                <select name="sale_order"
                                                    data-id="{{ $proses_pencetakan->sale_order_id }}" id="sale_order"
                                                    class="form-control">
                                                    <option value="{{ $proses_pencetakan->sale_order_id }}" selected
                                                        style="color: black; !important">
                                                        {{ $proses_pencetakan->sale_order->order_no }}
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
                                                <select name="mesin" id="" class="form-control form-select">
                                                    <option value="P1" @selected($proses_pencetakan->mesin == 'P1')>P1</option>
                                                    <option value="P2" @selected($proses_pencetakan->mesin == 'P4')>P2</option>
                                                    <option value="P3" @selected($proses_pencetakan->mesin == 'P3')>P3</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="label">Jenis</div>
                                                <select name="jenis" id="" class="form-control form-select">
                                                    <option value="Text" @selected($proses_pencetakan->jenis == 'Text')>Text</option>
                                                    <option value="Cover" @selected($proses_pencetakan->jenis == 'Cover')>Cover</option>
                                                    <option value="Leaflet" @selected($proses_pencetakan->jenis == 'Leaflet')>Leaflet</option>
                                                    <option value="Flyes" @selected($proses_pencetakan->jenis == 'Flyes')>Flyes</option>
                                                    <option value="Sticker" @selected($proses_pencetakan->jenis == 'Sticker')>Sticker</option>
                                                    <option value="EndPaper" @selected($proses_pencetakan->jenis == 'EndPaper')>EndPaper</option>
                                                    <option value="Bookmark" @selected($proses_pencetakan->jenis == 'Bookmark')>Bookmark</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="label">Seksyen No.</div>
                                                <input type="text" value="{{ $proses_pencetakan->seksyen_no }}"
                                                    name="seksyen_no" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label">Side</label>
                                                <select name="side" id="" class="form-control form-select">
                                                    <option value="A" @selected($proses_pencetakan->side == 'A')>A</option>
                                                    <option value="B" @selected($proses_pencetakan->side == 'B')>B</option>
                                                    <option value="A/B" @selected($proses_pencetakan->side == 'A/B')>A/B</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">


                                        <div class="col-md-5 mt-3">
                                            <table class="table" border="1">
                                                <thead>
                                                    <tr>
                                                        <td rowspan="2">Kriteria</td>
                                                        <td colspan="3">Tanda bagi yang berkenaan</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Ok</th>
                                                        <th>NG</th>
                                                        <th>NA</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr style="background:wheat;">
                                                        <td>Artwork</td>
                                                        <td><input type="checkbox" class="Cover1"
                                                                onchange="handleCheckboxChange('Cover1',this)"
                                                                name="b_1" value="ok" id="" @checked($proses_pencetakan->b_1 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Cover1"
                                                                onchange="handleCheckboxChange('Cover1',this)"
                                                                name="b_1" value="ng" id="" @checked($proses_pencetakan->b_1 == 'ng')></td>
                                                        <td><input type="checkbox" class="Cover1"
                                                                onchange="handleCheckboxChange('Cover1',this)"
                                                                name="b_1" value="na" id="" @checked($proses_pencetakan->b_1 == 'na')></td>

                                                    </tr>
                                                    <tr style="background:wheat;">
                                                        <td>Turutan muka surat</td>
                                                        <td><input type="checkbox" class="Text1"
                                                                onchange="handleCheckboxChange('Text1',this)"
                                                                name="b_2" value="ok" id="" @checked($proses_pencetakan->b_2 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Text1"
                                                                onchange="handleCheckboxChange('Text1',this)"
                                                                name="b_2" value="ng" id="" @checked($proses_pencetakan->b_2 == 'ng')></td>
                                                        <td><input type="checkbox" class="Text1"
                                                                onchange="handleCheckboxChange('Text1',this)"
                                                                name="b_2" value="na" id="" @checked($proses_pencetakan->b_2 == 'na')></td>

                                                    </tr>

                                                    <tr style="background:wheat;">
                                                        <td>Kedudukan muka surat </td>
                                                        <td><input type="checkbox" class="Cover2"
                                                                onchange="handleCheckboxChange('Cover2',this)"
                                                                name="b_3" value="ok" id="" @checked($proses_pencetakan->b_3 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Cover2"
                                                                onchange="handleCheckboxChange('Cover2',this)"
                                                                name="b_3" value="ng" id="" @checked($proses_pencetakan->b_3 == 'ng')></td>
                                                        <td><input type="checkbox" class="Cover2"
                                                                onchange="handleCheckboxChange('Cover2',this)"
                                                                name="b_3" value="na" id="" @checked($proses_pencetakan->b_3 == 'na')></td>

                                                    </tr>

                                                    <tr style="background:wheat;">
                                                        <td>Saiz Spine</td>
                                                        <td><input type="checkbox" class="Text2"
                                                                onchange="handleCheckboxChange('Text2',this)"
                                                                name="b_4" value="ok" id="" @checked($proses_pencetakan->b_4 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Text2"
                                                                onchange="handleCheckboxChange('Text2',this)"
                                                                name="b_4" value="ng" id="" @checked($proses_pencetakan->b_4 == 'ng')></td>
                                                        <td><input type="checkbox" class="Text2"
                                                                onchange="handleCheckboxChange('Text2',this)"
                                                                name="b_4" value="na" id="" @checked($proses_pencetakan->b_4 == 'na')></td>

                                                    </tr>

                                                    <tr style="background:wheat;">
                                                        <td>Kedudukan nombor muka surat</td>
                                                        <td><input type="checkbox" class="Cover3"
                                                                onchange="handleCheckboxChange('Cover3',this)"
                                                                name="b_5" value="ok" id="" @checked($proses_pencetakan->b_5 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Cover3"
                                                                onchange="handleCheckboxChange('Cover3',this)"
                                                                name="b_5" value="ng" id="" @checked($proses_pencetakan->b_5 == 'ng')></td>
                                                        <td><input type="checkbox" class="Cover3"
                                                                onchange="handleCheckboxChange('Cover3',this)"
                                                                name="b_5" value="na" id="" @checked($proses_pencetakan->b_5 == 'na')></td>

                                                    </tr>

                                                    <tr style="background:wheat;">
                                                        <td>Bleed (5mm)</td>
                                                        <td><input type="checkbox" class="Text3"
                                                                onchange="handleCheckboxChange('Text3',this)"
                                                                name="b_6" value="ok" id="" @checked($proses_pencetakan->b_6 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Text3"
                                                                onchange="handleCheckboxChange('Text3',this)"
                                                                name="b_6" value="ng" id="" @checked($proses_pencetakan->b_6 == 'ng')></td>
                                                        <td><input type="checkbox" class="Text3"
                                                                onchange="handleCheckboxChange('Text3',this)"
                                                                name="b_6" value="na" id="" @checked($proses_pencetakan->b_6 == 'na')></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Warna</td>
                                                        <td><input type="checkbox" class="Cover4"
                                                                onchange="handleCheckboxChange('Cover4',this)"
                                                                name="b_7" value="ok" id="" @checked($proses_pencetakan->b_7 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Cover4"
                                                                onchange="handleCheckboxChange('Cover4',this)"
                                                                name="b_7" value="ng" id="" @checked($proses_pencetakan->b_7 == 'ng')></td>
                                                        <td><input type="checkbox" class="Cover4"
                                                                onchange="handleCheckboxChange('Cover4',this)"
                                                                name="b_7" value="na" id="" @checked($proses_pencetakan->b_7 == 'na')></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Artwork</td>
                                                        <td><input type="checkbox" class="Text4"
                                                                onchange="handleCheckboxChange('Text4',this)"
                                                                name="b_8" value="ok" id="" @checked($proses_pencetakan->b_8 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Text4"
                                                                onchange="handleCheckboxChange('Text4',this)"
                                                                name="b_8" value="ng" id="" @checked($proses_pencetakan->b_8 == 'ng')></td>
                                                        <td><input type="checkbox" class="Text4"
                                                                onchange="handleCheckboxChange('Text4',this)"
                                                                name="b_8" value="na" id="" @checked($proses_pencetakan->b_8 == 'na')></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Kedudukan warna</td>
                                                        <td><input type="checkbox" class="Cover5"
                                                                onchange="handleCheckboxChange('Cover5',this)"
                                                                name="b_9" value="ok" id="" @checked($proses_pencetakan->b_9 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Cover5"
                                                                onchange="handleCheckboxChange('Cover5',this)"
                                                                name="b_9" value="ng" id="" @checked($proses_pencetakan->b_9 == 'ng')></td>
                                                        <td><input type="checkbox" class="Cover5"
                                                                onchange="handleCheckboxChange('Cover5',this)"
                                                                name="b_9" value="na" id="" @checked($proses_pencetakan->b_9 == 'na')></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Kedudukan cetakan</td>
                                                        <td><input type="checkbox" class="Text5"
                                                                onchange="handleCheckboxChange('Text5',this)"
                                                                name="b_10" value="ok" id="" @checked($proses_pencetakan->b_10 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Text5"
                                                                onchange="handleCheckboxChange('Text5',this)"
                                                                name="b_10" value="ng" id="" @checked($proses_pencetakan->b_10 == 'ng')></td>
                                                        <td><input type="checkbox" class="Text5"
                                                                onchange="handleCheckboxChange('Text5',this)"
                                                                name="b_10" value="na" id="" @checked($proses_pencetakan->b_10 == 'na')></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Periksa Powder</td>
                                                        <td><input type="checkbox" class="Cover6"
                                                                onchange="handleCheckboxChange('Cover6',this)"
                                                                name="b_11" value="ok" id="" @checked($proses_pencetakan->b_11 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Cover6"
                                                                onchange="handleCheckboxChange('Cover6',this)"
                                                                name="b_11" value="ng" id="" @checked($proses_pencetakan->b_11 == 'ng')></td>
                                                        <td><input type="checkbox" class="Cover6"
                                                                onchange="handleCheckboxChange('Cover6',this)"
                                                                name="b_11" value="na" id="" @checked($proses_pencetakan->b_11 == 'na')></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Minyak</td>
                                                        <td><input type="checkbox" class="Text6"
                                                                onchange="handleCheckboxChange('Text6',this)"
                                                                name="b_12" value="ok" id="" @checked($proses_pencetakan->b_12 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Text6"
                                                                onchange="handleCheckboxChange('Text6',this)"
                                                                name="b_12" value="ng" id="" @checked($proses_pencetakan->b_12 == 'ng')></td>
                                                        <td><input type="checkbox" class="Text6"
                                                                onchange="handleCheckboxChange('Text6',this)"
                                                                name="b_12" value="na" id="" @checked($proses_pencetakan->b_12 == 'na')></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Kotor</td>
                                                        <td><input type="checkbox" class="Cover7"
                                                                onchange="handleCheckboxChange('Cover7',this)"
                                                                name="b_13" value="ok" id="" @checked($proses_pencetakan->b_13 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Cover7"
                                                                onchange="handleCheckboxChange('Cover7',this)"
                                                                name="b_13" value="ng" id="" @checked($proses_pencetakan->b_13 == 'ng')></td>
                                                        <td><input type="checkbox" class="Cover7"
                                                                onchange="handleCheckboxChange('Cover7',this)"
                                                                name="b_13" value="na" id="" @checked($proses_pencetakan->b_13 == 'na')></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Doubling</td>
                                                        <td><input type="checkbox" class="Text7"
                                                                onchange="handleCheckboxChange('Text7',this)"
                                                                name="b_14" value="ok" id="" @checked($proses_pencetakan->b_14 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Text7"
                                                                onchange="handleCheckboxChange('Text7',this)"
                                                                name="b_14" value="ng" id="" @checked($proses_pencetakan->b_14 == 'ng')></td>
                                                        <td><input type="checkbox" class="Text7"
                                                                onchange="handleCheckboxChange('Text7',this)"
                                                                name="b_14" value="na" id="" @checked($proses_pencetakan->b_14 == 'na')></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Hickies</td>
                                                        <td><input type="checkbox" class="Cover8"
                                                                onchange="handleCheckboxChange('Cover8',this)"
                                                                name="b_15" value="ok" id="" @checked($proses_pencetakan->b_15 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Cover8"
                                                                onchange="handleCheckboxChange('Cover8',this)"
                                                                name="b_15" value="ng" id="" @checked($proses_pencetakan->b_15 == 'ng')></td>
                                                        <td><input type="checkbox" class="Cover8"
                                                                onchange="handleCheckboxChange('Cover8',this)"
                                                                name="b_15" value="na" id="" @checked($proses_pencetakan->b_15 == 'na')></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Frontlay & sidelay</td>
                                                        <td><input type="checkbox" class="Text8"
                                                                onchange="handleCheckboxChange('Text8',this)"
                                                                name="b_16" value="ok" id="" @checked($proses_pencetakan->b_16 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Text8"
                                                                onchange="handleCheckboxChange('Text8',this)"
                                                                name="b_16" value="ng" id="" @checked($proses_pencetakan->b_16 == 'ng')></td>
                                                        <td><input type="checkbox" class="Text8"
                                                                onchange="handleCheckboxChange('Text8',this)"
                                                                name="b_16" value="na" id="" @checked($proses_pencetakan->b_16 == 'na')></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Gambar / teks hilang</td>
                                                        <td><input type="checkbox" class="Cover9"
                                                                onchange="handleCheckboxChange('Cover9',this)"
                                                                name="b_17" value="ok" id="" @checked($proses_pencetakan->b_17 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Cover9"
                                                                onchange="handleCheckboxChange('Cover9',this)"
                                                                name="b_17" value="ng" id="" @checked($proses_pencetakan->b_17 == 'ng')></td>
                                                        <td><input type="checkbox" class="Cover9"
                                                                onchange="handleCheckboxChange('Cover9',this)"
                                                                name="b_17" value="na" id="" @checked($proses_pencetakan->b_17 == 'na')></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Pematuhan SOP</td>
                                                        <td><input type="checkbox" class="Text9"
                                                                onchange="handleCheckboxChange('Text9',this)"
                                                                name="b_18" value="ok" id="" @checked($proses_pencetakan->b_18 == 'ok')></td>
                                                        <td><input  type="checkbox" class="Text9"
                                                                onchange="handleCheckboxChange('Text9',this)"
                                                                name="b_18" value="ng" id="" @checked($proses_pencetakan->b_18 == 'ng')></td>
                                                        <td><input type="checkbox" class="Text9"
                                                                onchange="handleCheckboxChange('Text9',this)"
                                                                name="b_18" value="na" id="" @checked($proses_pencetakan->b_18 == 'na')></td>

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
                                        <div class="col-md-11" style="margin-left:-20px;">
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
                </div>
                <a href="{{ route('proses_pencetakan') }}">back to list</a>
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
                }
            });
        });
    </script>
@endpush
