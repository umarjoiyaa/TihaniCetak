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

        .sub-menu1 {
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.3s ease;
        }

        .sub-menu1.open {
            max-height: 1000px;
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
    <form action="{{ route('role.store') }}" method="POST">
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
                                        <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1">Role</a>
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
                                                    <input type="text" name="name" value="{{ old('name') }}"
                                                        class="form-control">
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
                                                        <input type="checkbox"> MES
                                                        <label style="cursor:pointer;">
                                                            <i class="ti-angle-down menu-arrow"></i>
                                                        </label>
                                                        <ul class="sub-menu1">
                                                            <li>
                                                                <input type="checkbox" class="myCheckbox">
                                                                <label>
                                                                    Management
                                                                    <i class="ti-angle-down menu-arrow"></i>
                                                                </label>
                                                                <ul class="sub-menu1">
                                                                    @foreach ($managements as $key => $management)
                                                                        <li>
                                                                            <input type="checkbox">
                                                                            <label for="">
                                                                                {{ $key }} <i
                                                                                    class="ti-angle-down menu-arrow"></i>
                                                                            </label>
                                                                            <ul class="sub-menu1">
                                                                                @foreach ($management as $key1 => $value)
                                                                                    @foreach ($permissions as $value1)
                                                                                        @if ($value == $value1->name)
                                                                                            @php
                                                                                                $lastWord = Str::of(
                                                                                                    $value,
                                                                                                )
                                                                                                    ->explode(' ')
                                                                                                    ->last();
                                                                                            @endphp
                                                                                            <li><input type="checkbox"
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
                                                                <input type="checkbox">
                                                                <label>
                                                                    Laporan / Rekod Proses<i
                                                                        class="ti-angle-down menu-arrow"></i>
                                                                </label>
                                                                <ul class="sub-menu1">
                                                                    @foreach ($laporan_rekod_proses as $key => $laporan_rekod_prose)
                                                                        <li>
                                                                            <input type="checkbox">
                                                                            <label>
                                                                                {{ $key }} <i
                                                                                    class="ti-angle-down menu-arrow"></i>
                                                                            </label>
                                                                            <ul class="sub-menu1">
                                                                                @foreach ($laporan_rekod_prose as $key1 => $value)
                                                                                    @foreach ($permissions as $value1)
                                                                                        @if ($value == $value1->name)
                                                                                            @php
                                                                                                $lastWord = Str::of(
                                                                                                    $value,
                                                                                                )
                                                                                                    ->explode(' ')
                                                                                                    ->last();
                                                                                            @endphp
                                                                                            <li><input type="checkbox"
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
                                                                <input type="checkbox">
                                                                <label>
                                                                    Laporan Pemeriksaan
                                                                    Kualiti <i class="ti-angle-down menu-arrow"></i>
                                                                </label>
                                                                <ul class="sub-menu1">

                                                                    @foreach ($laporan_pemiriksaan_kualitis as $key => $laporan_pemiriksaan_kualiti)
                                                                        <li>
                                                                            <input type="checkbox">
                                                                            <label>
                                                                                {{ $key }} <i
                                                                                    class="ti-angle-down menu-arrow"></i>
                                                                            </label>
                                                                            <ul class="sub-menu1">
                                                                                @foreach ($laporan_pemiriksaan_kualiti as $key1 => $value)
                                                                                    @foreach ($permissions as $value1)
                                                                                        @if ($value == $value1->name)
                                                                                            @php
                                                                                                $lastWord = Str::of(
                                                                                                    $value,
                                                                                                )
                                                                                                    ->explode(' ')
                                                                                                    ->last();
                                                                                            @endphp
                                                                                            <li><input type="checkbox"
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
                                                        <input type="checkbox">
                                                        <label>
                                                            PRODUCTION
                                                            <i class="ti-angle-down menu-arrow"></i>
                                                        </label>
                                                        <ul class="sub-menu1">
                                                            <li>
                                                                <input type="checkbox">
                                                                <label>
                                                                    JOBSHEET
                                                                    <i class="ti-angle-down menu-arrow"></i>
                                                                </label>
                                                                <ul class="sub-menu1">
                                                                    @foreach ($job_sheets as $key => $job_sheet)
                                                                        <li>
                                                                            <input type="checkbox">
                                                                            <label>
                                                                                {{ $key }} <i
                                                                                    class="ti-angle-down menu-arrow"></i>
                                                                            </label>
                                                                            <ul class="sub-menu1">
                                                                                @foreach ($job_sheet as $key1 => $value)
                                                                                    @foreach ($permissions as $value1)
                                                                                        @if ($value == $value1->name)
                                                                                            @php
                                                                                                $lastWord = Str::of(
                                                                                                    $value,
                                                                                                )
                                                                                                    ->explode(' ')
                                                                                                    ->last();
                                                                                            @endphp
                                                                                            <li><input type="checkbox"
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
                                                                <input type="checkbox">
                                                                <label>
                                                                    PRODUCTION
                                                                    <i class="ti-angle-down menu-arrow"></i>
                                                                </label>
                                                                <ul class="sub-menu1">
                                                                    @foreach ($productions as $key => $production)
                                                                        <li>
                                                                            <input type="checkbox">
                                                                            <label>
                                                                                {{ $key }} <i
                                                                                    class="ti-angle-down menu-arrow"></i>
                                                                            </label>
                                                                            <ul class="sub-menu1">
                                                                                @foreach ($production as $key1 => $value)
                                                                                    @foreach ($permissions as $value1)
                                                                                        @if ($value == $value1->name)
                                                                                            @php
                                                                                                $lastWord = Str::of(
                                                                                                    $value,
                                                                                                )
                                                                                                    ->explode(' ')
                                                                                                    ->last();
                                                                                            @endphp
                                                                                            <li><input type="checkbox"
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
                                                                <input type="checkbox">
                                                                <label>
                                                                    DASHBOARD
                                                                    <i class="ti-angle-down menu-arrow"></i>
                                                                </label>
                                                                <ul class="sub-menu1">
                                                                    @foreach ($dashboards as $key => $dashboard)
                                                                        <li>
                                                                            <input type="checkbox">
                                                                            <label>
                                                                                {{ $key }} <i
                                                                                    class="ti-angle-down menu-arrow"></i>
                                                                            </label>
                                                                            <ul class="sub-menu1">
                                                                                @foreach ($dashboard as $key1 => $value)
                                                                                    @foreach ($permissions as $value1)
                                                                                        @if ($value == $value1->name)
                                                                                            @php
                                                                                                $lastWord = Str::of(
                                                                                                    $value,
                                                                                                )
                                                                                                    ->explode(' ')
                                                                                                    ->last();
                                                                                            @endphp
                                                                                            <li><input type="checkbox"
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
                                                        <input type="checkbox">
                                                        <label>
                                                            WMS
                                                            <i class="ti-angle-down menu-arrow"></i>
                                                        </label>
                                                        <ul class="sub-menu1">
                                                            <li>
                                                                <input type="checkbox">
                                                                <label>
                                                                    JOBSHEET
                                                                    <i class="ti-angle-down menu-arrow"></i>
                                                                </label>
                                                                <ul class="sub-menu1">
                                                                    @foreach ($wms_job_sheets as $key => $wms_job_sheet)
                                                                        <li>
                                                                            <input type="checkbox">
                                                                            <label>
                                                                                {{ $key }} <i
                                                                                    class="ti-angle-down menu-arrow"></i>
                                                                            </label>
                                                                            <ul class="sub-menu1">
                                                                                @foreach ($wms_job_sheet as $key1 => $value)
                                                                                    @foreach ($permissions as $value1)
                                                                                        @if ($value == $value1->name)
                                                                                            @php
                                                                                                $lastWord = Str::of(
                                                                                                    $value,
                                                                                                )
                                                                                                    ->explode(' ')
                                                                                                    ->last();
                                                                                            @endphp
                                                                                            <li><input type="checkbox"
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
                                                                <input type="checkbox">
                                                                <label>
                                                                    DASHBOARD
                                                                    <i class="ti-angle-down menu-arrow"></i>
                                                                </label>
                                                                <ul class="sub-menu1">
                                                                    @foreach ($wms_dashboards as $key => $wms_dashboard)
                                                                        <li>
                                                                            <input type="checkbox">
                                                                            <label>
                                                                                {{ $key }} <i
                                                                                    class="ti-angle-down menu-arrow"></i>
                                                                            </label>
                                                                            <ul class="sub-menu1">
                                                                                @foreach ($wms_dashboard as $key1 => $value)
                                                                                    @foreach ($permissions as $value1)
                                                                                        @if ($value == $value1->name)
                                                                                            @php
                                                                                                $lastWord = Str::of(
                                                                                                    $value,
                                                                                                )
                                                                                                    ->explode(' ')
                                                                                                    ->last();
                                                                                            @endphp
                                                                                            <li><input type="checkbox"
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
                                                                <input type="checkbox">
                                                                <label>
                                                                    REPORT
                                                                    <i class="ti-angle-down menu-arrow"></i>
                                                                </label>
                                                                <ul class="sub-menu1">
                                                                    @foreach ($reports as $key => $report)
                                                                        <li>
                                                                            <input type="checkbox">
                                                                            <label>
                                                                                {{ $key }} <i
                                                                                    class="ti-angle-down menu-arrow"></i>
                                                                            </label>
                                                                            <ul class="sub-menu1">
                                                                                @foreach ($report as $key1 => $value)
                                                                                    @foreach ($permissions as $value1)
                                                                                        @if ($value == $value1->name)
                                                                                            @php
                                                                                                $lastWord = Str::of(
                                                                                                    $value,
                                                                                                )
                                                                                                    ->explode(' ')
                                                                                                    ->last();
                                                                                            @endphp
                                                                                            <li><input type="checkbox"
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
                                                        <input type="checkbox">
                                                        <label>
                                                            SETTINGS
                                                            <i class="ti-angle-down menu-arrow"></i>
                                                        </label>
                                                        <ul class="sub-menu1">
                                                            <li>
                                                                <input type="checkbox">
                                                                <label>
                                                                    ADMINISTRATION
                                                                    <i class="ti-angle-down menu-arrow"></i>
                                                                </label>
                                                                <ul class="sub-menu1">
                                                                    @foreach ($administrations as $key => $administration)
                                                                        <li>
                                                                            <input type="checkbox">
                                                                            <label>
                                                                                {{ $key }} <i
                                                                                    class="ti-angle-down menu-arrow"></i>
                                                                            </label>
                                                                            <ul class="sub-menu1">
                                                                                @foreach ($administration as $key1 => $value)
                                                                                    @foreach ($permissions as $value1)
                                                                                        @if ($value == $value1->name)
                                                                                            @php
                                                                                                $lastWord = Str::of(
                                                                                                    $value,
                                                                                                )
                                                                                                    ->explode(' ')
                                                                                                    ->last();
                                                                                            @endphp
                                                                                            <li><input type="checkbox"
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
                                                                <input type="checkbox">
                                                                <label>
                                                                    DATABASE
                                                                    <i class="ti-angle-down menu-arrow"></i>
                                                                </label>
                                                                <ul class="sub-menu1">
                                                                    @foreach ($databases as $key => $database)
                                                                        <li>
                                                                            <input type="checkbox">
                                                                            <label>
                                                                                {{ $key }} <i
                                                                                    class="ti-angle-down menu-arrow"></i>
                                                                            </label>
                                                                            <ul class="sub-menu1">
                                                                                @foreach ($database as $key1 => $value)
                                                                                    @foreach ($permissions as $value1)
                                                                                        @if ($value == $value1->name)
                                                                                            @php
                                                                                                $lastWord = Str::of(
                                                                                                    $value,
                                                                                                )
                                                                                                    ->explode(' ')
                                                                                                    ->last();
                                                                                            @endphp
                                                                                            <li><input type="checkbox"
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
                <a href="{{ route('role') }}">Go back</a>
            </div>
        </div>
    </form>
@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {

            const arrowButton = document.querySelectorAll(".menu-arrow");

            arrowButton.forEach((el) =>
                el.addEventListener("click", (event) => {
                    const subMenu = event.target.parentElement.parentElement.querySelector(".sub-menu1");
                    subMenu.classList.toggle("open");
                })
            );

            $('.menu-arrow').click(function() {
                var $this = $(this);
                if ($this.hasClass('ti-angle-up')) {
                    $this.removeClass('ti-angle-up');
                    $this.addClass('ti-angle-down');
                } else {
                    $this.removeClass('ti-angle-down');
                    $this.addClass('ti-angle-up');
                }
                if ($this.hasClass('rotated')) {
                    $this.removeClass('rotated');
                } else {
                    $this.addClass('rotated');
                }
            });

            $("input[type='checkbox']").change(function() {
                var $siblings = $(this).siblings('ul').find('input[type="checkbox"]');
                $siblings.prop('checked', this.checked);

                var $parentCheckbox = $(this).closest('ul').prevAll(
                    'input[type="checkbox"]:first');
                if ($(this).closest('ul').find("input[type='checkbox']:checked").length === $(
                        this).closest('ul').find("input[type='checkbox']").length) {
                    $parentCheckbox.prop('checked', true);
                } else {
                    $parentCheckbox.prop('checked', false);
                }
                checkParentOfParent($parentCheckbox);
            });

            function checkParentOfParent($checkbox) {
                var $grandParentCheckbox = $checkbox.closest('ul').prevAll(
                    'input[type="checkbox"]:first');
                if ($grandParentCheckbox.length > 0) {
                    if ($checkbox.closest('ul').find("input[type='checkbox']:checked").length === $checkbox.closest(
                            'ul').find("input[type='checkbox']").length) {
                        $grandParentCheckbox.prop('checked', true);
                    } else {
                        $grandParentCheckbox.prop('checked', false);
                    }
                    checkParentOfParent($grandParentCheckbox);
                }
            }
        });
    </script>
@endpush
