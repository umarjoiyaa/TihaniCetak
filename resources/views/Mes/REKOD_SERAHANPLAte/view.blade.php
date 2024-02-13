@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>Senarai Semak Pencetakan Digital</h5>

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
                                    <label for="">Disediakan Oleh (Unit CTP)</label>
                                    <input type="text" value="Admin" readonly name="" id="" class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Diterima Oleh</div>
                                        <select name="" readonly class="form-control" id="">
                                            <option value="">Select User</option>
                                            <option value="" selected>User A</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Sales Order  No.</div>
                                        <select name="" readonly class="form-control" id="">
                                            <option value="">Pilih sales Order</option>
                                            <option value="" selected>SO-001387</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Jenis</div>
                                        <select name="" readonly class="form-control" id="">
                                            <option value="">Pilih Jenis</option>
                                            <option value="" selected>Cover</option>
                                            <option value="">Teks</option>
                                            <option value="">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Mesin</div>
                                        <select name="" readonly class="form-control" id="">
                                            <option value="">Pilih Menis</option>
                                            <option value="" selected>P1</option>
                                            <option value="">P2</option>
                                            <option value="">P3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Seksyen No.</div>
                                        <input type="text" readonly value="1" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                    <div class="label">Kuaniti Plate.</div>
                                        <input type="text" readonly value="2" name="" id="" class="form-control">
                                    </div>
                                </div>

                                
                                <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">status Job</label>
                                            <input type="BAhARU" readonly value="Auto display (based SO)" name="" id="" class="form-control">
                                        </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <h5>Bahagian A ( Semakan File)</h5>
                        </div>
                        <div class="col-md-7"></div>
                        <div class="col-md-5">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th  >item</th   >
                                        <th  >
                                            <div class="text-center">OK</div>
                                        </th    >
                                        <th  >NG</th >

                                    </tr>
                                    
                                </thead>
                               <tbody>
                                <tr>
                                    <td>Dummy Lipat</td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" Checked name="" id=""></td>
                                </tr>
                                <tr>
                                    <td>Sample</td>
                                    <td><input type="checkbox" name="" id="" ></td>
                                    <td><input type="checkbox" checked name="" id="" ></td>
                                </tr>
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('SenariSemak.index')}}">back to list</a>
    </div>
</div>
</div>
@endsection