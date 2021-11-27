<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'price' => $this->price,
            'details' => $this->detail,
            'discount' => $this->discount,
            'total_price'=>round((1-$this->discount/100)*$this->price,2),
            'stock' => $this->stock ==0 ? 'No stock!' : $this->stock,
            'rating'=>$this->reviews->count()>0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No rating yet!',
            'href'=>[
                'reviews'=>route('product.show',$this->id),
            ]
        ];
    }
}
