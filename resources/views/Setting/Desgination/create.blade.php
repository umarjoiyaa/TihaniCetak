@extends('app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header ">
                        <h4>Create Designation</h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Designation*</label>
                                        <input type="text" name="designation" id="" class="form-control">
                                    </div>
                                  
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                         <button class="btn btn-sm btn-primary mt-2 float-end">Submit</button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
                <a href="{{route('desgination.index')}}">Back to List</a>
            </div>
        </div>
    </div>
@endsection