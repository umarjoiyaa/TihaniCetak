@extends('layouts.app')

@section('content')
<form action="" method="post">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>PRODUCTION JOBSHEET LIST- COVER & ENDPAPER</b></h5>
                            <p class="float-right">TCBS-B62 (Rev.0)</p>
                        </div>
                    </div>


                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Tarikh</label>
                                        <input type="text" name="date"
                                            value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" class="form-control"
                                            id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Disediakan Oleh</label>
                                    <input type="text" readonly name="" id="" class="form-control">
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select name="" id="sales1" class="form-control form-select">
                                            <option value="">select sales Order no</option>
                                            <option value="">SO-001496</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text" readonly name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Pelanggan</div>
                                        <input type="text" readonly name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kuantiti So </div>
                                        <input type="text" readonly name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kuantiti Waste</div>
                                        <input type="text" readonly name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Jenis produk</label>
                                        <select name="" id="printCutSelect1" class="form-control form-select">
                                            <option value="Cover">Cover</option>
                                            <option value="Endpaper">Endpaper</option>
                                            <option value="Bookmark">Bookmark</option>
                                            <option value="Divider">Divider</option>
                                            <!-- <option value="O">O</option>
                                            <option value="STICKERS">STICKERS</option> -->
                                            <option value="OTHERS" id="selectBox1">OTHERS</option>
                                        </select>
                                    </div>

                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Mesin</div>
                                        <select name="" id="Mesin2" class="form-control form-select">
                                            <option value="">SMZP (2C)</option>
                                            <option value="">RYOBI (4C)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!-- <label for="">Other (Please state)</label> -->
                                    <div id="box2"></div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kertas: </div>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Saiz Potong:</div>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row mt-5">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Mesin</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">REVORIA SC170 FUJIFIILM</option>
                                                <option value="">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Kategori job</div>
                                            <select name="" id="" placeholder="Pilih Kategori Job" class="form-control">
                                                <option value="">MOCK UP</option>
                                                <option value="">PENEGELUAREN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Jenis produk</label>
                                            <select name="" id="" placeholder="Pilih Jenis produk" class="form-control">
                                                <option value="">BUKU</option>
                                                <option value="">FLYERS</option>
                                                <option value="">POSTER</option>
                                                <option value="">BUSINESS CARD</option>
                                                <option value="">KAD KAHWIN</option>
                                                <option value="">STICKERS</option>
                                                <option value="">OTHERS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
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

                                </div> -->
                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0; border-radius:5px;">
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
                                            <div id="editor"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="background:#f1f0f0; border-radius:5px;">
                                <div class="card-body">
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <h5><b>Print Details</b></h5>
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
                                            <select name="" id="print2" class="form-control form-select">
                                                <option value="">1C</option>
                                                <option value="">4C</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Waste Paper</label>
                                            <input type="text" name="" id="" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="">Print Cut</label>
                                            <select name="" id="printSelect" class="form-control form-select">
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

                                        <div class="col-md-4 mt-2">
                                            <label for="">last Print</label>
                                            <input type="text" placeholder="User Input" name="" id=""
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for=""></label>
                                            <div id="box"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="background:#f1f0f0; border-radius:5px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b>Status</b></h5>
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <label for="">status</label>
                                            <input type="text" readonly name="" id="" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <label for="">Plate</label>
                                            <select name="" id="plate1" class="form-control form-select">
                                                <option value="">Plate lama</option>
                                                <option value="">Plate baru</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <label for="">Saiz Produk</label>
                                            <input type="text" readonly name="" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card " style="background:#f1f0f0; border-radius:5px;">
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
                                                        <td><input type="checkbox" name="" id="Print3" class=" mr-5"
                                                                style="font-size:14px;">UV+Texture
                                                            Emboss <input type="text" disabled 
                                                                name="" id="input1" class="form-control float-right"
                                                                style="width:150px;">
                                                        </td>
                                                        <td>
                                                            <select name="" id="print3" disabled
                                                                class="form-control form-select" style="width:250px;">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print4"
                                                                class=" mr-5">Gloss
                                                            Lamination</td>
                                                        <td><select name="" disabled id="print4"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print5"
                                                                class=" mr-5">Matt
                                                            Lamination</td>
                                                        <td><select name="" disabled id="print5"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print6"
                                                                class=" mr-5">Spot
                                                            UV
                                                        </td>
                                                        <td><select name="" disabled id="print6"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print7"
                                                                class=" mr-5">Spot
                                                            Miraval
                                                        </td>
                                                        <td><select name="" disabled id="print7"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print8" class=" mr-5">Hot
                                                            Stamping
                                                            <input type="text" disabled name="" 
                                                                id="input2" class="form-control float-right w-50">
                                                        </td>
                                                        <td><select name="" disabled id="print8"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print9"
                                                                class=" mr-5">Emboss
                                                        </td>
                                                        <td><select name="" disabled id="print9"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print10"
                                                                class=" mr-5">Deboss
                                                        </td>
                                                        <td><select name="" disabled id="print10"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print11" class=" mr-5">UV
                                                            Vanish
                                                        </td>
                                                        <td><select name="" disabled id="print11"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print12"
                                                                class=" mr-5">Spot
                                                            corse UV
                                                        </td>
                                                        <td><select name="" disabled id="print12"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print13"
                                                                class=" mr-5">Creasing
                                                            line
                                                        </td>
                                                        <td><select name="" disabled id="print13"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print14"
                                                                class=" mr-5">Die
                                                            Cut
                                                        </td>
                                                        <td><select name="" disabled id="print14"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print15"
                                                                class=" mr-5">Perforation
                                                        </td>
                                                        <td><select name="" disabled id="print15"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print16"
                                                                class=" mr-5">Numbering
                                                        </td>
                                                        <td><select name="" disabled id="print16"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print17"
                                                                class=" mr-5">Punch
                                                            Hole
                                                        </td>
                                                        <td><select name="" disabled id="print17"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print18"
                                                                class=" mr-5">Round
                                                            Corner
                                                        </td>
                                                        <td><select name="" disabled id="print18"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="Print19" class=" mr-5">
                                                            Others:
                                                            <input type="text" disabled  name=""
                                                                id="input" class="form-control w-50 float-right">
                                                        </td>
                                                        <td><select name="" disabled id="print19"
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
                        </div>
                    </div>




                    <div class="card w-100" style="background:#f1f0f0; border-radius:5px;">
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
                                            <div id="editor1"></div>
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
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right">Save</button>
                        </div>
                    </div>
                </div>


            </div>
            <a href="{{route('Cover_endPaper.index')}}">back to list</a>
        </div>
    </div>


