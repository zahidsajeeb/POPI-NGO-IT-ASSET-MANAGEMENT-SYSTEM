<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <style>
        .error {
            color: red;
            font-weight: bold;
        }

        .card {
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }

        input {
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }
        @media print{
            html {
                overflow: visible !important;
                margin: auto !important;
            }
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Branch/Project Visiting & Working Information</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('other/visiting_working_info')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                        <button class="btn btn-primary navbar-right" onclick="printDiv('printableArea')" style="border-radius:0px;"><i class="fa fa-print"></i> Print</button>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12" id="printableArea">
                        <div class="card" style="border:0px;">
                            <div class="card-body">
                                <table class="table" style="border:1px solid;">
                                    <tr>
                                        <td><img src="{{url('backend/global_assets/images/logo.jpg')}}" style="height:50px;width:120px;"></td>
                                        <td colspan="6" style="text-align:center;">
                                            <h1 style="font-weight:bold;font-size:30px;">People's Oriented Program Implementation (POPI)</h1>
                                            <span style="font-size:20px;">House#5/11-A, Block#E, Lalmatia, Dhaka-1207, Bangladesh.</span><br>
                                            <span style="font-size:20px;"><b>Phone:</b>48115852.<b>E-mail:</b>popi@bdmail.com, info@popibd.org.<br><b>Website:</b>www.popibd.org</span>
                                        </td>
                                    </tr>
                                    <tr style="border:1px solid;">
                                        <td colspan="4" style="border:1px solid;"><h2 style="font-weight:bold;text-align:center;"><b>Branch Visit Form</b></h2></td>
                                    </tr>
                                    <tr style="border:1px solid;">
                                        <td style="border:1px solid; width:20%;"><h5 style="font-weight:bold;">Information Type : </h5></td>
                                        <td colspan="3" style="border:1px solid; width:30%;"><h5 style="font-weight:bold;">{{$data->present_info_type}}</h5></td>
                                    </tr>
                                    <tr style="border:1px solid;">
                                        <td style="border:1px solid; width:20%;"><h5 style="font-weight:bold;">Cell Number : </h5></td>
                                        <td style="border:1px solid; width:30%;"><h5 style="font-weight:bold;">{{$data->cell_number}}</h5></td>
                                        <td style="border:1px solid; width:20%;"><h5 style="font-weight:bold;">Branch Name : </h5></td>
                                        <td style="border:1px solid; width:30%;"><h5 style="font-weight:bold;">{{$data->name}}</h5></td>
                                    </tr>
                                    <tr style="border:1px solid;">
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Zone Name :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->zone_name}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;;">Region Name :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->region_name}}</h5></td>
                                    </tr>
                                    <tr style="border:1px solid;">
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">User Name :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->user_name}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Designation :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->designation}}</h5></td>
                                    </tr>
                                    <tr style="border:1px solid;">
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Device Name :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->d_s_name}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Device Status Before Servicing :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->d_s_status_before}}</h5></td>
                                    </tr>
                                    <tr style="border:1px solid;">
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Service Requirement :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->service_req}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Device Status After Servicing :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->d_s_status_after}}</h5></td>
                                    </tr>
                                    <tr style="border:1px solid;">
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Visiting Start Date :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{date("d-m-Y", strtotime($data->visiting_start_date))}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Visiting End Date :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{date("d-m-Y", strtotime($data->visiting_end_date))}}</h5></td>
                                    </tr>
                                    <tr style="border:1px solid;">
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Visiting Start Time :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->visiting_start_time}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Visiting End Time :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->visiting_end_time}}</h5></td>
                                    </tr>
                                    <tr style="border:1px solid;">
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Visiting Night Hold :</h5></td>
                                        <td colspan="3" style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->visiting_night_hold}}</h5></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">IT Comment :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->it_comment}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">User Comment :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->user_comment}}</h5></td>
                                    </tr>
                                </table>
                                <table class="table" style="margin-top:100px;">
                                    <tr>
                                        <td><h5 style="font-weight:bold;"><b>Prepared By</b></h5></td>
                                        <td> <h5 style="font-weight:bold;"><b>User (ABM/BM/Project)</b></h5></td>
                                        <td><h5 style="font-weight:bold;"><b>Program Manager</b></h5></td>
                                        <td><h5 style="font-weight:bold;"><b>Assistant Director-IT (HO)</b></h5></td>
                                    </tr>
                                </table>
                                <div class="row" style="margin-top:20px;">
                                    <div class="col-md-6">
                                        <b style="padding: 5px;">This form/report is system generated</b>
                                    </div>
                                </div>
{{--                                <div class="row" style="margin-top:100px;">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        Created By:<br>--}}
{{--                                        Name: <?php echo $user_info->employee_name;?><br>--}}
{{--                                        ID: <?php echo $user_info->employee_id;?><br>--}}
{{--                                        Department: <?php echo $user_info->department_name;?><br>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

</body>
</html>











