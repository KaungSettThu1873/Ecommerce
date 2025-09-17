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
    public function index () {
        $users = User::orderBy('id')->paginate(10);

        return response()->json([
            'message' => 'success',
            'data' => $users
        ],200);
    }

    public function create(Request $request) {
        try{
               $validate = Validator::make($request->all(),
                [
                    'name' => 'required|min:5|max:40',
                    'email' => 'required|email|unique:users|max:40',
                    'password' => 'required|min:6|regex:/[0-9]/|regex:/[a-zA-Z]/',
                    'confirm_password' => 'required|min:6|same:password'
                ]);

                if($validate->fails())
                {
                    return response()->json([
                        'error' => $validate->errors()
                    ],422);
                }

                $data = $validate->validated();

                $user =  User::create(
                    [
                        "name" => $data['name'],
                        "email" => $data['email'],
                        "password" => $data['password']
                    ]);

                $user->assignRole('User');

                return response()->json(
                    [
                        'message' => "User created successfully!",
                        'data'    => $user
                    ],201);
        } catch (Exception $e) {
                    return response()->json(
                        [
                            'message' => 'Something went wrong!',
                            'error' => $e->getMessage()
                        ], 500);
        }
    }

    public function update(Request $request) {
        try {
            $user= User::find($request->id);

            if (!$user) {
                return response()->json([
                    'message' => 'User not found'
                ], 404);
            }

            $validate = Validator::make($request->all(),[
                    'name' => 'nullable|min:5|max:40',
                    'email' => 'nullable|max:40|unique:users,email,'. $user->id,
                    'password' => 'nullable|min:6|regex:/[0-9]/|regex:/[a-zA-Z]/',
                    'confirm_password' => 'nullable|min:6|same:password'
            ]);

            if($validate->fails()) {
                return response()->json([
                    'message' => $validate->errors()
                ],422);
            }

            $data = $validate->validated();

            $updateData = [
                'name' => $data['name'],
                'email' => $data['email'],
            ];

            if(!empty($data['password'])) {
                  $updateData['password'] = Hash::make($data['password']);
            }

            $user->update($updateData);

            return response()->json([
                'message' => 'user information updated',
                'data'    =>  $user
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function status($id) {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json(
                [
                    'message' => 'User not found'
                ], 404);
            }

            $user->status = $user->status == 0 ? 1 : 0 ;
            $user->save();

            return response()->json([
                'message' => 'User status updated!'
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ],500);
        }
    }
}
