@extends('layouts.app')

@section('content')
<form action="" method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>BORANG SERAH KERJA (TEKS)- Create</b></h5>
                            <p class="float-right">TCBS-B34 (Rev. 2)</p>
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
                                    <label for="">Po No</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label class="label">Disediakan Oleh</label>
                                        <input type="text" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label"> Sales Order No </div>
                                        <select name="" id="sales" class="form-control form-control">
                                            <!-- <option value="">Select Sales Order no</option> -->
                                            <option value="">SO-001496</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text" readonly class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Nama Subkontraktor</div>
                                        <select name="" id="nama" class="form-control form-select">
                                            <!-- <option value="">Select Subkontraktor</option> -->
                                            <option value="">Subcon A</option>
                                            <option value="">Subcon B</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Jumlah Seksyen </div>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Jenis</div>
                                        <select name="" id="jenis" class="form-control form-select">
                                            <!-- <option value="">pilih Jenis</option> -->
                                            <option value="">cover</option>
                                            <option value="">End Paper</option>
                                            <option value="">Teks</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Binding</b></h5>
                                </div>
                            </div>
                            <div class="row mt-">
                                <div class="col-md-4">
                                    <label for="">Kuantiti Slap Binding</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Waste Binding</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <h5><b>Jenis Binding</b></h5>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Thread Sewn</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Round Back</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Square Back</h5>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Wire O</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id="createinput"></div>
                                        <div class="col-md-6">
                                            
                                            <div class="row">
                                                <div class="col-md2">
                                                <h5 style="padding-left:px;">Others</h5>
                                                </div>
                                                <div class="col-md-8" >
                                                    <div  id="input" style="width:150px;"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Gloss Lamination</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Lock Bind</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Staple Bind</h5>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Head & tail Band</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id="newInput"></div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p style="font-size:13px; font-weight:600;">Ribbon </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="boxinput" style="width:100px;"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div id="labelContainer1"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Perfect Bind</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Soft cover</h5>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Hard Cover</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id="chipinput"></div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p style="font-size:12px;font-weight:600;">Chipboard</9>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="chipinput1"></div>
                                                </div>
                                                <div class="col-md-2" id="labelContainer"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h4>Sample</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Buku</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                        <div class="col-md-6">
                                            <h5>Lipat</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">

                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <label for="0">Dateline</label>
                                    <input type="date" name="" placeholder="date picker" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="text-center" style="font-size:20px; color:black; dispaly:inline-block;">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <h5 style="font-size:20px;"><b>PERINGATAN :</b> <br>
                                                <span style="color:black; font-size:14px;">
                                                    <b>SERAHKAN SAMPLE KEPADA QC/EKSEKUTIF QA/PENGURUS OPERASI/PENYELIA
                                                        OPERASI UNTUK PENGESAHAN SEBELUM MEMULAKAN PROSES LIPAT</b>
                                                </span>
                                            </h5>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div> -->
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button class="btn btn-primary mx-2 mt-3">Save</button>
                            <button class="btn btn-primary  mt-3">Print</button>
                        </div>
                    </div>
                </div>


            </div>
            <a href="{{route('BorangeSerahKerja_Teks.index')}}">back to list</a>
        </div>
    </div>


</form>
@endsection
@push('custom-scripts')
<script>
    $(document).ready(function () {
        const createInputCheckbox = $('#createinput');
        const inputContainer = $('#input');

        createInputCheckbox.change(function () {
            if (createInputCheckbox.prop('checked')) {
                const newInput = $('<input type="text" class="form-control w-100">');

                inputContainer.append(newInput);
            } else {
                inputContainer.empty();
            }
        });

        const chipinputCheckbox = $('#chipinput');
        const chipinputContainer = $('#chipinput1');
        const labelContainer = $('#labelContainer');

        chipinputCheckbox.change(function() {
            if (chipinputCheckbox.prop('checked')) {
                const newInput = $('<input type="text" class="form-control">');

                const newLabel = $('<label>gsm</label>');

                chipinputContainer.append(newInput);

                labelContainer.append(newLabel);
            } 
        });

            const chipinputCheckbox1 = $('#newInput');
            const chipinputContainer1 = $('.boxinput');
            const labelContainer1 = $('#labelContainer1');

            chipinputCheckbox1.change(function() {
                if (chipinputCheckbox1.prop('checked')) {
                const newInput1 = $('<input type="text" class="form-control">');

                const newLabel1 = $('<label>pcs</label>');

                chipinputContainer1.append(newInput1);

                labelContainer1.append(newLabel1);
                } 
            });
    });
    
    </script>
@endpush