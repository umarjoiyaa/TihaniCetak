@extends('layouts.app')

@section('content')
    <form action="{{ route('mesin_lipat.proses.update', $mesin_lipat->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="float-left"><b>JOBSHEET - MESIN LIPAT</b></h5>
                                <p class="float-right">TCSB-B46 (Rev. 1)</p>
                            </div>
                        </div>

                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><b>Production Button</b></h5>
                                    </div>
                                    <div class="col-md-4 ">
                                        <button id="play" onclick="machineStarter(1, {{ $mesin_lipat->id }})"
                                            type="button" class="btn btn-light w-100" style="border:1px solid black;"><i
                                                class="la la-play" style="font-size:20px;"></i>Start</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button id="pause" type="button" class="btn btn-light w-100"
                                            style="border:1px solid black;"><i class="la la-pause"
                                                style="font-size:20px;"></i>Pause</button>
                                    </div>
                                    <div class="col-md-4  ">
                                        <div class="box">
                                            <button id="stop" onclick="machineStarter(3, {{ $mesin_lipat->id }})"
                                                type="button" class="btn btn-light w-100"
                                                style="border:1px solid black;"><i class="la la-stop-circle"
                                                    style="font-size:20px;"></i>Stop</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div id="msg" class="col-12 text-center"></div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="background:#f1f0f0;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Tarikh</label>
                                            <input type="text" name="date" value="{{ $mesin_lipat->date }}"
                                                class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                                placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Disediakan Oleh</label>
                                        <input type="text" readonly name=""
                                            value="{{ $mesin_lipat->user->full_name }}" id="" class="form-control">
                                        <input type="hidden" value="{{ Auth::user()->full_name }}" id="checked_by">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Operator</label>
                                            @php
                                                $item = json_decode($mesin_lipat->operator);
                                            @endphp
                                            <select name="operator[]" class="form-control form-select" id="operator"
                                                multiple>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        @if ($item) {{ in_array($user->id, $item) ? 'selected' : '' }} @endif>
                                                        {{ $user->full_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Sales Order No.</label>
                                            <input type="text" readonly name=""
                                                value="{{ $mesin_lipat->sale_order->order_no }}" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label"> Tajuk </label>
                                            <input type="text" readonly name="" id="tajuk"
                                                class="form-control" value="{{ $mesin_lipat->sale_order->description }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" readonly id="kod_buku" class="form-control"
                                                value="{{ $mesin_lipat->sale_order->kod_buku }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Pelanggan</label>
                                            <input type="text" readonly name="" id="customer"
                                                class="form-control" value="{{ $mesin_lipat->sale_order->customer }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Kuantiti SO </label>
                                            <input type="text" readonly name="" id="sale_order_qty"
                                                class="form-control"
                                                value="{{ $mesin_lipat->sale_order->sale_order_qty }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Jumlah Seksyen</label>
                                            <input type="text" value="{{ $mesin_lipat->jumlah_seksyen }}"
                                                name="jumlah_mukasurat" id="jumlah" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Jenis Lipatan</label>
                                            <input type="text" value="{{ $mesin_lipat->jenis_lipatan }}"
                                                class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Mesin</label>
                                            <input type="text" value="{{ $mesin_lipat->mesin }}" class="form-control"
                                                id="machine">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="background:#f1f0f0; border-radius:5px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Jobsheet Details</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-bordered" id="jobsheet_detail_table">
                                            <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Start datetime</th>
                                                    <th>End datetime</th>
                                                    <th>Total Time(min)</th>
                                                    <th>Machine</th>
                                                    <th>Remarks</th>
                                                    <th>Operator</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($details as $detail)
                                                    <tr>
                                                        <td><button type="button" data-toggle="modal"
                                                                data-target="#exampleModal"
                                                                class="btn btn-primary openModal">+</button>
                                                            <input type="hidden" class="hiddenId"
                                                                value="{{ $detail->id }}">
                                                        </td>
                                                        <td>{{ $detail->start_time }}</td>
                                                        <td>{{ $detail->end_time }}</td>
                                                        <td>{{ $detail->duration }}</td>
                                                        <td>
                                                            {{ $detail->machine }}
                                                        </td>
                                                        <td>{{ $detail->remarks }}</td>
                                                        <td class="operator_text"></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="background:#f1f0f0; border-radius:5px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Total Output Details</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-bordered" id="output_table">
                                            <thead>
                                                <tr>
                                                    <th>Section No.</th>
                                                    <th>Last Fold</th>
                                                    <th>Rejection</th>
                                                    <th>Good Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="background:#f1f0f0; border-radius:5px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><b>Production Machine Detail</b></h5>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-bordered" id="machine_detail_table">
                                            <thead>
                                                <tr>
                                                    <th>Process</th>
                                                    <th>Machine</th>
                                                    <th>Start datetime</th>
                                                    <th>End datetime</th>
                                                    <th>Total time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($details as $detail)
                                                    <tr>
                                                        <td>
                                                            @if ($detail->status == 1)
                                                                <span class="badge badge-success">Started</span>
                                                            @elseif ($detail->status == 2)
                                                                <span class="badge badge-warning">Paused</span>
                                                            @elseif ($detail->status == 3)
                                                                <span class="badge badge-danger">Stopped</span>
                                                            @else
                                                                <span class="badge badge-info">Not-initiated</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ $detail->machine }}
                                                        </td>
                                                        <td>{{ $detail->start_time }}</td>
                                                        <td>{{ $detail->end_time }}</td>
                                                        <td>{{ $detail->duration }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center" style="font-size:20px; color:red; dispaly:inline-block;">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <h5 style="font-size:20px;"><b>PERINGATAN :</b> <br>
                                                <span style="color:black; font-size:14px;">
                                                    <b>SERAHKAN SAMPLE KEPADA QC/EKSEKUTIF QA/PENGURUS OPERASI/PENYELIA
                                                        OPERASI UNTUK PENGESAHAN SEBELUM MEMULAKAN PROSES LIPAT</b>
                                                </span>
                                            </h5>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" id="storedData" name="details">
                                <button class="btn btn-primary float-right" type="button" id="saveForm">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('mesin_lipat') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Production Output Details</h5>
                        <!-- <span data-dismiss="modal" style="font-size:30px; color:red; cursor:pointer;">&times;</span> -->
                        <select id="section_nos" class="form-select2"></select>
                        <input type="hidden" class="mesin_lipat_detail_id">
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="modalTable">
                                <thead>
                                    <tr>
                                        <th>Section No.</th>
                                        <th>Last Fold</th>
                                        <th>Rejection</th>
                                        <th>Good count</th>
                                        <th>Check</th>
                                        <th></th>
                                        <th>Verify</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="" id=""
                                                class="form-control section_no" readonly style="width:150px;"></td>
                                        <td><input type="text" name="" id=""
                                                class="form-control last_fold" style="width:150px;"></td>
                                        <td><input type="text" name="" id=""
                                                class="form-control rejection" style="width:150px;"></td>
                                        <td><input type="text" name="" id="" readonly
                                                class="form-control good_count" style="width:150px;"></td>
                                        <td><button type="button" class="btn btn-primary check_operator">Check</button>
                                        </td>
                                        <td><input type="text" name="" id="" readonly
                                                class="form-control check_operator_text" ></td>
                                        <td><button disabled type="button"
                                                class="btn btn-primary check_verify">Verify</button></td>
                                        <td><input type="text" name="" id="" readonly
                                                class="form-control check_verify_text"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveModal">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="pauseModal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header d-flex jutify-content-between">
                        <h4><b>REMARKS</b></h4>
                        <h4 class="modal-title"></h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <textarea id="pauseRemarks" rows="4" class="form-control"></textarea>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" onclick="pauseMesin()">Pause</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('input,select').attr('disabled', 'disabled');
            $('input[type="hidden"]').removeAttr('disabled');
            $('.section_no').removeAttr('disabled');
            $('.last_fold').removeAttr('disabled');
            $('.rejection').removeAttr('disabled');
            $('.good_count').removeAttr('disabled');
            $('#section_nos').removeAttr('disabled');
            $('.check_operator_text').removeAttr('disabled');
            $('.check_verify_text').removeAttr('disabled');
            $('#operator').removeAttr('disabled');
            $('#operator').trigger('change');
            check_machines(@json($check_machines));

            sessionStorage.clear();
            var detailsb = @json($detailbs);
            detailsb.forEach(element => {
                let dataObject = {
                    section_no: element.section_no,
                    last_fold: element.last_fold,
                    rejection: element.rejection,
                    good_count: element.good_count,
                    check_operator_text: element.check_operator_text,
                    check_verify_text: element.check_verify_text,
                    hiddenId: element.mesin_lipat_detail_id
                };

                sessionStorage.setItem(`formData${element.mesin_lipat_detail_id}`, JSON.stringify(
                    dataObject));
            });

            $('#saveModal').trigger('click');

            var jumlahSection = @json($mesin_lipat->jumlah_seksyen);
            $('#section_nos').append(`<option selected disabled>Select Seksyen No</option>`);
            for (let index = 0; index < jumlahSection; index++) {
                $('#section_nos').append(`<option value="${index+1}">Seksyen ${index+1}</option>`);
            }
        });

        function check_machines(check_machines) {
            if (check_machines != null) {
                if (check_machines.status == 1) {
                    $('#play').attr('disabled', 'disabled');
                    $('#pause').removeAttr('disabled');
                    $('#stop').removeAttr('disabled');
                    $('#play').addClass('btn-success');
                    $('#play').removeClass('btn-light');
                    $('#pause').addClass('btn-light');
                    $('#stop').addClass('btn-light');
                    $('#pause').removeClass('btn-warning');
                    $('#stop').removeClass('btn-danger');
                } else if (check_machines.status == 2) {
                    $('#pause').attr('disabled', 'disabled');
                    $('#play').removeAttr('disabled');
                    $('#stop').attr('disabled', 'disabled');
                    $('#pause').addClass('btn-warning');
                    $('#pause').removeClass('btn-light');
                    $('#play').addClass('btn-light');
                    $('#stop').addClass('btn-light');
                    $('#play').removeClass('btn-success');
                    $('#stop').removeClass('btn-danger');
                } else if (check_machines.status == 3) {
                    $('#stop').attr('disabled', 'disabled');
                    $('#pause').attr('disabled', 'disabled');
                    $('#play').attr('disabled', 'disabled');
                    $('#stop').addClass('btn-danger');
                    $('#stop').removeClass('btn-light');
                    $('#play').addClass('btn-light');
                    $('#pause').addClass('btn-light');
                    $('#play').removeClass('btn-success');
                    $('#pause').removeClass('btn-warning');
                }
            } else {
                $('#play').removeAttr('disabled');
                $('#pause').attr('disabled', 'disabled');
                $('#stop').attr('disabled', 'disabled');
            }
        }

        $('#operator').on('change', function() {
            $('.operator_text').empty();
            $(this).find('option:selected').each(function() {
                var badge = $('<span class="badge badge-primary mx-1">' + $(this).text() + '</span>');
                $('.operator_text').append(badge);
            });
        });

        $('#section_nos').on('change', function() {
            $('.section_no').val($(this).val());
        });

        $(document).on('change', '.last_fold,.rejection', function() {
            let last_fold = $('.last_fold').val();
            let rejection = $('.rejection').val();
            $('.good_count').val(parseFloat(last_fold) - parseFloat(rejection));
        });

        $(document).on('click', '.openModal', function() {
            $('#section_nos').val('');
            let hiddenId = $(this).closest('tr').find('.hiddenId').val();
            $('.mesin_lipat_detail_id').val(hiddenId);
            let storedData = sessionStorage.getItem(`formData${hiddenId}`);
            let formData = JSON.parse(storedData);

            if (formData != null) {
                $('#modalTable tbody').find('.section_no').val(formData.section_no);
                $('#modalTable tbody').find('.last_fold').val(formData.last_fold);
                $('#modalTable tbody').find('.rejection').val(formData.rejection);
                $('#modalTable tbody').find('.good_count').val(formData.good_count);
                $('#section_nos').val(formData.section_no);
                $('#modalTable tbody').find('.check_operator_text').val(formData.check_operator_text);
                if (formData.check_operator_text != '') {
                    $('#modalTable tbody').find('.check_operator').attr('disabled', 'disabled');
                } else {
                    $('#modalTable tbody').find('.check_operator').removeAttr('disabled');
                }
            } else {
                $('#modalTable tbody').find('.section_no').val('');
                $('#modalTable tbody').find('.last_fold').val('');
                $('#modalTable tbody').find('.rejection').val('');
                $('#modalTable tbody').find('.good_count').val('');
                $('#modalTable tbody').find('.check_operator_text').val('');
                $('#modalTable tbody').find('.check_operator').removeAttr('disabled');
            }
        });

        $('#saveModal').on('click', function() {
            let section_no = $('#modalTable tbody').find('.section_no').val();
            let last_fold = $('#modalTable tbody').find('.last_fold').val();
            let rejection = $('#modalTable tbody').find('.rejection').val();
            let good_count = $('#modalTable tbody').find('.good_count').val();
            let check_operator_text = $('#modalTable tbody').find('.check_operator_text').val();
            let check_verify_text = $('#modalTable tbody').find('.check_verify_text').val();
            let hiddenId = $('.mesin_lipat_detail_id').val();

            let dataObject = {
                section_no: section_no,
                last_fold: last_fold,
                rejection: rejection,
                good_count: good_count,
                check_operator_text: check_operator_text,
                check_verify_text: check_verify_text,
                hiddenId: hiddenId
            };

            sessionStorage.setItem(`formData${hiddenId}`, JSON.stringify(dataObject));

            let sectionTotals = {};

            $('#output_table tbody').html('');

            $('.hiddenId').each(function() {
                let formData = sessionStorage.getItem(`formData${$(this).val()}`);
                let storedData = JSON.parse(formData);
                if (storedData !== null) {
                    let section = storedData.section_no;
                    if (!sectionTotals[section]) {
                        sectionTotals[section] = {
                            total_last_fold: 0,
                            total_rejection: 0,
                            total_good_count: 0
                        };
                    }
                    sectionTotals[section].total_last_fold += parseFloat(storedData.last_fold) || 0;
                    sectionTotals[section].total_rejection += parseFloat(storedData.rejection) || 0;
                    sectionTotals[section].total_good_count += parseFloat(storedData.good_count) || 0;
                }
            });

            for (let section in sectionTotals) {
                let sectionTotal = sectionTotals[section];
                $('#output_table tbody').append(`
                <tr>
                    <td>${section}</td>
                    <td>${sectionTotal.total_last_fold}</td>
                    <td>${sectionTotal.total_rejection}</td>
                    <td>${sectionTotal.total_good_count}</td>
                </tr>`);
            }
        });

        $(document).on('click', '.check_operator', function() {
            $(this).attr('disabled', 'disabled');
            const currentDate = new Date();
            const formattedDateTime = formatDateWithAMPM(currentDate);
            let checked_by = $('#checked_by').val();
            $(this).closest('tr').find('.check_operator_text').val(checked_by + '/' + formattedDateTime);
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

        $('#saveForm').on('click', function() {
            let array = [];
            $('.hiddenId').each(function() {
                let storedData = sessionStorage.getItem(`formData${$(this).val()}`);
                if(storedData == null){
                    storedData = `{"hiddenId":"${$(this).val()}"}`;
                }
                array.push(JSON.parse(storedData));
            });
            $('#storedData').val(JSON.stringify(array));
            $(this).closest('form').submit();
        });

        function machineStarter(status, mesin_lipat_id) {
            $('#play').attr('disabled', 'disabled');
            $('#pause').attr('disabled', 'disabled');
            $('#stop').attr('disabled', 'disabled');
            var machine = $("#machine").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('mesin_lipat.machine.starter') }}',
                data: {
                    "mesin_lipat_id": mesin_lipat_id,
                    "machine": machine,
                    "status": status,
                    "remarks": $('#pauseRemarks').val(),
                },
                success: function(data) {
                    $("#msg").html(data.message);
                    check_machines(data.check_machine);
                    $('#machine_detail_table tbody').empty();
                    $('#jobsheet_detail_table tbody').empty();
                    data.details.forEach(function(detail, index) {
                        var statusBadge;
                        if (detail.status == 1) {
                            statusBadge = '<span class="badge badge-success">Started</span>';
                        } else if (detail.status == 2) {
                            statusBadge = '<span class="badge badge-warning">Paused</span>';
                        } else if (detail.status == 3) {
                            statusBadge = '<span class="badge badge-danger">Stopped</span>';
                        } else {
                            statusBadge = '<span class="badge badge-info">Not-initiated</span>';
                        }

                        var mesinInfo = detail.machine;
                        var start_time = detail.start_time;
                        var remarks = (detail.remarks != null) ? detail.remarks : '';
                        var end_time = (detail.end_time != null) ? detail.end_time : '';
                        var duration = (detail.duration != null) ? detail.duration : '';

                        $('#machine_detail_table tbody').append(`<tr>
                            <td>${statusBadge}</td>
                            <td>${mesinInfo}</td>
                            <td>${start_time}</td>
                            <td>${end_time}</td>
                            <td>${duration}</td>
                        </tr>`);

                        var badge = '';
                        var button =
                            `<button type="button" data-toggle="modal"
                                                            data-target="#exampleModal" class="btn btn-primary openModal">+</button>
                                                            <input type="hidden" class="hiddenId" value="${detail.id}">`;
                        $('#operator').find('option:selected').each(function() {
                            badge += '<span class="badge badge-primary mx-1">' + $(this)
                                .text() + '</span>';
                        });

                        $('#jobsheet_detail_table tbody').append(`<tr>
                            <td>${button}</td>
                            <td>${start_time}</td>
                            <td>${end_time}</td>
                            <td>${duration}</td>
                            <td>${mesinInfo}</td>
                            <td>${remarks}</td>
                            <td class="operator_text">${badge}</td>
                        </tr>`);
                    });
                }
            });
        }

        $('#pause').on('click', function() {
            $('#pauseModal').modal('show');
        });

        function pauseMesin() {
            if ($('#pauseRemarks').val() == '' || $('#pauseRemarks').val() == null) {
                alert("Can`t Pause Without Remarks!");
            } else {
                $('#pauseModal').modal('hide');
                machineStarter(2, @json($mesin_lipat->id));
            }
        }
    </script>
@endpush
