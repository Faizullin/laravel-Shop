<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $user = User::firstOrCreate([
            'email'=>$data['email'],
        ],$data);
        $view = view('admin.includes.user.create-template')->with([
            'user'=>$user,
        ])->render();
        return response()->json([
            'view'=>$view,
            'action'=>'html-render',
        ]);
    }
}