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

                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Production Button</b></h5>
                                </div>
                                <div class="col-md-4 ">
                                    <button id="play" onclick="machineStarter(1, {{ $printing_process->id }})"
                                        type="button" class="btn btn-light w-100" style="border:1px solid black;"><i
                                            class="la la-play" style="font-size:20px;"></i>Start</button>
                                </div>
                                <div class="col-md-4">
                                    <button id="pause" type="button" class="btn btn-light w-100"
                                        style="border:1px solid black;"><i class="la la-pause"
                                            style="font-size:20px;"></i>Pause</button>
                                </div>
                                <div class="col-md-4  ">
                                    <div class="box">
                                        <button id="stop" onclick="machineStarter(3, {{ $printing_process->id }})"
                                            type="button" class="btn btn-light w-100" style="border:1px solid black;"><i
                                                class="la la-stop-circle" style="font-size:20px;"></i>Stop</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div id="msg" class="col-12 text-center"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Tarikh</label>
                                        <input type="text" name="date" value="{{ $printing_process->text->date }}"
                                            class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                            placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Disediakan Oleh</label>
                                    <input type="text" readonly value="{{ $printing_process->text->user->full_name }}"
                                        class="form-control">
                                    <input type="hidden" value="{{ Auth::user()->full_name }}" id="checked_by">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Operator</label>
                                        @php
                                            $item = json_decode($printing_process->operator);
                                        @endphp
                                        <select name="operator[]" class="form-control form-select" id="operator" multiple>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    @if ($item) {{ in_array($user->id, $item) ? 'selected' : '' }} @endif>
                                                    {{ $user->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select name="sale_order" data-id="{{ $printing_process->text->sale_order_id }}"
                                            id="sale_order" class="form-control">
                                            <option value="{{ $printing_process->text->sale_order_id }}" selected
                                                style="color: black; !important">
                                                {{ $printing_process->text->sale_order->order_no }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" readonly id="kod_buku" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label"> Tajuk</div>
                                        <input type="text" id="tajuk" readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Pelanggan</div>
                                        <input type="text" readonly id="customer" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kuantiti So </div>
                                        <input type="text" readonly id="sale_order_qty" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kuantiti Waste</div>
                                        <input type="number" name="kuantiti_waste"
                                            value="{{ $printing_process->text->kuantiti_waste }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Lebihan Stok</div>
                                        <input type="number" id="extra_stock" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Mesin</div>
                                        <select name="mesin" id="mesin" class="form-control form-select">
                                            <option value="SMZP (2C)" @selected($printing_process->text->mesin == 'SMZP (2C)')>SMZP (2C)</option>
                                            <option value="RUOBI (4C)" @selected($printing_process->text->mesin == 'RUOBI (4C)')>RUOBI (4C)</option>
                                            <option value="KOMORI (8C)" @selected($printing_process->text->mesin == 'KOMORI (8C)')>KOMORI (8C)
                                            </option>
                                            <option value="PANTONE" @selected($printing_process->text->mesin == 'PANTONE')>PANTONE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kertas: </div>
                                        <input type="text" name="kertas"
                                            value="{{ $printing_process->text->kertas }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Saiz Potong:</div>
                                        <input type="text" name="saiz_potong"
                                            value="{{ $printing_process->text->saiz_potong }}" class="form-control">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff; border-radius:5px;">
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
                                            <textarea name="arahan_kerja" id="editor">{{ $printing_process->text->arahan_kerja }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff; border-radius:5px;">
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
                                        <option value="Plate lama" @selected($printing_process->text->plate == 'Plate lama')>Plate lama</option>
                                        <option value="Plate baru" @selected($printing_process->text->plate == 'Plate baru')>Plate baru</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="">Saiz Produk</label>
                                    <input type="text" readonly id="size" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff; border-radius:5px;">
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h5><b>Text</b></h5>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Print</label>
                                    <select name="print" id="print1" class="form-control form-select">
                                        <option value="1C" @selected($printing_process->text->print == '1C')>1C</option>
                                        <option value="2C" @selected($printing_process->text->print == '2C')>2C</option>
                                        <option value="4C" @selected($printing_process->text->print == '4C')>4C</option>
                                    </select>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-2">
                                    <label for="">Waste Paper</label>
                                    <input type="text" name="waste_paper"
                                        value="{{ $printing_process->text->waste_paper }}" class="form-control">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="">last Print</label>
                                    <input type="text" name="last_print"
                                        value="{{ $printing_process->text->last_print }}" class="form-control">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff; border-radius:5px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Seksyen</b></h5>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Seksyen No.</label>
                                    <input type="number" name="seksyen_no"
                                        value="{{ $printing_process->text->seksyen_no }}" id="seksyen_no"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Seksyen No</th>
                                                    <th>Side</th>
                                                </tr>
                                            <tbody>
                                                @foreach ($printing_process->text->details as $value)
                                                    @if ($value->machine == $printing_process->machine)
                                                        <tr>
                                                            <td>{{ $value->seksyen_no }}</td>
                                                            <td>{{ $value->side }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff; border-radius:5px;">
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
                                                        class=" mr-5" @checked($printing_process->text->binding_1 != null)>Staple Bind</td>
                                                <td>
                                                    <select name="binding_1_val" @disabled($printing_process->text->binding_1 == null)
                                                        placeholder="select Supplier" id="staplebind"
                                                        class="form-control form-select" style="width:340px;">
                                                        <option value="In-house" @selected($printing_process->text->binding_1 == 'In-house')>In-house
                                                        </option>
                                                        <option value="SupplierA" @selected($printing_process->text->binding_1 == 'SupplierA')>
                                                            Supplier A
                                                        </option>
                                                        <option value="SupplierB" @selected($printing_process->text->binding_1 == 'SupplierB')>
                                                            Supplier B
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="binding_2" id="Input2"
                                                        class=" mr-5" @checked($printing_process->text->binding_2 != null)>Perfect Bind</td>
                                                <td><input type="text" @disabled($printing_process->text->binding_2 == null)
                                                        name="binding_2_val" id="input2" class="form-control"
                                                        value="{{ $printing_process->text->binding_2 }}"></td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" name="binding_3" id="Input3"
                                                        class=" mr-5" @checked($printing_process->text->binding_3 != null)>Lock Bind</td>
                                                <td><input type="text" @disabled($printing_process->text->binding_3 == null)
                                                        name="binding_3_val" id="input3" class="form-control"
                                                        value="{{ $printing_process->text->binding_3 }}"></td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" name="binding_4" id="Input4"
                                                        class=" mr-5" @checked($printing_process->text->binding_4 != null)>Wire O
                                                </td>
                                                <td><input type="text" @disabled($printing_process->text->binding_4 == null)
                                                        name="binding_4_val" id="input4" class="form-control"
                                                        value="{{ $printing_process->text->binding_4 }}"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="binding_5" id="Input5"
                                                        class=" mr-5" @checked($printing_process->text->binding_5 != null)>Hard Cover -
                                                    Square Back
                                                </td>
                                                <td><input type="text" @disabled($printing_process->text->binding_5 == null)
                                                        name="binding_5_val" id="input5" class="form-control"
                                                        value="{{ $printing_process->text->binding_5 }}"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="binding_6" id="Input6"
                                                        class=" mr-5" @checked($printing_process->text->binding_6 != null)>Hard Cover -
                                                    Round Back</td>
                                                <td><input type="text" @disabled($printing_process->text->binding_6 == null)
                                                        name="binding_6_val" id="input6" class="form-control"
                                                        value="{{ $printing_process->text->binding_6 }}"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="binding_7" id="Input7"
                                                        class=" mr-5" @checked($printing_process->text->binding_7 != null)>Sewing
                                                </td>
                                                <td><input type="text" @disabled($printing_process->text->binding_7 == null)
                                                        name="binding_7_val" id="input7" class="form-control"
                                                        value="{{ $printing_process->text->binding_7 }}"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="binding_8" id="Input8"
                                                        class=" mr-5" @checked($printing_process->text->binding_8 != null)>Round corner
                                                </td>
                                                <td><input type="text" @disabled($printing_process->text->binding_8 == null)
                                                        name="binding_8_val" id="input8" class="form-control"
                                                        value="{{ $printing_process->text->binding_8 }}"></td>
                                            </tr>


                                            <tr>
                                                <td><input type="checkbox" name="binding_9" id="Input9"
                                                        class=" mr-5" @checked($printing_process->text->binding_9 != null)> Others:
                                                    <input type="text" @disabled($printing_process->text->binding_9 == null)
                                                        name="binding_9_val" id="input10"
                                                        class="form-control w-50 float-right"
                                                        value="{{ $printing_process->text->binding_9 }}">
                                                </td>
                                                <td><input type="text" @disabled($printing_process->text->binding_9 == null)
                                                        name="binding_10_val" id="input9" class="form-control"
                                                        value="{{ $printing_process->text->binding_10 }}"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card w-100" style="background:#f4f4ff; border-radius:5px;">
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
                                            <textarea name="catatan" id="editor1">{{ $printing_process->text->catatan }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff; border-radius:5px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Jobsheet Details</h4>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="jobsheet_detail_table">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Start datetime</th>
                                                <th>End datetime</th>
                                                <th>Total Time(min)</th>
                                                <th>Machine</th>
                                                <th>Remarks</th>
                                                <th>Operator</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($details as $detail)
                                                <tr>
                                                    <td><button type="button" data-toggle="modal"
                                                            data-target="#exampleModal"
                                                            class="btn btn-primary openModal">+</button>
                                                        <input type="hidden" class="hiddenId"
                                                            value="{{ $detail->id }}">
                                                    </td>
                                                    <td>{{ $detail->start_time }}</td>
                                                    <td>{{ $detail->end_time }}</td>
                                                    <td>{{ $detail->duration }}</td>
                                                    <td>
                                                        {{ $detail->machine }}
                                                    </td>
                                                    <td>{{ $detail->remarks }}</td>
                                                    <td class="operator_text"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff; border-radius:5px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Production Machine Detail</b></h5>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="machine_detail_table">
                                        <thead>
                                            <tr>
                                                <th>Process</th>
                                                <th>Machine</th>
                                                <th>Start datetime</th>
                                                <th>End datetime</th>
                                                <th>Total time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($details as $detail)
                                                <tr>
                                                    <td>
                                                        @if ($detail->status == 1)
                                                            <span class="badge badge-success">Started</span>
                                                        @elseif ($detail->status == 2)
                                                            <span class="badge badge-warning">Paused</span>
                                                        @elseif ($detail->status == 3)
                                                            <span class="badge badge-danger">Stopped</span>
                                                        @else
                                                            <span class="badge badge-info">Not-initiated</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $detail->machine }}
                                                    </td>
                                                    <td>{{ $detail->start_time }}</td>
                                                    <td>{{ $detail->end_time }}</td>
                                                    <td>{{ $detail->duration }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-12 d-flex justify-content-end">
                                <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Production Output Details</h5>
                                                <span aria-hidden="true">&times;</span>
                                                <input type="hidden" class="printing_detail_id">
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="modalTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Section No.</th>
                                                                <th>Side</th>
                                                                <th>Last Print</th>
                                                                <th>Waste paper</th>
                                                                <th>Rejection</th>
                                                                <th>Good count</th>
                                                                <th>Check</th>
                                                                <th></th>
                                                                <th>Verify</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="text" name="" id=""
                                                                        class="form-control section_no" readonly></td>
                                                                <td><select name="" id="" class="form-control side">
                                                                        <option value="">Select Side</option>
                                                                        <option value="A">A</option>
                                                                        <option value="B">B</option>
                                                                        <option value="A/B">A/B</option>
                                                                    </select></td>
                                                                <td><input type="text" name="" id=""
                                                                        class="form-control last_print"></td>
                                                                <td><input type="text" name="" id=""
                                                                        class="form-control waste_paper"></td>
                                                                <td><input type="text" name="" id=""
                                                                        class="form-control rejection"></td>
                                                                <td><input type="text" name="" id="" readonly
                                                                        class="form-control good_count"></td>
                                                                <td><button type="button" class="btn btn-primary check_operator">Check</button></td>
                                                                <td><input type="text" name="" id="" readonly
                                                                        class="form-control check_operator_text"></td>
                                                                <td><button disabled type="button"
                                                                        class="btn btn-primary check_verify">Verify</button></td>
                                                                <td><input type="text" name="" id="" readonly
                                                                        class="form-control check_verify_text"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('printing_process') }}">back to list</a>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script src="{{ url('/assets/plugins/summernote/js/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#sale_order').trigger('change');
            $('#operator').trigger('change');
            $('input,select,textarea').attr('disabled', 'disabled');
            $('#editor').summernote();
            $('#editor1').summernote();
            check_machines(@json($check_machines));

            sessionStorage.clear();
            var detailsb = @json($detailbs);
            detailsb.forEach(element => {
                let dataObject = {
                    section_no: element.section_no,
                    side: element.side,
                    last_print: element.last_print,
                    waste_paper: element.waste_paper,
                    rejection: element.rejection,
                    good_count: element.good_count,
                    check_operator_text: element.check_operator_text,
                    check_verify_text: element.check_verify_text,
                    hiddenId: element.printing_detail_id
                };

                sessionStorage.setItem(`formData${element.printing_detail_id}`, JSON.stringify(dataObject));
            });

            var jumlahSection = @json($printing_process->text->seksyen_no);
            $('#section_nos').append(`<option selected disabled>Select Seksyen No</option>`);
            for (let index = 0; index < jumlahSection; index++) {
                $('#section_nos').append(`<option value="${index+1}">Seksyen ${index+1}</option>`);
            }
        });

        function check_machines(check_machines) {
            if (check_machines != null) {
                if (check_machines.status == 1) {
                    $('#play').attr('disabled', 'disabled');
                    $('#pause').removeAttr('disabled');
                    $('#stop').removeAttr('disabled');
                    $('#play').addClass('btn-success');
                    $('#play').removeClass('btn-light');
                    $('#pause').addClass('btn-light');
                    $('#stop').addClass('btn-light');
                    $('#pause').removeClass('btn-warning');
                    $('#stop').removeClass('btn-danger');
                } else if (check_machines.status == 2) {
                    $('#pause').attr('disabled', 'disabled');
                    $('#play').removeAttr('disabled');
                    $('#stop').attr('disabled', 'disabled');
                    $('#pause').addClass('btn-warning');
                    $('#pause').removeClass('btn-light');
                    $('#play').addClass('btn-light');
                    $('#stop').addClass('btn-light');
                    $('#play').removeClass('btn-success');
                    $('#stop').removeClass('btn-danger');
                } else if (check_machines.status == 3) {
                    $('#stop').attr('disabled', 'disabled');
                    $('#pause').attr('disabled', 'disabled');
                    $('#play').attr('disabled', 'disabled');
                    $('#stop').addClass('btn-danger');
                    $('#stop').removeClass('btn-light');
                    $('#play').addClass('btn-light');
                    $('#pause').addClass('btn-light');
                    $('#play').removeClass('btn-success');
                    $('#pause').removeClass('btn-warning');
                }
            } else {
                $('#play').removeAttr('disabled');
                $('#pause').attr('disabled', 'disabled');
                $('#stop').attr('disabled', 'disabled');
            }
        }

        $('#operator').on('change', function() {
            $('.operator_text').empty();
            $(this).find('option:selected').each(function() {
                var badge = $('<span class="badge badge-primary mx-1">' + $(this).text() + '</span>');
                $('.operator_text').append(badge);
            });
        });

        $(document).on('click', '.openModal', function() {
            let hiddenId = $(this).closest('tr').find('.hiddenId').val();
            $('.printing_detail_id').val(hiddenId);
            let storedData = sessionStorage.getItem(`formData${hiddenId}`);
            let formData = JSON.parse(storedData);

            if (formData != null) {
                $('#modalTable tbody').find('.section_no').val(formData.section_no);
                $('#modalTable tbody').find('.side').val(formData.side);
                $('#modalTable tbody').find('.last_print').val(formData.last_print);
                $('#modalTable tbody').find('.waste_paper').val(formData.waste_paper);
                $('#modalTable tbody').find('.rejection').val(formData.rejection);
                $('#modalTable tbody').find('.good_count').val(formData.good_count);
                $('#section_nos').val(formData.section_no);
                $('#modalTable tbody').find('.check_operator_text').val(formData.check_operator_text);
                $('#modalTable tbody').find('.check_verify_text').val(formData.check_verify_text);
                $('#modalTable tbody').find('.check_operator').attr('disabled', 'disabled');
                $('#modalTable tbody').find('.check_verify').attr('disabled', 'disabled');
            } else {
                $('#modalTable tbody').find('.section_no').val('');
                $('#modalTable tbody').find('.side').val('');
                $('#modalTable tbody').find('.last_print').val('');
                $('#modalTable tbody').find('.waste_paper').val('');
                $('#modalTable tbody').find('.rejection').val('');
                $('#modalTable tbody').find('.good_count').val('');
                $('#modalTable tbody').find('.check_operator_text').val('');
                $('#modalTable tbody').find('.check_verify_text').val('');
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
                    $('#kod_buku').val(data.sale_order.kod_buku);
                    $('#tajuk').val(data.sale_order.description);
                    $('#customer').val(data.sale_order.customer);
                    $('#sale_order_qty').val(data.sale_order.sale_order_qty);
                    $('#status').val(data.sale_order.status);
                    $('#size').val(data.sale_order.size);
                    $('#status').val(data.sale_order.status);
                    $('#extra_stock').val(data.sale_order.extra_stock);
                }
            });
        });
    </script>
@endpush
