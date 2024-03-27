@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="row">
                    <div class="col-md-12">
                        <h5><b>INVENTORY SHOPFLOOR</b></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mt-5">
                    @foreach($areas as $area)
                        <div class="col-md-3">
                            <div class="card" style="border: 1px solid black; border-radius: 10px;">
                                <div class="card-header" style="border-radius: 10px;">
                                    <input type="hidden" value="{{$area->area_id}}" class="area">
                                    <h6 class="text-center" style="background:#ffe1e7;"><b>{{$area->area_name}}</b></h6>
                                </div>
                                <div class="card-body text-center">
                                    @foreach($area->shelves as $shelf)
                                        <input type="hidden" value="{{$area->area_name}} > {{$shelf->shelf_name}}" class="area_shelf">
                                        <a data-toggle="modal" data-target="#exampleModal" style="cursor: pointer;" type="button" class="shelf" data-id="{{$shelf->shelf_id}}">{{$shelf->shelf_name}}: {{$shelf->total_quantity ?? 0}}</a>
                                    @endforeach
                                </div>
                                <div class="card-footer" style="border-radius: 10px;">
                                    <h6 class="text-center" style="background:#ffe1e7;"><b>Total: {{$area->total_quantity ?? 0}}</b></h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-hover w-100" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Level</th>
                                        <th>Item Code</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>                                    
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
        var data = "{{ route('inventory_shopfloor.generate') }}";
    </script>
    <script src="{{ asset('assets/js/custom/wms/InventoryShopfloor/index.js') }}"></script>
@endpush
