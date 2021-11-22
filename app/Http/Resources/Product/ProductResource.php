<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return [
           'name'=>$this->name,
            'details' => $this->details,
            'price' => $this->price,
            'discount' => $this->discount,
            'total_price'=>(1-$this->discount/100)*$this->price,
            'stock' => $this->stock ==0 ? 'No stock!' : $this->stock,
            'rating'=>$this->reviews->count()>0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No rating yet!',
            'href'=>[
                'reviews'=>route('review.index',$this->id),
            ]
        ];
    }
}
