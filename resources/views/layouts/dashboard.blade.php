@extends('layouts.app')
@section('css')
<style>
    .card a{
        color:black;
        font-size:12px;
    }
    /* .card a span{
        font-size:13px;
    } */
    .card a:hover{
        text-decoration:none;
    }
    .card1{
        height:200px;
    }
    .hor-menu .horizontalMenu > .horizontalMenu-list > li > a:hover{
        color:#fff;
    }
    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
        .card .card1 {
            margin-left: 0;
            width:710px;
            height:215px;
        }

        .card .card2 {
            margin-top: 225px;
            width:710px;
            height:550px;
            margin-left:-125px;
        }
        .card .card3{
            margin-top: 790px;
            margin-left: -430px;
            width : 715px;
        }
        .card .card4{
            margin-top: 24px;
            margin-left: -430px;
            width:715px;
        }
        .card .card4 .c1{
            width :204px;
        }
        .card .card5{
            width:715px;
            margin-top: -24px;
            margin-left: -2px;
        }
        .card .card6{
            margin-top: 382px;
            margin-left: -366px;
            width:715px;
        }
        .card .card7{
            margin-top: -25px;
            margin-left:-125px;
            width:560px;
            display:block;
        }
    }
    @media only screen and (min-device-width: 430px) and (max-device-width: 932px) {

    }
</style>
@endsection
@section('content')

<style>
    .childCard {
        background-color: #E3E2EE;
        border-radius: 17px
            /* box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px; */
    }

    .Management {
        font-size: 16px;
        background: white;
        border-radius: 2.3vh
    }

    .Dashboard a,
    a:hover {
        color: #18002D !important;
    }
</style>




