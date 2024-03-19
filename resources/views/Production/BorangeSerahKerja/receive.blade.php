@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>BORANG SERAH KERJA (KULIT BUKU / COVER)</b></h5>
                            <p class="float-right">TCBS-B33 (Rev. 1)</p>
                        </div>
                    </div>

                    <form action="{{ route('borange_serah_kerja.receive.approve', $borange_serah_kerja->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tarikh</label>
                                        <input type="text" name="date"
                                        value="{{ $borange_serah_kerja->date }}" class="form-control"
                                        id="datepicker"  pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Po No</label>
                                    <input type="text"  name="po_no" value="{{ $borange_serah_kerja->po_no }}" id="" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div for="" class="form-label">Disediakan Oleh</div>
                                        <input type="text" readonly value="{{ Auth::user()->full_name }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label"> Sales Order No </label>
                                        <select name="sale_order" data-id="{{ $borange_serah_kerja->sale_order_id }}"
                                            id="sale_order" class="form-control">
                                            <option value="{{ $borange_serah_kerja->sale_order_id }}" selected
                                                style="color: black; !important">
                                                {{ $borange_serah_kerja->sale_order->order_no }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Tajuk</label>
                                        <input type="text" readonly name="" id="tajuk"
                                                class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Nama Subkontraktor</label>
                                        <select name="nama" id="nama" class="form-control  form-select" data-id="{{ $borange_serah_kerja->nama }}">
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}" @selected($borange_serah_kerja->nama == $supplier->id)>{{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kuantiti </div>
                                        <input type="text"  name="qty" value="{{ $borange_serah_kerja->qty }}"
                                        class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Saiz Kertas</div>
                                        <input type="text"  name="size" value="{{ $borange_serah_kerja->size }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Jenis Finishing</b></h5>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_1"   @checked($borange_serah_kerja->jenis_1 == "on") id="jenis_1"></div>
                                        <div class="col-md-4">
                                            <h5>UV+Texture Emboss</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text"  @disabled($borange_serah_kerja->jenis_1 != "on") value="{{ $borange_serah_kerja->jenis_input_1  }}"  name="jenis_input_1" id="jenis_input_1"
                                                class="form-control"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_2"  @checked($borange_serah_kerja->jenis_2 == "on") id=""></div>
                                        <div class="col-md-4">
                                            <h5>Matt Lamination</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_3"  @checked($borange_serah_kerja->jenis_3 == "on") id=""></div>
                                        <div class="col-md-4">
                                            <h5>Spot Miraval</h5>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_4"  @checked($borange_serah_kerja->jenis_4 == "on") id=""></div>
                                        <div class="col-md-4">
                                            <h5>Emboss</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_5"  @checked($borange_serah_kerja->jenis_5 == "on") id=""></div>
                                        <div class="col-md-4">
                                            <h5>UV Vanish</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_6"  @checked($borange_serah_kerja->jenis_6 == "on") id=""></div>
                                        <div class="col-md-4">
                                            <h5>Creasing Line</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_7"  @checked($borange_serah_kerja->jenis_7 == "on") id=""></div>
                                        <div class="col-md-4">
                                            <h5>Perforation</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_8" @checked($borange_serah_kerja->jenis_8 == "on") id=""></div>
                                        <div class="col-md-4">
                                            <h5>Punch Hole</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_9"  @checked($borange_serah_kerja->jenis_9 == "on") id="jenis_9"></div>
                                        <div class="col-md-3">
                                            <h5>Others</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text" @disabled($borange_serah_kerja->jenis_9 != "on") value="{{ $borange_serah_kerja->jenis_input_9  }}" name="jenis_input_9" id="jenis_input_9"
                                                class="form-control"></div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_24" @checked($borange_serah_kerja->jenis_24 == 'on') id="jenis_24"></div>
                                        <div class="col-md-3">
                                            <h5>Others</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text" @disabled($borange_serah_kerja->jenis_24 != 'on') value="{{ $borange_serah_kerja->jenis_input_24 }}" name="jenis_input_24" id="jenis_input_24"
                                                class="form-control"></div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_26" @checked($borange_serah_kerja->jenis_26 == 'on') id="jenis_26"></div>
                                        <div class="col-md-3">
                                            <h5>Others</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text" @disabled($borange_serah_kerja->jenis_26 != 'on') value="{{ $borange_serah_kerja->jenis_input_26 }}" name="jenis_input_26" id="jenis_input_26"
                                                class="form-control"></div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_10"  @checked($borange_serah_kerja->jenis_10 == "on") id=""></div>
                                        <div class="col-md-4">
                                            <h5>Gloss Lamination</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_11" @checked($borange_serah_kerja->jenis_11 == "on") id=""></div>
                                        <div class="col-md-4">
                                            <h5>Spot UV</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_12" @checked($borange_serah_kerja->jenis_12 == "on") id="jenis_12"></div>
                                        <div class="col-md-4">
                                            <h5>Hot Stamping</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text" @disabled($borange_serah_kerja->jenis_12 != "on") value="{{ $borange_serah_kerja->jenis_input_12  }}"  name="jenis_input_12"  id="jenis_input_12"
                                                class="form-control"></div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_13" @checked($borange_serah_kerja->jenis_13 == "on")  id=""></div>
                                        <div class="col-md-4">
                                            <h5>Deboss</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_14" @checked($borange_serah_kerja->jenis_14 == "on") id=""></div>
                                        <div class="col-md-4">
                                            <h5>Spot Corse UV</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_15" @checked($borange_serah_kerja->jenis_15 == "on") id=""></div>
                                        <div class="col-md-4">
                                            <h5>Die Cut</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_16" @checked($borange_serah_kerja->jenis_16 == "on") id=""></div>
                                        <div class="col-md-4">
                                            <h5>Numbering</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_17" @checked($borange_serah_kerja->jenis_17 == "on") id=""></div>
                                        <div class="col-md-4">
                                            <h5>Round Corner</h5>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_23" @checked($borange_serah_kerja->jenis_23 == 'on') id="jenis_23"></div>
                                        <div class="col-md-3">
                                            <h5>Others</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text" @disabled($borange_serah_kerja->jenis_23 != 'on') value="{{ $borange_serah_kerja->jenis_input_23 }}" name="jenis_input_23" id="jenis_input_23"
                                                class="form-control"></div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_25" @checked($borange_serah_kerja->jenis_25 == 'on') id="jenis_25"></div>
                                        <div class="col-md-3">
                                            <h5>Others</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text" @disabled($borange_serah_kerja->jenis_25 != 'on') value="{{ $borange_serah_kerja->jenis_input_25 }}" name="jenis_input_25" id="jenis_input_25"
                                                class="form-control"></div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_27" @checked($borange_serah_kerja->jenis_27 == 'on') id="jenis_27"></div>
                                        <div class="col-md-3">
                                            <h5>Others</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text" @disabled($borange_serah_kerja->jenis_27 != 'on') value="{{ $borange_serah_kerja->jenis_input_27 }}" name="jenis_input_27" id="jenis_input_27"
                                                class="form-control"></div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2"><input type="checkbox" name="jenis_18" @checked($borange_serah_kerja->jenis_18 == "on") id="jenis_18"><span
                                                class="ml-3">Emboss</span></div>
                                        <div class="col-md-2"><input type="checkbox" name="jenis_19" @checked($borange_serah_kerja->jenis_19 == "on") id="jenis_19"><span
                                                class="ml-3">Deboss</span></div>
                                        <div class="col-md-2"><input type="checkbox" name="jenis_20" @checked($borange_serah_kerja->jenis_20 == "on") id="jenis_20"><span
                                                class="ml-3">Hotstamping</span></div>
                                        <div class="col-md-2"><input type="checkbox" name="jenis_21" @checked($borange_serah_kerja->jenis_21 == "on") id="jenis_21"><span
                                                class="ml-3">Spot Uv</span></div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2"><input type="checkbox" @checked($borange_serah_kerja->jenis_22 == "on") name="jenis_22" id="jenis_22"><span
                                                class="ml-2">Lain-lain</span></div>
                                        <div class="col-md-3" style="margin-left:-100px;"><input disabled type="text" @disabled($borange_serah_kerja->jenis_22 != "on") value="{{ $borange_serah_kerja->jenis_input_22  }}" name="jenis_input_22" id="jenis_input_22"
                                                class="form-control"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Siap Finishing hantar ke </label>
                                    <input type="text" class="form-control" value="{{ $borange_serah_kerja->siap_1 }}"  name="siap_1" id="siap_1">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Dateline:</label>
                                    <input type="text" class="form-control datepicker" value="{{ $borange_serah_kerja->date_line }}" name="date_line" id="date_line">
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
                        <div class="row d-flex justify-content-end mt-5">
                            <div class="col-md-12 d-flex justify-content-end">

                                <button class="btn btn-primary" type="submit"> Receive</button>

                            </form>
                            </div>
                        </div>
                </div>


            </div>
            <a href="{{route('borange_serah_kerja')}}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
        </div>
    </div>


