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
    <form action="{{route('text.update', $text->id)}}" method="post" >
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="float-left"><b>PRODUCTION JOBSHEET - TEXT</b></h5>
                                <p class="float-right">TCSB-B16 (Rev.2)</p>
                            </div>
                        </div>

                        <div class="card" style="background:#f1f0f0;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Tarikh</label>
                                            <input type="text" name="date"
                                                value="{{ $text->date }}" class="form-control"
                                                id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Disediakan Oleh</label>
                                        <input type="text" readonly value="{{ Auth::user()->user_name }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="" class="form-label">Sales Order No.</label>
                                            <select name="sale_order" data-id="{{ $text->sale_order_id }}"
                                                id="sale_order" class="form-control">
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
                                            <input type="number" name="kuantiti_waste" value="{{$text->kuantiti_waste}}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Lebihan Stok</label>
                                            <input type="number" readonly id="extra_stock" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Kertas: </label>
                                            <input type="text" name="kertas" value="{{$text->kertas}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Saiz Potong:</label>
                                            <input type="text" name="saiz_potong" value="{{$text->saiz_potong}}" class="form-control">
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
                                                <textarea name="arahan_kerja" id="editor">{{$text->arahan_kerja}}</textarea>
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
                                        <input type="text" readonly id="status"
                                            class="form-control">
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
                                        <input type="text" readonly id="size"
                                            class="form-control">
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
                                        <input type="text" name="waste_paper" value="{{$text->waste_paper}}" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="">last Print</label>
                                        <input type="text" name="last_print" value="{{$text->last_print}}" class="form-control">
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
                                        <input type="number" name="seksyen_no" value="{{$text->seksyen_no}}" id="seksyen_no" class="form-control">
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>

                                                    <th>Date</th>
                                                    <th>Machine</th>
                                                    <th>Side</th>
                                                    <th>last Print</th>
                                                    <th>Kuantiti Waste</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> <input type="text" disabled name="parent_section_date"
                                                        value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}"
                                                            class="form-control datepicker" id="datepicker_main"
                                                            pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy"></td>
                                                    <td>
                                                        <select name="parent_section_machine" disabled id="mesin_section"
                                                            class="form-control mesin_parent_section form-select">
                                                            <option value="-1" disabled selected>Select any Mesin
                                                            </option>
                                                            <option value="SMZP (2C)" >SMZP (2C)</option>
                                                            <option value="RUOBI (4C)" >RUOBI (4C)</option>
                                                            <option value="KOMORI (8C)" >KOMORI (8C)</option>
                                                            <option value="PANTONE" >PANTONE</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="parent_section_side" disabled
                                                            class="form-control side_parent_section form-select"
                                                            id="side_section">
                                                            <option value="-1" disabled selected>Select any Side
                                                            </option>
                                                            <option value="A" >A</option>
                                                            <option value="B" >B</option>
                                                            <option value="A/B" >A/B</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="number" disabled name="parent_section_last_print"
                                                            id="last_print_parent_section"  class="form-control "
                                                            id=""></td>
                                                    <td><input type="number" disabled
                                                            name="parent_section_kuantiti_waste"
                                                            id="kuantiti_waste_parent_section"  class="form-control"
                                                            ></td>
                                                    <td><label class="switch">
                                                            <input type="checkbox" class="action"  name="parent_action" checked >
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>


                                    </div>
                                    <div class="table-responsive">
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
                                            <tbody>
                                                @php
                                                    $count = 1;
                                                @endphp
                                                @foreach ($details as $value)
                                                    <tr>
                                                        <td>{{$count}}</td>
                                                        <td> <input type="text" name="section[{{$value->seksyen_no}}][date]"
                                                            class="form-control datepicker"
                                                            id="datepicker{{$value->seksyen_no}}" value="{{$value->date}}" pattern="\d{2}-\d{2}-\d{4}" class="date_section" placeholder="dd-mm-yyyy"></td>
                                                        <td>
                                                            <select name="section[{{$value->seksyen_no}}][machine]" style="width:100%" id="mesin{{$value->seksyen_no}}" class="form-control form-select mesin_section" id="machine">
                                                                <option value="-1" selected>Select any Mesin</option>
                                                                <option value="SMZP (2C)" @selected($value->machine == 'SMZP (2C)')>SMZP (2C)</option>
                                                                <option value="RUOBI (4C)" @selected($value->machine == 'RUOBI (4C)')>RUOBI (4C)</option>
                                                                <option value="KOMORI (8C)" @selected($value->machine == 'KOMORI (8C)')>KOMORI (8C)</option>
                                                                <option value="PANTONE" @selected($value->machine == 'PANTONE')>PANTONE</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="section[{{$value->seksyen_no}}][side]" style="width:100%" id="side{{$value->seksyen_no}}" class="form-control form-select side_section" id="Ab,A/B">
                                                                <option value="-1" selected>Select any Side</option>
                                                                <option value="A" @selected($value->side == 'A')>A</option>
                                                                <option value="B" @selected($value->side == 'B')>B</option>
                                                                <option value="A/B" @selected($value->side == 'A/B')>A/B</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="number" name="section[{{$value->seksyen_no}}][last_print]" value="{{$value->last_print}}" class="form-control last_print_section"
                                                                id=""></td>
                                                        <td><input type="number" value="{{$value->kuantiti_waste}}" name="section[{{$value->seksyen_no}}][kuantiti_waste]" class="form-control kuantiti_waste_section"
                                                                id=""></td>
                                                    </tr>
                                                    @php
                                                    $count++;
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                            </thead>
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
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Finishing</th>
                                                    <th>Partner</th>
                                                </tr>
                                            </thead>
                                            <tbody>



                                                <tr>
                                                    <td><input type="checkbox" name="binding_11" id="Input11"
                                                            class=" mr-5" @checked($text->binding_11 != null)> Others:
                                                        <input type="text" @disabled($text->binding_11 == null) name="binding_11_val" id="input11"
                                                            class="form-control w-50 float-right" value="{{$text->binding_11}}">
                                                    </td>
                                                    <td><select name="binding_12_val" @disabled($text->binding_11 == null)
                                                        placeholder="select Supplier" id="input12"
                                                        class="form-control form-select w-100">
                                                        <option value="" @selected($text->binding_11 == null) disabled></option>
                                                        <option value="In-house" @selected($text->binding_12 == 'In-house')>In-house
                                                        </option>
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->id }}"
                                                                @selected($text->binding_12 == $supplier->id)>{{ $supplier->name }}
                                                            </option>
                                                        @endforeach
                                                    </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="binding_13" id="Input13"
                                                            class=" mr-5" @checked($text->binding_13 != null)> Others:
                                                        <input type="text" @disabled($text->binding_13 == null) name="binding_13_val" id="input13"
                                                            class="form-control w-50 float-right" value="{{$text->binding_13}}">
                                                    </td>
                                                    <td><select name="binding_14_val" @disabled($text->binding_13 == null)
                                                        placeholder="select Supplier" id="input14"
                                                        class="form-control form-select w-100">
                                                        <option value="" @selected($text->binding_13 == null) disabled></option>
                                                        <option value="In-house" @selected($text->binding_14 == 'In-house')>In-house
                                                        </option>
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->id }}"
                                                                @selected($text->binding_14 == $supplier->id)>{{ $supplier->name }}
                                                            </option>
                                                        @endforeach
                                                    </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="binding_15" id="Input15"
                                                            class=" mr-5" @checked($text->binding_15 != null)> Others:
                                                        <input type="text" @disabled($text->binding_15 == null) name="binding_15_val" id="input15"
                                                            class="form-control w-50 float-right" value="{{$text->binding_15}}">
                                                    </td>
                                                    <td><select name="binding_16_val" @disabled($text->binding_15 == null)
                                                        placeholder="select Supplier" id="input16"
                                                        class="form-control form-select w-100">
                                                        <option value="" @selected($text->binding_15 == null) disabled></option>
                                                        <option value="In-house" @selected($text->binding_16 == 'In-house')>In-house
                                                        </option>
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->id }}"
                                                                @selected($text->binding_16 == $supplier->id)>{{ $supplier->name }}
                                                            </option>
                                                        @endforeach
                                                    </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="binding_17" id="Input17"
                                                            class=" mr-5" @checked($text->binding_17 != null)> Others:
                                                        <input type="text" @disabled($text->binding_17 == null) name="binding_17_val" id="input17"
                                                            class="form-control w-50 float-right" value="{{$text->binding_17}}">
                                                    </td>
                                                    <td><select name="binding_18_val" @disabled($text->binding_17 == null)
                                                        placeholder="select Supplier" id="input18"
                                                        class="form-control form-select w-100">
                                                        <option value="" @selected($text->binding_17 == null) disabled></option>
                                                        <option value="In-house" @selected($text->binding_18 == 'In-house')>In-house
                                                        </option>
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->id }}"
                                                                @selected($text->binding_18 == $supplier->id)>{{ $supplier->name }}
                                                            </option>
                                                        @endforeach
                                                    </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="binding_19" id="Input19"
                                                            class=" mr-5" @checked($text->binding_19 != null)> Others:
                                                        <input type="text" @disabled($text->binding_19 == null) name="binding_19_val" id="input19"
                                                            class="form-control w-50 float-right" value="{{$text->binding_19}}">
                                                    </td>
                                                    <td><select name="binding_20_val" @disabled($text->binding_19 == null)
                                                        placeholder="select Supplier" id="input20"
                                                        class="form-control form-select w-100">
                                                        <option value="" @selected($text->binding_19 == null) disabled></option>
                                                        <option value="In-house" @selected($text->binding_20 == 'In-house')>In-house
                                                        </option>
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->id }}"
                                                                @selected($text->binding_20 == $supplier->id)>{{ $supplier->name }}
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
                                                <textarea name="catatan" id="editor1">{{$text->catatan}}</textarea>
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
                            <div class="col-md-12">
                                <button class="btn btn-primary float-right" id="save">Save</button>
                            </div>
                        </div>
                    </div>


                </div>
                <a href="{{ route('text') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
            </div>
        </div>
    </form>
