<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Validator;
class ProductController extends Controller
{
    public function index(){
        return view('product.product');
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [

            'name' => 'required|unique:employees',
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => '400',
                'errors' => $validator->messages(),
            ]);
        } else {
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $image = $request->file('image');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads/product/'), $imageName);
                $product->image = '/uploads/product/' . $imageName;
            }
            $product->status = '1';
            $product->save();
            return response()->json([
                'status' => '200',
                'message' => 'new product upload successfully',
            ]);
        }
    }

}
