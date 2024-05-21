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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Branch/Project Visiting & Working Information</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"><b>Branch/Project Visiting & Working Information Form</b></h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" id="add_form">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger print-error-msg" style="display:none">
                                                <ul></ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-md-3" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Information Type:</label> <br>
                                            <select class="form-control" name="present_info_type" required>
                                                <option value="">-Select-</option>
                                                <option>Branch</option>
                                                <option>Project</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Branch Name:</label> <br>
                                            <select name="name" class="form-control required select2" required>
                                                <option value="">-Select-</option>
                                                @foreach($branch_list as $row)
                                                <option>{{$row->branch_name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-md-3" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Zone Name:</label> <br>
                                            <select name="zone_name" class="form-control required select2" required>
                                                <option value="">-Select-</option>
                                                @foreach($zone_list as $row)
                                                    <option>{{$row->zone_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Region Name:</label> <br>
                                            <select name="region_name" class="form-control required select2" required>
                                                <option value="">-Select-</option>
                                                @foreach($region_list as $row)
                                                    <option>{{$row->region_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">User Name:</label> <br>
                                            <input type="text" name="user_name" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Designation:</label> <br>
                                            <input type="text" name="designation" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Cell Number:</label> <br>
                                            <input type="text" name="cell_number" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-6" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Device/Software Name:</label> <br>
                                            <input type="text" name="d_s_name" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-6" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Device/Software Status Before Servicing:</label> <br>
                                            <input type="text" name="d_s_status_before" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-6" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Service Requirement:</label> <br>
                                            <input type="text" name="service_req" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-6" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Device/Software Status After Servicing:</label> <br>
                                            <input type="text" name="d_s_status_after" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-6" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Visiting Start Date:</label> <br>
                                            <input type="date" name="visiting_start_date" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-6" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Visiting End Date:</label> <br>
                                            <input type="date" name="visiting_end_date" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-6" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Visiting Start Time:</label> <br>
                                            <input type="text" name="visiting_start_time" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-6" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Visiting End Time:</label> <br>
                                            <input type="text" name="visiting_end_time" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-12" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Visiting Night Hold:</label> <br>
                                            <input type="text" name="visiting_night_hold" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-12" style="margin-bottom:10px; margin-top:10px;">
                                            <h5><b>Comments:</b></h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">IT Officer:</label> <br>
                                            <textarea name="it_comment"  class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></textarea>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Branch/Project User:</label> <br>
                                            <textarea type="text" name="user_comment" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></textarea>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Lists</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="table" style="border:1px solid; text-align:center;">
                                        <thead style="background:#194d83;color:white; text-align:center;">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Action</th>
                                            <th class="text-center">Branch/Project Name</th>
                                            <th class="text-center">Starting Time</th>
                                            <th class="text-center">Ending Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>

<script>
    $(".select2").select2({
        placeholder: "Select",
        allowClear: true
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
            ajax: "{{ url('visiting_working_info_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'name', name: 'name'},
                {data: 'starting_time', name: 'starting_time'},
                {data: 'ending_time', name: 'ending_time'},
            ]
        });
    });
    $(document).ready(function () {
        var postURL = "<?php echo url('addmore'); ?>";
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added">' +
                '<td>'+i+'</td>' +
                '<td><textarea name="addmore[' + i + '][description]" class="form-control" style="border-radius: 0px;border-color: #80808061;"></textarea></td>' +
                '<td><input type="text" name="addmore[' + i + '][qty]" class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>' +
                '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="border-radius: 0px !important;"><i class="fa fa-trash"></i> Remove</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });
    });
    if ($("#add_form").length > 0) {
        $("#add_form").validate({
            rules: {
                vendor_name: {required: true,},
                date: {required: true,},
                receiver_name: {required: true,},
                address: {required: true,},
                mobile_no: {required: true,},
            },
            messages: {
                vendor_name: {required: "*** Vendor Name is Required ***"},
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
                // $('#store').html('Sending..');
                $.ajax({
                    url: 'visiting_working_info_store',
                    type: "POST",
                    data: $('#add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Visiting Working Info Stored Successfully !!!',
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
    $('body').on('click', '#delete', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this Branch?")) {
            $.ajax({
                type: "get",
                url: "visiting_working_info_delete/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Gatepass Delete Successfully !!!',
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
    $('body').on('click', '#job_done', function () {
        var id = $(this).data("id");
        if (confirm("Done This Job?")) {
            $.ajax({
                type: "get",
                url: "visiting_working_info_update/" + id,
                success: function (data) {
                    swal({
                        icon: 'success',
                        title: 'Job Done Successfully !!!',
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











