<?php 

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{
    protected function successResponse($data , $code)
    {
        return response()->json($data , $code);
    }
    protected function errorResponse($msg , $code)
    {
        return response()->json(['error' => $msg , 'code' => $code] , $code);
    }
    protected function showAll(Collection $colllection , $code = 200)
    {
        return $this->successResponse(['data' => $colllection ] , $code);
    }
    protected function showOne(Model $model , $code = 200)
    {
        return $this->successResponse(['data' => $model ] , $code);
    }
}
?>