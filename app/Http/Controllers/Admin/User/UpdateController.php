<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request,User $user)
    {
        $data =$request->validated();
        try{
            DB::beginTransaction();
            $user->update($data);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            abort(500);
        }
        $item = $user->toArray();
        $item['gender'] = $user->genderTitle;
        return response()->json([
            'action'=>'update',
            'item'=>$item,
        ]);
    }
}
