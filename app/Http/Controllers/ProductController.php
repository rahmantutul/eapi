<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }
    
    public function index()
    {
        return ProductCollection::collection(Product::paginate(20));
    }
    public function create()
    {
        //
    }

    public function store(StoreProductRequest $request)
    {
        $product= new Product;
        $product->name=$request->name;
        $product->detail=$request->details;
        $product->stock=$request->stock;
        $product->price=$request->price;
        $product->discount=$request->discount;
        $product->save();
        return response(
            ['data'=>new ProductResource($product)],201
        );
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $request['detail']=$request->details;
        unset($request['details']);
        $product->update($request->all());
         return response(
            ['data'=>new ProductResource($product)],201
        );
    }

    public function destroy(Product $product)
    {
        $product->delete();
         return response()->json(["massage"=>"Product deleted"],203);
    }
}
