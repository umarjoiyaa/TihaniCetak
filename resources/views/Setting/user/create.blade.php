@extends('app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="card">
                    <div class="card-header">
                        <h4> Manager User - Create</h4>
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
                                            <input type="text"  name="name" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email"  name="name" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Phone Num.</label>
                                            <input type="text"  name="name" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">User Name</label>
                                            <input type="text"  name="name" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password"  name="name" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Designation</label>
                                            <input type="text"  name="name" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Department</label>
                                            <input type="text"  name="name" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Role</label>
                                            <input type="text"  name="name" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-sm btn-primary float-end">Submit</button>
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