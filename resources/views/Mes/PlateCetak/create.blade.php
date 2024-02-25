@extends('layouts.app')

@section('content')
<form action="{{ route('plate_cetak.store') }}" method="POST">
    @csrf
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="row">
                    <div class="col-md-12">
                        <h5 class="float-left">REKOD PEMERIKSAAN PLATE CETAK </h5>
                        <p class="float-right">TCSB-B44 (Rev .2)</p>
                    </div>
                </div>
            </div>
            <div class="card-body">


                <div class="row">
                    <div class="col-md-4 mt-3">
                        <div class="form-group">
                            <label for="">Tarikh</label>
                            <input type="text" name="date" value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">


                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="">Masa</label>
                        <input name="time" type="time" id="Currenttime"
                        value="{{ Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('H:i') }}"
                        class="form-control">
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="form-group">
                            <div class="label">Diperiksa oleh</div>
                            <input type="text" value="{{ Auth::user()->user_name }}" readonly
                                        class="form-control" name="" id="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="label">Sales Order No.</div>
                            <select name="sale_order" id="sale_order"  class="form-control form-select">
                                <option value="" selected disabled>Select any Sale Order</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="label">Tajuk</div>
                            <input type="text" readonly  id="tajuk" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="label">Kod Buku</div>
                            <input type="text"  readonly name="" id="kod_buku" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <h5><b>PEMERIKSAAN PLATE CETAK </b></h5>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Mesin</label>
                            <select name="machine" id="Mesin" class="form-control form-select">
                                <!-- <option selected disabled value="">Select any Mesin</option> -->
                                <option value="P1">P1</option>
                                <option value="P2">P2</option>
                                <option value="P3">P3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Seksyen</label>
                            <input type="number" name="section" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Bahagain plate</label>
                            <select  name="section_plate" id="" class="form-control form-select">
                                <!-- <option selected disabled value="">Select any Bahagain plate</option> -->
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="A/B">A/B</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <table class="table table-bordered table-warna text-center" border="1">
                            <thead>
                                <tr>
                                    <td colspan="6">Warna</td>
                                    <td rowspan="2">Gripper</td>
                                    <td rowspan="2">Spacing</td>
                                    <td rowspan="2">Kedudukan Image/gambar</td>
                                    <td rowspan="2">Calar</td>
                                    <td rowspan="2">Kotor</td>
                                    <td rowspan="2">Pemeriksaan artwork (untuk cetakan yang melebihi 1 up)</td>
                                </tr>
                                <tr>
                                    <th>C</th>
                                    <th>M</th>
                                    <th>Y</th>
                                    <th>K</th>
                                    <th>P1</th>
                                    <th>P2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" class="checkbox" name="warna_1" value="no" id=""></td>
                                    <td><input type="checkbox" class="checkbox" name="warna_2" value="no" id=""></td>
                                    <td><input type="checkbox" class="checkbox" name="warna_3" value="no" id=""></td>
                                    <td><input type="checkbox" class="checkbox" name="warna_4" value="no" id=""></td>
                                    <td><input type="checkbox" class="checkbox" name="warna_5" value="no" id=""></td>
                                    <td><input type="checkbox" class="checkbox"  name="warna_6" value="no" id=""></td>
                                    <td><input type="text" name="warna_7" id="" class="form-control"></td>
                                    <td><input type="text" name="warna_8" id="" class="form-control"></td>
                                    <td><input type="text" name="warna_9" id="" class="form-control"></td>
                                    <td><input type="checkbox" class="checkbox" name="warna_10" value="no" id=""></td>
                                    <td><input type="checkbox" class="checkbox"  name="warna_11" value="no" id=""></td>
                                    <td><input type="checkbox" class="checkbox" name="warna_12" value="no" id=""></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-5s">

                    <div class="col-md-12">
                        <table class="table text-center table-bordered" border='1'>
                            <thead>
                                <tr>
                                    <td colspan="2">Mesin</td>
                                    <th>Saiz Gripper</th>
                                    <th>Saiz plate</th>
                                    <th>Kedudukan tengah (mm)</th>
                                    <th>Nota</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>P1</td>
                                    <td>8C</td>
                                    <td>52mm</td>
                                    <td>1030 X 800</td>
                                    <td>515</td>
                                    <td >-</td>
                                </tr>
                                <tr>
                                    <td>P3</td>
                                    <td>2C</td>
                                    <td>60mm</td>
                                    <td>1030 X 770</td>
                                    <td>515</td>
                                    <td >-</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">P4</td>
                                    <td rowspan="2">4C</td>
                                    <td>
                                        28mm
                                    </td>
                                    <td rowspan="2">
                                        910 X 665
                                    </td>
                                    <td rowspan="2">455</td>
                                    <td >1. Tambahan 5mm gripper margin jika cetakan ada hotstamping
                                        yang meliputi kawasan gripper.</td>
                                </tr>
                                <tr>
                                    <td>
                                        26mm
                                    </td>
                                    <td >2. Gripper 26mm hanya untuk kegunaan buku yang bersaiz 8” x8” sahaja.</td>
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
        <a href="{{route('plate_cetak')}}">back to list</a>
    </div>
</div>
</form>
@endsection
@push('custom-scripts')
<script>

$(document).on('change','.checkbox',function() {
      $(this).val($(this).prop('checked') ? 'yes' : 'no');
    });
        $(document).ready(function() {
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
                placeholder: "Select Sales Order No",
                templateResult: function(data) {
                    if (data.loading) {
                        return "Loading...";
                    }

                    return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                },
                templateSelection: function(data) {
                    return data.order_no || "Select Sales Order No";
                }
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
                        $('#kod_buku').val(data.kod_buku);
                        $('#tajuk').val(data.description);
                    }
                });
            });
        });
</script>
@endpush
