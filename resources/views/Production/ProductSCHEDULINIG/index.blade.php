@extends('layouts.app')

@section('css')
    <style>
        table{
            border:1px solid #000;
        }
        table tr td{
            width:120px;
            height:120px;
        }

        table tr td .btn{
            width:120px;
            height:30px;
            font-size:9px;
            background:	#f6c492;
        }
    </style>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2><b>PRODUCTION SCHEDULING</b></h2>
                    <div class="card" style="background:#f1f0f0; border-radius:5px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <h3 class="py-4"><b>February 2023</b></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-light">
                                        <thead>
                                            <tr>
                                                <th>Sun</th>
                                                <th>Mon</th>
                                                <th>Tue</th>
                                                <th>Wed</th>
                                                <th>Thu</th>
                                                <th>Fri</th>
                                                <th>Sat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-right">1</td>
                                                <td class="text-right">2</td>
                                                <td class="text-right">3 <br>
                                                    <button class="btn p-auto" data-toggle="modal" data-target="#exampleModal">View Event</button>
                                                </td>
                                                <td class="text-right">4</td>
                                                <td class="text-right">5</td>
                                                <td class="text-right">6</td>
                                                <td class="text-right">7</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">8</td>
                                                <td class="text-right">9</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">11</td>
                                                <td class="text-right">12</td>
                                                <td class="text-right">13</td>
                                                <td class="text-right">14</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">15</td>
                                                <td class="text-right">16</td>
                                                <td class="text-right">17</td>
                                                <td class="text-right">18</td>
                                                <td class="text-right">19</td>
                                                <td class="text-right">20</td>
                                                <td class="text-right">21</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">22</td>
                                                <td class="text-right">23</td>
                                                <td class="text-right">24</td>
                                                <td class="text-right">25</td>
                                                <td class="text-right">26</td>
                                                <td class="text-right">27</td>
                                                <td class="text-right">28</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width:1000px; margin-left:-250px;">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">SCHEDULE EVENTSS</h3>
                <h3 class="float-right">3-2-2023</h3>
               
            </div>
            <div class="modal-body">
                <table class="table table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th>Sales Order No</th>
                            <th>kod Buku</th>
                            <th>Tajuk</th>
                            <th>Machine Name</th>
                            <th>Process</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SO-001496</td>
                            <td>CP 2940</td>
                            <td>IQRO GENIUS-RUMI (NEW COVER)</td>
                            <td>A,B,C,D</td>
                            <td>1440</td>
                            <td>Diperiksa</td>
                        </tr>
                    </tbody>
                </table>
            </div>
           
            </div>
        </div>
    </div>
@endsection