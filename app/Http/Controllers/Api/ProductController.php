<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::with('Category')->orderBy('id')->paginate(2);

        return api_success($data,'Successful',200);
    }

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'category_id' => 'required',
            'name'        => 'required|max:70,min:5',
            'img_path'    => 'required|mimes:jpeg,jpg,webp,png|max:5120',
            'price'       => 'required|max:40',
            'quantity'    => 'required|max:500',
            'instock'     => 'required',
        ]);

        if($validate->fails()) {
            return api_error('Validation error', $validate->errors(), 422);
        }

        $validatedData = $validate->validated();

        try
        {
            $path = $request->file('img_path')->store('products', 'public');

            $data = Product::create([
                'category_id' => $validatedData['category_id'],
                'name'        => $validatedData['name'],
                'img_path'    => $path,
                'price'       => $validatedData['price'],
                'quantity'    => $validatedData['quantity'],
                'instock'     => $validatedData['instock']
            ]);

            return api_success($data,'Product created successfully!', 201);
        } catch(Exception $e){
            return api_error('Something went wrong!',$e->getMessage(),500);
        }
    }

    public function update(Request $request)
    {
        $validate = Validator::make($request->all(),[
              'id'          => 'required',
              'category_id' => 'required',
              'name'        => 'required|max:70,min:5',
              'img_path'    => 'nullable|mimes:jpeg,jpg,webp,png|max:5120',
              'price'       => 'required|max:40',
              'quantity'    => 'required|max:500',
              'instock'     => 'required',
        ]);

        if($validate->fails())
        {
            return api_error('Validation error', $validate->errors(), 422);
        }

        try
        {
            $validatedData = $validate->validated();

            $data =[
                'category_id' => $validatedData['category_id'],
                'name'        => $validatedData['name'],
                'price'       => $validatedData['price'],
                'quantity'    => $validatedData['quantity'],
                'instock'     => $validatedData['instock']
            ];

            if($request->hasFile('img_path')) {
                    $path = $request->file('img_path')->store('products', 'public');
                    $data['img_path'] =  $path;
            }

            $updateData = Product::find($validatedData['id']);

            $updateData->update($data);

            return api_success($updateData,'Product information updated successful!',200);
        } catch (Exception $e)
        {
           return api_error('Something went wrong!',$e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
       $product =  Product::find($id);

       if(!$product) {
        return api_error('Product not found!',null,404);
       }

       $product->delete();
       return api_success(null,'Product deleted successfully!',200);
    }
}
