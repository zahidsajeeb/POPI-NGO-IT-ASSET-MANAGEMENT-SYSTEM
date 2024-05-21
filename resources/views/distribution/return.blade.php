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
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <h4>Item</h4>
                                                    <hr>
                                                    <div class="col-md-12" style="margin-bottom:10px;">
                                                        <label style="font-weight:bold;">Asset Code:</label> <br>
                                                        <select name="item_id" class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                            @foreach($asset_code as $row)
                                                            <option value="{{$row->id}}">{{$row->asset_code}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12" style="margin-bottom:10px;">
                                                        <label style="font-weight:bold;">Return Date:</label> <br>
                                                        <input type="date" class="form-control">
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
                    <div class="col-md-3"></div>
                </div>
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
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
                        if ($.isEmptyObject(data.error)) {
                            $('#distribution_branch_add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Item Distribution Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 1000,
                            })
                                .then(() => {

                                    window.location.href = "/branch_distribution";
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








