@extends('layouts.app')

@section('content')
    <form action="{{ route('borange_serah_kerja_teks.update', $borange_serah_kerja_teks->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="float-left"><b>BORANG SERAH KERJA (TEKS)- View</b></h5>
                                <p class="float-right">TCBS-B34 (Rev. 2)</p>
                            </div>
                        </div>


                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Tarikh</label>
                                            <input type="text" name="date"
                                                value="{{ $borange_serah_kerja_teks->date }}" class="form-control"
                                                id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Po No</label>
                                        <input type="text" name="po_no" id=""
                                            value="{{ $borange_serah_kerja_teks->po_no }}" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="label">Disediakan Oleh</label>
                                            <input type="text" readonly name=""
                                                value="{{ $borange_serah_kerja_teks->user->full_name }}" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label"> Sales Order No </div>
                                            <input type="text" class="form-control" value="{{ $borange_serah_kerja_teks->sale_order->order_no }}">

                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Tajuk</div>
                                            <input type="text" readonly class="form-control" id="tajuk" value="{{ $borange_serah_kerja_teks->sale_order->description }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Nama Subkontraktor</div>
                                            <input type="text" readonly name=""
                                            value="{{ $borange_serah_kerja_teks->supplier->name }}"
                                            class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Jumlah Seksyen </div>
                                            <input type="number" value="{{ $borange_serah_kerja_teks->jumlah }}" name="jumlah" class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Jenis</div>
                                            @php
                                                $item = json_decode($borange_serah_kerja_teks->jenis);
                                            @endphp
                                            <select name="jenis[]" id="jenis" class="form-control form-select" multiple>
                                                <!-- <option value="">pilih Jenis</option> -->
                                                <option value="Cover"
                                                    @if ($item) {{ in_array('Cover', $item) ? 'selected' : '' }} @endif>
                                                    Cover</option>
                                                <option value="End Paper"
                                                    @if ($item) {{ in_array('End Paper', $item) ? 'selected' : '' }} @endif>
                                                    End Paper</option>
                                                <option value="Teks"
                                                    @if ($item) {{ in_array('Teks', $item) ? 'selected' : '' }} @endif>
                                                    Teks</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><b>Binding</b></h5>
                                    </div>
                                </div>
                                <div class="row mt-">
                                    <div class="col-md-4">
                                        <label for="">Kuantiti Slap Binding</label>
                                        <input type="text" name="Qty_slap_binding"
                                            value="{{ $borange_serah_kerja_teks->Qty_slap_binding }}" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Waste Binding</label>
                                        <input type="text" name="waste_binding"
                                            value="{{ $borange_serah_kerja_teks->waste_binding }}" id=""
                                            class="form-control">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <h5><b>Jenis Binding</b></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_1"
                                                    @checked($borange_serah_kerja_teks->jenis_1 == 'on') id=""></div>
                                            <div class="col-md-6">
                                                <h5>Thread Sewn</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_2"
                                                    @checked($borange_serah_kerja_teks->jenis_2 == 'on') id=""></div>
                                            <div class="col-md-6">
                                                <h5>Round Back</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_3"
                                                    @checked($borange_serah_kerja_teks->jenis_3 == 'on') id=""></div>
                                            <div class="col-md-6">
                                                <h5>Square Back</h5>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_4"
                                                    @checked($borange_serah_kerja_teks->jenis_4 == 'on') id=""></div>
                                            <div class="col-md-6">
                                                <h5>Wire O</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_5"
                                                    @checked($borange_serah_kerja_teks->jenis_5 == 'on') id="Other"></div>
                                            <div class="col-md-6">

                                                <div class="row">
                                                    <div class="col-md2">
                                                        <h5  style="margin-left:10px;">Others</h5>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="input" style="width:150px;">
                                                            @if ($borange_serah_kerja_teks->jenis_5 == 'on')
                                                                <input type="text" name="jenis_input_5"
                                                                    value="{{ $borange_serah_kerja_teks->jenis_input_5 }}"
                                                                    class="form-control Others">
                                                            @else
                                                            <input type="text" name="jenis_input_5"
                                                            class="form-control Others" style="display:none;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_17"
                                                    @checked($borange_serah_kerja_teks->jenis_17 == 'on') id="Other17"></div>
                                            <div class="col-md-6">

                                                <div class="row">
                                                    <div class="col-md2">
                                                        <h5  style="margin-left:10px;">Others</h5>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="input" style="width:150px;">
                                                            @if ($borange_serah_kerja_teks->jenis_17 == 'on')
                                                                <input type="text" name="jenis_input_17"
                                                                    value="{{ $borange_serah_kerja_teks->jenis_input_17 }}"
                                                                    class="form-control Others17">
                                                            @else
                                                            <input type="text" name="jenis_input_17"
                                                            class="form-control Others17" style="display:none;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4 ">


                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_7"
                                                    @checked($borange_serah_kerja_teks->jenis_7 == 'on') id=""></div>
                                            <div class="col-md-6">
                                                <h5>Lock Bind</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_8"
                                                    @checked($borange_serah_kerja_teks->jenis_8 == 'on') id=""></div>
                                            <div class="col-md-6">
                                                <h5>Staple Bind</h5>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_9"
                                                    @checked($borange_serah_kerja_teks->jenis_9 == 'on') id=""></div>
                                            <div class="col-md-6">
                                                <h5>Head & tail Band</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_10"
                                                    @checked($borange_serah_kerja_teks->jenis_10 == 'on') id="Ribbon"></div>
                                            <div class="col-md-6">
                                                <div class="row d-flex">
                                                        <h5 class="ml-2">Ribbon </h5>
                                                        <div class="boxinput mx-1" style="width:100px;">
                                                            @if ($borange_serah_kerja_teks->jenis_10 == 'on')
                                                                <input type="text" name="jenis_input_10"
                                                                    value="{{ $borange_serah_kerja_teks->jenis_input_10 }}"
                                                                    class="form-control ribbon">
                                                            @else
                                                            <input style="display: none" type="text" name="jenis_input_10"
                                                            class="form-control ribbon">
                                                            @endif
                                                    </div>

                                                        <div id="labelContainer1">
                                                            @if ($borange_serah_kerja_teks->jenis_10 == 'on')
                                                                <label class="ribbon">pcs</label>
                                                            @else
                                                            <label class="ribbon" style="display: none">pcs</label>
                                                            @endif
                                                        </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_18"
                                                    @checked($borange_serah_kerja_teks->jenis_18 == 'on') id="Other18"></div>
                                            <div class="col-md-6">

                                                <div class="row">
                                                    <div class="col-md2">
                                                        <h5  style="margin-left:10px;">Others</h5>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="input" style="width:150px;">
                                                            @if ($borange_serah_kerja_teks->jenis_18 == 'on')
                                                                <input type="text" name="jenis_input_18"
                                                                    value="{{ $borange_serah_kerja_teks->jenis_input_18 }}"
                                                                    class="form-control Others18">
                                                            @else
                                                            <input type="text" name="jenis_input_18"
                                                            class="form-control Others18" style="display:none;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_20"
                                                    @checked($borange_serah_kerja_teks->jenis_20 == 'on') id="Other20"></div>
                                            <div class="col-md-6">

                                                <div class="row">
                                                    <div class="col-md2">
                                                        <h5  style="margin-left:10px;">Others</h5>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="input" style="width:150px;">
                                                            @if ($borange_serah_kerja_teks->jenis_20 == 'on')
                                                                <input type="text" name="jenis_input_20"
                                                                    value="{{ $borange_serah_kerja_teks->jenis_input_20 }}"
                                                                    class="form-control Others20">
                                                            @else
                                                            <input type="text" name="jenis_input_20"
                                                            class="form-control Others20" style="display:none;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-5 ">
                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_11"
                                                    @checked($borange_serah_kerja_teks->jenis_11 == 'on') id=""></div>
                                            <div class="col-md-6">
                                                <h5>Perfect Bind</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_12"
                                                    @checked($borange_serah_kerja_teks->jenis_12 == 'on') id=""></div>
                                            <div class="col-md-6">
                                                <h5>Soft cover</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_13"
                                                    @checked($borange_serah_kerja_teks->jenis_13 == 'on') id=""></div>
                                            <div class="col-md-6">
                                                <h5>Hard Cover</h5>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_14"
                                                    @checked($borange_serah_kerja_teks->jenis_14 == 'on') id="Chipboard"></div>
                                            <div class="col-md-6">
                                                <div class="row d-flex">
                                                        <h5 class="ml-2">Chipboard</h5>
                                                        <div id="chipinput1" class="mx-1" style="width:100px;">
                                                            @if ($borange_serah_kerja_teks->jenis_14 == 'on')
                                                                <input type="text" name="jenis_input_14"
                                                                    value="{{ $borange_serah_kerja_teks->jenis_input_14 }}"
                                                                    class="form-control Chipboard">
                                                            @else
                                                            <input type="text" name="jenis_input_14"

                                                                    class="form-control Chipboard" style="display: none;">
                                                            @endif
                                                        </div>
                                                    <div  id="labelContainer">
                                                        @if ($borange_serah_kerja_teks->jenis_14 == 'on')
                                                            <label class="Chipboard">gsm</label>
                                                         @else
                                                         <label class="Chipboard" style="display: none;">gsm</label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_19"
                                                    @checked($borange_serah_kerja_teks->jenis_19 == 'on') id="Other19"></div>
                                            <div class="col-md-6">

                                                <div class="row">
                                                    <div class="col-md2">
                                                        <h5  style="margin-left:10px;">Others</h5>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="input" style="width:150px;">
                                                            @if ($borange_serah_kerja_teks->jenis_19 == 'on')
                                                                <input type="text" name="jenis_input_19"
                                                                    value="{{ $borange_serah_kerja_teks->jenis_input_19 }}"
                                                                    class="form-control Others19">
                                                            @else
                                                            <input type="text" name="jenis_input_19"
                                                            class="form-control Others19" style="display:none;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_21"
                                                    @checked($borange_serah_kerja_teks->jenis_21 == 'on') id="Other21"></div>
                                            <div class="col-md-6">

                                                <div class="row">
                                                    <div class="col-md2">
                                                        <h5  style="margin-left:10px;">Others</h5>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="input" style="width:150px;">
                                                            @if ($borange_serah_kerja_teks->jenis_21 == 'on')
                                                                <input type="text" name="jenis_input_21"
                                                                    value="{{ $borange_serah_kerja_teks->jenis_input_21 }}"
                                                                    class="form-control Others21">
                                                            @else
                                                            <input type="text" name="jenis_input_21"
                                                            class="form-control Others21" style="display:none;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <h4>Sample</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_15"
                                                    @checked($borange_serah_kerja_teks->jenis_15 == 'on') id=""></div>
                                            <div class="col-md-6">
                                                <h5>Buku</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_16"
                                                    @checked($borange_serah_kerja_teks->jenis_16 == 'on') id=""></div>
                                            <div class="col-md-6">
                                                <h5>Lipat</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <label for="0">Dateline</label>
                                        <input type="text" name="date_line"
                                            value="{{ $borange_serah_kerja_teks->date_line }}"
                                            class="form-control datepicker" id="datepicker1" pattern="\d{2}-\d{2}-\d{4}"
                                            placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <h3><b>Purchased By</b></h3>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Username</th>
                                                    <th>Desgination</th>
                                                    <th>Department</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $borange_serah_kerja_teks->purchased_by_date }}
                                                    </td>
                                                    <td>{{ $borange_serah_kerja_teks->purchased_by_user }}
                                                    </td>
                                                    <td>{{ $borange_serah_kerja_teks->purchased_by_designation }}
                                                    </td>
                                                    <td>{{ $borange_serah_kerja_teks->purchased_by_department }}
                                                    </td>
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
                                    <div class="col-md-12">
                                        <h3><b>Transfer By</b></h3>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Username</th>
                                                    <th>Desgination</th>
                                                    <th>Department</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $borange_serah_kerja_teks->transfer_by_date }}
                                                    </td>
                                                    <td>{{ $borange_serah_kerja_teks->transfer_by_user }}
                                                    </td>
                                                    <td>{{ $borange_serah_kerja_teks->transfer_by_designation }}
                                                    </td>
                                                    <td>{{ $borange_serah_kerja_teks->transfer_by_department }}
                                                    </td>
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
                                    <div class="col-md-12">
                                        <h3><b>Received By</b></h3>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Username</th>
                                                    <th>Desgination</th>
                                                    <th>Department</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $borange_serah_kerja_teks->received_by_date }}
                                                    </td>
                                                    <td>{{ $borange_serah_kerja_teks->received_by_user }}
                                                    </td>
                                                    <td>{{ $borange_serah_kerja_teks->received_by_designation }}
                                                    </td>
                                                    <td>{{ $borange_serah_kerja_teks->received_by_department }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center" style="font-size:20px; color:black; dispaly:inline-block;">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <h5 style="font-size:20px;"><b>PERINGATAN :</b> <br>
                                                    <span style="color:black; font-size:14px;">
                                                        <b>SERAHKAN SAMPLE KEPADA QC/EKSEKUTIF QA/PENGURUS OPERASI/PENYELIA
                                                            OPERASI UNTUK PENGESAHAN SEBELUM MEMULAKAN PROSES LIPAT</b>
                                                    </span>
                                                </h5>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div> -->
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button class="btn btn-primary mx-2 mt-3">Save</button>
                            </div>
                        </div>
                    </div>


                </div>
                <a href="{{ route('borange_serah_kerja_teks') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
            </div>
        </div>


    </form>
@endsection
@push('custom-scripts')
    <script>
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

                    return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                },
                templateSelection: function(data) {
                    return data.text || null;
                }
            });

            $("#Other").on('change',function(){
                if($(this).prop('checked')){
                    $('.Others').css('display','')
                }else{
                    $('.Others').css('display','none')
                }
            })

            $("#Ribbon").on('change',function(){
                if($(this).prop('checked')){
                    $('.ribbon').css('display','')
                }else{
                    $('.ribbon').css('display','none');
                }
            })

            $("#Chipboard").on('change',function(){
                if($(this).prop('checked')){
                    $('.Chipboard').css('display','')
                }else{
                    $('.Chipboard').css('display','none')
                }
            })


            $("#Other17").on('change',function(){
                if($(this).prop('checked')){
                    $('.Others17').css('display','')
                }else{
                    $('.Others17').css('display','none')
                }
            })

            $("#Other18").on('change',function(){
                if($(this).prop('checked')){
                    $('.Others18').css('display','')
                }else{
                    $('.Others18').css('display','none')
                }
            })

            $("#Other19").on('change',function(){
                if($(this).prop('checked')){
                    $('.Others19').css('display','')
                }else{
                    $('.Others19').css('display','none')
                }
            })

            $("#Other20").on('change',function(){
                if($(this).prop('checked')){
                    $('.Others20').css('display','')
                }else{
                    $('.Others20').css('display','none')
                }
            })

            $("#Other21").on('change',function(){
                if($(this).prop('checked')){
                    $('.Others21').css('display','')
                }else{
                    $('.Others21').css('display','none')
                }
            })

            $('input,select').attr('disabled', 'disabled');


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
                    $('#tajuk').val(data.sale_order.description);
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
