<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('login_form/vendors/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('login_form/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('login_form/css/responsive.css')}}">
    <title>POPI SOFTWARE</title>
</head>

<body>
<div class="body_wrapper frm-vh-md-100">
    <div class="formify_body" data-bg-color="#E3F0FF">
        <div class="f_content">
            <div class="container-fluid custom_container">
                <div class="row" style="margin-top:100px !important;">
                    <div class="col-lg-6 formify_content_left text-center">
                        <div class="formify_logo_wrapper">
                            <a href="#"></a>
                            <p></p>
                        </div>
                        <img class="img-fluid img" src="{{asset('login_form/img/popi.png')}}" style="width:459px, height:187px;">
                    </div>
                    <div class="col-lg-6 formify_content_right">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="formify_box ml-auto mr-auto">
                            <h4 class="form_title" style="text-align:center;">Sign in</h4>
                            <form class="login-form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="input_title" for="inputEmail">User ID:</label>
                                    <input id="email" type="text"
                                           class="form-control @error('user_name') is-invalid @enderror"
                                           name="user_name" value="{{ old('user_name') }}" required autocomplete="off">
                                    @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="input_title" for="inputPassword">Password</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn action_btn thm_btn">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('login_form/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('login_form/vendors/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('login_form/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('login_form/js/main.js')}}"></script>
</body>
</html>

