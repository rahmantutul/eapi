<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Http\Resources\Review\ReviewCollection;
use App\Http\Resources\Review\ReviewResource;
use App\Models\Product;

class ReviewController extends Controller
{
    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews);
    }

    public function create()
    {
        //
    }
    public function store(StoreReviewRequest $request, Product $product)
    {
       $review= new Review($request->all());
       $product->reviews()->save($review);
       return response([
           'data'=>new ReviewResource($review),
       ]);
    }

    public function show(Review $review)
    {
    }

    public function edit(Review $review)
    {
        //
    }

    public function update(UpdateReviewRequest $request,Product $product, Review $review)
    {
        $review->update($request->all());
        return response([
            'data'=>new ReviewResource($review),
        ]);
    }

    public function destroy(Product $product,Review $review)
    {
        $review->delete();
        return response([
            'data'=>"Review deleted!",
        ],200);
    }
}
