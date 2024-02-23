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
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Tarikh</label>
                                            <input type="date" readonly name="" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Po No</label>
                                        <input type="text" value="123-1" readonly name="" id="" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="label">Disediakan Oleh</label>
                                            <input type="text" readonly value="Admin" name="" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label"> Sales Order No </div>
                                            <select name="" id="" readonly class="form-control">
                                                <option value="">Select Sales Order no</option>
                                                <option value="" selected>SO-001496</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Tajuk</div>
                                            <input type="text" readonly value="IQRO' GENIUS -RUMI (NEWCOVER)" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Nama Subkontraktor</div>
                                            <select name="" id="" readonly class="form-control">
                                                <option value="">Select Subkontraktor</option>
                                                <option value="" selected>Subcon A</option>
                                                <option value="">Subcon B</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Jumlah Seksyen </div>
                                            <input type="text" value="3" readonly name="" id=""
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Jenis</div>
                                            <select name="" readonly id="" class="form-control">
                                                <option value="">pilih Jenis</option>
                                                <option value="">cover</option>
                                                <option value="" selected>End Paper</option>
                                                <option value="">Teks</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card w-100 p-3" style="background:wheat;">
                                            <div class="card-body">
                                            <h4>
                                                Notes: 
                                            </h4>
                                            <span>User can put seksyen in range too.</span>
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
                                        <h5><b>Binding</b></h5>
                                    </div>
                                </div>
                                <div class="row mt-">
                                    <div class="col-md-4">
                                        <label for="">Kuantiti Slap Binding</label>
                                        <input type="text" value="5200" name="" id="" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Waste Binding</label>
                                        <input type="text" value="200" name="" id="" class="form-control">
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                    <h5><b>Jenis Binding</b></h5>
                                    </div>
                                    <div class="col-md-4 mt-5">
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
                                            <div class="col-md-1"><input type="checkbox" checked name="" id=""></div>
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
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-6">
                                                <h5>Others</h5>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-5">
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
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-6">
                                                <h5>Ribbon  </h5>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-5">
                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" checked name="" id=""></div>
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
                                            <div class="col-md-1"><input type="checkbox" name="" id=""></div>
                                            <div class="col-md-6">
                                                <h5>Chipboard</h5>
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
                                            <div class="col-md-1"><input type="checkbox" checked name="" id=""></div>
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

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <button class="btn btn-primary float-right">print</button>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{route('BorangeSerahKerja_Teks.index')}}">back to list</a>
            </div>
        </div>
    
</form>
@endsection