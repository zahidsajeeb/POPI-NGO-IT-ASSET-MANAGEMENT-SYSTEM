<?php date_default_timezone_set('asia/dhaka'); ?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 5px;
        }

        body {
            margin: 0px;
        }

        * {
            font-family: Verdana, Arial, sans-serif;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .invoice table {
            margin: 0px;
        }

        .invoice h3 {
            margin-left: 15px;
        }

        .information {
            background-color: #8080802b;
            color: #000000;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 10px;
        }
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
<div class="invoice">
    <table class="table" style="width:100%; border:1px solid lightgray;">
        <tr>
            <td><img src="data:image/jpeg;base64,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" style="height:50px;width:120px;"></td>
            <td colspan="6" style="text-align:center;">
                <h3 style="font-weight:bold;font-size:30px;">People's Oriented Program Implementation (POPI)</h3>
                <span style="font-size:14px;">House#5/11-A, Block#E, Lalmatia, Dhaka-1207, Bangladesh.</span><br>
                <span style="font-size:14px;"><b>Phone:</b>48115852.<b>E-mail:</b>popi@bdmail.com, info@popibd.org.<br><b>Website:</b>www.popibd.org</span>
            </td>
        </tr>
        <tr style="width:100%; border:1px solid;">
            <td colspan="7" style="border:1px solid;"><h2 style="text-align:center;"><b>Gatepass</b></h2></td>
        </tr>
        <tr>
            <td style="border:1px solid; width:15%;"><h5 style="font-weight:bold;">Date :</h5></td>
            <td style="border:1px solid;"><h5 style="font-weight:bold;">{{date("d-m-Y", strtotime($data->date))}}</h5></td>
            <td style="border:1px solid; width:15%;"><h5 style="font-weight:bold;">Gate pass No :</h5></td>
            <td colspan="4" style="border:1px solid;"><h5 style="font-weight:bold;">{{$data->serial_no}}</h5></td>
        </tr>
        <tr style="background:#8080802b;">
            <td style="border:1px solid;" colspan="7"><h2 style="font-weight:bold;text-align:center;">Receiver Information </h2></td>
        </tr>
        <tr>
            <td style="border:1px solid;"><h5 style="font-weight:bold;">Company Name</h5></td>
            <td style="border:1px solid;" colspan="6"><h5 style="font-weight:bold;">{{$data->vendor_name}}</h5></td>
        </tr>
        <tr>
            <td style="border:1px solid;"><h5 style="font-weight:bold;">Receiver Name</h5></td>
            <td style="width:30%; border:1px solid;"><h5 style="font-weight:bold;">{{$data->receiver_name}}</h5></td>
            <td style="border:1px solid;"><h5 style="font-weight:bold;">Signature :</h5></td>
            <td style="width:30%; border:1px solid;" colspan="4"><h5 style="font-weight:bold;text-align:center;"></h5></td>
        </tr>
        <tr>
            <td style="border:1px solid;"><h5 style="font-weight:bold;">Address :</h5></td>
            <td style="width:30%; border:1px solid;"><h5 style="font-weight:bold;">{{$data->address}}</h5></td>
            <td style="border:1px solid;"><h5 style="font-weight:bold;">Mobile No :</h5></td>
            <td style="width:30%; border:1px solid;" colspan="4"><h5 style="font-weight:bold;text-align:center;">{{$data->mobile_no}}</h5></td>
        </tr>
    </table>
    <table class="table" style="width:100%; border:1px solid lightgray;">
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
</div>
<div style="width:100%; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                <h5 style="font-weight:bold;"><b>Prepared By:</b></h5><br><br><br>
            </td>
            <td align="right" style="width: 50%;">
                <h5 style="font-weight:bold;text-align:right;"><b>Approved By:</b></h5><br><br><br>
            </td>
        </tr>
    </table>
</div>

<div class="information" style="position:absolute; width:100%; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                This form/report is system generated
            </td>
            <td align="right" style="width: 50%;">
                Printing Time: <?php echo date("Y-m-d H:i:s A");?>
            </td>
        </tr>

    </table>
</div>
</body>
</html>

