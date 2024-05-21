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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Branch Transfer Form</h4>
                    </div>
                    <div class="navbar-right">
                        <button onClick="history.go(0);" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-refresh"></i> Page Refresh</button>
                        <a href="{{url('/branch')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Branch Transfer</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post" id="branch_transfer_form">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger print-error-msg" style="display:none">
                                                <ul></ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label style="font-weight:bold;">Region Name:</label> <br>
                                            <input type="text" value="{{$region_name->region_name}}" readonly class="form-control">
                                            <input type="hidden" class="form-control h-auto" name="id" value="{{$data->id}}" id="transfer_branch_id">
                                            <input type="hidden" class="form-control h-auto" name="region_id" value="{{$data->region_id}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-weight:bold;">Edit Zone Name:</label> <br>
                                            <select name="zone_id" id="transfer_zone_name" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                <option disabled selected>-Select-</option>
                                                @foreach($zone_list as $row)
                                                    <option value="{{$row->id}}">{{$row->zone_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label style="font-weight:bold;">Present Branch Name:</label> <br>
                                            <input type="text" value="{{$data->branch_name}}" name="previous_branch_name" class="form-control" readonly autocomplete="off">
                                        </div>
                                        <div class="col-md-6">
                                            <label style="font-weight:bold;">Transferring Branch Name:</label> <br>
                                            <input type="text" name="branch_name" class="form-control required" required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label style="font-weight:bold;">Note:</label> <br>
                                            <textarea name="note" class="form-control"></textarea>
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
            @include('admin.include.footer')
        </div>
    </div>
</div>
<script>
    var SITEURL = '{{URL::to('')}}';
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    if ($("#branch_transfer_form").length > 0) {
        $("#branch_transfer_form").validate({
            rules: {
                branch_name: {
                    required: true,
                },
            },
            messages: {
                branch_name: {
                    required: "*** Branch Name Is Required ***"
                },
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // $('#update').html('Updating..');
                $.ajax({
                    url: 'branch_transfer',
                    type: "POST",
                    data: $('#branch_transfer_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#branch_transfer_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Branch Transfer Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#branch_table').DataTable().ajax.reload();
                        $('#modal_branch_transfer').modal('hide');
                        setInterval('location.reload()', 1000);
                        // setInterval('location.reload()', 2000);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    }
</script>
</body>
</html>








