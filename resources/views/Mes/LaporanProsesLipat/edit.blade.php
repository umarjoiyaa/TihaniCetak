@extends('layouts.app')
@section('content')
    <form action="{{ route('laporan_proses_lipat.update', $laporan_proses_lipat->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="float-left">LAPORAN PROSES LIPAT</h5>
                                <p class="float-right">TCSB-B61 (Rev.0)</p>
                            </div>
                        </div>

                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Date</label>
                                            <input type="text" name="date"
                                                value="{{ \Carbon\Carbon::parse($laporan_proses_lipat->date)->format('d-m-Y') }}"
                                                class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                                placeholder="dd-mm-yyyy">


                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">

                                        @php
                                            $timeIn24HourFormat = Carbon\Carbon::createFromFormat(
                                                'h:i A',
                                                $laporan_proses_lipat->time,
                                            )->format('H:i');
                                            // dd($timeIn24HourFormat)
                                        @endphp
                                        <div class="form-label">Time</div>
                                        <input name="time" type="time" id="Currenttime"
                                            value="{{ $timeIn24HourFormat }}" class="form-control">


                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Checked By (Operator)</div>
                                            <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                                name="" id="checked_by" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Sales Order No.</div>
                                            <select name="sale_order" data-id="{{ $laporan_proses_lipat->sale_order_id }}"
                                                id="sale_order" class="form-control">
                                                <option value="{{ $laporan_proses_lipat->sale_order_id }}" selected
                                                    style="color: black; !important">
                                                    {{ $laporan_proses_lipat->sale_order->order_no }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Tajuk</div>
                                            <input type="text" readonly value="" id="tajuk"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Kod Buku</div>
                                            <input type="text" value="" readonly name="" id="kod_buku"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Mesin</label>
                                            <select name="mesin" class="form-select">
                                                <option value="F1" @selected($laporan_proses_lipat->mesin == 'F1')>F1</option>
                                                <option value="F2" @selected($laporan_proses_lipat->mesin == 'F2')>F2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Operator</label>
                                            @php
                                                $item = json_decode($laporan_proses_lipat->user_id);
                                            @endphp
                                            <select name="user[]" class="form-control form-select" id="" multiple>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        @if ($item) {{ in_array($user->id, $item) ? 'selected' : '' }} @endif>
                                                        {{ $user->full_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Seksyen No.</div>
                                            <input type="text" name="seksyen_no" id=""
                                                value="{{ $laporan_proses_lipat->seksyen_no }}"
                                                class="SectionNumber form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5" style="background:#f4f4ff;">
                            <div class="col-md-12 ">
                                <h5><b>B) Pemeriksaan dan Pengesahan 1st Piece</b> </h5>
                            </div>
                            <div class="col-md-8 mt-5">

                                <table class="table table-bordered text-center" id="tableSection">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Seksyen</th>
                                            <th colspan="4">kriteria</th>

                                        </tr>
                                        <tr>
                                            <th>Jenis lipatan</th>
                                            <th>Kedudukan lipatan</th>
                                            <th>Turutan muka surat</th>
                                            <th>kotor / koyak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($details as $key => $detail)
                                            <tr>
                                                <td>{{ $detail->b_1 }} <input type="hidden" value="{{ $detail->b_1 }}"
                                                        name="pengesahan[{{ $key + 1 }}][1]">
                                                </td>
                                                <td><input type="checkbox" name="pengesahan[{{ $key + 1 }}][2]"
                                                        @checked($detail->b_2 != null)></td>
                                                <td><input type="checkbox" name="pengesahan[{{ $key + 1 }}][3]"
                                                        @checked($detail->b_3 != null) id=""></td>
                                                <td><input type="checkbox" name="pengesahan[{{ $key + 1 }}][4]"
                                                        @checked($detail->b_4 != null) id=""></td>
                                                <td><input type="checkbox" name="pengesahan[{{ $key + 1 }}][5]"
                                                        @checked($detail->b_5 != null) id=""></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-5" style="background:#f4f4ff;">
                            <div class="col-md-12 mt-5">
                                <h5><b>C) Pemeriksaan semasa proses lipat</b> </h5>
                                <h5><b>Petunjuk:</b></h5>
                                <span><b>KL = Kedudukan Lipatan</b></span><br>
                                <span><b> K= Koyak/Kotor/Kedut</b></span>
                            </div>

                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary float-right  mr-3" id="AddRow">+
                                    Add</button>
                            </div>

                            <div class="col-md-12">


                                <div class="row mt-3">
                                    <div class="col-md-2">
                                        <ul class="nav nav-tabs flex-column" style="width:100%;" id="myTab"
                                            role="tablist">
                                            @foreach ($sections as $key1 => $section)
                                                <li class="nav-item">
                                                    <a class="nav-link {{ $key1 == 0 ? 'active' : '' }}"
                                                        id="tab{{ $section->row }}" data-toggle="tab"
                                                        href="#Seksyen{{ $key }}_{{ $section->row }}"
                                                        role="tab"
                                                        aria-controls="Seksyen{{ $section->row }}_{{ $key }}"
                                                        aria-selected="{{ $key1 == 0 ? 'true' : 'false' }}">Seksyen
                                                        {{ $section->row }}</a>
                                                    <input type="hidden" name="section[{{ $section->row }}]"
                                                        value="Seksyen {{ $section->row }}">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="tab-content" id="myTabContent">
                                            @foreach ($sections as $key1 => $section)
                                                <div class="tab-pane fade {{ $key1 == 0 ? 'show active' : '' }}"
                                                    id="Seksyen{{ $section->row }}_{{ $key }}" role="tabpanel"
                                                    aria-labelledby="tab{{ $section->row }}">
                                                    <input type="hidden" class="hidden" value="{{ $section->row }}">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2">Jumlah </th>
                                                                    <th colspan="2">Seksyen {{ $section->row }}</th>
                                                                    <th rowspan="2">Check</th>
                                                                    <th rowspan="2">Username / datetime</th>
                                                                    <th rowspan="2">Verify</th>
                                                                    <th rowspan="2">Username / datetime</th>
                                                                    <th rowspan="2">Action</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>KL</th>
                                                                    <th>K</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $newKey = 1;
                                                                @endphp
                                                                @foreach ($detailss as $key2 => $value1)
                                                                    @if ($value1->row == $section->row)
                                                                        <tr>
                                                                            <td>{{ $value1->c_2 }} <input type="hidden"
                                                                                    name="section[{{ $section->row }}][{{ $newKey }}][1]"
                                                                                    value="{{ $value1->c_2 }}"></td>
                                                                            <td><input type="checkbox"
                                                                                    name="section[{{ $section->row }}][{{ $newKey }}][2]"
                                                                                    @checked($value1->c_3 != null)>
                                                                            </td>
                                                                            <td><input type="checkbox"
                                                                                    name="section[{{ $section->row }}][{{ $newKey }}][3]"
                                                                                    @checked($value1->c_4 != null)>
                                                                            </td>
                                                                            <td><button type="button"
                                                                                    class="btn btn-primary check_btn"
                                                                                    style="border-radius:5px;"
                                                                                    @disabled($value1->c_5 != null)>check</button>
                                                                            </td>
                                                                            <td><input type="text" style="width:340px;"
                                                                                    name="section[{{ $section->row }}][{{ $newKey }}][4]"
                                                                                    class="check_operator form-control"
                                                                                    readonly value="{{ $value1->c_5 }}">
                                                                            </td>
                                                                            <td><button type="button"
                                                                                    class="btn btn-primary verify_btn"
                                                                                    disabled>Verify</button></td>
                                                                            <td><input type="text"
                                                                                    name="section[{{ $section->row }}][{{ $newKey }}][5]"
                                                                                    class="verify_operator form-control"
                                                                                    readonly></td>
                                                                            <td><button type="button"
                                                                                    class="btn btn-danger remove"
                                                                                    style="border-radius:5px;">X</button>
                                                                            </td>
                                                                        </tr>
                                                                        @php
                                                                            $newKey++;
                                                                        @endphp
                                                                    @else
                                                                        @php
                                                                            $newKey = 1;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
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
            <a href="{{ route('laporan_proses_lipat') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
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



        var jumlah = 1000;
        $('#AddRow').on('click', function() {
            var currentActiveTable = $('#myTabContent .tab-pane');
            $index = $('#myTabContent .tab-pane.active').find('.hidden').val();

            currentActiveTable.each(function() {
                if ($(this).hasClass('active')) {
                    if ($(this).find('table tbody tr').length == 1) {
                        jumlah = 2000;
                        $(this).find('table tbody tr .remove').removeClass('d-none')
                    } else {
                        var length = $(this).find('table tbody tr').length;
                        jumlah = +`${length+1}000`
                    }
                    $length3 = $(this).find('table tbody tr').length + 1;
                    $(this).find('table tbody').append(`<tr>
                                                            <td>${jumlah} <input type="hidden" value="${jumlah}" name="section[${$index}][${$length3}][1]"
                                                                    id=""></td>
                                                            <td><input type="checkbox" name="section[${$index}][${$length3}][2]"
                                                                    id="">
                                                            </td>
                                                            <td><input type="checkbox" name="section[${$index}][${$length3}][3]"
                                                                    id="">
                                                            </td>
                                                            <td><button type="button" class="btn btn-primary check_btn"
                                                                    style="border-radius:5px; ">check</button></td>
                                                            <td><input type="text" style="width:340px;" name="section[${$index}][${$length3}][4]"
                                                                    class="check_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-primary verify_btn"
                                                                    disabled>Verify</button>
                                                            </td>
                                                            <td><input type="text" style="width:340px;" name="section[${$index}][${$length3}][5]"
                                                                    class="verify_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-danger remove"
                                                                    style="border-radius:5px; ">X</button></td>
                                                        </tr>`);

                    jumlah += 1000;

                }
            });



        });

        $(document).on('click', '.remove', function() {
            var closestRow = $(this).closest('tr');
            var closestTable = closestRow.closest('.table');
            closestRow.remove();

            // Update sequence for visible rows
            updateSequence(closestTable);

            // Update jumlah
            jumlah -= 1000;

            // Update text for the remaining row if only one is visible
            if (closestTable.find('tbody tr:visible').length === 1) {
                closestTable.find('tbody tr:visible .remove').addClass('d-none');
                closestTable.find('tbody tr:visible td:eq(0)').text(1000);
            }
        });

        // Function to update sequence
        function updateSequence(table) {
            var visibleRows = table.find('tbody tr:visible');
            visibleRows.each(function(index) {
                $(this).find('td:eq(0)').text((index + 1) * 1000);
            });
        }

        // Function to initialize sectionRanges based on the input value
        var sectionRanges = {};

        function initializeSectionRanges(inputValue) {
            var inputValues = inputValue.split(',').map(value => value.trim());

            var currentSection = 1;

            inputValues.forEach(function(input) {
                if (input.includes('-')) {
                    var rangeArray = input.split('-');
                    var start = parseInt(rangeArray[0]);
                    var end = parseInt(rangeArray[1]);

                    sectionRanges[currentSection] = {
                        start: start,
                        end: end
                    };

                    currentSection++;
                } else {
                    currentSection++;
                }
            });

            return sectionRanges;
        }


        $(document).ready(function() {
            var initialValue = $('.SectionNumber').val();
            // Initialize sectionRanges with the initial value
            var sectionRanges = initializeSectionRanges(initialValue);



            var sectionNumber = 1;

            $('.SectionNumber').on('change', function() {
                var inputValue = $(this).val().trim();
                if (inputValue == '' || inputValue === '0') {
                    // Clear tabs and content if the input is empty or zero
                    $('#myTab').empty();
                    $('#tableSection tbody').empty();
                    $('#myTabContent').empty();
                    sectionRanges = {}; // Clear sectionRanges when input is empty
                    sectionNumber = 1; // Reset sectionNumber
                    return;
                }

                var inputValues = inputValue.split(',').map(value => value.trim());

                // Store existing section numbers to track removed tabs
                var existingSectionNumbers = [];

                // Iterate through input values to update or add sections
                inputValues.forEach(function(input) {
                    if (input.includes('-')) {
                        // It's a range
                        var rangeArray = input.split('-');
                        var start = parseInt(rangeArray[0]);
                        var end = parseInt(rangeArray[1]);

                        // Check if the range is already present
                        if (sectionRanges[sectionNumber] && sectionRanges[sectionNumber].end >=
                            start) {
                            // Extend the existing range
                            sectionRanges[sectionNumber].end = Math.max(end, sectionRanges[
                                sectionNumber].end);
                        } else {
                            // Add or update the range for the section
                            sectionRanges[sectionNumber] = {
                                start: start,
                                end: end
                            };
                        }

                        // Iterate through the range to add or update sections
                        for (var i = start; i <= end; i++) {
                            if (!$(`#myTab #tab${i}`).length) {
                                createTabAndTable(sectionNumber, i);
                            }
                            existingSectionNumbers.push(i);
                        }

                        // Move to the next section after processing the entire range
                        sectionNumber++;

                    } else {
                        var soloNumber = parseInt(input);
                        if (!$(`#myTab #tab${soloNumber}`).length) {
                            // It's a solo number and not already created
                            createTabAndTable(sectionNumber, soloNumber);
                        }
                        existingSectionNumbers.push(soloNumber);

                        // Move to the next section
                        sectionNumber++;
                    }
                });

                // Remove tabs corresponding to removed section numbers


                $('#myTab li').each(function() {
                    var tabId = $(this).find('a').attr('href').replace('#Seksyen', '');
                    var tabNumber = parseInt(tabId.split('_')[1]);

                    if (!existingSectionNumbers.includes(tabNumber)) {
                        // Remove the tab if the section number is not present in the input
                        $(this).remove();
                        // Remove the corresponding tab content
                        $('#myTabContent').find(`#Seksyen${tabId}`).remove();
                    }
                });

                $('#tableSection tbody tr').each(function() {
                    var currentSectionNumber = parseInt($(this).find('td:first-child').text().match(
                        /\d+/)[0]);
                    if (!existingSectionNumbers.includes(currentSectionNumber)) {
                        $(this).remove();
                        // return false;
                    }
                });
                sortTableRows()
            });


            function sortTableRows() {
                var table = $('#tableSection tbody');
                var rows = table.find('tr').get();

                rows.sort(function (a, b) {
                    var keyA = parseInt($(a).find('td:first-child').text().match(/\d+/)[0]);
                    var keyB = parseInt($(b).find('td:first-child').text().match(/\d+/)[0]);

                    return keyA - keyB;
                });

                $.each(rows, function (index, row) {
                    table.append(row);
                });
            }

            function createTabAndTable(sectionNumber, number) {
                var tabIndex = $('#myTab li').length + 1;

                $length = $('#tableSection tbody tr').length + 1;
                $('#tableSection tbody').append(`
<tr>
<td>Seksyen ${number} <input type="hidden" value="Seksyen ${number}" name="pengesahan[${$length}][1]"></td>
<td><input type="checkbox" name="pengesahan[${$length}][2]" id=""></td>
<td><input type="checkbox" name="pengesahan[${$length}][3]" id=""></td>
<td><input type="checkbox" name="pengesahan[${$length}][4]" id=""></td>
<td><input type="checkbox" name="pengesahan[${$length}][5]" id=""></td>
</tr>`);

                $length1 = $('#myTab li').length + 1;
                $('#myTab').append(`
<li class="nav-item">
<a class="nav-link" id="tab${number}" data-toggle="tab" href="#Seksyen${sectionNumber}_${number}"
    role="tab" aria-controls="Seksyen${sectionNumber}_${number}" aria-selected="true">
    Seksyen ${number}
</a>
<input type="hidden" name="section[${number}]" value="Seksyen ${sectionNumber} - ${number}">
</li>`);

                $length2 = $('#myTabContent .tab-pane').length + 1;
                $('#myTabContent').append(`
<div class="tab-pane fade" id="Seksyen${sectionNumber}_${number}" role="tabpanel"
aria-labelledby="tab${number}">
<input type="hidden" class="hidden" value="${number}">
<div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">Jumlah </th>
                                                    <th colspan="2">Seksyen ${number}</th>
                                                    <th rowspan="2">Check</th>
                                                    <th rowspan="2">Username / datetime</th>
                                                    <th rowspan="2">Verify</th>
                                                    <th rowspan="2">Username / datetime</th>
                                                    <th rowspan="2">Action</th>
                                                </tr>
                                                <tr>
                                                    <th>KL</th>
                                                    <th>K</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td>1000 <input type="hidden" value="1000" name="section[${number}][1][1]"
                                                        id=""></td>
                                                <td><input type="checkbox" name="section[${number}][1][2]"
                                                        id="">
                                                </td>
                                                <td><input type="checkbox" name="section[${number}][1][3]"
                                                        id="">
                                                </td>
                                                <td><button type="button" class="btn btn-primary check_btn"
                                                        style="border-radius:5px; ">check</button></td>
                                                <td><input type="text" name="section[${number}][1][4]"
                                                        class="check_operator form-control" readonly></td>
                                                <td><button type="button" class="btn btn-primary verify_btn"
                                                        disabled>Verify</button>
                                                </td>
                                                <td><input type="text" name="section[${number}][1][5]"
                                                        class="verify_operator form-control" readonly></td>
                                                <td><button type="button" class="btn btn-danger remove d-none"
                                                        style="border-radius:5px; ">X</button></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
</div>`);
            };



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
                    return data.text || null;
                }
            });

        });

        function formatDateWithAMPM(date) {
            const options = {
                timeZone: 'Asia/Kuala_Lumpur',
                hour12: true
            };
            const formattedDate = date.toLocaleString('en-US', options);
            const datePart = formattedDate.split(',')[0].trim();
            const [month, day, year] = datePart.split('/').map(part => part.padStart(2, '0'));
            const formattedDatePart = `${day}-${month}-${year}`;
            const timePart = formattedDate.split(',')[1].trim();
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
