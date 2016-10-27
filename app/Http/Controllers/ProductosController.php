<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Productos;

class ProductosController extends Controller
{
   public function index(request $request){
    $products = Productos::get();
    return Response()->json($products,200);
   }
   public function creator(request $request){
    $info = $request->all();
    $attr = "denominacion,costo,precio";
    if(Helper::checkrequest($info,$attr)){
        $newProduct = new Productos;
        $newProduct->denominacion = $info['denominacion'];
        $newProduct->costo= $info['costo'];
        $newProduct->precio= $info['precio'];
        $newProduct->save();
        return Response()->json($newProduct,201);
    }else{
        return Response()->json('bad_request',400);
    }
   }
   public function editor(request $request,$id){
    $oldProduct = Productos::find($id);

    if(count($oldProduct)>0){
        $info = $request->all();
        $attr = "denominacion,costo,precio";
        
        if(Helper::checkrequest($info,$attr)){
            $oldProduct->denominacion = $info['denominacion'];
            $oldProduct->costo= $info['costo'];
            $oldProduct->precio= $info['precio'];
            $oldProduct->save();
            return Response()->json($oldProduct,200);
        }else{
            return Response()->json("bad_request",400);
        }
    }else{
        return Response()->json("Cliente_not_found",404);
    }
   }
   public function deletor(request $request , $id){
    $doomed = Productos::find($id);
    if(count($doomed)>0){
        $doomed->delete();
        return Response()->json("",200);
    }else{
        return Response()->json("Cliente_not_found",404);
    }
   }
   
}
