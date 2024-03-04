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
                                <h5 class="float-left"><b>BORANG SERAH KERJA (TEKS)- Create</b></h5>
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
                                                value="{{ Auth::user()->full_name }}" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label"> Sales Order No </div>
                                            <select name="sale_order"
                                                data-id="{{ $borange_serah_kerja_teks->sale_order_id }}" id="sale_order"
                                                class="form-control">
                                                <option value="{{ $borange_serah_kerja_teks->sale_order_id }}" selected
                                                    style="color: black; !important">
                                                    {{ $borange_serah_kerja_teks->sale_order->order_no }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Tajuk</div>
                                            <input type="text" readonly class="form-control" id="tajuk">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Nama Subkontraktor</div>
                                            <select name="nama" id="nama" class="form-control form-select">
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}" @selected($borange_serah_kerja_teks->nama == $supplier->id)>
                                                        {{ $supplier->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Jumlah Seksyen </div>
                                            <input type="text" readonly name="" id="jumlah"
                                                class="form-control">
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
                                                        <h5 style="padding-left:px;">Others</h5>
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
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_6"
                                                    @checked($borange_serah_kerja_teks->jenis_6 == 'on') id=""></div>
                                            <div class="col-md-6">
                                                <h5>Gloss Lamination</h5>
                                            </div>

                                        </div>

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
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p style="font-size:13px; font-weight:600;">Ribbon </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="boxinput" style="width:100px;">
                                                            @if ($borange_serah_kerja_teks->jenis_10 == 'on')
                                                                <input type="text" name="jenis_input_10"
                                                                    value="{{ $borange_serah_kerja_teks->jenis_input_10 }}"
                                                                    class="form-control ribbon">
                                                            @else
                                                            <input style="display: none" type="text" name="jenis_input_10"
                                                            class="form-control ribbon">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
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
                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="jenis_14"
                                                    @checked($borange_serah_kerja_teks->jenis_14 == 'on') id="Chipboard"></div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p style="font-size:12px;font-weight:600;">Chipboard</9>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div id="chipinput1">
                                                            @if ($borange_serah_kerja_teks->jenis_14 == 'on')
                                                                <input type="text" name="jenis_input_14"
                                                                    value="{{ $borange_serah_kerja_teks->jenis_input_14 }}"
                                                                    class="form-control Chipboard">
                                                            @else
                                                            <input type="text" name="jenis_input_14"

                                                                    class="form-control Chipboard" style="display: none;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" id="labelContainer">
                                                        @if ($borange_serah_kerja_teks->jenis_14 == 'on')
                                                            <label class="Chipboard">gsm</label>
                                                         @else
                                                         <label class="Chipboard" style="display: none;">gsm</label>
                                                        @endif
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
                                <button class="btn btn-primary  mt-3">Print</button>
                            </div>
                        </div>
                    </div>


                </div>
                <a href="{{ route('borange_serah_kerja_teks') }}">back to list</a>
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
