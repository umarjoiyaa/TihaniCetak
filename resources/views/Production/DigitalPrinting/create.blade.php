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
                                <h5 class="float-left"><b>PRODUCTION JOBSHEET LIST- DIGITAL PRINTING</b></h5>
                                <p class="float-right">TCBS-B66 (Rev.1)</p>
                            </div>
                        </div>


                        <div class="card" style="background:#f1f0f0;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Date</label>
                                            <input type="text" name="date"
                                                value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" class="form-control"
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
                                            <div class="label">Sales Order No.</div>
                                            <select name="sale_order" id="sale_order" class="form-control">
                                                <option value="" selected disabled>Select a Sale Order</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Tajuk</div>
                                            <input type="text" readonly name="" id="tajuk"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Kod Buku</div>
                                            <input type="text" readonly id="kod_buku" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Pelanggan</div>
                                            <input type="text" readonly name="" id="customer"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Saiz Produk </div>
                                            <input type="text" readonly name="" id="size"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Kuantiti SO</div>
                                            <input type="text" readonly name="" id="sale_order_qty"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Jumlah mukasurat</div>
                                            <input type="text" name="jumlah_mukasurat" id="jumlah"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Kuantiti Waste</div>
                                            <input type="number" name="kuantiti_waste" id="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Remark</div>
                                            <textarea name="remarks" id="" cols="30" rows="1" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Mesin</label>
                                            <select name="mesin" id="Mesin1" class="form-control form-select">
                                                <option value="REVORIA SC170 FUJIFIILM">REVORIA SC170 FUJIFIILM</option>
                                                <option value="OTHERS" id="selectBox">OTHERS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="box1"></div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <div class="label">Kategori job</div>
                                            <select name="kategori_job" id="kategori1" class="form-select form-control">
                                                <option value="MOCK UP">MOCK UP</option>
                                                <option value="PENEGELUAREN">PENEGELUAREN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Jenis produk</label>
                                            <select name="jenis_produk" id="printCutSelect1"
                                                class="form-control form-select">
                                                <option value="BUKU">BUKU</option>
                                                <option value="FLYERS">FLYERS</option>
                                                <option value="POSTER">POSTER</option>
                                                <option value="BUSINESS CARD">BUSINESS CARD</option>
                                                <option value="KAD KAHWIN">KAD KAHWIN</option>
                                                <option value="STICKERS">STICKERS</option>
                                                <option value="OTHERS" id="selectBox1">OTHERS</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <!-- <label for="">Other (Please state)</label> -->
                                        <div id="box2"></div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Kertas: teks</div>
                                            <input type="text" name="kertas_teks" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Kertas: Cover</div>
                                            <input type="text" name="kertas_cover" id=""
                                                class="form-control">
                                        </div>
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
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1"><input type="checkbox" name="text_front"
                                                        id=""></div>
                                                <div class="col-md-2">Front</div>
                                                <div class="col-md-1"><input type="checkbox" name="text_back"
                                                        id=""></div>
                                                <div class="col-md-2">back</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Print</label>
                                        <select name="text_print" id="print0" placeholder="Pilih print"
                                            class="form-control form-select">
                                            <option value="1C">1C</option>
                                            <option value="4C">4C</option>
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
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="6">6</option>
                                            <option value="8">8</option>
                                            <option value="10">10</option>
                                            <option value="12">12</option>
                                            <option value="14">14</option>
                                            <option value="16">16</option>
                                            <option value="OTHERS" id="newInputOption">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for=""></label>
                                        <div id="box"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="background:#f1f0f0; border-radius:5px;">
                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <h5><b>Cover</b></h5>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1"><input type="checkbox" name="cover_front"
                                                        id=""></div>
                                                <div class="col-md-2">Front</div>
                                                <div class="col-md-1"><input type="checkbox" name="cover_back"
                                                        id=""></div>
                                                <div class="col-md-2">back</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Print</label>
                                        <select name="cover_print" id="print1" placeholder="Pilih print"
                                            class="form-control form-select">
                                            <option value="1C">1C</option>
                                            <option value="4C">4C</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <label for="">Print Cut</label>
                                        <select name="cover_print_cut" id="printSelect1"
                                            class="form-control form-select">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="6">6</option>
                                            <option value="8">8</option>
                                            <option value="10">10</option>
                                            <option value="12">12</option>
                                            <option value="14">14</option>
                                            <option value="16">16</option>
                                            <option value="OTHERS" id="newInputOption1">OTHERS</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for=""></label>
                                        <div id="box4"></div>
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
                                                    <td><input type="checkbox" name="finishing_1" id="Form20"
                                                            class=" mr-5">Gloss
                                                        Lamination</td>
                                                    <td>
                                                        <select name="finishing_1_val" disabled
                                                            placeholder="select Supplier" id="form20"
                                                            class="form-control form-select " style="width:250px;">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_2" id="Form1"
                                                            class=" mr-5">Matt
                                                        Lamination</td>
                                                    <td><select name="finishing_2_val" disabled
                                                            placeholder="select Supplier" id="form1"
                                                            class="form-control form-select w-100">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_3" id="Form2"
                                                            class=" mr-5">SPOT UV</td>
                                                    <td><select name="finishing_3_val" disabled
                                                            placeholder="select Supplier" id="form2"
                                                            class="form-control form-select w-100">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="finishing_4" id="Form3"
                                                            class=" mr-5">Hot Stamping
                                                    </td>
                                                    <td><select name="finishing_4_val" disabled
                                                            placeholder="select Supplier" id="form3"
                                                            class="form-control form-select w-100">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_5" id="Form4"
                                                            class=" mr-5">Emboss</td>
                                                    <td><select name="finishing_5_val" disabled
                                                            placeholder="select Supplier" id="form4"
                                                            class="form-control form-select w-100">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_6" id="Form5"
                                                            class=" mr-5">Diecut</td>
                                                    <td><select name="finishing_6_val" disabled
                                                            placeholder="select Supplier" id="form5"
                                                            class="form-control form-select w-100">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_7" id="Form6"
                                                            class=" mr-5">Round corner
                                                    </td>
                                                    <td><select name="finishing_7_val" disabled
                                                            placeholder="select Supplier" id="form6"
                                                            class="form-control form-select w-100">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_8" id="Form7"
                                                            class=" mr-5">Round back
                                                    </td>
                                                    <td><select name="finishing_8_val" disabled
                                                            placeholder="select Supplier" id="form7"
                                                            class="form-control form-select w-100">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_9" id="Form8"
                                                            class=" mr-5">Square Back
                                                    </td>
                                                    <td><select name="finishing_9_val" disabled
                                                            placeholder="select Supplier" id="form8"
                                                            class="form-control form-select w-100">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="finishing_10" id="Form9"
                                                            class=" mr-5"> Others:
                                                        <input type="text" disabled placeholder="User Input"
                                                            name="finishing_10_val" id="input1"
                                                            class="form-control w-50 float-right">
                                                    </td>
                                                    <td><select name="finishing_11_val" disabled
                                                            placeholder="select Supplier" id="form9"
                                                            class="form-control form-select w-100">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
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
                                                    <td><input type="checkbox" name="binding_1" id="Form10"
                                                            class=" mr-5">Perfect
                                                        Bind
                                                    </td>
                                                    <td><select disabled name="binding_1_val"
                                                            placeholder="select Supplier" id="form10"
                                                            class="form-control form-select" style="width:250px;">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>

                                                <tr>
                                                    <td><input type="checkbox" name="binding_2" id="Form11"
                                                            class=" mr-5">Staple Bind
                                                    </td>
                                                    <td><select name="binding_2_val" disabled
                                                            placeholder="select Supplier" id="form11"
                                                            class="form-control form-select">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="binding_3" id="Form12"
                                                            class=" mr-5">Wire 0</td>
                                                    <td><select name="binding_3_val" disabled
                                                            placeholder="select Supplier" id="form12"
                                                            class="form-control form-select">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="binding_4" id="Form13"
                                                            class=" mr-5">Hard Cover
                                                    </td>
                                                    <td><select name="binding_4_val" disabled
                                                            placeholder="select Supplier" id="form13"
                                                            class="form-control form-select">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="binding_5" id="Form14"
                                                            class=" mr-5">Creasing
                                                        Line
                                                    </td>
                                                    <td><select name="binding_5_val" disabled
                                                            placeholder="select Supplier" id="form14"
                                                            class="form-control form-select">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="binding_6" id="Form15"
                                                            class=" mr-5">Cut to Size
                                                    </td>
                                                    <td><select name="binding_6_val" disabled
                                                            placeholder="select Supplier" id="form15"
                                                            class="form-control form-select">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="binding_7" id="Form16"
                                                            class=" mr-5">Folding
                                                    </td>
                                                    <td><select name="binding_7_val" disabled
                                                            placeholder="select Supplier" id="form16"
                                                            class="form-control form-select">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="binding_8" id="Form17"
                                                            class=" mr-5"> Others:
                                                        <input type="text" disabled placeholder="User Input"
                                                            name="binding_8_val" id="input"
                                                            class="form-control w-50 float-right">
                                                    </td>
                                                    <td><select name="binding_9_val" disabled
                                                            placeholder="select Supplier" id="form17"
                                                            class="form-control form-select">
                                                            <option value="In-house">In-house</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
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
                <a href="{{ route('digital_printing') }}">back to list</a>
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
                } else {
                    $("#form1").prop("disabled", true);
                }
            });

            $("#Form2").change(function() {
                if ($(this).is(":checked")) {
                    $("#form2").prop("disabled", false);
                } else {
                    $("#form2").prop("disabled", true);
                }
            });

            $("#Form3").change(function() {
                if ($(this).is(":checked")) {
                    $("#form3").prop("disabled", false);
                } else {
                    $("#form3").prop("disabled", true);
                }
            });

            $("#Form4").change(function() {
                if ($(this).is(":checked")) {
                    $("#form4").prop("disabled", false);
                } else {
                    $("#form4").prop("disabled", true);
                }
            });

            $("#Form5").change(function() {
                if ($(this).is(":checked")) {
                    $("#form5").prop("disabled", false);
                } else {
                    $("#form5").prop("disabled", true);
                }
            });

            $("#Form6").change(function() {
                if ($(this).is(":checked")) {
                    $("#form6").prop("disabled", false);
                } else {
                    $("#form6").prop("disabled", true);
                }
            });

            $("#Form7").change(function() {
                if ($(this).is(":checked")) {
                    $("#form7").prop("disabled", false);
                } else {
                    $("#form7").prop("disabled", true);
                }
            });

            $("#Form8").change(function() {
                if ($(this).is(":checked")) {
                    $("#form8").prop("disabled", false);
                } else {
                    $("#form8").prop("disabled", true);
                }
            });

            $("#Form9").change(function() {
                if ($(this).is(":checked")) {
                    $("#form9").prop("disabled", false);
                    $("#input1").prop("disabled", false);
                } else {
                    $("#form9").prop("disabled", true);
                    $("#input1").prop("disabled", true);
                }
            });

            $("#Form10").change(function() {
                if ($(this).is(":checked")) {
                    $("#form10").prop("disabled", false);
                } else {
                    $("#form10").prop("disabled", true);
                }
            });

            $("#Form11").change(function() {
                if ($(this).is(":checked")) {
                    $("#form11").prop("disabled", false);
                } else {
                    $("#form11").prop("disabled", true);
                }
            });

            $("#Form12").change(function() {
                if ($(this).is(":checked")) {
                    $("#form12").prop("disabled", false);
                } else {
                    $("#form12").prop("disabled", true);
                }
            });

            $("#Form13").change(function() {
                if ($(this).is(":checked")) {
                    $("#form13").prop("disabled", false);
                } else {
                    $("#form13").prop("disabled", true);
                }
            });

            $("#Form14").change(function() {
                if ($(this).is(":checked")) {
                    $("#form14").prop("disabled", false);
                } else {
                    $("#form14").prop("disabled", true);
                }
            });

            $("#Form15").change(function() {
                if ($(this).is(":checked")) {
                    $("#form15").prop("disabled", false);
                } else {
                    $("#form15").prop("disabled", true);
                }
            });

            $("#Form16").change(function() {
                if ($(this).is(":checked")) {
                    $("#form16").prop("disabled", false);
                } else {
                    $("#form16").prop("disabled", true);
                }
            });

            $("#Form17").change(function() {
                if ($(this).is(":checked")) {
                    $("#form17").prop("disabled", false);
                    $("#input").prop("disabled", false);
                } else {
                    $("#form17").prop("disabled", true);
                    $("#input").prop("disabled", true);
                }
            });

            $("#Form20").change(function() {
                if ($(this).is(":checked")) {
                    $("#form20").prop("disabled", false);
                } else {
                    $("#form20").prop("disabled", true);
                }
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
                templateResult: function(data) {
                    if (data.loading) {
                        return "Loading...";
                    }

                    return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                },
                templateSelection: function(data) {
                    return data.order_no || null;
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
