<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        $data['user_id'] = User::where('name','admin')->first()->id;
        try {
            DB::beginTransaction();
            $tag_ids=$data['tag_ids'];
            $color_ids=$data['color_ids'];
            $product_images = $data['product_images'];
            unset($data['tag_ids'],$data['color_ids'],$data['product_images']);
            if(isset($data['preview_image'])){
                $data['preview_image'] = Storage::disk('public')->put('/img',$data['preview_image']);
            }
            
            $product = Product::firstOrCreate(['title'=>$data['title']],$data);
            $product->tags()->attach($tag_ids);
            $product->colors()->attach($color_ids);
            if(isset($data['product_images'])){
                foreach ($product_images as $product_image) {
                    $current_images_count = ProductImage::where('product_id',$product->id)->count();
                    if( $current_images_count >3){
                        continue;
                    }
                    $file_path = Storage::disk('public')->put('/img',$product_image );
                    ProductImage::create([
                        'product_id'=>$product->id,
                        'file_path'=>$file_path,
                    ]);
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'action'=>'alert',
                'message'=>$e,
            ]);
            abort(500);
        }
        return response()->json([
            'action'=>'html-render',
            'view'=>view('admin.includes.product.create-template')->with([
                'product'=>$product,
            ])->render(),
        ]);
    }
}