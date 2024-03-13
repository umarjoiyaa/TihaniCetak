<!DOCTYPE html>
<html>

<head>
    <!-- style css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">    <title>DIGITAL PRINTING</title>
    <style>
        label{
            max-width:300px !important;
        }
        .customize td {
            font-size: 13px;
        }
    </style>
</head>

<body>
        <div class="row">
            <div class="col-md-12">
                <h5 class="float-left"><b>PRODUCTION JOBSHEET- DIGITAL PRINTING</b></h5>
                <p class="float-right">TCBS-B66 (Rev.1)</p>
            </div>
        </div>

            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="text-center" style="font-size:80px; color:red; dispaly:inline-block;">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-1">
                                <i class="fe fe-alert-triangle"></i>
                            </div>
                            <div class="col-md-6">
                                <h5 style="font-size:35px;">AMARAN : <br>
                                    <span style="color:black;">
                                        TIADA SAMPLE JANGAN CETAK <br>
                                        FIRST PIECE JANGAN LUPA
                                    </span>
                                </h5>
                            </div>

                            <div class="col-md-1">
                                <i class="fe fe-alert-triangle"></i>
                            </div>
                            <div class="col-md-1"></div>
                        </div>


                    </div>
                </div>
            </div> --}}

        {{-- <div class="card" style="background:#f4f4ff;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5><b>Production Button</b></h5>
                    </div>
                    <div class="col-md-4 ">
                        <button id="play" type="button" class="btn btn-light w-100"
                            style="border:1px solid black;"><i class="la la-play"
                                style="font-size:20px;"></i>Start</button>
                    </div>
                    <div class="col-md-4">
                        <button id="pause" type="button" class="btn btn-light w-100"
                            style="border:1px solid black;"><i class="la la-pause"
                                style="font-size:20px;"></i>Pause</button>
                    </div>
                    <div class="col-md-4  ">
                        <div class="box">
                            <button id="stop" type="button" class="btn btn-light w-100"
                                style="border:1px solid black;"><i class="la la-stop-circle"
                                    style="font-size:20px;"></i>Stop</button>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div id="msg" class="col-12 text-center"></div>
                </div>
            </div>
        </div> --}}


                <div class="row mt-5 mx-2" >
                    <div>
                            <label for="" class="font-weight-bold">Tarikh</label><br>
                            <label >{{ $mesin_lipat->date }}</label>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">By</label><br>
                        <label>{{ $mesin_lipat->user->full_name }}</label>

                    </div>
                    <div >

                    </div>

                </div>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group" >
                            <label for="" class="font-weight-bold">Sales Order No.</label><br>
                            <label>{{ $mesin_lipat->sale_order->order_no }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">Tajuk</label><br>
                        <label>{{ $mesin_lipat->sale_order->description }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="" class="font-weight-bold"> Kod Buku</label><br>
                            <label>
                                {{ $mesin_lipat->sale_order->kod_buku }}
                            </label>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Pelanggan</label><br>
                            <label>{{ $mesin_lipat->sale_order->customer }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold" style="width:100px!important;">Kuantiti SO</label><br>
                            <label>
                                {{ $mesin_lipat->sale_order->sale_order_qty }}
                            </label>


                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="" class="font-weight-bold">Saiz Produk</label><br>
                            <label>{{ $mesin_lipat->sale_order->size }}</label>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Jumlah mukasurat</label><br>
                            <label>{{ $mesin_lipat->jenis_lipatan }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">Kuantiti Waste</label><br>
                        <label>{{ $mesin_lipat->mesin }}</label>

                    </div>
                  

                </div>

                <div class="row  mx-2" >
                    <div >
                        <div class="form-group " >
                            <label for="" class="font-weight-bold">Mesin</label><br>
                            <label>{{ $mesin_lipat->mesin }}</label>

                        </div>
                    </div>

                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        @if ($mesin_lipat->mesin == 'OTHERS')
                                <label for="newInput" class="font-weight-bold">Lain-lain mesin (Sila
                                        nyatakan)</label>
                                <label>{{ $mesin_lipat->mesin_others }}</label>
                            @endif

                    </div>
                </div>

                <div class="row mt-2 mx-2" style="margin-top:70px!important;">
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Kategori job</label><br>
                            <label>{{ $mesin_lipat->kategori_job }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">Jenis produk</label><br>
                        <label>{{ $mesin_lipat->jenis_produk }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            @if ($mesin_lipat->jenis_produk == 'OTHERS')
                                <label for="newInput" class="font-weight-bold">Other (please state)</label>
                                <span>{{ $mesin_lipat->jenis_produk_others }}</span>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Kertas: teks</label><br>
                            <label>{{ $mesin_lipat->kertas_teks }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">Kertas: Cover</label><br>
                        <label>{{ $mesin_lipat->kertas_cover }}</label>

                    </div>

                </div>
                <br>
                <h3><b>Jobsheet Details</b></h3>

                <table border="1" class="customize" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>Start datetime</th>
                            <th>End datetime</th>
                            <th>Total Time(min)</th>
                            <th>Machine</th>
                            <th>Remarks</th>
                            <th>Operator</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->start_time }}</td>
                            <td>{{ $detail->end_time }}</td>
                            <td>{{ $detail->duration }}</td>
                            <td>
                                {{ $detail->machine }}
                            </td>
                            <td>{{ $detail->remarks }}</td>
                            <td class="operator_text"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <br>

                <h3><b>Production Machine Detail</b></h3>

                <table border="1" class="customize" style="width:100% !important;" >
                    <thead>
                        <tr>
                        <th>Process</th>
                        <th>Machine</th>
                        <th>Start datetime</th>
                        <th>End datetime</th>
                        <th>Total time</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                                    <tr>
                                        <td style="text-align: center;">
                                            @if ($detail->status == 1)
                                                <span class="badge badge-success " style="margin-top: 2px">Started</span>
                                            @elseif ($detail->status == 2)
                                                <span class="badge badge-warning " style="margin-top: 2px">Paused</span>
                                            @elseif ($detail->status == 3)
                                                <span class="badge badge-danger " style="margin-top: 2px">Stopped</span>
                                            @else
                                                <span class="badge badge-info " style="margin-top: 2px">Not-initiated</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $detail->machine }}
                                        </td>
                                        <td>{{ $detail->start_time }}</td>
                                        <td>{{ $detail->end_time }}</td>
                                        <td>{{ $detail->duration }}</td>
                                    </tr>
                                @endforeach
                    </tbody>
                </table>

                            <br>
                            <h4>Total Output Details</h4>

                                <table border="1" style="width:100% !important;" >
                                    <thead>
                                        <tr>
                                            <th>Good Count</th>
                                            <th>Rejection</th>
                                            <th>Total Produce</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="total_good_count"></td>
                                            <td class="total_rejection"></td>
                                            <td class="total_total_produce"></td>
                                        </tr>
                                    </tbody>
                                </table>





                <br>
                <h3><b>Verified By</b></h3>

                <table border="1" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Username</th>
                            <th>Desgination</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $mesin_lipat->verified_by_date }}
                            </td>
                            <td>{{ $mesin_lipat->verified_by_user }}
                            </td>
                            <td>{{ $mesin_lipat->verified_by_designation }}
                            </td>
                            <td>{{ $mesin_lipat->verified_by_department }}
                            </td>
                        </tr>
                    </tbody>
                </table>








    </div>
</body>

</html>
