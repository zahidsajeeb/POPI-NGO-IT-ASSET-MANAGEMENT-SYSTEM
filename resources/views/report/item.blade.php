<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
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
        button{
            border-radius:0px !important;
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Item Report12</h4>
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
                                <div class="card-body">
                                    <div class="row mt-5">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="item_table" style="border:1px solid; text-align:center;width:100% !important;">
                                                    <thead style="background:#194d83;color:white; text-align:center;">
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Action</th>
                                                        <th class="text-center">Asset Code</th>
                                                        <th class="text-center">Serial No</th>
                                                        <th class="text-center">Item Name</th>
                                                        <th class="text-center">Status</th>
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
            </div>
            @include('admin.include.footer')
            <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
        </div>
    </div>
</div>
<script>
    var table = $('#item_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('item_list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'action', name: 'action', orderable: false, searchable: true},
            {data: 'asset_code', name: 'asset_code'},
            {data: 'serial_no', name: 'serial_no'},
            {data: 'item_name', name: 'item_name'},
            {data: 'status', name: 'status', orderable: false, searchable: true},
        ]
    });
</script>
</body>
</html>









