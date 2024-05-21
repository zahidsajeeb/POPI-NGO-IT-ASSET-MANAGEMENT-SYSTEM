<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <style>
        .error{
            color:red;
            font-weight:bold;
        }
        .card{
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }
        input{
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Branch List</h4>
                    </div>
                    <div class="navbar-right">
                        <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#modal_region_add" style="border-radius:0px;"><i class="icon-plus2"></i> Add Region </button>
                        <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#modal_zone_add" style="border-radius:0px;"><i class="icon-plus2"></i> Add Zone </button>
                        <button type="button" class="btn btn-indigo" id="branch_modal" data-toggle="modal" data-target="#modal_branch_add122112" style="border-radius:0px;"><i class="icon-plus2"></i> Add Branch</button>
                        <button  onClick="history.go(0);" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-refresh"></i> Page Refresh</button>
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Branch Lists</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="branch_table" style="border:1px solid; text-align:center;">
                                <thead style="background:#194d83;color:white; text-align:center;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Action</th>
                                    <th class="text-center">Region Name</th>
                                    <th class="text-center">Zone Name</th>
                                    <th class="text-center">Branch Name</th>
                                    <th class="text-center">Phone No</th>
                                    <th class="text-center">Created Date</th>
                                    <th class="text-center">Created By</th>
                                    <th class="text-center">Note</th>
                                    <th class="text-center">Closing Date</th>
                                    <th class="text-center">Closing Note</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include('branch.modal.region.add')
                @include('branch.modal.zone.add')
                @include('branch.modal.branch.add')
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>
</body>
</html>






