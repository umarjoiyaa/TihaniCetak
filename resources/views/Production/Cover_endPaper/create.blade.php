@extends('layouts.app')

@section('content')
    {{-- <link href="{{ url('/assets/plugins/summernote/css/summernote-bs4.min.css') }}" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <form action="{{ route('cover_end_paper.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="float-left"><b>PRODUCTION JOBSHEET- COVER DAN ENDPAPER</b></h5>
                                <p class="float-right">TCBS-B62 (Rev.0)</p>
                            </div>
                        </div>


                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Tarikh</label>
                                            <input type="text" name="date"
                                                value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}" class="form-control"
                                                id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Disediakan Oleh</label>
                                        <input type="text" readonly value="{{ Auth::user()->full_name }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Sales Order No.</label>
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
                                            <label for="" class="form-label">Tajuk</label>
                                            <input type="text" readonly name="" id="tajuk"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Kod Buku</label>
                                            <input type="text" readonly id="kod_buku" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Pelanggan</label>
                                            <input type="text" readonly name="" id="customer"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Kuantiti So </label>
                                            <input type="text" readonly name="" id="sale_order_qty"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Kuantiti Waste</div>
                                            <input type="text" name="kuantiti_waste" value="{{ old('kuantiti_waste') }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Jenis :</label>
                                            <select name="jenis" id="printCutSelect1" class="form-control form-select">
                                                <option value="Cover" @selected(old('jenis') == "Cover")>Cover</option>
                                                <option value="Endpaper" @selected(old('jenis') == "Endpaper")>Endpaper</option>
                                                <option value="Bookmark" @selected(old('jenis') == "Bookmark")>Bookmark</option>
                                                <option value="Divider" @selected(old('jenis') == "Divider")>Divider</option>
                                                <!-- <option value="O">O</option>
                                                <option value="STICKERS">STICKERS</option> -->
                                                <option value="Others" @selected(old('jenis') == "Others") id="selectBox1">Others</option>
                                            </select>
                                        </div>

                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Mesin</label>
                                            <select name="mesin" id="Mesin2" class="form-control form-select">
                                                <option value="SMZP (2C)" @selected(old('mesin') == "SMZP (2C)")>SMZP (2C)</option>
                                                <option value="RYOBI (4C)" @selected(old('mesin') == "RYOBI (4C)")>RYOBI (4C)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <label for="">Other (Please state)</label> -->
                                        <div id="box2">
                                            <label for="" class="OtherProduct" @if (old('jenis') == "Others") @else style="display: none;"   @endif  id="newInput">Lain-lain(Nyatakan)</label>
                                            <input type="text" class="form-control" name="other_product" class="OtherProduct" id="newInputs" value="{{ old('other_product') }}" @if(old('jenis') == "Others") @else style="display: none;" @endif>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Kertas: </div>
                                            <input type="text" name="kertas" value="{{ old('kertas') }}" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Saiz Potong:</div>
                                            <input type="text" name="saiz_potong" value="{{ old('saiz_potong') }}" id=""
                                                class="form-control">
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
                                    <h5><b>Arahan Kerja</b></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <textarea name="arahan_texteditor" id="summernote">{{ old('arahan_texteditor') }}</textarea>
                                            {{-- <div id="editor" name="arahan_texteditor"></div> --}}
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b>Print Details</b></h5>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-1"><input type="checkbox" @checked(old('front') == 'on') name="front"
                                                            id=""></div>
                                                    <div class="col-md-2">Front</div>
                                                    <div class="col-md-1"><input type="checkbox" @checked(old('back') == 'on') name="back"
                                                            id=""></div>
                                                    <div class="col-md-2">Back</div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Print</label>
                                            <select name="print" id="print2" class="form-control form-select">
                                                <option value="1C" @selected(old('print') == "1C")>1C</option>
                                                <option value="4C" @selected(old('print') == "4C")>4C</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Waste Paper</label>
                                            <input type="text" name="waste_paper" value="{{ old('waste_paper') }}" id=""
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="">Print Cut</label>
                                            <select name="print_cut" id="printSelect" class="form-control form-select">
                                                <option value="1" @selected(old('print_cut') == "1")>1</option>
                                                <option value="2" @selected(old('print_cut') == "2")>2</option>
                                                <option value="3" @selected(old('print_cut') == "3")>3</option>
                                                <option value="4" @selected(old('print_cut') == "4")>4</option>
                                                <option value="6" @selected(old('print_cut') == "6")>6</option>
                                                <option value="8" @selected(old('print_cut') == "8")>8</option>
                                                <option value="10" @selected(old('print_cut') == "10")>10</option>
                                                <option value="12" @selected(old('print_cut') == "12")>12</option>
                                                <option value="14" @selected(old('print_cut') == "14")>14</option>
                                                <option value="16" @selected(old('print_cut') == "16")>16</option>
                                                <option value="Others" @selected(old('print_cut') == "Others") id="newInputOption">Others</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <label for="">last Print</label>
                                            <input type="text" name="last_print" value="{{ old('last_print') }}" id="" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for=""></label>
                                            <div id="box">
                                                <input type="text" class="form-control" id="OtherInputs" class="OtherInput" name="other_input" value="{{ old('other_input') }}" @if(old('print_cut') == "Others") @else style="display: none;" @endif>
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
                                            <select name="plate" id="plate1" class="form-control form-select">
                                                <option value="Plate lama" @selected(old('plate') == "Plate lama")>Plate lama</option>
                                                <option value="Plate baru" @selected(old('plate') == "Plate baru")>Plate baru</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <label for="">Saiz Produk</label>
                                            <input type="text" readonly id="size" class="form-control">
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b>Finishing</b></h5>
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
                                                        <td><input type="checkbox" name="finishing_1" @checked(old('finishing_1') == 'on') id="Print3"
                                                                class=" mr-5" style="font-size:14px;">UV+Texture
                                                            Emboss <input type="text" @disabled(old('finishing_1') != 'on') name="finishing_input_1"
                                                                id="input1" class="form-control float-right"
                                                                style="width:150px;" value="{{ old('finishing_input_1') }}">
                                                        </td>
                                                        <td>
                                                            <select name="finishing_supplier_1" id="print3"  @disabled(old('finishing_1') != 'on')
                                                                class="form-control form-select" style="width:250px;">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_1') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_1') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_2" @checked(old('finishing_2') == 'on') id="Print4"
                                                                class=" mr-5">Gloss
                                                            Lamination</td>
                                                        <td><select name="finishing_supplier_2" @disabled(old('finishing_2') != 'on') id="print4"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>

                                                                <option value="In-house" @selected(old('finishing_supplier_2') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_2') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_3" @checked(old('finishing_3') == 'on') id="Print5"
                                                                class=" mr-5">Matt
                                                            Lamination</td>
                                                        <td><select name="finishing_supplier_3" @disabled(old('finishing_3') != 'on') id="print5"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_3') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_3') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_4" @checked(old('finishing_4') == 'on') id="Print6"
                                                                class=" mr-5">Spot
                                                            UV
                                                        </td>
                                                        <td><select name="finishing_supplier_4" @disabled(old('finishing_4') != 'on') id="print6"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_4') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_4') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_5" @checked(old('finishing_5') == 'on') id="Print7"
                                                                class=" mr-5">Spot
                                                            Miraval
                                                        </td>
                                                        <td><select name="finishing_supplier_5" @disabled(old('finishing_5') != 'on') id="print7"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_5') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_5') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_6" @checked(old('finishing_6') == 'on') id="Print8"
                                                                class=" mr-5">Hot
                                                            Stamping
                                                            <input type="text" @disabled(old('finishing_6') != 'on') name="finishing_input_2"
                                                                id="input2" class="form-control float-right w-50" value="{{ old('finishing_input_2') }}">
                                                        </td>
                                                        <td><select name="finishing_supplier_6" @disabled(old('finishing_6') != 'on') id="print8"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_6') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_6') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_7" @checked(old('finishing_7') == 'on') id="Print9"
                                                                class=" mr-5">Emboss
                                                        </td>
                                                        <td><select name="finishing_supplier_7" @disabled(old('finishing_7') != 'on') id="print9"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_7') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_7') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_8" @checked(old('finishing_8') == 'on') id="Print10"
                                                                class=" mr-5">Deboss
                                                        </td>
                                                        <td><select name="finishing_supplier_8" @disabled(old('finishing_8') != 'on') id="print10"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_8') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_8') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_9" @checked(old('finishing_9') == 'on') id="Print11"
                                                                class=" mr-5">UV
                                                            Vanish
                                                        </td>
                                                        <td><select name="finishing_supplier_9" @disabled(old('finishing_9') != 'on') id="print11"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_9') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_9') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_10" @checked(old('finishing_10') == 'on') id="Print12"
                                                                class=" mr-5">Spot
                                                            corse UV
                                                        </td>
                                                        <td><select name="finishing_supplier_10" @disabled(old('finishing_10') != 'on') id="print12"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_10') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_10') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_11" @checked(old('finishing_11') == 'on')  id="Print13"
                                                                class=" mr-5">Creasing
                                                            line
                                                        </td>
                                                        <td><select name="finishing_supplier_11" @disabled(old('finishing_11') != 'on') id="print13"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_11') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_11') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_12" @checked(old('finishing_12') == 'on') id="Print14"
                                                                class=" mr-5">Die
                                                            Cut
                                                        </td>
                                                        <td><select name="finishing_supplier_12" @disabled(old('finishing_12') != 'on') id="print14"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_12') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_12') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_13" @checked(old('finishing_13') == 'on') id="Print15"
                                                                class=" mr-5">Perforation
                                                        </td>
                                                        <td><select name="finishing_supplier_13" @disabled(old('finishing_13') != 'on') id="print15"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_13') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_13') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_14" @checked(old('finishing_14') == 'on') id="Print16"
                                                                class=" mr-5">Numbering
                                                        </td>
                                                        <td><select name="finishing_supplier_14" @disabled(old('finishing_14') != 'on') id="print16"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_14') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_14') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_15" @checked(old('finishing_15') == 'on') id="Print17"
                                                                class=" mr-5">Punch
                                                            Hole
                                                        </td>
                                                        <td><select name="finishing_supplier_15" @disabled(old('finishing_15') != 'on') id="print17"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_15') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_15') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_16" @checked(old('finishing_16') == 'on') id="Print18"
                                                                class=" mr-5">Round
                                                            Corner
                                                        </td>
                                                        <td><select name="finishing_supplier_16" @disabled(old('finishing_16') != 'on') id="print18"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_16') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_16') == $supplier->id)>
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="finishing_17" @checked(old('finishing_17') == 'on') id="Print19"
                                                                class=" mr-5">
                                                            Others:
                                                            <input type="text" @disabled(old('finishing_17') != 'on') name="finishing_input_3"
                                                                id="input" class="form-control w-50 float-right" value="{{ old('finishing_input_3') }}">
                                                        </td>
                                                        <td><select name="finishing_supplier_17" @disabled(old('finishing_17') != 'on') id="print19"
                                                                class="form-control form-select">
                                                                <option value="" selected disabled></option>
                                                                <option value="In-house" @selected(old('finishing_supplier_17') == 'In-house')>In-house</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" @selected(old('finishing_supplier_17') == $supplier->id)>
                                                                        {{ $supplier->name }}
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
                                            <textarea name="catatan_texteditor" id="summernote1">{{ old('catatan_texteditor') }}</textarea>
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
                        <div class="col-md-12 pb-3 pr-4">
                            <button class="btn btn-primary float-right">Save</button>
                        </div>
                    </div>
                </div>
                <a href="{{ route('cover_end_paper') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
            </div>
        </div>


    </form>
