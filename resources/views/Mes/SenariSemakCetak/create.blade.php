@extends('layouts.app')
@section('css')
<style>
        table th{
                text-align:left;
        }
</style>
@endsection
@section('content')
<form action="{{ route('senari_semak_cetak.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                                <div class="row">
                                <div class="col-md-12">
                                    <h5 class="float-left">Senarai Semak Pra Cetak</h5>
                                    <p class="float-right">TCSB-BO4 (Rev.11)</p>
                                </div>
                               </div>
                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Sale Order NO.</div>
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
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Date</div>
                                        <input type="text" name="date" value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">kod Buku</div>
                                        <input type="text" readonly value="" name="" id="kod_buku" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text" readonly value="" name="" id="tajuk" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Time</div>
                                        <input name="time" type="time" id="Currenttime"
                                            value="{{ Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('H:i') }}"
                                            class="form-control">
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

                                                    <td><input type="checkbox" name="item_cover_availibility" @checked(old('item_cover_availibility') == 'on') @if(old('item_cover_availibility') == 'on')  @else checked @endif
                                                            id="Cover">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>End/Leaflet</td>
                                                    <td><input type="checkbox" name="item_leaflet_availibility" @checked(old('item_leaflet_availibility') == 'on') @if(old('item_leaflet_availibility') == 'on')  @else checked @endif
                                                            id="Endpaper">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Section No</td>
                                                    <td><input type="number" class="form-control" value="{{ old('item_cover_text') }}"
                                                            name="item_cover_text" min="1"  id="Text"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>

                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Checked By</div>
                                        <input type="text" value="{{ Auth::user()->user_name }}" readonly
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
                                        <th rowspan="2">
                                            <div class="text-center">kriteria</div>
                                        </th>
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
                                        <td class="cover"><input type="checkbox" class="Cover1" value="ok" name="bahagianA[2][1]" @checked(old('bahagianA.2.1') == 'ok')
                                                onchange="handleCheckboxChange('Cover1',this)">
                                        </td>
                                        <td class="cover"><input type="checkbox" class="Cover1"
                                                onchange="handleCheckboxChange('Cover1',this)"
                                                name="bahagianA[2][1]" id="" value="ng" @checked(old('bahagianA.2.1') != 'ok' && old('bahagianA.2.1') != 'na')></td>
                                        <td class="cover"><input type="checkbox" class="Cover1"
                                                onchange="handleCheckboxChange('Cover1',this)" name="bahagianA[2][1]"
                                                id="" value="na"  @checked(old('bahagianA.2.1') == 'na')></td>

                                        <td class="text"><input type="checkbox" class="Text1" @checked(old('bahagianA.3.1') == 'ok')
                                                onchange="handleCheckboxChange('Text1',this)" name="bahagianA[3][1]"
                                                id="" value="ok"></td>
                                        <td class="text"><input type="checkbox" class="Text1" @checked(old('bahagianA.3.1') != 'ok' && old('bahagianA.3.1') != 'na')
                                                onchange="handleCheckboxChange('Text1',this)"
                                                name="bahagianA[3][1]" id="" value="ng"></td>
                                        <td class="text"><input type="checkbox" class="Text1" @checked(old('bahagianA.3.1') == 'na')
                                                onchange="handleCheckboxChange('Text1',this)" name="bahagianA[3][1]"
                                                id="" value="na"></td>
                                        <td class="endpaper"><input type="checkbox" class="Endpaper1"
                                                onchange="handleCheckboxChange('Endpaper1',this)" name="bahagianA[4][1]" @checked(old('bahagianA.4.1') == 'ok')
                                                id="" value="ok"></td>
                                        <td class="endpaper"><input type="checkbox" class="Endpaper1"  @checked(old('bahagianA.4.1') != 'ok' && old('bahagianA.4.1') != 'na')
                                                onchange="handleCheckboxChange('Endpaper1',this)"
                                                name="bahagianA[4][1]" id="" value="ng"></td>
                                        <td class="endpaper"><input type="checkbox" class="Endpaper1"  @checked(old('bahagianA.4.1') == 'na')
                                                onchange="handleCheckboxChange('Endpaper1',this)" name="bahagianA[4][1]"
                                                id="" value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jumlah Warna (bandingkan TMS dan file artwork)</td>
                                        <td class="cover"><input type="checkbox" class="Cover2" @checked(old('bahagianA.2.2') == 'ok')
                                                onchange="handleCheckboxChange('Cover2',this)" name="bahagianA[2][2]"
                                                id="" value="ok"></td>
                                        <td class="cover"><input type="checkbox" class="Cover2" @checked(old('bahagianA.2.2') != 'ok' && old('bahagianA.2.2') != 'na')
                                                onchange="handleCheckboxChange('Cover2',this)"
                                                name="bahagianA[2][2]" id="" value="ng"></td>
                                        <td class="cover"><input type="checkbox" class="Cover2" @checked(old('bahagianA.2.2') == 'na')
                                                onchange="handleCheckboxChange('Cover2',this)" name="bahagianA[2][2]"
                                                id="" value="na"></td>
                                        <td class="text"><input type="checkbox" class="Text2"
                                                onchange="handleCheckboxChange('Text2',this)" name="bahagianA[3][2]" @checked(old('bahagianA.3.2') == 'ok')
                                                id="" value="ok"></td>
                                        <td class="text"><input type="checkbox" class="Text2" @checked(old('bahagianA.3.2') != 'ok' && old('bahagianA.3.2') != 'na')
                                                onchange="handleCheckboxChange('Text2',this)"
                                                name="bahagianA[3][2]" id="" value="ng"></td>
                                        <td class="text"><input type="checkbox" class="Text2" @checked(old('bahagianA.3.2') == 'na')
                                                onchange="handleCheckboxChange('Text2',this)" name="bahagianA[3][2]"
                                                id="" value="na"></td>
                                        <td class="endpaper"><input type="checkbox" class="Endpaper2" @checked(old('bahagianA.4.2') == 'ok')
                                                onchange="handleCheckboxChange('Endpaper2',this)" name="bahagianA[4][2]"
                                                id="" value="ok"></td>
                                        <td class="endpaper"><input type="checkbox" class="Endpaper2" @checked(old('bahagianA.4.2') != 'ok' && old('bahagianA.4.2') != 'na')
                                                onchange="handleCheckboxChange('Endpaper2',this)"
                                                name="bahagianA[4][2]" id="" value="ng"></td>
                                        <td class="endpaper"><input type="checkbox" class="Endpaper2" @checked(old('bahagianA.4.2') == 'na')
                                                onchange="handleCheckboxChange('Endpaper2',this)" name="bahagianA[4][2]"
                                                id="" value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Saiz product (bandingkan TMS dan file artwork)</td>
                                        <td class="cover" colspan="3"><input type="text" class="Cover3" value="{{ old('bahagianA.2.3') }}"
                                                onchange="handleCheckboxChange('Cover3',this)"
                                                class="form-control" name="bahagianA[2][3]" id=""></td>
                                        <td class="text" colspan="3"><input type="text" class="Text3"
                                                onchange="handleCheckboxChange('Text3',this)" value="{{ old('bahagianA.3.3') }}"
                                                class="form-control" name="bahagianA[3][3]" id=""></td>
                                        <td class="endpaper" colspan="3"><input type="text" class="Endpaper3"
                                                onchange="handleCheckboxChange('Endpaper3',this)" value="{{ old('bahagianA.4.3') }}"
                                                class="form-control" name="bahagianA[4][3]"
                                                id=""></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Design clearance 8mm (stitching binding)</td>
                                        <td class="cover" colspan="3"><input type="text" readonly
                                                name="bahagianA[2][4]" class="form-control"
                                                id=""></td>
                                        <td class="text endpaper"><input type="checkbox" class="Text4"  @checked(old('bahagianA.3.4') == 'ok')
                                                onchange="handleCheckboxChange('Text4',this)" name="bahagianA[3][4]"
                                                id="" value="ok"></td>
                                        <td class="text endpaper"><input type="checkbox" class="Text4" @checked(old('bahagianA.3.4') != 'ok' && old('bahagianA.3.4') != 'na')
                                                onchange="handleCheckboxChange('Text4',this)"
                                                 name="bahagianA[3][4]" id="" value="ng"></td>
                                        <td class="text endpaper"><input type="checkbox" class="Text4" @checked(old('bahagianA.3.4') == 'na')
                                                onchange="handleCheckboxChange('Text4',this)" name="bahagianA[3][4]"
                                                id="" value="na"></td>
                                        <td class="endpaper" colspan="3"><input readonly type="text"
                                               class="form-control"
                                                name="bahagianA[4][4]"  id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Bleed (3mm keatas)</td>
                                        <td class="cover"><input type="checkbox" class="Cover5"
                                                onchange="handleCheckboxChange('Cover5',this)" name="bahagianA[2][5]" @checked(old('bahagianA.2.5') == 'ok')
                                                id="" value="ok"></td>
                                        <td class="cover"><input type="checkbox" class="Cover5"
                                                onchange="handleCheckboxChange('Cover5',this)" @checked(old('bahagianA.2.5') != 'ok' && old('bahagianA.2.5') != 'na')
                                                name="bahagianA[2][5]" id="" value="ng"></td>
                                        <td class="cover"><input type="checkbox" class="Cover5"
                                                onchange="handleCheckboxChange('Cover5',this)" name="bahagianA[2][5]" @checked(old('bahagianA.2.5') == 'na')
                                                id="" value="na"></td>
                                        <td class="text"><input type="checkbox" class="Text5"
                                                onchange="handleCheckboxChange('Text5',this)" name="bahagianA[3][5]"  @checked(old('bahagianA.3.5') == 'ok')
                                                id="" value="ok"></td>
                                        <td class="text"><input type="checkbox" class="Text5"
                                                onchange="handleCheckboxChange('Text5',this)" @checked(old('bahagianA.3.5') != 'ok' && old('bahagianA.3.5') != 'na')
                                                name="bahagianA[3][5]" id="" value="ng"></td>
                                        <td class="text"><input type="checkbox" class="Text5"
                                                onchange="handleCheckboxChange('Text5',this)" name="bahagianA[3][5]"  @checked(old('bahagianA.3.5') == 'na')
                                                id="" value="na"></td>
                                        <td class="endpaper"><input type="checkbox" class="Endpaper5"
                                                onchange="handleCheckboxChange('Endpaper5',this)" name="bahagianA[4][5]" @checked(old('bahagianA.4.5') == 'ok')
                                                id="" value="ok"></td>
                                        <td class="endpaper"><input type="checkbox" class="Endpaper5"
                                                onchange="handleCheckboxChange('Endpaper5',this)" @checked(old('bahagianA.4.5') != 'ok' && old('bahagianA.4.5') != 'na')
                                                name="bahagianA[4][5]" id="" value="ng"></td>
                                        <td class="endpaper"><input type="checkbox" class="Endpaper5"
                                                onchange="handleCheckboxChange('Endpaper5',this)" name="bahagianA[4][5]" @checked(old('bahagianA.4.5') == 'na')
                                                id="" value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Hotstamping/Spot UV Image overprint</td>
                                        <td class="cover"><input type="checkbox" class="Cover6"
                                                onchange="handleCheckboxChange('Cover6',this)" name="bahagianA[2][6]" @checked(old('bahagianA.2.6') == 'ok')
                                                id="" value="ok"></td>
                                        <td class="cover"><input type="checkbox" class="Cover6"
                                                onchange="handleCheckboxChange('Cover6',this)" @checked(old('bahagianA.2.6') != 'ok' && old('bahagianA.2.6') != 'na')
                                                name="bahagianA[2][6]" id="" value="ng"></td>
                                        <td class="cover"><input type="checkbox" class="Cover6"
                                                onchange="handleCheckboxChange('Cover6',this)" name="bahagianA[2][6]" @checked(old('bahagianA.2.6') == 'na')
                                                id="" value="na"></td>
                                        <td class="text" colspan="3"><input type="text" class="form-control" readonly value="{{ old('bahagianA.3.6') }}"
                                                name="bahagianA[3][6]" id="">
                                        </td>
                                        <td class="endpaper" colspan="3"><input type="text" class="form-control" value="{{ old('bahagianA.4.6') }}"
                                                readonly name="bahagianA[4][6]" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Saiz spine (buat kiraan mengikut formula)</td>
                                        <td class="cover"><input class="Cover7"
                                                onchange="handleCheckboxChange('Cover7',this)" type="checkbox" @checked(old('bahagianA.2.7') == 'ok')
                                                name="bahagianA[2][7]" id="" value="ok"></td>
                                        <td class="cover"><input class="Cover7"
                                                onchange="handleCheckboxChange('Cover7',this)" type="checkbox" @checked(old('bahagianA.2.7') != 'ok' && old('bahagianA.2.7') != 'na')
                                                name="bahagianA[2][7]" id="" value="ng"></td>
                                        <td class="cover"><input class="Cover7"
                                                onchange="handleCheckboxChange('Cover7',this)" type="checkbox" @checked(old('bahagianA.2.7') == 'na')
                                                name="bahagianA[2][7]" id="" value="na"></td>
                                        <td class="text" colspan="3"><input type="text" class="form-control" readonly
                                                name="bahagianA[3][7]" id="">
                                        </td>
                                        <td class="endpaper" colspan="3"><input type="text" class="form-control"
                                                readonly name="bahagianA[4][7]" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Alamat pencetak</td>
                                        <td class="cover" colspan="3"><input type="text" class="form-control" readonly
                                                name="bahagianA[2][8]" id="">
                                        </td>
                                        <td class="text"><input class="Text6"
                                                onchange="handleCheckboxChange('Text6',this)" type="checkbox" @checked(old('bahagianA.3.8') == 'ok')
                                                name="bahagianA[3][8]" id="" value="ok"></td>
                                        <td class="text"><input class="Text6"
                                                onchange="handleCheckboxChange('Text6',this)" type="checkbox" @checked(old('bahagianA.3.8') != 'ok' && old('bahagianA.3.8') != 'na')
                                                name="bahagianA[3][8]" id="" value="ng"></td>
                                        <td class="text"><input class="Text6"
                                                onchange="handleCheckboxChange('Text6',this)" type="checkbox" @checked(old('bahagianA.3.8') == 'na')
                                                name="bahagianA[3][8]" id="" value="na"></td>
                                        <td class="endpaper" colspan="3"><input type="text" class="form-control"
                                                readonly name="bahagianA[4][8]" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Cetakan (Sila nyatakan)</td>
                                        <td class="cover" colspan="3"><input type="text" class="form-control" readonly
                                                name="bahagianA[2][9]" id="">
                                        </td>
                                        <td class="text"><input class="Text7"
                                                onchange="handleCheckboxChange('Text7',this)" type="checkbox" @checked(old('bahagianA.3.9') == 'ok')
                                                name="bahagianA[3][9]" id="" value="ok"></td>
                                        <td class="text"><input class="Text7"
                                                onchange="handleCheckboxChange('Text7',this)" type="checkbox" @checked(old('bahagianA.3.9') != 'ok' && old('bahagianA.3.9') != 'na')
                                                name="bahagianA[3][9]" id="" value="ng"></td>
                                        <td class="text"><input class="Text7"
                                                onchange="handleCheckboxChange('Text7',this)" type="checkbox" @checked(old('bahagianA.3.9') == 'na')
                                                name="bahagianA[3][9]" id="" value="na"></td>
                                        <td class="endpaper" colspan="3"><input type="text" class="form-control"
                                                readonly name="bahagianA[4][9]" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Jumlah mukasurat (bandingkan TMS dan file artwork)</td>
                                        <td class="cover" colspan="3"><input type="text" class="form-control" readonly
                                                name="bahagianA[2][10]" id="">
                                        </td>
                                        <td class="text"><input class="Text8"
                                                onchange="handleCheckboxChange('Text8',this)" type="checkbox" @checked(old('bahagianA.3.10') == 'ok')
                                                name="bahagianA[3][10]" id="" value="ok"></td>
                                        <td class="text"><input class="Text8"
                                                onchange="handleCheckboxChange('Text8',this)" type="checkbox" @checked(old('bahagianA.3.10') != 'ok' && old('bahagianA.3.10') != 'na')
                                                name="bahagianA[3][10]" id="" value="ng"></td>
                                        <td class="text"><input class="Text8"
                                                onchange="handleCheckboxChange('Text8',this)" type="checkbox" @checked(old('bahagianA.3.10') == 'na')
                                                name="bahagianA[3][10]" id="" value="na"></td>
                                        <td class="endpaper" colspan="3"><input type="text" class="form-control"
                                                readonly name="bahagianA[4][10]" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Turutan mukasurat (berturutan)</td>
                                        <td class="cover" colspan="3"><input type="text" class="form-control" readonly
                                                name="bahagianA[2][11]" id="">
                                        </td>
                                        <td class="text"><input class="Text9"
                                                onchange="handleCheckboxChange('Text9',this)" type="checkbox" @checked(old('bahagianA.3.11') == 'ok')
                                                name="bahagianA[3][11]" id="" value="ok"></td>
                                        <td class="text"><input class="Text9"
                                                onchange="handleCheckboxChange('Text9',this)" type="checkbox" @checked(old('bahagianA.3.11') != 'ok' && old('bahagianA.3.11') != 'na')
                                                name="bahagianA[3][11]" id="" value="ng"></td>
                                        <td class="text"><input class="Text9"
                                                onchange="handleCheckboxChange('Text9',this)" type="checkbox" @checked(old('bahagianA.3.11') == 'na')
                                                name="bahagianA[3][11]" id="" value="na"></td>
                                        <td class="endpaper" colspan="3"><input type="text" class="form-control"
                                                readonly name="bahagianA[4][11]" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Dummy lipat (dummy kosong untuk job baharu sahaja)</td>
                                        <td class="cover" colspan="3"><input type="text" class="form-control" readonly
                                                name="bahagianA[2][12]" id="">
                                        </td>
                                        <td class="text"><input class="Text10"
                                                onchange="handleCheckboxChange('Text10',this)" type="checkbox" @checked(old('bahagianA.3.12') == 'ok')
                                                name="bahagianA[3][12]" id="" value="ok"></td>
                                        <td class="text"><input class="Text10"
                                                onchange="handleCheckboxChange('Text10',this)" type="checkbox" @checked(old('bahagianA.3.12') != 'ok' && old('bahagianA.3.12') != 'na')
                                                name="bahagianA[3][12]" id="" value="ng"></td>
                                        <td class="text"><input class="Text10"
                                                onchange="handleCheckboxChange('Text10',this)" type="checkbox" @checked(old('bahagianA.3.12') == 'na')
                                                name="bahagianA[3][12]" id="" value="na"></td>
                                        <td class="endpaper" colspan="3"><input type="text" class="form-control"
                                                readonly name="bahagianA[4][12]" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Kedudukan artwork cover yang centre (softcover)</td>
                                        <td class="cover" colspan="3"><input type="text" class="form-control" readonly
                                                name="bahagianA[2][13]" id="">
                                        </td>
                                        <td class="text"><input class="Text11"
                                                onchange="handleCheckboxChange('Text11',this)" type="checkbox"  @checked(old('bahagianA.3.13') == 'ok')
                                                name="bahagianA[3][13]" id="" value="ok"></td>
                                        <td class="text"><input class="Text11"
                                                onchange="handleCheckboxChange('Text11',this)" type="checkbox"  @checked(old('bahagianA.3.13') != 'ok' && old('bahagianA.3.13') != 'na')
                                                name="bahagianA[3][13]" id="" value="ng"></td>
                                        <td class="text"><input class="Text11"
                                                onchange="handleCheckboxChange('Text11',this)" type="checkbox" @checked(old('bahagianA.3.13') == 'na')
                                                name="bahagianA[3][13]" id="" value="na"></td>
                                        <td class="endpaper" colspan="3"><input type="text" class="form-control"
                                                readonly name="bahagianA[4][13]" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Kedudukan artwork cover yang centre (hardcover)</td>
                                        <td class="cover" colspan="3"><input type="text" class="form-control" readonly
                                                name="bahagianA[2][14]" id="">
                                        </td>
                                        <td class="text"><input class="Text12"
                                                onchange="handleCheckboxChange('Text12',this)" type="checkbox" @checked(old('bahagianA.3.14') == 'ok')
                                                name="bahagianA[3][14]" id="" value="ok"></td>
                                        <td class="text"><input class="Text12"
                                                onchange="handleCheckboxChange('Text12',this)" type="checkbox" @checked(old('bahagianA.3.14') != 'ok' && old('bahagianA.3.14') != 'na')
                                                name="bahagianA[3][14]" id="" value="ng"></td>
                                        <td class="text"><input class="Text12"
                                                onchange="handleCheckboxChange('Text12',this)" type="checkbox" @checked(old('bahagianA.3.14') == 'na')
                                                name="bahagianA[3][14]" id="" value="na"></td>
                                        <td class="endpaper" colspan="3"><input type="text" class="form-control"
                                                readonly name="bahagianA[4][14]" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>Jenis Penjilidan</td>
                                        <td class="cover"><input class="Cover8"
                                                onchange="handleCheckboxChange('Cover8',this)" type="checkbox"  @checked(old('bahagianA.2.15') == 'ok')
                                                name="bahagianA[2][15]" id="" value="ok"></td>
                                        <td class="cover"><input class="Cover8"
                                                onchange="handleCheckboxChange('Cover8',this)" type="checkbox" @checked(old('bahagianA.2.15') != 'ok' && old('bahagianA.2.15') != 'na')
                                                name="bahagianA[2][15]" id="" value="ng"></td>
                                        <td class="cover"><input class="Cover8"
                                                onchange="handleCheckboxChange('Cover8',this)" type="checkbox"  @checked(old('bahagianA.2.15') == 'na')
                                                name="bahagianA[2][15]" id="" value="na"></td>
                                        <td class="text"><input class="Text13"
                                                onchange="handleCheckboxChange('Text13',this)" type="checkbox"  @checked(old('bahagianA.3.15') == 'ok')
                                                name="bahagianA[3][15]" id="" value="ok"></td>
                                        <td class="text"><input class="Text13"
                                                onchange="handleCheckboxChange('Text13',this)" type="checkbox" @checked(old('bahagianA.3.15') != 'ok' && old('bahagianA.3.15') != 'na')
                                                name="bahagianA[3][15]" id="" value="ng"></td>
                                        <td class="text"><input class="Text13"
                                                onchange="handleCheckboxChange('Text13',this)" type="checkbox" @checked(old('bahagianA.3.15') == 'na')
                                                name="bahagianA[3][15]" id="" value="na"></td>
                                        <td class="endpaper"><input class="Endpaper6"
                                                onchange="handleCheckboxChange('Endpaper6',this)" type="checkbox" @checked(old('bahagianA.4.15') == 'ok')
                                                name="bahagianA[4][15]" id="" value="ok"></td>
                                        <td class="endpaper"><input class="Endpaper6"
                                                onchange="handleCheckboxChange('Endpaper6',this)" type="checkbox" @checked(old('bahagianA.4.15') != 'ok' && old('bahagianA.4.15') != 'na')
                                                 name="bahagianA[4][15]" id="" value="ng"></td>
                                        <td class="endpaper"><input class="Endpaper6"
                                                onchange="handleCheckboxChange('Endpaper6',this)" type="checkbox" @checked(old('bahagianA.4.15') == 'na')
                                                name="bahagianA[4][15]" id="" value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>16</td>
                                        <td>Jenis Kertas</td>
                                        <td class="cover"><input class="Cover9"
                                                onchange="handleCheckboxChange('Cover9',this)" type="checkbox" @checked(old('bahagianA.2.16') == 'ok')
                                                name="bahagianA[2][16]" id="" value="ok"></td>
                                        <td class="cover"><input class="Cover9"
                                                onchange="handleCheckboxChange('Cover9',this)" type="checkbox" @checked(old('bahagianA.2.16') != 'ok' && old('bahagianA.2.16') != 'na')
                                                name="bahagianA[2][16]" id="" value="ng"></td>
                                        <td class="cover"><input class="Cover9"
                                                onchange="handleCheckboxChange('Cover9',this)" type="checkbox" @checked(old('bahagianA.2.16') == 'na')
                                                name="bahagianA[2][16]" id="" value="na"></td>
                                        <td class="text"><input class="Text14"
                                                onchange="handleCheckboxChange('Text14',this)" type="checkbox" @checked(old('bahagianA.3.16') == 'ok')
                                                name="bahagianA[3][16]" id="" value="ok"></td>
                                        <td class="text"><input class="Text14"
                                                onchange="handleCheckboxChange('Text14',this)" type="checkbox" @checked(old('bahagianA.3.16') != 'ok' && old('bahagianA.3.16') != 'na')
                                                name="bahagianA[3][16]" id="" value="ng"></td>
                                        <td class="text"><input class="Text14"
                                                onchange="handleCheckboxChange('Text14',this)" type="checkbox" @checked(old('bahagianA.3.16') == 'na')
                                                name="bahagianA[3][16]" id="" value="na"></td>
                                        <td class="endpaper"><input class="Endpaper7"
                                                onchange="handleCheckboxChange('Endpaper7',this)" type="checkbox" @checked(old('bahagianA.4.16') == 'ok')
                                                name="bahagianA[4][16]" id="" value="ok"></td>
                                        <td class="endpaper"><input class="Endpaper7"
                                                onchange="handleCheckboxChange('Endpaper7',this)" type="checkbox" @checked(old('bahagianA.4.16') != 'ok' && old('bahagianA.4.16') != 'na')
                                                 name="bahagianA[4][16]" id="" value="ng"></td>
                                        <td class="endpaper"><input class="Endpaper7"
                                                onchange="handleCheckboxChange('Endpaper7',this)" type="checkbox" @checked(old('bahagianA.4.16') == 'na')
                                                name="bahagianA[4][16]" id="" value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>17</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-8">
                                                        <div class="row">

                                                                <div class="col-md-3">
                                                                        <label for="">Others</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                <input type="text" width="150px"
                                                                name="bahagianA[1][17]" id="" class="form-control textInput" style="width:200px;" value="{{ old('bahagianA.1.17') }}">
                                                                </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cover"><input class="Cover10"
                                                onchange="handleCheckboxChange('Cover10',this)" type="checkbox" @checked(old('bahagianA.2.17') == 'ok')
                                                name="bahagianA[2][17]" id="" value="ok"></td>
                                        <td class="cover"><input class="Cover10"
                                                onchange="handleCheckboxChange('Cover10',this,this)" type="checkbox" @checked(old('bahagianA.2.17') != 'ok' && old('bahagianA.2.17') != 'na')
                                                 name="bahagianA[2][17]" id="" value="ng"></td>
                                        <td class="cover"><input class="Cover10"
                                                onchange="handleCheckboxChange('Cover10',this)" type="checkbox" @checked(old('bahagianA.2.17') == 'na')
                                                name="bahagianA[2][17]" id="" value="na"></td>
                                        <td class="text endpaper"><input class="Text15"
                                                onchange="handleCheckboxChange('Text15',this)" type="checkbox" @checked(old('bahagianA.3.17') == 'ok')
                                                name="bahagianA[3][17]" id="" value="ok"></td>
                                        <td class="text endpaper"><input class="Text15"
                                                onchange="handleCheckboxChange('Text15',this)" type="checkbox" @checked(old('bahagianA.3.17') != 'ok' && old('bahagianA.3.17') != 'na')
                                                name="bahagianA[3][17]" id="" value="ng"></td>
                                        <td class="text endpaper"><input class="Text15"
                                                onchange="handleCheckboxChange('Text15',this)" type="checkbox" @checked(old('bahagianA.3.17') == 'na')
                                                name="bahagianA[3][17]" id="" value="na"></td>
                                        <td class="endpaper"><input class="Endpaper8"
                                                onchange="handleCheckboxChange('Endpaper8',this)" type="checkbox" @checked(old('bahagianA.4.17') == 'ok')
                                                name="bahagianA[4][17]" id="" value="nok"></td>
                                        <td class="endpaper"><input class="Endpaper8"
                                                onchange="handleCheckboxChange('Endpaper8',this)" type="checkbox" @checked(old('bahagianA.4.17') != 'ok' && old('bahagianA.4.17') != 'na')
                                                 name="bahagianA[4][17]" id="" value="ng"></td>
                                        <td class="endpaper"><input class="Endpaper8"
                                                onchange="handleCheckboxChange('Endpaper8',this)" type="checkbox" @checked(old('bahagianA.4.17') == 'na')
                                                name="bahagianA[4][17]" id="" value="na"></td>
                                    </tr>

                                    <tr>
                                        <td>18</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-8"><div class="row">

                                                                <div class="col-md-3">
                                                                        <label for="">Others</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                <input type="text" width="150px"
                                                                name="bahagianA[1][18]" id="" class="form-control textInput" style="width:200px;" value="{{ old('bahagianA.1.18') }}">
                                                                </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cover"><input class="Cover11"
                                                onchange="handleCheckboxChange('Cover11',this)" type="checkbox" @checked(old('bahagianA.2.18') == 'ok')
                                                name="bahagianA[2][18]" id="" value="ok"></td>
                                        <td class="cover"><input class="Cover11"
                                                onchange="handleCheckboxChange('Cover11',this)" type="checkbox" @checked(old('bahagianA.2.18') != 'ok' && old('bahagianA.2.18') != 'na')
                                                name="bahagianA[2][18]" id="" value="ng"></td>
                                        <td class="cover"><input class="Cover11"
                                                onchange="handleCheckboxChange('Cover11',this)" type="checkbox" @checked(old('bahagianA.2.18') == 'na')
                                                name="bahagianA[2][18]" id="" value="na"></td>
                                        <td class="text endpaper"><input class="Text16"
                                                onchange="handleCheckboxChange('Text16',this)" type="checkbox" @checked(old('bahagianA.3.18') == 'ok')
                                                name="bahagianA[3][18]" id="" value="ok"></td>
                                        <td class="text endpaper"><input class="Text16"
                                                onchange="handleCheckboxChange('Text16',this)" type="checkbox" @checked(old('bahagianA.3.18') != 'ok' && old('bahagianA.3.18') != 'na')
                                                name="bahagianA[3][18]" id="" value="ng"></td>
                                        <td class="text endpaper"><input class="Text16"
                                                onchange="handleCheckboxChange('Text16',this)" type="checkbox"  @checked(old('bahagianA.3.18') == 'na')
                                                name="bahagianA[3][18]" id="" value="na"></td>
                                        <td class="endpaper"><input class="Endpaper09"
                                                onchange="handleCheckboxChange('Endpaper09',this)" type="checkbox"  @checked(old('bahagianA.4.18') == 'ok')
                                                name="bahagianA[4][18]" id="" value="ok"></td>
                                        <td class="endpaper"><input class="Endpaper09"
                                                onchange="handleCheckboxChange('Endpaper09',this)" type="checkbox" @checked(old('bahagianA.4.18') != 'ok' && old('bahagianA.4.18') != 'na')
                                                 name="bahagianA[4][18]" id="" value="ng"></td>
                                        <td class="endpaper"><input class="Endpaper09"
                                                onchange="handleCheckboxChange('Endpaper09',this)" type="checkbox" @checked(old('bahagianA.4.18') == 'na')
                                                name="bahagianA[4][18]" id="" value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>19</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-8"><div class="row">

                                                                <div class="col-md-3">
                                                                        <label for="">Others</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                <input type="text" width="150px"
                                                                name="bahagianA[1][19]" id="" class="form-control textInput" style="width:200px;" value="{{ old('bahagianA.1.19') }}">
                                                                </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cover"><input class="Cover12"
                                                onchange="handleCheckboxChange('Cover12',this)" type="checkbox" @checked(old('bahagianA.2.19') == 'ok')
                                                name="bahagianA[2][19]" id="" value="ok"></td>
                                        <td class="cover"><input class="Cover12"
                                                onchange="handleCheckboxChange('Cover12',this)" type="checkbox" @checked(old('bahagianA.2.19') != 'ok' && old('bahagianA.2.19') != 'na')
                                                name="bahagianA[2][19]" id="" value="ng"></td>
                                        <td class="cover"><input class="Cover12"
                                                onchange="handleCheckboxChange('Cover12',this)" type="checkbox" @checked(old('bahagianA.2.19') == 'na')
                                                name="bahagianA[2][19]" id="" value="na"></td>
                                        <td class="text endpaper"><input class="Text17"
                                                onchange="handleCheckboxChange('Text17',this)" type="checkbox" @checked(old('bahagianA.3.19') == 'ok')
                                                name="bahagianA[3][19]" id="" value="ok"></td>
                                        <td class="text endpaper"><input class="Text17"
                                                onchange="handleCheckboxChange('Text17',this)" type="checkbox" @checked(old('bahagianA.3.19') != 'ok' && old('bahagianA.3.19') != 'na')
                                                name="bahagianA[3][19]" id="" value="ng"></td>
                                        <td class="text endpaper"><input class="Text17"
                                                onchange="handleCheckboxChange('Text17',this)" type="checkbox" @checked(old('bahagianA.3.19') == 'na')
                                                name="bahagianA[3][19]" id="" value="na"></td>
                                        <td class="endpaper"><input class="Endpaper9"
                                                onchange="handleCheckboxChange('Endpaper9',this)" type="checkbox" @checked(old('bahagianA.4.19') == 'ok')
                                                name="bahagianA[4][19]" id="" value="ok"></td>
                                        <td class="endpaper"><input class="Endpaper9"
                                                onchange="handleCheckboxChange('Endpaper9',this)" type="checkbox" @checked(old('bahagianA.4.19') != 'ok' && old('bahagianA.4.19') != 'na')
                                                 name="bahagianA[4][19]" id="" value="ng"></td>
                                        <td class="endpaper"><input class="Endpaper9"
                                                onchange="handleCheckboxChange('Endpaper9',this)" type="checkbox" @checked(old('bahagianA.4.19') == 'na')
                                                name="bahagianA[4][19]" id="" value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>20</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-8"><div class="row">

                                                                <div class="col-md-3">
                                                                        <label for="">Others</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                <input type="text" width="150px"
                                                                name="bahagianA[1][20]" id="" class="form-control textInput" style="width:200px;" value="{{ old('bahagianA.1.20') }}">
                                                                </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cover"><input class="Cover13"
                                                onchange="handleCheckboxChange('Cover13',this)" type="checkbox" @checked(old('bahagianA.2.20') == 'ok')
                                                name="bahagianA[2][20]" id="" value="ok"></td>
                                        <td class="cover"><input class="Cover13"
                                                onchange="handleCheckboxChange('Cover13',this)" type="checkbox" @checked(old('bahagianA.2.20') != 'ok' && old('bahagianA.2.20') != 'na')
                                                name="bahagianA[2][20]" id="" value="ng"></td>
                                        <td class="cover"><input class="Cover13"
                                                onchange="handleCheckboxChange('Cover13',this)" type="checkbox" @checked(old('bahagianA.2.20') == 'na')
                                                name="bahagianA[2][20]" id="" value="na"></td>
                                        <td class="text endpaper"><input class="Text18"
                                                onchange="handleCheckboxChange('Text18',this)" type="checkbox" @checked(old('bahagianA.3.20') == 'ok')
                                                name="bahagianA[3][20]" id="" value="ok"></td>
                                        <td class="text endpaper"><input class="Text18"
                                                onchange="handleCheckboxChange('Text18',this)" type="checkbox" @checked(old('bahagianA.3.20') != 'ok' && old('bahagianA.3.20') != 'na')
                                                name="bahagianA[3][20]" id="" value="ng"></td>
                                        <td class="text endpaper"><input class="Text18"
                                                onchange="handleCheckboxChange('Text18',this)" type="checkbox" @checked(old('bahagianA.3.20') == 'na')
                                                name="bahagianA[3][20]" id="" value="na"></td>
                                        <td class="endpaper"><input class="Endpaper10"
                                                onchange="handleCheckboxChange('Endpaper10',this)" type="checkbox" @checked(old('bahagianA.4.20') == 'ok')
                                                name="bahagianA[4][20]" id="" value="ok"></td>
                                        <td class="endpaper"><input class="Endpaper10"
                                                onchange="handleCheckboxChange('Endpaper10',this)" type="checkbox" @checked(old('bahagianA.4.20') != 'ok' && old('bahagianA.4.20') != 'na')
                                                 name="bahagianA[4][20]" id="" value="ng"></td>
                                        <td class="endpaper"><input class="Endpaper10"
                                                onchange="handleCheckboxChange('Endpaper10',this)" type="checkbox" @checked(old('bahagianA.4.20') == 'na')
                                                name="bahagianA[4][20]" id="" value="na"></td>
                                    </tr>
                                    <tr>
                                        <td>21</td>
                                        <td>
                                            <div class="row">
                                                        <div class="col-md-8"><div class="row">

                                                                <div class="col-md-3">
                                                                        <label for="">Others</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                        <input type="text" width="150px"
                                                                        name="bahagianA[1][21]" id="" class="form-control textInput" style="width:200px;" value="{{ old('bahagianA.1.21') }}">
                                                                </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cover"><input class="Cover14"
                                                onchange="handleCheckboxChange('Cover14',this)" type="checkbox" @checked(old('bahagianA.2.21') == 'ok')
                                                name="bahagianA[2][21]" id="" value="ok"></td>
                                        <td class="cover"><input class="Cover14"
                                                onchange="handleCheckboxChange('Cover14',this)" type="checkbox" @checked(old('bahagianA.2.21') != 'ok' && old('bahagianA.2.21') != 'na')
                                                name="bahagianA[2][21]" id="" value="ng"></td>
                                        <td class="cover"><input class="Cover14"
                                                onchange="handleCheckboxChange('Cover14',this)" type="checkbox" @checked(old('bahagianA.2.21') == 'na')
                                                name="bahagianA[2][21]" id="" value="na"></td>
                                        <td class="text endpaper"><input class="Text19"
                                                onchange="handleCheckboxChange('Text19',this)" type="checkbox" @checked(old('bahagianA.3.21') == 'ok')
                                                name="bahagianA[3][21]" id="" value="ok"></td>
                                        <td class="text endpaper"><input class="Text19"
                                                onchange="handleCheckboxChange('Text19',this)" type="checkbox" @checked(old('bahagianA.3.21') != 'ok' && old('bahagianA.3.21') != 'na')
                                                name="bahagianA[3][21]" id="" value="ng"></td>
                                        <td class="text endpaper"><input class="Text19"
                                                onchange="handleCheckboxChange('Text19',this)" type="checkbox" @checked(old('bahagianA.3.21') == 'na')
                                                name="bahagianA[3][21]" id="" value="na"></td>
                                        <td class="endpaper"><input class="Endpaper11"
                                                onchange="handleCheckboxChange('Endpaper11',this)" type="checkbox" @checked(old('bahagianA.4.21') == 'ok')
                                                name="bahagianA[4][21]" id="" value="ok"></td>
                                        <td class="endpaper"><input class="Endpaper11"
                                                onchange="handleCheckboxChange('Endpaper11',this)" type="checkbox"  @checked(old('bahagianA.4.21') != 'ok' && old('bahagianA.4.21') != 'na')
                                                 name="bahagianA[4][21]" id="" value="ng"></td>
                                        <td class="endpaper"><input class="Endpaper11"
                                                onchange="handleCheckboxChange('Endpaper11',this)" type="checkbox" @checked(old('bahagianA.4.21') == 'na')
                                                name="bahagianA[4][21]" id="" value="na"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-3 mb-5">
                        <div class="col-md-12">
                            <h5>Bahagian B (Semakan imposition)</h5>
                        </div>
                    </div>
                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-md-4 text">
                                    <div class="form-group">
                                        <label for="">Saiz kertas cetak teks (inci)</label>
                                        <input type="text" name="bahagian_b_1" value="{{ old('bahagian_b_1') }}" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 text">
                                    <div class="form-group">
                                        <label for="">Saiz spacing (mm)</label>
                                        <input type="text" name="bahagian_b_2" value="{{ old('bahagian_b_2') }}" id=""
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-4 cover">
                                    <div class="form-group">
                                        <label for="">Saiz kertas cetak cover (inci)</label>
                                        <input type="text" name="bahagian_b_3" value="{{ old('bahagian_b_3') }}" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 cover">
                                    <div class="form-group">
                                        <label for="">Saiz spacing (mm)</label>
                                        <input type="text" name="bahagian_b_4" value="{{ old('bahagian_b_4') }}" id=""
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 endpaper">
                                    <div class="form-group">
                                        <label for="">Saiz kertas cetak endpaper (inci)</label>
                                        <input type="text" name="bahagian_b_5" value="{{ old('bahagian_b_5') }}" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 endpaper">
                                    <div class="form-group">
                                        <label for="">Saiz spacing (mm)</label>
                                        <input type="text" name="bahagian_b_6" value="{{ old('bahagian_b_6') }}" id=""
                                            class="form-control">
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
                                        <input type="text" name="bahagian_b_7" value="{{ old('bahagian_b_7') }}" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 cover">
                                    <div class="form-group">
                                        <label for="">Saiz kawasan cetakan cover (inci)</label>
                                        <input type="text" name="bahagian_b_8" value="{{ old('bahagian_b_8') }}" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 endpaper">
                                    <div class="form-group">
                                        <label for="">Saiz kawasan cetakan endpaper (inci)</label>
                                        <input type="text" name="bahagian_b_9" value="{{ old('bahagian_b_9') }}" id=""
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-4 text">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <input type="checkbox" name="bahagian_b_p4_1" @checked(old('bahagian_b_p4_1') == 'on') id="">
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
                                                <input type="checkbox" name="bahagian_b_p4_2" @checked(old('bahagian_b_p4_2') == 'on') id="">
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
                                                <input type="checkbox" name="bahagian_b_p4_3" @checked(old('bahagian_b_p4_3') == 'on') id="">
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
                                                <input type="checkbox" name="bahagian_b_p3_1" @checked(old('bahagian_b_p3_1') == 'on') id="">
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
                                                <input type="checkbox" name="bahagian_b_p3_2" @checked(old('bahagian_b_p3_2') == 'on') id="">
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
                                                <input type="checkbox" name="bahagian_b_p3_3" @checked(old('bahagian_b_p3_3') == 'on') id="">
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
                                                <input type="checkbox" name="bahagian_b_p1_1" @checked(old('bahagian_b_p1_1') == 'on') id="">
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
                            @if(old('bahagianC'))
                                @php

                                    $count = 1;
                                @endphp

                            @foreach (old('bahagianC') as $key => $detail)
                            @if($key == 1)
                            @php
                            dd(old($detail));
                            @endphp
                            <tr class="cover">
                                <td>Cover</td>
                                <td><input type="checkbox" class="Cover16"
                                        onchange="handleCheckboxChange('Cover16',this)" name="bahagianC[{{ $key }}][1]" @checked(old('bahagianC.' . $key . '.1') == 'ok') id=""
                                        value="ok"></td>
                                <td><input type="checkbox" class="Cover16"
                                        onchange="handleCheckboxChange('Cover16',this)" @checked(old('bahagianC.' . $key . '.1') != 'ok' && old('bahagianC.' . $key . '.1') != 'na') name="bahagianC[{{ $key }}][1]"
                                        id="" value="ng"></td>
                                <td><input type="checkbox" class="Cover16"
                                        onchange="handleCheckboxChange('Cover16',this)" name="bahagianC[{{ $key }}][1]" id="" @checked(old('bahagianC.' . $key . '.1') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="Text20" onchange="handleCheckboxChange('Text20',this)" @checked(old('bahagianC.' . $key . '.2') == 'ok')
                                        name="bahagianC[{{ $key }}][2]" id="" value="ok"></td>
                                <td><input type="checkbox" class="Text20" onchange="handleCheckboxChange('Text20',this)" @checked(old('bahagianC.' . $key . '.2') != 'ok' && old('bahagianC.' . $key . '.2') != 'na')
                                         name="bahagianC[{{ $key }}][2]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Text20" onchange="handleCheckboxChange('Text20',this)" @checked(old('bahagianC.' . $key . '.2') == 'na')
                                        name="bahagianC[{{ $key }}][2]" id="" value="na"></td>
                                <td><input type="checkbox" class="Endpapee12"
                                        onchange="handleCheckboxChange('Endpapee12',this)" name="bahagianC[{{ $key }}][3]" id="" @checked(old('bahagianC.' . $key . '.3') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="Endpapee12"
                                        onchange="handleCheckboxChange('Endpapee12',this)" @checked(old('bahagianC.' . $key . '.3') != 'ok' && old('bahagianC.' . $key . '.3') != 'na')
                                        name="bahagianC[{{ $key }}][3]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Endpapee12"
                                        onchange="handleCheckboxChange('Endpapee12',this)" name="bahagianC[{{ $key }}][3]" id="" @checked(old('bahagianC.' . $key . '.3') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="Cover17"
                                        onchange="handleCheckboxChange('Cover17',this)" name="bahagianC[{{ $key }}][4]" id="" @checked(old('bahagianC.' . $key . '.4') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="Cover17"
                                        onchange="handleCheckboxChange('Cover17',this)" name="bahagianC[{{ $key }}][4]" @checked(old('bahagianC.' . $key . '.4') != 'ok' && old('bahagianC.' . $key . '.4') != 'na')
                                        id="" value="ng"></td>
                                <td><input type="checkbox" class="Cover17"
                                        onchange="handleCheckboxChange('Cover17',this)" name="bahagianC[{{ $key }}][4]" id="" @checked(old('bahagianC.' . $key . '.4') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="Text21" onchange="handleCheckboxChange('Text21',this)" @checked(old('bahagianC.' . $key . '.5') == 'ok')
                                        name="bahagianC[{{ $key }}][5]" id="" value="ok"></td>
                                <td><input type="checkbox" class="Text21" onchange="handleCheckboxChange('Text21',this)" @checked(old('bahagianC.' . $key . '.5') != 'ok' && old('bahagianC.' . $key . '.5') != 'na')
                                         name="bahagianC[{{ $key }}][5]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Text21" onchange="handleCheckboxChange('Text21',this)" @checked(old('bahagianC.' . $key . '.5') == 'na')
                                        name="bahagianC[{{ $key }}][5]" id="" value="na"></td>
                                <td><input type="text"  name="bahagianC[{{ $key }}][6]" id=""
                                        class="form-control" value="{{ old('bahagianC.' . $key . '.6') }}"></td>
                            </tr>



                            @elseif($key == 2)

                            <tr class="endpaper">
                                <td>End/Leftlet</td>
                                <td><input type="checkbox" class="Endpaper13"
                                        onchange="handleCheckboxChange('Endpaper13',this)" name="bahagianC[{{ $key }}][1]" id="" @checked(old('bahagianC.' . $key . '.1') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="Endpaper13"
                                        onchange="handleCheckboxChange('Endpaper13',this)" @checked(old('bahagianC.' . $key . '.1') != 'ok' && old('bahagianC.' . $key . '.1') != 'na')
                                        name="bahagianC[{{ $key }}][1]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Endpaper13"
                                        onchange="handleCheckboxChange('Endpaper13',this)" name="bahagianC[{{ $key }}][1]" id=""  @checked(old('bahagianC.' . $key . '1') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="Cover18"
                                        onchange="handleCheckboxChange('Cover18',this)" name="bahagianC[{{ $key }}][2]" id="" @checked(old('bahagianC.' . $key . '.2') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="Cover18"
                                        onchange="handleCheckboxChange('Cover18',this)" @checked(old('bahagianC.' . $key . '.2') != 'ok' && old('bahagianC.' . $key . '.2') != 'na') name="bahagianC[{{ $key }}][2]"
                                        id="" value="ng"></td>
                                <td><input type="checkbox" class="Cover18"
                                        onchange="handleCheckboxChange('Cover18',this)" name="bahagianC[{{ $key }}][2]" id="" @checked(old('bahagianC.' . $key . '.2') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="Text22" onchange="handleCheckboxChange('Text22',this)" @checked(old('bahagianC.' . $key . '.3') == 'ok')
                                        name="bahagianC[{{ $key }}][3]" id="" value="ok"></td>
                                <td><input type="checkbox" class="Text22" onchange="handleCheckboxChange('Text22',this)" @checked(old('bahagianC.' . $key . '.3') != 'ok' && old('bahagianC.' . $key . '.3') != 'na')
                                         name="bahagianC[{{ $key }}][3]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Text22" onchange="handleCheckboxChange('Text22',this)" @checked(old('bahagianC.' . $key . '.3') == 'na')
                                        name="bahagianC[{{ $key }}][3]" id="" value="na"></td>
                                <td><input type="checkbox" class="Endpaper14"
                                        onchange="handleCheckboxChange('Endpaper14',this)" name="bahagianC[{{ $key }}][4]" id="" @checked(old('bahagianC.' . $key . '.4') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="Endpaper14"
                                        onchange="handleCheckboxChange('Endpaper14',this)" @checked(old('bahagianC.{{ $key }}.4') != 'ok' && old('bahagianC.' . $key . '.4') != 'na')
                                        name="bahagianC[{{ $key }}][4]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Endpaper14"
                                        onchange="handleCheckboxChange('Endpaper14',this)" name="bahagianC[{{ $key }}][4]" id="" @checked(old('bahagianC.' . $key . '.4') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="Cover19"
                                        onchange="handleCheckboxChange('Cover19',this)" name="bahagianC[{{ $key }}][5]" id="" @checked(old('bahagianC.' . $key . '.5') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="Cover19"
                                        onchange="handleCheckboxChange('Cover19',this)"  name="bahagianC[{{ $key }}][5]" @checked(old('bahagianC.' . $key . '.5') != 'ok' && old('bahagianC.' . $key . '.5') != 'na')
                                        id="" value="ng"></td>
                                <td><input type="checkbox" class="Cover19"
                                        onchange="handleCheckboxChange('Cover19',this)" name="bahagianC[{{ $key }}][5]" id="" @checked(old('bahagianC.' . $key . '.5') == 'na')
                                        value="na"></td>
                                <td><input type="text"  name="bahagianC[{{ $key }}][6]" id=""
                                        class="form-control" value="{{ old('bahagianC.' . $key . '.6') }}"></td>
                            </tr>



                            @else

                            <tr class="section">
                                <td>Section {{ $count }}</td>
                                <td><input type="checkbox" class="PDLP{{ $key }}" onchange="handleCheckboxChange('PDLP{{ $key }}',this)" @checked(old('bahagianC.' . $key . '.1') == 'ok')
                                        name="bahagianC[{{ $key }}][1]" id="" value="ok"></td>
                                <td><input type="checkbox" class="PDLP{{ $key }}" onchange="handleCheckboxChange('PDLP{{ $key }}',this)" @checked(old('bahagianC.' . $key . '.1') != 'ok' && old('bahagianC.' . $key . '.1') != 'na')
                                         name="bahagianC[{{ $key }}][1]" id="" value="ng"></td>
                                <td><input type="checkbox" class="PDLP{{ $key }}" onchange="handleCheckboxChange('PDLP{{ $key }}',this)" @checked(old('bahagianC.' . $key . '.1') == 'na')
                                        name="bahagianC[{{ $key }}][1]" id="" value="na"></td>
                                <td><input type="checkbox" class="FABI{{ $key }}"
                                        onchange="handleCheckboxChange('FABI{{ $key }}',this)" name="bahagianC[{{ $key }}][2]" id="" @checked(old('bahagianC.' . $key . '.2') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="FABI{{ $key }}"
                                        onchange="handleCheckboxChange('FABI{{ $key }}',this)" @checked(old('bahagianC.' . $key . '.2') != 'ok' && old('bahagianC.' . $key . '.2') != 'na')
                                        name="bahagianC[{{ $key }}][2]" id="" value="ng"></td>
                                <td><input type="checkbox" class="FABI{{ $key }}"
                                        onchange="handleCheckboxChange('FABI{{ $key }}',this)" name="bahagianC[{{ $key }}][2]" id="" @checked(old('bahagianC.' . $key . '.2') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="KI{{ $key }}"
                                        onchange="handleCheckboxChange('KI{{ $key }}',this)" name="bahagianC[{{ $key }}][3]" id="" @checked(old('bahagianC.' . $key . '.3') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="KI{{ $key }}"
                                        onchange="handleCheckboxChange('KI{{ $key }}',this)" @checked(old('bahagianC.' . $key . '.3') != 'ok' && old('bahagianC.' . $key . '.3') != 'na') name="bahagianC[{{ $key }}][3]"
                                        id="" value="ng"></td>
                                <td><input type="checkbox" class="KI{{ $key }}"
                                        onchange="handleCheckboxChange('KI{{ $key }}',this)" name="bahagianC[{{ $key }}][3]" id="" @checked(old('bahagianC.' . $key . '.3') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="SS{{ $key }}" onchange="handleCheckboxChange('SS{{ $key }}',this)" @checked(old('bahagianC.' . $key . '.4') == 'ok')
                                        name="bahagianC[{{ $key }}][4]" id="" value="ok"></td>
                                <td><input type="checkbox" class="SS{{ $key }}" onchange="handleCheckboxChange('SS{{ $key }}',this)" @checked(old('bahagianC.' . $key . '.4') != 'ok' && old('bahagianC.' . $key . '.4') != 'na')
                                         name="bahagianC[{{ $key }}][4]" id="" value="ng"></td>
                                <td><input type="checkbox" class="SS{{ $key }}" onchange="handleCheckboxChange('SS{{ $key }}',this)" @checked(old('bahagianC.' . $key . '.4') == 'na')
                                        name="bahagianC[{{ $key }}][4]" id="" value="na"></td>
                                <td><input type="checkbox" class="PM{{ $key }}"
                                        onchange="handleCheckboxChange('PM{{ $key }}',this)" name="bahagianC[{{ $key }}][5]" id="" @checked(old('bahagianC.' . $key . '.5') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="PM{{ $key }}"
                                        onchange="handleCheckboxChange('PM{{ $key }}',this)" @checked(old('bahagianC.' . $key . '.5') != 'ok' && old('bahagianC.' . $key . '.5') != 'na')
                                        name="bahagianC[{{ $key }}][5]" id="" value="ng"></td>
                                <td><input type="checkbox" class="PM{{ $key }}"
                                        onchange="handleCheckboxChange('PM{{ $key }}',this)" name="bahagianC[{{ $key }}][5]" id="" @checked(old('bahagianC.' . $key . '.5') == 'na')
                                        value="na"></td>
                                <td><input type="text"  name="bahagianC[{{ $key }}][6]" id=""
                                        class="form-control" value="{{ old('bahagianC.' . $key . '.6') }}"></td>
                            </tr>

                            @php
                            $count++;
                                 @endphp


                            @endif



                            @endforeach
                            @else

                            <tr class="cover">
                                <td>Cover</td>
                                <td><input type="checkbox" class="Cover16"
                                        onchange="handleCheckboxChange('Cover16',this)" name="bahagianC[1][1]" @checked(old('bahagianC.1.1') == 'ok') id=""
                                        value="ok"></td>
                                <td><input type="checkbox" class="Cover16"
                                        onchange="handleCheckboxChange('Cover16',this)" @checked(old('bahagianC.1.1') != 'ok' && old('bahagianC.1.1') != 'na') name="bahagianC[1][1]"
                                        id="" value="ng"></td>
                                <td><input type="checkbox" class="Cover16"
                                        onchange="handleCheckboxChange('Cover16',this)" name="bahagianC[1][1]" id="" @checked(old('bahagianC.1.1') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="Text20" onchange="handleCheckboxChange('Text20',this)" @checked(old('bahagianC.1.2') == 'ok')
                                        name="bahagianC[1][2]" id="" value="ok"></td>
                                <td><input type="checkbox" class="Text20" onchange="handleCheckboxChange('Text20',this)" @checked(old('bahagianC.1.2') != 'ok' && old('bahagianC.1.2') != 'na')
                                         name="bahagianC[1][2]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Text20" onchange="handleCheckboxChange('Text20',this)" @checked(old('bahagianC.1.2') == 'na')
                                        name="bahagianC[1][2]" id="" value="na"></td>
                                <td><input type="checkbox" class="Endpapee12"
                                        onchange="handleCheckboxChange('Endpapee12',this)" name="bahagianC[1][3]" id="" @checked(old('bahagianC.1.3') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="Endpapee12"
                                        onchange="handleCheckboxChange('Endpapee12',this)" @checked(old('bahagianC.1.3') != 'ok' && old('bahagianC.1.3') != 'na')
                                        name="bahagianC[1][3]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Endpapee12"
                                        onchange="handleCheckboxChange('Endpapee12',this)" name="bahagianC[1][3]" id="" @checked(old('bahagianC.1.3') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="Cover17"
                                        onchange="handleCheckboxChange('Cover17',this)" name="bahagianC[1][4]" id="" @checked(old('bahagianC.1.4') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="Cover17"
                                        onchange="handleCheckboxChange('Cover17',this)" name="bahagianC[1][4]" @checked(old('bahagianC.1.4') != 'ok' && old('bahagianC.1.4') != 'na')
                                        id="" value="ng"></td>
                                <td><input type="checkbox" class="Cover17"
                                        onchange="handleCheckboxChange('Cover17',this)" name="bahagianC[1][4]" id="" @checked(old('bahagianC.1.4') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="Text21" onchange="handleCheckboxChange('Text21',this)" @checked(old('bahagianC.1.5') == 'ok')
                                        name="bahagianC[1][5]" id="" value="ok"></td>
                                <td><input type="checkbox" class="Text21" onchange="handleCheckboxChange('Text21',this)" @checked(old('bahagianC.1.5') != 'ok' && old('bahagianC.1.5') != 'na')
                                        checked name="bahagianC[1][5]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Text21" onchange="handleCheckboxChange('Text21',this)" @checked(old('bahagianC.1.5') == 'na')
                                        name="bahagianC[1][5]" id="" value="na"></td>
                                <td><input type="text"  name="bahagianC[1][6]" id=""
                                        class="form-control" value="{{ old('bahagianC.1.6') }}"></td>
                            </tr>

                            <tr class="endpaper">
                                <td>End/Leftlet</td>
                                <td><input type="checkbox" class="Endpaper13"
                                        onchange="handleCheckboxChange('Endpaper13',this)" name="bahagianC[2][1]" id="" @checked(old('bahagianC.2.1') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="Endpaper13"
                                        onchange="handleCheckboxChange('Endpaper13',this)" @checked(old('bahagianC.2.1') != 'ok' && old('bahagianC.2.1') != 'na')
                                        name="bahagianC[2][1]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Endpaper13"
                                        onchange="handleCheckboxChange('Endpaper13',this)" name="bahagianC[2][1]" id=""  @checked(old('bahagianC.2.1') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="Cover18"
                                        onchange="handleCheckboxChange('Cover18',this)" name="bahagianC[2][2]" id="" @checked(old('bahagianC.2.2') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="Cover18"
                                        onchange="handleCheckboxChange('Cover18',this)" @checked(old('bahagianC.2.2') != 'ok' && old('bahagianC.2.2') != 'na') name="bahagianC[2][2]"
                                        id="" value="ng"></td>
                                <td><input type="checkbox" class="Cover18"
                                        onchange="handleCheckboxChange('Cover18',this)" name="bahagianC[2][2]" id="" @checked(old('bahagianC.2.2') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="Text22" onchange="handleCheckboxChange('Text22',this)" @checked(old('bahagianC.2.3') == 'ok')
                                        name="bahagianC[2][3]" id="" value="ok"></td>
                                <td><input type="checkbox" class="Text22" onchange="handleCheckboxChange('Text22',this)" @checked(old('bahagianC.2.3') != 'ok' && old('bahagianC.2.3') != 'na')
                                         name="bahagianC[2][3]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Text22" onchange="handleCheckboxChange('Text22',this)" @checked(old('bahagianC.2.3') == 'na')
                                        name="bahagianC[2][3]" id="" value="na"></td>
                                <td><input type="checkbox" class="Endpaper14"
                                        onchange="handleCheckboxChange('Endpaper14',this)" name="bahagianC[2][4]" id="" @checked(old('bahagianC.2.4') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="Endpaper14"
                                        onchange="handleCheckboxChange('Endpaper14',this)" @checked(old('bahagianC.2.4') != 'ok' && old('bahagianC.2.4') != 'na')
                                        name="bahagianC[2][4]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Endpaper14"
                                        onchange="handleCheckboxChange('Endpaper14',this)" name="bahagianC[2][4]" id="" @checked(old('bahagianC.2.4') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="Cover19"
                                        onchange="handleCheckboxChange('Cover19',this)" name="bahagianC[2][5]" id="" @checked(old('bahagianC.2.5') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="Cover19"
                                        onchange="handleCheckboxChange('Cover19',this)"  name="bahagianC[2][5]" @checked(old('bahagianC.2.5') != 'ok' && old('bahagianC.2.5') != 'na')
                                        id="" value="ng"></td>
                                <td><input type="checkbox" class="Cover19"
                                        onchange="handleCheckboxChange('Cover19',this)" name="bahagianC[2][5]" id="" @checked(old('bahagianC.2.5') == 'na')
                                        value="na"></td>
                                <td><input type="text"  name="bahagianC[2][6]" id=""
                                        class="form-control" value="{{ old('bahagianC.2.6') }}"></td>
                            </tr>

                            <tr class="section">
                                <td>Section 1</td>
                                <td><input type="checkbox" class="Text23" onchange="handleCheckboxChange('Text23',this)" @checked(old('bahagianC.3.1') == 'ok')
                                        name="bahagianC[3][1]" id="" value="ok"></td>
                                <td><input type="checkbox" class="Text23" onchange="handleCheckboxChange('Text23',this)" @checked(old('bahagianC.3.1') != 'ok' && old('bahagianC.3.1') != 'na')
                                         name="bahagianC[3][1]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Text23" onchange="handleCheckboxChange('Text23',this)" @checked(old('bahagianC.3.1') == 'na')
                                        name="bahagianC[3][1]" id="" value="na"></td>
                                <td><input type="checkbox" class="Endpaper15"
                                        onchange="handleCheckboxChange('Endpaper15',this)" name="bahagianC[3][2]" id="" @checked(old('bahagianC.3.2') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="Endpaper15"
                                        onchange="handleCheckboxChange('Endpaper15',this)" @checked(old('bahagianC.3.2') != 'ok' && old('bahagianC.3.2') != 'na')
                                        name="bahagianC[3][2]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Endpaper15"
                                        onchange="handleCheckboxChange('Endpaper15',this)" name="bahagianC[3][2]" id="" @checked(old('bahagianC.3.2') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="Cover20"
                                        onchange="handleCheckboxChange('Cover20',this)" name="bahagianC[3][3]" id="" @checked(old('bahagianC.3.3') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="Cover20"
                                        onchange="handleCheckboxChange('Cover20',this)" @checked(old('bahagianC.3.3') != 'ok' && old('bahagianC.3.3') != 'na') name="bahagianC[3][3]"
                                        id="" value="ng"></td>
                                <td><input type="checkbox" class="Cover20"
                                        onchange="handleCheckboxChange('Cover20',this)" name="bahagianC[3][3]" id="" @checked(old('bahagianC.3.3') == 'na')
                                        value="na"></td>
                                <td><input type="checkbox" class="Text24" onchange="handleCheckboxChange('Text24',this)" @checked(old('bahagianC.3.4') == 'ok')
                                        name="bahagianC[3][4]" id="" value="ok"></td>
                                <td><input type="checkbox" class="Text24" onchange="handleCheckboxChange('Text24',this)" @checked(old('bahagianC.3.4') != 'ok' && old('bahagianC.3.4') != 'na')
                                         name="bahagianC[3][4]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Text24" onchange="handleCheckboxChange('Text24',this)" @checked(old('bahagianC.3.4') == 'na')
                                        name="bahagianC[3][4]" id="" value="na"></td>
                                <td><input type="checkbox" class="Endpaper16"
                                        onchange="handleCheckboxChange('Endpaper16',this)" name="bahagianC[3][5]" id="" @checked(old('bahagianC.3.5') == 'ok')
                                        value="ok"></td>
                                <td><input type="checkbox" class="Endpaper16"
                                        onchange="handleCheckboxChange('Endpaper16',this)" @checked(old('bahagianC.3.5') != 'ok' && old('bahagianC.3.5') != 'na')
                                        name="bahagianC[3][5]" id="" value="ng"></td>
                                <td><input type="checkbox" class="Endpaper16"
                                        onchange="handleCheckboxChange('Endpaper16',this)" name="bahagianC[3][5]" id="" @checked(old('bahagianC.3.5') == 'na')
                                        value="na"></td>
                                <td><input type="text"  name="bahagianC[3][6]" id=""
                                        class="form-control" value="{{ old('bahagianC.3.6') }}"></td>
                            </tr>

                            @endif

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
                                        <input type="text" class="form-control"
                                            name="gripper_margin_cover" id="">
                                    </div>
                                </div>
                                <div class="col-md-4 text">
                                    <div class="form-group">
                                        <label for="">Teks</label>
                                        <input type="text" class="form-control"
                                            name="gripper_margin_teks" id="">
                                    </div>
                                </div>
                                <div class="col-md-4 endpaper">
                                    <div class="form-group">
                                        <label for="">Endpaper/Leaflet</label>
                                        <input type="text" class="form-control"
                                            name="gripper_margin_leaflet" id="">
                                    </div>
                                </div>
                            </div>
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

                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right">Save</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <a href="{{ route('senari_semak_cetak') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>

</form>
@endsection

@push('custom-scripts')
<script>

    $(".inputChecked").on("change", function () {
        // Check if the checkbox is checked
        if ($(this).prop("checked")) {
            // Find the closest td and then find the textInput within that td
            $(this).closest("td").find(".textInput").removeAttr("disabled");
        } else {
            // If the checkbox is not checked, you might want to handle this case accordingly
            // For example, you can add logic to disable the textInput
            $(this).closest("td").find(".textInput").prop("disabled", true);
        }
    });

    function handleCheckboxChange(className, checkbox) {
        if ($(checkbox).prop('checked')) {
            $(`.${className}`).not(checkbox).prop('checked', false);
        }
    }
    $(document).ready(function () {
        $('#Text').val(1);
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

    $('#sale_order').on('change', function () {
            const id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{ route('sale_order.detail.get') }}',
                data: {
                    "id": id
                },
                success: function (data) {
                    $('#kod_buku').val(data.kod_buku);
                    $('#tajuk').val(data.description);
                }
            });
        });


    $(document).on('change', '#Cover', function () {
        if (!$(this).prop('checked')) {
            $('.cover').css('display', 'none')
        } else {
            $('.cover').css('display', '')
        }
    })

    $(document).on('change', '#Endpaper', function () {
        if (!$(this).prop('checked')) {
            $('.endpaper').css('display', 'none')
        } else {
            $('.endpaper').css('display', '')
        }
    })

    $(document).on('change ', '#Text', function () {
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
                                     <td><input type="checkbox" class="PDLP${i}" onchange="handleCheckboxChange('PDLP${i}',this)" name="bahagianC[${$key}][1]" {{ old('bahagianC.${$key}.1') == 'ok' ? checked : ''}}  id="" value="ok"></td>
                                     <td><input type="checkbox" class="PDLP${i}" onchange="handleCheckboxChange('PDLP${i}',this)" {{ old('bahagianC.${$key}.1') == 'ng' ? checked : ''}} @if(old('bahagianC.${$key}.1')) @else checked @endif name="bahagianC[${$key}][1]" id="" value="ng"></td>
                                     <td><input type="checkbox" class="PDLP${i}" onchange="handleCheckboxChange('PDLP${i}',this)" name="bahagianC[${$key}][1]" {{ old('bahagianC.${$key}.1') == 'na' ? checked : ''}} id="" value="na"></td>
                                     <td><input type="checkbox" class="FABI${i}" onchange="handleCheckboxChange('FABI${i}',this)" name="bahagianC[${$key}][2]" {{ old('bahagianC.${$key}.2') == 'ok' ? checked : ''}}  id="" value="ok"></td>
                                     <td><input type="checkbox" class="FABI${i}" onchange="handleCheckboxChange('FABI${i}',this)" {{ old('bahagianC.${$key}.2') == 'ng' ? checked : ''}} @if(old('bahagianC.${$key}.2')) @else checked @endif name="bahagianC[${$key}][2]" id="" value="ng"></td>
                                     <td><input type="checkbox" class="FABI${i}" onchange="handleCheckboxChange('FABI${i}',this)" name="bahagianC[${$key}][2]" {{ old('bahagianC.${$key}.2') == 'na' ? checked : ''}} id="" value="na"></td>
                                     <td><input type="checkbox" class="KI${i}" onchange="handleCheckboxChange('KI${i}',this)" name="bahagianC[${$key}][3]" {{ old('bahagianC.${$key}.3') == 'ok' ? checked : ''}} id="" value="ok"></td>
                                     <td><input type="checkbox" class="KI${i}" onchange="handleCheckboxChange('KI${i}',this)" {{ old('bahagianC.${$key}.3') == 'ng' ? checked : ''}} @if(old('bahagianC.${$key}.3')) @else checked @endif name="bahagianC[${$key}][3]" id="" value="ng"></td>
                                     <td><input type="checkbox" class="KI${i}" onchange="handleCheckboxChange('KI${i}',this)" name="bahagianC[${$key}][3]" {{ old('bahagianC.${$key}.3') == 'na' ? checked : ''}} id="" value="na"></td>
                                     <td><input type="checkbox" class="SS${i}" onchange="handleCheckboxChange('SS${i}',this)" name="bahagianC[${$key}][4]" {{ old('bahagianC.${$key}.4') == 'ok' ? checked : ''}}  id="" value="ok"></td>
                                     <td><input type="checkbox" class="SS${i}" onchange="handleCheckboxChange('SS${i}',this)" {{ old('bahagianC.${$key}.4') == 'ng' ? checked : ''}} @if(old('bahagianC.${$key}.4')) @else checked @endif name="bahagianC[${$key}][4]"  id="" value="ng"></td>
                                     <td><input type="checkbox" class="SS${i}" onchange="handleCheckboxChange('SS${i}',this)" name="bahagianC[${$key}][4]" {{ old('bahagianC.${$key}.4') == 'na' ? checked : ''}} id="" value="na"></td>
                                     <td><input type="checkbox" class="PM${i}" onchange="handleCheckboxChange('PM${i}',this)" name="bahagianC[${$key}][5]" {{ old('bahagianC.${$key}.5') == 'ok' ? checked : ''}} id="" value="ok"></td>
                                     <td><input type="checkbox" class="PM${i}" onchange="handleCheckboxChange('PM${i}',this)" {{ old('bahagianC.${$key}.5') == 'ng' ? checked : ''}} @if(old('bahagianC.${$key}.5')) @else checked @endif name="bahagianC[${$key}][5]" id="" value="ng"></td>
                                     <td><input type="checkbox" class="PM${i}" onchange="handleCheckboxChange('PM${i}',this)" name="bahagianC[${$key}][5]" {{ old('bahagianC.${$key}.5') == 'na' ? checked : ''}} id="" value="na"></td>
                                     <td><input type="text"  name="bahagianC[${$key}][6]" id="" class="form-control" value="{{ old('bahagianC.${$key}.6') }}"></td>
                                 </tr>`);



                }
            }

        }
    })
</script>
@endpush
