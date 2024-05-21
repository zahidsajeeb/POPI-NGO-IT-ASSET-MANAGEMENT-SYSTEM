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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Project Item Distribution</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('project_distribution')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-group-control card-group-control-right">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h4 class="card-title">Item Distribution</h4>
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
                                                        <label style="font-weight:bold;">Project  Name:</label> <br>
                                                        <select name="project_id" class="form-control project_name required" id="project_name" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                            <option value="">-Select-</option>
                                                            @foreach($project_name as $row)
                                                                <option value="{{$row->id}}">{{$row->project_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12" style="margin-bottom:10px;">
                                                        <label style="font-weight:bold;">Branch Name:</label> <br>
                                                        <select name="branch_id" id="branch_name" class="form-control branch_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                    </div>
                                                    <div class="col-md-12" style="margin-bottom:10px;">
                                                        <label style="font-weight:bold;">Serial No:</label> <br>
                                                        <input class="form-control" value="{{$data->serial_no}}" readonly style="background:#80808024;border-radius:0px !important; border-color: #604c4c69 !important;">
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
                                                            @if($item_check=='0')
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
    $('#project_name').select2({
        placeholder: "Search Project Name . .",
        width: '100%'
    });
    $('#branch_name').select2({
        placeholder: "Search Branch Name . .",
        width: '100%'
    });
    $(document).ready(function () {
        $('.project_name').on('change', function () {
            var id = this.value;
            $(".branch_name").html('');
            $.ajax({
                url: "{{url('fetch_project_branch_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('.branch_name').html('<option value="">-- Select State --</option>');
                    $.each(result.branch_name, function (key, value) {
                        $(".branch_name").append('<option value="' + value
                            .id + '">' + value.branch_name + '</option>');
                    });
                    // $('.branch_name').html('<option value="">-- Select Branch --</option>');
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
                        if (data['status']=='success'){
                            swal({
                                icon: 'success',
                                title: 'Item Distribution Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            })
                                .then(() => {

                                    window.location.href = "/project_distribution";
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
                    //         $('#distribution_branch_add_form').trigger("reset");
                    //         swal({
                    //             icon: 'success',
                    //             title: 'Item Distribution Stored Successfully !!!',
                    //             showConfirmButton: true,
                    //             timer: 1000,
                    //         })
                    //             .then(() => {
                    //
                    //                 window.location.href = "/branch_distribution";
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








