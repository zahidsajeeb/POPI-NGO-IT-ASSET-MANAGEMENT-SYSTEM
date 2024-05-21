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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> -  Password Change</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Password Change Form</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" id="password_form">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger print-error-msg" style="display:none">
                                                <ul></ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                <label style="font-weight:bold;">Old Password:</label> <br>
                                                <input type="text" value="{{$data->confirm_password}}" class="form-control" readonly style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                <input type="hidden" name="id" value="{{$data->id}}" class="form-control" readonly style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            </div>
                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                <label style="font-weight:bold;">New Password:</label> <br>
                                                <input type="text" name="password" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" id="update" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Password Update</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                                        </div>
                                    </div>
                                </form>
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
    $(".select2").select2({
        placeholder: "Select",
        allowClear: true
    });
    var SITEURL = '{{URL::to('')}}';
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    if ($("#password_form").length > 0) {
        $("#password_form").validate({
            rules: {
                password: {required: true,},
            },
            messages: {
                password: {required: "*** Password is Required ***"},
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#store').html('Sending..');
                $.ajax({
                    url: 'password_update',
                    type: "POST",
                    data: $('#password_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#password_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Password Update Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            // $('#table').DataTable().ajax.reload();
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
    $('body').on('click', '#delete_gatepass', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this Branch?")) {
            $.ajax({
                type: "get",
                url: "asset_received_delete/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Gatepass Delete Successfully !!!',
                        showConfirmButton: true,
                        timer: 2500
                    });
                    // $('#item_table').DataTable().ajax.reload();
                    setInterval('location.reload()', 1000);
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
