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
                            <p class="float-right">TCBS-B61 (Rev.0)</p>
                        </div>
                    </div>


                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Tarikh</label>
                                        <input type="date"  name="date" id="" value="{{ date('Y-m-d') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Masa</label>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select name="sale_order" id="sale_order" class="form-control">


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
                                                <td><input type="checkbox" class="Cover1" onchange="handleCheckboxChange('Cover1',this)" name="file_artwork_1" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover1" onchange="handleCheckboxChange('Cover1',this)" checked name="file_artwork_1" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover1" onchange="handleCheckboxChange('Cover1',this)" name="file_artwork_1" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Saiz Product</td>
                                                <td><input type="checkbox" class="Text1" onchange="handleCheckboxChange('Text1',this)" name="file_artwork_2" value="ok"  id=""></td>
                                                <td><input type="checkbox" class="Text1" onchange="handleCheckboxChange('Text1',this)" checked name="file_artwork_2" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text1" onchange="handleCheckboxChange('Text1',this)" name="file_artwork_2" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Bleed</td>
                                                <td><input type="checkbox" class="Cover2" onchange="handleCheckboxChange('Cover2',this)" name="file_artwork_3" value="ok"id=""></td>
                                                <td><input type="checkbox" class="Cover2" onchange="handleCheckboxChange('Cover2',this)" checked name="file_artwork_3" value="ng"id=""></td>
                                                <td><input type="checkbox" class="Cover2" onchange="handleCheckboxChange('Cover2',this)" name="file_artwork_3" value="na"id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Saiz Spine</td>
                                                <td><input type="checkbox" class="Text2" onchange="handleCheckboxChange('Text2',this)" name="file_artwork_4" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text2" onchange="handleCheckboxChange('Text2',this)" checked name="file_artwork_4" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text2" onchange="handleCheckboxChange('Text2',this)" name="file_artwork_4" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat pencetak</td>
                                                <td><input type="checkbox" class="Cover3" onchange="handleCheckboxChange('Cover3',this)" name="file_artwork_5" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover3" onchange="handleCheckboxChange('Cover3',this)" checked name="file_artwork_5" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover3" onchange="handleCheckboxChange('Cover3',this)" name="file_artwork_5" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah muka surat</td>
                                                <td><input type="checkbox" class="Text3" onchange="handleCheckboxChange('Text3',this)" name="file_artwork_6" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text3" onchange="handleCheckboxChange('Text3',this)" checked name="file_artwork_6" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text3" onchange="handleCheckboxChange('Text3',this)" name="file_artwork_6" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Turutan muka surat</td>
                                                <td><input type="checkbox" class="Cover4" onchange="handleCheckboxChange('Cover4',this)" name="file_artwork_7" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover4" onchange="handleCheckboxChange('Cover4',this)" checked name="file_artwork_7" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover4" onchange="handleCheckboxChange('Cover4',this)" name="file_artwork_7" value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Kedudukan Artwork Cover (hardcover)</td>
                                                <td><input type="checkbox" class="Text4" onchange="handleCheckboxChange('Text4',this)" name="file_artwork_8" value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text4" onchange="handleCheckboxChange('Text4',this)" checked name="file_artwork_8" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text4" onchange="handleCheckboxChange('Text4',this)" name="file_artwork_8" value="na" id=""></td>

                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-5">
                                <h6><b>impositions</b></h6>
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
                                            <td><input type="checkbox" class="Cover5"
                                                    onchange="handleCheckboxChange('Cover5',this)" name="impositions_1" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Cover5"
                                                    onchange="handleCheckboxChange('Cover5',this)" checked name="impositions_1" value="ng"
                                                    id=""></td>
                                            <td><input type="checkbox" class="Cover5"
                                                    onchange="handleCheckboxChange('Cover5',this)" name="impositions_1" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Kedudukan imposition</td>
                                            <td><input type="checkbox" class="Text5"
                                                    onchange="handleCheckboxChange('Text5',this)" name="impositions_2" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Text5"
                                                    onchange="handleCheckboxChange('Text5',this)" checked name="impositions_2" value="ng" id="">
                                            </td>
                                            <td><input type="checkbox" class="Text5"
                                                    onchange="handleCheckboxChange('Text5',this)" name="impositions_2" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Saiz spacing</td>
                                            <td><input type="checkbox" class="Cover6"
                                                    onchange="handleCheckboxChange('Cover6',this)" name="impositions_3" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Cover6"
                                                    onchange="handleCheckboxChange('Cover6',this)" checked name="impositions_3" value="ng"
                                                    id=""></td>
                                            <td><input type="checkbox" class="Cover6"
                                                    onchange="handleCheckboxChange('Cover6',this)" name="impositions_3" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Printing method (Straight @ Perfecting)</td>
                                            <td><input type="checkbox" class="Text6"
                                                    onchange="handleCheckboxChange('Text6',this)" name="impositions_4" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Text6"
                                                    onchange="handleCheckboxChange('Text6',this)" checked name="impositions_4" value="ng" id="">
                                            </td>
                                            <td><input type="checkbox" class="Text6"
                                                    onchange="handleCheckboxChange('Text6',this)" name="impositions_4" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Up</td>
                                            <td><input type="checkbox" class="Cover7"
                                                    onchange="handleCheckboxChange('Cover7',this)" name="impositions_5" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Cover7"
                                                    onchange="handleCheckboxChange('Cover7',this)" checked name="impositions_5" value="ng"
                                                    id=""></td>
                                            <td><input type="checkbox" class="Cover7"
                                                    onchange="handleCheckboxChange('Cover7',this)" name="impositions_5" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Dummy Lipat</td>
                                            <td><input type="checkbox" class="Text7"
                                                    onchange="handleCheckboxChange('Text7',this)" name="impositions_6" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Text7"
                                                    onchange="handleCheckboxChange('Text7',this)" checked name="impositions_6" value="ng" id="">
                                            </td>
                                            <td><input type="checkbox" class="Text7"
                                                    onchange="handleCheckboxChange('Text7',this)" name="impositions_6" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Penjilidan </td>
                                            <td><input type="checkbox" class="Cover8"
                                                    onchange="handleCheckboxChange('Cover8',this)" name="impositions_7" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Cover8"
                                                    onchange="handleCheckboxChange('Cover8',this)" checked name="impositions_7" value="ng"
                                                    id=""></td>
                                            <td><input type="checkbox" class="Cover8"
                                                    onchange="handleCheckboxChange('Cover8',this)" name="impositions_7" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kertas</td>
                                            <td><input type="checkbox" class="Text8"
                                                    onchange="handleCheckboxChange('Text8',this)" name="impositions_8" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Text8"
                                                    onchange="handleCheckboxChange('Text8',this)" checked name="impositions_8" value="ng" id="">
                                            </td>
                                            <td><input type="checkbox" class="Text8"
                                                    onchange="handleCheckboxChange('Text8',this)" name="impositions_8" value="na" id=""></td>

                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2">
                                    <a href="" class="float-right" style="color:blue;"><b>RUJUKAN</b></a>
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
        <a href="{{route('ctp')}}">back to list</a>
    </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width:1000px; margin-left:-250px;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <table border="1" style="width:950px;">
                            <tbody>
                                <tr>
                                    <th colspan="2">TIHANI CETAK SDN BHD</th>
                                    <th rowspan="2">No Rujukan </th>
                                    <th rowspan="2">TCSB-AKS49</th>
                                </tr>
                                <tr>
                                    <th colspan="2">ARAHAN KERJA</th>
                                </tr>
                                <tr>
                                    <th>JABATAN</th>
                                    <th>OPERASI - PRA CETAK </th>
                                    <th>Edisi</th>
                                    <th>6</th>
                                </tr>
                                <tr>
                                    <th>TAJUK</th>
                                    <th>RUJUKAN SAIZ SPACING MENGIKUT SAIZ KERTAS CETAX</th>
                                    <th>Mukasurat</th>
                                    <th>1-1</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table border="1" style="width:950px;">
                            <tr>
                                <th rowspan="2">No</th>
                                <th colspan="2">SAIZ BUKU</th>
                                <th colspan="2">SAIZ KERTAS CETAK</th>
                                <th colspan="2">CARA CETAKAN</th>
                            </tr>
                            <tr>
                                <th>Millimeter(mm)</th>
                                <th>Inci</th>
                                <th>Millimeter(mm)</th>
                                <th>Inci</th>
                                <th>Straight (P3 & P4)</th>
                                <th>Prefecting (P1)</th>
                            </tr>

                            <tbody>
                                <tr>
                                    <td rowspan="2">1</td>
                                    <td rowspan="2">210mm X 297mm</td>
                                    <td rowspan="2">8.28 <sup>m</sup>x 11.69 <sup>m</sup></td>
                                    <td>635mm x 902mm</td>
                                    <td>25<sup>m</sup>x 35.5 <sup>m</sup></td>
                                    <td rowspan="2">8mm</td>
                                    <td rowspan="2">8mm</td>
                                </tr>
                                <tr>
                                    <td>635mm x 876mm</td>
                                    <td>25<sup>m</sup>x 34.5 <sup>m</sup></td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>140mm X 210mm</td>
                                    <td>5.51 <sup>m</sup>x 8.28 <sup>m</sup></td>
                                    <td>635mm x 902mm</td>
                                    <td>25<sup>m</sup>x 35.5 <sup>m</sup></td>
                                    <td>10mm</td>
                                    <td>10mm</td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>148mm X 210mm</td>
                                    <td>5.82 <sup>m</sup>x 8.28 <sup>m</sup></td>
                                    <td>635mm x 902mm</td>
                                    <td>25<sup>m</sup>x 35.5 <sup>m</sup></td>
                                    <td>10mm</td>
                                    <td>10mm</td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>190mm X 260mm</td>
                                    <td>7.48 <sup>m</sup>x 10.24 <sup>m</sup></td>
                                    <td>787mm x 1092mm <br> (cut2.787mmx546mm)</td>
                                    <td>31<sup>m</sup>x 34 <sup>m</sup> <br> (cut 2.13<sup>m</sup> x 21.5<sup>m</sup> )
                                    </td>
                                    <td>10mm</td>
                                    <td>4mm</td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>190mm X 254mm</td>
                                    <td>7.48 <sup>m</sup>x 10.24 <sup>m</sup></td>
                                    <td>787mm x 1092mm <br> (cut2.787mmx546mm)</td>
                                    <td>31<sup>m</sup>x 34 <sup>m</sup> <br> (cut 2.13<sup>m</sup> x 21.5<sup>m</sup> )
                                    </td>
                                    <td>10mm</td>
                                    <td>10mm</td>
                                </tr>

                                <tr>
                                    <td>6</td>
                                    <td>100mm X 152mm</td>
                                    <td>3.94 <sup>m</sup>x 5.98 <sup>m</sup></td>
                                    <td>635mm x 902mm</td>
                                    <td>25<sup>m</sup>x 35 <sup>m</sup></td>
                                    <td>10mm</td>
                                    <td>10mm</td>
                                </tr>

                                <tr>
                                    <td>7</td>
                                    <td>150mm X 230mm</td>
                                    <td>5.9 <sup>m</sup>x 9 <sup>m</sup></td>
                                    <td>635mm x 940mm</td>
                                    <td>25<sup>m</sup>x 37 <sup>m</sup></td>
                                    <td style="background:#FFA500;">5mm(p3 sahaja)</td>
                                    <td>5mm</td>
                                </tr>

                                <tr>
                                    <td rowspan="2">8</td>
                                    <td rowspan="2">165mm X 210mm</td>
                                    <td rowspan="2">6.5 <sup>m</sup>x 8.28 <sup>m</sup></td>
                                    <td>711mm x 1016mm</td>
                                    <td>28<sup>m</sup>x 40 <sup>m</sup></td>
                                    <td style="background:#FFA500;">10mm(p3 sahaja)</td>
                                    <td>10mm</td>
                                </tr>
                                <tr>
                                    <td>787mm x 1092mm</td>
                                    <td>31<sup>m</sup>x 43 <sup>m</sup></td>
                                    <td style="background:#FFA500;">10mm(p3 sahaja)</td>
                                    <td>10mm</td>
                                </tr>

                                <tr>
                                    <td>9</td>
                                    <td>198.12mm X 198.12mm</td>
                                    <td>7.8 <sup>m</sup>x 7.8 <sup>m</sup></td>
                                    <td>635mm x 902mm</td>
                                    <td>25<sup>m</sup>x 35.5 <sup>m</sup></td>
                                    <td>4mm</td>
                                    <td style="background:red; color:#fff;">Tidak boleh dioetak</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>105mm X 148mm</td>
                                    <td>4.13 <sup>m</sup>x 5.38 <sup>m</sup></td>
                                    <td>787mm x 1092mm <br> (cut2.787mmx546mm)</td>
                                    <td>25<sup>m</sup>x 35.5 <sup>m</sup></td>
                                    <td>10mm</td>
                                    <td>5mm</td>
                                </tr>

                                <tr>
                                    <td>11</td>
                                    <td>139.7mm X 215.9mm</td>
                                    <td>5.5 <sup>m</sup>x 8.5 <sup>m</sup></td>
                                    <td>635mm x 902mm</td>
                                    <td>25<sup>m</sup>x 35.5 <sup>m</sup></td>
                                    <td>8mm</td>
                                    <td>8mm</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">12</td>
                                    <td rowspan="2">165mm X 240mm</td>
                                    <td rowspan="2">6.5 <sup>m</sup>x 9.45 <sup>m</sup></td>
                                    <td>711mm x 1092mm</td>
                                    <td>28<sup>m</sup>x 40 <sup>m</sup></td>
                                    <td rowspan="2" style="background:#FFA500;">6mm(p3 sahaja)</td>
                                    <td rowspan="2">6mm</td>
                                </tr>
                                <tr>
                                    <td>787mm x 1016mm</td>
                                    <td>31<sup>m</sup>x 43 <sup>m</sup></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">13</td>
                                    <td rowspan="2">171.5mm X 241.3mm</td>
                                    <td rowspan="2">6.75 <sup>m</sup>x 9.45 <sup>m</sup></td>
                                    <td>711mm x 1016mm</td>
                                    <td>28<sup>m</sup>x 40 <sup>m</sup></td>
                                    <td rowspan="2" style="background:#FFA500;">3mm(p3 sahaja)</td>
                                    <td rowspan="2">3mm</td>
                                </tr>
                                <tr>
                                    <td>787mm x 1092mm</td>
                                    <td>31<sup>m</sup>x 43 <sup>m</sup></td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>130mm X 200mm</td>
                                    <td>5.1 <sup>m</sup>x 7.87 <sup>m</sup></td>
                                    <td>635mm x 902mm</td>
                                    <td>25<sup>m</sup>x 35.5 <sup>m</sup></td>
                                    <td>10mm</td>
                                    <td>10mm</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>152.4mm X 228.6mm</td>
                                    <td>6 <sup>m</sup>x 9 <sup>m</sup></td>
                                    <td>635mm x 940mm</td>
                                    <td>25<sup>m</sup>x 37 <sup>m</sup></td>
                                    <td style="background:#FFA500;">5mm(p3 sahaja)</td>
                                    <td>5mm</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>125mm X 176mm</td>
                                    <td>4.92 <sup>m</sup>x 6.93 <sup>m</sup></td>
                                    <td>787mm x 1092mm <br> (cut2.787mmx546mm)</td>
                                    <td>31<sup>m</sup>x 43 <sup>m</sup> <br> (cut 2.13<sup>m</sup> x 21.5<sup>m</sup> )
                                    </td>
                                    <td>10mm</td>
                                    <td>10mm</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">17</td>
                                    <td rowspan="2">165.1mm X 243.95mm</td>
                                    <td rowspan="2">6.5 <sup>m</sup>x 9.25 <sup>m</sup></td>
                                    <td>711mm x 1016mm</td>
                                    <td>28<sup>m</sup>x 40 <sup>m</sup></td>
                                    <td rowspan="2" style="background:#FFA500;">6mm(p3 sahaja)</td>
                                    <td rowspan="2">6mm</td>
                                </tr>
                                <tr>
                                    <td>787mmx1092mm</td>
                                    <td>31<sup>m</sup>x 43 <sup>m</sup></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">18</td>
                                    <td rowspan="2">170mm X 235mm</td>
                                    <td rowspan="2">6.69 <sup>m</sup>x 9.25 <sup>m</sup></td>
                                    <td>711mm x 1016mm</td>
                                    <td>28<sup>m</sup>x 40 <sup>m</sup></td>
                                    <td rowspan="2" style="background:#FFA500;">6mm(p3 sahaja)</td>
                                    <td rowspan="2" style="background:red; color:#fff;">Tidak boleh dioetak</td>
                                </tr>
                                <tr>
                                    <td>787mmx1092mm</td>
                                    <td>31<sup>m</sup>x 43 <sup>m</sup></td>
                                </tr>
                                <tr>
                                    <td>20</td>
                                    <td>165mm X 215.9mm</td>
                                    <td>6.5 <sup>m</sup>x 8.85 <sup>m</sup></td>
                                    <td>635mm x 902mm </td>
                                    <td>25<sup>m</sup>x 37 <sup>m</sup></td>
                                    <td>6mm(p3 sahaja)</td>
                                    <td>6mm</td>
                                </tr>

                                <tr>
                                    <td>21</td>
                                    <td>145mm X 210mm</td>
                                    <td>5.7 <sup>m</sup>x 8.27 <sup>m</sup></td>
                                    <td>635mm x 902mm </td>
                                    <td>25<sup>m</sup>x 35.5 <sup>m</sup></td>
                                    <td>10mm</td>
                                    <td>10mm</td>
                                </tr>

                                <tr>
                                    <td rowspan="2">22</td>
                                    <td rowspan="2">165mm X 228.6mm</td>
                                    <td rowspan="2">6.65 <sup>m</sup>x 9 <sup>m</sup></td>
                                    <td>711mm x 1016mm</td>
                                    <td>28<sup>m</sup>x 40 <sup>m</sup></td>
                                    <td rowspan="2" style="background:#FFA500;">6mm(p3 sahaja)</td>
                                    <td>10mm</td>
                                </tr>
                                <tr>
                                    <td>787mmx1092mm</td>
                                    <td>31<sup>m</sup>x 43 <sup>m</sup></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
</script>
@endpush

