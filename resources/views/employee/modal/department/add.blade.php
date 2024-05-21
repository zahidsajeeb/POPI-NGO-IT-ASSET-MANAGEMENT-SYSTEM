<div id="modal_department_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-cart-plus"></i> Department List</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" id="department_add_form">
                            <div class="form-group row">
                                <div class="col-md-12" style="border:1px solid #80808040; padding:15px;">
                                    <h4 style="font-weight:bold;">Department Add:</h4>
                                    <hr>
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                    <label style="font-weight:bold;">Department Name:</label> <br>
                                    <input type="text" name="department_name" class="form-control required" required autocomplete="off"> <br>
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
                            <table class="table table-bordered" id="department_table" style="border:1px solid; width:100%; text-align:center;">
                                <thead style="background:#194d83;color:white;">
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Action</th>
                                    <th class="text-center">Department Name</th>
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
<div id="modal_department_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="post" id="department_edit_form">
                <div class="modal-header bg-indigo text-white">
                    <h6 class="modal-title"><i class="fa fa-cart-plus"></i> Department Edit</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="collapse show" id="demo1">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" style="font-weight:bold;">Edit Department Name:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control h-auto" id="department_name" name="department_name">
                                    <input type="hidden" class="form-control h-auto" name="id" id="department_id">
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
        var table = $('#department_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('employee_department_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'department_name', name: 'department_name'},
                {data: 'created_at', name: 'created_at'},
            ]
        });
    });
    //(************* Brand (Add/Edit/Delete) Section ***************)
    if ($("#department_add_form").length > 0) {
        $("#department_add_form").validate({
            rules: {
                department_name: {
                    required: true,
                },
            },
            messages: {
                department_name: {
                    required: "*** Department name is required ***"
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
                    url: 'employee_department_store',
                    type: "POST",
                    data: $('#department_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if($.isEmptyObject(data.error)){
                            $('#department_add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Department Name Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#department_table').DataTable().ajax.reload();
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
    if ($("#department_edit_form").length > 0) {
        $("#department_edit_form").validate({
            rules: {
                department_name: {
                    required: true,
                },
            },
            messages: {
                department_name: {
                    required: "*** Department name is required ***"
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
                    url: 'employee_department_update',
                    type: "POST",
                    data: $('#department_edit_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#department_edit_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Department update successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#department_table').DataTable().ajax.reload();
                        $('#modal_department_edit').modal('hide');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    }
    $('body').on('click', '#edit_employee_department', function () {
        var emp_id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "employee_department_edit/" + emp_id,
            success: function (data) {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#modal_department_edit').modal('show');
                $('#department_id').val(data.id);
                $('#department_name').val(data.department_name);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '#delete_employee_department', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete department name?")) {
            $.ajax({
                type: "get",
                url: "employee_department_delete/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Department name delete successfully !!!',
                        showConfirmButton: true,
                        timer: 2500
                    });
                    $('#department_table').DataTable().ajax.reload();
                    setInterval('location.reload()', 1000);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
</script>


