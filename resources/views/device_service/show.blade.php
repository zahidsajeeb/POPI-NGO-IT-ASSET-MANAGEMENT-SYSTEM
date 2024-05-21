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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Device Service Show</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('Device Service/index')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                        <button class="btn btn-primary navbar-right" onclick="printDiv('printableArea')" style="border-radius:0px;"><i class="fa fa-print"></i> Print</button>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12" id="printableArea">
                        <div class="card" style="border:0px; height:1500px !important;">
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
                                    <tr>
                                        <td colspan="4" style="border:1px solid;"><h2 style="text-align:center;"><b>Device Service</b></h2></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid; width:15%;"><h5 style="font-weight:bold;">Date :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{date("d-m-Y", strtotime($data->date))}}</h5></td>
                                        <td style="border:1px solid; width:15%;"><h5 style="font-weight:bold;">Device Service No :</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->serial_no}}</h5></td>
                                    </tr>
                                    <tr style="background:#8080802b;">
                                        <td style="border:1px solid;" colspan="4"><h2 style="font-weight:bold;text-align:center;">Receiver Information </h2></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Company Name</h5></td>
                                        <td style="border:1px solid;" colspan="3"><h5 style="font-weight:bold;">{{$data->vendor_name}}</h5></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Receiver Name</h5></td>
                                        <td style="width:30%; border:1px solid;"><h5 style="font-weight:bold;">{{$data->receiver_name}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Signature :</h5></td>
                                        <td style="width:30%; border:1px solid;"><h5 style="font-weight:bold;text-align:center;"></h5></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Address :</h5></td>
                                        <td style="width:30%; border:1px solid;"><h5 style="font-weight:bold;">{{$data->address}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Mobile No :</h5></td>
                                        <td style="width:30%; border:1px solid;"><h5 style="font-weight:bold;text-align:center;">{{$data->mobile_no}}</h5></td>
                                    </tr>
                                </table>
                                <table class="table" style="margin-top:5px; margin-bottom:100px;">
                                    <tr style="background:#8080802b;">
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">S/N</h5></td>
                                        <td style="border:1px solid;text-align:center;" colspan="2"><h5 style="font-weight:bold;">Item Description</h5></td>
                                        <td style="border:1px solid;text-align:center;"><h5 style="font-weight:bold;">Qty</h5></td>
                                    </tr>
                                    @foreach($items as $key=>$row)
                                    <tr>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{++$key}}</h5></td>
                                        <td style="border:1px solid;" colspan="2"><h5 style="font-weight:bold;">{{$row->description}}</h5></td>
                                        <td style="border:1px solid;text-align:center;"><h5 style="font-weight:bold;">{{$row->qty}}</h5></td>
                                    </tr>
                                    @endforeach
                                </table>
                                 <div class="row">
                                    <div class="col-md-6">
                                        <h5 style="font-weight:bold;"><b>Prepared By:</b></h5><br><br><br>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 style="font-weight:bold;text-align:right;"><b>Approved By:</b></h5><br><br><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
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










