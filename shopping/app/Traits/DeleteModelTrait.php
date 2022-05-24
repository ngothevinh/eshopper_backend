<?php
namespace App\Traits;
use Illuminate\Support\Facades\Log;

#Delete
trait DeleteModelTrait{
    public function deleteModelTrait($id,$model){
        try {
            $model->find($id)->delete();
            return response()->json([
                'code'=>200,
                'message'=>'success'
            ],200);
        }catch (\Exception $exception){
            Log::error('message' . $exception->getMessage(). '  line' .$exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'Xóa thất bại'
            ],500);
        }
    }
}
