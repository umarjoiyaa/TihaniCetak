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
                                <h6 class="card-title tx-20 mg-b-0 p-2"><b>LAPORAN PEMERIKSAAN KUALITI - PROSES THREE KNIFE</b></h6>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                        <a href="{{route('proses_three_knife.create')}}" class="btn btn-primary mb-2">Create</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable text-center table-bordered mt-2" id="example1">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Mesin</th>
                                        <th>Sales Order No. </th>
                                        <th>Kod Buku</th>
                                        <th>Tajuk</th>

                                        <th>Saiz yang betul </th>
                                        <th>Kedudukan potongan</th>
                                        <th>Teks tidak terpotong</th>
                                        <th>Kepetakan/squareness</th>
                                        <th>Turutan muka surat</th>
                                        <th>Kotor</th>
                                        <th>Koyak</th>
                                        <th>Melekat</th>
                                        <th>Calar</th>
                                        <th>Kemik</th>
                                        <th>Label yang betul</th>
                                        <th>Pematuhan SOP</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>

                                        <th><input type="text" class="all_column" placeholder="search date"></th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search time">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search machine">
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
                                            <input type="text" class="all_column" placeholder="search saiz yang betul">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kedudukan potongan">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Teks tidak terpotong">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kepetakan/squareness">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Turutan muka surat">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kotor">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Koyak">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Melekat">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Calar">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Kemik">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Label yang betul">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Pematuhan SOP">
                                        </th>
                                        <th>
                                            <input type="text" class="all_column" placeholder="search Sataus">
                                        </th>

                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr class="">
                                        <td>30/5/2023 </td>
                                        <td>10:00 am</td>
                                        <td>F1</td>
                                        <td>SO-001496</td>
                                        <td>CP-2940</td>
                                        <td>IQRO GENIUS - RUMI (NEW COVER)</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td>Ok</td>
                                        <td><span class="badge badge-warning">Checked</span></td>
                                        <td><div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                            data-toggle="dropdown" id="dropdownMenuButton" type="button">Action<i class="fas fa-caret-down ml-1"></i></button>
                                            <div  class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('ProsesThreeKnife.view')}}">View</a>
                                                <a class="dropdown-item" href="{{route('ProsesThreeKnife.edit')}}">Edit</a>
                                                <a class="dropdown-item" href="{{route('ProsesThreeKnife.verify')}}">Verify</a>
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
        var data = "{{ route('proses_three_knife.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/mes/ProsesThreeKnife/index.js') }}"></script>
@endpush
