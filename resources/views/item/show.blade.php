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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Item Show</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('item')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
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
                                        <td style="background: #80808026; color: black;"><b>Item Serial No</b></td>
                                        <td><p>{{$data->serial_no}}</p></td>
                                        <td style="background: #80808026; color: black;"><b>Asset No</b></td>
                                        <td><p>{{$data->asset_code}}</p></td>
                                    </tr>
                                    <tr>
                                        <td style="background: #80808026; color: black;"><b>Item Name</b></td>
                                        <td style="width:30%"><p>{{$item_name->item_name}}</p></td>
                                        <td style="background: #80808026; color: black;"><b>Description</b></td>
                                        <td style="width:30%"><p>{{$data->item_desc}}</p></td>
                                    </tr>
                                    <tr>
                                        <td style="background: #80808026; color: black;"><b style="font-weight:bold;">Brand Name</b></td>
                                        <td style="width:30%"><p>{{$brand_name->brand_name}}</p></td>
                                        <td style="background: #80808026; color: black;"><b style="font-weight:bold;">Vendor Name</b></td>
                                        <td style="width:30%"><p>{{$vendor_name->vendor_name}}</p></td>
                                    </tr>
                                    <tr>
                                        <td style="background: #80808026; color: black;"><b>Purchase Date</b></td>
                                        <td style="width:30%"><p>{{$data->purchase_date}}</p></td>
                                        <td style="background: #80808026; color: black;"><b>Expire Date</b></td>
                                        <td style="width:30%"><p>{{$data->exp_date}}</p></td>
                                    </tr>
                                    <tr>
                                        <td style="background: #80808026; color: black;"><b>Qty</b></td>
                                        <td style="width:30%"><p>{{$data->qty}}</p></td>
                                        <td style="background: #80808026; color: black;"><b>Total Price</b></td>
                                        <td style="width:30%"><p>{{$data->price}}</p></td>
                                    </tr>
                                    <tr>
                                        <td style="background: #80808026; color: black;"><b>Unit Price</b></td>
                                        <td colspan="3" style="width:30%"><p>{{$data->price/$data->qty}}</p></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><h2 style="text-align:center;">Distribution History</h2></td>
                                    </tr>
                                    <table class="table table-bordered">
                                        <tr style="background: gray;color: white;">
                                            <td>#</td>
                                            <td>Distribution Date</td>
                                            <td>Distribution Type</td>
                                            <td>Branch Name</td>
                                            <td>Zone Name</td>
                                            <td>Region Name</td>
                                            <td>Employee Name</td>
                                            <td>Employee Department</td>
                                        </tr>
                                        @if(isset($distribution_list)!='')
                                            @foreach($distribution_list as $key=>$row)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$row->distribution_date}}</td>
                                                    <td>{{$row->distribution_type}}</td>
                                                    <td>{{$row->branch_name}}</td>
                                                    <td>{{$row->zone_name}}</td>
                                                    <td>{{$row->region_name}}</td>
                                                    <td>{{$row->employee_name}}</td>
                                                    <td>{{$row->department_name}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if(isset($distribution_list)=='')
                                            <tr>
                                                <td colspan="5" style="text-align:center;"><b style="text-align:center;">No Data Found</b></td>
                                            </tr>
                                        @endif
                                    </table>
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











