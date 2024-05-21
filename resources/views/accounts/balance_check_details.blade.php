<?php
error_reporting(0);
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <style>
        input {
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }

        .card {
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Payment Create</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Payment Create</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form action="{{url('balance_store')}}" method="POST">
                                    @csrf
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-md-4"><b>Student ID:</b></div>
                                        <div class="col-md-8">
                                            <input type="text" name="student_id" value="{{$data->student_id}}" class="form-control" readonly>
                                            <input type="hidden" class="form-control required" name="last_id" value="{{ $last_id->id}}">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-md-4"><b>Student Name:</b></div>
                                        <div class="col-md-8"><input type="text" name="student_name" value="{{$data->student_name}}" class="form-control" readonly></div>
                                    </div>
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-md-4"><b>Payment Purpose:</b></div>
                                        <div class="col-md-8">
                                            <select class="form-control" name="payment_purpose" style=" border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                @if($payment_purpose == '')
                                                    <option value="Admission">Admission</option>
                                                @endif
                                                @if($payment_purpose->payment_purpose=='Admission')
                                                    <option value="Step 1">Step 1</option>
                                                @endif
                                                @if($payment_purpose->payment_purpose=='Admission')
                                                    <option value="Step 1">Step 1</option>
                                                @endif
                                                @if($payment_purpose->payment_purpose=='Step 1')
                                                    <option value="Step 2">Step 2</option>
                                                @endif
                                                @if($payment_purpose->payment_purpose=='Step 1')
                                                    <option value="Step 2">Step 2</option>
                                                @endif
                                                @if($payment_purpose->payment_purpose=="Step 2")
                                                    <option value="Step 3">Step 3</option>
                                                @endif
                                                @if($payment_purpose->payment_purpose=="Step 3")
                                                    <option value="Step 4">Step 4</option>
                                                @endif
                                                @if($payment_purpose->payment_purpose=="Step 4")
                                                    <option value="Step 5">Step 5</option>
                                                @endif
                                                @if($payment_purpose->payment_purpose=="Step 5")
                                                    <option value="Processing Fee">Processing Fee</option>
                                                @endif
                                                @if($payment_purpose->payment_purpose=="Processing Fee")
                                                    <option value="Service Charge">Service Charge</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-md-4"><b>Pay Amount:</b></div>
                                        <div class="col-md-8">
                                            <input type="number" name="pay_amount" value="0" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-md-4"><b>Payment Date:</b></div>
                                        <div class="col-md-8">
                                            <input type="text" name="payment_date" class="form-control date" placeholder="Please Enter Payment Date . . ." required autocomplete="off">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-success btn-lg" id="paymentBtn" style="border-radius:0px;"><i class="fa fa-check"></i> Save</button>
                                                <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" style="border-radius:0px;"><i class="fa fa-close"></i> Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Payment History </h5>
                                @if($data->final_payment_status==1)
                                    <p style="color:green;text-align:center;">(************* Payment Done ************* )</p>
                                @endif
                                <hr>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="account-student-table" style="border:1px solid #ddd !important;">
                                    <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Payment Purpose</th>
                                        <th>Pay Amount</th>
                                        <th>Payment Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payment_history as $key=>$row)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$row->payment_purpose}}</td>
                                            <td>{{$row->pay_amount}}</td>
                                            <td>{{$row->payment_date}}</td>
                                            <td>
                                                @if(Auth::user()->role==='Admin')
                                                    <a href="{{url('payment_delete', $row->id)}}" onclick="deleteFile()"><i class="fa fa-trash"></i> Delete</a>
                                                @endif
                                                <a href="{{url('payment_edit', $row->id)}}" id="edit"><i class="fa fa-edit"></i> Edit</a>
                                                <br>
                                                <a href="{{url('accounts_bill_pdf', $row->id)}}" target="_blank"><i class="fa fa-print"></i> Print</a>
                                                <br>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
            <div id="payment_edit" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="{{url('payment_update')}}" method="POST" id="paymentForm">
                            @csrf
                            <div class="modal-header bg-indigo text-white">
                                <h6 class="modal-title">Payment Edit Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-md-4">Payment Purpose:</div>
                                    <div class="col-md-8">
                                        <input type="text" id="payment_purpose" class="form-control" readonly>
                                        <input type="hidden" name="id" id="id" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-md-4">Pay Amount:</div>
                                    <div class="col-md-8">
                                        <input type="text" name="pay_amount" id="pay_amount" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-md-4">Payment Date:</div>
                                    <div class="col-md-8">
                                        <input type="text" name="payment_date" id="payment_date" class="form-control date">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-square"></i> Update</button>
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="balance_edit" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="{{url('balance_update')}}" method="POST" id="balanceForm">
                            @csrf
                            <div class="modal-header bg-indigo text-white">
                                <h6 class="modal-title">Payment Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-md-4">Pay Amount:</div>
                                    <div class="col-md-8">
                                        <input type="text" name="pay_amount" id="pay_amount" class="form-control">
                                        <input type="hidden" name="student_id" id="student_id" class="form-control">
                                        <input type="hidden" name="id" id="id" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-md-4">Payment Date:</div>
                                    <div class="col-md-8">
                                        <input type="text" name="payment_date" id="payment_date" class="form-control date">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="paymentBtn"><i
                                        class="fa fa-check-square"></i> Save
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-close"></i> Close
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            @include('admin.include.footer')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
            <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
            <script>
                $('body').on('click', '#balance_update', function () {
                    var id = $(this).data('id');
                    $.ajax({
                        type: "get",
                        url: "balance_update_info/" + id,
                        success: function (data) {
                            $('#modelHeading').html("Edit Product");
                            $('#saveBtn').val("edit-user");
                            $('#balance_edit').modal('show');
                            $('#student_id').val(data.student_id);
                            $('#id').val(data.id);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                });
                $('body').on('click', '#edit', function () {
                    var id = $(this).data('id');
                    $.ajax({
                        type: "get",
                        url: "payment_edit/" + id,
                        success: function (data) {
                            $('#modelHeading').html("Edit Product");
                            $('#saveBtn').val("edit-user");
                            $('#payment_edit').modal('show');
                            $('#id').val(data.id);
                            $('#payment_purpose').val(data.payment_purpose);
                            $('#pay_amount').val(data.pay_amount);
                            $('#payment_date').val(data.payment_date);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
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

                function deleteFile() {
                    alert("Are you sure delete this message !!!!!!!!!!!!!");
                }
            </script>
        </div>
    </div>
</div>
</body>
</html>

