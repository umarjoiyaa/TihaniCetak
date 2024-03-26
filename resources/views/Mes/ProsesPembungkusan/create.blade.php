@extends('layouts.app')

@section('content')
<form action="{{ route('proses_pembungkusan.store') }}" method="POST">
    @csrf
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="float-left"><b>LAPORAN PEMERIKSAAN KUALITI - PROSES PEMBUNGKUSAN</b></h5>
                        <p class="float-right">TCSB-B23 (Rev. 5)</p>
                    </div>
                </div>
                <div class="card" style="background:#f4f4ff;">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="text" name="date" value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                </div>
                            </div>

                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <label class="form-label">Time</label>
                                    <input name="time" type="time" id="Currenttime"
                                    value="{{ Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('H:i') }}"
                                    class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <label class="form-label">Checked By</label>
                                    <input type="text" value="{{ Auth::user()->user_name }}" readonly
                                    class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="form-label">Sales Order No</div>
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
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="form-label">Tajuk</div>
                                    <input type="text"  readonly name="" id="tajuk" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="form-label">Kod Buku</div>
                                    <input type="text" readonly  name="" id="kod_buku" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="form-label">Mesin</div>
                                    <input type="text" value="ST1" readonly name="machine" id="machine" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="kategori" class="form-control form-select" id="kategori">
                                        <option value="-1" selected disabled>pilih Kategori</option>
                                        <option value="Shrink Wrap + Packing" {{ old('kategori') == 'Shrink Wrap + Packing' ? 'selected': ''}}>Shrink Wrap + Packing</option>
                                        <option value="Packing" {{ old('kategori') == 'Packing' ? 'selected': ''}}>Packing</option>
                                        <option value="Kotak" {{ old('kategori') == 'Kotak' ? 'selected': ''}}>Kotak</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 mt-5">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">Kriteria</th>
                                                <th colspan="2">Tanda bagi yang berkenaan</th>

                                            </tr>
                                            <tr>
                                                <th>OK</th>
                                                <th>NG</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td >Kuantiti yang betul </td>
                                                <td><input type="checkbox" class="Cover1"
                                                        onchange="handleCheckboxChange('Cover1',this)" name="checklist_1" value="ok" id="" {{ old('checklist_1') == 'ok' ? 'checked' : '' }} >
                                                </td>
                                                <td><input type="checkbox" class="Cover1"
                                                        onchange="handleCheckboxChange('Cover1',this)"  value="ng" name="checklist_1"  {{ old('checklist_1') == 'ng' ? 'checked' : '' }} @if (old('checklist_1')) @else checked @endif
                                                        id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Koyak</td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" name="checklist_2" value="ok" {{ old('checklist_2') == 'ok' ? 'checked' : '' }}>
                                                </td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)"  value="ng" name="checklist_2" @if (old('checklist_2')) @else checked @endif {{ old('checklist_2') == 'ng' ? 'checked' : '' }}
                                                        id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Kotor</td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" name="checklist_3" value="ok" {{ old('checklist_3') == 'ok' ? 'checked' : '' }}>
                                                </td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)"  value="ng" name="checklist_3" @if (old('checklist_3')) @else checked @endif {{ old('checklist_3') == 'ng' ? 'checked' : '' }}
                                                        id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Pematuhan Sop</td>
                                                <td><input type="checkbox" class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)" name="checklist_4" value="ok" {{ old('checklist_4') == 'ok' ? 'checked' : '' }}>
                                                </td>
                                                <td><input type="checkbox" class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)"  value="ng" name="checklist_4" @if (old('checklist_4')) @else checked @endif {{ old('checklist_4') == 'ng' ? 'checked' : '' }}
                                                        id=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary float-right mt-3">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <a href="{{route('proses_pembungkusan')}}"><i class="ti-arrow-left mx-2 mt-1"></i>back to list</a>

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
                        $('#size').val(data.size);

                    }
                });
            });

</script>
@endpush
