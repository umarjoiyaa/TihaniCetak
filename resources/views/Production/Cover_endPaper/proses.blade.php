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

                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Production Button</b></h5>
                                </div>
                                <div class="col-md-4 ">
                                    <button class="btn btn-light w-100" style="border:1px solid black;"><i
                                            class="la la-play" style="font-size:20px;"></i>Start</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn  w-100" style="border:1px solid black;"><i class="la la-pause"
                                            style="font-size:20px;"></i>Start</button>
                                </div>
                                <div class="col-md-4  ">
                                    <div class="box">
                                        <button class="btn btn-light w-100" style="border:1px solid black;"><i
                                                class="la la-stop-circle" style="font-size:20px;"></i>Start</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <<div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Tarikh</label>
                                        <input type="date" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Disediakan Oleh</label>
                                    <input type="text" value="Admin" readonly name="" id="" class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label>Operator</label>
                                    <select name="" value="Admin" id="" class="form-control">
                                        <option value="">select sales Order no</option>
                                        <option value="" selected>Admin</option>
                                        <option value="">User A</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select name="" id="" class="form-control">
                                            <option value="">select sales Order no</option>
                                            <option value="" selected>SO-001496</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text" value="IQRO' GENIUS -RUMI (NEW COVER)" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" readonly value="CP 2940" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Pelanggan</div>
                                        <input type="text" value="EDUKID DISTRIBUTOR SDN BHD" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kuantiti</div>
                                        <input type="text" value="5000" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Kuantiti Waste</div>
                                            <input type="text" value="auto Display SO" readonly name="" id=""
                                                class="form-control">
                                        </div>
                                    </div> -->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Jenis : </div>
                                        <select name="" id="" placeholder="Pilih Kategori Job" class="form-control">
                                            <option value="" selected>Cover</option>
                                            <option value="">EndPaper</option>
                                            <option value="">Bookmark</option>
                                            <option value="">Divider</option>
                                            <option value="">order</option>
                                            <!-- <option value="">PENEGELUAREN</option> -->
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Mesin</div>
                                        <select name="" id="" placeholder="Pilih Kategori Job" class="form-control">
                                            <option value="">SMZP (2C)</option>
                                            <option value="" selected>RYOBI (4C)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kertas: </div>
                                        <input type="text" placeholder="User Input" value="A/CARD 260g 2s 31x43"
                                            readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Saiz Potong:</div>
                                        <input type="text" value="650 x 450" placeholder="User Input" readonly name=""
                                            id="" class="form-control">
                                    </div>
                                </div>
                        </div>

                        <!-- <div class="row mt-5">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Mesin</label>
                                        <select name="" id="" readonly class="form-control">
                                            <option value="" selected>REVORIA SC170 FUJIFIILM</option>
                                            <option value="">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kategori job</div>
                                        <select name="" id="" readonly placeholder="Pilih Kategori Job"
                                            class="form-control">
                                            <option value="">MOCK UP</option>
                                            <option value="" selected>PENEGELUAREN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Jenis produk</label>
                                        <select name="" id="" readonly placeholder="Pilih Jenis produk"
                                            class="form-control">
                                            <option value="" selected>BUKU</option>
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
                                        <input type="text" value="Simily 70gsm" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kertas: Cover</div>
                                        <input type="text" value="1/s artcard 260gsm" readonly name="" id=""
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
                                <h5><b>Status</b></h5>
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="">status</label>
                                <input type="text" value="REPEAT" readonly name="" id="" class="form-control">
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="">Plate</label>
                                <select name="" id="" placeholder="pilih Plate (lama/Baru)" class="form-control">
                                    <option value="">pilih Plate (lama/Baru)</option>
                                    <option value="">Plate lama</option>
                                    <option value="">Plate baru</option>
                                </select>
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="">Saiz Produk</label>
                                <input type="text" value="15 X 21" readonly name="" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card" style="background:#f1f0f0; border-radius:5px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5><b>Arahan Kerja</b></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card" style="background:#f1f0f0; border-radius:5px;">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h5><b>Print Detial</b></h5>
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
                                <select name="" id="" placeholder="Pilih print" class="form-control">
                                    <option value="">1C</option>
                                    <option value="">4C</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Waste Paper</label>
                                <input type="text" placeholder="User Input" name="" id="" class="form-control">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="">Print Cut</label>
                                <select name="" id="" placeholder="pilih Print Cut" class="form-control">
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
                                </select>
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="">last Print</label>
                                <input type="text" placeholder="User Input" name="" id="" class="form-control">
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
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Finishing</th>
                                            <th>Partner</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">UV+Texture
                                                Emboss <input type="text" placeholder="User input" name="" id=""
                                                    class="form-control float-right w-75"></td>
                                            <td>
                                                <select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">Gloss
                                                Lamination</td>
                                            <td><select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select></td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">Matt
                                                Lamination</td>
                                            <td><select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select></td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">Spot UV
                                            </td>
                                            <td><select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">Spot Miraval
                                            </td>
                                            <td><select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">Hot Stamping
                                                <input type="text" name="" placeholder="User Input" id=""
                                                    class="form-control float-right w-75">
                                            </td>
                                            <td><select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">Emboss
                                            </td>
                                            <td><select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">Deboss
                                            </td>
                                            <td><select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">UV Vanish
                                            </td>
                                            <td><select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select></td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">Spot corse UV
                                            </td>
                                            <td><select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select></td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">Creasing line
                                            </td>
                                            <td><select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select></td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">Die Cut
                                            </td>
                                            <td><select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select></td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">Perforation
                                            </td>
                                            <td><select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select></td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">Numbering
                                            </td>
                                            <td><select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select></td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">Punch Hole
                                            </td>
                                            <td><select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select></td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5">Round Corner
                                            </td>
                                            <td><select name="" placeholder="Select Supplierplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
                                                    <option value="In-house">In-house</option>
                                                    <option value="SupplierA">Supplier A</option>
                                                    <option value="SupplierB">Supplier B</option>
                                                </select></td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" name="" id="" class=" mr-5"> Others:
                                                <input type="text" placeholder="User input" name="" id=""
                                                    class="form-control w-75 float-right">
                                            </td>
                                            <td><select name="" placeholder="Select Supplier" id=""
                                                    class="form-control">
                                                    <option>select Supplier</option>
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
                                <h5><b>Catatan</b></h5>
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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Start datetime</th>
                                            <th>End datetime</th>
                                            <th>Total Time(min)</th>
                                            <th>Machine</th>
                                            <th>Operator</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><button class="btn btn-primary">+</button></td>
                                            <td>Start_time</td>
                                            <td>Pause_time</td>
                                            <td>auto_calculate</td>
                                            <td>machine_no</td>
                                            <td>operator_</td>
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
                                <h5><b>Production Machine Detail</b></h5>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered">
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
                                        <tr>
                                            <td>production_status</td>
                                            <td>Machine_no</td>
                                            <td>datetime_start</td>
                                            <td>datetime_end</td>
                                            <td>end_datetime - start_datetime</td>
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

                <div class="row mt-2">
                    <div class="col-md-12">
                        <button class="btn btn-primary float-right">Save</button>
                    </div>
                </div>

            </div>

            <a href="{{route('digitalPrinting.index')}}">back to list</a>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:1000px; margin-left:-350px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Production Output Details</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
             <thead>
                <tr>
                    <th>Action</th>
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
                    <td><button class="btn-primary">-</button></td>
                    <td><input type="text" name="" id="" class="form-control"></td>
                    <td><input type="text" name="" id="" class="form-control"></td>
                    <td><input type="text" name="" id="" class="form-control"></td>
                    <td><input type="text" name="" id="" class="form-control"></td>
                    <td><input type="text" name="" id="" class="form-control"></td>
                    <td><button class="btn btn-primary">Check</button></td>
                    <td>datetime / username</td>
                    <td><button class="btn btn-primary">Verify</button></td>
                    <td>datetime / username</td>
                </tr>
             </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</form>
@endsection