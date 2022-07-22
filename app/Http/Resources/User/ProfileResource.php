<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Order\OrderResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'user';
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'access_token'=>$this->token,
            'email'=>$this->email,
            'name'=>$this->name,
            'surname'=> $this->surname,
            'age'=> $this->age,
            'address'=> $this->address,
            'roleTitle'=> $this->roleTitle,
            'roleId'=> $this->roleId,
            'orders'=> OrderResource::collection($this->orders),
        ];
    }
}
