@extends('layouts.app')
@section('content')
    <form action="{{ route('material_request.store') }}" method="POST">
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
                                            <input type="text" name="date"
                                                value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" class="form-control"
                                                id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Ref No</div>
                                            <input type="text" name="ref_no" readonly value="auto display"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="col-md-4 mt-3">
                                            <label for="">Diminta Oleh</label>
                                            <input type="text" readonly name=""
                                                value="{{ Auth::user()->full_name }}" id="" class="form-control">
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
                                            <div class="label">Discription</div>
                                            <textarea name="description" rows="1" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Location</div>
                                            <textarea name="location" rows="1" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Remarks</div>
                                            <textarea name="remarks" rows="1" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><b>B) PERMINTAAN KERTAS</b></h4>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal">Search</button>
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
                                        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal2">Search</button>
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
                                        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal3">Search</button>
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
                                                <tbody></tbody>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
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
                                        <td>A-123</td>
                                        <td>A/Card 260gr</td>
                                        <td>Paper</td>
                                        <td>pkt</td>
                                        <td>24</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>A-124</td>
                                        <td>A/Card 280gr</td>
                                        <td>Paper</td>
                                        <td>pkt</td>
                                        <td>24</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>A-125</td>
                                        <td>A/Card 300gr</td>
                                        <td>Paper</td>
                                        <td>pkt</td>
                                        <td>24</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addrows">Add</button>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table" id="table2">
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
                                        <td>A-123</td>
                                        <td>A/Card 260gr</td>
                                        <td>Paper</td>
                                        <td>pkt</td>
                                        <td>24</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>A-124</td>
                                        <td>A/Card 280gr</td>
                                        <td>Paper</td>
                                        <td>pkt</td>
                                        <td>24</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>A-125</td>
                                        <td>A/Card 300gr</td>
                                        <td>Paper</td>
                                        <td>pkt</td>
                                        <td>24</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addrows1">Save changes</button>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table" id="table3">
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
                                        <td>A-123</td>
                                        <td>A/Card 260gr</td>
                                        <td>Paper</td>
                                        <td>pkt</td>
                                        <td>24</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>A-124</td>
                                        <td>A/Card 280gr</td>
                                        <td>Paper</td>
                                        <td>pkt</td>
                                        <td>24</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>A-125</td>
                                        <td>A/Card 300gr</td>
                                        <td>Paper</td>
                                        <td>pkt</td>
                                        <td>24</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addrows2">Save changes</button>
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

                return $('<option value=' + data.id + '>' + data.order_no + '</option>');
            },
            templateSelection: function(data) {
                return data.order_no || "Select Sales Order No";
            }
        });
        
        let key = 0;
        let appendedRows = [];

        $('#addrows').click(function(){
            appendedRows = []; // Clear the appendedRows array before appending new rows
            $('#table1 tbody tr').each(function(){
                var checkbox = $(this).find('input[type="checkbox"]');
                if (checkbox.prop('checked')) {
                    var stockCode = $(this).find('td:eq(1)').text();
                    var description = $(this).find('td:eq(2)').text();
                    var group = $(this).find('td:eq(3)').text();
                    var uom = $(this).find('td:eq(4)').text();
                    var availableQuantity = $(this).find('td:eq(5)').text();
                    var newRow = '<tr>' +
                                    '<td><input type="hidden" value="'+stockCode+'" class="stockCode"><input type="hidden" value="'+description+'" class="description"><input type="hidden" value="'+group+'" class="group"><input type="hidden" value="'+uom+'" class="uom"><input type="hidden" value="'+availableQuantity+'" class="availableQuantity"><input class="form-control" type="text" readonly name="data['+key+'][stockcode]" value="'+ stockCode + '" style="width:150px;"></td>' +
                                    '<td><input class="form-control" type="text" readonly name="data['+key+'][des]" value="' + description + '" style="width:150px;"></td>' +
                                    '<td><input class="form-control" type="text" name="data['+key+'][grammage]" style="width:150px;"></td>' + // Add empty cells for Grammage, Saiz, UOM Request, Request Quantity, and Remarks
                                    '<td><input class="form-control" type="text"  name="data['+key+'][saiz]" style="width:150px;"></td>' +
                                    '<td><input class="form-control"  type="text"  name="data['+key+'][uom]" style="width:150px;" ></td>' +
                                    '<td><input class="form-control" type="text" readonly name="data['+key+'][availableqty]" style="width:150px;" value="' + availableQuantity + '"></td>' +
                                    '<td><input class="form-control" type="text"  name="data['+key+'][requestQty]" style="width:150px;"></td>' +
                                    '<td><input class="form-control" type="text"  name="data['+key+'][requestQty]" style="width:150px;"></td>' +
                                    '<td><input class="form-control" type="text"  name="data['+key+'][remark]" style="width:150px;"></td>' +
                                    '<td><button type="button" class="btn removeRow" style="color:red; font-size:30px;">X</button></td>' +
                                '</tr>';
                    $('#Table1 tbody').append(newRow);
                    appendedRows.push($(this)); // Store the appended rows
                }
            });
            // Remove the appended rows from the modal table
            $.each(appendedRows, function(index, row){
                row.remove();
            });
            key++;
        });

        // Remove row on button click
        $(document).on('click', '.removeRow', function(){
            var checkedRow = $(this).closest('tr');
            var stockCode = $(checkedRow).find('.stockCode');
            var description = $(checkedRow).find('.description');
            var group = $(checkedRow).find('.group');
            var uom = $(checkedRow).find('.uom');
            var availableQuantity = $(checkedRow).find('.availableQuantity');

            var first = stockCode.val();
            var second = description.val();
            var third = group.val();
            var names = uom.val();
            var codes = availableQuantity.val();
            var newRow = $("<tr id=''>" +
               "<td><input type='checkbox' class='selectRow'></td>" +
               "<td>"+ first +"</td>" +
               "<td>"+ second +"</td>" +
               "<td>"+ third +"</td>" +
               "<td>"+ names +"</td>" +
               "<td>"+ codes +"</td>" +
              "</tr>"
              
            );
            $("#table1 tbody").append(newRow);
            $(this).closest('tr').remove();
        });


        let key1 = 0;
        let appendedRows1 = [];

        $('#addrows1').click(function(){
            appendedRows1 = []; // Clear the appendedRows1 array before appending new rows
            $('#table2 tbody tr').each(function(){
                var checkbox = $(this).find('input[type="checkbox"]');
                if (checkbox.prop('checked')) {
                    var stockCode = $(this).find('td:eq(1)').text();
                    var description = $(this).find('td:eq(2)').text();
                    var group = $(this).find('td:eq(3)').text();
                    var uom = $(this).find('td:eq(4)').text();
                    var availableQuantity = $(this).find('td:eq(5)').text();
                    var newRow = '<tr>' +
                                    '<td><input type="hidden" value="'+stockCode+'" class="stockCode"><input type="hidden" value="'+description+'" class="description"><input type="hidden" value="'+group+'" class="group"><input type="hidden" value="'+uom+'" class="uom"><input type="hidden" value="'+availableQuantity+'" class="availableQuantity"><input class="form-control" type="text" readonly name="data['+key1+'][stockcode]" value="'+ stockCode + '" style="width:150px;"></td>' +
                                    '<td><input readonly class="form-control" type="text" readonly name="data['+key1+'][des]" value="' + description + '" style="width:150px;"></td>' +
                                    '<td><input class="form-control"  type="text" readonly name="data['+key1+'][uom]" value="bag" style="width:150px;"></td>' +
                                    '<td><input class="form-control" type="text" readonly name="data['+key1+'][availableqty]" value="' + availableQuantity + '" style="width:150px;"></td>' +
                                    '<td><input class="form-control" type="text"  name="data['+key1+'][requestQty]" style="width:150px;"></td>' +
                                    '<td><button type="button" class="btn removeRow" style="color:red; font-size:30px;">X</button></td>' +
                                '</tr>';
                    $('#Table2 tbody').append(newRow);
                    appendedRows1.push($(this)); // Store the appended rows
                }
            });
            // Remove the appended rows from the modal table
            $.each(appendedRows1, function(index, row){
                row.remove();
            });
            key1++;
        });

        // Remove row on button click
        $(document).on('click', '.removeRow', function(){
            var checkedRow = $(this).closest('tr');
            var stockCode = $(checkedRow).find('.stockCode');
            var description = $(checkedRow).find('.description');
            var group = $(checkedRow).find('.group');
            var uom = $(checkedRow).find('.uom');
            var availableQuantity = $(checkedRow).find('.availableQuantity');

            var first = stockCode.val();
            var second = description.val();
            var third = group.val();
            var names = uom.val();
            var codes = availableQuantity.val();
            var newRow = $("<tr id=''>" +
               "<td><input type='checkbox' class='selectRow'></td>" +
               "<td>"+ first +"</td>" +
               "<td>"+ second +"</td>" +
               "<td>"+ third +"</td>" +
               "<td>"+ names +"</td>" +
               "<td>"+ codes +"</td>" +
              "</tr>"
              
            );
            $("#table2 tbody").append(newRow);
            $(this).closest('tr').remove();
        });

        let key2 = 0;
        let appendedRows2 = [];

        $('#addrows2').click(function(){
            appendedRows2 = []; // Clear the appendedRows2 array before appending new rows
            $('#table3 tbody tr').each(function(){
                var checkbox = $(this).find('input[type="checkbox"]');
                if (checkbox.prop('checked')) {
                    var stockCode = $(this).find('td:eq(1)').text();
                    var description = $(this).find('td:eq(2)').text();
                    var group = $(this).find('td:eq(3)').text();
                    var uom = $(this).find('td:eq(4)').text();
                    var availableQuantity = $(this).find('td:eq(5)').text();
                    var newRow = '<tr>' +
                                    '<td><input type="hidden" value="'+stockCode+'" class="stockCode"><input type="hidden" value="'+description+'" class="description"><input type="hidden" value="'+group+'" class="group"><input type="hidden" value="'+uom+'" class="uom"><input type="hidden" value="'+availableQuantity+'" class="availableQuantity"><input class="form-control" type="text" readonly name="data['+key2+'][stockcode]" value="'+ stockCode + '" style="width:150px;"></td>' +
                                    '<td><input class="form-control" type="text" readonly name="data['+key2+'][des]" value="' + description + '" style="width:150px;"></td>' +
                                    '<td><input class="form-control"  type="text" readonly name="data['+key2+'][uom]" value="bag" style="width:150px;"></td>' +
                                    '<td><input class="form-control" type="text" readonly name="data['+key2+'][availableqty]" value="' + availableQuantity + '" style="width:150px;"></td>' +
                                    '<td><input class="form-control" type="text"  name="data['+key2+'][requestQty]" style="width:150px;"></td>' +
                                    '<td><button type="button" class="btn removeRow" style="color:red; font-size:30px;">X</button></td>' +
                                '</tr>';
                    $('#Table3 tbody').append(newRow);
                    appendedRows2.push($(this)); // Store the appended rows
                }
            });
            // Remove the appended rows from the modal table
            $.each(appendedRows2, function(index, row){
                row.remove();
            });
            key2++;
        });

        // Remove row on button click
        $(document).on('click', '.removeRow', function(){
            var checkedRow = $(this).closest('tr');
            var stockCode = $(checkedRow).find('.stockCode');
            var description = $(checkedRow).find('.description');
            var group = $(checkedRow).find('.group');
            var uom = $(checkedRow).find('.uom');
            var availableQuantity = $(checkedRow).find('.availableQuantity');

            var first = stockCode.val();
            var second = description.val();
            var third = group.val();
            var names = uom.val();
            var codes = availableQuantity.val();
            var newRow = $("<tr id=''>" +
               "<td><input type='checkbox' class='selectRow'></td>" +
               "<td>"+ first +"</td>" +
               "<td>"+ second +"</td>" +
               "<td>"+ third +"</td>" +
               "<td>"+ names +"</td>" +
               "<td>"+ codes +"</td>" +
              "</tr>"
              
            );
            $("#table3 tbody").append(newRow);
            $(this).closest('tr').remove();
        });

        

    </script>
@endpush
