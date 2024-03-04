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
                                    <input type="text" name="po_no" id="" class="form-control">
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
                                        <div class="label"> Sales Order No </div>
                                        <select name="sale_order" id="sale_order" class="form-control">

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
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                </option>
                                            @endforeach
                                         </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Jumlah Seksyen </div>
                                        <input type="text" readonly name="" id="jumlah" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Jenis</div>
                                        <select name="jenis[]" id="jenis" class="form-control form-select" multiple>
                                            <!-- <option value="">pilih Jenis</option> -->
                                            <option value="Cover">Cover</option>
                                            <option value="End Paper">End Paper</option>
                                            <option value="Teks">Teks</option>
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
                                    <input type="text" name="Qty_slap_binding" id="" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Waste Binding</label>
                                    <input type="text" name="waste_binding" id="" class="form-control">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <h5><b>Jenis Binding</b></h5>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_1" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Thread Sewn</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_2" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Round Back</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_3" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Square Back</h5>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_4" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Wire O</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_5" id="createinput"></div>
                                        <div class="col-md-6">

                                            <div class="row">
                                                <div class="col-md2">
                                                <h5 style="padding-left:px;">Others</h5>
                                                </div>
                                                <div class="col-md-8" >
                                                    <div id="input" style="width:150px;"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_6" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Gloss Lamination</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_7" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Lock Bind</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_8" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Staple Bind</h5>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_9" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Head & tail Band</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_10" id="newInput"></div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p style="font-size:13px; font-weight:600;">Ribbon </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="boxinput" style="width:100px;"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div id="labelContainer1"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_11" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Perfect Bind</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_12" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Soft cover</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_13" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Hard Cover</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_14" id="chipinput"></div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p style="font-size:12px;font-weight:600;">Chipboard</9>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="chipinput1"></div>
                                                </div>
                                                <div class="col-md-2" id="labelContainer"></div>
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
                                        <div class="col-md-1"><input type="checkbox" name="jenis_15" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Buku</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="jenis_16" id=""></div>
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
                            <button class="btn btn-primary  mt-3">Print</button>
                        </div>
                    </div>
                </div>


            </div>
            <a href="{{route('borange_serah_kerja_teks')}}">back to list</a>
        </div>
    </div>


</form>
@endsection
@push('custom-scripts')
<script>
    $(document).ready(function () {
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
                        $('#tajuk').val(data.sale_order.description);
                        if(data.section != null){
                            $('#jumlah').val(data.section.item_cover_text);
                        }else{
                            $('#jumlah').val(0);
                        }
                    }
                });
            });




        const createInputCheckbox = $('#createinput');
        const inputContainer = $('#input');

        createInputCheckbox.change(function () {
            if (createInputCheckbox.prop('checked')) {
                const newInput = $('<input type="text" class="form-control w-100" name="jenis_input_5">');

                inputContainer.append(newInput);
            } else {
                inputContainer.empty();
            }
        });

        const chipinputCheckbox = $('#chipinput');
        const chipinputContainer = $('#chipinput1');
        const labelContainer = $('#labelContainer');

        chipinputCheckbox.change(function() {
            if (chipinputCheckbox.prop('checked')) {
                const newInput = $('<input type="text" name="jenis_input_14" class="form-control">');

                const newLabel = $('<label>gsm</label>');

                chipinputContainer.append(newInput);

                labelContainer.append(newLabel);
            }
        });

            const chipinputCheckbox1 = $('#newInput');
            const chipinputContainer1 = $('.boxinput');
            const labelContainer1 = $('#labelContainer1');

            chipinputCheckbox1.change(function() {
                if (chipinputCheckbox1.prop('checked')) {
                const newInput1 = $('<input type="text" name="jenis_input_10" class="form-control">');

                const newLabel1 = $('<label>pcs</label>');

                chipinputContainer1.append(newInput1);

                labelContainer1.append(newLabel1);
                }
            });
    });

    </script>
@endpush
