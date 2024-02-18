@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="float-left">LAPORAN PEMERIKSAAN KUALITI (PROSES PENCETAKAN)</h5>
                        <p class="float-right">TCSB-B23 (Rev.5)</p>
                    </div>
                </div>
                <div class="card" style="background:#f1f0f0;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="">Tarikh</label>
                                    <input type="date" readonly name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Masa</label>
                                <input type="time" value="Admin" readonly name="" id="" class="form-control">
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <div class="label">Diperiksa oleh</div>
                                    <input type="text" value="Admin" readonly name="" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-5">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="label">Sales Order No.</div>
                                    <select name="" id="" class="form-control form-select">
                                        <option value="">Pilih sales Order no</option>
                                        <option value="">SO-001496</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="label">Tajuk</div>
                                    <input type="text" readonly value="auto display" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="label">Kod Buku</div>
                                    <input type="text" value="auto Display" readonly name="" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="label">Mesin</div>
                                    <select name="" id="" class="form-control form-select">
                                        <option value="" disabled>pilih Mesin</option>
                                        <option value="">P1</option>
                                        <option value="">P2</option>
                                        <option value="">P3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="label">Jenis</div>
                                    <select name="" id="" class="form-control form-select">
                                        <option value="">Pilih Jenis</option>
                                        <option value="">Text</option>
                                        <option value="">Cover</option>
                                        <option value="">Leaflet</option>
                                        <option value="">Flyes</option>
                                        <option value="">Sticker</option>
                                        <option value="">EndPaper</option>
                                        <option value="">Bookmark</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="label">Seksyen No.</div>
                                    <input type="text" value="user Input" readonly name="" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label">Side</label>
                                    <select name="" id="" class="form-control form-select">
                                        <option value="" disabled>pilih side</option>
                                        <option value="" selected>A</option>
                                        <option value="">B</option>
                                        <option value="">A/B</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">


                            <div class="col-md-5 mt-3">
                                <table class="table" border="1">
                                    <thead>
                                        <tr>
                                            <td rowspan="2">Kriteria</td>
                                            <td colspan="3">Tanda bagi yang berkenaan</td>
                                        </tr>
                                        <tr>
                                            <th>Ok</th>
                                            <th>NG</th>
                                            <th>NA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="background:wheat;">
                                            <td>Artwork</td>
                                            <td><input type="checkbox" class="Cover1"
                                                    onchange="handleCheckboxChange('Cover1',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Cover1"
                                                    onchange="handleCheckboxChange('Cover1',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Cover1"
                                                    onchange="handleCheckboxChange('Cover1',this)" name="" id=""></td>

                                        </tr>
                                        <tr style="background:wheat;">
                                            <td>Turutan muka surat</td>
                                            <td><input type="checkbox" class="Text1"
                                                    onchange="handleCheckboxChange('Text1',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Text1"
                                                    onchange="handleCheckboxChange('Text1',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Text1"
                                                    onchange="handleCheckboxChange('Text1',this)" name="" id=""></td>

                                        </tr>

                                        <tr style="background:wheat;">
                                            <td>Kedudukan muka surat </td>
                                            <td><input type="checkbox" class="Cover2"
                                                    onchange="handleCheckboxChange('Cover2',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Cover2"
                                                    onchange="handleCheckboxChange('Cover2',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Cover2"
                                                    onchange="handleCheckboxChange('Cover2',this)" name="" id=""></td>

                                        </tr>

                                        <tr style="background:wheat;">
                                            <td>Saiz Spine</td>
                                            <td><input type="checkbox" class="Text2"
                                                    onchange="handleCheckboxChange('Text2',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Text2"
                                                    onchange="handleCheckboxChange('Text2',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Text2"
                                                    onchange="handleCheckboxChange('Text2',this)" name="" id=""></td>

                                        </tr>

                                        <tr style="background:wheat;">
                                            <td>Kedudukan nombor muka surat</td>
                                            <td><input type="checkbox" class="Cover3"
                                                    onchange="handleCheckboxChange('Cover3',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Cover3"
                                                    onchange="handleCheckboxChange('Cover3',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Cover3"
                                                    onchange="handleCheckboxChange('Cover3',this)" name="" id=""></td>

                                        </tr>

                                        <tr style="background:wheat;">
                                            <td>Bleed (5mm)</td>
                                            <td><input type="checkbox" class="Text3"
                                                    onchange="handleCheckboxChange('Text3',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Text3"
                                                    onchange="handleCheckboxChange('Text3',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Text3"
                                                    onchange="handleCheckboxChange('Text3',this)" name="" id=""></td>

                                        </tr>

                                        <tr>
                                            <td>Warna</td>
                                            <td><input type="checkbox" class="Cover4"
                                                    onchange="handleCheckboxChange('Cover4',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Cover4"
                                                    onchange="handleCheckboxChange('Cover4',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Cover4"
                                                    onchange="handleCheckboxChange('Cover4',this)" name="" id=""></td>

                                        </tr>

                                        <tr>
                                            <td>Artwork</td>
                                            <td><input type="checkbox" class="Text4"
                                                    onchange="handleCheckboxChange('Text4',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Text4"
                                                    onchange="handleCheckboxChange('Text4',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Text4"
                                                    onchange="handleCheckboxChange('Text4',this)" name="" id=""></td>

                                        </tr>

                                        <tr>
                                            <td>Kedudukan warna</td>
                                            <td><input type="checkbox" class="Cover5"
                                                    onchange="handleCheckboxChange('Cover5',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Cover5"
                                                    onchange="handleCheckboxChange('Cover5',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Cover5"
                                                    onchange="handleCheckboxChange('Cover5',this)" name="" id=""></td>

                                        </tr>

                                        <tr>
                                            <td>Kedudukan cetakan</td>
                                            <td><input type="checkbox" class="Text5"
                                                    onchange="handleCheckboxChange('Text5',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Text5"
                                                    onchange="handleCheckboxChange('Text5',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Text5"
                                                    onchange="handleCheckboxChange('Text5',this)" name="" id=""></td>

                                        </tr>

                                        <tr>
                                            <td>Periksa Powder</td>
                                            <td><input type="checkbox" class="Cover6"
                                                    onchange="handleCheckboxChange('Cover6',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Cover6"
                                                    onchange="handleCheckboxChange('Cover6',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Cover6"
                                                    onchange="handleCheckboxChange('Cover6',this)" name="" id=""></td>

                                        </tr>

                                        <tr>
                                            <td>Minyak</td>
                                            <td><input type="checkbox" class="Text6"
                                                    onchange="handleCheckboxChange('Text6',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Text6"
                                                    onchange="handleCheckboxChange('Text6',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Text6"
                                                    onchange="handleCheckboxChange('Text6',this)" name="" id=""></td>

                                        </tr>

                                        <tr>
                                            <td>Kotor</td>
                                            <td><input type="checkbox" class="Cover7"
                                                    onchange="handleCheckboxChange('Cover7',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Cover7"
                                                    onchange="handleCheckboxChange('Cover7',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Cover7"
                                                    onchange="handleCheckboxChange('Cover7',this)" name="" id=""></td>

                                        </tr>

                                        <tr>
                                            <td>Doubling</td>
                                            <td><input type="checkbox" class="Text7"
                                                    onchange="handleCheckboxChange('Text7',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Text7"
                                                    onchange="handleCheckboxChange('Text7',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Text7"
                                                    onchange="handleCheckboxChange('Text7',this)" name="" id=""></td>

                                        </tr>

                                        <tr>
                                            <td>Hickies</td>
                                            <td><input type="checkbox" class="Cover8"
                                                    onchange="handleCheckboxChange('Cover8',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Cover8"
                                                    onchange="handleCheckboxChange('Cover8',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Cover8"
                                                    onchange="handleCheckboxChange('Cover8',this)" name="" id=""></td>

                                        </tr>

                                        <tr>
                                            <td>Frontlay & sidelay</td>
                                            <td><input type="checkbox" class="Text8"
                                                    onchange="handleCheckboxChange('Text8',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Text8"
                                                    onchange="handleCheckboxChange('Text8',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Text8"
                                                    onchange="handleCheckboxChange('Text8',this)" name="" id=""></td>

                                        </tr>

                                        <tr>
                                            <td>Gambar / teks hilang</td>
                                            <td><input type="checkbox" class="Cover9"
                                                    onchange="handleCheckboxChange('Cover9',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Cover9"
                                                    onchange="handleCheckboxChange('Cover9',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Cover9"
                                                    onchange="handleCheckboxChange('Cover9',this)" name="" id=""></td>

                                        </tr>

                                        <tr>
                                            <td>Pematuhan SOP</td>
                                            <td><input type="checkbox" class="Text9"
                                                    onchange="handleCheckboxChange('Text9',this)" name="" id=""></td>
                                            <td><input checked type="checkbox" class="Text9"
                                                    onchange="handleCheckboxChange('Text9',this)" name="" id=""></td>
                                            <td><input type="checkbox" class="Text9"
                                                    onchange="handleCheckboxChange('Text9',this)" name="" id=""></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <h5><b>Nota :</b></h5>
                        <span>Pemeriksaan hanya dilakukan sekali semasa pengesahan 1st piece dan tidak perlu dilakukan
                            semasa proses</span>
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
    <a href="{{route('Prosespencetakan')}}">back to list</a>
</div>
@endsection
@push('custom-scripts')
<script>
    function handleCheckboxChange(className, checkbox) {
        if ($(checkbox).prop('checked')) {
            $(`.${className}`).not(checkbox).prop('checked', false);
        }
    }
</script>
@endpush