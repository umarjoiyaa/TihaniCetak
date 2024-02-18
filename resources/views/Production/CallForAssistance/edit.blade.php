@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3><b>CALL FOR ASSISTANCE</b></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Attended PIC</label>
                        <input type="text" readonly value="Admin" name="" id="" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Calling DateTime</label>
                            <input type="text" readonly value="12/12/2023 10:30 Am" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Attended date</label>
                            <input type="text" readonly value="12/12/2023" name="" id="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Submitted date</label>
                            <input type="text" readonly value="12/12/2023" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Flie</label>
                            <input type="file" class="form-control" name="" id="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Remarks</label>
                            <textarea name="" id="" cols="30" placeholder="UserInput" rows="5"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-2 mt-3" style="border:1px solid gray; width:150px; ">
                        <i class="fa fa-image pl-2 pt-2" style="font-size:150px;  color:gray; background:#fff;"></i>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn  btn-primary float-right">save</button>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{route('CallForAssistance.index')}}">Go back</a>
    </div>
</div>
@endsection