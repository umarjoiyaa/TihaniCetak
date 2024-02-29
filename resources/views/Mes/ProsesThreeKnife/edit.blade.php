@extends('layouts.app')

@section('content')
<form action="{{ route('proses_three_knife.update',$proses_three_knife->id) }}" method="POST">
    @csrf
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
                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="text"  name="date"  value="{{ \Carbon\Carbon::parse($proses_three_knife->date)->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">                                    </div>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        @php
                                                $timeIn24HourFormat = Carbon\Carbon::createFromFormat('h:i A', $proses_three_knife->time)->format('H:i');
                                            @endphp
                                            <label class="label">Time</label>
                                            <input name="time" type="time" id="Currenttime"
                                                value="{{$timeIn24HourFormat}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <label class="label">Checked By</label>
                                        <input type="text" value="{{ Auth::user()->user_name }}" readonly
                                        class="form-control" name="" id="">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Sales Order No</div>
                                        <select name="sale_order" data-id="{{ $proses_three_knife->sale_order_id }}"
                                            id="sale_order" class="form-control">
                                            <option value="{{ $proses_three_knife->sale_order_id }}" selected
                                                style="color: black; !important">
                                                {{ $proses_three_knife->sale_order->order_no }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text" value="auto Display" readonly name="" id="tajuk"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" readonly value="auto Display" name="" id="kod_buku"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Mesin</div>
                                        <input type="text" value="TK1" readonly name="machine"  class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <label for="">Saiz Buku</label>
                                        <input type="text" readonly value="auto Display (based SO)" name="" id="size"
                                            class="form-control">
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
                                                    <td><input type="checkbox"  name="b_1" class="b_1" onchange="handleCheckboxChange('b_1',this)" value="ok"  @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                    <td><input type="checkbox" name="b_1" class="b_1" onchange="handleCheckboxChange('b_1',this)"  value="ng"  @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Kedudukan potongan</td>
                                                    <td><input type="checkbox"  name="b_2" class="b_2" onchange="handleCheckboxChange('b_2',this)" value="ok" @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                    <td><input type="checkbox" name="b_2" class="b_2" onchange="handleCheckboxChange('b_2',this)" value="ng" @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>teks tidak terpotong</td>
                                                    <td><input type="checkbox"  name="b_3" class="b_3" onchange="handleCheckboxChange('b_3',this)" value="ok" @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                    <td><input type="checkbox" name="b_3" class="b_3" onchange="handleCheckboxChange('b_3',this)" value="ng" @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Kepetekan / squareness</td>
                                                    <td><input type="checkbox"  name="b_4" class="b_4" onchange="handleCheckboxChange('b_4',this)" value="ok" @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                    <td><input type="checkbox" name="b_4" class="b_4" onchange="handleCheckboxChange('b_4',this)" value="ng" @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Potongan yang bersih</td>
                                                    <td><input type="checkbox"  name="b_5" class="b_5" onchange="handleCheckboxChange('b_5',this)" value="ok" @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                    <td><input type="checkbox" name="b_5" class="b_5" onchange="handleCheckboxChange('b_5',this)" value="ng" @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Turutan muka surat</td>
                                                    <td><input type="checkbox"  name="b_6" class="b_6" onchange="handleCheckboxChange('b_6',this)" value="ok" @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                    <td><input type="checkbox" name="b_6" class="b_6" onchange="handleCheckboxChange('b_6',this)" value="ng" @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Kotor</td>
                                                    <td><input type="checkbox"  name="b_7" class="b_7" onchange="handleCheckboxChange('b_7',this)" value="ok" @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                    <td><input type="checkbox" name="b_7" class="b_7" onchange="handleCheckboxChange('b_7',this)" value="ng" @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Koyak</td>
                                                    <td><input type="checkbox"  name="b_8" class="b_8" onchange="handleCheckboxChange('b_8',this)" value="ok" @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                    <td><input type="checkbox" name="b_8" class="b_8" onchange="handleCheckboxChange('b_8',this)" value="ng" @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Melekat</td>
                                                    <td><input type="checkbox"  name="b_9" class="b_9" onchange="handleCheckboxChange('b_9',this)" value="ok" @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                    <td><input type="checkbox" name="b_9" class="b_9" onchange="handleCheckboxChange('b_9',this)" value="ng" @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                                </tr>

                                                <tr>
                                                    <td>Calar</td>
                                                    <td><input type="checkbox"  name="b_10" class="b_10" onchange="handleCheckboxChange('b_10',this)" value="ok" @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                    <td><input type="checkbox" name="b_10" class="b_10" onchange="handleCheckboxChange('b_10',this)" value="ng" @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                                </tr>

                                                <tr>
                                                    <td>Kemik</td>
                                                    <td><input type="checkbox"  name="b_11" class="b_11" onchange="handleCheckboxChange('b_11',this)" value="ok" @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                    <td><input type="checkbox" name="b_11" class="b_11" onchange="handleCheckboxChange('b_11',this)" value="ng" @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                                </tr>

                                                <tr>
                                                    <td>Label yang betul</td>
                                                    <td><input type="checkbox"  name="b_12" class="b_12" onchange="handleCheckboxChange('b_12',this)" value="ok" @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                    <td><input type="checkbox" name="b_12" class="b_12" onchange="handleCheckboxChange('b_12',this)" value="ng" @checked($proses_three_knife->b_1 == "ng") id=""></td>
                                                </tr>

                                                <tr>
                                                    <td>Pematuhan SOP</td>
                                                    <td><input type="checkbox"  name="b_13" class="b_13" onchange="handleCheckboxChange('b_13',this)" value="ok" @checked($proses_three_knife->b_1 == "ok") id=""></td>
                                                    <td><input type="checkbox" name="b_13" class="b_13" onchange="handleCheckboxChange('b_13',this)" value="ng" @checked($proses_three_knife->b_1 == "ng") id=""></td>
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
                                        <div class="col-md-1"><div style="background:wheat; width:50px; height:20px;"></div></div>
                                        <div class="col-md-11" style="margin-left:-40px;">
                                            <span>Pemeriksaan hanya dilakukan sekali semasa pengesahan 1st piece dan tidak perlu dilakukan semasa proses</span>
                                        </div>
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
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('proses_three_knife')}}"><i class="ti-angle-left mr-5 $indigo-100"></i>
                    back to list</a>
            </div>
        </div>
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
                $('#size').val(data.size);

            }
        });
    });
</script>
@endpush
