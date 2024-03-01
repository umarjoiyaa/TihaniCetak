@extends('layouts.app')

@section('css')
    <style>
        table td {
            font-size: 15px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title tx-20 mg-b-0 p-2">PRINTING PROCESS - TEXT</h4>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Tarikh</th>
                                    <th>Sales Order NO</th>
                                    <th>Pelanggan</th>
                                    <th>Kod Buku</th>
                                    <th>Tajuk</th>
                                    <th>Kuantiti</th>
                                    <th>Mesin</th>
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
                                        <input type="text" class="all_column" placeholder="search sales order no">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search Pelanggan">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search Kod Buku">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search Tajuk">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search Kuantiti">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search Mesin">
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
        var data = "{{ route('printing_process.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/production/PrintingProcess/index.js') }}"></script>
@endpush
