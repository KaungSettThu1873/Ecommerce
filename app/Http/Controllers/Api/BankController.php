<?php

namespace App\Http\Controllers\Api;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    public function index() {
        $banks = Bank::all();

        return response()->json([
            'message' => 'successful',
            'data' => $banks
        ],200);
    }

    public function create(Request $request) {
        $validate = Validator::make($request->all(),[
            'name' => 'required|max:30',
        ]);

        if($validate->fails()) {
            return response()->json([
                'message' => $validate->errors()
            ],422);
        }

        $validatedData = $validate->validated();

        $bank = Bank::create([
            'name' => $validatedData['name'],
            'status' => true
        ]);

        return response()->json([
            "message" => "Bank created successfully!",
            "data"    => $bank
        ],201);
    }

    public function update(Request $request) {
        $bank = Bank::find($request->id);

        if(!$bank) {
            return response()->json([
                'message' => 'Bank id not found!'
            ],404);
        }

        $validate = Validator::make($request->all(),[
            'name' => 'nullable,min:1',
            'status' => 'nullable'
        ]);

        if($validate->fails()) {
            return response()->json([
                'message' => $validate->errors()
            ],422);
        }

        $validatedData = $validate->validated();

        $bankUpdate=[
            'name' => $validatedData['name']
        ];

        if($validatedData) {
            $bankUpdate['status'] = $bankUpdate['status'] == 0 ? 1 : 0;
        }

        $bank->update($bankUpdate);


        return response()->json([
            'message' => 'Bank updated successfully!',
            'data'    =>  $bankUpdate
        ],200);
    }
}
