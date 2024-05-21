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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Purchase Request</h4>
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
                                <h5 class="card-title"><b> Edit Purchase Request Form </b></h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" id="purchase_update_form">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger print-error-msg" style="display:none">
                                                <ul></ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Serial No:</label> <br>
                                            <input type="text" name="serial_no" value="{{$data->serial_no}}" class="form-control" readonly style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            <input type="hidden" name="id" value="{{$data->id}}" class="form-control" readonly style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Region Name:</label> <br>
                                            <select id="region_id" name="region_id" class="form-control region_name"  required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                <option value="{{$data->region_id}}">{{$data->region_id}}</option>
                                                @foreach($region_list as $row)
                                                    <option value="{{$row->id}}">{{$row->region_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Branch Name:</label> <br>
                                            <select id="branch_name" name="branch_id" class="form-control branch_name" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                <option value="{{$data->branch_id}}">{{$data->branch_id}}</option>
{{--                                                @foreach($branch_list as $row)--}}
{{--                                                    <option value="{{$row->branch_name}}">{{$row->branch_name}}</option>--}}
{{--                                                @endforeach--}}
                                            </select>
                                        </div>
                                        <div class="col-md-3" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Requester Name:</label> <br>
                                            <input type="text" name="requester_name" id="date" value="{{$data->requester_name}}" class="form-control item_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-3" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Designation:</label> <br>
                                            <input type="text" name="designation" value="{{$data->designation}}" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">

                                        </div>
                                        <div class="col-md-3" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Requested Date:</label> <br>
                                            <input type="date" name="request_date" id="min" value="{{$data->request_date}}" class="form-control zone_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-3" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Required date:</label> <br>
                                            <input type="date" name="required_date" id="max"  value="{{$data->required_date}}" class="form-control branch_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <h4><b> Edit Item Description: </b></h4>
                                            <table class="table table-bordered" id="item_table">
                                                <tr style="background: #808080fa;color: white">
                                                    <td>Particulars</td>
                                                    <td>Purpose</td>
                                                    <td>Qty</td>
                                                    <td>Approx Value</td>
                                                    <td>Action</td>
                                                </tr>
                                                @foreach($items as $key=>$row)
                                                <tr>
                                                    <td>
                                                        <textarea name="edit_addmore[{{$loop->index}}][particulars]" class="form-control" required style="border-radius: 0px;border-color: #80808061;">{{$row->particulars}}</textarea>
                                                        <input type="hidden" class="form-control" name="edit_addmore[{{$loop->index}}][id]" value="{{$row->id}}">
                                                    </td>
                                                    <td><input type="text" name="edit_addmore[{{$loop->index}}][purpose]" required class="form-control" value="{{$row->purpose}}" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>
                                                    <td><input type="text" name="edit_addmore[{{$loop->index}}][qty]" required class="form-control" value="{{$row->qty}}" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>
                                                    <td><input type="text" name="edit_addmore[{{$loop->index}}][approx_value]" required class="form-control"value="{{$row->approx_value}}" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>
                                                    <td>
                                                        <button type="button" name="add" id="delete_item" data-id="{{$row->id}}" class="btn btn-sm btn-danger" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Delete</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <h4><b> Add Item Description: </b></h4>
                                            <table class="table table-bordered" id="dynamic_field">
                                                <tr style="background: #808080fa;color: white">
                                                    <td>Sl No</td>
                                                    <td>Particulars</td>
                                                    <td>Purpose</td>
                                                    <td>Qty</td>
                                                    <td>Approx Value</td>
                                                    <td>Action</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td><textarea name="addmore[0][particulars]" class="form-control"  style="border-radius: 0px;border-color: #80808061;"></textarea></td>
                                                    <td><input type="text" name="addmore[0][purpose]"  class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>
                                                    <td><input type="text" name="addmore[0][qty]"  class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>
                                                    <td><input type="text" name="addmore[0][approx_value]"  class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>
                                                    <td>
                                                        <button type="button" name="add" id="add" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Add More</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label style="font-weight:bold;">Amount(In Word):</label> <br>
                                            <input type="text" name="value_in_word" value="{{$data->value_in_word}}"  class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" id="update" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Update</button>
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
    $('#branch_name').select2({
        placeholder: "Search Branch Name . .",
        width: '100%'
    });
    $('#region_id').select2({
        placeholder: "Search Region Name . .",
        width: '100%'
    });
    $(document).ready(function () {
        $('.region_name').on('change', function () {
            var id = this.value;
            $(".branch_name").html('');
            $.ajax({
                url: "{{url('fetch_pr_branch_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('.branch_name').html('<option value="">-- Select Branch Name --</option>');
                    $.each(result.branch_name, function (key, value) {
                        $(".branch_name").append('<option value="' + value
                            .branch_name + '">' + value.branch_name + '</option>');
                    });
                }
            });
        });
    });
    var SITEURL = '{{URL::to('')}}';
    $(document).ready(function () {
        var postURL = "<?php echo url('addmore'); ?>";
        var i = 1;
        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added">' +
                '<td>' + i + '</td>' +
                '<td><textarea name="addmore[' + i + '][particulars]" class="form-control" style="border-radius: 0px;border-color: #80808061;"></textarea></td>' +
                '<td><input type="text" name="addmore[' + i + '][purpose]" class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>' +
                '<td><input type="text" name="addmore[' + i + '][qty]" class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>' +
                '<td><input type="text" name="addmore[' + i + '][approx_value]" class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>' +
                '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove" style="border-radius: 0px !important;"><i class="fa fa-trash"></i> Remove</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });

    if ($("#purchase_update_form").length > 0) {
        $("#purchase_update_form").validate({
            rules: {
                branch_id: {required: true,},
                region_id: {required: true,},
                requester_name: {required: true,},
                designation: {required: true,},
                request_date: {required: true,},
                required_date: {required: true,},
            },
            messages: {
                branch_id: {required: "*** Required ***"},
                region_id: {required: "*** Required ***"},
                requester_name: {required: "*** Required ***"},
                designation: {required: "*** Required ***"},
                request_date: {required: "*** Required ***"},
                required_date: {required: "*** Required ***"},
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#update').html('Updating..');
                $.ajax({
                    url: 'purchase_request_update',
                    type: "POST",
                    data: $('#purchase_update_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#purchase_update_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Purchase Request Update Successfully !!!',
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
    $('body').on('click', '#delete_item', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this Branch?")) {
            $.ajax({
                type: "get",
                url: "pr_item_delete/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Item Delete Successfully !!!',
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








