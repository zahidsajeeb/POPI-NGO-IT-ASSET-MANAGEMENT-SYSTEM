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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Item Distribution</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-group-control card-group-control-right">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h6 class="card-title">
                                        <a class="text-body collapsed" data-toggle="collapse" href="#branch_distribution">
                                            <i class="icon-help mr-2 text-secondary"></i> Item Distribution To Branch
                                        </a>
                                    </h6>
                                </div>
                                <div id="branch_distribution" class="collapse">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <form action="" method="post" id="distribution_branch_add_form">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-danger print-error-msg" style="display:none">
                                                            <ul></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <h4>Item</h4>
                                                        <hr>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Asset Code:</label> <br>
                                                            <select name="asset_code" class="form-control asset_code required" id="asset_code" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                                <option disabled selected>-Select-</option>
                                                                @foreach($asset_code as $row)
                                                                    <option value="{{$row->id}}">{{$row->asset_code}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Item Name:</label> <br>
                                                            <select name="item_id" id="item_name" class="form-control item_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                        </div>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Brand Name:</label> <br>
                                                            <select name="brand_id" id="brand_name" class="form-control brand_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>Distribution For</h4>
                                                        <hr>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Region Name:</label> <br>
                                                            <select name="region_id" class="form-control region_name required" id="region_name" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                                <option disabled selected>-Select-</option>
                                                                @foreach($region as $row)
                                                                    <option value="{{$row->id}}">{{$row->region_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Zone Name:</label> <br>
                                                            <select name="zone_id" id="zone_name" class="form-control zone_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                        </div>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Branch Name:</label> <br>
                                                            <select name="branch_id" id="branch_name" class="form-control branch_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>Distribution Details</h4>
                                                        <hr>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Distribution Date:</label> <br>
                                                            <input type="date" name="distribution_date" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                        </div>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Item Type:</label> <br>
                                                            <select name="item_type" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                                <option disabled selected>-Select-</option>
                                                                <option value="New">New</option>
                                                                <option value="Old">Old</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <button type="submit" id="update" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
                                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-12">
                                            <h4>Branch Item Distribution Lists</h4>
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="branch_distribution_table" style="border:1px solid; text-align:center;width:100% !important;">
                                                    <thead style="background:#194d83;color:white; text-align:center;">
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Action</th>
                                                        <th class="text-center">Asset Code</th>
                                                        <th class="text-center">Region Name</th>
                                                        <th class="text-center">Zone Name</th>
                                                        <th class="text-center">Branch Name</th>
                                                        <th class="text-center">Item Name</th>
                                                        <th class="text-center">Brand Name</th>
                                                        <th class="text-center">Distribution Date</th>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-group-control card-group-control-right">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h6 class="card-title">
                                        <a class="text-body collapsed" data-toggle="collapse" href="#head_distribution">
                                            <i class="icon-help mr-2 text-secondary"></i> Item Distribution To Head office
                                        </a>
                                    </h6>
                                </div>
                                <div id="head_distribution" class="collapse">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <form action="" method="post" id="distribution_head_office_add_form">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-danger print-error-msg" style="display:none">
                                                            <ul></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <h4>Item</h4>
                                                        <hr>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Asset Code:</label> <br>
                                                            <select name="asset_code" class="form-control asset_code required" id="asset_code" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                                <option disabled selected>-Select-</option>
                                                                @foreach($asset_code as $row)
                                                                    <option value="{{$row->id}}">{{$row->asset_code}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Item Name:</label> <br>
                                                            <select name="item_id" id="item_name" class="form-control item_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                        </div>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Brand Name:</label> <br>
                                                            <select name="brand_id" id="brand_name" class="form-control brand_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>Distribution For</h4>
                                                        <hr>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Employee ID:</label> <br>
                                                            <select name="emp_id" class="form-control required" id="emp_id" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                                <option disabled selected>-Select-</option>
                                                                @foreach($emp_id as $row)
                                                                    <option value="{{$row->id}}">{{$row->employee_id}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Employee Name:</label> <br>
                                                            <select id="employee_name" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                        </div>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Employee Department:</label> <br>
                                                            <select name="department_id" id="emp_dept" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>Distribution Details</h4>
                                                        <hr>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Distribution Date:</label> <br>
                                                            <input type="date" name="distribution_date" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                        </div>
                                                        <div class="col-md-12" style="margin-bottom:10px;">
                                                            <label style="font-weight:bold;">Item Type:</label> <br>
                                                            <select name="item_type" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                                <option disabled selected>-Select-</option>
                                                                <option value="New">New</option>
                                                                <option value="Old">Old</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <button type="submit" id="update" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
                                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-12">
                                            <h4>Head Office Item Distribution Lists</h4>
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="head_office_distribution_table" style="border:1px solid; text-align:center;width:100% !important;">
                                                    <thead style="background:#194d83;color:white; text-align:center;">
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Action</th>
                                                        <th class="text-center">Asset Code</th>
                                                        <th class="text-center">Employee ID</th>
                                                        <th class="text-center">Employee Name</th>
                                                        <th class="text-center">Department</th>
                                                        <th class="text-center">Item Name</th>
                                                        <th class="text-center">Brand Name</th>
                                                        <th class="text-center">Distribution Date</th>
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
            <div id="modal_branch_distribution_edit" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-indigo text-white">
                            <h6 class="modal-title"><i class="fa fa-cart-plus"></i> Branch Item Distribution Edit</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="card-group-control card-group-control-right">
                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <h6 class="card-title">
                                                            <a class="text-body collapsed" data-toggle="collapse" href="#branch_edit">
                                                                <i class="icon-help mr-2 text-secondary"></i> Distribution Item Details
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="branch_edit" class="collapse">
                                                        <div class="card-body">
                                                            <div class="row" style="margin-bottom:10px;">
                                                                <div class="col-md-12">
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <td style="font-weight:bold;background:#80808017;">Item Asset Code</td>
                                                                            <td><input id="show_asset_code" style="border:0px;"></td>
                                                                            <td style="font-weight:bold;background:#80808017;">Region Name</td>
                                                                            <td><input id="show_region_name" style="border:0px;"></td>
                                                                            <td style="font-weight:bold;background:#80808017;">Distribution Date</td>
                                                                            <td><input id="show_distribution_date" style="border:0px;"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="font-weight:bold;background:#80808017;">Item Name</td>
                                                                            <td><input id="show_item_name" style="border:0px;"></td>
                                                                            <td style="font-weight:bold;background:#80808017;">Zone Name</td>
                                                                            <td><input id="show_zone_name" style="border:0px;"></td>
                                                                            <td style="font-weight:bold;background:#80808017;">Item Type</td>
                                                                            <td><input id="show_item_type" style="border:0px;"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="font-weight:bold;background:#80808017;">Brand Name</td>
                                                                            <td><input id="show_brand_name" style="border:0px;"></td>
                                                                            <td style="font-weight:bold;background:#80808017;">Branch Name</td>
                                                                            <td><input id="show_branch_name" style="border:0px;"></td>
                                                                        </tr>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="post" id="branch_distribution_edit_form">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <h4>Item</h4>
                                                <hr>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Asset Code:</label> <br>
                                                    <select name="item_id" class="form-control asset_code required" id="item_id" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                        @foreach($asset_code as $row)
                                                            <option value="{{$row->id}}">{{$row->asset_code}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" id="edit_distibution_id" name="id">
                                                </div>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Item Name:</label> <br>
                                                    <select id="item_name" class="form-control item_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Brand Name:</label> <br>
                                                    <select id="brand_name" class="form-control brand_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Distribution For</h4>
                                                <hr>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Region Name:</label> <br>
                                                    <select name="region_id" class="form-control region_name required" id="region_name" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                        @foreach($region as $row)
                                                            <option value="{{$row->id}}">{{$row->region_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Zone Name:</label> <br>
                                                    <select name="zone_id" id="zone_id" class="form-control zone_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Branch Name:</label> <br>
                                                    <select name="branch_id" id="branch_id" class="form-control branch_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Distribution Details</h4>
                                                <hr>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Distribution Date:</label> <br>
                                                    <input type="date" name="distribution_date" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                </div>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Item Type:</label> <br>
                                                    <select name="item_type" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                        <option disabled selected>-Select-</option>
                                                        <option value="New">New</option>
                                                        <option value="Old">Old</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <button type="submit" id="update" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="modal_head_distribution_edit" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-indigo text-white">
                            <h6 class="modal-title"><i class="fa fa-cart-plus"></i> Head office Item Distribution Edit</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="card-group-control card-group-control-right">
                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <h6 class="card-title">
                                                            <a class="text-body collapsed" data-toggle="collapse" href="#head_edit">
                                                                <i class="icon-help mr-2 text-secondary"></i> Distribution Item Details
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="head_edit" class="collapse">
                                                        <div class="card-body">
                                                            <div class="row" style="margin-bottom:10px;">
                                                                <div class="col-md-12">
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <td style="font-weight:bold;background:#80808017;">Item Asset Code</td>
                                                                            <td><input id="show_asset_code" style="border:0px;"></td>
                                                                            <td style="font-weight:bold;background:#80808017;">Employee Name</td>
                                                                            <td><input id="show_region_name" style="border:0px;"></td>
                                                                            <td style="font-weight:bold;background:#80808017;">Distribution Date</td>
                                                                            <td><input id="show_distribution_date" style="border:0px;"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="font-weight:bold;background:#80808017;">Item Name</td>
                                                                            <td><input id="show_item_name" style="border:0px;"></td>
                                                                            <td style="font-weight:bold;background:#80808017;">Employee ID</td>
                                                                            <td><input id="show_zone_name" style="border:0px;"></td>
                                                                            <td style="font-weight:bold;background:#80808017;">Item Type</td>
                                                                            <td><input id="show_item_type" style="border:0px;"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="font-weight:bold;background:#80808017;">Brand Name</td>
                                                                            <td><input id="show_brand_name" style="border:0px;"></td>
                                                                            <td style="font-weight:bold;background:#80808017;">Department</td>
                                                                            <td><input id="show_branch_name" style="border:0px;"></td>
                                                                            <td style="font-weight:bold;background:#80808017;">Branch Name</td>
                                                                            <td><input id="show_branch_name" style="border:0px;"></td>
                                                                        </tr>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="post" id="distribution_edit_form">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <h4>Item</h4>
                                                <hr>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Asset Code:</label> <br>
                                                    <select name="item_id" class="form-control asset_code required" id="item_id" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                        @foreach($asset_code as $row)
                                                            <option value="{{$row->id}}">{{$row->asset_code}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" id="edit_distibution_id" name="id">
                                                </div>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Item Name:</label> <br>
                                                    <select id="item_name" class="form-control item_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Brand Name:</label> <br>
                                                    <select id="brand_name" class="form-control brand_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Distribution For</h4>
                                                <hr>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Region Name:</label> <br>
                                                    <select name="region_id" class="form-control region_name required" id="region_name" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                        @foreach($region as $row)
                                                            <option value="{{$row->id}}">{{$row->region_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Zone Name:</label> <br>
                                                    <select name="zone_id" id="zone_id" class="form-control zone_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Branch Name:</label> <br>
                                                    <select name="branch_id" id="branch_id" class="form-control branch_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Distribution Details</h4>
                                                <hr>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Distribution Date:</label> <br>
                                                    <input type="date" name="distribution_date" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                </div>
                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                    <label style="font-weight:bold;">Item Type:</label> <br>
                                                    <select name="item_type" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                        <option disabled selected>-Select-</option>
                                                        <option value="New">New</option>
                                                        <option value="Old">Old</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <button type="submit" id="update" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                                            </div>
                                        </div>
                                    </form>
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

<script>
    $(document).ready(function () {
        $('.asset_code').on('change', function () {
            var asset_code = this.value;
            $(".item_name").html('');
            $.ajax({
                url: "{{url('fetch_item_name')}}",
                type: "GET",
                data: {
                    asset_code: asset_code,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('.item_name').html();
                    $.each(result.item_name, function (key, value) {
                        $(".item_name").append('<option value="' + value
                            .id + '">' + value.item_name + '</option>');
                    });
                }
            });
        });
        $('.asset_code').on('change', function () {
            var asset_code = this.value;
            $(".brand_name").html('');
            $.ajax({
                url: "{{url('fetch_brand_name')}}",
                type: "GET",
                data: {
                    asset_code: asset_code,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('.brand_name').html();
                    $.each(result.brand_name, function (key, value) {
                        $(".brand_name").append('<option value="' + value
                            .id + '">' + value.brand_name + '</option>');
                    });
                }
            });
        });

        $('.region_name').on('change', function () {
            var id = this.value;
            $(".zone_name").html('');
            $.ajax({
                url: "{{url('fetch_zone_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('.zone_name').html('<option value="">-- Select State --</option>');
                    $.each(result.zone_name, function (key, value) {
                        $(".zone_name").append('<option value="' + value
                            .id + '">' + value.zone_name + '</option>');
                    });
                    $('.branch_name').html('<option value="">-- Select Branch --</option>');
                }
            });
        });
        $('.zone_name').on('change', function () {
            var id = this.value;
            console.log(id);
            $(".branch_name").html('');
            $.ajax({
                url: "{{url('fetch_branch_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('.branch_name').html('<option value="">-- Select State --</option>');
                    $.each(res.branch_name, function (key, value) {
                        $(".branch_name").append('<option value="' + value
                            .id + '">' + value.branch_name + '</option>');
                    });
                }
            });
        });

        $('#emp_id').on('change', function () {
            var id = this.value;
            $("#employee_name").html('');
            $.ajax({
                url: "{{url('fetch_emp_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#employee_name').html();
                    $.each(result.employee_name, function (key, value) {
                        $("#employee_name").append('<option value="' + value
                            .id + '">' + value.employee_name + '</option>');
                    });
                }
            });
        });
        $('#emp_id').on('change', function () {
            var id = this.value;
            $("#emp_dept").html('');
            $.ajax({
                url: "{{url('fetch_dept_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#emp_dept').html();
                    $.each(result.department_name, function (key, value) {
                        $("#emp_dept").append('<option value="' + value
                            .id + '">' + value.department_name + '</option>');
                    });
                }
            });
        });
    });
</script>
<script>
    var SITEURL = '{{URL::to('')}}';
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var branch_table = $('#branch_distribution_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('branch_distribution_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'asset_code', name: 'asset_code'},
                {data: 'region_name', name: 'region_name'},
                {data: 'zone_name', name: 'zone_name'},
                {data: 'branch_name', name: 'branch_name'},
                {data: 'item_name', name: 'item_name'},
                {data: 'brand_name', name: 'brand_name'},
                {data: 'distribution_date', name: 'distribution_date'},
            ]
        });
        var head_table   = $('#head_office_distribution_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('head_office_distribution_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'asset_code', name: 'asset_code'},
                {data: 'employee_id', name: 'employee_id'},
                {data: 'employee_name', name: 'employee_name'},
                {data: 'department_name', name: 'department_name'},
                {data: 'item_name', name: 'item_name'},
                {data: 'brand_name', name: 'brand_name'},
                {data: 'distribution_date', name: 'distribution_date'},
            ]
        });
    });
    //(************* Brand (Add/Edit/Delete) Section ***************)
    if ($("#distribution_branch_add_form").length > 0) {
        $("#distribution_branch_add_form").validate({
            rules: {
                distribution_date: {
                    required: true,
                },
                item_type: {
                    required: true,
                },
            },
            messages: {
                distribution_date: {
                    required: "*** Distribution date is required ***"
                },
                item_type: {
                    required: "*** Item type is required ***"
                },
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#store').html('Sending..');
                $.ajax({
                    url: 'branch_distribution_store',
                    type: "POST",
                    data: $('#distribution_branch_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#distribution_branch_add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Item Distribution Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#branch_distribution_table').DataTable().ajax.reload();
                        } else {
                            printErrorMsg(data.error);
                        }
                    },
                });

                function printErrorMsg(msg) {
                    $(".print-error-msg").find("ul").html('');
                    $(".print-error-msg").css('display', 'block');
                    $.each(msg, function (key, value) {
                        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                    });
                }
            }
        })
    }
    if ($("#distribution_head_office_add_form").length > 0) {
        $("#distribution_head_office_add_form").validate({
            rules: {
                distribution_date: {
                    required: true,
                },
                item_type: {
                    required: true,
                },
            },
            messages: {
                distribution_date: {
                    required: "*** Distribution date is required ***"
                },
                item_type: {
                    required: "*** Item type is required ***"
                },
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#store').html('Sending..');
                $.ajax({
                    url: 'head_office_distribution_store',
                    type: "POST",
                    data: $('#distribution_head_office_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#distribution_head_office_add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Item Distribution Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#head_office_distribution_table').DataTable().ajax.reload();
                        } else {
                            printErrorMsg(data.error);
                        }
                    },
                });

                function printErrorMsg(msg) {
                    $(".print-error-msg").find("ul").html('');
                    $(".print-error-msg").css('display', 'block');
                    $.each(msg, function (key, value) {
                        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                    });
                }
            }
        })
    }

    if ($("#branch_distribution_edit_form").length > 0) {
        $("#branch_distribution_edit_form").validate({
            rules: {
                distribution_date: {
                    required: true,
                },
                item_type: {
                    required: true,
                },
            },
            messages: {
                distribution_date: {
                    required: "*** Distribution date is required ***"
                },
                item_type: {
                    required: "*** Item type is required ***"
                },
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#update').html('Updating..');
                $.ajax({
                    url: 'distribution_update',
                    type: "POST",
                    data: $('#branch_distribution_edit_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#branch_distribution_edit_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Distribution update successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#branch_distribution_table').DataTable().ajax.reload();
                        $('#modal_branch_distribution_edit').modal('hide');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    }
    if ($("#head_distribution_edit_form").length > 0) {
        $("#head_distribution_edit_form").validate({
            rules: {
                distribution_date: {
                    required: true,
                },
                item_type: {
                    required: true,
                },
            },
            messages: {
                distribution_date: {
                    required: "*** Distribution date is required ***"
                },
                item_type: {
                    required: "*** Item type is required ***"
                },
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#update').html('Updating..');
                $.ajax({
                    url: 'distribution_update',
                    type: "POST",
                    data: $('#branch_distribution_edit_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#head_distribution_edit_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Distribution update successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#head_office_distribution_table').DataTable().ajax.reload();
                        $('#modal_head_distribution_edit').modal('hide');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    }

    $('body').on('click', '#edit_distribution', function () {
        var id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "distribution_edit/" + id,
            success: function (data) {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#modal_distribution_edit').modal('show');
                $('#show_asset_code').val(data.asset_code);
                $('#edit_distibution_id').val(data.id);
                $('#show_item_name').val(data.item_name);
                $('#show_brand_name').val(data.brand_name);
                $('#show_zone_name').val(data.zone_name);
                $('#show_region_name').val(data.region_name);
                $('#show_branch_name').val(data.branch_name);
                $('#show_distribution_date').val(data.distribution_date);
                $('#show_item_type').val(data.item_type);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '#delete_distribution', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete distribution?")) {
            $.ajax({
                type: "get",
                url: "distribution_delete/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Distibution delete successfully !!!',
                        showConfirmButton: true,
                        timer: 2500
                    });
                    $('#distribution_table').DataTable().ajax.reload();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
</script>
</body>
</html>







