<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Productos;
use App\Repositories\Clientes\ClientsRepository as Client;

class ClientesController extends Controller
{
    public function __construct(Client $clientes)
    {
        $this->clientes= $clientes;
    }
   public function index(request $request){
    return Response()->json($this->clientes->all());
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
        $newClient=  $this->clientes->create($info);
        return Response()->json($newClient,201);
    }else{
        return Response()->json('bad_request',400);
    }
   }
   public function editor(request $request,$id){
    $info = $request->all();
    $oldClient=  $this->clientes->update($info,$id,'id');
    return Response()->json($oldClient,200);
   
   }
   public function deletor(request $request , $id){
    $doomed=  $this->clientes->delete($id);
    return Response()->json($doomed,200);
   }
   
}
