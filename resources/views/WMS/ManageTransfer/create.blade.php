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
                                        <label for="">Tarikh</label>
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
                                        <input type="text" value="{{ Auth::user()->full_name }}" readonly
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
                                        <table class="table mt-2" id="table1">
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
                                        <table class="table mt-2" id="table2">
                                            <thead>
                                                <tr>
                                                    <td>Stock code</td>
                                                    <td>Description</td>
                                                    <td>UOM</td>
                                                    <td>Avaliable Qty</td>
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
                                        <table class="table mt-2" id="table3">
                                            <thead>
                                                <tr>
                                                    <td>Stock code</td>
                                                    <td>Description</td>
                                                    <td>UOM</td>
                                                    <td>Avaliable Qty</td>
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

                            <button type="submit" class="btn btn-primary float-right">Save</button>
                        </div>
                    </div>
                    <a href="{{ route('manage_transfer') }}" class="">Back to list</a>

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
                    $('#oleh').val(data.material.user.full_name);

                    $length = 1;
                    $('#table1 tbody').html('');
                    $('#table1').DataTable().destroy();
                    data.material_b.forEach((element, index) => {
                        $('#table1 tbody').append(`<tr>
                            <td><input type='hidden' value='${element.stock_code}' class="stock_code" name="kertas[${$length}][stock_code]"/>${element.stock_code}</td>
                            <td>${element.description}</td>
                            <td>${element.grammage}</td>
                            <td>${element.saiz}</td>
                            <td>${element.uom}</td>
                            <td>${element.available_qty}</td>
                            <td>${element.uom_request ? element.uom_request : ''}</td>
                            <td><input type='hidden' value='${element.request_qty}' name="kertas[${$length}][request_qty]"/>${element.request_qty}</td>
                            <td>0</td>
                            <td>${element.request_qty}</td>
                            <td><input type="number" readonly class="form-control"/></td>
                            <td>${element.request_qty}</td>
                            <td><textarea class="form-control" name="kertas[${$length}][remarks]"></textarea></td>
                            <td><a class="addStock"><iconify-icon icon="icon-park-outline:add" width="20" height="20" style="color: #18002D;"></iconify-icon><a></td>
                        </tr>`);
                        $length++;
                    });
                    $('#table1').dataTable();

                    $length1 = 1;
                    $('#table2 tbody').html('');
                    $('#table2').DataTable().destroy();
                    data.material_c.forEach((element, index) => {
                        $('#table2 tbody').append(`<tr>
                            <td><input type='hidden' value='${element.stock_code}' class="stock_code" name="bahan[${$length1}][stock_code]"/>${element.stock_code}</td>
                            <td>${element.description}</td>
                            <td>${element.uom}</td>
                            <td>${element.available_qty}</td>
                            <td><input type='hidden' value='${element.request_qty}' name="bahan[${$length1}][request_qty]"/>${element.request_qty}</td>
                            <td>0</td>
                            <td>${element.request_qty}</td>
                            <td><input type="number" readonly class="form-control"/></td>
                            <td>${element.request_qty}</td>
                            <td><textarea class="form-control" name="bahan[${$length1}][remarks]"></textarea></td>
                            <td><a class="addStock"><iconify-icon icon="icon-park-outline:add" width="20" height="20" style="color: #18002D;"></iconify-icon><a></td>
                        </tr>`);
                        $length1++;
                    });
                    $('#table2').dataTable();

                    $length2 = 1;
                    $('#table3 tbody').html('');
                    $('#table3').DataTable().destroy();
                    data.material_d.forEach((element, index) => {
                        $('#table3 tbody').append(`<tr>
                            <td><input type='hidden' value='${element.stock_code}' class="stock_code" name="wip[${$length2}][stock_code]"/>${element.stock_code}</td>
                            <td>${element.description}</td>
                            <td>${element.uom}</td>
                            <td>${element.available_qty}</td>
                            <td><input type='hidden' value='${element.request_qty}' name="wip[${$length2}][request_qty]"/>${element.request_qty}</td>
                            <td>0</td>
                            <td>${element.request_qty}</td>
                            <td><input type="number" readonly class="form-control"/></td>
                            <td>${element.request_qty}</td>
                            <td><textarea class="form-control" name="wip[${$length2}][remarks]"></textarea></td>
                            <td><a class="addStock"><iconify-icon icon="icon-park-outline:add" width="20" height="20" style="color: #18002D;"></iconify-icon><a></td>
                        </tr>`);
                        $length2++;
                    });
                    $('#table3').dataTable();
                }
            });
        });
    </script>
@endPush
