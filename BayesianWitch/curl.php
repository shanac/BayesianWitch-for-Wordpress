<?php

class Curl{
  public static function get($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = new CurlResponse();
    $response->body = curl_exec($curl);
    $response->curl_error = curl_error($curl);
    $response->http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    return $response;
  }

  public static function put_json($url, $data){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Content-length: ".strlen($data)));
    $response = new CurlResponse();
    $response->body = curl_exec($curl);
    $response->curl_error = curl_error($curl);
    $response->http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    return $response;
  }
}

class CurlResponse{
  public $body;
  public $curl_error;
  public $http_code;
}