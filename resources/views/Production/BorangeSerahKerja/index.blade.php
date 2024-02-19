@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title tx-20 mg-b-0 p-2">BORANG SERAH KERJA (KULIT BUKU / COVER)</h4>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{route('BorangeSerahKerja.create')}}" class="btn btn-primary mb-2">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mt-2" id="example1">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Po No</th>
                                <th>Nama Subkontraktor</th>
                                <th>Sales Order NO</th>
                                <th>Tajuk</th>
                                <th>Tajuk</th>
                                <th>Kuantiti</th>
                                <th>Saiz Kertas</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr class="">
                                <td>30/5/2023</td>
                                <td>P123-1</td>
                                <td>KBUV</td>
                                <td>SO-001496</td>
                                <td>IQRO Genius - Rumi</td>
                                <td>1120</td>
                                <td>25.5 X 17.5</td>
                                <td>15cm X 25cm</td>
                                <td><span class="badge badge-pill badge-warning w-100 p-2 mt-2  ">Request</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true"
                                            class="btn ripple btn-primary" data-toggle="dropdown"
                                            id="dropdownMenuButton" type="button">Action<i
                                                class="fas fa-caret-down ml-1"></i></button>
                                        <div class="dropdown-menu tx-13">
                                            <a class="dropdown-item"
                                                href="{{route('BorangeSerahKerja.view')}}">View</a>
                                            <a class="dropdown-item"
                                                href="{{route('BorangeSerahKerja.edit')}}">Edit</a>
                                            <a class="dropdown-item" href="">Delete</a>
                                            <a class="dropdown-item" href="{{ route('BorangeSerahKerja.purchasing')}}">purchasing</a>
                                            <a class="dropdown-item" href="{{ route('BorangeSerahKerja.transfer')}}">transfer</a>
                                            <a class="dropdown-item" href="{{ route('BorangeSerahKerja.receive')}}">receive</a>
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