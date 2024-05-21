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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Toner Purchase Request</h4>
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
                                <h5 class="card-title">Toner Purchase Request Form</h5>
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
                                                <label style="font-weight:bold;">Requester Name:</label> <br>
                                                <input type="text" name="requester_name" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            </div>
                                            <div class="col-md-4" style="margin-bottom:10px;">
                                                <label style="font-weight:bold;">Designation:</label> <br>
                                                <input type="text" name="designation" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            </div>

                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Region Name:</label> <br>
                                            <select name="region_name" class="form-control region_name required" id="region_name" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                <option value="">-Select-</option>
                                                @foreach($region_list as $row)
                                                    <option value="{{$row->id}}">{{$row->region_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Zone Name:</label> <br>
                                            <select name="zone_name" id="zone_name" class="form-control zone_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                        </div>
                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Branch Name:</label> <br>
                                            <select name="branch_name" id="branch_name" class="form-control branch_name required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                        </div>


                                            <div class="col-md-4" style="margin-bottom:10px;">
                                                <label style="font-weight:bold;">Printer/Toner Model:</label> <br>
                                                <input type="text" name="item_model" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                            </div>
                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Request Date:</label> <br>
                                            <input type="date" name="request_date" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Required Date:</label> <br>
                                            <input type="date" name="required_date" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Quantity:</label> <br>
                                            <input type="text" name="qty" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-4" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Price:</label> <br>
                                            <input type="text" name="price" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        </div>
                                        <div class="col-md-8" style="margin-bottom:10px;">
                                            <label style="font-weight:bold;">Price In Word:</label> <br>
                                            <input type="text" name="price_word" class="form-control required" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
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
                                <h5 class="card-title">Toner Purchase Lists</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="purchase_table" style="border:1px solid; text-align:center;">
                                        <thead style="background:#194d83;color:white; text-align:center;">
                                        <tr>
                                            <th class="text-center">Action</th>
                                            <th class="text-center">Requester Name</th>
                                            <th class="text-center">Designation</th>
                                            <th class="text-center">Branch Name</th>
                                            <th class="text-center">Region Name</th>
                                            <th class="text-center">Zone Name</th>
                                            <th class="text-center">Item Model</th>
                                            <th class="text-center">Request Date</th>
                                            <th class="text-center">Required Date</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-center">Price</th>
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
    $('#zone_name').select2({
        placeholder: "Search Zone Name . .",
        width: '100%'
    });
    $('#branch_name').select2({
        placeholder: "Search Branch Name . .",
        width: '100%'
    });
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
            ajax: "{{ url('toner_purchase_list') }}",
            columns: [
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'requester_name', name: 'requester_name'},
                {data: 'designation', name: 'designation'},
                {data: 'branch_name', name: 'branch_name'},
                {data: 'region_name', name: 'region_name'},
                {data: 'zone_name', name: 'zone_name'},
                {data: 'item_model', name: 'item_model'},
                {data: 'request_date', name: 'request_date'},
                {data: 'required_date', name: 'required_date'},
                {data: 'qty', name: 'qty'},
                {data: 'price', name: 'price'},
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
                requester_name: {required: true,},
                designation: {required: true,},
                branch_name: {required: true,},
                region_name: {required: true,},
                item_model: {required: true,},
                request_date: {required: true,},
                required_date: {required: true,},
                qty: {required: true,},
                price: {required: true,},
                price_word: {required: true,},
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
                $('#store').html('Sending..');
                $.ajax({
                    url: 'toner_purchase_store',
                    type: "POST",
                    data: $('#add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Toner Purchase Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#purchase_table').DataTable().ajax.reload();
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
    $('body').on('click', '#delete_toner', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this Branch?")) {
            $.ajax({
                type: "get",
                url: "toner_purchase_delete/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Toner Purchase Request Delete Successfully !!!',
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









