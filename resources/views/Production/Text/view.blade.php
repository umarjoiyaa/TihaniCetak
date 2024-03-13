@extends('layouts.app')

@section('css')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>PRODUCTION JOBSHEET - TEXT</b></h5>
                            <p class="float-right">TCBS-B16 (Rev.2)</p>
                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Tarikh</label>
                                        <input type="text" name="date" value="{{ $text->date }}"
                                            class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                            placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Disediakan Oleh</label>
                                    <input type="text" readonly value="{{ Auth::user()->full_name }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="" class="form-label">Sales Order No.</label>
                                        <select name="sale_order" data-id="{{ $text->sale_order_id }}" id="sale_order"
                                            class="form-control">
                                            <option value="{{ $text->sale_order_id }}" selected
                                                style="color: black; !important">
                                                {{ $text->sale_order->order_no }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="" class="form-label">Kod Buku</label>
                                        <input type="text" readonly id="kod_buku" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="" class="form-label"> Tajuk</label>
                                        <input type="text" id="tajuk" readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Pelanggan</label>
                                        <input type="text" readonly id="customer" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Kuantiti So </label>
                                        <input type="text" readonly id="sale_order_qty" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Kuantiti Waste</label>
                                        <input type="number" readonly name="kuantiti_waste" value="{{ $text->kuantiti_waste }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Lebihan Stok</label>
                                        <input type="number" id="extra_stock" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Mesin</label>
                                        <select name="mesin" id="mesin" class="form-control form-select">
                                            <option value="SMZP (2C)" @selected($text->mesin == 'SMZP (2C)')>SMZP (2C)</option>
                                            <option value="RUOBI (4C)" @selected($text->mesin == 'RUOBI (4C)')>RUOBI (4C)</option>
                                            <option value="KOMORI (8C)" @selected($text->mesin == 'KOMORI (8C)')>KOMORI (8C)</option>
                                            <option value="PANTONE" @selected($text->mesin == 'PANTONE')>PANTONE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Kertas: </label>
                                        <input type="text" name="kertas" value="{{ $text->kertas }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Saiz Potong:</label>
                                        <input type="text" name="saiz_potong" value="{{ $text->saiz_potong }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0; border-radius:5px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Arahan Kerja</b></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <textarea name="arahan_kerja" id="editor">{{ $text->arahan_kerja }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0; border-radius:5px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Status</b></h5>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="">status</label>
                                    <input type="text" readonly id="status" class="form-control">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="">Plate</label>
                                    <select name="plate" id="plate" class="form-control form-select">
                                        <option value="Plate lama" @selected($text->plate == 'Plate lama')>Plate lama</option>
                                        <option value="Plate baru" @selected($text->plate == 'Plate baru')>Plate baru</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="">Saiz Produk</label>
                                    <input type="text" readonly id="size" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0; border-radius:5px;">
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h5><b>Text</b></h5>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Print</label>
                                    <select name="print" id="print1" class="form-control form-select">
                                        <option value="1C" @selected($text->print == '1C')>1C</option>
                                        <option value="2C" @selected($text->print == '2C')>2C</option>
                                        <option value="4C" @selected($text->print == '4C')>4C</option>
                                    </select>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-2">
                                    <label for="">Waste Paper</label>
                                    <input type="text" name="waste_paper" value="{{ $text->waste_paper }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="">last Print</label>
                                    <input type="text" name="last_print" value="{{ $text->last_print }}"
                                        class="form-control">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0; border-radius:5px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Seksyen</b></h5>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Seksyen No.</label>
                                    <input type="number" name="seksyen_no" value="{{ $text->seksyen_no }}"
                                        id="seksyen_no" class="form-control">
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered" id="child_table">
                                        <thead>
                                            <tr>
                                                <th>Sr</th>
                                                <th>Date</th>
                                                <th>Machine</th>
                                                <th>Side</th>
                                                <th>last Print</th>
                                                <th>Kuantiti Waste</th>
                                            </tr>
                                            </thead>
                                        <tbody>
                                            @foreach ($details as $value)
                                                <tr>
                                                    <td>{{ $value->seksyen_no }}</td>
                                                    <td> <input type="text"
                                                            name="section[{{ $value->seksyen_no }}][date]"
                                                            class="form-control datepicker"
                                                            id="datepicker{{ $value->seksyen_no }}"
                                                            value="{{ $value->date }}" pattern="\d{2}-\d{2}-\d{4}"
                                                            class="date_section" placeholder="dd-mm-yyyy"></td>
                                                    <td>
                                                        <select name="section[{{ $value->seksyen_no }}][machine]"
                                                            style="width:100%" id="mesin{{ $value->seksyen_no }}"
                                                            class="form-control form-select mesin_section" id="machine">
                                                            <option value="-1" selected>Select any Mesin</option>
                                                            <option value="SMZP (2C)" @selected($value->machine == 'SMZP (2C)')>SMZP
                                                                (2C)
                                                            </option>
                                                            <option value="RUOBI (4C)" @selected($value->machine == 'RUOBI (4C)')>RUOBI
                                                                (4C)</option>
                                                            <option value="KOMORI (8C)" @selected($value->machine == 'KOMORI (8C)')>
                                                                KOMORI (8C)</option>
                                                            <option value="PANTONE" @selected($value->machine == 'PANTONE')>PANTONE
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="section[{{ $value->seksyen_no }}][side]"
                                                            style="width:100%" id="side{{ $value->seksyen_no }}"
                                                            class="form-control form-select side_section" id="Ab,A/B">
                                                            <option value="-1" selected>Select any Side</option>
                                                            <option value="A" @selected($value->side == 'A')>A</option>
                                                            <option value="B" @selected($value->side == 'B')>B</option>
                                                            <option value="A/B" @selected($value->side == 'A/B')>A/B
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td><input type="number"
                                                            name="section[{{ $value->seksyen_no }}][last_print]"
                                                            value="{{ $value->last_print }}"
                                                            class="form-control last_print_section" id=""></td>
                                                    <td><input type="number" value="{{ $value->kuantiti_waste }}"
                                                            name="section[{{ $value->seksyen_no }}][kuantiti_waste]"
                                                            class="form-control kuantiti_waste_section" id="">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0; border-radius:5px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Binding </b></h5>
                                </div>
                                <div class="col-md-7">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Finishing</th>
                                                <th>Partner</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="checkbox" name="binding_1" id="Input1"
                                                        class=" mr-5" @checked($text->binding_1 != null)>Staple Bind</td>
                                                <td>
                                                    <select name="binding_1_val" @disabled($text->binding_1 == null)
                                                        placeholder="select Supplier" id="staplebind"
                                                        class="form-control form-select w-100">
                                                        <option value="" @selected($text->binding_1 == null) disabled></option>
                                                        <option value="In-house" @selected($text->binding_1 == 'In-house')>In-house
                                                        </option>
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->id }}"
                                                                @selected($text->binding_1 == $supplier->id)>{{ $supplier->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="binding_2" id="Input2"
                                                        class=" mr-5" @checked($text->binding_2 != null)>Perfect Bind</td>
                                                <td><select name="binding_2_val" @disabled($text->binding_2 == null)
                                                    placeholder="select Supplier" id="input2"
                                                    class="form-control form-select w-100">
                                                    <option value="" @selected($text->binding_2 == null) disabled></option>
                                                    <option value="In-house" @selected($text->binding_2 == 'In-house')>In-house
                                                    </option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}"
                                                            @selected($text->binding_2 == $supplier->id)>{{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                                </select></td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" name="binding_3" id="Input3"
                                                        class=" mr-5" @checked($text->binding_3 != null)>Lock Bind</td>
                                                <td><select name="binding_3_val" @disabled($text->binding_3 == null)
                                                    placeholder="select Supplier" id="input3"
                                                    class="form-control form-select w-100">
                                                    <option value="" @selected($text->binding_3 == null) disabled></option>
                                                    <option value="In-house" @selected($text->binding_3 == 'In-house')>In-house
                                                    </option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}"
                                                            @selected($text->binding_3 == $supplier->id)>{{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                                </select></td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" name="binding_4" id="Input4"
                                                        class=" mr-5" @checked($text->binding_4 != null)>Wire O
                                                </td>
                                                <td><select name="binding_4_val" @disabled($text->binding_4 == null)
                                                    placeholder="select Supplier" id="input4"
                                                    class="form-control form-select w-100">
                                                    <option value="" @selected($text->binding_4 == null) disabled></option>
                                                    <option value="In-house" @selected($text->binding_4 == 'In-house')>In-house
                                                    </option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}"
                                                            @selected($text->binding_4 == $supplier->id)>{{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                                </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="binding_5" id="Input5"
                                                        class=" mr-5" @checked($text->binding_5 != null)>Hard Cover -
                                                    Square Back
                                                </td>
                                                <td><select name="binding_5_val" @disabled($text->binding_5 == null)
                                                    placeholder="select Supplier" id="input5"
                                                    class="form-control form-select w-100">
                                                    <option value="" @selected($text->binding_5 == null) disabled></option>
                                                    <option value="In-house" @selected($text->binding_5 == 'In-house')>In-house
                                                    </option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}"
                                                            @selected($text->binding_5 == $supplier->id)>{{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                                </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="binding_6" id="Input6"
                                                        class=" mr-5" @checked($text->binding_6 != null)>Hard Cover -
                                                    Round Back</td>
                                                <td><select name="binding_6_val" @disabled($text->binding_6 == null)
                                                    placeholder="select Supplier" id="input6"
                                                    class="form-control form-select w-100">
                                                    <option value="" @selected($text->binding_6 == null) disabled></option>
                                                    <option value="In-house" @selected($text->binding_6 == 'In-house')>In-house
                                                    </option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}"
                                                            @selected($text->binding_6 == $supplier->id)>{{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                                </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="binding_7" id="Input7"
                                                        class=" mr-5" @checked($text->binding_7 != null)>Sewing
                                                </td>
                                                <td><select name="binding_7_val" @disabled($text->binding_7 == null)
                                                    placeholder="select Supplier" id="input7"
                                                    class="form-control form-select w-100">
                                                    <option value="" @selected($text->binding_7 == null) disabled></option>
                                                    <option value="In-house" @selected($text->binding_7 == 'In-house')>In-house
                                                    </option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}"
                                                            @selected($text->binding_7 == $supplier->id)>{{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                                </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="binding_8" id="Input8"
                                                        class=" mr-5" @checked($text->binding_8 != null)>Round corner
                                                </td>
                                                <td><select name="binding_8_val" @disabled($text->binding_8 == null)
                                                    placeholder="select Supplier" id="input8"
                                                    class="form-control form-select w-100">
                                                    <option value="" @selected($text->binding_8 == null) disabled></option>
                                                    <option value="In-house" @selected($text->binding_8 == 'In-house')>In-house
                                                    </option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}"
                                                            @selected($text->binding_8 == $supplier->id)>{{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                                </select></td>
                                            </tr>


                                            <tr>
                                                <td><input type="checkbox" name="binding_9" id="Input9"
                                                        class=" mr-5" @checked($text->binding_9 != null)> Others:
                                                    <input type="text" @disabled($text->binding_9 == null) name="binding_9_val" id="input10"
                                                        class="form-control w-50 float-right" value="{{$text->binding_9}}">
                                                </td>
                                                <td><select name="binding_10_val" @disabled($text->binding_9 == null)
                                                    placeholder="select Supplier" id="input10"
                                                    class="form-control form-select w-100">
                                                    <option value="" @selected($text->binding_9 == null) disabled></option>
                                                    <option value="In-house" @selected($text->binding_10 == 'In-house')>In-house
                                                    </option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}"
                                                            @selected($text->binding_10 == $supplier->id)>{{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                                </select></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card w-100" style="background:#f1f0f0; border-radius:5px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Catatan</b></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <textarea name="catatan" id="editor1">{{ $text->catatan }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center" style="font-size:80px; color:red; dispaly:inline-block;">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-1">
                                        <i class="fe fe-alert-triangle"></i>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 style="font-size:35px;">AMARAN : <br>
                                            <span style="color:black;">
                                                TIADA SAMPLE JANGAN CETAK <br>
                                                FIRST PIECE JANGAN LUPA
                                            </span>
                                        </h5>
                                    </div>

                                    <div class="col-md-1">
                                        <i class="fe fe-alert-triangle"></i>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                            <a class="btn btn-primary float-right mx-2 mb-3" target="_blank" href="{{route('text.print', $text->id)}}" >Print</a>
                        </div>
                    </div>


                </div>
            </div>
            <a href="{{ route('text') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script src="{{ url('/assets/plugins/summernote/js/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('input, select, textarea').attr('disabled', 'disabled');
            $('#sale_order').trigger('change');
            $('#editor').summernote();
            $('#editor1').summernote();
        });

        $firstAttempt = true;
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
                    $('#customer').val(data.sale_order.customer);
                    $('#sale_order_qty').val(data.sale_order.sale_order_qty);
                    $('#status').val(data.sale_order.status);
                    $('#size').val(data.sale_order.size);
                    $('#status').val(data.sale_order.status);
                    $('#extra_stock').val(data.sale_order.extra_stock);
                    if (!$firstAttempt) {
                        if (data.section != null) {
                            $('#seksyen_no').val(data.section.item_cover_text);
                        } else {
                            $('#seksyen_no').val(0);
                        }
                    }
                }
            });
        });
    </script>
@endpush
