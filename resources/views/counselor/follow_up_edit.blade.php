<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Student Follow Up Edit</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('home')}}" class="btn btn-lg btn-danger" style="border-radius:0px;"><i class="fa fa-backward"></i> Back to Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Follow Up Edit</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('follow_up_update')}}" method="POST" id="form" >
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" class="form-control required" name="id" value="{{$data->id}}" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-weight:bold;">Student Name:</label>
                                                <input type="text" class="form-control" name="student_name" value="{{$data->student_name}}" style="border-radius:0px;" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-weight:bold;">Student ID:</label>
                                                <input type="text" class="form-control" name="student_email" value="{{$data->student_id}}" style="border-radius:0px;" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-weight:bold;">Note:</label>
                                                <textarea class="form-control" name="note" style="border-radius:0px;">{{$data->note}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-weight:bold;">Commitment:</label>
                                                <textarea class="form-control" name="commitment" required style="border-radius:0px;">{{$data->commitment}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-weight:bold;">Next Appointment Date :</label>
                                                <input type="date" name="next_app_date" class="form-control" value="{{$data->next_app_date}}" style="border-radius:0px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-lg btn-primary" style="border-radius:0px;"><i class="fa fa-check"></i> Update </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
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
                    $('#student-entry-table thead th').each(function (i) {
                        if (i != 0 && i != 4 && i != 6 && i != 7) {
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
                            {data: 'student_id', name: 'student_id'},
                            {data: 'student_name', name: 'student_name'},
                            {data: 'student_email', name: 'student_email'},
                            {data: 'dob', name: 'dob'},
                            {data: 'phone_no', name: 'phone_no'},
                            {data: 'created_at', name: 'created_at'},
                            {data: 'action', name: 'action', orderable: false, searchable: true},
                        ]
                    });
                    $("#student-entry-table thead").on("keyup", "input", function () {
                        name_table.column($(this).parent().index())
                            .search(this.value)
                            .draw();
                    });
                });
                //(************* FrontDesk (Edit/Delete) Section ***************)
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
                            if (data.image) {
                                $('#modal-preview').attr('src', SITEURL + '/upload/' + data.image);
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


