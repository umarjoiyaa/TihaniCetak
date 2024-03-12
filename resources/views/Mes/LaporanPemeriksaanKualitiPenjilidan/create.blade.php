@extends('layouts.app')
@section('content')
    <form action="{{ route('laporan_pemeriksaan_kualiti_penjilidan.store') }}" method="POST">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="float-left">LAPORAN PEMERIKSAAN KUALITI - PENJILIDAN PERFECT
                                        BIND</h5>
                                    <p class="float-right">TCSB-B23 (Rev.5)</p>
                                </div>
                            </div>
                            <div class="card" style="background:#f4f4ff;">
                                <div class="card-body">
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
                                                <div class="form-label">Checked By</div>
                                                <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                                    name="" id="checked_by" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-4">
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-label">Mesin</div>
                                                <input type="text" value="PB1" readonly name="mesin"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-label">Jumlah Seksyen</div>
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
                                                        <td style="background:wheat;">Koyakan fiber</td>
                                                        <td><input type="checkbox" class="Cover1"
                                                                onchange="handleCheckboxChange('Cover1',this)" @checked(old('b_1') == 'ok')
                                                                name="b_1" value="ok" id=""></td>
                                                        <td><input type="checkbox" class="Cover1"
                                                                onchange="handleCheckboxChange('Cover1',this)" @checked(old('b_1') == 'ng') @if(old('b_1')) @else checked @endif
                                                                name="b_1" value="ng" id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kedudukan Kulit buku dan teks</td>
                                                        <td><input type="checkbox" class="Text1"
                                                                onchange="handleCheckboxChange('Text1',this)" @checked(old('b_2') == 'ok')
                                                                name="b_2" value="ok" id=""></td>
                                                        <td><input type="checkbox" class="Text1"
                                                                onchange="handleCheckboxChange('Text1',this)" @checked(old('b_2') == 'ng') @if(old('b_2')) @else checked @endif
                                                                name="b_2" value="ng" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kulit buku yang betul</td>
                                                        <td><input type="checkbox" class="Cover2"
                                                                onchange="handleCheckboxChange('Cover2',this)" @checked(old('b_3') == 'ok')
                                                                name="b_3" value="ok" id=""></td>
                                                        <td><input type="checkbox" class="Cover3"
                                                                onchange="handleCheckboxChange('Cover2',this)" @checked(old('b_3') == 'ng') @if(old('b_3')) @else checked @endif
                                                                name="b_3" value="ng" id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Teks yang betul</td>
                                                        <td><input type="checkbox" class="Text2"
                                                                onchange="handleCheckboxChange('Text2',this)" @checked(old('b_4') == 'ok')
                                                                name="b_4" value="ok" id=""></td>
                                                        <td><input type="checkbox" class="Text2"
                                                                onchange="handleCheckboxChange('Text2',this)" @checked(old('b_4') == 'ng') @if(old('b_4')) @else checked @endif
                                                                name="b_4" value="ng" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kedudukan gam</td>
                                                        <td><input type="checkbox" class="Cover3"
                                                                onchange="handleCheckboxChange('Cover3',this)" @checked(old('b_5') == 'ok')
                                                                name="b_5" value="ok" id=""></td>
                                                        <td><input type="checkbox" class="Cover3"
                                                                onchange="handleCheckboxChange('Cover3',this)" @checked(old('b_5') == 'ng') @if(old('b_5')) @else checked @endif
                                                                name="b_5" value="ng" id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Turutan muka surat</td>
                                                        <td><input type="checkbox" class="Text3"
                                                                onchange="handleCheckboxChange('Text3',this)" @checked(old('b_6') == 'ok')
                                                                name="b_6" value="ok" id=""></td>
                                                        <td><input type="checkbox" class="Text3"
                                                                onchange="handleCheckboxChange('Text3',this)" @checked(old('b_6') == 'ng') @if(old('b_6')) @else checked @endif
                                                                name="b_6" value="ng" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Koyak</td>
                                                        <td><input type="checkbox" class="Cover4"
                                                                onchange="handleCheckboxChange('Cover4',this)" @checked(old('b_7') == 'ok')
                                                                name="b_7" value="ok" id=""></td>
                                                        <td><input type="checkbox" class="Cover4"
                                                                onchange="handleCheckboxChange('Cover4',this)" @checked(old('b_7') == 'ng') @if(old('b_7')) @else checked @endif
                                                                name="b_7" value="ng" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kotor</td>
                                                        <td><input type="checkbox" class="Text4"
                                                                onchange="handleCheckboxChange('Text4',this)" @checked(old('b_8') == 'ok')
                                                                name="b_8" value="ok" id=""></td>
                                                        <td><input type="checkbox" class="Text4"
                                                                onchange="handleCheckboxChange('Text4',this)" @checked(old('b_8') == 'ng') @if(old('b_8')) @else checked @endif
                                                                name="b_8" value="ng" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pematuhan SOP</td>
                                                        <td><input type="checkbox" class="Cover5"
                                                                onchange="handleCheckboxChange('Cover5',this)" @checked(old('b_9') == 'ok')
                                                                name="b_9" value="ok" id=""></td>
                                                        <td><input type="checkbox" class="Cover5"
                                                                onchange="handleCheckboxChange('Cover5',this)" @checked(old('b_9') == 'ng') @if(old('b_9')) @else checked @endif
                                                                name="b_9" value="ng" id="">
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
                </div>
                <a href="{{ route('laporan_pemeriksaan_kualiti_penjilidan') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
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
        });
    </script>
@endpush
