@extends('layouts.app')

@section('content')
<form action="{{ route('plate_cetak.update', $plate_cetak->id) }}" method="POST">
    @csrf
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="float-left"><b>REKOD PEMERIKSAAN PLATE CETAK </b></h5>
                        <p class="float-right">TCSB-B44 (Rev .2)</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mt-3">
                        <div class="form-group">
                            <label for="">Tarikh</label>
                            <input type="text"  name="date" value="{{ \Carbon\Carbon::parse($plate_cetak->date)->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        @php
                        $timeIn24HourFormat = Carbon\Carbon::createFromFormat('h:i A', $plate_cetak->time)->format('H:i');
                        @endphp
                        <div class="form-label">Masa</div>
                        <input name="time" type="time" id="Currenttime"
                        value="{{$timeIn24HourFormat}}" class="form-control">
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="form-group">
                            <div class="form-label">Diperiksa oleh</div>
                            <input type="text" value="{{ Auth::user()->user_name }}" readonly
                                        class="form-control" name="" id="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label">Sales Order No.</div>
                            <select name="sale_order" data-id="{{ $plate_cetak->sale_order_id }}"
                                id="sale_order" class="form-control">
                                <option value="" selected disabled>Select Sales Order No.</option>
                                <option value="{{ $plate_cetak->sale_order_id }}" selected
                                    style="color: black; !important">
                                    {{ $plate_cetak->sale_order->order_no }}</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label">Tajuk</div>
                            <input type="text" readonly id="tajuk" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label">Kod Buku</div>
                            <input type="text" id="kod_buku" readonly class="form-control">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h5><b>PEMERIKSAAN PLATE CETAK </b></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Mesin</label>
                                    <select name="machine" id="Mesin" class="form-control form-select">
                                        <option selected disabled value="">Select any Mesin</option>
                                        <option value="P1" @selected($plate_cetak->machine == "P1")>P1</option>
                                        <option value="P2" @selected($plate_cetak->machine == "P2")>P2</option>
                                        <option value="P3" @selected($plate_cetak->machine == "P3")>P3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Seksyen</label>
                                    <input type="number" name="section" id="" value="{{ $plate_cetak->section }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Bahagain plate</label>
                                    <select  name="section_plate" id="" class="form-control form-select">
                                        <option selected disabled value="">Select any Bahagain plate</option>
                                        <option value="A" @selected($plate_cetak->section_plate == "A")>A</option>
                                        <option value="B" @selected($plate_cetak->section_plate == "B")>B</option>
                                        <option value="A/B" @selected($plate_cetak->section_plate == "A/B")>A/B</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12 mt-3">
                        <table class="table table-bordered table-warna" border="1">
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
                                    <td><input type="checkbox" class="checkbox" name="warna_1" @checked($plate_cetak->warna_1 == "yes")  value="{{ $plate_cetak->warna_1 }}" id=""></td>
                                    <td><input type="checkbox" class="checkbox" name="warna_2" @checked($plate_cetak->warna_2 == "yes")  value="{{ $plate_cetak->warna_2 }}" id=""></td>
                                    <td><input type="checkbox" class="checkbox" name="warna_3" @checked($plate_cetak->warna_3 == "yes")  value="{{ $plate_cetak->warna_3 }}" id=""></td>
                                    <td><input type="checkbox" class="checkbox" name="warna_4" @checked($plate_cetak->warna_4 == "yes")  value="{{ $plate_cetak->warna_4 }}" id=""></td>
                                    <td><input type="checkbox" class="checkbox" name="warna_5" @checked($plate_cetak->warna_5 == "yes")  value="{{ $plate_cetak->warna_5 }}" id=""></td>
                                    <td><input type="checkbox" class="checkbox"  name="warna_6" @checked($plate_cetak->warna_6 == "yes")  value="{{ $plate_cetak->warna_6 }}" id=""></td>
                                    <td><input type="text" name="warna_7" id="" value="{{ $plate_cetak->warna_7 }}" class="form-control"></td>
                                    <td><input type="text" name="warna_8" id="" value="{{ $plate_cetak->warna_8 }}" class="form-control"></td>
                                    <td><input type="text" name="warna_9" id="" value="{{ $plate_cetak->warna_9 }}" class="form-control"></td>
                                    <td><input type="checkbox" class="checkbox" name="warna_10" @checked($plate_cetak->warna_10 == "yes")  value="{{ $plate_cetak->warna_10 }}" id=""></td>
                                    <td><input type="checkbox" class="checkbox"  name="warna_11" @checked($plate_cetak->warna_11 == "yes")  value="{{ $plate_cetak->warna_11}}" id=""></td>
                                    <td><input type="checkbox" class="checkbox" name="warna_12" @checked($plate_cetak->warna_12 == "yes")  value="{{ $plate_cetak->warna_12 }}" id=""></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5><b>Nota</b></h5>
                        <span>
                            Periksa setiap plate cetak yang keluar dari plate processor mengikut kriteria yang
                            ditetapkan diatas
                        </span>
                    </div>
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
        <a href="{{route('plate_cetak')}}"><i class="ti-arrow-left mx-2 mt-1"></i>back to list</a>
    </div>
</div>
</form>
@endsection
@push('custom-scripts')
<script>

$(document).on('change','.checkbox',function() {
      $(this).val($(this).prop('checked') ? 'yes' : 'no');
    });

    $(document).ready(function () {
        $('#sale_order').trigger('change');

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
                if ($('#sale_order').data('id') == data.id) {
                    return $('<option value=' + data.id + ' selected>' + data.order_no +
                        '</option>');
                } else {
                    return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                }
            },
            templateSelection: function (data) {
                return data.text || null;
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
                        $('#kod_buku').val(data.kod_buku);
                        $('#tajuk').val(data.description);
                    }
                });
            });
</script>
@endpush
