@extends('layouts.app')
@section('content')
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
                                        <input type="text" name="date" value="{{ $manage_transfer->date }}"
                                            class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                            placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Ref No</div>
                                        <input type="text" class="form-control"
                                            value="{{ $manage_transfer->materialRequest->ref_no }}" readonly>
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
                                        <input type="text" readonly id="sale_order" class="form-control"
                                            value="{{ $manage_transfer->materialRequest->sale_order->order_no ?? $manage_transfer->materialRequest->sale_order_other }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Description</div>
                                        <input type="text" id="description" readonly class="form-control"
                                            value="{{ $manage_transfer->materialRequest->description }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Diminta Oleh</div>
                                        <input type="text" id="oleh" readonly class="form-control"
                                            value="{{ $manage_transfer->materialRequest->user->user_name }}">
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
                                                @foreach ($products_a as $key => $product_a)
                                                    @php
                                                        $request = App\Models\MaterialRequestB::where(
                                                            'material_id',
                                                            '=',
                                                            $manage_transfer->id,
                                                        )
                                                            ->where('product_id', '=', $product_a->product_id)
                                                            ->with('uoms')
                                                            ->first();
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <input type='hidden' value='{{ $product_a->product_id }}'
                                                                class="stock_code"
                                                                name="kertas[{{ $key }}][product_id]" />
                                                            {{ $product_a->products->item_code }}
                                                        </td>
                                                        <td>{{ $product_a->products->description }}</td>
                                                        <td>{{ $request->grammage }}</td>
                                                        <td>{{ $request->saiz }}</td>
                                                        <td>{{ $product_a->products->base_uom }}</td>
                                                        <td>{{ $request->available_qty }}</td>
                                                        <td>{{ $request->uoms->name ?? '' }}</td>
                                                        <td>{{ $request->request_qty }}</td>
                                                        <td>
                                                            <input type='hidden' class="previous_qty"
                                                                value='{{ $product_a->previous_qty }}'
                                                                name="kertas[{{ $key }}][previous_qty]" />
                                                            {{ $product_a->previous_qty }}
                                                        </td>
                                                        <td>
                                                            <input type='hidden' class="balance_qty"
                                                                value='{{ $product_a->balance_qty }}'
                                                                name="kertas[{{ $key }}][balance_qty]" />
                                                            {{ $product_a->balance_qty }}
                                                        </td>
                                                        <td><input type="number" readonly class="form-control transfer_qty"
                                                                name="kertas[{{ $key }}][transfer_qty]"
                                                                value="0" /></td>
                                                        <td>
                                                            <input type='hidden' class="remaining_qty"
                                                                value='{{ $product_a->remaining_qty }}'
                                                                name="kertas[{{ $key }}][remaining_qty]" />
                                                            {{ $product_a->remaining_qty }}
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="kertas[{{ $key }}][remarks]">{{ $product_a->remarks }}</textarea>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" class="hiddenId"
                                                                value="{{ $product_a->product_id }}">
                                                            <a class="addStock openModal" data-toggle="modal"
                                                                data-target="#exampleModal">
                                                                <iconify-icon icon="icon-park-outline:add" width="20"
                                                                    height="20" style="color: #18002D;"></iconify-icon>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
                                                @foreach ($products_b as $key => $product_b)
                                                    @php
                                                        $request1 = App\Models\MaterialRequestC::where(
                                                            'material_id',
                                                            '=',
                                                            $manage_transfer->id,
                                                        )
                                                            ->where('product_id', '=', $product_b->product_id)
                                                            ->first();
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <input type='hidden' value='{{ $product_b->product_id }}'
                                                                class="stock_code"
                                                                name="bahan[{{ $key }}][product_id]" />
                                                            {{ $product_b->products->item_code }}
                                                        </td>
                                                        <td>{{ $product_b->products->description }}</td>
                                                        <td>{{ $product_b->products->base_uom }}</td>
                                                        <td>{{ $request1->available_qty }}</td>
                                                        <td>{{ $request1->request_qty }}</td>
                                                        <td>
                                                            <input type='hidden' class="previous_qty"
                                                                value='{{ $product_b->previous_qty }}'
                                                                name="bahan[{{ $key }}][previous_qty]" />
                                                            {{ $product_b->previous_qty }}
                                                        </td>
                                                        <td>
                                                            <input type='hidden' class="balance_qty"
                                                                value='{{ $product_b->balance_qty }}'
                                                                name="bahan[{{ $key }}][balance_qty]" />
                                                            {{ $product_b->balance_qty }}
                                                        </td>
                                                        <td><input type="number" readonly
                                                                class="form-control transfer_qty"
                                                                name="bahan[{{ $key }}][transfer_qty]"
                                                                value="0" /></td>
                                                        <td>
                                                            <input type='hidden' class="remaining_qty"
                                                                value='{{ $product_b->remaining_qty }}'
                                                                name="bahan[{{ $key }}][remaining_qty]" />
                                                            {{ $product_b->remaining_qty }}
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="bahan[{{ $key }}][remarks]">{{ $product_b->remarks }}</textarea>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" class="hiddenId"
                                                                value="{{ $product_b->product_id }}">
                                                            <a class="addStock openModal" data-toggle="modal"
                                                                data-target="#exampleModal">
                                                                <iconify-icon icon="icon-park-outline:add" width="20"
                                                                    height="20" style="color: #18002D;"></iconify-icon>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
                                                @foreach ($products_c as $key => $product_c)
                                                    @php
                                                        $request2 = App\Models\MaterialRequestD::where(
                                                            'material_id',
                                                            '=',
                                                            $manage_transfer->id,
                                                        )
                                                            ->where('product_id', '=', $product_c->product_id)
                                                            ->first();
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <input type='hidden' value='{{ $product_c->product_id }}'
                                                                class="stock_code"
                                                                name="wip[{{ $key }}][product_id]" />
                                                            {{ $product_c->products->item_code }}
                                                        </td>
                                                        <td>{{ $product_c->products->description }}</td>
                                                        <td>{{ $product_c->products->base_uom }}</td>
                                                        <td>{{ $request2->available_qty }}</td>
                                                        <td>{{ $request2->request_qty }}</td>
                                                        <td>
                                                            <input type='hidden' class="previous_qty"
                                                                value='{{ $product_c->previous_qty }}'
                                                                name="wip[{{ $key }}][previous_qty]" />
                                                            {{ $product_c->previous_qty }}
                                                        </td>
                                                        <td>
                                                            <input type='hidden' class="balance_qty"
                                                                value='{{ $product_c->balance_qty }}'
                                                                name="wip[{{ $key }}][balance_qty]" />
                                                            {{ $product_c->balance_qty }}
                                                        </td>
                                                        <td><input type="number" readonly
                                                                class="form-control transfer_qty"
                                                                name="wip[{{ $key }}][transfer_qty]"
                                                                value="0" /></td>
                                                        <td>
                                                            <input type='hidden' class="remaining_qty"
                                                                value='{{ $product_c->remaining_qty }}'
                                                                name="wip[{{ $key }}][remaining_qty]" />
                                                            {{ $product_c->remaining_qty }}
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="wip[{{ $key }}][remarks]">{{ $product_c->remarks }}</textarea>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" class="hiddenId"
                                                                value="{{ $product_c->product_id }}">
                                                            <a class="addStock openModal" data-toggle="modal"
                                                                data-target="#exampleModal">
                                                                <iconify-icon icon="icon-park-outline:add" width="20"
                                                                    height="20" style="color: #18002D;"></iconify-icon>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <h3><b>Received By</b></h3>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Username</th>
                                                <th>Desgination</th>
                                                <th>Department</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $manage_transfer->received_by_date }}
                                                </td>
                                                <td>{{ $manage_transfer->received_by_user }}
                                                </td>
                                                <td>{{ $manage_transfer->received_by_designation }}
                                                </td>
                                                <td>{{ $manage_transfer->received_by_department }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
        $('input, select, textarea').attr('disabled', 'disabled');
        $('#table1').dataTable();
        $('#table2').dataTable();
        $('#table3').dataTable();

        let locations = [];
        $(document).ready(function() {
            sessionStorage.clear();
            var details_a = @json($locations_a);
            details_a.forEach(element => {
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
                rowData['transfer_qty'] = element.transfer_qty;
                rowData['available_qty'] = element.available_qty;
                rowData['hiddenId'] = element.product_id;
                rowData['tableId'] = 1;
                data.push(rowData);
                sessionStorage.setItem(`modalData${element.product_id}`, JSON.stringify(data));
            });
            var details_b = @json($locations_b);
            details_b.forEach(element => {
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
                rowData['transfer_qty'] = element.transfer_qty;
                rowData['available_qty'] = element.available_qty;
                rowData['hiddenId'] = element.product_id;
                rowData['tableId'] = 2;
                data.push(rowData);
                sessionStorage.setItem(`modalData${element.product_id}`, JSON.stringify(data));
            });
            var details_c = @json($locations_c);
            details_c.forEach(element => {
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
                rowData['transfer_qty'] = element.transfer_qty;
                rowData['available_qty'] = element.available_qty;
                rowData['hiddenId'] = element.product_id;
                rowData['tableId'] = 3;
                data.push(rowData);
                sessionStorage.setItem(`modalData${element.product_id}`, JSON.stringify(data));
            });
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
                                                                                                                                                                                                                                                                                                                                                                        </tr>`;
                $('#myTable').html(defaultRow);
            }

            let item_text = $(this).closest('tr').find('td:eq(0)').text();
            let quantity_text = $(this).closest('tr').find('.balance_qty').val();
            $('.item_text').text(item_text);
            $('.total_quantity_text').text(quantity_text);
            $('.location').trigger('change');
            $('.transfer_qty1').trigger('change');
            $('input, select, textarea').attr('disabled', 'disabled');
            $('.datatable1').DataTable();
        });

        $(document).on('keyup change', '.transfer_qty1', function() {
            let total = 0;
            $('#myTable .transfer_qty1').each(function() {
                total += +$(this).val();
            });
            $('.total_transfer_quantity_text').text(total);
        });
    </script>
@endPush
