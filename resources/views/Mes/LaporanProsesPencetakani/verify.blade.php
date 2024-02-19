@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="float-left"><b>LAPORAN PROSES PENCETAKANl</b></h5>
                                <p class="float-right">TCBS-B61 (Rev.0)</p>
                            </div>
                        </div>

                        <div class="card" style="background:#f1f0f0;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Date</label>
                                            <input type="date" name="date"
                                                value="{{ $laporan_proses_pencetakani->date }}" id="Currentdate"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Time</label>
                                        <input type="time" name="time" value="{{ $laporan_proses_pencetakani->time }}"
                                            id="Currenttime" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Checked By (Operator)</div>
                                            <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                                name="" id="checked_by" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Sales Order No.</div>
                                            <input type="text"
                                                value="{{ $laporan_proses_pencetakani->sale_order->order_no }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Tajuk</div>
                                            <input type="text"
                                                value="{{ $laporan_proses_pencetakani->sale_order->description }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Kod Buku</div>
                                            <input type="text"
                                                value="{{ $laporan_proses_pencetakani->sale_order->kod_buku }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Seksyen No.</div>
                                            <input type="text" name="seksyen_no" id=""
                                                value="{{ $laporan_proses_pencetakani->seksyen_no }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Kuantiti cetakan</div>
                                            <input type="number" value="{{ $laporan_proses_pencetakani->kuaniti_cetakan }}"
                                                name="kuaniti_cetakan" id="" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Kuantiti waste</label>
                                            <input type="number" value="{{ $laporan_proses_pencetakani->kuaniti_waste }}"
                                                name="kuaniti_waste" id="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Operator</label>
                                            @php
                                                $item = json_decode($laporan_proses_pencetakani->user_id);
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

                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <h5><b>B) Pemeriksaan dan Pengesahan 1st Piece</b> </h5>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-7 mt-3">

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">kriteria</th>
                                                    <th colspan="3">cover</th>

                                                </tr>
                                                <tr>
                                                    <th>OK</th>
                                                    <th>NG</th>
                                                    <th>NA</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>1</td>
                                                    <td>Saiz produk (Ukur dan rujuk saiz pada Job Sheet)</td>
                                                    <td><input type="checkbox" name="b_1" id="" value="ok"
                                                            @checked($laporan_proses_pencetakani->b_1 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_1" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_1 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_1" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_1 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Artwork (Semak gambar dan teks)</td>
                                                    <td><input type="checkbox" name="b_2" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_2 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_2" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_2 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_2" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_2 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Kotor, calar (Periksa setiap muka surat)</td>
                                                    <td><input type="checkbox" name="b_3" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_3 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_3" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_3 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_3" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_3 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Jenis penjilidan (stitching, perfect bind, hardcover)</td>
                                                    <td><input type="checkbox" name="b_4" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_4 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_4" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_4 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_4" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_4 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Jumlah mukasurat (Rujuk Job Sheet dan file artwork)</td>
                                                    <td><input type="checkbox" name="b_5" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_5 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_5" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_5 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_5" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_5 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Turutan mukasurat (Berturutan)</td>
                                                    <td><input type="checkbox" name="b_6" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_6 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_6" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_6 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_6" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_6 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>Kelekatan matt/gloss lamination</td>
                                                    <td><input type="checkbox" name="b_7" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_7 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_7" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_7 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_7" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_7 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Koyak (Terkoyak / Rosak)</td>
                                                    <td><input type="checkbox" name="b_8" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_8 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_8" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_8 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_8" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_8 == 'na')></td>

                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>Imej/artwork terpotong</td>
                                                    <td><input type="checkbox" name="b_9" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_9 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_9" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_9 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_9" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_9 == 'na')></td>
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td>Cop (Cop pada setiap mockup)</td>
                                                    <td><input type="checkbox" name="b_10" id=""
                                                            value="ok" @checked($laporan_proses_pencetakani->b_10 == 'ok')></td>
                                                    <td><input type="checkbox" name="b_10" id=""
                                                            value="ng" @checked($laporan_proses_pencetakani->b_10 == 'ng')>
                                                    </td>
                                                    <td><input type="checkbox" name="b_10" id=""
                                                            value="na" @checked($laporan_proses_pencetakani->b_10 == 'na')></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form
                            action="{{ route('laporan_proses_pencetakani.approve.approve', $laporan_proses_pencetakani->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mt-5">
                                        <div class="col-md-12">
                                            <h5>C) Pemeriksaan semasa proses Pencetakan</h5>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="table-responsive">

                                                <table class="table table-bordered" id="table">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2">Jumlah</th>
                                                            <th colspan="7">Kriteria</th>
                                                            <th rowspan="2">Check</th>
                                                            <th rowspan="2">Check (Operator)</th>
                                                            <th rowspan="2">Verify (QC)</th>
                                                            <th rowspan="2">Verify</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Gambar/teks</th>
                                                            <th>warna</th>
                                                            <th>Register depan belakang</th>
                                                            <th>Tiada set off, kotor, hickies</th>
                                                            <th>Tiada doubling</th>
                                                            <th>Periksa powder</th>
                                                            <th>Frontlay & sidelay</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($details as $detail)
                                                            <tr>
                                                                <td>{{ $detail->c_1 }}</td>
                                                                <td><input type="checkbox" id=""
                                                                        @checked($detail->c_2 != null)>
                                                                </td>
                                                                <td><input type="checkbox" id=""
                                                                        @checked($detail->c_3 != null)>
                                                                </td>
                                                                <td><input type="checkbox" id=""
                                                                        @checked($detail->c_4 != null)>
                                                                </td>
                                                                <td><input type="checkbox" id=""
                                                                        @checked($detail->c_5 != null)>
                                                                </td>
                                                                <td><input type="checkbox" id=""
                                                                        @checked($detail->c_6 != null)>
                                                                </td>
                                                                <td><input type="checkbox" id=""
                                                                        @checked($detail->c_7 != null)>
                                                                </td>
                                                                <td><input type="checkbox" id=""
                                                                        @checked($detail->c_8 != null)>
                                                                </td>
                                                                <td><button type="button"
                                                                        class="btn btn-primary check_btn"
                                                                        style="border-radius:5px;" disabled>check</button>
                                                                </td>
                                                                <td><input type="text" value="{{ $detail->c_9 }}"
                                                                        class="check_operator form-control" readonly></td>
                                                                <td><button type="button"
                                                                        class="btn btn-primary verify_btn">Verify</button>
                                                                </td>
                                                                <td><input type="text"
                                                                        name="semasa[{{ $detail->id }}][1]"
                                                                        class="verify_operator form-control" readonly></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit"> Verify</button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-12">
                                <form
                                    action="{{ route('laporan_proses_pencetakani.approve.decline', $laporan_proses_pencetakani->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <button class="btn btn-danger mx-2" type="submit">Decline</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('laporan_proses_pencetakani') }}">back to list</a>
        </div>
    </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('input').attr('disabled', 'disabled');
            $('.verify_operator').removeAttr('disabled');
            $('input[type="hidden"]').removeAttr('disabled');
        });

        function formatDate(date) {
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Month is zero-based
            const year = date.getFullYear();
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');

            return `${day}-${month}-${year} ${hours}:${minutes}`;
        }

        $(document).on('click', '.verify_btn', function() {
            $(this).attr('disabled', 'disabled');
            const currentDate = new Date();
            const formattedDate = formatDate(currentDate);
            let checked_by = $('#checked_by').val();
            $(this).closest('tr').find('.verify_operator').val(checked_by + '/' + formattedDate);
        });
    </script>
@endpush