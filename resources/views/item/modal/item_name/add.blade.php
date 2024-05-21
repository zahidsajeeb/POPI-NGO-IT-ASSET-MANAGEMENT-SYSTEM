<div id="modal_item_name_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-list"></i> Item Name List</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" id="item_name_add_form">
                            <h4 style="font-weight:bold;">Item Name Add:</h4>
                            <hr>
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Item Name:</label> <br>
                                    <input type="text" name="item_name" class="form-control required" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Fixed Asset:</label> <br>
                                    <select name="fixed_asset" class="form-control" required>
                                        <option value="">-Select-</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                <button type="submit" id="store" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="item_name_table" style="border:1px solid; width:100%; text-align:center;">
                                <thead style="background:#194d83;color:white;">
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                    <th class="text-center">Item Name</th>
                                    <th class="text-center">Created at</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_item_name_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="post" id="item_name_edit_form">
                <div class="modal-header bg-indigo text-white">
                    <h6 class="modal-title"><i class="fa fa-cart-plus"></i> Item Name Edit</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="collapse show" id="demo1">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" style="font-weight:bold;">Item Name:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control h-auto" id="item_name" name="item_name">
                                    <input type="hidden" class="form-control h-auto" name="id" id="item_name_id">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" style="font-weight:bold;">Fixed Asset:</label>
                                <div class="col-lg-8">
                                    <select name="fixed_asset" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <hr>
                <div class="modal-footer">
                    <button type="submit" id="update" class="btn btn-lg btn-success" style="border-radius: 0px !important;"><i class="fa fa-check-square"></i> Update</button>
                    <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                </div>
            </form>
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
        var table = $('#item_name_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('item_name_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'edit', name: 'action', orderable: false, searchable: true},
                {data: 'delete', name: 'action', orderable: false, searchable: true},
                {data: 'item_name', name: 'item_name'},
                {data: 'created_at', name: 'created_at'},
            ]
        });
    });
    //(************* Item (Add/Edit/Delete) Section ***************)
    if ($("#item_name_add_form").length > 0) {
        $("#item_name_add_form").validate({
            rules: {
                item_name: {
                    required: true,
                },
            },
            messages: {
                item_name: {
                    required: "*** Vendor Name is Required ***"
                },
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // $('#store').html('Sending..');
                $.ajax({
                    url: 'item_name_store',
                    type: "POST",
                    data: $('#item_name_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if($.isEmptyObject(data.error)){
                            $('#item_name_add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Item Name Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#item_name_table').DataTable().ajax.reload();
                            setInterval('location.reload()', 1000);
                        }else{
                            printErrorMsg(data.error);
                        }
                    },
                });
                function printErrorMsg (msg) {
                    $(".print-error-msg").find("ul").html('');
                    $(".print-error-msg").css('display','block');
                    $.each( msg, function( key, value ) {
                        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                    });
                }
            }
        })
    }
    if ($("#item_name_edit_form").length > 0) {
        $("#item_name_edit_form").validate({
            rules: {
                item_name: {
                    required: true,
                },
            },
            messages: {
                item_name: {
                    required: "[***Vendor name is required***]"
                },
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#update').html('Updating..');
                $.ajax({
                    url: 'item_name_update',
                    type: "POST",
                    data: $('#item_name_edit_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#item_name_edit_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Item Name Update Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#item_name_table').DataTable().ajax.reload();
                        $('#modal_item_name_edit').modal('hide');
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
    $('body').on('click', '#edit_item_name', function () {
        var emp_id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "item_name_edit/" + emp_id,
            success: function (data) {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#modal_item_name_edit').modal('show');
                $('#item_name_id').val(data.id);
                $('#item_name').val(data.item_name);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '#delete_item_name', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete item name?")) {
            $.ajax({
                type: "get",
                url: "item_name_delete/" + id,
                success: function (data) {
                    if (data['status']=='success'){
                        swal({
                            icon: 'success',
                            title: 'Item Name Delete Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#item_name_table').DataTable().ajax.reload();
                        setInterval('location.reload()', 1000);
                    }
                    if (data['status']=='error'){
                        swal({
                            icon: 'error',
                            title: 'Sorry!!! This item already in distribution section !!!',
                            showConfirmButton: true,
                            timer: 4000
                        });
                    }

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
</script>

