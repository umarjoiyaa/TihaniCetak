@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3><b>Manage Transfer</b></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{route('Manage_tranfer.create')}}" class="btn btn-primary mt-3 mb-3 float-right">Create</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>Ref No.</th>
                                    <th>Tarikh</th>
                                    <th>Sales Order No</th>
                                    <th>Description</th>
                                    <th>Diminta Oleh</th>
                                    <th>Dikeluarkan Oleh</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
<script>
    $('#example').DataTable()
</script>
@endPush