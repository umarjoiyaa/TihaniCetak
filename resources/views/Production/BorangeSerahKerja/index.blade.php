@extends('layouts.app')

@section('css')
<style>
    .dropdownwidth{
        width:100px;
    }
    table td{
        font-size:15px;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title tx-20 mg-b-0 p-2">BORANG SERAH KERJA (KULIT BUKU / COVER)</h4>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{route('borange_serah_kerja.create')}}" class="btn btn-primary mb-2">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table datatable table-bordered mt-2" id="example1">
                        <thead>
                            <tr>
                                <th class="text-left">Date</th>
                                <th class="text-left">Po No</th>
                                <th class="text-left">Nama Subkontraktor</th>
                                <th class="text-left">Sales Order NO</th>
                                <th class="text-left">Tajuk</th>
                                <th class="text-left">Kuantiti</th>
                                <th class="text-left">Saiz Kertas</th>
                                <th class="text-left">Status</th>
                                <th class="text-left">Action</th>
                            </tr>

                        </thead>
                        <thead>
                            <tr>
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
                                <th>
                                    <input type="text" class="all_column" placeholder="search status">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- --}}
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
        var data = "{{ route('borange_serah_kerja.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/production/BorangeSerahKerja/index.js') }}"></script>
@endpush
