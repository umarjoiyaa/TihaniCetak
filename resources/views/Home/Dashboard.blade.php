@extends('app')
@section('content')

<style>
.childCard{
    background-color: #E3E2EE;
    border-radius: 17px
    /* box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px; */
}
.Management{
    font-size: 16px;
    background:white;
    border-radius: 2.3vh
}

.Dashboard a, a:hover{
color: #18002D !important;
}
</style>

<div class="row row-sm Dasboard">
    <div class="col-xl-12">
        <div class="card">

            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title tx-20 mg-b-0 p-2">Dashboard</h4>
                </div>
                    <div class="row mt-3">
                        <div class="col-md-2">
                            <div class="card childCard ht-80p" >
                                <div class="card-body text-center ">
                                    <span class="badge  p-2 text-lg-center mb-2 Management" > Management</span>
                                    <div class="card " style="border-radius:17px;background:#ddcdf0;">
                                        <div class="card-body">
                                           <a href="">
                                            <iconify-icon icon="pepicons-pop:file" width="24" height="24"></iconify-icon><br>
                                            <span style="font-size:14px !important;font-weight: bold;">Sales Order List</span>
                                           </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card childCard" >
                                <div class="card-body text-center ">
                                    <span class="badge p-2 text-lg-center mb-2 Management" > Production Jobsheet </span>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">
                                                   <a href="">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24" height="24"></iconify-icon><br>
                                                    <span style="font-size:14px !important; font-weight: bold;">Digital printing</span>
                                                   </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">
                                                   <a href="">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24" height="24"></iconify-icon><br>
                                                    <span style="font-size:14px !important; font-weight: bold;">Cover & Endpaper</span>
                                                   </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">
                                                   <a href="">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24" height="24"></iconify-icon><br>
                                                    <span style="font-size:14px !important;font-weight: bold;">Text</span>
                                                    <br>
                                                    <br>

                                                   </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">
                                                   <a href="">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24" height="24"></iconify-icon><br>
                                                    <span style="font-size:14px !important; font-weight: bold;">Digital printing</span>
                                                   </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">
                                                   <a href="">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24" height="24"></iconify-icon><br>
                                                    <span style="font-size:14px !important; font-weight: bold;">Cover & Endpaper</span>
                                                   </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">
                                                   <a href="">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24" height="24"></iconify-icon><br>
                                                    <span style="font-size:14px !important;font-weight: bold;">Text</span>
                                                    <br>
                                                    <br>

                                                   </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">
                                                   <a href="">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24" height="24"></iconify-icon><br>
                                                    <span style="font-size:14px !important; font-weight: bold;">Digital printing</span>
                                                   </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">
                                                   <a href="">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24" height="24"></iconify-icon><br>
                                                    <span style="font-size:14px !important; font-weight: bold;">Cover & Endpaper</span>
                                                   </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card " style="border-radius:17px;background:#788fd5;">
                                                <div class="card-body">
                                                   <a href="">
                                                    <iconify-icon icon="mdi:file-cog-outline" width="24" height="24"></iconify-icon><br>
                                                    <span style="font-size:14px !important;font-weight: bold;">Text</span>
                                                    <br>
                                                    <br>

                                                   </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">

                        </div>
                    </div>


            </div>
        </div>
    </div>

</div>


@endsection

