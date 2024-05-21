<div class="page-content">
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome to Visa Software (Visa Section Panel) </h4>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Student List</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="admission_student_table" style="border:1px solid gray;">
                                    <thead style="background-color:#194d83; color:white;">
                                    <tr>
                                        <th style="width:5% !important;">#</th>
                                        <th style="width:10% !important;"  class="text-center">Action</th>
                                        <th style="width:10% !important;"  class="text-center">Chat</th>
                                        <th style="width:10% !important;"  class="text-center">Purpose</th>
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
        var assistant_student_table = $('#admission_student_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('admission_student_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'chat', name: 'chat', orderable: false, searchable: true},
                {data: 'purpose', name: 'purpose'},
                {data: 'student_id', name: 'student_id'},
                {data: 'student_name', name: 'student_name'},
                {data: 'date', name: 'date'},
                // {
                //     data: "hc_status",
                //     render: function (data) {
                //         if (data == 0)
                //             return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Pending</span>'
                //         if (data == 1)
                //             return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Job Done</span>'
                //     }
                // },
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
</script>

