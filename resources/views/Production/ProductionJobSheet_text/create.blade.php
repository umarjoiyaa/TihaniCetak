@extends('layouts.app')

@section('css')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
@endsection

@section('content')
<form action="" method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>PRODUCTION JOBSHEET - TEXT</b></h5>
                            <p class="float-right">TCBS-B16 (Rev.2)</p>
                        </div>
                    </div>


                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Tarikh</label>
                                        <input type="text" name="date" value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
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
                                        <select name="" id="Sales" class="form-control form-select">
                                            <option value="">select sales Order no</option>
                                            <option value="">SO-001496</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text"  readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label"> Tajuk</div>
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
                                        <div class="label">Kuantiti So </div>
                                        <input type="text" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kuantiti Waste</div>
                                        <input type="text" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Mesin</div>
                                        <select name="" id="mesin" class="form-control form-select">
                                            <option value="">SMZP (2C)</option>
                                            <option value="">RUOBI (4C)</option>
                                            <option value="">KOMORI (8C)</option>
                                            <option value="">PANTONE</option>
                                            <!-- <option value="">order</option> -->
                                            <!-- <option value="">PENEGELUAREN</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kertas: </div>
                                        <input type="text"  name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Saiz Potong:</div>
                                        <input type="text"  name="" id=""
                                            class="form-control">
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

                    <div class="card" style="background:#f1f0f0; border-radius:5px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Status</b></h5>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="">status</label>
                                    <input type="text"  readonly name="" id=""
                                        class="form-control">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="">Plate</label>
                                    <select name="" id="plate" class="form-control form-select">
                                        <option value="">Plate lama</option>
                                        <option value="">Plate baru</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="">Saiz Produk</label>
                                    <input type="text"  readonly name="" id=""
                                        class="form-control">
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
                                <div class="col-md-4">
                                    <label for="">Print</label>
                                    <select name="" id="print1"  class="form-control form-select">
                                        <option value="">1C</option>
                                        <option value="">2C</option>
                                        <option value="">4C</option>
                                    </select>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-2">
                                    <label for="">Waste Paper</label>
                                    <input type="text"  name="" id="" class="form-control">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="">last Print</label>
                                    <input type="text"  name="" id="" class="form-control">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0; border-radius:5px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Seksyen</b></h5>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="card w-75  p-3" style="color:golden; background:wheat;">
                                        <div class="card-body">
                                            <h4><b>Note</b></h4>
                                            <span>1.section no. taken from senarai semak pra cetak</span>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-md-4" >
                                    <label for="">Seksyen No.</label>
                                    <input type="text"  name="" id=""
                                        class="form-control">
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-10 mt-3">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Machine</th>
                                                <th>Side</th>
                                                <th>last Print</th>
                                                <th>Kuantiti Waste</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="date" name="" class="form-control"
                                                        placeholder="date plan" id=""></td>
                                                <td>
                                                    <select name="" class="form-control form-select" id="Machine1">
                                                        <option value="">Machine</option>
                                                        <option value=""></option>
                                                        <option value=""></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="" class="form-control form-select" id="AB,A/B1">
                                                        <option value="">AB,A/B</option>
                                                        <option value=""></option>
                                                        <option value=""></option>
                                                    </select>
                                                </td>
                                                <td><input type="text" name="" class="form-control"
                                                         id=""></td>
                                                <td><input type="text" name="" class="form-control"
                                                         id=""></td>
                                                <td><label class="switch">
                                                    <input type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                    </label>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>


                                </div>

                                <div class="col-md-10">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Machine</th>
                                                <th>Side</th>
                                                <th>last Print</th>
                                                <th>Kuantiti Waste</th>
                                                <th>Action</th>
                                            </tr>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><input type="date" name="" class="form-control"
                                                        placeholder="date plan" id=""></td>
                                                <td>
                                                    <select name="" class="form-control form-select" id="machine">
                                                        <option value="">Machine</option>
                                                        <option value=""></option>
                                                        <option value=""></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="" class="form-control form-select" id="Ab,A/B">
                                                        <option value="">AB,A/B</option>
                                                        <option value=""></option>
                                                        <option value=""></option>
                                                    </select>
                                                </td>
                                                <td><input type="text" name="" class="form-control"
                                                         id=""></td>
                                                <td><input type="text" name="" class="form-control"
                                                         id=""></td>
                                            </tr>
                                        </tbody>
                                        </thead>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- <div class="card" style="background:#f1f0f0; border-radius:5px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><b>Status</b></h5>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="">status</label>
                                        <input type="text" value="auto display (based SO)" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="">Plate</label>
                                        <select name="" id="" placeholder="pilih Plate (lama/Baru)"
                                            class="form-control">
                                            <option value="">Plate lama</option>
                                            <option value="">Plate baru</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="">Saiz Produk</label>
                                        <input type="text" value="auto display (based SO)" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    <div class="card" style="background:#f1f0f0; border-radius:5px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Binding </b></h5>
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
                                                <td><input type="checkbox" name="" id="Input1" class=" mr-5">Staple Bind</td>
                                                <td>
                                                    <select name="" disabled placeholder="select Supplier" id="staplebind"
                                                        class="form-control form-select" style="width:340px;">
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Input2" class=" mr-5">Perfect Bind</td>
                                                <td><input type="text" disabled name="" id="input2" class="form-control"></td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" name="" id="Input3" class=" mr-5">Lock Bind</td>
                                                <td><input type="text" disabled name="" id="input3" class="form-control"></td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox"  name="" id="Input4" class=" mr-5">Wire O
                                                </td>
                                                <td><input type="text" disabled name="" id="input4" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Input5" class=" mr-5">Hard Cover -
                                                    Square Back
                                                </td>
                                                <td><input type="text" disabled name="" id="input5" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Input6" class=" mr-5">Hard Cover -
                                                    Round Back</td>
                                                <td><input type="text" disabled name="" id="input6" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Input7" class=" mr-5">Sewing
                                                </td>
                                                <td><input type="text" disabled name="" id="input7" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="Input8" class=" mr-5">Round corner
                                                </td>
                                                <td><input type="text"  disabled name="" id="input8" class="form-control"></td>
                                            </tr>


                                            <tr>
                                                <td><input type="checkbox" name="" id="Input9" class=" mr-5"> Others:
                                                    <input type="text" disabled  name="" id="input10"
                                                        class="form-control w-50 float-right">
                                                </td>
                                                <td><input type="text" disabled name="" id="input9" class="form-control"></td>
                                            </tr>
                                        </tbody>
                                    </table>
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
            <a href="{{route('ProductionJobSheet_text.index')}}">back to list</a>
        </div>  
    </div>
