@extends('layouts.app')
@section('content')
<form action="{{ route('rekod_serahan_plate.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- <h5>REKOD SERAHAN PLATE CETAK DAN SAMPLE</h5> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="float-left">REKOD SERAHAN PLATE CETAK DAN SAMPLE</h5>
                                    <p class="float-right">TCSB-BO4(Rev.11)</p>
                                </div>
                            </div>
                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="text" name="date"
                                            value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}" class="form-control"
                                            id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">

                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <label for="">Disediakan Oleh (Unit CTP)</label>
                                    <input type="text" value="{{ Auth::user()->full_name }}" readonly id=""
                                        class="form-control">
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <div class="label">Diterima Oleh</div>
                                        <select name="user[]" class="form-control form-select" id="Oleh" multiple>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @if(old('user')) {{ in_array($user->id,
                                                old('user')) ? 'selected' : '' }} @endif>
                                                {{ $user->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select name="sale_order" id="sale_order" class="form-control">
                                            <option value="" selected disabled>Select any Sale Order</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <div class="label">Jenis</div>
                                        <select name="jenis" class="form-control form-select" id="jenis">
                                            <option value="Cover" @selected(old('jenis')=='Cover' )>Cover</option>
                                            <option value="Teks" @selected(old('jenis')=='Teks' )>Teks</option>
                                            <option value="Other" @selected(old('jenis')=='Other' )>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 OtherSection " style="display: none" >
                                    <div class="label">Other (Input)</div>
                                    <input type="text" name="user_input" id=""
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <div class="label">Mesin</div>
                                        <select name="mesin" class="form-control form-select" id="">
                                            <option value="P1" @selected(old('mesin')=='P1' )>P1</option>
                                            <option value="P2" @selected(old('mesin')=='P2' )>P2</option>
                                            <option value="P3" @selected(old('mesin')=='P3' )>P3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <div class="label">Seksyen No.</div>
                                        <input type="text" value="" name="seksyen_no" id="" class="form-control"
                                            value="{{ old('seksyen_no') }}">
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <div class="label">Kuaniti Plate.</div>
                                        <input type="text" value="" name="kuaniti_plate" id="" class="form-control"
                                            value="{{ old('kuaniti_plate') }}">
                                    </div>
                                </div>
                            </div>


                                <div class="row mt-2">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label for="">status Job</label>
                                        <input type="text" readonly id="status" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5" id="Status_tbl">
                        <h5>Diwajibkan untuk JOB BAHARU</h5>
                            <table class="table table-bordered" >
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
                                                onchange="handleCheckboxChange('Cover1',this)" name="dummy_lipat" id=""
                                                value="ok">
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
            $(`.${className}`).not(checkbox).prop('checked', false);
        }
    }

    $('#printSelect').change(function () {
        if ($(this).val() === "Other") {
            var newLabel = $("<label>", {
                    for: "newInput",
                    text: "Other (please input)"
                });

            var newInput = $("<input>", {
                type: "text",
                class: "form-control",
                id: "newInput"
            });

            // Clear existing content in #box and append the new input element
            $("#box").empty().append(newLabel, newInput);
        } else {
            // Clear the content of #box if an option other than "Other" is selected
            $("#box").empty();
        }
    });





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
            placeholder: "Select Sales Order No",
            templateResult: function (data) {
                if (data.loading) {
                    return "Loading...";
                }

                return $('<option value=' + data.id + '>' + data.order_no + '</option>');
            },
            templateSelection: function (data) {
                return data.order_no || "Select Sales Order No";
            }
        });


        $('#jenis').on('change', function () {
            var value = $(this).val();
            if (value == "Other") {
                $('.OtherSection').css('display','')
            }else{
                $('.OtherSection').css('display','none')
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
                    if (data.status == "Repeat") {
                        $('#Status_tbl').css('display','none')
                    }else if (data.status == "New"){
                        $('#Status_tbl').css('display','')
                    }
                }
            });
        });
    });
</script>
@endpush
