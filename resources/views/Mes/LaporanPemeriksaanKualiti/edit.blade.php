@extends('layouts.app')
@section('content')
    <form action="{{ route('laporan_pemeriksaan_kualiti.update', $laporan_pemeriksaan_kualiti->id) }}" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>LAPORAN PEMERIKSAAN KUALITI - PROSES LIPAT</b></h5>
                                </div>
                            </div>
                            <div class="card" style="background:#f1f0f0;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="">Date</label>
                                                <input type="text"  name="date" value="{{ \Carbon\Carbon::parse($laporan_pemeriksaan_kualiti->date)->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="">Time</label>
                                            <input type="time" name="time"
                                                value="{{ $laporan_pemeriksaan_kualiti->time }}" id="Currenttime"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Checked By</div>
                                                <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                                    name="" id="checked_by" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="label">Sales Order No.</div>
                                                <select name="sale_order" data-id="{{ $laporan_pemeriksaan_kualiti->sale_order_id }}"
                                                    id="sale_order" class="form-control">
                                                    <option value="{{ $laporan_pemeriksaan_kualiti->sale_order_id }}" selected
                                                        style="color: black; !important">
                                                        {{ $laporan_pemeriksaan_kualiti->sale_order->order_no }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Tajuk</div>
                                                <input type="text" readonly value="" id="tajuk"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Kod Buku</div>
                                                <input type="text" value="" readonly name="" id="kod_buku"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="label">Mesin</div>
                                                <select name="mesin" id="" class="form-control form-select">
                                                    <option value="F1" @selected($laporan_pemeriksaan_kualiti->mesin == 'F1')>F1</option>
                                                    <option value="F2" @selected($laporan_pemeriksaan_kualiti->mesin == 'F4')>F2</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="label">Jenis</div>
                                                <select name="jenis" id="" class="form-control form-select">
                                                    <option value="Perfect Bind" @selected($laporan_pemeriksaan_kualiti->jenis == 'Perfect Bind')>Text</option>
                                                    <option value="Lock Bind" @selected($laporan_pemeriksaan_kualiti->jenis == 'Lock Bind')>Lock Bind
                                                    </option>
                                                    <option value="Staple Bind" @selected($laporan_pemeriksaan_kualiti->jenis == 'Staple Bind')>Staple Bind
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="label">Seksyen No.</div>
                                                <input type="text" value="{{ $laporan_pemeriksaan_kualiti->seksyen_no }}"
                                                    name="seksyen_no" class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">


                                        <div class="col-md-5 mt-3">
                                            <table class="table" border="1">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">Kriteria</th>
                                                        <th colspan="2">Tanda bagi yang berkenaan</th>

                                                    </tr>
                                                    <tr>
                                                        <th>OK</th>
                                                        <th>NG</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>Kedudukan Lipatan</td>
                                                        <td><input type="checkbox" class="Cover1"
                                                                onchange="handleCheckboxChange('Cover1',this)"
                                                                name="b_1" value="ok" @checked($laporan_pemeriksaan_kualiti->b_1 == 'ok')
                                                                id=""></td>
                                                        <td><input type="checkbox" class="Cover1"
                                                                onchange="handleCheckboxChange('Cover1',this)"
                                                                name="b_1" value="ng" @checked($laporan_pemeriksaan_kualiti->b_1 == 'ng')
                                                                id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Turutan muka surat</td>
                                                        <td><input type="checkbox" class="Text1"
                                                                onchange="handleCheckboxChange('Text1',this)"
                                                                name="b_2" value="ok" @checked($laporan_pemeriksaan_kualiti->b_2 == 'ok')
                                                                id=""></td>
                                                        <td><input type="checkbox" class="Text1"
                                                                onchange="handleCheckboxChange('Text1',this)"
                                                                name="b_2" value="ng" @checked($laporan_pemeriksaan_kualiti->b_2 == 'ng')
                                                                id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Koyak</td>
                                                        <td><input type="checkbox" class="Cover2"
                                                                onchange="handleCheckboxChange('Cover2',this)"
                                                                name="b_3" value="ok" @checked($laporan_pemeriksaan_kualiti->b_3 == 'ok')
                                                                id=""></td>
                                                        <td><input type="checkbox" class="Cover2"
                                                                onchange="handleCheckboxChange('Cover2',this)"
                                                                name="b_3" value="ng"
                                                                @checked($laporan_pemeriksaan_kualiti->b_3 == 'ng') id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kotor</td>
                                                        <td><input type="checkbox" class="Text2"
                                                                onchange="handleCheckboxChange('Text2',this)"
                                                                name="b_4" value="ok"
                                                                @checked($laporan_pemeriksaan_kualiti->b_4 == 'ok') id=""></td>
                                                        <td><input type="checkbox" class="Text2"
                                                                onchange="handleCheckboxChange('Text2',this)"
                                                                name="b_4" value="ng"
                                                                @checked($laporan_pemeriksaan_kualiti->b_4 == 'ng') id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kedut</td>
                                                        <td><input type="checkbox" class="Cover3"
                                                                onchange="handleCheckboxChange('Cover3',this)"
                                                                name="b_5" value="ok"
                                                                @checked($laporan_pemeriksaan_kualiti->b_5 == 'ok') id=""></td>
                                                        <td><input type="checkbox" class="Cover3"
                                                                onchange="handleCheckboxChange('Cover3',this)"
                                                                name="b_5" value="ng"
                                                                @checked($laporan_pemeriksaan_kualiti->b_5 == 'ng') id=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pematuhan SOP</td>
                                                        <td><input type="checkbox" class="Text3"
                                                                onchange="handleCheckboxChange('Text3',this)"
                                                                name="b_6" value="ok"
                                                                @checked($laporan_pemeriksaan_kualiti->b_6 == 'ok') id=""></td>
                                                        <td><input type="checkbox" class="Text3"
                                                                onchange="handleCheckboxChange('Text3',this)"
                                                                name="b_6" value="ng"
                                                                @checked($laporan_pemeriksaan_kualiti->b_6 == 'ng') id="">
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary float-right">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('laporan_pemeriksaan_kualiti') }}">back to list</a>
            </div>
        </div>
        </div>
    </form>
@endsection
@push('custom-scripts')
    <script>
        function handleCheckboxChange(className, checkbox) {
            if ($(checkbox).prop('checked')) {
                $(`.${ className }`).not(checkbox).prop('checked', false);
            }
        }

        $(document).ready(function() {
            $('#sale_order').trigger('change');
            $('#sale_order').select2({
                ajax: {
                    url: '{{ route('sale_order.get') }}',
                    dataType: 'json',
                    delay: 1000,
                    data: function(params) {
                        return {
                            q: params.term,
                            page: params.page || 1,
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;

                        return {
                            results: data.results,
                            pagination: {
                                more: data.pagination.more
                            }
                        };
                    },
                    cache: true
                },
                containerCssClass: 'form-control',
                templateResult: function(data) {
                    if (data.loading) {
                        return "Loading...";
                    }

                    return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                },
                templateSelection: function(data) {
                    return data.name || null;
                }
            });
        });

        $('#sale_order').on('change', function() {
            const id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{ route('sale_order_penjilidan.detail.get') }}',
                data: {
                    "id": id
                },
                success: function(data) {
                    $('#kod_buku').val(data.sale_order.kod_buku);
                    $('#tajuk').val(data.sale_order.description);
                }
            });
        });
    </script>
@endpush
