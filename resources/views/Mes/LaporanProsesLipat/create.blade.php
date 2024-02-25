@extends('layouts.app')
@section('content')
    <form action="{{ route('laporan_proses_lipat.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>LAPORAN PROSES LIPAT</h5>

                        <div class="card" style="background:#f1f0f0;">
                            <div class="card-body">
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
                                            <label for="">Mesin</label>
                                            <select name="mesin" class="form-select">
                                                <option value="F1">F1</option>
                                                <option value="F2">F2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Operator</label>
                                            <select name="user[]" class="form-control form-select" id="" multiple>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        @if (old('user')) {{ in_array($user->id, old('user')) ? 'selected' : '' }} @endif>
                                                        {{ $user->full_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Seksyen No.</div>
                                            <input type="text" name="seksyen_no" id=""
                                                class="SectionNumber form-control">
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


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-5" style="background:#f1f0f0;">
                            <div class="col-md-12 mt-5">
                                <h5><b>C) Pemeriksaan semasa proses lipat</b> </h5>
                                <h5><b>Petunjuk:</b></h5>
                                <span><b>KL = Kedudukan Lipatan</b></span><br>
                                <span><b> K= Koyak/Kotor/Kedut</b></span>
                            </div>

                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary float-right  mr-3" id="AddRow">+ Add</button>
                            </div>

                            <div class="col-md-12">


                                <div class="row mt-3">
                                    <div class="col-md-2">
                                        <ul class="nav nav-tabs flex-column" style="width:100%;" id="myTab"
                                            role="tablist">

                                        </ul>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="tab-content" id="myTabContent">



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
            <a href="{{ route('laporan_proses_lipat') }}">back to list</a>
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
            $index = $('#myTabContent .tab-pane.active').index();

            currentActiveTable.each(function() {
                if ($(this).hasClass('active')) {
                    if ($(this).find('table tbody tr').length == 1) {
                        jumlah = 2000;
                    }
                    $length3 = $(this).find('table tbody tr').length + 1;
                    $(this).find('table tbody').append(`<tr>
                                                            <td>${jumlah} <input type="hidden" value="${jumlah}" name="section[${$index+1}][${$length3}][1]"
                                                                    id=""></td>
                                                            <td><input type="checkbox" name="section[${$index+1}][${$length3}][2]"
                                                                    id="">
                                                            </td>
                                                            <td><input type="checkbox" name="section[${$index+1}][${$length3}][3]"
                                                                    id="">
                                                            </td>
                                                            <td><button type="button" class="btn btn-primary check_btn"
                                                                    style="border-radius:5px; ">check</button></td>
                                                            <td><input type="text" style="width:340px;" name="section[${$index+1}][${$length3}][4]"
                                                                    class="check_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-primary verify_btn"
                                                                    disabled>Verify</button>
                                                            </td>
                                                            <td><input type="text" name="section[${$index+1}][${$length3}][5]"
                                                                    class="verify_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-danger remove"
                                                                    style="border-radius:5px; ">X</button></td>
                                                        </tr>`);

                    jumlah += 1000;

                }
            });



        });

        $(document).on('click', '.remove', function() {
            jumlah -= 1000;
            $(this).closest('tr').remove();
        })


        $(".SectionNumber").on("change", function() {
            const regex = /^[0-9,-]+$/;
            const newValue = $(this).val().replace(/[^0-9,-]+/g, "");
            $(this).val(newValue);
            var newValueArray = newValue.split(',');

            // Iterate through each value in the array
            newValueArray.forEach(function(value) {
                if (/^\d+-\d+$/.test(value)) {
                    //Range code
                    var splitValue = value.split('-');
                    var StartingNumber = +splitValue[0];
                    var EndingNumber = +splitValue[1];
                    if ($('#tableSection tbody tr').length > 0) {
                        StartingNumber = $('#tableSection tbody tr').length + 1;
                    }
                    for (let i = StartingNumber; i <= EndingNumber; i++) {
                        $length = $('#tableSection tbody tr').length + 1;
                        $('#tableSection tbody').append(`<tr>
                                        <td>Seksyen ${i} <input type="hidden" value="Seksyen ${i}" name="pengesahan[${$length}][1]"></td>
                                        <td><input type="checkbox" name="pengesahan[${$length}][2]" id=""></td>
                                        <td><input type="checkbox" name="pengesahan[${$length}][3]" id=""></td>
                                        <td><input type="checkbox" name="pengesahan[${$length}][4]" id=""></td>
                                        <td><input type="checkbox" name="pengesahan[${$length}][5]" id=""></td>
                                    </tr>`);
                        $length1 = $('#myTab li').length + 1;
                        $('#myTab').append(`<li class="nav-item">
                                    <a class="nav-link " id="home-tab" data-toggle="tab" href="#Seksyen${i}"
                                        role="tab" aria-controls="Seksyen${i}" aria-selected="true">Seksyen ${i}</a>
                                        <input type="hidden" name="section[${i}]" value="Seksyen ${i}">
                                </li>`);
                        $length2 = $('#myTabContent .tab-pane').length + 1;
                        $('#myTabContent').append(` <div class="tab-pane fade show" id="Seksyen${i}" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2">Jumlah </th>
                                                                <th colspan="2">Seksyen ${i}</th>
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
                                                            <td>1000 <input type="hidden" value="1000" name="section[${i}][1][1]"
                                                                    id=""></td>
                                                            <td><input type="checkbox" name="section[${i}][1][2]"
                                                                    id="">
                                                            </td>
                                                            <td><input type="checkbox" name="section[${i}][1][3]"
                                                                    id="">
                                                            </td>
                                                            <td><button type="button" class="btn btn-primary check_btn"
                                                                    style="border-radius:5px; ">check</button></td>
                                                            <td><input type="text" name="section[${i}][1][4]"
                                                                    class="check_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-primary verify_btn"
                                                                    disabled>Verify</button>
                                                            </td>
                                                            <td><input type="text" name="section[${i}][1][5]"
                                                                    class="verify_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-danger remove"
                                                                    style="border-radius:5px; ">X</button></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>`);
                    }
                    //


                    // If the value is in the format "Numberone - Numbertwo", do console range
                    console.log("Range:", value);
                } else if (/^\d+$/.test(value)) {
                    // Solo number code
                    $length = $('#tableSection tbody tr').length + 1;
                    $('#tableSection tbody').append(`<tr>
                                        <td>Seksyen ${value} <input type="hidden" value="Seksyen ${value}" name="pengesahan[${$length}][1]"></td>
                                        <td><input type="checkbox" name="pengesahan[${$length}][2]" id=""></td>
                                        <td><input type="checkbox" name="pengesahan[${$length}][3]" id=""></td>
                                        <td><input type="checkbox" name="pengesahan[${$length}][4]" id=""></td>
                                        <td><input type="checkbox" name="pengesahan[${$length}][5]" id=""></td>
                                    </tr>`);


                    $length1 = $('#myTab li').length + 1;
                    $('#myTab').append(`<li class="nav-item">
                                    <a class="nav-link " id="home-tab" data-toggle="tab" href="#Seksyen${value}"
                                        role="tab" aria-controls="Seksyen${value}" aria-selected="true">Seksyen ${value}</a>
                                        <input type="hidden" name="section[${value}]" value="Seksyen ${value}">
                                </li>`);

                    $length2 = $('#myTabContent .tab-pane').length + 1;
                    $('#myTabContent').append(` <div class="tab-pane fade show" id="Seksyen${value}" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2">Jumlah </th>
                                                                <th colspan="2">Seksyen ${value}</th>
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
                                                            <td>1000 <input type="hidden" value="1000" name="section[${value}][1][1]"
                                                                    id=""></td>
                                                            <td><input type="checkbox" name="section[${value}][1][2]"
                                                                    id="">
                                                            </td>
                                                            <td><input type="checkbox" name="section[${value}][1][3]"
                                                                    id="">
                                                            </td>
                                                            <td><button type="button" class="btn btn-primary check_btn"
                                                                    style="border-radius:5px; ">check</button></td>
                                                            <td><input type="text" name="section[${value}][1][4]"
                                                                    class="check_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-primary verify_btn"
                                                                    disabled>Verify</button>
                                                            </td>
                                                            <td><input type="text" name="section[${value}][1][5]"
                                                                    class="verify_operator form-control" readonly></td>
                                                            <td><button type="button" class="btn btn-danger remove"
                                                                    style="border-radius:5px; ">X</button></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>`);
                    //

                    // If the value is a solo number, do console solo number
                    console.log("Solo Number:", value);
                } else {
                    // Handle other cases as needed
                    console.log("Invalid Format:", value);
                }
            });
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
                placeholder: "Select Sales Order No",
                templateResult: function(data) {
                    if (data.loading) {
                        return "Loading...";
                    }

                    return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                },
                templateSelection: function(data) {
                    return data.order_no || "Select Sales Order No";
                }
            });

            // function formatDate(date) {
            //     const day = String(date.getDate()).padStart(2, '0');
            //     const month = String(date.getMonth() + 1).padStart(2, '0'); // Month is zero-based
            //     const year = date.getFullYear();
            //     const hours = String(date.getHours()).padStart(2, '0');
            //     const minutes = String(date.getMinutes()).padStart(2, '0');

            //     return `${day}-${month}-${year} ${hours}:${minutes}`;
            // }

            // $(document).on('click', '.check_btn', function() {
            //     $(this).attr('disabled', 'disabled');
            //     const currentDate = new Date();
            //     const formattedDate = formatDate(currentDate);
            //     let checked_by = $('#checked_by').val();
            //     $(this).closest('tr').find('.check_operator').val(checked_by + '/' + formattedDate);
            // });

            function formatDateWithAMPM(date) {
            const options = { timeZone: 'Asia/Kuala_Lumpur', hour12: true };
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
        });
    </script>
@endpush
