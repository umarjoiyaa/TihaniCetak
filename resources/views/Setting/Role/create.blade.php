@extends('layouts.app')
@section('css')
    <style>
        .nav-tabs .nav-link.active {
            background-color: #fff;
            color: #1c273c;
            font-weight: 500;
            letter-spacing: -0.1px;
            border-bottom: 3px solid #18002D;
            border-left: none;
        }

        .sub-menu {
            display: none;
        }

        .sub-menu.open {
            display: block;
        }

        .menu-arrow {
            cursor: pointer;
        }

        .card-body li {
            list-style: none;
        }
    </style>
@endsection
@section('content')
<form action="{{route('role.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4><b>Create New Role</b></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="myTabs">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1">Roles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2">Permissions</a>
                                </li>
                            </ul>

                            <div class="tab-content mt-2">
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab2">
                                    <div class="row mt-5">
                                        <div class="col-md-6">
                                            <ul>
                                                {{-- MES --}}
                                                <li>
                                                    <input type="checkbox" name="" id="Myinput"> MES
                                                    <label for="" data-toggle="collapse"
                                                        data-target="#ProductioncollapseOne" style="cursor:pointer;">
                                                        <i class="ti-angle-down menu-arrow"></i>
                                                    </label>
                                                    <ul id="ProductioncollapseOne" class="collapse ">
                                                        <li>
                                                            <input type="checkbox" class="myCheckbox" name=""
                                                                    id="input0">
                                                            <label for="">
                                                                 Management
                                                                <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                    data-target="#productiontwo"></i>
                                                            </label>
                                                            <ul id="productiontwo" class="collapse ">
                                                                @foreach ($managements as $key => $management)
                                                                    <li> 
                                                                        <input type="checkbox" class="myCheckbox a1"
                                                                                name="" id="Mes1">
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital">
                                                                           
                                                                            {{ $key }} <i
                                                                                class="ti-angle-down menu-arrow"></i>
                                                                        </label>
                                                                        <ul id="Digital">
                                                                            @foreach ($management as $key1 => $value)
                                                                                @foreach ($permissions as $value1)
                                                                                    @if ($value == $value1->name)
                                                                                        @php
                                                                                            $lastWord = Str::of($value)->explode(' ')->last();
                                                                                        @endphp
                                                                                        <li><input type="checkbox"
                                                                                                class="myCheckbox b1 "
                                                                                                name="permissions[]"
                                                                                                value="{{ $value1->id }}">
                                                                                            {{ $lastWord }} </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                <input type="checkbox" class="myCheckbox" name=""
                                                                    id="input1"> Laporan / Rekod Proses<i
                                                                    class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                    data-target="#productionthree"></i>
                                                            </label>
                                                            <ul id="productionthree" class="collapse ">
                                                                @foreach ($laporan_rekod_proses as $key => $laporan_rekod_prose)
                                                                    <li>
                                                                        <input type="checkbox" class="myCheckbox a2"
                                                                                name="" id="Mes2">
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital1">
                                                                            
                                                                            {{ $key }} <i
                                                                                class="ti-angle-down menu-arrow"></i>
                                                                        </label>
                                                                        <ul id="Digital1">
                                                                            @foreach ($laporan_rekod_prose as $key1 => $value)
                                                                                @foreach ($permissions as $value1)
                                                                                    @if ($value == $value1->name)
                                                                                        @php
                                                                                            $lastWord = Str::of($value)->explode(' ')->last();
                                                                                        @endphp
                                                                                        <li><input type="checkbox"
                                                                                                class="myCheckbox  b2"
                                                                                                name="permissions[]"
                                                                                                value="{{ $value1->id }}">
                                                                                            {{ $lastWord }} </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                <input type="checkbox" class="myCheckbox" name=""
                                                                    id="input2"> Laporan Pemeriksaan
                                                                Kualiti <i class="ti-angle-down menu-arrow"
                                                                    data-toggle="collapse"
                                                                    data-target="#productionfour"></i>
                                                            </label>
                                                            <ul id="productionfour" class="collapse ">

                                                                @foreach ($laporan_pemiriksaan_kualitis as $key => $laporan_pemiriksaan_kualiti)
                                                                    <li>
                                                                        <input type="checkbox" class="myCheckbox a3"
                                                                                name="" id="Mes3">
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital2">
                                                                            
                                                                            {{ $key }} <i
                                                                                class="ti-angle-down menu-arrow"></i>
                                                                        </label>
                                                                        <ul id="Digital2">
                                                                            @foreach ($laporan_pemiriksaan_kualiti as $key1 => $value)
                                                                                @foreach ($permissions as $value1)
                                                                                    @if ($value == $value1->name)
                                                                                        @php
                                                                                            $lastWord = Str::of($value)->explode(' ')->last();
                                                                                        @endphp
                                                                                        <li><input type="checkbox"
                                                                                                class="myCheckbox b3"
                                                                                                name="permissions[]"
                                                                                                value="{{ $value1->id }}">
                                                                                            {{ $lastWord }} </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                {{-- PRODUCTION --}}
                                                <li>
                                                    <input type="checkbox" name="" id="Myinput2">
                                                    <label for="" data-toggle="collapse"
                                                        data-target="#PRODUCTIONcollapseOne" style="cursor:pointer;">
                                                         PRODUCTION
                                                        <i class="ti-angle-down menu-arrow"></i>
                                                    </label>
                                                    <ul id="PRODUCTIONcollapseOne" class="collapse ">
                                                        <li>
                                                            <input type="checkbox" class="myCheckbox2" name="" id="input03">
                                                            <label for="" data-toggle="collapse"
                                                                data-target="#PRODUCTIONtwo">
                                                                
                                                                JOBSHEET
                                                                <i class="ti-angle-down menu-arrow"></i>
                                                            </label>
                                                            <ul id="PRODUCTIONtwo" class="collapse ">
                                                                @foreach ($job_sheets as $key => $job_sheet)
                                                                    <li>
                                                                    <input type="checkbox" class="myCheckbox2 a4"
                                                                                name="" id="">
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital3">
                                                                            
                                                                            {{ $key }} <i
                                                                                class="ti-angle-down menu-arrow"></i>
                                                                        </label>
                                                                        <ul id="Digital3">
                                                                            @foreach ($job_sheet as $key1 => $value)
                                                                                @foreach ($permissions as $value1)
                                                                                    @if ($value == $value1->name)
                                                                                        @php
                                                                                            $lastWord = Str::of($value)->explode(' ')->last();
                                                                                        @endphp
                                                                                        <li><input type="checkbox"
                                                                                                class="myCheckbox2 b4"
                                                                                                name="permissions[]"
                                                                                                value="{{ $value1->id }}">
                                                                                            {{ $lastWord }} </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" class="myCheckbox2" name="" id="input04">
                                                            <label for="" data-toggle="collapse"
                                                                data-target="#PRODUCTIONtwo1">
                                                                PRODUCTION
                                                                <i class="ti-angle-down menu-arrow"></i>
                                                            </label>
                                                            <ul id="PRODUCTIONtwo1" class="collapse ">
                                                                @foreach ($productions as $key => $production)
                                                                    <li>
                                                                        <input type="checkbox"  class="myCheckbox2 a5"
                                                                                name="" id="">
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital4">
                                                                            
                                                                            {{ $key }} <i
                                                                                class="ti-angle-down menu-arrow"></i>
                                                                        </label>
                                                                        <ul id="Digital4">
                                                                            @foreach ($production as $key1 => $value)
                                                                                @foreach ($permissions as $value1)
                                                                                    @if ($value == $value1->name)
                                                                                        @php
                                                                                            $lastWord = Str::of($value)->explode(' ')->last();
                                                                                        @endphp
                                                                                        <li><input type="checkbox"
                                                                                                class="myCheckbox2 b5"
                                                                                                name="permissions[]"
                                                                                                value="{{ $value1->id }}">
                                                                                            {{ $lastWord }} </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" class="myCheckbox2" name="" id="input05">
                                                            <label for="" data-toggle="collapse"
                                                                data-target="#PRODUCTIONtwo02">
                                                                
                                                                DASHBOARD
                                                                <i class="ti-angle-down menu-arrow"></i>
                                                            </label>
                                                            <ul id="PRODUCTIONtwo02" class="collapse show">
                                                                @foreach ($dashboards as $key => $dashboard)
                                                                    <li>
                                                                        <input type="checkbox" class="myCheckbox2 a6"
                                                                                name="" id="">
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital5">
                                                                            
                                                                            {{ $key }} <i
                                                                                class="ti-angle-down menu-arrow"></i>
                                                                        </label>
                                                                        <ul id="Digital5">
                                                                            @foreach ($dashboard as $key1 => $value)
                                                                                @foreach ($permissions as $value1)
                                                                                    @if ($value == $value1->name)
                                                                                        @php
                                                                                            $lastWord = Str::of($value)->explode(' ')->last();
                                                                                        @endphp
                                                                                        <li><input type="checkbox"
                                                                                                class="myCheckbox2 b6"
                                                                                                name="permissions[]"
                                                                                                value="{{ $value1->id }}">
                                                                                            {{ $lastWord }} </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                {{-- WMS --}}
                                                <li>
                                                    <input type="checkbox" name="" id="Myinput3">
                                                    <label for="" data-toggle="collapse"
                                                        data-target="#WMScollapseOne" style="cursor:pointer;">
                                                         WMS
                                                        <i class="ti-angle-down menu-arrow"></i>
                                                    </label>
                                                    <ul id="WMScollapseOne" class="collapse ">
                                                        <li>
                                                        <input type="checkbox" class="myCheckbox3" name="" id="input06">
                                                            <label for="" data-toggle="collapse"
                                                                data-target="#WMStwo">
                                                                
                                                                JOBSHEET
                                                                <i class="ti-angle-down menu-arrow"></i>
                                                            </label>
                                                            <ul id="WMStwo" class="collapse ">
                                                                @foreach ($wms_job_sheets as $key => $wms_job_sheet)
                                                                    <li>
                                                                        <input type="checkbox" class="myCheckbox3 a7"
                                                                                name="" id="">
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital6">
                                                                            
                                                                            {{ $key }} <i
                                                                                class="ti-angle-down menu-arrow"></i>
                                                                        </label>
                                                                        <ul id="Digital6">
                                                                            @foreach ($wms_job_sheet as $key1 => $value)
                                                                                @foreach ($permissions as $value1)
                                                                                    @if ($value == $value1->name)
                                                                                        @php
                                                                                            $lastWord = Str::of($value)->explode(' ')->last();
                                                                                        @endphp
                                                                                        <li><input type="checkbox"
                                                                                                class="myCheckbox3 b7"
                                                                                                name="permissions[]"
                                                                                                value="{{ $value1->id }}">
                                                                                            {{ $lastWord }} </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <label for="" data-toggle="collapse"
                                                                data-target="#PRODUCTIONtwo3">
                                                                <input type="checkbox" class="myCheckbox3" name="" id="input07">
                                                                DASHBOARD
                                                                <i class="ti-angle-down menu-arrow"></i>
                                                            </label>
                                                            <ul id="PRODUCTIONtwo3" class="collapse ">
                                                                @foreach ($wms_dashboards as $key => $wms_dashboard)
                                                                    <li>
                                                                        <input type="checkbox" class="myCheckbox3 a8"
                                                                                name="" id="">
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital7">
                                                                            
                                                                            {{ $key }} <i
                                                                                class="ti-angle-down menu-arrow"></i>
                                                                        </label>
                                                                        <ul id="Digital7">
                                                                            @foreach ($wms_dashboard as $key1 => $value)
                                                                                @foreach ($permissions as $value1)
                                                                                    @if ($value == $value1->name)
                                                                                        @php
                                                                                            $lastWord = Str::of($value)->explode(' ')->last();
                                                                                        @endphp
                                                                                        <li><input type="checkbox"
                                                                                                class="myCheckbox3 b8"
                                                                                                name="permissions[]"
                                                                                                value="{{ $value1->id }}">
                                                                                            {{ $lastWord }} </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <label for="" data-toggle="collapse"
                                                                data-target="#PRODUCTIONtwo4">
                                                                <input type="checkbox" class="myCheckbox3" name="" id="input08">
                                                                REPORT
                                                                <i class="ti-angle-down menu-arrow"></i>
                                                            </label>
                                                            <ul id="PRODUCTIONtwo4" class="collapse ">
                                                                @foreach ($reports as $key => $report)
                                                                    <li>
                                                                        <input type="checkbox" class="myCheckbox3 a9"
                                                                                name="" id="">
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital8">
                                                                           
                                                                            {{ $key }} <i
                                                                                class="ti-angle-down menu-arrow"></i>
                                                                        </label>
                                                                        <ul id="Digital8">
                                                                            @foreach ($report as $key1 => $value)
                                                                                @foreach ($permissions as $value1)
                                                                                    @if ($value == $value1->name)
                                                                                        @php
                                                                                            $lastWord = Str::of($value)->explode(' ')->last();
                                                                                        @endphp
                                                                                        <li><input type="checkbox"
                                                                                                class="myCheckbox3 cl b9"
                                                                                                name="permissions[]"
                                                                                                value="{{ $value1->id }}">
                                                                                            {{ $lastWord }} </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                {{-- SETTINGS --}}
                                                <li>
                                                    <input type="checkbox" name="" id="Myinput4">
                                                    <label for="" data-toggle="collapse"
                                                        data-target="#SETTINGScollapseOne" style="cursor:pointer;">
                                                         SETTINGS
                                                        <i class="ti-angle-down menu-arrow"></i>
                                                    </label>
                                                    <ul id="SETTINGScollapseOne" class="collapse ">
                                                        <li>
                                                            <input type="checkbox" class="myCheckbox4 " name="" id="input09">
                                                            <label for="" data-toggle="collapse"
                                                                data-target="#SETTINGStwo">
                                                                
                                                                ADMINISTRATION
                                                                <i class="ti-angle-down menu-arrow"></i>
                                                            </label>
                                                            <ul id="SETTINGStwo" class="collapse ">
                                                                @foreach ($administrations as $key => $administration)
                                                                    <li>
                                                                        <input type="checkbox" class="myCheckbox4 a10"
                                                                                name="" id="">
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital9">
                                                                           
                                                                            {{ $key }} <i
                                                                                class="ti-angle-down menu-arrow"></i>
                                                                        </label>
                                                                        <ul id="Digital9">
                                                                            @foreach ($administration as $key1 => $value)
                                                                                @foreach ($permissions as $value1)
                                                                                    @if ($value == $value1->name)
                                                                                        @php
                                                                                            $lastWord = Str::of($value)->explode(' ')->last();
                                                                                        @endphp
                                                                                        <li><input type="checkbox"
                                                                                                class="myCheckbox4 b10"
                                                                                                name="permissions[]"
                                                                                                value="{{ $value1->id }}">
                                                                                            {{ $lastWord }} </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <label for="" data-toggle="collapse"
                                                                data-target="#PRODUCTIONtwo5">
                                                                <input type="checkbox" class="myCheckbox4" name="" id="input10">
                                                                DATABASE
                                                                <i class="ti-angle-down menu-arrow"></i>
                                                            </label>
                                                            <ul id="PRODUCTIONtwo5" class="collapse ">
                                                                @foreach ($databases as $key => $database)
                                                                    <li>
                                                                        <input type="checkbox" class="myCheckbox4 a11"
                                                                                name="" id="">
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital10">
                                                                            
                                                                            {{ $key }} <i
                                                                                class="ti-angle-down menu-arrow"></i>
                                                                        </label>
                                                                        <ul id="Digital10">
                                                                            @foreach ($database as $key1 => $value)
                                                                                @foreach ($permissions as $value1)
                                                                                    @if ($value == $value1->name)
                                                                                        @php
                                                                                            $lastWord = Str::of($value)->explode(' ')->last();
                                                                                        @endphp
                                                                                        <li><input type="checkbox"
                                                                                                class="myCheckbox4 b11"
                                                                                                name="permissions[]"
                                                                                                value="{{ $value1->id }}">
                                                                                            {{ $lastWord }} </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Save</button>
                </div>
            </div>
            <a href="{{route('role')}}">Go back</a>
        </div>
    </div>
