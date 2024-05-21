<div id="modal_role_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-user-plus"></i> User Role Add</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="add_form">
                <div class="row">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                        <div class="col-md-12" style="margin-bottom:10px;">
                            <label style="font-weight:bold;">Employee Name:</label> <br>
                            <select name="name" class="form-control required" id="employee_name" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                <option value="">-Select-</option>
                                @foreach($user_list as $row)
                                    <option value="{{$row->id}}">{{$row->employee_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <label style="font-weight:bold;">Employee ID:</label> <br>
                            <select name="user_name" id="employee_id" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                                <label style="font-weight:bold;">Role:</label>
                                <select class="form-control required" name="role" required>
                                    <option value="">-Select-</option>
                                    <option value="Admin">Admin</option>
                                    <option value="General">General</option>
                                    <option value="IT officer">IT officer</option>
                                </select>
                        </div>
{{--                    <div class="col-md-12" style="margin-bottom:10px;">--}}
{{--                        <label style="font-weight:bold;">Region:</label>--}}
{{--                        <select name="region_id" class="form-control" id="region" required>--}}
{{--                            <option value="">-Select-</option>--}}
{{--                            @foreach($region_list as $row)--}}
{{--                            <option value="{{$row->id}}">{{$row->region_name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

                    <div class="col-md-12" style="margin-bottom:10px;">
                        <label style="font-weight:bold;">Region Name:</label> <br>
                        <select name="region_id[]" class="form-control region_name required" id="region_name"  multiple="multiple" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
{{--                            <option value="">-Select-</option>--}}
                            @foreach($region_list as $row)
                                <option value="{{$row->id}}">{{$row->region_name}}</option>
                            @endforeach
                        </select>
                    </div>
{{--                    <div class="col-md-12" style="margin-bottom:10px;">--}}
{{--                        <label style="font-weight:bold;">Zone Name:</label> <br>--}}
{{--                        <select name="zone_id" id="zone_name" class="form-control zone_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-12" style="margin-bottom:10px;">--}}
{{--                        <label style="font-weight:bold;">Branch Name:</label> <br>--}}
{{--                        <select name="branch_id[]" id="branch_name" class="form-control branch_name required"  required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>--}}
{{--                    </div>--}}
                    <div class="col-md-12" style="margin-bottom:10px;">
                                <label style="font-weight:bold;">Password:</label>
                               <input type="password" class="form-control" name="password">
                    </div>
                    <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="form-group row">
                                <button type="submit" id="store" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="modal_user_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="post" id="edit_form">
                <div class="modal-header bg-indigo text-white">
                    <h6 class="modal-title"><i class="fa fa-user-edit"></i> User Edit</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="collapse show" id="demo1">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">User ID:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control h-auto" id="user_name" readonly>
                                    <input type="hidden" class="form-control h-auto" name="id" id="id">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Role:</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="role" id="role" required>
                                        <option value="Admin">Admin</option>
                                        <option value="General">General</option>
                                        <option value="IT officer">IT officer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Region:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control h-auto" id="region" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Edit Region:</label>
                                <div class="col-lg-8">
                                    <select name="region_id" class="form-control" required>
                                        @foreach($region_list as $row)
                                            <option value="{{$row->id}}">{{$row->region_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Password:</label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" name="password" id="password">
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
    $(document).ready(function () {
        $('.region_name').on('change', function () {
            var id = this.value;
            $(".zone_name").html('');
            $.ajax({
                url: "{{url('fetch_zone_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('.zone_name').html('<option value="">-- Select State --</option>');
                    $.each(result.zone_name, function (key, value) {
                        $(".zone_name").append('<option value="' + value
                            .id + '">' + value.zone_name + '</option>');
                    });
                    $('.branch_name').html('<option value="">-- Select Branch --</option>');
                }
            });
        });
        $('.zone_name').on('change', function () {
            var id = this.value;
            console.log(id);
            $(".branch_name").html('');
            $.ajax({
                url: "{{url('fetch_branch_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('.branch_name').html('<option value="">-- Select State --</option>');
                    $.each(res.branch_name, function (key, value) {
                        $(".branch_name").append('<option value="' + value
                            .id + '">' + value.branch_name + '</option>');
                    });
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#employee_name').on('change', function () {
            var id = this.value;
            $("#employee_id").html('');
            $.ajax({
                url: "{{url('fetch_emp_id')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#employee_id').html();
                    $.each(result.employee_id, function (key, value) {
                        $("#employee_id").append('<option value="' + value
                            .employee_id + '">' + value.employee_id + '</option>');
                    });
                }
            });
        });
        $('#employee_name').select2({
            placeholder: "Search Brand Name . .",
            width: '100%'
        });
        $("#region").select2({
            dropdownParent: $("#modal_role_add")
        });
    });

    var SITEURL = '{{URL::to('')}}';
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('user_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'employee_name', name: 'employee_name'},
                {data: 'user_name', name: 'user_name'},
                {data: 'role', name: 'role'},
                {data: 'created_at', name: 'created_at'},
            ]
            // scrollY: '500px',
            // scrollCollapse: true,
        });
        var table = $('#super_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('user_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'employee_name', name: 'employee_name'},
                {data: 'user_name', name: 'user_name'},
                {data: 'confirm_password', name: 'confirm_password'},
                {data: 'role', name: 'role'},
                {data: 'created_at', name: 'created_at'},
            ]
            // scrollY: '500px',
            // scrollCollapse: true,
        });
        jQuery('#role_add').on('click', function () {
            jQuery('#modal_role_add').modal('show');
            $('#employee_name').select2({
                placeholder: "Search Employee Name . .",
                width: '100%',
                dropdownParent: $('#modal_role_add .modal-content')
            });
            $('#region_name').select2({
                placeholder: "Search Region Name . .",
                width: '100%',
                dropdownParent: $('#modal_role_add .modal-content')
            });
            $('#zone_name').select2({
                placeholder: "Search Zone Name . .",
                width: '100%',
                dropdownParent: $('#modal_role_add .modal-content')
            });
            $('#branch_name').select2({
                placeholder: "Search Branch Name . .",
                width: '100%',
                multiple: true,
                dropdownParent: $('#modal_role_add .modal-content')
            });
        })
    });
    //(************* Item (Add/Edit/Delete) Section ***************)
    if ($("#add_form").length > 0) {
        $("#add_form").validate({
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
                // $('#store').html('Sending..');
                $.ajax({
                    url: 'user_store',
                    type: "POST",
                    data: $('#add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'User Add Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#table').DataTable().ajax.reload();
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
    if ($("#edit_form").length > 0) {
        $("#edit_form").validate({
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
                // $('#update').html('Updating..');
                $.ajax({
                    url: 'user_update',
                    type: "POST",
                    data: $('#edit_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#edit_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'User Update Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#table').DataTable().ajax.reload();
                        $('#modal_user_edit').modal('hide');
                        // setInterval('location.reload()', 2000);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    }
    $('body').on('click', '#edit_user', function () {
        var emp_id = $(this).data('id');
        $.ajax({
            type: "get",
            url: " user_edit/" + emp_id,
            success: function (data) {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#modal_user_edit').modal('show');
                $('#id').val(data.id);
                $('#user_name').val(data.user_name);
                $('#role').val(data.role);
                $('#e_region').val(data.region_id);
                $('#password').val(data.confirm_password);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
        $("#e_region").select2({
            dropdownParent: $("#modal_user_edit")
        });
    });
    $('body').on('click', '#delete_user', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "user_delete/" + id,
                success: function (data) {
                    if (data['status'] == 'success') {
                        swal({
                            icon: 'success',
                            title: 'User Delete Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#table').DataTable().ajax.reload();
                    }
                    if (data['status'] == 'error') {
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

