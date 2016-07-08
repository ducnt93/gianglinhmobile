<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\CreateAdminRequest;
use App\Models\Admin;
use Flash;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }

    public function getAdd()
    {
        return view('admin.auth.register');
    }

    public function postAdd(CreateAdminRequest $request)
    {
        $user = new Admin();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->level = 2;
        $user->email = $request->email;
        $user->remember_token = $request->_token;
        $user->save();
        Flash::success('Tài khoản mới vừa được tạo. Vui lòng đăng nhập!');
        return redirect()->route('admin.auth.login');
    }

    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function postLogin(AdminLoginRequest $request)
    {
        $loginSuperAdmin = [
            'username' => $request->username,
            'password' => $request->password,
            'level' => 1
        ];
        $loginAdmin = [
            'username' => $request->username,
            'password' => $request->password,
            'level' => 2
        ];
        if (Auth::guard('admin')->attempt($loginSuperAdmin, $request->has('remember')) || Auth::guard('admin')->attempt($loginAdmin, $request->has('remember'))) {
            return redirect()->route('admin');
        } else {
            Flash::error('Tên đăng nhập hoặc mật khẩu không chính xác.');
            return redirect()->back();
        }
    }

    public function getLogout()
    {
        Auth::guard('admin')->logout();
        Flash::info('Đăng xuất thành công.');
        return redirect('admin/auth/login');
    }
}
