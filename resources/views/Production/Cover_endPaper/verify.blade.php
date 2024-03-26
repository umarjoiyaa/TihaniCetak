@extends('layouts.app')

@section('content')
    {{-- <link href="{{ url('/assets/plugins/summernote/css/summernote-bs4.min.css') }}" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>PRODUCTION JOBSHEET- COVER DAN ENDPAPER</b></h5>
                            <p class="float-right">TCSB-B62 (Rev.0)</p>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Production Button</b></h5>
                                </div>
                                <div class="col-md-4 ">
                                    <button id="play" onclick="machineStarter(1, {{ $cover_end_paper->id }})"
                                        type="button" class="btn btn-light w-100" style="border:1px solid black;"><i
                                            class="la la-play" style="font-size:20px;"></i>Start</button>
                                </div>
                                <div class="col-md-4">
                                    <button id="pause" onclick="machineStarter(2, {{ $cover_end_paper->id }})"
                                        type="button" class="btn btn-light w-100" style="border:1px solid black;"><i
                                            class="la la-pause" style="font-size:20px;"></i>Pause</button>
                                </div>
                                <div class="col-md-4  ">
                                    <div class="box">
                                        <button id="stop" onclick="machineStarter(3, {{ $cover_end_paper->id }})"
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
                            <div class="row mt-2">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label for="">Tarikh</label>
                                        <input type="text" name="date" value="{{ $cover_end_paper->date }}"
                                            class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                            placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <label for="">Disediakan Oleh</label>
                                    <input type="text" readonly name="" value="{{ Auth::user()->user_name }}"
                                        class="form-control">
                                    <input type="hidden" value="{{ Auth::user()->user_name }}" id="checked_by">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Operator</label>
                                        @php
                                            $item = json_decode($cover_end_paper->operator);
                                        @endphp
                                        <select name="operator[]" class="form-control form-select" id="operator" multiple>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    @if ($item) {{ in_array($user->id, $item) ? 'selected' : '' }} @endif>
                                                    {{ $user->user_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label for="" class="form-label">Sales Order No.</label>
                                        <input type="text" readonly name=""
                                            value="{{ $cover_end_paper->sale_order->order_no }}" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Tajuk</label>
                                        <input type="text" readonly name="" id="tajuk" class="form-control"
                                            value="{{ $cover_end_paper->sale_order->description }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Kod Buku</label>
                                        <input type="text" readonly id="kod_buku" class="form-control"
                                            value="{{ $cover_end_paper->sale_order->kod_buku }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Pelanggan</label>
                                        <input type="text" readonly name="" id="customer" class="form-control"
                                            value="{{ $cover_end_paper->sale_order->customer }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Kuantiti SO</label>
                                        <input type="text" readonly name="" id="sale_order_qty"
                                            class="form-control"
                                            value="{{ $cover_end_paper->sale_order->sale_order_qty }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Kuantiti Waste</label>
                                        <input type="number" value="{{ $cover_end_paper->kuantiti_waste }}"
                                            name="kuantiti_waste" id="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Jenis : </label>
                                        <input type="text" value="{{ $cover_end_paper->jenis }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Mesin</label>
                                        <input type="text" value="{{ $cover_end_paper->mesin }}" class="form-control"
                                            id="machine">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!-- <label for="">Other (Please state)</label> -->
                                    <div id="box1">

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Kertas: </label>
                                        <input type="text" name="kertas" value="{{ $cover_end_paper->kertas }}"
                                            id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Saiz Potong:</label>
                                        <input type="text" name="saiz_potong"
                                            value="{{ $cover_end_paper->saiz_potong }}" id=""
                                            class="form-control">
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
                                            <textarea name="arahan_texteditor" id="summernote">{{ $cover_end_paper->arahan_texteditor }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="background:#f4f4ff; border-radius:5px;">
                            <div class="card-body">
                                <h5><b>Print Detail</b></h5>
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row mt-4 ">
                                                <div class="col-md-1"><input type="checkbox" class="checkbox"
                                                        name="front" @checked($cover_end_paper->front == 'on') id="">
                                                </div>
                                                <div class="col-md-2">Front</div>
                                                <div class="col-md-1"><input type="checkbox" class="checkbox"
                                                        name="back" @checked($cover_end_paper->back == 'on') id="">
                                                </div>
                                                <div class="col-md-2">Back</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Print</label>
                                        <select name="print" id="print2" class="form-control form-select">
                                            <option value="1C" @selected($cover_end_paper->print == '1C')>1C</option>
                                            <option value="4C" @selected($cover_end_paper->print == '4C')>4C</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Waste Paper</label>
                                        <input type="text" name="waste_paper"
                                            value="{{ $cover_end_paper->waste_paper }}" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4 ">
                                        <label for="">Print Cut</label>
                                        <select name="print_cut" id="printSelect" class="form-control form-select">
                                            <option value="1" @selected($cover_end_paper->print_cut == '1')>1</option>
                                            <option value="2" @selected($cover_end_paper->print_cut == '2')>2</option>
                                            <option value="3" @selected($cover_end_paper->print_cut == '3')>3</option>
                                            <option value="4" @selected($cover_end_paper->print_cut == '4')>4</option>
                                            <option value="6" @selected($cover_end_paper->print_cut == '6')>6</option>
                                            <option value="8" @selected($cover_end_paper->print_cut == '8')>8</option>
                                            <option value="10" @selected($cover_end_paper->print_cut == '10')>10</option>
                                            <option value="12" @selected($cover_end_paper->print_cut == '12')>12</option>
                                            <option value="14" @selected($cover_end_paper->print_cut == '14')>14</option>
                                            <option value="16" @selected($cover_end_paper->print_cut == '16')>16</option>
                                            <option value="Others" @selected($cover_end_paper->print_cut == 'Others') id="newInputOption">
                                                Others</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 ">
                                        <label for="">last Print</label>
                                        <input type="text" name="last_print"
                                            value="{{ $cover_end_paper->last_print }}" id=""
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4 ">
                                        <label for=""></label>
                                        <div id="box">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="background:#f4f4ff; border-radius:5px;">
                            <div class="card-body">
                                <h5><b>Status</b></h5>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label for="">status</label>
                                        <input type="text" readonly name="" id="status"
                                            class="form-control" value="{{ $cover_end_paper->sale_order->status }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Plate</label>
                                        <input type="text" value="{{ $cover_end_paper->plate }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Saiz Produk</label>
                                        <input type="text" readonly name="" id="saiz_produk"
                                            class="form-control" value="{{ $cover_end_paper->sale_order->size }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card " style="background:#f4f4ff; border-radius:5px;">
                            <div class="card-body">
                                <h5><b>Finishing</b></h5>
                                <div class="row">
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
                                                    <td><input type="checkbox" name="finishing_1" id="Print3"
                                                            @checked($cover_end_paper->finishing_1 == 'on') class=" mr-5"
                                                            style="font-size:14px;">UV+Texture
                                                        Emboss <input type="text" name="finishing_input_1"
                                                            id="input1" @disabled($cover_end_paper->finishing_input_1 == null)
                                                            value="{{ $cover_end_paper->finishing_input_1 }}"
                                                            class="form-control float-right" style="width:150px;">
                                                    </td>
                                                    <td>
                                                        <select name="finishing_supplier_1" id="print3"
                                                            @disabled($cover_end_paper->finishing_1 == null) class="form-control form-select"
                                                            style="width:250px;">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_1 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_1 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_2"
                                                            @checked($cover_end_paper->finishing_2 == 'on') id="Print4"
                                                            class=" mr-5">Gloss
                                                        Lamination</td>
                                                    <td><select name="finishing_supplier_2" @disabled($cover_end_paper->finishing_2 == null)
                                                            id="print4" class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_2 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_2 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_3"
                                                            @checked($cover_end_paper->finishing_3 == 'on') id="Print5"
                                                            class=" mr-5">Matt
                                                        Lamination</td>
                                                    <td><select name="finishing_supplier_3" @disabled($cover_end_paper->finishing_3 == null)
                                                            id="print5" class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_3 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_3 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_4"
                                                            @checked($cover_end_paper->finishing_4 == 'on') id="Print6"
                                                            class=" mr-5">Spot
                                                        UV
                                                    </td>
                                                    <td><select name="finishing_supplier_4" @disabled($cover_end_paper->finishing_4 == null)
                                                            id="print6" class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_4 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_4 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_5"
                                                            @checked($cover_end_paper->finishing_5 == 'on') id="Print7"
                                                            class=" mr-5">Spot
                                                        Miraval
                                                    </td>
                                                    <td><select name="finishing_supplier_5" @disabled($cover_end_paper->finishing_5 == null)
                                                            id="print7" class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_5 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_5 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_6"
                                                            @checked($cover_end_paper->finishing_6 == 'on') id="Print8"
                                                            class=" mr-5">Hot
                                                        Stamping
                                                        <input type="text" @disabled($cover_end_paper->finishing_6 == null)
                                                            name="finishing_input_2" id="input2"
                                                            value="{{ $cover_end_paper->finishing_input_2 }}"
                                                            class="form-control float-right w-50">
                                                    </td>
                                                    <td><select name="finishing_supplier_6" @disabled($cover_end_paper->finishing_6 == null)
                                                            id="print8" class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_6 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_6 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_7"
                                                            @checked($cover_end_paper->finishing_7 == 'on') id="Print9"
                                                            class=" mr-5">Emboss
                                                    </td>
                                                    <td><select name="finishing_supplier_7" @disabled($cover_end_paper->finishing_7 == null)
                                                            disabled id="print9" class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_7 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_7 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_8"
                                                            @checked($cover_end_paper->finishing_8 == 'on') id="Print10"
                                                            class=" mr-5">Deboss
                                                    </td>
                                                    <td><select name="finishing_supplier_8" @disabled($cover_end_paper->finishing_8 == null)
                                                            id="print10" class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_8 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_8 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_9"
                                                            @checked($cover_end_paper->finishing_9 == 'on') id="Print11" class=" mr-5">UV
                                                        Vanish
                                                    </td>
                                                    <td><select name="finishing_supplier_9" disabled id="print11"
                                                            class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_9 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_9 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_10 "
                                                            @checked($cover_end_paper->finishing_10 == 'on') id="Print12"
                                                            class=" mr-5">Spot
                                                        corse UV
                                                    </td>
                                                    <td><select name="finishing_supplier_10" disabled id="print12"
                                                            class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_10 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_10 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_11"
                                                            @checked($cover_end_paper->finishing_11 == 'on') id="Print13"
                                                            class=" mr-5">Creasing
                                                        line
                                                    </td>
                                                    <td><select name="finishing_supplier_11" @disabled($cover_end_paper->finishing_11 == null)
                                                            disabled id="print13" class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_11 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_11 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_12"
                                                            @checked($cover_end_paper->finishing_12 == 'on') id="Print14"
                                                            class=" mr-5">Die
                                                        Cut
                                                    </td>
                                                    <td><select name="finishing_supplier_12" @disabled($cover_end_paper->finishing_12 == null)
                                                            id="print14" class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_12 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_12 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_13"
                                                            @checked($cover_end_paper->finishing_13 == 'on') id="Print15"
                                                            class=" mr-5">Perforation
                                                    </td>
                                                    <td><select name="finishing_supplier_13" @disabled($cover_end_paper->finishing_13 == null)
                                                            id="print15" class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_13 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_13 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_14"
                                                            @checked($cover_end_paper->finishing_14 == 'on') id="Print16"
                                                            class=" mr-5">Numbering
                                                    </td>
                                                    <td><select name="finishing_supplier_14" @disabled($cover_end_paper->finishing_14 == null)
                                                            id="print16" class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_14 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_14 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_15"
                                                            @checked($cover_end_paper->finishing_15 == 'on') id="Print17"
                                                            class=" mr-5">Punch
                                                        Hole
                                                    </td>
                                                    <td><select name="finishing_supplier_15" @disabled($cover_end_paper->finishing_15 == null)
                                                            id="print17" class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_15 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_15 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_16"
                                                            @checked($cover_end_paper->finishing_16 == 'on') id="Print18"
                                                            class=" mr-5">Round
                                                        Corner
                                                    </td>
                                                    <td><select name="finishing_supplier_16" @disabled($cover_end_paper->finishing_16 == null)
                                                            id="print18" class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_16 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_16 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_17"
                                                            @checked($cover_end_paper->finishing_17 == 'on') id="Print19" class=" mr-5">
                                                        Others:
                                                        <input type="text"
                                                            value="{{ $cover_end_paper->finishing_input_3 }}"
                                                            name="finishing_input_3" id="input"
                                                            class="form-control w-50 float-right">
                                                    </td>
                                                    <td><select name="finishing_supplier_17" @disabled($cover_end_paper->finishing_17 == null)
                                                            id="print19" class="form-control form-select">
                                                            <option value="In-house" @selected($cover_end_paper->finishing_supplier_17 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($cover_end_paper->finishing_supplier_17 == $supplier->id)>{{ $supplier->name }}
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
                                        <textarea name="catatan_texteditor" id="summernote1">{{ $cover_end_paper->catatan_texteditor }}</textarea>
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
                                                    <input type="hidden" class="hiddenId" value="{{ $detail->id }}">
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
                                <h4>Total Output Details</h4>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered" id="output_table">
                                    <thead>
                                        <tr>
                                            <th>Side</th>
                                            <th>Last Print</th>
                                            <th>Waste Paper</th>
                                            <th>Rejection</th>
                                            <th>Good Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
                        <form action="{{ route('cover_end_paper.approve.approve', $cover_end_paper->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" id="storedData" name="details">
                                    <button class="btn btn-primary" type="button" id="saveForm"> Verify</button>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Production Output Details</h5>
                                            <span aria-hidden="true" data-dismiss="modal" style="color:red; font-size:30px; cursor:pointer;">&times;</span>
                                            <input type="hidden" class="cover_paper_detail_id">
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                            <table class="table table-bordered" id="modalTable">
                                                <thead>
                                                    <tr>
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
                                                        <td><select name="" id=""
                                                                class="form-control side" style="width:150px;">
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="A/B">A/B</option>
                                                            </select></td>
                                                        <td><input type="text" name="" id=""
                                                                class="form-control last_print" style="width:150px;">
                                                        </td>
                                                        <td><input type="text" name="" id=""
                                                                class="form-control waste_paper" style="width:150px;"></td>
                                                        <td><input type="text" name="" id=""
                                                                class="form-control rejection" style="width:150px;">
                                                        </td>
                                                        <td><input type="text" name="" id="" readonly
                                                                class="form-control good_count" style="width:150px;"></td>
                                                        <td><button disabled type="button"
                                                                class="btn btn-primary check_operator">Check</button></td>
                                                        <td><input type="text" name="" id="" readonly
                                                                class="form-control check_operator_text"></td>
                                                        <td><button type="button"
                                                                class="btn btn-primary check_verify">Verify</button>
                                                        </td>
                                                        <td><input type="text" name="" id="" readonly
                                                                class="form-control check_verify_text"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                id="saveModal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- <form action="{{ route('cover_end_paper.approve.decline', $cover_end_paper->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <button class="btn btn-danger mx-2" type="submit">Decline</button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('cover_end_paper') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
    </div>
    </div>
@endsection


@push('custom-scripts')
    <script src="{{ url('/assets/plugins/summernote/js/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
            $('#summernote1').summernote();

            if ($('#printCutSelect1').val() === "Others") {
                var html = `<label for="">Lain-lain (Nyatakan)</label>
                        <input type="text" name="other_product" value="{{ $cover_end_paper->other_product }}" id=""
                            class="form-control">`;


                // Clear existing content in #box and append the new label and input elements
                $("#box1").empty().append(html);
            }

            if ($('#printSelect').val() === "Others") {
                var html = `
                        <input type="text" name="other_input" value="{{ $cover_end_paper->other_input }}" id=""
                            class="form-control">`;

                $("#box").empty().append(html);

            }

            $('#printCutSelect1').change(function() {
                if ($(this).val() === "Others") {
                    var html = `<label for="">Lain-lain (Nyatakan)</label>
                        <input type="text" name="other_product"  id=""
                            class="form-control">`;
                    // Clear existing content in #box and append the new label and input elements
                    $("#box1").empty().append(html);
                }
            });

            $('input,select,textarea').attr('disabled', 'disabled');
            $('input[type="hidden"]').removeAttr('disabled');
            $('.check_verify_text').removeAttr('disabled');
            $('#operator').trigger('change');
            check_machines(@json($check_machines));

            sessionStorage.clear();
            var detailsb = @json($detailbs);
            detailsb.forEach(element => {
                let dataObject = {
                    side: element.side,
                    last_print: element.last_print,
                    waste_paper: element.waste_paper,
                    rejection: element.rejection,
                    good_count: element.good_count,
                    check_operator_text: element.check_operator_text,
                    check_verify_text: element.check_verify_text,
                    hiddenId: element.cover_paper_detail_id
                };

                sessionStorage.setItem(`formData${element.cover_paper_detail_id}`, JSON.stringify(
                    dataObject));
            });
            $('#saveModal').trigger('click');
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
            $('.cover_paper_detail_id').val(hiddenId);
            let storedData = sessionStorage.getItem(`formData${hiddenId}`);
            let formData = JSON.parse(storedData);

            if (formData != null) {
                $('#modalTable tbody').find('.side').val(formData.side);
                $('#modalTable tbody').find('.last_print').val(formData.last_print);
                $('#modalTable tbody').find('.waste_paper').val(formData.waste_paper);
                $('#modalTable tbody').find('.rejection').val(formData.rejection);
                $('#modalTable tbody').find('.good_count').val(formData.good_count);
                $('#modalTable tbody').find('.check_operator_text').val(formData.check_operator_text);
                $('#modalTable tbody').find('.check_verify_text').val(formData.check_verify_text);
                $('#modalTable tbody').find('.check_operator').attr('disabled', 'disabled');
                if (formData.check_verify_text != null) {
                    $('#modalTable tbody').find('.check_verify').attr('disabled', 'disabled');
                } else {
                    $('#modalTable tbody').find('.check_verify').removeAttr('disabled');
                }
            } else {
                $('#modalTable tbody').find('.side').val('');
                $('#modalTable tbody').find('.last_print').val('');
                $('#modalTable tbody').find('.waste_paper').val('');
                $('#modalTable tbody').find('.rejection').val('');
                $('#modalTable tbody').find('.good_count').val('');
                $('#modalTable tbody').find('.check_operator_text').val('');
                $('#modalTable tbody').find('.check_verify_text').val('');
                $('#modalTable tbody').find('.check_verify').removeAttr('disabled');
            }
        });

        $('#saveModal').on('click', function() {
            let side = $('#modalTable tbody').find('.side').val();
            let last_print = $('#modalTable tbody').find('.last_print').val();
            let waste_paper = $('#modalTable tbody').find('.waste_paper').val();
            let rejection = $('#modalTable tbody').find('.rejection').val();
            let good_count = $('#modalTable tbody').find('.good_count').val();
            let check_operator_text = $('#modalTable tbody').find('.check_operator_text').val();
            let check_verify_text = $('#modalTable tbody').find('.check_verify_text').val();
            let hiddenId = $('.cover_paper_detail_id').val();

            let dataObject = {
                side: side,
                last_print: last_print,
                waste_paper: waste_paper,
                rejection: rejection,
                good_count: good_count,
                check_operator_text: check_operator_text,
                check_verify_text: check_verify_text,
                hiddenId: hiddenId
            };

            sessionStorage.setItem(`formData${hiddenId}`, JSON.stringify(dataObject));

            let sideTotals = {
                'A': {
                    total_last_print: 0,
                    total_waste_paper: 0,
                    total_rejection: 0,
                    total_good_count: 0
                },
                'B': {
                    total_last_print: 0,
                    total_waste_paper: 0,
                    total_rejection: 0,
                    total_good_count: 0
                },
                'A/B': {
                    total_last_print: 0,
                    total_waste_paper: 0,
                    total_rejection: 0,
                    total_good_count: 0
                }
            };

            $('#output_table tbody').html('');

            $('.hiddenId').each(function() {
                let formData = sessionStorage.getItem(`formData${$(this).val()}`);
                let storedData = JSON.parse(formData);
                if (storedData !== null) {
                    let side = storedData.side;
                    sideTotals[side].total_last_print += parseFloat(storedData.last_print) || 0;
                    sideTotals[side].total_waste_paper += parseFloat(storedData.waste_paper) || 0;
                    sideTotals[side].total_rejection += parseFloat(storedData.rejection) || 0;
                    sideTotals[side].total_good_count += parseFloat(storedData.good_count) || 0;
                }
            });

            for (let side in sideTotals) {
                let sideTotal = sideTotals[side];
                $('#output_table tbody').append(`
                <tr>
                    <td>${side}</td>
                    <td>${sideTotal.total_last_print}</td>
                    <td>${sideTotal.total_waste_paper}</td>
                    <td>${sideTotal.total_rejection}</td>
                    <td>${sideTotal.total_good_count}</td>
                </tr>`);
            }
        });

        $(document).on('click', '.check_verify', function() {
            $(this).attr('disabled', 'disabled');
            const currentDate = new Date();
            const formattedDateTime = formatDateWithAMPM(currentDate);
            let checked_by = $('#checked_by').val();
            $(this).closest('tr').find('.check_verify_text').val(checked_by + '/' + formattedDateTime);
        });

        function formatDateWithAMPM(date) {
            const options = {
                timeZone: 'Asia/Kuala_Lumpur',
                hour12: true
            };
            const formattedDate = date.toLocaleString('en-US', options);
            const datePart = formattedDate.split(',')[0].trim();
            const [month, day, year] = datePart.split('/').map(part => part.padStart(2, '0'));
            const formattedDatePart = `${day}-${month}-${year}`;
            const timePart = formattedDate.split(',')[1].trim();
            const formattedDateTime = `${formattedDatePart} ${timePart}`;

            return formattedDateTime;
        }

        $('#saveForm').on('click', function() {
            let array = [];
            $('.hiddenId').each(function() {
                let storedData = sessionStorage.getItem(`formData${$(this).val()}`);
                array.push(JSON.parse(storedData));
            });
            $('#storedData').val(JSON.stringify(array));
            $(this).closest('form').submit();
        });
    </script>
@endpush
