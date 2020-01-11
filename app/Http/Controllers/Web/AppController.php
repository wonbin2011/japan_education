<?php
/**
 * Created by PhpStorm.
 * User: wonbin
 * Date: 2020/1/11
 * Time: 11:19
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller {

    public function getApp()
    {
        return view('app');
    }

    public function getLogin()
    {
        return view('login');
    }
}