<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\DeleteRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(DeleteRequest $request)
    {
       $data = $request->validated();
        if(!isset( $data['ids'] )){
            return response()->json([
                'action'=>'alert',
                'message'=>'Ids not found in the request'
            ],500);
        }
        try{
            DB::beginTransaction();

            Product::whereIn('id',$data['ids'])->delete();
            
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return response()->json([
            'action'=>'update',
            'items'=>$data['ids'],
        ]);
    }
}
