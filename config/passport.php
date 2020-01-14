<?php
/**
 * Created by PhpStorm.
 * User: wonbin
 * Date: 2020/1/13
 * Time: 22:17
 */


return [
    'proxy' => [
        'grant_type'    => env('OAUTH_GRANT_TYPE'),
        'client_id'     => env('OAUTH_CLIENT_ID'),
        'client_secret' => env('OAUTH_CLIENT_SECRET'),
        'scope'         => env('OAUTH_SCOPE', '*'),
    ],
];