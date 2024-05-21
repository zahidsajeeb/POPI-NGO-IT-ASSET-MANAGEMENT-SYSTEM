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
<div class="page-content">
    @include('admin.include.sidebar')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Student List</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                @if(Auth::user()->role==='Counselor')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title" style="font-weight:bold;text-align:center;">Student List</h5>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered" id="counselor_student_table" style="border:1px solid;">
                                        <thead style="background:#194d83; color:white;">
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
                @endif
                @if(Auth::user()->role==='Assistant Counselor' || Auth::user()->role==='Admin')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title" style="font-weight:bold;text-align:center;">Student List</h5>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered" id="admission_student_table"
                                           style="border:1px solid gray;">
                                        <thead style="background-color:#194d83; color:white;">
                                        <tr>
                                            <th style="width:5% !important;">#</th>
                                            <th style="width:10% !important;"  class="text-center">Action</th>
                                            <th style="width:10% !important;"  class="text-center">Chat</th>
                                            <th style="width:12% !important;"  class="text-center">Student ID</th>
                                            <th style="width:20% !important;"  class="text-center">Student Name</th>
                                            <th style="width:12% !important;"  class="text-center">Entry Date</th>
                                            <th style="width:10% !important;"  class="text-center">Payment Status</th>
                                            <th style="width:10% !important;"  class="text-center">Payment Step</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div id="modal_company_edit" class="modal fade" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{ url('counselor_accept_store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header bg-indigo text-white">
                                    <h6 class="modal-title">Confirmation Form</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <h2 style="text-align:center;">Accept This Student ? </h2>
                                    <input type="text" name="id" id="id">
                                    <input type="text" name="token" id="token">
                                    <input type="text" name="email" id="student_email">
                                    <input type="text" name="name" id="student_name">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square"></i>
                                        Accept
                                    </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                            class="fa fa-close"></i> Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
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
                    var admin_student_table = $('#admin-student-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ url('all_student_list') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            {data: 'student_id', name: 'student_id'},
                            {data: 'student_name', name: 'student_name'},
                            {data: 'student_email', name: 'student_email'},
                            {data: 'counselor_name', name: 'counselor_name'},
                            {data: 'created_at', name: 'created_at'},
                            {data: 'action', name: 'action', orderable: false, searchable: true},
                        ]
                    });
                    var counselor_student_table = $('#counselor_student_table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ url('student_list') }}",
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
                    var assistant_student_table = $('#admission_student_table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ url('admission_student_list') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            {data: 'action', name: 'action', orderable: false, searchable: true},
                            {data: 'chat', name: 'chat', orderable: false, searchable: true},
                            {data: 'student_id', name: 'student_id'},
                            {data: 'student_name', name: 'student_name'},
                            {data: 'date', name: 'date'},
                            {
                                data: "payment_status",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Processing</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {data: 'payment_step',name: 'payment_step'},
                        ]
                    });
                });
                //(************* FrontDesk (Edit/Delete) Section ***************)
                $('body').on('click', '#edit_company', function () {
                    var student_id = $(this).data('id');
                    $.ajax({
                        type: "get",
                        url: "counselor_accept/" + student_id,
                        success: function (data) {
                            $('#modelHeading').html("Edit Product");
                            $('#saveBtn').val("edit-user");
                            $('#modal_company_edit').modal('show');
                            $('#id').val(data.id);
                            $('#token').val(data.token);
                            $('#student_email').val(data.student_email);
                            $('#student_name').val(data.student_name);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                });
                $('body').on('click', '#delete_company', function () {
                    var id = $(this).data("id");
                    if (confirm("Do you really want to delete this item?")) {
                        $.ajax({
                            type: "get",
                            url: "company_delete/" + id,
                            success: function (data) {
                                var oTable = $('#company-table').dataTable();
                                oTable.fnDraw(false);
                                toastr.error("Company Deleted Successfully!!!");
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                });

                //(+++++++++ Toaster Message ++++++++++++++)
                @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch (type) {
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
                @endif
            </script>
            <!-- /footer -->
        </div>
        <!-- /inner content -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->
</body>
</html>


