<?php

require_once './vendor/autoload.php';
use zshttp\http\Http;
$url = 'web site url';
$param['id'] = 15;
$data = Http::_curl($url,$param);
print_r($data);