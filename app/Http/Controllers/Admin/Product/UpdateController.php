<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request,Product $product)
    {
        $data =$request->validated();
        try{
            DB::beginTransaction();
            $tag_ids = $data['tag_ids'];
            $color_ids = $data['color_ids'];
            $product_images = null;
            if(isset($data['product_images'])){
                $product_images = $data['product_images'];
            }
            unset($data['tag_ids'],$data['color_ids'], $data['product_images']);
            if(isset($data['preview_image'])){
                $data['preview_image'] = Storage::disk('public')->put('/img',$data['preview_image']);
                if($product->imageUrl){
                    Storage::disk('public')->delete('/img',$product->imageUrl);
                }
            }
            $product->update($data);
            $product->tags()->sync($tag_ids);
            $product->colors()->sync($color_ids);
            if( $product_images ){
                foreach ($product_images as $product_image) {
                    $current_images_count = ProductImage::where('product_id',$product->id)->count();
                    if($current_images_count>3){
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
            abort(500);
        }
        return response()->json([
            'action'=>'update',
            'item'=>$product,
        ]);
    }
}
