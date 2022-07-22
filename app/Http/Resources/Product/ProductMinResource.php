<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductMinResource extends JsonResource
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
            'id'=> $this->id,
            'title'=> $this->title,
            'description'=> $this->description,
            'content'=> $this->content,
            'image_url'=> $this->ImageUrl,
            'price'=> $this->price,
            'count'=> $this->count,
            'isPublished'=> $this->isPublished,
            'user'=> $this->user ,//? $this->user->name : null,
            'category'=>new CategoryResource($this->category),
            'colors'=> ColorResource::collection($this->colors) ,
        ];
    }
}
