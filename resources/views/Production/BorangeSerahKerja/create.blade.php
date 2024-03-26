@extends('layouts.app')

@section('content')
<form action="{{ route('borange_serah_kerja.store') }}" method="post">
@csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>BORANG SERAH KERJA (KULIT BUKU / COVER)</b></h5>
                            <p class="float-right">TCSB-B33 (Rev. 1)</p>
                        </div>
                    </div>


                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tarikh</label>
                                        <input type="text" name="date"
                                        value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}" class="form-control"
                                        id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Po No</label>
                                    <input type="text"  name="po_no"  value="{{ old('po_no') }}" id="" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="">Disediakan Oleh</label>
                                        <input type="text" readonly value="{{ Auth::user()->user_name }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for=""> Sales Order No </label>
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

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="">Tajuk</label>
                                        <input type="text" readonly name="" id="tajuk"
                                                class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="">Nama Subkontraktor</label>
                                        <select name="nama" id="nama" class="form-control form-select">
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('nama') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kuantiti </div>
                                        <input type="number"  name="qty" value="{{ old('qty') }}"
                                        class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Saiz Kertas</div>
                                        <input type="number"  name="size" value="{{ old('size') }}"
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
                                        <div class="col-md-1"><input type="checkbox" name="jenis_1" @checked(old('jenis_1') == 'on') id="jenis_1"></div>
                                        <div class="col-md-4">
                                            <h5>UV+Texture Emboss</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text" @disabled(old('jenis_1') != 'on')  value="{{ old('jenis_input_1') }}" name="jenis_input_1" id="jenis_input_1"
                                                class="form-control"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" @checked(old('jenis_2') == 'on') name="jenis_2" id=""></div>
                                        <div class="col-md-4">
                                            <h5>Matt Lamination</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_3" @checked(old('jenis_3') == 'on') id=""></div>
                                        <div class="col-md-4">
                                            <h5>Spot Miraval</h5>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_4" @checked(old('jenis_4') == 'on') id=""></div>
                                        <div class="col-md-4">
                                            <h5>Emboss</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_5" @checked(old('jenis_5') == 'on') id=""></div>
                                        <div class="col-md-4">
                                            <h5>UV Vanish</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_6" @checked(old('jenis_6') == 'on') id=""></div>
                                        <div class="col-md-4">
                                            <h5>Creasing Line</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_7" @checked(old('jenis_7') == 'on') id=""></div>
                                        <div class="col-md-4">
                                            <h5>Perforation</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_8" @checked(old('jenis_8') == 'on') id=""></div>
                                        <div class="col-md-4">
                                            <h5>Punch Hole</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_9" @checked(old('jenis_9') == 'on') id="jenis_9"></div>
                                        <div class="col-md-3">
                                            <h5>Others</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text" @disabled(old('jenis_9') != 'on') value="{{ old('jenis_input_9') }}" name="jenis_input_9" id="jenis_input_9"
                                                class="form-control"></div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_24" @checked(old('jenis_24') == 'on') id="jenis_24"></div>
                                        <div class="col-md-3">
                                            <h5>Others</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text" @disabled(old('jenis_24') != 'on') value="{{ old('jenis_input_24') }}" name="jenis_input_24" id="jenis_input_24"
                                                class="form-control"></div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_26" @checked(old('jenis_26') == 'on') id="jenis_26"></div>
                                        <div class="col-md-3">
                                            <h5>Others</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text" @disabled(old('jenis_26') != 'on') value="{{ old('jenis_input_26') }}" name="jenis_input_26" id="jenis_input_26"
                                                class="form-control"></div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_10" @checked(old('jenis_10') == 'on') id=""></div>
                                        <div class="col-md-4">
                                            <h5>Gloss Lamination</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_11" @checked(old('jenis_11') == 'on') id=""></div>
                                        <div class="col-md-4">
                                            <h5>Spot UV</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_12" @checked(old('jenis_12') == 'on') id="jenis_12"></div>
                                        <div class="col-md-4">
                                            <h5>Hot Stamping</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text" @disabled(old('jenis_12') != 'on') value="{{ old('jenis_input_12') }}"  name="jenis_input_12" id="jenis_input_12"
                                                class="form-control"></div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_13" @checked(old('jenis_13') == 'on') id=""></div>
                                        <div class="col-md-4">
                                            <h5>Deboss</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_14" @checked(old('jenis_14') == 'on') id=""></div>
                                        <div class="col-md-4">
                                            <h5>Spot Corse UV</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_15" @checked(old('jenis_15') == 'on') id=""></div>
                                        <div class="col-md-4">
                                            <h5>Die Cut</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_16" @checked(old('jenis_16') == 'on') id=""></div>
                                        <div class="col-md-4">
                                            <h5>Numbering</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_17" @checked(old('jenis_17') == 'on') id=""></div>
                                        <div class="col-md-4">
                                            <h5>Round Corner</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_23" @checked(old('jenis_23') == 'on') id="jenis_23"></div>
                                        <div class="col-md-3">
                                            <h5>Others</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text" @disabled(old('jenis_23') != 'on') value="{{ old('jenis_input_23') }}" name="jenis_input_23" id="jenis_input_23"
                                                class="form-control"></div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_25" @checked(old('jenis_25') == 'on') id="jenis_25"></div>
                                        <div class="col-md-3">
                                            <h5>Others</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text" @disabled(old('jenis_25') != 'on') value="{{ old('jenis_input_25') }}" name="jenis_input_25" id="jenis_input_25"
                                                class="form-control"></div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_27" @checked(old('jenis_27') == 'on') id="jenis_27"></div>
                                        <div class="col-md-3">
                                            <h5>Others</h5>
                                        </div>
                                        <div class="col-md-6"><input type="text" @disabled(old('jenis_27') != 'on') value="{{ old('jenis_input_27') }}" name="jenis_input_27" id="jenis_input_27"
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
                                        <div class="col-md-2"><input type="checkbox" name="jenis_18" @checked(old('jenis_18') == 'on') id="jenis_18"><span
                                                class="ml-3">Emboss</span></div>
                                        <div class="col-md-2"><input type="checkbox" name="jenis_19" @checked(old('jenis_19') == 'on') id="jenis_19"><span
                                                class="ml-3">Deboss</span></div>
                                        <div class="col-md-2"><input type="checkbox" name="jenis_20" @checked(old('jenis_20') == 'on') id="jenis_20"><span
                                                class="ml-3">Hotstamping</span></div>
                                        <div class="col-md-2"><input type="checkbox" name="jenis_21" @checked(old('jenis_21') == 'on') id="jenis_21"><span
                                                class="ml-3">Spot Uv</span></div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2"><input type="checkbox" name="jenis_22" @checked(old('jenis_22') == 'on') id="jenis_22"><span
                                                class="ml-5">Lain-lain</span></div>
                                        <div class="col-md-3"><input @disabled(old('jenis_22') != 'on') value="{{ old('jenis_input_22') }}" type="text" name="jenis_input_22" id="jenis_input_22"
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
                                    <input type="text" class="form-control" value="{{ old('siap_1') }}" name="siap_1" id="siap_1">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Dateline:</label>
                                    <input type="text" name="date_line"
                                    value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}" class="datepicker form-control"
                                    id="datepicker1" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">                                </div>
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
                            <button class="btn btn-primary mx-2">Save</button>
                            {{-- <button class="btn btn-primary ">Print</button> --}}
                        </div>
                    </div>
                </div>


            </div>
            <a href="{{route('borange_serah_kerja')}}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
        </div>
    </div>


