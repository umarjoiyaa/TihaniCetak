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
                                        <input type="date" readonly value="{{ date('Y-m-d') }}" name="" id="Currentdate"
                                            class="form-control">
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
                                        <div class="label">Jenis : </div>
                                        <select name="" id="printCutSelect1" class="form-control form-select">
                                            <option value="">Cover</option>
                                            <option value="">EndPaper</option>
                                            <option value="">Bookmark</option>
                                            <option value="">Divider</option>
                                            <option value="" id="selectBox">other</option>
                                            <!-- <option value="">PENEGELUAREN</option> -->
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
                                    <div id="box1"></div>
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
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                                <option value="">4</option>
                                                <option value="">6</option>
                                                <option value="">8</option>
                                                <option value="">10</option>
                                                <option value="">12</option>
                                                <option value="">14</option>
                                                <option value="">16</option>
                                                <option value="" id="newInputOption">Other</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <label for="">last Print</label>
                                            <input type="text" placeholder="User Input" name="" id=""
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for=""></label>
                                            <div id="box">
                                                </div?>
                                            </div>
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
                                                        <td><input type="checkbox" name="" id="" class=" mr-5"
                                                                style="font-size:14px;">UV+Texture
                                                            Emboss <input type="text" placeholder="user Input" name=""
                                                                id="" class="form-control float-right w-50">
                                                        </td>
                                                        <td>
                                                            <select name="" id="print3" class="form-control form-select"
                                                                style="width:250px;">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="" id="" class=" mr-5">Gloss
                                                            Lamination</td>
                                                        <td><select name="" id="print4"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="" class=" mr-5">Matt
                                                            Lamination</td>
                                                        <td><select name="" id="print5"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="" class=" mr-5">Spot
                                                            UV
                                                        </td>
                                                        <td><select name="" id="print6"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="" id="" class=" mr-5">Spot
                                                            Miraval
                                                        </td>
                                                        <td><select name="" id="print7"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="" id="" class=" mr-5">Hot
                                                            Stamping
                                                            <input type="text" name="" placeholder="user Input" id=""
                                                                class="form-control float-right w-50">
                                                        </td>
                                                        <td><select name="" id="print8"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="" id="" class=" mr-5">Emboss
                                                        </td>
                                                        <td><select name="" id="print9"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="" id="" class=" mr-5">Deboss
                                                        </td>
                                                        <td><select name="" id="print10"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="" id="" class=" mr-5">UV
                                                            Vanish
                                                        </td>
                                                        <td><select name="" id="print11"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="" class=" mr-5">Spot
                                                            corse UV
                                                        </td>
                                                        <td><select name="" id="print12"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="" class=" mr-5">Creasing
                                                            line
                                                        </td>
                                                        <td><select name="" id="print13"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="" class=" mr-5">Die
                                                            Cut
                                                        </td>
                                                        <td><select name="" id="print14"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id=""
                                                                class=" mr-5">Perforation
                                                        </td>
                                                        <td><select name="" id="print15"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="" class=" mr-5">Numbering
                                                        </td>
                                                        <td><select name="" id="print16"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="" class=" mr-5">Punch
                                                            Hole
                                                        </td>
                                                        <td><select name="" id="print17"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="" class=" mr-5">Round
                                                            Corner
                                                        </td>
                                                        <td><select name="" id="print18"
                                                                class="form-control form-select">
                                                                <option value="In-house">In-house</option>
                                                                <option value="SupplierA">Supplier A</option>
                                                                <option value="SupplierB">Supplier B</option>
                                                            </select></td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" name="" id="" class=" mr-5">
                                                            Others:
                                                            <input type="text" placeholder="User Input" name="" id=""
                                                                class="form-control w-50 float-right">
                                                        </td>
                                                        <td><select name="" id="print19"
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
<script>     $(document).ready(function () {
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
                    text: "Lain-lain (Nyatakan)"
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

        // var currentDate = new Date();

        // var formattedDate = currentDate.toISOString().slice(0, 10);

        // $("#currentDateInput").val(formattedDate);
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        var quill1 = new Quill('#editor1', {
            theme: 'snow'
        });
    });
</script>
@endpush