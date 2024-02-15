@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title tx-20 mg-b-0 p-2">SENARAI SEMAK PENCETAKAN DIGITAL</h4>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('senari_semak.create') }}" class="btn btn-primary mb-2">Create</a>
                        </div>

                        <table class="table datatable mt-2">
                            <thead>
                                <tr>
                                    <td>Sr.</td>
                                    <td>Sales Order No</td>
                                    <td>Tajuk</td>
                                    <td>kod Buku</td>
                                    <td>Date</td>
                                    <td>Checked By</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
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
        var data = "{{ route('senari_semak.data') }}";
    </script>
    <script src="{{ asset('assets/js/custom/mes/SenariSemak/index.js') }}"></script>
@endpush
