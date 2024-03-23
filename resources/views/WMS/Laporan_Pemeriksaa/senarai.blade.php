@extends('layouts.app')

@section('content')
<style>
    #dynamicTable th, #dynamicTable td {
        width: 250px !important;
    }
    </style>
<form action="{{ route('laporan_pemeriksaan.senari_store') }}" method="POST">
    @csrf
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Senarai Semak Pram Cetak</h5>
            </div>
            <div class="card-body">
                <div class="card" style="background:#f6f7f7;">
                    <div class="card-body">
                        <h5>h) Rekod Pemeriksaan AQL</h5>
                        <div class="row mt-5">
                            <div class="col-md-4">
                                <label for="">Jumlah palet</label>
                                <input type="number" name="jumlah_palet" id="jumlah_palet" class="form-control">
                            </div>

                        </div>
                        <div class="row">
                            <div class="table-responsive">
                            <table class="table table-bordered mt-3" id="dynamicTable">
                                <thead>
                                    <tr class="tr_thead">
                                        <th style="width: 250px;">Palet No.</th>

                                        @if(!isset($laporan_pemeriksaan_akhir_senari) && !empty($laporan_pemeriksaan_akhir_senari))

                                        @foreach($laporan_pemeriksaan_akhir_senari as $details)

                                        <th style="width: 250px;">
                                                <input type="hidden" name="row[{{ $details['row_pallet'] }}][1]" value="{{ $details['row_pallet'] }}">Pallet {{ $details['row_pallet'] }}
                                            </th>
                                        @endforeach
                                    @else

                                        <th style="width: 250px;">
                                            <input type="hidden" name="row[1][1]" value="1">Pallet 1
                                        </th>
                                    @endif

                                    </tr>
                                </thead>
                                <tbody>

                                <tr class="first_tr">
                                    <td ><div style="width: 200px;">kuantiti bagi setiap palet</div></td>
                                    @if(!isset($laporan_pemeriksaan_akhir_senari) && !empty($laporan_pemeriksaan_akhir_senari))
                                        @foreach($laporan_pemeriksaan_akhir_senari as $details)
                                    <td ><input type="text" name="row[{{ $details['row_pallet'] }}][2]" value="{{ $details['row_1'] }}"  class="form-control" ></td>
                                    @endforeach
                                    @else
                                    <td ><input type="text" name="row[1][2]"  class="form-control" ></td>
                                    @endif
                                </tr>
                                <tr class="second_tr">
                                    <td > <div style="width: 200px;">Kualiti sample</div></td>
                                    @if(!isset($laporan_pemeriksaan_akhir_senari) && !empty($laporan_pemeriksaan_akhir_senari))
                                    @foreach($laporan_pemeriksaan_akhir_senari as $key => $detail)
                                <td ><input type="text" name="row[{{ $key }}][3]" value="{{ $detail->row_2 }}"  class="form-control" ></td>
                                @endforeach
                                @else
                                <td ><input type="text" name="row[1][3]"  class="form-control" ></td>

                                @endif
                                </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                        <div class="row">
                            <div class="table-responsive">
                                <h5>Keputusan Pemeriksaan</h5>
                                <table class="table table-bordered mt-3" id="keputusan">
                                    <thead>
                                        <tr class="thead_row_keputusan">
                                            <th>Kriteria</th>

                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                        @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)

                                        <th style="width: 250px;">
                                                <input type="hidden" name="row[{{ $detail['keputusan_row_pallet'] }}][1]" value="{{ $detail['keputusan_row_pallet'] }}">Pallet {{ $detail['keputusan_row_pallet'] }}
                                            </th>
                                        @endforeach
                                    @else
                                        <th style="width: 250px;">
                                            <input type="hidden" name="row[1][1]" value="1">Pallet 1
                                        </th>
                                    @endif


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="first_row_keputusan">
                                            <td>Kotor</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][2]" value="{{ $detail['keputusan_row_1'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][2]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="second_row_keputusan">
                                            <td>Cetaken doubling</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][3]" value="{{ $detail['keputusan_row_2'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][3]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="third_row_keputusan">
                                            <td>Senget</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][4]" value="{{ $detail['keputusan_row_3'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][4]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="forth_row_keputusan">
                                            <td>Rosak/Koyak</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][5]" value="{{ $detail['keputusan_row_4'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][5]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="fifth_row_keputusan">
                                            <td>Teks terpontong</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][6]" value="{{ $detail['keputusan_row_5'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][6]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="sixth_row_keputusan">
                                            <td>Muka surat tidak cukup</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][7]" value="{{ $detail['keputusan_row_6'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][7]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="seventh_row_keputusan">
                                            <td>Endpaper/cover paper terblaik</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][8]" value="{{ $detail['keputusan_row_7'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][8]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="eight_row_keputusan">
                                            <td>tiada cetaken</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][9]" value="{{ $detail['keputusan_row_8'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][9]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="nineth_row_keputusan">
                                            <td>Cover Lari</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][10]" value="{{ $detail['keputusan_row_9'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][10]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="tenth_row_keputusan">
                                            <td>masalah UV Tarnish</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][11]" value="{{ $detail['keputusan_row_10'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][11]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="eleventh_row_keputusan">
                                            <td>Gam tidak cukup</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][12]" value="{{ $detail['keputusan_row_11'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][12]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="twelveth_row_keputusan">
                                            <td>Teks-terlipat</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][13]" value="{{ $detail['keputusan_row_12'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][13]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="thirteenth_row_keputusan">
                                            <td>Lain-Lain</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][14]" value="{{ $detail['keputusan_row_13'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][14]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="forteenth_row_keputusan">
                                            <td>Jumlah Reject</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][15]" value="{{ $detail['keputusan_row_14'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][15]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="fifteenth_row_keputusan">
                                            <td>permeriksaan 100%</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><div class="d-flex justify-content-center"> <label class="mx-2">Yes</label><div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][16]" @checked($detail['keputusan_row_15'] != null)>
                                                <label class="custom-control-label" for="customSwitch1">No</label>
                                              </div>
                                            </div>
                                            </td>
                                            @endforeach
                                            @else
                                            <td><div class="d-flex justify-content-center"> <label class="mx-2">Yes</label><div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1" name="keputusan[1][16]">
                                                <label class="custom-control-label" for="customSwitch1">No</label>
                                              </div>
                                            </div>
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="sixteenth_row_keputusan">
                                            <td>Diperiksa Oleh</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][17]" value="{{ $detail['keputusan_row_16'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][17]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="seventeenth_row_keputusan">
                                            <td>Disahkan Oleh</td>
                                            @if(!isset($laporan_pemeriksaan_akhir_senari2) && !empty($laporan_pemeriksaan_akhir_senari2))
                                            @foreach($laporan_pemeriksaan_akhir_senari2 as $detail)
                                            <td><input type="text" name="keputusan[{{ $detail['keputusan_row_pallet'] }}][18]" value="{{ $detail['keputusan_row_17'] }}"  class="form-control">
                                            </td>
                                            @endforeach
                                            @else
                                            <td><input type="text" name="keputusan[1][18]"   class="form-control">
                                            </td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <h5><b>Nota:</b></h5>
                                <p>1. Kuantiti sample berdasarkan Pelan Persamplean Rawak, AQL 0.25, Pemeriksaan Am
                                    Tahap II (Rujuk jadual AQL).</p>
                                <p>2. Jika keputusan pemeriksaan persamplean rawak gagal, pemeriksaan 100% hendaklah
                                    dilalkukan bagi palet yang terlibat.</p>
                            </div>
                        </div>
                    </div>
                    Nota:


                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary float-right">save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>


@endsection
@push('custom-scripts')
<script>
$(document).ready(function() {





    $('input[type=hidden]').removeAttr('disabled');

    $('#jumlah_palet').on('input', function() {
        var jumlahPalet = parseInt($(this).val());
        if (jumlahPalet < 1) {
            return; // Exit the function if value is less than 1
        }

        var existingPalletsCount = $('#dynamicTable .tr_thead th').length - 1; // Subtract 1 to exclude the initial "Palet 1" header
        var existingPalletsTable2Count = $('#keputusan .thead_row_keputusan th').length - 1
        // Remove excess pallet columns if the new value is less than the existing count
        if (jumlahPalet < existingPalletsCount) {
            for (var i = existingPalletsCount; i > jumlahPalet; i--) {
                $('#dynamicTable .tr_thead th:last-child').remove(); // Remove last header
                $('#dynamicTable .first_tr td:last-child').remove(); // Remove last cell from first row
                $('#dynamicTable .second_tr td:last-child').remove(); // Remove last cell from second row
            }
        }

        // Add new pallet columns if the new value is greater than the existing count
        else if (jumlahPalet > existingPalletsCount) {
            for (var i = existingPalletsCount + 1; i <= jumlahPalet; i++) {
                if (!$('#dynamicTable .tr_thead th:contains("Palet ' + i + '")').length) { // Check if the pallet header already exists
                    $('#dynamicTable .tr_thead').append('<th style="width: 200px ;"><input type="hidden" name="row['+i+'][1]" value="'+i+'">Palet ' + i + '</th>');
                    $('#dynamicTable .first_tr').append('<td ><input type="text" name="row['+i+'][2]" class="form-control" style="width: 200px ;"></td>');
                    $('#dynamicTable .second_tr').append('<td ><input type="text" name="row['+i+'][3]" class="form-control" style="width: 200px ;"></td>');
                }
            }
            $('.form-control').css('width','200px')
        }

        if (jumlahPalet < existingPalletsTable2Count) {
            for (var i = existingPalletsTable2Count; i > jumlahPalet; i--) {
                $('#keputusan .thead_row_keputusan th:last-child').remove(); // Remove last header
                $('#keputusan .first_row_keputusan td:last-child').remove(); // Remove last cell from first row
                $('#keputusan .second_row_keputusan td:last-child').remove(); // Remove last cell from second row
                $('#keputusan .third_row_keputusan td:last-child').remove(); // Remove last cell from second row
                $('#keputusan .forth_row_keputusan td:last-child').remove(); // Remove last cell from second row
                $('#keputusan .fifth_row_keputusan td:last-child').remove(); // Remove last cell from second row
                $('#keputusan .sixth_row_keputusan td:last-child').remove(); // Remove last cell from second row
                $('#keputusan .seventh_row_keputusan td:last-child').remove(); // Remove last cell from second row
                $('#keputusan .eight_row_keputusan td:last-child').remove(); // Remove last cell from second row
                $('#keputusan .nineth_row_keputusan td:last-child').remove(); // Remove last cell from second row
                $('#keputusan .tenth_row_keputusan td:last-child').remove(); // Remove last cell from second row
                $('#keputusan .eleventh_row_keputusan td:last-child').remove(); // Remove last cell from second row
                $('#keputusan .twelveth_row_keputusan td:last-child').remove(); // Remove last cell from second row
                $('#keputusan .thirteenth_row_keputusan td:last-child').remove(); // Remove last cell from second row
                $('#keputusan .forteenth_row_keputusan td:last-child').remove(); // Remove last cell from second row
                $('#keputusan .fifteenth_row_keputusan td:last-child').remove(); // Remove last cell from second row
                $('#keputusan .sixteenth_row_keputusan td:last-child').remove(); // Remove last cell from second row
                $('#keputusan .seventeenth_row_keputusan td:last-child').remove(); // Remove last cell from second row
            }
        }

        // Add new pallet columns if the new value is greater than the existing count
        else if (jumlahPalet > existingPalletsTable2Count) {
            for (var i = existingPalletsTable2Count + 1; i <= jumlahPalet; i++) {
                if (!$('#keputusan .thead_row_keputusan th:contains("Palet ' + i + '")').length) { // Check if the pallet header already exists
                    $('#keputusan .thead_row_keputusan').append('<th style="width: 200px ;"><input type="hidden" name="keputusan['+i+'][1]" value="'+i+'">Palet ' + i + '</th>');
                    $('#keputusan .first_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][2]" class="form-control" style="width: 200px ;"></td>');
                    $('#keputusan .second_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][3]" class="form-control" style="width: 200px ;"></td>');
                    $('#keputusan .third_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][4]" class="form-control" style="width: 200px ;"></td>');
                    $('#keputusan .forth_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][5]" class="form-control" style="width: 200px ;"></td>');
                    $('#keputusan .fifth_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][6]" class="form-control" style="width: 200px ;"></td>');
                    $('#keputusan .sixth_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][7]" class="form-control" style="width: 200px ;"></td>');
                    $('#keputusan .seventh_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][8]" class="form-control" style="width: 200px ;"></td>');
                    $('#keputusan .eight_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][9]" class="form-control" style="width: 200px ;"></td>');
                    $('#keputusan .nineth_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][10]" class="form-control" style="width: 200px ;"></td>');
                    $('#keputusan .tenth_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][11]" class="form-control" style="width: 200px ;"></td>');
                    $('#keputusan .eleventh_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][12]" class="form-control" style="width: 200px ;"></td>');
                    $('#keputusan .twelveth_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][13]" class="form-control" style="width: 200px ;"></td>');
                    $('#keputusan .thirteenth_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][14]" class="form-control" style="width: 200px ;"></td>');
                    $('#keputusan .forteenth_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][15]" class="form-control" style="width: 200px ;"></td>');
                    $('#keputusan .fifteenth_row_keputusan').append('<td ><div class="d-flex justify-content-center"> <label class="mx-2">Yes</label><div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" id="customSwitch'+i+'" name="keputusan['+i+'][16]"><label class="custom-control-label" for="customSwitch'+i+'">No</label></div></div></td>');
                    $('#keputusan .sixteenth_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][17]" class="form-control" style="width: 200px ;"></td>');
                    $('#keputusan .seventeenth_row_keputusan').append('<td ><input type="text" name="keputusan['+i+'][18]" class="form-control" style="width: 200px ;"></td>');
                }
            }
            $('.form-control').css('width','200px')
        }

    });
});



</script>
@endpush
