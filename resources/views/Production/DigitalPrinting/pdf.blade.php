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

            {{-- <div class="row">
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
            </div> --}}

        {{-- <div class="card" style="background:#f4f4ff;">
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


                <div class="row mt-5 mx-2" >
                    <div>
                            <label for="" class="font-weight-bold">Date</label><br>
                            <label >{{ $digital_printing->date }}</label>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">By</label><br>
                        <label>{{ $digital_printing->user->full_name }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="" class="font-weight-bold"> Operators</label>
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
                        <div class="form-group" >
                            <label for="" class="font-weight-bold">Sales Order No.</label><br>
                            <label>{{ $digital_printing->sale_order->order_no }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">Tajuk</label><br>
                        <label>{{ $digital_printing->sale_order->description }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="" class="font-weight-bold"> Kod Buku</label><br>
                            <label>
                                {{ $digital_printing->sale_order->kod_buku }}
                            </label>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Pelanggan</label><br>
                            <label>{{ $digital_printing->sale_order->customer }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">Saiz Produk</label><br>
                        <label>{{ $digital_printing->sale_order->size }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="" class="font-weight-bold" style="width:100px!important;">Kuantiti SO</label><br>
                            <label>
                                {{ $digital_printing->sale_order->sale_order_qty }}
                            </label>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Jumlah mukasurat</label><br>
                            <label>{{ $digital_printing->jumlah_mukasurat }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">Kuantiti Waste</label><br>
                        <label>{{ $digital_printing->kuantiti_waste }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="" class="font-weight-bold">Remark</label><br>
                            <label>
                                {{ $digital_printing->remarks }}
                            </label>
                        </div>
                    </div>

                </div>

                <div class="row  mx-2" >
                    <div >
                        <div class="form-group " >
                            <label for="" class="font-weight-bold">Mesin</label><br>
                            <label>{{ $digital_printing->mesin }}</label>

                        </div>
                    </div>

                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        @if ($digital_printing->mesin == 'OTHERS')
                                <label for="newInput" class="font-weight-bold">Lain-lain mesin (Sila
                                        nyatakan)</label>
                                <label>{{ $digital_printing->mesin_others }}</label>
                            @endif

                    </div>
                </div>

                <div class="row mt-2 mx-2" style="margin-top:70px!important;">
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Kategori job</label><br>
                            <label>{{ $digital_printing->kategori_job }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">Jenis produk</label><br>
                        <label>{{ $digital_printing->jenis_produk }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            @if ($digital_printing->jenis_produk == 'OTHERS')
                                <label for="newInput" class="font-weight-bold">Other (please state)</label>
                                <span>{{ $digital_printing->jenis_produk_others }}</span>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Kertas: teks</label><br>
                            <label>{{ $digital_printing->kertas_teks }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">Kertas: Cover</label><br>
                        <label>{{ $digital_printing->kertas_cover }}</label>

                    </div>

                </div>

                <br>
                <h3><b>Text</b></h3>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <div class="row">
                                <div>
                                <div class="col-md-1"><input disabled type="checkbox" name="text_front" id=""
                                        @checked($digital_printing->text_front != null)></div>
                                <div class="col-md-2" class="font-weight-bold">Front</div>
                            </div>
                            <div style="margin-left: 70px!important;margin-top:-55px !important">
                                <div class="col-md-1"><input disabled type="checkbox" name="text_back" id=""
                                        @checked($digital_printing->text_back != null)></div>
                                <div class="col-md-2" class="font-weight-bold">back</div>
                            </div>
                            </div>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">Print</label><br>
                        <label>{{ $digital_printing->text_print }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="" class="font-weight-bold">Jumlah Up</label><br>
                            <label>
                                {{ $digital_printing->text_jumlah_up }}
                            </label>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-2" style="margin-bottom: 40px !important;">
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Print Cut</label><br>
                            <label>{{ $digital_printing->text_print_cut }}</label>
                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        @if ($digital_printing->text_print_cut == 'OTHERS')
                                <span>{{ $digital_printing->text_print_cut_others }}</span>
                            @endif

                    </div>
                </div>

                <br>
                <h3><b>Cover</b></h3>


                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="row">
                            <div>
                            <div class="col-md-1"><input disabled type="checkbox" name="text_front" id=""
                                    @checked($digital_printing->cover_front != null)></div>
                            <div class="col-md-2" class="font-weight-bold">Front</div>
                        </div>
                        <div style="margin-left: 70px!important;margin-top:-55px !important">
                            <div class="col-md-1"><input disabled type="checkbox" name="cover_back" id=""
                                    @checked($digital_printing->cover_back != null)></div>
                            <div class="col-md-2" class="font-weight-bold">back</div>
                        </div>
                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="">Print Cut</label><br>
                        <label>{{ $digital_printing->cover_print_cut }}</label>

                    </div>


                </div>

                <div class="row mt-2 mx-2" >
                    <div>
                        @if ($digital_printing->cover_print_cut == 'OTHERS')
                        <label >{{ $digital_printing->cover_print_cut_others }}</label>
                        @endif
                    </div>
                </div>

                <br>
                <br>
                <br>
                <br>

                <h3><b>Finishing</b></h3>

                <table border="1" >
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
                            @if ($digital_printing->finishing_1 == 'In-house')
                            <td>In-house</td>
                           @else
                           <td>{{ $digital_printing->supplier->name}}</td>
                           @endif
                        </tr>


                    </tbody>
                </table>





        <div class="card" style="background:#f4f4ff; border-radius:5px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

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
                                    <td>
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
