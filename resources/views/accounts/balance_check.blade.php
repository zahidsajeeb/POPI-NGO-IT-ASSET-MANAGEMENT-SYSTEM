<?php
error_reporting(0);
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <style>
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Balance Check</h4>
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
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Balance Check</h5>
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
                                            <th class="text-center">Action</th>
                                            <th style="text-align:center;">Payment Purpose</th>
                                            <th style="text-align:center;">Payment Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $key=>$result)
                                                <?php
                                                $admission_payment = DB::table('tbl_student_payment')
                                                    ->select('payment_purpose')
                                                    ->where('payment_purpose', 'Admission')
                                                    ->where('student_id', $result->student_id)
                                                    ->first();
                                                $step1_payment = DB::table('tbl_student_payment')
                                                    ->select('payment_purpose')
                                                    ->where('payment_purpose', 'Step 1')
                                                    ->where('student_id', $result->student_id)
                                                    ->first();
                                                $step2_payment = DB::table('tbl_student_payment')
                                                    ->select('payment_purpose')
                                                    ->where('payment_purpose', 'Step 2')
                                                    ->where('student_id', $result->student_id)
                                                    ->first();
                                                $step3_payment = DB::table('tbl_student_payment')
                                                    ->select('payment_purpose')
                                                    ->where('payment_purpose', 'Step 3')
                                                    ->where('student_id', $result->student_id)
                                                    ->first();
                                                $step4_payment = DB::table('tbl_student_payment')
                                                    ->select('payment_purpose')
                                                    ->where('payment_purpose', 'Step 4')
                                                    ->where('student_id', $result->student_id)
                                                    ->first();
                                                $step5_payment = DB::table('tbl_student_payment')
                                                    ->select('payment_purpose')
                                                    ->where('payment_purpose', 'Step 5')
                                                    ->where('student_id', $result->student_id)
                                                    ->first();
                                                $processing_payment = DB::table('tbl_student_payment')
                                                    ->select('payment_purpose')
                                                    ->where('payment_purpose', 'Processing Fee')
                                                    ->where('student_id', $result->student_id)
                                                    ->first();
                                                $service_payment = DB::table('tbl_student_payment')
                                                    ->select('payment_purpose')
                                                    ->where('payment_purpose', 'Service Charge')
                                                    ->where('student_id', $result->student_id)
                                                    ->first();
                                                ?>
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$result->student_name}}</td>
                                                <td>{{$result->student_id}}</td>
                                                <td style="text-align:center;"><a href="{{url('balance_check_details', $result->student_id)}}" class="btn btn-success btn-xs"><i class="fa fa-folder-open"></i> Details</a></td>
                                                <td style="text-align:center;">
                                                    <table id="example1" class="table table-condensed">
                                                        {{--                                                        @foreach($payment as $row)--}}
                                                        <tr>
                                                            <td>Admission Fee</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Step 1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Step 2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Step 3</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Step 4</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Step 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Processing Fee</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Service Charge</td>
                                                        </tr>
                                                        {{--                                                        @endforeach--}}
                                                    </table>
                                                </td>
                                                <td style="text-align:center;">
                                                    <table id="example1" class="table table-nostriped">
                                                        <tr>
                                                            <td>@if(isset($admission_payment))
                                                                    <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                @else
                                                                    <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-close"></i> Not Done</span>
                                                                @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td>@if(isset($step1_payment))
                                                                    <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                @else
                                                                    <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td>@if(isset($step2_payment))
                                                                    <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                @else
                                                                    <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td>@if(isset($step3_payment))
                                                                    <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                @else
                                                                    <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td>@if(isset($step4_payment))
                                                                    <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                @else
                                                                    <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td>@if(isset($step5_payment))
                                                                    <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                @else
                                                                    <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td>@if(isset($processing_payment))
                                                                    <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                @else
                                                                    <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td>@if(isset($service_payment))
                                                                    <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                @else
                                                                    <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                @endif</td>
                                                        </tr>

                                                    </table>
                                                </td>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                                    @if(Auth::user()->role === 'Admin')
                                        <table id="example" class="table table-bordered" style="border:1px solid;">
                                            <thead style="background-color:#194d83; color:white;">
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Student Name</th>
                                                <th>Student ID</th>
                                                <th class="text-center">Action</th>
                                                <th style="text-align:center;">Payment Purpose</th>
                                                <th style="text-align:center;">Payment Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($admin_data as $key=>$result)
                                                    <?php
                                                    $admission_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Admission')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    $step1_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Step 1')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    $step2_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Step 2')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    $step3_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Step 3')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    $step4_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Step 4')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    $step5_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Step 5')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    $processing_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Processing Fee')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    $service_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Service Charge')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    ?>
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$result->student_name}}</td>
                                                    <td>{{$result->student_id}}</td>
                                                    <td style="text-align:center;"><a href="{{url('balance_check_details', $result->student_id)}}" class="btn btn-success btn-xs"><i class="fa fa-folder-open"></i> Details</a></td>
                                                    <td style="text-align:center;">
                                                        <table id="example1" class="table table-condensed">
                                                            {{--                                                        @foreach($payment as $row)--}}
                                                            <tr>
                                                                <td>Admission Fee</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Step 1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Step 2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Step 3</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Step 4</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Step 5</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Processing Fee</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Service Charge</td>
                                                            </tr>
                                                            {{--                                                        @endforeach--}}
                                                        </table>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <table id="example1" class="table table-nostriped">
                                                            <tr>
                                                                <td>@if(isset($admission_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-close"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@if(isset($step1_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@if(isset($step2_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@if(isset($step3_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@if(isset($step4_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@if(isset($step5_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@if(isset($processing_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@if(isset($service_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>

                                                        </table>
                                                    </td>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                    @if(Auth::user()->role === 'Assistant Counselor' || Auth::user()->role === 'Counselor')
                                        <table id="example" class="table table-bordered" style="border:1px solid;">
                                            <thead style="background-color:#194d83; color:white;">
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Student Name</th>
                                                <th>Student ID</th>
                                                <th style="text-align:center;">Payment Purpose</th>
                                                <th style="text-align:center;">Payment Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $key=>$result)
                                                    <?php
                                                    $admission_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Admission')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    $step1_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Step 1')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    $step2_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Step 2')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    $step3_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Step 3')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    $step4_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Step 4')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    $step5_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Step 5')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    $processing_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Processing Fee')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    $service_payment = DB::table('tbl_student_payment')
                                                        ->select('payment_purpose')
                                                        ->where('payment_purpose', 'Service Charge')
                                                        ->where('student_id', $result->student_id)
                                                        ->first();
                                                    ?>
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$result->student_name}}</td>
                                                    <td>{{$result->student_id}}</td>
                                                    <td style="text-align:center;">
                                                        <table id="example1" class="table table-condensed">
                                                            {{--                                                        @foreach($payment as $row)--}}
                                                            <tr>
                                                                <td>Admission Fee</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Step 1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Step 2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Step 3</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Step 4</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Step 5</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Processing Fee</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Service Charge</td>
                                                            </tr>
                                                            {{--                                                        @endforeach--}}
                                                        </table>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <table id="example1" class="table table-nostriped">
                                                            <tr>
                                                                <td>@if(isset($admission_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-close"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@if(isset($step1_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@if(isset($step2_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@if(isset($step3_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@if(isset($step4_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@if(isset($step5_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@if(isset($processing_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@if(isset($service_payment))
                                                                        <span style="background:green;color:white;padding:7px;"><i class="fa fa-check"></i> Done</span>
                                                                    @else
                                                                        <span style="background:darkred;color:white;padding:7px;"><i class="fa fa-check"></i> Not Done</span>
                                                                    @endif</td>
                                                            </tr>

                                                        </table>
                                                    </td>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{--                @endif--}}
            </div>
            <div id="make_payment_modal" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="#" method="POST" id="paymentForm">
                            <div class="modal-header bg-indigo text-white">
                                <h6 class="modal-title">Payment Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-md-4">Student ID:</div>
                                    <div class="col-md-8">
                                        <input type="text" name="student_id" id="student_id" class="form-control"
                                               readonly>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-md-4">Student Name:</div>
                                    <div class="col-md-8">
                                        <input type="text" name="student_name" id="student_name" class="form-control"
                                               readonly>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-md-4">Total Amount:</div>
                                    <div class="col-md-8">
                                        <input type="number" name="total_amount" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-md-4">Discount Amount:</div>
                                    <div class="col-md-8">
                                        <input type="number" name="discount_amount" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-md-4">Pay Amount:</div>
                                    <div class="col-md-8">
                                        <input type="number" name="pay_amount" value="0" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-md-4">Payment Date:</div>
                                    <div class="col-md-8">
                                        <input type="text" name="payment_date" value="0" class="form-control date">
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-md-4">Payment Option:</div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="payment_type">
                                            <option>Choose Color</option>
                                            <option value="bkash">Bkash</option>
                                            <option value="cash">Cash</option>
                                            <option value="check">Check</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-md-12">
                                        <div class="bkash box">
                                            <table class="table">
                                                <tr>
                                                    <td colspan="2"><b>Bkash Payment Information</b></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Mobile No:</label>
                                                        <input type="tel" name="bkash_mobile" class="form-control">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="check box">
                                            <table class="table">
                                                <tr>
                                                    <td colspan="2"><b>Check Payment Information</b></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Check No:</label>
                                                        <input type="text" name="check_no" class="form-control">
                                                    </td>
                                                    <td>
                                                        <label>Check Date:</label>
                                                        <input type="text" name="check_date" class="form-control date">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
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
                        createdRow: function (row) {
                            $(row).find('td table')
                                .DataTable({
                                    columns: columns,
                                    dom: 'tf'
                                })
                        }
                    });
                    const columns = [
                        {title: ''},
                    ]
                    let table = $('#example').DataTable({
                        createdRow: function (row) {
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
