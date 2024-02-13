@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Good Receiving</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Purchase Order No</label>
                        <input type="text" name="" value="PO-11231-1" readonly id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">Date</label>
                    <input type="date" value="12/12/2023" readonly name="" id="" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="">Creditor Name</label>
                    <input type="text" value="Supplier A" readonly name="" id="" class="form-control">
                </div>
                <div class="col-md-3"></div>
                </div>


                <table class="table mt-2 w-100" id="example2">
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
                    <tbody>
                        <tr class="text-center">
                            <td>1.</td>
                            <td>AA</td>
                            <td>Item A</td>
                            <td>Unit</td>
                            <td>200</td>
                            <td>200</td>
                            <td>200</td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#staticBackdrop1">+</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


<div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width:1000px; margin-left:-240px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Good Receiving</h5>
                        <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="fa fa-xmark"></i></button> -->
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Purchase Order No</label>
                                    <input type="text" name="" value="PO-11231-1" readonly id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Date</label>
                                <input type="date" value="12/12/2023" readonly name="" id="" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="">Creditor Name</label>
                                <input type="text" value="Supplier A" readonly name="" id="" class="form-control">
                            </div>
                            <div class="col-md-3"></div>
                        </div>


                    <table class="table mt-2 w-100" id="example2">
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
                            <tbody>
                                <tr class="text-center">
                                    <td>1.</td>
                                    <td>AA</td>
                                    <td>Item A</td>
                                    <td>Unit</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>
                                        <button class="btn btn-primary"  data-toggle="modal" data-target="#staticBackdrop1">+</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade " id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width:1000px; margin-left:-240px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Receiving Quantity</h5>
                        <button type="button" class="btn-close btn-danger" data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                            <p><b>Item Code:</b>XX</p>
                            <p><b>Description</b>XX</p>
                            <hr>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                            <p><b>Receiving Quantity:</b>XX</p>
                            <p><b>Total Receiving Quantity:</b>XX</p>
                            <hr>
                            </div>
                        </div>


                    <table class="table mt-2 w-100" id="example1">
                            <thead>
                                <tr>
                                    <td>Location</td>
                                    <td>UOM</td>
                                    <td>Receiving Quantity</td>
                                    <td>Remarks</td>
                                    <td>Remarks</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td><select name="" placeholder="Select Location" class="form-control" id="">
                                        <option value="">Area 1 > shelf > level 1</option>
                                        <option value="">Area 2 > shelf > level 2</option>
                                    </select></td>
                                    <td><input type="text" readonly value="UNIT" name="" id="" class="form-control"></td>
                                    <td><input type="text" placeholder="User Input" name="" id="" class="form-control"></td>
                                    <td><textarea name="" id="" placeholder="User Input" cols="30" rows="1"></textarea></td>
                                    <td><button class="btn btn-primary">print </button></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6"><button class="btn btn-primary" >+</button></div>
                                            <div class="col-md-6"><button class="btn btn-danger">X</button></div>
                                        
                                        
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection