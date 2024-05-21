<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <style>
        .error {
            color: red;
            font-weight: bold;
        }

        .card {
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }

        input {
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }
    </style>
</head>
<body>
@include('admin.include.navbar')
<div class="page-content">
    @include('admin.include.sidebar')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Item Distribution Previous Record</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('servicing/index')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-group-control card-group-control-right">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h4 class="card-title"><b>Item Distribution Previous Record</b></h4>
                                    @if($check_service)
                                        <span style="color:red;"><b>(* This Item is in Servicing Center *)</b></span>
                                    @endif
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <form action="" method="post" id="servicing_add_form">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                                        <ul></ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-bordered" style="margin-bottom:15px !important;">
                                                <tr>
                                                    <td style="background:#ededed;"><b>Asset Code</b></td>
                                                    <td>{{$data->asset_code}}</td>
                                                    <td style="background:#ededed;"><b>Item Name</b></td>
                                                    <td>{{$item_name->item_name}}</td>
                                                    <td style="background:#ededed;"><b>Brand Name</b></td>
                                                    <td>{{$brand_name->brand_name}}</td>
                                                </tr>
                                                @if($emp_info==null)
                                                <tr>
                                                    <td style="background:#ededed;"><b>Branch Name:</b></td>
                                                    <td>
                                                        @if($branch_name)
                                                            {{$branch_name->branch_name}}
                                                        @endif
                                                        @if($branch_name)
                                                            <input type="hidden" class="form-control" value="{{$branch_name->id}}" name="branch_id" readonly>
                                                        @endif
                                                        <input type="hidden" class="form-control" value="{{$distribution_data->id}}" name="distribution_id" readonly>
                                                        <input type="hidden" class="form-control" value="{{$info->return_qty}}" name="return_qty" readonly>
                                                    </td>
                                                    <td style="background:#ededed;"><b>Zone Name</b></td>
                                                    <td>
                                                        @if($zone_name)
                                                            {{$zone_name->zone_name}}
                                                        @endif
                                                    </td>
                                                    <td style="background:#ededed;"><b>Region Name</b></td>
                                                    <td>
                                                        @if($region_name)
                                                            {{$region_name->region_name}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endif
                                                @if($emp_info!=null)
                                                <tr>
                                                    <td style="background:#ededed;"><b>Employee Name:</b></td>
                                                    <td>
                                                        {{$emp_info->employee_name}}
                                                    </td>
                                                    <td style="background:#ededed;"><b>Employee ID</b></td>
                                                    <td>
                                                        {{$emp_info->employee_id}}
                                                    </td>
                                                    <td style="background:#ededed;"><b>Department</b></td>
                                                    <td>
                                                        {{$emp_info->department_name}}
                                                    </td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td style="background:#ededed;"><b>Vendor Name</b></td>
                                                    <td>{{$vendor_name->vendor_name}}</td>
                                                    <td style="background:#ededed;"><b>Item Description</b></td>
                                                    <td colspan="7">{{$data->item_desc}}</td>
                                                </tr>

                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>
</body>
</html>











