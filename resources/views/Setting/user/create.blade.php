@extends('layouts.app')

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
                            <div class="col-md-8">
                                <h4>User Information </h4>
                            </div>
                            <div class="col-md-4 d-flex justify-content-end">
                                <div class="form-group">
                                    <label class="ckbox"><input checked="" type="checkbox" name="is_active"><span class="tx-17">Is Active</span></label>
                            </div>
                        </div>
                        <form action="{{route('user.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input type="text" name="full_name" id="" class="form-control" value="{{old('full_name')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" id="" class="form-control" value="{{old('email')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Phone Num.</label>
                                        <input type="number" name="phone_no" id="" class="form-control" value="{{old('phone_no')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">User Name</label>
                                        <input type="text" name="user_name" id="" class="form-control" value="{{old('user_name')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" id="" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Designation</label>
                                        <select name="designation" class="form-select form-control">
                                            <option value="" disabled selected>Select any option</option>
                                            @foreach ($designations as $designation)
                                                <option value="{{ $designation->id }}" @selected(old('designation') == $designation->id)>
                                                    {{ $designation->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Department</label>
                                        <select name="department" class="form-select form-control">
                                            <option value="" disabled selected>Select any option</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}" @selected(old('department') == $department->id)>
                                                    {{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Roles</label>
                                        <select name="role[]" class="form-select" multiple>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    @if (old('role')) {{ in_array($role->id, old('role')) ? 'selected' : '' }} @endif>
                                                    {{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-4 d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary ">Submit</button>
                                </div>
                            </div>
                    </div>
                    </form>

                </div>

            </div>
            <a href="{{ route('user') }}" class="btn">Back To List</a>
        </div>
    </div>
@endsection
