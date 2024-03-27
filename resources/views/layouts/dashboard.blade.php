@extends('layouts.app')
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
    .card .col-md-3 .card{
        width:140px;
        height:120px;

    }

    .card .card-width{
        margin-inline:auto;
        width:175px;
        height:120px;
    }


    .card .col-md-4 .card{
        width:130px;
        height:130px;
    }
    .card .col-md-5 .card{
        width:130px;
        height:130px;
    }

    .card1{
        width:200px;
        height:auto;
    }

    .card1 .card{
        margin-inline:auto;
        width:130px;
        height:auto;
    }

    .card2 .card span{
        margin-top: 50px;
    }
    .hor-menu .horizontalMenu > .horizontalMenu-list > li > a:hover{
        color:;
    }
    #abcd{
        display:none;
    }
    #abcde{
        display:none;
    }
    .card7{
        width:700px;
        margin-inline:auto;
    }


    @media screen  and (max-width:1260px){
        .card .col-md-4 .card{
            width:120px;
            height:120px;
        }
        .card .col-md-3 .card{
            width:110px;
            height:110px;
        }
        .card .col-md-3 .card i{
            margin-inline:auto;
        }
    }
    @media screen  and (max-width:1200px){
        .card .col-md-4 .card{
            width:200px;
            height:150px;
        }
    }
    @media screen  and (max-width:1165px){
        .card .col-md-4 .card{
            width:200px;
            height:120px;
        }
         .card1{
            width:175px;
            margin-inline:auto;
            height:auto;
        }
        .card .card1{
            width:175px;
            height: auto;
        }
        .card7{
            width:600px;
            margin-inline:none;
        }

    }
    @media screen  and (max-width:1040px){

        .card .col-md-3 .card{
            width:200px;
            height:150px;
        }
        .card .col-md-4 .card{
            width:200px;
            height:150px;
        }

        .card .col-md-3 .card i{
            margin-inline:auto;
        }
        .card .card-width{
            width:auto;
            height:150px;
        }
        .card .col-md-5 .card{
            width:200px;
            height:150px;
        }
    }


    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
        .card .card1 {
            width: 150px;
            height: auto;
        }
       .card1 .card{
            margin-inline:auto;
            width:auto;
            height:140px;
       }
       .card2{
        width:530px;
        margin-inline:50px;
       }
       .card3{
        margin-top: 30px;
       }



       .card .card-width{
        width:auto;
        height:150px;
       }

        .card .col-md-4 .card{
            width:auto;
            height:160px;
            padding:5px;
            font-size:15px;
       }

       .card .col-md-3 .card{
            width:auto;
            height:150px;
            font-size:16px;
       }

       .card .col-md-5 .card{
            width:auto;
            height:150px;
            font-size:16px;
       }

       .card span{
            font-size:14px;
       }

    }


   @media screen  and (max-width:768px){

        .card .card-width {
            margin-inline: auto;
            width: auto;
            height: 140px;
        }
        .card .col-md-4 .card{
            margin-inline:auto;
            width:auto;
            height:140px;
            font-size:14px;
        }
        .card .col-md-5 .card{
            width:auto;
            height:150px;
            font-size:14px;
        }
        .card .col-md-3 .card{
            margin-inline:auto;
            width:auto;
            height:140px;
        }
        .card .card1 {
            width: 218px;
            height: 240px;
        }

        .card .card1 .card{
            margin-inline:auto;
            width:auto;
            height:120px;
        }
         .card7{
            width:auto;
         }

        #abcde{
            display:block;
            margin-top: -50px;
            justify-content:center;
        }
    }
</style>




