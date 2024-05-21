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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Front Desk (Student List)</h4>
                    </div>
                    <a href="{{url('home')}}" class="btn btn-success navbar-right" style="border-radius:0px;"><i class="fa fa-plus"></i> Add Student</a>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Front Desk (Student List)</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="student-entry-table" style="border:1px solid;">
                                    <thead style="background-color:#194d83;color:white;">
                                    <tr>
                                        <th style="width:5%">#</th>
                                        <th style="width:10%" class="text-center">Action</th>
                                        <th style="width:10%" class="text-center">Image</th>
                                        <th style="width:15%" class="text-center">Counselor Name</th>
                                        <th style="width:10%" class="text-center">Counseling</th>
                                        <th style="width:10%">Student ID</th>
                                        <th style="width:15%">Student Name</th>
                                        <th style="width:10%">Email</th>
                                        <th style="width:15%">Phone No</th>
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
                    $('#student-entry-table thead th').each(function(i) {
                        if (i != 0  && i != 1 &&  i != 2 && i != 3 && i != 4 && i != 9) {
                            var title = $(this).text();
                            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
                        }
                    });
                    var name_table = $('#student-entry-table').DataTable({
                        processing: true,
                        serverSide: false,
                        searchable: true,
                        ajax: "{{ url('frontdesk_list') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            {data: 'action', name: 'action', orderable: false, searchable: true},
                            {data: 'student_img', name: 'student_img'},
                            {data: 'counselor_name', name: 'counselor_name'},
                            {
                                data: "cc_status",
                                render: function (data) {
                                    if (data == 1)
                                        return '<span class="badge badge-success">Done</span>'
                                    if (data == 0)
                                        return '<span class="badge badge-danger">Pending</span>'
                                }
                            },
                            {data: 'student_id', name: 'student_id'},
                            {data: 'student_name', name: 'student_name'},
                            {data: 'student_email', name: 'student_email'},
                            {data: 'phone_no', name: 'phone_no'},
                        ]
                    });
                    $("#student-entry-table thead").on("keyup", "input", function () {
                        name_table.column($(this).parent().index())
                            .search(this.value)
                            .draw();
                    });
                });
                //(===================FrontDesk (Edit/Delete) Section==================)
                $('body').on('click', '#edit_company', function () {
                    var company_id = $(this).data('id');
                    $.ajax({
                        type: "get",
                        url: "company_edit/" + company_id,
                        success: function (data) {
                            $('#modelHeading').html("Edit Product");
                            $('#saveBtn').val("edit-user");
                            $('#modal_company_edit').modal('show');
                            $('#id').val(data.id);
                            $('#company_name').val(data.company_name);
                            $('#company_address').val(data.company_address);
                            if(data.image){
                                $('#modal-preview').attr('src', SITEURL +'/upload/'+data.image);
                            }
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

                //(===============Toaster Message===============)
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
        </div>
    </div>
</div>
</body>
</html>

