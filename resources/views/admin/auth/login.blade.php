@extends('admin.auth.authmester')
@section('content')
    <div class="">
        <div id="wrapper">
            <div id="login" class=" form">
                <section class="login_content">
                    <form action="{{url('/admin/login')}}" method="post">
                        {!! csrf_field() !!}
                        <h1>Quản trị website</h1>
                        <div id="errors">
                            @include('flash::message')
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Tên đăng nhập" autofocus
                                   name="username" id="username" required value="{!! old('username') !!}"/>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Mật khẩu"
                                   name="password" id="password" required/>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div>
                            <p>
                                <label><input type="checkbox" id="remember" name="remember"> Ghi nhớ tài khoản
                                    của tôi.</label>
                            </p>
                        </div>
                        <hr>
                        <div>
                            <p>
                                <button class="btn btn-default submit" type="submit">Đăng nhập</button>
                                <a class="reset_pass" href="#">Quên mật khẩu?</a>
                            </p>
                            <p class="change_link">Bạn chưa có tài khoản ?
                                <a href="{{url('/admin/register')}}" class="to_register"> Đăng ký </a>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection