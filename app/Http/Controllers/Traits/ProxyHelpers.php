<?php

namespace App\Http\Controllers\Traits;

use GuzzleHttp\Client;
use App\Exceptions\UnauthorizedException;
use GuzzleHttp\Exception\RequestException;

trait ProxyHelpers
{
    public function  authenticate($provider = '')
    {
        $client = new Client();

        try {
            $url = request()->root() . '/oauth/token';

            $params = array_merge(config('passport.proxy'), [
                'username' => request('email'),
                'password' => request('password'),
            ]);

            if ($provider) {
                $params = array_merge($params,['provider' => $provider]);
            }


            $respond = $client->request('POST', $url, ['form_params' => $params]);
        } catch (RequestException $exception) {
            throw  new UnauthorizedException('请求失败，服务器错误');
        }

        if ($respond->getStatusCode() !== 401) {
            return json_decode($respond->getBody()->getContents(), true);
        }

        throw new UnauthorizedException('账号或密码错误');
    }
}