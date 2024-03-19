@extends('layouts.app')
@section('content')
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
                                        <input type="text" readonly value="{{ $material_request->user->full_name }}"
                                            id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <input type="text" readonly
                                            value="{{ $material_request->sale_order->order_no }}" id=""
                                            class="form-control">
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($detailbs as $key => $value)
                                                    <tr>
                                                        <td><input type='hidden' class="stock_code"
                                                                value='{{ $value->products->id }}'
                                                                name="kertas[{{ $key + 1 }}][product_id]" /><input
                                                                type='hidden' value='{{ $value->products->group }}'
                                                                class="group"
                                                                name="kertas[{{ $key + 1 }}][group]" /><input
                                                                type="hidden"
                                                                name="kertas[{{ $key + 1 }}]['stock_code']"
                                                                value="{{ $value->products->item_code }}" />{{ $value->products->item_code }}
                                                        </td>
                                                        <td><input type='hidden'
                                                                value='{{ $value->products->descriptiom }}'
                                                                name="kertas[{{ $key + 1 }}][description]" />{{ $value->products->description }}
                                                        </td>
                                                        <td><input type='number' class="form-control"
                                                                value='{{ $value->grammage }}'
                                                                name="kertas[{{ $key + 1 }}][grammage]" /></td>
                                                        <td><input type='number' class="form-control"
                                                                value='{{ $value->saiz }}'
                                                                name="kertas[{{ $key + 1 }}][saiz]" /></td>
                                                        <td><input type='hidden' value='{{ $value->products->base_uom }}'
                                                                name="kertas[{{ $key + 1 }}][uom]" />{{ $value->products->base_uom }}
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
                                        <table class="table mt-2" id="Table2">
                                            <thead>
                                                <tr>
                                                    <td>Stock code</td>
                                                    <td>Description</td>
                                                    <td>UOM</td>
                                                    <td>Avaliable Qty</td>
                                                    <td>Request Quantity</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($detailcs as $key => $value)
                                                    <tr>
                                                        <td><input type='hidden' class="stock_code"
                                                                value='{{ $value->products->id }}'
                                                                name="bahan[{{ $key + 1 }}][product_id]" /><input
                                                                type='hidden' value='{{ $value->products->group }}'
                                                                class="group"
                                                                name="bahan[{{ $key + 1 }}][group]" /><input
                                                                type="hidden"
                                                                name="bahan[{{ $key + 1 }}]['stock_code']"
                                                                value="{{ $value->products->item_code }}" />{{ $value->products->item_code }}
                                                        </td>
                                                        <td><input type='hidden'
                                                                value='{{ $value->products->description }}'
                                                                name="bahan[{{ $key + 1 }}][description]" />{{ $value->products->description }}
                                                        </td>
                                                        <td><input type='hidden'
                                                                value='{{ $value->products->base_uom }}'
                                                                name="bahan[{{ $key + 1 }}][uom]" />{{ $value->products->base_uom }}
                                                        </td>
                                                        <td><input type='hidden' value='{{ $value->available_qty }}'
                                                                name="bahan[{{ $key + 1 }}][available_qty]"
                                                                class="available_qty" />{{ $value->available_qty }}
                                                        </td>
                                                        <td><input type='number' class="form-control request_qty"
                                                                value='{{ $value->request_qty }}'
                                                                name="bahan[{{ $key + 1 }}][request_qty]" /></td>
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
                                        <table class="table mt-2" id="Table3">
                                            <thead>
                                                <tr>
                                                    <td>Stock code</td>
                                                    <td>Description</td>
                                                    <td>UOM</td>
                                                    <td>Avaliable Qty</td>
                                                    <td>Request Quantity</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($detailds as $key => $value)
                                                    <tr>
                                                        <td><input type='hidden' class="stock_code"
                                                                value='{{ $value->products->id }}'
                                                                name="wip[{{ $key + 1 }}][product_id]" /><input
                                                                type='hidden' value='{{ $value->products->group }}'
                                                                class="group"
                                                                name="wip[{{ $key + 1 }}][group]" /><input
                                                                type="hidden"
                                                                name="wip[{{ $key + 1 }}]['stock_code']"
                                                                value="{{ $value->products->item_code }}" />{{ $value->products->item_code }}
                                                        </td>
                                                        <td><input type='hidden'
                                                                value='{{ $value->products->description }}'
                                                                name="wip[{{ $key + 1 }}][description]" />{{ $value->products->description }}
                                                        </td>
                                                        <td><input type='hidden'
                                                                value='{{ $value->products->base_uom }}'
                                                                name="wip[{{ $key + 1 }}][uom]" />{{ $value->products->base_uom }}
                                                        </td>
                                                        <td><input type='hidden' value='{{ $value->available_qty }}'
                                                                name="wip[{{ $key + 1 }}][available_qty]"
                                                                class="available_qty" />{{ $value->available_qty }}
                                                        </td>
                                                        <td><input type='number' class="form-control request_qty"
                                                                value='{{ $value->request_qty }}'
                                                                name="wip[{{ $key + 1 }}][request_qty]" /></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('material_request') }}" class="">Back to list</a>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $('input, select, textarea').attr('disabled', 'disabled');
        $('#Table1').dataTable();
        $('#Table2').dataTable();
        $('#Table3').dataTable();
    </script>
@endpush
