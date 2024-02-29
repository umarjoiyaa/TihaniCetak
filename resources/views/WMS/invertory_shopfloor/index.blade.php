@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5><b>INVENTORY SHOPFLOOR</b></h5>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-3">
                        <div class="card" style="border:2px solid black; width:200px;">
                            <div class="card-header">
                                <h6 class="text-center" style="background:#ffe1e7;">Area 1</h6>
                            </div>
                            <div class="card-body text-center">
                                <a href="" type="button">shelf - 1: 1200</a>
                                <a href="" type="button">shelf - 2: 200</a>
                            </div>
                            <div class="card-footer">
                                <h6 class="text-center" style="background:#ffe1e7;">Total: 1400</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="border:2px solid black; width:200px;">
                            <div class="card-header">
                                <h6 class="text-center" style="background:#ffe1e7;">Area 2</h6>
                            </div>
                            <div class="card-body text-center">
                                <a href="" type="button">shelf - 1: 1200</a>
                                <a href="" type="button">shelf - 2: 200</a>
                            </div>
                            <div class="card-footer">
                                <h6 class="text-center" style="background:#ffe1e7;">Total: 1400</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
