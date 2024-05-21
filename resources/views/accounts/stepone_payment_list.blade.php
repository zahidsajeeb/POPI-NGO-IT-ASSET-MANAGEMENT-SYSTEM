<?php
error_reporting(0);
?>
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
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Step One Payment List</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Step One Payment List</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                @if(Auth::user()->role === 'Accountant')
                                    <table id="example" class="table table-bordered" style="border:1px solid;">
                                        <thead style="background-color:#194d83; color:white;">
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Student Name</th>
                                            <th>Student ID</th>
                                            <th class="text-center">Payment</th>
                                            <th style="text-align:center;">Payment Purpose</th>
                                            <th style="text-align:center;">Payment Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $key=>$result)
                                            <?php
                                            $payment =DB::table('tbl_student_payment')
                                                ->select('payment_purpose')
                                                ->where('payment_purpose','Admission')
                                                ->where('student_id',$result->student_id)
                                                ->first();
                                            ?>
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$result->student_name}}</td>
                                                <td>{{$result->student_id}}</td>
                                                <td style="text-align:center;"><a href="{{url('balance_check_details', $result->student_id)}}" class="btn btn-success btn-xs" style="border-radius:0px;"><i class="fa fa-folder-open"></i> Pay Now</a></td>
                                                <td style="text-align:center;">
                                                    Step 1
                                                </td>
                                                <td style="text-align:center;">
                                                    @if(isset($payment))<span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                    @else <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-close"></i> Not Done</span>  @endif
                                                </td>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.include.footer')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
            <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
            <script>
                $(document).ready(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var accounts_table = $('#account-student-table').DataTable({
                        processing: true,
                        serverSide: false,
                        ajax: "{{ url('payment_pending_student_list') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            {data: 'student_id', name: 'student_id'},
                            {data: 'student_name', name: 'student_name'},
                            {data: 'action', name: 'action', orderable: false, searchable: true},
                        ]
                    });

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
            <script>
                $(document).ready(function () {
                    $(function () {
                        $('.date').datepicker({
                            dateFormat: "yy/mm/dd",
                        });
                    });
                })
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
            <script type="text/javascript">
                $(function () {
                    $(".date").datepicker({
                        dateFormat: 'yy-mm-dd',
                    });
                });

                function paymentStatus() {
                    confirm("Are you sure this student payment is completely done !!!!!!!!!!!!!");
                }

                $(document).ready(function () {
                    $('.balance_table').DataTable({
                        createdRow: function(row) {
                            $(row).find('td table')
                                .DataTable({
                                    columns: columns,
                                    dom: 'tf'
                                })
                        }
                    });
                    const columns = [
                        { title: '' },
                    ]
                    let table = $('#example').DataTable({
                        createdRow: function(row) {
                            $(row).find('td table')
                                .DataTable({
                                    columns: columns,
                                    dom: 'tf', ordering: false,

                                })
                        }
                    })
                });
            </script>
        </div>
    </div>
</div>
</body>
</html>

<script>export default {
        components: {App}
    }
</script>