@endsection
@push('custom-scripts')
    <script src="{{ url('/assets/plugins/summernote/js/summernote-bs4.min.js') }}"></script>
    <script>
        $('#save').on('click',function(){
            $('#datepicker_main').removeAttr('disabled');
            $('#mesin_section').removeAttr('disabled');
            $('#side_section').removeAttr('disabled');
            $('#last_print_parent_section').removeAttr('disabled');
            $('#kuantiti_waste_parent_section').removeAttr('disabled');
            $('#formSubmit').submit();
        })
        $(document).ready(function(){
            $('#sale_order').trigger('change');
            $('#editor').summernote();
            $('#editor1').summernote();
        });

        $("#Input1").change(function() {
            if ($(this).is(":checked")) {
                $("#staplebind").prop("disabled", false);
                 $("#staplebind").val("In-house").trigger('change');
                // $("#input1").prop("disabled", false);
            } else {
                $("#staplebind").prop("disabled", true);
                 $("#staplebind").val("").trigger('change');
                // $("#input1").prop("disabled", true);
            }
        });

        $("#Input2").change(function() {
            if ($(this).is(":checked")) {
                $("#input2").prop("disabled", false);
                $("#input2").val("In-house").trigger('change');
            } else {
                $("#input2").prop("disabled", true);
                $("#input2").val("").trigger('change');
            }
        });

        $("#Input3").change(function() {
            if ($(this).is(":checked")) {
                $("#input3").prop("disabled", false);
                $("#input3").val("In-house").trigger('change');
            } else {
                $("#input3").prop("disabled", true);
                $("#input3").val("").trigger('change');
            }
        });

        $("#Input4").change(function() {
            if ($(this).is(":checked")) {
                $("#input4").prop("disabled", false);
                $("#input4").val("In-house").trigger('change');
            } else {
                $("#input4").prop("disabled", true);
                $("#input4").val("").trigger('change');
            }
        });

        $("#Input5").change(function() {
            if ($(this).is(":checked")) {
                $("#input5").prop("disabled", false);
                $("#input5").val("In-house").trigger('change');
            } else {
                $("#input5").prop("disabled", true);
                $("#input5").val("").trigger('change');
            }
        });

        $("#Input6").change(function() {
            if ($(this).is(":checked")) {
                $("#input6").prop("disabled", false);
                $("#input6").val("In-house").trigger('change');
                // $("#input6").prop("disabled", false);
            } else {
                $("#input6").prop("disabled", true);
                $("#input6").val("").trigger('change');
                // $("#input2").prop("disabled", true);
            }
        });

        $("#Input7").change(function() {
            if ($(this).is(":checked")) {
                $("#input7").prop("disabled", false);
                $("#input7").val("In-house").trigger('change');
            } else {
                $("#input7").prop("disabled", true);
                $("#input7").val("").trigger('change');
            }
        });

        $("#Input8").change(function() {
            if ($(this).is(":checked")) {
                $("#input8").prop("disabled", false);
                $("#input8").val("In-house").trigger('change');
            } else {
                $("#input8").prop("disabled", true);
                $("#input8").val("").trigger('change');
            }
        });

        $("#Input9").change(function() {
            if ($(this).is(":checked")) {
                $("#input9").prop("disabled", false);
                $("#input10").prop("disabled", false);
                $("#input10").val("In-house").trigger('change');

            } else {
                $("#input9").prop("disabled", true);
                $("#input10").prop("disabled", true);
                $("#input10").val("").trigger('change');

            }
        });

        $("#Input11").change(function() {
            if ($(this).is(":checked")) {
                $("#input11").prop("disabled", false);
                $("#input12").prop("disabled", false);
                $("#input12").val("In-house").trigger('change');

            } else {
                $("#input11").prop("disabled", true);
                $("#input12").prop("disabled", true);
                $("#input12").val("").trigger('change');

            }
        });

        $("#Input13").change(function() {
            if ($(this).is(":checked")) {
                $("#input13").prop("disabled", false);
                $("#input14").prop("disabled", false);
                $("#input14").val("In-house").trigger('change');

            } else {
                $("#input13").prop("disabled", true);
                $("#input14").prop("disabled", true);
                $("#input14").val("").trigger('change');

            }
        });

        $("#Input15").change(function() {
            if ($(this).is(":checked")) {
                $("#input15").prop("disabled", false);
                $("#input16").prop("disabled", false);
                $("#input16").val("In-house").trigger('change');

            } else {
                $("#input15").prop("disabled", true);
                $("#input16").prop("disabled", true);
                $("#input16").val("").trigger('change');

            }
        });

        $("#Input17").change(function() {
            if ($(this).is(":checked")) {
                $("#input17").prop("disabled", false);
                $("#input18").prop("disabled", false);
                $("#input18").val("In-house").trigger('change');

            } else {
                $("#input17").prop("disabled", true);
                $("#input18").prop("disabled", true);
                $("#input18").val("").trigger('change');

            }
        });

        $("#Input19").change(function() {
            if ($(this).is(":checked")) {
                $("#input19").prop("disabled", false);
                $("#input20").prop("disabled", false);
                $("#input20").val("In-house").trigger('change');

            } else {
                $("#input19").prop("disabled", true);
                $("#input20").prop("disabled", true);
                $("#input20").val("").trigger('change');

            }
        });

        $(document).on('change', '#datepicker_main', function() {
            var value = $(this).val();
            $("#child_table tbody tr .datepicker").each(function() {
                $(this).val(value);
            });
        });

        $(document).on('keyup', '#kuantiti_waste_parent_section', function() {
            var value = $(this).val();
            $("#child_table tbody tr .kuantiti_waste_section").each(function() {
                $(this).val(value);
            });
        });

        $(document).on('keyup', '#last_print_parent_section', function() {
            var value = $(this).val();
            $("#child_table tbody tr .last_print_section").each(function() {
                $(this).val(value);
            });
        });

        $(document).on('change', '.mesin_parent_section', function() {
            var SelectedOptionValue = $(this).val();

            var selectbox = $(".mesin_section").toArray();
            selectbox.forEach(function(element) {
                $(element).val(SelectedOptionValue).trigger('change')
            })
        });

        $(document).on('change', '.side_parent_section', function() {
            var SelectedOptionValue = $(this).val();

            var selectbox = $(".side_section").toArray();
            selectbox.forEach(function(element) {
                $(element).val(SelectedOptionValue).trigger('change')
            })
        });

        $(document).on('change', '.action', function() {
            var isChecked = $(this).prop('checked');

            if (isChecked) {
                $(this).closest("tr").find('.side_parent_section').attr('disabled', 'disabled');
                $(this).closest("tr").find('.mesin_parent_section').attr('disabled', 'disabled');
                $(this).closest("tr").find('#datepicker_main').attr('disabled', 'disabled');
                $(this).closest("tr").find('#last_print_parent_section').attr('disabled', 'disabled');
                $(this).closest("tr").find('#kuantiti_waste_parent_section').attr('disabled', 'disabled');


                $("#child_table tbody tr .mesin_section ").each(function() {
                    $(this).removeAttr('disabled')
                });
                $("#child_table tbody tr .side_section ").each(function() {
                    $(this).removeAttr('disabled')
                });
                $("#child_table tbody tr .datepicker ").each(function() {
                    $(this).removeAttr('disabled')
                });
                $("#child_table tbody tr .last_print_section ").each(function() {
                    $(this).removeAttr('disabled')
                });
                $("#child_table tbody tr .kuantiti_waste_section ").each(function() {
                    $(this).removeAttr('disabled')
                });
            } else {

                $(this).closest("tr").find('.side_parent_section').removeAttr('disabled');
                $(this).closest("tr").find('.mesin_parent_section').removeAttr('disabled');
                $(this).closest("tr").find('#datepicker_main').removeAttr('disabled');
                $(this).closest("tr").find('#last_print_parent_section').removeAttr('disabled');
                $(this).closest("tr").find('#kuantiti_waste_parent_section').removeAttr('disabled');

                $("#child_table tbody tr .mesin_section").each(function() {
                    $(this).attr('disabled', 'disabled')
                });
                $("#child_table tbody tr .side_section").each(function() {
                    $(this).attr('disabled', 'disabled')
                });
                $("#child_table tbody tr .datepicker").each(function() {
                    $(this).attr('disabled', 'disabled')
                });
                $("#child_table tbody tr .last_print_section ").each(function() {
                    $(this).attr('disabled', 'disabled')
                });
                $("#child_table tbody tr .kuantiti_waste_section").each(function() {
                    $(this).attr('disabled', 'disabled')
                });

            }
        })
        var key = Math.floor(Math.random() * 100);
        $(document).on('change', '#seksyen_no', function() {
    var value = +$(this).val();
    var length = $('#child_table tbody tr').length == 0 ? 1 : $('#child_table tbody tr').length;

    if (value > 0 && value < length) {
        var currentLength = length - value;
        console.log("currentLength:", currentLength);

        for (let i = currentLength; i > 0; i--) {
            console.log("Iteration:", i);
            $('#child_table tbody tr:last-child').remove();
        }
    } else if (value <= 0) {
        $('#child_table tbody').html('');
    } else {
        for (let i = length; i <= value; i++) {
            // Check if the value already exists in the table
            var exists = false;
            $('#child_table tbody tr td:first-child').each(function() {
                if ($(this).text() == i) {
                    exists = true;
                    return false; // Exit the loop early if the value is found
                }
            });

            if (exists) {
                continue; // Skip adding the row if the value already exists
            }



            if ($('.action').prop('checked') != false) {
                var disable = '';
            } else {
                var disable = 'disabled';
            }

            $('#child_table tbody').append(`
                <tr>
                    <td>${i}</td>
                    <td> <input type="text" ${disable} name="section[${key}][date]"
                        class="form-control datepicker" value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}"
                        id="datepicker${i}" pattern="@{{ '\d{2}-\d{2}-\d{4}' }}"  class="date_section" placeholder="dd-mm-yyyy"></td>
                    <td>
                        <select name="section[${key}][machine]" ${disable} style="width:100%" id="mesin${i}" class="form-control form-select mesin_section" id="machine">
                            <option value="-1" disabled selected>Select any Mesin</option>
                            <option value="SMZP (2C)">SMZP (2C)</option>
                            <option value="RUOBI (4C)">RUOBI (4C)</option>
                            <option value="KOMORI (8C)">KOMORI (8C)</option>
                            <option value="PANTONE">PANTONE</option>
                        </select>
                    </td>
                    <td>
                        <select name="section[${key}][side]" ${disable} style="width:100%" id="side${i}" class="form-control form-select side_section" id="Ab,A/B">
                            <option value="-1" disabled selected>Select any Side</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="A/B">A/B</option>
                        </select>
                    </td>
                    <td><input type="number" ${disable} name="section[${key}][last_print]" class="form-control last_print_section" id=""></td>
                    <td><input type="number" ${disable} name="section[${key}][kuantiti_waste]" class="form-control kuantiti_waste_section" id=""></td>
                </tr>`);

                    key++

                }
            }
    $('.mesin_section').select2();
    $('.side_section').select2();
    $(".datepicker").datepicker({
        dateFormat: 'dd-mm-yy'
    });
});


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
                return data.text || "Select Sales Order No";
            }
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
                    // if(!$firstAttempt){
                        // if(data.section != null){
                        //     $('#seksyen_no').val(data.section.item_cover_text);
                        // }else{
                        //     $('#seksyen_no').val(0);
                        // }
                    // }
                }
            });
        });
    </script>
@endpush
