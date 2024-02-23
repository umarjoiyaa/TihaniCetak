@extends('layouts.app')

@section('css')
<style>
    .dropdownwidth{
        width:100px;
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
                        <table class="table table-striped mt-2" id="example1">
                            <thead>
                                <tr>
                                    <th rowspan="2">Date</th>
                                    <th rowspan="2">Time</th>
                                    <th rowspan="2">Sales Order NO</th>
                                    <th rowspan="2">Kod Buku</th>
                                    <th rowspan="2">Tajuk</th>
                                    <th colspan="8" class="text-center">File Artwork</th>
                                    <th colspan="8" class="text-center">imposition</th>
                                    <th rowspan="2">Status</th>
                                    <th rowspan="2">Action</th>
                                </tr>
                                <tr>
                                    <th>Format file</th>
                                    <th>Saiz produk</th>
                                    <th>Bleed</th>
                                    <th>Saiz spine</th>
                                    <th>Alamat pencetak</th>
                                    <th>Jumlah muka surat</th>
                                    <th>Turutan muka surat</th>
                                    <th>Kedudukan Artwork cover (hardcover)</th>
                                    <th>Front and Back imposition</th>
                                    <th>Kedudukan imposition</th>
                                    <th>Saiz spacing</th>
                                    <th>Printing method (Straight @ Perfecting)</th>
                                    <th>Jumlah up</th>
                                    <th>Dummy Lipatan</th>
                                    <th>Jenis Penjilidan</th>
                                    <th>Jenis kertas</th>
                                </tr>
                                <tr>
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
                                {{-- <tr class="">
                                    <td>1</td>
                                    <td>30/5/2023</td>
                                    <td>30/5/2023</td>
                                    <td>30/5/2023</td>
                                    <td>SO-001496</td>
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
                                    <td><input type="checkbox" name="" id=""></td>

                                    <td><span class="badge badge-pill badge-warning w-100 p-2">checked</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-primary" data-toggle="dropdown"
                                                id="dropdownMenuButton" type="button">Action<i
                                                    class="fas fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item"
                                                    href="{{route('Ctp.view')}}">View</a>
                                                <a class="dropdown-item"
                                                    href="{{route('Ctp.edit')}}">Edit</a>
                                                <a class="dropdown-item"
                                                    href="{{route('Ctp.verify')}}">Verify</a>
                                                <a class="dropdown-item" href="">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr> --}}
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
