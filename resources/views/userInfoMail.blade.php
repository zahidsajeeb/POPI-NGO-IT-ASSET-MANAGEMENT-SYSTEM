<!DOCTYPE html>
<html>
<head>
    <title>Visa Software</title>
    <link href={{asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css')}} rel="stylesheet"/>
</head>
<body>
<h2 class="text-center">Visa Software</h2>
<p>Dear sir,</p>
<p>You have an approval request of Requisition. Please go to below link for approval.</p>
<a href="https://oclapp.ocl-bd.com" target="_blank">https://oclapp.ocl-bd.com</a>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" style="border:1px solid;width:800px;">
        <thead style="background:gray; color:white;font-size:12px;">
        <tr style="padding: 5px;">
            <th>#</th>
            <th>User ID</th>
            <th>Password</th>
        </tr>
        </thead>
        <tbody>
        <tr style="padding: 5px;">
            <td style="border:1px solid; width:10px;font-size:12px;">1</td>
            <td style="border:1px solid; width:20px;font-size:12px;">{{$token}}</td>
{{--            <td style="border:1px solid; width:20px;font-size:12px;">{{$details['password12']}}</td>--}}
        </tr>
        </tbody>
    </table>
</div>
<table>
    <tr>
        <td> Thank You</td>
    </tr>
    <tr>
        <td> <h4>Visa HR Team</h4> </td>
    </tr>

</table>
{{--<p>Thank you--}}
{{--<span>{{ $details['name'] }}</span>--}}
{{--</p>--}}
</body>
</html>

