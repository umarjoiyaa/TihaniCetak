@extends('layouts.app')

@section('css')
<style>
    table td{
        font-size:12px;
    }
    .dropdownwidth{
        width:100px;
    }
</style>
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title tx-20 mg-b-0 p-2">BORANG SERAH KERJA (TEKS)</h4>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{route('borange_serah_kerja_teks.create')}}" class="btn btn-primary mb-2">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mt-2 datatable" id="example1">
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
                        <thead>
                            <tr>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Tarikh">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Po No">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Sales Order no">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Tajuk">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Nama Subkontraktor">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Jumlah Seksyen">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Jenis">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Dateline">
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
        var data = "{{ route('borange_serah_kerja_teks.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/production/BorangeSerahKerjaTeks/index.js') }}"></script>
@endpush

