<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\StoreRequest;
use App\Models\Color;
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

        $color = Color::firstOrCreate([
            'title'=>$data['title'],
            'slug'=>Str::slug($data['title']),
        ],$data);
        $view = view('admin.includes.color.create-template')->with(['color',$color])->render();
        return response()->json([
            'action'=>'html-render',
            'view'=>$view,
        ]);
    }
}