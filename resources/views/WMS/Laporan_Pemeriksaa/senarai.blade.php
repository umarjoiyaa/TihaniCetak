@extends('layouts.app')

@section('content')


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
                                <input type="number" id="jumlah_palet" class="form-control">
                            </div>

                        </div>
                        <div class="row">
                            <div class="table-responsive">
                            <table class="table table-bordered mt-3" id="dynamicTable">
                                <thead>
                                    <tr class="tr_thead">
                                        <th>Palet No.</th>
                                        <th>Palet 1</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="first_tr">
                                        <td>kuantiti bagi setiap palet</td>
                                        <td><input type="text" name="row_1_1" class="form-control" placeholder="User Input"></td>
                                    </tr>
                                    <tr class="second_tr">
                                        <td>Kualiti sample</td>
                                        <td><input type="text" name="row_2_1" class="form-control" placeholder="User Input"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                        <div class="row">
                            <div class="table-responsive">
                                <h5>Keputusan Pemeriksaan</h5>
                                <table class="table table-bordered mt-3">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th>Palet 1</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Kotor</td>
                                            <td><input type="text" placeholder="input intenger" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Cetaken doubling</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Senget</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Rosak/Koyak</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Teks terpontong</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Muka surat tidak cukup</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Endpaper/cover paper terblaik</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>tiada cetaken</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Cover Lari</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>masalah UV Tarnish</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Gam tidak cukup</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Teks-terlipat</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Lain-Lain</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Reject</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>permeriksaan 100%</td>
                                            <td><label for="">yes</label><input type="radio" name=""
                                                    placeholder="Input integer" id=""><label for="">no</label></td>
                                        </tr>
                                        <tr>
                                            <td>Diperiksa Oleh</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Disahkan Oleh</td>
                                            <td><input type="number" name="" placeholder="Input integer" id=""
                                                    class="form-control"></td>
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

@endsection
@push('custom-scripts')
<script>
   $(document).ready(function() {
    $('#jumlah_palet').on('input', function() {
        var jumlahPalet = parseInt($(this).val());
        if (!isNaN(jumlahPalet)) {
            var existingPalletsCount = $('#dynamicTable .tr_thead th').length - 1; // Subtract 1 to exclude the initial "Palet 1" header

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
                        $('#dynamicTable .tr_thead').append('<th>Palet ' + i + '</th>');
                        $('#dynamicTable .first_tr').append('<td><input type="text" name="row_1_' + i + '" class="form-control" placeholder="User Input"></td>');
                        $('#dynamicTable .second_tr').append('<td><input type="text" name="row_2_' + i + '" class="form-control" placeholder="User Input"></td>');
                    }
                }
            }
        }
    });
});


</script>
@endpush
