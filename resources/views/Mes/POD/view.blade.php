@extends('layouts.app')

@section('content')
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
                                        <input type="date" disabled  name="date" id="" value="{{ $pod->date }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Masa</label>
                                    <input name="time" type="time" disabled id="Currenttime"
                                    value="{{ $pod->time }}"
                                    class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Disemak Oleh</div>
                                        <input type="text" disabled value="{{ Auth::user()->user_name }}" readonly
                                        class="form-control" name="" id="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
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
                                                <td>Format file</td>
                                                <td><input type="checkbox" readonly class="Cover1" onchange="handleCheckboxChange('Cover1',this)" disabled  name="file_artwork_1" @checked($pod->file_artwork_1 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox"readonly class="Cover1" onchange="handleCheckboxChange('Cover1',this)" disabled  name="file_artwork_1" @checked($pod->file_artwork_1 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox"readonly class="Cover1" onchange="handleCheckboxChange('Cover1',this)" disabled  name="file_artwork_1" @checked($pod->file_artwork_1 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Saiz Product</td>
                                                <td><input type="checkbox"readonly class="Text1" onchange="handleCheckboxChange('Text1',this)" disabled  name="file_artwork_2"  @checked($pod->file_artwork_2 == 'ok') value="ok"  id=""></td>
                                                <td><input type="checkbox"readonly class="Text1" onchange="handleCheckboxChange('Text1',this)" disabled  name="file_artwork_2" @checked($pod->file_artwork_2 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox"readonly class="Text1" onchange="handleCheckboxChange('Text1',this)" disabled  name="file_artwork_2" @checked($pod->file_artwork_2 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Bleed</td>
                                                <td><input type="checkbox"readonly class="Cover2" onchange="handleCheckboxChange('Cover2',this)" disabled  name="file_artwork_3" @checked($pod->file_artwork_3 == 'ok') value="ok"id=""></td>
                                                <td><input type="checkbox"readonly class="Cover2" onchange="handleCheckboxChange('Cover2',this)" disabled  name="file_artwork_3" @checked($pod->file_artwork_3 == 'ng') value="ng"id=""></td>
                                                <td><input type="checkbox"readonly class="Cover2" onchange="handleCheckboxChange('Cover2',this)" disabled  name="file_artwork_3" @checked($pod->file_artwork_3 == 'na') value="na"id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Saiz Spine</td>
                                                <td><input type="checkbox"readonly class="Text2" onchange="handleCheckboxChange('Text2',this)" disabled  name="file_artwork_4" @checked($pod->file_artwork_4 == 'ok')value="ok" id=""></td>
                                                <td><input type="checkbox"readonly class="Text2" onchange="handleCheckboxChange('Text2',this)" disabled  name="file_artwork_4" @checked($pod->file_artwork_4 == 'ng')value="ng" id=""></td>
                                                <td><input type="checkbox"readonly class="Text2" onchange="handleCheckboxChange('Text2',this)" disabled  name="file_artwork_4" @checked($pod->file_artwork_4 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat pencetak</td>
                                                <td><input type="checkbox"readonly class="Cover3" onchange="handleCheckboxChange('Cover3',this)" disabled   name="file_artwork_5" @checked($pod->file_artwork_5 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox"readonly class="Cover3" onchange="handleCheckboxChange('Cover3',this)" disabled  name="file_artwork_5" @checked($pod->file_artwork_5 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox"readonly class="Cover3" onchange="handleCheckboxChange('Cover3',this)" disabled  name="file_artwork_5" @checked($pod->file_artwork_5 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah muka surat</td>
                                                <td><input type="checkbox"readonly class="Text3" onchange="handleCheckboxChange('Text3',this)" disabled  name="file_artwork_6" @checked($pod->file_artwork_6 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox" readonlyclass="Text3" onchange="handleCheckboxChange('Text3',this)" disabled  name="file_artwork_6" @checked($pod->file_artwork_6 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox"readonly class="Text3" onchange="handleCheckboxChange('Text3',this)" disabled  name="file_artwork_6" @checked($pod->file_artwork_6 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Turutan muka surat</td>
                                                <td><input type="checkbox"readonly class="Cover4" onchange="handleCheckboxChange('Cover4',this)" disabled  name="file_artwork_7" @checked($pod->file_artwork_7 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox"readonly class="Cover4" onchange="handleCheckboxChange('Cover4',this)" disabled  name="file_artwork_7" @checked($pod->file_artwork_7 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox"readonly class="Cover4" onchange="handleCheckboxChange('Cover4',this)" disabled  name="file_artwork_7" @checked($pod->file_artwork_7 == 'na') value="na" id=""></td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-5">
                                    <h6><b>impositions</b></h6>
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
                                                <td>Front and Back imposition</td>
                                                <td><input type="checkbox"readonly class="Cover5" onchange="handleCheckboxChange('Cover5',this)" disabled  name="impositions_1" @checked($pod->impositions_1 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox"readonly class="Cover5" onchange="handleCheckboxChange('Cover5',this)" disabled  name="impositions_1" @checked($pod->impositions_1 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox"readonly class="Cover5" onchange="handleCheckboxChange('Cover5',this)" disabled  name="impositions_1" @checked($pod->impositions_1 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Kedudukan imposition</td>
                                                <td><input type="checkbox"readonly class="Text5" onchange="handleCheckboxChange('Text5',this)" disabled  name="impositions_2" @checked($pod->impositions_2 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox"readonly class="Text5" onchange="handleCheckboxChange('Text5',this)" disabled  name="impositions_2" @checked($pod->impositions_2 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox"readonly class="Text5" onchange="handleCheckboxChange('Text5',this)"  disabled name="impositions_2" @checked($pod->impositions_2 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Saiz spacing</td>
                                                <td><input type="checkbox"readonly class="Cover6" onchange="handleCheckboxChange('Cover6',this)" disabled  name="impositions_3" @checked($pod->impositions_3 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox"readonly class="Cover6" onchange="handleCheckboxChange('Cover6',this)" disabled  name="impositions_3" @checked($pod->impositions_3 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox"readonly class="Cover6" onchange="handleCheckboxChange('Cover6',this)" disabled  name="impositions_3" @checked($pod->impositions_3 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Printing method (Straight @ Perfecting)</td>
                                                <td><input type="checkbox"readonly class="Text6" onchange="handleCheckboxChange('Text6',this)" disabled  name="impositions_4" @checked($pod->impositions_4 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox"readonly class="Text6" onchange="handleCheckboxChange('Text6',this)" disabled  name="impositions_4" @checked($pod->impositions_4 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox"readonly class="Text6" onchange="handleCheckboxChange('Text6',this)" disabled  name="impositions_4" @checked($pod->impositions_4 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Up</td>
                                                <td><input type="checkbox" readonlyclass="Cover7" onchange="handleCheckboxChange('Cover7',this)" disabled   name="impositions_5" @checked($pod->impositions_5 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox"readonly class="Cover7" onchange="handleCheckboxChange('Cover7',this)" disabled  name="impositions_5" @checked($pod->impositions_5 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox"readonly class="Cover7" onchange="handleCheckboxChange('Cover7',this)"  disabled  name="impositions_5" @checked($pod->impositions_5 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Dummy Lipat</td>
                                                <td><input type="checkbox" readonly class="Text7" onchange="handleCheckboxChange('Text7',this)"  disabled name="impositions_6" @checked($pod->impositions_6 == 'ok') value="ok" id=""></td>
                                                <td><input type="checkbox" readonly class="Text7" onchange="handleCheckboxChange('Text7',this)" disabled  name="impositions_6" @checked($pod->impositions_6 == 'ng') value="ng" id=""></td>
                                                <td><input type="checkbox" readonly class="Text7" onchange="handleCheckboxChange('Text7',this)" disabled  name="impositions_6" @checked($pod->impositions_6 == 'na') value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Penjilidan </td>
                                                <td><input type="checkbox"readonly class="Cover8" onchange="handleCheckboxChange('Cover8',this)"    disabled  name="impositions_7" @checked($pod->impositions_7 == 'ok')  value="ok" id=""></td>
                                                <td><input type="checkbox"readonly class="Cover8" onchange="handleCheckboxChange('Cover8',this)" disabled  name="impositions_7" @checked($pod->impositions_7 == 'ng')  value="ng" id=""></td>
                                                <td><input type="checkbox"readonly class="Cover8" onchange="handleCheckboxChange('Cover8',this)"   disabled   name="impositions_7" @checked($pod->impositions_7 == 'na')  value="na" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kertas</td>
                                                <td><input type="checkbox"readonly class="Text8" onchange="handleCheckboxChange('Text8',this)" disabled  name="impositions_8" @checked($pod->impositions_8 == 'ok')  value="ok" id=""></td>
                                                <td><input type="checkbox"readonly class="Text8" onchange="handleCheckboxChange('Text8',this)" disabled  name="impositions_8" @checked($pod->impositions_8 == 'ng')  value="ng" id=""></td>
                                                <td><input type="checkbox"readonly class="Text8" onchange="handleCheckboxChange('Text8',this)" disabled  name="impositions_8" @checked($pod->impositions_8 == 'na')  value="na" id=""></td>

                                            </tr>


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <h3><b>Verified By</b></h3>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Username</th>
                                        <th>Desgination</th>
                                        <th>Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $senari_semak->verified_by_date }}</td>
                                        <td>{{ $senari_semak->verified_by_user }}</td>
                                        <td>{{ $senari_semak->verified_by_designation }}</td>
                                        <td>{{ $senari_semak->verified_by_department }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right">Save</button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <a href="{{route('pod')}}">back to list</a>
    </div>
</div>
@endsection
@push('custom-scripts')
{{-- <script>
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
});

</script> --}}
@endpush

