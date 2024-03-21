@extends('layouts.app')
@section('css')
<style>

</style>
@endsection
@section('content')
    <form action="{{ route('digital_printing.proses.update', $digital_printing->id) }}" method="POST">
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

                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><b>Production Button</b></h5>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <button id="play" onclick="machineStarter(1, {{ $digital_printing->id }})"
                                            type="button" class="btn btn-light w-100" style="border:1px solid black;"><i
                                                class="la la-play" style="font-size:20px;"></i>Start</button>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <button id="pause" type="button" class="btn btn-light w-100"
                                            style="border:1px solid black;"><i class="la la-pause"
                                                style="font-size:20px;"></i>Pause</button>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="box">
                                            <button id="stop" onclick="machineStarter(3, {{ $digital_printing->id }})"
                                                type="button" class="btn btn-light w-100"
                                                style="border:1px solid black;"><i class="la la-stop-circle"
                                                    style="font-size:20px;"></i>Stop</button>
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
                                            <label for="">Date</label>
                                            <input type="text" name="date" value="{{ $digital_printing->date }}"
                                                class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                                placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">By</label>
                                        <input type="text" readonly name=""
                                            value="{{ $digital_printing->user->full_name }}" id=""
                                            class="form-control">
                                        <input type="hidden" value="{{ Auth::user()->full_name }}" id="checked_by">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Operator</label>
                                            @php
                                                $item = json_decode($digital_printing->operator);
                                            @endphp
                                            <select name="operator[]" class="form-control form-select" id="operator"
                                                multiple>
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
                                            <label for="" class="form-label">Sales Order No.</label>
                                            <input type="text" readonly name=""
                                                value="{{ $digital_printing->sale_order->order_no }}" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="" class="form-label">Tajuk</label>
                                            <input type="text" readonly name="" id="tajuk"
                                                class="form-control"
                                                value="{{ $digital_printing->sale_order->description }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="" class="form-label">Kod Buku</label>
                                            <input type="text" readonly id="kod_buku" class="form-control"
                                                value="{{ $digital_printing->sale_order->kod_buku }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Pelanggan</label>
                                            <input type="text" readonly name="" id="customer"
                                                class="form-control"
                                                value="{{ $digital_printing->sale_order->customer }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Saiz Produk </label>
                                            <input type="text" readonly name="" id="size"
                                                class="form-control" value="{{ $digital_printing->sale_order->size }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Kuantiti SO</label>
                                            <input type="text" readonly name="" id="sale_order_qty"
                                                class="form-control"
                                                value="{{ $digital_printing->sale_order->sale_order_qty }}">
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
                                            <textarea disabled name="remarks" id="" cols="30" rows="1" class="form-control">{{ $digital_printing->remarks }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Mesin</label>
                                            <input type="text" class="form-control"
                                                value="{{ $digital_printing->mesin }}">
                                        </div>
                                    </div>
                                    @if ($digital_printing->mesin == 'OTHERS')
                                        <input type="hidden" id="machine"
                                            value="{{ $digital_printing->mesin_others }}">
                                    @else
                                        <input type="hidden" id="machine" value="{{ $digital_printing->mesin }}">
                                    @endif
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
                                            <input type="text" class="form-control"
                                                value="{{ $digital_printing->kategori_job }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Jenis produk</label>
                                            <input type="text" class="form-control"
                                                value="{{ $digital_printing->jenis_produk }}">
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
                                                <div class="col-md-2">back</div>
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
                                                    <td><input type="checkbox" name="finishing_12" @checked($digital_printing->finishing_12 != null) id="Form27"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing->finishing_12 == null) @if($digital_printing->finishing_12) @else disabled @endif
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
                                                    <td><input type="checkbox" name="finishing_14" @checked($digital_printing->finishing_14 != null) id="Form26"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing->finishing_14 == null) @if($digital_printing->finishing_14) @else disabled @endif
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
                                                    <td><input type="checkbox" name="finishing_16" @checked($digital_printing->finishing_16 != null) id="Form23"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing->finishing_16 == null) @if($digital_printing->finishing_16) @else disabled @endif
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
                                                    <td><input type="checkbox" name="finishing_18" @checked($digital_printing->finishing_18 != null) id="Form24"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing->finishing_18 == null) @if($digital_printing->finishing_18) @else disabled @endif
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
                                                    <td><input type="checkbox" name="finishing_20" @checked($digital_printing->finishing_20 != null) id="Form25"
                                                            class=" mr-5"> Others:
                                                        <input type="text" @disabled($digital_printing->finishing_20 == null) @if($digital_printing->finishing_20) @else disabled @endif
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

                        <div class="card" style="background:#f4f4ff; border-radius:5px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Jobsheet Details</h4>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="table-responsive">
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
                        </div>

                        <div class="card" style="background:#f4f4ff; border-radius:5px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Total Output Details</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Last Print</th>
                                                    <th>Waste Print</th>
                                                    <th>Rejection</th>
                                                    <th>Good Count</th>
                                                    <th>Meter Click</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="total_last_print"></td>
                                                    <td class="total_waste_print"></td>
                                                    <td class="total_rejection"></td>
                                                    <td class="total_good_count"></td>
                                                    <td class="total_meter_click"></td>
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
                                        <h5><b>Production Machine Detail</b></h5>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
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
                                <input type="hidden" id="storedData" name="details">
                                <button class="btn btn-primary float-right" type="button" id="saveForm">Save</button>
                            </div>
                        </div>
                    </div>


                </div>
                <a href="{{ route('digital_printing') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content " >
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Production Output Details</h5>
                        <span aria-hidden="true" data-dismiss="modal"
                            style="color:red; font-size:30px; cursor:pointer;">&times;</span>
                        <input type="hidden" class="digital_printing_detail_id">
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="modalTable">
                                <thead>
                                    <tr>
                                        <th>Last Print</th>
                                        <th>Waste Print</th>
                                        <th>Rejection</th>
                                        <th>Good count</th>
                                        <th>Meter Click</th>
                                        <th>Check</th>
                                        <th></th>
                                        <th>Verify</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="number" name="" id=""
                                                class="form-control last_print" style="width:150px;"></td>
                                        <td><input type="number" name="" id=""
                                                class="form-control waste_print" style="width:150px;"></td>
                                        <td><input type="number" name="" id=""
                                                class="form-control rejection" style="width:150px;"></td>
                                        <td><input type="number" name="" id="" readonly
                                                class="form-control good_count" style="width:150px;"></td>
                                        <td><input type="number" name="" id=""
                                                class="form-control meter_click" style="width:150px;"></td>
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
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveModal">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="pauseModal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header d-flex jutify-content-between">
                        <h4><b>REMARKS</b></h4>
                        <h4 class="modal-title"></h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <textarea id="pauseRemarks" rows="4" class="form-control"></textarea>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" onclick="pauseMesin()">Pause</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('input,select').attr('disabled', 'disabled');
            $('input[type="hidden"]').removeAttr('disabled');
            $('.last_print').removeAttr('disabled');
            $('.waste_print').removeAttr('disabled');
            $('.rejection').removeAttr('disabled');
            $('.good_count').removeAttr('disabled');
            $('.meter_click').removeAttr('disabled');
            $('.check_operator_text').removeAttr('disabled');
            $('.check_verify_text').removeAttr('disabled');
            $('#operator').removeAttr('disabled');
            $('#operator').trigger('change');
            check_machines(@json($check_machines));

            sessionStorage.clear();
            var detailsb = @json($detailbs);
            detailsb.forEach(element => {
                let dataObject = {
                    last_print: element.last_print,
                    waste_print: element.waste_print,
                    rejection: element.rejection,
                    good_count: element.good_count,
                    meter_click: element.meter_click,
                    check_operator_text: element.check_operator_text,
                    check_verify_text: element.check_verify_text,
                    hiddenId: element.digital_detail_id
                };

                sessionStorage.setItem(`formData${element.digital_detail_id}`, JSON.stringify(dataObject));
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

        $(document).on('keyup', '.last_print, .waste_print, .rejection', function() {
            let last_print = isNaN(parseFloat($('.last_print').val())) ? 0 : parseFloat($('.last_print').val());
            let waste_print = isNaN(parseFloat($('.waste_print').val())) ? 0 : parseFloat($('.waste_print').val());
            let rejection = isNaN(parseFloat($('.rejection').val())) ? 0 : parseFloat($('.rejection').val());
            $('.good_count').val(parseFloat(last_print) - parseFloat(waste_print) - parseFloat(rejection));
        });

        $(document).on('click', '.openModal', function() {
            let hiddenId = $(this).closest('tr').find('.hiddenId').val();
            $('.digital_printing_detail_id').val(hiddenId);
            let storedData = sessionStorage.getItem(`formData${hiddenId}`);
            let formData = JSON.parse(storedData);

            if (formData != null) {
                $('#modalTable tbody').find('.last_print').val(formData.last_print);
                $('#modalTable tbody').find('.waste_print').val(formData.waste_print);
                $('#modalTable tbody').find('.rejection').val(formData.rejection);
                $('#modalTable tbody').find('.good_count').val(formData.good_count);
                $('#modalTable tbody').find('.meter_click').val(formData.meter_click);
                $('#modalTable tbody').find('.check_operator_text').val(formData.check_operator_text);
                if (formData.check_operator_text != '') {
                    $('#modalTable tbody').find('.check_operator').attr('disabled', 'disabled');
                } else {
                    $('#modalTable tbody').find('.check_operator').removeAttr('disabled');
                }
            } else {
                $('#modalTable tbody').find('.last_print').val('');
                $('#modalTable tbody').find('.waste_print').val('');
                $('#modalTable tbody').find('.rejection').val('');
                $('#modalTable tbody').find('.good_count').val('');
                $('#modalTable tbody').find('.meter_click').val('');
                $('#modalTable tbody').find('.check_operator_text').val('');
                $('#modalTable tbody').find('.check_operator').removeAttr('disabled');
            }
        });

        $('#saveModal').on('click', function() {
            let last_print = $('#modalTable tbody').find('.last_print').val();
            let waste_print = $('#modalTable tbody').find('.waste_print').val();
            let rejection = $('#modalTable tbody').find('.rejection').val();
            let good_count = $('#modalTable tbody').find('.good_count').val();
            let meter_click = $('#modalTable tbody').find('.meter_click').val();
            let check_operator_text = $('#modalTable tbody').find('.check_operator_text').val();
            let check_verify_text = $('#modalTable tbody').find('.check_verify_text').val();
            let hiddenId = $('.digital_printing_detail_id').val();

            let dataObject = {
                last_print: last_print,
                waste_print: waste_print,
                rejection: rejection,
                good_count: good_count,
                meter_click: meter_click,
                check_operator_text: check_operator_text,
                check_verify_text: check_verify_text,
                hiddenId: hiddenId
            };

            sessionStorage.setItem(`formData${hiddenId}`, JSON.stringify(dataObject));

            let total_last_print = 0;
            let total_waste_print = 0;
            let total_rejection = 0;
            let total_good_count = 0;
            let total_meter_click = 0;

            $('.hiddenId').each(function() {
                let formData = sessionStorage.getItem(`formData${$(this).val()}`);
                let storedData = JSON.parse(formData);
                if (storedData !== null) {
                    total_last_print += parseFloat(storedData.last_print) || 0;
                    total_waste_print += parseFloat(storedData.waste_print) || 0;
                    total_rejection += parseFloat(storedData.rejection) || 0;
                    total_good_count += parseFloat(storedData.good_count) || 0;
                    total_meter_click += parseFloat(storedData.meter_click) || 0;
                }
            });

            $('.total_last_print').text(total_last_print);
            $('.total_waste_print').text(total_waste_print);
            $('.total_rejection').text(total_rejection);
            $('.total_good_count').text(total_good_count);
            $('.total_meter_click').text(total_meter_click);
        });

        $(document).on('click', '.check_operator', function() {
            $(this).attr('disabled', 'disabled');
            const currentDate = new Date();
            const formattedDateTime = formatDateWithAMPM(currentDate);
            let checked_by = $('#checked_by').val();
            $(this).closest('tr').find('.check_operator_text').val(checked_by + '/' + formattedDateTime);
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
                if(storedData == null){
                    storedData = `{"hiddenId":"${$(this).val()}"}`;
                }
                array.push(JSON.parse(storedData));
            });
            $('#storedData').val(JSON.stringify(array));
            $(this).closest('form').submit();
        });

        function machineStarter(status, digital_id) {
            var machine = $("#machine").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('digital_printing.machine.starter') }}',
                data: {
                    "digital_id": digital_id,
                    "machine": machine,
                    "status": status,
                    "remarks": $('#pauseRemarks').val(),
                },
                success: function(data) {
                    $("#msg").html(data.message);
                    check_machines(data.check_machine);
                    $('#machine_detail_table tbody').empty();
                    $('#jobsheet_detail_table tbody').empty();
                    data.details.forEach(function(detail, index) {
                        var statusBadge;
                        if (detail.status == 1) {
                            statusBadge = '<span class="badge badge-success">Started</span>';
                        } else if (detail.status == 2) {
                            statusBadge = '<span class="badge badge-warning">Paused</span>';
                        } else if (detail.status == 3) {
                            statusBadge = '<span class="badge badge-danger">Stopped</span>';
                        } else {
                            statusBadge = '<span class="badge badge-info">Not-initiated</span>';
                        }

                        var mesinInfo = detail.machine;
                        var start_time = detail.start_time;
                        var remarks = (detail.remarks != null) ? detail.remarks : '';
                        var end_time = (detail.end_time != null) ? detail.end_time : '';
                        var duration = (detail.duration != null) ? detail.duration : '';

                        $('#machine_detail_table tbody').append(`<tr>
                            <td>${statusBadge}</td>
                            <td>${mesinInfo}</td>
                            <td>${start_time}</td>
                            <td>${end_time}</td>
                            <td>${duration}</td>
                        </tr>`);

                        var badge = '';
                        var button =
                            `<button type="button" data-toggle="modal"
                                                            data-target="#exampleModal" class="btn btn-primary openModal">+</button>
                                                            <input type="hidden" class="hiddenId" value="${detail.id}">`;
                        $('#operator').find('option:selected').each(function() {
                            badge += '<span class="badge badge-primary mx-1">' + $(this)
                                .text() + '</span>';
                        });

                        $('#jobsheet_detail_table tbody').append(`<tr>
                            <td>${button}</td>
                            <td>${start_time}</td>
                            <td>${end_time}</td>
                            <td>${duration}</td>
                            <td>${mesinInfo}</td>
                            <td>${remarks}</td>
                            <td class="operator_text">${badge}</td>
                        </tr>`);
                    });
                }
            });
        }

        $('#pause').on('click', function() {
            $('#pauseModal').modal('show');
        });

        function pauseMesin() {
            if ($('#pauseRemarks').val() == '' || $('#pauseRemarks').val() == null) {
                alert("Can`t Pause Without Remarks!");
            } else {
                $('#pauseModal').modal('hide');
                machineStarter(2, @json($digital_printing->id));
            }
        }
    </script>
@endpush
