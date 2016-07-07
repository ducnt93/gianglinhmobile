<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class AdminController extends AppBaseController
{
    public function index()
    {
        Flash::success('Đăng nhập thành công!');
        return view('admin.home.index');
    }
}