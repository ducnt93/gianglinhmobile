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
        <div id="login" class=" form">
            <section class="login_content">
                <form action="{{url('/admin/auth/login')}}" method="post">
                    {!! csrf_field() !!}
                    <h1>Quản trị website</h1>
                    <div>
                        @include('common.errors')
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Tên đăng nhập" autofocus
                               name="username" id="username" required value="{!! old('username') !!}"/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Mật khẩu"
                               name="password" id="password" required/>
                    </div>
                    <div>
                        <button class="btn btn-default submit" type="submit">Đăng nhập</button>
                        <a class="reset_pass" href="#">Quên mật khẩu?</a>
                        <p class="change_link">Bạn chưa có tài khoản ?
                            <a href="{{url('/admin/auth/register')}}" class="to_register"> Đăng ký </a>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>