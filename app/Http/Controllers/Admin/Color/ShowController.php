<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,Color $color)
    {
        if($request->ajax()){
            $view = view('admin.includes.color.show')->with([
                'color'=>$color,
            ]);
            return response()->json([
                'view'=>$view->render(),
                'action'=>'html-render',
            ]);
        }
        return redirect('admin.color.index');
    }
}
