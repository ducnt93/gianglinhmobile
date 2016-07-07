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

    protected function create(array $data)
    {
        return Admin::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'level' => 1,
            'remember_token' => $data['_token'],
        ]);
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
        Flash::success('Thêm thành viên thành công');
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
            'username' => $request->email,
            'password' => $request->password,
            'level' => 2
        ];
        if (Auth::guard('admin')->attempt($loginSuperAdmin) || Auth::guard('admin')->attempt($loginAdmin)) {
            return redirect()->route('admin');
        } else {
            Flash::error('Tên đăng nhập hoặc mật khẩu không chính xác');
            return redirect()->back();
        }
        /*$this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (Auth::guard('admin')->attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles && !$lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);*/
    }

    public function getLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/auth/login');
    }
}
