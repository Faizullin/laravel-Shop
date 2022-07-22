<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
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

        $category = Category::firstOrCreate([
            'title'=>$data['title'],
            'slug'=>Str::slug($data['title']),
        ],$data);
        $view = view('admin.includes.category.create-template')->with(['category',$category])->render();
        return response()->json([
            'action'=>'html-render',
            'view'=>$view,
        ]);
    }
}