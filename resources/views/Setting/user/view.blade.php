@extends('app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="card">
                    <div class="card-header">
                        <h4> Manager User - view</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>User Information </h4>
                            </div>
                        </div>
                        <form action="">
                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Full Name</label>
                                            <input type="text" placeholder="AA Bin BB" name="name" id="" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" placeholder="AA@gmail.com" name="name" id="" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Phone Num.</label>
                                            <input type="text" placeholder="01123454532" name="name" id="" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">User Name</label>
                                            <input type="text" placeholder="AA" name="name" id="" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" placeholder="123456" name="name" id="" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Designation</label>
                                            <input type="text" placeholder="Supviouser" name="name" id="" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Department</label>
                                            <input type="text" placeholder="Production" name="name" id="" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Role</label>
                                            <input type="text" placeholder="Production" name="name" id="" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    
               </div>
               
               <a href="{{route('user.index')}}" class="btn">Back To List</a>
            </div>
        </div>
    </div>
@endsection