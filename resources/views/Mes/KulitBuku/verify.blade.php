@extends('layouts.app')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="float-left">LAPORAN PEMERIKSAAN KUALITI - PEMOTONGAN KULIT BUKU/TEKS</h5>
                                    <p class="float-right">TCSB-B23 (Rev.5)</p>
                                </div>
                            </div>
                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Date</label>
                                            <input type="text"  name="date" disabled value="{{ \Carbon\Carbon::parse($kulit_buku->date)->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Time</label>
                                        <input type="text" name="time" value="{{ $kulit_buku->time }}"
                                            id="Currenttime" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label">Checked By</label>
                                            <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                                name="" id="checked_by" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Sales Order No.</div>
                                            <input type="text" value="{{ $kulit_buku->sale_order->order_no }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Tajuk</div>
                                            <input type="text"
                                                value="{{ $kulit_buku->sale_order->description }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Kod Buku</div>
                                            <input type="text" value="{{ $kulit_buku->sale_order->kod_buku }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">


                                    <div class="col-md-5 mt-3">
                                        <table class="table" border="1">
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
                                                    <td>Kelekatan OPP Lamination</td>
                                                    <td><input type="checkbox" class="Cover1"
                                                            onchange="handleCheckboxChange('Cover1',this)" name="b_1"
                                                            value="ok" @checked($kulit_buku->b_1 == 'ok') id=""></td>
                                                    <td><input type="checkbox" class="Cover1"
                                                            onchange="handleCheckboxChange('Cover1',this)" name="b_1"
                                                            value="ng" @checked($kulit_buku->b_1 == 'ng') id=""></td>
                                                    <td><input type="checkbox" class="Cover1"
                                                            onchange="handleCheckboxChange('Cover1',this)" name="b_1"
                                                            value="na" @checked($kulit_buku->b_1 == 'na') id=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Saiz Spacing</td>
                                                    <td><input type="checkbox" class="Text1"
                                                            onchange="handleCheckboxChange('Text1',this)" name="b_2"
                                                            value="ok" @checked($kulit_buku->b_2 == 'ok') id="">
                                                    </td>
                                                    <td><input type="checkbox" class="Text1"
                                                            onchange="handleCheckboxChange('Text1',this)" name="b_2"
                                                            value="ng" @checked($kulit_buku->b_2 == 'ng') id="">
                                                    </td>
                                                    <td><input type="checkbox" class="Text1"
                                                            onchange="handleCheckboxChange('Text1',this)" name="b_2"
                                                            value="na" @checked($kulit_buku->b_2 == 'na') id="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kedudukan potongan</td>
                                                    <td><input type="checkbox" class="Cover2"
                                                            onchange="handleCheckboxChange('Cover2',this)" name="b_3"
                                                            value="ok" @checked($kulit_buku->b_3 == 'ok') id="">
                                                    </td>
                                                    <td><input type="checkbox" class="Cover2"
                                                            onchange="handleCheckboxChange('Cover2',this)" name="b_3"
                                                            value="ng" @checked($kulit_buku->b_3 == 'ng') id="">
                                                    </td>
                                                    <td><input type="checkbox" class="Cover2"
                                                            onchange="handleCheckboxChange('Cover2',this)" name="b_3"
                                                            value="na" @checked($kulit_buku->b_3 == 'na') id="">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-12">
                                    <h4><b>Nota :</b></h4>
                                    <span>*Pemeriksaan kelekatan OPP lamination perlu dilakukan sebelum proses pemotongan kulit buku dibuat.
                                        <br> *Ambil 3 keping sampel bagi setiap palet secara rawak dari bahagian atas, tengah dan bawah untuk pemeriksaan kelekatan OPP Lamination. Jika hasil pemeriksaan gagal, maklumkan
                                            kepada Eksekutif QA/ Pengurus Operasi untuk tindakan lanjut. Rujuk Perbandingan Kelekatan OPP.  </span>
                                </div>
                            </div>

                        <div class="row d-flex justify-content-end">
                            <div class="col-md-12 d-flex justify-content-end">

                                <form action="{{ route('kulit_buku.approve.decline', $kulit_buku->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <button class="btn btn-danger mx-2" type="submit">Decline</button>
                                </form>
                                <form action="{{ route('kulit_buku.approve.approve', $kulit_buku->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" type="submit"> Verify</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('kulit_buku') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>

            </div>
        </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('input').attr('disabled', 'disabled');
            $('input[type="hidden"]').removeAttr('disabled');
        });
    </script>
@endpush
