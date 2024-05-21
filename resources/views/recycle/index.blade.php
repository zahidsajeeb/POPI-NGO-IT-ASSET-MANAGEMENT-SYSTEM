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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Item Recycle List</h4>
                    </div>
                    <div class="navbar-right">
                        <button type="button" class="btn btn-indigo" id="branch_modal" data-toggle="modal"  style="border-radius:0px;"><i class="icon-plus2"></i> Branch Recycle</button>
                        <button type="button" class="btn btn-indigo" id="project_modal" data-toggle="modal" style="border-radius:0px;"><i class="icon-plus2"></i> Project Recycle</button>
                        <button type="button" class="btn btn-indigo" id="head_modal" data-toggle="modal"    style="border-radius:0px;"><i class="icon-plus2"></i> Head office Recycle</button>
                        <button  onClick="history.go(0);" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-refresh"></i> Page Refresh</button>
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right"  style="border-radius:0px;"><i class="fa fa-backward"></i> Back</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Recycle Lists</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="recycle_table" style="border:1px solid;">
                            <thead style="background:#194d83;color:white;">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Action</th>
                                <th>Asset Code</th>
                                <th>Serial No</th>
                                <th>Item Name</th>
                                <th>Brand Name</th>
                                <th>Purchase Date</th>
                                <th>Recycle Date</th>
                                <th>Recycle Qty</th>
                                <th>Location</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('recycle.modal.add')
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>
</body>
</html>





