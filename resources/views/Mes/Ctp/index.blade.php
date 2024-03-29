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
                        <h4 class="card-title tx-20 mg-b-0 p-2">LAPORAN PEMERIKSAAN KUALITI - CTP </h4>
                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('ctp.create')}}" class="btn btn-primary mb-2">Create</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped mt-2 datatable text-align-center">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-left">Sr#</th>
                                    <th rowspan="2" class="text-left">Date</th>
                                    <th rowspan="2" class="text-left">Time</th>
                                    <th rowspan="2" class="text-left">Sales Order NO</th>
                                    <th rowspan="2" class="text-left">Kod Buku</th>
                                    <th rowspan="2" class="text-left">Tajuk</th>
                                    <th colspan="8" class="text-center">File Artwork</th>
                                    <th colspan="8" class="text-center">imposition</th>
                                    <th rowspan="2" class="text-left">Status</th>
                                    <th rowspan="2" class="text-left">Action</th>
                                </tr>
                                <tr>
                                    <th class="text-left">Format file</th>
                                    <th class="text-left">Saiz produk</th>
                                    <th class="text-left">Bleed</th>
                                    <th class="text-left">Saiz spine</th>
                                    <th class="text-left">Alamat pencetak</th>
                                    <th class="text-left">Jumlah muka surat</th>
                                    <th class="text-left">Turutan muka surat</th>
                                    <th class="text-left">Kedudukan Artwork cover (hardcover)</th>
                                    <th class="text-left">Front and Back imposition</th>
                                    <th class="text-left">Kedudukan imposition</th>
                                    <th class="text-left">Saiz spacing</th>
                                    <th class="text-left">Printing method (Straight @ Perfecting)</th>
                                    <th class="text-left">Jumlah up</th>
                                    <th class="text-left">Dummy Lipatan</th>
                                    <th class="text-left">Jenis Penjilidan</th>
                                    <th class="text-left">Jenis kertas</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><input type="text" class="all_column" placeholder="search date"></th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search time">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search sale order no">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search kod buku">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search tajuk">
                                    </th>

                                    <th>
                                        <input type="text" class="all_column" placeholder="search format file">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search saiz produk">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search bleed">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search saiz spine">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search alamat pencetak">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search jumlah muka surat">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search turutan muka surat">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search kedudukan artwork cover (hardcover)">
                                    </th>



                                    <th>
                                        <input type="text" class="all_column" placeholder="search front and back imposition">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search kedudukan imposition">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search saiz spacing">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search printing method (Straight @ Perfecting)">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search Jumlah up">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search dummy lipatan">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search Jenis Penjilidan">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search Jenis kertas">
                                    </th>


                                    <th>
                                        <input type="text" class="all_column" placeholder="search status">
                                    </th>

                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                    <div class="col-md-12">
                       <h5> <b>Notes: </b></h5><br>
                        when creates and save - status show “ Checked” <br>
                        In action verify, user can click “Decline” or “ Verify” <br>
                        if Decline : status change to “Decline” and user can edit again the form <br>
                        if  Verify- status changes to “Verified” [user cannot edit anymore] <br>
                    </div>
                </div> -->
        </div>
    </div>





@endsection
@push('custom-scripts')
    <script>
        var data = "{{ route('ctp.data') }}";
    </script>
   <script src="{{ asset('assets/js/custom/mes/Ctp/index.js') }}"></script>
@endpush
