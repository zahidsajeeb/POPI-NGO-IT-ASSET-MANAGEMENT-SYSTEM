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
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Date To Date Report</h4>
                        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                    </div>

                    <div class="header-elements d-none">
                        <div class="d-flex justify-content-center">
                            <form action="{{url('date_to_date_report_pdf')}}" method="get">
                                <input type="text" name="counselor_name" value="<?php echo $name->counter_no;?>">
                                <input type="text" name="start_date" value="<?php echo $start_date;?>">
                                <input type="text" name="end_date" value="<?php echo $end_date;?>">
                                <button type="submit"  class="btn btn-link btn-float text-body"><i class="icon-file-pdf text-primary"></i> Create PDF</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                @if(Auth::user()->role==='Admin')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title" style="font-weight:bold;text-align:center;">Date To Date Report</h5>
                                    <a href="' . $url . '" data-id="' . $row->id . '" id="pdf" class="navbar-right"><i class="fa fa-file-pdf"></i> PDF</a>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <h5>Employee Name: {{$name->counselor_name}}</h5>
                                        <h5>Total Counseling: {{$total_count}}</h5>
                                        <h5>Date Range: {{$start_date}}-{{$end_date}}</h5>
                                        <table class="table table-bordered" id="admin_report_table" style="border:1px solid;">
                                            <thead style="background:#194d83;color:white;">
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Student ID</th>
                                                <th>Student Name</th>
                                                <th>Email</th>
                                                <th>Counselor Name</th>
                                                <th>Entry Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $key=>$row)
                                                <tr>
                                                    <td>{{$key++}}</td>
                                                    <td>{{$row->token}}</td>
                                                    <td>{{$row->student_name}}</td>
                                                    <td>{{$row->student_email}}</td>
                                                    <td>{{$row->counselor_name}}</td>
                                                    <td>{{$row->date}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- Footer -->
            @include('admin.include.footer')
            <!-- /footer -->
        </div>
        <!-- /inner content -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->
</body>
</html>




