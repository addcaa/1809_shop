<?php

namespace App\Http\Controllers\Port;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class portController extends Controller
{
    public function log(){
        $data=[
            'name'=>'崔芳',
            'email'=>'3152185832@qq.com',
            'password'=>'fang',
        ];
        $json=json_encode($data);
        $method='AES-256-CBC';
        $key='cuifang';
        $iv='1wewsdfrdcsdertf';
        $openssl_ser=openssl_encrypt($json,$method,$key,OPENSSL_RAW_DATA,$iv);
        $res=base64_encode($openssl_ser);
        $url="http://fang.shop.com/login/log";
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$res);
        $res=curl_exec($ch);
        $re=curl_errno($ch);
        echo $re;

        curl_close($ch);
    }
}
