<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function getResetValidationMessages()
    {
        return [
            'password.required' => 'Mật khẩu không được để trống ',
            'password.confirmed' => 'Mật khẩu củ phải giống mật khẩu mới',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ];
    }

}
