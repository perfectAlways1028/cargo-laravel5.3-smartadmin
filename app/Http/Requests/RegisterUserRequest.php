<?php
namespace App\Http\Requests;

use Illuminate\Http\Request;
class RegisterUserRequest extends Request
{
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
            'user' => 'required'
        ];
    }
}