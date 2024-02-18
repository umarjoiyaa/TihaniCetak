@extends('layouts.app')

@section('content')
<div class="row">
    <div class="card  w-100">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4><b>Production SHOOPFLOOR</b></h4>
                </div>
            </div>
            <div class="row mt-3">

                <div class="col-md-6">
                    <div class="col-md-12">
                        <h4><b>Level 1</b></h4>
                    </div>
                    <img alt="" src="{{ asset('assets/img/ShoopFloor/FirstFloor1.png') }}">
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <h4><b>Ground Floor</b></h4>
                    </div>
                    <img alt="" src="{{ asset('assets/img/ShoopFloor/GroundFloor1.png') }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection