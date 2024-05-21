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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Edit Item Distribution</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('branch_distribution')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-group-control card-group-control-right">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Item Distribution</h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <form action="" method="post" id="distribution_edit_form">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                                        <ul></ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <h4>Item</h4>
                                                    <hr>
                                                    <div class="col-md-12" style="margin-bottom:10px;">
                                                        <label style="font-weight:bold;">Item Name:</label> <br>
                                                        <input type="text" class="form-control" value="{{$edit_item_name->item_name}}" readonly style="background:#80808024;">
                                                        <input type="hidden" name="id" class="form-control" value="{{$data->id}}" readonly style="background:#80808024;">
                                                        <input type="hidden" class="form-control" name="item_id" value="{{$data->item_id}}" readonly style="background:#80808024;">
{{--                                                        <input type="text" class="form-control" name="item_id" value="{{$data->asset_code}}" readonly style="background:#80808024;">--}}
                                                    </div>
                                                    <div class="col-md-12" style="margin-bottom:10px;">
                                                        <label style="font-weight:bold;">Brand Name:</label> <br>
                                                        <input type="text" class="form-control" value="{{$edit_brand_name->brand_name}}" readonly style="background:#80808024;">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4>Distribution For</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                                <label style="font-weight:bold;">Region Name:</label> <br>
                                                                <select name="region_id" class="form-control" readonly style="border-radius: 0px !important; border-color: #604c4c69 !important; background:#80808024;">
                                                                    <option value="{{$edit_region_name->id}}">{{$edit_region_name->region_name}}</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                                <label style="font-weight:bold;">Zone Name:</label> <br>
                                                                <select name="zone_id" class="form-control" readonly style="border-radius: 0px !important; border-color: #604c4c69 !important; background:#80808024;">
                                                                    <option value="{{$edit_zone_name->id}}">{{$edit_zone_name->zone_name}}</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                                <label style="font-weight:bold;">Branch Name:</label> <br>
                                                                <select name="branch_id" class="form-control" readonly style="border-radius: 0px !important; border-color: #604c4c69 !important; background:#80808024;">
                                                                    <option value="{{$edit_branch_name->id}}">{{$edit_branch_name->branch_name}}</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                                <label style="font-weight:bold;">Edit Region Name:</label> <br>
                                                                <select name="edit_region_id" class="form-control region_name" id="region_name" style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                                    <option value="">-Select Region-</option>
                                                                    @foreach($region_name as $row)
                                                                        <option value="{{$row->id}}">{{$row->region_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                                <label style="font-weight:bold;">Edit Zone Name:</label> <br>
                                                                <select name="edit_zone_id" id="zone_name" class="form-control zone_name" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                            </div>
                                                            <div class="col-md-12" style="margin-bottom:10px;">
                                                                <label style="font-weight:bold;">Edit Branch Name:</label> <br>
                                                                <select name="edit_branch_id" id="branch_name" class="form-control branch_name" style="border-radius: 0px !important; border-color: #604c4c69 !important;"></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <h4>Distribution Details</h4>
                                                    <hr>
                                                    <div class="col-md-12" style="margin-bottom:10px;">
                                                        <label style="font-weight:bold;">Distribution Date:</label> <br>
                                                        <input type="date" name="distribution_date" class="form-control required" value="{{$data->distribution_date}}" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                    </div>
                                                    <div class="col-md-12" style="margin-bottom:10px;">
                                                        <label style="font-weight:bold;">Item Type:</label> <br>
                                                        <input type="text" name="item_type" class="form-control" value="{{$data->item_type}}" readonly>
                                                    </div>
                                                    <div class="col-md-12" style="margin-bottom:10px;">
                                                        <label style="font-weight:bold;">Distribution Qty:</label> <br>
                                                        @if(($total_purchase->qty)-($total_distribution->distribution_qty)==0)
                                                        <input type="text" name="distribution_qty" class="form-control required" value="{{$data->distribution_qty}}" readonly style="border-radius: 0px !important; border-color: #604c4c69 !important; background:red; color:white;">
                                                            <span><b>Total Purchase:</b> @php echo $total_purchase->qty @endphp </span> <br>
                                                            <span><b>Total Distribution:</b> @php echo $total_distribution->distribution_qty @endphp </span>
                                                        @endif
                                                        @if(($total_purchase->qty)-($total_distribution->distribution_qty)!=0)
                                                            <input type="text" name="distribution_qty" class="form-control required" value="{{$data->distribution_qty}}" style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                            <span><b>Total Purchase:</b> @php echo $total_purchase->qty @endphp </span> <br>
                                                            <span><b>Total Distribution:</b> @php echo $total_distribution->distribution_qty @endphp </span>
                                                        @endif
                                                    </div>
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
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>

<script>

    $('.region_name').select2({
        placeholder: "Search Region Name . .",
        width: '100%'
    });
    $('.zone_name').select2({
        placeholder: "Search Zone Name . .",
        width: '100%'
    });
    $('.branch_name').select2({
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
                            .id + '">' + value.branch_name + '</option>');
                    });
                }
            });
        });
    });
</script>
<script>
    var SITEURL = '{{URL::to('')}}';
    //(************* Brand (Add/Edit/Delete) Section ***************)
    if ($("#distribution_edit_form").length > 0) {
        $("#distribution_edit_form").validate({
            rules: {
                distribution_date: {
                    required: true,
                },
                item_type: {
                    required: true,
                },
            },
            messages: {
                distribution_date: {
                    required: "*** Distribution date is required ***"
                },
                item_type: {
                    required: "*** Item type is required ***"
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
                    url: 'update',
                    type: "POST",
                    data: $('#distribution_edit_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if (data['status']=='success'){
                            swal({
                                icon: 'success',
                                title: 'Item Distribution Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            })
                                .then(() => {

                                    window.location.href = "/branch_distribution";
                                })
                        }
                        if (data['status']=='error'){
                            swal({
                                icon: 'error',
                                title: 'Sorry!!! Distribution item is Greater then store item !!!',
                                showConfirmButton: true,
                                timer: 4000
                            });
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
</script>
</body>
</html>









