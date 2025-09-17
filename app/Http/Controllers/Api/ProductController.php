<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index() {
        $data = Product::with('Category')->orderBy('id')->paginate(2);

        return response()->json([
            'message' => 'Successful',
            'data'    => $data
        ],200);
    }

    public function create(Request $request) {
            $validate = Validator::make($request->all(),[
                'category_id' => 'required',
                'name'        => 'required|max:70,min:5',
                'img_path'    => 'required|mimes:jpeg,jpg,webp,png|max:5120',
                'price'       => 'required|max:40',
                'quantity'    => 'required|max:500',
                'instock'     => 'required',
            ]);

            if($validate->fails()) {
                return response()->json([
                    'message' => $validate->errors()
                ],422);
            }

            $validatedData = $validate->validated();

        try {

            $path = $request->file('img_path')->store('products', 'public');

            $data = Product::create([
                'category_id' => $validatedData['category_id'],
                'name'        => $validatedData['name'],
                'img_path'    => $path,
                'price'       => $validatedData['price'],
                'quantity'    => $validatedData['quantity'],
                'instock'     => $validatedData['instock']
            ]);

            return response()->json([
                'message' => 'Product created successfully!',
                'data'    => $data
            ],200);
        } catch(Exception $e){
            return response()->json([
                'message' => 'Something went wrong!',
                'error'   => $e->getMessage()
            ],500);
        }
    }
}
