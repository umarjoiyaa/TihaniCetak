@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('good_receiving.receive.update', $good_receiving->id) }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4>Good Receiving</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Purchase Order No</label>
                                    <input type="text" value="{{ $good_receiving->po_no }}" readonly
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Date</label>
                                <input type="text" name="date" readonly value="{{ $good_receiving->date }}"
                                    class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                    placeholder="dd-mm-yyyy">
                            </div>
                            <div class="col-md-4">
                                <label for="">Creditor Name</label>
                                <input type="text" value="{{ $good_receiving->creditor_name }}" readonly
                                    class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Category</label>
                                <select name="category" id="category" class="form-select">
                                    <option value="" selected disabled>Select Category</option>
                                    <option value="Raw Material" @selected($good_receiving->category == 'Raw Material')>Raw Material</option>
                                    <option value="Finish Good" @selected($good_receiving->category == 'Finish Good')>Finish Good</option>
                                    <option value="WIP" @selected($good_receiving->category == 'WIP')>WIP</option>
                                    <option value="Semi FG" @selected($good_receiving->category == 'Semi FG')>Semi FG</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table mt-2 datatable w-100">
                                        <thead>
                                            <tr>
                                                <td>Sr.</td>
                                                <td>Item code</td>
                                                <td>Description</td>
                                                <td>UOM</td>
                                                <td>Quantity</td>
                                                <td>Receiving Quantity</td>
                                                <td>Delivery date</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody id="productsTable">
                                            @foreach ($good_receiving_products as $good_receiving_product)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $good_receiving_product->products->item_code }}</td>
                                                    <td>{{ $good_receiving_product->products->description }}</td>
                                                    <td>{{ $good_receiving_product->products->base_uom }}</td>
                                                    <td>{{ $good_receiving_product->quantity }}</td>
                                                    <td><input type="number"
                                                            value="{{ $good_receiving_product->receiving_qty ?? 0 }}"
                                                            readonly class="form-control receiving_qty">
                                                    </td>
                                                    <td>{{ $good_receiving_product->delivery_date }}</td>
                                                    <td>
                                                        <input type="hidden" class="hiddenId"
                                                            value="{{ $good_receiving_product->product_id }}">
                                                        <button type="button" class="btn btn-primary openModal"
                                                            data-toggle="modal" data-target="#exampleModal">+</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <input type="hidden" id="storedData" name="details">
                                <button class="btn btn-primary float-right" type="button" id="saveForm">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <a href="{{ route('good_receiving') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Receive Quantity</h5>
                    <input type="hidden" class="product_id">
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-between">
                        <div>Item Code: <span class="item_code_text"></span></div>
                        <div>Quantity: <span class="quantity_text"></span></div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div>Description: <span class="description_text"></span></div>
                        <div>Receive Quantity: <span class="receive_quantity_text"></span></div>
                    </div>
                    <div class="row">
                        <div>UOM: <span class="uom_text"></span></div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table datatable1 w-100">
                            <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>Receive Quantity</th>
                                    <th>Remarks</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveModal">Add</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $('.datatable').DataTable();

        function addRow(button) {
            if ($.fn.DataTable.isDataTable('.datatable1')) {
                $('.datatable1').DataTable().destroy();
            }
            var row = button.parentNode.parentNode.cloneNode(true);
            button.parentNode.parentNode.parentNode.insertBefore(row, button.parentNode.parentNode.nextSibling);
            $('.receive_qty').trigger('keyup');
            $('.datatable1').DataTable();
        }

        function removeRow(button) {
            if ($.fn.DataTable.isDataTable('.datatable1')) {
                $('.datatable1').DataTable().destroy();
            }
            if ($('#myTable tr').length > 1) {
                $(button).closest('tr').remove();
            } else {
                alert("Can`t remove row!");
        }
        $('.receive_qty').trigger('keyup');
        $('.datatable1').DataTable();
    }
    let locations = [];
    $(document).ready(function() {
        sessionStorage.clear();
        var detailsb = @json($good_receiving_locations);
        detailsb.forEach(element => {
            let dataObject = {
                'location': `${element.area_id}->${element.shelf_id}->${element.level_id}`,
                'area': element.area_id,
                'shelf': element.shelf_id,
                'level': element.level_id,
                'receive_qty': element.receiving_qty,
                'remarks': element.remarks,
                'hiddenId': element.product_id
            };

            let existingData = sessionStorage.getItem(`modalData${element.product_id}`);
            let dataArray = existingData ? JSON.parse(existingData) : [];
            dataArray.push(dataObject);

            sessionStorage.setItem(`modalData${element.product_id}`, JSON.stringify(dataArray));
        });
        locations = @json($locations);
    });

    $(document).on('click', '.openModal', function() {
        if ($.fn.DataTable.isDataTable('.datatable1')) {
            $('.datatable1').DataTable().destroy();
        }
        let hiddenId = $(this).closest('tr').find('.hiddenId').val();
        $('.product_id').val(hiddenId);
        let storedData = sessionStorage.getItem(`modalData${hiddenId}`);
        if (storedData) {
            $('#myTable').html(``);
            storedData = JSON.parse(storedData);
            storedData.forEach(element => {
                let optionsHtml = '';
                locations.forEach(location => {
                    let selected = '';
                    if (element.location ===
                        `${location.area_id}->${location.shelf_id}->${location.level_id}`) {
                        selected = 'selected';
                    }
                    optionsHtml +=
                        `<option
                                                                                                                                                                                                data-area-id="${location.area_id}"
                                                                                                                                                                                                data-shelf-id="${location.shelf_id}"
                                                                                                                                                                                                data-level-id="${location.level_id}"
                                                                                                                                                                                                value="${location.area_id}->${location.shelf_id}->${location.level_id}" ${selected}>
                                                                                                                                                                                                ${location.area.name}->${location.shelf.name}->${location.level.name}
                                                                                                                                                                                            </option>`;
                });
                $('#myTable').append(
                    `<tr>
                                                                                                                                                                                            <td>
                                                                                                                                                                                            <select class="form-control location">
                                                                                                                                                                                                ${optionsHtml}
                                                                                                                                                                                            </select>
                                                                                                                                                                                            </td>
                                                                                                                                                                                            <td><input type="number" class="form-control receive_qty" value="${element.receive_qty}"></td>
                                                                                                                                                                                            <td><textarea class="form-control remarks">${element.remarks}</textarea></td>
                                                                                                                                                                                            <td><button class="btn btn-primary remarks_btn">Print<i class="fas fa-print ml-2"></i></button></td>
                                                                                                                                                                                            <td><i class="fas fa-plus" onclick="addRow(this)"></i><i class="fas fa-minus ml-2" onclick="removeRow(this)"></i></td>
                                                                                                                                                                                        </tr>`
                );
            });
        } else {
            let optionsHtml = '';
            locations.forEach(location => {
                optionsHtml +=
                    `<option
                                                                                                                                                                                                data-area-id="${location.area_id}"
                                                                                                                                                                                                data-shelf-id="${location.shelf_id}"
                                                                                                                                                                                                data-level-id="${location.level_id}"
                                                                                                                                                                                                value="${location.area_id}->${location.shelf_id}->${location.level_id}">
                                                                                                                                                                                                ${location.area.name}->${location.shelf.name}->${location.level.name}
                                                                                                                                                                                            </option>`;
            });
            let defaultRow =
                `
                                                                                                                                                                                    <tr>
                                                                                                                                                                                        <td>
                                                                                                                                                                                            <select class="form-control location">
                                                                                                                                                                                                ${optionsHtml}
                                                                                                                                                                                            </select>
                                                                                                                                                                                        </td>
                                                                                                                                                                                        <td><input type="number" class="form-control receive_qty"></td>
                                                                                                                                                                                        <td><textarea class="form-control remarks"></textarea></td>
                                                                                                                                                                                        <td><button class="btn btn-primary remarks_btn">Print<i class="fas fa-print ml-2"></i></button></td>
                                                                                                                                                                                        <td><i class="fas fa-plus" onclick="addRow(this)"></i><i class="fas fa-minus ml-2" onclick="removeRow(this)"></i></td>
                                                                                                                                                                                    </tr>`;
            $('#myTable').html(defaultRow);
        }

        let item_code_text = $(this).closest('tr').find('td:eq(1)').text();
        let description_text = $(this).closest('tr').find('td:eq(2)').text();
        let uom_text = $(this).closest('tr').find('td:eq(3)').text();
        let quantity_text = $(this).closest('tr').find('td:eq(4)').text();
        $('.item_code_text').text(item_code_text);
        $('.description_text').text(description_text);
        $('.uom_text').text(uom_text);
        $('.quantity_text').text(quantity_text);
        $('.receive_qty').trigger('keyup');
        $('.datatable1').DataTable();
    });

    $('#saveModal').on('click', function() {
        let receive_qty = $('.receive_quantity_text').text();
        let qty = $('.quantity_text').text();
        if (parseFloat(receive_qty) > parseFloat(qty)) {
            alert("Can`t add more qty!");
            } else {
                $('#exampleModal').modal('hide');
                let hiddenId = $('.product_id').val();
                let data = [];
                $('#myTable tr').each(function() {
                    let rowData = {};
                    rowData['location'] = $(this).find('.location').val();
                    rowData['area'] = $(this).find('.location option:selected').attr('data-area-id');
                    rowData['shelf'] = $(this).find('.location option:selected').attr('data-shelf-id');
                    rowData['level'] = $(this).find('.location option:selected').attr('data-level-id');
                    rowData['receive_qty'] = $(this).find('.receive_qty').val();
                    rowData['remarks'] = $(this).find('.remarks').val();
                    rowData['hiddenId'] = hiddenId;
                    data.push(rowData);
                });
                sessionStorage.setItem(`modalData${hiddenId}`, JSON.stringify(data));
                $('#productsTable tr').each(function() {
                    if ($(this).find('.hiddenId').val() == hiddenId) {
                        let total_qty = $('.receive_quantity_text').text();
                        $(this).find('.receiving_qty').val(total_qty);
                    }
                });
            }
        });

        $(document).on('keyup', '.receive_qty', function() {
            let total = 0;
            $('#myTable .receive_qty').each(function() {
                total += +$(this).val();
            });
            $('.receive_quantity_text').text(total);
        });

        $('#saveForm').on('click', function() {
            let array = [];
            $('.hiddenId').each(function() {
                let storedData = sessionStorage.getItem(`modalData${$(this).val()}`);
                if (storedData == null) {
                    storedData = `{"hiddenId":"${$(this).val()}"}`;
                }
                array.push(JSON.parse(storedData));
            });

            array = array.reduce(function(acc, val) {
                return acc.concat(val);
            }, []);

            $('#storedData').val(JSON.stringify(array));
            $(this).closest('form').submit();
        });

        $(document).on('click', '.remarks_btn', function() {
            var newTab = window.open('', '_blank');

            let datepicker = $('#datepicker').val();
            let item_code = $('.item_code_text').text();
            let description = $('.description_text').text();
            let quantity = $(this).closest('tr').find('.receive_qty').val();
            let location = $(this).closest('tr').find('.location option:selected').text();
            let uom = $('.uom_text').text();
            let remarks = $(this).closest('tr').find('.remarks').val();

            var htmlContent = `
                    <html>
                    <head>
                        <link rel="icon" href="{{ asset('assets/img/tihani.png') }}"/>
                        <title>Good Receiving</title>
                        <style>
                            .container {
                                width: 50%;
                                padding: 10px;
                                border: 1px solid darkgray;
                                margin: 0 auto; /* Center the container */
                                text-align: center; /* Center align the content inside */
                            }

                            .logo {
                                margin-bottom: 10px; /* Adjust as needed */
                            }

                            .logo img {
                                max-width: 100%;
                                height: auto;
                            }

                            .data-table {
                                width: 100%;
                                border-collapse: collapse;
                            }

                            .data-table th {
                                text-align: left;
                                border: 1px solid black;
                                padding: 8px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <div class="logo">
                                <img src="{{ asset('assets/img/tihani.png') }}" width="50" alt="Logo"><h3>Tihani Cetak</h3>
                            </div>
                            <table class="data-table">
                                <tbody>
                                    <tr>
                                        <th>DATE</th>
                                        <th>${datepicker}</th>
                                    </tr>
                                    <tr>
                                        <th>ITEM CODE</th>
                                        <th>${item_code}</th>
                                    </tr>
                                    <tr>
                                        <th>DESCRIPTION</th>
                                        <th>${description}</th>
                                    </tr>
                                    <tr>
                                        <th>LOCATION</th>
                                        <th>${location}</th>
                                    </tr>
                                    <tr>
                                        <th>UOM</th>
                                        <th>${uom}</th>
                                    </tr>
                                    <tr>
                                        <th>RECEIVING QTY</th>
                                        <th>${quantity}</th>
                                    </tr>
                                    <tr>
                                        <th>REMARKS</th>
                                        <th>${remarks}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </body>
                    </html>
                `;

            newTab.document.open();
            newTab.document.write(htmlContent);
            newTab.document.close();
        });
    </script>
@endpush
