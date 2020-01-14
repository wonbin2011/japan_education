<?php
/**
 * Created by PhpStorm.
 * User: wonbin
 * Date: 2020/1/13
 * Time: 17:39
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ProxyHelpers;
use App\Models\LineUser;
use Illuminate\Http\Request;

class ApiController extends Controller {

    use ProxyHelpers;


    public function __construct() {
        $this->middleware('passport.token')->except(['login']);
    }

    /*
     * login
     */
    public function login(Request $request)
    {
        // todo: validate params

        $user = (new LineUser())->findLoginRole($request->email);
        $role = (new \ReflectionClass($user))->getShortName();

        $tokens = $this->authenticate($role);

        //todo: 判断token
        return response()->json(['token' => $tokens, 'provider' => $role]);
    }

    public function register()
    {

    }

    /*
     * user info
     * */
    public function info()
    {
        return response()->json(request()->user());
    }

    public function teacherList()
    {

    }

    /*
     *  focus teacher
     */
    public function focus()
    {

    }

    /*
     * student list of a teacher
     */
    public function focusStudents()
    {

    }
}