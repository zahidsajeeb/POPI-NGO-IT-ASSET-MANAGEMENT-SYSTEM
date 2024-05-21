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

        .capture {
            margin: 0 auto;
            width: 100%;
            height: 1000px;
            /*overflow: hidden;*/
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Toner Purchase Information</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('gatepass')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                        <button class="btn btn-primary navbar-right" onclick="printDiv('printableArea')" style="border-radius:0px;"><i class="fa fa-print"></i> Print</button>
                        {{--                        <a href="#" class="btn btn-danger navbar-right" id="btnDownload" style="border-radius:0px;"><i class="fa fa-download"></i> Download</a>--}}
                    </div>
                </div>
            </div>
            <div class="content capture">
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
                                        <td colspan="6" style="border:1px solid;"><h2 style="text-align:center;"><b>Toner Purchase Request</b></h2></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;width:20%;"><h5 style="font-weight:bold;">Requester Name :</h5></td>
                                        <td style="border:1px solid;width:30%;"><h5 style="font-weight:bold;">{{$data->requester_name}}</h5></td>
                                        <td style="border:1px solid;width:20%;"><h5 style="font-weight:bold;">Designation :</h5></td>
                                        <td style="border:1px solid;width:30%;"><h5 style="font-weight:bold;">{{$data->designation}}</h5></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;"><h6 style="font-weight:bold;">Branch Name :</h6></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->branch_name}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Region Name :</h5></td>
                                        <td style="width:30%; border:1px solid;"><h5 style="font-weight:bold;">{{$data->region_name}}</h5></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Zone Name :</h5></td>
                                        <td style="width:30%; border:1px solid;"><h5 style="font-weight:bold;">{{$data->zone_name}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Item Model :</h5></td>
                                        <td style="width:30%; border:1px solid;"><h5 style="font-weight:bold;">{{$data->item_model}}</h5></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Request Date :</h5></td>
                                        <td style="width:30%; border:1px solid;"><h5 style="font-weight:bold;">{{date("d-m-Y", strtotime($data->request_date))}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Required Date :</h5></td>
                                        <td style="width:30%; border:1px solid;"><h5 style="font-weight:bold;">{{date("d-m-Y", strtotime($data->required_date))}}</h5></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Quantity :</h5></td>
                                        <td style="width:30%; border:1px solid;"><h5 style="font-weight:bold;">{{$data->qty}}</h5></td>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Price :</h5></td>
                                        <td style="width:30%; border:1px solid;"><h5 style="font-weight:bold;">{{$data->price}}</h5></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid;"><h5 style="font-weight:bold;">Price In Word :</h5></td>
                                        <td colspan="3" style="width:30%; border:1px solid;"><h5 style="font-weight:bold;">{{$data->price_word}}</h5></td>
                                    </tr>
                                </table>
                                <div class="row" style="margin-top:100px;">
                                    <div class="col-md-4">
                                        <!--<hr>-->
                                        <h5 style="font-weight:bold;"><b>Requested By</b></h5>
                                    </div>
                                    <div class="col-md-4" style="text-align:center;">
                                        <!--<hr>-->
                                        <h5 style="font-weight:bold;"><b>BM/APM/PM</b></h5>
                                    </div>
                                    <div class="col-md-4" style="text-align:right;">
                                        <!--<hr>-->
                                        <h5 style="font-weight:bold;"><b>Checked By-IT (HO)</b></h5> <br>
                                        <!--<hr style="margin-top:50px;">-->
                                        <h5 style="font-weight:bold; margin-top:50px;"><b>Recommended By</b></h5> <br>
                                        <!--<hr style="margin-top:50px;">-->
                                        <h5 style="font-weight:bold; margin-top:50px;"><b>Approved By</b></h5> <br>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px;font-size:18px;font-weight:bold;">
                                    <div class="col-md-12" style="font-size:12px;">
                                        Created By:<br>
                                        Name: {{$user_info->employee_name}}<br>
                                        ID: {{$user_info->employee_id}}<br>
                                        Department: {{$user_info->department_name}}<br><br>
                                        <b style="padding: 5px;">This form/report is system generated</b>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @include('admin.include.footer')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.js"></script>
    </div>

</div>
</body>

<script>
    function download(url) {
        var a = $("<a style='display:none' id='js-downloder'>")
            .attr("href", url)
            .attr("download", "test.png")
            .appendTo("body");

        a[0].click();

        a.remove();
    }

    function saveCapture(element) {
        html2canvas(element).then(function (canvas) {
            download(canvas.toDataURL("image/png"));
        })
    }

    $('#btnDownload').click(function () {
        var element = document.querySelector(".capture");
        saveCapture(element)
    })

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











