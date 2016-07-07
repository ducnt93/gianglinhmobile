<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Giang Linh Mobile </title>

    <!-- Bootstrap -->
    <link href="{{url('/theme/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('/theme/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('/theme/production/css/custom.css')}}" rel="stylesheet">
</head>

<body style="background:#F7F7F7;">
<div class="">
    <div id="wrapper">
        <div id="register1" class=" form">
            <section class="login_content">
                <form action="{{url('/admin/auth/register')}}" method="post">
                    {!! csrf_field() !!}
                    <h1>Tạo tài khoản</h1>
                    <div>
                        @include('common.errors')
                    </div>
                    <div class=" {{ $errors->has('username') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" placeholder="Tên đăng nhập"
                               value="{!! old('username') !!}"
                               required="" name="username"/>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class=" {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" placeholder="Email" required=""
                               value="{!! old('email') !!}" name="email"/>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class=" {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control" placeholder="Password" required=""
                               name="password" value="{!! old('password') !!}"/>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                   {{-- <div class=" {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               placeholder="Comfirm password">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>--}}
                    <div>
                        <button class="btn btn-default submit" type="submit">Đăng ký</button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <p class="change_link">Bạn đã có tài khoản ?
                            <a href="{{url('/auth/login')}}" class="to_register"> Đăng nhập </a>
                        </p>
                        <div class="clearfix"></div>
                        <br/>
                        <div>
                            <h1><i class="fa fa-paw" style="font-size: 26px;"></i> GiangLinhMobile!</h1>

                            <p>©2016 Bản quyển thuộc Trung Đức.</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>