<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <style>
        .error{
            color:red;
            font-weight:bold;
        }
        input{
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }
        .card{
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home - </span>Password Change </h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Password Change Form</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" id="passwordChangeForm">
                                    <div class="form-group">
                                        <label style="font-weight:bold;">Old Password:</label>
                                        <input type="text"   class="form-control required" value="{{$data->confirm_password}}" readonly>
                                        <input type="hidden" class="form-control required" name="id" value="{{$data->id}}">
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight:bold;">New Password:</label>
                                        <input type="text" class="form-control required" name="password" placeholder="Please Enter New Password . . .">
                                    </div>
                                    <hr>
                                    <div class="text-right">
                                        <button type="submit" id="update_password" class="btn btn-lg btn-teal" style="border-radius:0px;"><i class="icon-checkbox-checked"></i> Update Password </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
            @include('admin.include.footer')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
            <script>
                var SITEURL = '{{URL::to('')}}';
                $(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                });
                //(************* Password Update Section ***************)
                if ($("#passwordChangeForm").length > 0) {
                    $("#passwordChangeForm").validate({
                        rules: {
                            password: {
                                required: true,
                            },
                        },
                        messages: {
                            password: {
                                required: "(***New Password is required***)"
                            },
                        },
                        submitHandler: function(form) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $('#update_password').html('Sending..');
                            $.ajax({
                                url: 'student_password_update' ,
                                type: "POST",
                                data: $('#passwordChangeForm').serialize(),
                                type: "POST",
                                dataType: 'json',
                                success: function (data) {
                                    $('#passwordChangeForm').trigger("reset");
                                    swal({
                                        icon: 'success',
                                        title: 'Password Update Successfully !!!',
                                        showConfirmButton: true,
                                        timer: 2500
                                    });
                                    setInterval('location.reload()', 2000);
                                },
                                error: function (data) {
                                    console.log('Error:', data);
                                }
                            });
                        }
                    })
                }
            </script>
            <!-- /footer -->
        </div>
        <!-- /inner content -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->
</body>
</html>


