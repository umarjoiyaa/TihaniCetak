@extends('layouts.app')
@section('content')
    <form action="{{ route('rekod_serahan_plate.update', $rekod_serahan_plate->id) }}" method="POST">
        @csrf
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
                                                <input type="date" name="date"
                                                    value="{{ $rekod_serahan_plate->date }}" id="Currentdate"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="">Disediakan Oleh (Unit CTP)</label>
                                            <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                                id="" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Diterima Oleh</div>
                                                @php
                                                    $item = json_decode($rekod_serahan_plate->user_id);
                                                @endphp
                                                <select name="user[]" class="form-control form-select" id=""
                                                    multiple>
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
                                                <select name="sale_order"
                                                    data-id="{{ $rekod_serahan_plate->sale_order_id }}" id="sale_order"
                                                    class="form-control">
                                                    <option value="{{ $rekod_serahan_plate->sale_order_id }}" selected
                                                        style="color: black; !important">
                                                        {{ $rekod_serahan_plate->sale_order->order_no }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Jenis</div>
                                                <select name="jenis" class="form-control form-select">
                                                    <option value="Cover" @selected($rekod_serahan_plate->jenis == 'Cover')>Cover</option>
                                                    <option value="Teks" @selected($rekod_serahan_plate->jenis == 'Teks')>Teks</option>
                                                    <option value="Other" @selected($rekod_serahan_plate->jenis == 'Other')>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Mesin</div>
                                                <select name="mesin" class="form-control form-select" id="">
                                                    <option value="P1" @selected($rekod_serahan_plate->mesin == 'P1')>P1</option>
                                                    <option value="P2" @selected($rekod_serahan_plate->mesin == 'P2')>P2</option>
                                                    <option value="P3" @selected($rekod_serahan_plate->mesin == 'P3')>P3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Seksyen No.</div>
                                                <input type="text" name="seksyen_no" id="" class="form-control"
                                                    value="{{ $rekod_serahan_plate->seksyen_no }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Kuaniti Plate.</div>
                                                <input type="text" name="kuaniti_plate" id=""
                                                    class="form-control" value="{{ $rekod_serahan_plate->kuaniti_plate }}">
                                            </div>
                                        </div>


                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="">status Job</label>
                                                <input type="text" readonly id="status" class="form-control">
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
                                                <td><input type="checkbox" @checked($rekod_serahan_plate->dummy_lipat == 'ok') name="dummy_lipat"
                                                        id="" value="ok">
                                                </td>
                                                <td><input type="checkbox" @checked($rekod_serahan_plate->dummy_lipat == 'ng') name="dummy_lipat"
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
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary float-right">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('rekod_serahan_plate') }}">back to list</a>
            </div>
    </form>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#sale_order').trigger('change');
            $('#sale_order').select2({
                ajax: {
                    url: '{{ route('sale_order.get') }}',
                    dataType: 'json',
                    delay: 1000,
                    data: function(params) {
                        return {
                            q: params.term,
                            page: params.page || 1,
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;

                        return {
                            results: data.results,
                            pagination: {
                                more: data.pagination.more
                            }
                        };
                    },
                    cache: true
                },
                containerCssClass: 'form-control',
                templateResult: function(data) {
                    if (data.loading) {
                        return "Loading...";
                    }

                    return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                },
                templateSelection: function(data) {
                    return data.name || null;
                }
            });

        });
        $('#sale_order').on('change', function() {
            const id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{ route('sale_order.detail.get') }}',
                data: {
                    "id": id
                },
                success: function(data) {
                    $('#status').val(data.status);
                }
            });
        });
    </script>
@endpush
