<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Order\StoreRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $password = Hash::make('12344321');
        $user = User::firstOrCreate([
            'email'=>$data['email'],
        ],[
            'name'=>$data['name'],
            'password'=>$password,
            'address'=>$data['address'],
        ]);
        $order = Order::create([
            'products'=> json_encode($data['products']),
            'user_id'=> $user->id,
            'total_price'=>$data['total_price'],
        ]);
        return new OrderResource($order);
    }
}
