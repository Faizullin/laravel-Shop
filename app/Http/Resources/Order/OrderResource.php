<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap="order";
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'user'=> $this->user_id,
            'payment_status'=> $this->payment_status,
            'products'=>json_decode($this->products),
            'total_price'=>$this->total_price,
        ];
    }
    public $with=[
        'status'=>true,
        'message'=>"Ordered successfully"
    ];
}
