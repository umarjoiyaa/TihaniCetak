@extends('layouts.app')
@section('content')
    <style>
        #calendar a {
            cursor: pointer !important;
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
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                dateClick: function(info) {
                    openModal(info.dateStr);
                }
            });
            calendar.render();

            function openModal(date) {
                $('.modal-title').text(formatDate(date));
                getData(formatDate(date));
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
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin}</td><td>${element.status}</td><td>Digital Printing</td></tr>`
                            );
                        });
                        data.CoverEndPaper.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin}</td><td>${element.status}</td><td>Cover & End Paper</td></tr>`
                            );
                        });
                        data.Text.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin}</td><td>${element.status}</td><td>Text</td></tr>`
                            );
                        });
                        data.MesinLipat.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin}</td><td>${element.status}</td><td>Mesin Lipat</td></tr>`
                            );
                        });
                        data.StapleBind.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin}</td><td>${element.status}</td><td>Staple Bind</td></tr>`
                            );
                        });
                        data.MesinPerfectBind.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin}</td><td>${element.status}</td><td>Mesin Perfect Bind</td></tr>`
                            );
                        });
                        data.Mesin3Knife.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin}</td><td>${element.status}</td><td>Mesin 3 Knife</td></tr>`
                            );
                        });
                        data.KulitBuku.forEach(element => {
                            $('#myTable tbody').append(
                                `<tr><td>${element.sale_order.order_no}</td><td>${element.sale_order.kod_buku}</td><td>${element.sale_order.description}</td><td>${element.mesin}</td><td>${element.status}</td><td>Kulit Buku/Cover</td></tr>`
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
