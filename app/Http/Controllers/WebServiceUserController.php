<?php

namespace App\Http\Controllers\Api;


use App\User;
use App\Package;
use App\Http\Requests\RegisterUserRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebServiceUserController extends Controller
{
    public function __construct(){

    }

    public function serviceRegister(RegisterUserRequest $request)
    {
        $user     = strip_tags($request->input('user'));
        $password = strip_tags($request->input('password'));
        $email    = strip_tags($request->input('email'));

        $customerInfos = User::where('email', $email)->get();
        if (count($customerInfos) > 0) {
            return response()->json([
                'error' => "A user with the email $email already exists!"
            ]);
        }
        $insertStatus = User::insertGetId(
            [
                'name'           => $user
                , 'email'        => $email
                , 'password'     => $password
            ]
        );

        return response()->json($user, 200);
    }
}