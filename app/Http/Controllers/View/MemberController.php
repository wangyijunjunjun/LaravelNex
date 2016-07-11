<?php
/**
 * Created by PhpStorm.
 * User: wangyijun
 * Date: 7/11/16
 * Time: 6:26 AM
 */

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function toLogin(Request $request)
    {
        return view('login');
    }

    public function toRegister($value = '')
    {
        return View('register');
    }

}