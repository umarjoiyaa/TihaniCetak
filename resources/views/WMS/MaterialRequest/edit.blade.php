@extends('layouts.app')
@section('content')
    <form action="{{ route('material_request.update', $material_request->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3> Material Request</h3>
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
                                            <label for="">Tarikh</label>
                                            <input type="text" name="date" value="{{ $material_request->date }}"
                                                class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                                placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Ref No</div>
                                            <input type="text" name="ref_no" readonly
                                                value="{{ $material_request->ref_no }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Diminta Oleh</label>
                                            <input type="text" readonly value="{{ Auth::user()->full_name }}"
                                                id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Sales Order No.</div>
                                            <select name="sale_order" data-id="{{ $material_request->sale_order_id }}"
                                                id="sale_order" class="form-control">
                                                <option value="{{ $material_request->sale_order_id }}" selected
                                                    style="color: black; !important">
                                                    {{ $material_request->sale_order->order_no }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Discription</div>
                                            <textarea name="description" rows="1" class="form-control">{{ $material_request->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Location</div>
                                            <textarea name="location" rows="1" class="form-control">{{ $material_request->location }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Remarks</div>
                                            <textarea name="remarks" rows="1" class="form-control">{{ $material_request->remarks }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><b>B) PERMINTAAN KERTAS</b></h4>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-primary my-3" data-toggle="modal"
                                            data-target="#exampleModal" id="additem">Search</button>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table mt-2" id="Table1">
                                                <thead>
                                                    <tr>
                                                        <td>Stock code</td>
                                                        <td>Description</td>
                                                        <td>Grammage</td>
                                                        <td>Saiz</td>
                                                        <td>UOM</td>
                                                        <td>Avaliable Qty</td>
                                                        <td>UOM Request</td>
                                                        <td>Request Quantity</td>
                                                        <td>Remarks</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($detailbs as $key => $value)
                                                        <tr>
                                                            <td><input type='hidden' class="stock_code"
                                                                    value='{{ $value->stock_code }}'
                                                                    name="kertas[{{ $key + 1 }}][stock_code]" /><input
                                                                    type='hidden' value='{{ $value->group }}'
                                                                    class="group"
                                                                    name="kertas[{{ $key + 1 }}][group]" />{{ $value->stock_code }}
                                                            </td>
                                                            <td><input type='hidden' value='{{ $value->description }}'
                                                                    name="kertas[{{ $key + 1 }}][description]" />{{ $value->description }}
                                                            </td>
                                                            <td><input type='number' class="form-control"
                                                                    value='{{ $value->grammage }}'
                                                                    name="kertas[{{ $key + 1 }}][grammage]" /></td>
                                                            <td><input type='number' class="form-control"
                                                                    value='{{ $value->saiz }}'
                                                                    name="kertas[{{ $key + 1 }}][saiz]" /></td>
                                                            <td><input type='hidden' value='{{ $value->uom }}'
                                                                    name="kertas[{{ $key + 1 }}][uom]" />{{ $value->uom }}
                                                            </td>
                                                            <td><input type='hidden' value='{{ $value->available_qty }}'
                                                                    name="kertas[{{ $key + 1 }}][available_qty]"
                                                                    class="available_qty" />{{ $value->available_qty }}
                                                            </td>
                                                            <td><select class="form-control"
                                                                    name="kertas[{{ $key + 1 }}][uom_request]">
                                                                    @foreach ($uoms as $uom)
                                                                        <option value="{{ $uom->id }}"
                                                                            @selected($value->uom_request == $uom->id)>
                                                                            {{ $uom->name }}</option>
                                                                    @endforeach
                                                                </select></td>
                                                            <td><input type='number' class="form-control request_qty"
                                                                    value='{{ $value->request_qty }}'
                                                                    name="kertas[{{ $key + 1 }}][request_qty]" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" name="kertas[{{ $key + 1 }}][remarks]">{{ $value->remarks }}</textarea>
                                                            </td>
                                                            <td><a class="removeRow"><iconify-icon
                                                                        icon="fluent:delete-dismiss-24-filled"
                                                                        width="20" height="20"
                                                                        style="color: red;"></iconify-icon><a></td>
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
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-primary my-3" data-toggle="modal"
                                            data-target="#exampleModal2" id="additem1">Search</button>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table mt-2" id="Table2">
                                                <thead>
                                                    <tr>
                                                        <td>Stock code</td>
                                                        <td>Description</td>
                                                        <td>UOM</td>
                                                        <td>Avaliable Qty</td>
                                                        <td>Request Quantity</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($detailcs as $key => $value)
                                                        <tr>
                                                            <td><input type='hidden' class="stock_code"
                                                                    value='{{ $value->stock_code }}'
                                                                    name="bahan[{{ $key + 1 }}][stock_code]" /><input
                                                                    type='hidden' value='{{ $value->group }}'
                                                                    class="group"
                                                                    name="bahan[{{ $key + 1 }}][group]" />{{ $value->stock_code }}
                                                            </td>
                                                            <td><input type='hidden' value='{{ $value->description }}'
                                                                    name="bahan[{{ $key + 1 }}][description]" />{{ $value->description }}
                                                            </td>
                                                            <td><input type='hidden' value='{{ $value->uom }}'
                                                                    name="bahan[{{ $key + 1 }}][uom]" />{{ $value->uom }}
                                                            </td>
                                                            <td><input type='hidden' value='{{ $value->available_qty }}'
                                                                    name="bahan[{{ $key + 1 }}][available_qty]"
                                                                    class="available_qty" />{{ $value->available_qty }}
                                                            </td>
                                                            <td><input type='number' class="form-control request_qty"
                                                                    value='{{ $value->request_qty }}'
                                                                    name="bahan[{{ $key + 1 }}][request_qty]" /></td>
                                                            <td><a class="removeRow1"><iconify-icon
                                                                        icon="fluent:delete-dismiss-24-filled"
                                                                        width="20" height="20"
                                                                        style="color: red;"></iconify-icon><a></td>
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
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-primary my-3" data-toggle="modal"
                                            data-target="#exampleModal3" id="additem2">Search</button>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table mt-2" id="Table3">
                                                <thead>
                                                    <tr>
                                                        <td>Stock code</td>
                                                        <td>Description</td>
                                                        <td>UOM</td>
                                                        <td>Avaliable Qty</td>
                                                        <td>Request Quantity</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($detailds as $key => $value)
                                                        <tr>
                                                            <td><input type='hidden' class="stock_code"
                                                                    value='{{ $value->stock_code }}'
                                                                    name="wip[{{ $key + 1 }}][stock_code]" /><input
                                                                    type='hidden' value='{{ $value->group }}'
                                                                    class="group"
                                                                    name="wip[{{ $key + 1 }}][group]" />{{ $value->stock_code }}
                                                            </td>
                                                            <td><input type='hidden' value='{{ $value->description }}'
                                                                    name="wip[{{ $key + 1 }}][description]" />{{ $value->description }}
                                                            </td>
                                                            <td><input type='hidden' value='{{ $value->uom }}'
                                                                    name="wip[{{ $key + 1 }}][uom]" />{{ $value->uom }}
                                                            </td>
                                                            <td><input type='hidden' value='{{ $value->available_qty }}'
                                                                    name="wip[{{ $key + 1 }}][available_qty]"
                                                                    class="available_qty" />{{ $value->available_qty }}
                                                            </td>
                                                            <td><input type='number' class="form-control request_qty"
                                                                    value='{{ $value->request_qty }}'
                                                                    name="wip[{{ $key + 1 }}][request_qty]" /></td>
                                                            <td><a class="removeRow2"><iconify-icon
                                                                        icon="fluent:delete-dismiss-24-filled"
                                                                        width="20" height="20"
                                                                        style="color: red;"></iconify-icon><a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('material_request') }}" class="">Back to list</a>
            </div>
        </div>




        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Products</h5>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table w-100" id="table1">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Stock Code</th>
                                        <th>Description</th>
                                        <th>Group</th>
                                        <th>UOM</th>
                                        <th>Avaliable quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>AA</td>
                                        <td>Item A</td>
                                        <td>Paper</td>
                                        <td>Unit</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>BB</td>
                                        <td>Item B</td>
                                        <td>Paper</td>
                                        <td>Unit</td>
                                        <td>200</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="addrows">Add</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Products</h5>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table w-100" id="table2">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Stock Code</th>
                                        <th>Description</th>
                                        <th>Group</th>
                                        <th>UOM</th>
                                        <th>Avaliable quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>AA</td>
                                        <td>Item A</td>
                                        <td>Paper</td>
                                        <td>Unit</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>BB</td>
                                        <td>Item B</td>
                                        <td>Paper</td>
                                        <td>Unit</td>
                                        <td>200</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="addrows1">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Products</h5>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table w-100" id="table3">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Stock Code</th>
                                        <th>Description</th>
                                        <th>Group</th>
                                        <th>UOM</th>
                                        <th>Avaliable quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>AA</td>
                                        <td>Item A</td>
                                        <td>Paper</td>
                                        <td>Unit</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>BB</td>
                                        <td>Item B</td>
                                        <td>Paper</td>
                                        <td>Unit</td>
                                        <td>200</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="addrows2">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
                if ($('#sale_order').data('id') == data.id) {
                    return $('<option value=' + data.id + ' selected>' + data.order_no +
                        '</option>');
                } else {
                    return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                }
            },
            templateSelection: function(data) {
                return data.text || null;
            }
        });

        $('#table1').dataTable();
        $('#table2').dataTable();
        $('#table3').dataTable();
        $('#Table1').dataTable();
        $('#Table2').dataTable();
        $('#Table3').dataTable();

        let uoms = @json($uoms);
        let options = ``;
        uoms.forEach(uom => {
            let option = document.createElement('option');
            option.value = uom.id;
            option.text = uom.name;
            options += option;
        });

        $('#addrows').click(function() {
            $('#table1').DataTable().destroy();
            $('#Table1').DataTable().destroy();

            $("#table1 tbody").find("input[type=checkbox]:checked").each(function() {
                $length = $("#table1 tbody tr").length;

                var checkedRow = $(this).closest('tr');

                var stock_code = checkedRow.find('td:eq(1)').text();
                var description = checkedRow.find('td:eq(2)').text();
                var group = checkedRow.find('td:eq(3)').text();
                var uom = checkedRow.find('td:eq(4)').text();
                var available_qty = checkedRow.find('td:eq(5)').text();

                var newRow = $(
                    `<tr>
                    <td><input type='hidden' value='${stock_code}' class="stock_code" name="kertas[${$length}][stock_code]"/><input type='hidden' value='${group}' class="group" name="kertas[${$length}][group]"/>${stock_code}</td>
                    <td><input type='hidden' value='${description}' name="kertas[${$length}][description]"/>${description}</td>
                    <td><input type='number' class="form-control" value='' name="kertas[${$length}][grammage]"/></td>
                    <td><input type='number' class="form-control" value='' name="kertas[${$length}][saiz]"/></td>
                    <td><input type='hidden' value='${uom}' name="kertas[${$length}][uom]"/>${uom}</td>
                    <td><input type='hidden' value='${available_qty}' name="kertas[${$length}][available_qty]" class="available_qty"/>${available_qty}</td>
                    <td><select class="form-control" name="kertas[${$length}][uom_request]">${options}</select></td>
                    <td><input type='number' class="form-control request_qty" value='${available_qty}' name="kertas[${$length}][request_qty]"/></td>
                    <td><textarea class="form-control" name="kertas[${$length}][remarks]"></textarea></td>
                    <td><a class="removeRow"><iconify-icon icon="fluent:delete-dismiss-24-filled" width="20" height="20" style="color: red;"></iconify-icon><a></td></tr>`
                );

                $("#Table1 tbody").append(newRow);

                checkedRow.remove();

            });
            $('#table1').dataTable();
            $('#Table1').dataTable();
        });

        // Remove row on button click
        $(document).on('click', '.removeRow', function() {
            $('#table1').DataTable().destroy();
            $('#Table1').DataTable().destroy();

            var checkedRow = $(this).closest('tr');
            var stock_code = $(checkedRow).find('td:eq(0)').text();
            var description = $(checkedRow).find('td:eq(1)').text();
            var group = $(checkedRow).find('.group').val();
            var uom = $(checkedRow).find('td:eq(4)').text();
            var available_quantity = $(checkedRow).find('td:eq(5)').text();

            $("#table1 tbody").append(
                `<tr><td><input type='checkbox'></td><td>${stock_code}</td><td>${description}</td><td>${group}</td><td>${uom}</td><td>${available_quantity}</td></tr>`
            );
            $(this).closest('tr').remove();
            $('#table1').dataTable();
            $('#Table1').dataTable();
        });

        $('#addrows1').click(function() {
            $('#table2').DataTable().destroy();
            $('#Table2').DataTable().destroy();

            $("#table2 tbody").find("input[type=checkbox]:checked").each(function() {
                $length = $("#table2 tbody tr").length;

                var checkedRow = $(this).closest('tr');

                var stock_code = checkedRow.find('td:eq(1)').text();
                var description = checkedRow.find('td:eq(2)').text();
                var group = checkedRow.find('td:eq(3)').text();
                var uom = checkedRow.find('td:eq(4)').text();
                var available_qty = checkedRow.find('td:eq(5)').text();

                var newRow = $(
                    `<tr>
                    <td><input type='hidden' value='${stock_code}' class="stock_code" name="bahan[${$length}][stock_code]"/><input type='hidden' value='${group}' class="group" name="bahan[${$length}][group]"/>${stock_code}</td>
                    <td><input type='hidden' value='${description}' name="bahan[${$length}][description]"/>${description}</td>
                    <td><input type='hidden' value='${uom}' name="bahan[${$length}][uom]"/>${uom}</td>
                    <td><input type='hidden' value='${available_qty}' name="bahan[${$length}][available_qty]" class="available_qty"/>${available_qty}</td>
                    <td><input type='number' class="form-control request_qty" value='${available_qty}' name="bahan[${$length}][request_qty]"/></td>
                    <td><a class="removeRow1"><iconify-icon icon="fluent:delete-dismiss-24-filled" width="20" height="20" style="color: red;"></iconify-icon><a></td></tr>`
                );

                $("#Table2 tbody").append(newRow);

                checkedRow.remove();

            });
            $('#table2').dataTable();
            $('#Table2').dataTable();
        });

        // Remove row on button click
        $(document).on('click', '.removeRow1', function() {
            $('#table2').DataTable().destroy();
            $('#Table2').DataTable().destroy();

            var checkedRow = $(this).closest('tr');
            var stock_code = $(checkedRow).find('td:eq(0)').text();
            var description = $(checkedRow).find('td:eq(1)').text();
            var group = $(checkedRow).find('.group').val();
            var uom = $(checkedRow).find('td:eq(2)').text();
            var available_quantity = $(checkedRow).find('td:eq(3)').text();

            $("#table2 tbody").append(
                `<tr><td><input type='checkbox'></td><td>${stock_code}</td><td>${description}</td><td>${group}</td><td>${uom}</td><td>${available_quantity}</td></tr>`
            );
            $(this).closest('tr').remove();
            $('#table2').dataTable();
            $('#Table2').dataTable();
        });

        $('#addrows2').click(function() {
            $('#table3').DataTable().destroy();
            $('#Table3').DataTable().destroy();

            $("#table3 tbody").find("input[type=checkbox]:checked").each(function() {
                $length = $("#table3 tbody tr").length;

                var checkedRow = $(this).closest('tr');

                var stock_code = checkedRow.find('td:eq(1)').text();
                var description = checkedRow.find('td:eq(2)').text();
                var group = checkedRow.find('td:eq(3)').text();
                var uom = checkedRow.find('td:eq(4)').text();
                var available_qty = checkedRow.find('td:eq(5)').text();

                var newRow = $(
                    `<tr>
                    <td><input type='hidden' value='${stock_code}' class="stock_code" name="wip[${$length}][stock_code]"/><input type='hidden' value='${group}' class="group" name="wip[${$length}][group]"/>${stock_code}</td>
                    <td><input type='hidden' value='${description}' name="wip[${$length}][description]"/>${description}</td>
                    <td><input type='hidden' value='${uom}' name="wip[${$length}][uom]"/>${uom}</td>
                    <td><input type='hidden' value='${available_qty}' name="wip[${$length}][available_qty]" class="available_qty"/>${available_qty}</td>
                    <td><input type='number' class="form-control request_qty" value='${available_qty}' name="wip[${$length}][request_qty]"/></td>
                    <td><a class="removeRow2"><iconify-icon icon="fluent:delete-dismiss-24-filled" width="20" height="20" style="color: red;"></iconify-icon><a></td></tr>`
                );

                $("#Table3 tbody").append(newRow);

                checkedRow.remove();

            });
            $('#table3').dataTable();
            $('#Table3').dataTable();
        });

        // Remove row on button click
        $(document).on('click', '.removeRow2', function() {
            $('#table3').DataTable().destroy();
            $('#Table3').DataTable().destroy();

            var checkedRow = $(this).closest('tr');
            var stock_code = $(checkedRow).find('td:eq(0)').text();
            var description = $(checkedRow).find('td:eq(1)').text();
            var group = $(checkedRow).find('.group').val();
            var uom = $(checkedRow).find('td:eq(2)').text();
            var available_quantity = $(checkedRow).find('td:eq(3)').text();

            $("#table3 tbody").append(
                `<tr><td><input type='checkbox'></td><td>${stock_code}</td><td>${description}</td><td>${group}</td><td>${uom}</td><td>${available_quantity}</td></tr>`
            );
            $(this).closest('tr').remove();
            $('#table3').dataTable();
            $('#Table3').dataTable();
        });

        //important work
        $bool = true;

        $('#additem').click(function() {
            if ($bool) {
                $('#table1').DataTable().destroy();
                $("#table1 tbody tr").find("td:eq(1)").each(function() {
                    let this1 = $(this);
                    $("#Table1 tbody").find(".stock_code").each(function() {
                        let this2 = $(this);
                        if (this1.text() == this2.val()) {
                            this1.closest('tr').remove();
                        }
                    });
                });
                $('#table1').dataTable();
                $bool = false;
            }
        });

        $bool1 = true;

        $('#additem1').click(function() {
            if ($bool1) {
                $('#table2').DataTable().destroy();
                $("#table2 tbody").find("td:eq(1)").each(function() {
                    let this1 = $(this);
                    $("#Table2 tbody").find(".stock_code").each(function() {
                        let this2 = $(this);
                        if (this1.text() == this2.val()) {
                            this1.closest('tr').remove();
                        }
                    });
                });
                $('#table2').dataTable();
                $bool1 = false;
            }
        });

        $bool2 = true;

        $('#additem2').click(function() {
            if ($bool2) {
                $('#table3').DataTable().destroy();
                $("#table3 tbody").find("td:eq(1)").each(function() {
                    let this1 = $(this);
                    $("#Table3 tbody").find(".stock_code").each(function() {
                        let this2 = $(this);
                        if (this1.text() == this2.val()) {
                            this1.closest('tr').remove();
                        }
                    });
                });
                $('#table3').dataTable();
                $bool2 = false;
            }
        });
        //important work

        $(document).on('keyup change', '.request_qty', function() {
            if (parseFloat($(this).closest('tr').find('.available_qty').val()) < parseFloat($(this).val())) {
                $(this).val($(this).closest('tr').find('.available_qty').val());
            }
        });
    </script>
@endpush
