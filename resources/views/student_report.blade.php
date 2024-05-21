<?php
error_reporting(0);
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
</head>
<body>
@include('admin.include.navbar')
<div class="page-content">
    @include('admin.include.sidebar')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    @if(Auth::user()->role==='Admin')
                        <div class="page-title d-flex">
                            <h3 style="text-align:center;font-weight:bold;">Welcome To Visa Software (Admin Panel)</h3>
                        </div>
                    @endif
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Student Report List</h5>
{{--                                <button type="button" class="btn btn-info btn-xs" id="payment_report">--}}
{{--                                    <i class="fa fa-file-pdf"></i> Payment Report--}}
{{--                                </button>--}}
                                <button class="btn btn-info btn-xs" id="profile_report">
                                    <i class="fa fa-file-pdf"></i> Profile Report
                                </button>
                                <hr>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="student_report_list" style="border:1px solid;">
                                        <thead style="background:#194d83;color:white;">
                                        <tr>
                                            <th style="width:7% !important;">Sl No</th>
                                            <th style="width:12% !important;">Token</th>
                                            <th style="width:15% !important;">Student Name</th>
                                            <th style="width:18% !important;">Counselor Counter No</th>
                                            <th style="width:18% !important;">Counselor Approved</th>
                                            <th style="width:18% !important;">Head Counselor Approved</th>
                                            <th style="width:18% !important;">Payment Status</th>
{{--                                            <th style="width:0% !important;" class="text-center">Action</th>--}}
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
                {{-- **************************** Payment Modal Start ****************************************************--}}
                <div id="modal_payment_report" class="modal fade" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{url('payment_report_pdf')}}" method="GET">
                                @csrf
                                <div class="modal-header bg-indigo text-white">
                                    <h6 class="modal-title">Profile Report Form</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Payment Status</label>
                                            <select class="form-control" name="payment_status" required>
                                                <option disabled selected>-Select-</option>
                                                <option value="0">Pending</option>
                                                <option value="1">Complete</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Start Date:</label>
                                            <input type="text" class="form-control date" name="start_date" autocomplete="off" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label>End Date:</label>
                                            <input type="text" class="form-control date" name="end_date" autocomplete="off" required>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-success btn-sm" style="margin-top:31px;"><i class="fa fa-search"></i> Search </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close Report
                                   </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- **************************** Profile Modal Start ****************************************************--}}
                <div id="modal_profile_report" class="modal fade" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{url('profile_report_pdf')}}" method="GET">
                                @csrf
                                <div class="modal-header bg-indigo text-white">
                                    <h6 class="modal-title">Profile Report Form</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Profile Status</label>
                                            <select class="form-control" name="profile_status" required>
                                                <option disabled selected>-Select-</option>
                                                <option value="0">Pending</option>
                                                <option value="1">Complete</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Start Date:</label>
                                            <input type="text" class="form-control date" name="start_date" autocomplete="off" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label>End Date:</label>
                                            <input type="text" class="form-control date" name="end_date" autocomplete="off" required>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-success btn-sm" style="margin-top:31px;"><i class="fa fa-search"></i> Search </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close Report
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @include('admin.include.footer')
                <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
                <script>
                    $(function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var SITEURL = '{{URL::to('')}}';
                        var admin_student_table = $('#student_report_list').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ url('student_report_list') }}",
                            columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'student_id', name: 'student_id'},
                                {data: 'student_name', name: 'student_name'},
                                {data: 'counselor_name', name: 'counselor_name'},
                                {
                                    data: "cc_status",
                                    render: function (data) {
                                        if (data == 1)
                                            return 'Approved'
                                        if (data == 0)
                                            return 'Not Approved'
                                    }
                                },
                                {
                                    data: "hc_status",
                                    render: function (data) {
                                        if (data == 1)
                                            return 'Approved'
                                        if (data == 0)
                                            return 'Not Approved'
                                    }
                                },
                                {
                                    data: "payment_status",
                                    render: function (data) {
                                        if (data == 1)
                                            return 'Complete'
                                        if (data == 0)
                                            return 'Peocessing'
                                    }
                                },
                                // {data: 'action', name: 'action', orderable: false, searchable: true},
                            ]
                        });
                    });
                    $(document).on("click", "#payment_report", function () {
                        $("#modal_payment_report").modal("toggle");
                    });
                    $(document).on("click", "#profile_report", function () {
                        $("#modal_profile_report").modal("toggle");
                    });
                    $(function () {
                        $(".date").datepicker({
                            dateFormat: 'yy-mm-dd',
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</body>
</html>
