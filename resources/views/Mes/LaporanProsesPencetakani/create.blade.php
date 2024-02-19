@extends('layouts.app')
@section('content')
    <form action="{{ route('laporan_proses_pencetakani.store') }}" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="float-left"><b>LAPORAN PROSES PENCETAKAN</b></h5>
                                    <p class="float-right">TCBS-B61 (Rev.0)</p>
                                </div>
                            </div>

                            <div class="card" style="background:#f1f0f0;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="">Date</label>
                                                <input type="date" name="date" value="{{ date('Y-m-d') }}"
                                                    id="Currentdate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="">Time</label>
                                            <input type="time" name="time" value="{{ date('H:i') }}"
                                                id="Currenttime" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Checked By (Operator)</div>
                                                <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                                    name="" id="checked_by" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="label">Sales Order No.</div>
                                                <select name="sale_order" id="sale_order" class="form-control form-select">

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
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Seksyen No.</div>
                                                <input type="text" name="seksyen_no" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Kuantiti cetakan</div>
                                                <input type="number" name="kuaniti_cetakan" id=""
                                                    class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="">Kuantiti waste</label>
                                                <input type="number" name="kuaniti_waste" id=""
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="">Operator</label>
                                                <select name="user[]" class="form-control form-select" id=""
                                                    multiple>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}"
                                                            @if (old('user')) {{ in_array($user->id, old('user')) ? 'selected' : '' }} @endif>
                                                            {{ $user->full_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <h5><b>B) Pemeriksaan dan Pengesahan 1st Piece</b> </h5>
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="col-md-7 mt-3">

                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">No</th>
                                                        <th rowspan="2">kriteria</th>
                                                        <th colspan="3">cover</th>

                                                    </tr>
                                                    <tr>
                                                        <th>OK</th>
                                                        <th>NG</th>
                                                        <th>NA</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>1</td>
                                                        <td>Saiz produk (Ukur dan rujuk saiz pada Job Sheet)</td>
                                                        <td><input type="checkbox" name="b_1" id=""
                                                                value="ok"></td>
                                                        <td><input type="checkbox" checked name="b_1" id=""
                                                                value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_1" id=""
                                                                value="na"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Artwork (Semak gambar dan teks)</td>
                                                        <td><input type="checkbox" name="b_2" id=""
                                                                value="ok"></td>
                                                        <td><input type="checkbox" checked name="b_2" id=""
                                                                value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_2" id=""
                                                                value="na"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Kotor, calar (Periksa setiap muka surat)</td>
                                                        <td><input type="checkbox" name="b_3" id=""
                                                                value="ok"></td>
                                                        <td><input type="checkbox" checked name="b_3" id=""
                                                                value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_3" id=""
                                                                value="na"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Jenis penjilidan (stitching, perfect bind, hardcover)</td>
                                                        <td><input type="checkbox" name="b_4" id=""
                                                                value="ok"></td>
                                                        <td><input type="checkbox" checked name="b_4" id=""
                                                                value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_4" id=""
                                                                value="na"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Jumlah mukasurat (Rujuk Job Sheet dan file artwork)</td>
                                                        <td><input type="checkbox" name="b_5" id=""
                                                                value="ok"></td>
                                                        <td><input type="checkbox" checked name="b_5" id=""
                                                                value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_5" id=""
                                                                value="na"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Turutan mukasurat (Berturutan)</td>
                                                        <td><input type="checkbox" name="b_6" id=""
                                                                value="ok"></td>
                                                        <td><input type="checkbox" checked name="b_6" id=""
                                                                value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_6" id=""
                                                                value="na"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>Kelekatan matt/gloss lamination</td>
                                                        <td><input type="checkbox" name="b_7" id=""
                                                                value="ok"></td>
                                                        <td><input type="checkbox" checked name="b_7" id=""
                                                                value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_7" id=""
                                                                value="na"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>8</td>
                                                        <td>Koyak (Terkoyak / Rosak)</td>
                                                        <td><input type="checkbox" name="b_8" id=""
                                                                value="ok"></td>
                                                        <td><input type="checkbox" checked name="b_8" id=""
                                                                value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_8" id=""
                                                                value="na"></td>

                                                    </tr>
                                                    <tr>
                                                        <td>9</td>
                                                        <td>Imej/artwork terpotong</td>
                                                        <td><input type="checkbox" name="b_9" id=""
                                                                value="ok"></td>
                                                        <td><input type="checkbox" checked name="b_9" id=""
                                                                value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_9" id=""
                                                                value="na"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>10</td>
                                                        <td>Cop (Cop pada setiap mockup)</td>
                                                        <td><input type="checkbox" name="b_10" id=""
                                                                value="ok"></td>
                                                        <td><input type="checkbox" checked name="b_10" id=""
                                                                value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_10" id=""
                                                                value="na"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row mt-5">
                                        <div class="col-md-12">
                                            <h5>C) Pemeriksaan semasa proses Pencetakan</h5>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <button class="btn btn-primary mb-3 float-right" type="button" id="AddRow">Add
                                                Row</button>
                                            <div class="table-responsive">

                                                <table class="table table-bordered" id="table">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2">Jumlah</th>
                                                            <th colspan="7">Kriteria</th>
                                                            <th rowspan="2">Check</th>
                                                            <th rowspan="2">Check (Operator)</th>
                                                            <th rowspan="2">Verify (QC)</th>
                                                            <th rowspan="2">Verify</th>
                                                            <th rowspan="2">Action</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Gambar/teks</th>
                                                            <th>warna</th>
                                                            <th>Register depan belakang</th>
                                                            <th>Tiada set off, kotor, hickies</th>
                                                            <th>Tiada doubling</th>
                                                            <th>Periksa powder</th>
                                                            <th>Frontlay & sidelay</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>500</td>
                                                            <td><input type="hidden" value="500"
                                                                    name="semasa[0][1]"><input type="checkbox"
                                                                    name="semasa[0][2]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[0][3]"
                                                                    id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[0][4]"
                                                                    id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[0][5]"
                                                                    id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[0][6]"
                                                                    id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[0][7]"
                                                                    id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[0][8]"
                                                                    id="">
                                                            </td>
                                                            <td><button type="button" class="btn btn-primary check_btn"
                                                                    style="border-radius:5px; ">check</button></td>
                                                            <td><input type="text" name="semasa[0][9]"
                                                                    class="check_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-primary verify_btn"
                                                                    disabled>Verify</button>
                                                            </td>
                                                            <td><input type="text" name="semasa[0][10]"
                                                                    class="verify_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-danger remove"
                                                                    style="border-radius:5px; ">X</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
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
                <a href="{{ route('laporan_proses_pencetakani') }}">back to list</a>
            </div>
        </div>
        </div>
    </form>
