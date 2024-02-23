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
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title tx-20 mg-b-0 p-2">PRODUCTION JOBSHEET LIST- DIGITAL PRINTING </h4>
                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('digital_printing.create') }}" class="btn btn-primary mb-2">Create</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table datatable table-bordered table-striped mt-2">
                            <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Date</th>
                                    <th>Sales Order NO</th>
                                    <th>Customer Name</th>
                                    <th>Kod Buku</th>
                                    <th>Kategori job</th>
                                    <th>Jenis Produk</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search date">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search sales order no">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search customer name">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search kod_buku">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search kategori job">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search jenis produk">
                                    </th>
                                    <th>
                                        <input type="text" class="all_column" placeholder="search quantity">
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
        var data = "{{ route('digital_printing.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/production/DigitalPrinting/index.js') }}"></script>
@endpush
