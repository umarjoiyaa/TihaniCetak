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
                        <h5 class="float-left"><b>PRODUCTION JOBSHEET- COVER & ENDPAPER</b></h5>
                        <p class="float-right">TCSB-B62 (Rev.0)</p>
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
                            <label >{{ $cover_end_paper->date }}</label>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">By</label><br>
                        <label>{{ Auth::user()->user_name }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="" class="font-weight-bold"> Operators</label>
                            @php
                                $selectedOperatorIds = json_decode($cover_end_paper->operator);
                            @endphp
                            <label>
                                @if ($selectedOperatorIds)
                                    @foreach ($selectedOperatorIds as $operatorId)
                                        @php
                                            $selectedUser = $users->first(function ($user) use ($operatorId) {
                                                return $user->id == $operatorId;
                                            });
                                        @endphp

                                        @if ($selectedUser)
                                            {{ $selectedUser->user_name }}
                                        @endif
                                    @endforeach
                                @endif
                            </label>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group" >
                            <label for="" class="font-weight-bold">Sales Order No.</label><br>
                            <label>{{ $cover_end_paper->sale_order->order_no }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">Tajuk</label><br>
                        <label>{{ $cover_end_paper->sale_order->description }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="" class="font-weight-bold"> Kod Buku</label><br>
                            <label>
                                {{ $cover_end_paper->sale_order->kod_buku }}
                            </label>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Pelanggan</label><br>
                            <label>{{ $cover_end_paper->sale_order->customer }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">Kuantiti SO</label><br>
                        <label>{{ $cover_end_paper->sale_order->sale_order_qty }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="" class="font-weight-bold" style="width:100px!important;">Kuantiti waste</label><br>
                            <label>
                                {{ $cover_end_paper->kuantiti_waste }}
                            </label>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Jenis</label><br>
                            <label>{{ $cover_end_paper->jenis }}</label>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">Mesin</label><br>
                        <label>{{ $cover_end_paper->mesin }}</label>

                    </div>


                </div>

                <div class="row  mx-2" >
                    <div >
                        <div class="form-group " >
                            <label for="" class="font-weight-bold">Kertas</label><br>
                            <label>{{ $cover_end_paper->kertas }}</label>

                        </div>
                    </div>

                    <div style="margin-left:300px!important;margin-top:-98px !important">

                        <label for="" class="font-weight-bold">Saiz Potong</label><br>
                            <label>{{ $cover_end_paper->saiz_potong }}</label>

                    </div>
                </div>

                <div class="row mt-2 mx-2" style="margin-top:70px!important;">
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Arahan Kerja</label><br>
                            <label>{{ $cover_end_paper->arahan_texteditor }}</label>

                        </div>
                    </div>


                </div>



                <br>
                <h5><b>Print Detail</b></h5>

                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <div class="row">
                                <div>
                                <div class="col-md-1"><input disabled type="checkbox" name="text_front" id=""
                                        @checked($cover_end_paper->front != null)></div>
                                <div class="col-md-2" class="font-weight-bold">Front</div>
                            </div>
                            <div style="margin-left: 70px!important;margin-top:-55px !important">
                                <div class="col-md-1"><input disabled type="checkbox" name="text_back" id=""
                                        @checked($cover_end_paper->back != null)></div>
                                <div class="col-md-2" class="font-weight-bold">back</div>
                            </div>
                            </div>

                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">Print</label><br>
                        <label>{{ $cover_end_paper->print }}</label>

                    </div>
                    <div >
                        <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                            <label for="" class="font-weight-bold">Waste Paper</label><br>
                            <label>
                                {{ $cover_end_paper->waste_paper }}
                            </label>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-2" style="margin-bottom: 40px !important;">
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Print Cut</label><br>
                            <label>{{ $cover_end_paper->print_cut }}</label>
                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="" class="font-weight-bold">last Print</label><br>
                            <label>{{ $cover_end_paper->last_print }}</label>
                    </div>
                    <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                        @if ($cover_end_paper->print_cut == 'OTHERS')
                                <label>{{ $cover_end_paper->print_cut_others }}</label>
                            @endif
                    </div>
                </div>

                <br>
                <h5><b>Status</b></h5>


                <div class="row mt-2 mx-2" >
                    <div >
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Status</label><br>
                            <label>{{ $cover_end_paper->sale_order->status }}</label>
                        </div>
                    </div>
                    <div style="margin-left:300px!important;margin-top:-98px !important">
                        <label for="">Plate</label><br>
                        <label>{{ $cover_end_paper->plate }}</label>

                    </div>
                    <div class="form-group" style="margin-left:600px!important;margin-top:-66px !important">
                        <label for="">Saiz Produk</label><br>
                        <label>{{ $cover_end_paper->sale_order->size }}</label>

                    </div>

                </div>


                <br>
                <br>
                <br>
                <br>

                <h5><b>Finishing</b></h5>

                <table border="1" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th >Finishing</th>
                            <th style="text-align: center;">Partner</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_1 != null) name="finishing_1"
                                id="Form20" class=" mr-5">UV+Texture
                                Emboss   <label for="" style="margin-left:50px;">{{ $cover_end_paper->finishing_input_1 }}</label></td>

                            @if($cover_end_paper->finishing_supplier_1 != null)
                            @if ($cover_end_paper->finishing_supplier_1 == 'In-house')
                            <td style="text-align: center;">In-house</td>
                           @else
                                 @php
                                  $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_1);
                               @endphp
                           <td style="text-align: center;">{{ $name->name}}</td>
                           @endif
                           @else
                           <td></td>
                           @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_2 != null) name="finishing_2"
                                id="Form20" class=" mr-5">Gloss
                                Lamination</td>


                                @if($cover_end_paper->finishing_supplier_2 != null)
                                @if ($cover_end_paper->finishing_supplier_2 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_2);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_3 != null) name="finishing_3"
                                id="Form20" class=" mr-5">Matt
                                Lamination</td>


                                @if($cover_end_paper->finishing_supplier_3 != null)
                                @if ($cover_end_paper->finishing_supplier_3 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_3);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_4 != null) name="finishing_4"
                                id="Form20" class=" mr-5">Spot
                                UV </td>


                                @if($cover_end_paper->finishing_supplier_4 != null)
                                @if ($cover_end_paper->finishing_supplier_4 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_4);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_5 != null) name="finishing_5"
                                id="Form20" class=" mr-5">Spot
                                Miraval</td>


                                @if($cover_end_paper->finishing_supplier_5 != null)
                                @if ($cover_end_paper->finishing_supplier_5 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_5);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_6 != null) name="finishing_6"
                                id="Form20" class=" mr-5">Hot
                                Stamping  <label for="" style="margin-left:50px;">{{ $cover_end_paper->finishing_input_2 }}</label></td>


                                @if($cover_end_paper->finishing_supplier_6 != null)
                                @if ($cover_end_paper->finishing_supplier_6 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_6);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                        @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_7 != null) name="finishing_7"
                                id="Form20" class=" mr-5">Emboss</td>


                                @if($cover_end_paper->finishing_supplier_7 != null)
                                @if ($cover_end_paper->finishing_supplier_7 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_7);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_8 != null) name="finishing_8"
                                id="Form20" class=" mr-5">Deboss</td>


                                @if($cover_end_paper->finishing_supplier_8 != null)
                                @if ($cover_end_paper->finishing_supplier_8 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_8);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_9 != null) name="finishing_9"
                                id="Form20" class=" mr-5">UV
                                Vanish</td>


                                @if($cover_end_paper->finishing_supplier_9 != null)
                                @if ($cover_end_paper->finishing_supplier_9 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_9);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_10 != null) name="finishing_10"
                                id="Form20" class=" mr-5">Spot
                                corse UV  </td>



                                @if($cover_end_paper->finishing_supplier_10 != null)
                                @if ($cover_end_paper->finishing_supplier_10 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_10);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_11 != null) name="finishing_11"
                                id="Form20" class=" mr-5">Creasing
                                line  </td>



                                @if($cover_end_paper->finishing_supplier_11 != null)
                                @if ($cover_end_paper->finishing_supplier_11 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_11);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_12 != null) name="finishing_12"
                                id="Form22" class=" mr-5">Die
                                Cut  </td>



                                @if($cover_end_paper->finishing_supplier_12 != null)
                                @if ($cover_end_paper->finishing_supplier_12 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_12);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_13 != null) name="finishing_13"
                                id="Form20" class=" mr-5">Perforation </td>



                                @if($cover_end_paper->finishing_supplier_13 != null)
                                @if ($cover_end_paper->finishing_supplier_13 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_13);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_14 != null) name="finishing_14"
                                id="Form20" class=" mr-5">Numbering</td>



                                @if($cover_end_paper->finishing_supplier_14 != null)
                                @if ($cover_end_paper->finishing_supplier_14 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_14);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_15 != null) name="finishing_15"
                                id="Form20" class=" mr-5">Punch
                                Hole  </td>



                                @if($cover_end_paper->finishing_supplier_15 != null)
                                @if ($cover_end_paper->finishing_supplier_15 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_15);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_16 != null) name="finishing_16"
                                id="Form20" class=" mr-5">Round
                                Corner  </td>



                                @if($cover_end_paper->finishing_supplier_16 != null)
                                @if ($cover_end_paper->finishing_supplier_16 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_16);
                                   @endphp
                               <td style="text-align: center;">{{ $name->name}}</td>
                               @endif
                               @else
                               <td></td>
                               @endif
                        </tr>
                        <tr>
                            <td><input type="checkbox" @checked($cover_end_paper->finishing_17 != null) name="finishing_17"
                                id="Form20" class=" mr-5">Others:  <label for="" style="margin-left: 50px">{{ $cover_end_paper->finishing_input_3 }}</label>  </td>



                                @if($cover_end_paper->finishing_supplier_17 != null)
                                @if ($cover_end_paper->finishing_supplier_17 == 'In-house')
                                <td style="text-align: center;">In-house</td>
                               @else
                                     @php
                                      $name = App\Models\Supplier::find($cover_end_paper->finishing_supplier_17);
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
                            <label for="" class="font-weight-bold">Catatan</label><br>
                            <label>{{ $cover_end_paper->catatan_texteditor }}</label>

                        </div>
                    </div>


                </div>
                <br>



                <br>
                <h5><b>Jobsheet Details</b></h5>

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

                <h5><b>Production Machine Detail</b></h5>

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
                <h5><b>Verified By</b></h5>

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
                            <td>{{ $cover_end_paper->verified_by_date }}
                            </td>
                            <td>{{ $cover_end_paper->verified_by_user }}
                            </td>
                            <td>{{ $cover_end_paper->verified_by_designation }}
                            </td>
                            <td>{{ $cover_end_paper->verified_by_department }}
                            </td>
                        </tr>
                    </tbody>
                </table>








    </div>
</body>

</html>
