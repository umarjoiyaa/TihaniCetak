@extends('layouts.app')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Senarai Semak Pencetakan Digital</h5>

                        <div class="card" style="background:#f1f0f0;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Date</label>
                                            <input type="date" name="date" value="{{ $rekod_serahan_plate->date }}"
                                                id="Currentdate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Disediakan Oleh (Unit CTP)</label>
                                        <input type="text" value="{{ $rekod_serahan_plate->user->full_name }}" readonly
                                            id="" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Diterima Oleh</div>
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
                                            <div class="label">Sales Order No.</div>
                                            <input type="text" value="{{ $rekod_serahan_plate->sale_order->order_no }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Jenis</div>
                                            <input type="text" class="form-control"
                                                value="{{ $rekod_serahan_plate->jenis }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Mesin</div>
                                            <input type="text" class="form-control"
                                                value="{{ $rekod_serahan_plate->mesin }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Seksyen No.</div>
                                            <input type="text" readonly name="seksyen_no" id=""
                                                class="form-control" value="{{ $rekod_serahan_plate->seksyen_no }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Kuaniti Plate.</div>
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
                                <h5>Bahagian A ( Semakan File)</h5>
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
            <a href="{{ route('rekod_serahan_plate') }}">back to list</a>
        </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('input').attr('disabled', 'disabled');
        });
    </script>
@endpush