</form>
@endsection
@push('custom-scripts')
<script>
    $(document).ready(function () {
        $('#printSelect').change(function () {
            if ($(this).val() === "OTHERS") {
                var newInput = $("<input>", {
                    type: "text",
                    class: "form-control",
                    id: "newInput",
                    placeholder: "Enter Other Print Cut"
                });

                // Clear existing content in #box and append the new input element
                $("#box").empty().append(newInput);
            } else {
                // Clear the content of #box if an option other than "OTHERS" is selected
                $("#box").empty();
            }
        });

        $('#printCutSelect1').change(function () {
            if ($(this).val() === "OTHERS") {
                var newLabel = $("<label>", {
                    for: "newInput",
                    text: "Lain-lain(Nyatakan)"
                });

                var newInput = $("<input>", {
                    type: "text",
                    class: "form-control",
                    id: "newInput",
                    name: "otherProduct",

                });

                // Clear existing content in #box1 and append the new label and input elements
                $("#box2").empty().append(newLabel, newInput);
            } else {
                // Clear the content of #box1 if an option other than "OTHERS" is selected
                $("#box2").empty();
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

        $("#Print3").change(function () {
            if ($(this).is(":checked")) {
                $("#print3").prop("disabled", false);
                $("#input1").prop("disabled", false);
            } else {
                $("#print3").prop("disabled", true);
                $("#input1").prop("disabled", true);
            }
        });

        $("#Print4").change(function () {
            if ($(this).is(":checked")) {
                $("#print4").prop("disabled", false);
            } else {
                $("#print4").prop("disabled", true);
            }
        });

        $("#Print5").change(function () {
            if ($(this).is(":checked")) {
                $("#print5").prop("disabled", false);
            } else {
                $("#print5").prop("disabled", true);
            }
        });

        $("#Print6").change(function () {
            if ($(this).is(":checked")) {
                $("#print6").prop("disabled", false);
            } else {
                $("#print6").prop("disabled", true);
            }
        });

        $("#Print7").change(function () {
            if ($(this).is(":checked")) {
                $("#print7").prop("disabled", false);
            } else {
                $("#print7").prop("disabled", true);
            }
        });

        $("#Print8").change(function () {
            if ($(this).is(":checked")) {
                $("#print8").prop("disabled", false);
                $("#input2").prop("disabled", false);
            } else {
                $("#print8").prop("disabled", true);
                $("#input2").prop("disabled", true);
            }
        });

        $("#Print9").change(function () {
            if ($(this).is(":checked")) {
                $("#print9").prop("disabled", false);
            } else {
                $("#print9").prop("disabled", true);
            }
        });

        $("#Print10").change(function () {
            if ($(this).is(":checked")) {
                $("#print10").prop("disabled", false);
            } else {
                $("#print10").prop("disabled", true);
            }
        });

        $("#Print11").change(function () {
            if ($(this).is(":checked")) {
                $("#print11").prop("disabled", false);
                // $("#input1").prop("disabled", false);
            } else {
                $("#print11").prop("disabled", true);
                // $("#input1").prop("disabled", true);
            }
        });

        $("#Print12").change(function () {
            if ($(this).is(":checked")) {
                $("#print12").prop("disabled", false);
            } else {
                $("#print12").prop("disabled", true);
            }
        });

        $("#Print13").change(function () {
            if ($(this).is(":checked")) {
                $("#print13").prop("disabled", false);
            } else {
                $("#print13").prop("disabled", true);
            }
        });

        $("#Print14").change(function () {
            if ($(this).is(":checked")) {
                $("#print14").prop("disabled", false);
            } else {
                $("#print14").prop("disabled", true);
            }
        });

        $("#Print15").change(function () {
            if ($(this).is(":checked")) {
                $("#print15").prop("disabled", false);
            } else {
                $("#print15").prop("disabled", true);
            }
        });

        $("#Print16").change(function () {
            if ($(this).is(":checked")) {
                $("#print16").prop("disabled", false);
            } else {
                $("#print16").prop("disabled", true);
            }
        });

        $("#Print17").change(function () {
            if ($(this).is(":checked")) {
                $("#print17").prop("disabled", false);
            } else {
                $("#print17").prop("disabled", true);
            }
        });

        $("#Print18").change(function () {
            if ($(this).is(":checked")) {
                $("#print18").prop("disabled", false);
            } else {
                $("#print18").prop("disabled", true);
            }
        });

        $("#Print19").change(function () {
            if ($(this).is(":checked")) {
                $("#print19").prop("disabled", false);
                $("#input").prop("disabled", false);
            } else {
                $("#print19").prop("disabled", true);
                $("#input").prop("disabled", true);
            }
        });
    });
</script>
@endpush