<div class="row row-sm Dasboard ">
    <div class="col-xl-12">
        <div class="card">

            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title tx-20 mg-b-0 p-2">Dashboard</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-2  col-lg-3 col-xl-2">
                        <div class="card childCard ht-40p card1">
                            <div class="card-body text-center ">
                                <span class="badge w-100  p-2 text-xl-center mb-2 Management"> Management</span>
                                <a href="{{route('sale_order')}}">
                                    <div class="card" style="border-radius:17px;background:#ddcdf0;">
                                        <div class="card-body">

                                                <iconify-icon id="abc" icon="pepicons-pop:file" width="24"
                                                    height="24"></iconify-icon><br>
                                                    <!-- <iconify-icon id="abcd" class="justify-content-center" icon="pepicons-pop:file" width="30"
                                                    height="30"></iconify-icon><br>
                                                    <iconify-icon id="abcde" class="justify-content-center" icon="pepicons-pop:file" width="35"
                                                    height="35"></iconify-icon><br> -->
                                                <span style="font-weight: bold;">Sales Order
                                                    List</span>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-lg-9 col-xl-5">
                        <div class="card childCard  card2" >
                            <div class="card-body text-center ">
                                <span class="badge p-2  mb-2 Management d-flex justify-content-center"> Production
                                    Jobsheet </span>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <a href="{{route('digital_printing')}}">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">

                                                        <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                            height="24"></iconify-icon><br>
                                                        <span style=" font-weight: bold;">Digital
                                                            printing</span><br><br>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('cover_end_paper')}}">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">

                                                        <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                            height="24"></iconify-icon><br>
                                                        <span style=" font-weight: bold;">Cover &
                                                            Endpaper</span>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('text')}}">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">

                                                        <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                            height="24"></iconify-icon><br>
                                                        <span
                                                            style="font-weight: bold;">Text</span>
                                                        <br>
                                                        <br>


                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <a href="{{route('mesin_lipat')}}">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">

                                                        <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                            height="24"></iconify-icon><br>
                                                        <span style=" font-weight: bold;">Mesin
                                                            Lipat</span><br><br>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('staple_bind')}}">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">

                                                        <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                            height="24"></iconify-icon><br>
                                                        <span style=" font-weight: bold;">Staple
                                                            Bind</span><br><br>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('perfect_bind')}}">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">

                                                        <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                            height="24"></iconify-icon><br>
                                                        <span style="font-weight: bold;">Mesin
                                                            Perfect Bind</span>


                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <a href="{{route('mesin_knife')}}">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">

                                                        <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                            height="24"></iconify-icon><br>
                                                        <span style=" font-weight: bold;">Mesin
                                                            Three Knife</span>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('borange_serah_kerja')}}">
                                            <div class="card height" style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">

                                                        <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                            height="24"></iconify-icon><br>
                                                        <span style=" font-weight: bold;">Borang
                                                            Serahan Kerja (Kulit Buku/ Cover)</span>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('borange_serah_kerja_teks')}}">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">

                                                        <iconify-icon icon="mdi:file-cog-outline" width="24"
                                                            height="24"></iconify-icon><br>
                                                        <span style="font-weight: bold;">Borang
                                                            Serahan Kerja (Teks)</span>



                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-5">
                        <div class="card childCard  card3">
                            <div class="card-body text-center ">
                                <span class="badge p-2  mb-2 Management d-flex justify-content-center"> Production
                                </span>
                                <div class="row mt-2 d-flex justify-content-between">
                                    <div class="col-md-4">
                                        <a href="{{route('production_scheduling')}}">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">

                                                        <iconify-icon icon="pepicons-pop:file" width="24"
                                                            height="24"></iconify-icon><br>
                                                        <span
                                                            style=" font-weight: bold;">Production
                                                            Scheduling</span>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('printing_process')}}">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">

                                                        <iconify-icon icon="pepicons-pop:file" width="24"
                                                            height="24"></iconify-icon><br>
                                                        <span style=" font-weight: bold;">Printing
                                                            Process</span>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('CallForAssistance')}}">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">

                                                        <iconify-icon icon="pepicons-pop:file" width="24"
                                                            height="24"></iconify-icon><br>
                                                        <span style="font-weight: bold;">Call for
                                                            assistance</span>



                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="card childCard  card4">
                            <div class="card-body text-center ">
                                <span class="badge p-2  mb-2 Management d-flex justify-content-center"> Production -
                                    Laporan / Rekod Proses </span>
                                <div class="row mt-2 ">
                                    <div class="col-md-4">
                                        <a href="{{route('senari_semak')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#7dc4d5;">

                                                    <iconify-icon icon="pepicons-pop:file"  width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Senarai
                                                        semak Pencetakan Digital</span>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('senari_semak_cetak')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#7dc4d5;">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Senarai
                                                        semak Pra Cetak</span>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4 ">
                                        <a href="{{route('rekod_serahan_plate')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#7dc4d5;">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style="font-weight: bold;">Rekod serahan
                                                        plate cetak serta sample</span>

                                            </div>
                                        </a>
                                    </div>

                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-md-4">
                                        <a href="{{route('laporan_proses_pencetakani')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#7dc4d5;">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Laporan
                                                        Process Pencetakan</span><br><br>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('laporan_proses_lipat')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#7dc4d5;">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Laporan
                                                        Proses Lipat</span><br><br>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('laporan_proses_penjilidan')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#7dc4d5;">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style="font-weight: bold;">Laporan
                                                        proses Penjilidan (Perfect Bind)</span>

                                            </div>
                                        </a>
                                    </div>

                                </div>
                                <div class="row mt-2 justify-content-center">
                                    <div class="col-md-4 justify-content-center">
                                        <a href="{{route('laporan_proses_penjilidan_saddle')}}">
                                            <div class="card p-2 c1" style="border-radius:17px;background:#7dc4d5;">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Laporan
                                                        Proses Penjilidan (Saddle Stitch)</span>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('laporan_proses_three')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#7dc4d5;">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Laporan
                                                        proses Three Knife</span> <br> <br>

                                            </div>
                                        </a>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12 col-xl-6">
                        <div class="card childCard  card5  h-auto">
                            <div class="card-body text-center ">
                                <span class="badge p-2  mb-2 Management d-flex justify-content-center"> Laporan
                                    Pemeriksaan Kualiti </span>
                                <div class="row mt-2 ">
                                    <div class="col-md-3">
                                        <a href="{{route('ctp')}}">
                                            <div class="card p-2 " style="border-radius:17px;background:#f5b875; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span
                                                        style=" font-weight: bold;">CTP</span><br><br>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-3">
                                        <a href="{{route('pod')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#f5b875; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">POD</span>
                                                    <br><br>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-3 ">
                                        <a href="{{route('plate_cetak')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#f5b875; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style="font-weight: bold;">Plate
                                                        Cetak</span><br><br>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-3 ">
                                        <a href="{{route('proses_pencetakan')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#f5b875; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style="font-weight: bold;">Proses
                                                        Pencetakan</span><br><br>

                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-md-3">
                                        <a href="{{route('laporan_proses_lipat')}}">
                                            <div class="card p-2 " style="border-radius:17px;background:#f5b875; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Proses
                                                        Lipat</span><br><br>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-3">
                                        <a href="{{route('laporan_proses_penjilidan')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#f5b875; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Penjilidan
                                                        Perfect Bind</span>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-3 ">
                                        <a href="{{route('laporan_proses_penjilidan_saddle')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#f5b875; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style="font-weight: bold;">Penjilidan
                                                        Saddle Stitch</span>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-3 ">
                                        <a href="{{route('laporan_proses_three')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#f5b875; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style="font-weight: bold;">Proses Three
                                                        Knife</span>

                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-2 d-flex justify-content-center ">
                                    <div class="col-md-3 ">
                                        <a href="{{route('proses_pembungkusan')}}">
                                            <div class="card p-2 " style="border-radius:17px;background:#f5b875; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span
                                                        style=" font-weight: bold;">Pembungkusan</span><br><br>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-3">
                                        <a href="{{route('pengumpulan_gathering')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#f5b875; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Pengumpulan
                                                        / Gathering</span>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-3 ">
                                        <a href="{{route('kulit_buku')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#f5b875; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style="font-weight: bold;">Pemotongan
                                                        Kulit Buku/ Teks</span>

                                            </div>
                                        </a>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="card  childCard  card6  h-auto">
                            <div class="card-body text-center ">
                                <span class="badge p-2  mb-2 Management d-flex justify-content-center"> Warehouse </span>
                                <div class="row mt-2 ">
                                    <div class="col-md-3">
                                        <a href="{{route('good_receiving')}}">
                                            <div class="card p-2 " style="border-radius:17px;background:#f5d98f; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Good
                                                        Receiving</span><br><br>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-3">
                                        <a href="{{route('material_request')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#f5d98f; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Material
                                                        Request</span> <br><br>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-3 ">
                                        <a href="{{route('manage_transfer')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#f5d98f; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style="font-weight: bold;">Manage
                                                        Transfer</span><br><br>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-3 ">
                                        <a href="{{route('stock_in')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#f5d98f; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style="font-weight: bold;">Stock
                                                        In</span><br><br>

                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-md-3">
                                        <a href="{{route('stock_transfer')}}">
                                            <div class="card p-2 " style="border-radius:17px;background:#f5d98f; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Stock
                                                        Transfer</span><br><br>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-3">
                                        <a href="{{route('stock_transfer_location')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#f5d98f; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Stock
                                                        Transfer (Location)</span>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-6">
                                        <a href="{{route('Laporan_Pemeriksaan')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#f5d98f; width:140px; height:140px;">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style="font-weight: bold;">Laporan
                                                        Pemeriksaan Akhir, Pembungkusan & Penghantaran ke stor</span>

                                            </div>
                                        </a>
                                    </div>


                                </div>
                                <div class="row mt-2">


                                    <div class="col-md-5 d-flex justify-content-center ">
                                        <a href="{{route('pemeriksaan_penghantaran')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#f5d98f; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style="font-weight: bold;">Pemeriksaan
                                                        penghantaran</span>

                                            </div>
                                        </a>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3 d-flex justify-content-center">
                    <div class="col-md-12 col-xl-6">
                        <div class="card childCard  card7">
                            <div class="card-body text-center ">
                                <span class="badge p-2  mb-2 Management d-flex justify-content-center"> Dashboard
                                </span>
                                <div class="row mt-2 ">
                                    <div class="col-md-3">
                                        <a href="{{route('MachineDashboard')}}">
                                            <div class="card p-2 " style="border-radius:17px;background:#e6b4a0; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Machine
                                                        Dashboard</span><br><br>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-3">
                                        <a href="{{route('ShopFloor')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#e6b4a0; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style=" font-weight: bold;">Production
                                                        Shopfloor</span> <br><br>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-3 ">
                                        <a href="{{route('OEEDashboard')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#e6b4a0; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span
                                                        style="font-weight: bold;">OEE</span><br><br><br>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-3 ">
                                        <a href="{{route('inventory_shopfloor')}}">
                                            <div class="card p-2" style="border-radius:17px;background:#e6b4a0; ">

                                                    <iconify-icon  icon="pepicons-pop:file" width="20"
                                                        height="20"></iconify-icon><br>
                                                    <span style="font-weight: bold;">Inventory
                                                        Shopfloor</span><br><br>

                                            </div>
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



@endsection