@endsection

@push('custom-scripts')
    <script>
        var increment = 1000;
        $(document).on('click', '#AddRow', function() {
            if ($('#table tbody tr').length == 0) {
                increment = 500;
            }
            let length = $('#table tbody tr').length + 1;
            $('#table tbody').append(`<tr>
                                                            <td>${increment}</td>
                                                            <td><input type="hidden" value="${increment}" name="semasa[${length}][1]"><input type="checkbox" name="semasa[${length}][2]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][3]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][4]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][5]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][6]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][7]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][8]" id="">
                                                            </td>
                                                            <td><button class="btn btn-primary check_btn"
                                                                    style="border-radius:5px; " type="button">check</button></td>
                                                            <td><input type="text" name="semasa[${length}][9]" class="check_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-primary verify_btn" disabled>Verify</button>
                                                            </td>
                                                            <td><input type="text" name="semasa[${length}][10]" class="verify_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-danger remove"
                                                                    style="border-radius:5px; ">X</button>
                                                            </td>`);
            increment += 500;
        });

        $(document).on('click', '.remove', function() {
            increment -= 500;
            $(this).closest('tr').remove();
        });

        $(document).ready(function() {
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

            function formatDate(date) {
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0'); // Month is zero-based
                const year = date.getFullYear();
                const hours = String(date.getHours()).padStart(2, '0');
                const minutes = String(date.getMinutes()).padStart(2, '0');

                return `${day}-${month}-${year} ${hours}:${minutes}`;
            }

            $(document).on('click', '.check_btn', function() {
                $(this).attr('disabled', 'disabled');
                const currentDate = new Date();
                const formattedDate = formatDate(currentDate);
                let checked_by = $('#checked_by').val();
                $(this).closest('tr').find('.check_operator').val(checked_by + '/' + formattedDate);
            });

            $('#sale_order').on('change', function() {
                const id = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '{{ route('sale_order.detail.get') }}',
                    data: {
                        "id": id
                    },
                    success: function(data) {
                        $('#kod_buku').val(data.kod_buku);
                        $('#tajuk').val(data.description);
                    }
                });
            });
        });
    </script>
@endpush