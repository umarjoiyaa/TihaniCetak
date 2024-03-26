@extends('layouts.app')
@section('content')
    <form action="{{ route('stock_transfer.receive.update', $stock_transfer->id) }}" method="POST">
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
                                                value="{{ $stock_transfer->ref_no }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Date</div>
                                            <input type="text" name="date" value="{{ $stock_transfer->date }}"
                                                class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                                placeholder="dd-mm-yyyy">
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
                                            <input type="text" value="{{ $stock_transfer->sale_order->order_no }}"
                                                readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Description</div>
                                            <textarea name="description" class="form-control">{{ $stock_transfer->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Do No </div>
                                            <input type="text" name="do_no" value="{{ $stock_transfer->do_no }}"
                                                class="form-control">
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
                                                    @foreach ($stock_products as $key => $stock_product)
                                                        <tr>
                                                            <td><input type='hidden'
                                                                    value='{{ $stock_product->product_id }}'
                                                                    class="product_id"
                                                                    name="products[{{ $key }}][product_id]" /><input
                                                                    type='hidden'
                                                                    value='{{ $stock_product->products->group }}'
                                                                    class="group"
                                                                    name="products[{{ $key }}][group]" /><input
                                                                    type="hidden"
                                                                    name="products[{{ $key }}][item_code]"
                                                                    value="{{ $stock_product->products->item_code }}" />{{ $stock_product->products->item_code }}
                                                            </td>
                                                            <td><input type='hidden'
                                                                    value='{{ $stock_product->products->description }}'
                                                                    name="products[{{ $key }}][description]" />{{ $stock_product->products->description }}
                                                            </td>
                                                            <td><input type='hidden'
                                                                    value='{{ $stock_product->products->base_uom }}'
                                                                    name="products[{{ $key }}][uom]" />{{ $stock_product->products->base_uom }}
                                                            </td>
                                                            <td><input type='number' class="form-control qty"
                                                                    value='{{ $stock_product->qty }}' readonly
                                                                    name="products[{{ $key }}][qty]" /></td>
                                                            <td><input type="hidden" class="hiddenId"
                                                                    value="{{ $stock_product->product_id }}"><button
                                                                    type="button" class="btn btn-primary openModal"
                                                                    data-toggle="modal"
                                                                    data-target="#exampleModal">+</button></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary float-right" type="submit">Receive</button>
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
        let locations = [];
        $(document).ready(function() {
            sessionStorage.clear();
            var detailsb = @json($stock_locations);
            detailsb.forEach(element => {
                let data = sessionStorage.getItem(`modalData${element.product_id}`);
                if (!data) {
                    data = [];
                } else {
                    data = JSON.parse(data);
                }
                let rowData = {};
                rowData['location'] = `${element.area_id}->${element.shelf_id}->${element.level_id}`;
                rowData['area'] = element.area_id;
                rowData['shelf'] = element.shelf_id;
                rowData['level'] = element.level_id;
                rowData['qty'] = element.qty;
                rowData['hiddenId'] = element.product_id;
                data.push(rowData);
                sessionStorage.setItem(`modalData${element.product_id}`, JSON.stringify(data));
            });
            locations = @json($locations);
            $('input, select, textarea').attr('disabled', 'disabled');
            $('input[type="hidden"]').removeAttr('disabled');
            $('#Table').DataTable();
            $('.datatable').DataTable();
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
            $('table input, select, textarea').attr('disabled', 'disabled');
            $('input[type="hidden"]').removeAttr('disabled');
            $('.datatable1').DataTable();
        });

        $(document).on('keyup change', '.qty', function() {
            let total = 0;
            $('#myTable .qty').each(function() {
                total += +$(this).val();
            });
            $('.quantity_text').text(total);
        });
    </script>
@endpush
