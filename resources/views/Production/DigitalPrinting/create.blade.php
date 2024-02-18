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
                                        <input type="date" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">By</label>
                                    <input type="text" value="Admin" readonly name="" id="" class="form-control">
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select name="" id="" class="form-control">
                                            <option value="">select sales Order no</option>
                                            <option value="">SO-001496</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text" value="Auto Display SO" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" readonly value="auto Display" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Pelanggan</div>
                                        <input type="text" value="auto Display" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Saiz Produk </div>
                                        <input type="text" value="auto Display SO" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kuantiti SO</div>
                                        <input type="text" value="auto Display SO" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Jumlah mukasurat</div>
                                        <input type="text" value="Auto display (based SO) - editable" readonly name=""
                                            id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kuantiti Waste</div>
                                        <input type="text" placeholder="interger input" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Remark</div>
                                        <input type="text" placeholder="User Input" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
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
                                    <select name="" id="" placeholder="Pilih print" class="form-control">
                                        <option value="">1C</option>
                                        <option value="">4C</option>
                                    </select>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
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
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Gloss
                                                    Lamination</td>
                                                <td>
                                                    <select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Matt
                                                    Lamination</td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">SPOT UV</td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Hot Stamping
                                                </td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Emboss</td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Diecut</td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Round corner
                                                </td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Round back
                                                </td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Square Back
                                                </td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5"> Others:
                                                    <input type="text" placeholder="User Input" name="" id=""
                                                        class="form-control w-75 float-right">
                                                </td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
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
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Binding</th>
                                                <th>Partner</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Perfect Bind
                                                </td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Staple Bind
                                                </td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Wire 0</td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Hard Cover
                                                </td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Creasing Line
                                                </td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Cut to Size
                                                </td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Folding
                                                </td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5"> Others:
                                                    <input type="text" placeholder="User Input" name="" id=""
                                                        class="form-control w-75 float-right">
                                                </td>
                                                <td><select name="" placeholder="select Supplier" id=""
                                                        class="form-control">
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
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary float-right">Save</button>
                    </div>
                </div>
            </div>
            <a href="{{route('digitalPrinting.index')}}">back to list</a>
        </div>
    </div>
   
   
</form>
@endsection