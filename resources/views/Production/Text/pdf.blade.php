<!DOCTYPE html>
<html>

<head>
    <!-- style css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">    <title>COVER & ENDPAPER</title>
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
        <div class="row d-flex">
            <div class="col-md-12">
                        <h3 class="float-left"><b>PRODUCTION JOBSHEET- TEXT</b></h3>
                        <p class="float-right">TCSB-B66 (Rev.1)</p>
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
                            <label for="" class="font-weight-bold">Date</label><br>
                            <label >{{ $text->date }}</label>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">By</label><br>
                        <label>{{ Auth::user()->user_name }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="" class="font-weight-bold">Sales Order No.</label><br>
                            <label>{{ $text->sale_order->order_no }}</label>
                        </div>
                    </div>

                </div>

                <div class="row mt-5 mx-2" >
                    <div >
                        <div class="form-group" >
                            <label for="" class="font-weight-bold"> Kod Buku</label><br>
                            <label>
                                {{ $text->sale_order->kod_buku }}
                            </label>
                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">Tajuk</label><br>
                        <label>{{ $text->sale_order->description }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="" class="font-weight-bold">Pelanggan</label><br>
                            <label>{{ $text->sale_order->customer }}</label>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Kuantiti SO</label><br>
                        <label>{{ $text->sale_order->sale_order_qty }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold" style="width:100px!important;">Kuantiti waste</label><br>
                            <label>
                                {{ $text->kuantiti_waste }}
                            </label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="" class="font-weight-bold" style="width:100px!important;">Lebihan Stok</label><br>
                            <label>
                                {{ $text->sale_order->extra_stock }}
                            </label>
                        </div>
                    </div>

                </div>

                <div class="row  mx-2" >
                    <div >
                        <div class="form-group " >
                            <label for="" class="font-weight-bold">Kertas</label><br>
                            <label>{{ $text->kertas }}</label>

                        </div>
                    </div>

                    <div style="margin-left:300px!important;margin-top:-98px !important">

                        <label for="" class="font-weight-bold">Saiz Potong</label><br>
                            <label>{{ $text->saiz_potong }}</label>

                    </div>
                </div>

                <div class="row mt-2 mx-2" style="margin-top:70px!important;">
                    <div >
                        <div class="form-group">
                            <h3><b>Arahan Kerja</b></h3><br>
                            <label>{{ $text->arahan_texteditor }}</label>

                        </div>
                    </div>


                </div>





                <br>
                <h3><b>Status</b></h3>


                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Status</label><br>
                            <label>{{ $text->sale_order->status }}</label>
                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="">Plate</label><br>
                        <label>{{ $text->plate }}</label>

                    </div>
                    <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                        <label for="">Saiz Produk</label><br>
                        <label>{{ $text->sale_order->size }}</label>

                    </div>

                </div>

                <br>
                <h5><b>Text</b></h5>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Print</label><br>
                            <label>{{ $text->print }}</label>
                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="">Waste Paper</label><br>
                        <label>{{ $text->waste_paper }}</label>

                    </div>
                    <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                        <label for="">last Print</label><br>
                        <label>{{ $text->last_print }}</label>

                    </div>

                </div>

                <br>
                <h5><b>Seksyen</b></h5>
                <table border="1" style="width:100% !important;">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Date</th>
                            <th>Machine</th>
                            <th>Side</th>
                            <th>last Print</th>
                            <th>Kuantiti Waste</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $value)
                            <tr>
                                <td>{{ $value->seksyen_no }}</td>
                                <td>{{ $value->date }}</td>
                                <td>{{ $value->machine }}</td>
                                <td>{{ $value->side }}</td>
                                <td>{{ $value->last_print }}</td>
                                <td>{{ $value->kuantiti_waste }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>

                <br>
                <br>
                <br>
                <br>

                <h3><b>Binding</b></h3>

                <table border="1" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>Finishing</th>
                            <th style="text-align: center;">Partner</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" @checked($text->binding_1 != null) name="binding_1"
                                id="Form20" class=" mr-5"> Staple Bind </td>

                            @if($text->binding_1 != null)
                            @if ($text->binding_1 == 'In-house')
                            <td style="text-align: center;">In-house</td>
                           @else
                                 @php
                                  $name = App\Models\Supplier::find($text->binding_1);
                               @endphp
                           <td style="text-align: center;">{{ $name->name}}</td>
                           @endif
                           @else
                           <td></td>
                           @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($text->binding_2 != null) name="binding_2"
                                id="Form20" class=" mr-5"> Perfect Bind </td>


                                @if($text->binding_2 != null)
                                @if ($text->binding_2 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($text->binding_2);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($text->binding_3 != null) name="binding_3"
                                id="Form20" class=" mr-5">Lock Bind</td>


                                @if($text->binding_3 != null)
                                @if ($text->binding_3 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($text->binding_3);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($text->binding_4 != null) name="binding_4"
                                id="Form20" class=" mr-5">Wire O</td>


                                @if($text->binding_4 != null)
                                @if ($text->binding_4 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($text->binding_4);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($text->binding_5 != null) name="binding_5"
                                id="Form20" class=" mr-5">Hard Cover -
                                Square Back</td>


                                @if($text->binding_5 != null)
                                @if ($text->binding_5 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($text->binding_5);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($text->binding_6 != null) name="binding_6"
                                id="Form20" class=" mr-5">Hard Cover -
                                Round Back</td>


                                @if($text->binding_6 != null)
                                @if ($text->binding_6 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($text->binding_6);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                        @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($text->binding_7 != null) name="binding_7"
                                id="Form20" class=" mr-5">Sewing</td>


                                @if($text->binding_7 != null)
                                @if ($text->binding_7 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($text->binding_7);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($text->binding_8 != null) name="binding_8"
                                id="Form20" class=" mr-5">Round corner</td>


                                @if($text->binding_8 != null)
                                @if ($text->binding_8 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($text->binding_8);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($text->binding_9 != null) name="binding_9"
                                id="Form20" class=" mr-5">Others: <label for="" style="margin-left:50px">{{ $text->binding_9 }}</label></td>


                                @if($text->binding_10 != null)
                                @if ($text->binding_10 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($text->binding_10);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                    </tbody>
                </table>

                <br>
                <div class="row mt-2 mx-2" style="margin-top:70px!important;">
                    <div >
                        <div class="form-group">
                            <h3><b>Catatan</b></h3><br>
                            <label>{{ $text->catatan_texteditor }}</label>

                        </div>
                    </div>


                </div>








    </div>
</body>

</html>

