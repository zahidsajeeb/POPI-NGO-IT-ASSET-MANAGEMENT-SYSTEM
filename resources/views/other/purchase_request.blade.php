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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Purchase Request</h4>
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
                                <h5 class="card-title"><b>Purchase Request Form</b></h5>
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
                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Serial No:</label> <br>
                                            <input type="text" name="serial_no" value="serial-<?php echo $last_serial_no->id + 1; ?>" class="form-control" readonly style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Region Name:</label> <br>
                                            <select name="region_id" class="form-control region_name required" id="region_name" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                <option value="">-Select-</option>
                                                @foreach($region_list as $row)
                                                    <option value="{{$row->id}}">{{$row->region_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Branch Name:</label> <br>
                                            <select name="branch_id" id="branch_name" class="form-control branch_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                        </div>
                                        <div class="col-md-3" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Requester Name:</label> <br>
                                            <input type="text" name="requester_name" id="date" class="form-control item_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-3" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Designation:</label> <br>
                                            <input type="text" name="designation" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">

                                        </div>
                                        <div class="col-md-3" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Requested Date:</label> <br>
                                            <input type="date" name="request_date" id="min" class="form-control zone_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-3" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Required date:</label> <br>
                                            <input type="date" name="required_date" id="max" class="form-control branch_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered" id="dynamic_field">
                                                <tr style="background: #808080fa;color: white">
                                                    <td>Sl No</td>
                                                    <td>Particulars</td>
                                                    <td>Purpose</td>
                                                    <td>Qty</td>
                                                    <td>Approx Value</td>
                                                    <td>Action</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td><textarea name="addmore[0][particulars]" class="form-control" required style="border-radius: 0px;border-color: #80808061;"></textarea></td>
                                                    <td><input type="text" name="addmore[0][purpose]" required class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>
                                                    <td><input type="text" name="addmore[0][qty]" required class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>
                                                    <td><input type="text" name="addmore[0][approx_value]" required class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>
                                                    <td>
                                                        <button type="button" name="add" id="add" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Add More</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label style="font-weight:bold;">Amount(In Word):</label> <br>
                                            <input type="text" name="value_in_word"  class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
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
                                <h5 class="card-title"><b>Purchase Request Lists</b></h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="purchase_table" style="border:1px solid; text-align:center;">
                                        <thead style="background:#194d83;color:white; text-align:center;">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Action</th>
                                            <th class="text-center">Serial No</th>
                                            <th class="text-center">Requester Name</th>
                                            <th class="text-center">Branch Name</th>
                                            <th class="text-center">Region Name</th>
                                            <th class="text-center">Request Date</th>
                                            <th class="text-center">Required Date</th>
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
    $('#region_name').select2({
        placeholder: "Search Region Name . .",
        width: '100%'
    });
    $('#branch_name').select2({
        placeholder: "Search Branch Name . .",
        width: '100%'
    });
    $(document).ready(function () {
        $('.region_name').on('change', function () {
            var id = this.value;
            $(".branch_name").html('');
            $.ajax({
                url: "{{url('fetch_pr_branch_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('.branch_name').html('<option value="">-- Select Branch Name --</option>');
                    $.each(result.branch_name, function (key, value) {
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
        var table = $('#purchase_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('purchase_request_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'serial_no', name: 'serial_no'},
                {data: 'requester_name', name: 'requester_name'},
                {data: 'branch_id', name: 'branch_id'},
                {data: 'region_id', name: 'region_id'},
                {data: 'request_date', name: 'request_date'},
                {data: 'required_date', name: 'required_date'},
            ]
        });
    });
    $(document).ready(function () {
        var postURL = "<?php echo url('addmore'); ?>";
        var i = 1;
        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added">' +
                '<td>' + i + '</td>' +
                '<td><textarea name="addmore[' + i + '][particulars]" class="form-control" style="border-radius: 0px;border-color: #80808061;"></textarea></td>' +
                '<td><input type="text" name="addmore[' + i + '][purpose]" class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>' +
                '<td><input type="text" name="addmore[' + i + '][qty]" class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>' +
                '<td><input type="text" name="addmore[' + i + '][approx_value]" class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>' +
                '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove" style="border-radius: 0px !important;"><i class="fa fa-trash"></i> Remove</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
    if ($("#add_form").length > 0) {
        $("#add_form").validate({
            rules: {
                requester_name: {required: true,},
                designation: {required: true,},
                request_date: {required: true,},
                required_date: {required: true,},
            },
            messages: {
                requester_name: {required: "(***Required ***)"},
                designation: {required: "(***Required ***)"},
                request_date: {required: "(***Required ***)"},
                required_date: {required: "(***Required ***)"},
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#store').html('Sending..');
                $.ajax({
                    url: 'purchase_request_store',
                    type: "POST",
                    data: $('#add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if (data['status']=='success'){
                            swal({
                                icon: 'success',
                                title: 'Purchase Request Store Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            })
                                .then(() => {

                                    // window.location.href = "/branch_distribution";
                                    setInterval('location.reload()', 2000)
                                })
                        }
                        if (data['status']=='error'){
                            swal({
                                icon: 'error',
                                title: 'Sorry!!! Required Date is less then Request Date !!!',
                                showConfirmButton: true,
                                timer: 4000
                            });
                        }

                    },
                    // success: function (data) {
                    //     if ($.isEmptyObject(data.error)) {
                    //         $('#add_form').trigger("reset");
                    //         swal({
                    //             icon: 'success',
                    //             title: 'Purchase Request Stored Successfully !!!',
                    //             showConfirmButton: true,
                    //             timer: 2500
                    //         });
                    //         $('#purchase_table').DataTable().ajax.reload();
                    //     } else {
                    //         printErrorMsg(data.error);
                    //     }
                    // },
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
    $('body').on('click', '#delete_purchase', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this Branch?")) {
            $.ajax({
                type: "get",
                url: "purchase_request_delete/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Purchase Request Delete Successfully !!!',
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








