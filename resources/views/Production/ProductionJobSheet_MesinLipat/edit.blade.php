@extends('layouts.app')

@section('content')
    <form action="{{ route('mesin_lipat.update', $mesin_lipat->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="float-left"><b>JOBSHEET - MESIN LIPAT</b></h5>
                                <p class="float-right">TCSB-B46 (Rev. 1)</p>
                            </div>
                        </div>


                        <div class="card" style="background:#f4f4ff;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="">Tarikh</label>
                                            <input type="text" name="date" value="{{ $mesin_lipat->date }}"
                                                class="form-control" id="datepicker" pattern="\d{2}-\d{2}-\d{4}"
                                                placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Disediakan Oleh</label>
                                        <input type="text" readonly name="" value="{{ Auth::user()->full_name }}"
                                            id="" class="form-control">
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="" class="form-label">Sales Order No.</label>
                                            <select name="sale_order" data-id="{{ $mesin_lipat->sale_order_id }}"
                                                id="sale_order" class="form-control">
                                                <option value="{{ $mesin_lipat->sale_order_id }}" selected
                                                    style="color: black; !important">
                                                    {{ $mesin_lipat->sale_order->order_no }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="" class="form-label"> Tajuk </label>
                                            <input type="text" readonly name="" id="tajuk"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="" class="form-label">Kod Buku</label>
                                            <input type="text" id="kod_buku" readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Pelanggan</label>
                                            <input type="text" readonly name="" id="customer"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Kuantiti SO </label>
                                            <input type="text" readonly name="" id="sale_order_qty"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Jumlah Seksyen</label>
                                            <input type="text" readonly id="jumlah"
                                                class="form-control" name="jumlah_seksyen">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Jenis Lipatan</label>
                                            <select name="jenis_lipatan" id="jenis" placeholder=""
                                                class="form-control form-select">

                                                <option value="Prefect Bind" @selected($mesin_lipat->jenis_lipatan == 'Prefect Bind')>Prefect Bind
                                                </option>
                                                <option value="Lock Bind" @selected($mesin_lipat->jenis_lipatan == 'Lock Bind')>Lock Bind</option>
                                                <option value="Staple Bind" @selected($mesin_lipat->jenis_lipatan == 'Staple Bind')>Staple Bind
                                                </option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Mesin</label>
                                            <select name="mesin" id="mesin" class="form-control form-select">
                                                <option value="F1" @selected($mesin_lipat->mesin == 'F1')>F1</option>
                                                <option value="F2" @selected($mesin_lipat->mesin == 'F2')>F2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center" style="font-size:20px; color:red; dispaly:inline-block;">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <h5 style="font-size:20px;"><b>PERINGATAN :</b> <br>
                                                <span style="color:black; font-size:14px;">
                                                    <b>SERAHKAN SAMPLE KEPADA QC/EKSEKUTIF QA/PENGURUS OPERASI/PENYELIA
                                                        OPERASI UNTUK PENGESAHAN SEBELUM MEMULAKAN PROSES LIPAT</b>
                                                </span>
                                            </h5>
                                        </div>
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
                <a href="{{ route('mesin_lipat') }}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
            </div>
        </div>
    </form>
@endsection
@push('custom-scripts')
    <script>
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
                    return data.text || null;
                }
            });
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
                    $('#customer').val(data.sale_order.customer);
                    $('#size').val(data.sale_order.size);
                    $('#sale_order_qty').val(data.sale_order.sale_order_qty);
                    if (data.section != null) {
                        $('#jumlah').val(data.section.item_cover_text);
                    } else {
                        $('#jumlah').val(0);
                    }
                }
            });
        });
    </script>
@endpush
