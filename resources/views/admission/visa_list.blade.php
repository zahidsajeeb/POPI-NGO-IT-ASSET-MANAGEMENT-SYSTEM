<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <style>
        .card{
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }
    </style>
</head>
<body>
@include('admin.include.navbar')
@if(Auth::user()->role==='Admin')
    <div class="page-content">
        @include('admin.include.sidebar')
        <div class="content-wrapper">
            <div class="content-inner">
                <div class="page-header page-header-light">
                    <div class="page-header-content header-elements-lg-inline">
                        <div class="page-title d-flex">
                            <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Visa Student List</h4>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title" style="font-weight:bold;text-align:center;">Visa Student List</h5>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="admin_visa_table" style="border:1px solid gray;">
                                            <thead style="background-color:#194d83; color:white;">
                                            <tr>
                                                <th>#</th>
                                                <th class="text-center">Action</th>
                                                <th class="text-center">Chat</th>
                                                <th class="text-center">Student ID</th>
                                                <th class="text-center">Student Name</th>
                                                <th class="text-center">Purpose</th>
                                                <th class="text-center">Payment Step</th>
                                                <th class="text-center">Payment Status</th>
                                                <th class="text-center">Counselor Section Approved</th>
                                                <th class="text-center">Admission Section Approved</th>
                                                <th class="text-center">Visa Section Approved</th>
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
                @include('admin.include.footer')
                <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
                <script>
                    var SITEURL = '{{URL::to('')}}';
                    $(function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var immigration_table = $('#admin_visa_table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ url('admin_visa_student_list') }}",
                            columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'action', name: 'action', orderable: false, searchable: true},
                                {data: 'chat', name: 'chat', orderable: false, searchable: true},
                                {data: 'student_id', name: 'student_id'},
                                {data: 'student_name', name: 'student_name'},
                                {data: 'purpose', name: 'purpose'},
                                {data: 'payment_step',name: 'payment_step'},
                                {
                                    data: "payment_status",
                                    render: function (data) {
                                        if (data == 0)
                                            return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Processing</span>'
                                        if (data == 1)
                                            return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                    }
                                },
                                {
                                    data: "cc_status",
                                    render: function (data) {
                                        if (data == 0)
                                            return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Pending</span>'
                                        if (data == 1)
                                            return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                    }
                                },
                                {
                                    data: "as_status",
                                    render: function (data) {
                                        if (data == 0)
                                            return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Pending</span>'
                                        if (data == 1)
                                            return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                    }
                                },
                                {
                                    data: "vs_status",
                                    render: function (data) {
                                        if (data == 0)
                                            return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Pending</span>'
                                        if (data == 1)
                                            return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                    }
                                },
                            ]
                        });
                    });
                </script>
            </div>
        </div>
    </div>
@endif
@if(Auth::user()->role==='Counselor')
    <div class="page-content">
        @include('admin.include.sidebar')
        <div class="content-wrapper">
            <div class="content-inner">
                <div class="page-header page-header-light">
                    <div class="page-header-content header-elements-lg-inline">
                        <div class="page-title d-flex">
                            <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Visa Student List</h4>
                        </div>
                        <div class="navbar-right">
                            <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back To Previous Page</a>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title" style="font-weight:bold;text-align:center;">Visa Student List</h5>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="counselor_visa_table" style="border:1px solid gray;">
                                            <thead style="background-color:#194d83; color:white;">
                                            <tr>
                                                <th>#</th>
                                                <th class="text-center">Action</th>
                                                <th class="text-center">Chat</th>
                                                <th class="text-center">Student ID</th>
                                                <th class="text-center">Student Name</th>
                                                <th class="text-center">Purpose</th>
                                                <th class="text-center">Payment Step</th>
                                                <th class="text-center">Payment Status</th>
                                                <th class="text-center">Counselor Section Approved</th>
                                                <th class="text-center">Admission Section Approved</th>
                                                <th class="text-center">Visa Section Approved</th>
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
                @include('admin.include.footer')
                <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
                <script>
                    var SITEURL = '{{URL::to('')}}';
                    $(function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var immigration_table = $('#counselor_visa_table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ url('counselor_visa_student_list') }}",
                            columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'action', name: 'action', orderable: false, searchable: true},
                                {data: 'chat', name: 'chat', orderable: false, searchable: true},
                                {data: 'student_id', name: 'student_id'},
                                {data: 'student_name', name: 'student_name'},
                                {data: 'purpose', name: 'purpose'},
                                {data: 'payment_step',name: 'payment_step'},
                                {
                                    data: "payment_status",
                                    render: function (data) {
                                        if (data == 0)
                                            return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Processing</span>'
                                        if (data == 1)
                                            return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                    }
                                },
                                {
                                    data: "cc_status",
                                    render: function (data) {
                                        if (data == 0)
                                            return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Pending</span>'
                                        if (data == 1)
                                            return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                    }
                                },
                                {
                                    data: "as_status",
                                    render: function (data) {
                                        if (data == 0)
                                            return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Pending</span>'
                                        if (data == 1)
                                            return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                    }
                                },
                                {
                                    data: "vs_status",
                                    render: function (data) {
                                        if (data == 0)
                                            return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Pending</span>'
                                        if (data == 1)
                                            return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                    }
                                },
                            ]
                        });
                    });
                </script>
            </div>
        </div>
    </div>
@endif
</body>
</html>




