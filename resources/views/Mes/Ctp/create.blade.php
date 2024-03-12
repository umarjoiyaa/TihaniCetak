@extends('layouts.app')

@section('content')

    <form action="{{ route('ctp.store') }}" method="POST">
        @csrf
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>LAPORAN PEMERIKSAAN KUALITI - CTP</b></h5>
                            <p class="float-right">TCBS-B23 (Rev.5)</p>
                        </div>
                    </div>


                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="text" name="date" value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Time</label>
                                    <input name="time" type="time" id="Currenttime"
                                    value="{{ Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('H:i') }}"
                                    class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Disemak Oleh</div>
                                        <input type="text" value="{{ Auth::user()->user_name }}" readonly
                                        class="form-control" name="" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select name="sale_order" id="sale_order" class="form-control">
                                            @if (old('sale_order') != null)
                                                    @php
                                                        $name = App\Models\SaleOrder::find(old('sale_order'));
                                                    @endphp
                                                    <option value="{{ old('sale_order') }}" selected
                                                        style="color: black; !important">
                                                        {{ $name->order_no }}</option>
                                                @else
                                                    <option value="" selected disabled>Select any Sale Order
                                                    </option>
                                                @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text" readonly  class="form-control" id="tajuk">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text"  readonly name="" id="kod_buku"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-5">
                                <div class="col-md-5">
                                    <h6><b>File Artwork</b></h6>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">kriteria</th>
                                                <th colspan="3">Tanda bagi Yang bekenaan</th>

                                            </tr>
                                            <tr>
                                                <th>OK</th>
                                                <th>NG</th>
                                                <th>NA</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>Format file</td>
                                                <td><input type="checkbox" class="Cover1" {{ old('file_artwork_1') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover1',this)" name="file_artwork_1" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover1" {{ old('file_artwork_1') == 'ng' ? 'checked' : '' }} @if (old('file_artwork_1')) @else checked @endif onchange="handleCheckboxChange('Cover1',this)"  name="file_artwork_1" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover1" {{ old('file_artwork_1') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover1',this)" name="file_artwork_1" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Saiz Produk</td>
                                                <td><input type="checkbox" class="Text1" {{ old('file_artwork_2') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Text1',this)" name="file_artwork_2" value="ok"  id=""></td>
                                                <td><input type="checkbox" class="Text1" {{ old('file_artwork_2') == 'ng' ? 'checked' : '' }} @if (old('file_artwork_2')) @else checked @endif onchange="handleCheckboxChange('Text1',this)"  name="file_artwork_2" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text1" {{ old('file_artwork_2') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Text1',this)" name="file_artwork_2" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Bleed</td>
                                                <td><input type="checkbox" class="Cover2" {{ old('file_artwork_3') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover2',this)" name="file_artwork_3" value="ok"id=""></td>
                                                <td><input type="checkbox" class="Cover2" {{ old('file_artwork_3') == 'ng' ? 'checked' : '' }} @if (old('file_artwork_3')) @else checked @endif onchange="handleCheckboxChange('Cover2',this)"  name="file_artwork_3" value="ng"id=""></td>
                                                <td><input type="checkbox" class="Cover2" {{ old('file_artwork_3') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover2',this)" name="file_artwork_3" value="na"id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Saiz Spine</td>
                                                <td><input type="checkbox" class="Text2" {{ old('file_artwork_4') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Text2',this)" name="file_artwork_4" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text2" {{ old('file_artwork_4') == 'ng' ? 'checked' : '' }} @if (old('file_artwork_4')) @else checked @endif onchange="handleCheckboxChange('Text2',this)"  name="file_artwork_4" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text2" {{ old('file_artwork_4') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Text2',this)" name="file_artwork_4" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat pencetak</td>
                                                <td><input type="checkbox" class="Cover3" {{ old('file_artwork_5') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover3',this)" name="file_artwork_5" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover3" {{ old('file_artwork_5') == 'ng' ? 'checked' : '' }} @if (old('file_artwork_5')) @else checked @endif onchange="handleCheckboxChange('Cover3',this)"  name="file_artwork_5" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover3" {{ old('file_artwork_5') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover3',this)" name="file_artwork_5" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah muka surat</td>
                                                <td><input type="checkbox" class="Text3" {{ old('file_artwork_6') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Text3',this)" name="file_artwork_6" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text3" {{ old('file_artwork_6') == 'ng' ? 'checked' : '' }} @if (old('file_artwork_6')) @else checked @endif onchange="handleCheckboxChange('Text3',this)"  name="file_artwork_6" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text3" {{ old('file_artwork_6') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Text3',this)" name="file_artwork_6" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Turutan muka surat</td>
                                                <td><input type="checkbox" class="Cover4" {{ old('file_artwork_7') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover4',this)" name="file_artwork_7" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover4" {{ old('file_artwork_7') == 'ng' ? 'checked' : '' }}  @if (old('file_artwork_7')) @else checked @endif onchange="handleCheckboxChange('Cover4',this)"  name="file_artwork_7" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover4" {{ old('file_artwork_7') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover4',this)" name="file_artwork_7" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Kedudukan Artwork Cover (hardcover)</td>
                                                <td><input type="checkbox" class="Text4" {{ old('file_artwork_8') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Text4',this)" name="file_artwork_8" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text4" {{ old('file_artwork_8') == 'ng' ? 'checked' : '' }} @if (old('file_artwork_8')) @else checked @endif  onchange="handleCheckboxChange('Text4',this)"  name="file_artwork_8" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text4" {{ old('file_artwork_8') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Text4',this)" name="file_artwork_8" value="na" id=""></td>

                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-5">
                                    <h6><b>Imposition</b></h6>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">kriteria</th>
                                                <th colspan="3">Tanda bagi Yang bekenaan</th>

                                            </tr>
                                            <tr>
                                                <th>OK</th>
                                                <th>NG</th>
                                                <th>NA</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>Front and Back imposition</td>
                                                <td><input type="checkbox" class="Cover5" {{ old('impositions_1') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover5',this)" name="impositions_1" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover5" {{ old('impositions_1') == 'ng' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover5',this)"@if (old('impositions_1')) @else checked @endif name="impositions_1" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover5" {{ old('impositions_1') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover5',this)" name="impositions_1" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Kedudukan imposition</td>
                                                <td><input type="checkbox" class="Text5" {{ old('impositions_2') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Text5',this)" name="impositions_2" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text5" {{ old('impositions_2') == 'ng' ? 'checked' : '' }} onchange="handleCheckboxChange('Text5',this)"@if (old('impositions_2')) @else checked @endif name="impositions_2" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text5" {{ old('impositions_2') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Text5',this)" name="impositions_2" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Saiz spacing</td>
                                                <td><input type="checkbox" class="Cover6" {{ old('impositions_3') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover6',this)" name="impositions_3" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover6" {{ old('impositions_3') == 'ng' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover6',this)"@if (old('impositions_3')) @else checked @endif name="impositions_3" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover6" {{ old('impositions_3') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover6',this)" name="impositions_3" value="na" id=""></td>
                                            </tr>
                                            <tr> {{ old('file_artwork_8') == 'na' ? 'checked' : '' }}
                                                <td>Printing method (Straight @ Perfecting)</td>
                                                <td><input type="checkbox" class="Text6" {{ old('impositions_4') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Text6',this)" name="impositions_4" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text6" {{ old('impositions_4') == 'ng' ? 'checked' : '' }} onchange="handleCheckboxChange('Text6',this)"@if (old('impositions_4')) @else checked @endif name="impositions_4" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text6" {{ old('impositions_4') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Text6',this)" name="impositions_4" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Up</td>
                                                <td><input type="checkbox" class="Cover7" {{ old('impositions_5') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover7',this)" name="impositions_5" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover7" {{ old('impositions_5') == 'ng' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover7',this)"@if (old('impositions_5')) @else checked @endif name="impositions_5" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover7" {{ old('impositions_5') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover7',this)" name="impositions_5" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Dummy Lipat</td>
                                                <td><input type="checkbox" class="Text7" {{ old('impositions_6') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Text7',this)" name="impositions_6" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text7" {{ old('impositions_6') == 'ng' ? 'checked' : '' }} onchange="handleCheckboxChange('Text7',this)"@if (old('impositions_6')) @else checked @endif name="impositions_6" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text7" {{ old('impositions_6') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Text7',this)" name="impositions_6" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Penjilidan </td>
                                                <td><input type="checkbox" class="Cover8" {{ old('impositions_7') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover8',this)" name="impositions_7" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover8" {{ old('impositions_7') == 'ng' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover8',this)"@if (old('impositions_7')) @else checked @endif name="impositions_7" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover8" {{ old('impositions_7') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover8',this)" name="impositions_7" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kertas</td>
                                                <td><input type="checkbox" class="Text8" {{ old('impositions_8') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Text8',this)" name="impositions_8" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text8" {{ old('impositions_8') == 'ng' ? 'checked' : '' }} onchange="handleCheckboxChange('Text8',this)"@if (old('impositions_8')) @else checked @endif name="impositions_8" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text8" {{ old('impositions_8') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Text8',this)" name="impositions_8" value="na" id=""></td>

                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2">
                                    <p type="button" class="float-right" style="color:blue;"  data-toggle="modal" data-target="#exampleModal" style="border:none;"><b>RUJUKAN</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <a href="{{route('ctp')}}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" >
      <div class="modal-header">
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th colspan="2">TIHANI CETAKSDN BHD</th>
                <th rowspan="2">No.Rujukan</th>
                <th rowspan="2">TCSB-AK49</th>
            </tr>
            <tr>
                <th colspan="2">ARAHAN KERJA</th>
            </tr>
            <tr>
                <td>JABATAN </td>
                <td>OPERASI - PRA CETAK</td>
                <td>Edisi</td>
                <td>6</td>
            </tr>
            <tr>
                <td>TAJUK</td>
                <td>RUJUKAN SAIZ SPACING MENGIKUT SAIZ KERTAS CETAX</td>
                <td>Mukasurat</td>
                <td>1 - 1</td>
            </tr>
        </table>
        </div>
      </div>
      <div class="modal-body">
       <div class="table-responsive">
         <table class="table table-bordered">
            <thead>
                <tr>
                    <th rowspan="2">NO</th>
                    <th colspan="2">SAIZ BUKU</th>
                    <th colspan="2">SAIZ KERTAS CETAX</th>
                    <th colspan="2">CARA CETAKAN</th>
                </tr>
                <tr>
                    <th>Millimeter (mm)</th>
                    <th>Inci</th>
                    <th>Millimeter (mm)</th>
                    <th>Inci</th>
                    <th>Straight (P3 & P4)</th>
                    <th>Perfecting (P1)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="2">1</td>
                    <td rowspan="2"><span>210mm<sup>m</sup>x297mm<sup>m</sup></span></td>
                    <td rowspan="2">8.28x11.69</td>
                    <td>635mmX902mm</td>
                    <td>25<sup>m</sup>x35.5<sup>m</sup></td>
                    <td rowspan="2">8mm</td>
                    <td rowspan="2">8mm</td>
                </tr>
                <tr>
                    <td>635mmx876mm</td>
                    <td>25<sup>m</sup>x34.5<sup>m</sup></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>140mmx210mm</td>
                    <td>5.51<sup>m</sup>x 8.28<sup>m</sup></td>
                    <td>635mmx902mm</td>
                    <td>25<sup>m</sup>x35.5<sup>m</sup></td>
                    <td>10mm</td>
                    <td>10mm</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>148mmx210mm</td>
                    <td>5.82<sup>m</sup>8.28<sup>m</sup></td>
                    <td>635mmx902mm</td>
                    <td>25<sup>m</sup>x35.4<sup>m</sup></td>
                    <td>10mm</td>
                    <td>10mm</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>190mmx260mm</td>
                    <td>7.48<sup>m</sup>10.24<sup>m</sup></td>
                    <td>787mmx1092mm <br> (cut 2.787mmx546)</td>
                    <td>31<sup>m</sup>x43<sup>m</sup>(cut 2.31<sup>m</sup> x 21.5<sup>m</sup>)</td>
                    <td>10mm</td>
                    <td>4mm</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>190.5mmx254mm</td>
                    <td>7.48<sup>m</sup>x10<sup>m</sup></td>
                    <td>787mmx1092mm <br> (cut 2.787mmx546)</td>
                    <td>31<sup>m</sup>x43<sup>m</sup>(cut 2.31<sup>m</sup> x 21.5<sup>m</sup>)</td>
                    <td>10mm</td>
                    <td>10mm</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>100mmx152mm</td>
                    <td>3.94<sup>m</sup>x5.98<sup>m</sup></td>
                    <td>635mmx902mm</td>
                    <td>25<sup>m</sup>35.5<sup>m</sup></td>
                    <td>10mm</td>
                    <td>10mm</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>150mmx230mm</td>
                    <td>5.9<sup>m</sup>x 9<sup>m</sup></td>
                    <td>635mmx940mm</td>
                    <td>25<sup>m</sup>x37<sup>m</sup></td>
                    <td style="background:#b57502;">5mm <br> (P3 Sahaja)</td>
                    <td>5mm</td>
                </tr>
                <tr>
                    <td rowspan="2">8</td>
                    <td rowspan="2"><span>165mmx210mm</span></td>
                    <td rowspan="2">6.5<sup>m</sup>x8.28<sup>m</sup></td>
                    <td>711mmx1016mm</td>
                    <td>28<sup>m</sup>x40<sup>m</sup></td>
                    <td style="background:#b57502;">10mm <br> (P3 Sahaja)</td>
                    <td>10mm</td>
                </tr>
                <tr>
                    <td>787mmx1092mm</td>
                    <td>31<sup>m</sup>x43<sup>m</sup></td>
                     <td style="background:#b57502;">10mm <br> (P3 Sahaja)</td>
                    <td>10mm</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>198.12mmx198.12mm</td>
                    <td>7.8<sup>m</sup>x7.8<sup>m</sup></td>
                    <td>635mmx902mm</td>
                    <td>25<sup>m</sup>x35.5<sup>m</sup></td>
                    <td>4mm</td>
                    <td style="background:red; color:#fff;">Tidak Boleh dicetak</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>105mmx148mm</td>
                    <td>4.13<sup>m</sup>x5.83<sup>m</sup></td>
                    <td>635mmx902mm</td>
                    <td>25<sup>m</sup>x35.5<sup>m</sup></td>
                    <td>10mm</td>
                    <td>5mm</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>139.7mm215.9mm</td>
                    <td>5.5<sup>m</sup>x8.5<sup>m</sup></td>
                    <td>635mmx902mm</td>
                    <td>25<sup>m</sup>x35.5<sup>m</sup></td>
                    <td>8mm</td>
                    <td>8mm</td>
                </tr>
                <tr>
                    <td rowspan="2">12</td>
                    <td rowspan="2"><span>165mmx240mm</span></td>
                    <td rowspan="2">6.5<sup>m</sup>x9.45<sup>m</sup></td>
                    <td>711mmx1092mm</td>
                    <td>28<sup>m</sup>x40<sup>m</sup></td>
                    <td rowspan="2" style="background:#b57502;">6mm <br> (P3 Sahaja)</td>
                    <td rowspan="2">6mm</td>
                </tr>
                <tr>
                    <td>787mmx1016mm</td>
                    <td>31x43</td>
                </tr>
                <tr>
                    <td rowspan="2">13</td>
                    <td rowspan="2"><span>171.5mmx241.3mm</span></td>
                    <td rowspan="2">6.75<sup>m</sup>x9.5<sup>m</sup></td>
                    <td>787mmx1016mm</td>
                    <td>31<sup>m</sup>x40<sup>m</sup></td>
                    <td rowspan="2" style="background:#b57502;">3mm (P3 Sahaja)</td>
                    <td rowspan="2">3mm</td>
                </tr>
                <tr>
                    <td>787mmx1092mm</td>
                    <td>31<sup>m</sup>x43<sup>m</sup></td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>130mmx200mm</td>
                    <td>5.1<sup>m</sup>7.87<sup>m</sup></td>
                    <td>635mmx902mm</td>
                    <td>25<sup>m</sup>x35.5<sup>m</sup></td>
                    <td>10mm</td>
                    <td>10mm</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>152.4mmx228.6mm</td>
                    <td>6<sup>m</sup>x 9<sup>m</sup></td>
                    <td>635mmx940mm</td>
                    <td>25<sup>m</sup>x37<sup>m</sup></td>
                    <td style="background:#b57502;">5mm <br> (P3 Sahaja)</td>
                    <td>5mm</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>125mmx176mm</td>
                    <td>4.92 <sup>m</sup>x6.93 <sup>m</sup></td>
                    <td>787mmx1092mm <br> (cut 2.787mm x )</td>
                    <td>31<sup>m</sup>x43<sup>m</sup>(cut 2.31<sup>m</sup> x 21.5<sup>m</sup>)</td>
                    <td>10mm</td>
                    <td>10mm</td>
                </tr>
                <tr>
                    <td rowspan="2">17</td>
                    <td rowspan="2">165.1mmx234.95mm</td>
                    <td rowspan="2">6.69 <sup>m</sup>x 9.25 <sup>m</sup></td>
                    <td>711mmx1016mm </td>
                    <td>28<sup>m</sup>x40<sup>m</sup></td>
                    <td rowspan="2" style="background:#b57502;">6mm (P3 Sahaja)</td>
                    <td rowspan="2">6mm</td>
                </tr>
                <tr>
                    <td>787mmx1092mm</td>
                    <td>31<sup>m</sup>x43<sup>m</sup></td>
                </tr>
                <tr>
                    <td rowspan="2">18</td>
                    <td rowspan="2">170mmx235mm</td>
                    <td rowspan="2">6.69 <sup>m</sup>x 9.25 <sup>m</sup></td>
                    <td>711mmx1016mm </td>
                    <td>28<sup>m</sup>x40<sup>m</sup></td>
                    <td rowspan="2">6mm</td>
                    <td rowspan="2" style="background:red; color:#fff;">Tidak Boleh dicetak</td>
                </tr>
                <tr>
                    <td>787mmx1092mm</td>
                    <td>31<sup>m</sup>x43<sup>m</sup></td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>127mmx190.5mm</td>
                    <td>5 <sup>m</sup>x 7.5 <sup>m</sup></td>
                    <td>787mmx1092mm <br> (cut 2.787mm x 546mm)</td>
                    <td>31<sup>m</sup>x43<sup>m</sup> (cut 2.787<sup>m</sup> x 21.5<sup>m</sup>)</td>
                    <td>6mm</td>
                    <td>6mm</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>615mmx215.9mm</td>
                    <td>6.5 <sup>m</sup>x 8.5 <sup>m</sup></td>
                    <td>635mmx902mm</td>
                    <td>25<sup>m</sup>x37<sup>m</sup></td>
                    <td style="background:#b57502;">6mm <br> (P3 Sahaja)</td>
                    <td>6mm</td>
                </tr>
                <tr>
                    <td>21</td>
                    <td>145mmx210mm</td>
                    <td>5.7 <sup>m</sup>x 8.27 <sup>m</sup></td>
                    <td>635mmx902mm</td>
                    <td>25<sup>m</sup>x35.5<sup>m</sup></td>
                    <td>10mm</td>
                    <td>10mm</td>
                </tr>
                <tr>
                    <td rowspan="2">22</td>
                    <td rowspan="2"><span>145mmx210mm</span></td>
                    <td rowspan="2">6.5 <sup>m</sup>x 9 <sup>m</sup></td>
                    <td>711mmx1016mm</td>
                    <td>28 <sup>m</sup>x 40<sup>m</sup></td>
                    <td rowspan="2" style="background:#b57502;">6mm <br> (P3 Sahaja)</td>
                    <td rowspan="2">6mm</td>
                </tr>
                <tr>
                    <td>787mmx1092mm</td>
                    <td>31<sup>m</sup>x43<sup>m</sup></td>
                </tr>
            </tbody>
        </table>
       </div>
        <div class="row">
            <div class="col-md-1"><h6>Nota :</h6></div>
            <div class="col-md-1"><div class="box" style="width:50px; background:#b57502; height:30px;"></div></div>
            <div class="col-md-10">Hanya boleh dicetak di mesin P3 Sahaja. Tidak boleh dicetak di mesin P4</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



@endsection
@push('custom-scripts')
<script>
     function handleCheckboxChange(className, checkbox) {
            if ($(checkbox).prop('checked')) {
              $(`.${ className }`).not(checkbox).prop('checked', false);
            }
        }

        $(document).ready(function() {
            $('#sale_order').trigger('change');
            $('#sale_order').select2({
                ajax: {
                    url: '{{ route('sale_order.get') }}',
                    dataType: 'json',
                    delay: 1000,
                    data: function(params) {
                        return {
                            q: params.term,
                            page: params.page || 1,
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;

                        return {
                            results: data.results,
                            pagination: {
                                more: data.pagination.more
                            }
                        };
                    },
                    cache: true
                },
                containerCssClass: 'form-control',
                placeholder: "Select Sales Order No",
                templateResult: function(data) {
                    if (data.loading) {
                        return "Loading...";
                    }

                    if ($('#sale_order').data('id') == data.id) {
                        return $('<option value=' + data.id + ' selected>' + data.order_no +
                            '</option>');
                    } else {
                        return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                    }
                },
                templateSelection: function(data) {
                    return data.text || "Select Sales Order No";
                }
            });


        });

        $('#sale_order').on('change', function() {
                const id = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '{{ route('sale_order.detail.get') }}',
                    data: {
                        "id": id
                    },
                    success: function(data) {
                        $('#kod_buku').val(data.kod_buku);
                        $('#tajuk').val(data.description);
                    }
                });
            });
</script>
@endpush
