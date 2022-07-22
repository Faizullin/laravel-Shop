<?php

namespace App\Http\Controllers\Api\Color;

use App\Http\Controllers\Controller;
use App\Http\Resources\Color\ColorResource;
use App\Models\Color;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $colors = Color::all();
        return ColorResource::collection($colors);
    }
}
