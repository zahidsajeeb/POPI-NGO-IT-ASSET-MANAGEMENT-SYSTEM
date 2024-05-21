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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Asset Received Show</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('other/asset_received')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                        <button class="btn btn-primary navbar-right" onclick="printDiv('printableArea')" style="border-radius:0px;"><i class="fa fa-print"></i> Print</button>
{{--                        <button class="btn btn-primary navbar-right"  onclick="window.print()" style="border-radius:0px;"><i class="fa fa-print"></i> Print</button>--}}
                    </div>
                </div>
            </div>
            <div class="content" id="printableArea">
                <div class="row">
                    <div class="col-md-12">
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
                                    <tr style="background:#8080802b;">
                                        <td style="border:1px solid;" colspan="6"><h2 style="font-weight:bold;text-align:center;">Asset Recipient Agreement</h2></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;width: 15%"><h6 style="font-weight:bold;">Date :</h6></td>
                                        <td style="border:1px solid;width: 40%" colspan="2"><h6 style="font-weight:bold;">{{date("d-m-Y", strtotime($data->date))}}</h6></td>
                                        <td style="border:1px solid;width: 15%"><h6 style="font-weight:bold;">Asset Received No :</h6></td>
                                        <td style="border:1px solid;width: 40%" colspan="2"><h6 style="font-weight:bold;">{{$data->serial_no}}</h6></td>
                                    </tr>
                                    <tr style="font-size:20px; !important">
                                        <td style="border:1px solid;"><h6 style="font-weight:bold;">Branch :</h6></td>
                                        <td style="border:1px solid;" colspan="2"><h6 style="font-weight:bold;">{{$data->branch_name}}</h6></td>
                                        <td style="border:1px solid;"><h6 style="font-weight:bold;">Zone :</h6></td>
                                        <td style="border:1px solid;" colspan="2"><h6 style="font-weight:bold;">{{$data->zone_name}}</h6></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;"><h6 style="font-weight:bold;">Region :</h6></td>
                                        <td style="border:1px solid;" colspan="5"><h6 style="font-weight:bold;">{{$data->region_name}}</h6></td>
                                    </tr>
                                    <tr style="background:#8080802b;">
                                        <td style="border:1px solid;" colspan="6"><h2 style="font-weight:bold; text-align:center;">Receiver Information</h2></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;"><h6 style="font-weight:bold;">Receiver:</h6></td>
                                        <td style="border:1px solid;" colspan="2"><h6 style="font-weight:bold;">{{$data->receiver_name}}</h6></td>
                                        <td style="border:1px solid;"><h6 style="font-weight:bold;">Signature :</h6></td>
                                        <td style="border:1px solid;" colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;"><h6 style="font-weight:bold;">Address :</h6></td>
                                        <td style="border:1px solid;" colspan="2"><h6 style="font-weight:bold;">{{$data->address}}</h6></td>
                                        <td style="border:1px solid;"><h6 style="font-weight:bold;">Mobile No :</h6></td>
                                        <td style="border:1px solid;" colspan="2"><h6 style="font-weight:bold;">{{$data->mobile_no}}</h6></td>
                                    </tr>
                                    <tr style="background:#8080802b;">
                                        <td style="border:1px solid;"><h6 style="font-weight:bold;text-align:center;">S/N</h6></td>
                                        <td style="border:1px solid;"><h6 style="font-weight:bold;text-align:center;">Item Name</h6></td>
                                        <td style="border:1px solid;"><h6 style="font-weight:bold;text-align:center;">Model</h6></td>
                                        <td style="border:1px solid;"><h6 style="font-weight:bold;text-align:center;">Serial No</h6></td>
                                        <td style="border:1px solid;"><h6 style="font-weight:bold;text-align:center;">Qty</h6></td>
                                        <td style="border:1px solid;"><h6 style="font-weight:bold;text-align:center;">Remarks</h6></td>
                                    </tr>
                                    @foreach($items as $key=>$row)
                                        <tr>
                                            <td style="border:1px solid;"><h6 style="font-weight:bold;text-align:center;">{{++$key}}</h6></td>
                                            <td style="border:1px solid;"><h6 style="font-weight:bold;">{{$row->description}}</h6></td>
                                            <td style="border:1px solid;"><h6 style="font-weight:bold;">{{$row->model}}</h6></td>
                                            <td style="border:1px solid;"><h6 style="font-weight:bold;">{{$row->item_serial_no}}</h6></td>
                                            <td style="border:1px solid;"><h6 style="font-weight:bold; text-align:center;">{{$row->qty}}</h6></td>
                                            <td style="border:1px solid;"><h6 style="font-weight:bold;">{{$row->remarks}}</h6></td>
                                        </tr>
                                    @endforeach
                                    <tr style="border:1px solid;">
                                        <td colspan="6" style="border:1px solid;">
                                            <h6><b>Terms & Conditions</b></h6>
                                            <hr>
                                            <p>I am here by signing this agreement by abiding the following criterion:</p>
                                            <ul style="list-style:none;">
                                                <li><b>1.</b> User will be liable for any kinds of physical damage of this product including all kinds of negligence damage.</li>
                                                <li><b>2.</b> Any kinds of hardware change without permission is strictly prohibited.</li>
                                                <li><b>3.</b> You are not permitted to use this product for personal purpose.</li>
                                                <li><b>4.</b> If this product is get lost, theft or disappeared registered user will be liable for the damage (as per asset value).</li>
                                            </ul>

                                        </td>
                                    </tr>
                                </table>
                                  <div class="row" style="margin-top:10px;">
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










