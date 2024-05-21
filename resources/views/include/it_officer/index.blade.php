<div class="page-content">
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome To POPI SOFTWARE</h4>
                    </div>
                </div>
            </div>
            <div class="content">
{{--                @if($notice_list)--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="alert alert-info alert-dismissible">--}}
{{--                                <h3><b>Notice:</b></h3>--}}
{{--                                <span class="font-weight-semibold">{{$notice_list->notice}}</span>.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-body border-top-info">
                            <div class="text-center">
                                <h6 class="font-weight-semibold mb-0">Toner Purchase Request</h6>
                                <p class="mb-3 text-muted">Specify target in <code>href</code> attribute</p>

                                <a class="btn btn-primary" href="{{url('other/toner_purchase')}}">
                                    Ckick Here
                                </a>
                            </div>

                            <div class="collapse" id="collapse-link-collapsed">
                                <div class="mt-3">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-body border-top-info">
                            <div class="text-center">
                                <h6 class="font-weight-semibold mb-0">Branch/Project Working/Visiting Form</h6>
                                <p class="mb-3 text-muted">Specify target in <code>href</code> attribute</p>

                                <a class="btn btn-primary" href="{{url('other/visiting_working_info')}}">
                                    Ckick Here
                                </a>
                            </div>

                            <div class="collapse" id="collapse-link-collapsed">
                                <div class="mt-3">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-body border-top-info">
                            <div class="text-center">
                                <h6 class="font-weight-semibold mb-0">Purchase Request Form</h6>
                                <p class="mb-3 text-muted">Specify target in <code>href</code> attribute</p>

                                <a class="btn btn-primary" href="{{url('other/purchase_request')}}">
                                    Ckick Here
                                </a>
                            </div>

                            <div class="collapse" id="collapse-link-collapsed">
                                <div class="mt-3">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="card-group-control card-group-control-right">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h3 class="card-title" style="font-weight:bold;">Region Item Distribution Lists</h3>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="branch_distribution_table" style="border:1px solid; text-align:center;width:100% !important;">
                                                <thead style="background:#194d83;color:white; text-align:center;">
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Asset Code</th>
                                                    <th class="text-center">Region</th>
                                                    <th class="text-center">Zone</th>
                                                    <th class="text-center">Branch</th>
                                                    <th class="text-center">Item Name</th>
                                                    <th class="text-center">Brand Name</th>
                                                    <th class="text-center">Distribution Qty</th>
                                                    <th class="text-center">Distribution Date</th>
                                                    <th class="text-center">Distribution Type</th>
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
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

