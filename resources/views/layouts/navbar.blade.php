<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->


    <style>
      nav{
        background: #18002D;
        width: 100%;
        display: none !important;
      }
      nav a{
        color: #fff;
      }
      nav a:hover{
        color:#fff !important;
      }
      .main-right{
        display:none;
      }
      .abc{
        display:none;
      }

      @media screen and (max-width:992px) {

        #form{
          display:none;
        }
        nav{
          display: none !important;
        }
        .abcd{
          display:none;
        }
        .navbar-toggler{
          width:65%;
        }
        .navbar-toggler:focus {
            outline: none;
            box-shadow: none;
        }

        .navbar-toggler-icon{
          color:#fff;
          font-size:20px;
          margin-left: 606px;
        }
        .dropdown-item{
          font-size:13px;
        }
        .dropdown-item:hover{
          color:#1c273c !important;
          background: none;
        }
      }
      @media screen and (max-width:991px){
        nav{
          display:block !important;
        }
        .main-right{
          display:block;
          /* margin-inline:auto; */
          float:right;
        }
      }
      @media screen and (max-width:930px){
        .navbar-toggler-icon{
          color:#fff;
          font-size:20px;
          margin-left: 556px;
        }
      }
     @media screen and (max-width:907px){
      .navbar-toggler{
          width:60%;
        }
        .navbar-toggler-icon{
          margin-left: 550px;
        }
     }

     @media screen and (max-width:880px){
      .navbar-toggler-icon{
          margin-left: 510px;
        }
     }
     @media screen and (max-width:850px){
        .navbar-toggler-icon{
          margin-left: 460px;
        }
     }
     @media screen and (max-width:808px){
      .navbar-toggler-icon{
        margin-left: 460px;
      }
     }
     @media screen and (max-width:790px){
      .navbar-toggler-icon{
        margin-left: 410px;
      }
     }

     @media screen and (max-width:740px){
      .navbar-toggler-icon{
        margin-left: 360px;
      }
     }

     @media screen and (max-width:710px){
      .navbar-toggler{
          width:50%;
          /* margin-top: 30px; */
          /* margin-left: 150px; */
        }
      .navbar-toggler-icon{
        margin-left: 360px;
        /* margin-top: 70px; */
      }

     }

     @media screen and (max-width:695px){
      .navbar-toggler-icon{
        margin-left: 310px;
      }
     }

     @media screen and (max-width:640px){
      .navbar-toggler-icon{
        margin-left: 280px;
      }
     }

     @media screen and (max-width:610px){
      .navbar-toggler{
          width:40%;
          /* margin-top: 30px; */
          /* margin-left: 150px; */
        }
        .main-right{
        display:none;
      }
      .pulse{
        top:7px;
        right:560px;

      }
      .abc{
        display:block;
      }
      .abcd{
        display:block;
      }
      .navbar-toggler-icon{
        margin-left: 340px;
      }
     }

     @media screen and (max-width:575px){
      .navbar-toggler-icon{
        margin-left: 310px;
      }
     }

     @media screen and (max-width:558px){
      .navbar-toggler-icon{
        margin-left: 310px ;
      }
     }

     @media screen and (max-width:545px){
      .navbar-toggler-icon{
        margin-left: 270px ;
      }
     }

     @media screen and (max-width:505px){
      .navbar-toggler-icon{
        margin-left: 230px ;
      }
     }

     @media screen and (max-width:465px){
      .navbar-toggler-icon{
        margin-left: 190px ;
      }
     }

     @media screen and (max-width:456px){
      .navbar-toggler-icon{
        margin-left: 190px;
      }
     }

     @media screen and (max-width:420px){
      .navbar-toggler-icon{
        margin-left: 150px;
      }
     }

     @media screen and (max-width:406px){
      .navbar-toggler-icon{
        margin-left: 150px;
      }
     }

     @media screen and (max-width:380px){
      .navbar-toggler-icon{
        margin-left: 110px;
      }
     }

     @media screen and (max-width:358px){
      .navbar-toggler-icon{
        margin-left: 110px;
      }
     }

     @media screen and (max-width:340px){
      .navbar-toggler-icon{
        margin-left: 70px;
      }
     }

     @media screen and (max-width:312px){
      .navbar-toggler-icon{
        margin-left: 200px;
        margin-top: -90px;
      }
     }

     @media screen and (max-width:306px){
      .navbar-toggler-icon{
        margin-left: 200px;
        margin-top: -90px;
      }
     }
     @media screen and (max-width:260px){
      .navbar-toggler-icon{
        margin-left: 160px;
      }
     }

     @media screen and (max-width:240px){
      .navbar-toggler-icon{
        margin-left: 160px;
      }
     }

    </style>
  </head>
  <body>

      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#"><img src="{{asset('assets/img/tihani.png')}}" width="50px" alt="">Tihani Cetak</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation ">
          <span class="navbar-toggler-icon"> <i class="fe fe-align-justify"></i></span>
        </button>
                        <div class="main-header-right main-right ">
                            <div class="nav nav-item  navbar-nav-right ml-auto">
                                <form id="form" class="navbar-form nav-item my-auto d-lg-none" role="search">
                                    <div class="input-group nav-item my-auto">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="input-group-btn">
                                            <button type="reset" class="btn btn-default">
                                                <i class="ti-close"></i>
                                            </button>
                                            <button type="submit" class="btn btn-default nav-link">
                                                <i class="ti-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                                <div class="dropdown nav-item main-header-notification">
                                    <a class="new nav-link " href="#"><i
                                            class="ti-bell animated bell-animations text-white" id="bell  "></i><span
                                            class=" pulse"></span></a>
                                    <div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
                                        <div class="menu-header-content text-left d-flex">
                                            <div class="">
                                                <h6 class="menu-header-title text-white mb-0">7 new Notifications</h6>
                                            </div>
                                            <div class="my-auto ml-auto">
                                                <span class="badge badge-pill badge-warning float-right">Mark All
                                                    Read</span>
                                            </div>
                                        </div>
                                        <div class="main-notification-list Notification-scroll">
                                            <a class="d-flex p-3 border-bottom" href="#">
                                                <div class="notifyimg bg-success-transparent">
                                                    <i class="la la-shopping-basket text-success"></i>
                                                </div>
                                                <div class="ml-3">
                                                    <h5 class="notification-label mb-1">New Order Received</h5>
                                                    <div class="notification-subtext">1 hour ago</div>
                                                </div>
                                                <div class="ml-auto">
                                                    <i class="las la-angle-right text-right text-muted"></i>
                                                </div>
                                            </a>
                                            <a class="d-flex p-3 border-bottom" href="#">
                                                <div class="notifyimg bg-danger-transparent">
                                                    <i class="la la-user-check text-danger"></i>
                                                </div>
                                                <div class="ml-3">
                                                    <h5 class="notification-label mb-1">22 verified registrations</h5>
                                                    <div class="notification-subtext">2 hour ago</div>
                                                </div>
                                                <div class="ml-auto">
                                                    <i class="las la-angle-right text-right text-muted"></i>
                                                </div>
                                            </a>
                                            <a class="d-flex p-3 border-bottom" href="#">
                                                <div class="notifyimg bg-primary-transparent">
                                                    <i class="la la-check-circle text-primary"></i>
                                                </div>
                                                <div class="ml-3">
                                                    <h5 class="notification-label mb-1">Project has been approved</h5>
                                                    <div class="notification-subtext">4 hour ago</div>
                                                </div>
                                                <div class="ml-auto">
                                                    <i class="las la-angle-right text-right text-muted"></i>
                                                </div>
                                            </a>
                                            <a class="d-flex p-3 border-bottom" href="#">
                                                <div class="notifyimg bg-pink-transparent">
                                                    <i class="la la-file-alt text-pink"></i>
                                                </div>
                                                <div class="ml-3">
                                                    <h5 class="notification-label mb-1">New files available</h5>
                                                    <div class="notification-subtext">10 hour ago</div>
                                                </div>
                                                <div class="ml-auto">
                                                    <i class="las la-angle-right text-right text-muted"></i>
                                                </div>
                                            </a>
                                            <a class="d-flex p-3 border-bottom" href="#">
                                                <div class="notifyimg bg-warning-transparent">
                                                    <i class="la la-envelope-open text-warning"></i>
                                                </div>
                                                <div class="ml-3">
                                                    <h5 class="notification-label mb-1">New review received</h5>
                                                    <div class="notification-subtext">1 day ago</div>
                                                </div>
                                                <div class="ml-auto">
                                                    <i class="las la-angle-right text-right text-muted"></i>
                                                </div>
                                            </a>
                                            <a class="d-flex p-3" href="#">
                                                <div class="notifyimg bg-purple-transparent">
                                                    <i class="la la-gem text-purple"></i>
                                                </div>
                                                <div class="ml-3">
                                                    <h5 class="notification-label mb-1">Updates Available</h5>
                                                    <div class="notification-subtext">2 days ago</div>
                                                </div>
                                                <div class="ml-auto">
                                                    <i class="las la-angle-right text-right text-muted"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="dropdown-footer">
                                            <a href="#">VIEW ALL</a>
                                        </div>
                                    </div>
                                </div>

                                <button class="navbar-toggler navresponsive-toggler d-sm-none" type="button"
                                    data-toggle="collapse" data-target="#navbarSupportedContent-4"
                                    aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                                </button>
                                <div class="dropdown main-profile-menu nav nav-item nav-link">
                                    <a class="profile-user" href="#" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                            alt="" src="{{ asset('assets/img/user.png') }}"></a>
                                    <div class="dropdown-menu mt-3" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-user"></i>{{ Auth::user()->full_name }}</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-envelope"></i>{{ Auth::user()->email }}</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                                class="fas fa-sign-out-alt"></i>
                                            Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('dashboard')}}">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Mes
              </a>
              <div class="dropdown-menu">
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="pl-3 pt-3"><b>Managment</b></h6>
                    <a class="dropdown-item" href="{{route('sale_order')}}">Sale Orders</a>
                  </div>
                  <div class="col-sm-5">
                    <h6 class="pl-3 pt-3"><b>Laporan/Rekod Proses</b></h6>
                    <div class="row">
                      <div class="col-md-6">
                        <a class="dropdown-item" href="{{route('senari_semak')}}">Senarai
                          Semak Pencetakan <br> Digital</a>
                      <a class="dropdown-item" href="{{route('senari_semak_cetak')}}">Senarai
                          Semak Pra Cetak</a>
                      <a class="dropdown-item" href="{{route('rekod_serahan_plate')}}">Rekod
                          Serahan Plate Cetak <br> Serta Sample</a>
                      <a class="dropdown-item" href="{{route('laporan_proses_pencetakani')}}">Laporan
                          Proses Pencetakan</a>
                      </div>
                      <div class="col-md-6">
                        <a class="dropdown-item" href="{{route('laporan_proses_lipat')}}">Laporan
                          Proses Lipat</a>
                      <a class="dropdown-item" href="{{route('laporan_proses_penjilidan')}}">Laporan
                          Proses Penjilidan <br> (Perfect Bind)</a>
                      <a class="dropdown-item" href="{{route('laporan_proses_penjilidan_saddle')}}">Laporan
                          Proses Penjilidan <br> (Saddle stitch)</a>
                      <a class="dropdown-item" href="{{route('laporan_proses_three')}}">Laporan
                          Proses 3 Knife</a>
                      </div>
                    </div>


                  </div>
                  <div class="col-sm-5">
                    <h6 class="pl-3 pt-3"><b>Laporan Pemeriksaan
                      Kualiti</b></h6>
                      <div class="row">
                        <div class="col-md-4">
                          <a class="dropdown-item" href="{{route('ctp')}}">CTP</a>
                          <a class="dropdown-item" href="{{route('pod')}}">POD</a>
                          <a class="dropdown-item" href="{{route('plate_cetak')}}">Plate Cetak</a>
                          <a class="dropdown-item" href="{{route('proses_pencetakan')}}">Proses Pencetakan</a>
                          <a class="dropdown-item" href="{{route('laporan_pemeriksaan_kualiti')}}">Proses Lipat</a>
                          <a class="dropdown-item" href="{{route('laporan_pemeriksaan_kualiti_penjilidan')}}">Proses Penjilidan  <br> (Perfect Bind)</a>
                        </div>
                        <div class="col-md-8">
                          <a class="dropdown-item" href="{{route('laporan_pemeriksaan_kualiti_penjilidan_saddle')}}">Prosess Penjilidan  <br> (Saddle Stitch)</a>
                          <a class="dropdown-item" href="{{route('proses_three_knife')}}">Proses Three Knife</a>
                          <a class="dropdown-item" href="{{route('proses_pembungkusan')}}">Proses Pembungkusan</a>
                          <a class="dropdown-item" href="{{route('pengumpulan_gathering')}}">Pengumpulan/ Gathering</a>
                          <a class="dropdown-item" href="{{route('kulit_buku')}}">Pemotongan Kulit Buku/ Teks</a>
                        </div>
                      </div>


                  </div>
                </div>
              </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  Production
                </a>
                <div class="dropdown-menu">
                  <div class="row">
                    <div class="col-sm-6">
                      <h6 class="pl-3 pt-3"><b>Jobsheet</b></h6>
                      <div class="row">
                        <div class="col-md-4">
                          <a class="dropdown-item" href="{{route('digital_printing')}}">Digital Printing</a>
                          <a class="dropdown-item" href="{{route('cover_end_paper')}}">Cover & End Paper</a>
                          <a class="dropdown-item" href="{{route('text')}}">Text</a>
                          <a class="dropdown-item" href="{{route('mesin_lipat')}}">Mesin Lipat</a>
                          <a class="dropdown-item" href="{{route('staple_bind')}}">Staple Bind</a>

                        </div>
                        <div class="col-md-8">
                          <a class="dropdown-item" href="{{route('perfect_bind')}}">Mesin Perfect Bind</a>
                          <a class="dropdown-item" href="{{route('mesin_knife')}}">Mesin 3Knife</a>
                          <a class="dropdown-item" href="{{route('borange_serah_kerja')}}">Borang Serahan Kerja (Kulit Buku /Cover)</a>
                          <a class="dropdown-item" href="{{route('borange_serah_kerja_teks')}}">Borang Serahan Kerja (Teks)</a>
                        </div>
                      </div>

                    </div>
                    <div class="col-sm-3">
                      <h6 class="pl-3 pt-3"><b>Production</b></h6>
                      <a class="dropdown-item" href="{{route('production_scheduling')}}">Production
                        Scheduling</a>
                        <a class="dropdown-item" href="{{route('printing_process')}}">Printing Process</a>
                      <a class="dropdown-item" href="{{route('CallForAssistance')}}">Call for
                        assistance</a>
                    </div>
                    <div class="col-sm-3">
                      <h6 class="pl-3 pt-3"><b>Dashboard</b></h6>
                      <a class="dropdown-item" href="{{route('MachineDashboard')}}"> Machine
                        Dashboard</a>
                      <a class="dropdown-item" href="{{route('ShopFloor')}}">Shopfloor</a>
                      <a class="dropdown-item" href="{{route('OEEDashboard')}}">OEE</a>
                      <a class="dropdown-item" href="{{route('ProductionReport')}}"> Production
                        Report</a>
                    </div>
                  </div>




                </div>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  WMS
                </a>
                <div class="dropdown-menu">
                  <div class="row">
                    <div class="col-sm-6">
                        <h6 class="pl-3 pt-3"><b>Jobsheet</b></h6>
                        <div class="row">
                          <div class="col-md-8">
                            <a class="dropdown-item" href="{{route('good_receiving')}}">Good
                              Receiving</a>
                            <a class="dropdown-item" href="{{route('material_request')}}">Material Request</a>
                            <a class="dropdown-item" href="{{route('manage_transfer')}}">Manage Transfer</a>
                            <a class="dropdown-item" href="{{route('stock_in')}}">Stock In</a>
                            <a class="dropdown-item" href="{{route('stock_transfer')}}">Stock Transfer</a>
                          </div>
                          <div class="col-md-4">
                            <a class="dropdown-item" href="{{route('stock_Transfer_location')}}">Stock Transfer (Location)</a>
                            <a class="dropdown-item" href="{{route('Laporan_Pemeriksaan')}}"> Laporan Pemeriksaan <br> Akhir, Pembungkusan &
                              <br> Penghantaran ke Stor</a>
                            <a class="dropdown-item" href="{{route('Pemeriksaan_Penghantaran')}}">Pemeriksaan Penghantaran</a>
                          </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                      <h6 class="pl-3 pt-3"><b>Dashboard</b></h6>
                      <a class="dropdown-item" href="{{route('invertory_ShopFloor')}}">Inventory Shopfloor</a>
                    </div>
                    <div class="col-sm-3">
                      <h6 class="pl-3 pt-3"><b>Report</b></h6>
                      <a class="dropdown-item" href="{{route('StockCard_report')}}">Stock Card Report</a>
                      <a class="dropdown-item" href="{{route('inventory_report')}}">Inventory Report -  By Location</a>
                      <a class="dropdown-item" href="{{route('Sub_monitring_report')}}">Subcon Monitoring Report</a>
                    </div>
                  </div>
                </div>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  Setting
                </a>
                <div class="dropdown-menu">
                  <div class="row">
                    <div class="col-sm-4">
                      <h6 class="pl-3 pt-3"><b>Administration</b></h6>
                      <a class="dropdown-item" href="#">Roles</a>
                      <a class="dropdown-item" href="{{route('department')}}">Department</a>
                      <a class="dropdown-item" href="{{route('designation')}}">Designation</a>
                      <a class="dropdown-item" href="{{route('user')}}">Users</a>
                    </div>
                    <div class="col-sm-8">
                      <h6 class="pl-3 pt-3"><b>Database</b></h6>
                      <div class="row">
                        <div class="col-md-4">
                          <a class="dropdown-item" href="{{route('product')}}">Product</a>
                          <a class="dropdown-item" href="{{route('uom')}}">UOM</a>
                          <a class="dropdown-item" href="{{route('uom_conversion')}}"> UOM
                            Conversion</a>
                          <a class="dropdown-item" href="{{route('machine')}}">Machine</a>
                        </div>
                        <div class="col-md-4">
                          <a class="dropdown-item" href="{{route('area_level')}}">Area
                            - Level</a>
                          <a class="dropdown-item" href="{{route('area_shelf')}}"> Area
                            - Shelf</a>
                          <a class="dropdown-item" href="{{route('area')}}">Area</a>
                        </div>
                      </div>
                    </div>
                  </div>


                </div>
              </li>

              <li class="nav-item dropdown  abc">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                <img alt="" width="30px" src="{{ asset('assets/img/user.png') }}">
                </a>
                <div class="dropdown-menu">
                  <div class="row">
                    <div class="col-sm-4">

                      <a class="dropdown-item" href="#"><i
                        class="fas fa-user"></i>{{ Auth::user()->full_name }}</a>
                      <a class="dropdown-item" href="#"><i
                        class="fas fa-envelope"></i>{{ Auth::user()->email }}</a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="fas fa-sign-out-alt"></i>
                      Logout</a>
                    </div>
                  </div>


                </div>
              </li>

              <li class="nav-item dropdown  abcd">
                <a class="new nav-link " href="#"><i
                  class="ti-bell animated bell-animations text-white" id="bell"></i><span
                  class="pulse"></span>
                </a>
                <div class="dropdown-menu">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
                        <div class="menu-header-content text-left d-flex">
                          <div class="">
                            <h6 class="menu-header-title text-white mb-0">7 new Notifications</h6>
                          </div>
                          <div class="my-auto ml-auto">
                            <span class="badge badge-pill badge-warning float-right">Mark All
                             Read</span>
                          </div>
                        </div>
                        <div class="main-notification-list Notification-scroll">
                          <a class="d-flex p-3 border-bottom" href="#">
                            <div class="notifyimg bg-success-transparent">
                              <i class="la la-shopping-basket text-success"></i>
                            </div>
                            <div class="ml-3">
                              <h5 class="notification-label mb-1">New Order Received</h5>
                            <div class="notification-subtext">1 hour ago</div>
                            </div>
                            <div class="ml-auto">
                              <i class="las la-angle-right text-right text-muted"></i>
                            </div>
                          </a>
                          <a class="d-flex p-3 border-bottom" href="#">
                            <div class="notifyimg bg-danger-transparent">
                              <i class="la la-user-check text-danger"></i>
                            </div>
                            <div class="ml-3">
                              <h5 class="notification-label mb-1">22 verified registrations</h5>
                            <div class="notification-subtext">2 hour ago</div>
                            </div>
                            <div class="ml-auto">
                              <i class="las la-angle-right text-right text-muted"></i>
                            </div>
                          </a>
                          <a class="d-flex p-3 border-bottom" href="#">
                            <div class="notifyimg bg-primary-transparent">
                              <i class="la la-check-circle text-primary"></i>
                            </div>
                            <div class="ml-3">
                              <h5 class="notification-label mb-1">Project has been approved</h5>
                            <div class="notification-subtext">4 hour ago</div>
                            </div>
                            <div class="ml-auto">
                              <i class="las la-angle-right text-right text-muted"></i>
                            </div>
                          </a>
                          <a class="d-flex p-3 border-bottom" href="#">
                            <div class="notifyimg bg-pink-transparent">
                              <i class="la la-file-alt text-pink"></i>
                            </div>
                            <div class="ml-3">
                              <h5 class="notification-label mb-1">New files available</h5>
                            <div class="notification-subtext">10 hour ago</div>
                            </div>
                            <div class="ml-auto">
                              <i class="las la-angle-right text-right text-muted"></i>
                            </div>
                            </a>
                                            <a class="d-flex p-3 border-bottom" href="#">
                                                <div class="notifyimg bg-warning-transparent">
                                                    <i class="la la-envelope-open text-warning"></i>
                                                </div>
                                                <div class="ml-3">
                                                    <h5 class="notification-label mb-1">New review received</h5>
                                                    <div class="notification-subtext">1 day ago</div>
                                                </div>
                                                <div class="ml-auto">
                                                    <i class="las la-angle-right text-right text-muted"></i>
                                                </div>
                                            </a>
                                            <a class="d-flex p-3" href="#">
                                                <div class="notifyimg bg-purple-transparent">
                                                    <i class="la la-gem text-purple"></i>
                                                </div>
                                                <div class="ml-3">
                                                    <h5 class="notification-label mb-1">Updates Available</h5>
                                                    <div class="notification-subtext">2 days ago</div>
                                                </div>
                                                <div class="ml-auto">
                                                    <i class="las la-angle-right text-right text-muted"></i>
                                                </div>
                                            </a>

                                        <div class="dropdown-footer">
                                            <a href="#">VIEW ALL</a>
                                        </div>
                    </div>
                  </div>


                </div>
              </li>

        </div>
      </nav>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
