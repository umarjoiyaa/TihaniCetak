@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Sales Order View</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center mt-5">
                                    <h5>Tihani Cetak Sdn Bhd (360461-V)</h5>
                                    <p>No.1, Jalan SB Jaya 15, Taman Industri SB Jaya <br>
                                        47000 Sungai Buloh, Selangor Darul Ehsan <br>
                                        Tel: (603) 6140 5336, Fax: (603) 6140 1810 <br>
                                        GST ID No: 002073985024</p>
                                </div>
                                <hr style="width:100% height:5px; color:black;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center mt-3">
                                    <h4><b>SALES ORDER</b></h4>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="box"
                                    style="width:400px; padding:10px; height:180px; border:1px solid black;">
                                    <p>EDUKID DISTRIBUTORS SDN BHD</p>
                                    <p>
                                        NO 8, JALAN MAHAGONI 9, <br>
                                        OASIS STREETMALL, <br>
                                        BANDAR BARU BATANG KALI, <br>
                                        44300 BATANG KALI, HULU SELANGOR <br>
                                    </p>
                                    <p>TEL: 03-60573520 FAX:</p>


                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="text-center">

                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td> Sales order No </td>
                                                        <td>:</td>
                                                        <td> {{ $sale_order->order_no }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td> PO No </td>
                                                        <td> : </td>
                                                        <td> {{ $sale_order->po_no }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Terms </td>
                                                        <td> : </td>
                                                        <td>{{ $sale_order->terms }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Date </td>
                                                        <td> : </td>
                                                        <td>{{ $sale_order->date }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>


                                </div>


                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered mt-3">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th>UOM</th>
                                            <th>Sales Order QTY</th>
                                            <th>Delivery Quantity</th>
                                            <th>Remaining Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $sale_order->item }}</td>
                                            <td>{{ $sale_order->description }}</td>
                                            <td>{{ $sale_order->uom }}</td>
                                            <td>{{ $sale_order->sale_order_qty }}</td>
                                            <td>{{ $sale_order->delivery_qty }}</td>
                                            <td>{{ $sale_order->remaining_qty }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Status</td>
                                            <td colspan="2"><b>{{ $sale_order->status }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Kod Buku</td>
                                            <td colspan="2">{{ $sale_order->kod_buku }}</td>
                                        </tr>
                                        <tr>
                                            <td>Catekan</td>
                                            <td colspan="2">{{ $sale_order->catekan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Size</td>
                                            <td colspan="2">{{ $sale_order->size }}</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2">Pages</td>
                                            <td>Cover</td>
                                            <td>{{ $sale_order->pages_cover }}</td>
                                        </tr>
                                        <tr>
                                            <td>Text </td>
                                            <td>{{ $sale_order->pages_text }}</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2">Paper</td>
                                            <td>cover</td>
                                            <td>{{ $sale_order->paper_cover }}</td>
                                        </tr>
                                        <tr>
                                            <td>text </td>
                                            <td>{{ $sale_order->paper_text }}</td>
                                        </tr>

                                        <tr>
                                            <td rowspan="2">Priting</td>
                                            <td>Cover</td>
                                            <td>{{ $sale_order->printing_cover }}</td>
                                        </tr>
                                        <tr>
                                            <td>text</td>
                                            <td>{{ $sale_order->printing_text }}</td>
                                        </tr>
                                        <tr>
                                            <td>Finishing</td>
                                            <td colspan="2">{{ $sale_order->finishing }}</td>
                                        </tr>
                                        <tr>
                                            <td>Binding</td>
                                            <td colspan="2">{{ $sale_order->binding }}</td>
                                        </tr>
                                        <tr>
                                            <td>Shrinking wrapping</td>
                                            <td colspan="2">{{ $sale_order->shrinking_wrapping }}</td>
                                        </tr>

                                        <tr>
                                            <td>Extra Stock</td>
                                            <td colspan="2">{{ $sale_order->extra_stock }}</td>
                                        </tr>
                                        <tr>
                                            <td>Remarks</td>
                                            <td colspan="2">{{ $sale_order->remarks }}</td>
                                        </tr>

                                        <tr>
                                            <td>Delivery Date</td>
                                            <td colspan="2">{{ $sale_order->delivery_date }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 float-left">
                                <div class="row">
                                    <div class="col-md-1 mt-4">
                                        <a @if($sale_order->soft_copy != null) target="_blank" href="{{ asset('/soft_copy/') }}/{{ $sale_order->soft_copy }}"
                                            download="{{ asset('/soft_copy/') }}/{{ $sale_order->soft_copy }}" title="Download Soft Copy" @endif class="btn btn-secondary"><i
                                            class="fa fa-download"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h3><b>Apprved By</b></h3>
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
                                            <td>{{ $sale_order->approved_by_date }}</td>
                                            <td>{{ $sale_order->approved_by_user }}</td>
                                            <td>{{ $sale_order->approved_by_designation }}</td>
                                            <td>{{ $sale_order->approved_by_department }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h3><b>Published By</b></h3>
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
                                            <td>{{ $sale_order->published_by_date }}</td>
                                            <td>{{ $sale_order->published_by_user }}</td>
                                            <td>{{ $sale_order->published_by_designation }}</td>
                                            <td>{{ $sale_order->published_by_department }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <a class="ti-arrow-left mx-2 mt-1"></i> Back to list</a> <a href="{{ route('sale_order') }}"
                        class="btn d-flex">
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
