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
                                        <select name="mesin" id="mesin" class="form-control form-select">
                                            <option value="SMZP (2C)">SMZP (2C)</option>
                                            <option value="RUOBI (4C)">RUOBI (4C)</option>
                                            <option value="KOMORI (8C)">KOMORI (8C)</option>
                                            <option value="PANTONE">PANTONE</option>
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
                                    <input type="number"  name="seksyen_no" id="seksyen_no"
                                        class="form-control">
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="table-responsive mt-3">
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
                                                <td> <input type="text" disabled name="date_parent_section"
                                                    value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" class="form-control datepicker"
                                                    id="datepicker1"  pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy"></td>
                                                <td>
                                                    <select name="mesin_parent_section" disabled id="mesin_section" class="form-control mesin_parent_section form-select">
                                                        <option value="-1" disabled selected>Select any Mesin</option>
                                                        <option value="SMZP (2C)">SMZP (2C)</option>
                                                        <option value="RUOBI (4C)">RUOBI (4C)</option>
                                                        <option value="KOMORI (8C)">KOMORI (8C)</option>
                                                        <option value="PANTONE">PANTONE</option>
                                                        <!-- <option value="">order</option> -->
                                                        <!-- <option value="">PENEGELUAREN</option> -->
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="side_parent_section" disabled class="form-control side_parent_section form-select" id="side_">
                                                        <option value="-1" disabled selected>Select any Side</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="A/B">A/B</option>
                                                    </select>
                                                </td>
                                                <td><input type="number" disabled name="last_print_parent_section" id="last_print_parent_section" class="form-control "
                                                         id=""></td>
                                                <td><input type="number" disabled name="kuantiti_waste_parent_section" id="kuantiti_waste_parent_section" class="form-control"
                                                         id=""></td>
                                                <td><label class="switch">
                                                    <input type="checkbox" class="action" checked >
                                                    <span class="slider round"></span>
                                                    </label>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>


                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="child_table">
                                        <thead>
                                            <tr>
                                                <th>Sr</th>
                                                <th>Date</th>
                                                <th>Machine</th>
                                                <th>Side</th>
                                                <th>last Print</th>
                                                <th>Kuantiti Waste</th>
                                            </tr>
                                        <tbody>

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
            <a href="{{route('ProductionJobSheet_text')}}">back to list</a>
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

        $(document).on('change', '#datepicker1', function () {
            var value = $(this).val();
            $("#child_table tbody tr .datepicker").each(function () {
                $(this).val(value);
             });
        });

        $(document).on('keyup', '#kuantiti_waste_parent_section', function () {
            var value = $(this).val();
            $("#child_table tbody tr .kuantiti_waste_section").each(function () {
                $(this).val(value);
             });
        });

        $(document).on('keyup', '#last_print_parent_section', function () {
            var value = $(this).val();
            $("#child_table tbody tr .last_print_section").each(function () {
                $(this).val(value);
             });
        });

        $(document).on('change', '.mesin_parent_section', function () {
        var SelectedOptionValue = $(this).val();

        var selectbox = $(".mesin_section").toArray();
        selectbox.forEach(function (element) {
                $(element).val(SelectedOptionValue).trigger('change')
        })
    });

    $(document).on('change', '.side_parent_section', function () {
        var SelectedOptionValue = $(this).val();

        var selectbox = $(".side_section").toArray();
        selectbox.forEach(function (element) {
                $(element).val(SelectedOptionValue).trigger('change')
        })
    });

