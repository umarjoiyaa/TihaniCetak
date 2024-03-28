@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title tx-20 mg-b-0 p-2">Pemeriksaan Penghantaran</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('pemeriksaan_penghantaran.create') }}" class="btn btn-primary mb-2">Create</a>
                    </div>
                    <table class="table datatable mt-2">
                        <thead>
                            <tr>
                                <th>SR #</th>
                                <td>Tarikh</td>
                                <td>Sales Order No</td>
                                <td>Kod Buku</td>
                                <td>Tajuk</td>
                                <td>Pelanggan</td>
                                <td>Kuantiti</td>
                                <td>Label</td>
                                <td>Berat</td>
                                <td>Kualiti</td>
                                <td>Status</td>
                                <td>Action</td>
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
                                    <input type="text" class="all_column" placeholder="search kod buku">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search tajuk">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search pelanggan">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search kuantity">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search lable">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search berat">
                                </th>
                                <th>
                                    <input type="text" class="all_column" placeholder="search kualiti">
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
    </div>
@endsection
@push('custom-scripts')
    <script>
        var data = "{{ route('pemeriksaan_penghantaran.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/wms/PemeriksaanPenghantaran/index.js') }}"></script>
@endpush