@endsection

@push('custom-scripts')
<script>
    $(document).ready(function(){


        // On load check the input and checkbox
        if($("#jenis_9").prop('checked')){
                $('#jenis_input_9').removeAttr('disabled')
            }else{
                $('#jenis_input_9').attr('disabled','disabled');
            }

        if($("#jenis_1").prop('checked')){
            $('#jenis_input_1').removeAttr('disabled')
        }else{
            $('#jenis_input_1').attr('disabled','disabled');
        }

        if($("#jenis_12").prop('checked')){
                $('#jenis_input_12').removeAttr('disabled')
            }else{
                $('#jenis_input_12').attr('disabled','disabled');
            }

        if($("#jenis_22").prop('checked')){
            $('#jenis_input_22').removeAttr('disabled')
        }else{
            $('#jenis_input_22').attr('disabled','disabled');
        }



        $('#jenis_9').on('change',function(){
            if($(this).prop('checked')){
                $('#jenis_input_9').removeAttr('disabled')
            }else{
                $('#jenis_input_9').attr('disabled','disabled');
            }
        })
        $('#jenis_1').on('change',function(){
            if($(this).prop('checked')){
                $('#jenis_input_1').removeAttr('disabled')
            }else{
                $('#jenis_input_1').attr('disabled','disabled');
            }
        })
        $('#jenis_12').on('change',function(){
            if($(this).prop('checked')){
                $('#jenis_input_12').removeAttr('disabled')
            }else{
                $('#jenis_input_12').attr('disabled','disabled');
            }
        })
        $('#jenis_22').on('change',function(){
            if($(this).prop('checked')){
                $('#jenis_input_22').removeAttr('disabled')
            }else{
                $('#jenis_input_22').attr('disabled','disabled');
            }
        })

        $('input,select').attr('disabled', 'disabled');
        $('input[type=hidden]').removeAttr('disabled');

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
                    if ($('#sale_order').data('id') == data.id) {
                        return $('<option value=' + data.id + ' selected>' + data.order_no +
                            '</option>');
                    } else {
                        return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                    }
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
                        $('#tajuk').val(data.sale_order.description);
                        $('#customer').val(data.sale_order.customer);
                        $('#size').val(data.sale_order.size);
                        $('#sale_order_qty').val(data.sale_order.sale_order_qty);
                    }
                });
            });




</script>
@endpush
