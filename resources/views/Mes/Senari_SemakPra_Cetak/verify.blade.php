@extends('app')

@section('content')
<div class="container">
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
                                        <label for="">Sales Order No</label>
                                        <select readonly name="" id="" class="form-control">
                                            <option value="">Search Sales Order no</option>
                                            <option value="">SO - 001387</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Date</div>
                                        <input type="date " readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <!-- <div class="col-md-4"></div> -->
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" readonly value="auto dispaly (baseed SO)"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text" value="auto dispaly(based SO)" name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Time</div>
                                        <input type="time" value="10:00 am" name="" id="" class="form-control">
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
                                                    <td><input type="checkbox" name="" checked id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>End/Leaflet</td>
                                                    <td><input type="checkbox" name="" checked id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>cover</td>
                                                    <td><input type="number" value="1" name="" checked id=""></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Checked By</div>
                                        <input type="text" value="Admin" class="form-control" name="" id="">
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td rowspan="2">No</td>
                                        <td rowspan="2">
                                            <div class="text-center">kriteria</div>
                                        </td>
                                        <td colspan="3">cover</td>
                                        <td colspan="3">text</td>
                                        <td colspan="3">Endpaper/leftlet</td>

                                    </tr>
                                    <tr>
                                        <th>OK</th>
                                        <th>NG</th>
                                        <th>NA</th>
                                        <th>OK</th>
                                        <th>NG</th>
                                        <th>NA</th>
                                        <th>OK</th>
                                        <th>NG</th>
                                        <th>NA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Design clearance 5mm (print to cut dan stitching binding)</td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Image artwork (Semak teks & gambar)</td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Bleed (3-5mm)</td>
                                        <td colspan="3"><input type="text" placeholder="text input" class="form-control"
                                                name="" id=""></td>
                                        <td colspan="3"><input type="text" placeholder="text input" class="form-control"
                                                name="" id=""></td>
                                        <td colspan="3"><input type="text" placeholder="text input" class="form-control"
                                                name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Saiz spine (perfect bind)</td>
                                        <td colspan="3"><input type="text" readonly name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td colspan="3"><input type="text" readonly name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Kedudukan artwork (hardcover)</td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Alamat pencetak</td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Alamat pencetak</td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td colspan="3"><input type="text" class="form-control" readonly name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>Kedudukan artwork (hardcover)</td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>16</td>
                                        <td>Kedudukan artwork (hardcover)</td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>17</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3"> Lain-lain Other: </div>
                                                <div class="col-md-9"><input type="text" width=""
                                                        placeholder="Text input" name="" id="" class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>

                                    <tr>
                                        <td>18</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3"> Lain-lain Other: </div>
                                                <div class="col-md-9"><input type="text" width=""
                                                        placeholder="Text input" name="" id="" class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>19</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3"> Lain-lain Other: </div>
                                                <div class="col-md-9"><input type="text" width=""
                                                        placeholder="Text input" name="" id="" class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>20</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3"> Lain-lain Other: </div>
                                                <div class="col-md-9"><input type="text" width=""
                                                        placeholder="Text input" name="" id="" class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>21</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3"> Lain-lain Other: </div>
                                                <div class="col-md-9"><input type="text" width=""
                                                        placeholder="Text input" name="" id="" class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><input type="checkbox" checked name="" id=""></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h5>Bahagian B (Semakan imposition)</h5>
                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Saiz kertas cetak teks (inci)</label>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Saiz spacing (mm)</label>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Saiz kertas cetak cover (inci)</label>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Saiz spacing (mm)</label>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Saiz kertas cetak endpaper (inci)</label>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Saiz spacing (mm)</label>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Saiz kawasan cetakan teks (inci)</label>
                                        <input type="text" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Saiz kawasan cetakan cover (inci)</label>
                                        <input type="text" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Saiz kawasan cetakan endpaper (inci)</label>
                                        <input type="text" readonly name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <input type="checkbox" name="" id="">
                                            </div>
                                            <div class="col-md-2">
                                                <p>P4</p>
                                            </div>
                                            <div class="col-md-6">Max: 900mm X 615mm</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <input type="checkbox" name="" id="">
                                            </div>
                                            <div class="col-md-2">
                                                <p>P4</p>
                                            </div>
                                            <div class="col-md-6">Max: 900mm X 615mm</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <input type="checkbox" name="" id="">
                                            </div>
                                            <div class="col-md-2">
                                                <p>P4</p>
                                            </div>
                                            <div class="col-md-6">Max: 900mm X 615mm</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <input type="checkbox" name="" id="">
                                            </div>
                                            <div class="col-md-2">
                                                <p>P3</p>
                                            </div>
                                            <div class="col-md-6">Max: 1010mm X 715mm</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <input type="checkbox" name="" id="">
                                            </div>
                                            <div class="col-md-2">
                                                <p>P3</p>
                                            </div>
                                            <div class="col-md-6">Max: 1010mm X 715mm</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <input type="checkbox" name="" id="">
                                            </div>
                                            <div class="col-md-2">
                                                <p>P3</p>
                                            </div>
                                            <div class="col-md-6">Max: 1010mm X 715mm</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <input type="checkbox" name="" id="">
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

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td rowspan="2">Item</td>
                                <td colspan="3">Pemeriksaan dummy lipatan bercetak</td>
                                <td colspan="3">Front and Back imposition (Rujuk dummy)</td>
                                <td colspan="3">Kedudukan imposition (Rujuk dummy)</td>
                                <td colspan="3">Saiz spacing (Bandingkan file imposition dengan rujukan TCSB-AK49)</td>
                                <td colspan="3">Printing method (straight@Perfecting) (Rujuk file imposition)</td>
                                <td colspan="2" rowspan="2">No of up/ cavity (Sila nyatakan)</td>
                            </tr>
                            <tr>
                                <td>OK</td>
                                <td>ND</td>
                                <td>NA</td>
                                <td>OK</td>
                                <td>ND</td>
                                <td>NA</td>
                                <td>OK</td>
                                <td>ND</td>
                                <td>NA</td>
                                <td>OK</td>
                                <td>ND</td>
                                <td>NA</td>
                                <td>OK</td>
                                <td>ND</td>
                                <td>NA</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cover</td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="text" placeholder="input text" name="" id="" class="form-control"></td>
                            </tr>

                            <tr>
                                <td>End/Leftlet</td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="text" placeholder="input text" name="" id="" class="form-control"></td>
                            </tr>

                            <tr>
                                <td>Sect 1</td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><input type="text" placeholder="input text" name="" id="" class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <h5>
                                Gripper margin (Rujuk file imposition)
                            </h5>

                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Cover</label>
                                        <input type="text" placeholder="input teks" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Teks</label>
                                        <input type="text" placeholder="input teks" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Endpaper/Leaflet</label>
                                        <input type="text" placeholder="input teks" class="form-control" name="" id="">
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

                    <div class="row d-flex justify-content-end">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button class="btn btn-danger mx-2">Decline</button>
                            <button class="btn btn-primary ">Save</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('SenariSemak.index')}}">back to list</a>
    </div>
</div>
</div>
@endsection