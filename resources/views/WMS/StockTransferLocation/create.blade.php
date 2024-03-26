@extends('layouts.app')
@section('content')
    <form action="{{ route('stock_transfer_location.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Transfer Location</h3>
                    </div>
                    <div class="card-body">
                        <div class="card" style="background:#f6f7f7;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Ref No</div>
                                            <input type="text" name="ref_no" readonly
                                                value="TCSB/TL/{{ $year }}/{{ $count }}"
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
                                            <input type="text" value="{{ Auth::user()->user_name }}" readonly
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Description</div>
                                            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Previous Location </div>
                                            <select name="previous_location" id="previous_location" class="form-select">
                                                <option value="" selected disabled>Select Previous Location</option>
                                                @foreach ($locations as $location)
                                                    <option data-area-id="{{ $location->area->id }}"
                                                        data-shelf-id="{{ $location->shelf->id }}"
                                                        data-level-id="{{ $location->level->id }}"
                                                        value="{{ $location->area->name }}->{{ $location->shelf->name }}->{{ $location->level->name }}">
                                                        {{ $location->area->name }}->{{ $location->shelf->name }}->{{ $location->level->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">New Location </div>
                                            <select name="new_location" id="new_location" class="form-select">
                                                <option value="" selected disabled>Select New Location</option>
                                                @foreach ($locations as $location)
                                                    <option data-area-id="{{ $location->area->id }}"
                                                        data-shelf-id="{{ $location->shelf->id }}"
                                                        data-level-id="{{ $location->level->id }}"
                                                        value="{{ $location->area->name }}->{{ $location->shelf->name }}->{{ $location->level->name }}">
                                                        {{ $location->area->name }}->{{ $location->shelf->name }}->{{ $location->level->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary float-right mb-2" id="additem"
                                            class="btn btn-primary" disabled data-toggle="modal"
                                            data-target="#exampleModal2">+ Add
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
                                                        <td>Available Qty</td>
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
                                        <input type="hidden" name="previous_area_id" id="previous_area_id">
                                        <input type="hidden" name="previous_shelf_id" id="previous_shelf_id">
                                        <input type="hidden" name="previous_level_id" id="previous_level_id">
                                        <input type="hidden" name="new_area_id" id="new_area_id">
                                        <input type="hidden" name="new_shelf_id" id="new_shelf_id">
                                        <input type="hidden" name="new_level_id" id="new_level_id">
                                        <button class="btn btn-primary float-right" type="button"
                                            id="saveForm">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('stock_transfer_location') }}" class="">Back to list</a>
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
                                    <th>Available Qty</th>
                                </tr>
                            </thead>
                            <tbody id="productsTable">
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

        $('#previous_location,#new_location').on('change', function() {
            $('#Table').DataTable().destroy();
            $('#Table tbody').html('');
            $previous = $('#previous_location').val();
            $new = $('#new_location').val();
            if ($previous == null || $new == null) {
                $('#additem').attr('disabled', 'disabled');
            } else {
                $('#additem').removeAttr('disabled');
            }
            $('#Table').DataTable();
        });

        $('#saveForm').on('click', function() {
            if ($('#previous_location').val() == $('#new_location').val()) {
                swal({
                    title: "",
                    text: "Previous and New Location should be unique!",
                    type: "warning",
                    buttonsStyling: false,
                    confirmButtonText: "Okay!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                    }
                });
            } else {
                let previous_area_id = $('#previous_location option:selected').attr('data-area-id');
                let previous_shelf_id = $('#previous_location option:selected').attr('data-shelf-id');
                let previous_level_id = $('#previous_location option:selected').attr('data-level-id');

                let new_area_id = $('#new_location option:selected').attr('data-area-id');
                let new_shelf_id = $('#new_location option:selected').attr('data-shelf-id');
                let new_level_id = $('#new_location option:selected').attr('data-level-id');

                $('#previous_area_id').val(previous_area_id);
                $('#previous_shelf_id').val(previous_shelf_id);
                $('#previous_level_id').val(previous_level_id);

                $('#new_area_id').val(new_area_id);
                $('#new_shelf_id').val(new_shelf_id);
                $('#new_level_id').val(new_level_id);

                $(this).closest('form').submit();
            }
        });

        //important work

        $('#additem').click(function() {
            let area_id = $('#previous_location option:selected').attr('data-area-id');
            let shelf_id = $('#previous_location option:selected').attr('data-shelf-id');
            let level_id = $('#previous_location option:selected').attr('data-level-id');
            $.ajax({
                url: '{{ route('stock_transfer_location.products') }}',
                method: 'GET',
                data: {
                    area_id: area_id,
                    shelf_id: shelf_id,
                    level_id: level_id
                },
                success: function(response) {
                    $('.datatable').DataTable().destroy();
                    $('#productsTable').html('');
                    response.forEach(element => {
                        $('#productsTable').append(`<tr>
                            <td><input type="checkbox"><input type="hidden" value="${element.product.id}" class="product_id"></td>
                            <td>${element.product.item_code}</td>
                            <td>${element.product.description}</td>
                            <td>${element.product.group}</td>
                            <td>${element.product.base_uom}</td>
                            <td>${element.used_qty}</td>
                        </tr>`);
                    });
                    $(".datatable tbody").find(".product_id").each(function() {
                        let this1 = $(this);
                        $("#Table tbody").find(".product_id").each(function() {
                            let this2 = $(this);
                            if (this1.val() == this2.val()) {
                                this1.closest('tr').remove();
                            }
                        });
                    });
                    $('.datatable').DataTable();
                }
            });
        });

        $(document).on('keyup change', '.qty', function() {
            if($(this).val() > $(this).closest('tr').find('.available_qty').val()){
                $(this).val($(this).closest('tr').find('.available_qty').val());
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
                var available_qty = checkedRow.find('td:eq(5)').text();

                var newRow = $(
                    `<tr>
                                                                                                            <td><input type='hidden' value='${product_id}' class="product_id" name="products[${$length}][product_id]"/><input type='hidden' value='${group}' class="group" name="products[${$length}][group]"/><input type="hidden" name="products[${$length}][item_code]" value="${item_code}"/>${item_code}</td>
                                                                                                            <td><input type='hidden' value='${description}' name="products[${$length}][description]"/>${description}</td>
                                                                                                            <td><input type='hidden' value='${uom}' name="products[${$length}][uom]"/>${uom}</td>
                                                                                                            <td><input type='hidden' class="availale_qty" value='${available_qty}' name="products[${$length}][available_qty]"/>${available_qty}</td>
                                                                                                            <td><input type='number' class="form-control qty" value='${available_qty}' name="products[${$length}][qty]"/></td>
                                                                                                            <td><a class="removeRow"><iconify-icon icon="fluent:delete-dismiss-24-filled" width="20" height="20" style="color: red;"></iconify-icon><a></td></tr>`
                );

                $("#Table tbody").append(newRow);

                checkedRow.remove();

            });
            $('#Table').dataTable();
            $('.datatable').dataTable();
        });

        $(document).on('click', '.removeRow', function() {
            $('#Table').DataTable().destroy();
            $('.datatable').DataTable().destroy();
            $(this).closest('tr').remove();
            $('.datatable').dataTable();
            $('#Table').dataTable();
        });
        //end important work
    </script>
@endpush
