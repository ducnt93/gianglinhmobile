<?php namespace App\Http\Controllers\Production;

use App\Http\Requests;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class HomeController extends AppBaseController
{
    public function index(){
        return view('production.home.index');
    }
}