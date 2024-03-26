@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>JOBSHEET - STAPLE BIND</b></h5>
                            <p class="float-right">TCSB-B51 (Rev. 1)</p>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5><b>Production Button</b></h5>
                                </div>
                                <div class="col-md-4 ">
                                    <button id="play" onclick="machineStarter(1, {{ $staple_bind->id }})"
                                        type="button" class="btn btn-light w-100" style="border:1px solid black;"><i
                                            class="la la-play" style="font-size:20px;"></i>Start</button>
                                </div>
                                <div class="col-md-4">
                                    <button id="pause" onclick="machineStarter(2, {{ $staple_bind->id }})"
                                        type="button" class="btn btn-light w-100" style="border:1px solid black;"><i
                                            class="la la-pause" style="font-size:20px;"></i>Pause</button>
                                </div>
                                <div class="col-md-4  ">
                                    <div class="box">
                                        <button id="stop" onclick="machineStarter(3, {{ $staple_bind->id }})"
                                            type="button" class="btn btn-light w-100" style="border:1px solid black;"><i
                                                class="la la-stop-circle" style="font-size:20px;"></i>Stop</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div id="msg" class="col-12 text-center"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Tarikh</label>
                                        <input type="text" readonly name="date" value="{{ $staple_bind->date }}"
                                            class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                            placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Disediakan Oleh</label>
                                    <input type="text" readonly name=""
                                        value="{{ $staple_bind->user->user_name }}" id="" class="form-control">
                                    <input type="hidden" value="{{ Auth::user()->user_name }}" id="checked_by">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Operator</label>
                                        @php
                                            $item = json_decode($staple_bind->operator);
                                        @endphp
                                        <select disabled name="operator[]" class="form-control form-select" id="operator"
                                            multiple>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    @if ($item) {{ in_array($user->id, $item) ? 'selected' : '' }} @endif>
                                                    {{ $user->user_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="" class="form-label">Sales Order No.</label>
                                        <input type="text" readonly class="form-control"
                                            value="{{ $staple_bind->sale_order->order_no }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="" class="form-label"> Tajuk </label>
                                        <input type="text" readonly name="" id="tajuk" class="form-control"
                                            value="{{ $staple_bind->sale_order->description }}">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="" class="form-label">Kod Buku</label>
                                        <input type="text" readonly id="kod_buku" class="form-control"
                                            value="{{ $staple_bind->sale_order->kod_buku }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Pelanggan</label>
                                        <input type="text" readonly name="" id="customer" class="form-control"
                                            value="{{ $staple_bind->sale_order->customer }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Kuantiti</label>
                                        <input type="text" readonly name="" id="sale_order_qty"
                                            class="form-control" value="{{ $staple_bind->sale_order->sale_order_qty }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Jumlah Seksyen</label>
                                        <input type="text" readonly id="jumlah" class="form-control"
                                            value="{{ $staple_bind->senari_semak->item_cover_text ?? 0 }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Saiz Buku</label>
                                        <input type="text" readonly id="size" class="form-control"
                                            value="{{ $staple_bind->sale_order->size }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Mesin</label>
                                        <input type="text" readonly class="form-control"
                                            value="{{ $staple_bind->mesin }}" id="machine">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background:#f4f4ff; border-radius:5px;">
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

                    <div class="card" style="background:#f4f4ff; border-radius:5px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Total Output Details</h4>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Good Count</th>
                                                <th>Rejection</th>
                                                <th>Total Produce</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="total_good_count"></td>
                                                <td class="total_rejection"></td>
                                                <td class="total_total_produce"></td>
                                            </tr>
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

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <h3><b>Verified By</b></h3>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Username</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $staple_bind->verified_by_date }}
                                        </td>
                                        <td>{{ $staple_bind->verified_by_user }}
                                        </td>
                                        <td>{{ $staple_bind->verified_by_designation }}
                                        </td>
                                        <td>{{ $staple_bind->verified_by_department }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center" style="font-size:20px; color:red; dispaly:inline-block;">
                                <div class="row">

                                    <div class="col-md-12">
                                        <h5 style="font-size:30px;"><b>PERINGATAN :</b> <br>
                                            <span style="color:black; font-size:16px;">
                                                <b>SERAHKAN SAMPLE KEPADA QC/EKSEKUTIF QC/EKSEKUTIF QA/PENGURUS
                                                    OPERASI/PENYELIA
                                                    OPERASI UNTUK PENGESAHAN SEBELUM MEMULAKAN PROSES PENJILIDAN</b>
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-end">
                                    <a class="btn btn-primary float-right" target="_blank" href="{{route('staple_bind.print', $staple_bind->id)}}" >Print</a>

                                </div>


                    <div class="row d-flex justify-content-end">
                        <div class="col-md-12 d-flex justify-content-end">
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Production Output Details
                                            </h5>
                                            <span data-dismiss="modal" style="color:red; font-size:30px; cursor:pointer;">&times;</span>
                                            <input type="hidden" class="staple_detail_id">
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="modalTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Good Count</th>
                                                            <th>Rejection</th>
                                                            <th>Total Produce</th>
                                                            <th>Check</th>
                                                            <th></th>
                                                            <th>Verify</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input type="text" name="" id=""
                                                                    class="form-control good_count" readonly style="width:150px;">
                                                            </td>
                                                            <td><input type="text" name="" id=""
                                                                    class="form-control rejection" readonly style="width:150px;">
                                                            </td>
                                                            <td><input type="text" name="" id=""
                                                                    class="form-control total_produce" readonly style="width:150px;"></td>
                                                            <td><button disabled type="button"
                                                                    class="btn btn-primary check_operator">Check</button>
                                                            </td>
                                                            <td><input type="text" name="" id=""
                                                                    readonly class="form-control check_operator_text"></td>
                                                            <td><button disabled type="button"
                                                                    class="btn btn-primary check_verify">Verify</button>
                                                            </td>
                                                            <td><input type="text" name="" id=""
                                                                    readonly class="form-control check_verify_text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('staple_bind') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#operator').trigger('change');
            check_machines(@json($check_machines));

            sessionStorage.clear();
            var detailsb = @json($detailbs);
            detailsb.forEach(element => {
                let dataObject = {
                    good_count: element.good_count,
                    rejection: element.rejection,
                    total_produce: element.total_produce,
                    check_operator_text: element.check_operator_text,
                    check_verify_text: element.check_verify_text,
                    hiddenId: element.staple_detail_id
                };

                sessionStorage.setItem(`formData${element.staple_detail_id}`, JSON.stringify(
                    dataObject));
            });

            let total_good_count = 0;
            let total_rejection = 0;
            let total_total_produce = 0;

            $('.hiddenId').each(function() {
                let formData = sessionStorage.getItem(`formData${$(this).val()}`);
                let storedData = JSON.parse(formData);
                if (storedData !== null) {
                    total_good_count += parseFloat(storedData.good_count) || 0;
                    total_rejection += parseFloat(storedData.rejection) || 0;
                    total_total_produce += parseFloat(storedData.total_produce) || 0;
                }
            });

            $('.total_good_count').text(total_good_count);
            $('.total_rejection').text(total_rejection);
            $('.total_total_produce').text(total_total_produce);
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

        $(document).on('click', '.openModal', function() {
            let hiddenId = $(this).closest('tr').find('.hiddenId').val();
            $('.staple_detail_id').val(hiddenId);
            let storedData = sessionStorage.getItem(`formData${hiddenId}`);
            let formData = JSON.parse(storedData);

            if (formData != null) {
                $('#modalTable tbody').find('.good_count').val(formData.good_count);
                $('#modalTable tbody').find('.rejection').val(formData.rejection);
                $('#modalTable tbody').find('.total_produce').val(formData.total_produce);
                $('#modalTable tbody').find('.check_operator_text').val(formData.check_operator_text);
                $('#modalTable tbody').find('.check_verify_text').val(formData.check_verify_text);
                $('#modalTable tbody').find('.check_operator').attr('disabled', 'disabled');
                $('#modalTable tbody').find('.check_verify').attr('disabled', 'disabled');
            } else {
                $('#modalTable tbody').find('.good_count').val('');
                $('#modalTable tbody').find('.rejection').val('');
                $('#modalTable tbody').find('.total_produce').val('');
                $('#modalTable tbody').find('.check_operator_text').val('');
                $('#modalTable tbody').find('.check_verify_text').val('');
                $('#modalTable tbody').find('.check_verify').attr('disabled', 'disabled');
            }
        });
    </script>
@endpush
