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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Gate Pass</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('gatepass/index')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Gatepass Edit Form</h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" id="gatepass_add_form">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger print-error-msg" style="display:none">
                                                <ul></ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <h4>Edit Receive By</h4>
                                            <hr>
                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                <label style="font-weight:bold;">Gate Pass Serial No:</label> <br>
                                                <input type="text" name="serial_no" value="{{$data->serial_no}}" class="form-control" readonly style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                <input type="hidden" name="id" value="{{$data->id}}" class="form-control" readonly style="border-radius: 0px !important; border-color: #604c4c69 !important;">

                                            </div>
                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                <label style="font-weight:bold;">Date:</label> <br>
                                                <input type="date" name="date" id="date" value="{{$data->date}}" class="form-control item_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            </div>
                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                <label style="font-weight:bold;">Supplier's/Vendor Name:</label> <br>
                                                <input type="text" name="vendor_name" value="{{$data->vendor_name}}" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            </div>




                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                <label style="font-weight:bold;">Receiver Name:</label> <br>
                                                <input type="text" name="receiver_name" id="receiver_name" value="{{$data->receiver_name}}" class="form-control zone_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            </div>
                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                <label style="font-weight:bold;">Address:</label> <br>
                                                <input type="text" name="address" id="address" value="{{$data->address}}" class="form-control branch_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            </div>
                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                <label style="font-weight:bold;">Mobile:</label> <br>
                                                <input type="text" name="mobile_no" id="mobile_no" value="{{$data->mobile_no}}" class="form-control branch_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            </div>

                                        </div>
                                        <div class="col-md-8">
                                            <h4>Edit Item Description</h4>
                                            <hr>
                                            <table class="table table-bordered" id="item_table">
                                                <tr style="background: #808080fa;color: white">
                                                    <td>Sl No</td>
                                                    <td>Item Description</td>
                                                    <td>Qty</td>
                                                    <td>Action</td>
                                                </tr>
                                                @foreach($items as $key=>$row)
                                                    <tr>
                                                            <td>1</td>
                                                            <td><textarea name="edit_addmore[{{$loop->index}}][description]" class="form-control required" style="border-radius: 0px;border-color: #80808061;">{{$row->description}}</textarea></td>
                                                            <td>
                                                                <input type="text" name="edit_addmore[{{$loop->index}}][qty]" value="{{$row->qty}}" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                                <input type="hidden" class="form-control" name="edit_addmore[{{$loop->index}}][id]" value="{{$row->id}}">
                                                            </td>
                                                            <td>
                                                                <button type="button" name="add" id="delete_item" data-id="{{$row->id}}" class="btn btn-sm btn-danger" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Delete</button>
                                                            </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                            <hr>
                                            <h4>Add Item Description</h4>
                                            <hr>
                                            <table class="table table-bordered" id="dynamic_field">
                                                <tr style="background: #808080fa;color: white">
                                                    <td>Sl No</td>
                                                    <td>Item Description</td>
                                                    <td>Qty</td>
                                                    <td>Action</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td><textarea name="addmore[0][description]" class="form-control" style="border-radius: 0px;border-color: #80808061;"></textarea></td>
                                                    <td>
                                                        <input type="text" name="addmore[0][qty]" class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                    </td>
                                                    <td>
                                                        <button type="button" name="add" id="add" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Add More</button>
                                                    </td>
                                                </tr>
                                            </table>
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
    var SITEURL = '{{URL::to('')}}';
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#gatepass_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('gatepass_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'date', name: 'date'},
                {data: 'serial_no', name: 'serial_no'},
                {data: 'vendor_name', name: 'vendor_name'},
                {data: 'receiver_name', name: 'receiver_name'},
                {data: 'mobile_no', name: 'mobile_no'},
            ]
        });
    });
    $(document).ready(function () {
        var postURL = "<?php echo url('addmore'); ?>";
        var i = 1;
        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added">' +
                '<td>' + i + '</td>' +
                '<td><textarea name="addmore[' + i + '][description]" class="form-control" style="border-radius: 0px;border-color: #80808061;"></textarea></td>' +
                '<td><input type="text" name="addmore[' + i + '][qty]" class="form-control" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>' +
                '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove" style="border-radius: 0px !important;"><i class="fa fa-close"></i> Remove</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });

    if ($("#gatepass_add_form").length > 0) {
            $("#gatepass_add_form").validate({
                rules: {
                    date: {required: true,},
                    receiver_name: {required: true,},
                    address: {required: true,},
                    mobile_no: {required: true,},
                },
                messages: {
                    date: {required: "*** Date is Required ***"},
                    receiver_name: {required: "*** Receiver Name is Required ***"},
                    address: {required: "*** Address is Required ***"},
                    mobile_no: {required: "*** Mobile No is Required ***"},
                },
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#update').html('Updating..');
                    $.ajax({
                        url: 'gatepass_update',
                        type: "POST",
                        data: $('#gatepass_add_form').serialize(),
                        type: "POST",
                        dataType: 'json',
                        success: function (data) {
                            $('#gatepass_add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Item Update Successfully !!!',
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
                url: "item_delete/" + id,
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









