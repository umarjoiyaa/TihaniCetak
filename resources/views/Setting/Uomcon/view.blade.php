@extends('app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="card">
                    <div class="card-header">
                        <h4> Product - Create</h4>
                    </div>
                    <div class="card-body">
                        
                        <form action="">
                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Form</label>
                                           <select name="" id="" class="form-control">
                                            <option value="">Select any  Option</option>
                                           </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">To</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Select any  Option</option>
                                           </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Base Value</label>
                                            <input type="text"  name="name" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">UOM Conversion</label>
                                            <input type="text"  name="name" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <button class="btn btn-sm btn-primary float-right">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    
                    </div>

               <a href="{{route('Product.index')}}" class="btn ">Back To List</a>
            </div>
        </div>
    </div>
@endsection