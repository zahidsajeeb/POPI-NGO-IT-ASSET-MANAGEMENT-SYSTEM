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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Project Item Distribution</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-group-control card-group-control-right">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h6 class="card-title">
                                        <a class="text-body collapsed" data-toggle="collapse" href="#available_item">
                                            <i class="icon-help mr-2 text-secondary"></i> Available Item For Distribution
                                        </a>
                                    </h6>
                                </div>
                                <div id="available_item" class="collapse">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <h4>Available Item Lists</h4>
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="available_item_table" style="border:1px solid; text-align:center;width:100% !important;">
                                                    <thead style="background:#194d83;color:white; text-align:center;">
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Action</th>
                                                        <th class="text-center">Asset Code</th>
                                                        <th class="text-center">Item Name</th>
                                                        <th class="text-center">Available Qty (PCS)</th>
                                                        <th class="text-center">Description</th>
                                                        <th class="text-center">Brand Name</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($available_items as $key=>$row)
                                                        @php
                                                            error_reporting(0);
                                                            $available =  DB::table('tbl_item')
                                                                                ->select('b_qty')
                                                                                ->where('id','=',$row->id)
                                                                                ->first();
                                                        @endphp
                                                        <tr>
                                                            <td>{{++$key}}</td>
                                                            <td>
                                                                <a href="{{url('project_distribution/distribution', $row->id)}}" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Distribution</a>
                                                            </td>
                                                            <td>{{$row->asset_code}}</td>
                                                            <td>{{$row->item_name}}</td>
                                                            <td>{{$available->b_qty}}</td>
                                                            <td>{{$row->item_desc}}</td>
                                                            <td>{{$row->brand_name}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="card-group-control card-group-control-right">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h3 class="card-title" style="font-weight:bold;">Project Distribution Lists</h3>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="project_distribution_table" style="border:1px solid; text-align:center;width:100% !important;">
                                                <thead style="background:#194d83;color:white; text-align:center;">
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Action</th>
                                                    <th class="text-center">Asset Code</th>
                                                    <th class="text-center">Project Name</th>
                                                    <th class="text-center">Item Name</th>
                                                    <th class="text-center">Brand Name</th>
                                                    <th class="text-center">Distribution Qty</th>
                                                    <th class="text-center">Distribution Date</th>
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
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('#available_item_table').DataTable();
    } );
    var SITEURL = '{{URL::to('')}}';
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#project_distribution_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('project_distribution_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'asset_code', name: 'asset_code'},
                {data: 'project_name', name: 'project_name'},
                {data: 'item_name', name: 'item_name'},
                {data: 'brand_name', name: 'brand_name'},
                {data: 'distribution_qty', name: 'distribution_qty'},
                {data: 'distribution_date', name: 'distribution_date'},
            ]
        });
    });
    //(************* Brand (Add/Edit/Delete) Section ***************)
    if ($("#distribution_project_add_form").length > 0) {
        $("#distribution_project_add_form").validate({
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
                    url: 'project_distribution_store',
                    type: "POST",
                    data: $('#distribution_project_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#distribution_project_add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Item Distribution Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#project_distribution_table').DataTable().ajax.reload();
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
        if (confirm("Do you really want to delete distribution?")) {
            $.ajax({
                type: "get",
                url: "project_distribution/delete/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Branch Distribution Delete Successfully !!!',
                        showConfirmButton: true,
                        timer: 2500
                    });
                    $('#project_distribution_table').DataTable().ajax.reload();
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
