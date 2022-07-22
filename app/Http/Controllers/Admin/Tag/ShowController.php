<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,Tag $tag)
    {
        if($request->ajax()){
            $view = view('admin.includes.tag.show')->with([
                'tag'=>$tag,
            ]);
            return response()->json([
                'view'=>$view->render(),
                'action'=>'html-render',
            ]);
        }
        return redirect('admin.tag.index');
    }
}
