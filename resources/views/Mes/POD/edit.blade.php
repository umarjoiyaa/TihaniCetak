@extends('layouts.app')
@extends('layouts.app')

@section('content')
<form action="{{ route('pod.update', $pod->id) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>LAPORAN PEMERIKSAAN KUALITI - pod</b></h5>
                            <p class="float-right">TCBS-B61 (Rev.0)</p>
                        </div>
                    </div>


                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Tarikh</label>
                                        <input type="date"  name="date" id="" value="{{ $pod->date }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Masa</label>
                                    <input name="time" type="time" id="Currenttime"
                                    value="{{ $pod->time }}"
                                    class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Disemak Oleh</div>
                                        <input type="text" value="{{ Auth::user()->user_name }}" readonly
                                        class="form-control" name="" id="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select name="sale_order" data-id="{{ $pod->sale_order_id }}"
                                            id="sale_order" class="form-control">
                                            <option value="{{ $pod->sale_order_id }}" selected
                                                style="color: black; !important">
                                                {{ $pod->sale_order->order_no }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Tajuk</div>
                                        <input type="text" readonly  class="form-control" id="tajuk">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text"  readonly name="" id="kod_buku"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>


                                <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Kuantiti waste</label>
                                            <input type="text" readonly value="input text" name="" id="" class="form-control">
                                        </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Operator</label>
                                            <select name="" id="" class="form-control">
                                                <option value="" disabled>select sales Order no</option>
                                                <option value="">User A</option>
                                                <option value="">User B</option>
                                            </select>
                                        </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <h5>B) Pemeriksaan dan Pengesahan 1st Piece </h5>
                        </div>
                        <div class="col-md-11">

                            <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td rowspan="2">No</td>
                                            <td rowspan="2">kriteria</td>
                                            <td colspan="3">cover</td>

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
                                            <td><input type="checkbox"  name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Artwork (Semak gambar dan teks)</td>
                                            <td><input type="checkbox"  name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Kotor, calar (Periksa setiap muka surat)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Jenis penjilidan (stitching, perfect bind, hardcover)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Jumlah mukasurat (Rujuk Job Sheet dan file artwork)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Turutan mukasurat (Berturutan)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Kelekatan matt/gloss lamination</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Koyak (Terkoyak / Rosak)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>

                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Imej/artwork terpotong</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Cop (Cop pada setiap mockup)</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" checked name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>

                                    </tbody>
                                 </table>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <h5>C) Pemeriksaan semasa proses Pencetakan</h5>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td rowspan="2">Jumlah</td>
                                            <td colspan="7">Kriteria</td>
                                            <td rowspan="2">Check</td>
                                            <td rowspan="2">Check (Operator)</td>
                                            <td rowspan="2">Verify (QC)</td>
                                            <td rowspan="2">Verify</td>
                                            <td rowspan="2">Action</td>
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
                                        <tr>
                                            <td>500</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><button class="btn btn-primary" style="border-radius:5px; ">check</button></td>
                                            <td>username / datetime</td>
                                            <td><button class="btn" style="border-radius:25px; background:#000; color:white; ">Verify</button></td>
                                            <td>username / datetime</td>
                                            <td><button class="btn btn-danger" style="border-radius:5px; ">X</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
        <a href="{{route('SenariSemak.index')}}">back to list</a>
    </div>
</div>
</div>
@endsection
@push('custom-scripts')
<script>
     function handleCheckboxChange(className, checkbox) {
            if ($(checkbox).prop('checked')) {
              $(`.${ className }`).not(checkbox).prop('checked', false);
            }
        }

        $(document).ready(function() {
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



    $('#sale_order').on('change', function () {
        const id = $(this).val();
        $.ajax({
            type: 'GET',
            url: '{{ route('sale_order.detail.get') }}',
            data: {
                "id": id
            },
            success: function (data) {
                $('#kod_buku').val(data.kod_buku);
                $('#tajuk').val(data.description);
            }
        });
    });
</script>
@endpush

