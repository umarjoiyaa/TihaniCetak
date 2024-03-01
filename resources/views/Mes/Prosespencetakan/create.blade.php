@extends('layouts.app')
@section('content')
    <form action="{{ route('proses_pencetakan.store') }}" method="POST">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="float-left">LAPORAN PEMERIKSAAN KUALITI (PROSES PENCETAKAN)</h5>
                                    <p class="float-right">TCSB-B23 (Rev.5)</p>
                                </div>
                            </div>
                            <div class="card" style="background:#f4f4ff;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label class="form-label">Tarikh</label>
                                                <input type="text" name="date" value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">

                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Masa</label>
                                            <input name="time" type="time" id="Currenttime"
                                            value="{{ Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('H:i') }}"
                                            class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label class="form-label">Diperiksa oleh</label>
                                                <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                                    name="" id="checked_by" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label class="form-label">Sales Order No.</label>
                                                <select name="sale_order" id="sale_order" class="form-control">
                                                    <option value="" selected disabled>Select any Sale Order</option>

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
                                                <label class="form-label">Kod Buku</label>
                                                <input type="text" value="" readonly name="" id="kod_buku"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Mesin</label>
                                                <select name="mesin" id="" class="form-control form-select">
                                                    <option value="P1" @selected(old('mesin') == 'P1')>P1</option>
                                                    <option value="P2" @selected(old('mesin') == 'P4')>P2</option>
                                                    <option value="P3" @selected(old('mesin') == 'P3')>P3</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Jenis</label>
                                                <select name="jenis" id="" class="form-control form-select">
                                                    <option value="Text" @selected(old('jenis') == 'Text')>Text</option>
                                                    <option value="Cover" @selected(old('jenis') == 'Cover')>Cover</option>
                                                    <option value="Leaflet" @selected(old('jenis') == 'Leaflet')>Leaflet</option>
                                                    <option value="Flyes" @selected(old('jenis') == 'Flyes')>Flyes</option>
                                                    <option value="Sticker" @selected(old('jenis') == 'Sticker')>Sticker</option>
                                                    <option value="EndPaper" @selected(old('jenis') == 'EndPaper')>EndPaper</option>
                                                    <option value="Bookmark" @selected(old('jenis') == 'Bookmark')>Bookmark</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Seksyen No.</label>
                                                <input type="text" value="" name="seksyen_no" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Side</label>
                                                <select name="side" id="" class="form-control form-select">
                                                    <option value="A" @selected(old('side') == 'A')>A</option>
                                                    <option value="B" @selected(old('side') == 'B')>B</option>
                                                    <option value="A/B" @selected(old('side') == 'A/B')>A/B</option>
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
                                                                name="b_1" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Cover1"
                                                                onchange="handleCheckboxChange('Cover1',this)"
                                                                name="b_1" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Cover1"
                                                                onchange="handleCheckboxChange('Cover1',this)"
                                                                name="b_1" value="na" id=""></td>

                                                    </tr>
                                                    <tr style="background:wheat;">
                                                        <td>Turutan muka surat</td>
                                                        <td><input type="checkbox" class="Text1"
                                                                onchange="handleCheckboxChange('Text1',this)"
                                                                name="b_2" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Text1"
                                                                onchange="handleCheckboxChange('Text1',this)"
                                                                name="b_2" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Text1"
                                                                onchange="handleCheckboxChange('Text1',this)"
                                                                name="b_2" value="na" id=""></td>

                                                    </tr>

                                                    <tr style="background:wheat;">
                                                        <td>Kedudukan muka surat </td>
                                                        <td><input type="checkbox" class="Cover2"
                                                                onchange="handleCheckboxChange('Cover2',this)"
                                                                name="b_3" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Cover2"
                                                                onchange="handleCheckboxChange('Cover2',this)"
                                                                name="b_3" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Cover2"
                                                                onchange="handleCheckboxChange('Cover2',this)"
                                                                name="b_3" value="na" id=""></td>

                                                    </tr>

                                                    <tr style="background:wheat;">
                                                        <td>Saiz Spine</td>
                                                        <td><input type="checkbox" class="Text2"
                                                                onchange="handleCheckboxChange('Text2',this)"
                                                                name="b_4" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Text2"
                                                                onchange="handleCheckboxChange('Text2',this)"
                                                                name="b_4" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Text2"
                                                                onchange="handleCheckboxChange('Text2',this)"
                                                                name="b_4" value="na" id=""></td>

                                                    </tr>

                                                    <tr style="background:wheat;">
                                                        <td>Kedudukan nombor muka surat</td>
                                                        <td><input type="checkbox" class="Cover3"
                                                                onchange="handleCheckboxChange('Cover3',this)"
                                                                name="b_5" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Cover3"
                                                                onchange="handleCheckboxChange('Cover3',this)"
                                                                name="b_5" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Cover3"
                                                                onchange="handleCheckboxChange('Cover3',this)"
                                                                name="b_5" value="na" id=""></td>

                                                    </tr>

                                                    <tr style="background:wheat;">
                                                        <td>Bleed (5mm)</td>
                                                        <td><input type="checkbox" class="Text3"
                                                                onchange="handleCheckboxChange('Text3',this)"
                                                                name="b_6" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Text3"
                                                                onchange="handleCheckboxChange('Text3',this)"
                                                                name="b_6" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Text3"
                                                                onchange="handleCheckboxChange('Text3',this)"
                                                                name="b_6" value="na" id=""></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Warna</td>
                                                        <td><input type="checkbox" class="Cover4"
                                                                onchange="handleCheckboxChange('Cover4',this)"
                                                                name="b_7" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Cover4"
                                                                onchange="handleCheckboxChange('Cover4',this)"
                                                                name="b_7" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Cover4"
                                                                onchange="handleCheckboxChange('Cover4',this)"
                                                                name="b_7" value="na" id=""></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Artwork</td>
                                                        <td><input type="checkbox" class="Text4"
                                                                onchange="handleCheckboxChange('Text4',this)"
                                                                name="b_8" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Text4"
                                                                onchange="handleCheckboxChange('Text4',this)"
                                                                name="b_8" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Text4"
                                                                onchange="handleCheckboxChange('Text4',this)"
                                                                name="b_8" value="na" id=""></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Kedudukan warna</td>
                                                        <td><input type="checkbox" class="Cover5"
                                                                onchange="handleCheckboxChange('Cover5',this)"
                                                                name="b_9" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Cover5"
                                                                onchange="handleCheckboxChange('Cover5',this)"
                                                                name="b_9" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Cover5"
                                                                onchange="handleCheckboxChange('Cover5',this)"
                                                                name="b_9" value="na" id=""></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Kedudukan cetakan</td>
                                                        <td><input type="checkbox" class="Text5"
                                                                onchange="handleCheckboxChange('Text5',this)"
                                                                name="b_10" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Text5"
                                                                onchange="handleCheckboxChange('Text5',this)"
                                                                name="b_10" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Text5"
                                                                onchange="handleCheckboxChange('Text5',this)"
                                                                name="b_10" value="na" id=""></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Periksa Powder</td>
                                                        <td><input type="checkbox" class="Cover6"
                                                                onchange="handleCheckboxChange('Cover6',this)"
                                                                name="b_11" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Cover6"
                                                                onchange="handleCheckboxChange('Cover6',this)"
                                                                name="b_11" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Cover6"
                                                                onchange="handleCheckboxChange('Cover6',this)"
                                                                name="b_11" value="na" id=""></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Minyak</td>
                                                        <td><input type="checkbox" class="Text6"
                                                                onchange="handleCheckboxChange('Text6',this)"
                                                                name="b_12" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Text6"
                                                                onchange="handleCheckboxChange('Text6',this)"
                                                                name="b_12" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Text6"
                                                                onchange="handleCheckboxChange('Text6',this)"
                                                                name="b_12" value="na" id=""></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Kotor</td>
                                                        <td><input type="checkbox" class="Cover7"
                                                                onchange="handleCheckboxChange('Cover7',this)"
                                                                name="b_13" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Cover7"
                                                                onchange="handleCheckboxChange('Cover7',this)"
                                                                name="b_13" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Cover7"
                                                                onchange="handleCheckboxChange('Cover7',this)"
                                                                name="b_13" value="na" id=""></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Doubling</td>
                                                        <td><input type="checkbox" class="Text7"
                                                                onchange="handleCheckboxChange('Text7',this)"
                                                                name="b_14" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Text7"
                                                                onchange="handleCheckboxChange('Text7',this)"
                                                                name="b_14" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Text7"
                                                                onchange="handleCheckboxChange('Text7',this)"
                                                                name="b_14" value="na" id=""></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Hickies</td>
                                                        <td><input type="checkbox" class="Cover8"
                                                                onchange="handleCheckboxChange('Cover8',this)"
                                                                name="b_15" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Cover8"
                                                                onchange="handleCheckboxChange('Cover8',this)"
                                                                name="b_15" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Cover8"
                                                                onchange="handleCheckboxChange('Cover8',this)"
                                                                name="b_15" value="na" id=""></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Frontlay & sidelay</td>
                                                        <td><input type="checkbox" class="Text8"
                                                                onchange="handleCheckboxChange('Text8',this)"
                                                                name="b_16" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Text8"
                                                                onchange="handleCheckboxChange('Text8',this)"
                                                                name="b_16" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Text8"
                                                                onchange="handleCheckboxChange('Text8',this)"
                                                                name="b_16" value="na" id=""></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Gambar / teks hilang</td>
                                                        <td><input type="checkbox" class="Cover9"
                                                                onchange="handleCheckboxChange('Cover9',this)"
                                                                name="b_17" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Cover9"
                                                                onchange="handleCheckboxChange('Cover9',this)"
                                                                name="b_17" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Cover9"
                                                                onchange="handleCheckboxChange('Cover9',this)"
                                                                name="b_17" value="na" id=""></td>

                                                    </tr>

                                                    <tr>
                                                        <td>Pematuhan SOP</td>
                                                        <td><input type="checkbox" class="Text9"
                                                                onchange="handleCheckboxChange('Text9',this)"
                                                                name="b_18" value="ok" id=""></td>
                                                        <td><input checked type="checkbox" class="Text9"
                                                                onchange="handleCheckboxChange('Text9',this)"
                                                                name="b_18" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Text9"
                                                                onchange="handleCheckboxChange('Text9',this)"
                                                                name="b_18" value="na" id=""></td>

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

                    return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                },
                templateSelection: function(data) {
                    return data.order_no || "Select Sales Order No";
                }
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
        });
    </script>
@endpush
