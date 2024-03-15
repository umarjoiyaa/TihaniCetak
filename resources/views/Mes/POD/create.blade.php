@extends('layouts.app')

@section('content')

<form action="{{ route('pod.store') }}" method="POST">
    @csrf
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    <h5 class="float-left">LAPORAN PEMERIKSAAN KUALITI -POD </h5>
                        <p class="float-right">TCBS-B23 (Rev.5) </p>
                    </div>
                </div>


                <div class="card" style="background:#f4f4ff;">
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
                                    <div class="form-label">Checked By</div>
                                    <input type="text" value="{{ Auth::user()->user_name }}" readonly
                                    class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label">Tajuk</div>
                                    <input type="text" readonly  class="form-control" id="tajuk">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label">Kod Buku</div>
                                    <input type="text"  readonly name="" id="kod_buku"
                                        class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="row mt-5">
                            <div class="col-md-5">
                                <h6><b>File Artwork</b></h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">kriteria</th>
                                            <th colspan="3">Tanda bagi Yang bekenaan</th>

                                        </tr>
                                        <tr>
                                            <th>OK</th>
                                            <th>NG</th>
                                            <th>NA</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>Design clearance (5mm)</td>
                                            <td><input type="checkbox" class="Cover1" {{ old('file_artwork_1') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover1',this)" name="file_artwork_1" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Cover1" {{ old('file_artwork_1') == 'ng' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover1',this)" @if (old('file_artwork_1')) @else checked @endif name="file_artwork_1" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Cover1" {{ old('file_artwork_1') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover1',this)" name="file_artwork_1" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Image artwork</td>
                                            <td><input type="checkbox" class="Text1" {{ old('file_artwork_2') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Text1',this)" name="file_artwork_2" value="ok"  id=""></td>
                                            <td><input type="checkbox" class="Text1" {{ old('file_artwork_2') == 'ng' ? 'checked' : '' }} onchange="handleCheckboxChange('Text1',this)" @if (old('file_artwork_2')) @else checked @endif name="file_artwork_2" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Text1" {{ old('file_artwork_2') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Text1',this)" name="file_artwork_2" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Bleed</td>
                                            <td><input type="checkbox" class="Cover2" {{ old('file_artwork_3') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover2',this)" name="file_artwork_3" value="ok"id=""></td>
                                            <td><input type="checkbox" class="Cover2" {{ old('file_artwork_3') == 'ng' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover2',this)" @if (old('file_artwork_3')) @else checked @endif name="file_artwork_3" value="ng"id=""></td>
                                            <td><input type="checkbox" class="Cover2" {{ old('file_artwork_3') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover2',this)" name="file_artwork_3" value="na"id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Saiz spine (perfect bind)</td>
                                            <td><input type="checkbox" class="Text2" {{ old('file_artwork_4') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Text2',this)" name="file_artwork_4" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Text2" {{ old('file_artwork_4') == 'ng' ? 'checked' : '' }} onchange="handleCheckboxChange('Text2',this)" @if (old('file_artwork_4')) @else checked @endif name="file_artwork_4" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Text2" {{ old('file_artwork_4') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Text2',this)" name="file_artwork_4" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat pencetak</td>
                                            <td><input type="checkbox" class="Cover3" {{ old('file_artwork_5') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover3',this)" name="file_artwork_5" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Cover3" {{ old('file_artwork_5') == 'ng' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover3',this)" @if (old('file_artwork_5')) @else checked @endif name="file_artwork_5" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Cover3" {{ old('file_artwork_5') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover3',this)" name="file_artwork_5" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah muka surat</td>
                                            <td><input type="checkbox" class="Text3" {{ old('file_artwork_6') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Text3',this)" name="file_artwork_6" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Text3" {{ old('file_artwork_6') == 'ng' ? 'checked' : '' }} onchange="handleCheckboxChange('Text3',this)" @if (old('file_artwork_6')) @else checked @endif name="file_artwork_6" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Text3" {{ old('file_artwork_6') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Text3',this)" name="file_artwork_6" value="na" id=""></td>
                                        </tr>

                                        <tr>
                                            <td>Turutan muka surat</td>
                                            <td><input type="checkbox" class="Cover4" {{ old('file_artwork_7') == 'ok' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover4',this)" name="file_artwork_7" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Cover4" {{ old('file_artwork_7') == 'ng' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover4',this)" @if (old('file_artwork_7')) @else checked @endif name="file_artwork_7" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Cover4" {{ old('file_artwork_7') == 'na' ? 'checked' : '' }} onchange="handleCheckboxChange('Cover4',this)" name="file_artwork_7" value="na" id=""></td>
                                        </tr>



                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h6><b>First Piece</b></h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">kriteria</th>
                                            <th colspan="3">Tanda bagi Yang bekenaan</th>

                                        </tr>
                                        <tr>
                                            <th>OK</th>
                                            <th>NG</th>
                                            <th>NA</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>Jenis kertas</td>
                                            <td><input type="checkbox" class="Cover5" {{ old('first_piece_1') == 'ok' ? 'checked' : '' }}  onchange="handleCheckboxChange('Cover5',this)" name="first_piece_1" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Cover5" {{ old('first_piece_1') == 'ng' ? 'checked' : '' }}  onchange="handleCheckboxChange('Cover5',this)" @if (old('first_piece_1')) @else checked @endif name="first_piece_1" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Cover5" {{ old('first_piece_1') == 'na' ? 'checked' : '' }}  onchange="handleCheckboxChange('Cover5',this)" name="first_piece_1" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Saiz produk</td>
                                            <td><input type="checkbox" class="Text5" {{ old('first_piece_2') == 'ok' ? 'checked' : '' }}  onchange="handleCheckboxChange('Text5',this)" name="first_piece_2" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Text5" {{ old('first_piece_2') == 'ng' ? 'checked' : '' }}  onchange="handleCheckboxChange('Text5',this)" @if (old('first_piece_2')) @else checked @endif name="first_piece_2" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Text5" {{ old('first_piece_2') == 'na' ? 'checked' : '' }}  onchange="handleCheckboxChange('Text5',this)" name="first_piece_2" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Artwork (gambar, teks)</td>
                                            <td><input type="checkbox" class="Cover6" {{ old('first_piece_3') == 'ok' ? 'checked' : '' }}  onchange="handleCheckboxChange('Cover6',this)" name="first_piece_3" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Cover6" {{ old('first_piece_3') == 'ng' ? 'checked' : '' }}  onchange="handleCheckboxChange('Cover6',this)" @if (old('first_piece_3')) @else checked @endif name="first_piece_3" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Cover6" {{ old('first_piece_3') == 'na' ? 'checked' : '' }}  onchange="handleCheckboxChange('Cover6',this)" name="first_piece_3" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Design clearance (5mm)</td>
                                            <td><input type="checkbox" class="Text6" {{ old('first_piece_4') == 'ok' ? 'checked' : '' }}  onchange="handleCheckboxChange('Text6',this)" name="first_piece_4" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Text6" {{ old('first_piece_4') == 'ng' ? 'checked' : '' }}  onchange="handleCheckboxChange('Text6',this)" @if (old('first_piece_4')) @else checked @endif name="first_piece_4" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Text6" {{ old('first_piece_4') == 'na' ? 'checked' : '' }}  onchange="handleCheckboxChange('Text6',this)" name="first_piece_4" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Warna</td>
                                            <td><input type="checkbox" class="Cover7" {{ old('first_piece_5') == 'ok' ? 'checked' : '' }}  onchange="handleCheckboxChange('Cover7',this)" name="first_piece_5" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Cover7" {{ old('first_piece_5') == 'ng' ? 'checked' : '' }}  onchange="handleCheckboxChange('Cover7',this)" @if (old('first_piece_5')) @else checked @endif name="first_piece_5" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Cover7" {{ old('first_piece_5') == 'na' ? 'checked' : '' }}  onchange="handleCheckboxChange('Cover7',this)" name="first_piece_5" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah muka surat</td>
                                            <td><input type="checkbox" class="Text7" {{ old('first_piece_6') == 'ok' ? 'checked' : '' }}  onchange="handleCheckboxChange('Text7',this)" name="first_piece_6" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Text7" {{ old('first_piece_6') == 'ng' ? 'checked' : '' }}  onchange="handleCheckboxChange('Text7',this)" @if (old('first_piece_6')) @else checked @endif name="first_piece_6" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Text7" {{ old('first_piece_6') == 'na' ? 'checked' : '' }}  onchange="handleCheckboxChange('Text7',this)" name="first_piece_6" value="na" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>Turutan muka surat </td>
                                            <td><input type="checkbox" class="Cover8" {{ old('first_piece_7') == 'ok' ? 'checked' : '' }}  onchange="handleCheckboxChange('Cover8',this)" name="first_piece_7" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Cover8" {{ old('first_piece_7') == 'ng' ? 'checked' : '' }}  onchange="handleCheckboxChange('Cover8',this)" @if (old('first_piece_7')) @else checked @endif name="first_piece_7" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Cover8" {{ old('first_piece_7') == 'na' ? 'checked' : '' }}  onchange="handleCheckboxChange('Cover8',this)" name="first_piece_7" value="na" id=""></td>
                                        </tr>

                                        <tr>
                                            <td>Bleed</td>
                                            <td><input type="checkbox" class="endpaper8" {{ old('first_piece_8') == 'ok' ? 'checked' : '' }}  onchange="handleCheckboxChange('endpaper8',this)" name="first_piece_8"  value="ok" id=""></td>
                                            <td><input type="checkbox" class="endpaper8" {{ old('first_piece_8') == 'ng' ? 'checked' : '' }}  onchange="handleCheckboxChange('endpaper8',this)" @if (old('first_piece_8')) @else checked @endif name="first_piece_8" value="ng" id=""></td>
                                            <td><input type="checkbox" class="endpaper8" {{ old('first_piece_8') == 'na' ? 'checked' : '' }}  onchange="handleCheckboxChange('endpaper8',this)" name="first_piece_8" value="na" id=""></td>

                                        </tr>
                                        <tr>
                                            <td>Crop mark</td>
                                            <td><input type="checkbox" class="Text8" {{ old('first_piece_9') == 'ok' ? 'checked' : '' }}  onchange="handleCheckboxChange('Text8',this)" name="first_piece_9" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Text8" {{ old('first_piece_9') == 'ng' ? 'checked' : '' }}  onchange="handleCheckboxChange('Text8',this)" @if (old('first_piece_9')) @else checked @endif name="first_piece_9" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Text8" {{ old('first_piece_9') == 'na' ? 'checked' : '' }}  onchange="handleCheckboxChange('Text8',this)" name="first_piece_9"  value="na" id=""></td>

                                        </tr>
                                        <tr>
                                            <td>Kedudukan cetakan depan  belakang / print register</td>
                                            <td><input type="checkbox" class="Cover9" {{ old('first_piece_10') == 'ok' ? 'checked' : '' }}  onchange="handleCheckboxChange('Cover9',this)" name="first_piece_10" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Cover9" {{ old('first_piece_10') == 'ng' ? 'checked' : '' }}  onchange="handleCheckboxChange('Cover9',this)" @if (old('first_piece_10')) @else checked @endif name="first_piece_10" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Cover9" {{ old('first_piece_10') == 'na' ? 'checked' : '' }}  onchange="handleCheckboxChange('Cover9',this)" name="first_piece_10" value="na" id=""></td>

                                        </tr>
                                        <tr>
                                            <td>Jenis penjilidan</td>
                                            <td><input type="checkbox" class="Text9" {{ old('first_piece_11') == 'ok' ? 'checked' : '' }}  onchange="handleCheckboxChange('Text9',this)" name="first_piece_11" value="ok" id=""></td>
                                            <td><input type="checkbox" class="Text9" {{ old('first_piece_11') == 'ng' ? 'checked' : '' }}  onchange="handleCheckboxChange('Text9',this)" @if (old('first_piece_11')) @else checked @endif name="first_piece_11" value="ng" id=""></td>
                                            <td><input type="checkbox" class="Text9" {{ old('first_piece_11') == 'na' ? 'checked' : '' }}  onchange="handleCheckboxChange('Text9',this)" name="first_piece_11" value="na"  id="first_piece_11"></td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>

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
            <a href="{{route('pod')}}"><i class="ti-arrow-left mx-2 mt-1"></i>back to list</a>

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
