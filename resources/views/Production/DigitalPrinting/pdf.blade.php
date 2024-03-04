<!DOCTYPE html>
<html>

<head>
    <!-- style css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">    <title>DIGITAL PRINTING</title>
    <style>
        label{
            max-width:300px !important;
        }
    </style>
</head>

<body>
        <div class="row">
            <div class="col-md-12">
                <h5 class="float-left"><b>PRODUCTION JOBSHEET LIST- DIGITAL PRINTING</b></h5>
                <p class="float-right">TCBS-B66 (Rev.1)</p>
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

        {{-- <div class="card" style="background:#f1f0f0;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5><b>Production Button</b></h5>
                    </div>
                    <div class="col-md-4 ">
                        <button id="play" type="button" class="btn btn-light w-100"
                            style="border:1px solid black;"><i class="la la-play"
                                style="font-size:20px;"></i>Start</button>
                    </div>
                    <div class="col-md-4">
                        <button id="pause" type="button" class="btn btn-light w-100"
                            style="border:1px solid black;"><i class="la la-pause"
                                style="font-size:20px;"></i>Pause</button>
                    </div>
                    <div class="col-md-4  ">
                        <div class="box">
                            <button id="stop" type="button" class="btn btn-light w-100"
                                style="border:1px solid black;"><i class="la la-stop-circle"
                                    style="font-size:20px;"></i>Stop</button>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div id="msg" class="col-12 text-center"></div>
                </div>
            </div>
        </div> --}}


                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="">Date</label><br>
                            <label>{{ $digital_printing->date }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="">By</label><br>
                        <label>{{ $digital_printing->user->full_name }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for=""> Operators</label>
                            @php
                                $selectedOperatorIds = json_decode($digital_printing->operator);
                            @endphp
                            <label>
                                @if ($selectedOperatorIds)
                                    @foreach ($selectedOperatorIds as $operatorId)
                                        @php
                                            $selectedUser = $users->first(function ($user) use ($operatorId) {
                                                return $user->id == $operatorId;
                                            });
                                        @endphp

                                        @if ($selectedUser)
                                            {{ $selectedUser->full_name }}
                                        @endif
                                    @endforeach
                                @endif
                            </label>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="">Sales Order No.</label><br>
                            <label>{{ $digital_printing->sale_order->order_no }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="">Tajuk</label><br>
                        <label>{{ $digital_printing->sale_order->description }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for=""> Kod Buku</label><br>
                            <label>
                                {{ $digital_printing->sale_order->kod_buku }}
                            </label>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="">Pelanggan</label><br>
                            <label>{{ $digital_printing->sale_order->customer }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="">Saiz Produk</label><br>
                        <label>{{ $digital_printing->sale_order->size }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="">Kuantiti SO</label><br>
                            <label>
                                {{ $digital_printing->sale_order->sale_order_qty }}
                            </label>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="">Jumlah mukasurat</label><br>
                            <label>{{ $digital_printing->jumlah_mukasurat }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="">Kuantiti Waste</label><br>
                        <label>{{ $digital_printing->kuantiti_waste }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="">Remark</label><br>
                            <label>
                                {{ $digital_printing->remarks }}
                            </label>
                        </div>
                    </div>

                </div>






                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Mesin</label>
                            <input type="text" class="form-control" value="{{ $digital_printing->mesin }}">
                        </div>
                    </div>
                    @if ($digital_printing->mesin == 'OTHERS')
                        <input type="hidden" id="machine" value="{{ $digital_printing->mesin_others }}">
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
                    <div class="col-md-4 ">
                        <div class="form-group">
                            <div class="label">Kategori job</div>
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
                            <div class="label">Kertas: teks</div>
                            <input type="text" name="kertas_teks" id="" class="form-control"
                                value="{{ $digital_printing->kertas_teks }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="label">Kertas: Cover</div>
                            <input type="text" name="kertas_cover" id="" class="form-control"
                                value="{{ $digital_printing->kertas_cover }}">
                        </div>
                    </div>

                </div>



        <div class="card" style="background:#f1f0f0; border-radius:5px;">
            <div class="card-body">
                <div class="row ">
                    <div class="col-md-12">
                        <h5><b>Text</b></h5>
                    </div>
                    <div class="col-md-4 ">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1"><input type="checkbox" name="text_front" id=""
                                        @checked($digital_printing->text_front != null)></div>
                                <div class="col-md-2">Front</div>
                                <div class="col-md-1"><input type="checkbox" name="text_back" id=""
                                        @checked($digital_printing->text_back != null)></div>
                                <div class="col-md-2">back</div>
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
                            <input type="text" name="text_jumlah_up" id="" class="form-control"
                                value="{{ $digital_printing->text_jumlah_up }}">
                        </div>
                    </div>
                    <div class="col-md-4 ">
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
                    <div class="col-md-4 ">
                        <label for=""></label>
                        <div id="box">
                            @if ($digital_printing->text_print_cut == 'OTHERS')
                                <input type="text" name="text_print_cut_others" class="form-control"
                                    id="newInput" value="{{ $digital_printing->text_print_cut_others }}">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="background:#f1f0f0; border-radius:5px;">
            <div class="card-body">
                <div class="row ">
                    <div class="col-md-12">
                        <h5><b>Cover</b></h5>
                    </div>
                    <div class="col-md-4 ">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1"><input type="checkbox" name="cover_front" id=""
                                        @checked($digital_printing->cover_front != null)></div>
                                <div class="col-md-2">Front</div>
                                <div class="col-md-1"><input type="checkbox" name="cover_back" id=""
                                        @checked($digital_printing->cover_back != null)></div>
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
                        <select name="cover_print_cut" id="printSelect1" class="form-control form-select">
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
                    <div class="col-md-4 ">
                        <label for=""></label>
                        <div id="box4">
                            @if ($digital_printing->cover_print_cut == 'OTHERS')
                                <input type="text" name="cover_print_cut_others" class="form-control"
                                    id="newInput" value="{{ $digital_printing->cover_print_cut_others }}">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="background:#f1f0f0; border-radius:5px;">
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
                                    <td><input type="checkbox" @checked($digital_printing->finishing_1 != null) name="finishing_1"
                                            id="Form20" class=" mr-5">Gloss
                                        Lamination</td>
                                    <td>
                                        <select name="finishing_1_val" @disabled($digital_printing->finishing_1 == null)
                                            placeholder="select Supplier" id="form20"
                                            class="form-control form-select " style="width:250px;">
                                            <option value="In-house" @selected($digital_printing->finishing_1 == 'In-house')>In-house
                                            </option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->finishing_1 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->finishing_2 != null) name="finishing_2"
                                            id="Form1" class=" mr-5">Matt
                                        Lamination</td>
                                    <td><select name="finishing_2_val" @disabled($digital_printing->finishing_2 == null)
                                            placeholder="select Supplier" id="form1"
                                            class="form-control form-select w-100">
                                            <option value="In-house" @selected($digital_printing->finishing_2 == 'In-house')>In-house
                                            </option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->finishing_2 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select></td>
                                </tr>

                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->finishing_3 != null) name="finishing_3"
                                            id="Form2" class=" mr-5">SPOT UV</td>
                                    <td><select name="finishing_3_val" @disabled($digital_printing->finishing_3 == null)
                                            placeholder="select Supplier" id="form2"
                                            class="form-control form-select w-100">
                                            <option value="In-house" @selected($digital_printing->finishing_3 == 'In-house')>In-house
                                            </option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->finishing_3 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select></td>
                                </tr>

                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->finishing_4 != null) name="finishing_4"
                                            id="Form3" class=" mr-5">Hot Stamping
                                    </td>
                                    <td><select name="finishing_4_val" @disabled($digital_printing->finishing_4 == null)
                                            placeholder="select Supplier" id="form3"
                                            class="form-control form-select w-100">
                                            <option value="In-house" @selected($digital_printing->finishing_4 == 'In-house')>In-house
                                            </option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->finishing_4 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->finishing_5 != null) name="finishing_5"
                                            id="Form4" class=" mr-5">Emboss</td>
                                    <td><select name="finishing_5_val" @disabled($digital_printing->finishing_5 == null)
                                            placeholder="select Supplier" id="form4"
                                            class="form-control form-select w-100">
                                            <option value="In-house" @selected($digital_printing->finishing_5 == 'In-house')>In-house
                                            </option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->finishing_5 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->finishing_6 != null) name="finishing_6"
                                            id="Form5" class=" mr-5">Diecut</td>
                                    <td><select name="finishing_6_val" @disabled($digital_printing->finishing_6 == null)
                                            placeholder="select Supplier" id="form5"
                                            class="form-control form-select w-100">
                                            <option value="In-house" @selected($digital_printing->finishing_6 == 'In-house')>In-house
                                            </option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->finishing_6 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->finishing_7 != null) name="finishing_7"
                                            id="Form6" class=" mr-5">Round corner
                                    </td>
                                    <td><select name="finishing_7_val" @disabled($digital_printing->finishing_7 == null)
                                            placeholder="select Supplier" id="form6"
                                            class="form-control form-select w-100">
                                            <option value="In-house" @selected($digital_printing->finishing_7 == 'In-house')>In-house
                                            </option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->finishing_7 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->finishing_8 != null) name="finishing_8"
                                            id="Form7" class=" mr-5">Round back
                                    </td>
                                    <td><select name="finishing_8_val" @disabled($digital_printing->finishing_8 == null)
                                            placeholder="select Supplier" id="form7"
                                            class="form-control form-select w-100">
                                            <option value="In-house" @selected($digital_printing->finishing_8 == 'In-house')>In-house
                                            </option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->finishing_8 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->finishing_9 != null) name="finishing_9"
                                            id="Form8" class=" mr-5">Square Back
                                    </td>
                                    <td><select name="finishing_9_val" @disabled($digital_printing->finishing_9 == null)
                                            placeholder="select Supplier" id="form8"
                                            class="form-control form-select w-100">
                                            <option value="In-house" @selected($digital_printing->finishing_9 == 'In-house')>In-house
                                            </option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->finishing_9 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->finishing_10 != null) name="finishing_10"
                                            id="Form9" class=" mr-5"> Others:
                                        <input type="text" @disabled($digital_printing->finishing_10 == null) placeholder="User Input"
                                            name="finishing_10_val" id="input1"
                                            class="form-control w-50 float-right"
                                            value="{{ $digital_printing->finishing_10 }}">
                                    </td>
                                    <td><select name="finishing_11_val" @disabled($digital_printing->finishing_11 == null)
                                            placeholder="select Supplier" id="form9"
                                            class="form-control form-select w-100">
                                            <option value="In-house" @selected($digital_printing->finishing_11 == 'In-house')>In-house
                                            </option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->finishing_11 == $supplier->id)>
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

        <div class="card" style="background:#f1f0f0; border-radius:5px;">
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
                                    <td><input type="checkbox" @checked($digital_printing->binding_1 != null) name="binding_1"
                                            id="Form10" class=" mr-5">Perfect
                                        Bind
                                    </td>
                                    <td><select @disabled($digital_printing->binding_1 == null) name="binding_1_val"
                                            placeholder="select Supplier" id="form10"
                                            class="form-control form-select" style="width:250px;">
                                            <option value="In-house" @selected($digital_printing->binding_1 == 'In-house')>In-house
                                            </option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->binding_1 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select></td>
                                </tr>

                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->binding_2 != null) name="binding_2"
                                            id="Form11" class=" mr-5">Staple Bind
                                    </td>
                                    <td><select name="binding_2_val" @disabled($digital_printing->binding_2 == null)
                                            placeholder="select Supplier" id="form11"
                                            class="form-control form-select">
                                            <option value="In-house" @selected($digital_printing->binding_2 == 'In-house')>In-house
                                            </option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->binding_2 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->binding_3 != null) name="binding_3"
                                            id="Form12" class=" mr-5">Wire 0</td>
                                    <td><select name="binding_3_val" @disabled($digital_printing->binding_3 == null)
                                            placeholder="select Supplier" id="form12"
                                            class="form-control form-select">
                                            <option value="In-house" @selected($digital_printing->binding_3 == 'In-house')>In-house
                                            </option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->binding_3 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->binding_4 != null) name="binding_4"
                                            id="Form13" class=" mr-5">Hard Cover
                                    </td>
                                    <td><select name="binding_4_val" @disabled($digital_printing->binding_4 == null)
                                            placeholder="select Supplier" id="form13"
                                            class="form-control form-select">
                                            <option value="In-house" @selected($digital_printing->binding_4 == 'In-house')>In-house
                                            </option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->binding_4 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->binding_5 != null) name="binding_5"
                                            id="Form14" class=" mr-5">Creasing
                                        Line
                                    </td>
                                    <td><select name="binding_5_val" @disabled($digital_printing->binding_5 == null)
                                            placeholder="select Supplier" id="form14"
                                            class="form-control form-select">
                                            <option value="In-house" @selected($digital_printing->binding_5 == 'In-house')>
                                                In-house</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->binding_5 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->binding_6 != null) name="binding_6"
                                            id="Form15" class=" mr-5">Cut to Size
                                    </td>
                                    <td><select name="binding_6_val" @disabled($digital_printing->binding_6 == null)
                                            placeholder="select Supplier" id="form15"
                                            class="form-control form-select">
                                            <option value="In-house" @selected($digital_printing->binding_6 == 'In-house')>
                                                In-house</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->binding_6 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->binding_7 != null) name="binding_7"
                                            id="Form16" class=" mr-5">Folding
                                    </td>
                                    <td><select name="binding_7_val" @disabled($digital_printing->binding_7 == null)
                                            placeholder="select Supplier" id="form16"
                                            class="form-control form-select">
                                            <option value="In-house" @selected($digital_printing->binding_7 == 'In-house')>
                                                In-house</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->binding_7 == $supplier->id)>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" @checked($digital_printing->binding_8 != null) name="binding_8"
                                            id="Form17" class=" mr-5"> Others:
                                        <input type="text" @disabled($digital_printing->binding_8 == null) placeholder="User Input"
                                            name="binding_8_val" id="input" class="form-control w-50 float-right"
                                            value="{{ $digital_printing->binding_9 }}">
                                    </td>
                                    <td><select name="binding_9_val" @disabled($digital_printing->binding_9 == null)
                                            placeholder="select Supplier" id="form17"
                                            class="form-control form-select">
                                            <option value="In-house" @selected($digital_printing->binding_9 == 'In-house')>
                                                In-house</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($digital_printing->binding_9 == $supplier->id)>
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

        <div class="card" style="background:#f1f0f0; border-radius:5px;">
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
                                        <td><button type="button" data-toggle="modal" data-target="#exampleModal"
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

        <div class="row mt-5">
            <div class="col-md-12">
                <h3><b>Verified By</b></h3>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Username</th>
                            <th>Desgination</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $digital_printing->verified_by_date }}
                            </td>
                            <td>{{ $digital_printing->verified_by_user }}
                            </td>
                            <td>{{ $digital_printing->verified_by_designation }}
                            </td>
                            <td>{{ $digital_printing->verified_by_department }}
                            </td>
                        </tr>
                    </tbody>
                </table>
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

        <div class="row d-flex">
            <div class="col-md-12 d-flex justify-content-end">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="width:1000px; margin-left:-350px;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Production Output Details
                                </h5>
                                <span aria-hidden="true">&times;</span>
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
                                                <td><input type="text" name="" id=""
                                                        class="form-control last_print">
                                                </td>
                                                <td><input type="text" name="" id=""
                                                        class="form-control waste_print"></td>
                                                <td><input type="text" name="" id=""
                                                        class="form-control rejection">
                                                </td>
                                                <td><input type="text" name="" id="" readonly
                                                        class="form-control good_count"></td>
                                                <td><input type="text" name="" id=""
                                                        class="form-control meter_click"></td>
                                                <td><button type="button" disabled
                                                        class="btn btn-primary check_operator">Check</button>
                                                </td>
                                                <td><input type="text" name="" id="" readonly
                                                        class="form-control check_operator_text"></td>
                                                <td><button type="button" disabled
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
