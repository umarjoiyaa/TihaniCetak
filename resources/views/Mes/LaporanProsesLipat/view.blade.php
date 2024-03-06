@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="float-left">LAPORAN PROSES LIPAT</h5>
                                    <p class="float-right">TCSB-B61 (Rev.0)</p>
                                </div>
                            </div>

                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="text"  name="date" value="{{ \Carbon\Carbon::parse($laporan_proses_lipat->date)->format('d-m-Y') }}" class="form-control" id="datepicker" disabled pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Time</label>
                                    <input type="text" name="time" value="{{ $laporan_proses_lipat->time }}"
                                        id="Currenttime" class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div cclass="form-label">Checked By (Operator)</div>
                                        <input type="text" value="{{ $laporan_proses_lipat->user->full_name }}" readonly
                                            name="" id="checked_by" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div cclass="form-label">Sales Order No.</div>
                                        <input type="text" value="{{ $laporan_proses_lipat->sale_order->order_no }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div cclass="form-label">Tajuk</div>
                                        <input type="text" value="{{ $laporan_proses_lipat->sale_order->description }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div cclass="form-label">Kod Buku</div>
                                        <input type="text" value="{{ $laporan_proses_lipat->sale_order->kod_buku }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Mesin</label>
                                        <input type="text" value="{{ $laporan_proses_lipat->mesin }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Operator</label>
                                        @php
                                            $item = json_decode($laporan_proses_lipat->user_id);
                                        @endphp
                                        <select disabled name="user[]" class="form-control form-select" id=""
                                            multiple>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    @if ($item) {{ in_array($user->id, $item) ? 'selected' : '' }} @endif>
                                                    {{ $user->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div cclass="form-label">Seksyen No.</div>
                                        <input type="text" name="seksyen_no" id=""
                                            value="{{ $laporan_proses_lipat->seksyen_no }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5" style="background:#f4f4ff;">
                        <div class="col-md-12 ">
                            <h5><b>B) Pemeriksaan dan Pengesahan 1st Piece</b> </h5>
                        </div>
                        <div class="col-md-8 mt-5">

                            <table class="table table-bordered text-center" id="tableSection">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Seksyen</th>
                                        <th colspan="4">kriteria</th>

                                    </tr>
                                    <tr>
                                        <th>Jenis lipatan</th>
                                        <th>Kedudukan lipatan</th>
                                        <th>Turutan muka surat</th>
                                        <th>kotor / koyak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $key => $detail)
                                        <tr>
                                            <td>{{ $detail->b_1 }} <input type="hidden" value="{{ $detail->b_1 }}"
                                                    name="pengesahan[{{ $key + 1 }}][1]">
                                            </td>
                                            <td><input type="checkbox" name="pengesahan[{{ $key + 1 }}][2]"
                                                    @checked($detail->b_2 != null)></td>
                                            <td><input type="checkbox" name="pengesahan[{{ $key + 1 }}][3]"
                                                    @checked($detail->b_3 != null) id=""></td>
                                            <td><input type="checkbox" name="pengesahan[{{ $key + 1 }}][4]"
                                                    @checked($detail->b_4 != null) id=""></td>
                                            <td><input type="checkbox" name="pengesahan[{{ $key + 1 }}][5]"
                                                    @checked($detail->b_5 != null) id=""></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-5" style="background:#f4f4ff;">
                        <div class="col-md-12 mt-5">
                            <h5><b>C) Pemeriksaan semasa proses lipat</b> </h5>
                            <h5><b>Petunjuk:</b></h5>
                            <span><b>KL = Kedudukan Lipatan</b></span><br>
                            <span><b> K= Koyak/Kotor/Kedut</b></span>
                        </div>

                        <div class="col-md-12">


                            <div class="row mt-3">
                                <div class="col-md-2">
                                    <ul class="nav nav-tabs flex-column" style="width:100%;" id="myTab"
                                        role="tablist">
                                        @foreach ($sections as $key1 => $section)
                                            <li class="nav-item">
                                                <a class="nav-link {{ $key1 == 0 ? 'active' : '' }}"
                                                    id="tab{{ $key1 }}" data-toggle="tab"
                                                    href="#Seksyen{{ $section->row }}" role="tab"
                                                    aria-controls="Seksyen{{ $section->row }}"
                                                    aria-selected="{{ $key1 == 0 ? 'true' : 'false' }}">Seksyen
                                                    {{ $section->row }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-10">
                                    <div class="tab-content" id="myTabContent">
                                        @foreach ($sections as $key1 => $section)
                                            <div class="tab-pane fade {{ $key1 == 0 ? 'show active' : '' }}"
                                                id="Seksyen{{ $section->row }}" role="tabpanel"
                                                aria-labelledby="tab{{ $key1 }}">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2">Jumlah </th>
                                                                <th colspan="2">Seksyen {{ $section->row }}</th>
                                                                <th rowspan="2">Check</th>
                                                                <th rowspan="2">Username / datetime</th>
                                                                <th rowspan="2">Verify</th>
                                                                <th rowspan="2">Username / datetime</th>
                                                            </tr>
                                                            <tr>
                                                                <th>KL</th>
                                                                <th>K</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($detailss as $key2 => $value1)
                                                                @if ($value1->row == $section->row)
                                                                    <tr>
                                                                        <td>{{ $value1->c_2 }} <input type="hidden"
                                                                                value="{{ $value1->c_2 }}"></td>
                                                                        <td><input type="checkbox"
                                                                                @checked($value1->c_3 != null)>
                                                                        </td>
                                                                        <td><input type="checkbox"
                                                                                @checked($value1->c_4 != null)>
                                                                        </td>
                                                                        <td><button type="button"
                                                                                class="btn btn-primary check_btn"
                                                                                style="border-radius:5px;"
                                                                                disabled>check</button>
                                                                        </td>
                                                                        <td><input type="text"
                                                                                class="check_operator form-control"
                                                                                readonly value="{{ $value1->c_5 }}">
                                                                        </td>
                                                                        <td><button type="button"
                                                                                class="btn btn-primary verify_btn"
                                                                                disabled>Verify</button>
                                                                        </td>
                                                                        <td><input type="text"
                                                                                class="verify_operator form-control"
                                                                                readonly value="{{ $value1->c_6 }}"></td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <h3><b>Verified By</b></h3>
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
                                        <td>{{ $laporan_proses_lipat->verified_by_date }}</td>
                                        <td>{{ $laporan_proses_lipat->verified_by_user }}</td>
                                        <td>{{ $laporan_proses_lipat->verified_by_designation }}</td>
                                        <td>{{ $laporan_proses_lipat->verified_by_department }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <a href="{{ route('laporan_proses_lipat') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
    </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('input').attr('disabled', 'disabled');
        });
    </script>
@endpush
