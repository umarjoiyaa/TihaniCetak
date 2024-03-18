@extends('layouts.app')

@section('content')
<form action="{{ route('borange_serah_kerja_teks.store') }}" method="post">
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
                                        value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}" class="form-control"
                                        id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Po No</label>
                                    <input type="text" name="po_no" value="{{ old('po_no') }}" id="" class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label class="label">Disediakan Oleh</label>
                                        <input type="text" readonly name="" value="{{ Auth::user()->full_name }}" id="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label class="label"> Sales Order No </label>
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
                                        <label class="label">Tajuk</label>
                                        <input type="text" readonly class="form-control" id="tajuk">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label
                                         class="label">Nama Subkontraktor</label>
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
                                        <div class="label">Jumlah Seksyen </div>
                                        <input type="number"  name="jumlah" value="{{ old('jumlah') }}"  class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Jenis</div>
                                        <select name="jenis[]" id="jenis" class="form-control form-select" multiple>
                                            <!-- <option value="">pilih Jenis</option> -->
                                            <option value="Cover" @if (old('jenis')) {{ in_array('Cover', old('jenis')) ? 'selected' : '' }} @endif>Cover</option>
                                            <option value="End Paper" @if (old('jenis')) {{ in_array('End Paper', old('jenis')) ? 'selected' : '' }} @endif>End Paper</option>
                                            <option value="Teks" @if (old('jenis')) {{ in_array('Teks', old('jenis')) ? 'selected' : '' }} @endif>Teks</option>
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
                                    <input type="text" name="Qty_slap_binding" value="{{ old('Qty_slap_binding') }}" id="" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Waste Binding</label>
                                    <input type="text" name="waste_binding" value="{{ old('waste_binding') }}" class="form-control">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <h5><b>Jenis Binding</b></h5>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox"  @checked(old('jenis_1') == 'on') name="jenis_1" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Thread Sewn</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_2" @checked(old('jenis_2') == 'on') id=""></div>
                                        <div class="col-md-6">
                                            <h5>Round Back</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_3" @checked(old('jenis_3') == 'on') id=""></div>
                                        <div class="col-md-6">
                                            <h5>Square Back</h5>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_4" @checked(old('jenis_4') == 'on') id=""></div>
                                        <div class="col-md-6">
                                            <h5>Wire O</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_5" @checked(old('jenis_5') == 'on') id="Other"></div>
                                        <div class="col-md-6">

                                            <div class="row">
                                                <div class="col-md2">
                                                <h5 style="margin-left:10px;">Others</h5>
                                                </div>
                                                <div class="col-md-8" >
                                                    <div id="input" class="others" style="width:150px;">
                                                        <input type="text" name="jenis_input_5" value="{{ old('jenis_input_5') }}"
                                                        class="form-control Others" @if(old('jenis_5') == 'on') @else style="display:none;" @endif>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_17" @checked(old('jenis_17') == 'on') id="Other17"></div>
                                        <div class="col-md-6">

                                            <div class="row mt-2">
                                                <div class="col-md2">
                                                <h5 style="margin-left:10px;">Others</h5>
                                                </div>
                                                <div class="col-md-8" >
                                                    <div id="input" class="others17" style="width:150px;">
                                                        <input type="text" name="jenis_input_17" value="{{ old('jenis_input_17') }}"
                                                        class="form-control Others17" @if(old('jenis_17') == 'on') @else style="display:none;" @endif>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 ">


                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_7" @checked(old('jenis_7') == 'on') id=""></div>
                                        <div class="col-md-6">
                                            <h5>Lock Bind</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_8" @checked(old('jenis_8') == 'on') id=""></div>
                                        <div class="col-md-6">
                                            <h5>Staple Bind</h5>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_9" @checked(old('jenis_9') == 'on') id=""></div>
                                        <div class="col-md-6">
                                            <h5>Head & tail Band</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_10" @checked(old('jenis_10') == 'on') id="Ribbon"></div>
                                        <div class="col-md-6">
                                            <div class="row d-flex" >
                                                    <h5 class="ml-2">Ribbon</h5>
                                                    <div class="boxinput  mx-1" style="width:100px;">
                                                    <input type="text" name="jenis_input_10" value="{{ old('jenis_input_10') }}" @if(old('jenis_10') == 'on') style="width:100px;" @else style="width:100px;display:none;" @endif class="ribbon" >
                                                    </div>
                                                    <div id="labelContainer1" class="ribbon" @if(old('jenis_10') == 'on') @else style="display: none;" @endif>pcs</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_18" @checked(old('jenis_18') == 'on') id="Other18"></div>
                                        <div class="col-md-6">

                                            <div class="row">
                                                <div class="col-md2">
                                                <h5 style="margin-left:10px;">Others</h5>
                                                </div>
                                                <div class="col-md-8" >
                                                    <div id="input" class="others18" style="width:150px;">
                                                        <input type="text" name="jenis_input_18" value="{{ old('jenis_input_18') }}"
                                                        class="form-control Others18" @if(old('jenis_18') == 'on') @else style="display:none;" @endif>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_20" @checked(old('jenis_20') == 'on') id="Other20"></div>
                                        <div class="col-md-6">

                                            <div class="row">
                                                <div class="col-md2">
                                                <h5 style="margin-left:10px;">Others</h5>
                                                </div>
                                                <div class="col-md-8" >
                                                    <div id="input" class="other20" style="width:150px;">
                                                        <input type="text" name="jenis_input_20" value="{{ old('jenis_input_20') }}"
                                                        class="form-control Others20" @if(old('jenis_20') == 'on') @else style="display:none;" @endif>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-5 ">
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_11" @checked(old('jenis_11') == 'on') id=""></div>
                                        <div class="col-md-6">
                                            <h5>Perfect Bind</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_12"  @checked(old('jenis_12') == 'on') id=""></div>
                                        <div class="col-md-6">
                                            <h5>Soft cover</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_13"  @checked(old('jenis_13') == 'on') id=""></div>
                                        <div class="col-md-6">
                                            <h5>Hard Cover</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_14" @checked(old('jenis_14') == 'on') id="Chipboard"></div>
                                        <div class="col-md-6">
                                            <div class="row d-flex">
                                                    <h5 >Chipboard</h5>
                                                    <div id="chipinput1" class="mx-1" style="width:100px;">
                                                        <input type="text" class="Chipboard"  @if(old('jenis_14') == 'on') style="width:100px;" @else style="width:100px;display:none;" @endif  value="{{ old('jenis_input_14') }}"  name="jenis_input_14" >
                                                    </div>
                                                <div id="labelContainer" class="Chipboard" @if(old('jenis_14') == 'on') @else style="display:none;" @endif>gsm</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"><input type="checkbox" name="jenis_19" @checked(old('jenis_19') == 'on') id="Other19"></div>
                                    <div class="col-md-6">

                                        <div class="row">
                                            <div class="col-md2">
                                            <h5 style="margin-left:10px;">Others</h5>
                                            </div>
                                            <div class="col-md-8" >
                                                <div id="input" class="other19" style="width:150px;">
                                                    <input type="text" name="jenis_input_19" value="{{ old('jenis_input_19') }}"
                                                    class="form-control Others19" @if(old('jenis_19') == 'on') @else style="display:none;" @endif>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row mt-2">
                                    <div class="col-md-1"><input type="checkbox" name="jenis_21" @checked(old('jenis_21') == 'on') id="Other21"></div>
                                    <div class="col-md-6">

                                        <div class="row">
                                            <div class="col-md2">
                                            <h5 style="margin-left:10px;">Others</h5>
                                            </div>
                                            <div class="col-md-8" >
                                                <div id="input" class="other21" style="width:150px;">
                                                    <input type="text" name="jenis_input_21" value="{{ old('jenis_input_21') }}"
                                                    class="form-control Others21" @if(old('jenis_21') == 'on') @else style="display:none;" @endif>
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
                                        <div class="col-md-1"><input type="checkbox" name="jenis_15" @checked(old('jenis_15') == 'on') id=""></div>
                                        <div class="col-md-6">
                                            <h5>Buku</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_16" @checked(old('jenis_16') == 'on') id=""></div>
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
                                    value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}" class="form-control datepicker"
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
                            <button class="btn btn-primary mx-2 mt-3">Save</button>
                        </div>
                    </div>
                </div>


            </div>
            <a href="{{route('borange_serah_kerja_teks')}}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
        </div>
    </div>


</form>
@endsection
@push('custom-scripts')
<script>
    $(document).ready(function () {
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






            $("#Other").on('change',function(){
                if($(this).prop('checked')){
                    $('.Others').css('display','')
                }else{
                    $('.Others').css('display','none')
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
                        if(data.section != null){
                            $('#jumlah').val(data.section.item_cover_text);
                        }else{
                            $('#jumlah').val(0);
                        }
                    }
                });
            });

    </script>
@endpush
