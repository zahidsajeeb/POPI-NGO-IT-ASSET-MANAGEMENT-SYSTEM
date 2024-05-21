<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <style>
        input{
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Re-Counseling</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('frontdesk_student_list')}}" class="btn btn-lg btn-danger" style="border-radius:0px;"><i class="fa fa-backward"></i> Back to Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6" style="text-align:center;">
                                        <img src="{{url('upload')}}/{{$data->student_img}}" style="height:250px;">
                                    </div>
                                    <div class="col-md-6"><h1 class="card-title" style="font-weight:bold;margin-top:75px;font-size:32px;">RE-COUNSELING FORM</h1></div>
                                </div>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('recounseling_store')}}" method="POST" id="form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-weight:bold;">Student ID:</label>
                                                <input type="text" class="form-control required" name="student_id" value="{{$data->student_id}}" readonly style="background-color:grey; color:white;">
                                                <input type="hidden" class="form-control required" name="student_img" value="{{$data->student_img}}" readonly>
                                                <input type="hidden" class="form-control required" name="id" value="{{$id}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-weight:bold;">Student Name:</label>
                                                <input type="text" class="form-control" name="student_name" value="{{$data->student_name}}" readonly style="background-color:grey; color:white;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-weight:bold;">Student Email:</label>
                                                <input type="email" class="form-control" name="student_email" value="{{$data->student_email}}" readonly style="background-color:grey; color:white;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-weight:bold;">Date of Birth:</label>
                                                <input type="text" class="form-control" name="dob" value="{{$data->dob}}" readonly style="background-color:grey; color:white;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-weight:bold;">Phone No:</label>
                                                <input type="text" class="form-control required" name="phone_no" value="{{$data->phone_no}}" readonly style="background-color:grey; color:white;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-weight:bold;">Counselor Choose :</label>
                                                <select class="custom-select required" name="counselor_name" style="border-radius:0px;border-color: #604c4c69 !important;">
                                                    <option value="{{$data->counter_no}}">{{$data->counselor_name}}</option>
                                                    @foreach($counselor as $row):
                                                    <option value="{{$row->counter_no}}">
                                                        Counter-{{$row->counter_no.'('.$row->counselor_name.')'}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="font-weight:bold;">Purpose :</label>
                                                <select class="custom-select required" name="purpose" style="border-radius:0px;border-color: #604c4c69 !important;">
                                                    <option value="{{$data->purpose}}">{{$data->purpose}}</option>
                                                    <option value="Student Visa">Student Visa</option>
                                                    <option value="Immigration">Immigration</option>
                                                    <option value="Medi Tourism">Medi Tourism</option>
                                                    <option value="Job Search">Job Search</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-lg btn-primary" style="border-radius:0px;"><i class="icon-checkbox-checked"></i> Submit form </button>
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
                    $('#student-entry-table thead th').each(function(i) {
                        if (i != 0  && i != 4 &&  i != 6 && i != 7) {
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
        </div>
    </div>
</div>
</body>
</html>

