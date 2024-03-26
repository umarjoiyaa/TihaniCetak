@extends('layouts.app')
@section('content')
    <form action="{{ route('manage_transfer.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3> Manage Transfer</h3>
                    </div>
                    <div class="card-body">
                        <div class="card" style="background:#f6f7f7;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>A) Informasi</h4>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Tarikh</div>
                                            <input type="text" name="date"
                                                value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" class="form-control"
                                                id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Ref No</div>
                                            <select class="form-select" name="ref_no" id="ref_no">
                                                <option value="" disabled selected>Pilih ref no.</option>
                                                @foreach ($ref_nos as $ref_no)
                                                    <option value="{{ $ref_no->id }}">{{ $ref_no->ref_no }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Dikeluarkan Oleh</div>
                                            <input type="text" value="{{ Auth::user()->user_name }}" readonly
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Sales Orders No</div>
                                            <input type="text" readonly id="sale_order" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Description</div>
                                            <input type="text" id="description" readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Diminta Oleh</div>
                                            <input type="text" id="oleh" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><b>B) PERMINTAAN KERTAS</b></h4>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table1 mt-2" id="table1">
                                                <thead>
                                                    <tr>
                                                        <td>Stock code</td>
                                                        <td>Description</td>
                                                        <td>Grammage</td>
                                                        <td>Saiz</td>
                                                        <td>UOM</td>
                                                        <td>Available Qty</td>
                                                        <td>UOM Request</td>
                                                        <td>Request Quantity</td>
                                                        <td>Previous Qty</td>
                                                        <td>Balance Qty</td>
                                                        <td>Transfer QTY</td>
                                                        <td>Remaining Qty</td>
                                                        <td>Remarks</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><b>C) PERMINTAAN BAHAN MENTAH</b></h4>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table2 mt-2" id="table2">
                                                <thead>
                                                    <tr>
                                                        <td>Stock code</td>
                                                        <td>Description</td>
                                                        <td>UOM</td>
                                                        <td>Available Qty</td>
                                                        <td>Request Quantity</td>
                                                        <td>Previous Qty</td>
                                                        <td>Balance Qty</td>
                                                        <td>Transfer QTY</td>
                                                        <td>Remaining Qty</td>
                                                        <td>Remarks</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><b>D) PERMINTAAN WIP/SEMI FG</b></h4>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table3 mt-2" id="table3">
                                                <thead>
                                                    <tr>
                                                        <td>Stock code</td>
                                                        <td>Description</td>
                                                        <td>UOM</td>
                                                        <td>Available Qty</td>
                                                        <td>Request Quantity</td>
                                                        <td>Previous Qty</td>
                                                        <td>Balance Qty</td>
                                                        <td>Transfer QTY</td>
                                                        <td>Remaining Qty</td>
                                                        <td>Remarks</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <p style="font-size:17px; color:#000;">
                                <h4> Nota :</h4><br>
                                <h6> Pengeluaran Kertas:</h6>
                                *Penerima kertas mestilah memastikan jenis, saiz , grammage and kuantiti yang dimintaa
                                adalah betul.<br>
                                *Stock card kertas mestilah dikemaskini setelah stock dikeluarkan daripada stor<br>
                                *Pemulangan stok kertas oleh Jabatan Operasi hendaklah dimaklumkan kepada Eksekutif
                                Inventori untuk pengemaskinian stock card kertas<br>

                                Pengeluaran Bahan mentah:<br>
                                *Penerima bahan mentah mestilah memastikan bahan mentah dan kuantiti yang diminta adalah
                                betul.<br>
                                *stockcard bahan mentah mestilah dikemaskini apabila bahan mentah dikeluarkan
                                daripada stor
                                </P>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" id="storedData" name="details">
                                        <button class="btn btn-primary float-right" type="button"
                                            id="saveForm">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('manage_transfer') }}" class="">Back to list</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Stock Transfer</h5>
                    <input type="hidden" class="product_id">
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-between">
                        <div>Item: <span class="item_text"></span></div>
                        <div>Total Qty: <span class="total_quantity_text"></span> | Total Transfer Qty: <span
                                class="total_transfer_quantity_text"></span></div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table datatable1 w-100">
                            <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>Available Qty</th>
                                    <th>Quantity</th>
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
        $('#table1').dataTable();
        $('#table2').dataTable();
        $('#table3').dataTable();

        function addRow(button) {
            if ($.fn.DataTable.isDataTable('.datatable1')) {
                $('.datatable1').DataTable().destroy();
            }
            var row = button.parentNode.parentNode.cloneNode(true);
            button.parentNode.parentNode.parentNode.insertBefore(row, button.parentNode.parentNode.nextSibling);

            var clonedDropdown = row.querySelector('.location');
            var clonedDropdownValue = clonedDropdown.value;

            var rows = document.querySelectorAll('#myTable tr'); // Assuming 'myTable' is the ID of your table
            var foundMatch = false;

            for (var i = 0; i < rows.length; i++) {
                var dropdown = rows[i].querySelector('.location'); // Assuming the dropdown has a class of 'location'
                if (dropdown.value === clonedDropdownValue) {
                    var qtyInput = rows[i].querySelector(
                        '.available_qty'); // Assuming the input has a class of 'available_qty'
                    if (!foundMatch) {
                        // If it's the first matched result, don't set available qty to 0
                        foundMatch = true; // Set flag to true after the first match
                    } else {
                        qtyInput.value = 0;
                    }
                }
            }


            $('.datatable1').DataTable();
            $('.transfer_qty1').trigger('keyup');
        }

        function removeRow(button) {

            var $rowToRemove = $(button).closest('tr');
            var dropdownValue = $rowToRemove.find('.location').val();
            var availableQty = parseFloat($rowToRemove.find('.available_qty').val());
            $nextMatchingRow = '';

            if (availableQty > 0) {
                var $nextMatchingRow = null;

                $('#myTable tr').each(function() {
                    var $currentRow = $(this);
                    var thisDropdownValue = $currentRow.find('.location').val();
                    var thisAvailableQty = parseFloat($currentRow.find('.available_qty').val());

                    if ($currentRow.is($rowToRemove)) {
                        return true; // Skip the row to be removed
                    }

                    if (thisDropdownValue === dropdownValue) {
                        $nextMatchingRow = $currentRow;
                        return false; // Exit the loop once the matching row is found
                    }
                });

                if ($nextMatchingRow) {
                    var $nextMatchingAvailableQtyInput = $nextMatchingRow.find('.available_qty');
                    var nextMatchingAvailableQty = parseFloat($nextMatchingAvailableQtyInput.val());
                    $nextMatchingAvailableQtyInput.val(nextMatchingAvailableQty + availableQty);
                }
            }

            if ($.fn.DataTable.isDataTable('.datatable1')) {
                $('.datatable1').DataTable().destroy();
            }
            if ($('#myTable tr').length > 1) {
                $(button).closest('tr').remove();
            } else {
                alert("Can`t remove row!");
        }
        $('.transfer_qty1').trigger('keyup');
        $('.datatable1').DataTable();
    }

    let locations = [];
    $(document).ready(function() {
        sessionStorage.clear();
        locations = @json($locations);
    });

    $(document).on('click', '.openModal', function() {
        if ($.fn.DataTable.isDataTable('.datatable1')) {
            $('.datatable1').DataTable().destroy();
        }
        if ($(this).closest('table').hasClass('table1')) {
            $('#saveModal').attr('data-id', '1');
        } else if ($(this).closest('table').hasClass('table2')) {
            $('#saveModal').attr('data-id', '2');
        } else if ($(this).closest('table').hasClass('table3')) {
            $('#saveModal').attr('data-id', '3');
        }
        let tableId = $('#saveModal').attr('data-id');
        let hiddenId = $(this).closest('tr').find('.hiddenId').val();
        $('.product_id').val(hiddenId);
        let storedData = sessionStorage.getItem(`modalData${hiddenId}`);
        if (storedData) {
            $('#myTable').html(``);
            storedData = JSON.parse(storedData);
            storedData.forEach(element => {
                if (element.tableId == tableId) {
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
                                                                                                                                                                                                                                                                                                                                        <td><input type="number" class="form-control available_qty" readonly value="${element.available_qty}"></td>
                                                                                                                                                                                                                                                                                                                                        <td><input type="number" class="form-control transfer_qty1" value="${element.transfer_qty}"></td>
                                                                                                                                                                                                                                                                                                                                        <td><i class="fas fa-plus" onclick="addRow(this)"></i><i class="fas fa-minus ml-2" onclick="removeRow(this)"></i></td>
                                                                                                                                                                                                                                                                                                                                    </tr>`
                    );
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
                                                                                                                                                                                                                                                                                                                                    <td><input type="number" readonly class="form-control available_qty"></td>
                                                                                                                                                                                                                                                                                                                                    <td><input type="number" class="form-control transfer_qty1"></td>
                                                                                                                                                                                                                                                                                                                                    <td><i class="fas fa-plus" onclick="addRow(this)"></i><i class="fas fa-minus ml-2" onclick="removeRow(this)"></i></td>
                                                                                                                                                                                                                                                                                                                                </tr>`;
                    $('#myTable').html(defaultRow);
                }
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
                                                                                                                                                                                                                                                                                                                                    <td><input type="number" readonly class="form-control available_qty"></td>
                                                                                                                                                                                                                                                                                                                                    <td><input type="number" class="form-control transfer_qty1"></td>
                                                                                                                                                                                                                                                                                                                                    <td><i class="fas fa-plus" onclick="addRow(this)"></i><i class="fas fa-minus ml-2" onclick="removeRow(this)"></i></td>
                                                                                                                                                                                                                                                                                                                                </tr>`;
            $('#myTable').html(defaultRow);
        }

        let item_text = $(this).closest('tr').find('td:eq(0)').text();
        let quantity_text = $(this).closest('tr').find('.balance_qty').val();
        $('.item_text').text(item_text);
        $('.total_quantity_text').text(quantity_text);
        $('.location').trigger('change');
        $('.transfer_qty1').trigger('change');
        $('.datatable1').DataTable();
    });

    $('#saveModal').on('click', function() {
        var alertNeeded = false;

        $('#myTable tr').each(function() {
            var availableQty = parseFloat($(this).find('.available_qty').val());
            var qty = parseFloat($(this).find('.transfer_qty1').val());

            if (availableQty < qty || isNaN(qty)) {
                alertNeeded = true;
                return false;
            }
        });

        if (alertNeeded) {
            alert("available quantity must be greater or equals to transfer quantity.");
        } else {
            let tableId = $('#saveModal').attr('data-id');
            let receive_qty = parseFloat($('.total_quantity_text').text());
            let qty = parseFloat($('.total_transfer_quantity_text').text());
            if (qty > receive_qty) {
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
                        rowData['available_qty'] = $(this).find('.available_qty').val();
                        rowData['transfer_qty'] = $(this).find('.transfer_qty1').val();
                        rowData['hiddenId'] = hiddenId;
                        rowData['tableId'] = tableId;
                        data.push(rowData);
                    });
                    sessionStorage.setItem(`modalData${hiddenId}`, JSON.stringify(data));
                    if (tableId == 1) {
                        $('#table1 tr').each(function() {
                            if ($(this).find('.hiddenId').val() == hiddenId) {
                                let total_qty = $('.total_transfer_quantity_text').text();
                                let balance_qty = $(this).find('.balance_qty').val();
                                $(this).find('.transfer_qty').val(total_qty);
                                $(this).find('.remaining_qty').val(balance_qty - total_qty);
                                $(this).find('td:eq(11)').text(balance_qty - total_qty);
                            }
                        });
                    } else if (tableId == 2) {
                        $('#table2 tr').each(function() {
                            if ($(this).find('.hiddenId').val() == hiddenId) {
                                let total_qty = $('.total_transfer_quantity_text').text();
                                let balance_qty = $(this).find('.balance_qty').val();
                                $(this).find('.transfer_qty').val(total_qty);
                                $(this).find('.remaining_qty').val(balance_qty - total_qty);
                                $(this).find('td:eq(8)').text(balance_qty - total_qty);
                            }
                        });
                    } else if (tableId == 3) {
                        $('#table3 tr').each(function() {
                            if ($(this).find('.hiddenId').val() == hiddenId) {
                                let total_qty = $('.total_transfer_quantity_text').text();
                                let balance_qty = $(this).find('.balance_qty').val();
                                $(this).find('.transfer_qty').val(total_qty);
                                $(this).find('.remaining_qty').val(balance_qty - total_qty);
                                $(this).find('td:eq(8)').text(balance_qty - total_qty);
                            }
                        });
                    }
                }
            }
        });

        $(document).on('keyup change', '.transfer_qty1', function() {
            let total = 0;
            $('#myTable .transfer_qty1').each(function() {
                total += +$(this).val();
            });
            $('.total_transfer_quantity_text').text(total);
        });

        $('#ref_no').on('change', function() {
            const id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{ route('ref.get') }}',
                data: {
                    "id": id
                },
                success: function(data) {
                    $('#sale_order').val(data.material.sale_order.order_no);
                    $('#description').val(data.material.description);
                    $('#oleh').val(data.material.user.user_name);

                    $length = 1;
                    $('#table1 tbody').html('');
                    $('#table1').DataTable().destroy();
                    data.material_b.forEach((element, index) => {
                        $('#table1 tbody').append(`
                            <tr>
                                <td>
                                    <input type='hidden' value='${element.product_id}' class="stock_code" name="kertas[${$length}][product_id]"/>
                                    ${element.products ? element.products.item_code : ''}
                                </td>
                                <td>${element.products ? element.products.description : ''}</td>
                                <td>${element.grammage}</td>
                                <td>${element.saiz}</td>
                                <td>${element.products ? element.products.base_uom : ''}</td>
                                <td>${element.available_qty}</td>
                                <td>${element.uoms ? element.uoms.name : ''}</td>
                                <td>${element.request_qty}</td>
                                <td>
                                    <input type='hidden' class="previous_qty" value='${element.manage_transfer && element.manage_transfer.manage_transfer_product_a[0] ? element.manage_transfer.manage_transfer_product_a[0].transfer_qty : 0}' name="kertas[${$length}][previous_qty]"/>
                                    ${element.manage_transfer && element.manage_transfer.manage_transfer_product_a[0] ? element.manage_transfer.manage_transfer_product_a[0].transfer_qty : 0}
                                </td>
                                <td>
                                    <input type='hidden' class="balance_qty" value='${element.manage_transfer && element.manage_transfer.manage_transfer_product_a[0] ? +element.request_qty - +element.manage_transfer.manage_transfer_product_a[0].transfer_qty : 0}' name="kertas[${$length}][balance_qty]"/>
                                    ${element.manage_transfer && element.manage_transfer.manage_transfer_product_a[0] ? +element.request_qty - +element.manage_transfer.manage_transfer_product_a[0].transfer_qty : 0}
                                </td>
                                <td><input type="number" readonly class="form-control transfer_qty" name="kertas[${$length}][transfer_qty]" value="0"/></td>
                                <td>
                                    <input type='hidden' class="remaining_qty" value='${element.manage_transfer && element.manage_transfer.manage_transfer_product_a[0] ? +element.request_qty - +element.manage_transfer.manage_transfer_product_a[0].transfer_qty : 0}' name="kertas[${$length}][remaining_qty]"/>
                                    ${element.manage_transfer && element.manage_transfer.manage_transfer_product_a[0] ? +element.request_qty - +element.manage_transfer.manage_transfer_product_a[0].transfer_qty : 0}
                                </td>
                                <td><textarea class="form-control" name="kertas[${$length}][remarks]"></textarea></td>
                                <td>
                                    <input type="hidden" class="hiddenId" value="${element.product_id}">
                                    <a class="addStock openModal" data-toggle="modal" data-target="#exampleModal">
                                        <iconify-icon icon="icon-park-outline:add" width="20" height="20" style="color: #18002D;"></iconify-icon>
                                    </a>
                                </td>
                            </tr>
                        `);
                        $length++;
                    });
                    $('#table1').dataTable();

                    $length1 = 1;
                    $('#table2 tbody').html('');
                    $('#table2').DataTable().destroy();
                    data.material_c.forEach((element, index) => {
                        $('#table2 tbody').append(`
                            <tr>
                                <td>
                                    <input type='hidden' value='${element.product_id}' class="stock_code" name="bahan[${$length1}][product_id]"/>
                                    ${element.products ? element.products.item_code : ''}
                                </td>
                                <td>${element.products ? element.products.description : ''}</td>
                                <td>${element.products ? element.products.base_uom : ''}</td>
                                <td>${element.available_qty}</td>
                                <td>${element.request_qty}</td>
                                <td>
                                    <input type='hidden' class="previous_qty" value='${element.manage_transfer && element.manage_transfer.manage_transfer_product_b[0] ? element.manage_transfer.manage_transfer_product_b[0].transfer_qty : 0}' name="bahan[${$length}][previous_qty]"/>
                                    ${element.manage_transfer && element.manage_transfer.manage_transfer_product_b[0] ? element.manage_transfer.manage_transfer_product_b[0].transfer_qty : 0}
                                </td>
                                <td>
                                    <input type='hidden' class="balance_qty" value='${element.manage_transfer && element.manage_transfer.manage_transfer_product_b[0] ? +element.request_qty - +element.manage_transfer.manage_transfer_product_b[0].transfer_qty : 0}' name="bahan[${$length}][balance_qty]"/>
                                    ${element.manage_transfer && element.manage_transfer.manage_transfer_product_b[0] ? +element.request_qty - +element.manage_transfer.manage_transfer_product_b[0].transfer_qty : 0}
                                </td>
                                <td><input type="number" readonly class="form-control transfer_qty" name="bahan[${$length}][transfer_qty]" value="0"/></td>
                                <td>
                                    <input type='hidden' class="remaining_qty" value='${element.manage_transfer && element.manage_transfer.manage_transfer_product_b[0] ? +element.request_qty - +element.manage_transfer.manage_transfer_product_b[0].transfer_qty : 0}' name="bahan[${$length}][remaining_qty]"/>
                                    ${element.manage_transfer && element.manage_transfer.manage_transfer_product_b[0] ? +element.request_qty - +element.manage_transfer.manage_transfer_product_b[0].transfer_qty : 0}
                                </td>
                                <td><textarea class="form-control" name="bahan[${$length1}][remarks]"></textarea></td>
                                <td>
                                    <input type="hidden" class="hiddenId" value="${element.product_id}">
                                    <a class="addStock openModal" data-toggle="modal" data-target="#exampleModal">
                                        <iconify-icon icon="icon-park-outline:add" width="20" height="20" style="color: #18002D;"></iconify-icon>
                                    </a>
                                </td>
                            </tr>
                        `);
                        $length1++;
                    });
                    $('#table2').dataTable();

                    $length2 = 1;
                    $('#table3 tbody').html('');
                    $('#table3').DataTable().destroy();
                    data.material_d.forEach((element, index) => {
                        $('#table3 tbody').append(`
                            <tr>
                                <td>
                                    <input type='hidden' value='${element.product_id}' class="stock_code" name="wip[${$length2}][product_id]"/>
                                    ${element.products ? element.products.item_code : ''}
                                </td>
                                <td>${element.products ? element.products.description : ''}</td>
                                <td>${element.products ? element.products.base_uom : ''}</td>
                                <td>${element.available_qty}</td>
                                <td>${element.request_qty}</td>
                                <td>
                                    <input type='hidden' class="previous_qty" value='${element.manage_transfer && element.manage_transfer.manage_transfer_product_c[0] ? element.manage_transfer.manage_transfer_product_c[0].transfer_qty : 0}' name="wip[${$length}][previous_qty]"/>
                                    ${element.manage_transfer && element.manage_transfer.manage_transfer_product_c[0] ? element.manage_transfer.manage_transfer_product_c[0].transfer_qty : 0}
                                </td>
                                <td>
                                    <input type='hidden' class="balance_qty" value='${element.manage_transfer && element.manage_transfer.manage_transfer_product_c[0] ? +element.request_qty - +element.manage_transfer.manage_transfer_product_c[0].transfer_qty : 0}' name="wip[${$length}][balance_qty]"/>
                                    ${element.manage_transfer && element.manage_transfer.manage_transfer_product_c[0] ? +element.request_qty - +element.manage_transfer.manage_transfer_product_c[0].transfer_qty : 0}
                                </td>
                                <td><input type="number" readonly class="form-control transfer_qty" name="wip[${$length}][transfer_qty]" value="0"/></td>
                                <td>
                                    <input type='hidden' class="remaining_qty" value='${element.manage_transfer && element.manage_transfer.manage_transfer_product_c[0] ? +element.request_qty - +element.manage_transfer.manage_transfer_product_c[0].transfer_qty : 0}' name="wip[${$length}][remaining_qty]"/>
                                    ${element.manage_transfer && element.manage_transfer.manage_transfer_product_c[0] ? +element.request_qty - +element.manage_transfer.manage_transfer_product_c[0].transfer_qty : 0}
                                </td>
                                <td><textarea class="form-control" name="wip[${$length2}][remarks]"></textarea></td>
                                <td>
                                    <input type="hidden" class="hiddenId" value="${element.product_id}">
                                    <a class="addStock openModal" data-toggle="modal" data-target="#exampleModal">
                                        <iconify-icon icon="icon-park-outline:add" width="20" height="20" style="color: #18002D;"></iconify-icon>
                                    </a>
                                </td>
                            </tr>
                        `);
                        $length2++;
                    });
                    $('#table3').dataTable();
                }
            });
        });

        $('#saveForm').on('click', function() {
            let array = [];
            $('.hiddenId').each(function() {
                let storedData = sessionStorage.getItem(`modalData${$(this).val()}`);
                if (storedData == null) {
                    let tableId = 1;
                    if ($(this).closest('table').hasClass('table2')) {
                        tableId = 2;
                    } else if ($(this).closest('table').hasClass('table3')) {
                        tableId = 3;
                    }
                    storedData = `{"hiddenId":"${$(this).val()}", "tableId": "${tableId}"}`;
                }
                array.push(JSON.parse(storedData));
            });

            array = array.reduce(function(acc, val) {
                return acc.concat(val);
            }, []);

            $('#storedData').val(JSON.stringify(array));
            $(this).closest('form').submit();
        });

        $(document).on('change', '.location', function() {
            var value = $(this).val();
            var $this = $(this).closest('tr').find('.available_qty');
            var area_id = $(this).find('option:selected').attr('data-area-id');
            var shelf_id = $(this).find('option:selected').attr('data-shelf-id');
            var level_id = $(this).find('option:selected').attr('data-level-id');
            var product_id = $('.product_id').val();

            var $currentRow = $(this).closest('tr');
            var dropdownValueSelected = false;

            // Check if dropdown value is selected in any row
            $('.location').not(this).each(function() {
                if ($(this).val() === value) {
                    dropdownValueSelected = true;
                    return false; // Break out of the loop if a match is found
                }
            });

            if (!dropdownValueSelected) {
                $.ajax({
                    url: '{{ route('get.available_qty') }}',
                    method: 'GET',
                    data: {
                        area_id: area_id,
                        shelf_id: shelf_id,
                        level_id: level_id,
                        product_id: product_id
                    },
                    success: function(response) {
                        $this.val(`${response.used_qty ? response.used_qty : 0}`);
                    }
                });
            } else {
                // Dropdown value is selected in another row, set available qty to 0
                $this.val('0');
            }
        });
    </script>
@endPush
