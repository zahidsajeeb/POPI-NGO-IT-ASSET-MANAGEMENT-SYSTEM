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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Employee List</h4>
                    </div>
                    <div class="navbar-right">
                        <button type="button" class="btn btn-indigo" id="add_employee" style="border-radius:0px;"><i class="icon-plus2"></i> Add Employee</button>
                        <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#modal_department_add"  style="border-radius:0px;"><i class="icon-plus2"></i> Add Department</button>
                        <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#modal_designation_add" style="border-radius:0px;"><i class="icon-plus2"></i> Add Designation</button>
                        <button  onClick="history.go(0);" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-refresh"></i> Page Refresh</button>
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right"  style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Employee Lists</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="employee_table" style="border:1px solid;">
                            <thead style="background:#194d83;color:white;">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Action</th>
                                <th>Employee Name</th>
                                <th>Employee ID</th>
                                <th>Employee Department</th>
                                <th>Employee Designation</th>
                                <th>Branch</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('employee.modal.department.add')
                @include('employee.modal.designation.add')
                @include('employee.modal.information.add')
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>
</body>
</html>




