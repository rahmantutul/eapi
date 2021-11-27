<?php

namespace App\Exceptions;

use Facade\FlareClient\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($request, $e){
        if( $this->isMethod($e) ){
           return $this->modelResponse();
        }
        if($this->isModel($e)){
            return $this->methodResponse();
        }
    }

    protected function isMethod($e){
        return $e instanceof ModelNotFoundException;
    }
      public function isModel($e){
        return $e instanceof NotFoundHttpException;
    }
    protected function modelResponse(){
        return response()->json(['errors'=>"Model not found"],421);
    }
    protected function methodResponse(){
         return response()->json(['errors'=>"Url not found"],500);
    }
}