</form>
@endsection

@push('custom-scripts')
<script>
    $(document).ready(function(){
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
        $('#jenis_23').on('change',function(){
            if($(this).prop('checked')){
                $('#jenis_input_23').removeAttr('disabled')
            }else{
                $('#jenis_input_23').attr('disabled','disabled');
            }
        })
        $('#jenis_24').on('change',function(){
            if($(this).prop('checked')){
                $('#jenis_input_24').removeAttr('disabled')
            }else{
                $('#jenis_input_24').attr('disabled','disabled');
            }
        })
        $('#jenis_25').on('change',function(){
            if($(this).prop('checked')){
                $('#jenis_input_25').removeAttr('disabled')
            }else{
                $('#jenis_input_25').attr('disabled','disabled');
            }
        })
        $('#jenis_26').on('change',function(){
            if($(this).prop('checked')){
                $('#jenis_input_26').removeAttr('disabled')
            }else{
                $('#jenis_input_26').attr('disabled','disabled');
            }
        })
        $('#jenis_27').on('change',function(){
            if($(this).prop('checked')){
                $('#jenis_input_27').removeAttr('disabled')
            }else{
                $('#jenis_input_27').attr('disabled','disabled');
            }
        })
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






    })

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

                    }
                });
            });
</script>
@endpush
