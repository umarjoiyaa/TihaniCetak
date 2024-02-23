@extends('layouts.app')

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
                                <div class="col-md-4 mt-3">
                                    <label>Operator</label>
                                    <select name="" id="operator" class="form-control form-select">
                                        <option value="">Admin</option>
                                        <option value="" selected>Admin</option>
                                        <option value="">User A</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select name="" id="sales" class="form-control form-select">
                                            <option value="">select sales Order no</option>
                                            <option value="">SO-001496</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text" readonly name="" id="" class="form-control">
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
                                        <div class="label">Kuantiti SO</div>
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
                                        <label for="">Lebihan Stok</label>
                                        <input type="text" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Mesin</div>
                                        <select name="" id="mesin1" class="form-control form-select">
                                            <option value="">SMZP (2C)</option>
                                            <option value="">RYOBI (4C)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kertas: </div>
                                        <input type="text" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Saiz Potong:</div>
                                        <input type="text" readonly name="" id="" class="form-control">
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



                    <div class="card w-100" style="background:#f1f0f0; border-radius:5px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Arahan</b></h5>
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
                                    <input type="text" readonly name="" id="" class="form-control">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="">Plate</label>
                                    <select name="" id="plate" class="form-control form-select">
                                        <option value="">pilih Plate (lama/Baru)</option>
                                        <option value="">Plate lama</option>
                                        <option value="">Plate BARU</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="">Saiz Produk</label>
                                    <input type="text" readonly name="" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0; border-radius:5px;">
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h5><b>Teks</b></h5>
                                </div>

                                <div class="col-md-4">
                                    <label for="">Print</label>
                                    <input type="text" class="form-control" readonly name="" id="">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0; border-radius:5px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4><b>Seksyen</b></h4>
                                </div>
                            </div>
                            <div class="row" style="margin-top:-80px;">
                                <div class="col-md-4">
                                    <label for="">Seksyen NO</label>
                                    <input type="text" readonly name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Seksyen No</th>
                                                <th>Side</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><input type="text" name="" id="" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><input type="text" name="" id="" class="form-control">
                                                </td>
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
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Staple Bind</td>
                                                <td>
                                                    <select name="" id="staple" class="form-control form-select"
                                                        style="width:340px;">
                                                        <!-- <option>select Supplier</option> -->
                                                        <option value="In-house">In-house</option>
                                                        <option value="SupplierA">Supplier A</option>
                                                        <option value="SupplierB">Supplier B</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Perfect Bind</td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Lock Bind</td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Wire O
                                                </td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Hard Cover -
                                                    Square Back
                                                </td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Hard Cover -
                                                    Round Back

                                                </td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Sewing
                                                </td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="" id="" class=" mr-5">Round corner
                                                </td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                            </tr>


                                            <tr>
                                                <td><input type="checkbox" name="" id="enableInputCheckbox"
                                                        class=" mr-5"> Others:
                                                    <input type="text" name="" id="targetInput"
                                                        class="form-control w-50 float-right" disabled>
                                                </td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
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
                                                <td><button type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">+</button></td>
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


            </div>
            <a href="{{route('digitalPrinting.index')}}">back to list</a>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width:1300px; margin-left:-400px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Productio Output Detaial</h5>
                    <select id="seksyen" class="form-control form-select">
                        <option value="">seksyen1</option>
                        <option value="">seksyen2</option>
                        <option value="">seksyen3</option>
                    </select>
                </div>
                <div class="modal-body">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <td>Action</td>
                                <td>Section no</td>
                                <td>Side</td>
                                <td>Last Input</td>
                                <td>Waste Input</td>
                                <td>Rejection</td>
                                <td>Good Count</td>
                                <td>check</td>
                                <td>dateTime/user</td>
                                <td>verify</td>
                                <td>dateTime/user</td>
                            </tr> 
                        </thead>
                        <tbody>
                            <tr>
                                <td><button class="btn btn-primary">-</button></td>
                                <td>1</td>
                                <td> <select name="" id="sales1" class="form-control form-select">
                                            <option value="">A</option>
                                            <option value="">B</option>
                                            <option value="">A/B</option>
                                        </select></td>
                                <td><input type="text" name="" id="" class="form-control"></td>
                                <td><input type="text" name="" id="" class="form-control"></td>
                                <td><input type="text" name="" id="" class="form-control"></td>
                                <td><input type="text" name="" id="" class="form-control"></td>
                                <td><button class="btn btn-primary">Check</button></td>
                                <td></td>
                                <td><button class="btn btn-primary">Verify</button></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Closed</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@push('custom-scripts')
<script>
    // $('#table').DateTable();
    const enableInputCheckbox = $('#enableInputCheckbox');
    const targetInput = $('#targetInput');

    // Event handler for checkbox change
    enableInputCheckbox.change(function () {
        // Enable/disable input based on checkbox status
        targetInput.prop('disabled', !enableInputCheckbox.prop('checked'));
    });
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    var quill1 = new Quill('#editor1', {
        theme: 'snow'
    });
</script>
@endpush