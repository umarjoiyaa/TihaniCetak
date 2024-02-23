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
                                            <input type="text" name="" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <div class="row mt-5">
                                    <div class="col-md-6">
                                        <ul>
                                            <li>
                                                <label for="">
                                                    <input type="checkbox" name="" id=""> Mes
                                                    <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                        data-target="#collapseOne" style="cursor:pointer;"></i>
                                                </label>
                                                <ul id="collapseOne" class="collapse ">
                                                    <li>
                                                        <label for="">
                                                            <input type="checkbox" name="" id=""> Management
                                                            <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                data-target="#subCollapsetwo"></i>
                                                        </label>
                                                        <ul id="subCollapsetwo" class="collapse ">
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Sale Order No
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <label for="">
                                                            <input type="checkbox" name="" id=""> Laporan/ Rekod
                                                            process<i class="ti-angle-down menu-arrow"
                                                                data-toggle="collapse"
                                                                data-target="#subCollapsethree"></i>
                                                        </label>
                                                        <ul id="subCollapsethree" class="collapse ">
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Semak
                                                                    pencetaken Digital
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Semak Pra
                                                                    Cetak
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> serahan plate
                                                                    cetak serta Sample
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Process
                                                                    pencetaken
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Process Lipat
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Process
                                                                    penjilidan (Prefect Bind)
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Process
                                                                    penjilidan (Saddle stitch)
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Process
                                                                    penjilidan 3 knife
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <label for="">
                                                            <input type="checkbox" name="" id=""> Laporan Pemeriksaan
                                                            Kualiti <i class="ti-angle-down menu-arrow"
                                                                data-toggle="collapse"
                                                                data-target="#subCollapsefour"></i>
                                                        </label>
                                                        <ul id="subCollapsefour" class="collapse ">
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id="">CTP
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> POD
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Plate Cetax
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Process
                                                                    pencetaken
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Process Lipat
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Process
                                                                    penjilidan (Prefect Bind)
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Process
                                                                    penjilidan (Saddle stitch)
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Process 3
                                                                    knife
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Process
                                                                    Pembungkusan
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Pengumpulan
                                                                    Gathering
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Pemotongan
                                                                    Kuilt Buku / teks
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <ul>
                                            <li>
                                                <label for="">
                                                    <input type="checkbox" name="" id=""> Production
                                                    <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                        data-target="#ProductioncollapseOne" style="cursor:pointer;"></i>
                                                </label>
                                                <ul id="ProductioncollapseOne" class="collapse ">
                                                    <li>
                                                        <label for="">
                                                            <input type="checkbox" name="" id=""> Jobsheet
                                                            <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                data-target="#productiontwo"></i>
                                                        </label>
                                                        <ul id="productiontwo" class="collapse ">
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Digital Printing
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Cover & End Paper
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id="">Textg
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Mesin Lipat
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Staple Bind
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Mesin Perfect Bind
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id="">  Mesin 3Knife
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Borang Serahan Kerja (Kulit Buku /Cover)
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Borang Serahan Kerja (Teks)
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <label for="">
                                                            <input type="checkbox" name="" id="">Production<i class="ti-angle-down menu-arrow"
                                                                data-toggle="collapse"
                                                                data-target="#productionthree"></i>
                                                        </label>
                                                        <ul id="productionthree" class="collapse ">
                                                           
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Production
                                                                Scheduling
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Printing
                                                                Process
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Call for
                                                                assistance
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <label for="">
                                                            <input type="checkbox" name="" id=""> Dashboard <i class="ti-angle-down menu-arrow"
                                                                data-toggle="collapse"
                                                                data-target="#productionfour"></i>
                                                        </label>
                                                        <ul id="productionfour" class="collapse ">
                                                            
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Machine
                                                                Dashboard
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Shopfloor
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> OEE
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id="">Production
                                                                Report
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <ul>
                                            <li>
                                                <label for="">
                                                    <input type="checkbox" name="" id=""> WMS
                                                    <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                        data-target="#WMScollapseOne" style="cursor:pointer;"></i>
                                                </label>
                                                <ul id="WMScollapseOne" class="collapse ">
                                                    <li>
                                                        <label for="">
                                                            <input type="checkbox" name="" id=""> Warehouse
                                                            <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                data-target="#WMStwo"></i>
                                                        </label>
                                                        <ul id="WMStwo" class="collapse ">
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id="">  Good
                                                                        Receiving
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Material Request
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Manage Transfer
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Stock In
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Stock Transfer
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Stock Transfer (Location)
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Laporan Pemeriksaan <br> Akhir, Pembungkusan &
                                                                        <br> Penghantaran ke Store
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Pemeriksaan Penghantaran
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <label for="">
                                                            <input type="checkbox" name="" id=""> Dashboard <i class="ti-angle-down menu-arrow"
                                                                data-toggle="collapse"
                                                                data-target="#WMSthree"></i>
                                                        </label>
                                                        <ul id="WMSthree" class="collapse ">
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id="">Inventory ShoopFloor
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <label for="">
                                                            <input type="checkbox" name="" id=""> Report <i class="ti-angle-down menu-arrow"
                                                                data-toggle="collapse"
                                                                data-target="#WMSfour"></i>
                                                        </label>
                                                        <ul id="WMSfour" class="collapse ">
                                                           
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Stock Card Report
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Invertory Report - By Location
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Subcon Monitoring Report
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <ul>
                                            <li>
                                                <label for="">
                                                    <input type="checkbox" name="" id=""> Settings
                                                    <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                        data-target="#SettingscollapseOne" style="cursor:pointer;"></i>
                                                </label>
                                                <ul id="SettingscollapseOne" class="collapse ">
                                                    <li>
                                                        <label for="">
                                                            <input type="checkbox" name="" id=""> Jobsheet
                                                            <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                data-target="#Settingstwo"></i>
                                                        </label>
                                                        <ul id="Settingstwo" class="collapse ">
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Roles <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                data-target="#Roles"></i>
                                                                </label>
                                                                <ul id="Roles">
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
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Department <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                data-target="#Department"></i>
                                                                </label>
                                                                <ul id="Department">
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
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Designation <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                data-target="#Designation"></i>
                                                                </label>
                                                                <ul id="Designation">
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
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Users <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                data-target="#Users"></i>
                                                                </label>
                                                                <ul id="Users">
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
                                                        <label for="">
                                                            <input type="checkbox" name="" id=""> Database<i class="ti-angle-down menu-arrow"
                                                                data-toggle="collapse"
                                                                data-target="#Settingsthree"></i>
                                                        </label>
                                                        <ul id="Settingsthree" class="collapse ">
                                                          
                                                            <li>
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Product  <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                data-target="#productstwo"></i>
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
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> UOM  <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                data-target="#Uom"></i>
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
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> UOM Conversion <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                data-target="#Uomconversion"></i>
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
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Machine <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                data-target="#Machine1"></i>
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
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Area - Level <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                data-target="#Area-level"></i>
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
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Area - Shelf<i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                data-target="#Area-Shelf"></i>
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
                                                                <label for="">
                                                                    <input type="checkbox" name="" id=""> Area <i class="ti-angle-down menu-arrow" data-toggle="collapse"
                                                                data-target="#Area"></i>
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
            // Toggle the display style of the nested list
            $(this).parent().next('ul').toggle();
        });
    });
</script>
@endpush