<?php

use Illuminate\Support\Facades\Http;

    function getGlobalConfig($key){
       return config("apiConfig.$key");
    }

function getApiResponse(array $data =[], string $method, string $action, bool $auhtorization = false, string $auth_token =''){
    $ApiDefaulURl       = getGlobalConfig('api_url');
    $authorizationArray = ['Authorization' =>'Bearer '.$auth_token];
    $url = $ApiDefaulURl.'/api/'.$action;

        if($method == 'post'):
            if($auhtorization){
                $response  = Http::withHeaders($authorizationArray)->post($url,$data);
            }else{
                $response  = Http::post($url,$data);
            }
        else:
            if($auhtorization){
                $response  = Http::withHeaders($authorizationArray)->get($url);
            }else{
                $response  = Http::get($url);
            }
        endif;

            if($response->successful()){
                return $response->json();
            }else{
                return $response;
            }
}
