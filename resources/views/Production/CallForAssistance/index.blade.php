@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title tx-20 mg-b-0 p-2">CALL FOR ASSISTANCE </h4>
                </div>

            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-2" id="example1">
                        <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Machine</th>
                                <th>Calling Datetime</th>
                                <th>Attended Datetime</th>
                                <th>Attended PIC</th>
                                <th>Remarks</th>
                                <th>Submitted Datetime</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr class="">
                                <td>1</td>
                                <td>TK1</td>
                                <td>12/12/2023 10:30 Am</td>
                                <td>12/12/2023 10:50 Am</td>
                                <td>Subcon A</td>
                                <td>XX</td>
                                <td>12/12/2023 4:30 PM</td>
                                <td><span class="badge badge-pill badge-success w-100 p-2 mt-2  ">Completed</span>
                                </td>

                                <td><i class="fa fa-image" style="font-size:20px;"></i>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true"
                                            class="btn ripple btn-primary" data-toggle="dropdown"
                                            id="dropdownMenuButton" type="button">Action<i
                                                class="fas fa-caret-down ml-1"></i></button>
                                        <div class="dropdown-menu tx-13">
                                            <a class="dropdown-item" href="{{route('CallForAssistance.view')}}">View</a>
                                            <a class="dropdown-item" href="{{route('CallForAssistance.edit')}}">Edit</a>

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