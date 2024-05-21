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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Gate Pass</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('blank_gatepass')}}" class="btn btn-info navbar-right"
                           style="border-radius:0px;"><i class="fa fa-page4"></i> Blank Gate Pass</a>
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i
                                class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                @if(Auth::user()->role==='Admin' || Auth::user()->role==='Superadmin')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Gatepass Form</h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" id="gatepass_add_form">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger print-error-msg" style="display:none">
                                                <ul></ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <h4>Receive By</h4>
                                            <hr>
                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                <label style="font-weight:bold;">Gate Pass Serial No:</label> <br>
                                                <input type="text" name="serial_no"
                                                       value="serial-<?php echo $last_serial_no->id + 1; ?>"
                                                       class="form-control" readonly
                                                       style="border-radius: 0px !important; border-color: #604c4c69 !important;">

                                            </div>
                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                <label style="font-weight:bold;">Date:</label> <br>
                                                <input type="date" name="date" id="date"
                                                       class="form-control item_name required" required
                                                       style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            </div>
                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                <div class="card-group-control card-group-control-right">
                                                    <div class="card mb-2">
                                                        <div class="card-header">
                                                            <h6 class="card-title">
                                                                <a class="text-body collapsed active" data-toggle="collapse" aria-expanded="true" href="#available_item">
                                                                    <i class="icon-help mr-2 text-secondary"></i> Mobile Number Exist:
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="available_item" class="collapse show">
                                                            <div class="card-body">
                                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                                    <label style="font-weight:bold;">Mobile:</label>
                                                                    <br>
                                                                    <select name="e_mobile_no" class="form-control mobile_no" id="mobile_no"  style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                                        <option value="">-Select-</option>
                                                                        @foreach($mobile_no as $row)
                                                                            <option value="{{$row->mobile_no}}">{{$row->mobile_no}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    {{--<input type="text" name="mobile_no" id="mobile_no" class="form-control branch_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">--}}
                                                                </div>
                                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                                    <label style="font-weight:bold;">Receiver Name:</label> <br>
                                                                    <select name="e_receiver_name" id="receiver_name" class="form-control receiver_name"  style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
{{--                                                                    <input type="text" name="receiver_name" id="receiver_name" class="form-control receiver_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">--}}
                                                                </div>
                                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                                    <label style="font-weight:bold;">Address:</label>
                                                                    <br>
                                                                    <select name="e_address" id="address" class="form-control address"  style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                                    {{--                                                <input type="text" name="address" id="address" class="form-control branch_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">--}}
                                                                </div>
                                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                                    <label style="font-weight:bold;">Company Name / Branch Name:</label>
                                                                    <br>
                                                                    <select name="e_vendor_name" id="vendor_name" class="form-control vendor_name"  style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                <div class="card-group-control card-group-control-right">
                                                    <div class="card mb-2">
                                                        <div class="card-header">
                                                            <h6 class="card-title">
                                                                <a class="text-body collapsed" data-toggle="collapse" href="#not_available">
                                                                    <i class="icon-help mr-2 text-secondary"></i> Mobile Number Not Exist:
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="not_available" class="collapse">
                                                            <div class="card-body">
                                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                                    <label style="font-weight:bold;">Mobile No:</label>
                                                                    <br>
                                                                     <input type="text" name="mobile_no" id="mobile_no" class="form-control branch_name required"  style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                                </div>
                                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                                    <label style="font-weight:bold;">Receiver Name:</label> <br>
                                                                    <input type="text" name="receiver_name" id="receiver_name" class="form-control zone_name required"  style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                                </div>
                                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                                    <label style="font-weight:bold;">Company Name / Branch Name:</label>
                                                                    <br>
                                                                    <input type="text" name="vendor_name" class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                                </div>
                                                                <div class="col-md-12" style="margin-bottom:10px;">
                                                                    <label style="font-weight:bold;">Address:</label>
                                                                    <br>
                                                                     <input type="text" name="address" id="address" class="form-control branch_name"  style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-8">
                                            <h4>Item Description</h4>
                                            <hr>
                                            <table class="table table-bordered" id="dynamic_field">
                                                <tr style="background: #808080fa;color: white">
                                                    <td>Sl No</td>
                                                    <td>Item Description</td>
                                                    <td>Qty</td>
                                                    <td>Action</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td><textarea name="addmore[0][description]" class="form-control"
                                                                  style="border-radius: 0px;border-color: #80808061;"></textarea>
                                                    </td>
                                                    <td><input type="text" name="addmore[0][qty]" class="form-control"
                                                               style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                    </td>
                                                    <td>
                                                        <button type="button" name="add" id="add"
                                                                class="btn btn-sm btn-success"
                                                                style=" border-radius: 0px !important;"><i
                                                                class="icon-checkbox-checked"></i> Add More
                                                        </button>
                                                    </td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" id="update" class="btn btn-sm btn-success"
                                                    style=" border-radius: 0px !important;"><i
                                                    class="icon-checkbox-checked"></i> Submit
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"
                                                    style=" border-radius: 0px !important;"><i class="fa fa-close"></i>
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Gate Pass Lists</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if(Auth::user()->role==='Admin' || Auth::user()->role==='Superadmin')
                                    <table class="table table-bordered" id="gatepass_table"
                                           style="border:1px solid; text-align:center;">
                                        <thead style="background:#194d83;color:white; text-align:center;">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Action</th>
                                            <th class="text-center">Sending Link</th>
                                            <th class="text-center">Serial No</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Suppliers/Vendor Name</th>
                                            <th class="text-center">Receiver Name</th>
                                            <th class="text-center">Mobile</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    @endif
                                        @if(Auth::user()->role==='IT officer')
                                            <table class="table table-bordered" id="gatepass_table"
                                                   style="border:1px solid; text-align:center;">
                                                <thead style="background:#194d83;color:white; text-align:center;">
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Action</th>
                                                    <th class="text-center">Sending Link</th>
                                                    <th class="text-center">Serial No</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Suppliers/Vendor Name</th>
                                                    <th class="text-center">Receiver Name</th>
                                                    <th class="text-center">Mobile</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        @endif
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
    $('#mobile_no').select2({
        placeholder: "Search Mobile No . .",
        width: '100%'
    });
    // $('#receiver_name').select2({
    //     placeholder: "Search Receiver Name . .",
    //     width: '100%'
    // });
    // $('#address').select2({
    //     placeholder: "Search Address . .",
    //     width: '100%'
    // });
    $(document).ready(function () {
        $('.mobile_no').on('change', function () {
            var id = this.value;
            $(".receiver_name").html('');
            $.ajax({
                url: "{{url('fetch_receiver_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $.each(result.receiver_name, function (key, value) {
                        $(".receiver_name").append('<option value="' + value
                            .receiver_name + '">' + value.receiver_name + '</option>');
                    });
                    // $('.address').html('<option value="">-- Select Branch --</option>');
                }
            });
        });
        $('.mobile_no').on('change', function () {
            var id = this.value;
            console.log(id);
            $(".address").html('');
            $.ajax({
                url: "{{url('fetch_address')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $.each(res.address, function (key, value) {
                        $(".address").append('<option value="' + value
                            .address + '">' + value.address + '</option>');
                    });
                }
            });
        });
        $('.mobile_no').on('change', function () {
            var id = this.value;
            console.log(id);
            $(".vendor_name").html('');
            $.ajax({
                url: "{{url('fetch_company')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $.each(res.vendor_name, function (key, value) {
                        $(".vendor_name").append('<option value="' + value
                            .vendor_name + '">' + value.vendor_name + '</option>');
                    });
                }
            });
        });
    });


    var SITEURL = '{{URL::to('')}}';
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#gatepass_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('gatepass_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'send_link', name: 'send_link', orderable: false, searchable: true},
                {data: 'serial_no', name: 'serial_no'},
                {data: 'date', name: 'date'},
                {data: 'vendor_name', name: 'vendor_name'},
                {data: 'receiver_name', name: 'receiver_name'},
                {data: 'mobile_no', name: 'mobile_no'},
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
                '<td><textarea name="addmore[' + i + '][description]" class="form-control" style="border-radius: 0px;border-color: #80808061;"></textarea></td>' +
                '<td><input type="text" name="addmore[' + i + '][qty]" class="form-control" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></td>' +
                '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove" style="border-radius: 0px !important;"><i class="fa fa-trash"></i> Remove</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
    if ($("#gatepass_add_form").length > 0) {
        $("#gatepass_add_form").validate({
            rules: {
                date: {required: true,},
                receiver_name: {required: true,},
                address: {required: true,},
                mobile_no: {required: true,},
            },
            messages: {
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
                $('#store').html('Sending..');
                $.ajax({
                    url: 'gatepass_store',
                    type: "POST",
                    data: $('#gatepass_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#gatepass_add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Gatepass Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#gatepass_table').DataTable().ajax.reload();
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
    $('body').on('click', '#delete_gatepass', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this Branch?")) {
            $.ajax({
                type: "get",
                url: "delete_gatepass/" + id,
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
</script>

</body>
</html>