$(document).on('change', '.action', function () {
    var isChecked = $(this).prop('checked');

    if (isChecked) {
        $(this).closest("tr").find('.side_parent_section').attr('disabled', 'disabled');
        $(this).closest("tr").find('.mesin_parent_section').attr('disabled', 'disabled');
        $(this).closest("tr").find('#datepicker1').attr('disabled', 'disabled');
        $(this).closest("tr").find('#last_print_parent_section').attr('disabled', 'disabled');
        $(this).closest("tr").find('#kuantiti_waste_parent_section').attr('disabled', 'disabled');


        $("#child_table tbody tr .mesin_section ").each(function () {
                $(this).removeAttr('disabled')
        });
        $("#child_table tbody tr .side_section ").each(function () {
                $(this).removeAttr('disabled')
        });
    } else {

        $(this).closest("tr").find('.side_parent_section').removeAttr('disabled');
        $(this).closest("tr").find('.mesin_parent_section').removeAttr('disabled');
        $(this).closest("tr").find('#datepicker1').removeAttr('disabled');
        $(this).closest("tr").find('#last_print_parent_section').removeAttr('disabled');
        $(this).closest("tr").find('#kuantiti_waste_parent_section').removeAttr('disabled');

            $("#child_table tbody tr .mesin_section").each(function () {
                $(this).attr('disabled', 'disabled')
            });
            $("#child_table tbody tr .side_section").each(function () {
                $(this).attr('disabled', 'disabled')
            });
            $("#child_table tbody tr .datepicker").each(function () {
                $(this).attr('disabled', 'disabled')
            });
            $("#child_table tbody tr .last_print_section ").each(function () {
                $(this).attr('disabled', 'disabled')
            });
            $("#child_table tbody tr .kuantiti_waste_section").each(function () {
                $(this).attr('disabled', 'disabled')
            });

    }
})

        $(document).on('change','#seksyen_no',function(){
            var value = +$(this).val();
            var length = $('#child_table tbody tr').length == 0 ? 1 : $('#child_table tbody tr').length ;
            if (value > 0 && value < length) {
                    var currentLength = length - value;
                    console.log("currentLength:", currentLength); // Check the value of currentLength
                    for (let i = currentLength; i > 0; i--) {
                        console.log("Iteration:", i); // Check the iteration
                        $('#child_table tbody tr:last-child').remove();
                    }
                } else {
                for (let i = length; i <= value; i++) {
                    if ($('#child_table tbody tr').length > 0) {
                        var key = $('#child_table tbody tr').length + 1;
                    }else{
                        var key = 1;
                    }

                    if($('.action').prop('checked') != false){
                        var disable = 'disabled';
                    }else{
                        var disable = '';
                    }

                    $('#child_table tbody').append(`
                                                    <tr>
                                                <td>${i}</td>
                                                <td> <input type="text" disable name="date_section[${key}]"
                                                     class="form-control datepicker"
                                                    id="datepicker${i}"  pattern="\d{2}-\d{2}-\d{4}" class="date_section" placeholder="dd-mm-yyyy"></td>
                                                <td>
                                                    <select name="mesin_section[${key}]" disable style="width:100%" id="mesin${i}" class="form-control form-select mesin_section" id="machine">
                                                        <option value="-1" disabled selected>Select any Mesin</option>
                                                        <option value="SMZP (2C)">SMZP (2C)</option>
                                                        <option value="RUOBI (4C)">RUOBI (4C)</option>
                                                        <option value="KOMORI (8C)">KOMORI (8C)</option>
                                                        <option value="PANTONE">PANTONE</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="side_section[${key}]" disable style="width:100%" id="side${i}" class="form-control form-select side_section" id="Ab,A/B">
                                                        <option value="-1" disabled selected>Select any Side</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="A/B">A/B</option>
                                                    </select>
                                                </td>
                                                <td><input type="number" disable name="last_print_section[${key}]" class="form-control last_print_section"
                                                         id=""></td>
                                                <td><input type="number" disable name="kuantiti_waste_section[${key}]" class="form-control kuantiti_waste_section"
                                                         id=""></td>
                                            </tr>`);

                                            key++

                }

            }
                $('.mesin_section').select2();
                $('.side_section').select2();
                $(".datepicker").datepicker({
                dateFormat: 'dd-mm-yy'
            });
        })

</script>
@endpush
