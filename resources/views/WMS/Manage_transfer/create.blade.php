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
                                    <div class="label">Tarikh</div>
                                    <input type="date" readonly value="13-12-2023" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Ref No</div>
                                    <input type="text" readonly value="Pilih ref no" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Dikeluarkan Oleh</div>
                                    <input type="text" value="Admin" readonly class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Sales Orders No</div>
                                    <select name="" id="" readonly class="form-control">
                                        <option value="" disabled>Select Sale Order No.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Discription</div>
                                    <input type="text" value="Input Text" readonly class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Diminta Oleh</div>
                                    <input type="text" value=" auto display - based request" readonly
                                        class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4><b>B) PERMINTAAN KERTAS</b></h4>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary my-3">Search</button>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table mt-2" id="">
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
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>No</td>
                                                <td>data</td>
                                                <td></td>
                                                <td>available</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
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
                                <button class="btn btn-primary my-3">Search</button>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table mt-2" id="">
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
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>No data available</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
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
                                <button class="btn btn-primary my-3">Search</button>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table mt-2" id="">
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
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>No data available</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
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
                <a href="{{route('manage_transfer')}}" class="">Back to list</a>

            </div>

        </div>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Item:</b>A-123</h5>
        <p class="float-right"><b>Total Qty:</b>24 <b>| Total transfer qty: </b>0</p>
      </div>
      <div class="modal-body">
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th>Loaction</th>
                    <th>Avaliable Qty</th>
                    <th>qty</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="location" id="" class="form-control">
                            <option value="">Store >R1>S1 </option>
                        </select>
                    </td>
                    <td><input type="text" class="form-control" name="avaliable-qty" value="28"></td>
                    <td><input type="text" class="form-control" name="qty"></td>
                    <td><button class="btn btn-primary addrow" style="font-size:20px;" id="addrow">+</button>
                    <button class="btn btn-danger removeRowButton d-none" style="font-size:20px;">-</button></td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection
@push('custom-scripts')
<script>

$(document).ready(function(){
    var key = 0;
    
    $('#table1').on('click', '.addrow', function(){
        var currentRow = $(this).closest('tr');
        var $length = $("#table1 tbody tr").length;
        
        var newRow = $(
            `<tr>
                <td><select class="form-control" name="key[${$length}][location]"><option value="RIM">Store>R1>S1</option></select></td>
                <td><input type='number' class="form-control" name="key[${$length}][avaliable_qty]" value="28"/></td>
                <td><input type="text" class="form-control" name="key[${$length}][qty]"></td>
                <td>
                    <button class="btn btn-primary addrow" style="font-size:20px;">+</button>
                    <button class="btn btn-danger removeRowButton" style="font-size:20px;">-</button>
                </td>
            </tr>`
        );
        
        newRow.find('.removeRowButton').removeClass('d-none');
        currentRow.after(newRow);
    });

    $('#table1').on('click', '.removeRowButton', function(){
        $(this).closest('tr').remove();
    });
});




</script>
@endPush