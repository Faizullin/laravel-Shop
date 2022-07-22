<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,Product $product)
    {
        if($request->ajax()){
            $view = view('admin.includes.product.edit')->with([
                'product'=>$product,
                'categories'=>Category::all(),
                'tags'=>Tag::all(),
                "colors"=>Color::all(),
            ])->render();
            return response()->json([
                'view'=>$view,
                'action'=>'html-render',
            ]);
        }
        return back();
    }
}
