@extends('layouts.app')
@section('css')
<style>
        table th{
                text-align:left;
        }
</style>
@endsection
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                                <div class="row">
                                <div class="col-md-12">
                                    <h5 class="float-left">Senarai Semak Pra Cetak</h5>
                                    <p class="float-right">TCSB-BO4(Rev.11)</p>
                                </div>
                               </div>

                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Tarikh</div>
                                            <input type="text" value="{{ $senari_semak_cetak->sale_order->order_no }}"
                                            class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Date</div>
                                            <input type="text" name="date" value="{{ $senari_semak_cetak->date }}"
                                                class="form-control" id="Currentdate">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">kod Buku</div>
                                            <input type="text" readonly value="{{ $senari_semak_cetak->sale_order->kod_buku }}"
                                                name="" id="kod_buku" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Tajuk</div>
                                            <input type="text" readonly
                                                value="{{ $senari_semak_cetak->sale_order->description }}" name=""
                                                id="tajuk" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Time</div>
                                            <input name="time" type="text" id="Currenttime"
                                                value="{{ $senari_semak_cetak->time }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Availability</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>cover</td>
                                                        <td><input type="checkbox" name="item_cover_availibility"
                                                                @checked($senari_semak_cetak->item_cover_availibility != null) id="Cover">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>End/Leaflet</td>
                                                        <td><input type="checkbox" name="item_leaflet_availibility"
                                                                @checked($senari_semak_cetak->item_leaflet_availibility != null) id="Endpaper">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Section No</td>
                                                        <td><input type="number" class="form-control"
                                                                name="item_cover_text" min="1"
                                                                value="{{ $senari_semak_cetak->item_cover_text }}"
                                                                id="Text"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Checked By</div>
                                            <input type="text" value="{{ $senari_semak_cetak->user->full_name }}" readonly
                                                class="form-control" name="" id="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h5>Bahagian A ( Semakan File)</h5>
                            </div>
                            <div class="col-md-11">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">kriteria</th>
                                            <th colspan="3" class="cover">cover</th>
                                            <th colspan="3" class="text">text</th>
                                            <th colspan="3" class="endpaper">Endpaper/leftlet</th>

                                        </tr>
                                        <tr>
                                            <th class="cover">OK</th>
                                            <th class="cover">NG</th>
                                            <th class="cover">NA</th>
                                            <th class="text">OK</th>
                                            <th class="text">NG</th>
                                            <th class="text">NA</th>
                                            <th class="endpaper">OK</th>
                                            <th class="endpaper">NG</th>
                                            <th class="endpaper">NA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>File Format - CMYK (buat preflight inspection)</td>
                                            <td class="cover"><input type="checkbox" class="Cover1"
                                                    onchange="handleCheckboxChange('Cover1')" name="bahagianA[2][1]"
                                                    value="ok" @if($detail1[1]) @checked($detail1[1]->bahagian_a_1 == 'ok') @endif>
                                            </td>
                                            <td class="cover"><input type="checkbox" class="Cover1"
                                                    onchange="handleCheckboxChange('Cover1')"
                                                    name="bahagianA[2][1]" id="" value="ng" @if($detail1[1]) @checked($detail1[1]->bahagian_a_1 == 'ng') @endif></td>
                                            <td class="cover"><input type="checkbox" class="Cover1"
                                                    onchange="handleCheckboxChange('Cover1')" name="bahagianA[2][1]"
                                                    id="" value="na" @if($detail1[1]) @checked($detail1[1]->bahagian_a_1 == 'na') @endif></td>
                                            <td class="text"><input type="checkbox" class="Text1"
                                                    onchange="handleCheckboxChange('Text1')" name="bahagianA[3][1]"
                                                    id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_1 == 'ok') @endif></td>
                                            <td class="text"><input type="checkbox" class="Text1"
                                                    onchange="handleCheckboxChange('Text1')"
                                                    name="bahagianA[3][1]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_1 == 'ng') @endif></td>
                                            <td class="text"><input type="checkbox" class="Text1"
                                                    onchange="handleCheckboxChange('Text1')" name="bahagianA[3][1]"
                                                    id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_1 == 'na') @endif></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper1"
                                                    onchange="handleCheckboxChange('Endpaper1')" name="bahagianA[4][1]"
                                                    id="" value="ok" @if($detail1[3]) @checked($detail1[3]->bahagian_a_1 == 'ok') @endif></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper1"
                                                    onchange="handleCheckboxChange('Endpaper1')"
                                                    name="bahagianA[4][1]" id="" value="ng" @if($detail1[3]) @checked($detail1[3]->bahagian_a_1 == 'ng') @endif></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper1"
                                                    onchange="handleCheckboxChange('Endpaper1')" name="bahagianA[4][1]"
                                                    id="" value="na" @if($detail1[3]) @checked($detail1[3]->bahagian_a_1 == 'na') @endif></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jumlah Warna (bandingkan TMS dan file artwork)</td>
                                            <td class="cover"><input type="checkbox" class="Cover2"
                                                    onchange="handleCheckboxChange('Cover2')" name="bahagianA[2][2]"
                                                    id="" value="ok" @if($detail1[1]) @checked($detail1[1]->bahagian_a_2 == 'ok') @endif></td>
                                            <td class="cover"><input type="checkbox" class="Cover2"
                                                    onchange="handleCheckboxChange('Cover2')"
                                                    name="bahagianA[2][2]" id="" value="ng" @if($detail1[1]) @checked($detail1[1]->bahagian_a_2 == 'ng') @endif></td>
                                            <td class="cover"><input type="checkbox" class="Cover2"
                                                    onchange="handleCheckboxChange('Cover2')" name="bahagianA[2][2]"
                                                    id="" value="na" @if($detail1[1]) @checked($detail1[1]->bahagian_a_2 == 'na') @endif></td>
                                            <td class="text"><input type="checkbox" class="Text2"
                                                    onchange="handleCheckboxChange('Text2')"name="bahagianA[3][2]"
                                                    id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_2 == 'ok') @endif></td>
                                            <td class="text"><input type="checkbox" class="Text2"
                                                    onchange="handleCheckboxChange('Text2')"
                                                    name="bahagianA[3][2]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_2 == 'ng') @endif></td>
                                            <td class="text"><input type="checkbox" class="Text2"
                                                    onchange="handleCheckboxChange('Text2')" name="bahagianA[3][2]"
                                                    id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_2 == 'na') @endif></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper2"
                                                    onchange="handleCheckboxChange('Endpaper2')" name="bahagianA[4][2]"
                                                    id="" value="ok" @if($detail1[3]) @checked($detail1[3]->bahagian_a_2 == 'ok') @endif></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper2"
                                                    onchange="handleCheckboxChange('Endpaper2')"
                                                    name="bahagianA[4][2]" id="" value="ng" @if($detail1[3]) @checked($detail1[3]->bahagian_a_2 == 'ng') @endif></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper2"
                                                    onchange="handleCheckboxChange('Endpaper2')" name="bahagianA[4][2]"
                                                    id="" value="na" @if($detail1[3]) @checked($detail1[3]->bahagian_a_3 == 'na') @endif></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Saiz product (bandingkan TMS dan file artwork)</td>
                                            <td class="cover" colspan="3"><input type="text"class="Cover3"
                                                    onchange="handleCheckboxChange('Cover3')"
                                                    class="form-control" name="bahagianA[2][3]" id="" @if($detail1[1]) value="{{$detail1[1]->bahagian_a_3}}" @endif></td>
                                            <td class="text" colspan="3"><input type="text"class="Text3"
                                                    onchange="handleCheckboxChange('Text3')"
                                                    class="form-control" name="bahagianA[3][3]" id="" @if($detail1[2]) value="{{$detail1[2]->bahagian_a_3}}" @endif></td>
                                            <td class="endpaper" colspan="3"><input type="text" class="Endpaper3"
                                                    onchange="handleCheckboxChange('Endpaper3')"
                                                    class="form-control" name="bahagianA[4][3]" id="" @if($detail1[3]) value="{{$detail1[3]->bahagian_a_3}}" @endif></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Design clearance 8mm (stitching binding)</td>
                                            <td class="cover" colspan="3"><input type="text" class="Cover4"
                                                    onchange="handleCheckboxChange('Cover4')" readonly
                                                    name="bahagianA[2][4]"  class="form-control"
                                                    id="" @if($detail1[1]) value="{{$detail1[1]->bahagian_a_4}}" @endif></td>
                                            <td class="text endpaper"><input type="checkbox" class="Text4"
                                                    onchange="handleCheckboxChange('Text4')" name="bahagianA[3][4]"
                                                    id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_4 == 'ok') @endif></td>
                                            <td class="text endpaper"><input type="checkbox" class="Text4"
                                                    onchange="handleCheckboxChange('Text4')"
                                                    name="bahagianA[3][4]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_4 == 'ng') @endif></td>
                                            <td class="text endpaper"><input type="checkbox" class="Text4"
                                                    onchange="handleCheckboxChange('Text4')" name="bahagianA[3][4]"
                                                    id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_4 == 'na') @endif></td>
                                            <td class="endpaper" colspan="3"><input type="text" class="Endpaper4"
                                                    onchange="handleCheckboxChange('Endpaper4')"
                                                    class="form-control" readonly name="bahagianA[4][4]" id="" @if($detail1[3]) value="{{$detail1[3]->bahagian_a_4}}" @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Bleed (3mm keatas)</td>
                                            <td class="cover"><input type="checkbox" class="Cover5"
                                                    onchange="handleCheckboxChange('Cover5')" name="bahagianA[2][5]"
                                                    id="" value="ok" @if($detail1[1]) @checked($detail1[1]->bahagian_a_5 == 'ok') @endif></td>
                                            <td class="cover"><input type="checkbox" class="Cover5"
                                                    onchange="handleCheckboxChange('Cover5')"
                                                    name="bahagianA[2][5]" id="" value="ng" @if($detail1[1]) @checked($detail1[1]->bahagian_a_5 == 'ng') @endif></td>
                                            <td class="cover"><input type="checkbox" class="Cover5"
                                                    onchange="handleCheckboxChange('Cover5')" name="bahagianA[2][5]"
                                                    id="" value="na" @if($detail1[1]) @checked($detail1[1]->bahagian_a_5 == 'na') @endif></td>
                                            <td class="text"><input type="checkbox" class="Text5"
                                                    onchange="handleCheckboxChange('Text5')" name="bahagianA[3][5]"
                                                    id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_5 == 'ok') @endif></td>
                                            <td class="text"><input type="checkbox" class="Text5"
                                                    onchange="handleCheckboxChange('Text5')"
                                                    name="bahagianA[3][5]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_5 == 'ng') @endif></td>
                                            <td class="text"><input type="checkbox" class="Text5"
                                                    onchange="handleCheckboxChange('Text5')" name="bahagianA[3][5]"
                                                    id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_5 == 'na') @endif></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper5"
                                                    onchange="handleCheckboxChange('Endpaper5')" name="bahagianA[4][5]"
                                                    id="" value="ok" @if($detail1[3]) @checked($detail1[3]->bahagian_a_5 == 'ok') @endif></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper5"
                                                    onchange="handleCheckboxChange('Endpaper5')"
                                                    name="bahagianA[4][5]" id="" value="ng" @if($detail1[3]) @checked($detail1[3]->bahagian_a_5 == 'ng') @endif></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper5"
                                                    onchange="handleCheckboxChange('Endpaper5')" name="bahagianA[4][5]"
                                                    id="" value="na" @if($detail1[3]) @checked($detail1[3]->bahagian_a_5 == 'na') @endif></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Hotstamping/Spot UV Image overprint</td>
                                            <td class="cover"><input type="checkbox" class="Cover6"
                                                    onchange="handleCheckboxChange('Cover6')" name="bahagianA[2][6]"
                                                    id="" value="ok" @if($detail1[1]) @checked($detail1[1]->bahagian_a_6 == 'ok') @endif></td>
                                            <td class="cover"><input type="checkbox" class="Cover6"
                                                    onchange="handleCheckboxChange('Cover6')"
                                                    name="bahagianA[2][6]" id="" value="ng" @if($detail1[1]) @checked($detail1[1]->bahagian_a_6 == 'ng') @endif></td>
                                            <td class="cover"><input type="checkbox" class="Cover6"
                                                    onchange="handleCheckboxChange('Cover6')" name="bahagianA[2][6]"
                                                    id="" value="na" @if($detail1[1]) @checked($detail1[1]->bahagian_a_6 == 'na') @endif></td>
                                            <td class="text" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[3][6]" id="" @if($detail1[2]) value="{{$detail1[2]->bahagian_a_6}}" @endif>
                                            </td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][6]" id="" @if($detail1[3]) value="{{$detail1[3]->bahagian_a_6}}" @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Saiz spine (buat kiraan mengikut formula)</td>
                                            <td class="cover"><input class="Cover7"
                                                    onchange="handleCheckboxChange('Cover7')" type="checkbox"
                                                    name="bahagianA[2][7]" id="" value="ok" @if($detail1[1]) @checked($detail1[1]->bahagian_a_7 == 'ok') @endif></td>
                                            <td class="cover"><input class="Cover7"
                                                    onchange="handleCheckboxChange('Cover7')" type="checkbox"
                                                    name="bahagianA[2][7]" id="" value="ng" @if($detail1[1]) @checked($detail1[1]->bahagian_a_7 == 'ng') @endif></td>
                                            <td class="cover"><input class="Cover7"
                                                    onchange="handleCheckboxChange('Cover7')"type="checkbox"
                                                    name="bahagianA[2][7]" id="" value="na" @if($detail1[1]) @checked($detail1[1]->bahagian_a_7 == 'na') @endif></td>
                                            <td class="text" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[3][7]" id="" @if($detail1[2]) value="{{$detail1[2]->bahagian_a_7}}" @endif>
                                            </td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][7]" id="" @if($detail1[3]) value="{{$detail1[3]->bahagian_a_7}}" @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Alamat pencetak</td>
                                            <td class="cover" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[2][8]" id="" @if($detail1[1]) value="{{$detail1[1]->bahagian_a_8}}" @endif>
                                            </td>
                                            <td class="text"><input class="Text6"
                                                    onchange="handleCheckboxChange('Text6')" type="checkbox"
                                                    name="bahagianA[3][8]" id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_8 == 'ok') @endif></td>
                                            <td class="text"><input class="Text6"
                                                    onchange="handleCheckboxChange('Text6')" type="checkbox"
                                                    name="bahagianA[3][8]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_8 == 'ng') @endif></td>
                                            <td class="text"><input class="Text6"
                                                    onchange="handleCheckboxChange('Text6')" type="checkbox"
                                                    name="bahagianA[3][8]" id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_8 == 'na') @endif></td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][8]" id="" @if($detail1[3]) value="{{$detail1[3]->bahagian_a_8}}" @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Cetakan (Sila nyatakan)</td>
                                            <td class="cover" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[2][9]" id="" @if($detail1[1]) value="{{$detail1[1]->bahagian_a_9}}" @endif>
                                            </td>
                                            <td class="text"><input class="Text7"
                                                    onchange="handleCheckboxChange('Text7')" type="checkbox"
                                                    name="bahagianA[3][9]" id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_9 == 'ok') @endif></td>
                                            <td class="text"><input class="Text7"
                                                    onchange="handleCheckboxChange('Text7')" type="checkbox"
                                                    name="bahagianA[3][9]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_9 == 'ng') @endif></td>
                                            <td class="text"><input class="Text7"
                                                    onchange="handleCheckboxChange('Text7')" type="checkbox"
                                                    name="bahagianA[3][9]" id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_9 == 'na') @endif></td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][9]" id="" @if($detail1[3]) value="{{$detail1[3]->bahagian_a_9}}" @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Jumlah mukasurat (bandingkan TMS dan file artwork)</td>
                                            <td class="cover" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[2][10]" id="" @if($detail1[1]) value="{{$detail1[1]->bahagian_a_10}}" @endif>
                                            </td>
                                            <td class="text"><input class="Text8"
                                                    onchange="handleCheckboxChange('Text8')" type="checkbox"
                                                    name="bahagianA[3][10]" id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_10 == 'ok') @endif></td>
                                            <td class="text"><input class="Text8"
                                                    onchange="handleCheckboxChange('Text8')" type="checkbox"
                                                    name="bahagianA[3][10]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_10 == 'ng') @endif></td>
                                            <td class="text"><input class="Text8"
                                                    onchange="handleCheckboxChange('Text8')" type="checkbox"
                                                    name="bahagianA[3][10]" id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_10 == 'na') @endif></td>
                                            <td class="endpaper"colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[4][10]" id="" @if($detail1[3]) value="{{$detail1[3]->bahagian_a_10}}" @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>Turutan mukasurat (berturutan)</td>
                                            <td class="cover" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[2][11]" id="" @if($detail1[1]) value="{{$detail1[1]->bahagian_a_11}}" @endif>
                                            </td>
                                            <td class="text"><input class="Text9"
                                                    onchange="handleCheckboxChange('Text9')" type="checkbox"
                                                    name="bahagianA[3][11]" id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_11 == 'ok') @endif></td>
                                            <td class="text"><input class="Text9"
                                                    onchange="handleCheckboxChange('Text9')" type="checkbox"
                                                    name="bahagianA[3][11]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_11 == 'ng') @endif></td>
                                            <td class="text"><input class="Text9"
                                                    onchange="handleCheckboxChange('Text9')" type="checkbox"
                                                    name="bahagianA[3][11]" id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_11 == 'na') @endif></td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][11]" id="" @if($detail1[3]) value="{{$detail1[3]->bahagian_a_11}}" @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>Dummy lipat (dummy kosong untuk job baharu sahaja)</td>
                                            <td class="cover" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[2][12]" id="" @if($detail1[1]) value="{{$detail1[1]->bahagian_a_12}}" @endif>
                                            </td>
                                            <td class="text"><input class="Text10"
                                                    onchange="handleCheckboxChange('Text10')" type="checkbox"
                                                    name="bahagianA[3][12]" id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_12 == 'ok') @endif></td>
                                            <td class="text"><input class="Text10"
                                                    onchange="handleCheckboxChange('Text10')" type="checkbox"
                                                    name="bahagianA[3][12]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_12 == 'ng') @endif></td>
                                            <td class="text"><input class="Text10"
                                                    onchange="handleCheckboxChange('Text10')" type="checkbox"
                                                    name="bahagianA[3][12]" id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_12 == 'na') @endif></td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][12]" id="" @if($detail1[3]) value="{{$detail1[3]->bahagian_a_12}}" @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td>Kedudukan artwork cover yang centre (softcover)</td>
                                            <td class="cover" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[2][13]" id="" @if($detail1[1]) value="{{$detail1[1]->bahagian_a_13}}" @endif>
                                            </td>
                                            <td class="text"><input class="Text11"
                                                    onchange="handleCheckboxChange('Text11')" type="checkbox"
                                                    name="bahagianA[3][13]" id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_13 == 'ok') @endif></td>
                                            <td class="text"><input class="Text11"
                                                    onchange="handleCheckboxChange('Text11')" type="checkbox"
                                                    name="bahagianA[3][13]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_13 == 'ng') @endif></td>
                                            <td class="text"><input class="Text11"
                                                    onchange="handleCheckboxChange('Text11')" type="checkbox"
                                                    name="bahagianA[3][13]" id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_13 == 'na') @endif></td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][13]" id="" @if($detail1[3]) value="{{$detail1[3]->bahagian_a_13}}" @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>14</td>
                                            <td>Kedudukan artwork cover yang centre (hardcover)</td>
                                            <td class="cover" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[2][14]" id="" @if($detail1[1]) value="{{$detail1[1]->bahagian_a_14}}" @endif>
                                            </td>
                                            <td class="text"><input class="Text12"
                                                    onchange="handleCheckboxChange('Text12')" type="checkbox"
                                                    name="bahagianA[3][14]" id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_14 == 'ok') @endif></td>
                                            <td class="text"><input class="Text12"
                                                    onchange="handleCheckboxChange('Text12')" type="checkbox"
                                                    name="bahagianA[3][14]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_14 == 'ng') @endif></td>
                                            <td class="text"><input class="Text12"
                                                    onchange="handleCheckboxChange('Text12')" type="checkbox"
                                                    name="bahagianA[3][14]" id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_14 == 'na') @endif></td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][14]" id="" @if($detail1[3]) value="{{$detail1[3]->bahagian_a_14}}" @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td>Jenis Penjilidan</td>
                                            <td class="cover"><input class="Cover8"
                                                    onchange="handleCheckboxChange('Cover8')" type="checkbox"
                                                    name="bahagianA[2][15]" id="" value="ok" @if($detail1[1]) @checked($detail1[1]->bahagian_a_15 == 'ok') @endif></td>
                                            <td class="cover"><input class="Cover8"
                                                    onchange="handleCheckboxChange('Cover8')" type="checkbox"
                                                    name="bahagianA[2][15]" id="" value="ng" @if($detail1[1]) @checked($detail1[1]->bahagian_a_15 == 'ng') @endif></td>
                                            <td class="cover"><input class="Cover8"
                                                    onchange="handleCheckboxChange('Cover8')" type="checkbox"
                                                    name="bahagianA[2][15]" id="" value="na" @if($detail1[1]) @checked($detail1[1]->bahagian_a_15 == 'na') @endif></td>
                                            <td class="text"><input class="Text13"
                                                    onchange="handleCheckboxChange('Text13')" type="checkbox"
                                                    name="bahagianA[3][15]" id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_15 == 'ok') @endif></td>
                                            <td class="text"><input class="Text13"
                                                    onchange="handleCheckboxChange('Text13')" type="checkbox"
                                                    name="bahagianA[3][15]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_15 == 'ng') @endif></td>
                                            <td class="text"><input class="Text13"
                                                    onchange="handleCheckboxChange('Text13')" type="checkbox"
                                                    name="bahagianA[3][15]" id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_15 == 'na') @endif></td>
                                            <td class="endpaper"><input class="Endpaper6"
                                                    onchange="handleCheckboxChange('Endpaper6')" type="checkbox"
                                                    name="bahagianA[4][15]" id="" value="ok" @if($detail1[3]) @checked($detail1[3]->bahagian_a_15 == 'ok') @endif></td>
                                            <td class="endpaper"><input class="Endpaper6"
                                                    onchange="handleCheckboxChange('Endpaper6')" type="checkbox"
                                                    name="bahagianA[4][15]" id="" value="ng" @if($detail1[3]) @checked($detail1[3]->bahagian_a_15 == 'ng') @endif></td>
                                            <td class="endpaper"><input class="Endpaper6"
                                                    onchange="handleCheckboxChange('Endpaper6')" type="checkbox"
                                                    name="bahagianA[4][15]" id="" value="na" @if($detail1[3]) @checked($detail1[3]->bahagian_a_15 == 'na') @endif></td>
                                        </tr>
                                        <tr>
                                            <td>16</td>
                                            <td>Jenis Kertas</td>
                                            <td class="cover"><input class="Cover9"
                                                    onchange="handleCheckboxChange('Cover9')" type="checkbox"
                                                    name="bahagianA[2][16]" id="" value="ok" @if($detail1[1]) @checked($detail1[1]->bahagian_a_16 == 'ok') @endif></td>
                                            <td class="cover"><input class="Cover9"
                                                    onchange="handleCheckboxChange('Cover9')" type="checkbox"
                                                    name="bahagianA[2][16]" id="" value="ng" @if($detail1[1]) @checked($detail1[1]->bahagian_a_16 == 'ng') @endif></td>
                                            <td class="cover"><input class="Cover9"
                                                    onchange="handleCheckboxChange('Cover9')" type="checkbox"
                                                    name="bahagianA[2][16]" id="" value="na" @if($detail1[1]) @checked($detail1[1]->bahagian_a_16 == 'na') @endif></td>
                                            <td class="text"><input class="Text14"
                                                    onchange="handleCheckboxChange('Text14')" type="checkbox"
                                                    name="bahagianA[3][16]" id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_16 == 'ok') @endif></td>
                                            <td class="text"><input class="Text14"
                                                    onchange="handleCheckboxChange('Text14')" type="checkbox"
                                                    name="bahagianA[3][16]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_16 == 'ng') @endif></td>
                                            <td class="text"><input class="Text14"
                                                    onchange="handleCheckboxChange('Text14')" type="checkbox"
                                                    name="bahagianA[3][16]" id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_16 == 'na') @endif></td>
                                            <td class="endpaper"><input class="Endpaper7"
                                                    onchange="handleCheckboxChange('Endpaper7')" type="checkbox"
                                                    name="bahagianA[4][16]" id="" value="ok" @if($detail1[3]) @checked($detail1[3]->bahagian_a_16 == 'ok') @endif></td>
                                            <td class="endpaper"><input class="Endpaper7"
                                                    onchange="handleCheckboxChange('Endpaper7')" type="checkbox"
                                                    name="bahagianA[4][16]" id="" value="ng" @if($detail1[3]) @checked($detail1[3]->bahagian_a_16 == 'ng') @endif></td>
                                            <td class="endpaper"><input class="Endpaper7"
                                                    onchange="handleCheckboxChange('Endpaper7')" type="checkbox"
                                                    name="bahagianA[4][16]" id="" value="na" @if($detail1[3]) @checked($detail1[3]->bahagian_a_16 == 'na') @endif></td>
                                        </tr>
                                        <tr>
                                            <td>17</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3">  Other: </div>
                                                    <div class="col-md-9"><input type="text" width=""
                                                             name="bahagianA[1][17]"
                                                            id="" class="form-control" value="{{$detail1[0]->bahagian_a_17}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cover"><input class="Cover10"
                                                    onchange="handleCheckboxChange('Cover10')" type="checkbox"
                                                    name="bahagianA[2][17]" id="" value="ok" @if($detail1[1]) @checked($detail1[1]->bahagian_a_17 == 'ok') @endif></td>
                                            <td class="cover"><input class="Cover10"
                                                    onchange="handleCheckboxChange('Cover10')" type="checkbox"
                                                    name="bahagianA[2][17]" id="" value="ng" @if($detail1[1]) @checked($detail1[1]->bahagian_a_17 == 'ng') @endif></td>
                                            <td class="cover"><input class="Cover10"
                                                    onchange="handleCheckboxChange('Cover10')" type="checkbox"
                                                    name="bahagianA[2][17]" id="" value="na" @if($detail1[1]) @checked($detail1[1]->bahagian_a_17 == 'na') @endif></td>
                                            <td class="text endpaper"><input class="Text15"
                                                    onchange="handleCheckboxChange('Text15')" type="checkbox"
                                                    name="bahagianA[3][17]" id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_17 == 'ok') @endif></td>
                                            <td class="text endpaper"><input class="Text15"
                                                    onchange="handleCheckboxChange('Text15')" type="checkbox"
                                                    name="bahagianA[3][17]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_17 == 'ng') @endif></td>
                                            <td class="text endpaper"><input class="Text15"
                                                    onchange="handleCheckboxChange('Text15')" type="checkbox"
                                                    name="bahagianA[3][17]" id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_17 == 'na') @endif></td>
                                            <td class="endpaper"><input class="Endpaper8"
                                                    onchange="handleCheckboxChange('Endpaper8')" type="checkbox"
                                                    name="bahagianA[4][17]" id="" value="ok" @if($detail1[3]) @checked($detail1[3]->bahagian_a_17 == 'ok') @endif></td>
                                            <td class="endpaper"><input class="Endpaper8"
                                                    onchange="handleCheckboxChange('Endpaper8')" type="checkbox"
                                                    name="bahagianA[4][17]" id="" value="ng" @if($detail1[3]) @checked($detail1[3]->bahagian_a_17 == 'ng') @endif></td>
                                            <td class="endpaper"><input class="Endpaper8"
                                                    onchange="handleCheckboxChange('Endpaper8')" type="checkbox"
                                                    name="bahagianA[4][17]" id="" value="na" @if($detail1[3]) @checked($detail1[3]->bahagian_a_17 == 'na') @endif></td>
                                        </tr>

                                        <tr>
                                            <td>18</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3">  Other: </div>
                                                    <div class="col-md-9"><input type="text" width=""
                                                             name="bahagianA[1][18]"
                                                            id="" class="form-control" value="{{$detail1[0]->bahagian_a_18}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cover"><input class="Cover11"
                                                    onchange="handleCheckboxChange('Cover11')" type="checkbox"
                                                    name="bahagianA[2][18]" id="" value="ok" @if($detail1[1]) @checked($detail1[1]->bahagian_a_18 == 'ok') @endif></td>
                                            <td class="cover"><input class="Cover11"
                                                    onchange="handleCheckboxChange('Cover11')" type="checkbox"
                                                    name="bahagianA[2][18]" id="" value="ng" @if($detail1[1]) @checked($detail1[1]->bahagian_a_18 == 'ng') @endif></td>
                                            <td class="cover"><input class="Cover11"
                                                    onchange="handleCheckboxChange('Cover11')" type="checkbox"
                                                    name="bahagianA[2][18]" id="" value="na" @if($detail1[1]) @checked($detail1[1]->bahagian_a_18 == 'na') @endif></td>
                                            <td class="text endpaper"><input class="Text16"
                                                    onchange="handleCheckboxChange('Text16')" type="checkbox"
                                                    name="bahagianA[3][18]" id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_18 == 'ok') @endif></td>
                                            <td class="text endpaper"><input class="Text16"
                                                    onchange="handleCheckboxChange('Text16')" type="checkbox"
                                                    name="bahagianA[3][18]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_18 == 'ng') @endif></td>
                                            <td class="text endpaper"><input class="Text16"
                                                    onchange="handleCheckboxChange('Text16')" type="checkbox"
                                                    name="bahagianA[3][18]" id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_18 == 'na') @endif></td>
                                            <td class="endpaper"><input class="Endpaper9"
                                                    onchange="handleCheckboxChange('Endpaper9')" type="checkbox"
                                                    name="bahagianA[4][18]" id="" value="ok" @if($detail1[3]) @checked($detail1[3]->bahagian_a_18 == 'ok') @endif></td>
                                            <td class="endpaper"><input class="Endpaper9"
                                                    onchange="handleCheckboxChange('Endpaper9')" type="checkbox"
                                                    name="bahagianA[4][18]" id="" value="ng" @if($detail1[3]) @checked($detail1[3]->bahagian_a_18 == 'ng') @endif></td>
                                            <td class="endpaper"><input class="Endpaper9"
                                                    onchange="handleCheckboxChange('Endpaper9')" type="checkbox"
                                                    name="bahagianA[4][18]" id="" value="na" @if($detail1[3]) @checked($detail1[3]->bahagian_a_18 == 'na') @endif></td>
                                        </tr>
                                        <tr>
                                            <td>19</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3">  Other: </div>
                                                    <div class="col-md-9"><input type="text" width=""
                                                             name="bahagianA[1][19]"
                                                            id="" class="form-control" value="{{$detail1[0]->bahagian_a_19}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cover"><input class="Cover12"
                                                    onchange="handleCheckboxChange('Cover12')" type="checkbox"
                                                    name="bahagianA[2][19]" id="" value="ok" @if($detail1[1]) @checked($detail1[1]->bahagian_a_19 == 'ok') @endif></td>
                                            <td class="cover"><input class="Cover12"
                                                    onchange="handleCheckboxChange('Cover12')" type="checkbox"
                                                    name="bahagianA[2][19]" id="" value="ng" @if($detail1[1]) @checked($detail1[1]->bahagian_a_19 == 'ng') @endif></td>
                                            <td class="cover"><input class="Cover12"
                                                    onchange="handleCheckboxChange('Cover12')" type="checkbox"
                                                    name="bahagianA[2][19]" id="" value="na" @if($detail1[1]) @checked($detail1[1]->bahagian_a_19 == 'na') @endif></td>
                                            <td class="text endpaper"><input class="Text17"
                                                    onchange="handleCheckboxChange('Text17')" type="checkbox"
                                                    name="bahagianA[3][19]" id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_19 == 'ok') @endif></td>
                                            <td class="text endpaper"><input class="Text17"
                                                    onchange="handleCheckboxChange('Text17')" type="checkbox"
                                                    name="bahagianA[3][19]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_19 == 'ng') @endif></td>
                                            <td class="text endpaper"><input class="Text17"
                                                    onchange="handleCheckboxChange('Text17')" type="checkbox"
                                                    name="bahagianA[3][19]" id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_19 == 'na') @endif></td>
                                            <td class="endpaper"><input class="Endpaper9"
                                                    onchange="handleCheckboxChange('Endpaper9')" type="checkbox"
                                                    name="bahagianA[4][19]" id="" value="ok" @if($detail1[3]) @checked($detail1[3]->bahagian_a_19 == 'ok') @endif></td>
                                            <td class="endpaper"><input class="Endpaper9"
                                                    onchange="handleCheckboxChange('Endpaper9')" type="checkbox"
                                                    name="bahagianA[4][19]" id="" value="ng" @if($detail1[3]) @checked($detail1[3]->bahagian_a_19 == 'ng') @endif></td>
                                            <td class="endpaper"><input class="Endpaper9"
                                                    onchange="handleCheckboxChange('Endpaper9')" type="checkbox"
                                                    name="bahagianA[4][19]" id="" value="na" @if($detail1[3]) @checked($detail1[3]->bahagian_a_19 == 'na') @endif></td>
                                        </tr>
                                        <tr>
                                            <td>20</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3">  Other: </div>
                                                    <div class="col-md-9"><input type="text" width=""
                                                             name="bahagianA[1][20]"
                                                            id="" class="form-control" value="{{$detail1[0]->bahagian_a_20}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cover"><input class="Cover13"
                                                    onchange="handleCheckboxChange('Cover13')" type="checkbox"
                                                    name="bahagianA[2][20]" id="" value="ok" @if($detail1[1]) @checked($detail1[1]->bahagian_a_20 == 'ok') @endif></td>
                                            <td class="cover"><input class="Cover13"
                                                    onchange="handleCheckboxChange('Cover13')" type="checkbox"
                                                    name="bahagianA[2][20]" id="" value="ng" @if($detail1[1]) @checked($detail1[1]->bahagian_a_20 == 'ng') @endif></td>
                                            <td class="cover"><input class="Cover13"
                                                    onchange="handleCheckboxChange('Cover13')" type="checkbox"
                                                    name="bahagianA[2][20]" id="" value="na" @if($detail1[1]) @checked($detail1[1]->bahagian_a_20 == 'na') @endif></td>
                                            <td class="text endpaper"><input class="Text18"
                                                    onchange="handleCheckboxChange('Text18')" type="checkbox"
                                                    name="bahagianA[3][20]" id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_20 == 'ok') @endif></td>
                                            <td class="text endpaper"><input class="Text18"
                                                    onchange="handleCheckboxChange('Text18')" type="checkbox"
                                                    name="bahagianA[3][20]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_20 == 'ng') @endif></td>
                                            <td class="text endpaper"><input class="Text18"
                                                    onchange="handleCheckboxChange('Text18')" type="checkbox"
                                                    name="bahagianA[3][20]" id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_20 == 'na') @endif></td>
                                            <td class="endpaper"><input class="Endpaper10"
                                                    onchange="handleCheckboxChange('Endpaper10')" type="checkbox"
                                                    name="bahagianA[4][20]" id="" value="ok" @if($detail1[3]) @checked($detail1[3]->bahagian_a_20 == 'ok') @endif></td>
                                            <td class="endpaper"><input class="Endpaper10"
                                                    onchange="handleCheckboxChange('Endpaper10')" type="checkbox"
                                                    name="bahagianA[4][20]" id="" value="ng" @if($detail1[3]) @checked($detail1[3]->bahagian_a_20 == 'ng') @endif>
                                            </td>
                                            <td class="endpaper"><input class="Endpaper10"
                                                    onchange="handleCheckboxChange('Endpaper10')" type="checkbox"
                                                    name="bahagianA[4][20]" id="" value="na" @if($detail1[3]) @checked($detail1[3]->bahagian_a_20 == 'na') @endif></td>
                                        </tr>
                                        <tr>
                                            <td>21</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3">  Other: </div>
                                                    <div class="col-md-9"><input type="text" width=""
                                                             name="bahagianA[1][21]"
                                                            id="" class="form-control" value="{{$detail1[0]->bahagian_a_21}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cover"><input class="Cover14"
                                                    onchange="handleCheckboxChange('Cover14')" type="checkbox"
                                                    name="bahagianA[2][21]" id="" value="ok" @if($detail1[1]) @checked($detail1[1]->bahagian_a_21 == 'ok') @endif></td>
                                            <td class="cover"><input class="Cover14"
                                                    onchange="handleCheckboxChange('Cover14')" type="checkbox"
                                                    name="bahagianA[2][21]" id="" value="ng" @if($detail1[1]) @checked($detail1[1]->bahagian_a_21 == 'ng') @endif></td>
                                            <td class="cover"><input class="Cover14"
                                                    onchange="handleCheckboxChange('Cover14')" type="checkbox"
                                                    name="bahagianA[2][21]" id="" value="na" @if($detail1[1]) @checked($detail1[1]->bahagian_a_21 == 'na') @endif></td>
                                            <td class="text endpaper"><input class="Text19"
                                                    onchange="handleCheckboxChange('Text19')" type="checkbox"
                                                    name="bahagianA[3][21]" id="" value="ok" @if($detail1[2]) @checked($detail1[2]->bahagian_a_21 == 'ok') @endif></td>
                                            <td class="text endpaper"><input class="Text19"
                                                    onchange="handleCheckboxChange('Text19')" type="checkbox"
                                                    name="bahagianA[3][21]" id="" value="ng" @if($detail1[2]) @checked($detail1[2]->bahagian_a_21 == 'ng') @endif></td>
                                            <td class="text endpaper"><input class="Text19"
                                                    onchange="handleCheckboxChange('Text19')" type="checkbox"
                                                    name="bahagianA[3][21]" id="" value="na" @if($detail1[2]) @checked($detail1[2]->bahagian_a_21 == 'na') @endif></td>
                                            <td class="endpaper"><input class="Endpaper11"
                                                    onchange="handleCheckboxChange('Endpaper11')" type="checkbox"
                                                    name="bahagianA[4][21]" id="" value="ok" @if($detail1[3]) @checked($detail1[3]->bahagian_a_21 == 'ok') @endif></td>
                                            <td class="endpaper"><input class="Endpaper11"
                                                    onchange="handleCheckboxChange('Endpaper11')" type="checkbox"
                                                    name="bahagianA[4][21]" id="" value="ng" @if($detail1[3]) @checked($detail1[3]->bahagian_a_21 == 'ng') @endif>
                                            </td>
                                            <td class="endpaper"><input class="Endpaper11"
                                                    onchange="handleCheckboxChange('Endpaper11')" type="checkbox"
                                                    name="bahagianA[4][21]" id="" value="na" @if($detail1[3]) @checked($detail1[3]->bahagian_a_21 == 'na') @endif></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <h5>Bahagian B (Semakan imposition)</h5>
                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="col-md-4 text">
                                        <div class="form-group">
                                            <label for="">Saiz kertas cetak teks (inci)</label>
                                            <input type="text"  name="bahagian_b_1"
                                                id="" class="form-control"
                                                value="{{ $senari_semak_cetak->bahagian_b_1 }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 text">
                                        <div class="form-group">
                                            <label for="">Saiz spacing (mm)</label>
                                            <input type="text"  name="bahagian_b_2"
                                                id="" class="form-control"
                                                value="{{ $senari_semak_cetak->bahagian_b_2 }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4 cover">
                                        <div class="form-group">
                                            <label for="">Saiz kertas cetak cover (inci)</label>
                                            <input type="text"  name="bahagian_b_3"
                                                id="" class="form-control"
                                                value="{{ $senari_semak_cetak->bahagian_b_3 }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 cover">
                                        <div class="form-group">
                                            <label for="">Saiz spacing (mm)</label>
                                            <input type="text"  name="bahagian_b_4"
                                                id="" class="form-control"
                                                value="{{ $senari_semak_cetak->bahagian_b_4 }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 endpaper">
                                        <div class="form-group">
                                            <label for="">Saiz kertas cetak endpaper (inci)</label>
                                            <input type="text"  name="bahagian_b_5"
                                                id="" class="form-control"
                                                value="{{ $senari_semak_cetak->bahagian_b_5 }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 endpaper">
                                        <div class="form-group">
                                            <label for="">Saiz spacing (mm)</label>
                                            <input type="text"  name="bahagian_b_6"
                                                id="" class="form-control"
                                                value="{{ $senari_semak_cetak->bahagian_b_6 }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="col-md-4 text">
                                        <div class="form-group">
                                            <label for="">Saiz kawasan cetakan teks (inci)</label>
                                            <input type="text" name="bahagian_b_7"
                                                id="" class="form-control"
                                                value="{{ $senari_semak_cetak->bahagian_b_7 }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 cover">
                                        <div class="form-group">
                                            <label for="">Saiz kawasan cetakan cover (inci)</label>
                                            <input type="text" name="bahagian_b_8"
                                                id="" class="form-control"
                                                value="{{ $senari_semak_cetak->bahagian_b_8 }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 endpaper">
                                        <div class="form-group">
                                            <label for="">Saiz kawasan cetakan endpaper (inci)</label>
                                            <input type="text" name="bahagian_b_9"
                                                id="" class="form-control"
                                                value="{{ $senari_semak_cetak->bahagian_b_9 }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4 text">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="bahagian_b_p4_1" id=""
                                                        @checked($senari_semak_cetak->bahagian_b_p4_1 != null)>
                                                </div>
                                                <div class="col-md-2">
                                                    <p>P4</p>
                                                </div>
                                                <div class="col-md-6">Max: 900mm X 615mm</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 cover">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="bahagian_b_p4_2" id=""
                                                        @checked($senari_semak_cetak->bahagian_b_p4_2 != null)>
                                                </div>
                                                <div class="col-md-2">
                                                    <p>P4</p>
                                                </div>
                                                <div class="col-md-6">Max: 900mm X 615mm</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 endpaper">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="bahagian_b_p4_3" id=""
                                                        @checked($senari_semak_cetak->bahagian_b_p4_3 != null)>
                                                </div>
                                                <div class="col-md-2">
                                                    <p>P4</p>
                                                </div>
                                                <div class="col-md-6">Max: 900mm X 615mm</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">

                                    <div class="col-md-4 text">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="bahagian_b_p3_1" id=""
                                                        @checked($senari_semak_cetak->bahagian_b_p3_1 != null)>
                                                </div>
                                                <div class="col-md-2">
                                                    <p>P3</p>
                                                </div>
                                                <div class="col-md-6">Max: 1010mm X 715mm</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 cover">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="bahagian_b_p3_2" id=""
                                                        @checked($senari_semak_cetak->bahagian_b_p3_2 != null)>
                                                </div>
                                                <div class="col-md-2">
                                                    <p>P3</p>
                                                </div>
                                                <div class="col-md-6">Max: 1010mm X 715mm</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 endpaper">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="bahagian_b_p3_3" id=""
                                                        @checked($senari_semak_cetak->bahagian_b_p3_3 != null)>
                                                </div>
                                                <div class="col-md-2">
                                                    <p>P3</p>
                                                </div>
                                                <div class="col-md-6">Max: 1010mm X 715mm</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">

                                    <div class="col-md-4 text">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="bahagian_b_p1_1" id=""
                                                        @checked($senari_semak_cetak->bahagian_b_p1_1 != null)>
                                                </div>
                                                <div class="col-md-2">
                                                    <p>P1</p>
                                                </div>
                                                <div class="col-md-6">Max: 1010mm X 715mm</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th rowspan="2">Item</th>
                                    <th colspan="3">Pemeriksaan dummy lipatan bercetak</th>
                                    <th colspan="3">Front and Back imposition (Rujuk dummy)</th>
                                    <th colspan="3">Kedudukan imposition (Rujuk dummy)</th>
                                    <th colspan="3">Saiz spacing (Bandingkan file imposition dengan rujukan TCSB-AK49)</th>
                                    <th colspan="3">Printing method (straight@Perfecting) (Rujuk file imposition)</th>
                                    <th colspan="2" rowspan="2">No of up/ cavity (Sila nyatakan)</th>
                                </tr>
                                <tr>
                                    <td>OK</td>
                                    <td>NG</td>
                                    <td>NA</td>
                                    <td>OK</td>
                                    <td>NG</td>
                                    <td>NA</td>
                                    <td>OK</td>
                                    <td>NG</td>
                                    <td>NA</td>
                                    <td>OK</td>
                                    <td>NG</td>
                                    <td>NA</td>
                                    <td>OK</td>
                                    <td>NG</td>
                                    <td>NA</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail2 as $key => $bahagian_c)
                                    <tr
                                        @if ($key == 0) class="cover" @elseif($key == 1)  class="endpaper" @else  class="section" @endif>
                                        <td>
                                            @if ($key == 0)
                                                Cover
                                            @elseif($key == 1)
                                                End/Leftlet
                                            @else
                                                Section {{ $key - 1 }}
                                            @endif
                                        </td>
                                        <td><input type="checkbox" name="bahagianC[{{ $key + 1 }}][1]"
                                                id="" value="ok" @checked($bahagian_c->bahagian_c_1 == 'ok')></td>
                                        <td><input type="checkbox" name="bahagianC[{{ $key + 1 }}][1]"
                                                id="" value="ng" @checked($bahagian_c->bahagian_c_1 == 'ng')></td>
                                        <td><input type="checkbox" name="bahagianC[{{ $key + 1 }}][1]"
                                                id="" value="na" @checked($bahagian_c->bahagian_c_1 == 'na')></td>
                                        <td><input type="checkbox" name="bahagianC[{{ $key + 1 }}][2]"
                                                id="" value="ok" @checked($bahagian_c->bahagian_c_2 == 'ok')></td>
                                        <td><input type="checkbox" name="bahagianC[{{ $key + 1 }}][2]"
                                                id="" value="ng" @checked($bahagian_c->bahagian_c_2 == 'ng')></td>
                                        <td><input type="checkbox" name="bahagianC[{{ $key + 1 }}][2]"
                                                id="" value="na" @checked($bahagian_c->bahagian_c_2 == 'na')></td>
                                        <td><input type="checkbox" name="bahagianC[{{ $key + 1 }}][3]"
                                                id="" value="ok" @checked($bahagian_c->bahagian_c_3 == 'ok')></td>
                                        <td><input type="checkbox" name="bahagianC[{{ $key + 1 }}][3]"
                                                id="" value="ng" @checked($bahagian_c->bahagian_c_3 == 'ng')></td>
                                        <td><input type="checkbox" name="bahagianC[{{ $key + 1 }}][3]"
                                                id="" value="na" @checked($bahagian_c->bahagian_c_3 == 'na')></td>
                                        <td><input type="checkbox" name="bahagianC[{{ $key + 1 }}][4]"
                                                id="" value="ok" @checked($bahagian_c->bahagian_c_4 == 'ok')></td>
                                        <td><input type="checkbox" name="bahagianC[{{ $key + 1 }}][4]"
                                                id="" value="ng" @checked($bahagian_c->bahagian_c_4 == 'ng')></td>
                                        <td><input type="checkbox" name="bahagianC[{{ $key + 1 }}][4]"
                                                id="" value="na" @checked($bahagian_c->bahagian_c_4 == 'na')></td>
                                        <td><input type="checkbox" name="bahagianC[{{ $key + 1 }}][5]"
                                                id="" value="ok" @checked($bahagian_c->bahagian_c_5 == 'ok')></td>
                                        <td><input type="checkbox" name="bahagianC[{{ $key + 1 }}][5]"
                                                id="" value="ng" @checked($bahagian_c->bahagian_c_5 == 'ng')></td>
                                        <td><input type="checkbox" name="bahagianC[{{ $key + 1 }}][5]"
                                                id="" value="na" @checked($bahagian_c->bahagian_c_5 == 'na')></td>
                                        <td><input type="text"
                                                name="bahagianC[{{ $key + 1 }}][6]" id=""
                                                class="form-control" value="{{ $bahagian_c->bahagian_c_6 }}"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <h5>
                                    Gripper margin (Rujuk file imposition)
                                </h5>

                                <div class="row mt-2">
                                    <div class="col-md-4 cover">
                                        <div class="form-group">
                                            <label for="">Cover</label>
                                            <input type="text"  class="form-control"
                                                name="gripper_margin_cover" id=""
                                                value="{{ $senari_semak_cetak->gripper_margin_cover }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 text">
                                        <div class="form-group">
                                            <label for="">Teks</label>
                                            <input type="text"  class="form-control"
                                                name="gripper_margin_teks" id=""
                                                value="{{ $senari_semak_cetak->gripper_margin_teks }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 endpaper">
                                        <div class="form-group">
                                            <label for="">Endpaper/Leaflet</label>
                                            <input type="text"  class="form-control"
                                                name="gripper_margin_leaflet" id=""
                                                value="{{ $senari_semak_cetak->gripper_margin_leaflet }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h3><b>Verified By</b></h3>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Username</th>
                                            <th>Designation</th>
                                            <th>Department</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $senari_semak_cetak->verified_by_date }}</td>
                                            <td>{{ $senari_semak_cetak->verified_by_user }}</td>
                                            <td>{{ $senari_semak_cetak->verified_by_designation }}</td>
                                            <td>{{ $senari_semak_cetak->verified_by_department }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>NOTA:</h5>
                                        <p>1. Rujukan Kriteria dan spesifikasi Pemeriksaan File di CTP <br>
                                            2. Makluman kepada Pembantu Tadbir dan Pengurus Operasi jika spesifikasi file
                                            artwork tidak sama dengan spesifikasi pada TMS</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('senari_semak_cetak') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
        </div>
        </div>
@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#sale_order').trigger('change');
            $('#Cover').trigger('change');
            $('#Endpaper').trigger('change');
            $('input').attr('disabled', 'disabled');
            $('input[type="hidden"]').removeAttr('disabled');
        });

        $(document).on('change', '#Cover', function() {
            if (!$(this).prop('checked')) {
                $('.cover').css('display', 'none')
            } else {
                $('.cover').css('display', '')
            }
        })

        $(document).on('change', '#Endpaper', function() {
            if (!$(this).prop('checked')) {
                $('.endpaper').css('display', 'none')
            } else {
                $('.endpaper').css('display', '')
            }
        })

        $(document).on('change keyup', '#Text', function() {
            var value = +$(this).val();
            if (value == 0) {
                $('.text').css('display', 'none');
                $('.section').css('display', 'none');
            } else if (value > 0) {
                $('.text').css('display', '');
                $('.section').css('display', '');
                if ($("#table tbody tr.section").length > 0) {
                    length = $("#table tbody tr.section").length;
                    if (length == 1 || length < value) {
                        length = length + 1
                    }
                } else {
                    length = 1;
                }
                if (value > 0 && value < length) {
                    var currentLength = length - value;
                    for (let i = currentLength; i > 0; i--) {
                        $('#table tbody tr.section:last').remove();
                    }
                } else {
                    for (let i = length; i <= value; i++) {
                        $key = $('#table tbody tr').length + 1;
                        $('#table tbody').append(`<tr class="section">
                                     <td>Section ${i}</td>
                                     <td><input type="checkbox" name="bahagianC[${$key}][1]" id="" value="ok"></td>
                                     <td><input type="checkbox" checked name="bahagianC[${$key}][1]" id="" value="ng"></td>
                                     <td><input type="checkbox" name="bahagianC[${$key}][1]" id="" value="na"></td>
                                     <td><input type="checkbox" name="bahagianC[${$key}][2]" id="" value="ok"></td>
                                     <td><input type="checkbox" checked name="bahagianC[${$key}][2]" id="" value="ng"></td>
                                     <td><input type="checkbox" name="bahagianC[${$key}][2]" id="" value="na"></td>
                                     <td><input type="checkbox" name="bahagianC[${$key}][3]" id="" value="ok"></td>
                                     <td><input type="checkbox" checked name="bahagianC[${$key}][3]" id="" value="ng"></td>
                                     <td><input type="checkbox" name="bahagianC[${$key}][3]" id="" value="na"></td>
                                     <td><input type="checkbox" name="bahagianC[${$key}][4]" id="" value="ok"></td>
                                     <td><input type="checkbox" checked name="bahagianC[${$key}][4]" id="" value="ng"></td>
                                     <td><input type="checkbox" name="bahagianC[${$key}][4]" id="" value="na"></td>
                                     <td><input type="checkbox" name="bahagianC[${$key}][5]" id="" value="ok"></td>
                                     <td><input type="checkbox" checked name="bahagianC[${$key}][5]" id="" value="ng"></td>
                                     <td><input type="checkbox" name="bahagianC[${$key}][5]" id="" value="na"></td>
                                     <td><input type="text" placeholder="input text" name="bahagianC[${$key}][6]" id="" class="form-control"></td>
                                 </tr>`);



                    }
                }

            }
        })
    </script>
@endpush