<div class="row row-sm Dasboard mt-5">
    <div class="col-xl-12">
        <div class="card">

            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title tx-20 mg-b-0 p-2">Dashboard</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2">
                        <div class="card childCard ht-40p card1">
                            <div class="card-body text-center ">
                                <span class="badge  p-2 text-lg-center mb-2 Management"> Management</span>
                                <div class="card " style="border-radius:17px;background:#ddcdf0;">
                                    <div class="card-body">
                                        <a href="{{route('sale_order')}}">
                                            <iconify-icon icon="pepicons-pop:file" width="24"
                                                height="24"></iconify-icon><br>
                                            <span style="font-weight: bold;">Sales Order
                                                List</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card childCard card2" >
                            <div class="card-body text-center ">
                                <span class="badge p-2  mb-2 Management d-flex justify-content-center"> Production
                                    Jobsheet </span>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="card " style="border-radius:17px;background:#788fd5;">
                                            <div class="card-body">
                                                <a href="{{route('digital_printing')}}">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                        height="24"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Digital
                                                        printing</span><br><br>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card " style="border-radius:17px;background:#788fd5;">
                                            <div class="card-body">
                                                <a href="{{route('cover_end_paper')}}">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                        height="24"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Cover &
                                                        Endpaper</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card " style="border-radius:17px;background:#788fd5;">
                                            <div class="card-body">
                                                <a href="{{route('ProductionJobSheet_text')}}">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                        height="24"></iconify-icon><br>
                                                    <span
                                                        style="font-weight: bold;">Text</span>
                                                    <br>
                                                    <br>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="card " style="border-radius:17px;background:#788fd5;">
                                            <div class="card-body">
                                                <a href="{{route('mesin_lipat')}}">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                        height="24"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Mesin
                                                        Lipat</span><br><br>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card " style="border-radius:17px;background:#788fd5;">
                                            <div class="card-body">
                                                <a href="{{route('staple_bind')}}">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                        height="24"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Staple
                                                        Bind</span><br><br>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card " style="border-radius:17px;background:#788fd5;">
                                            <div class="card-body">
                                                <a href="{{route('perfect_bind')}}">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                        height="24"></iconify-icon><br>
                                                    <span style="font-weight: bold;">Mesin
                                                        Perfect Bind</span>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="card " style="border-radius:17px;background:#788fd5;">
                                            <div class="card-body">
                                                <a href="{{route('mesin_knife')}}">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                        height="24"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Mesin
                                                        Three Knife</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card " style="border-radius:17px;background:#788fd5;">
                                            <div class="card-body">
                                                <a href="{{route('BorangeSerahKerja')}}">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                        height="24"></iconify-icon><br>
                                                    <span style="font-size:10px !important; font-weight: bold;">Borang
                                                        Serahan Kerja (Kulit Buku/ Cover)</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card " style="border-radius:17px;background:#788fd5;">
                                            <div class="card-body">
                                                <a href="{{route('BorangeSerahKerja_Teks')}}">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                        height="24"></iconify-icon><br>
                                                    <span style="font-size:10px !important;font-weight: bold;">Borang
                                                        Serahan Kerja (Teks)</span>


                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card childCard card3">
                            <div class="card-body text-center ">
                                <span class="badge p-2  mb-2 Management d-flex justify-content-center"> Production
                                </span>
                                <div class="row mt-2 d-flex justify-content-between">
                                    <div class="col-md-4">
                                        <div class="card " style="border-radius:17px;background:#788fd5;">
                                            <div class="card-body">
                                                <a href="{{route('production_scheduling')}}">
                                                    <iconify-icon icon="pepicons-pop:file" width="24"
                                                        height="24"></iconify-icon><br>
                                                    <span
                                                        style=" font-weight: bold;">Production
                                                        Scheduling</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card " style="border-radius:17px;background:#788fd5;">
                                            <div class="card-body">
                                                <a href="{{route('PrintingProcess_Text')}}">
                                                    <iconify-icon icon="pepicons-pop:file" width="24"
                                                        height="24"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Printing
                                                        Process</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card " style="border-radius:17px;background:#788fd5;">
                                            <div class="card-body">
                                                <a href="{{route('CallForAssistance')}}">
                                                    <iconify-icon icon="pepicons-pop:file" width="24"
                                                        height="24"></iconify-icon><br>
                                                    <span style="font-weight: bold;">Call for
                                                        assistance</span>


                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="card childCard card4  ">
                            <div class="card-body text-center ">
                                <span class="badge p-2  mb-2 Management d-flex justify-content-center"> Production -
                                    Laporan / Rekod Proses </span>
                                <div class="row mt-2 ">
                                    <div class="col-md-4">
                                        <div class="card p-2" style="border-radius:17px;background:#7dc4d5;">
                                            <a href="{{route('senari_semak')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style=" font-weight: bold;">Senarai
                                                    semak Pencetakan Digital</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card p-2" style="border-radius:17px;background:#7dc4d5;">
                                            <a href="{{route('senari_semak_cetak')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style=" font-weight: bold;">Senarai
                                                    semak Pra Cetak</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 w-100">
                                        <div class="card p-2" style="border-radius:17px;background:#7dc4d5;">
                                            <a href="{{route('rekod_serahan_plate')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style="font-weight: bold;">Rekod serahan
                                                    plate cetak serta sample</span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-md-4">
                                        <div class="card p-2" style="border-radius:17px;background:#7dc4d5;">
                                            <a href="{{route('laporan_proses_pencetakani')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style=" font-weight: bold;">Laporan
                                                    Process Pencetakan</span><br><br>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card p-2" style="border-radius:17px;background:#7dc4d5;">
                                            <a href="{{route('laporan_proses_lipat')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style=" font-weight: bold;">Laporan
                                                    Proses Lipat</span><br><br>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card p-2" style="border-radius:17px;background:#7dc4d5;">
                                            <a href="{{route('laporan_proses_penjilidan')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style="font-size:12px !important;font-weight: bold;">Laporan
                                                    proses Penjilidan (Perfect Bind)</span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-md-4 offset-2">
                                        <div class="card p-2 c1" style="border-radius:17px;background:#7dc4d5;">
                                            <a href="{{route('laporan_proses_penjilidan_saddle')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style="font-size:12px !important; font-weight: bold;">Laporan
                                                    Proses Penjilidan (Saddle Stitch)</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card p-2" style="border-radius:17px;background:#7dc4d5;">
                                            <a href="{{route('laporan_proses_three')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style="font-size:12px !important; font-weight: bold;">Laporan
                                                    proses Three Knife</span> <br> <br>
                                            </a>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card childCard card5  h-auto">
                            <div class="card-body text-center ">
                                <span class="badge p-2  mb-2 Management d-flex justify-content-center"> Laporan
                                    Pemeriksaan Kualiti </span>
                                <div class="row mt-2 ">
                                    <div class="col-md-3">
                                        <div class="card p-2 " style="border-radius:17px;background:#f5b875;">
                                            <a href="{{route('ctp')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span
                                                    style=" font-weight: bold;">CTP</span><br><br>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card p-2" style="border-radius:17px;background:#f5b875;">
                                            <a href="{{route('pod')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style=" font-weight: bold;">POD</span>
                                                <br><br>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3 ">
                                        <div class="card p-2" style="border-radius:17px;background:#f5b875;">
                                            <a href="{{route('plate_cetak')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style="font-weight: bold;">Plate
                                                    Cetak</span><br><br>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3 ">
                                        <div class="card p-2" style="border-radius:17px;background:#f5b875;">
                                            <a href="{{route('proses_pencetakan')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style="font-weight: bold;">Proses
                                                    Pencetakan</span><br><br>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-md-3">
                                        <div class="card p-2 " style="border-radius:17px;background:#f5b875;">
                                            <a href="{{route('laporan_proses_lipat')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style=" font-weight: bold;">Proses
                                                    Lipat</span><br><br>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card p-2" style="border-radius:17px;background:#f5b875;">
                                            <a href="{{route('laporan_proses_penjilidan')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style=" font-weight: bold;">Penjilidan
                                                    Perfect Bind</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3 ">
                                        <div class="card p-2" style="border-radius:17px;background:#f5b875;">
                                            <a href="{{route('laporan_proses_penjilidan_saddle')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style="font-weight: bold;">Penjilidan
                                                    Saddle Stitch</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3 ">
                                        <div class="card p-2" style="border-radius:17px;background:#f5b875;">
                                            <a href="{{route('laporan_proses_three')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style="font-weight: bold;">Proses Three
                                                    Knife</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2 d-flex justify-content-center ">
                                    <div class="col-md-3 ">
                                        <div class="card p-2 " style="border-radius:17px;background:#f5b875;">
                                            <a href="{{route('proses_pembungkusan')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span
                                                    style=" font-weight: bold;">Pembungkusan</span><br><br>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card p-2" style="border-radius:17px;background:#f5b875;">
                                            <a href="{{route('pengumpulan_gathering')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style=" font-weight: bold;">Pengumpulan
                                                    / Gathering</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3 ">
                                        <div class="card p-2" style="border-radius:17px;background:#f5b875;">
                                            <a href="{{route('kulit_buku')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style="font-weight: bold;">Pemotongan
                                                    Kulit Buku/ Teks</span>
                                            </a>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card childCard card6  h-auto">
                            <div class="card-body text-center ">
                                <span class="badge p-2  mb-2 Management d-flex justify-content-center"> Laporan
                                    Pemeriksaan Kualiti </span>
                                <div class="row mt-2 ">
                                    <div class="col-md-3">
                                        <div class="card p-2 " style="border-radius:17px;background:#f5d98f;">
                                            <a href="{{route('Good_Receiving')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style=" font-weight: bold;">Good
                                                    Receiving</span><br><br>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card p-2" style="border-radius:17px;background:#f5d98f;">
                                            <a href="{{route('Material_request')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style=" font-weight: bold;">Material
                                                    Request</span> <br><br>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3 ">
                                        <div class="card p-2" style="border-radius:17px;background:#f5d98f;">
                                            <a href="{{route('Manage_tranfer')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style="font-weight: bold;">Manage
                                                    Transfer</span><br><br>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3 ">
                                        <div class="card p-2" style="border-radius:17px;background:#f5d98f;">
                                            <a href="{{route('Stock_in')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style="font-weight: bold;">Stock
                                                    In</span><br><br>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-md-3">
                                        <div class="card p-2 " style="border-radius:17px;background:#f5d98f;">
                                            <a href="{{route('Stock_Transfer')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style=" font-weight: bold;">Stock
                                                    Transfer</span><br><br>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card p-2" style="border-radius:17px;background:#f5d98f;">
                                            <a href="{{route('stock_Transfer_location')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style=" font-weight: bold;">Stock
                                                    Transfer (Location)</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="card p-2" style="border-radius:17px;background:#f5d98f;">
                                            <a href="{{route('Laporan_Pemeriksaan')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style="font-weight: bold;">Laporan
                                                    Pemeriksaan Akhir, Pembungkusan & Penghantaran ke stor</span>
                                            </a>
                                        </div>
                                    </div>


                                </div>
                                <div class="row mt-2 d-flex justify-content-center">


                                    <div class="col-md-4 d-flex justify-content-center ">
                                        <div class="card p-2" style="border-radius:17px;background:#f5d98f;">
                                            <a href="{{route('Pemeriksaan_Penghantaran')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style="font-weight: bold;">Pemeriksaan
                                                    penghantaran</span>
                                            </a>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3 d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card childCard card7">
                            <div class="card-body text-center ">
                                <span class="badge p-2  mb-2 Management d-flex justify-content-center"> Dashboard
                                </span>
                                <div class="row mt-2 ">
                                    <div class="col-md-3">
                                        <div class="card p-2 " style="border-radius:17px;background:#e6b4a0;">
                                            <a href="{{route('MachineDashboard')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style=" font-weight: bold;">Machine
                                                    Dashboard</span><br><br>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card p-2" style="border-radius:17px;background:#e6b4a0;">
                                            <a href="{{route('ShopFloor')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style=" font-weight: bold;">Production
                                                    Shopfloor</span> <br><br>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3 ">
                                        <div class="card p-2" style="border-radius:17px;background:#e6b4a0;">
                                            <a href="{{route('OEEDashboard')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span
                                                    style="font-weight: bold;">OEE</span><br><br><br>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3 ">
                                        <div class="card p-2" style="border-radius:17px;background:#e6b4a0;">
                                            <a href="{{route('invertory_ShopFloor')}}">
                                                <iconify-icon icon="pepicons-pop:file" width="20"
                                                    height="20"></iconify-icon><br>
                                                <span style="font-weight: bold;">Inventory
                                                    Shopfloor</span><br><br>
                                            </a>
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

</div>



@endsection
