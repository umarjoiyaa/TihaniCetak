@extends('layouts.app')
@section('content')
    <form action="{{ route('laporan_proses_three.store') }}" method="POST">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>LAPORAN PROSES THREE KNIFE</h5>

                            <div class="card" style="background:#f1f0f0;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5><b>A) Informasi</b></h5>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="">Date</label>
                                                <input type="text" name="date" value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">

                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="">Time</label>
                                            <input name="time" type="time" id="Currenttime"
                                            value="{{ Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('H:i') }}"
                                            class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Checked By (Operator)</div>
                                                <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                                    name="" id="checked_by" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Sales Order No.</div>
                                                <select name="sale_order" id="sale_order" class="form-control">
                                                    <option value="" selected disabled>Select any Sale Order</option>

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
                                                <div class="label">Size Buku</div>
                                                <input type="text" readonly value="" id="size"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Kuantiti SO</div>
                                                <input type="text" readonly value="" id="sale_order_qty"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Good Count (Optional)</div>
                                                <input type="text" name="good_count" value="" id=""
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

                            <div class="row mt-5" style="background:#f1f0f0;">
                                <div class="col-md-12 mt-5">
                                    <h5><b>B) Pemeriksaan dan Pengesahan 1st Piece</b> </h5>
                                </div>
                                <div class="col-md-8 mt-5">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">Kriteria</th>
                                                <th colspan="4">Status</th>

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
                                                <td>Saiz yg betul</td>
                                                <td><input type="checkbox" class="Cover1"
                                                        onchange="handleCheckboxChange('Cover1',this)" name="b_1"
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover1"
                                                        onchange="handleCheckboxChange('Cover1',this)" checked
                                                        name="b_1" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover1"
                                                        onchange="handleCheckboxChange('Cover1',this)" name="b_1"
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Kedudukan potongan yang betul</td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" name="b_2"
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" checked
                                                        name="b_2" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" name="b_2"
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Teks tidak terpotong</td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" name="b_3"
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" checked
                                                        name="b_3" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" name="b_3"
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Turutan Seksyen/muka surat</td>
                                                <td><input type="checkbox" class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)" name="b_4"
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)" checked
                                                        name="b_4" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)" name="b_4"
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Kepetakan/ squareness</td>
                                                <td><input type="checkbox" class="Cover3"
                                                        onchange="handleCheckboxChange('Cover3',this)" name="b_5"
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover3"
                                                        onchange="handleCheckboxChange('Cover3',this)" checked
                                                        name="b_5" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover3"
                                                        onchange="handleCheckboxChange('Cover3',this)" name="b_5"
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Potongan yang bersih</td>
                                                <td><input type="checkbox" class="Text3"
                                                        onchange="handleCheckboxChange('Text3',this)" name="b_6"
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text3"
                                                        onchange="handleCheckboxChange('Text3',this)" checked
                                                        name="b_6" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text3"
                                                        onchange="handleCheckboxChange('Text3',this)" name="b_6"
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Tututan muka surat</td>
                                                <td><input type="checkbox" class="Cover4"
                                                        onchange="handleCheckboxChange('Cover4',this)" name="b_7"
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover4"
                                                        onchange="handleCheckboxChange('Cover4',this)" checked
                                                        name="b_7" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover4"
                                                        onchange="handleCheckboxChange('Cover4',this)" name="b_7"
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Kotor</td>
                                                <td><input type="checkbox" class="Text8"
                                                        onchange="handleCheckboxChange('Text8',this)" name="b_8"
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text8"
                                                        onchange="handleCheckboxChange('Text8',this)" checked
                                                        name="b_8" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text8"
                                                        onchange="handleCheckboxChange('Text8',this)" name="b_8"
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Koyak</td>
                                                <td><input type="checkbox" class="Cover9"
                                                        onchange="handleCheckboxChange('Cover9',this)" name="b_9"
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover9"
                                                        onchange="handleCheckboxChange('Cover9',this)" checked
                                                        name="b_9" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover9"
                                                        onchange="handleCheckboxChange('Cover9',this)" name="b_9"
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>melekat</td>
                                                <td><input type="checkbox" class="Text10"
                                                        onchange="handleCheckboxChange('Text10',this)" name="b_10"
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Text10"
                                                        onchange="handleCheckboxChange('Text10',this)" checked
                                                        name="b_10" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Text10"
                                                        onchange="handleCheckboxChange('Text10',this)" name="b_10"
                                                        value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>calar/ kemik</td>
                                                <td><input type="checkbox" class="Cover11"
                                                        onchange="handleCheckboxChange('Cover11',this)" name="b_11"
                                                        value="ok" id=""></td>
                                                <td><input type="checkbox" class="Cover11"
                                                        onchange="handleCheckboxChange('Cover11',this)" checked
                                                        name="b_11" value="ng" id=""></td>
                                                <td><input type="checkbox" class="Cover11"
                                                        onchange="handleCheckboxChange('Cover11',this)" name="b_11"
                                                        value="na" id=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row mt-5" style="background:#f1f0f0;">
                                <div class="col-md-12 mt-5">
                                    <h5><b>C) Pemeriksaan semasa proses penjilidan </b></h5>
                                </div>


                                <div class="col-md-12">
                                    <button class="btn btn-primary mb-3 float-right" type="button" id="AddRow">Add
                                        Row</button>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="table">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">Jumlah </th>
                                                    <th colspan="10">Kriteria</th>
                                                    <th rowspan="2">Check (Operator)</th>
                                                    <th rowspan="2">Username / datetime</th>
                                                    <th rowspan="2">Verify</th>
                                                    <th rowspan="2">Username / datetime</th>
                                                    <th rowspan="2">Action</th>
                                                </tr>
                                                <tr>
                                                    <th>Kedudukan potongan yang betul</th>
                                                    <th>Teks tidak terpotong</th>
                                                    <th>Kepetakan/ squareness</th>
                                                    <th>Potongan yang bersih</th>
                                                    <th>Turutan muka surat</th>
                                                    <th>Kotor</th>
                                                    <th>Koyak</th>
                                                    <th>melekat</th>
                                                    <th>calar</th>
                                                    <th>kemik</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>500</td>
                                                    <td><input type="hidden" value="500" name="semasa[1][1]"><input
                                                            type="checkbox" name="semasa[1][2]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][3]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][4]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][5]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][6]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][7]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][8]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][9]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][10]" id="">
                                                    </td>
                                                    <td><input type="checkbox" name="semasa[1][11]" id="">
                                                    </td>
                                                    <td><button type="button" class="btn btn-primary check_btn"
                                                            style="border-radius:5px; ">check</button></td>
                                                    <td><input type="text" name="semasa[1][12]"
                                                            class="check_operator form-control" readonly></td>
                                                    <td><button type="button" class="btn btn-primary verify_btn"
                                                            disabled>Verify</button>
                                                    </td>
                                                    <td><input type="text" name="semasa[1][13]"
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
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary float-right mt-3">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('laporan_proses_three') }}">back to list</a>
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
                                                            <td><input type="checkbox" name="semasa[${length}][9]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][10]" id="">
                                                            </td>
                                                            <td><input type="checkbox" name="semasa[${length}][11]" id="">
                                                            </td>
                                                            <td><button class="btn btn-primary check_btn"
                                                                    style="border-radius:5px; " type="button">check</button></td>
                                                            <td><input type="text" name="semasa[${length}][12]" class="check_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-primary verify_btn" disabled>Verify</button>
                                                            </td>
                                                            <td><input type="text" name="semasa[${length}][13]" class="verify_operator form-control" readonly></td>
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
                    return data.order_no || null;
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
                    url: '{{ route('sale_order_penjilidan.detail.get') }}',
                    data: {
                        "id": id
                    },
                    success: function(data) {
                        $('#kod_buku').val(data.sale_order.kod_buku);
                        $('#tajuk').val(data.sale_order.description);
                        $('#sale_order_qty').val(data.sale_order.sale_order_qty);
                        $('#size').val(data.sale_order.size);
                        if (data.section != null) {
                            $('#jumlah').val(data.section.item_cover_text);
                        } else {
                            $('#jumlah').val(0);
                        }
                    }
                });
            });
        });
    </script>
@endpush
