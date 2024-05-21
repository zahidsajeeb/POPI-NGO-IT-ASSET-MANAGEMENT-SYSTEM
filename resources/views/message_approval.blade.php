<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <style>
        .card {
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold"> Home</span> - New Message</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('student')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">New Message List</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table border="1" class="table table-bordered" id="message_table">
                                        <thead style="background:#194d83; color:white;">
                                        <tr style="border:1px solid;">
                                            <th style="width:5% !important;">Sl No</th>
                                            <th style="width:10% !important;">Student ID</th>
                                            <th style="width:15% !important;">Message Time</th>
                                            <th style="width:25% !important;">Message Details</th>
                                            <th style="width:25% !important;">Reply</th>
                                            <th style="width:20% !important;" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pending_message as $key=>$row)
                                                <tr>
                                                    <form action="#" method="POST" id="messageForm">
{{--                                                        @csrf--}}
                                                    <td>{{++$key}}</td>
                                                    <td>{{$row->student_id}}</td>
                                                    <td>{{$row->message_time}}</td>
                                                    <td>{{$row->message}}</td>
                                                    <td>
                                                        <textarea name="message" class="form-control" required style="width:100%;"></textarea>
                                                        <input type="hidden" name="student_id" value="<?php echo $row->student_id;?>">
                                                        <input type="hidden" name="id" value="<?php echo $row->id;?>">
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-teal btn-labeled btn-labeled-right ml-auto" id="messageBtn"><b><i class="fa fa-paper-plane"></i></b> Message Send</button>
{{--                                                        <a href="{{url('message_approval_store', $row->id)}}" class="btn btn-success btn-sm" onclick="myFunction()"><i class="icon-trash ml-2"></i></a>--}}
{{--                                                        <a href="{{url('message_delete', $row->id)}}" class="btn btn-danger btn-labeled btn-labeled-right ml-auto" onclick="deleteFile()"><b><i class="icon-trash"></i></b> Delete</a>--}}
                                                        <a href="javascript:void(0)" id="delete" data-id="<?php echo $row->id;?>" class="btn btn-danger btn-labeled btn-labeled-right ml-auto"><b><i class="icon-trash"></i></b> Delete</a>
                                                    </td>
                                                    </form>
                                                </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.include.footer')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function () {
        $('#message_table').DataTable();
    });
    function myFunction() {
        alert("Press a button!");
    };
    function deleteFile() {
        alert("Are you sure delete this message !!!!!!!!!!!!!");
    }
    //(+++++++++ Toaster Message ++++++++++++++)
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
<script>
    var SITEURL = '{{URL::to('')}}';
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });
    $('#messageBtn').click(function (e) {
        e.preventDefault();
        $.ajax({
            data: $('#messageForm').serialize(),
            url: "approval_message_store",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#messageForm').trigger("reset");
                swal({
                    icon: 'success',
                    title: 'Message Stored Successfully.',
                    showConfirmButton: true,
                    timer: 5000
                });
                setInterval('location.reload()', 2500);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '#delete', function () {
        if (confirm("Do you really want to delete this item?")) {
            var id = $(this).data("id");
            $.ajax({
                type: "get",
                url: "message_delete/" + id,
                success: function (data) {
                    var oTable = $('.general_pending_table').dataTable();
                    oTable.fnDraw(false);
                    toastr.error("Data deleted successfully!!!");
                    setInterval('location.reload()', 3000);
                },
                error: function (data) {
                    console.log('Error:', data);
                },
            });
        }
    });
    //************* Toaster Message ****************)
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif


</script>
</html>



