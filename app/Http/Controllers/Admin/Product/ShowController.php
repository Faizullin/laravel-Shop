<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowController extends Controller
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
            $view = view('admin.includes.product.show')->with([
                'product'=>$product,
            ]);
            return response()->json([
                'view'=>$view->render(),
                'action'=>'html-render',
            ]);
        }
        return redirect('admin.product.index');
    }
}
