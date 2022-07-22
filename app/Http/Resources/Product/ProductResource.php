<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\Product\ProductImageResource;
use App\Http\Resources\Product\ProductMinResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $products = Product::where('group_id',$this->group_id)->get();
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=> $this->description,
            'content'=>$this->content,
            'image_url'=>$this->ImageUrl,
            'price'=>$this->price,
            'count'=>$this->count,
            'isPublished'=>$this->isPublished,
            'user'=>$this->user ,//? $this->user->name : null,
            'category'=>new CategoryResource($this->category),
            // 'colors'=> ColorResource::collection($this->colors) ,
            'group_products'=>ProductMinResource::collection($products),
            'product_images'=>ProductImageResource::collection($this->productImages),
        ];
    }
}
