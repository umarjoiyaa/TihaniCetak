@extends('app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="card">
                    <div class="card-header">
                        <h4> Area-Shelf - Create</h4>
                    </div>
                    <div class="card-body">
                        
                        <form action="">
                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Shelf</label>
                                            <input type="text" name="Shelf" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="">Shelf Code</label>
                                            <input type="text" name="Shelfcode" id="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="">Level</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">select any option</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <button class="btn btn-sm btn-primary float-right">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    
                    </div>

               <a href="{{route('area_Shelf.index')}}" class="btn ">Back To List</a>
            </div>
        </div>
    </div>
@endsection