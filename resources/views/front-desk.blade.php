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
    </style>
</head>

<body>
<!-- Main navbar -->
@include('admin.include.navbar')
<!-- /main navbar -->

<!-- Page content -->
<div class="page-content">
    <!-- Main sidebar -->
@include('admin.include.sidebar')
<!-- /main sidebar -->

    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Inner content -->
        <div class="content-inner">

            <!-- Page header -->
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Front Desk</h4>
                        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                    </div>

{{--                    <div class="header-elements d-none">--}}
{{--                        <div class="d-flex justify-content-center">--}}
{{--                            <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>--}}
{{--                            <a href="#" class="btn btn-link btn-float text-body"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>--}}
{{--                            <a href="#" class="btn btn-link btn-float text-body"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Front Desk Input</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('frontdesk_store') }}" method="POST" id="form">
                                    @csrf
                                    <div class="form-group">
                                        <label style="font-weight:bold;">System Generated Token: <b style="color:red;">(***Please click here Token is available or not***)</b></label>
{{--                                        <input type="text" class="form-control required" id="token" name="token" value="<?php echo bin2hex(random_bytes(16));?>" readonly>--}}
                                        <input type="text" class="form-control required" id="token" name="token" value="STU-<?php echo bin2hex(random_bytes(4));?>" readonly>
                                        <span id="error_email"></span>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight:bold;">Student Name:</label>
                                        <input type="text" class="form-control required" name="student_name" placeholder="Please Enter Student Name . . .">
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight:bold;">Student Email:</label>
                                        <input type="text" class="form-control required" name="student_email" placeholder="Please Enter Student Email . . .">
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight:bold;">Counselor Choose :</label>
                                        <select class="custom-select required" name="counselor_name">
                                            <option disabled selected value="">---Select Counselor---</option>
                                            @foreach($counselor as $row):
                                                 <option value="{{$row->counter_no}}">Counter-{{$row->counter_no.'('.$row->counselor_name.')'}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
            <!-- Footer -->
        @include('admin.include.footer')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
            <script>
                // Token ID validation section
                $(document).ready(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#token').click(function () {
                        var APP_URL = $('meta[name="_base_url"]').attr('content');
                        var error_email = '';
                        var token = $('#token').val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ url('token_available') }}",
                            method: "POST",
                            data: {token: token, _token: _token},
                            success: function (result) {
                                if (result != 'not_unique') {
                                    $('#error_email').html('<label class="text-success font-bold">(***Token is available***)</label>');
                                    $('#token').removeClass('has-error');
                                    $('#register').attr('disabled', false);
                                }
                                if (result == 'not_unique') {
                                    $('#error_email').html('<label class="text-danger font-bold">(***This token Already in Database***)</label>');
                                    $('#token').addClass('has-error');
                                    $('#error_email').removeClass('has-error');
                                    $('#register').attr('disabled', 'disabled');
                                }

                            }
                        })
                    });

                });
                //************ Form Validation ************
                $(document).ready(function () {
                    $('#form').validate({
                        rules: {
                            student_name: {
                                required: true,
                            },
                            student_email: {
                                required: true,
                            },
                            counselor_name: {
                                required: true,
                            },
                        },
                        messages: {
                            student_name: {
                                required: "(***Student Name is required***)"
                            },
                            student_email: {
                                required: "(***Student Email is required***)"
                            },
                            counselor_name: {
                                required: "(***Counselor Name is required***)"
                            },
                        },
                        highlight: function(element, errorClass) {
                            $(element).closest(".form-group").addClass("has-error");
                        },
                        unhighlight: function(element, errorClass) {
                            $(element).closest(".form-group").removeClass("has-error");
                        },
                        errorPlacement: function (error, element) {
                            error.appendTo(element.parent().next());
                        },
                        errorPlacement: function (error, element) {
                            if(element.attr("type") == "checkbox") {
                                element.closest(".form-group").children(0).prepend(error);
                            }
                            else
                                error.insertAfter(element);
                        }
                    });
                });
                //(+++++++++ Toaster Message ++++++++++++++)
                @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch (type) {
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
                @endif
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

