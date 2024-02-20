<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request){
        $inputData = $request->only('email','password');
        $response  = getApiResponse($inputData,'post','login');
                $data = $response;
                if($data['success'] && $data['status'] == 200 ){
                    $token = $data['data']['token'];
                    Cookie::queue('auth_token', $token, 90);
                    $res = ['msg' => 'User Login' ,'type'=>'success'];
                    session()->put($res);
                    return redirect()->route('dashboard-w');
                }else{
                    $res = ['msg' => "Please Enter Correct Email and Password" ,'type'=>'error '];
                    session()->put($res);
                    return redirect()->route('login-route');
                }

    }

    public function home(Request $request){
        $cookieToken  = $request->cookie('auth_token');
        $response  = getApiResponse([],'get','user-data',true,$cookieToken);
            $data = $response;
//            dd($data);
            return view('dashboard.dashboard')->with('data', $data);
    }



    public function logout(Request $request){
        $cookieToken  = $request->cookie('auth_token');
        $response  = getApiResponse([],'get','logout',true,$cookieToken);
            $data = $response;
            if($data['success'] && $data['status'] == 200 ){
                Cookie::queue(Cookie::forget('auth_token'));
                return redirect()->route('login-route');
            }else{
                $res = ['msg' => 'Sorry Something Went Wrong Try Again Later', 'type' => 'error '];
                session()->put($res);
                return redirect()->back();
            }
    }


    public function createListView(Request $request){
        return view('dashboard.create-list-view');
    }


    public function saveNewProduct(Request $request){
        $allData = $request->all();
        $cookieToken  = $request->cookie('auth_token');
        $response  = getApiResponse($allData,'post','save-new-product',true,$cookieToken);
        $data = $response;
        if($data['success'] && $data['status'] == 200 ) {
            $res = ['msg' => $data['message'] ,'type'=>'success'];
            session()->put($res);
            return redirect()->route('dashboard-w')->with('message',$data['message']);
        }else{
            $res = ['msg' => 'Sorry Something Went Wrong Try Again Later', 'type' => 'error '];
            session()->put($res);
            return redirect()->back();
        }

    }


    public  function deleteProduct(Request $request,$id){
        $cookieToken  = $request->cookie('auth_token');
        $response  = getApiResponse(['id'=>$id],'post',"delete-product",true,$cookieToken);
        $data = $response;
        if($data['success'] && $data['status'] == 200 ) {
            $res = ['msg' => $data['message'], 'type' => 'success'];
            session()->put($res);
            return redirect()->route('dashboard-w');
        }else{
            $res = ['msg' => 'Sorry Something Went Wrong Try Again Later', 'type' => 'error '];
            session()->put($res);
            return redirect()->back();
        }
    }

    public  function editProduct(Request $request,$id){
        $cookieToken  = $request->cookie('auth_token');
        $response  = getApiResponse(['id'=>$id],'post',"edit-product",true,$cookieToken);
        $data = $response;
            return view('dashboard.edit-list-view')->with('data', $data);
    }

    public function updateProduct(Request $request){
        $allData = $request->all();
        $cookieToken  = $request->cookie('auth_token');
        $response  = getApiResponse($allData,'post','update-product',true,$cookieToken);
        $data = $response;
//        dd($data);
        if($data['success'] && $data['status'] == 200 ) {
            $res = ['msg' => $data['message'], 'type' => 'success'];
            session()->put($res);
            return redirect()->route('dashboard-w');
        }else{
            $res = ['msg' => 'Sorry Something Went Wrong Try Again Later', 'type' => 'error '];
            session()->put($res);
            return redirect()->back();
        }
    }



}
