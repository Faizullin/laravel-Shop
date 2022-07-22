<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MultiDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            if($request->has('ids')){
                $tag_ids = $request->input('ids');
            }else{
                return response(['action'=>'alert','data'=>"Not found ids[]"]);
            }
            
        } catch (\Exception $exception) {
            return response(['action'=>'alert','data'=>$exception->getMessage()]);
        }
        try{
            DB::beginTransaction();

            Tag::whereIn('id',$tag_ids)->delete();
            
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return response()->json(['action'=>'update']);
    }
}
