@extends('layouts.app')
@section('content')
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
                                            value="{{ $stock_transfer_location->ref_no }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Date</div>
                                        <input type="text" name="date" value="{{ $stock_transfer_location->date }}"
                                            class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                            placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <input type="text" class="form-control"
                                            value="{{ $stock_transfer_location->sale_order->order_no }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Transfer By</div>
                                        <input type="text" value="{{ $stock_transfer_location->user->full_name }}"
                                            readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Description</div>
                                        <textarea name="description" class="form-control">{{ $stock_transfer_location->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Previous Location </div>
                                        <select name="previous_location" id="previous_location" class="form-select">
                                            <option value="" selected disabled>Select Previous Location</option>
                                            @foreach ($locations as $location)
                                                <option @selected($stock_transfer_location->previous_area_id == $location->area->id && $stock_transfer_location->previous_shelf_id == $location->shelf->id && $stock_transfer_location->previous_level_id == $location->level->id)
                                                    data-area-id="{{ $location->area->id }}"
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
                                                <option @selected($stock_transfer_location->new_area_id == $location->area->id && $stock_transfer_location->new_shelf_id == $location->shelf->id && $stock_transfer_location->new_level_id == $location->level->id)
                                                    data-area-id="{{ $location->area->id }}"
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
                                    <div class="table-responsive">
                                        <table class="table mt-2" id="Table">
                                            <thead>
                                                <tr>
                                                    <td>Item Code</td>
                                                    <td>Description</td>
                                                    <td>UOM</td>
                                                    <td>Available Qty</td>
                                                    <td>Quantity</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($stock_products as $key => $stock_product)
                                                    <tr>
                                                        <td><input type='hidden' value='{{ $stock_product->product_id }}'
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
                                                        @php
                                                            $used_qty = App\Models\Location::where(
                                                                'product_id',
                                                                $stock_product->product_id,
                                                            )
                                                                ->where(
                                                                    'area_id',
                                                                    $stock_transfer_location->previous_area_id,
                                                                )
                                                                ->where(
                                                                    'shelf_id',
                                                                    $stock_transfer_location->previous_shelf_id,
                                                                )
                                                                ->where(
                                                                    'level_id',
                                                                    $stock_transfer_location->previous_level_id,
                                                                )
                                                                ->sum('used_qty');
                                                        @endphp
                                                        <td><input type='hidden' class="availale_qty"
                                                                value='{{ $stock_product->available_qty + $used_qty }}'
                                                                name="products[{{ $key }}][available_qty]" />{{ $stock_product->available_qty }}
                                                        </td>
                                                        <td><input type='number' class="form-control qty"
                                                                value='{{ $stock_product->qty }}'
                                                                name="products[{{ $key }}][qty]" /></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('stock_transfer_location') }}" class="">Back to list</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $('input, select, textarea').attr('disabled', 'disabled');
        $('#Table').DataTable();
    </script>
@endpush
