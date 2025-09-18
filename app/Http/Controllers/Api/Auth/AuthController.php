<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Phiki\Token\Token;

class AuthController extends Controller
{
    public function login (Request $request) {
        $validate = Validator::make($request->all(),[
            'email' =>  'required|email',
            'password' => 'required|min:6|regex:/[0-9]/|regex:/[a-zA-Z]/'
        ]);

        if($validate->fails())
        {
            return api_error('Validation error!',$validate->errors(),422);
        }

        $user = User::where('email',$request->email)->first();

        if(!$user)
        {
            return api_error('Your credentials have not served',null,404);
        }

        if(!Hash::check($request->password, $user->password))
        {
            return api_error('Password is wrong!',null,401);
        }

        $token= $user->createToken('auth_token')->plainTextToken;

        $data = [
            'user'  => $user,
            'token' => $token,
            "token_type" => "Bearer"
        ];

        return api_success($data,'Login successful!',200);
    }
}
