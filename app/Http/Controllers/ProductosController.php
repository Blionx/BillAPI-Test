<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\Productos\ProductRepository as Product;

class ProductosController extends Controller
{
    public function __construct(Product $Product)
    {
        $this->productos= $Product;
    }
   public function index(request $request){
    return Response()->json($this->productos->all(),200);
   }
   public function creator(request $request){
    $info = $request->all();
    $attr = "denominacion,costo,precio";
    if(Helper::checkrequest($info,$attr)){
        return Response()->json($this->productos->create($info),201);
    }else{
        return Response()->json('bad_request',400);
    }
   }
   public function editor(request $request,$id){
    $info = $request->all();
    return Response()->json($this->productos->update($info,$id,'id'),200);
   }
   public function deletor(request $request , $id){
    return response()->json($this->productos->delete($id),200);
   }
   
}
