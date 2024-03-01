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
                    <h4><b>Create Role new</b></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="myTabs">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1">Roles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2">Permission</a>
                                </li>
                            </ul>

                            <div class="tab-content mt-2">
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Role Name</label>
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
                                                    <input type="checkbox" name="" id="Myinput"> Mes
                                                    <label for="" data-toggle="collapse"
                                                        data-target="#ProductioncollapseOne" style="cursor:pointer;">
                                                        <i class="ti-angle-down menu-arrow"></i>
                                                    </label>
                                                    <ul id="ProductioncollapseOne" class="collapse ">
                                                        <li>
                                                            <label for="">
                                                                <input type="checkbox" class="myCheckbox" name=""
                                                                    id="input0"> Management
                                                                <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                    data-target="#productiontwo"></i>
                                                            </label>
                                                            <ul id="productiontwo" class="collapse ">
                                                                @foreach ($managements as $key => $management)
                                                                    <li>
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital">
                                                                            <input type="checkbox" class="myCheckbox c1"
                                                                                name="" id="input3">
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
                                                                                                class="myCheckbox c1 c2"
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
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital1">
                                                                            <input type="checkbox" class="myCheckbox c1"
                                                                                name="" id="input3">
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
                                                                                                class="myCheckbox c1 c2"
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
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital2">
                                                                            <input type="checkbox" class="myCheckbox c1"
                                                                                name="" id="input3">
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
                                                                                                class="myCheckbox c1 c2"
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
                                                                    <input type="checkbox" class="myCheckbox2 c0"
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
                                                                                                class="myCheckbox2 c0 c2"
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
                                                                        <input type="checkbox"  class="myCheckbox2 c02"
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
                                                                                                class="myCheckbox2 c02 c2"
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
                                                                        <input type="checkbox" class="myCheckbox2 c01"
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
                                                                                                class="myCheckbox2 c01 c2"
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
                                                            <label for="" data-toggle="collapse"
                                                                data-target="#WMStwo">
                                                                <input type="checkbox" class="myCheckbox3" name="" id="input06">
                                                                JOBSHEET
                                                                <i class="ti-angle-down menu-arrow"></i>
                                                            </label>
                                                            <ul id="WMStwo" class="collapse ">
                                                                @foreach ($wms_job_sheets as $key => $wms_job_sheet)
                                                                    <li>
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital6">
                                                                            <input type="checkbox" class="myCheckbox3 cl2"
                                                                                name="" id="input3">
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
                                                                                                class="myCheckbox3 cl2 c2"
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
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital7">
                                                                            <input type="checkbox" class="myCheckbox3 cl1"
                                                                                name="" id="input3">
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
                                                                                                class="myCheckbox3 cl1 c2"
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
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital8">
                                                                            <input type="checkbox" class="myCheckbox3 cl"
                                                                                name="" id="input3">
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
                                                                                                class="myCheckbox3 cl c2"
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
                                                            <input type="checkbox" class="myCheckbox4" name="" id="input09">
                                                            <label for="" data-toggle="collapse"
                                                                data-target="#SETTINGStwo">
                                                                
                                                                ADMINISTRATION
                                                                <i class="ti-angle-down menu-arrow"></i>
                                                            </label>
                                                            <ul id="SETTINGStwo" class="collapse ">
                                                                @foreach ($administrations as $key => $administration)
                                                                    <li>
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital9">
                                                                            <input type="checkbox" class="myCheckbox4 cl4"
                                                                                name="" id="input3">
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
                                                                                                class="myCheckbox4 cl4 c2"
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
                                                                        <label for="" data-toggle="collapse"
                                                                            data-target="#Digital10">
                                                                            <input type="checkbox" class="myCheckbox4 cl3"
                                                                                name="" id="input3">
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
                                                                                                class="myCheckbox4 cl3 c2"
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
                $(this).closest('li').siblings().find('ul').hide();
                $(this).toggleClass('ti-angle-down ti-angle-up');
                $(this).closest("label").next('ul').toggle();
            });
            $('#Myinput').change(function() {
                // Check if the input is checked
                if ($(this).is(':checked')) {
                    // Uncheck all checkboxes with class "myCheckbox"
                    $('.myCheckbox').prop('checked', true);
                } else {
                    // Check all checkboxes with class "myCheckbox"
                    $('.myCheckbox').prop('checked', false);
                }
            });
            $('#Myinput2').change(function() {
                // Check if the input is checked
                if ($(this).is(':checked')) {
                    // Uncheck all checkboxes with class "myCheckbox"
                    $('.myCheckbox2').prop('checked', true);
                } else {
                    // Check all checkboxes with class "myCheckbox"
                    $('.myCheckbox2').prop('checked', false);
                }
            });
            $('#Myinput3').change(function() {
                // Check if the input is checked
                if ($(this).is(':checked')) {
                    // Uncheck all checkboxes with class "myCheckbox"
                    $('.myCheckbox3').prop('checked', true);
                } else {
                    // Check all checkboxes with class "myCheckbox"
                    $('.myCheckbox3').prop('checked', false);
                }
            });
            $('#Myinput4').change(function() {
                // Check if the input is checked
                if ($(this).is(':checked')) {
                    // Uncheck all checkboxes with class "myCheckbox"
                    $('.myCheckbox4').prop('checked', true);
                } else {
                    // Check all checkboxes with class "myCheckbox"
                    $('.myCheckbox4').prop('checked', false);
                }
            });
            $('#input0, #input1, #input2').change(function() {
                // Check if all inputs are checked
                var allChecked = $('#input0').is(':checked') && $('#input1').is(':checked') && $('#input2')
                    .is(':checked');

                // Set Myinput accordingly
                $('#Myinput').prop('checked', allChecked);
            });

            $('#input0').change(function() {
                // Check if the input is checked
                if ($(this).is(':checked')) {
                    // Check all checkboxes with class "c1"
                    $('.c1').prop('checked', true);
                } else {
                    // Uncheck all checkboxes with class "c1"
                    $('.c1').prop('checked', false);
                }
            });

            $('#input1').change(function() {
                // Check if the input is checked
                if ($(this).is(':checked')) {
                    // Check all checkboxes with class "l1"
                    $('.l1').prop('checked', true);
                } else {
                    // Uncheck all checkboxes with class "l1"
                    $('.l1').prop('checked', false);
                }
            });

            $('#input2').change(function() {
                // Check if the input is checked
                if ($(this).is(':checked')) {
                    // Check all checkboxes with class "l2"
                    $('.l2').prop('checked', true);
                } else {
                    // Uncheck all checkboxes with class "l2"
                    $('.l2').prop('checked', false);
                }
            });

            $('#input03').change(function() {
                // Check if the input is checked
                if ($(this).is(':checked')) {
                    // Check all checkboxes with class "l2"
                    $('.c0').prop('checked', true);
                } else {
                    // Uncheck all checkboxes with class "l2"
                    $('.c0').prop('checked', false);
                }
            });
            $('#input04').change(function() {
                // Check if the input is checked
                if ($(this).is(':checked')) {
                    // Check all checkboxes with class "l2"
                    $('.c02').prop('checked', true);
                } else {
                    // Uncheck all checkboxes with class "l2"
                    $('.c02').prop('checked', false);
                }
            });
            $('#input05').change(function() {
                // Check if the input is checked
                if ($(this).is(':checked')) {
                    // Check all checkboxes with class "l2"
                    $('.c01').prop('checked', true);
                } else {
                    // Uncheck all checkboxes with class "l2"
                    $('.c01').prop('checked', false);
                }
            });
            $('#input03, #input04, #input05').change(function() {
                // Check if all inputs are checked
                var allChecked = $('#input03').is(':checked') && $('#input04').is(':checked') && $('#input05')
                    .is(':checked');

                // Set Myinput accordingly
                $('#Myinput2').prop('checked', allChecked);
            });

            $('#input06').change(function() {
                // Check if the input is checked
                if ($(this).is(':checked')) {
                    // Check all checkboxes with class "l2"
                    $('.cl2').prop('checked', true);
                } else {
                    // Uncheck all checkboxes with class "l2"
                    $('.cl2').prop('checked', false);
                }
            });
            $('#input07').change(function() {
                // Check if the input is checked
                if ($(this).is(':checked')) {
                    // Check all checkboxes with class "l2"
                    $('.cl1').prop('checked', true);
                } else {
                    // Uncheck all checkboxes with class "l2"
                    $('.cl1').prop('checked', false);
                }
            });
            $('#input08').change(function() {
                // Check if the input is checked
                if ($(this).is(':checked')) {
                    // Check all checkboxes with class "l2"
                    $('.cl').prop('checked', true);
                } else {
                    // Uncheck all checkboxes with class "l2"
                    $('.cl').prop('checked', false);
                }
            });

            $('#input06, #input07, #input08').change(function() {
                // Check if all inputs are checked
                var allChecked = $('#input06').is(':checked') && $('#input07').is(':checked') && $('#input08')
                    .is(':checked');

                // Set Myinput accordingly
                $('#Myinput3f').prop('checked', allChecked);
            });

            $('#input09').change(function() {
                // Check if the input is checked
                if ($(this).is(':checked')) {
                    // Check all checkboxes with class "l2"
                    $('.cl4').prop('checked', true);
                } else {
                    // Uncheck all checkboxes with class "l2"
                    $('.cl4').prop('checked', false);
                }
            });
            $('#input010').change(function() {
                // Check if the input is checked
                if ($(this).is(':checked')) {
                    // Check all checkboxes with class "l2"
                    $('.cl3').prop('checked', true);
                } else {
                    // Uncheck all checkboxes with class "l2"
                    $('.cl3').prop('checked', false);
                }
            });
            $('#input09, #input10').change(function() {
                // Check if all inputs are checked
                var allChecked = $('#input09').is(':checked') && $('#input10').is(':checked') ;

                // Set Myinput accordingly
                $('#Myinput4').prop('checked', allChecked);
            });

            // $('#input4').change(function() {
            //     // Check if the input is checked
            //     if ($(this).is(':checked')) {
            //         // Check all checkboxes with class "l2"
            //         $('.l3').prop('checked', true);
            //     } else {
            //         // Uncheck all checkboxes with class "l2"
            //         $('.l3').prop('checked', false);
            //     }
            // });


            // $('#input5').change(function() {
            //     // Check if the input is checked
            //     if ($(this).is(':checked')) {
            //         // Check all checkboxes with class "l2"
            //         $('.l4').prop('checked', true);
            //     } else {
            //         // Uncheck all checkboxes with class "l2"
            //         $('.l4').prop('checked', false);
            //     }
            // });

            // $('#input05, p1, p2, p3, p4, p5, p6, p7').change(function() {
            //     // Check if the input is checked
            //     if ($(this).is(':checked')) {
            //         // Check all checkboxes with class "l2"
            //         $('.l5, .l6, .l7, .l8, .l9, .l10, .l11, .l12').prop('checked', true);
            //     } else {
            //         // Uncheck all checkboxes with class "l2"
            //         $('.l5, .l6, .l7, .l8, .l9, .l10, .l11, .l12').prop('checked', false);
            //     }
            // });
        });
    </script>
@endpush
