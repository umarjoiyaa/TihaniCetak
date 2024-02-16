@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                   <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>LAPORAN PEMERIKSAAN KUALITI - PROSES PEMBUNGKUSANE</b></h5>
                            <p class="float-right">TCBS-B23 (Rev.5)</p>
                        </div>
                   </div>
                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="date" readonly name="" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Time</div>
                                        <input type="time" value="Admin" readonly name="" id=""
                                            class="form-control mt-1">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Checked By</div>
                                        <input type="text" value="Admin" readonly name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Sales Order No</div>
                                        <select name="" id="" class="form-control">
                                            <option value="" disabled>select sales Order no</option>
                                            <option value="">SO-001496</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text" value="auto Display" readonly name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" readonly value="auto Display" name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Mesin</div>
                                        <input type="text" value="ST1" readonly name="" id="" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <select name="" class="form-control" id="">
                                            <option value="">pilih Kategori</option>
                                            <option value="">Shrink Wrap + Packing</option>
                                            <option value="">Packing</option>
                                            <option value="">Kotak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5 mt-5">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">Kriteria</th>
                                                    <th colspan="2">Tanda bagi yang berkenaan</th>

                                                </tr>
                                                <tr>
                                                    <th>OK</th>
                                                    <th>NG</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td style="background:wheat;">Kuantiti yang  betul </td>
                                                    <td><input type="checkbox"  class="Cover1" onchange="handleCheckboxChange('Cover1',this)"   name="" id=""></td>
                                                    <td><input type="checkbox"  class="Cover1" onchange="handleCheckboxChange('Cover1',this)"  checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Koyak</td>
                                                    <td><input type="checkbox"  class="Text1" onchange="handleCheckboxChange('Text1',this)"   name="" id=""></td>
                                                    <td><input type="checkbox"  class="Text1" onchange="handleCheckboxChange('Text1',this)"  checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Kotor</td>
                                                    <td><input type="checkbox"  class="Cover2" onchange="handleCheckboxChange('Cover2',this)"   name="" id=""></td>
                                                    <td><input type="checkbox"  class="Cover2" onchange="handleCheckboxChange('Cover2',this)"  checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Pematuhan Sop</td>
                                                    <td><input type="checkbox"  class="Text2" onchange="handleCheckboxChange('Text2',this)"   name="" id=""></td>
                                                    <td><input type="checkbox"  class="Text2" onchange="handleCheckboxChange('Text2',this)"  checked name="" id=""></td>
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
                            <button class="btn btn-primary float-right mt-3">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('ProsesPembungkusan')}}"><i class="ti-angle-left mr-5 $indigo-100"></i>
                    back to list</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@push('custom-scripts')
<script>
     function handleCheckboxChange(className, checkbox) {
            if ($(checkbox).prop('checked')) {
              $(`.${ className }`).not(checkbox).prop('checked', false);
            }
        }
</script>
@endpush 