@extends('layouts.app')

@section('css')
<style>
    .dropdownwidth{
        width:100px;
    }
    table thead th {
            text-align: center;
        }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h6 class="card-title tx-20 mg-b-0 p-2">LAPORAN PEMERIKSAAN KUALITI - PROSES PEMBUNGKUSAN
                    </h6>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{route('proses_pembungkusan.create')}}" class="btn btn-primary mb-2">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table datatable mt-2" id="example1">
                        <thead>
                            <tr>
                                <th class="text-left">Sr #</th>
                                <th class="text-left">Date</th>
                                <th class="text-left">Time</th>
                                <th class="text-left">Mesin</th>
                                <th class="text-left">Sales Order No. </th>
                                <th class="text-left">Kod Buku</th>
                                <th class="text-left">Tajuk</th>
                                <th class="text-left">Kuantiti yang betul</th>
                                <th class="text-left">Koyak</th>
                                <th class="text-left">Kotor</th>
                                <th class="text-left">Pematuhan SOP</th>
                                <th class="text-left">Status</th>
                                <th class="text-left">Action</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th><input type="text" class="all_column" placeholder="search Date"></th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search time">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search mesin">
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
                                    <input type="text" class="all_column" placeholder="search kuantiti yang betul">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search koyak">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Kotor">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Pematuhan SOP">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search Status">
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
                                <td><span class="badge badge-warning">Checked</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true"
                                            class="btn ripple btn-primary" data-toggle="dropdown"
                                            id="dropdownMenuButton" type="button">Action<i
                                                class="fas fa-caret-down ml-1"></i></button>
                                        <div class="dropdown-menu tx-13">
                                            <a class="dropdown-item"
                                                href="{{route('ProsesPembungkusan.view')}}">View</a>
                                            <a class="dropdown-item"
                                                href="{{route('ProsesPembungkusan.edit')}}">Edit</a>
                                            <a class="dropdown-item"
                                                href="{{route('ProsesPembungkusan.verify')}}">Verify</a>
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
    </div>
</div>





@endsection
@push('custom-scripts')
    <script>
        var data = "{{ route('proses_pembungkusan.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/mes/ProsesPembungkusan/index.js') }}"></script>
@endpush
