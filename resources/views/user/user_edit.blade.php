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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - User Edit</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('user/index')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">User Edit Form</h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" id="edit_form">
                                    <fieldset>
                                        <div class="collapse show" id="demo1">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">User Name:</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control h-auto" value="{{$data->employee_name}}" readonly>
                                                    <input type="hidden" class="form-control h-auto" name="id" value="{{$data->id}}">
                                                    <input type="hidden" class="form-control h-auto" name="name" value="{{$data->name}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">User ID:</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control h-auto" name="user_name" value="{{$data->user_name}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Role:</label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" name="role" required>
                                                        <option value="{{$data->role}}">{{$data->role}}</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="General">General</option>
                                                        <option value="IT officer">IT officer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Region:</label>
                                                <div class="col-lg-8">
                                                    <ul>
                                                        @foreach($region_data as $row)
                                                            <li>{{$row->region_name}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Edit Region:</label>
                                                <div class="col-lg-8">
                                                    <select name="region_id[]" class="form-control" id="region_name" multiple="multiple">
                                                        @foreach($region_list as $row)
                                                            <option value="{{$row->id}}">{{$row->region_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">New Password:</label>
                                                <div class="col-lg-8">
                                                    <input type="password" class="form-control" name="password" id="password">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" id="update" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Update</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                                        </div>
                                    </div>
                                </form>
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
    $('#region_name').select2({
        placeholder: "Search Region Name . .",
        width: '100%'
    });
    var SITEURL = '{{URL::to('')}}';
    if ($("#edit_form").length > 0) {
        $("#edit_form").validate({
            rules: {
                region_name: {
                    required: true,
                },
            },
            messages: {
                region_name: {
                    required: "*** Region Name Is Required ***"
                },
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // $('#update').html('Updating..');
                $.ajax({
                    url: 'user_update',
                    type: "POST",
                    data: $('#edit_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#edit_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'User Update Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        setInterval('location.reload()', 2000);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    }
</script>
</body>
</html>