</form>
@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $(".menu-arrow").click(function() {
                var $parentLi = $(this).closest('li');
                var $siblingsUl = $parentLi.siblings().find('ul');
                
                $siblingsUl.hide();
                $siblingsUl.prev('label').find('.menu-arrow').removeClass('ti-angle-up').addClass('ti-angle-down');

                $(this).toggleClass('ti-angle-down ti-angle-up');
                $(this).closest("label").next('ul').toggle();
            });

            function handleCheckboxChange(checkbox, childSelector) {
                checkbox.change(function() {
                    $(childSelector).prop('checked', $(this).is(':checked'));
                });

                $(childSelector).change(function() {
                    var allChecked = $(childSelector + ':checked').length === $(childSelector).length;
                    checkbox.prop('checked', allChecked);
                });
            }

            // Handling checkbox changes for parent "Mes"
            handleCheckboxChange($('#Myinput'), '.myCheckbox');

            // Handling checkbox changes for other parent checkboxes
            handleCheckboxChange($('#input0'), '.a1');
            handleCheckboxChange($('#input1'), '.a2');
            handleCheckboxChange($('#input2'), '.a3');

            // Handling checkbox changes for class b1, b2, b3
            handleCheckboxChange($('.a1'), '.b1');
            handleCheckboxChange($('.a2'), '.b2');
            handleCheckboxChange($('.a3'), '.b3');





            function handleCheckboxChange(checkbox, childSelector) {
                checkbox.change(function() {
                    $(childSelector).prop('checked', $(this).is(':checked'));
                });

                $(childSelector).change(function() {
                    var allChecked = $(childSelector + ':checked').length === $(childSelector).length;
                    checkbox.prop('checked', allChecked);
                });
            }

            // Handling checkbox changes for parent "Myinput2"
            handleCheckboxChange($('#Myinput2'), '.myCheckbox2');

            // Handling checkbox changes for child checkboxes of each section
            handleCheckboxChange($('#input03'), '.a4');
            handleCheckboxChange($('#input04'), '.a5');
            handleCheckboxChange($('#input05'), '.a6');
            handleCheckboxChange($('.a4'), '.b4');
            handleCheckboxChange($('.a5'), '.b5');
            handleCheckboxChange($('.a6'), '.b6');


            function handleCheckboxChange(checkbox, childSelector) {
                checkbox.change(function() {
                    $(childSelector).prop('checked', $(this).is(':checked'));
                });

                $(childSelector).change(function() {
                    var allChecked = $(childSelector + ':checked').length === $(childSelector).length;
                    checkbox.prop('checked', allChecked);
                });
            }

            // Handling checkbox changes for parent "Myinput3"
            handleCheckboxChange($('#Myinput3'), '.myCheckbox3');

            // Handling checkbox changes for child checkboxes of each section
            handleCheckboxChange($('#input06'), '.a7');
            handleCheckboxChange($('#input07'), '.a8');
            handleCheckboxChange($('#input08'), '.a9');
            handleCheckboxChange($('.a7'), '.b7');
            handleCheckboxChange($('.a8'), '.b8');
            handleCheckboxChange($('.a9'), '.b9');

            function handleCheckboxChange(checkbox, childSelector) {
                checkbox.change(function() {
                    $(childSelector).prop('checked', $(this).is(':checked'));
                });

                $(childSelector).change(function() {
                    var allChecked = $(childSelector + ':checked').length === $(childSelector).length;
                    checkbox.prop('checked', allChecked);
                });
            }

            // Handling checkbox changes for parent "Myinput4"
            handleCheckboxChange($('#Myinput4'), '.myCheckbox4');

            // Handling checkbox changes for child checkboxes of each section
            handleCheckboxChange($('#input09'), '.a10');
            handleCheckboxChange($('#input10'), '.a11');

            handleCheckboxChange($('.a10'), '.b10');
            handleCheckboxChange($('.a11'), '.b11');
           

            
        });
    </script>
@endpush
