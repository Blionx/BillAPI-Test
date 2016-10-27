<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Clientes;
use App\Productos;

class ClientesController extends Controller
{
   public function index(request $request){
    $clients = Clientes::get();
    return Response()->json($clients,200);
   }
   public function indexbills(request $request, $id){
    $billcontainer = Clientes::find($id)->facturas;
    $innerbill2=[];
    foreach ($billcontainer as $billkey) {
        $fac = (object)[];
        $fac->cabecera= $billkey;
        $fac->detalle = $billkey->detalle()->get();
        foreach ($fac->detalle as $detallekey) {
            $detallekey->productos = Productos::find($detallekey->productos_id);
        }
       
        
        array_push($innerbill2, $fac);
    }
    return Response()->json($innerbill2);
   }
   public function creator(request $request){
    $info = $request->all();
    $attr = "nombre,direccion,telefono";
    if(Helper::checkrequest($info,$attr)){
        $newClient = new Clientes;
        $newClient->nombre = $info['nombre'];
        $newClient->direccion= $info['direccion'];
        $newClient->telefono= $info['telefono'];
        $newClient->save();
        return Response()->json($newClient,201);
    }else{
        return Response()->json('bad_request',400);
    }
   }
   public function editor(request $request,$id){
    $oldClient = Clientes::find($id);

    if(count($oldClient)>0){
        $info = $request->all();
        $attr = "nombre,direccion,telefono";
        
        if(Helper::checkrequest($info,$attr)){
            $oldClient->nombre = $info['nombre'];
            $oldClient->direccion= $info['direccion'];
            $oldClient->telefono= $info['telefono'];
            $oldClient->save();
            return Response()->json($oldClient,200);
        }else{
            return Response()->json("bad_request",400);
        }
    }else{
        return Response()->json("Cliente_not_found",404);
    }
   }
   public function deletor(request $request , $id){
    $doomed = Clientes::find($id);
    if(count($doomed)>0){
        $doomed->delete();
        return Response()->json("",200);
    }else{
        return Response()->json("Cliente_not_found",404);
    }
   }
   
}
