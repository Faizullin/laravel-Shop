<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Models\Tag;
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
        $$data = $request->validated();

        $tag = category::firstOrCreate([
            'title'=>$data['title'],
            'slug'=>Str::slug($data['title']),
        ],$data);
        $view = view('admin.includes.tag.create-template')->with(['tag',$tag])->render();
        return response()->json([
            'action'=>'html-render',
            'view'=>$view,
        ]);
    }
}
