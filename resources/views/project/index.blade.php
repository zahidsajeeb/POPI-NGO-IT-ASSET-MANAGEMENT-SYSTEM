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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Project List</h4>
                    </div>
                    <div class="navbar-right">
                        <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#modal_project_add" style="border-radius:0px;"><i class="icon-plus2"></i> Add Project</button>
                        <button  onClick="history.go(0);" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-refresh"></i> Page Refresh</button>
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Project Lists</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="project_table" style="border:1px solid; text-align:center;">
                                <thead style="background:#194d83;color:white; text-align:center;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Action</th>
                                    <th class="text-center">Project Name</th>
                                    <th class="text-center">Project Start Date</th>
                                    <th class="text-center">Project End Date</th>
                                    <th class="text-center">Time Left</th>
                                    <th class="text-center">Created By</th>
                                    <th class="text-center">Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include('project.modal.add')
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>
</body>
</html>







