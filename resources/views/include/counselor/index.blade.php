<div class="page-content">
    <div class="content-wrapper">
            <div class="content-inner">
                <div class="page-header page-header-light">
                    <div class="page-header-content header-elements-lg-inline">
                        <div class="page-title d-flex">
                            <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome to Visa Software (Counselor Panel) </h4>
                        </div>
                        <a href="{{url('frontdesk_student_list')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back To Previous Page</a>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="font-weight:bold;text-align:center;">Pending Student List</h3>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered" id="student_pending_table" style="border:1px solid;">
                                        <thead style="background:#194d83;color:white;">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Action</th>
                                            <th class="text-center">Student ID</th>
                                            <th class="text-center">Student Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Purpose</th>
                                        </tr>
                                        </thead>
                                        <tbody style="text-align:center;">
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
<div id="modal_company_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ url('counselor_accept_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-indigo text-white">
                    <h6 class="modal-title">Accept This Student ?</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin-top:10px;">
                        <div class="col-md-4">
                            <span style="font-weight:bold;">Action Type:</span>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" name="admission_type" style="border-radius:0px;">
                                <option selected disabled>-Select-</option>
                                <option value="follow_up">Follow Up</option>
                                <option value="admission">Accounts</option>
                            </select>
                        </div>
                    </div>
                    <div class="box follow_up" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-4">
                                <span style="font-weight:bold;">Note:</span>
                            </div>
                            <div class="col-md-8">
                                <textarea name="note" class="form-control" style="height:80px; border-radius:0px;"></textarea>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-md-4">
                                <span style="font-weight:bold;">Student Commitment:</span>
                            </div>
                            <div class="col-md-8">
                                <textarea name="commitment" class="form-control" style="height:80px; border-radius:0px;"></textarea>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-md-4">
                                <span style="font-weight:bold;">Next Appointment Date:</span>
                            </div>
                            <div class="col-md-8">
                                <input type="date" name="next_app_date" class="form-control" style="border-radius:0px;">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="student_id" id="student_id">
                    <input type="hidden" name="email" id="student_email">
                    <input type="hidden" name="name" id="student_name">
                    <input type="hidden" name="counselor_name" id="counselor_name">
                </div>
                <hr>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-lg btn-success" style="border-radius:0px;"><i class="fa fa-check"></i> Submit</button>
                    <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px;"><i class="fa fa-close"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function () {
        var SITEURL = '{{URL::to('')}}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var name_table = $('#student_pending_table').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ url('pending_student_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'student_id', name: 'student_id'},
                {data: 'student_name', name: 'student_name'},
                {data: 'student_email', name: 'student_email'},
                {data: 'purpose', name: 'purpose'},
            ]
        });
        $('body').on('click', '#accept_student', function () {
            var student_id = $(this).data('id');
            $.ajax({
                type: "get",
                url: "counselor_accept/" + student_id,
                success: function (data) {
                    $('#modelHeading').html("Edit Product");
                    $('#saveBtn').val("edit-user");
                    $('#modal_company_edit').modal('show');
                    $('#id').val(data.id);
                    $('#student_id').val(data.student_id);
                    $('#student_email').val(data.student_email);
                    $('#student_name').val(data.student_name);
                    $('#counselor_name').val(data.counselor_name);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        $('body').on('click', '#delete_student', function () {
            var id = $(this).data("id");
            if (confirm("Do you really want to delete Student?")) {
                $.ajax({
                    type: "get",
                    url: "delete_student/" + id,
                    success: function (data) {
                        var oTable = $('#pending-table').dataTable();
                        oTable.fnDraw(false);
                        toastr.error("Student Deleted Successfully!!!");
                        location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
    });
    $(document).ready(function () {
        $("select").change(function () {
            $(this).find("option:selected").each(function () {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".box").hide();
                }
            });
        }).change();
    });

</script>
