<div id="modal_region_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-cart-plus"></i> Region List</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" id="region_add_form">
                            <div class="form-group row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8" style="border:1px solid #80808040; padding:15px;">
                                    <h4 style="font-weight:bold;">Region Add:</h4>
                                    <hr>
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                    <label style="font-weight:bold;">Region Name:</label> <br>
                                    <input type="text" name="region_name" class="form-control required" required autocomplete="off"> <br>
                                    <button type="submit" id="store" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="region_table" style="border:1px solid; width:100%; text-align:center;">
                                <thead style="background:#194d83;color:white;">
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                    <th class="text-center">Region Name</th>
                                    <th class="text-center">Created By</th>
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
<div id="modal_region_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="" method="post" id="region_edit_form">
                <div class="modal-header bg-indigo text-white">
                    <h6 class="modal-title"><i class="fa fa-cart-plus"></i> Region Edit</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="collapse show" id="demo1">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Region Name:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control h-auto" id="region_name" name="region_name">
                                    <input type="hidden" class="form-control h-auto" name="id" id="region_id">
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
        var table = $('#region_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('region_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'edit', name: 'action', orderable: false, searchable: true},
                {data: 'delete', name: 'action', orderable: false, searchable: true},
                {data: 'region_name', name: 'region_name'},
                {data: 'employee_name', name: 'employee_name'},
                {data: 'created_at', name: 'created_at'},
            ]
            // scrollY: '500px',
            // scrollCollapse: true,
        });
    });
    //(************* Item (Add/Edit/Delete) Section ***************)
    if ($("#region_add_form").length > 0) {
        $("#region_add_form").validate({
            rules: {
                region_name: {
                    required: true,
                },
            },
            messages: {
                region_name: {
                    required: "*** Region Name is Required ***"
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
                    url: 'region_store',
                    type: "POST",
                    data: $('#region_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if($.isEmptyObject(data.error)){
                            $('#region_add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Region Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#region_table').DataTable().ajax.reload();
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
    if ($("#region_edit_form").length > 0) {
        $("#region_edit_form").validate({
            rules: {
                region_name: {
                    required: true,
                },
            },
            messages: {
                region_name: {
                    required: "*** Region Name Is Required ***"
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
                    url: 'region_update',
                    type: "POST",
                    data: $('#region_edit_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#region_edit_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Region Update Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#region_table').DataTable().ajax.reload();
                        $('#modal_region_edit').modal('hide');
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
    $('body').on('click', '#edit_region', function () {
        var emp_id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "region_edit/" + emp_id,
            success: function (data) {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#modal_region_edit').modal('show');
                $('#region_id').val(data.id);
                $('#region_name').val(data.region_name);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '#delete_region', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "region_delete/" + id,
                success: function (data) {
                    if (data['status']=='success'){
                        swal({
                            icon: 'success',
                            title: 'Item Delete Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#region_table').DataTable().ajax.reload();
                        setInterval('location.reload()', 1000);
                    }
                    if (data['status']=='error'){
                        swal({
                            icon: 'error',
                            title: 'Sorry!!! This item already in branch section !!!',
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
