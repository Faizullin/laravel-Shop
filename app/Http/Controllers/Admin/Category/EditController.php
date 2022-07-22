<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,Category $category)
    {
        if($request->ajax()){
            $view = view('admin.includes.category.edit')->with([
                'category'=>$category,
            ])->render();
            return response()->json([
                'view'=>$view,
                'action'=>'html-render',
            ]);
        }
        return back();
    }
}
