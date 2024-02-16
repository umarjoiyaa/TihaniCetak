@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5><b>LAPORAN PEMERIKSAAN KUALITI - PROSES PENJILIDAN PERFECT BIND</b></h5>

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
                                        <div class="label">Check By</div>
                                        <select name="" id="" class="form-control">
                                            <option value="" disabled>select sales Order no</option>
                                            <option value="">SO-001496</option>
                                        </select>
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
                                        <input type="text" readonly value="Auto Display" name="" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <div class="label">Mesin</div>
                                        <input type="text" value="PB1" readonly name="" id="" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <label for="">Jumlah Seksyen</label>
                                        <input type="text" readonly value="auto Display" name="" id=""
                                            class="form-control">
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
                                                    <td style="background:wheat;">Koyakan fiber</td>
                                                    <td><input type="checkbox" class="Cover1" onchange="handleCheckboxChange('Cover1',this)"  name="" id=""></td>
                                                    <td><input type="checkbox" class="Cover1" onchange="handleCheckboxChange('Cover1',this)" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Kedudukan Kulit buku dan teks</td>
                                                    <td><input type="checkbox" class="Text1" onchange="handleCheckboxChange('Text1',this)" name="" id=""></td>
                                                    <td><input type="checkbox" class="Text1" onchange="handleCheckboxChange('Text1',this)" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Kulit buku yang betul</td>
                                                    <td><input type="checkbox" class="Cover2" onchange="handleCheckboxChange('Cover2',this)" name="" id=""></td>
                                                    <td><input type="checkbox" class="Cover2" onchange="handleCheckboxChange('Cover2',this)" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Teks yang betul</td>
                                                    <td><input type="checkbox" class="Text2" onchange="handleCheckboxChange('Text2',this)" name="" id=""></td>
                                                    <td><input type="checkbox" class="Text2" onchange="handleCheckboxChange('Text2',this)" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Kedudukan gam</td>
                                                    <td><input type="checkbox" class="Cover3" onchange="handleCheckboxChange('Cover3',this)" name="" id=""></td>
                                                    <td><input type="checkbox" class="Cover3" onchange="handleCheckboxChange('Cover3',this)" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Turutan muka surat </td>
                                                    <td><input type="checkbox" class="Text3" onchange="handleCheckboxChange('Text3',this)" name="" id=""></td>
                                                    <td><input type="checkbox" class="Text3" onchange="handleCheckboxChange('Text3',this)" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Koyak</td>
                                                    <td><input type="checkbox" class="Cover4" onchange="handleCheckboxChange('Cover4',this)" name="" id=""></td>
                                                    <td><input type="checkbox" class="Cover4" onchange="handleCheckboxChange('Cover4',this)" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Kotor</td>
                                                    <td><input type="checkbox" class="Text4" onchange="handleCheckboxChange('Text4',this)" name="" id=""></td>
                                                    <td><input type="checkbox" class="Text4" onchange="handleCheckboxChange('Text4',this)" checked name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Pematuhan SOP</td>
                                                    <td><input type="checkbox" class="Cover5" onchange="handleCheckboxChange('Cover5',this)" name="" id=""></td>
                                                    <td><input type="checkbox" class="Cover5" onchange="handleCheckboxChange('Cover5',this)" checked name="" id=""></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="col-md-2" style="background:wheat; margin-top:150px; width:80px; height:150px; padding:5px 5px;">
                                    <h6 ><b style="color:#f5a000;">Notes:</b></h6>
                                    <span style="color:#f5a000;">1. Jumlah seksyen will be auto display based on jumlah seksyen in senarai semak Pra cetak of the same sales order no.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <h5><b>Nota :</b></h5>
                            <span>Pemeriksaan hanya dilakukan sekali semasa pengesahan 1st piece dan tidak perlu
                                dilakukan semasa proses</span>
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
                <a href="{{route('ProsesPenJilidanPrefectBind')}}"><i class="ti-angle-left mr-5 $indigo-100"></i>
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