@extends('layouts.app')

@section('content')
<form action="" method="post">

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
                                        <input type="date" readonly value="{{ date('Y-m-d') }}" name="" id="Currentdate" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">By</label>
                                    <input type="text"  readonly name="" id="" class="form-control">
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select name="" id="Sales1" class="form-control form-select">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text"  readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" readonly  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Pelanggan</div>
                                        <input type="text"  readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Saiz Produk </div>
                                        <input type="text" readonly name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kuantiti SO</div>
                                        <input type="text" readonly name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Jumlah mukasurat</div>
                                        <input type="text" readonly name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kuantiti Waste</div>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Remark</div>
                                        <textarea name="" id="" cols="30" rows="1" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Mesin</label>
                                        <select name="" id="Mesin1" class="form-control form-select">
                                            <option value="">REVORIA SC170 FUJIFIILM</option>
                                            <option value="" id="selectBox">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-2">
                                    <div class="form-group">
                                        <div class="label">Kategori job</div>
                                        <select name="" id="kategori1"  class="form-select form-control">
                                            <option value="">MOCK UP</option>
                                            <option value="">PENEGELUAREN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Jenis produk</label>
                                        <select name="" id="printCutSelect1"  class="form-control form-select">
                                            <option value="">BUKU</option>
                                            <option value="">FLYERS</option>
                                            <option value="">POSTER</option>
                                            <option value="">BUSINESS CARD</option>
                                            <option value="">KAD KAHWIN</option>
                                            <option value="">STICKERS</option>
                                            <option value="" id="selectBox">OTHERS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4" >
                                    <!-- <label for="">Other (Please state)</label> -->
                                    <div id="box1"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kertas: teks</div>
                                        <input type="text" value="Input teks" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kertas: Cover</div>
                                        <input type="text" value="input teks" readonly name="" id=""
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
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-2">Front</div>
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-2">back</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Print</label>
                                    <select name="" id="print1" placeholder="Pilih print" class="form-control form-select">
                                        <option value="">1C</option>
                                        <option value="">4C</option>
                                    </select>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <label for="">Print Cut</label>
                                    <select name="printCut" id="printSelect" class="form-control form-select">
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
                                        <option value="" id="newInputOption">OTHERS</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-2" >
                                    <label for=""></label>
                                    <div id="box"></div>
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
                                                <td><input type="checkbox" name="" id="Form20" class=" mr-5">Gloss
                                                    Lamination</td>
                                                <td>
                                                    <select name="" disabled placeholder="select Supplier" id="form20"
                                                        class="form-control form-select " style="width:250px;">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"  name="" id="Form1" class=" mr-5">Matt
                                                    Lamination</td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form1"
                                                        class="form-control form-select w-100">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox"  name="" id="Form2" class=" mr-5">SPOT UV</td>
                                                <td><select name="" disabled disabled placeholder="select Supplier" id="form2"
                                                        class="form-control form-select w-100">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" name="" id="Form3" class=" mr-5">Hot Stamping
                                                </td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form3"
                                                        class="form-control form-select w-100">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Form4" class=" mr-5">Emboss</td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form4"
                                                        class="form-control form-select w-100">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Form5" class=" mr-5">Diecut</td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form5"
                                                        class="form-control form-select w-100">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Form6" class=" mr-5">Round corner
                                                </td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form6"
                                                        class="form-control form-select w-100">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Form7" class=" mr-5">Round back
                                                </td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form7"
                                                        class="form-control form-select w-100">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Form8" class=" mr-5">Square Back
                                                </td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form8"
                                                        class="form-control form-select w-100">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Form9" class=" mr-5"> Others:
                                                    <input type="text" disabled placeholder="User Input" name="" id="input1"
                                                        class="form-control w-50 float-right">
                                                </td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form9"
                                                        class="form-control form-select w-100">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
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
                                                <td><input type="checkbox" name="" id="Form10" class=" mr-5">Perfect Bind
                                                </td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form10"
                                                        class="form-control form-select" style="width:250px;">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" name="" id="Form11" class=" mr-5">Staple Bind
                                                </td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form11"
                                                        class="form-control form-select">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"  name="" id="Form12" class=" mr-5">Wire 0</td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form12"
                                                        class="form-control form-select">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Form13" class=" mr-5">Hard Cover
                                                </td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form13"
                                                        class="form-control form-select">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Form14" class=" mr-5">Creasing Line
                                                </td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form14"
                                                        class="form-control form-select">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Form15" class=" mr-5">Cut to Size
                                                </td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form15"
                                                        class="form-control form-select">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Form16" class=" mr-5">Folding
                                                </td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form16"
                                                        class="form-control form-select">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Form17" class=" mr-5"> Others:
                                                    <input type="text" disabled placeholder="User Input" name="" id="input"
                                                        class="form-control w-50 float-right">
                                                </td>
                                                <td><select name="" disabled placeholder="select Supplier" id="form17"
                                                        class="form-control form-select">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
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
            <a href="{{route('digitalPrinting.index')}}">back to list</a>
        </div>
    </div>


