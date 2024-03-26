@extends('layouts.app')

@section('content')
    <form action="{{ route('digital_printing.update', $digital_printing->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="float-left"><b>PRODUCTION JOBSHEET - DIGITAL PRINTING</b></h5>
                                <p class="float-right">TCSB-B66 (Rev. 1)</p>
                            </div>
                        </div>


                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Date</label>
                                            <input type="text" name="date" value="{{ $digital_printing->date }}"
                                                class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                                placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">By</label>
                                        <input type="text" readonly name="" value="{{ Auth::user()->user_name }}"
                                            id="" class="form-control">
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="" class="form-label">Sales Order No.</label>
                                            <select name="sale_order" data-id="{{ $digital_printing->sale_order_id }}"
                                                id="sale_order" class="form-control">
                                                <option value="{{ $digital_printing->sale_order_id }}" selected
                                                    style="color: black; !important">
                                                    {{ $digital_printing->sale_order->order_no }}
                                                </option>
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
                                            <input type="text" value="{{ $digital_printing->jumlah_mukasurat }}"
                                                name="jumlah_mukasurat" id="jumlah" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Kuantiti Waste</label>
                                            <input type="number" value="{{ $digital_printing->kuantiti_waste }}"
                                                name="kuantiti_waste" id="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Remark</label>
                                            <textarea name="remarks" id="" cols="30" rows="1" class="form-control">{{ $digital_printing->remarks }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Mesin</label>
                                            <select name="mesin" id="Mesin1" class="form-control form-select">
                                                <option @selected($digital_printing->mesin == 'REVORIA SC170 FUJIFIILM') value="REVORIA SC170 FUJIFIILM">
                                                    REVORIA SC170 FUJIFIILM</option>
                                                <option @selected($digital_printing->mesin == 'OTHERS') value="OTHERS" id="selectBox">OTHERS
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="box1">
                                            @if ($digital_printing->mesin == 'OTHERS')
                                                <div id="box1"><label for="newInput">Lain-lain mesin (Sila
                                                        nyatakan)</label><input type="text" name="mesin_others"
                                                        class="form-control" id="newInput"
                                                        value="{{ $digital_printing->mesin_others }}"></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <div for="" class="form-label">Kategori job</div>
                                            <select name="kategori_job" id="kategori1" class="form-select form-control">
                                                <option value="MOCK UP" @selected($digital_printing->kategori_job == 'MOCK UP')>MOCK UP</option>
                                                <option value="PENEGELUAREN" @selected($digital_printing->kategori_job == 'PENEGELUAREN')>PENEGELUAREN
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Jenis produk</label>
                                            <select name="jenis_produk" id="printCutSelect1"
                                                class="form-control form-select">
                                                <option value="BUKU" @selected($digital_printing->jenis_produk == 'BUKU')>BUKU</option>
                                                <option value="FLYERS" @selected($digital_printing->jenis_produk == 'FLYERS')>FLYERS</option>
                                                <option value="POSTER" @selected($digital_printing->jenis_produk == 'POSTER')>POSTER</option>
                                                <option value="BUSINESS CARD" @selected($digital_printing->jenis_produk == 'BUSINESS CARD')>BUSINESS CARD
                                                </option>
                                                <option value="KAD KAHWIN" @selected($digital_printing->jenis_produk == 'KAD KAHWIN')>KAD KAHWIN</option>
                                                <option value="STICKERS" @selected($digital_printing->jenis_produk == 'STICKERS')>STICKERS</option>
                                                <option value="OTHERS" id="selectBox1" @selected($digital_printing->jenis_produk == 'OTHERS')>
                                                    OTHERS</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <!-- <label for="">Other (Please state)</label> -->
                                        <div id="box2">
                                            @if ($digital_printing->jenis_produk == 'OTHERS')
                                                <label for="newInput">Other (please state)</label><input type="text"
                                                    name="jenis_produk_others" class="form-control" id="newInput"
                                                    value="{{ $digital_printing->jenis_produk_others }}">
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div for="" class="form-label">Kertas: teks</div>
                                            <input type="text" name="kertas_teks" id="" class="form-control"
                                                value="{{ $digital_printing->kertas_teks }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div for="" class="form-label">Kertas: Cover</div>
                                            <input type="text" name="kertas_cover" id=""
                                                class="form-control" value="{{ $digital_printing->kertas_cover }}">
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
                                                <div class="col-md-1"><input type="checkbox" name="text_front"
                                                        id="" @checked($digital_printing->text_front != null)></div>
                                                <div class="col-md-2">Front</div>
                                                <div class="col-md-1"><input type="checkbox" name="text_back"
                                                        id="" @checked($digital_printing->text_back != null)></div>
                                                <div class="col-md-2">Back</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Print</label>
                                        <select name="text_print" id="print0" placeholder="Pilih print"
                                            class="form-control form-select">
                                            <option value="1C" @selected($digital_printing->text_print == '1C')>1C</option>
                                            <option value="4C" @selected($digital_printing->text_print == '4C')>4C</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Jumlah Up</label>
                                            <input type="text" name="text_jumlah_up" id=""
                                                class="form-control" value="{{ $digital_printing->text_jumlah_up }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="">Print Cut</label>
                                        <select name="text_print_cut" id="printSelect" class="form-control form-select">
                                            <option value="1" @selected($digital_printing->text_print_cut == '1')>1</option>
                                            <option value="2" @selected($digital_printing->text_print_cut == '2')>2</option>
                                            <option value="3" @selected($digital_printing->text_print_cut == '3')>3</option>
                                            <option value="4" @selected($digital_printing->text_print_cut == '4')>4</option>
                                            <option value="6" @selected($digital_printing->text_print_cut == '6')>6</option>
                                            <option value="8" @selected($digital_printing->text_print_cut == '8')>8</option>
                                            <option value="10" @selected($digital_printing->text_print_cut == '10')>10</option>
                                            <option value="12" @selected($digital_printing->text_print_cut == '12')>12</option>
                                            <option value="14" @selected($digital_printing->text_print_cut == '14')>14</option>
                                            <option value="16" @selected($digital_printing->text_print_cut == '16')>16</option>
                                            <option value="OTHERS" id="newInputOption" @selected($digital_printing->text_print_cut == 'OTHERS')>Other
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for=""></label>
                                        <div id="box">
                                            @if ($digital_printing->text_print_cut == 'OTHERS')
                                                <input type="text" name="text_print_cut_others" class="form-control"
                                                    id="newInput"
                                                    value="{{ $digital_printing->text_print_cut_others }}">
                                            @endif
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
                                                <div class="col-md-1"><input type="checkbox" name="cover_front"
                                                        id="" @checked($digital_printing->cover_front != null)></div>
                                                <div class="col-md-2">Front</div>
                                                <div class="col-md-1"><input type="checkbox" name="cover_back"
                                                        id="" @checked($digital_printing->cover_back != null)></div>
                                                <div class="col-md-2">Back</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Print</label>
                                        <select name="cover_print" id="print1" placeholder="Pilih print"
                                            class="form-control form-select">
                                            <option value="1C" @selected($digital_printing->cover_print == '1C')>1C</option>
                                            <option value="4C" @selected($digital_printing->cover_print == '$C')>4C</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <label for="">Print Cut</label>
                                        <select name="cover_print_cut" id="printSelect1"
                                            class="form-control form-select">
                                            <option value="1" @selected($digital_printing->cover_print_cut == '1')>1</option>
                                            <option value="2" @selected($digital_printing->cover_print_cut == '2')>2</option>
                                            <option value="3" @selected($digital_printing->cover_print_cut == '3')>3</option>
                                            <option value="4" @selected($digital_printing->cover_print_cut == '4')>4</option>
                                            <option value="6" @selected($digital_printing->cover_print_cut == '6')>6</option>
                                            <option value="8" @selected($digital_printing->cover_print_cut == '8')>8</option>
                                            <option value="10" @selected($digital_printing->cover_print_cut == '10')>10</option>
                                            <option value="12" @selected($digital_printing->cover_print_cut == '12')>12</option>
                                            <option value="14" @selected($digital_printing->cover_print_cut == '14')>14</option>
                                            <option value="16" @selected($digital_printing->cover_print_cut == '16')>16</option>
                                            <option value="OTHERS" id="newInputOption1" @selected($digital_printing->cover_print_cut == 'OTHERS')>
                                                Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for=""></label>
                                        <div id="box4">
                                            @if ($digital_printing->cover_print_cut == 'OTHERS')
                                                <input type="text" name="cover_print_cut_others" class="form-control"
                                                    id="newInput"
                                                    value="{{ $digital_printing->cover_print_cut_others }}">
                                            @endif
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
                                                    <td><input type="checkbox" @checked($digital_printing->finishing_1 != null)
                                                            name="finishing_1" id="Form20" class=" mr-5">Gloss
                                                        Lamination</td>
                                                    <td>
                                                        <select name="finishing_1_val" @disabled($digital_printing->finishing_1 == null)
                                                            placeholder="select Supplier" id="form20"
                                                            class="form-control form-select " style="width:250px;">
                                                            <option value="" @selected($digital_printing->finishing_1 == null) disabled></option>

                                                            <option value="In-house" @selected($digital_printing->finishing_1 == 'In-house')>In-house
                                                            </option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->finishing_1 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->finishing_2 != null)
                                                            name="finishing_2" id="Form1" class=" mr-5">Matt
                                                        Lamination</td>
                                                    <td><select name="finishing_2_val" @disabled($digital_printing->finishing_2 == null)
                                                            placeholder="select Supplier" id="form1"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing->finishing_2 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->finishing_2 == 'In-house')>In-house
                                                            </option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->finishing_2 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->finishing_3 != null)
                                                            name="finishing_3" id="Form2" class=" mr-5">SPOT UV</td>
                                                    <td><select name="finishing_3_val" @disabled($digital_printing->finishing_3 == null)
                                                            placeholder="select Supplier" id="form2"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing->finishing_3 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->finishing_3 == 'In-house')>In-house
                                                            </option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->finishing_3 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->finishing_4 != null)
                                                            name="finishing_4" id="Form3" class=" mr-5">Hot Stamping
                                                    </td>
                                                    <td><select name="finishing_4_val" @disabled($digital_printing->finishing_4 == null)
                                                            placeholder="select Supplier" id="form3"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing->finishing_4 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->finishing_4 == 'In-house')>In-house
                                                            </option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->finishing_4 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->finishing_5 != null)
                                                            name="finishing_5" id="Form4" class=" mr-5">Emboss</td>
                                                    <td><select name="finishing_5_val" @disabled($digital_printing->finishing_5 == null)
                                                            placeholder="select Supplier" id="form4"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing->finishing_5 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->finishing_5 == 'In-house')>In-house
                                                            </option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->finishing_5 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->finishing_6 != null)
                                                            name="finishing_6" id="Form5" class=" mr-5">Diecut</td>
                                                    <td><select name="finishing_6_val" @disabled($digital_printing->finishing_6 == null)
                                                            placeholder="select Supplier" id="form5"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing->finishing_6 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->finishing_6 == 'In-house')>In-house
                                                            </option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->finishing_6 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->finishing_7 != null)
                                                            name="finishing_7" id="Form6" class=" mr-5">Round corner
                                                    </td>
                                                    <td><select name="finishing_7_val" @disabled($digital_printing->finishing_7 == null)
                                                            placeholder="select Supplier" id="form6"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing->finishing_7 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->finishing_7 == 'In-house')>In-house
                                                            </option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->finishing_7 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->finishing_8 != null)
                                                            name="finishing_8" id="Form7" class=" mr-5">Round back
                                                    </td>
                                                    <td><select name="finishing_8_val" @disabled($digital_printing->finishing_8 == null)
                                                            placeholder="select Supplier" id="form7"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing->finishing_8 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->finishing_8 == 'In-house')>In-house
                                                            </option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->finishing_8 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->finishing_9 != null)
                                                            name="finishing_9" id="Form8" class=" mr-5">Square Back
                                                    </td>
                                                    <td><select name="finishing_9_val" @disabled($digital_printing->finishing_9 == null)
                                                            placeholder="select Supplier" id="form8"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing->finishing_9 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->finishing_9 == 'In-house')>In-house
                                                            </option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->finishing_9 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->finishing_10 != null)
                                                            name="finishing_10" id="Form9" class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing->finishing_10 == null)
                                                            placeholder="User Input" name="finishing_10_val"
                                                            id="input1" class="form-control w-50 float-right"
                                                            value="{{ $digital_printing->finishing_10 }}">
                                                    </td>
                                                    <td><select name="finishing_11_val" @disabled($digital_printing->finishing_11 == null)
                                                            placeholder="select Supplier" id="form9"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing->finishing_11 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->finishing_11 == 'In-house')>In-house
                                                            </option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->finishing_11 == $supplier->id)>{{ $supplier->name }}
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
                                                    <td><input type="checkbox" name="finishing_12" @checked($digital_printing->finishing_13 != null) id="Form27"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing->finishing_13 == null)
                                                            name="finishing_12_val" id="input2"
                                                            class="form-control w-50 float-right" value="{{ $digital_printing->finishing_12 }}">
                                                    </td>
                                                    <td><select name="finishing_13_val" @disabled($digital_printing->finishing_12 == null)
                                                            placeholder="select Supplier" id="form27"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing->finishing_13 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->finishing_13 == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"  @selected($digital_printing->finishing_13 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>



                                                <tr>
                                                    <td><input type="checkbox" name="finishing_14" @checked($digital_printing->finishing_15 != null) id="Form26"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing->finishing_15 == null)
                                                            name="finishing_14_val" id="input3"
                                                            class="form-control w-50 float-right" value="{{ $digital_printing->finishing_14 }}">
                                                    </td>
                                                    <td><select name="finishing_15_val" @disabled($digital_printing->finishing_14 == null)
                                                            placeholder="select Supplier" id="form26"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing->finishing_15 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->finishing_15 == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected($digital_printing->finishing_15 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_16" @checked($digital_printing->finishing_17 != null) id="Form23"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing->finishing_17 == null)
                                                            name="finishing_16_val" id="input4"
                                                            class="form-control w-50 float-right" value="{{ $digital_printing->finishing_16 }}">
                                                    </td>
                                                    <td><select name="finishing_17_val" @disabled($digital_printing->finishing_16 == null)
                                                            placeholder="select Supplier" id="form23"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing->finishing_17 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->finishing_17 == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected($digital_printing->finishing_17 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_18" @checked($digital_printing->finishing_19 != null) id="Form24"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing->finishing_19 == null)
                                                            name="finishing_18_val" id="input5"
                                                            class="form-control w-50 float-right" value="{{ $digital_printing->finishing_18 }}">
                                                    </td>
                                                    <td><select name="finishing_19_val" @disabled($digital_printing->finishing_18 == null)
                                                            placeholder="select Supplier" id="form24"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing->finishing_19 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->finishing_19 == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected($digital_printing->finishing_19 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_20" @checked($digital_printing->finishing_21 != null) id="Form25"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing->finishing_21 == null)
                                                            name="finishing_20_val" id="input6"
                                                            class="form-control w-50 float-right" value="{{ $digital_printing->finishing_20 }}">
                                                    </td>
                                                    <td><select name="finishing_21_val" @disabled($digital_printing->finishing_20 == null)
                                                            placeholder="select Supplier" id="form25"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing->finishing_21 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->finishing_21 == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected($digital_printing->finishing_21 == $supplier->id)>{{ $supplier->name }}
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
                                                    <td><input type="checkbox" @checked($digital_printing->binding_1 != null)
                                                            name="binding_1" id="Form10" class=" mr-5">Perfect
                                                        Bind
                                                    </td>
                                                    <td><select @disabled($digital_printing->binding_1 == null) name="binding_1_val"
                                                            placeholder="select Supplier" id="form10"
                                                            class="form-control form-select" style="width:250px;">
                                                            <option value="" @selected($digital_printing->binding_1 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->binding_1 == 'In-house')>In-house
                                                            </option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->binding_1 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->binding_2 != null)
                                                            name="binding_2" id="Form11" class=" mr-5">Staple Bind
                                                    </td>
                                                    <td><select name="binding_2_val" @disabled($digital_printing->binding_2 == null)
                                                            placeholder="select Supplier" id="form11"
                                                            class="form-control form-select">
                                                            <option value="" @selected($digital_printing->binding_2 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->binding_2 == 'In-house')>In-house
                                                            </option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->binding_2 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->binding_3 != null)
                                                            name="binding_3" id="Form12" class=" mr-5">Wire 0</td>
                                                    <td><select name="binding_3_val" @disabled($digital_printing->binding_3 == null)
                                                            placeholder="select Supplier" id="form12"
                                                            class="form-control form-select">
                                                            <option value="" @selected($digital_printing->binding_3 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->binding_3 == 'In-house')>In-house
                                                            </option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->binding_3 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->binding_4 != null)
                                                            name="binding_4" id="Form13" class=" mr-5">Hard Cover
                                                    </td>
                                                    <td><select name="binding_4_val" @disabled($digital_printing->binding_4 == null)
                                                            placeholder="select Supplier" id="form13"
                                                            class="form-control form-select">
                                                            <option value="" @selected($digital_printing->binding_4 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->binding_4 == 'In-house')>In-house
                                                            </option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->binding_4 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->binding_5 != null)
                                                            name="binding_5" id="Form14" class=" mr-5">Creasing
                                                        Line
                                                    </td>
                                                    <td><select name="binding_5_val" @disabled($digital_printing->binding_5 == null)
                                                            placeholder="select Supplier" id="form14"
                                                            class="form-control form-select">
                                                            <option value="" @selected($digital_printing->binding_5 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->binding_5 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->binding_5 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->binding_6 != null)
                                                            name="binding_6" id="Form15" class=" mr-5">Cut to Size
                                                    </td>
                                                    <td><select name="binding_6_val" @disabled($digital_printing->binding_6 == null)
                                                            placeholder="select Supplier" id="form15"
                                                            class="form-control form-select">
                                                            <option value="" @selected($digital_printing->binding_6 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->binding_6 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->binding_6 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->binding_7 != null)
                                                            name="binding_7" id="Form16" class=" mr-5">Folding
                                                    </td>
                                                    <td><select name="binding_7_val" @disabled($digital_printing->binding_7 == null)
                                                            placeholder="select Supplier" id="form16"
                                                            class="form-control form-select">
                                                            <option value="" @selected($digital_printing->binding_7 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->binding_7 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->binding_7 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" @checked($digital_printing->binding_8 != null)
                                                            name="binding_8" id="Form17" class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing->binding_8 == null)
                                                            placeholder="User Input" name="binding_8_val" id="input"
                                                            class="form-control w-50 float-right"
                                                            value="{{ $digital_printing->binding_8 }}">
                                                    </td>
                                                    <td><select name="binding_9_val" @disabled($digital_printing->binding_9 == null)
                                                            placeholder="select Supplier" id="form17"
                                                            class="form-control form-select">
                                                            <option value="" @selected($digital_printing->binding_9 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing->binding_9 == 'In-house')>
                                                                In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    @selected($digital_printing->binding_9 == $supplier->id)>{{ $supplier->name }}
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
                                                    <th>Binding</th>
                                                    <th>Partner</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td><input type="checkbox" name="binding_10" @checked($digital_printing_other->binding_10 != null) id="Form30"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing_other->binding_10 == null) @if($digital_printing_other->binding_10) @else disabled @endif
                                                            name="binding_10_val" id="input7"
                                                            class="form-control w-50 float-right" value="{{ $digital_printing_other->binding_10 }}">
                                                    </td>
                                                    <td><select name="binding_11_val" @disabled($digital_printing_other->binding_10 == null)
                                                            placeholder="select Supplier" id="form30"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing_other->binding_11 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing_other->binding_11 == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"  @selected($digital_printing_other->binding_11 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>



                                                <tr>
                                                    <td><input type="checkbox" name="binding_12" @checked($digital_printing_other->binding_12 != null) id="Form31"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing_other->binding_12 == null) @if($digital_printing_other->binding_12) @else disabled @endif
                                                            name="binding_12_val" id="input8"
                                                            class="form-control w-50 float-right" value="{{ $digital_printing_other->binding_12 }}">
                                                    </td>
                                                    <td><select name="binding_13_val" @disabled($digital_printing_other->binding_12 == null)
                                                            placeholder="select Supplier" id="form31"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing_other->binding_13 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing_other->binding_13 == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected($digital_printing_other->binding_13 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="binding_14" @checked($digital_printing_other->binding_14 != null) id="Form32"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing_other->binding_14 == null) @if($digital_printing_other->binding_14) @else disabled @endif
                                                            name="binding_14_val" id="input9"
                                                            class="form-control w-50 float-right" value="{{ $digital_printing_other->binding_14 }}">
                                                    </td>
                                                    <td><select name="binding_15_val" @disabled($digital_printing_other->binding_14 == null)
                                                            placeholder="select Supplier" id="form32"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing_other->binding_15 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing_other->binding_15 == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected($digital_printing_other->binding_15 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="binding_16" @checked($digital_printing_other->binding_16 != null) id="Form33"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing_other->binding_16 == null) @if($digital_printing_other->binding_16) @else disabled @endif
                                                            name="binding_16_val" id="input10"
                                                            class="form-control w-50 float-right" value="{{ $digital_printing_other->binding_16 }}">
                                                    </td>
                                                    <td><select name="binding_17_val" @disabled($digital_printing_other->binding_16 == null)
                                                            placeholder="select Supplier" id="form33"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing_other->binding_17 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing_other->binding_17 == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected($digital_printing_other->binding_17 == $supplier->id)>{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="binding_18" @checked($digital_printing_other->binding_18 != null) id="Form34"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing_other->binding_18 == null) @if($digital_printing_other->binding_18) @else disabled @endif
                                                            name="binding_18_val" id="input11"
                                                            class="form-control w-50 float-right" value="{{ $digital_printing_other->binding_18 }}">
                                                    </td>
                                                    <td><select name="binding_19_val" @disabled($digital_printing_other->binding_18 == null)
                                                            placeholder="select Supplier" id="form34"
                                                            class="form-control form-select w-100">
                                                            <option value="" @selected($digital_printing_other->binding_19 == null) disabled></option>
                                                            <option value="In-house" @selected($digital_printing_other->binding_19 == 'In-house')>In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" @selected($digital_printing_other->binding_19 == $supplier->id)>{{ $supplier->name }}
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
                    var newInput = $("<input>", {
                        type: "text",
                        name: "text_print_cut_others",
                        class: "form-control",
                        id: "newInput",

                    });

                    // Clear existing content in #box and append the new input element
                    $("#box").empty().append(newInput);
                } else {
                    // Clear the content of #box if an option other than "OTHERS" is selected
                    $("#box").empty();
                }
            });

            $('#printSelect1').change(function() {
                if ($(this).val() === "OTHERS") {
                    var newInput = $("<input>", {
                        type: "text",
                        name: "cover_print_cut_others",
                        class: "form-control",
                        id: "newInput",

                    });

                    // Clear existing content in #box1 and append the new input element
                    $("#box4").empty().append(newInput);
                } else {
                    // Clear the content of #box4 if an option other than "OTHERS" is selected
                    $("#box4").empty();
                }
            });

            $('#Mesin1').change(function() {
                if ($(this).val() === "OTHERS") {
                    var newLabel = $("<label>", {
                        for: "newInput",
                        text: "Lain-lain mesin (Sila nyatakan)"
                    });

                    var newInput = $("<input>", {
                        type: "text",
                        name: "mesin_others",
                        class: "form-control",
                        id: "newInput",
                    });

                    // Clear existing content in #box1 and append the new label and input elements
                    $("#box1").empty().append(newLabel, newInput);
                } else {
                    // Clear the content of #box1 if an option other than "OTHERS" is selected
                    $("#box1").empty();
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

            $("#Form23").change(function() {
                if ($(this).is(":checked")) {
                    $("#form23").prop("disabled", false);
                    $("#form23").val("In-house").trigger('change');
                    $("#input4").prop("disabled", false);
                } else {
                    $("#form23").prop("disabled", true);
                    $("#form23").val('').trigger('change');
                    $("#input4").prop("disabled", true);
                }
            });
            $("#Form24").change(function() {
                if ($(this).is(":checked")) {
                    $("#form24").prop("disabled", false);
                    $("#form24").val("In-house").trigger('change');
                    $("#input5").prop("disabled", false);
                } else {
                    $("#form24").prop("disabled", true);
                    $("#form24").val('').trigger('change');
                    $("#input5").prop("disabled", true);
                }
            });

            $("#Form25").change(function() {
                if ($(this).is(":checked")) {
                    $("#form25").prop("disabled", false);
                    $("#form25").val("In-house").trigger('change');
                    $("#input6").prop("disabled", false);
                } else {
                    $("#form25").prop("disabled", true);
                    $("#form25").val('').trigger('change');
                    $("#input6").prop("disabled", true);
                }
            });

            $("#Form26").change(function() {
                if ($(this).is(":checked")) {
                    $("#form26").prop("disabled", false);
                    $("#form26").val("In-house").trigger('change');
                    $("#input3").prop("disabled", false);
                } else {
                    $("#form26").prop("disabled", true);
                    $("#form26").val('').trigger('change');
                    $("#input3").prop("disabled", true);
                }
            });
            $("#Form27").change(function() {
                if ($(this).is(":checked")) {
                    $("#form27").prop("disabled", false);
                    $("#form27").val("In-house").trigger('change');
                    $("#input2").prop("disabled", false);
                } else {
                    $("#form27").prop("disabled", true);
                    $("#form27").val('').trigger('change');
                    $("#input2").prop("disabled", true);
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

            $("#Form30").change(function() {
                if ($(this).is(":checked")) {
                    $("#form30").prop("disabled", false);
                    $("#form30").val("In-house").trigger('change');
                    $("#input7").prop("disabled", false);
                } else {
                    $("#form30").prop("disabled", true);
                    $("#form30").val('').trigger('change');
                    $("#input7").prop("disabled", true);
                }
            });

            $("#Form31").change(function() {
                if ($(this).is(":checked")) {
                    $("#form31").prop("disabled", false);
                    $("#form31").val("In-house").trigger('change');
                    $("#input8").prop("disabled", false);
                } else {
                    $("#form31").prop("disabled", true);
                    $("#form31").val('').trigger('change');
                    $("#input8").prop("disabled", true);
                }
            });

            $("#Form32").change(function() {
                if ($(this).is(":checked")) {
                    $("#form32").prop("disabled", false);
                    $("#form32").val("In-house").trigger('change');
                    $("#input9").prop("disabled", false);
                } else {
                    $("#form32").prop("disabled", true);
                    $("#form32").val('').trigger('change');
                    $("#input9").prop("disabled", true);
                }
            });
            $("#Form33").change(function() {
                if ($(this).is(":checked")) {
                    $("#form33").prop("disabled", false);
                    $("#form33").val("In-house").trigger('change');
                    $("#input10").prop("disabled", false);
                } else {
                    $("#form33").prop("disabled", true);
                    $("#form33").val('').trigger('change');
                    $("#input10").prop("disabled", true);
                }
            });
            $("#Form34").change(function() {
                if ($(this).is(":checked")) {
                    $("#form34").prop("disabled", false);
                    $("#form34").val("In-house").trigger('change');
                    $("#input11").prop("disabled", false);
                } else {
                    $("#form34").prop("disabled", true);
                    $("#form34").val('').trigger('change');
                    $("#input11").prop("disabled", true);
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
        let firstAttempt = true;
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
                    if(!firstAttempt){
                        $('#jumlah').val(data.sale_order.pages_text);
                    }
                    firstAttempt = false
                }
            });
        });
    </script>
@endpush
