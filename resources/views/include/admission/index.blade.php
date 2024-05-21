<div class="page-content">
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome to Visa Software (Admission Section Panel) </h4>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Admission Student List</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="admission_student_table" style="border:1px solid gray; text-align:center;">
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
    </div>
</div>
<script>
    var SITEURL = '{{URL::to('')}}';
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var admission_student_table = $('#admission_student_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('admission_list') }}",
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
                    data: "as_proceed",
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
