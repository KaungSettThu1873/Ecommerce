<?php

namespace App\Http\Controllers\Api;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::all();

        return api_success($banks,'Successful',200);
    }

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required|max:30',
        ]);

        if($validate->fails())
        {
            return api_error('Validation error', $validate->errors(), 422);
        }

        try
        {
            $validatedData = $validate->validated();

            $bank = Bank::create([
                'name' => $validatedData['name'],
                'status' => true
            ]);

            return api_success($bank,'Bank created successfully!',201);
        } catch (Exception $e)
        {
            return api_error('Something went wrong!',$e->getMessage(),500);
        }
    }

    public function update(Request $request)
    {
        $bank = Bank::find($request->id);

        if(!$bank) {
            return api_error('Bank id not found!', null, 404);
        }

        $validate = Validator::make($request->all(),[
            'name' => 'nullable,min:1',
            'status' => 'nullable'
        ]);

        if($validate->fails()) {
            return api_error('Validation error', $validate->errors(), 422);
        }

        try
        {
            $validatedData = $validate->validated();

             $bankUpdate=[
                'name' => $validatedData['name']
            ];

            if($validatedData) {
                $bankUpdate['status'] = $bankUpdate['status'] == 0 ? 1 : 0;
            }

            $bank->update($bankUpdate);

            return api_success($bank,'Bank updated successfully!',200);
        } catch (Exception $e)
        {
            return api_error('Something went wrong!',$e->getMessage(),500);
        }
    }
}
