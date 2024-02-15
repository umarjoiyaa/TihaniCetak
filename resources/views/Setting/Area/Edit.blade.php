@extends('layouts.app')
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title tx-20 mg-b-0 p-2">AREA</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-3">
                        <form action="{{ route('area.update', $area->id) }}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="control-group form-group">
                                    <label class="form-label">Area Name</label>
                                    <input type="text" class="form-control required" name="name"
                                        value="{{ $area->name }}" placeholder="Area Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="control-group form-group">
                                    <label class="form-label">Area Code</label>
                                    <input type="text" class="form-control required" name="code"
                                        value="{{ $area->code }}" placeholder="Area Code">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="control-group form-group">
                                    <label class="form-label">Shelf</label>
                                    <select name="shelf" class="form-select">
                                        <option value="" disabled selected>Select any option</option>
                                        @foreach ($shelves as $shelf)
                                            <option value="{{ $shelf->id }}" @selected($area->shelf_id == $shelf->id)>
                                                {{ $shelf->name }}</option>
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
                <a href="{{ route('area') }}" class="btn d-flex"><i class="ti-arrow-left mx-2 mt-1"></i> Back to
                    list</a>
            </div>
        </div>
    </div>
@endsection