</form>
@endsection
@push('custom-scripts')
<script>
     var quill = new Quill('#editor', {
            theme: 'snow'
        });

        var quill1 = new Quill('#editor1', {
            theme: 'snow'
        });

        $("#Input1").change(function() {
            if($(this).is(":checked")) {
                $("#staplebind").prop("disabled", false);
                // $("#input1").prop("disabled", false);
            } else {
                $("#staplebind").prop("disabled", true);
                // $("#input1").prop("disabled", true);
            }
        });

        $("#Input2").change(function() {
            if($(this).is(":checked")) {
                $("#input2").prop("disabled", false);
            } else {
                $("#input2").prop("disabled", true);
            }
        });

        $("#Input3").change(function() {
            if($(this).is(":checked")) {
                $("#input3").prop("disabled", false);
            } else {
                $("#input3").prop("disabled", true);
            }
        });

        $("#Input4").change(function() {
            if($(this).is(":checked")) {
                $("#input4").prop("disabled", false);
            } else {
                $("#input4").prop("disabled", true);
            }
        });

        $("#Input5").change(function() {
            if($(this).is(":checked")) {
                $("#input5").prop("disabled", false);
            } else {
                $("#input5").prop("disabled", true);
            }
        });

         $("#Input6").change(function() {
            if($(this).is(":checked")) {
                $("#input6").prop("disabled", false);
                // $("#input2").prop("disabled", false);
            } else {
                $("#input6").prop("disabled", true);
                // $("#input2").prop("disabled", true);
            }
        });

        $("#Input7").change(function() {
            if($(this).is(":checked")) {
                $("#input7").prop("disabled", false);
            } else {
                $("#input7").prop("disabled", true);
            }
        });

        $("#Input8").change(function() {
            if($(this).is(":checked")) {
                $("#input8").prop("disabled", false);
            } else {
                $("#input8").prop("disabled", true);
            }
        });

        $("#Input9").change(function() {
            if($(this).is(":checked")) {
                $("#input9").prop("disabled", false);
                $("#input10").prop("disabled", false);

            } else {
                $("#input9").prop("disabled", true);
                $("#input10").prop("disabled", true);

            }
        });
        
        
</script>
@endpush