</form>
@endsection
@push('custom-scripts')
<script>
     $(document).ready(function () {
        $('#printSelect').change(function () {
            if ($(this).val() === "") {
                var newInput = $("<input>", {
                    type: "text",
                    class: "form-control",
                    id: "newInput"
                });

                // Clear existing content in #box and append the new input element
                $("#box").empty().append(newInput);
                // $("#box1").empty().append(newInput);
            } 
        });

        $('#printCutSelect1').change(function () {
            if ($(this).val() === "") {
                var newLabel = $("<label>", {
                    for: "newInput",
                    text: "Other (please state)"
                });

                var newInput = $("<input>", {
                    type: "text",
                    class: "form-control",
                    id: "newInput",
                    name: "otherProduct",
                    placeholder: "Enter Other Product"
                });
            
                // Clear existing content in #box and append the new label and input elements
                $("#box1").empty().append(newLabel, newInput);
            }
        });

        
        $("#Form1").change(function() {
            if($(this).is(":checked")) {
                $("#form1").prop("disabled", false);
            } else {
                $("#form1").prop("disabled", true);
            }
        });

        $("#Form2").change(function() {
            if($(this).is(":checked")) {
                $("#form2").prop("disabled", false);
            } else {
                $("#form2").prop("disabled", true);
            }
        });

        $("#Form3").change(function() {
            if($(this).is(":checked")) {
                $("#form3").prop("disabled", false);
            } else {
                $("#form3").prop("disabled", true);
            }
        });

        $("#Form4").change(function() {
            if($(this).is(":checked")) {
                $("#form4").prop("disabled", false);
            } else {
                $("#form4").prop("disabled", true);
            }
        });

        $("#Form5").change(function() {
            if($(this).is(":checked")) {
                $("#form5").prop("disabled", false);
            } else {
                $("#form5").prop("disabled", true);
            }
        });

         $("#Form6").change(function() {
            if($(this).is(":checked")) {
                $("#form6").prop("disabled", false);
            } else {
                $("#form6").prop("disabled", true);
            }
        });

        $("#Form7").change(function() {
            if($(this).is(":checked")) {
                $("#form7").prop("disabled", false);
            } else {
                $("#form7").prop("disabled", true);
            }
        });

        $("#Form8").change(function() {
            if($(this).is(":checked")) {
                $("#form8").prop("disabled", false);
            } else {
                $("#form8").prop("disabled", true);
            }
        });
        
        $("#Form9").change(function() {
            if($(this).is(":checked")) {
                $("#form9").prop("disabled", false);
                $("#input1").prop("disabled", false);
            } else {
                $("#form9").prop("disabled", true);
                $("#input1").prop("disabled", true);
            }
        });

        $("#Form10").change(function() {
            if($(this).is(":checked")) {
                $("#form10").prop("disabled", false);
            } else {
                $("#form10").prop("disabled", true);
            }
        });

        $("#Form11").change(function() {
            if($(this).is(":checked")) {
                $("#form11").prop("disabled", false);
            } else {
                $("#form11").prop("disabled", true);
            }
        });

        $("#Form12").change(function() {
            if($(this).is(":checked")) {
                $("#form12").prop("disabled", false);
            } else {
                $("#form12").prop("disabled", true);
            }
        });

        $("#Form13").change(function() {
            if($(this).is(":checked")) {
                $("#form13").prop("disabled", false);
            } else {
                $("#form13").prop("disabled", true);
            }
        });

        $("#Form14").change(function() {
            if($(this).is(":checked")) {
                $("#form14").prop("disabled", false);
            } else {
                $("#form14").prop("disabled", true);
            }
        });

        $("#Form15").change(function() {
            if($(this).is(":checked")) {
                $("#form15").prop("disabled", false);
            } else {
                $("#form15").prop("disabled", true);
            }
        });

        $("#Form16").change(function() {
            if($(this).is(":checked")) {
                $("#form16").prop("disabled", false);
            } else {
                $("#form16").prop("disabled", true);
            }
        });

        $("#Form17").change(function() {
            if($(this).is(":checked")) {
                $("#form17").prop("disabled", false);
                $("#input").prop("disabled", false);
            } else {
                $("#form17").prop("disabled", true);
                $("#input").prop("disabled", true);
            }
        });
    });

    $("#Form20").change(function() {
            if($(this).is(":checked")) {
                $("#form20").prop("disabled", false);
            } else {
                $("#form20").prop("disabled", true);
            }
        });

    
</script>
@endpush