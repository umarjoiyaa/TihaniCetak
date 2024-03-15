@extends('layouts.app')
@section('content')
    <form action="{{ route('kulit_buku.store') }}" method="POST">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="float-left">LAPORAN PEMERIKSAAN KUALITI - PEMOTONGAN KULIT BUKU/TEKS</h5>
                                    <p class="float-right">TCSB-B23 (Rev.5)</p>
                                </div>
                            </div>
                            <div class="card" style="#f4f4ff">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="">Date</label>
                                                <input type="text" name="date" value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="">Time</label>
                                            <input name="time" type="time" id="Currenttime"
                                            value="{{ Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('H:i') }}"
                                            class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label class="form-label">Checked By</label>
                                                <input type="text" value="{{ Auth::user()->full_name }}" readonly
                                                    name="" id="checked_by" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="form-label">Sales Order No.</div>
                                                <select name="sale_order" id="sale_order" class="form-control">
                                                    @if (old('sale_order') != null)
                                                    @php
                                                        $name = App\Models\SaleOrder::find(old('sale_order'));
                                                    @endphp
                                                    <option value="{{ old('sale_order') }}" selected
                                                        style="color: black; !important">
                                                        {{ $name->order_no }}</option>
                                                @else
                                                    <option value="" selected disabled>Select any Sale Order
                                                    </option>
                                                @endif

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="form-label">Tajuk</div>
                                                <input type="text" readonly value="" id="tajuk"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <div class="form-label">Kod Buku</div>
                                                <input type="text" value="" readonly name="" id="kod_buku"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">


                                        <div class="col-md-5 mt-3">
                                            <table class="table" border="1">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">Kriteria</th>
                                                        <th colspan="3">Tanda bagi yang berkenaan</th>

                                                    </tr>
                                                    <tr>
                                                        <th>OK</th>
                                                        <th>NG</th>
                                                        <th>NA</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>Kelekatan OPP Lamination</td>
                                                        <td><input type="checkbox" class="Cover1"
                                                                onchange="handleCheckboxChange('Cover1',this)" @checked(old('b_1') == 'ok')
                                                                name="b_1" value="ok" id=""></td>
                                                        <td><input type="checkbox" class="Cover1"
                                                                onchange="handleCheckboxChange('Cover1',this)" @checked(old('b_1') == 'ng') @if(old('b_1')) @else checked @endif
                                                                name="b_1" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Cover1"
                                                                onchange="handleCheckboxChange('Cover1',this)" @checked(old('b_1') == 'na')
                                                                name="b_1" value="na" id=""></td>

                                                    </tr>
                                                    <tr>
                                                        <td>Saiz Spacing</td>
                                                        <td><input type="checkbox" class="Text1"
                                                                onchange="handleCheckboxChange('Text1',this)" name="b_2" @checked(old('b_2') == 'ok')
                                                                value="ok" id=""></td>
                                                        <td><input type="checkbox" class="Text1"
                                                                onchange="handleCheckboxChange('Text1',this)" @checked(old('b_2') == 'ng') @if(old('b_2')) @else checked @endif
                                                                name="b_2" value="ng" id="">
                                                        <td><input type="checkbox" class="Text1"
                                                                onchange="handleCheckboxChange('Text1',this)" @checked(old('b_2') == 'na')
                                                                name="b_2" value="na" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kedudukan potongan</td>
                                                        <td><input type="checkbox" class="Cover2"
                                                                onchange="handleCheckboxChange('Cover2',this)" @checked(old('b_3') == 'ok')
                                                                name="b_3" value="ok" id=""></td>
                                                        <td><input type="checkbox" class="Cover2"
                                                                onchange="handleCheckboxChange('Cover2',this)" @checked(old('b_3') == 'ng') @if(old('b_3')) @else checked @endif
                                                                name="b_3" value="ng" id=""></td>
                                                        <td><input type="checkbox" class="Cover2"
                                                                onchange="handleCheckboxChange('Cover2',this)" @checked(old('b_3') == 'na')
                                                                name="b_3" value="na" id=""></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><b>Nota :</b></h4>
                                    <span>*Pemeriksaan kelekatan OPP lamination perlu dilakukan sebelum proses pemotongan kulit buku dibuat.
                                        <br> *Ambil 3 keping sampel bagi setiap palet secara rawak dari bahagian atas, tengah dan bawah untuk pemeriksaan kelekatan OPP Lamination. Jika hasil pemeriksaan gagal, maklumkan
                                            kepada Eksekutif QA/ Pengurus Operasi untuk tindakan lanjut. Rujuk Perbandingan Kelekatan OPP.  </span>
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
                <a href="{{ route('kulit_buku') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
            </div>
        </div>
        </div>
    </form>
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

                    if ($('#sale_order').data('id') == data.id) {
                        return $('<option value=' + data.id + ' selected>' + data.order_no +
                            '</option>');
                    } else {
                        return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                    }
                },
                templateSelection: function(data) {
                    return data.text || "Select Sales Order No";
                }
            });

            $('#sale_order').on('change', function() {
                const id = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '{{ route('sale_order_penjilidan.detail.get') }}',
                    data: {
                        "id": id
                    },
                    success: function(data) {
                        $('#kod_buku').val(data.sale_order.kod_buku);
                        $('#tajuk').val(data.sale_order.description);
                    }
                });
            });
        });
    </script>
    <!-- .. -->
@endpush
