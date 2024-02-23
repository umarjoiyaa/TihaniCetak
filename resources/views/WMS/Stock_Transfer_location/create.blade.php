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
                                    <input type="text" readonly value="Auto Display" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Date</div>
                                    <input type="date" readonly value="12/12/2023" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Search Sales Order No.</div>
                                    <select readonly name="" id="" class="form-control">
                                        <option value="">Search Sales Order no</option>
                                        <option value="">SO - 001387</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Transfer By</div>
                                    <select name="" id="" class="form-control">
                                        <option value="" disabled>Base User Login</option>
                                        <option value="">Operator A </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Description</div>
                                    <input type="text" value="Based User login" readonly class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Previous Location </div>
                                    <select name="" id="" class="form-control">
                                        <option value="" disabled>Select Category</option>
                                        <option value="">Operator A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">New Location </div>
                                    <select name="" id="" class="form-control">
                                        <option value="" disabled>Select Category</option>
                                        <option value="">Operator A</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary float-right mb-2" class="btn btn-primary"
                                    data-toggle="modal" data-target="#exampleModal">+ Add Product</button>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table mt-2" id="example1">
                                        <thead>
                                            <tr>
                                                <td>Sr.</td>
                                                <td>Item Code</td>
                                                <td>Discription</td>
                                                <td>UOM</td>
                                                <td>Quantity</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>AA</td>
                                                <td>Item AA</td>
                                                <td>REAM</td>
                                                <td></td>
                                                <td><button class="btn btn-danger">X</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>



                        <button type="submit" class="mt-3 btn btn-primary float-right">Save</button>
                    </div>
                </div>
                <a href="{{route('stock_Transfer_location.index')}}" class="">Back to list</a>

            </div>

        </div>

    </div>
</div>


<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width:1000px; margin-left:-250px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product List</h5>
                <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <table class="table" id="example1">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Item Code</th>
                            <th>Description</th>
                            <th>Group</th>
                            <th>UOM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>AA</td>
                        <td>Item AA</td>
                        <td>Paper</td>
                        <td>REAM</td>
                    </tbody>
                </table>
                <button class="btn- btn-primary float-right">Add</button>
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade " id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width:1000px; margin-left:-240px;">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Receiving Quantity</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i
                        class="fa fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <p><b>Item Code:</b>XX</p>
                        <p><b>Description</b>XX</p>

                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p><b>Receiving Quantity:</b>XX</p>
                        <p><b>Total Receiving Quantity:</b>XX</p>

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
                                    <div class="col-md-6"><button class="btn btn-primary">+</button></div>
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
