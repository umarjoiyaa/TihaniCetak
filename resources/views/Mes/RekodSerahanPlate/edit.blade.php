@extends('layouts.app')
@section('content')
    <form action="{{ route('rekod_serahan_plate.update', $rekod_serahan_plate->id) }}" method="POST">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="row">
                                <div class="col-md-12">
                                    <h5 class="float-left"><b>REKOD SERAHAN PLATE CETAK DAN SAMPLE</b></h5>
                                    <p class="float-right">TCSB-BO4(Rev.11)</p>
                                </div>
                            </div>

                            <div class="card" style="background:#f4f4ff;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="">Date</label>
                                                <input type="text"  name="date"  value="{{ \Carbon\Carbon::parse($rekod_serahan_plate->date)->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">


                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="">Disediakan Oleh (Unit CTP)</label>
                                            <input type="text" value="{{ Auth::user()->user_name }}" readonly
                                                id="" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="form-label">Diterima Oleh</div>
                                                @php
                                                    $item = json_decode($rekod_serahan_plate->user_id);
                                                @endphp
                                                <select name="user[]" class="form-control form-select" id=""
                                                    multiple>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}" @if ($item)
                                                            {{ in_array($user->id, $item) ? 'selected' : '' }} @endif>
                                                            {{ $user->user_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="form-label">Sales Order No.</div>
                                                <select name="sale_order"
                                                    data-id="{{ $rekod_serahan_plate->sale_order_id }}" id="sale_order"
                                                    class="form-control">
                                                    <option value="{{ $rekod_serahan_plate->sale_order_id }}" selected
                                                        style="color: black; !important">
                                                        {{ $rekod_serahan_plate->sale_order->order_no }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="form-label">Jenis</div>
                                                <select name="jenis" id="jenis" class="form-control form-select">
                                                    <option value="Cover" @selected($rekod_serahan_plate->jenis == 'Cover')>Cover</option>
                                                    <option value="Teks" @selected($rekod_serahan_plate->jenis == 'Teks')>Teks</option>
                                                    <option value="Other" @selected($rekod_serahan_plate->jenis == 'Other')>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 OtherSection mt-3" style="display: none" >
                                            <div class="form-label">Other (Input)</div>
                                            <input type="text" placeholder="User Input" value="{{ $rekod_serahan_plate->user_input }}" name="user_input" id=""
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="form-label">Mesin</div>
                                                <select name="mesin" class="form-control form-select" id="">
                                                    <option value="P1" @selected($rekod_serahan_plate->mesin == 'P1')>P1</option>
                                                    <option value="P2" @selected($rekod_serahan_plate->mesin == 'P2')>P2</option>
                                                    <option value="P3" @selected($rekod_serahan_plate->mesin == 'P3')>P3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="form-label">Seksyen No.</div>
                                                <input type="text" name="seksyen_no" id="" class="form-control"
                                                    value="{{ $rekod_serahan_plate->seksyen_no }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="form-label">Kuaniti Plate.</div>
                                                <input type="text" name="kuaniti_plate" id=""
                                                    class="form-control" value="{{ $rekod_serahan_plate->kuaniti_plate }}">
                                            </div>
                                        </div>


                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="">status Job</label>
                                                <input type="text" readonly id="status" name="status" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5" id="Status_tbl">
                                <h5>Diwajibkan untuk JOB BAHARU)</h5>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>item</th>
                                                <th>
                                                    <div class="text-center">OK</div>
                                                </th>
                                                <th>NG</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Dummy Lipat</td>
                                                <td><input type="checkbox" class="Cover1"
                                                onchange="handleCheckboxChange('Cover1',this)" @checked($rekod_serahan_plate->dummy_lipat == 'ok') name="dummy_lipat"
                                                        id="" value="ok">
                                                </td>
                                                <td><input type="checkbox" class="Cover1"
                                                onchange="handleCheckboxChange('Cover1',this)"  @checked($rekod_serahan_plate->dummy_lipat == 'ng') @if($rekod_serahan_plate->dummy_lipat == null) checked @endif name="dummy_lipat"
                                                        value="ng" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Sample</td>
                                                <td><input type="checkbox" class="Cover2"
                                                onchange="handleCheckboxChange('Cover2',this)" @checked($rekod_serahan_plate->sample == 'ok') name="sample"
                                                        id="" value="ok">
                                                </td>
                                                <td><input type="checkbox" class="Cover2"
                                                onchange="handleCheckboxChange('Cover2',this)" @checked($rekod_serahan_plate->sample == 'ng') @if($rekod_serahan_plate->sample == null) checked @endif name="sample"
                                                        id="" value="ng"></td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                <a href="{{ route('rekod_serahan_plate') }}"><i class="ti-arrow-left mx-2 mt-1"></i>back to list</a>
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
            var value = $('#jenis').val();
            if (value == "Other") {
                $('.OtherSection').css('display','')
            }else{
                $('.OtherSection').css('display','none')
            }

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

        $('#sale_order').on('change', function() {
            const id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{ route('sale_order.detail.get') }}',
                data: {
                    "id": id
                },
                success: function(data) {
                    $('#status').val(data.status);
                    if (data.status == "Repeat") {
                        $('#Status_tbl').css('display','none')
                    }else if (data.status == "New"){
                        $('#Status_tbl').css('display','')
                    }
                }
            });
        });
    </script>
@endpush
