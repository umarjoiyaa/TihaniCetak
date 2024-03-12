@extends('layouts.app')

@section('content')
    <form action="{{ route('digital_printing.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="float-left"><b>PRODUCTION JOBSHEET - DIGITAL PRINTING</b></h5>
                                <p class="float-right">TCBS-B66 (Rev.1)</p>
                            </div>
                        </div>


                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Date</label>
                                            <input type="text" name="date"
                                                value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}" class="form-control"
                                                id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">By</label>
                                        <input type="text" readonly name="" value="{{ Auth::user()->full_name }}"
                                            id="" class="form-control">
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 mt-3">
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
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="" class="form-label">Tajuk</label>
                                            <input type="text" readonly name="" id="tajuk"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="" class="form-label">Kod Buku</label>
                                            <input type="text" readonly id="kod_buku" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Pelanggan</label>
                                            <input type="text" readonly name="" id="customer"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Saiz Produk </label>
                                            <input type="text" readonly name="" id="size"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Kuantiti SO</label>
                                            <input type="text" readonly name="" id="sale_order_qty"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Jumlah mukasurat</label>
                                            <input type="text" name="jumlah_mukasurat" value="{{ old('jumlah_mukasurat') }}" id="jumlah"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Kuantiti Waste</label>
                                            <input type="number" name="kuantiti_waste" value="{{ old('kuantiti_waste') }}" id="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Remark</label>
                                            <textarea name="remarks" id="" cols="30" rows="1" class="form-control">{{ old('remarks') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Mesin</label>
                                            <select name="mesin" id="Mesin1" class="form-control form-select">
                                                <option value="REVORIA SC170 FUJIFIILM" @selected(old('mesin') == "REVORIA SC170 FUJIFIILM")>REVORIA SC170 FUJIFIILM</option>
                                                <option value="OTHERS" id="selectBox" @selected(old('mesin') == "OTHERS")>OTHERS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="box1">
                                            @if (old('mesin') == "OTHERS")
                                            <label for="" class="mesin_element">Lain-lain mesin (Sila nyatakan)</label>
                                            <input type="text" class="form-control mesin_element" value="{{ old('mesin_others') }}" name="mesin_others">
                                            @else
                                            <label for="" style="display:none;" class="mesin_element">Lain-lain mesin (Sila nyatakan)</label>
                                            <input type="text" class="form-control mesin_element" value="{{ old('mesin_others') }}" style="display:none;" name="mesin_others">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <div for="" class="form-label">Kategori job</div>
                                            <select name="kategori_job" id="kategori1" class="form-select form-control">
                                                <option value="MOCK UP" @selected(old('kategori_job') == "MOCK UP")>MOCK UP</option>
                                                <option value="PENEGELUAREN" @selected(old('kategori_job') == "PENEGELUAREN")>PENEGELUAREN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Jenis produk</label>
                                            <select name="jenis_produk" id="printCutSelect1"
                                                class="form-control form-select">
                                                <option value="BUKU" @selected(old('jenis_produk') == "BUKU")>BUKU</option>
                                                <option value="FLYERS" @selected(old('jenis_produk') == "FLYERS")>FLYERS</option>
                                                <option value="POSTER" @selected(old('jenis_produk') == "POSTER")>POSTER</option>
                                                <option value="BUSINESS CARD" @selected(old('jenis_produk') == "BUSINESS CARD")>BUSINESS CARD</option>
                                                <option value="KAD KAHWIN" @selected(old('jenis_produk') == "KAD KAHWIN")>KAD KAHWIN</option>
                                                <option value="STICKERS" @selected(old('jenis_produk') == "STICKERS")>STICKERS</option>
                                                <option value="OTHERS" id="selectBox1" @selected(old('jenis_produk') == "OTHERS")>OTHERS</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <!-- <label for="">Other (Please state)</label> -->
                                        <div id="box2"></div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div for="" class="form-label">Kertas: Teks</div>
                                            <input type="text" name="kertas_teks" value="{{ old('kertas_teks') }}" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div for="" class="form-label">Kertas: Cover</div>
                                            <input type="text" name="kertas_cover" value="{{ old('kertas_cover') }}" id=""
                                                class="form-control">
                                        </div>
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
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                            <input type="checkbox" @checked(old('text_front') == 'on') name="text_front"
                                                            id="">
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <span>Front</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                            <input type="checkbox" @checked(old('text_back') == 'on') name="text_back"
                                                            id="">
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <span>Back</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Print</label>
                                        <select name="text_print" id="print0" placeholder="Pilih print"
                                            class="form-control form-select">
                                            <option value="1C" @selected(old('text_print') == "1C")>1C</option>
                                            <option value="4C" @selected(old('text_print') == "4C")>4C</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Jumlah Up</label>
                                            <input type="text" name="text_jumlah_up" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="">Print Cut</label>
                                        <select name="text_print_cut" id="printSelect" class="form-control form-select">
                                            <option value="1" @selected(old('text_print_cut') == "1")>1</option>
                                            <option value="2" @selected(old('text_print_cut') == "2")>2</option>
                                            <option value="3" @selected(old('text_print_cut') == "3")>3</option>
                                            <option value="4" @selected(old('text_print_cut') == "4")>4</option>
                                            <option value="6" @selected(old('text_print_cut') == "6")>6</option>
                                            <option value="8" @selected(old('text_print_cut') == "8")>8</option>
                                            <option value="10" @selected(old('text_print_cut') == "10")>10</option>
                                            <option value="12" @selected(old('text_print_cut') == "12")>12</option>
                                            <option value="14" @selected(old('text_print_cut') == "14")>14</option>
                                            <option value="16" @selected(old('text_print_cut') == "16")>16</option>
                                            <option value="OTHERS" id="newInputOption " @selected(old('text_print_cut') == "OTHERS")>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for=""></label>
                                        <div id="box">
                                            <input type="text" class="form-control" name="text_print_cut_others" value="{{ old('text_print_cut_others') }}" @if (old('text_print_cut') == "OTHERS") @else style="display:none;" @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="background:#f4f4ff; border-radius:5px;">
                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <h5><b>Cover</b></h5>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                            <input type="checkbox" @checked(old('cover_front') == 'on') name="cover_front"
                                                            id="">
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <span>Front</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                            <input type="checkbox" name="cover_back" @checked(old('cover_back') == 'on')
                                                            id="">
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <span>Back</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Print</label>
                                        <select name="cover_print" id="print1" placeholder="Pilih print"
                                            class="form-control form-select">
                                            <option value="1C" @selected(old('cover_print') == '1C')>1C</option>
                                            <option value="4C" @selected(old('cover_print') == '4C')>4C</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <label for="">Print Cut</label>
                                        <select name="cover_print_cut" id="printSelect1"
                                            class="form-control form-select">
                                            <option value="1" @selected(old('cover_print_cut') == '1')>1</option>
                                            <option value="2" @selected(old('cover_print_cut') == '2')>2</option>
                                            <option value="3" @selected(old('cover_print_cut') == '3')>3</option>
                                            <option value="4" @selected(old('cover_print_cut') == '4')>4</option>
                                            <option value="6" @selected(old('cover_print_cut') == '6')>6</option>
                                            <option value="8" @selected(old('cover_print_cut') == '8')>8</option>
                                            <option value="10" @selected(old('cover_print_cut') == '10')>10</option>
                                            <option value="12" @selected(old('cover_print_cut') == '12')>12</option>
                                            <option value="14" @selected(old('cover_print_cut') == '14')>14</option>
                                            <option value="16" @selected(old('cover_print_cut') == '16')>16</option>
                                            <option value="OTHERS" id="newInputOption1" @selected(old('cover_print_cut') == 'OTHERS')>OTHERS</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for=""></label>
                                        <div id="box4">
                                            <input type="text" class="form-control" name="cover_print_cut_others" value="{{ old('cover_print_cut_others') }}" @if (old('cover_print_cut') == "OTHERS") @else style="display:none;" @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="background:#f4f4ff; border-radius:5px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><b>Finishing</b></h5>
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
                                                    <td><input type="checkbox" name="finishing_1" @checked(old('finishing_1') == 'on') id="Form20"
                                                            class=" mr-5">Gloss
                                                        Lamination</td>
                                                    <td>
                                                        <select name="finishing_1_val" @disabled(old('finishing_1') != 'on')
                                                            placeholder="select Supplier" id="form20"
                                                            class="form-control form-select " style="width:250px;">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('finishing_1_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"  @selected(old('finishing_1_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_2" @checked(old('finishing_2') == 'on') id="Form1"
                                                            class=" mr-5">Matt
                                                        Lamination</td>
                                                    <td><select name="finishing_2_val" @disabled(old('finishing_2') != 'on')
                                                            placeholder="select Supplier" id="form1"
                                                            class="form-control form-select w-100">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('finishing_2_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('finishing_2_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_3" @checked(old('finishing_3') == 'on') id="Form2"
                                                            class=" mr-5">SPOT UV</td>
                                                    <td><select name="finishing_3_val" @disabled(old('finishing_3') != 'on')
                                                            placeholder="select Supplier" id="form2"
                                                            class="form-control form-select w-100">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('finishing_3_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('finishing_3_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_4" @checked(old('finishing_4') == 'on') id="Form3"
                                                            class=" mr-5">Hot Stamping
                                                    </td>
                                                    <td><select name="finishing_4_val" @disabled(old('finishing_4') != 'on')
                                                            placeholder="select Supplier" id="form3"
                                                            class="form-control form-select w-100">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('finishing_4_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('finishing_4_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_5" @checked(old('finishing_5') == 'on') id="Form4"
                                                            class=" mr-5">Emboss</td>
                                                    <td><select name="finishing_5_val" @disabled(old('finishing_5') != 'on')
                                                            placeholder="select Supplier" id="form4"
                                                            class="form-control form-select w-100">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('finishing_5_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('finishing_5_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_6" @checked(old('finishing_6') == 'on') id="Form5"
                                                            class=" mr-5">Diecut</td>
                                                    <td><select name="finishing_6_val" @disabled(old('finishing_6') != 'on')
                                                            placeholder="select Supplier" id="form5"
                                                            class="form-control form-select w-100">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('finishing_6_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('finishing_6_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_7" @checked(old('finishing_7') == 'on') id="Form6"
                                                            class=" mr-5">Round corner
                                                    </td>
                                                    <td><select name="finishing_7_val" @disabled(old('finishing_7') != 'on')
                                                            placeholder="select Supplier" id="form6"
                                                            class="form-control form-select w-100">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('finishing_7_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('finishing_7_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_8" @checked(old('finishing_8') == 'on') id="Form7"
                                                            class=" mr-5">Round back
                                                    </td>
                                                    <td><select name="finishing_8_val" @disabled(old('finishing_8') != 'on')
                                                            placeholder="select Supplier" id="form7"
                                                            class="form-control form-select w-100">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('finishing_8_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('finishing_8_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_9" @checked(old('finishing_9') == 'on') id="Form8"
                                                            class=" mr-5">Square Back
                                                    </td>
                                                    <td><select name="finishing_9_val" @disabled(old('finishing_9') != 'on')
                                                            placeholder="select Supplier" id="form8"
                                                            class="form-control form-select w-100">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('finishing_9_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('finishing_9_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_10" @checked(old('finishing_10') == 'on') id="Form9"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled(old('finishing_10') != 'on') @if(old('finishing_10')) @else disabled @endif placeholder="User Input"
                                                            name="finishing_10_val" id="input1"
                                                            class="form-control w-50 float-right" value="{{ old('finishing_10_val') }}">
                                                    </td>
                                                    <td><select name="finishing_11_val" @disabled(old('finishing_11') != 'on')
                                                            placeholder="select Supplier" id="form9"
                                                            class="form-control form-select w-100">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('finishing_11_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('finishing_11_val') == $supplier->id)>{{ $supplier->name }}
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

                        <div class="card" style="background:#f4f4ff; border-radius:5px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><b>Binding</b></h5>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Binding</th>
                                                    <th>Partner</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <tr>
                                                    <td><input type="checkbox" name="binding_1" @checked(old('binding_1') == 'on') id="Form10"
                                                            class=" mr-5">Perfect
                                                        Bind
                                                    </td>
                                                    <td><select @disabled(old('binding_1') != 'on') name="binding_1_val"
                                                            placeholder="select Supplier" id="form10"
                                                            class="form-control form-select" style="width:250px;">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('binding_1_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('binding_1_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="binding_2" @checked(old('binding_2') == 'on') id="Form11"
                                                            class=" mr-5">Staple Bind
                                                    </td>
                                                    <td><select name="binding_2_val" @disabled(old('binding_2') != 'on')
                                                            placeholder="select Supplier" id="form11"
                                                            class="form-control form-select">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('binding_2_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('binding_1_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="binding_3"  @checked(old('binding_3') == 'on') id="Form12"
                                                            class=" mr-5">Wire 0</td>
                                                    <td><select name="binding_3_val" @disabled(old('binding_3') != 'on')
                                                            placeholder="select Supplier" id="form12"
                                                            class="form-control form-select">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('binding_3_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('binding_3_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="binding_4" @checked(old('binding_4') == 'on') id="Form13"
                                                            class=" mr-5">Hard Cover
                                                    </td>
                                                    <td><select name="binding_4_val" @disabled(old('binding_4') != 'on')
                                                            placeholder="select Supplier" id="form13"
                                                            class="form-control form-select">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('binding_4_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('binding_4_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="binding_5" @checked(old('binding_5') == 'on') id="Form14"
                                                            class=" mr-5">Creasing
                                                        Line
                                                    </td>
                                                    <td><select name="binding_5_val" @disabled(old('binding_5') != 'on')
                                                            placeholder="select Supplier" id="form14"
                                                            class="form-control form-select">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('binding_5_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('binding_5_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="binding_6" @checked(old('binding_6') == 'on') id="Form15"
                                                            class=" mr-5">Cut to Size
                                                    </td>
                                                    <td><select name="binding_6_val" @disabled(old('binding_6') != 'on')
                                                            placeholder="select Supplier" id="form15"
                                                            class="form-control form-select">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('binding_6_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('binding_6_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="binding_7" @checked(old('binding_7') == 'on') id="Form16"
                                                            class=" mr-5">Folding
                                                    </td>
                                                    <td><select name="binding_7_val" @disabled(old('binding_7') != 'on')
                                                            placeholder="select Supplier" id="form16"
                                                            class="form-control form-select">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('binding_7_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('binding_7_val') == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="binding_8" @checked(old('binding_8') == 'on') id="Form17"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled(old('binding_8') != 'on') placeholder="User Input"
                                                            name="binding_8_val" id="input"
                                                            class="form-control w-50 float-right" value="{{ old('binding_8_val')  }}">
                                                    </td>
                                                    <td><select name="binding_9_val" @disabled(old('binding_8') != 'on')
                                                            placeholder="select Supplier" id="form17"
                                                            class="form-control form-select">
                                                            <option value="" selected disabled></option>
                                                            <option value="In-house" @selected(old('binding_9_val') == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected(old('binding_9_val') == $supplier->id)>{{ $supplier->name }}
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
                                <button class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </div>


                </div>
                <a href="{{ route('digital_printing') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
            </div>
        </div>
    </form>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#printSelect').change(function() {
                if ($(this).val() === "OTHERS") {
                    $('input[name=text_print_cut_others]').css('display','');
                } else {

                    $('input[name=text_print_cut_others]').css('display','none');

                }
            });

            $('#printSelect1').change(function() {
                if ($(this).val() === "OTHERS") {
                    $('input[name=cover_print_cut_others]').css('display','');
                } else {

                    $('input[name=cover_print_cut_others]').css('display','none');

                }
            });

            $('#Mesin1').change(function() {
                if ($(this).val() === "OTHERS") {
                    $('.mesin_element').css('display','');
                } else {

                    $('.mesin_element').css('display','none');

                }
            });

            $('#printCutSelect1').change(function() {
                if ($(this).val() === "OTHERS") {
                    var newLabel = $("<label>", {
                        for: "newInput",
                        text: "Other (please state)"
                    });

                    var newInput = $("<input>", {
                        type: "text",
                        name: "jenis_produk_others",
                        class: "form-control",
                        id: "newInput",
                    });

                    // Clear existing content in #box1 and append the new label and input elements
                    $("#box2").empty().append(newLabel, newInput);
                } else {
                    // Clear the content of #box1 if an option other than "OTHERS" is selected
                    $("#box2").empty();
                }
            });



            $("#Form1").change(function() {
                if ($(this).is(":checked")) {

                    $("#form1").prop("disabled", false);
                    $("#form1").val("In-house").trigger('change')
                } else {
                    $("#form1").val('').trigger('change');
                    $("#form1").prop("disabled", true);
                }
            });

            $("#Form2").change(function() {
                if ($(this).is(":checked")) {
                    $("#form2").prop("disabled", false);
                    $("#form2").val("In-house").trigger('change');
                } else {
                    $("#form2").val('').trigger('change');
                    $("#form2").prop("disabled", true);
                }
            });

            $("#Form3").change(function() {
                if ($(this).is(":checked")) {
                    $("#form3").prop("disabled", false);
                    $("#form3").val("In-house").trigger('change');
                } else {
                    $("#form3").val('').trigger('change');
                    $("#form3").prop("disabled", true);
                }
            });

            $("#Form4").change(function() {
                if ($(this).is(":checked")) {
                    $("#form4").prop("disabled", false);
                    $("#form4").val("In-house").trigger('change');
                } else {
                    $("#form4").val('').trigger('change');
                    $("#form4").prop("disabled", true);
                }
            });

            $("#Form5").change(function() {
                if ($(this).is(":checked")) {
                    $("#form5").prop("disabled", false);
                    $("#form5").val('In-house').trigger('change');
                } else {
                    $("#form5").val('').trigger('change');
                    $("#form5").prop("disabled", true);
                }
            });

            $("#Form6").change(function() {
                if ($(this).is(":checked")) {
                    $("#form6").prop("disabled", false);
                    $("#form6").val("In-house").trigger('change');
                } else {
                    $("#form6").val('').trigger('change');
                    $("#form6").prop("disabled", true);
                }
            });

            $("#Form7").change(function() {
                if ($(this).is(":checked")) {
                    $("#form7").prop("disabled", false);
                    $("#form7").val("In-house").trigger('change');
                } else {
                    $("#form7").val('').trigger('change');
                    $("#form7").prop("disabled", true);
                }
            });

            $("#Form8").change(function() {
                if ($(this).is(":checked")) {
                    $("#form8").prop("disabled", false);
                    $("#form8").val("In-house").trigger('change');
                } else {
                    $("#form8").val('').trigger('change');
                    $("#form8").prop("disabled", true);
                }
            });

            $("#Form9").change(function() {
                if ($(this).is(":checked")) {
                    $("#form9").prop("disabled", false);
                    $("#form9").val("In-house").trigger('change');
                    $("#input1").prop("disabled", false);
                } else {
                    $("#form9").prop("disabled", true);
                    $("#form9").val('').trigger('change');
                    $("#input1").prop("disabled", true);
                }
            });

            $("#Form10").change(function() {
                if ($(this).is(":checked")) {
                    $("#form10").prop("disabled", false);
                    $("#form10").val("In-house").trigger('change');
                } else {
                    $("#form10").val('').trigger('change');
                    $("#form10").prop("disabled", true);
                }
            });

            $("#Form11").change(function() {
                if ($(this).is(":checked")) {
                    $("#form11").prop("disabled", false);
                    $("#form11").val("In-house").trigger('change');
                } else {
                    $("#form11").val('').trigger('change');
                    $("#form11").prop("disabled", true);
                }
            });

            $("#Form12").change(function() {
                if ($(this).is(":checked")) {
                    $("#form12").prop("disabled", false);
                    $("#form12").val("In-house").trigger('change');
                } else {
                    $("#form12").val('').trigger('change');
                    $("#form12").prop("disabled", true);
                }
            });

            $("#Form13").change(function() {
                if ($(this).is(":checked")) {
                    $("#form13").prop("disabled", false);
                    $("#form13").val("In-house").trigger('change');
                } else {
                    $("#form13").val("").trigger('change');
                    $("#form13").prop("disabled", true);
                }
            });

            $("#Form14").change(function() {
                if ($(this).is(":checked")) {
                    $("#form14").prop("disabled", false);
                    $("#form14").val("In-house").trigger('change');
                } else {
                    $("#form14").val("").trigger('change');
                    $("#form14").prop("disabled", true);
                }
            });

            $("#Form15").change(function() {
                if ($(this).is(":checked")) {
                    $("#form15").prop("disabled", false);
                    $("#form15").val("In-house").trigger('change');
                } else {
                    $("#form15").val("").trigger('change');
                    $("#form15").prop("disabled", true);
                }
            });

            $("#Form16").change(function() {
                if ($(this).is(":checked")) {
                    $("#form16").prop("disabled", false);
                    $("#form16").val("In-house").trigger('change');
                } else {
                    $("#form16").val("").trigger('change');
                    $("#form16").prop("disabled", true);
                }
            });

            $("#Form17").change(function() {
                if ($(this).is(":checked")) {
                    $("#form17").prop("disabled", false);
                    $("#form17").val("In-house").trigger('change');
                    $("#input").prop("disabled", false);
                } else {
                    $("#form17").val("").trigger('change');
                    $("#form17").prop("disabled", true);
                    $("#input").prop("disabled", true);
                }
            });

            $("#Form20").change(function() {
                if ($(this).is(":checked")) {
                    $("#form20").prop("disabled", false);
                    $("#form20").val("In-house").trigger('change');
                } else {
                    $("#form20").val('').trigger('change');
                    $("#form20").prop("disabled", true);
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
                        $('#sale_order_qty').val(data.sale_order.sale_order_qty);
                        $('#jumlah').val(data.sale_order.pages_text);
                    }
                });
            });
        });
    </script>
@endpush
