<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,User $user)
    {
        if($request->ajax()){
            $view = view('admin.includes.user.edit')->with([
                'user'=>$user,
            ])->render();
            return response()->json([
                'view'=>$view,
                'action'=>'html-render',
            ]);
        }
        return back();
    }
}
