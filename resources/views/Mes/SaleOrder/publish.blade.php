@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>Sales Order List</h5>
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
                            <div class="box" style="width:400px; padding:10px; height:180px; border:1px solid black;">
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
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <p>Sales order No <span style="margin-left:20px;">:</span>
                                            <snap style="margin-left:20px;">SO-001496</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <p>PO No <span style="margin-left:20px;">:</span>
                                            <snap style="margin-left:20px;">PO-00308</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <p>Trems <span style="margin-left:20px;">:</span>
                                            <snap style="margin-left:20px;">Net 120 days</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <p>Date <span style="margin-left:20px;">:</span>
                                            <snap style="margin-left:20px;">15/09/2023</span>
                                        </p>
                                    </div>
                                </div>

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
                                        <th>Sales orderQTY</th>
                                        <th>Deilivery Quantity</th>
                                        <th>Remaining Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>IQRO GENIUS - RUMI(NEW COVER)</td>
                                        <td>Unit</td>
                                        <td>5000</td>
                                        <td>5000</td>
                                        <td>0</td>
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
                                        <td colspan="2"><b>REPEAT</b></td>
                                    </tr>
                                    <tr>
                                        <td>Kod Buu</td>
                                        <td colspan="2">CP-XXXX</td>
                                    </tr>
                                    <tr>
                                        <td>Catekan</td>
                                        <td colspan="2">4</td>
                                    </tr>
                                    <tr>
                                        <td>Size</td>
                                        <td colspan="2">15cm X 21cm</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">Pages</td>
                                        <td>Cover</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Text </td>
                                        <td>1966</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">Paper</td>
                                        <td>cover</td>
                                        <td>1/artcard 260 gsm</td>
                                    </tr>
                                    <tr>
                                        <td>text </td>
                                        <td>Simily 70gsm</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="2">Priting</td>
                                        <td>Cover</td>
                                        <td>4C</td>
                                    </tr>
                                    <tr>
                                        <td>text</td>
                                        <td>4C</td>
                                    </tr>
                                    <tr>
                                        <td>Finishing</td>
                                        <td colspan="2">Matt Lamination + SpotUV</td>
                                    </tr>
                                    <tr>
                                        <td>Binding</td>
                                        <td colspan="2">Perfect Bind</td>
                                    </tr>
                                    <tr>
                                        <td>Shrinking wrapping</td>
                                        <td colspan="2">No</td>
                                    </tr>

                                    <tr>
                                        <td>Extra Stock</td>
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td>Remarks</td>
                                        <td colspan="2">Approved By CTP on 20.09.2023</td>
                                    </tr>

                                    <tr>
                                        <td>Deilivery Date</td>
                                        <td colspan="2"></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
                    </div>


                    <div class="col-md-5 float-left">
                        <label for="">SoftCopy Upload</label>
                        <input type="file" name="" id="" class="form-control ">
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <button class="btn btn-primary ">publish</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <a class="ti-arrow-left mx-2 mt-1"></i> Back to list</a> <a href="{{route('sale_order')}}"
                    class="btn d-flex"></a>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
