<?php

namespace zshttp\http;

class Http{
	public function __construct(){

	}
    /**
     * @param $url
     * @param array $data
     * @param string $method
     * @param string $auth
     * @return mixed
     */
    public static function _curl($url, $data = array(), $method = 'get',$auth='')
    {
        if($method == 'get'){
            $url = $url . '?' . http_build_query($data);
            $ch = curl_init((string)$url);
        }else{
            // post方式
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            if (!empty($data)) {
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }
        }
        if(!empty($auth)){
            curl_setopt($ch, CURLOPT_USERPWD, $auth);   //设置 API 帐号密码
        }
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT,30);
        // 跳过证书检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // 不从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}