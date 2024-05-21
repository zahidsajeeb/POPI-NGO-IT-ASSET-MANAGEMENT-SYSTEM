<?php
$role = Auth::user()->role;
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <style>
        .error{
            color:red;
            font-weight:bold;
        }
        textarea{
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }
        .card{
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home - </span>Message </h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;"> Message History</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                <div class="media-chat-scrollable mb-3">
                                    <ul class="media-list media-chat">
                                        <li class="media content-divider justify-content-center text-muted mx-0">
                                            Today
                                        </li>
                                        @foreach($student_msg_data as $row)
                                            @if($role=='Assistant Counselor')
                                                @if($row->form=='Student')
                                                    <li class="media media-chat-item-reverse">
                                                        <div class="media-body">
                                                            <div class="media-chat-item">
                                                                {{$row->message}}
                                                            </div>
                                                            <div class="font-size-sm text-muted mt-2">{{$row->message_time}}
                                                                <a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a>
                                                            </div>
                                                        </div>

                                                        <div class="ml-3">
                                                            <a> <b> {{$row->student_id}} </b> </a> <br>
                                                            <span style="margin-top:5px !important;"><a href="javascript:void(0)" id="delete" data-id="<?php echo $row->id;?>" class="btn btn-danger btn-sm">
                                                                <i class="icon-trash ml-2"></i> Delete Chat</a>
                                                        </span>
                                                        </div>
                                                    </li>
                                                @endif
                                                @if(($row->form=='Assistant Counselor') || ($row->form=='Head Counselor') || ($row->form=='Counselor'))
                                                    <li class="media">
                                                        <div class="mr-3">
                                                            <a><b> {{$row->form}} </b> </a> <br>
                                                            <span style="margin-top:5px !important;"><a href="javascript:void(0)" id="delete" data-id="<?php echo $row->id;?>" class="btn btn-danger btn-sm">
                                                                    <i class="icon-trash ml-2"></i> Delete Chat</a>
                                                            </span>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="media-chat-item">{{$row->message}}</div>
                                                            <div class="font-size-sm text-muted mt-2">{{$row->message_time}}
                                                                <a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endif
                                            @if($role=='Student')
                                                @if($row->form=='Student')
                                                    <li class="media media-chat-item-reverse">
                                                        <div class="media-body">
                                                            <div class="media-chat-item">
                                                                {{$row->message}}
                                                            </div>
                                                            <div class="font-size-sm text-muted mt-2">{{$row->message_time}}
                                                                <a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a>
                                                            </div>
                                                        </div>

                                                        <div class="ml-3">
                                                            <a> {{$row->student_id}} </a>
                                                        </div>
                                                    </li>
                                                @endif
                                                @if(($row->form=='Assistant Counselor') || ($row->form=='Head Counselor') || ($row->form=='Counselor'))
                                                    <li class="media">
                                                        <div class="mr-3">
                                                            <a href="{{asset('backend/global_assets/images/demo/images/3.png')}}">
                                                                <img src="{{asset('backend/global_assets/images/demo/images/3.png')}}" class="rounded-circle" width="40" height="40" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="media-chat-item">{{$row->message}}</div>
                                                            <div class="font-size-sm text-muted mt-2">{{$row->message_time}}
                                                                <a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <form action="#" method="POST" id="messageForm">
                                    <textarea name="message" class="form-control mb-3" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                                    <input type="hidden" name="student_id" value="<?php echo $student_id;?>">
                                    <hr>
                                    <div class="text-right">
                                        <button type="submit" id="messageBtn" class="btn btn-lg btn-teal" style="border-radius:0px;"><b><i class="icon-paperplane"></i></b> Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
            @include('admin.include.footer')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        </div>
    </div>
</div>
</body>
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
            url: "message_store",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#messageForm').trigger("reset");
                swal({
                    icon: 'success',
                    title: 'Message Stored Successfully and You show your message after admin approval',
                    showConfirmButton: true,
                    timer: 5000
                });
                setInterval('location.reload()', 5000);
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
                    toastr.error("Message deleted successfully!!!");
                    setInterval('location.reload()', 3000);
                },
                error: function (data) {
                    console.log('Error:', data);
                },
            });
        }
    });
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
</html>







