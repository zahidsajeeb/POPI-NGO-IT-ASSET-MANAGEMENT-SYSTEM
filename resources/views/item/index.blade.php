@php
error_reporting(0);
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Item List</h4>
                    </div>
                    <div class="navbar-right">
                        <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#modal_item_name_add" style="border-radius:0px;"><i class="icon-plus2"></i> Add Item Name</button>
                        <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#modal_brand_add" style="border-radius:0px;"><i class="icon-plus2"></i> Add Brand</button>
                        <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#modal_vendor_add" style="border-radius:0px;"><i class="icon-plus2"></i> Add Vendor</button>
                        <button  onClick="history.go(0);" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-refresh"></i> Page Refresh</button>
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Fixed Asset Item Lists</h5>
                        <hr>
                        <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#modal_fixed_item_add" style="border-radius:0px;"><i class="icon-plus2"></i> Add Fixed Asset Item</button>
                        <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#modal_non_fixed_item_add" style="border-radius:0px;"><i class="icon-plus2"></i> Add Non Fixed Asset Item</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="fixed_item_table" style="border:1px solid; text-align:center;">
                                <thead style="background:#194d83;color:white; text-align:center;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Action</th>
                                    <th class="text-center">Asset Code</th>
                                    <th class="text-center">Bill No</th>
                                    <th class="text-center">Serial No</th>
                                    <th class="text-center">Item Name</th>
                                    <th class="text-center">Brand Name</th>
                                    <th class="text-center">Vendor Name</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Purchase Date</th>
                                    <th class="text-center">Warranty Exp date</th>
                                    <th class="text-center">Warranty Time Left</th>
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
                        <h5 class="card-title">Non Fixed Asset Item Lists</h5>
                        <hr>
                        <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#modal_non_fixed_item_add" style="border-radius:0px;"><i class="icon-plus2"></i> Add Non Fixed Asset Item</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="non_fixed_item_table" style="border:1px solid; text-align:center;">
                                <thead style="background:#194d83;color:white; text-align:center;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Action</th>
                                    <th class="text-center">Asset Code</th>
                                    <th class="text-center">Bill No</th>
                                    <th class="text-center">Item Name</th>
                                    <th class="text-center">Brand Name</th>
                                    <th class="text-center">Vendor Name</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Total Price</th>
                                    <th class="text-center">Unit Price (TK)</th>
                                    <th class="text-center">Purchase Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include('item.modal.item.add')
                @include('item.modal.item_name.add')
                @include('item.modal.brand.add')
                @include('item.modal.vendor.add')
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>
</body>
</html>





