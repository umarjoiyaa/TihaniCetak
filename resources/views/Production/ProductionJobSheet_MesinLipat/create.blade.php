@extends('layouts.app')

@section('content')
<form action="{{ route('mesin_lipat.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="float-left"><b>JOBSHEET - MESIN LIPAT</b></h5>
                            <p class="float-right">TCBS-B46 (Rev. 1)</p>
                        </div>
                    </div>


                    <div class="card" style="background:#f1f0f0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="">Tarikh</label>
                                        <input type="text" name="date"
                                            value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" class="form-control"
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
                                        <div class="label">Kuantiti So </div>
                                        <input type="text"  readonly name="" id="sale_order_qty"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Jumlah Seksyen</div>
                                        <input type="text"  readonly name="jumlah_seksyen" id="jumlah"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Jenis Lipatan</div>
                                        <select name="jenis_lipatan" id="jenis" placeholder="" class="form-control form-select">

                                            <option value="Prefect Bind">Prefect Bind</option>
                                            <option value="Lock Bind">Lock Bind</option>
                                            <option value="Staple Bind">Staple Bind</option>
                                            <!-- <option value="">order</option> -->
                                            <!-- <option value="">PENEGELUAREN</option> -->
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label">Mesin</div>
                                        <select name="mesin" id="mesin" class="form-control form-select">

                                            <option value="F1">F1</option>
                                            <option value="F2">F2</option>
                                            <!-- <option value="">F3</option> -->
                                            <!-- <option value="">order</option> -->
                                            <!-- <option value="">PENEGELUAREN</option> -->
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <!-- <div class="row mt-5">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Mesin</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">REVORIA SC170 FUJIFIILM</option>
                                                <option value="">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Kategori job</div>
                                            <select name="" id="" placeholder="Pilih Kategori Job" class="form-control">
                                                <option value="">MOCK UP</option>
                                                <option value="">PENEGELUAREN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Jenis produk</label>
                                            <select name="" id="" placeholder="Pilih Jenis produk" class="form-control">
                                                <option value="">BUKU</option>
                                                <option value="">FLYERS</option>
                                                <option value="">POSTER</option>
                                                <option value="">BUSINESS CARD</option>
                                                <option value="">KAD KAHWIN</option>
                                                <option value="">STICKERS</option>
                                                <option value="">OTHERS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Kertas: teks</div>
                                            <input type="text" value="Input teks" readonly name="" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="label">Kertas: Cover</div>
                                            <input type="text" value="input teks" readonly name="" id=""
                                                class="form-control">
                                        </div>
                                    </div>

                                </div> -->
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center" style="font-size:20px; color:red; dispaly:inline-block;">
                                <div class="row">

                                    <div class="col-md-12">
                                        <h5 style="font-size:30px;"><b>PERINGATAN :</b> <br>
                                            <span style="color:black; font-size:16px;">
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
            <a href="{{route('mesin_lipat')}}">back to list</a>
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
                templateResult: function(data) {
                    if (data.loading) {
                        return "Loading...";
                    }

                    return $('<option value=' + data.id + '>' + data.order_no + '</option>');
                },
                templateSelection: function(data) {
                    return data.order_no || null;
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
                        $('#size').val(data.sale_order.size);
                        $('#sale_order_qty').val(data.sale_order.sale_order_qty);
                        $('#jumlah').val(data.section.item_cover_text);
                    }
                });
            });
        });
    </script>
@endpush
