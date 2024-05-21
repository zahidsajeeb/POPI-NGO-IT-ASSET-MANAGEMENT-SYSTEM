<div id="modal_branch_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-plus"></i> Branch Add</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" id="branch_add_form">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Region Name:</label> <br>
                                    <select id="region" class="filter form-control region_name" name="region_id">
                                        <option value="">-Select Region-</option>
                                        @foreach($region_list as $row)
                                            <option value="{{$row->id}}">{{$row->region_name}}</option>
                                        @endforeach
                                    </select>
{{--                                    <select id="select_region_name" name="region_id" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">--}}
{{--                                        <option disabled selected>-Select-</option>--}}
{{--                                        @foreach($region_list as $row)--}}
{{--                                            <option value="{{$row->id}}">{{$row->region_name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Zone Name:</label> <br>
                                    <select id="zone" id="zone_name" class="filter form-control zone_name" name="zone_id"></select>
{{--                                    <select id="select_zone_name" name="zone_id" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">--}}
{{--                                        <option disabled selected>-Select-</option>--}}
{{--                                        @foreach($zone_list as $row)--}}
{{--                                            <option value="{{$row->id}}">{{$row->zone_name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Branch Name:</label> <br>
                                    <input type="text" name="branch_name" class="form-control required" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Phone No:</label> <br>
                                    <input type="number" name="phone" class="form-control" autocomplete="off">
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
<div id="modal_branch_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="post" id="branch_edit_form">
                <div class="modal-header bg-indigo text-white">
                    <h6 class="modal-title"><i class="fa fa-cart-plus"></i> Branch Edit</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" id="branch_edit_form">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger print-error-msg" style="display:none">
                                            <ul></ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label style="font-weight:bold;">Edit Region Name:</label> <br>
                                        <select name="region_id" id="b_region_name" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            <option disabled selected>-Select-</option>
                                            @foreach($region_list as $row)
                                                <option value="{{$row->id}}">{{$row->region_name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" class="form-control h-auto" name="id" id="branch_id">
                                    </div>
                                    <div class="col-md-6">
                                        <label style="font-weight:bold;">Edit Zone Name:</label> <br>
                                        <select name="zone_id" id="b_zone_name" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            <option disabled selected>-Select-</option>
                                            @foreach($zone_list as $row)
                                                <option value="{{$row->id}}">{{$row->zone_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label style="font-weight:bold;">Edit Branch Name:</label> <br>
                                        <input type="text" id="branch_name" name="branch_name" class="form-control required" required autocomplete="off">
                                    </div>
                                    <div class="col-md-6">
                                        <label style="font-weight:bold;">Edit Phone No:</label> <br>
                                        <input type="number" id="phone" name="phone" class="form-control" autocomplete="off">
                                    </div>
                                </div>
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
            </form>
        </div>
    </div>
</div>
<div id="modal_branch_transfer" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header bg-indigo text-white">
                    <h6 class="modal-title"><i class="fa fa-cart-plus"></i> Branch Transfer</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" id="branch_transfer_form">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger print-error-msg" style="display:none">
                                            <ul></ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label style="font-weight:bold;">Edit Region Name:</label> <br>
                                        <select name="region_id" id="transfer_region_name" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            <option disabled selected>-Select-</option>
                                            @foreach($region_list as $row)
                                                <option value="{{$row->id}}">{{$row->region_name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" class="form-control h-auto" name="id" id="transfer_branch_id">
                                    </div>
                                    <div class="col-md-6">
                                        <label style="font-weight:bold;">Edit Zone Name:</label> <br>
                                        <select name="zone_id" id="transfer_zone_name" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            <option disabled selected>-Select-</option>
                                            @foreach($zone_list as $row)
                                                <option value="{{$row->id}}">{{$row->zone_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label style="font-weight:bold;">Present Branch Name:</label> <br>
                                        <input type="text" id="transfer_branch_name" name="previous_branch_name" class="form-control" readonly autocomplete="off">
                                    </div>
                                    <div class="col-md-6">
                                        <label style="font-weight:bold;">Transferring Branch Name:</label> <br>
                                        <input type="text" name="branch_name" class="form-control required" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label style="font-weight:bold;">Note:</label> <br>
                                        <textarea name="note" class="form-control"></textarea>
                                    </div>

                                </div>
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
</div>
<div id="modal_branch_close" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="post" id="branch_close_form">
                <div class="modal-header bg-indigo text-white">
                    <h6 class="modal-title"><i class="fa fa-close"></i> Branch Close</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" id="branch_close_form">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger print-error-msg" style="display:none">
                                            <ul></ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label style="font-weight:bold;">Branch Closing Date:</label> <br>
                                        <input type="date" name="closing_date" class="form-control required" required autocomplete="off">
                                        <input type="hidden" class="form-control h-auto" name="id" id="branch_close_id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label style="font-weight:bold;">Closing Reason:</label> <br>
                                        <textarea class="form-control" name="closing_reason"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#region').select2({
            placeholder: "Search Region . .",
            width: '100%'
        });
        $('#zone').select2({
            placeholder: "Search Zone . .",
            width: '100%'
        });
        $('#branch').select2({
            placeholder: "Search Branch . .",
            width: '100%'
        });
        $('.region_name').on('change', function () {
            var id = this.value;
            $(".zone_name").html('');
            $.ajax({
                url: "{{url('fetch_related_zone_name')}}",
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
                url: "{{url('fetch_search_branch_name')}}",
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
                            .branch_name + '">' + value.branch_name + '</option>');
                    });
                }
            });
        });
        $('.project_name').on('change', function () {
            var id = this.value;
            console.log(id);
            $(".branch_name").html('');
            $.ajax({
                url: "{{url('fetch_project_search_branch_name')}}",
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
                            .branch_name + '">' + value.branch_name + '</option>');
                    });
                }
            });
        });
    });
</script>
<script>
    var SITEURL = '{{URL::to('')}}';
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#branch_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('branch_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'region_name', name: 'region_name'},
                {data: 'zone_name', name: 'zone_name'},
                {data: 'branch_name', name: 'branch_name'},
                {data: 'phone', name: 'phone'},
                {data: 'created_at', name: 'created_at'},
                {data: 'employee_name', name: 'employee_name'},
                {data: 'note', name: 'note'},
                {data: 'closing_date', name: 'closing_date'},
                {data: 'closing_reason', name: 'closing_reason'},
            ]
        });
        jQuery('#branch_modal').on('click', function () {
            jQuery('#modal_branch_add').modal('show');
            $('#select_region_name').select2({
                placeholder: "Search Region . .",
                width: '100%',
                dropdownParent: $('#modal_branch_add .modal-content')
            });
            $('#select_zone_name').select2({
                placeholder: "Search Zone . .",
                width: '100%',
                dropdownParent: $('#modal_branch_add .modal-content')
            });
        })
    });
    //(************* Zone (Add/Edit/Delete) Section ***************)
    if ($("#branch_add_form").length > 0) {
        $("#branch_add_form").validate({
            rules: {
                branch_name: {
                    required: true,
                },
            },
            messages: {
                branch_name: {
                    required: "*** Branch Name is Required ***"
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
                    url: 'branch_store',
                    type: "POST",
                    data: $('#branch_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#branch_add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Branch Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#branch_table').DataTable().ajax.reload();
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
    if ($("#branch_edit_form").length > 0) {
        $("#branch_edit_form").validate({
            rules: {
                branch_name: {
                    required: true,
                },
            },
            messages: {
                branch_name: {
                    required: "*** Zone Name Is Required ***"
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
                    url: 'branch_update',
                    type: "POST",
                    data: $('#branch_edit_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#branch_edit_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Branch Update Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#branch_table').DataTable().ajax.reload();
                        $('#modal_branch_edit').modal('hide');
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
    if ($("#branch_close_form").length > 0) {
        $("#branch_close_form").validate({
            rules: {
                closing_date: {
                    required: true,
                },
                closing_reason: {
                    required: true,
                },
            },
            messages: {
                closing_date: {
                    required: "*** Closing Date Is Required ***"
                },
                closing_reason: {
                    required: "*** Closing Reason Is Required ***"
                },
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'branch_close',
                    type: "POST",
                    data: $('#branch_close_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#branch_close_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Branch Close Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#branch_table').DataTable().ajax.reload();
                        $('#modal_branch_edit').modal('hide');
                        setInterval('location.reload()', 1000);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    }
    $('body').on('click', '#edit_branch', function () {
        var emp_id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "branch_edit/" + emp_id,
            success: function (data) {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#modal_branch_edit').modal('show');
                $('#branch_id').val(data.id);
                $('#branch_name').val(data.branch_name);
                $('#b_region_name').val(data.region_id);
                $('#b_zone_name').val(data.zone_id);
                $('#phone').val(data.phone);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    if ($("#branch_transfer_form").length > 0) {
        $("#branch_transfer_form").validate({
            rules: {
                branch_name: {
                    required: true,
                },
            },
            messages: {
                branch_name: {
                    required: "*** Branch Name Is Required ***"
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
                    url: 'branch_transfer',
                    type: "POST",
                    data: $('#branch_transfer_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#branch_transfer_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Branch Transfer Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#branch_table').DataTable().ajax.reload();
                        $('#modal_branch_transfer').modal('hide');
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
    $('body').on('click', '#transfer_branch', function () {
        var id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "branch_edit/" + id,
            success: function (data) {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#modal_branch_transfer').modal('show');
                $('#transfer_branch_id').val(data.id);
                $('#transfer_branch_name').val(data.branch_name);
                $('#transfer_region_name').val(data.region_id);
                $('#transfer_zone_name').val(data.zone_id);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '#delete_branch', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this Branch?")) {
            $.ajax({
                type: "get",
                url: "branch_delete/" + id,
                success: function (data) {
                    if (data['status']=='success'){
                        swal({
                            icon: 'success',
                            title: 'Item Delete Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#branch_table').DataTable().ajax.reload();
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
    $('body').on('click', '#close_branch', function () {
        var id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "branch_edit/" + id,
            success: function (data) {
                $('#modal_branch_close').modal('show');
                $('#branch_close_id').val(data.id);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
</script>
