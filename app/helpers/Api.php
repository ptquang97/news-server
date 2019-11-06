<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/1/2019
 * Time: 3:33 PM
 */
namespace App\Helpers;

class Api {
    public static function r_response($data = [], $message = null, $code = 'S001', $status = 200) {
        return response()->json(['body' => $data, 'msg' => $message, 'code' => $code], $status,
            ['Content-type'=> 'application/json; charset=utf-8', 'Access-Control-Allow-Origin'=> '*'], JSON_UNESCAPED_UNICODE);
    }
}