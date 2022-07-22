<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
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
    public function __invoke(Request $request,Tag $tag)
    {
        if($request->ajax()){
            $view = view('admin.includes.tag.edit')->with([
                'tag'=>$tag,
            ])->render();
            return response()->json([
                'view'=>$view,
                'action'=>'html-render',
            ]);
        }
        return back();
    }
}
