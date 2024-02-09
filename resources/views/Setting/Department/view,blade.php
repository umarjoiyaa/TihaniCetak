@extends('app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header ">
                        <h4>View Department</h4>>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Department*</label>
                                        <input type="text" name="department" id="" class="form-control" placeholder="production" readonly>
                                    </div>
                                  
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                         <a href="index.html" class="btn btn-sm btn-primary mt-2 float-end">Submit</a>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
                <a href="{{route('department.index')}}">Back to List</a>
            </div>
        </div>
    </div>
@endsection