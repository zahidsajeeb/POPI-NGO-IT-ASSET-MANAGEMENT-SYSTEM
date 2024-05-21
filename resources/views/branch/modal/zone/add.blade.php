<div id="modal_zone_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-cart-plus"></i> Zone List</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" id="zone_add_form">
                            <div class="form-group row" style="border:1px solid #80808040; padding:15px;">
                                <div class="col-md-12">
                                    <h4 style="font-weight:bold;">Zone Add:</h4>
                                    <hr>
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Region Name:</label> <br>
                                    <select name="region_name" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        <option disabled selected>-Select-</option>
                                        @foreach($region_list as $row)
                                            <option value="{{$row->id}}">{{$row->region_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Zone Name:</label> <br>
                                    <input type="text" name="zone_name" class="form-control required" required autocomplete="off">
                                </div>
                                <div class="col-md-12" style="margin-top:10px;">
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
                            <table class="table table-bordered" id="zone_table" style="border:1px solid; width:100%; text-align:center;">
                                <thead style="background:#194d83;color:white;">
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                    <th class="text-center">Region Name</th>
                                    <th class="text-center">Zone Name</th>
                                    <th class="text-center">Created By</th>
                                    <th class="text-center">Created At</th>
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
<div id="modal_zone_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="post" id="zone_edit_form">
                <div class="modal-header bg-indigo text-white">
                    <h6 class="modal-title"><i class="fa fa-edit"></i> Zone Edit</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="collapse show" id="demo1">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="col-form-label"> Edit Region Name:</label>
                                    <select name="region_name"  id="region_name_1" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        @foreach($region_list as $row)
                                            <option value="{{$row->id}}">{{$row->region_name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" class="form-control h-auto" name="id" id="zone_id">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Edit Zone Name:</label>
                                    <input type="text" class="form-control h-auto" id="zone_name" name="zone_name">
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
        var table = $('#zone_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('zone_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'edit', name: 'action', orderable: false, searchable: true},
                {data: 'delete', name: 'action', orderable: false, searchable: true},
                {data: 'region_name', name: 'region_name'},
                {data: 'zone_name', name: 'zone_name'},
                {data: 'employee_name', name: 'employee_name'},
                {data: 'created_at', name: 'created_at'},
            ]
        });
    });
    //(************* Zone (Add/Edit/Delete) Section ***************)
    if ($("#zone_add_form").length > 0) {
        $("#zone_add_form").validate({
            rules: {
                zone_name: {
                    required: true,
                },
            },
            messages: {
                zone_name: {
                    required: "*** Zone Name is Required ***"
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
                    url: 'zone_store',
                    type: "POST",
                    data: $('#zone_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#zone_add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Zone Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#zone_table').DataTable().ajax.reload();
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
    if ($("#zone_edit_form").length > 0) {
        $("#zone_edit_form").validate({
            rules: {
                zone_name: {
                    required: true,
                },
            },
            messages: {
                zone_name: {
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
                    url: 'zone_update',
                    type: "POST",
                    data: $('#zone_edit_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#zone_edit_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Zone Update Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#zone_table').DataTable().ajax.reload();
                        $('#modal_zone_edit').modal('hide');
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
    $('body').on('click', '#edit_zone', function () {
        var emp_id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "zone_edit/" + emp_id,
            success: function (data) {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#modal_zone_edit').modal('show');
                $('#zone_id').val(data.id);
                $('#region_name_1').val(data.region_name);
                $('#zone_name').val(data.zone_name);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '#delete_zone', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "zone_delete/" + id,
                success: function (data) {
                    if (data['status']=='success'){
                        swal({
                            icon: 'success',
                            title: 'Item Delete Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#zone_table').DataTable().ajax.reload();
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
