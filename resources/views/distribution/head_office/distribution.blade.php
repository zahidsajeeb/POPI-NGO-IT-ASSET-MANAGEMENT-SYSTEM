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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Head office Item Distribution</h4>
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
                                    <h4 class="card-title">Head office Item Distribution</h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <form action="" method="post" id="distribution_add_form">
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
                                                        <input type="text" name="asset_code" class="form-control" value="{{$data->asset_code}}" readonly style="background:#80808024;">
                                                        <input type="hidden" name="item_id" class="form-control" value="{{$data->id}}" readonly style="background:#80808024;">
                                                        <input type="hidden" name="fixed_asset" class="form-control" value="{{$item_name->fixed_asset}}" readonly style="background:#80808024;">
                                                    </div>
                                                    <div class="col-md-12" style="margin-bottom:10px;">
                                                        <label style="font-weight:bold;">Item Name:</label> <br>
                                                        <select name="item_name_id" class="form-control" readonly style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                            <option value="{{$item_name->id}}">{{$item_name->item_name}}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12" style="margin-bottom:10px;">
                                                        <label style="font-weight:bold;">Brand Name:</label> <br>
                                                        <select name="brand_id" class="form-control" readonly style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                            <option value="{{$brand_name->id}}">{{$brand_name->brand_name}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Distribution For</h4>
                                                    <hr>
                                                    <div class="col-md-12" style="margin-bottom:10px;">
                                                        <label style="font-weight:bold;">Employee ID:</label> <br>
                                                        <select name="emp_id" class="form-control required" id="emp_id" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                            <option value="">-Select-</option>
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
                                                        <label style="font-weight:bold;">Department Name:</label> <br>
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
                                                            @if($item_check =='0')
                                                                <option value="New">New</option>
                                                            @endif
                                                            @if($item_check !='0')
                                                                <option value="Old">Old</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12" style="margin-bottom:10px;">
                                                        <label style="font-weight:bold;">Distribution Qty:</label> <br>
                                                        <input type="text" name="distribution_qty" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
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
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>

<script>
    $('#emp_id').select2({
        placeholder: "Search ID . .",
        width: '100%'
    });
    $('#emp_dept').select2({
        placeholder: "Search Department . .",
        width: '100%'
    });
    $('#employee_name').select2({
        placeholder: "Search Employee Name . .",
        width: '100%'
    });
    $(document).ready(function () {
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
    //(************* Brand (Add/Edit/Delete) Section ***************)
    if ($("#distribution_add_form").length > 0) {
        $("#distribution_add_form").validate({
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
                    url: 'store',
                    type: "POST",
                    data: $('#distribution_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if (data['status']=='success'){
                            swal({
                                icon: 'success',
                                title: 'Item Distribution Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            })
                                .then(() => {

                                    window.location.href = "/head_office_distribution";
                                    setInterval('location.reload()', 2000)
                                })
                        }
                        if (data['status']=='error'){
                            swal({
                                icon: 'error',
                                title: 'Sorry!!! Distribution item is Greater then store item !!!',
                                showConfirmButton: true,
                                timer: 4000
                            });
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
</script>
</body>
</html>








