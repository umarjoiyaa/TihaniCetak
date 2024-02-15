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
                                <h5 class="float-left"><b>JOBSHEET - MESIN LIPAT</b></h5>
                                <p class="float-right">TCBS-B46 (Rev. 1)</p>
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
                                            <div class="label"> Tajuk </div>
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
                                            <div class="label">Kuantiti So </div>
                                            <input type="text" value="auto Display SO" readonly name="" id=""
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Jumlah Seksyen</div>
                                            <input type="text" value="auto Display SO" readonly name="" id=""
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Jenis Lipatan</div>
                                            <select name="" id="" placeholder="" class="form-control">
                                                <option value="">Pilih Jenis Lipatan</option>
                                                <option value="">Prefect Bind</option>
                                                <option value="">Lock Bind</option>
                                                <option value="">Staple Bind</option>
                                                <!-- <option value="">order</option> -->
                                                <!-- <option value="">PENEGELUAREN</option> -->
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Mesin</div>
                                            <select name="" id="" placeholder="Pilih Kategori Job" class="form-control">
                                                <option value="">Pilih Mesin</option>
                                                <option value="">F1</option>
                                                <option value="">F2</option>
                                                <option value="">F3</option>
                                                <!-- <option value="">order</option> -->
                                                <!-- <option value="">PENEGELUAREN</option> -->
                                            </select>
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

                       


                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center" style="font-size:20px; color:red; dispaly:inline-block;">
                                    <div class="row">
                                       
                                        <div class="col-md-12">
                                            <h5 style="font-size:20px;"><b>PERINGATAN :</b> <br>
                                                <span style="color:black; font-size:14px;">
                                                <b>SERAHKAN SAMPLE KEPADA QC/EKSEKUTIF QA/PENGURUS OPERASI/PENYELIA OPERASI UNTUK PENGESAHAN SEBELUM MEMULAKAN PROSES LIPAT</b>
                                                </span>
                                            </h5>
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


                </div>
            </div>
        </div>
        <a href="{{route('ProductionJobSheet_MesinLipat.index')}}">back to list</a>
    </div>
    </div>
    </div>
</form>
@endsection