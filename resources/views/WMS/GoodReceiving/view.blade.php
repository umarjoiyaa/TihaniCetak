@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Good Receiving View</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Purchase Order No</label>
                                <input type="text" value="{{ $good_receiving->po_no }}" readonly class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Date</label>
                            <input type="text" name="date" value="{{ $good_receiving->date }}"
                                class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                        </div>
                        <div class="col-md-4">
                            <label for="">Creditor Name</label>
                            <input type="text" value="{{ $good_receiving->creditor_name }}" readonly
                                class="form-control">
                        </div>
                        <div class="col-md-3"></div>
                    </div>


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
                                    <td>{{ $good_receiving_product->item_code }}</td>
                                    <td>{{ $good_receiving_product->description }}</td>
                                    <td>{{ $good_receiving_product->uom }}</td>
                                    <td>{{ $good_receiving_product->quantity }}</td>
                                    <td><input type="number" value="{{ $good_receiving_product->receiving_qty ?? 0 }}"
                                            readonly class="form-control receiving_qty">
                                    </td>
                                    <td>{{ $good_receiving_product->delivery_date }}</td>
                                    <td>
                                        <input type="hidden" class="hiddenId" value="{{ $good_receiving_product->id }}">
                                        <button type="button" class="btn btn-primary openModal" data-toggle="modal"
                                            data-target="#exampleModal">+</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
                    <br>
                    <div class="table-responsive">
                        <table class="table datatable1 w-100">
                            <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>UOM</th>
                                    <th>Receive Quantity</th>
                                    <th>Remarks</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $('input, select').attr('disabled', 'disabled');
        $('.datatable').DataTable();
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
                    'uom': element.uom,
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
                        optionsHtml += `<option
                                                                                                    data-area-id="${location.area_id}"
                                                                                                    data-shelf-id="${location.shelf_id}"
                                                                                                    data-level-id="${location.level_id}"
                                                                                                    value="${location.area_id}->${location.shelf_id}->${location.level_id}" ${selected}>
                                                                                                    ${location.area.name}->${location.shelf.name}->${location.level.name}
                                                                                                </option>`;
                    });
                    $('#myTable').append(`<tr>
                                                                                                <td>
                                                                                                <select class="form-control location">
                                                                                                    ${optionsHtml}
                                                                                                </select>
                                                                                                </td>
                                                                                                <td><input type="text" readonly class="form-control uom" value="${element.uom}"></td>
                                                                                                <td><input type="number" class="form-control receive_qty" value="${element.receive_qty}"></td>
                                                                                                <td><textarea class="form-control remarks">${element.remarks}</textarea></td>
                                                                                                <td><button class="btn btn-primary remarks_btn">Print<i class="fas fa-print"></i></button></td>
                                                                                            </tr>`);
                });
            } else {
                let optionsHtml = '';
                locations.forEach(location => {
                    optionsHtml += `<option
                                                                                                    data-area-id="${location.area_id}"
                                                                                                    data-shelf-id="${location.shelf_id}"
                                                                                                    data-level-id="${location.level_id}"
                                                                                                    value="${location.area_id}->${location.shelf_id}->${location.level_id}">
                                                                                                    ${location.area.name}->${location.shelf.name}->${location.level.name}
                                                                                                </option>`;
                });
                let defaultRow = `
                                                                                        <tr>
                                                                                            <td>
                                                                                                <select class="form-control location">
                                                                                                    ${optionsHtml}
                                                                                                </select>
                                                                                            </td>
                                                                                            <td><input type="text" readonly class="form-control uom"></td>
                                                                                            <td><input type="number" class="form-control receive_qty"></td>
                                                                                            <td><textarea class="form-control remarks"></textarea></td>
                                                                                            <td><button class="btn btn-primary remarks_btn">Print<i class="fas fa-print"></i></button></td>
                                                                                        </tr>`;
                $('#myTable').html(defaultRow);
            }

            let item_code_text = $(this).closest('tr').find('td:eq(1)').text();
            let description_text = $(this).closest('tr').find('td:eq(2)').text();
            let quantity_text = $(this).closest('tr').find('td:eq(4)').text();
            $('.item_code_text').text(item_code_text);
            $('.description_text').text(description_text);
            $('.quantity_text').text(quantity_text);
            $('.receive_qty').trigger('keyup');
            $('input, select, textarea').attr('disabled', 'disabled');
            $('.datatable1').DataTable();
        });

        $(document).on('keyup', '.receive_qty', function() {
            let total = 0;
            $('#myTable .receive_qty').each(function() {
                total += +$(this).val();
            });
            $('.receive_quantity_text').text(total);
        });
    </script>
@endpush
