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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Item Servicing Information</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('servicing/index')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-group-control card-group-control-right">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h4 class="card-title"><b>Item Servicing Form</b></h4>
                                    @if($check_service)
                                        <span style="color:red;"><b>(* This Item is in Servicing Center *)</b></span>
                                    @endif
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <form action="" method="post" id="servicing_add_form">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                                        <ul></ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-bordered" style="margin-bottom:15px !important;">
                                                <tr>
                                                    <td style="background:#ededed;"><b>Asset Code</b></td>
                                                    <td>{{$data->asset_code}}</td>
                                                    <td style="background:#ededed;"><b>Item Name</b></td>
                                                    <td>{{$item_name->item_name}}</td>
                                                    <td style="background:#ededed;"><b>Brand Name</b></td>
                                                    <td>{{$brand_name->brand_name}}</td>
                                                </tr>
                                                @if($emp_info==null)
                                                <tr>
                                                    <td style="background:#ededed;"><b>Branch Name:</b></td>
                                                    <td>
                                                        @if($branch_name)
                                                        {{$branch_name->branch_name}}
                                                        @endif
                                                            @if($branch_name)
                                                        <input type="hidden" class="form-control" value="{{$branch_name->id}}" name="branch_id" readonly>
                                                            @endif
                                                        <input type="hidden" class="form-control" value="{{$distribution_data->id}}" name="distribution_id" readonly>
                                                        <input type="hidden" class="form-control" value="{{$info->return_qty}}" name="return_qty" readonly>
                                                    </td>
                                                    <td style="background:#ededed;"><b>Zone Name</b></td>
                                                    <td>
                                                        @if($zone_name)
                                                        {{$zone_name->zone_name}}
                                                        @endif
                                                    </td>
                                                    <td style="background:#ededed;"><b>Region Name</b></td>
                                                    <td>
                                                        @if($region_name)
                                                        {{$region_name->region_name}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endif
                                                @if($emp_info!=null)
                                                    <tr>
                                                        <td style="background:#ededed;"><b>Employee Name:</b></td>
                                                        <td>
                                                            {{$emp_info->employee_name}}
                                                            <input type="hidden" class="form-control" value="17" name="branch_id" readonly>
                                                        </td>
                                                        <td style="background:#ededed;"><b>Employee ID</b></td>
                                                        <td>
                                                            {{$emp_info->employee_id}}
                                                        </td>
                                                        <td style="background:#ededed;"><b>Department</b></td>
                                                        <td>
                                                            {{$emp_info->department_name}}
                                                        </td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td style="background:#ededed;"><b>Vendor Name</b></td>
                                                    <td>{{$vendor_name->vendor_name}}</td>
                                                    <td style="background:#ededed;"><b>Item Description</b></td>
                                                    <td colspan="7">{{$data->item_desc}}</td>
                                                </tr>

                                            </table>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label style="font-weight:bold;">Sending Date:</label> <br>
                                                    <input type="date" class="form-control" name="sending_date" required>
                                                    <input type="hidden" class="form-control" value="{{$data->id}}" name="item_id" readonly>
                                                    <input type="hidden" class="form-control" value="{{$distribution_data->id}}" name="distribution_id" readonly>
                                                    <input type="hidden" class="form-control" value="{{$info->return_qty}}" name="return_qty" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <label style="font-weight:bold;">Vendor Name:</label> <br>
                                                    <input type="text" class="form-control" name="servicing_vendor_name" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label style="font-weight:bold;">Servicing Details:</label> <br>
                                                    <textarea class="form-control" name="details" required></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                @if($check_service)
                                                    <a href="#" class="btn btn-sm btn-danger" style=" border-radius: 0px !important;"><i class="fa fa-refresh"></i> Servicing In Process . . .</a>
                                                @else
                                                    <div class="col-md-12">
                                                        <button type="submit" id="update" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
                                                        <!--<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>-->
                                                    </div>
                                                @endif
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
    var SITEURL = '{{URL::to('')}}';
    //(************* Brand (Add/Edit/Delete) Section ***************)
    if ($("#servicing_add_form").length > 0) {
        $("#servicing_add_form").validate({
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
                    url: 'servicing_store',
                    type: "POST",
                    data: $('#servicing_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#servicing_add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Item Servicing Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 1000,
                            })
                                .then(() => {

                                    window.location.href = "/servicing/index";
                                })
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
</script>
</body>
</html>










