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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Blank Gate Pass Show</h4>
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
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><img src="{{url('backend/global_assets/images/logo.jpg')}}" style="height:50px;width:120px;"></td>
                                        <td colspan="3" style="text-align:center;">
                                            <h2>People's Oriented Program Implementation</h2>
                                            <span>House#5/11-A, Block#E, Lalmatia, Dhaka-1207, Bangladesh.</span><br>
                                            <span><b>Phone:</b>9121049.  <b>E-mail:</b> popi@bdmail.com, info@popibd.org. <b>Website:</b> www.popibd.org</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h5 style="font-weight:bold;">Date</h5></td>
                                        <td></td>
                                        <td><h5 style="font-weight:bold;">Gate pass No</h5></td>
                                        <td></td>
                                    </tr>
                                    <tr style="background:#8080802b;">
                                        <td colspan="4"><h2 style="font-weight:bold;">Receive By</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h6 style="font-weight:bold;">Company Name</h6></td>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td><h5 style="font-weight:bold;">Receiver Name</h5></td>
                                        <td style="width:30%"></td>
                                        <td><h5 style="font-weight:bold;">Mobile No</h5></td>
                                        <td style="width:30%"></td>
                                    </tr>
                                    <tr>
                                        <td><h5 style="font-weight:bold;">Address</h5></td>
                                        <td style="width:30%"></td>
                                        <td><h5 style="font-weight:bold;">Signature</h5></td>
                                        <td style="width:30%"></td>
                                    </tr>
                                    <tr style="background:#8080802b;">
                                        <td><h5 style="font-weight:bold;">S/N</h5></td>
                                        <td colspan="2"><h5 style="font-weight:bold;">Item Description</h5></td>
                                        <td><h5 style="font-weight:bold;">Qty</h5></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><h5 style="font-weight:bold;">Approved By</h5></td>
                                        <td colspan="3" style="width:30%"></td>
                                    </tr>
                                </table>
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











