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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Item Recycle</h4>
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
                                    <h4 class="card-title">Item Recycle Form</h4>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <form action="" method="post" id="recycle_add_form">
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
                                                        <input type="hidden"  class="form-control" value="{{$data->id}}" name="id" readonly>
                                                        <input type="hidden" class="form-control" value="{{$info->id}}" name="distribution_id" readonly>
                                                        {{--<input type="hidden" class="form-control" value="{{$data->item_id}}" name="item_id" readonly>--}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td><b>Item Name</b></td>
                                                    <td>
                                                        {{$data->item_name}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td><b>Brand Name</b></td>
                                                    <td>
                                                        {{$data->brand_name}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td><b>Vendor Name</b></td>
                                                    <td>
                                                        {{$data->vendor_name}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td><b>Item Entry Date</b></td>
                                                    <td>
                                                        {{$data->purchase_date}}
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <label style="font-weight:bold;">Distribution Qty:</label> <br>
                                            {{--                                            <input type="number" name="total_distribution_qty" value="{{$total_distribution->distribution_qty}}" class="form-control" readonly><br>--}}
                                            {{--                                            <input type="number" name="total_store_qty" value="{{$total_store->qty}}" class="form-control" readonly><br>--}}
                                            <input type="number" name="total_store_qty" value="{{$total_distribution->distribution_qty}}" class="form-control" readonly><br>

                                            @if($total_return!=null)
                                                <label style="font-weight:bold;">Return Qty:</label> <br>
                                                <input type="number" name="total_return_qty" value="{{$total_return->return_qty}}" class="form-control" readonly><br>

                                                <label style="font-weight:bold;">Available Qty For Recycle:</label> <br>
                                                <input type="number" name="total_recycle_qty" value="{{($total_distribution->distribution_qty)-($total_recycle->recycle_qty)-($total_return->return_qty)}}" class="form-control" readonly><br>
                                                <input type="hidden" name="item_recycle_qty" value="{{($data->recycle_qty)}}" class="form-control" readonly>
                                                <input type="hidden" name="previous_recycle_qty" value="{{($total_recycle->recycle_qty)}}" class="form-control" readonly>
                                                <input type="hidden" name="item_id" value="{{($data->id)}}" class="form-control" readonly>
                                                <input type="hidden" name="total_qty" value="{{($data->qty)}}" class="form-control" readonly>
                                            @endif

                                            @if($total_return==null)
                                                <label style="font-weight:bold;">Available Qty For Recycle:</label> <br>
                                                <input type="number" name="total_recycle_qty" value="{{($total_distribution->distribution_qty)-($total_recycle->recycle_qty)}}" class="form-control" readonly><br>
                                                <input type="hidden" name="item_recycle_qty" value="{{($data->recycle_qty)}}" class="form-control" readonly>
                                                <input type="hidden" name="previous_recycle_qty" value="{{($total_recycle->recycle_qty)}}" class="form-control" readonly>
                                                <input type="hidden" name="item_id" value="{{($data->id)}}" class="form-control" readonly>
                                                <input type="hidden" name="total_qty" value="{{($data->qty)}}" class="form-control" readonly>
                                            @endif

                                            <label style="font-weight:bold;">Recycle Qty:</label> <br>
                                            <input type="number" name="recycle_qty" required class="form-control"><br>

                                            <label style="font-weight:bold;">Location:</label> <br>
                                            <select class="form-control" name="recycle_location" required>
                                                <option value="">-Select-</option>
                                                <option value="Head office">Head office</option>
                                                <option value="Branch">Branch</option>
                                                <option value="Project">Project</option>
                                            </select>
                                            <br>
                                            <label style="font-weight:bold;">Remarks:</label> <br>
                                            <textarea name="recycle_remarks" required class="form-control"></textarea><br>

                                            <label style="font-weight:bold;">Recycle Date:</label> <br>
                                            <input type="date" name="recycle_date" required class="form-control">
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
    if ($("#recycle_add_form").length > 0) {
        $("#recycle_add_form").validate({
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
                if (confirm("Do you really want to delete this Branch?")) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#store').html('Sending..');
                    $.ajax({
                        url: 'store',
                        type: "POST",
                        data: $('#recycle_add_form').serialize(),
                        type: "POST",
                        dataType: 'json',
                        success: function (data) {
                            if (data['status'] == 'success') {
                                swal({
                                    icon: 'success',
                                    title: 'Item Recycle Successfully !!!',
                                    showConfirmButton: true,
                                    timer: 2500
                                })
                                    .then(() => {
                                        window.location.href = "/recycle/index";
                                        setInterval('location.reload()', 2000)
                                    })
                            }
                            if (data['status'] == 'error') {
                                swal({
                                    icon: 'error',
                                    title: 'Sorry!!! Recycle item is Greater then store item !!!',
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


            }
        })
    }
</script>
</body>
</html>










