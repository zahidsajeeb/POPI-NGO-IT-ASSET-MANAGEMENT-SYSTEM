<div id="modal_project_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-plus"></i> Project Add</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" id="project_add_form">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Project Name:</label> <br>
                                    <input type="text" name="project_name" class="form-control required">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Branch Name:</label> <br>
                                    <select name="branch_id" class="form-control required">
                                        <option value="">-Select-</option>
                                        @foreach($branch_list as $row)
                                        <option value="{{$row->id}}">{{$row->branch_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Project Start Date:</label> <br>
                                    <input type="date" name="project_start" class="form-control required">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Project End Date:</label> <br>
                                    <input type="date" name="project_end" class="form-control required">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" id="save_employee" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
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
<div id="modal_project_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header bg-indigo text-white">
                    <h6 class="modal-title"><i class="fa fa-edit"></i> Project Edit</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" id="project_edit_form">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger print-error-msg" style="display:none">
                                            <ul></ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label style="font-weight:bold;">Project Name:</label> <br>
                                        <input type="text" name="project_name" id="project_name" class="form-control required">
                                        <input type="hidden" name="id" id="id" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label style="font-weight:bold;">Branch Name:</label> <br>
                                        <select name="branch_id" id="branch_id" class="form-control required">
                                            @foreach($branch_list as $row)
                                                <option value="{{$row->id}}">{{$row->branch_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label style="font-weight:bold;">Project Start Date:</label> <br>
                                        <input type="date" name="project_start" id="project_start" class="form-control required">
                                    </div>
                                    <div class="col-md-6">
                                        <label style="font-weight:bold;">Project End Date:</label> <br>
                                        <input type="date" name="project_end" id="project_end" class="form-control required">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button type="submit"  class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Update</button>
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
<script>
    var SITEURL = '{{URL::to('')}}';
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#project_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('project_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'project_name', name: 'project_name'},
                {data: 'project_start', name: 'project_start'},
                {data: 'project_end', name: 'project_end'},
                {data: 'd_time', name: 'd_time', orderable: false, searchable: true},
                {data: 'employee_name', name: 'employee_name'},
                {data: 'created_at', name: 'created_at'},
            ]
        });
    });
    //(************* Zone (Add/Edit/Delete) Section ***************)
    if ($("#project_add_form").length > 0) {
        $("#project_add_form").validate({
            rules: {
                project_name: {
                    required: true,
                },
                project_start_date: {
                    required: true,
                },
                project_end_date: {
                    required: true,
                },
            },
            messages: {
                project_name: {
                    required: "*** Project Name is Required ***"
                },
                project_start_date: {
                    required: "*** Project Start Date is Required ***"
                },
                project_end_date: {
                    required: "*** Project End Date is Required ***"
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
                    url: 'project_store',
                    type: "POST",
                    data: $('#project_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#project_add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Branch Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#project_table').DataTable().ajax.reload();
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
    if ($("#project_edit_form").length > 0) {
        $("#project_edit_form").validate({
            rules: {
                project_name: {
                    required: true,
                },
                project_start_date: {
                    required: true,
                },
                project_end_date: {
                    required: true,
                },
            },
            messages: {
                project_name: {
                    required: "*** Project Name is Required ***"
                },
                project_start_date: {
                    required: "*** Project Start Date is Required ***"
                },
                project_end_date: {
                    required: "*** Project End Date is Required ***"
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
                    url: 'project_update',
                    type: "POST",
                    data: $('#project_edit_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#project_edit_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Project Update Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#project_table').DataTable().ajax.reload();
                        $('#modal_project_edit').modal('hide');
                        // setInterval('location.reload()', 2000);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    }
    $('body').on('click', '#edit_project', function () {
        var id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "project_edit/" + id,
            success: function (data) {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#modal_project_edit').modal('show');
                $('#id').val(data.id);
                $('#project_name').val(data.project_name);
                $('#branch_id').val(data.branch_id);
                $('#project_start').val(data.project_start);
                $('#project_end').val(data.project_end);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '#delete_project', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this Branch?")) {
            $.ajax({
                type: "get",
                url: "project_delete/" + id,
                success: function (data) {
                    if (data['status']=='success'){
                        swal({
                            icon: 'success',
                            title: 'Item Delete Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#project_table').DataTable().ajax.reload();
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

