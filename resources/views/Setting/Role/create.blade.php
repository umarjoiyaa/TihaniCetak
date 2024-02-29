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
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <div class="row mt-5">
                                    <div class="col-md-6">
                                            <ul>
                                                <li>
                                                    <input type="checkbox" name="" id="Myinput"> Mes
                                                    <label for="" data-toggle="collapse"
                                                            data-target="#ProductioncollapseOne" style="cursor:pointer;">
                                                        <i class="ti-angle-down menu-arrow" ></i>
                                                    </label>
                                                    <ul id="ProductioncollapseOne" class="collapse ">
                                                        <li>
                                                            <label for="">
                                                                <input type="checkbox" class="myCheckbox" name="" id="input0">  Management
                                                                <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                    data-target="#productiontwo"></i>
                                                            </label>
                                                            <ul id="productiontwo" class="collapse ">
                                                                <li>
                                                                    <label for="" data-toggle="collapse" data-target="#Digital">
                                                                        <input type="checkbox" class="myCheckbox c1" name="" id="input3"> Sale Order <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Digital">
                                                                        <li><input type="checkbox" class="myCheckbox c1 c2" name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox c1 c2" name="" id="">  View</li>
                                                                    </ul>
                                                                </li>

                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                <input type="checkbox" class="myCheckbox" name="" id="input1"> Laporan / Rekod Proses<i class="ti-angle-down menu-arrow"
                                                                    data-toggle="collapse"
                                                                    data-target="#productionthree"></i>
                                                            </label>
                                                            <ul id="productionthree" class="collapse ">

                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#Production">
                                                                        <input type="checkbox" class="myCheckbox l1" name="" id="input4"> Senarai
                                                                        Semak Pencetakan <br> Digital <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Production">
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for="" data-toggle="collapse" data-target="#Printing">
                                                                        <input type="checkbox" class="myCheckbox l1" name="" id="input4" > Senarai
                                                                        Semak Pra Cetak <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Printing">
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for="" data-toggle="collapse" data-target="#Call">
                                                                        <input type="checkbox" class="myCheckbox l1" name="" id="input4" > Rekod
                                                                        serahan plate cetak <br> serta Sample<i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Call">
                                                                        <li><input type="checkbox" class="myCheckbox l3 l1" name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l3 l1" name="" id="">  View</li>
                                                                        <li><input type="checkbox" class="myCheckbox l3 l1" name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l3 l1" name="" id="">  Delete</li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for="" data-toggle="collapse" data-target="#Printing">
                                                                        <input type="checkbox" class="myCheckbox l1" name="" id="input4" > Laporan
                                                                        Proses Pencetakan <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Printing">
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for="" data-toggle="collapse" data-target="#Printing">
                                                                        <input type="checkbox" class="myCheckbox l1" name="" id="input4" > Laporan
                                                                        Proses Lipat <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Printing">
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for="" data-toggle="collapse" data-target="#Printing">
                                                                        <input type="checkbox" class="myCheckbox l1" name="" id="input4" > Laporan
                                                                        Proses Penjilidan <br> (Perfect Bind) <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Printing">
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>

                                                                <li>
                                                                    <label for="" data-toggle="collapse" data-target="#Printing">
                                                                        <input type="checkbox" class="myCheckbox l1" name="" id="input4" > Laporan
                                                                        Proses Penjilidan <br> (Saddle stitch) <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Printing">
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>

                                                                <li>
                                                                    <label for="" data-toggle="collapse" data-target="#Printing">
                                                                        <input type="checkbox" class="myCheckbox l1" name="" id="input4" > Laporan
                                                                        Proses 3 Knife <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Printing">
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l1 l3 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                <input type="checkbox" class="myCheckbox" name="" id="input2"> Laporan Pemeriksaan
                                                        Kualiti <i class="ti-angle-down menu-arrow"
                                                                    data-toggle="collapse"
                                                                    data-target="#productionfour"></i>
                                                            </label>
                                                            <ul id="productionfour" class="collapse ">

                                                                <li>
                                                                    <input type="checkbox" class="myCheckbox l2" name="" id="input5">
                                                                    <label for=""  data-toggle="collapse" data-target="#Machine">
                                                                         CTP <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Machine">
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#Shopfloor">
                                                                        <input type="checkbox" class="myCheckbox l2" name="" id="input05" > POD <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Shopfloor">
                                                                        <li><input type="checkbox" class="myCheckbox l2 l5 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l5 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l5 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l5 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l5 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#OEE">
                                                                        <input type="checkbox" class="myCheckbox l2" name="" id="p1" > Plate
                                                                        Cetak <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="OEE">
                                                                        <li><input type="checkbox" class="myCheckbox l2 l6 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l6 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l6 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l6 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l6 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#ProductionReport">
                                                                        <input type="checkbox" class="myCheckbox l2" name="" id="p2" > Proses
                                                                        Pencetakan <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="ProductionReport">
                                                                        <li><input type="checkbox" class="myCheckbox l2 l7 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l7 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l7 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l7 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l7 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>

                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#ProductionReport">
                                                                        <input type="checkbox" class="myCheckbox l2" name="" id="p3" > Proses
                                                                        Pencetakan <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="ProductionReport">
                                                                        <li><input type="checkbox" class="myCheckbox l2 l8 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l8 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l8 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l8 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l8 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>

                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#ProductionReport">
                                                                        <input type="checkbox" class="myCheckbox l2" name="" id="p4" > Proses
                                                                        Lipat<i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="ProductionReport">
                                                                        <li><input type="checkbox" class="myCheckbox l2 l9 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l9 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l9 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l9 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l9 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>

                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#ProductionReport">
                                                                        <input type="checkbox" class="myCheckbox l2" name="" id="p5" > Proses
                                                                        Penjilidan <br> (Perfect Bind)<i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="ProductionReport">
                                                                        <li><input type="checkbox" class="myCheckbox l2 l10 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l10 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l10 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l10 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l10 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>

                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#ProductionReport">
                                                                        <input type="checkbox" class="myCheckbox l2" name="" id="p6" > Prosess
                                                                        Penjilidan <br> (Saddle Stitch)<i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="ProductionReport">
                                                                        <li><input type="checkbox" class="myCheckbox l2 l11 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l11 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l11 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l11 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l11 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>

                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#ProductionReport">
                                                                        <input type="checkbox" class="myCheckbox l2" name="" id="p7" > Proses
                                                                        Three Knife<i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="ProductionReport">
                                                                        <li><input type="checkbox" class="myCheckbox l2 l12 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l12 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l12 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l12 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l12 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>

                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#ProductionReport">
                                                                        <input type="checkbox" class="myCheckbox l2" name="" id="input5" > Proses
                                                                        Pembungkusan<i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="ProductionReport">
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>

                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#ProductionReport">
                                                                        <input type="checkbox" class="myCheckbox l2" name="" id="input5" > Pengumpulan/
                                                                        Gathering<i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="ProductionReport">
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1"  name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1"  name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1"  name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1"  name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1"  name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>

                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#ProductionReport">
                                                                        <input type="checkbox" class="myCheckbox l2" name="" id="input5" > Pemotongan
                                                                        Kulit Buku/ Teks<i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="ProductionReport">
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1" name="" id="">  Index</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1" name="" id="">  Create</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1" name="" id="">  Edit</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1" name="" id="">  Delete</li>
                                                                        <li><input type="checkbox" class="myCheckbox l2 l4 checkbox1" name="" id="">  Verify</li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <label for="" data-toggle="collapse"
                                                            data-target="#WMScollapseOne" style="cursor:pointer;">
                                                        <input type="checkbox" name="" id=""> WMS
                                                        <i class="ti-angle-down menu-arrow"  ></i>
                                                    </label>
                                                    <ul id="WMScollapseOne" class="collapse ">
                                                        <li>
                                                            <label for="" data-toggle="collapse"
                                                                    data-target="#WMStwo">
                                                                <input type="checkbox" name="" id=""> Warehouse
                                                                <i class="ti-angle-down menu-arrow" ></i>
                                                            </label>
                                                            <ul id="WMStwo" class="collapse ">
                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#ProductionReport">
                                                                        <input type="checkbox" name="" id="">  Good
                                                                            Receiving <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="MaterialRequest">
                                                                        <li> <input type="checkbox" name="" id=""> Index </li>
                                                                        <li> <input type="checkbox" name="" id=""> View </li>
                                                                        <li> <input type="checkbox" name="" id=""> Receive </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#MaterialRequest">
                                                                        <input type="checkbox" name="" id=""> Material Request <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="MaterialRequest">
                                                                        <li> <input type="checkbox" name="" id=""> Index </li>
                                                                        <li> <input type="checkbox" name="" id=""> Create </li>
                                                                        <li> <input type="checkbox" name="" id=""> View </li>
                                                                        <li> <input type="checkbox" name="" id=""> Edit </li>
                                                                        <li> <input type="checkbox" name="" id=""> Delete </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#ManageTransfer">
                                                                        <input type="checkbox" name="" id=""> Manage Transfer <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="ManageTransfer">
                                                                        <li> <input type="checkbox" name="" id=""> Index </li>
                                                                        <li> <input type="checkbox" name="" id=""> Create </li>
                                                                        <li> <input type="checkbox" name="" id=""> View </li>
                                                                        <li> <input type="checkbox" name="" id=""> Edit </li>
                                                                        <li> <input type="checkbox" name="" id=""> Receive </li>
                                                                        <li> <input type="checkbox" name="" id=""> Delete </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#StockIn">
                                                                        <input type="checkbox" name="" id=""> Stock In <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="StockIn">
                                                                        <li> <input type="checkbox" name="" id=""> Index </li>
                                                                        <li> <input type="checkbox" name="" id=""> Create </li>
                                                                        <li> <input type="checkbox" name="" id=""> View </li>
                                                                        <li> <input type="checkbox" name="" id=""> Edit </li>
                                                                        <li> <input type="checkbox" name="" id=""> Delete </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#StockTransfer1">
                                                                        <input type="checkbox" name="" id=""> StockTransfer <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="StockTransfer1">
                                                                        <li> <input type="checkbox" name="" id=""> Index </li>
                                                                        <li> <input type="checkbox" name="" id=""> Create </li>
                                                                        <li> <input type="checkbox" name="" id=""> View </li>
                                                                        <li> <input type="checkbox" name="" id=""> Edit </li>
                                                                        <li> <input type="checkbox" name="" id=""> Receive </li>
                                                                        <li> <input type="checkbox" name="" id=""> Delete </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#StockTransfer">
                                                                        <input type="checkbox" name="" id=""> Stock Transfer (Location) <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="StockTransfer">
                                                                        <li> <input type="checkbox" name="" id=""> Index </li>
                                                                        <li> <input type="checkbox" name="" id=""> Create </li>
                                                                        <li> <input type="checkbox" name="" id=""> View </li>
                                                                        <li> <input type="checkbox" name="" id=""> Edit </li>
                                                                        <li> <input type="checkbox" name="" id=""> Delete </li>
                                                                        <li> <input type="checkbox" name="" id=""> Receive </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#Laporan">
                                                                        <input type="checkbox" name="" id=""> Laporan Pemeriksaan <br> Akhir, Pembungkusan &
                                                                            <br> Penghantaran ke Store <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Laporan">
                                                                        <li> <input type="checkbox" name="" id=""> Index </li>
                                                                        <li> <input type="checkbox" name="" id=""> Create </li>
                                                                        <li> <input type="checkbox" name="" id=""> View </li>
                                                                        <li> <input type="checkbox" name="" id=""> Edit </li>
                                                                        <li> <input type="checkbox" name="" id=""> Delete </li>
                                                                        <li> <input type="checkbox" name="" id=""> Check </li>
                                                                        <li> <input type="checkbox" name="" id=""> Verify QC </li>
                                                                        <li> <input type="checkbox" name="" id=""> Tranfer To Store </li>
                                                                        <li> <input type="checkbox" name="" id=""> Receive To Store </li>
                                                                    </ul>
                                                                </li>
                                                                </li>
                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#Pemeriksaan">
                                                                        <input type="checkbox" name="" id=""> Pemeriksaan Penghantaran <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Pemeriksaan">
                                                                        <li> <input type="checkbox" name="" id=""> Index </li>
                                                                        <li> <input type="checkbox" name="" id=""> Create </li>
                                                                        <li> <input type="checkbox" name="" id=""> View </li>
                                                                        <li> <input type="checkbox" name="" id=""> Edit </li>
                                                                        <li> <input type="checkbox" name="" id=""> Delete </li>
                                                                        <li> <input type="checkbox" name="" id=""> verify </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <label for="" data-toggle="collapse"
                                                                    data-target="#WMSthree">
                                                                <input type="checkbox" name="" id=""> Dashboard <i class="ti-angle-down menu-arrow"
                                                                    ></i>
                                                            </label>
                                                            <ul id="WMSthree" class="collapse">
                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#Inventory">
                                                                        <input type="checkbox" name="" id="">Inventory ShoopFloor <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Inventory">
                                                                        <li> <input type="checkbox" name="" id=""> Inventory ShoopFloor </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <label for="" data-toggle="collapse"
                                                                    data-target="#WMSfour">
                                                                <input type="checkbox" name="" id=""> Report <i class="ti-angle-down menu-arrow"
                                                                    ></i>
                                                            </label>
                                                            <ul id="WMSfour" class="collapse ">

                                                                <li>
                                                                    <label for=""  data-toggle="collapse" data-target="#Stock">
                                                                        <input type="checkbox" name="" id=""> Stock Card Report <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Stock">
                                                                        <li> <input type="checkbox" name="" id=""> Stock Card Report </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for=""   data-toggle="collapse" data-target="#Invertory">
                                                                        <input type="checkbox" name="" id=""> Invertory Report - By Location <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Invertory">
                                                                        <li> <input type="checkbox" name="" id=""> Invertory Report - By Location </li>
                                                                    </ul>
                                                                </li>
                                                                <li  >
                                                                    <label for="" data-toggle="collapse" data-target="#Subcon">
                                                                        <input type="checkbox" name="" id=""> Subcon Monitoring Report <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Subcon">
                                                                        <li> <input type="checkbox" name="" id=""> Subcon Monitoring Report</li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <label for="" data-toggle="collapse"
                                                            data-target="#SettingscollapseOne" style="cursor:pointer;">
                                                        <input type="checkbox" name="" id=""> Settings
                                                        <i class="ti-angle-down menu-arrow" ></i>
                                                    </label>
                                                    <ul id="SettingscollapseOne" class="collapse ">
                                                        <li>
                                                            <label for="" data-toggle="collapse"
                                                                    data-target="#Settingstwo">
                                                                <input type="checkbox" name="" id=""> Administration
                                                                <i class="ti-angle-down menu-arrow" ></i>
                                                            </label>
                                                            <ul id="Settingstwo" class="collapse ">
                                                                <li>
                                                                    <label for="" data-toggle="collapse"
                                                                    data-target="#Roles">
                                                                        <input type="checkbox" name="" id=""> Roles <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Roles">
                                                                    <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Index</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Create</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Edit</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Delete</label>
                                                                        </li>
                                                                    </ul>
                                                                </li>

                                                                <li>
                                                                    <label for="" data-toggle="collapse"
                                                                    data-target="#Department">
                                                                        <input type="checkbox" name="" id=""> Department <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Department">
                                                                    <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Index</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Create</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Edit</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Delete</label>
                                                                        </li>
                                                                    </ul>
                                                                </li>

                                                                <li>
                                                                    <label for="" data-toggle="collapse"
                                                                    data-target="#Designation">
                                                                        <input type="checkbox" name="" id=""> Designation <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Designation">
                                                                    <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Index</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Create</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Edit</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Delete</label>
                                                                        </li>
                                                                    </ul>
                                                                </li>

                                                                <li>
                                                                    <label for="" data-toggle="collapse"
                                                                    data-target="#Users">
                                                                        <input type="checkbox" name="" id=""> Users <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Users">
                                                                    <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Index</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Create</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Edit</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Delete</label>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <label for=""  data-toggle="collapse"
                                                                    data-target="#Settingsthree">
                                                                <input type="checkbox" name="" id=""> Database<i class="ti-angle-down menu-arrow"
                                                                ></i>
                                                            </label>
                                                            <ul id="Settingsthree" class="collapse ">

                                                                <li>
                                                                    <label for="" data-toggle="collapse"
                                                                    data-target="#productstwo">
                                                                        <input type="checkbox" name="" id=""> Product  <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>

                                                                    <ul id="productstwo">
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Create</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Edit</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name="" id=""> Delete</label>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for="" data-toggle="collapse"
                                                                    data-target="#Uom">
                                                                        <input type="checkbox" name="" id=""> UOM  <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Uom">
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Create</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Edit</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Delete</label>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for="" data-toggle="collapse"
                                                                    data-target="#Uomconversion">
                                                                        <input type="checkbox" name="" id=""> UOM Conversion <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Uomconversion">
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Create</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Edit</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Delete</label>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for="" data-toggle="collapse"
                                                                    data-target="#Machine1">
                                                                        <input type="checkbox" name="" id=""> Machine <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Machine1">
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Create</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Edit</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Delete</label>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for="" data-toggle="collapse"
                                                                    data-target="#Area-level">
                                                                        <input type="checkbox" name="" id=""> Area - Level <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Area-level">
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Create</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Edit</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Delete</label>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for="" data-toggle="collapse"
                                                                    data-target="#Area-Shelf">
                                                                        <input type="checkbox" name="" id=""> Area - Shelf<i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Area-Shelf">
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Create</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Edit</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Delete</label>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <label for="" data-toggle="collapse"
                                                                    data-target="#Area" >
                                                                        <input type="checkbox" name="" id=""> Area <i class="ti-angle-down menu-arrow" ></i>
                                                                    </label>
                                                                    <ul id="Area">
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Create</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Edit</label>
                                                                        </li>
                                                                        <li>
                                                                            <label for=""><input type="checkbox" name=" " id=""> Delete</label>
                                                                        </li>
                                                                    </ul>
                                                                </li>
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
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
<script>
  $(document).ready(function () {
        $(".menu-arrow").click(function () {
            $(this).closest('li').siblings().find('ul').hide();
            $(this).toggleClass('ti-angle-down ti-angle-up');
            $(this).closest("label").next('ul').toggle();
        });
        $('#Myinput').change(function(){
            // Check if the input is checked
            if($(this).is(':checked')){
                // Uncheck all checkboxes with class "myCheckbox"
                $('.myCheckbox').prop('checked', true);
            } else {
                // Check all checkboxes with class "myCheckbox"
                $('.myCheckbox').prop('checked', false);
            }
        });
        $('#input0, #input1, #input2').change(function(){
            // Check if all inputs are checked
            var allChecked = $('#input0').is(':checked') && $('#input1').is(':checked') && $('#input2').is(':checked');

            // Set Myinput accordingly
            $('#Myinput').prop('checked', allChecked);
        });

        $('#input0').change(function(){
            // Check if the input is checked
            if($(this).is(':checked')){
                // Check all checkboxes with class "c1"
                $('.c1').prop('checked', true);
            } else {
                // Uncheck all checkboxes with class "c1"
                $('.c1').prop('checked', false);
            }
        });

        $('#input1').change(function(){
            // Check if the input is checked
            if($(this).is(':checked')){
                // Check all checkboxes with class "l1"
                $('.l1').prop('checked', true);
            } else {
                // Uncheck all checkboxes with class "l1"
                $('.l1').prop('checked', false);
            }
        });

        $('#input2').change(function(){
            // Check if the input is checked
            if($(this).is(':checked')){
                // Check all checkboxes with class "l2"
                $('.l2').prop('checked', true);
            } else {
                // Uncheck all checkboxes with class "l2"
                $('.l2').prop('checked', false);
            }
        });

        $('#input3').change(function(){
            // Check if the input is checked
            if($(this).is(':checked')){
                // Check all checkboxes with class "l2"
                $('.c2').prop('checked', true);
            } else {
                // Uncheck all checkboxes with class "l2"
                $('.c2').prop('checked', false);
            }
        });

        $('#input4').change(function(){
            // Check if the input is checked
            if($(this).is(':checked')){
                // Check all checkboxes with class "l2"
                $('.l3').prop('checked', true);
            } else {
                // Uncheck all checkboxes with class "l2"
                $('.l3').prop('checked', false);
            }
        });


        $('#input5').change(function(){
            // Check if the input is checked
            if($(this).is(':checked')){
                // Check all checkboxes with class "l2"
                $('.l4').prop('checked', true);
            } else {
                // Uncheck all checkboxes with class "l2"
                $('.l4').prop('checked', false);
            }
        });

        $('#input05, p1, p2, p3, p4, p5, p6, p7').change(function(){
            // Check if the input is checked
            if($(this).is(':checked')){
                // Check all checkboxes with class "l2"
                $('.l5, .l6, .l7, .l8, .l9, .l10, .l11, .l12').prop('checked', true);
            } else {
                // Uncheck all checkboxes with class "l2"
                $('.l5, .l6, .l7, .l8, .l9, .l10, .l11, .l12').prop('checked', false);
            }
        });
    });
</script>
@endpush
