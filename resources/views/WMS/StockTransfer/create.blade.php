@extends('layouts.app')
@section('content')
    <form action="{{ route('stock_transfer.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Stock Transfer</h3>
                    </div>
                    <div class="card-body">
                        <div class="card" style="background:#f6f7f7;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Ref No</div>
                                            <input type="text" name="ref_no" readonly
                                                value="TCSB/ST/{{ $year }}/{{ $count }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Date</div>
                                            <input type="text" name="date"
                                                value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" class="form-control"
                                                id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Transfer By</div>
                                            <input type="text" value="{{ Auth::user()->user_name }}" readonly
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Sales Order No.</div>
                                            <select name="sale_order" id="sale_order" class="form-control">
                                                <option value="" selected disabled>Select a Sale Order</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Description</div>
                                            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Do No </div>
                                            <input type="text" name="do_no" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>Transfer To:</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" id="customer" name="customer">
                                            </div>
                                            <div class="col-md-3">
                                                <h5>Customer</h5>
                                            </div>
                                            <div class="col-md-8">
                                                <select name="customer_id" id="customer_id" class="form-select" disabled>
                                                    <option value="" selected disabled>Select Customer</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6 mt-3">
                                        <div class="row">
                                            <div class="col-md-1"><input type="checkbox" id="supplier" name="supplier">
                                            </div>
                                            <div class="col-md-3">
                                                <h5>Subcon</h5>
                                            </div>
                                            <div class="col-md-8">
                                                <select name="supplier_id" id="supplier_id" class="form-select" disabled>
                                                    <option value="" selected disabled>Select Supplier</option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary float-right mb-2" id="additem"
                                            class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">+ Add
                                            Product</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table mt-2" id="Table">
                                                <thead>
                                                    <tr>
                                                        <td>Item Code</td>
                                                        <td>Description</td>
                                                        <td>UOM</td>
                                                        <td>Quantity</td>
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
                                        <input type="hidden" id="storedData" name="details">
                                        <button class="btn btn-primary float-right" type="button"
                                            id="saveForm">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('stock_transfer') }}" class="">Back to list</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Products</h5>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table datatable w-100">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Item Code</th>
                                    <th>Description</th>
                                    <th>Group</th>
                                    <th>UOM</th>
                                </tr>
                            </thead>
                            <tbody id="productsTable">
                                @foreach ($products as $product)
                                    <tr>
                                        <td><input type="checkbox" name="" id=""><input type="hidden"
                                                value="{{ $product->id }}" class="product_id"></td>
                                        <td>{{ $product->item_code }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->group }}</td>
                                        <td>{{ $product->base_uom }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="addrows">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Stock Transfer</h5>
                    <input type="hidden" class="product_ids">
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-between">
                        <div>Item Code: <span class="item_code_text"></span></div>
                        <div>Quantity: <span class="quantity_text"></span></div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div>Description: <span class="description_text"></span></div>
                        <div>UOM: <span class="uom_text"></span></div>
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

                    var otherOption = {
                        id: 'OTHERS',
                        order_no: 'OTHERS'
                    };
                    data.results.unshift(otherOption);
                    
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

        $("#customer").change(function() {
            if ($(this).is(":checked")) {
                $("#customer_id").prop("disabled", false);
            } else {
                $("#customer_id").prop("disabled", true);
                $("#customer_id").val("").trigger('change');
            }
        });

        $("#supplier").change(function() {
            if ($(this).is(":checked")) {
                $("#supplier_id").prop("disabled", false);
            } else {
                $("#supplier_id").prop("disabled", true);
                $("#supplier_id").val("").trigger('change');
            }
        });

        $('#Table').DataTable();
        $('.datatable').DataTable();

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
            $('.qty').trigger('keyup');
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
        $('.qty').trigger('keyup');
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
        let hiddenId = $(this).closest('tr').find('.hiddenId').val();
        $('.product_ids').val(hiddenId);
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
                                                                                                                                                                                                                                                                                                    <td><input type="number" class="form-control available_qty" readonly></td>
                                                                                                                                                                                                                                                                                                    <td><input type="number" class="form-control qty" value="${element.qty}"></td>
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
                                                                                                                                                                                                                                                                                                <td><input type="number" readonly class="form-control available_qty"></td>
                                                                                                                                                                                                                                                                                                <td><input type="number" class="form-control qty"></td>
                                                                                                                                                                                                                                                                                                <td><i class="fas fa-plus" onclick="addRow(this)"></i><i class="fas fa-minus ml-2" onclick="removeRow(this)"></i></td>
                                                                                                                                                                                                                                                                                            </tr>`;
            $('#myTable').html(defaultRow);
        }

        let item_code_text = $(this).closest('tr').find('td:eq(0)').text();
        let description_text = $(this).closest('tr').find('td:eq(1)').text();
        let uom_text = $(this).closest('tr').find('td:eq(2)').text();
        $('.item_code_text').text(item_code_text);
        $('.description_text').text(description_text);
        $('.uom_text').text(uom_text);
        $('.location').trigger('change');
        $('.qty').trigger('keyup');
        $('.datatable1').DataTable();
    });

    $('#saveModal').on('click', function() {
        var alertNeeded = false;

        $('#myTable tr').each(function() {
            var availableQty = parseFloat($(this).find('.available_qty').val());
            var qty = parseFloat($(this).find('.qty').val());

            if (availableQty < qty) {
                alertNeeded = true;
                return false;
            }
        });

        if (alertNeeded) {
            alert("available quantity must be greater or equals to transfer quantity.");
        } else {
            $('#exampleModal').modal('hide');
            let hiddenId = $('.product_ids').val();
            let data = [];
            $('#myTable tr').each(function() {
                let rowData = {};
                rowData['location'] = $(this).find('.location').val();
                rowData['area'] = $(this).find('.location option:selected').attr('data-area-id');
                rowData['shelf'] = $(this).find('.location option:selected').attr('data-shelf-id');
                rowData['level'] = $(this).find('.location option:selected').attr('data-level-id');
                rowData['qty'] = $(this).find('.qty').val();
                rowData['available_qty'] = $(this).find('.available_qty').val();
                rowData['hiddenId'] = hiddenId;
                data.push(rowData);
            });
            sessionStorage.removeItem(`modalData${hiddenId}`);
            sessionStorage.setItem(`modalData${hiddenId}`, JSON.stringify(data));
            $('#Table tbody tr').each(function() {
                if ($(this).find('.hiddenId').val() == hiddenId) {
                    let total_qty = $('.quantity_text').text();
                    $(this).find('.qty1').val(total_qty);
                }
            });
        }
    });

    $(document).on('keyup change', '.qty', function() {
        let total = 0;
        $('#myTable .qty').each(function() {
            total += +$(this).val();
        });
        $('.quantity_text').text(total);
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
        $('#storedData').val(JSON.stringify(array));
        $(this).closest('form').submit();
    });

    //important work
    $bool = true;

    $('#additem').click(function() {
        if ($bool) {
            $('.datatable').DataTable().destroy();
            $(".datatable tbody tr").find(".product_id").each(function() {
                let this1 = $(this);
                $("#Table tbody").find(".product_id").each(function() {
                    let this2 = $(this);
                    if (this1.val() == this2.val()) {
                        this1.closest('tr').remove();
                    }
                });
            });
            $('.datatable').dataTable();
            $bool = false;
        }
    });

    $('#addrows').click(function() {
        $('.datatable').DataTable().destroy();
        $('#Table').DataTable().destroy();

        $(".datatable tbody").find("input[type=checkbox]:checked").each(function() {
            $length = $("#Table tbody tr").length;

            var checkedRow = $(this).closest('tr');

            var product_id = checkedRow.find('.product_id').val();
            var item_code = checkedRow.find('td:eq(1)').text();
            var description = checkedRow.find('td:eq(2)').text();
            var group = checkedRow.find('td:eq(3)').text();
            var uom = checkedRow.find('td:eq(4)').text();

            var newRow = $(
                `<tr>
                                                                                                                    <td><input type='hidden' value='${product_id}' class="product_id" name="products[${$length}][product_id]"/><input type='hidden' value='${group}' class="group" name="products[${$length}][group]"/><input type="hidden" name="products[${$length}][item_code]" value="${item_code}"/>${item_code}</td>
                                                                                                                    <td><input type='hidden' value='${description}' name="products[${$length}][description]"/>${description}</td>
                                                                                                                    <td><input type='hidden' value='${uom}' name="products[${$length}][uom]"/>${uom}</td>
                                                                                                                    <td><input type='number' class="form-control qty1" value='0' readonly name="products[${$length}][qty]"/></td>
                                                                                                                    <td><input type="hidden" class="hiddenId" value="${product_id}"><button type="button" class="btn btn-primary openModal mr-2" data-toggle="modal" data-target="#exampleModal">+</button><button type="button" class="btn btn-danger removeRow">x</button></td></tr>`
            );

            $("#Table tbody").append(newRow);

            checkedRow.remove();

        });
        $('#Table').dataTable();
        $('.datatable').dataTable();
    });

    $(document).on('click', '.removeRow', function() {
        $('.datatable').DataTable().destroy();
        $('#Table').DataTable().destroy();

        var checkedRow = $(this).closest('tr');
        var product_id = checkedRow.find('.stock_code').val();
        var item_code = $(checkedRow).find('td:eq(0)').text();
        var description = $(checkedRow).find('td:eq(1)').text();
        var group = $(checkedRow).find('.group').val();
        var uom = $(checkedRow).find('td:eq(2)').text();

        $(".datatable tbody").append(
            `<tr><td><input type='checkbox'><input type="hidden" value="${product_id}" class="item_code"></td><td>${item_code}</td><td>${description}</td><td>${group}</td><td>${uom}</td></tr>`
        );
        $(this).closest('tr').remove();
        $('#Table').dataTable();
        $('.datatable').dataTable();
    });

    $(document).on('change', '.location', function() {
        var value = $(this).val();
        var $this = $(this).closest('tr').find('.available_qty');
        var area_id = $(this).find('option:selected').attr('data-area-id');
        var shelf_id = $(this).find('option:selected').attr('data-shelf-id');
        var level_id = $(this).find('option:selected').attr('data-level-id');
        var product_id = $('.product_ids').val();

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
@endpush
