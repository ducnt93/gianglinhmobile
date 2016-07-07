<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UserLoginRequest;
use App\User;
use Flash;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers;

    protected $redirectTo = '/';
    protected $redirectAfterLogout = '/member/auth/login';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'level' => 2,
            'remember_token' => $data['_token'],
        ]);
    }

    public function getAdd()
    {
        return view('production.auth.register');
    }

    public function postAdd(CreateUserRequest $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->level = 2;
        $user->email = $request->email;
        $user->remember_token = $request->_token;
        $user->save();
        Flash::success('Thêm thành viên thành công');
        return redirect()->route('member.auth.login');
    }

    public function getLogin()
    {
        return view('production.auth.login');
    }

    public function postLogin(UserLoginRequest $request)
    {
        $login = [
            'username' => $request->username,
            'password' => $request->password,
            'level' => 2
        ];
        if (Auth::attempt($login)) {
            return redirect()->route('/');
        } else {
            Flash::error('Tên đăng nhập hoặc mật khẩu không chính xác');
            return redirect()->back();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        Flash::info('Đăng xuất thành công');
        return redirect()->route('member.auth.login');
    }
}
