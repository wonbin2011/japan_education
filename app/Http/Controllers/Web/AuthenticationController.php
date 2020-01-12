<?php
/**
 * Created by PhpStorm.
 * User: wonbin
 * Date: 2020/1/11
 * Time: 14:18
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\LineUser;

class AuthenticationController extends Controller {

    // documentation omitted
    public function getSocialRedirect($account)
    {
        try {
            return Socialite::with($account)->redirect();
        } catch (\InvalidArgumentException $e) {
            return redirect('/login');
        }
    }

    public function getSocialCallback($account)
    {
        // 从第三方 OAuth 回调中获取用户信息
        $socialUser = Socialite::driver($account)->stateless()->user();

        // 在本地 users 表中查询该用户来判断是否已存在
        $user = LineUser::where( 'provider_id', '=', $socialUser->id )
                    ->where( 'provider', '=', $account )
                    ->first();

        if (empty($user)) {
            // 如果该用户不存在则将其保存到 users 表
            $newUser = new LineUser();

            $newUser->name        = $socialUser->getName();
            $newUser->email       = $socialUser->getEmail()  ?: '';
            $newUser->avatar      = $socialUser->getAvatar();
            $newUser->provider    = $account;
            $newUser->provider_id = $socialUser->getId();

            $newUser->save();
            $user = $newUser;
        }

        // 手动登录该用户
        Auth::login( $user );

        // 登录成功后将用户重定向到首页
        return redirect('/');
    }



}