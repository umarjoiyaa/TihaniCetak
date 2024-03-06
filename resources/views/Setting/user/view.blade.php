@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Manager User - View</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>User Information </h4>
                            </div>
                            <div class="col-md-4 d-flex justify-content-end">
                                <div class="form-group">
                                    <label class="ckbox"><input disabled @checked($user->is_active == "yes") type="checkbox" name="is_active"><span class="tx-17">Is Active</span></label>
                                </div>
                        </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input disabled type="text" name="full_name" id="" class="form-control"
                                        value="{{ $user->full_name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input disabled type="email" name="email" id="" class="form-control"
                                        value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Phone Num.</label>
                                    <input disabled type="text" name="phone_no" id="" class="form-control"
                                        value="{{ $user->contact_no }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">User Name</label>
                                    <input disabled type="text" name="user_name" id="" class="form-control"
                                        value="{{ $user->user_name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Designation</label>
                                    <select disabled name="designation" class="form-select">
                                        <option value="" disabled selected>Select any option</option>
                                        @foreach ($designations as $designation)
                                            <option value="{{ $designation->id }}" @selected($user->designation == $designation->id)>
                                                {{ $designation->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Department</label>
                                    <select disabled name="department" class="form-select">
                                        <option value="" disabled selected>Select any option</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" @selected($user->department == $department->id)>
                                                {{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Roles</label>
                                    @php
                                        $item = json_decode($user->role_ids);
                                    @endphp
                                    <select disabled name="role" class="form-select" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                @if ($item) {{ in_array($role->id, $item) ? 'selected' : '' }} @endif>
                                                {{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-md-12">
                                <button class="btn btn-sm btn-primary float-end">Submit</button>
                            </div> --}}
                        </div>
                    </div>

                </div>

            </div>
            <a href="{{ route('user') }}" class="btn"><i class="ti-arrow-left mx-2 mt-1"></i> Back To List</a>
        </div>
    </div>
@endsection
