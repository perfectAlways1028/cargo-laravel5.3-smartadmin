<?php

namespace App\Http\Controllers\Api;


use App\User;
use App\Package;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebServiceUserController extends Controller
{
    public function __construct(){

    }

    public function serviceRegister(Request $request)
    {
        $user     = strip_tags($request->input('user'));
        $password = strip_tags($request->input('password'));
        $email    = strip_tags($request->input('email'));

        if($email === "" || $password === "")
            return response()->json([
                'error' => "Email is not valid!"
            ], 422);
        $customerInfos = User::where('email', $email)->get();
        if (count($customerInfos) > 0) {
            return response()->json([
                'error' => "A user with the email $email already exists!"
            ], 203);
        }
        $insertStatus = User::insertGetId(
            [
                'name'           => $user
                , 'email'        => $email
                , 'password'     => $password
            ]
        );

        return response()->json(['data' => [ 'user_id' => $insertStatus ] ], 201);
    }

    public function servicePackages(Request $request) {
        $customerId = strip_tags($request->input('customer_id'));
        if($customerId === ""){
             return response()->json([
                'error' => "CustomerId is not valid!"
            ], 422);
        }     
        $data = User::where('id', $customerId)->first();
        if($data) {
            $data = $data->packages();
        }else {
           return response()->json(['error' => "No Customer found."], 422 );
        }         
        return response()->json(['data' => $data], 200);
    }
    public function serviceGiftcards(Request $request) {
        $customerId = strip_tags($request->input('customer_id'));
        if($customerId === ""){
             return response()->json([
                'error' => "CustomerId is not valid!"
            ], 422);
        }     
        $data = User::where('id', $customerId)->first();
        if($data) {
            $data = $data->giftcards();
        }else {
            return response()->json(['error' => "No Customer found."], 422 );
        }
        return response()->json(['data' => $data], 200);
    }
}