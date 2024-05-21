<div id="modal_employee_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <form action="" method="post" id="employeeAddForm">
                <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                    <h6 class="modal-title"><i class="fa fa-user-plus"></i> Employee Information Add</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <fieldset>
                        <div class="collapse show" id="demo1">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="col-form-label" style="font-weight:bold;">Employee Name:</label>
                                    <input type="text" name="employee_name" class="form-control h-auto required"
                                           required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" style="font-weight:bold;">Employee ID:</label>
                                    <input type="text" name="employee_id" class="form-control h-auto required" required
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="col-form-label" style="font-weight:bold;">Employee Department:</label>
                                    <select id="emp_dept" class="form-control h-auto required" name="department_id" required style="border-radius:0px !important;border-color: #604c4c69 !important;">
                                        <option disabled selected>-Select Department-</option>
                                        @foreach($department as $row)
                                            <option value="{{$row->id}}">{{$row->department_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" style="font-weight:bold;">Employee Designation:</label>
                                    <select class="form-control h-auto required" name="designation_id" required style="border-radius:0px !important;border-color: #604c4c69 !important;">
                                        <option disabled selected>-Select Designation-</option>
                                        @foreach($designation as $row)
                                            <option value="{{$row->id}}">{{$row->designation_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="col-form-label" style="font-weight:bold;">Branch:</label>
                                    <select class="form-control" required name="branch_id" id="branch"
                                            style="border-radius:0px !important;border-color: #604c4c69 !important;">
                                        <option disabled selected value="">-Select Branch-</option>
                                        @foreach($branch as $row)
                                            <option value="{{$row->id}}">{{$row->branch_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" style="font-weight:bold;">Phone No:</label>
                                    <input type="number" name="phone" class="form-control h-auto" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <hr>
                <div class="modal-footer">
                    <button type="submit" id="save_employee" class="btn btn-lg btn-success"
                            style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit
                    </button>
                    <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal"
                            style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modal_employee_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ url('employee_update') }}" method="POST" id="employeeEditForm">
                @csrf
                <div class="modal-header bg-indigo text-white">
                    <h6 class="modal-title"><i class="fa fa-user-edit"></i> Employee Information Edit</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <fieldset>
                        <div class="collapse show" id="demo1">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="col-form-label" style="font-weight:bold;">Employee Name:</label>
                                    <input type="text" name="employee_name" class="form-control h-auto required"
                                           id="employee_name" required autocomplete="off">
                                    <input type="hidden" name="id" class="form-control h-auto" id="id">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" style="font-weight:bold;">Employee ID:</label>
                                    <input type="text" name="employee_id" class="form-control h-auto required"
                                           id="employee_id" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="col-form-label" style="font-weight:bold;">Employee Department:</label>
                                    <select class="form-control h-auto required" id="i_department_id"
                                            name="department_id" required
                                            style="border-radius:0px !important;border-color: #604c4c69 !important;">
                                        @foreach($department as $row)
                                            <option value="{{$row->id}}">{{$row->department_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" style="font-weight:bold;">Employee
                                        Designation:</label>
                                    <select class="form-control h-auto required" id="i_designation_id"
                                            name="designation_id" required
                                            style="border-radius:0px !important;border-color: #604c4c69 !important;">
                                        @foreach($designation as $row)
                                            <option value="{{$row->id}}">{{$row->designation_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="col-form-label" style="font-weight:bold;">Branch:</label>
                                    <select class="form-control" name="branch_id" id="i_branch_id"
                                            style="border-radius:0px !important;border-color: #604c4c69 !important;">
                                        @foreach($branch as $row)
                                            <option value="{{$row->id}}">{{$row->branch_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" style="font-weight:bold;">Phone No:</label>
                                    <input type="number" name="phone" class="form-control h-auto" id="i_phone"
                                           autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <hr>
                <div class="modal-footer">
                    <button type="submit" id="update_employee" class="btn btn-lg btn-success"
                            style="border-radius: 0px !important;"><i class="fa fa-check-square"></i> Update
                    </button>
                    <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal"
                            style="border-radius: 0px !important;"><i class="fa fa-close"></i> Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function () {
        jQuery('#add_employee').on('click', function () {
            jQuery('#modal_employee_add').modal('show');
            $('#emp_dept').select2({
                dropdownParent: $('#modal_employee_add .modal-content')
            });
        })
    })
</script>
<script>
    var SITEURL = '{{URL::to('')}}';
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var employee_table = $('#employee_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('employee_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'employee_name', name: 'employee_name'},
                {data: 'employee_id', name: 'employee_id'},
                {data: 'department_name', name: 'department_name'},
                {data: 'designation_name', name: 'designation_name'},
                {data: 'branch_name', name: 'branch_name'},
                {data: 'created_at', name: 'employee_name'},
            ]
        });
    });
    //(************* Company (Add/Edit/Delete) Section ***************)
    if ($("#employeeAddForm").length > 0) {
        $("#employeeAddForm").validate({
            rules: {
                name: {
                    required: true,
                },
                user_name: {
                    required: true,
                },
                role: {
                    required: true,
                },
                counter_no: {
                    required: true,
                },
                password: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "(***Name is required***)"
                },
                user_name: {
                    required: "(***User Name is required***)"
                },
                role: {
                    required: "(***Role is required***)"
                },
                counter_no: {
                    required: "(***Counter No is required***)"
                },
                password: {
                    required: "(***Password is required***)"
                },
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#save_employee').html('Sending..');
                $.ajax({
                    url: 'employee_store',
                    type: "POST",
                    data: $('#employeeAddForm').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#employeeAddForm').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Employee Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#employee_table').DataTable().ajax.reload();
                            setInterval('location.reload()', 1000);
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
    if ($("#employeeEditForm").length > 0) {
        $("#employeeEditForm").validate({
            rules: {
                employee_name: {
                    required: true,
                },
                employee_id: {
                    required: true,
                },
                department_id: {
                    required: true,
                },
                designation_id: {
                    required: true,
                },
                branch_id: {
                    required: true,
                },
            },
            messages: {
                employee_name: {
                    required: "*** Employee name is required ***"
                },
                employee_id: {
                    required: "*** Employee id is required ***"
                },
                department_id: {
                    required: "*** Department name is required ***"
                },
                designation_id: {
                    required: "*** Designation name is required ***"
                },
                branch_id: {
                    required: "(***Branch Name is required***)"
                },
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#update_employee').html('Sending..');
                $.ajax({
                    url: 'employee_update',
                    type: "POST",
                    data: $('#employeeEditForm').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#employeeEditForm').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Employee Data Updated Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#employee_table').DataTable().ajax.reload();
                            setInterval('location.reload()', 1000);
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
    $('body').on('click', '#edit_employee', function () {
        var emp_id = $(this).data('id');
        console.log(emp_id);
        $.ajax({
            type: "get",
            url: "employee_edit/" + emp_id,
            success: function (data) {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#modal_employee_edit').modal('show');
                $('#id').val(data.id);
                $('#employee_name').val(data.employee_name);
                $('#employee_id').val(data.employee_id);
                $('#i_department_id').val(data.department_id);
                $('#i_designation_id').val(data.designation_id);
                $('#i_branch_id').val(data.branch_id);
                $('#i_phone').val(data.phone);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '#delete_employee', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "employee_delete/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Employee Information Delete Successfully !!!',
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
    });
    $('body').on('click', '#inactive_employee', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to inactive this employee?")) {
            $.ajax({
                type: "get",
                url: "employee_inactive/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Employee Inactive Successfully !!!',
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
    });
    $('body').on('click', '#active_employee', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to active this employee?")) {
            $.ajax({
                type: "get",
                url: "employee_active/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Employee Active Successfully !!!',
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
    });
</script>


