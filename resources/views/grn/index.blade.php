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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - GRN List</h4>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Bill Lists (PURCHASE)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="bill_table_purchase" style="border:1px solid; text-align:center;">
                                <thead style="background:#194d83;color:white; text-align:center;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Action</th>
                                    <th class="text-center">Bill No</th>
                                    <th class="text-center">Vendor Name</th>
                                    <th class="text-center">Bill Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Bill Lists (SERVICING)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="bill_table_service" style="border:1px solid; text-align:center;">
                                <thead style="background:#194d83;color:white; text-align:center;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Action</th>
                                    <th class="text-center">Bill No</th>
                                    <th class="text-center">Vendor Name</th>
                                    <th class="text-center">Bill Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">GRN Lists (Purchase)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="grn_purchase_table" style="border:1px solid; text-align:center;">
                                <thead style="background:#194d83;color:white; text-align:center;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Action</th>
                                    <th class="text-center">Bill No</th>
                                    <th class="text-center">GRN No</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">GRN Lists (Servicing)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="grn_servicing_table" style="border:1px solid; text-align:center;">
                                <thead style="background:#194d83;color:white; text-align:center;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Action</th>
                                    <th class="text-center">Bill No</th>
                                    <th class="text-center">GRN No</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include('grn.modal.add')
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>
</body>
</html>







