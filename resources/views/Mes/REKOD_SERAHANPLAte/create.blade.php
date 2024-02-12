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
                                        <input type="date" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Disediakan Oleh (Unit CTP)</label>
                                    <input type="text" value="Admin" readonly name="" id="" class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Diterima Oleh</div>
                                        <input type="text" value="User A" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Sales Order  No.</div>
                                        <input type="text" value="SO-001496" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Jenis</div>
                                        <input type="text" readonly value="Cover"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Mesin</div>
                                        <input type="text" value="P1" name="" id=""
                                            class="form-control">
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
                                            <input type="text" readonly value="BAHARU" name="" id="" class="form-control">
                                        </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <h5>Bahagian A ( Semakan File)</h5>
                        </div>
                        <div class="col-md-11">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td >item</td>
                                        <td >
                                            <div class="text-center">OK</div>
                                        </td>
                                        <td >NG</td>

                                    </tr>
                                    
                                </thead>
                               <tbody>
                                <tr>
                                    <td>Dummy Lipat</td>
                                    <td><input type="checkbox" name="" id="" class="form-control"></td>
                                    <td><input type="checkbox" name="" id="" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Sample</td>
                                    <td><input type="checkbox" name="" id="" class="form-control"></td>
                                    <td><input type="checkbox" name="" id="" class="form-control"></td>
                                </tr>
                               </tbody>
                            </table>
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
        <a href="{{route('SenariSemak.index')}}">back to list</a>
    </div>
</div>
</div>
@endsection