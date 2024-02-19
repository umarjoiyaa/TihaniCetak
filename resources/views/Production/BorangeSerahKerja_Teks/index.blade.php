@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title tx-20 mg-b-0 p-2">BORANG SERAH KERJA (TEKS)</h4>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{route('BorangeSerahKerja_Teks.create')}}" class="btn btn-primary mb-2">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mt-2" id="example1">
                        <thead>
                            <tr>
                                <th>Tarikh</th>
                                <th>Po No</th>
                                <th>Sales Order no</th>
                                <th>Tajuk</th>
                                <th>Nama Subkontraktor</th>
                                <th>Jumlah Seksyen</th>
                                <th>Jenis</th>
                                <th>Dateline</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr class="">
                                <td>30/5/2023</td>
                                <td>123-1</td>
                                <td>SO-001496</td>
                                <td>IQRO'GENIUS RUMI(New Cover)</td>
                                <td>Subcon A</td>
                                <td>3</td>
                                <td>End Paper</td>
                                <td>12/12/2024</td>
                                <td><span class="badge badge-pill badge-success w-100 p-2 mt-2  ">requested</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true"
                                            class="btn ripple btn-primary" data-toggle="dropdown"
                                            id="dropdownMenuButton" type="button">Action<i
                                                class="fas fa-caret-down ml-1"></i></button>
                                        <div class="dropdown-menu tx-13">
                                            <a class="dropdown-item"
                                                href="{{route('BorangeSerahKerja_Teks.view')}}">View</a>
                                            <a class="dropdown-item"
                                                href="{{route('BorangeSerahKerja_Teks.edit')}}">Edit</a>
                                            <a class="dropdown-item"
                                                href="{{route('BorangeSerahKerja_Teks.verify')}}">verify</a>
                                            <a class="dropdown-item" href="">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
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
     $(document).ready(function () {
        $('#example1').DataTable();
    });
</script>
@endpush