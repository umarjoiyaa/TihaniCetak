@extends('layouts.app')

@section('content')
<form action="" method="post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="float-left"><b>BORANG SERAH KERJA (KULIT BUKU / COVER)</b></h5>
                                <p class="float-right">TCBS-B33 (Rev. 1)</p>
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
                                        <label for="">Po No</label>
                                        <input type="text" value="Admin" readonly name="" id="" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Disediakan Oleh</div>
                                            <input type="text" readonly value="Admin" name="" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label"> Sales Order No </div>
                                            <select name="" id="" class="form-control">
                                                <option value="">Select Sales Order no</option>
                                                <option value="">SO-001496</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Tajuk</div>
                                            <input type="text" readonly value="auto Display" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Nama Subkontraktor</div>
                                            <select name="" id="" class="form-control">
                                                <option value="">Select Subkontraktor</option>
                                                <option value="">SO-001496</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Kuantiti </div>
                                            <input type="text" value="auto Display " readonly name="" id=""
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Saiz Kertas</div>
                                            <input type="text" value="auto Display " readonly name="" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="card" style="background:#f1f0f0;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><b>Jenis Finishing</b></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>UV+Texture Emboss</h5>
                                            </div>
                                            <div class="col-md-6"><input type="text" placeholder="input text" name=""
                                                    id="" class="form-control"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>Matt Lamination</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>Spot Miraval</h5>
                                                
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>Emboss</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>UV Vanish</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>Creasing Line</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>Punch Hole</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>Punch Hole</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>Others</h5>
                                            </div>
                                            <div class="col-md-6"><input type="text" placeholder="input text" name=""
                                                    id="" class="form-control"></div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>Gloss Lamination</h5>
                                            </div>
                                           
                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>Spot UV</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>Hot Stamping</h5>
                                            </div>
                                            <div class="col-md-6"><input type="text" placeholder="input text" name=""
                                                    id="" class="form-control"></div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>Deboss</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>Spot Corse UV</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>Die Cut</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>Numbering</h5>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-4">
                                                <h5>Round Corner</h5>
                                            </div>

                                        </div>

                                        

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="background:#f1f0f0;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2"><input type="checkbox" name="" id=""><span class="ml-3">Emboss</span></div>
                                            <div class="col-md-2"><input type="checkbox" name="" id=""><span class="ml-3">Deboss</span></div>
                                            <div class="col-md-2"><input type="checkbox" name="" id=""><span class="ml-3">Hotstamping</span></div>
                                            <div class="col-md-2"><input type="checkbox" name="" id=""><span class="ml-3">Spot Uv</span></div>
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2"><input type="checkbox" name="" id=""><span class="ml-5">Lain-lain</span></div>
                                            <div class="col-md-3"><input type="text" placeholder="input text" name="" id="" class="form-control"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="background:#f1f0f0;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Siap Finishing hantar ke </label>
                                        <input type="text" class="form-control" placeholder="Input Text" name="" id="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Dateline:</label>
                                        <input type="date" class="form-control" name="" id="">
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
            </div>
        </div>
        <a href="{{route('BorangeSerahKerja.index')}}">back to list</a>
    </div>
    </div>
    </div>
</form>
@endsection