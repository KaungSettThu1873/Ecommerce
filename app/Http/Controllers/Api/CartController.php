<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index($id) {

        $user= User::with('carts')->find($id);

        if(!$user) {
            return api_error('User not Found!',null,404);
        }

        $data=[];

        foreach($user->carts as $item) {
             $data[]= $item;
        }

        if(!$data) {
            return api_error('Have not carts!',null,402);
        }

        return api_success($data,"Successful",200);
    }
}
