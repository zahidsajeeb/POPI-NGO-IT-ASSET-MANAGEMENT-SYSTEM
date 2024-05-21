<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <style>
        .error{
            color:red;
            font-weight:bold;
        }
        .card{
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }
        input{
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - User List</h4>
                    </div>
                    <div class="navbar-right">
                        <button type="button" class="btn btn-indigo" data-toggle="modal" id="role_add" data-target="#modal_role_add121" style="border-radius:0px;"><i class="icon-plus2"></i> Add User </button>
                        <button  onClick="history.go(0);" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-refresh"></i> Page Refresh</button>
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">User Lists</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if(Auth::user()->role == "Superadmin")
                            <table class="table table-bordered" id="super_table" style="border:1px solid; text-align:center;">
                                <thead style="background:#194d83;color:white; text-align:center;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Action</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">User Name</th>
                                    <th class="text-center">User Password</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Created at</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            @endif
                                @if(Auth::user()->role != "Superadmin")
                                    <table class="table table-bordered" id="table" style="border:1px solid; text-align:center;">
                                        <thead style="background:#194d83;color:white; text-align:center;">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Action</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">User Name</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Created at</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                @endif
                        </div>
                    </div>
                </div>
                @include('user.modal.add')
            </div>
            @include('admin.include.footer')
        </div>
    </div>
</div>

<script>
    $('#region_name').select2({
        placeholder: "Search Region Name . .",
        width: '100%'
    });
    $('#zone_name').select2({
        placeholder: "Search Zone Name . .",
        width: '100%'
    });
    $('#branch_name').select2({
        placeholder: "Search Branch Name . .",
        width: '100%'
    });
    $(document).ready(function () {
        $('.region_name').on('change', function () {
            var id = this.value;
            $(".zone_name").html('');
            $.ajax({
                url: "{{url('fetch_zone_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('.zone_name').html('<option value="">-- Select State --</option>');
                    $.each(result.zone_name, function (key, value) {
                        $(".zone_name").append('<option value="' + value
                            .id + '">' + value.zone_name + '</option>');
                    });
                    $('.branch_name').html('<option value="">-- Select Branch --</option>');
                }
            });
        });
        $('.zone_name').on('change', function () {
            var id = this.value;
            console.log(id);
            $(".branch_name").html('');
            $.ajax({
                url: "{{url('fetch_branch_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('.branch_name').html('<option value="">-- Select State --</option>');
                    $.each(res.branch_name, function (key, value) {
                        $(".branch_name").append('<option value="' + value
                            .id + '">' + value.branch_name + '</option>');
                    });
                }
            });
        });
    });
</script>
</body>
</html>








