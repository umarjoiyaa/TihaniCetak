@extends('layouts.app')
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title tx-20 mg-b-0 p-2">AREA SHELF</h4>

                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('area_shelf.store') }}" method="post">
                    <div class="row mt-3">
                            @csrf
                            <div class="col-md-4">
                                <div class="control-group form-group">
                                    <label class="form-label">Shelf Name</label>
                                    <input type="text" class="form-control required" name="name"
                                        value="{{ old('name') }}" placeholder="Shelf Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="control-group form-group">
                                    <label class="form-label">Shelf Code</label>
                                    <input type="text" class="form-control required" name="code"
                                        value="{{ old('code') }}" placeholder="Shelf Code">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="control-group form-group">
                                    <label class="form-label">Level</label>
                                    <select name="level" class="form-select">
                                        <option value="" disabled selected>Select any option</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}" @selected(old('level') == $level->id)>
                                                {{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="row mt-3 d-flex justify-content-end">
                        <div class="col-md-4 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('area_shelf') }}" class="btn d-flex"><i class="ti-arrow-left mx-2 mt-1"></i> Back to
                    list</a>
            </div>
        </div>
    </div>
@endsection
