@extends('layouts.app')
@section('content')
    <form action="{{ route('senari_semak_cetak.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Senarai Semak Pencetakan Digital</h5>

                        <div class="card" style="background:#f1f0f0;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Tarikh</div>
                                            <select name="sale_order" id="sale_order" class="form-control">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Date</div>
                                            <input type="date" name="date" value="{{ date('Y-m-d') }}"
                                                class="form-control" id="Currentdate">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">kod Buku</div>
                                            <input type="text" readonly value="" name="" id="kod_buku"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Tajuk</div>
                                            <input type="text" readonly value="" name="" id="tajuk"
                                                class="form-control">
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
                                                        <td><input type="checkbox" name="item_cover_availibility" checked id="Cover">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>End/Leaflet</td>
                                                        <td><input type="checkbox" name="item_leaflet_availibility" checked id="Endpaper">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>cover</td>
                                                        <td><input type="number" class="form-control" value="1"
                                                                name="item_cover_text" min="1" checked id="Text"></td>
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
                                            <td>Design clearance 5mm (print to cut dan stitching binding)</td>
                                            <td class="cover"><input type="checkbox" class="Cover1"
                                                    onchange="handleCheckboxChange('Cover1')" name="bahagianA[2][1]"
                                                    value="ok">
                                            </td>
                                            <td class="cover"><input type="checkbox" class="Cover1"
                                                    onchange="handleCheckboxChange('Cover1')" checked
                                                    name="bahagianA[2][1]" id="" value="ng"></td>
                                            <td class="cover"><input type="checkbox" class="Cover1"
                                                    onchange="handleCheckboxChange('Cover1')" name="bahagianA[2][1]"
                                                    id="" value="na"></td>
                                            <td class="text"><input type="checkbox" class="Text1"
                                                    onchange="handleCheckboxChange('Text1')" name="bahagianA[3][1]"
                                                    id="" value="ok"></td>
                                            <td class="text"><input type="checkbox" class="Text1"
                                                    onchange="handleCheckboxChange('Text1')" checked
                                                    name="bahagianA[3][1]" id="" value="ng"></td>
                                            <td class="text"><input type="checkbox" class="Text1"
                                                    onchange="handleCheckboxChange('Text1')" name="bahagianA[3][1]"
                                                    id="" value="na"></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper1"
                                                    onchange="handleCheckboxChange('Endpaper1')" name="bahagianA[4][1]"
                                                    id="" value="ok"></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper1"
                                                    onchange="handleCheckboxChange('Endpaper1')" checked
                                                    name="bahagianA[4][1]" id="" value="ng"></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper1"
                                                    onchange="handleCheckboxChange('Endpaper1')" name="bahagianA[4][1]"
                                                    id="" value="na"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Image artwork (Semak teks & gambar)</td>
                                            <td class="cover"><input type="checkbox" class="Cover2"
                                                    onchange="handleCheckboxChange('Cover2')" name="bahagianA[2][2]"
                                                    id="" value="ok"></td>
                                            <td class="cover"><input type="checkbox" class="Cover2"
                                                    onchange="handleCheckboxChange('Cover2')" checked
                                                    name="bahagianA[2][2]" id="" value="ng"></td>
                                            <td class="cover"><input type="checkbox" class="Cover2"
                                                    onchange="handleCheckboxChange('Cover2')" name="bahagianA[2][2]"
                                                    id="" value="na"></td>
                                            <td class="text"><input type="checkbox" class="Text2"
                                                    onchange="handleCheckboxChange('Text2')"name="bahagianA[3][2]"
                                                    id="" value="ok"></td>
                                            <td class="text"><input type="checkbox" class="Text2"
                                                    onchange="handleCheckboxChange('Text2')" checked
                                                    name="bahagianA[3][2]" id="" value="ng"></td>
                                            <td class="text"><input type="checkbox" class="Text2"
                                                    onchange="handleCheckboxChange('Text2')" name="bahagianA[3][2]"
                                                    id="" value="na"></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper2"
                                                    onchange="handleCheckboxChange('Endpaper2')" name="bahagianA[4][2]"
                                                    id="" value="ok"></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper2"
                                                    onchange="handleCheckboxChange('Endpaper2')" checked
                                                    name="bahagianA[4][2]" id="" value="ng"></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper2"
                                                    onchange="handleCheckboxChange('Endpaper2')" name="bahagianA[4][2]"
                                                    id="" value="na"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Bleed (3-5mm)</td>
                                            <td class="cover" colspan="3"><input type="text"class="Cover3"
                                                    onchange="handleCheckboxChange('Cover3')" placeholder="text input"
                                                    class="form-control" name="bahagianA[2][3]" id=""></td>
                                            <td class="text" colspan="3"><input type="text"class="Text3"
                                                    onchange="handleCheckboxChange('Text3')" placeholder="text input"
                                                    class="form-control" name="bahagianA[3][3]" id=""></td>
                                            <td class="endpaper" colspan="3"><input type="text" class="Endpaper3"
                                                    onchange="handleCheckboxChange('Endpaper3')"placeholder="text input"
                                                    class="form-control" name="bahagianA[4][3]" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Saiz spine (perfect bind)</td>
                                            <td class="cover" colspan="3"><input type="text" class="Cover4"
                                                    onchange="handleCheckboxChange('Cover4')" readonly
                                                    name="bahagianA[2][4]" placeholder="text input" class="form-control"
                                                    id=""></td>
                                            <td class="text endpaper"><input type="checkbox" class="Text4"
                                                    onchange="handleCheckboxChange('Text4')" name="bahagianA[3][4]"
                                                    id="" value="ok"></td>
                                            <td class="text endpaper"><input type="checkbox" class="Text4"
                                                    onchange="handleCheckboxChange('Text4')"placeholder="text input"
                                                    checked name="bahagianA[3][4]" id="" value="ng"></td>
                                            <td class="text endpaper"><input type="checkbox" class="Text4"
                                                    onchange="handleCheckboxChange('Text4')" name="bahagianA[3][4]"
                                                    id="" value="na"></td>
                                            <td class="endpaper" colspan="3"><input type="text" class="Endpaper4"
                                                    onchange="handleCheckboxChange('Endpaper4')" placeholder="text input"
                                                    class="form-control" readonly name="bahagianA[4][4]" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Kedudukan artwork (hardcover)</td>
                                            <td class="cover"><input type="checkbox" class="Cover5"
                                                    onchange="handleCheckboxChange('Cover5')" name="bahagianA[2][5]"
                                                    id="" value="ok"></td>
                                            <td class="cover"><input type="checkbox" class="Cover5"
                                                    onchange="handleCheckboxChange('Cover5')" checked
                                                    name="bahagianA[2][5]" id="" value="ng"></td>
                                            <td class="cover"><input type="checkbox" class="Cover5"
                                                    onchange="handleCheckboxChange('Cover5')" name="bahagianA[2][5]"
                                                    id="" value="na"></td>
                                            <td class="text"><input type="checkbox" class="Text5"
                                                    onchange="handleCheckboxChange('Text5')" name="bahagianA[3][5]"
                                                    id="" value="ok"></td>
                                            <td class="text"><input type="checkbox" class="Text5"
                                                    onchange="handleCheckboxChange('Text5')" checked
                                                    name="bahagianA[3][5]" id="" value="ng"></td>
                                            <td class="text"><input type="checkbox" class="Text5"
                                                    onchange="handleCheckboxChange('Text5')" name="bahagianA[3][5]"
                                                    id="" value="na"></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper5"
                                                    onchange="handleCheckboxChange('Endpaper5')" name="bahagianA[4][5]"
                                                    id="" value="ok"></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper5"
                                                    onchange="handleCheckboxChange('Endpaper5')" checked
                                                    name="bahagianA[4][5]" id="" value="ng"></td>
                                            <td class="endpaper"><input type="checkbox" class="Endpaper5"
                                                    onchange="handleCheckboxChange('Endpaper5')" name="bahagianA[4][5]"
                                                    id="" value="na"></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Alamat pencetak</td>
                                            <td class="cover"><input type="checkbox" class="Cover6"
                                                    onchange="handleCheckboxChange('Cover6')" name="bahagianA[2][6]"
                                                    id="" value="ok"></td>
                                            <td class="cover"><input type="checkbox" class="Cover6"
                                                    onchange="handleCheckboxChange('Cover6')" checked
                                                    name="bahagianA[2][6]" id="" value="ng"></td>
                                            <td class="cover"><input type="checkbox" class="Cover6"
                                                    onchange="handleCheckboxChange('Cover6')" name="bahagianA[2][6]"
                                                    id="" value="na"></td>
                                            <td class="text" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[3][6]" id="">
                                            </td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][6]" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Alamat pencetak</td>
                                            <td class="cover"><input class="Cover7"
                                                    onchange="handleCheckboxChange('Cover7')" type="checkbox"
                                                    name="bahagianA[2][7]" id="" value="ok"></td>
                                            <td class="cover"><input class="Cover7"
                                                    onchange="handleCheckboxChange('Cover7')" type="checkbox" checked
                                                    name="bahagianA[2][7]" id="" value="ng"></td>
                                            <td class="cover"><input class="Cover7"
                                                    onchange="handleCheckboxChange('Cover7')"type="checkbox"
                                                    name="bahagianA[2][7]" id="" value="na"></td>
                                            <td class="text" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[3][7]" id="">
                                            </td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][7]" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                            <td class="cover" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[2][8]" id="">
                                            </td>
                                            <td class="text"><input class="Text6"
                                                    onchange="handleCheckboxChange('Text6')" type="checkbox"
                                                    name="bahagianA[3][8]" id="" value="ok"></td>
                                            <td class="text"><input class="Text6"
                                                    onchange="handleCheckboxChange('Text6')" type="checkbox" checked
                                                    name="bahagianA[3][8]" id="" value="ng"></td>
                                            <td class="text"><input class="Text6"
                                                    onchange="handleCheckboxChange('Text6')" type="checkbox"
                                                    name="bahagianA[3][8]" id="" value="na"></td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][8]" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                            <td class="cover" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[2][9]" id="">
                                            </td>
                                            <td class="text"><input class="Text7"
                                                    onchange="handleCheckboxChange('Text7')" type="checkbox"
                                                    name="bahagianA[3][9]" id="" value="ok"></td>
                                            <td class="text"><input class="Text7"
                                                    onchange="handleCheckboxChange('Text7')" type="checkbox" checked
                                                    name="bahagianA[3][9]" id="" value="ng"></td>
                                            <td class="text"><input class="Text7"
                                                    onchange="handleCheckboxChange('Text7')" type="checkbox"
                                                    name="bahagianA[3][9]" id="" value="na"></td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][9]" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                            <td class="cover" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[2][10]" id="">
                                            </td>
                                            <td class="text"><input class="Text8"
                                                    onchange="handleCheckboxChange('Text8')" type="checkbox"
                                                    name="bahagianA[3][10]" id="" value="ok"></td>
                                            <td class="text"><input class="Text8"
                                                    onchange="handleCheckboxChange('Text8')" type="checkbox" checked
                                                    name="bahagianA[3][10]" id="" value="ng"></td>
                                            <td class="text"><input class="Text8"
                                                    onchange="handleCheckboxChange('Text8')" type="checkbox"
                                                    name="bahagianA[3][10]" id="" value="na"></td>
                                            <td class="endpaper"colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[4][10]" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                            <td class="cover" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[2][11]" id="">
                                            </td>
                                            <td class="text"><input class="Text9"
                                                    onchange="handleCheckboxChange('Text9')" type="checkbox"
                                                    name="bahagianA[3][11]" id="" value="ok"></td>
                                            <td class="text"><input class="Text9"
                                                    onchange="handleCheckboxChange('Text9')" type="checkbox" checked
                                                    name="bahagianA[3][11]" id="" value="ng"></td>
                                            <td class="text"><input class="Text9"
                                                    onchange="handleCheckboxChange('Text9')" type="checkbox"
                                                    name="bahagianA[3][11]" id="" value="na"></td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][11]" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                            <td class="cover" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[2][12]" id="">
                                            </td>
                                            <td class="text"><input class="Text10"
                                                    onchange="handleCheckboxChange('Text10')" type="checkbox"
                                                    name="bahagianA[3][12]" id="" value="ok"></td>
                                            <td class="text"><input class="Text10"
                                                    onchange="handleCheckboxChange('Text10')" type="checkbox" checked
                                                    name="bahagianA[3][12]" id="" value="ng"></td>
                                            <td class="text"><input class="Text10"
                                                    onchange="handleCheckboxChange('Text10')" type="checkbox"
                                                    name="bahagianA[3][12]" id="" value="na"></td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][12]" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                            <td class="cover" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[2][13]" id="">
                                            </td>
                                            <td class="text"><input class="Text11"
                                                    onchange="handleCheckboxChange('Text11')" type="checkbox"
                                                    name="bahagianA[3][13]" id="" value="ok"></td>
                                            <td class="text"><input class="Text11"
                                                    onchange="handleCheckboxChange('Text11')" type="checkbox" checked
                                                    name="bahagianA[3][13]" id="" value="ng"></td>
                                            <td class="text"><input class="Text11"
                                                    onchange="handleCheckboxChange('Text11')" type="checkbox"
                                                    name="bahagianA[3][13]" id="" value="na"></td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][13]" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>14</td>
                                            <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                            <td class="cover" colspan="3"><input type="text" class="form-control"
                                                    readonly name="bahagianA[2][14]" id="">
                                            </td>
                                            <td class="text"><input class="Text12"
                                                    onchange="handleCheckboxChange('Text12')" type="checkbox"
                                                    name="bahagianA[3][14]" id="" value="ok"></td>
                                            <td class="text"><input class="Text12"
                                                    onchange="handleCheckboxChange('Text12')" type="checkbox" checked
                                                    name="bahagianA[3][14]" id="" value="ng"></td>
                                            <td class="text"><input class="Text12"
                                                    onchange="handleCheckboxChange('Text12')" type="checkbox"
                                                    name="bahagianA[3][14]" id="" value="na"></td>
                                            <td class="endpaper" colspan="3"><input type="text"
                                                    class="form-control" readonly name="bahagianA[4][14]" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td>Kedudukan artwork (hardcover)</td>
                                            <td class="cover"><input class="Cover8"
                                                    onchange="handleCheckboxChange('Cover8')" type="checkbox"
                                                    name="bahagianA[2][15]" id="" value="ok"></td>
                                            <td class="cover"><input class="Cover8"
                                                    onchange="handleCheckboxChange('Cover8')" type="checkbox" checked
                                                    name="bahagianA[2][15]" id="" value="ng"></td>
                                            <td class="cover"><input class="Cover8"
                                                    onchange="handleCheckboxChange('Cover8')" type="checkbox"
                                                    name="bahagianA[2][15]" id="" value="na"></td>
                                            <td class="text"><input class="Text13"
                                                    onchange="handleCheckboxChange('Text13')" type="checkbox"
                                                    name="bahagianA[3][15]" id="" value="ok"></td>
                                            <td class="text"><input class="Text13"
                                                    onchange="handleCheckboxChange('Text13')" type="checkbox" checked
                                                    name="bahagianA[3][15]" id="" value="ng"></td>
                                            <td class="text"><input class="Text13"
                                                    onchange="handleCheckboxChange('Text13')" type="checkbox"
                                                    name="bahagianA[3][15]" id="" value="na"></td>
                                            <td class="endpaper"><input class="Endpaper6"
                                                    onchange="handleCheckboxChange('Endpaper6')" type="checkbox"
                                                    name="bahagianA[4][15]" id="" value="ok"></td>
                                            <td class="endpaper"><input class="Endpaper6"
                                                    onchange="handleCheckboxChange('Endpaper6')" type="checkbox" checked
                                                    name="bahagianA[4][15]" id="" value="ng"></td>
                                            <td class="endpaper"><input class="Endpaper6"
                                                    onchange="handleCheckboxChange('Endpaper6')" type="checkbox"
                                                    name="bahagianA[4][15]" id="" value="na"></td>
                                        </tr>
                                        <tr>
                                            <td>16</td>
                                            <td>Kedudukan artwork (hardcover)</td>
                                            <td class="cover"><input class="Cover9"
                                                    onchange="handleCheckboxChange('Cover9')" type="checkbox"
                                                    name="bahagianA[2][16]" id="" value="ok"></td>
                                            <td class="cover"><input class="Cover9"
                                                    onchange="handleCheckboxChange('Cover9')" type="checkbox" checked
                                                    name="bahagianA[2][16]" id="" value="ng"></td>
                                            <td class="cover"><input class="Cover9"
                                                    onchange="handleCheckboxChange('Cover9')" type="checkbox"
                                                    name="bahagianA[2][16]" id="" value="na"></td>
                                            <td class="text"><input class="Text14"
                                                    onchange="handleCheckboxChange('Text14')" type="checkbox"
                                                    name="bahagianA[3][16]" id="" value="ok"></td>
                                            <td class="text"><input class="Text14"
                                                    onchange="handleCheckboxChange('Text14')" type="checkbox" checked
                                                    name="bahagianA[3][16]" id="" value="ng"></td>
                                            <td class="text"><input class="Text14"
                                                    onchange="handleCheckboxChange('Text14')" type="checkbox"
                                                    name="bahagianA[3][16]" id="" value="na"></td>
                                            <td class="endpaper"><input class="Endpaper7"
                                                    onchange="handleCheckboxChange('Endpaper7')" type="checkbox"
                                                    name="bahagianA[4][16]" id="" value="ok"></td>
                                            <td class="endpaper"><input class="Endpaper7"
                                                    onchange="handleCheckboxChange('Endpaper7')" type="checkbox" checked
                                                    name="bahagianA[4][16]" id="" value="ng"></td>
                                            <td class="endpaper"><input class="Endpaper7"
                                                    onchange="handleCheckboxChange('Endpaper7')" type="checkbox"
                                                    name="bahagianA[4][16]" id="" value="na"></td>
                                        </tr>
                                        <tr>
                                            <td>17</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3"> Lain-lain Other: </div>
                                                    <div class="col-md-9"><input type="text" width=""
                                                            placeholder="Text input" name="bahagianA[1][17]"
                                                            id="" class="form-control">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cover"><input class="Cover10"
                                                    onchange="handleCheckboxChange('Cover10')" type="checkbox"
                                                    name="bahagianA[2][17]" id="" value="ok"></td>
                                            <td class="cover"><input class="Cover10"
                                                    onchange="handleCheckboxChange('Cover10')" type="checkbox" checked
                                                    name="bahagianA[2][17]" id="" value="ng"></td>
                                            <td class="cover"><input class="Cover10"
                                                    onchange="handleCheckboxChange('Cover10')" type="checkbox"
                                                    name="bahagianA[2][17]" id="" value="na"></td>
                                            <td class="text endpaper"><input class="Text15"
                                                    onchange="handleCheckboxChange('Text15')" type="checkbox"
                                                    name="bahagianA[3][17]" id="" value="ok"></td>
                                            <td class="text endpaper"><input class="Text15"
                                                    onchange="handleCheckboxChange('Text15')" type="checkbox" checked
                                                    name="bahagianA[3][17]" id="" value="ng"></td>
                                            <td class="text endpaper"><input class="Text15"
                                                    onchange="handleCheckboxChange('Text15')" type="checkbox"
                                                    name="bahagianA[3][17]" id="" value="na"></td>
                                            <td class="endpaper"><input class="Endpaper8"
                                                    onchange="handleCheckboxChange('Endpaper8')" type="checkbox"
                                                    name="bahagianA[4][17]" id="" value="nok"></td>
                                            <td class="endpaper"><input class="Endpaper8"
                                                    onchange="handleCheckboxChange('Endpaper8')" type="checkbox" checked
                                                    name="bahagianA[4][17]" id="" value="ng"></td>
                                            <td class="endpaper"><input class="Endpaper8"
                                                    onchange="handleCheckboxChange('Endpaper8')" type="checkbox"
                                                    name="bahagianA[4][17]" id="" value="na"></td>
                                        </tr>

                                        <tr>
                                            <td>18</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3"> Lain-lain Other: </div>
                                                    <div class="col-md-9"><input type="text" width=""
                                                            placeholder="Text input" name="bahagianA[1][18]"
                                                            id="" class="form-control">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cover"><input class="Cover11"
                                                    onchange="handleCheckboxChange('Cover11')" type="checkbox"
                                                    name="bahagianA[2][18]" id="" value="ok"></td>
                                            <td class="cover"><input class="Cover11"
                                                    onchange="handleCheckboxChange('Cover11')" type="checkbox" checked
                                                    name="bahagianA[2][18]" id="" value="ng"></td>
                                            <td class="cover"><input class="Cover11"
                                                    onchange="handleCheckboxChange('Cover11')" type="checkbox"
                                                    name="bahagianA[2][18]" id="" value="na"></td>
                                            <td class="text endpaper"><input class="Text16"
                                                    onchange="handleCheckboxChange('Text16')" type="checkbox"
                                                    name="bahagianA[3][18]" id="" value="ok"></td>
                                            <td class="text endpaper"><input class="Text16"
                                                    onchange="handleCheckboxChange('Text16')" type="checkbox" checked
                                                    name="bahagianA[3][18]" id="" value="ng"></td>
                                            <td class="text endpaper"><input class="Text16"
                                                    onchange="handleCheckboxChange('Text16')" type="checkbox"
                                                    name="bahagianA[3][18]" id="" value="na"></td>
                                            <td class="endpaper"><input class="Endpaper9"
                                                    onchange="handleCheckboxChange('Endpaper9')" type="checkbox"
                                                    name="bahagianA[4][18]" id="" value="ok"></td>
                                            <td class="endpaper"><input class="Endpaper9"
                                                    onchange="handleCheckboxChange('Endpaper9')" type="checkbox" checked
                                                    name="bahagianA[4][18]" id="" value="ng"></td>
                                            <td class="endpaper"><input class="Endpaper9"
                                                    onchange="handleCheckboxChange('Endpaper9')" type="checkbox"
                                                    name="bahagianA[4][18]" id="" value="na"></td>
                                        </tr>
                                        <tr>
                                            <td>19</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3"> Lain-lain Other: </div>
                                                    <div class="col-md-9"><input type="text" width=""
                                                            placeholder="Text input" name="bahagianA[1][19]"
                                                            id="" class="form-control">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cover"><input class="Cover12"
                                                    onchange="handleCheckboxChange('Cover12')" type="checkbox"
                                                    name="bahagianA[2][19]" id="" value="ok"></td>
                                            <td class="cover"><input class="Cover12"
                                                    onchange="handleCheckboxChange('Cover12')" type="checkbox" checked
                                                    name="bahagianA[2][19]" id="" value="ng"></td>
                                            <td class="cover"><input class="Cover12"
                                                    onchange="handleCheckboxChange('Cover12')" type="checkbox"
                                                    name="bahagianA[2][19]" id="" value="na"></td>
                                            <td class="text endpaper"><input class="Text17"
                                                    onchange="handleCheckboxChange('Text17')" type="checkbox"
                                                    name="bahagianA[3][19]" id="" value="ok"></td>
                                            <td class="text endpaper"><input class="Text17"
                                                    onchange="handleCheckboxChange('Text17')" type="checkbox" checked
                                                    name="bahagianA[3][19]" id="" value="ng"></td>
                                            <td class="text endpaper"><input class="Text17"
                                                    onchange="handleCheckboxChange('Text17')" type="checkbox"
                                                    name="bahagianA[3][19]" id="" value="na"></td>
                                            <td class="endpaper"><input class="Endpaper9"
                                                    onchange="handleCheckboxChange('Endpaper9')" type="checkbox"
                                                    name="bahagianA[4][19]" id="" value="ok"></td>
                                            <td class="endpaper"><input class="Endpaper9"
                                                    onchange="handleCheckboxChange('Endpaper9')" type="checkbox" checked
                                                    name="bahagianA[4][19]" id="" value="ng"></td>
                                            <td class="endpaper"><input class="Endpaper9"
                                                    onchange="handleCheckboxChange('Endpaper9')" type="checkbox"
                                                    name="bahagianA[4][19]" id="" value="na"></td>
                                        </tr>
                                        <tr>
                                            <td>20</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3"> Lain-lain Other: </div>
                                                    <div class="col-md-9"><input type="text" width=""
                                                            placeholder="Text input" name="bahagianA[1][20]"
                                                            id="" class="form-control">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cover"><input class="Cover13"
                                                    onchange="handleCheckboxChange('Cover13')" type="checkbox"
                                                    name="bahagianA[2][20]" id="" value="ok"></td>
                                            <td class="cover"><input class="Cover13"
                                                    onchange="handleCheckboxChange('Cover13')" type="checkbox" checked
                                                    name="bahagianA[2][20]" id="" value="ng"></td>
                                            <td class="cover"><input class="Cover13"
                                                    onchange="handleCheckboxChange('Cover13')" type="checkbox"
                                                    name="bahagianA[2][20]" id="" value="na"></td>
                                            <td class="text endpaper"><input class="Text18"
                                                    onchange="handleCheckboxChange('Text18')" type="checkbox"
                                                    name="bahagianA[3][20]" id="" value="ok"></td>
                                            <td class="text endpaper"><input class="Text18"
                                                    onchange="handleCheckboxChange('Text18')" type="checkbox" checked
                                                    name="bahagianA[3][20]" id="" value="ng"></td>
                                            <td class="text endpaper"><input class="Text18"
                                                    onchange="handleCheckboxChange('Text18')" type="checkbox"
                                                    name="bahagianA[3][20]" id="" value="na"></td>
                                            <td class="endpaper"><input class="Endpaper10"
                                                    onchange="handleCheckboxChange('Endpaper10')" type="checkbox"
                                                    name="bahagianA[4][20]" id="" value="ok"></td>
                                            <td class="endpaper"><input class="Endpaper10"
                                                    onchange="handleCheckboxChange('Endpaper10')" type="checkbox" checked
                                                    name="bahagianA[4][20]" id="" value="ng"></td>
                                            <td class="endpaper"><input class="Endpaper10"
                                                    onchange="handleCheckboxChange('Endpaper10')" type="checkbox"
                                                    name="bahagianA[4][20]" id="" value="na"></td>
                                        </tr>
                                        <tr>
                                            <td>21</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3"> Lain-lain Other: </div>
                                                    <div class="col-md-9"><input type="text" width=""
                                                            placeholder="Text input" name="bahagianA[1][21]"
                                                            id="" class="form-control">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cover"><input class="Cover14"
                                                    onchange="handleCheckboxChange('Cover14')" type="checkbox"
                                                    name="bahagianA[2][21]" id="" value="ok"></td>
                                            <td class="cover"><input class="Cover14"
                                                    onchange="handleCheckboxChange('Cover14')" type="checkbox" checked
                                                    name="bahagianA[2][21]" id="" value="ng"></td>
                                            <td class="cover"><input class="Cover14"
                                                    onchange="handleCheckboxChange('Cover14')" type="checkbox"
                                                    name="bahagianA[2][21]" id="" value="na"></td>
                                            <td class="text endpaper"><input class="Text19"
                                                    onchange="handleCheckboxChange('Text19')" type="checkbox"
                                                    name="bahagianA[3][21]" id="" value="ok"></td>
                                            <td class="text endpaper"><input class="Text19"
                                                    onchange="handleCheckboxChange('Text19')" type="checkbox" checked
                                                    name="bahagianA[3][21]" id="" value="ng"></td>
                                            <td class="text endpaper"><input class="Text19"
                                                    onchange="handleCheckboxChange('Text19')" type="checkbox"
                                                    name="bahagianA[3][21]" id="" value="na"></td>
                                            <td class="endpaper"><input class="Endpaper11"
                                                    onchange="handleCheckboxChange('Endpaper11')" type="checkbox"
                                                    name="bahagianA[4][21]" id="" value="ok"></td>
                                            <td class="endpaper"><input class="Endpaper11"
                                                    onchange="handleCheckboxChange('Endpaper11')" type="checkbox" checked
                                                    name="bahagianA[4][21]" id="" value="ng"></td>
                                            <td class="endpaper"><input class="Endpaper11"
                                                    onchange="handleCheckboxChange('Endpaper11')" type="checkbox"
                                                    name="bahagianA[4][21]" id="" value="na"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <h5>Bahagian B (Semakan imposition)</h5>
                        <div class="card" style="background:#f1f0f0;">
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="col-md-4 text">
                                        <div class="form-group">
                                            <label for="">Saiz kertas cetak teks (inci)</label>
                                            <input type="text" placeholder="input teks" name="bahagian_b_1"
                                                id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 text">
                                        <div class="form-group">
                                            <label for="">Saiz spacing (mm)</label>
                                            <input type="text" placeholder="input teks" name="bahagian_b_2"
                                                id="" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4 cover">
                                        <div class="form-group">
                                            <label for="">Saiz kertas cetak cover (inci)</label>
                                            <input type="text" placeholder="input teks" name="bahagian_b_3"
                                                id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 cover">
                                        <div class="form-group">
                                            <label for="">Saiz spacing (mm)</label>
                                            <input type="text" placeholder="input teks" name="bahagian_b_4"
                                                id="" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 endpaper">
                                        <div class="form-group">
                                            <label for="">Saiz kertas cetak endpaper (inci)</label>
                                            <input type="text" placeholder="input teks" name="bahagian_b_5"
                                                id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 endpaper">
                                        <div class="form-group">
                                            <label for="">Saiz spacing (mm)</label>
                                            <input type="text" placeholder="input teks" name="bahagian_b_6"
                                                id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-md-4 text">
                                    <div class="form-group">
                                        <label for="">Saiz kawasan cetakan teks (inci)</label>
                                        <input type="text" placeholder="input teks" readonly name="bahagian_b_7"
                                            id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 cover">
                                                <div class="form-group">
                                                    <label for="">Saiz kawasan cetakan cover (inci)</label>
                                                    <input type="text" placeholder="input teks" readonly name="bahagian_b_8" id="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4 endpaper" >
                                                <div class="form-group">
                                                    <label for="">Saiz kawasan cetakan endpaper (inci)</label>
                                                    <input type="text" placeholder="input teks" readonly name="bahagian_b_9" id="" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-4 text" >
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="checkbox" name="bahagian_b_p4_1" id="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <p>P4</p>
                                                        </div>
                                                        <div class="col-md-6">Max: 900mm X 615mm</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 cover" >
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="checkbox" name="bahagian_b_p4_2" id="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <p>P4</p>
                                                        </div>
                                                        <div class="col-md-6">Max: 900mm X 615mm</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 endpaper" >
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="checkbox" name="bahagian_b_p4_3" id="">
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
                                                            <input type="checkbox" name="bahagian_b_p3_1" id="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <p>P3</p>
                                                        </div>
                                                        <div class="col-md-6">Max: 1010mm X 715mm</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 cover" >
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="checkbox" name="bahagian_b_p3_2" id="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <p>P3</p>
                                                        </div>
                                                        <div class="col-md-6">Max: 1010mm X 715mm</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 endpaper" >
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="checkbox" name="bahagian_b_p3_3" id="">
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
                                                            <input type="checkbox" name="bahagian_b_p1_1" id="">
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
                                        <tr class="cover">
                                            <td>Cover</td>
                                            <td><input type="checkbox" name="bahagianC[1][1]" id="" value="ok"></td>
                                            <td><input type="checkbox" checked name="bahagianC[1][1]" id="" value="ng"></td>
                                            <td><input type="checkbox" name="bahagianC[1][1]" id="" value="na"></td>
                                            <td><input type="checkbox" name="bahagianC[1][2]" id="" value="ok"></td>
                                            <td><input type="checkbox" checked name="bahagianC[1][2]" id="" value="ng"></td>
                                            <td><input type="checkbox" name="bahagianC[1][2]" id="" value="na"></td>
                                            <td><input type="checkbox" name="bahagianC[1][3]" id="" value="ok"></td>
                                            <td><input type="checkbox" checked name="bahagianC[1][3]" id="" value="ng"></td>
                                            <td><input type="checkbox" name="bahagianC[1][3]" id="" value="na"></td>
                                            <td><input type="checkbox" name="bahagianC[1][4]" id="" value="ok"></td>
                                            <td><input type="checkbox" checked name="bahagianC[1][4]" id="" value="ng"></td>
                                            <td><input type="checkbox" name="bahagianC[1][4]" id="" value="na"></td>
                                            <td><input type="checkbox" name="bahagianC[1][5]" id="" value="ok"></td>
                                            <td><input type="checkbox" checked name="bahagianC[1][5]" id="" value="ng"></td>
                                            <td><input type="checkbox" name="bahagianC[1][5]" id="" value="na"></td>
                                            <td><input type="text" placeholder="input text" name="bahagianC[1][6]" id="" class="form-control"></td>
                                        </tr>

                                        <tr class="endpaper">
                                            <td>End/Leftlet</td>
                                            <td><input type="checkbox" name="bahagianC[2][1]" id="" value="ok"></td>
                                            <td><input type="checkbox" checked name="bahagianC[2][1]" id="" value="ng"></td>
                                            <td><input type="checkbox" name="bahagianC[2][1]" id="" value="na"></td>
                                            <td><input type="checkbox" name="bahagianC[2][2]" id="" value="ok"></td>
                                            <td><input type="checkbox" checked name="bahagianC[2][2]" id="" value="ng"></td>
                                            <td><input type="checkbox" name="bahagianC[2][2]" id="" value="na"></td>
                                            <td><input type="checkbox" name="bahagianC[2][3]" id="" value="ok"></td>
                                            <td><input type="checkbox" checked name="bahagianC[2][3]" id="" value="ng"></td>
                                            <td><input type="checkbox" name="bahagianC[2][3]" id="" value="na"></td>
                                            <td><input type="checkbox" name="bahagianC[2][4]" id="" value="ok"></td>
                                            <td><input type="checkbox" checked name="bahagianC[2][4]" id="" value="ng"></td>
                                            <td><input type="checkbox" name="bahagianC[2][4]" id="" value="na"></td>
                                            <td><input type="checkbox" name="bahagianC[2][5]" id="" value="ok"></td>
                                            <td><input type="checkbox" checked name="bahagianC[2][5]" id="" value="ng"></td>
                                            <td><input type="checkbox" name="bahagianC[2][5]" id="" value="na"></td>
                                            <td><input type="text" placeholder="input text" name="bahagianC[2][6]" id="" class="form-control"></td>
                                        </tr>

                                        <tr class="section">
                                            <td>Section 1</td>
                                            <td><input type="checkbox" name="bahagianC[3][1]" id="" value="ok"></td>
                                            <td><input type="checkbox" checked name="bahagianC[3][1]" id="" value="ng"></td>
                                            <td><input type="checkbox" name="bahagianC[3][1]" id="" value="na"></td>
                                            <td><input type="checkbox" name="bahagianC[3][2]" id="" value="ok"></td>
                                            <td><input type="checkbox" checked name="bahagianC[3][2]" id="" value="ng"></td>
                                            <td><input type="checkbox" name="bahagianC[3][2]" id="" value="na"></td>
                                            <td><input type="checkbox" name="bahagianC[3][3]" id="" value="ok"></td>
                                            <td><input type="checkbox" checked name="bahagianC[3][3]" id="" value="ng"></td>
                                            <td><input type="checkbox" name="bahagianC[3][3]" id="" value="na"></td>
                                            <td><input type="checkbox" name="bahagianC[3][4]" id="" value="ok"></td>
                                            <td><input type="checkbox" checked name="bahagianC[3][4]" id="" value="ng"></td>
                                            <td><input type="checkbox" name="bahagianC[3][4]" id="" value="na"></td>
                                            <td><input type="checkbox" name="bahagianC[3][5]" id="" value="ok"></td>
                                            <td><input type="checkbox" checked name="bahagianC[3][5]" id="" value="ng"></td>
                                            <td><input type="checkbox" name="bahagianC[3][5]" id="" value="na"></td>
                                            <td><input type="text" placeholder="input text" name="bahagianC[3][6]" id="" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="card" style="background:#f1f0f0;">
                                    <div class="card-body">
                                        <h5>
                                            Gripper margin (Rujuk file imposition)
                                        </h5>

                                        <div class="row mt-2">
                                            <div class="col-md-4 cover" >
                                                <div class="form-group">
                                                    <label for="">Cover</label>
                                                    <input type="text" placeholder="input teks" class="form-control" name="gripper_margin_cover" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-4 text">
                                                <div class="form-group">
                                                    <label for="">Teks</label>
                                                    <input type="text" placeholder="input teks" class="form-control" name="gripper_margin_teks" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-4 endpaper">
                                                <div class="form-group">
                                                    <label for="">Endpaper/Leaflet</label>
                                                    <input type="text" placeholder="input teks" class="form-control" name="gripper_margin_leaflet" id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="background:#f1f0f0;">
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
                    <a href="{{ route('senari_semak_cetak') }}">back to list</a>
                </div>
            </div>
            </form>
@endsection

@push('custom-scripts')
    <script>
        function handleCheckboxChange(groupClassName) {
            const checkboxes = document.querySelectorAll(`.${groupClassName}`);

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    checkboxes.forEach(cb => {
                        if (cb !== this) {
                            cb.checked = false;
                        }
                    });
                });
            });
        }

        $(document).ready(function() {
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
                templateResult: function(data) {
                    if (data.loading) {
                        return "Loading...";
                    }

                    return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                },
                templateSelection: function(data) {
                    return data.name || null;
                }
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
