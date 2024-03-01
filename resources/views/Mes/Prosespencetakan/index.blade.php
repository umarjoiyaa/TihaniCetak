@extends('layouts.app')

@section('css')
<style>
    .dropdownwidth{
        width:100px;
    }
    table thead th {
            text-align: center;
        }
</style>
@endsection
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title tx-20 mg-b-0 p-2">LAPORAN PEMERIKSAAN KUALITI (PROSES PENCETAKAN) </h4>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('proses_pencetakan.create') }}" class="btn btn-primary mb-2">Create</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable mt-2">
                                <thead>
                                    <tr>
                                        <th>sr</th>
                                        <th>Tarikh.</th>
                                        <th>Masa</th>
                                        <th>Mesin</th>
                                        <th>Sales Order No. </th>
                                        <th>Kod Buku</th>
                                        <th>Tajuk</th>
                                        <th>Artwork</th>
                                        <th>Turutan muka surat </th>
                                        <th>Kedudukan muka surat</th>
                                        <th>Saiz spine</th>
                                        <th>Kedudukan nombor muka surat</th>
                                        <th>Bleed (5mm)</th>
                                        <th>Warna</th>
                                        <th>Kedudukan warna</th>
                                        <th>Kedudukan Cetakan</th>
                                        <th>Periksa powder</th>
                                        <th>Minyak</th>
                                        <th>Kotor</th>
                                        <th>Doubling</th>
                                        <th>Hickies</th>
                                        <th>Frontlay & sidelay</th>
                                        <th>Gambar/teks hilang</th>
                                        <th>Pematuhan SOP</th>
                                        <th>Status</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search tarikh">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search masa">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search mesin">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search sale order no">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search kod_buku">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search tajuk">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Artwork">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Turutan muka surat">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kedudukan muka surat">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Saiz spine">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kedudukan nombor muka surat">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Bleed (5mm)">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Warna">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kedudukan warna">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kedudukan Cetakan">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Periksa powder">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Minyak">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kotor">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Doubling">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Hickies">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Frontlay & sidelay">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Gambar/teks hilang">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Pematuhan SOP">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search status">
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
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
        var data = "{{ route('proses_pencetakan.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/mes/ProsesPencetakan/index.js') }}"></script>
@endpush
