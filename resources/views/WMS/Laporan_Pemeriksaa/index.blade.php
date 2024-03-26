@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title tx-20 mg-b-0 p-2">Laporan Pemeriksaan AKHIR,PEMBUNGKUSAN DAN PENGHANTARAN KE
                        STORE List</h4>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{route('Laporan_Pemeriksaan.create')}}" class="btn btn-primary mb-2">Create </a>
                </div>

                <table class="table mt-2 datatable" id="example1">
                    <thead>
                        <tr>
                            <td>Sr No.</td>
                            <td>Tarikh</td>
                            <td>Sales Order No.</td>
                            <td>Kod Buku</td>
                            <td>Tajuk</td>
                            <td>Operator</td>
                            <td>Kuantiti</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                                <input type="text" class="all_column" placeholder="search Tarikh">
                            </th>
                            <th>
                                <input type="text" class="all_column" placeholder="search Sales Order No">
                            </th>
                            <th>
                                <input type="text" class="all_column" placeholder="search Kod Buku">
                            </th>
                            <th>
                                <input type="text" class="all_column" placeholder="search Tajuk">
                            </th>
                            <th>
                                <input type="text" class="all_column" placeholder="search Operator">
                            </th>
                            <th>
                                <input type="text" class="all_column" placeholder="search Kuantiti">
                            </th>
                            <th>
                                <input type="text" class="all_column" placeholder="search Status">
                            </th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <tr>
                            <td>30/5/2023</td>
                            <td>SO-001496</td>
                            <td>CP 2940</td>
                            <td>IQRO'S GENIUS - RUMI(NEW COVER)</td>
                            <td>ABCD</td>
                            <td>1440</td>
                            <td><span
                                    style="background:yellow; padding:6px; border:1px solid yellow; border-radius:5px;">Not-initiated</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                        data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i
                                            class="fas fa-caret-down ml-1"></i></button>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="Laporan_Pemeriksaan.view">View</a>
                                        <a class="dropdown-item" href="">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                        <a class="dropdown-item"
                                            href="{{route('stock_Transfer_location.receive')}}">Receive</a>
                                    </div>
                                </div>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@push('custom-scripts')
    <script>
        var data = "{{ route('Laporan_Pemeriksaan.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/wms/LaporanPemeirksaan/index.js') }}"></script>
@endpush
