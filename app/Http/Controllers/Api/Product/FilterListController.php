<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class FilterListController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $colors = Color::all();

        $maxPrice = Product::orderBy('price',"DESC")->first()->price;
        $minPrice = Product::orderBy('price')->first()->price;

        $result = [
            'price'=>[
                'min'=>$minPrice,
                'max'=>$maxPrice,
            ],
            'categories'=>$categories,
            'tags'=>$tags,
            'colors'=>$colors,
        ];
        return response()->json(['data'=>$result,]);
    }
}