@endsection
@push('custom-scripts')
    <script src="{{ url('/assets/plugins/summernote/js/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
            $('#summernote1').summernote();



            $('#printSelect').change(function() {
                if ($(this).val() === "Others") {
                    $('input[name=other_input]').css('display','');
                } else {
                    $('input[name=other_input]').css('display','none');
                }
            });

            $('#printCutSelect1').change(function() {
                    if ($(this).val() === "Others") {
                    $('.OtherProduct').css('display','');
                    $('input[name=other_product]').css('display','');
                } else {
                    $('.OtherProduct').css('display','none');
                    $('input[name=other_product]').css('display','none');
                }
            });

            // var currentDate = new Date();

            // var formattedDate = currentDate.toISOString().slice(0, 10);

            // $("#currentDateInput").val(formattedDate);
            var quill = new Quill('#editor', {
                theme: 'snow'
            });

            var quill1 = new Quill('#editor1', {
                theme: 'snow'
            });

            $("#Print3").change(function() {
                if ($(this).is(":checked")) {
                    $("#print3").prop("disabled", false);
                    $("#print3").val("In-house").trigger('change')
                    $("#input1").prop("disabled", false);
                } else {
                    $("#print3").prop("disabled", true);
                    $("#print3").val("").trigger('change')
                    $("#input1").prop("disabled", true);
                }
            });

            $("#Print4").change(function() {
                if ($(this).is(":checked")) {
                    $("#print4").prop("disabled", false);
                    $("#print4").val("In-house").trigger('change')
                } else {
                    $("#print4").prop("disabled", true);
                    $("#print4").val("").trigger('change');
                }
            });

            $("#Print5").change(function() {
                if ($(this).is(":checked")) {
                    $("#print5").prop("disabled", false);
                    $("#print5").val("In-house").trigger('change')
                } else {
                    $("#print5").prop("disabled", true);
                    $("#print5").val("").trigger('change')
                }
            });

            $("#Print6").change(function() {
                if ($(this).is(":checked")) {
                    $("#print6").prop("disabled", false);
                    $("#print6").val("In-house").trigger('change')
                } else {
                    $("#print6").prop("disabled", true);
                    $("#print6").val("").trigger('change')
                }
            });

            $("#Print7").change(function() {
                if ($(this).is(":checked")) {
                    $("#print7").prop("disabled", false);
                    $("#print7").val("In-house").trigger('change')
                } else {
                    $("#print7").prop("disabled", true);
                    $("#print7").val("").trigger('change')
                }
            });

            $("#Print8").change(function() {
                if ($(this).is(":checked")) {
                    $("#print8").prop("disabled", false);
                    $("#print8").val("In-house").trigger('change')
                    $("#input2").prop("disabled", false);
                } else {
                    $("#print8").prop("disabled", true);
                    $("#print8").val("").trigger('change')
                    $("#input2").prop("disabled", true);
                }
            });

            $("#Print9").change(function() {
                if ($(this).is(":checked")) {
                    $("#print9").prop("disabled", false);
                    $("#print9").val("In-house").trigger('change')
                } else {
                    $("#print9").prop("disabled", true);
                    $("#print9").val("").trigger('change')
                }
            });

            $("#Print10").change(function() {
                if ($(this).is(":checked")) {
                    $("#print10").prop("disabled", false);
                    $("#print10").val("In-house").trigger('change')
                } else {
                    $("#print10").prop("disabled", true);
                    $("#print10").val("").trigger('change')
                }
            });

            $("#Print11").change(function() {
                if ($(this).is(":checked")) {
                    $("#print11").prop("disabled", false);
                    $("#print11").val("In-house").trigger('change')
                    // $("#input1").prop("disabled", false);
                } else {
                    $("#print11").prop("disabled", true);
                    $("#print11").val("").trigger('change')
                    // $("#input1").prop("disabled", true);
                }
            });

            $("#Print12").change(function() {
                if ($(this).is(":checked")) {
                    $("#print12").prop("disabled", false);
                    $("#print12").val("In-house").trigger('change')
                } else {
                    $("#print12").prop("disabled", true);
                    $("#print12").val("").trigger('change')
                }
            });

            $("#Print13").change(function() {
                if ($(this).is(":checked")) {
                    $("#print13").prop("disabled", false);
                    $("#print13").val("In-house").trigger('change')
                } else {
                    $("#print13").prop("disabled", true);
                    $("#print13").val("").trigger('change')
                }
            });

            $("#Print14").change(function() {
                if ($(this).is(":checked")) {
                    $("#print14").prop("disabled", false);
                    $("#print14").val("In-house").trigger('change')
                } else {
                    $("#print14").prop("disabled", true);
                    $("#print14").val("").trigger('change')
                }
            });

            $("#Print15").change(function() {
                if ($(this).is(":checked")) {
                    $("#print15").prop("disabled", false);
                    $("#print15").val("In-house").trigger('change')
                } else {
                    $("#print15").prop("disabled", true);
                    $("#print15").val("").trigger('change')
                }
            });

            $("#Print16").change(function() {
                if ($(this).is(":checked")) {
                    $("#print16").prop("disabled", false);
                    $("#print16").val("In-house").trigger('change')
                } else {
                    $("#print16").prop("disabled", true);
                    $("#print16").val("").trigger('change')
                }
            });

            $("#Print17").change(function() {
                if ($(this).is(":checked")) {
                    $("#print17").prop("disabled", false);
                    $("#print17").val("In-house").trigger('change')
                } else {
                    $("#print17").prop("disabled", true);
                    $("#print17").val("").trigger('change')
                }
            });

            $("#Print18").change(function() {
                if ($(this).is(":checked")) {
                    $("#print18").prop("disabled", false);
                    $("#print18").val("In-house").trigger('change')
                } else {
                    $("#print18").prop("disabled", true);
                    $("#print18").val("").trigger('change')
                }
            });

            $("#Print19").change(function() {
                if ($(this).is(":checked")) {
                    $("#print19").prop("disabled", false);
                    $("#print19").val("In-house").trigger('change')
                    $("#input").prop("disabled", false);
                } else {
                    $("#print19").prop("disabled", true);
                    $("#print19").val("").trigger('change')
                    $("#input").prop("disabled", true);
                }
            });

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
                        $('#size').val(data.sale_order.size);
                        $('#status').val(data.sale_order.status);
                        $('#sale_order_qty').val(data.sale_order.sale_order_qty);
                    }
                });
            });

        });
    </script>
@endpush
