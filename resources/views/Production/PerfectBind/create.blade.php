@extends('layouts.app')

@section('content')
<form action="{{ route('perfect_bind.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>JOBSHEET - PERFECT BIND</b></h5>
                            <p class="float-right">TCBS-B58 (Rev. 1)</p>
                        </div>
                    </div>


                    <div class="card" style="background:#f4f4ff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Tarikh</label>
                                        <input type="text" name="date"
                                            value="{{ \Carbon\Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y') }}" class="form-control"
                                            id="datepicker" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Disediakan Oleh</label>
                                    <input type="text" readonly name="" value="{{ Auth::user()->full_name }}" id="" class="form-control">
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Sales Order No.</div>
                                        <select name="sale_order" id="sale_order" class="form-control">
                                            <option value="-1" selected disabled >Select a Sale Order</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label"> Tajuk </div>
                                        <input type="text"  readonly name="" id="tajuk"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="label">Kod Buku</div>
                                        <input type="text" readonly  id="kod_buku" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Pelanggan</div>
                                        <input type="text"  readonly name="" id="customer"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Kuantiti</div>
                                        <input type="text"  readonly name="" id="sale_order_qty"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Jumlah Seksyen</div>
                                        <input type="text" readonly id="jumlah"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Jenis Penjilidan</div>
                                        <select name="jenis" id="jenis" class="form-control form-select">
                                            <option value="PERFECT BIND">PERFECT BIND</option>
                                            <option value="LOCK BIND">LOCK BIND</option>
                                            <option value="GATHER">GATHER</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Mesin</div>
                                        <input type="text" readonly id="machine"
                                            class="form-control" value="PB1" name="mesin">
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
                                        <h5 style="font-size:30px;"><b>PERINGATAN :</b> <br>
                                            <span style="color:black; font-size:16px;">
                                                <b>SERAHKAN SAMPLE KEPADA QC/EKSEKUTIF QC/EKSEKUTIF QA/PENGURUS OPERASI/PENYELIA
                                                    OPERASI UNTUK PENGESAHAN SEBELUM MEMULAKAN PROSES PENJILIDAN</b>
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
            <a href="{{route('perfect_bind')}}"><i class="ti-arrow-left mx-2 mt-1"></i> back to list</a>
        </div>
    </div>
</form>
@endsection
@push('custom-scripts')
    <script>
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
                    url: '{{ route('sale_order_penjilidan.detail.get') }}',
                    data: {
                        "id": id
                    },
                    success: function(data) {
                        $('#kod_buku').val(data.sale_order.kod_buku);
                        $('#tajuk').val(data.sale_order.description);
                        $('#customer').val(data.sale_order.customer);
                        $('#sale_order_qty').val(data.sale_order.sale_order_qty);
                        if(data.section != null){
                            $('#jumlah').val(data.section.item_cover_text);
                        }else{
                            $('#jumlah').val(0);
                        }
                    }
                });
            });
        });
    </script>
@endpush
