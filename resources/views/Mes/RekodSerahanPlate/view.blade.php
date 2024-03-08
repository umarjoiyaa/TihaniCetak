@extends('layouts.app')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="float-left"><b>REKOD SERAHAN PLATE CETAK DAN SAMPLE</b></h5>
                                    <p class="float-right">TCSB-BO4(Rev.11)</p>
                                </div>
                            </div>

                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Date</label>
                                            <input type="text"  name="date"  disabled value="{{ \Carbon\Carbon::parse($rekod_serahan_plate->date)->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">

                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Disediakan Oleh (Unit CTP)</label>
                                        <input type="text" value="{{ $rekod_serahan_plate->user->full_name }}" readonly
                                            id="" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label">Diterima Oleh</label>
                                            @php
                                                $item = json_decode($rekod_serahan_plate->user_id);
                                            @endphp
                                            <select disabled name="user[]" class="form-control form-select" id="" multiple>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}" @if ($item)
                                                        {{ in_array($user->id, $item) ? 'selected' : '' }} @endif>
                                                        {{ $user->full_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-label">Sales Order No.</div>
                                            <input type="text" value="{{ $rekod_serahan_plate->sale_order->order_no }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Jenis</div>
                                            <input type="text" id="jenis" class="form-control"
                                                value="{{ $rekod_serahan_plate->jenis }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 OtherSection " style="display: none" >
                                        <div class="form-label">Other (Input)</div>
                                        <input type="text" placeholder="User Input" value="{{ $rekod_serahan_plate->user_input }}" name="user_input" id=""
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Mesin</div>
                                            <input type="text" class="form-control"
                                                value="{{ $rekod_serahan_plate->mesin }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Seksyen No.</div>
                                            <input type="text" readonly name="seksyen_no" id=""
                                                class="form-control" value="{{ $rekod_serahan_plate->seksyen_no }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-label">Kuaniti Plate.</div>
                                            <input type="text" readonly name="kuaniti_plate" id=""
                                                class="form-control" value="{{ $rekod_serahan_plate->kuaniti_plate }}">
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">status Job</label>
                                            <input type="text" readonly id="status"
                                                value="{{ $rekod_serahan_plate->sale_order->status }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <h5>Diwajibkan untuk JOB BAHARU</h5>
                            </div>
                            <div class="col-md-7"></div>
                            <div class="col-md-5">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>item</th>
                                            <th>
                                                <div class="text-center">OK</div>
                                            </th>
                                            <th>NG</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Dummy Lipat</td>
                                            <td><input type="checkbox" @checked($rekod_serahan_plate->dummy_lipat == 'ok') name="dummy_lipit"
                                                    id="" value="ok">
                                            </td>
                                            <td><input type="checkbox" @checked($rekod_serahan_plate->dummy_lipat == 'ng') name="dummy_lipit"
                                                    value="ng" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Sample</td>
                                            <td><input type="checkbox" @checked($rekod_serahan_plate->sample == 'ok') name="sample"
                                                    id="" value="ok">
                                            </td>
                                            <td><input type="checkbox" @checked($rekod_serahan_plate->sample == 'ng') name="sample"
                                                    id="" value="ng"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('rekod_serahan_plate') }}"><i class="ti-arrow-left mx-2 mt-1"></i>back to list</a>
        </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('input').attr('disabled', 'disabled');

            var value = $('#jenis').val();
            if (value == "Other") {
                $('.OtherSection').css('display','')
            }else{
                $('.OtherSection').css('display','none')
            }
        });
    </script>
@endpush
