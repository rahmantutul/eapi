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
    public function store(StoreReviewRequest $request)
    {
        //
    }

    public function show(Review $review)
    {
    }

    public function edit(Review $review)
    {
        //
    }

    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    public function destroy(Review $review)
    {
        //
    }
}
