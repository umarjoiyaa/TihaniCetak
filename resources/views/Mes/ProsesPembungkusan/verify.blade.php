@extends('layouts.app')

@section('content')

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

                                    <input type="text" disabled  name="date" value="{{ \Carbon\Carbon::parse($proses_pembungkusan->date)->format('d-m-Y') }}" class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                </div>
                            </div>

                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    @php
                                    $timeIn24HourFormat = Carbon\Carbon::createFromFormat('h:i A', $proses_pembungkusan->time)->format('H:i');
                                @endphp
                                <div class="form-label">Time</div>
                                <input name="time" type="time" id="Currenttime"
                                    value="{{$timeIn24HourFormat}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <label class="form-label">Checked By</label>
                                    <input type="text"  value="{{ $proses_pembungkusan->user->user_name }}" readonly
                                    class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="form-label">Sales Order No</div>
                                    <select name="sale_order" disabled data-id="{{ $proses_pembungkusan->sale_order_id }}"
                                        id="sale_order" class="form-control">
                                        <option value="{{ $proses_pembungkusan->sale_order_id }}" selected
                                            style="color: black; !important">
                                            {{ $proses_pembungkusan->sale_order->order_no }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="form-label">Tajuk</div>
                                    <input type="text"  readonly name="" id="tajuk" value="{{ $proses_pembungkusan->sale_order->description  }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <div class="form-label">Kod Buku</div>
                                    <input type="text" readonly  name="" id="kod_buku" value="{{ $proses_pembungkusan->sale_order->kod_buku  }}" class="form-control">
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
                                    <select name="kategori" disabled class="form-control form-select" id="kategori">
                                        <option value="-1">pilih Kategori</option>
                                        <option value="Shrink Wrap + Packing" @selected($proses_pembungkusan->kategori == "Shrink Wrap + Packing" )>Shrink Wrap + Packing</option>
                                        <option value="Packing" @selected($proses_pembungkusan->kategori == "Packing" )>Packing</option>
                                        <option value="Kotak" @selected($proses_pembungkusan->kategori == "Kotak" )>Kotak</option>
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
                                                        onchange="handleCheckboxChange('Cover1',this)" disabled  @checked($proses_pembungkusan->checklist_1 == "ok")  name="checklist_1" value="ok" id="">
                                                </td>
                                                <td><input type="checkbox" class="Cover1"
                                                        onchange="handleCheckboxChange('Cover1',this)" disabled @checked($proses_pembungkusan->checklist_1 == "ng") value="ng" name="checklist_1"
                                                        id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Koyak</td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" disabled name="checklist_2" @checked($proses_pembungkusan->checklist_2 == "ok") value="ok"  id="">
                                                </td>
                                                <td><input type="checkbox" class="Text1"
                                                        onchange="handleCheckboxChange('Text1',this)" disabled @checked($proses_pembungkusan->checklist_2 == "ng") value="ng" name="checklist_2"
                                                        id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Kotor</td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" disabled name="checklist_3" @checked($proses_pembungkusan->checklist_3 == "ok") value="ok" id="">
                                                </td>
                                                <td><input type="checkbox" class="Cover2"
                                                        onchange="handleCheckboxChange('Cover2',this)" disabled @checked($proses_pembungkusan->checklist_3 == "ng") value="ng" name="checklist_3"
                                                        id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Pematuhan Sop</td>
                                                <td><input type="checkbox" class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)" disabled name="checklist_4" @checked($proses_pembungkusan->checklist_4 == "ok") value="ok"  id="">
                                                </td>
                                                <td><input type="checkbox" class="Text2"
                                                        onchange="handleCheckboxChange('Text2',this)" disabled @checked($proses_pembungkusan->checklist_4 == "ng") value="ng" name="checklist_4"
                                                        id=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-end mt-5">
                    <div class="col-md-12 d-flex justify-content-end">
                        <form action="{{ route('proses_pembungkusan.approve.decline', $proses_pembungkusan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <button class="btn btn-danger mx-2" type="submit">Decline</button>
                        </form>
                        <form action="{{ route('proses_pembungkusan.approve.approve', $proses_pembungkusan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <button class="btn btn-primary" type="submit"> Verify</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('proses_pembungkusan')}}"><i class="ti-arrow-left mx-2 mt-1"></i>
                back to list</a>
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
                templateResult: function(data) {
                    if (data.loading) {
                        return "Loading...";
                    }

                    return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                },
                templateSelection: function(data) {
                    return data.text || null;
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
                        $('#size').val(data.size);

                    }
                });
            });
        });

</script>
@endpush
