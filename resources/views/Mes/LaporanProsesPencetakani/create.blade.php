@extends('layouts.app')
@section('content')
    <form action="{{ route('laporan_proses_pencetakani.store') }}" method="POST">
        @csrf
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

                            <div class="card" style="background:#f4f4ff;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6><b>A) Informasi</b></h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="">Date</label>
                                                <input type="text" name="date" value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">

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
                                                <label for="">Checked By (Operator)</label>
                                                <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                                    name="" id="checked_by" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Sales Order No.</label>
                                                <select name="sale_order" id="sale_order" class="form-control form-select">
                                                    @if (old('sale_order') != null)
                                                    @php
                                                        $name = App\Models\SaleOrder::find(old('sale_order'));
                                                    @endphp
                                                    <option value="{{ old('sale_order') }}" selected
                                                        style="color: black; !important">
                                                        {{ $name->order_no }}</option>
                                                @else
                                                    <option value="" selected disabled>Select any Sale Order
                                                    </option>
                                                @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 ">
                                            <div class="form-group">
                                                <label for="">Tajuk</label>
                                                <input type="text" readonly value="" id="tajuk"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 ">
                                            <div class="form-group">
                                                <label for="">Kod Buku</label>
                                                <input type="text" value="" readonly name="" id="kod_buku"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 ">
                                            <div class="form-group">
                                                <label for="">Seksyen No.</label>
                                                <input type="text" name="seksyen_no" value="{{ old('seksyen_no')  }}" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Kuantiti cetakan</label>
                                                <input type="number" name="kuaniti_cetakan" value="{{ old('kuaniti_cetakan')  }}" id=""
                                                    class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-md-4 ">
                                            <div class="form-group">
                                                <label for="">Kuantiti waste</label>
                                                <input type="number" name="kuaniti_waste" value="{{ old('kuaniti_waste')  }}" id=""
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
                                                        <th colspan="3">status</th>

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
                                                        <td>Artwork (Gambar/teks)</td>
                                                        <td><input type="checkbox" name="b_1" id="" class="Cover1" @checked(old('b_1') == 'ok')
                                                        onchange="handleCheckboxChange('Cover1',this)" value="ok"></td>
                                                        <td><input type="checkbox"  name="b_1" id="" class="Cover1" @checked(old('b_1') == 'ng')
                                                            @if (old('b_1')) @else checked @endif
                                                        onchange="handleCheckboxChange('Cover1',this)"  value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_1" id="" class="Cover1" @checked(old('b_1') == 'na')
                                                        onchange="handleCheckboxChange('Cover1',this)" value="na" ></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Warna</td>
                                                        <td><input type="checkbox" name="b_2" id="" class="Cover2" @checked(old('b_2') == 'ok')
                                                        onchange="handleCheckboxChange('Cover2',this)" value="ok"></td>
                                                        <td><input type="checkbox"  name="b_2" class="Cover2" @checked(old('b_2') == 'ng')
                                                            @if (old('b_2')) @else checked @endif
                                                        onchange="handleCheckboxChange('Cover2',this)" id=""
                                                                value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_2" id="" class="Cover2" @checked(old('b_2') == 'na')
                                                        onchange="handleCheckboxChange('Cover2',this)" value="na"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Bleed</td>
                                                        <td><input type="checkbox" name="b_3" id="" class="Cover3" @checked(old('b_3') == 'ok')
                                                        onchange="handleCheckboxChange('Cover3',this)" value="ok"></td>
                                                        <td><input type="checkbox"  name="b_3" id="" class="Cover3" @checked(old('b_3') == 'ng')
                                                            @if (old('b_3')) @else checked @endif
                                                        onchange="handleCheckboxChange('Cover3',this)" value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_3" id="" class="Cover3" @checked(old('b_3') == 'na')
                                                        onchange="handleCheckboxChange('Cover3',this)" value="na" ></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Saiz spine (untuk cover sahaja) </td>
                                                        <td><input type="checkbox" name="b_4" id="" class="Cover10" @checked(old('b_4') == 'ok')
                                                        onchange="handleCheckboxChange('Cover10',this)" value="ok"></td>
                                                        <td><input type="checkbox"  name="b_4" id="" class="Cover10" @checked(old('b_4') == 'ng')
                                                            @if (old('b_4')) @else checked @endif
                                                        onchange="handleCheckboxChange('Cover10',this)" value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_4" id="" class="Cover10"  @checked(old('b_4') == 'na')
                                                        onchange="handleCheckboxChange('Cover10',this)" value="na"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Register depan belakang</td>
                                                        <td><input type="checkbox" name="b_5" id="" class="Cover4" @checked(old('b_5') == 'ok')
                                                        onchange="handleCheckboxChange('Cover4',this)" value="ok"></td>
                                                        <td><input type="checkbox"  name="b_5" id="" class="Cover4" @checked(old('b_5') == 'ng')
                                                            @if (old('b_5')) @else checked @endif
                                                        onchange="handleCheckboxChange('Cover4',this)" value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_5" id="" class="Cover4" @checked(old('b_5') == 'na')
                                                        onchange="handleCheckboxChange('Cover4',this)" value="na"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Turutan muka surat</td>
                                                        <td><input type="checkbox" name="b_6" id="" class="Cover5" @checked(old('b_6') == 'ok')
                                                        onchange="handleCheckboxChange('Cover5',this)" value="ok"></td>
                                                        <td><input type="checkbox"  name="b_6" id="" class="Cover5" @checked(old('b_6') == 'ng')
                                                            @if (old('b_6')) @else checked @endif
                                                        onchange="handleCheckboxChange('Cover5',this)" value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_6" id="" class="Cover5" @checked(old('b_6') == 'na')
                                                        onchange="handleCheckboxChange('Cover5',this)" value="na"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>Tiada set off, kotor, hickies</td>
                                                        <td><input type="checkbox" name="b_7" id="" class="Cover6" @checked(old('b_7') == 'ok')
                                                        onchange="handleCheckboxChange('Cover6',this)" value="ok"></td>
                                                        <td><input type="checkbox"  name="b_7" id="" class="Cover6" @checked(old('b_7') == 'ng')
                                                            @if (old('b_7')) @else checked @endif
                                                        onchange="handleCheckboxChange('Cover6',this)" value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_7" id="" class="Cover6" @checked(old('b_7') == 'na')
                                                        onchange="handleCheckboxChange('Cover6',this)" value="na"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>8</td>
                                                        <td>Periksa powder</td>
                                                        <td><input type="checkbox" name="b_8" id="" class="Cover7"  @checked(old('b_8') == 'ok')
                                                        onchange="handleCheckboxChange('Cover7',this)" value="ok"></td>
                                                        <td><input type="checkbox"  name="b_8" id="" class="Cover7" @checked(old('b_8') == 'ng')
                                                            @if (old('b_8')) @else checked @endif
                                                        onchange="handleCheckboxChange('Cover7',this)" value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_8" id="" class="Cover7" @checked(old('b_8') == 'na')
                                                        onchange="handleCheckboxChange('Cover7',this)" value="na"></td>

                                                    </tr>
                                                    <tr>
                                                        <td>9</td>
                                                        <td>Tiada doubling</td>
                                                        <td><input type="checkbox" name="b_9" id="" class="Cover8"  @checked(old('b_9') == 'ok')
                                                        onchange="handleCheckboxChange('Cover8',this)" value="ok"></td>
                                                        <td><input type="checkbox"  name="b_9" id="" class="Cover8"  @checked(old('b_9') == 'ng')
                                                            @if (old('b_8')) @else checked @endif
                                                        onchange="handleCheckboxChange('Cover8',this)" value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_9" id="" class="Cover8" @checked(old('b_9') == 'na')
                                                        onchange="handleCheckboxChange('Cover8',this)" value="na"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>10</td>
                                                        <td>Frontlay & sidelay</td>
                                                        <td><input type="checkbox" name="b_10" id="" class="Cover9"  @checked(old('b_10') == 'ok')
                                                        onchange="handleCheckboxChange('Cover9',this)" value="ok"></td>
                                                        <td><input type="checkbox"  name="b_10" id="" class="Cover9" @checked(old('b_10') == 'ng')
                                                            @if (old('b_8')) @else checked @endif
                                                        onchange="handleCheckboxChange('Cover9',this)" value="ng">
                                                        </td>
                                                        <td><input type="checkbox" name="b_10" id="" class="Cover9" @checked(old('b_10') == 'na')
                                                        onchange="handleCheckboxChange('Cover9',this)" value="na"></td>
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
                                                        @if (old('semasa'))
                                                        {{-- @php
                                                            dd(old('semasa'));
                                                        @endphp --}}
                                                        @foreach (old('semasa') as $key => $value)
                                                            <tr>
                                                                <td>
                                                                    {{ $value[1]  ?? '' }}
                                                                </td>
                                                                <td>
                                                                    <input type="hidden" value="{{ $value[1]  ?? ''}}"
                                                                        name="{{ "semasa[$key][1]" }}"><input type="checkbox"
                                                                        name="{{ "semasa[$key][2]" }}"
                                                                        @checked($value[2] ?? '' == 'on')
                                                                        value="{{ $value[2]  ?? ''}}" id="">
                                                                </td>
                                                                <td><input type="checkbox" name="{{ "semasa[$key][3]" }}"
                                                                        @checked($value[3] ?? '' == 'on')
                                                                        value="{{ $value[3] ?? '' }}" id="">
                                                                </td>
                                                                <td><input type="checkbox" name="{{ "semasa[$key][4]" }}"
                                                                        @checked($value[4] ?? '' == 'on')
                                                                        value="{{ $value[4]  ?? ''}}" id="">
                                                                </td>
                                                                <td><input type="checkbox" name="{{ "semasa[$key][5]" }}"
                                                                        @checked($value[5] ?? '' == 'on')
                                                                        value="{{ $value[5]  ?? ''}}" id="">
                                                                </td>
                                                                <td><input type="checkbox" name="{{ "semasa[$key][6]" }}"
                                                                        @checked($value[6] ?? '' == 'on')
                                                                        value="{{ $value[6]  ?? ''}}" id="">
                                                                </td>
                                                                <td><input type="checkbox" name="{{ "semasa[$key][7]" }}"
                                                                        @checked($value[7] ?? '' == 'on')
                                                                        value="{{ $value[7]  ?? ''}}" id="">
                                                                </td>
                                                                <td><input type="checkbox" name="{{ "semasa[$key][8]" }}"
                                                                        @checked($value[8] ?? '' == 'on')
                                                                        value="{{ $value[8]  ?? ''}}" id="">
                                                                </td>
                                                                <td><button type="button" class="btn btn-primary check_btn"
                                                                        style="border-radius:5px; " @disabled($value[9])>check</button></td>
                                                                <td><input type="text" style="width:340px;"
                                                                        name="{{ "semasa[$key][9]" }}"
                                                                        class="check_operator form-control"
                                                                        value="{{ $value[9] ?? '' }}" readonly></td>
                                                                        <td><button type="button" class="btn btn-primary verify_btn"
                                                                            disabled>Verify</button>
                                                                    </td>

                                                                <td><input type="text"name="{{ "semasa[$key][10]" }}"
                                                                        class="verify_operator form-control"
                                                                        value="{{ $value[10] ?? '' }}" readonly></td>
                                                                <td><button type="button" class="btn btn-danger remove"
                                                                        style="border-radius:5px; ">X</button>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    @else
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
                                                            <td><button type="button"  class="btn btn-primary check_btn"
                                                                    style="border-radius:5px; ">check</button></td>
                                                            <td><input type="text" style="width:340px;" name="semasa[1][9]"
                                                                    class="check_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-primary verify_btn"
                                                                    disabled>Verify</button>
                                                            </td>
                                                            <td><input type="text" name="semasa[1][10]"
                                                                    class="verify_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-danger remove"
                                                                    style="border-radius:5px; ">X</button>
                                                            </td>
                                                        </tr>
                                                    @endif
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
                <a href="{{ route('laporan_proses_pencetakani') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
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
                                                            <td><button class="btn btn-primary check_btn"
                                                                    style="border-radius:5px; " type="button">check</button></td>
                                                            <td><input type="text" name="semasa[${length}][9]" style="width:340px;" class="check_operator form-control" readonly></td>
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
                placeholder: "Select Sales Order No",
                templateResult: function(data) {
                    if (data.loading) {
                        return "Loading...";
                    }

                    if ($('#sale_order').data('id') == data.id) {
                        return $('<option value=' + data.id + ' selected>' + data.order_no +
                            '</option>');
                    } else {
                        return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                    }
                },
                templateSelection: function(data) {
                    return data.text || "Select Sales Order No";
                }
            });
            function formatDateWithAMPM(date) {
            const options = { timeZone: 'Asia/Kuala_Lumpur', hour12: true };
            const formattedDate = date.toLocaleString('en-US', options);

            // Extracting date part in "d-m-Y" format
            const datePart = formattedDate.split(',')[0].trim();
            const [month, day, year] = datePart.split('/').map(part => part.padStart(2, '0'));

            // Construct the formatted date
            const formattedDatePart = `${day}-${month}-${year}`;

            // Adding the time part
            const timePart = formattedDate.split(',')[1].trim();

            // Combine date and time
            const formattedDateTime = `${formattedDatePart} ${timePart}`;

            return formattedDateTime;
        }

                $(document).on('click', '.check_btn', function() {
                    $(this).attr('disabled', 'disabled');
                    const currentDate = new Date();
                    const formattedDateTime = formatDateWithAMPM(currentDate);
                    let checked_by = $('#checked_by').val();
                    const combinedValue = `${checked_by}/${formattedDateTime}`;
                    $(this).closest('tr').find('.check_operator').val(combinedValue);
                });


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
    </script>
@endpush
