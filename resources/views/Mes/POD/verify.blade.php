@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>LAPORAN PEMERIKSAAN KUALITI - POD</b></h5>
                            <p class="float-right">TCSB-B23 (Rev.5)</p>
                        </div>
                    </div>


                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="text"  name="date" value="{{ \Carbon\Carbon::parse($pod->date)->format('d-m-Y') }}" class="form-control" disabled id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Time</label>
                                    <input name="time" disabled type="text" id="Currenttime"
                                    value="{{ $pod->time }}"
                                    class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="form-label">Checked By</div>
                                        <input type="text"  value="{{ $pod->user->full_name }}" readonly
                                        class="form-control" name="" id="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-label">Sales Order No.</div>
                                        <select name="sale_order" disabled data-id="{{ $pod->sale_order_id }}"
                                            id="sale_order" class="form-control">
                                            <option value="{{ $pod->sale_order_id }}" selected
                                                style="color: black; !important">
                                                {{ $pod->sale_order->order_no }}</option>
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
                                                <td><input type="checkbox" disabled  class="Cover1" onchange="handleCheckboxChange('Cover1',this)" name="file_artwork_1" @checked($pod->file_artwork_1 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox" disabled  class="Cover1" onchange="handleCheckboxChange('Cover1',this)" name="file_artwork_1" @checked($pod->file_artwork_1 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox"  disabled class="Cover1" onchange="handleCheckboxChange('Cover1',this)" name="file_artwork_1" @checked($pod->file_artwork_1 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Image artwork</td>
                                                <td><input type="checkbox" disabled  class="Text1" onchange="handleCheckboxChange('Text1',this)" name="file_artwork_2"  @checked($pod->file_artwork_2 == 'ok') value="ok"  id=""></td>
                                                <td><input type="checkbox" disabled  class="Text1" onchange="handleCheckboxChange('Text1',this)" name="file_artwork_2" @checked($pod->file_artwork_2 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox" disabled  class="Text1" onchange="handleCheckboxChange('Text1',this)" name="file_artwork_2" @checked($pod->file_artwork_2 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Bleed</td>
                                                <td><input type="checkbox" disabled  class="Cover2" onchange="handleCheckboxChange('Cover2',this)" name="file_artwork_3" @checked($pod->file_artwork_3 == 'ok') value="ok"id=""></td>
                                                <td><input type="checkbox" disabled  class="Cover2" onchange="handleCheckboxChange('Cover2',this)" name="file_artwork_3" @checked($pod->file_artwork_3 == 'ng') value="ng"id=""></td>
                                                <td><input type="checkbox" disabled  class="Cover2" onchange="handleCheckboxChange('Cover2',this)" name="file_artwork_3" @checked($pod->file_artwork_3 == 'na') value="na"id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Saiz spine (perfect bind)</td>
                                                <td><input type="checkbox" disabled  class="Text2" onchange="handleCheckboxChange('Text2',this)" name="file_artwork_4" @checked($pod->file_artwork_4 == 'ok')value="ok" id=""></td>
                                                <td><input type="checkbox"  disabled class="Text2" onchange="handleCheckboxChange('Text2',this)" name="file_artwork_4" @checked($pod->file_artwork_4 == 'ng')value="ng" id=""></td>
                                                <td><input type="checkbox" disabled  class="Text2" onchange="handleCheckboxChange('Text2',this)" name="file_artwork_4" @checked($pod->file_artwork_4 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat pencetak</td>
                                                <td><input type="checkbox"  disabled class="Cover3" onchange="handleCheckboxChange('Cover3',this)" name="file_artwork_5" @checked($pod->file_artwork_5 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox" disabled  class="Cover3" onchange="handleCheckboxChange('Cover3',this)" name="file_artwork_5" @checked($pod->file_artwork_5 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox" disabled  class="Cover3" onchange="handleCheckboxChange('Cover3',this)" name="file_artwork_5" @checked($pod->file_artwork_5 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah muka surat</td>
                                                <td><input type="checkbox"  disabled class="Text3" onchange="handleCheckboxChange('Text3',this)" name="file_artwork_6" @checked($pod->file_artwork_6 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox" disabled  class="Text3" onchange="handleCheckboxChange('Text3',this)" name="file_artwork_6" @checked($pod->file_artwork_6 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox"  disabled class="Text3" onchange="handleCheckboxChange('Text3',this)" name="file_artwork_6" @checked($pod->file_artwork_6 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Turutan muka surat</td>
                                                <td><input type="checkbox" disabled    class="Cover4" onchange="handleCheckboxChange('Cover4',this)" name="file_artwork_7" @checked($pod->file_artwork_7 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox" disabled    class="Cover4" onchange="handleCheckboxChange('Cover4',this)" name="file_artwork_7" @checked($pod->file_artwork_7 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox"  disabled   class="Cover4" onchange="handleCheckboxChange('Cover4',this)" name="file_artwork_7" @checked($pod->file_artwork_7 == 'na') value="na" id=""></td>
                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-5">
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
                                                <td><input type="checkbox" disabled class="Cover5" onchange="handleCheckboxChange('Cover5',this)" name="first_piece_1" @checked($pod->first_piece_1 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox" disabled class="Cover5" onchange="handleCheckboxChange('Cover5',this)" name="first_piece_1" @checked($pod->first_piece_1 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox" disabled class="Cover5" onchange="handleCheckboxChange('Cover5',this)" name="first_piece_1" @checked($pod->first_piece_1 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Saiz produk</td>
                                                <td><input type="checkbox" disabled class="Text5" onchange="handleCheckboxChange('Text5',this)" name="first_piece_2" @checked($pod->first_piece_2 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox" disabled class="Text5" onchange="handleCheckboxChange('Text5',this)" name="first_piece_2" @checked($pod->first_piece_2 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox" disabled class="Text5" onchange="handleCheckboxChange('Text5',this)" name="first_piece_2" @checked($pod->first_piece_2 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Artwork (gambar, teks)</td>
                                                <td><input type="checkbox" disabled  class="Cover6" onchange="handleCheckboxChange('Cover6',this)" name="first_piece_3" @checked($pod->first_piece_3 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox" disabled  class="Cover6" onchange="handleCheckboxChange('Cover6',this)" name="first_piece_3" @checked($pod->first_piece_3 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox" disabled  class="Cover6" onchange="handleCheckboxChange('Cover6',this)" name="first_piece_3" @checked($pod->first_piece_3 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Design clearance (5mm)</td>
                                                <td><input type="checkbox" disabled class="Text6" onchange="handleCheckboxChange('Text6',this)" name="first_piece_4" @checked($pod->first_piece_4 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox" disabled class="Text6" onchange="handleCheckboxChange('Text6',this)" name="first_piece_4" @checked($pod->first_piece_4 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox" disabled class="Text6" onchange="handleCheckboxChange('Text6',this)" name="first_piece_4" @checked($pod->first_piece_4 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Warna</td>
                                                <td><input type="checkbox" disabled class="Cover7" onchange="handleCheckboxChange('Cover7',this)" name="first_piece_5" @checked($pod->first_piece_5 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox" disabled class="Cover7" onchange="handleCheckboxChange('Cover7',this)" name="first_piece_5" @checked($pod->first_piece_5 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox" disabled class="Cover7" onchange="handleCheckboxChange('Cover7',this)" name="first_piece_5" @checked($pod->first_piece_5 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah muka surat </td>
                                                <td><input type="checkbox" disabled class="Text7" onchange="handleCheckboxChange('Text7',this)" name="first_piece_6" @checked($pod->first_piece_6 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox" disabled class="Text7" onchange="handleCheckboxChange('Text7',this)" name="first_piece_6" @checked($pod->first_piece_6 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox" disabled class="Text7" onchange="handleCheckboxChange('Text7',this)" name="first_piece_6" @checked($pod->first_piece_6 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Turutan muka surat  </td>
                                                <td><input type="checkbox" disabled class="Cover8" onchange="handleCheckboxChange('Cover8',this)" name="first_piece_7" @checked($pod->first_piece_7 == 'ok')  value="ok" id=""></td>
                                                <td><input type="checkbox" disabled class="Cover8" onchange="handleCheckboxChange('Cover8',this)" name="first_piece_7" @checked($pod->first_piece_7 == 'ng')  value="ng" id=""></td>
                                                <td><input type="checkbox" disabled class="Cover8" onchange="handleCheckboxChange('Cover8',this)" name="first_piece_7" @checked($pod->first_piece_7 == 'na')  value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Bleed</td>
                                                <td><input type="checkbox" disabled  class="Text8" onchange="handleCheckboxChange('Text8',this)" name="first_piece_8" @checked($pod->first_piece_8 == 'ok')  value="ok" id=""></td>
                                                <td><input type="checkbox" disabled  class="Text8" onchange="handleCheckboxChange('Text8',this)" name="first_piece_8" @checked($pod->first_piece_8 == 'ng')  value="ng" id=""></td>
                                                <td><input type="checkbox" disabled  class="Text8" onchange="handleCheckboxChange('Text8',this)" name="first_piece_8" @checked($pod->first_piece_8 == 'na')  value="na" id=""></td>

                                            </tr>
                                            <tr>
                                                <td>Crop mark</td>
                                                <td><input type="checkbox" disabled   class="Text9" onchange="handleCheckboxChange('Text9',this)" name="first_piece_9" @checked($pod->first_piece_9 == 'ok')  value="ok" id=""></td>
                                                <td><input type="checkbox"  disabled  class="Text9" onchange="handleCheckboxChange('Text9',this)" name="first_piece_9" @checked($pod->first_piece_9 == 'ng')  value="ng" id=""></td>
                                                <td><input type="checkbox"  disabled  class="Text9" onchange="handleCheckboxChange('Text9',this)" name="first_piece_9" @checked($pod->first_piece_9 == 'na')  value="na" id=""></td>

                                            </tr>
                                            <tr>
                                                <td>Kedudukan cetakan depan  belakang / print register</td>
                                                <td><input type="checkbox" disabled class="Text10" onchange="handleCheckboxChange('Text10',this)" name="first_piece_10" @checked($pod->first_piece_10 == 'ok')  value="ok" id=""></td>
                                                <td><input type="checkbox" disabled class="Text10" onchange="handleCheckboxChange('Text10',this)" name="first_piece_10" @checked($pod->first_piece_10 == 'ng')  value="ng" id=""></td>
                                                <td><input type="checkbox" disabled class="Text10" onchange="handleCheckboxChange('Text10',this)" name="first_piece_10" @checked($pod->first_piece_10 == 'na')  value="na" id=""></td>

                                            </tr>
                                            <tr>
                                                <td>Jenis penjilidan</td>
                                                <td><input type="checkbox" disabled class="Text11" onchange="handleCheckboxChange('Text11',this)" name="first_piece_11" @checked($pod->first_piece_11 == 'ok')  value="ok" id=""></td>
                                                <td><input type="checkbox" disabled class="Text11" onchange="handleCheckboxChange('Text11',this)" name="first_piece_11" @checked($pod->first_piece_11 == 'ng')  value="ng" id=""></td>
                                                <td><input type="checkbox" disabled class="Text11" onchange="handleCheckboxChange('Text11',this)" name="first_piece_11" @checked($pod->first_piece_11 == 'na')  value="na" id=""></td>

                                            </tr>


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end mt-5">
                        <div class="col-md-12 d-flex justify-content-end">
                            <form action="{{ route('pod.approve.decline', $pod->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <button class="btn btn-danger mx-2" type="submit">Decline</button>
                            </form>
                            <form action="{{ route('pod.approve.approve', $pod->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <button class="btn btn-primary" type="submit"> Verify</button>
                            </form>
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
