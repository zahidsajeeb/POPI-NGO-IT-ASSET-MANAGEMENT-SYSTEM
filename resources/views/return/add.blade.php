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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Item Return</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card-group-control card-group-control-right">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h4 class="card-title">Item Return</h4>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <form action="" method="post" id="return_add_form">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                                        <ul></ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-bordered" style="margin-bottom:15px !important;">
                                                <thead style="background:gray; color:white;">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Information</th>
                                                    <th>Value</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><b>Asset Code</b></td>
                                                    <td>
                                                        {{$data->asset_code}}
                                                        <input type="hidden" class="form-control" value="{{$data->id}}" name="id" readonly>
                                                        <input type="hidden" class="form-control" value="{{$data->item_id}}" name="item_id" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td><b>Employee Name</b></td>
                                                    <td>
                                                        @if($employee_info == null)
                                                            -
                                                        @else
                                                            {{$employee_info->employee_name}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td><b>Employee ID</b></td>
                                                    <td>
                                                        @if($employee_info == null)
                                                            -
                                                        @else
                                                            {{$employee_info->employee_id}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td><b>Employee Department</b></td>
                                                    <td>
                                                        @if($employee_info == null)
                                                            -
                                                        @else
                                                            {{$employee_info->department_name}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td><b>Branch</b></td>
                                                    <td>
                                                        @if($branch_info == null)
                                                            -
                                                        @else
                                                            {{$branch_info->branch_name}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td><b>Zone</b></td>
                                                    <td>
                                                        @if($branch_info == null)
                                                            -
                                                        @else
                                                            {{$branch_info->zone_name}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td><b>Region</b></td>
                                                    <td>
                                                        @if($branch_info == null)
                                                            -
                                                        @else
                                                            {{$branch_info->region_name}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td><b>Project</b></td>
                                                    <td>
                                                        @if($project_info == null)
                                                            -
                                                        @else
                                                            {{$project_info->project_name}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td><b>Project Branch Name</b></td>
                                                    <td>
                                                        @if($project_info == null)
                                                            -
                                                        @else
                                                            {{$project_info->branch_name}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td><b>Distribution Date</b></td>
                                                    <td>
                                                        {{$data->distribution_date}}
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <label style="font-weight:bold;">Distribution Qty:</label> <br>
                                            <input type="text" name="distribution_qty" value="{{$diff}}" class="form-control" readonly><br>

                                            <label style="font-weight:bold;">Recycle Qty:</label> <br>
                                            <input type="text" name="distribution_recycle_qty" value="{{$data->distribution_recycle_qty}}" class="form-control" readonly><br>

                                            <label style="font-weight:bold;">Return Qty:</label> <br>
                                            <input type="text" name="return_qty" class="form-control" required><br>

                                            <label style="font-weight:bold;">Return Date:</label> <br>
                                            <input type="date" name="return_date" class="form-control" required><br>

                                            <label style="font-weight:bold;">Return Purpose:</label> <br>
                                            <select class="form-control" name="return_type" required>
                                                <option value="">-Select-</option>
                                                <option value="Redistribution">Redistribution</option>
                                                <option value="Servicing">Servicing</option>
                                            </select>

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
                    <div class="col-md-3"></div>
                </div>
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>

<script>
    var SITEURL = '{{URL::to('')}}';
    //(************* Brand (Add/Edit/Delete) Section ***************)
    if ($("#return_add_form").length > 0) {
        $("#return_add_form").validate({
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
                    data: $('#return_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if (data['status']=='success'){
                            swal({
                                icon: 'success',
                                title: 'Item Return Successfully Done !!!',
                                showConfirmButton: true,
                                timer: 2500
                            })
                                .then(() => {
                                    window.location.href = "/return/index";
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
                    // success: function (data) {
                    //     if ($.isEmptyObject(data.error)) {
                    //         $('#return_add_form').trigger("reset");
                    //         swal({
                    //             icon: 'success',
                    //             title: 'Item Returned Stored Successfully !!!',
                    //             showConfirmButton: true,
                    //             timer: 1000,
                    //         })
                    //             .then(() => {
                    //
                    //                 window.location.href = "/return/index";
                    //             })
                    //     } else {
                    //         printErrorMsg(data.error);
                    //     }
                    // },
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









