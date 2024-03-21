@extends('layouts.app')

@section('content')
    <form action="{{ route('stock_in.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Stock In </h3>
                    </div>
                    <div class="card-body">
                        <div class="card" style="background:#f6f7f7;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Ref No</div>
                                            <input type="text" name="ref_no" readonly
                                                value="TCSB/SI/{{ $year }}/{{ $count }}"
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
                                            <div class="label">Sales Order No.</div>
                                            <select name="sale_order" id="sale_order" class="form-control">
                                                <option value="" selected disabled>Select a Sale Order</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Transfer By</div>
                                            <select name="transfer_by" class="form-select">
                                                <option value="" disabled selected>Select User</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}" @selected(old('transfer_by') == $user->id)>
                                                        {{ $user->full_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Receive By (Store)</div>
                                            <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Category</div>
                                            <select name="category" class="form-select">
                                                <option value="" disabled selected>Select Category</option>
                                                <option value="Production" @selected(old('category') == 'Production')>Production</option>
                                                <option value="Subcon" @selected(old('category') == 'Subcon')>Subcon</option>
                                                <option value="Customers" @selected(old('category') == 'Customers')>Customers</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Description</div>
                                            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
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
                        <a href="{{ route('stock_in') }}" class="">Back to list</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Stock In</h5>
                    <input type="hidden" class="product_id">
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

        $('#Table').DataTable();
        $('.datatable').DataTable();

        function addRow(button) {
            if ($.fn.DataTable.isDataTable('.datatable1')) {
                $('.datatable1').DataTable().destroy();
            }
            var row = button.parentNode.parentNode.cloneNode(true);
            button.parentNode.parentNode.parentNode.insertBefore(row, button.parentNode.parentNode.nextSibling);
            $('.datatable1').DataTable();
            $('.qty').trigger('keyup');
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
        $('.qty').trigger('keyup');
        $('.datatable1').DataTable();
    });

    $('#saveModal').on('click', function() {
        $('#exampleModal').modal('hide');
        let hiddenId = $('.product_id').val();
        let data = [];
        $('#myTable tr').each(function() {
            let rowData = {};
            rowData['location'] = $(this).find('.location').val();
            rowData['area'] = $(this).find('.location option:selected').attr('data-area-id');
            rowData['shelf'] = $(this).find('.location option:selected').attr('data-shelf-id');
            rowData['level'] = $(this).find('.location option:selected').attr('data-level-id');
            rowData['qty'] = $(this).find('.qty').val();
            rowData['hiddenId'] = hiddenId;
            data.push(rowData);
        });
        sessionStorage.setItem(`modalData${hiddenId}`, JSON.stringify(data));
        $('#Table tbody tr').each(function() {
            if ($(this).find('.hiddenId').val() == hiddenId) {
                let total_qty = $('.quantity_text').text();
                $(this).find('.qty').val(total_qty);
            }
        });
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
                                                <td><input type='number' class="form-control qty" value='0' readonly name="products[${$length}][qty]"/></td>
                                                <td><input type="hidden" class="hiddenId" value="${product_id}"><button type="button" class="btn btn-primary openModal" data-toggle="modal" data-target="#exampleModal">+</button></td></tr>`
                );

                $("#Table tbody").append(newRow);

                checkedRow.remove();

            });
            $('#Table').dataTable();
            $('.datatable').dataTable();
        });
    </script>
@endpush
