<div class="row">
    <div class="col-md-12">
        <h1 style="text-align:center;">Welcome To Visa Software (Head Counselor Panel)</h1>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title" style="font-weight:bold;text-align:center;">All Student List</h5>
                <hr>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="admin-student-table" style="border:1px solid;">
                        <thead style="background:#194d83;color:white;">
                        <tr>
                            <th style="width:5% !important;">#</th>
                            <th style="width:7% !important;" class="text-center">Action</th>
                            <th style="width:10% !important;">Token</th>
                            <th style="width:15% !important;">Student Name</th>
                            <th style="width:15% !important;">Counselor Name</th>
                            <th style="width:15% !important;">Assistant Counselor Approved</th>
                            <th style="width:15% !important;">Head Counselor Check</th>
                            <th style="width:8% !important;">Payment Status</th>
                            <th style="width:10% !important;">Payment Step</th>
                            <div id="modal_approval" class="modal fade" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{url('counselor_check_profile')}}" method="GET">
                                            @csrf
                                            <div class="modal-header bg-indigo text-white">
                                                <h6 class="modal-title">Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <h2 style="text-align:center;">All Information of this student is Correct ? </h2>
                                                <input type="text" name="student_id" id="student_id" value="{{$profile_data->student_id}}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-check-square"></i> Accept</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
<script>
    $(document).ready(function () {
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
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'student_id', name: 'student_id'},
                {data: 'student_name', name: 'student_name'},
                {data: 'counselor_name', name: 'counselor_name'},
                {
                    data: "cc_status",
                    render: function (data) {
                        if (data == 1)
                            return '<span style="background:green;color:white; padding:5px;"><i class="fa fa-check"></i> Complete</span>'
                        if (data == 0)
                            return '<span style="background:red;color:white; padding:5px;"><i class="fa fa-close"></i> Pending</span>'
                    }
                },
                {
                    data: "hc_status",
                    render: function (data) {
                        if (data == 1)
                            return '<span style="background:green;color:white; padding:5px;"><i class="fa fa-check"></i> Job Done</span>'
                        if (data == 0)
                            return '<span style="background:red;color:white; padding:5px;"><i class="fa fa-close"></i> Pending</span>'
                    }
                },
                {
                    data: "payment_status",
                    render: function (data) {
                        if (data == 1)
                            return '<span style="background:green;color:white; padding:5px;"><i class="fa fa-check"></i> Complete</span>'
                        if (data == 0)
                            return '<span style="background:red;color:white; padding:5px;"><i class="fa fa-close"></i> Processing</span>'
                    }
                },
                {data: 'payment_step', name: 'payment_step'},
            ]
        });
    });
</script>
