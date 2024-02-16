@extends('layouts.app')
@section('content')
<form action="{{ route('rekod_serahan_plate.store') }}" method="POST">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>REKOD SERAHAN PLATE CETAK DAN SAMPLE</h5>

                            <div class="card" style="background:#f1f0f0;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="">Date</label>
                                                <input type="date" name="date" value="{{ date('Y-m-d') }}"
                                                    id="Currentdate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="">Disediakan Oleh (Unit CTP)</label>
                                            <input type="text" value="{{ Auth::user()->full_name }}" readonly id=""
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="label">Diterima Oleh</div>
                                                <select name="user[]" class="form-control form-select" id="" multiple>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}" @if(old('user')) {{ in_array($user->id, old('user')) ? 'selected' : '' }} @endif>
                                                            {{ $user->full_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="label">Sales Order No.</div>
                                                <select name="sale_order" id="sale_order" class="form-control">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Jenis</div>
                                            <select name="jenis" class="form-control form-select">
                                                <option value="Cover" @selected(old('jenis')=='Cover' )>Cover</option>
                                                <option value="Teks" @selected(old('jenis')=='Teks' )>Teks</option>
                                                <option value="Other" @selected(old('jenis')=='Other' )>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Mesin</div>
                                            <select name="mesin" class="form-control form-select" id="">
                                                <option value="P1" @selected(old('mesin')=='P1' )>P1</option>
                                                <option value="P2" @selected(old('mesin')=='P2' )>P2</option>
                                                <option value="P3" @selected(old('mesin')=='P3' )>P3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Seksyen No.</div>
                                            <input type="text" value="" name="seksyen_no" id="" class="form-control"
                                                value="{{ old('seksyen_no') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="label">Kuaniti Plate.</div>
                                            <input type="text" value="" name="kuaniti_plate" id="" class="form-control"
                                                value="{{ old('kuaniti_plate') }}">
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
                                            <td><input type="checkbox" class="Cover1"
                                                    onchange="handleCheckboxChange('Cover1',this)" name="dummy_lipat"
                                                    id="" value="ok">
                                            </td>
                                            <td><input type="checkbox" class="Cover1"
                                                    onchange="handleCheckboxChange('Cover1',this)" checked
                                                    name="dummy_lipat" value="ng" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Sample</td>
                                            <td><input type="checkbox" class="Cover2"
                                                    onchange="handleCheckboxChange('Cover2',this)" name="sample" id=""
                                                    value="ok">
                                            </td>
                                            <td><input type="checkbox" class="Cover2"
                                                    onchange="handleCheckboxChange('Cover2',this)" checked name="sample"
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
    </div>
    </div>
</form>
@endsection

@push('custom-scripts')
<script>
    //function handleCheckboxChange(className, checkbox) {
    //   if ($(checkbox).prop('checked')) {
    //$('.' + className).not($(checkbox)).prop('checked', false);
    //  }
    //}
    function handleCheckboxChange(className, checkbox) {
            if ($(checkbox).prop('checked')) {
              $(`.${ className }`).not(checkbox).prop('checked', false);
            }
        }





    $(document).ready(function () {
        $('#sale_order').select2({
            ajax: {
                url: '{{ route('sale_order.get') }}',
                dataType: 'json',
                delay: 1000,
                data: function (params) {
                    return {
                        q: params.term,
                        page: params.page || 1,
                    };
                },
                processResults: function (data, params) {
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
            templateResult: function (data) {
                if (data.loading) {
                    return "Loading...";
                }

                return $('<option value=' + data.id + '>' + data.order_no + '</option>');
            },
            templateSelection: function (data) {
                return data.name || null;
            }
        });

        $('#sale_order').on('change', function () {
            const id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{ route('sale_order.detail.get') }}',
                data: {
                    "id": id
                },
                success: function (data) {
                    $('#status').val(data.status);
                }
            });
        });
    });
</script>
@endpush
