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


      @media screen and (max-width:992px) {
        nav{
          display: block !important;
        }
        .navbar-toggler{
          width:80%;
        }
        .navbar-toggler:focus {
            outline: none;
            box-shadow: none;
        }

        .navbar-toggler-icon{
          color:#fff;
          font-size:20px;
          margin-left: 680px;
        }
        .dropdown-item{
          font-size:13px;
        }
      }
     @media screen and (max-width:907px){
      .navbar-toggler{
          width:72%;
        }
        .navbar-toggler-icon{
          margin-left: 550px;
        }
     }

     @media screen and (max-width:808px){
      .navbar-toggler-icon{
        margin-left: 490px;
      }
     }

     @media screen and (max-width:710px){
      .navbar-toggler{
          width:100%;
          margin-top: -30px;
          /* margin-left: 150px; */
        }
      .navbar-toggler-icon{
        margin-left: 420px;
        margin-top: -70px;
      }
      .navbar-toggler-icon{
        margin-left: 370px;
      }
     }

     @media screen and (max-width:610px){
      .navbar-toggler-icon{
        margin-left: 500px;
      }
     }

     @media screen and (max-width:558px){
      .navbar-toggler-icon{
        margin-left: 400px;
      }
     }

     @media screen and (max-width:456px){
      .navbar-toggler-icon{
        margin-left: 350px;
      }
     }

     @media screen and (max-width:406px){
      .navbar-toggler-icon{
        margin-left: 300px;
      }
     }

     @media screen and (max-width:358px){
      .navbar-toggler-icon{
        margin-left: 250px;
      }
     }

     @media screen and (max-width:306px){
      .navbar-toggler-icon{
        margin-left: 200px;
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

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
                          serahan plate cetak <br> serta Sample</a>
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
                            <a class="dropdown-item" href="{{route('Good_Receiving')}}">Good
                              Receiving</a>
                            <a class="dropdown-item" href="{{route('material_request')}}">Material Request</a>
                            <a class="dropdown-item" href="{{route('manage_transfer')}}">Manage Transfer</a>
                            <a class="dropdown-item" href="{{route('Stock_in')}}">Stock In</a>
                            <a class="dropdown-item" href="{{route('Stock_Transfer')}}">Stock Transfer</a>
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
                      <a class="dropdown-item" href="{{route('Invertory_report')}}">Inventory Report -  By Location</a>
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
