@php
    error_reporting(E_ALL);
	error_reporting(E_ALL & ~E_NOTICE);
@endphp
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Servicing List</h4>
                    </div>
                    <div class="navbar-right">
                        <button type="button" class="btn btn-indigo" id="branch_modal" data-toggle="modal" data-target="#modal_branch_servicing_add1211212"    style="border-radius:0px;"><i class="icon-plus2"></i> Branch Servicing</button>
                        <button type="button" class="btn btn-indigo" id="project_modal" data-toggle="modal" data-target="#modal_project_servicing_add2212121"    style="border-radius:0px;"><i class="icon-plus2"></i> Project Servicing</button>
                        <button type="button" class="btn btn-indigo" id="head_modal" data-toggle="modal" data-target="#modal_head_servicing_add1212121"    style="border-radius:0px;"><i class="icon-plus2"></i> Head office Servicing</button>
                        <button  onClick="history.go(0);" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-refresh"></i> Page Refresh</button>
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right"  style="border-radius:0px;"><i class="fa fa-backward"></i> Back</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Servicing Lists</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="servicing_table" style="border:1px solid;">
                            <thead style="background:#194d83;color:white;">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Action</th>
                                <th>Asset Code</th>
                                <th>Serial No</th>
                                <th>Branch Name</th>
                                <th>Bill No</th>
                                <th>Vendor Name</th>
                                <th>Item Name</th>
                                <th>Servicing To</th>
                                <th>Servicing Return</th>
                                <th>Service Warranty</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Distribution Lists</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="distribution_table" style="border:1px solid;">
                            <thead style="background:#194d83;color:white;">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Action</th>
                                <th>Asset Code</th>
                                <th>Branch Name</th>
                                <th>Item Name</th>
                                <th>Serial No</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($distribution_list as $key=>$row)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>
                                    <a href="{{url('servicing/distribution_history', $row->id)}}" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Previous Distribution Check</a>
                                   @if($row->servicing_status == '1')
                                        <button type="submit" data-id='{{$row->id}}' id="distributon" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Distribution</button>
                                    @endif
{{--                                <a href="{{url('servicing/distribution', $row->id)}}" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Distribution</a>--}}
                                </td>
                                <td>{{$row->asset_code}}</td>
                                <td>{{$row->branch_name}}</td>
                                <td>{{$row->item_name}}</td>
                                <td>{{$row->serial_no}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('servicing.modal.add')
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>
</body>
</html>





