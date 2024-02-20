<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class RegisterFormController extends Controller
{
    public function registration(Request $request){
        $inputData = $request->all();
        $response  = getApiResponse($inputData,'post','register');
//        dd($response);
        $data = $response;
        if(!$data['success'] && $data['status'] == 201 ){
            $res = ['msg' => "Please Fill Complete Form" ,'type' => 'danger'];
        }else{
            $res = ['msg' => "Your Registration Complete" ,'type' => 'success'];
        }
        session()->put($res);
        return redirect()->route('register-route');

    }


}
