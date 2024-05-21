<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
</head>
<body>
<!-- Main navbar -->
@include('admin.include.navbar')
<!-- /main navbar -->
<!-- Page content -->
<div class="page-content">
    <!-- Main sidebar -->
@include('admin.include.sidebar')
<!-- /main sidebar -->
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Inner content -->
        <div class="content-inner">
            <!-- Page header -->
            <div class="page-header page-header-light">
{{--                <div class="page-header-content header-elements-lg-inline">--}}
{{--                    <div class="page-title d-flex">--}}
{{--                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Datatables</span>- Basic</h4>--}}
{{--                        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>--}}
{{--                    </div>--}}

{{--                    <div class="header-elements d-none">--}}
{{--                        <div class="d-flex justify-content-center">--}}
{{--                            <a href="#" class="btn btn-link btn-float text-body"><i--}}
{{--                                    class="icon-bars-alt text-primary"></i><span>Statistics</span></a>--}}
{{--                            <a href="#" class="btn btn-link btn-float text-body"><i--}}
{{--                                    class="icon-calculator text-primary"></i> <span>Invoices</span></a>--}}
{{--                            <a href="#" class="btn btn-link btn-float text-body"><i--}}
{{--                                    class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="datatable_basic.html" class="breadcrumb-item">Settings</a>
                            <span class="breadcrumb-item active">Logo</span>
                        </div>

                        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                    </div>

{{--                    <div class="header-elements d-none">--}}
{{--                        <div class="breadcrumb justify-content-center">--}}
{{--                            <a href="#" class="breadcrumb-elements-item">--}}
{{--                                <i class="icon-comment-discussion mr-2"></i>--}}
{{--                                Support--}}
{{--                            </a>--}}

{{--                            <div class="breadcrumb-elements-item dropdown p-0">--}}
{{--                                <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">--}}
{{--                                    <i class="icon-gear mr-2"></i>--}}
{{--                                    Settings--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                    <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account--}}
{{--                                        security</a>--}}
{{--                                    <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>--}}
{{--                                    <a href="#" class="dropdown-item"><i class="icon-accessibility"></i>--}}
{{--                                        Accessibility</a>--}}
{{--                                    <div class="dropdown-divider"></div>--}}
{{--                                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <!-- /page header -->
            <!-- Content area -->
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Job Lists</h5>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#modal_theme_custom"><i class="icon-plus3"></i> Add Job</button>
                    </div>
                    <table class="table table-bordered" id="company-table">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Company Name</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th>Created at</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /basic datatable -->
                <!-- Custom header color -->
                <div id="modal_theme_custom" class="modal fade" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{ url('job_store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header bg-indigo text-white">
                                    <h6 class="modal-title">Company Information Add</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <fieldset>
                                        <div class="collapse show" id="demo1">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Company Name:</label>
                                                <div class="col-lg-8">
                                                    <select class="form-control h-auto" name="company_id">
                                                        <option selected disabled>-Select-</option>
                                                        @foreach($company_list as $row)
                                                        <option value="{{$row->id}}">{{$row->company_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Job Details:</label>
                                                <div class="col-lg-8">
                                                    <textarea class="form-control h-auto summernote" name="details"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Salary:</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control h-auto" name="salary">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Job Type:</label>
                                                <div class="col-lg-8">
                                                   <select class="form-control" name="type">
                                                       <option disabled selected>--Select--</option>
                                                       <option value="Full Time">Full Time</option>
                                                       <option value="Part Time">Part Time</option>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square"></i> Save changes</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="modal_company_edit" class="modal fade" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{ url('company_update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header bg-indigo text-white">
                                    <h6 class="modal-title">Company Information Add</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <fieldset>
                                        <div class="collapse show" id="demo1">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Company Name:</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control h-auto" name="company_name" id="company_name">
                                                    <input type="text" class="form-control h-auto" name="id" id="id">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Company Address:</label>
                                                <div class="col-lg-8">
                                                    <textarea class="ckeditor form-control" name="description"></textarea>
{{--                                                    <textarea class="form-control h-auto" name="company_address" id="company_address"></textarea>--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Company Logo Preview:</label>
                                                <div class="col-lg-8">
                                                    <input type="file" class="form-control h-auto" name="image">
                                                    <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square"></i> Save changes</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /custom header color -->
            </div>
            <!-- /content area -->
            <!-- Footer -->
        @include('admin.include.footer')
        <!-- /footer -->
        </div>
        <!-- /inner content -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
    var SITEURL = '{{URL::to('')}}';
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var name_table = $('#company-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('company_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'company_name', name: 'company_name'},
                {data: 'company_address', name: 'company_address'},
                {data: 'image', name: 'image'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
            ]
        });
    });
    //(************* Company (Edit/Delete) Section ***************)
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

</script>
</body>
</html>


