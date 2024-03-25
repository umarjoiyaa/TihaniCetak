@extends('layouts.app')
@section('content')
    <style>
        .custom-button {
            padding: 5px;
            width: 100%;
            background-color: rgb(243, 243, 132);
            border: none;
            text-align: center;
        }

        .custom-date {
            font-size: 0.8em;
            text-align: right;
            padding: 3px;
            cursor: pointer;
        }

        .fc-daygrid-day-number {
            width: 100% !important;
        }

        .fc-daygrid-day-frame.fc-scrollgrid-sync-inner {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
    <div class="card p-5">
        <div class="card-header">
            <h3><b>PRODUCTION SCHEDULING</b></h3>
        </div>
        <div class="card-body">
            <div id='calendar'></div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header d-flex jutify-content-between">
                    <h4><b>SCHEDULE EVENTS</b></h4>
                    <h4 class="modal-title"></h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('assets/img/loaders/loader.svg') }}" id="myLoader" class="d-none"
                            alt="Loader">
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>Sales Order No.</th>
                                    <th>Kod Buku</th>
                                    <th>Tajuk</th>
                                    <th>Machine Name</th>
                                    <th>Process</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script src="{{ asset('assets/js/index.global.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $data = @json($data);
            const datesArray = Object.values($data).map(item => item.date);
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                timeZone: 'Asia/Kuala_Lumpur',
                dayCellContent: function(info) {
                    var container = document.createElement('div');

                    var dateText = document.createElement('div');
                    dateText.classList.add('custom-date');
                    dateText.textContent = info.date.getDate();
                    container.appendChild(dateText);

                    var dateStr = formatDate(info.date);

                    var dateExists = datesArray.some(function(item) {
                        return item === dateStr;
                    });

                    if (dateExists) {
                        var button = document.createElement('button');
                        button.innerHTML = 'View';
                        button.classList.add('custom-button');
                        button.onclick = function() {
                            openModal(dateStr);
                        };
                        container.appendChild(button);
                    }

                    return {
                        domNodes: [container]
                    };
                }
            });
            calendar.render();

            function openModal(date) {
                $('.modal-title').text(date);
                getData(date);
            }

            function formatDate(dateStr) {
                var date = new Date(dateStr);
                var day = String(date.getDate()).padStart(2, '0');
                var month = String(date.getMonth() + 1).padStart(2, '0');
                var year = date.getFullYear();
                return `${day}-${month}-${year}`;
            }

            function getData(date) {
                $('#myModal').modal('show');
                if ($.fn.DataTable.isDataTable('#myTable')) {
                    $('#myTable').DataTable().destroy();
                }
                $('#myTable tbody').html('');
                $('#myLoader').removeClass('d-none');
                $.ajax({
                    type: 'GET',
                    url: '{{ route('production_scheduling.detail') }}',
                    data: {
                        "date": date
                    },
                    success: function(data) {
                        data.DigitalPrinting.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin === 'OTHERS' ? element.mesin_other : element.mesin}</td><td>Digital Printing</td><td><span class="badge badge-info">${element.status}</span></td></tr>`
                            );
                        });
                        data.CoverEndPaper.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin === 'OTHERS' ? element.mesin_other : element.mesin}</td><td>Cover & End Paper</td><td><span class="badge badge-info">${element.status}</span></td></tr>`
                            );
                        });
                        data.Text.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin === 'OTHERS' ? element.mesin_other : element.mesin}</td><td>Text</td><td><span class="badge badge-info">${element.status}</span></td></tr>`
                            );
                        });
                        data.MesinLipat.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin === 'OTHERS' ? element.mesin_other : element.mesin}</td><td>Mesin Lipat</td><td><span class="badge badge-info">${element.status}</span></td></tr>`
                            );
                        });
                        data.StapleBind.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin === 'OTHERS' ? element.mesin_other : element.mesin}</td><td>Staple Bind</td><td><span class="badge badge-info">${element.status}</span></td></tr>`
                            );
                        });
                        data.MesinPerfectBind.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin === 'OTHERS' ? element.mesin_other : element.mesin}</td><td>Mesin Perfect Bind</td><td><span class="badge badge-info">${element.status}</span></td></tr>`
                            );
                        });
                        data.Mesin3Knife.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin === 'OTHERS' ? element.mesin_other : element.mesin}</td><td>Mesin 3 Knife</td><td><span class="badge badge-info">${element.status}</span></td></tr>`
                            );
                        });
                        data.KulitBuku.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin === 'OTHERS' ? element.mesin_other : element.mesin}</td><td>Kulit Buku/Cover</td><td><span class="badge badge-info">${element.status}</span></td></tr>`
                            );
                        });
                        data.Teks.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin === 'OTHERS' ? element.mesin_other : element.mesin}</td><td>Teks</td><td><span class="badge badge-info">${element.status}</span></td></tr>`
                            );
                        });
                        $('#myTable').DataTable();
                        $('#myLoader').addClass('d-none');
                    }
                });
            }
        });
    </script>
@endpush
