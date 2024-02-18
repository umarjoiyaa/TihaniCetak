@extends('layouts.app')

@section('content')
<form action="" method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>JOBSHEET - THREE KNIFE</b></h5>
                            <p class="float-right">TCBS-B52 (Rev.1)</p>
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
                                        <input type="date" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Disediakan Oleh</label>
                                    <input type="text" value="Admin" readonly name="" id="" class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Operator</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Operator</option>
                                        <option value="">User A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select name="" id="" readonly class="form-control">
                                            <option value="">select sales Order no</option>
                                            <option value="" selected>SO-001496</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label"> Tajuk </div>
                                        <input type="text" value="IQRO' GENIUS - RUMI (NEW COVER)" readonly name=""
                                            id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" readonly value="CP-2490" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Pelanggan</div>
                                        <input type="text" value="EDUKID DIStRIBUTORS SND BHD" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kuantiti So </div>
                                        <input type="text" value="5000" readonly name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Saiz Buku</div>
                                        <input type="text" value="15cm X 21cm" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Mesin</div>
                                        <input type="text" readonly value="3 Knife" name="" id="" class="form-control">
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
                                                <td>production</td>
                                                <td>Machine_no</td>
                                                <td>12/12/2023 9:00 AM</td>
                                                <td>12/12/2023 4:30 PM</td>
                                                <td>450</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
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
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{route('ProductionJobSheet_StapleBIND.index')}}">back to list</a>
        </div>
    </div>
</form>
@endsection