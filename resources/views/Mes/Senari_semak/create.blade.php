@extends('layouts.app')

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
                                        <div class="label">Tarikh</div>
                                        <select  name="" id="" class="form-control">
                                            <option value="">Search Sales Order no</option>
                                            <option value="">SO-001387</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Date</div>
                                        <input type="date"  value="Admin" class="form-control" id="Currentdate">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">kod Buku</div>
                                        <input type="text" readonly value="auto dispaly(based SO)" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text" readonly value="auto dispaly (Based SO)" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Time</div>
                                            <input type="time" id="Currenttime" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Checked By</div>
                                        <input type="text" value="Admin" readonly class="form-control" name="" id="">
                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h5><b>Bahagian A ( Semakan File)</b></h5>
                            </div>
                            <div class="col-md-9">
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2"><div class="text-center">kriteria</div></th>
                                            <th colspan="3">cover</th>
                                            <th colspan="3">text</th>

                                        </tr>
                                        <tr>
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
                                            <td><input type="checkbox"  name="" id=""></td>
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
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Bleed (3-5mm)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>

                                        <tr>
                                            <td>4</td>
                                            <td>Alamat pencetak</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Saiz spine (perfect bind)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Kedudukan artwork (hardcover)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Jumlah mukasurat (Job Sheet dan file)</td>
                                            <td colspan="3" readonly></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox"name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Cetakan (Sila nyatakan)</td>
                                            <td colspan="3"></td>
                                            <td colspan="3"><input type="type" class="form-control" value="input text" name="" id=""></td>

                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Turutan mukasurat (Berturutan)</td>
                                            <td colspan="3" readonly></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Turutan mukasurat (Berturutan)</td>
                                            <td colspan="3" readonly></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                    </tbody>
                                 </table>
                            </div>
                        </div>

                        <div class="card" style="background:#f1f0f0;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>NOTA:</h5>
                                        <p>1. Jika semakan file artwork mendapati permasalahan dan pelanggan memohon untuk pihak TCSB membuat tindakan pembetulan, pembetulan tersebut boleh diakukan oleh Operator POD. File artwork yang telah dibetulkan perlu dihantar semula kepada pelanggan untuk mendapatkan pengesahan. Setelah mendapat pengesahan pelanggan, barulah Operator POD boleh meneruskan proses seterusnya.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h5><b>Bahagian B (Pemeriksaan Dan Pengesahan 1st Piece)</b></h5>
                            </div>
                            <div class="col-md-9">
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2"><div class="text-center">kriteria</div></th>
                                            <th colspan="3">cover</th>
                                            <th colspan="3">text</th>

                                        </tr>
                                        <tr>
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
                                            <td>Jenis Kertas (Bandingkan SO dan Job Sheet)</td>
                                            <td><input type="checkbox"  name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Saiz produk (Bandingkan Job Sheet dan file art)</td>
                                            <td><input type="checkbox"  name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Artwork (Semak gambar dan teks)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td> Design clearance 5mm (print to cut dan stitching binding)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Jumlah mukasurat (Job Sheet dan file artwork)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Turutan mukasurat (Berturutan)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Bleed (3-5mm)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Crop mark (mempunyai crop mark)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>

                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Kedudukan cetakan depan belakang/print register</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Jenis penjilidan (Perf bind, Lock bind, Stitching)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>Spacing (Minimum 3mm)</td>
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

                        <div class="card" style="background:#f1f0f0;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>NOTA:</h5>
                                        <p>1. Cetak hanya 1 salinan untuk pemeriksaan dan pengesahan. <br>
                                            2. Mock up/sampel yang telah diluluskan oleh pelanggan hendaklah digunakan semasa membuat pemeriksaan dan pengesahan 1st piece. <br>
                                            3. Jike tiada mock up/sampel, gunakan softcopy file artwork yang digunakan untuk mencetak sebagai rujukan pemeriksaan dan pengesahan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h5><b>Bahagian C (Pemeriksaan Dan Pengesahan  Mock Up) - Untuk Mock Up Sahaja</b></h5>
                            </div>
                            <div class="col-md-9 mt-5">
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2"><div class="text-center">kriteria</div></th>
                                            <th colspan="3">cover</th>
                                            <th colspan="3">text</th>

                                        </tr>
                                        <tr>
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
                                            <td>Saiz produk (Ukur dan rujuk saiz pada Job Sheet)</td>
                                            <td><input type="checkbox" name="flexRadioDefault"   id=""></td>
                                            <td><input type="checkbox" name="flexRadioDefault" checked  id=""></td>
                                            <td><input type="checkbox"name="flexRadioDefault"  id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Artwork (Semak gambar dan teks)</td>
                                            <td><input type="checkbox"  name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Kotor, calar (Periksa setiap muka surat)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Jenis penjilidan (stitching, perfect bind, hardcover)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Jumlah mukasurat (Rujuk Job Sheet dan file artwork)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Turutan mukasurat (Berturutan)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Kelekatan matt/gloss lamination</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Koyak (Terkoyak / Rosak)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>

                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Imej/artwork terpotong</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Cop (Cop pada setiap mockup)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td><div class="row">
                                                <div class="col-md-5"> Lain-lain (nyatakan): </div>
                                                <div class="col-md-7"><input type="text" width="" placeholder="Text input" name="" id="" class="form-control"></div>
                                            </div>
                                               </td>
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

                        <div class="card" style="background:#f1f0f0;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>NOTA:</h5>
                                        <p>1. Setiap mockup perlu di cop pada kulit buku di belakang bahagian dalam.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary float-right">Save</button>
                    </div>
                </div>
                <a href="{{route('SenariSemak')}}">back to list</a>
            </div>
        </div>
    </div>
@endsection


@push('custom-scripts')

<script>
    $(document).ready(function() {
  // Set current date
  var currentDate = new Date().toISOString().split('T')[0];
  $('#Currentdate').val(currentDate);

   // Get current time
   var now = new Date();
  var hours = now.getHours().toString().padStart(2, '0');
  var minutes = now.getMinutes().toString().padStart(2, '0');

  // Combine hours and minutes
  var currentTime = hours + ':' + minutes;
  $('#Currenttime').val(currentTime);
});
</script>
@endpush
