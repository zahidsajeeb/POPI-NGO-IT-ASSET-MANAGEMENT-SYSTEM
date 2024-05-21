<div id="modal_vendor_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-list"></i> Vendor List</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" id="vendor_add_form">
                            <div class="form-group row">
                                <div class="col-md-12" style="border:1px solid #80808040; padding:15px;">
                                    <h4 style="font-weight:bold;">Vendor Add:</h4>
                                    <hr>
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                    <label style="font-weight:bold;">Vendor Name:</label> <br>
                                    <input type="text" name="vendor_name" class="form-control required" required autocomplete="off"> <br>
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
                            <table class="table table-bordered" id="vendor_table" style="border:1px solid; width:100%; text-align:center;">
                                <thead style="background:#194d83;color:white;">
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                    <th class="text-center">Vendor Name</th>
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
<div id="modal_vendor_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="post" id="vendor_edit_form">
                <div class="modal-header bg-indigo text-white">
                    <h6 class="modal-title"><i class="fa fa-cart-plus"></i> Vendor Edit</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="collapse show" id="demo1">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" style="font-weight:bold;">Vendor Name Edit:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control h-auto" id="vendor_name" name="vendor_name">
                                    <input type="hidden" class="form-control h-auto" name="id" id="vendor_id">
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
        var table = $('#vendor_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('vendor_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'edit', name: 'action', orderable: false, searchable: true},
                {data: 'delete', name: 'action', orderable: false, searchable: true},
                {data: 'vendor_name', name: 'vendor_name'},
                {data: 'created_at', name: 'created_at'},
            ]
        });
    });
    //(************* Item (Add/Edit/Delete) Section ***************)
    if ($("#vendor_add_form").length > 0) {
        $("#vendor_add_form").validate({
            rules: {
                vendor_name: {
                    required: true,
                },
            },
            messages: {
                vendor_name: {
                    required: "*** Vendor Name is Required ***"
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
                    url: 'vendor_store',
                    type: "POST",
                    data: $('#vendor_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if($.isEmptyObject(data.error)){
                            $('#vendor_add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Vendor Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#vendor_table').DataTable().ajax.reload();
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
    if ($("#vendor_edit_form").length > 0) {
        $("#vendor_edit_form").validate({
            rules: {
                vendor_name: {
                    required: true,
                },
            },
            messages: {
                vendor_name: {
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
                    url: 'vendor_update',
                    type: "POST",
                    data: $('#vendor_edit_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#vendor_edit_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Vendor Update Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#vendor_table').DataTable().ajax.reload();
                        $('#modal_vendor_edit').modal('hide');
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
    $('body').on('click', '#edit_vendor', function () {
        var emp_id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "vendor_edit/" + emp_id,
            success: function (data) {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#modal_vendor_edit').modal('show');
                $('#vendor_id').val(data.id);
                $('#vendor_name').val(data.vendor_name);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '#delete_vendor', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete vendor name?")) {
            $.ajax({
                type: "get",
                url: "vendor_delete/" + id,
                success: function (data) {
                    if (data['status']=='success'){
                        swal({
                            icon: 'success',
                            title: 'Item Delete Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#vendor_table').DataTable().ajax.reload();
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
