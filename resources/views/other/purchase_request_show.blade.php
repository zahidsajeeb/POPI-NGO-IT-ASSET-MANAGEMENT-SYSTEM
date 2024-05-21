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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Purchase Request Information</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('gatepass')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
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
                                        <td colspan="5" style="border:1px solid;"><h2 style="text-align:center;"><b>Purchase Request</b></h2></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->serial_no}}</h5></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Requester Name :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->requester_name}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Designation :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->designation}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Branch Name :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->branch_id}}</h5></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Region Name :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->region_id}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Request Date :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{date("d-m-Y", strtotime($data->request_date))}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Required Date :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{date("d-m-Y", strtotime($data->required_date))}}</h5></td>
                                    </tr>
                                </table>
                                <table class="table" style="border:1px solid; margin-top:10px;">
{{--                                    <tr>--}}
{{--                                        <td colspan="6"></td>--}}
{{--                                    </tr>--}}
                                    <tr style="background:#8080802b;margin-top:5px;">
                                        <td style="border:1px solid; width:10%;"><h5 style="font-weight:bold; text-align:center;">S/N</h5></td>
                                        <td style="border:1px solid; width:30%;"><h5 style="font-weight:bold; text-align:center;">Particulars</h5></td>
                                        <td style="border:1px solid; width:30%;"><h5 style="font-weight:bold; text-align:center;">Purpose</h5></td>
                                        <td style="border:1px solid; width:10%;"><h5 style="font-weight:bold; text-align:center;">Qty</h5></td>
                                        <td style="border:1px solid; width:20%;"><h5 style="font-weight:bold; text-align:center;">Approx Value</h5></td>
                                    </tr>
                                    @foreach($items as $key=>$row)
                                        <tr>
                                            <td style="border:1px solid;"><h5 style="font-weight:bold;text-align:center;">{{++$key}}</h5></td>
                                            <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$row->particulars}}</h5></td>
                                            <td style="border:1px solid;"><h5 style="font-weight:bold;text-align:center;">{{$row->purpose}}</h5></td>
                                            <td style="border:1px solid;"><h5 style="font-weight:bold;text-align:center;">{{$row->qty}}</h5></td>
                                            <td style="border:1px solid;" colspan="2"><h5 style="font-weight:bold;text-align:center;">{{$row->approx_value}}</h5></td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td style="text-align:center; border:1px solid;" colspan="3" ><h5 style="font-weight:bold;"></h5></td>
{{--                                        <td style="border:1px solid;"><h5 style="font-weight:bold;text-align:center;"><b>{{$total_qty->qty}}</b></h5> </td>--}}
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;text-align:center;"><b>Total:</b></h5> </td>
                                        <td style="text-align:center; border:1px solid;" colspan="2"><h5 style="font-weight:bold;"><b>{{$total_apox->approx_value}}</b></h5> </td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Price</h5></td>
                                        <td style="border:1px solid;" colspan="5" ><h5 style="font-weight:bold;">{{$data->value_in_word}}</h5></td>
                                    </tr>

                                </table>
                                <div class="row" style="margin-top:50px;">
                                    <div class="col-md-6">
                                        <h5 style="font-weight:bold;"><b>Presented By</b></h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 style="font-weight:bold;text-align:right;"><b>Recommended By</b></h5> <br>
                                    </div>
                                </div>
                                <div class="row" style="border:1px solid;padding:40px;margin-top:50px;">
                                    <div class="col-md-4">
                                        <h5 style="font-weight:bold;"><span>Budget:Available, TK ................/ Not Available</span></h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 style="font-weight:bold;"><span>Fund:Available/ Not Available</span></h5>
                                    </div>
                                    <!--<div class="col-md-8" style="margin-top:50px;"></div>-->
                                    <div class="col-md-4">
                                        <h5 style="font-weight:bold;text-align:right;"><b>Accounts Dept</b></h5> <br><br>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:50px;">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                        <h5 style="font-weight:bold;text-align:right;margin-top:30px;"><b>Approved By</b></h5> <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="font-size:12px;font-weight:bold;">
                                        Created By:<br>
                                        Name: <?php echo $user_info->employee_name;?><br>
                                        ID: <?php echo $user_info->employee_id;?><br>
                                        Department: <?php echo $user_info->department_name;?><br><br>
                                        <b style="padding: 5px;">This form/report is system generated</b>
                                    </div>
                                </div>
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











