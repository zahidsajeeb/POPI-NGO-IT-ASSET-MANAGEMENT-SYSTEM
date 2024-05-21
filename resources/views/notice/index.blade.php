
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <style>
        .error{
            color:red;
            font-weight:bold;
        }
        .card{
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }
        input{
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Notice List</h4>
                    </div>
                    <div class="navbar-right">
                        <button type="button" class="btn btn-indigo" data-toggle="modal" id="role_add" data-target="#modal_role_add121" style="border-radius:0px;"><i class="icon-plus2"></i> Add Notice </button>
                        <button  onClick="history.go(0);" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-refresh"></i> Page Refresh</button>
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">User Lists</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table" style="border:1px solid; text-align:center;">
                                <thead style="background:#194d83;color:white; text-align:center;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Action</th>
                                    <th class="text-center">Notice</th>
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
            @include('admin.include.footer')
        </div>
    </div>
</div>
<div id="modal_role_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-user-plus"></i> Notice Add</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="add_form">
                    <div class="row">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>

                        <div class="col-md-12" style="margin-bottom:10px;">
                            <label style="font-weight:bold;">Notice:</label> <br>
                            <textarea name="notice" class="form-control required" required></textarea>
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
<script>
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
            ajax: "{{ url('notice_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'notice', name: 'notice'},
                {data: 'created_at', name: 'created_at'},
            ]
        });
        jQuery('#role_add').on('click', function () {
            jQuery('#modal_role_add').modal('show');
            $('#employee_name').select2({
                placeholder: "Search Employee Name . .",
                width: '100%',
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
                    url: 'notice_store',
                    type: "POST",
                    data: $('#add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Notice Stored Successfully !!!',
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
    $('body').on('click', '#delete_notice', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this Notice?")) {
            $.ajax({
                type: "get",
                url: "notice_delete/" + id,
                success: function (data) {
                    if (data['status'] == 'success') {
                        swal({
                            icon: 'success',
                            title: 'Notice Delete Successfully !!!',
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
</body>
</html>








