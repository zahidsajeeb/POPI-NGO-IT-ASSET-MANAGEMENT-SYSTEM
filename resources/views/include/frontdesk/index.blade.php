<style>
    input{
        border-color: #604c4c69 !important;
    }
</style>
<div class="page-content">
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome To Visa Software (Operator Panel) </h4>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="alert alert-secondary" role="alert" style="list-style:none; border-radius:0px; background:darkred !important; color:whitesmoke;",><i class="fa fa-close"></i> {{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" style="font-weight:bold;text-align:center;">Front Desk Input</h4>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('frontdesk_store')}}" method="POST" id="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label style="font-weight:bold;">System Generated Token:<b style="color:red;">(***Please click here Token is available or not***)</b></label>
                                        <input type="text" class="form-control required" id="token" name="student_id" value="STU-<?php echo bin2hex(random_bytes(4));?>" readonly>
                                        <span id="error_email"></span>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight:bold;">Student Name:</label>
                                        <input type="text" class="form-control required" name="student_name" value="{{ old('student_name') }}" autocomplete="off" placeholder="Please Enter Student Name . . .">
                                        <input type="hidden" class="form-control required" name="last_id" value="{{ $last_id->id}}">
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight:bold;">Student Email:</label>
                                        <input type="email" class="form-control required" name="student_email" value="{{ old('student_email') }}" autocomplete="off" placeholder="Please Enter Student Email . . .">
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight:bold;">Date of Birth:</label>
                                        <input type="date" class="form-control date12 required" name="dob" value="{{ old('dob') }}" autocomplete="off" placeholder="Please Enter DOB . . .">
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight:bold;">Phone No:</label>
                                        <input type="text" class="form-control phone required" name="phone_no" value="{{ old('phone_no') }}" autocomplete="off" onkeyup="validatePhone(this);"  pattern="\d{10}" maxlength="11" placeholder="Please Enter Phone No . . .">
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight:bold;">Counselor Choose :</label>
                                        <select class="custom-select required" name="counselor_name" style="border-radius:0px !important; border-color: #604c4c69 !important;">
                                            <option disabled selected value="">---Select Counselor---</option>
                                            @foreach($counselor as $row):
                                            <option value="{{$row->counter_no}}">Counter-{{$row->counter_no.'('.$row->counselor_name.')'}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight:bold;">Purpose :</label>
                                        <select class="custom-select required" name="purpose" style="border-radius:0px !important; border-color: #604c4c69 !important;">
                                            <option disabled selected value="">---Select Purpose---</option>
                                            <option value="Student Visa">Student Visa</option>
                                            <option value="Immigration">Immigration</option>
                                            <option value="Medi Tourism">Medi Tourism</option>
                                            <option value="Job Search">Job Search</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight:bold;">Image Upload : <span style="color:red;">***(Max file upload size: 1MB = 1024)***</span></label>
                                        <input type="file" class="form-control required" name="student_img" placeholder="Please Enter Image . . .">
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" style="border-radius:0px;"><i class="icon icon-checkbox-checked"></i> Submit </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#token').click(function () {
            var APP_URL = $('meta[name="_base_url"]').attr('content');
            var error_email = '';
            var token = $('#token').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ url('token_available') }}",
                method: "POST",
                data: {token: token, _token: _token},
                success: function (result) {
                    if (result != 'not_unique') {
                        $('#error_email').html('<label class="text-success font-bold">(***Student ID is available***)</label>');
                        $('#token').removeClass('has-error');
                        $('#register').attr('disabled', false);
                    }
                    if (result == 'not_unique') {
                        $('#error_email').html('<label class="text-danger font-bold">(***Student ID Already in Database***)</label>');
                        $('#token').addClass('has-error');
                        $('#error_email').removeClass('has-error');
                        $('#register').attr('disabled', 'disabled');
                    }

                }
            })
        });
    });

    //************(Form Validation)**************
    $(document).ready(function () {
        $('#form').validate({
            rules: {
                student_name: {
                    required: true,
                },
                student_email: {
                    required: true,
                },
                counselor_name: {
                    required: true,
                },
            },
            messages: {
                student_name: {
                    required: "(***Student Name is required***)"
                },
                student_email: {
                    required: "(***Student Email is required***)"
                },
                counselor_name: {
                    required: "(***Counselor Name is required***)"
                },
            },
            highlight: function (element, errorClass) {
                $(element).closest(".form-group").addClass("has-error");
            },
            unhighlight: function (element, errorClass) {
                $(element).closest(".form-group").removeClass("has-error");
            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent().next());
            },
            errorPlacement: function (error, element) {
                if (element.attr("type") == "checkbox") {
                    element.closest(".form-group").children(0).prepend(error);
                } else
                    error.insertAfter(element);
            }
        });
    });

    function validatePhone(){
        if($(".phone").val() == ""){
            phoneerror = "Please enter phone number";
        } else if ($(".phone").val().length !== 11){
            phoneerror = "Must be 10 Digits";
        } else if(!($.isNumeric($(".phone").val())) && $(".phone").val() != ""){
            phoneerror = "this field cannot contain letters";

        }else {
            phoneerror = "";
        }
        console.log(phoneerror);
        return phoneerror;
    }
</script>

