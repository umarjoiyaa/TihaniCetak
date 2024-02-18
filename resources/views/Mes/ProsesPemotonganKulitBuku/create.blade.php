@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="float-left"><b>LAPORAN PEMERIKSAAN KUALITI - PEMOTONGAN KULIT BUKU/ TEKS</b></h5>
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
                                    <input type="time" value="Admin" readonly name="" id="" class="form-control mt-1">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="label">Checked By</div>
                                    <input type="text" value="Admin" readonly name="" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="label">Sales Order No</div>
                                    <select name="" id="" class="form-control form-select">
                                        <option value="">select sales Order no</option>
                                        <option value="">SO-001496</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="label">Tajuk</div>
                                    <input type="text" value="auto Display (based SO)" readonly name="" id=""
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="label">Kod Buku</div>
                                    <input type="text" readonly value="auto Display (based SO)" name="" id=""
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
                                                <th colspan="3">Tanda bagi yang berkenaan</th>

                                            </tr>
                                            <tr>
                                                <th>OK</th>
                                                <th>NG</th>
                                                <th>NA</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td style="background:wheat;">Kelekatan OPP Lamination</td>
                                                <td><input type="checkbox" class="Cover1"
                                                        onchange="handleCheckboxChange('Cover1',this)" name="" id="">
                                                </td>
                                                <td><input type="checkbox" class="Cover1"
                                                        onchange="handleCheckboxChange('Cover1',this)" checked name=""
                                                        id=""></td>
                                                <td><input type="checkbox" class="Cover1"
                                                        onchange="handleCheckboxChange('Cover1',this)" name="" id="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Saiz spacing</td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" name="" id="">
                                                </td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" checked name=""
                                                        id=""></td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" name="" id="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kedudukan potongan</td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" name="" id="">
                                                </td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" checked name=""
                                                        id=""></td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" name="" id="">
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <h5><b>Nota :</b></h5>
                        <span>*Pemeriksaan kelekatan OPP lamination perlu dilakukan sebelum proses pemotongan kulit buku
                            dibuat. <br>
                            *Ambil 3 keping sampel bagi setiap palet secara rawak dari bahagian atas, tengah dan bawah
                            untuk pemeriksaan kelekatan OPP Lamination. Jika hasil pemeriksaan gagal, maklumkan kepada
                            Eksekutif QA/ Pengurus Operasi untuk tindakan lanjut. Rujuk Perbandingan Kelekatan OPP.
                        </span>
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
            <a href="{{route('ProsesPemotonganKulitBuku')}}"><i class="ti-angle-left mr-5 $indigo-100"></i>
                back to list</a>
        </div>
    </div>
</div>
@endsection
@push('custom-scripts')
<script>
    function handleCheckboxChange(className, checkbox) {
        if ($(checkbox).prop('checked')) {
            $(`.${className}`).not(checkbox).prop('checked', false);
        }
    }
</script>
@endpush