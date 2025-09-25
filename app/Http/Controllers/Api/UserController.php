<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
/**
 * @OA\Get(
 *     path="/api/users ",
 *     summary="Get list of users",
 *     @OA\Response(response=200, description="Success")
 * )
 */
    public function index ()
    {
        $users = User::with(['userbanks'])->orderBy('id')->paginate(10);

        return api_success($users,'Successful!',200);
    }

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),
        [
            'name' => 'required|min:5|max:40',
            'email' => 'required|email|unique:users|max:40',
            'password' => 'required|min:6|regex:/[0-9]/|regex:/[a-zA-Z]/',
            'confirm_password' => 'required|min:6|same:password'
        ]);

        if($validate->fails())
        {
            return api_error('Validation error', $validate->errors(), 422);
        }

        try
        {
            $data = $validate->validated();

            $user =  User::create(
            [
                "name" => $data['name'],
                "email" => $data['email'],
                "password" => $data['password']
            ]);

            $user->assignRole('User');

            return api_success($user, 'User created successfully!', 201);
        } catch (Exception $e)
        {
            return api_error('Something went wrong!',$e->getMessage(),500);
        }
    }

    public function update(Request $request)
    {
        $user= User::find($request->id);

        if (!$user)
        {
            return api_error('User not found',null,404);
        }

        $validate = Validator::make($request->all(),[
            'name' => 'nullable|min:5|max:40',
            'email' => 'nullable|max:40|unique:users,email,'. $user->id,
            'password' => 'nullable|min:6|regex:/[0-9]/|regex:/[a-zA-Z]/',
            'confirm_password' => 'nullable|min:6|same:password'
        ]);

        if($validate->fails())
        {
            return api_error('Validation error',$validate->errors(),422);
        }

        try
        {
            $data = $validate->validated();

            $updateData = [
                'name' => $data['name'],
                'email' => $data['email'],
            ];

            if(!empty($data['password'])) {
                  $updateData['password'] = Hash::make($data['password']);
            }

            $user->update($updateData);

            return api_success($user,'User information updated!',201);
        } catch (Exception $e)
        {
            return api_error('Something went wrong!', $e->getMessage(),500);
        }
    }

    public function status($id) {
        try
        {
            $user = User::find($id);

            if (!$user)
            {
                return api_error('User not found!',null,404);
            }

            $user->status = $user->status == 0 ? 1 : 0 ;
            $user->save();

            return api_success($user,'User status updated!',200);
        } catch (Exception $e)
        {
            return api_error('Something went wrong!',$e->getMessage(),500);
        }
    }
}
