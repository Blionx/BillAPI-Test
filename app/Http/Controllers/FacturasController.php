<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Facturas;
use App\Clientes;
use App\Productos;
use App\Detalle;

class FacturasController extends Controller
{
   public function index(request $request){
    $bill = Facturas::get();
    $bills=[];
    foreach ($bill as $billkey) {
        $fac = (object)['cabecera'=>$billkey];
    $fac->detalle = $billkey->detalle()->get();
    array_push($bills, $fac);
    
    }
    return Response()->json($bills,200);
    
   }
   public function creator(request $request){
        if(Helper::checkbill($request->all())){
        $newbill = new Facturas;
        $newbill->clientes_id = $request->input('cabecera.cliente_id');
        $newbill->fecha = $request->input('cabecera.fecha');
        $newbill->total = 0;
        $newbill->save();
        $total = $newbill->total;
        foreach ($request->input('detalle') as $detail) {
            $newdetail = new Detalle;
            $newdetail->facturas_id = $newbill->id;
            $newdetail->productos_id = $detail['producto_id'];
            $newdetail->cantidad = $detail['cantidad'];
            $newdetail->precio = $detail['precio'];
            $newdetail->save();
            $subt = $newdetail->cantidad * $newdetail->precio;
            $total = $total+$subt;
            
        }
        $newbill= Facturas::find($newbill->id);
        $newbill->total = $total;
        $newbill->save();

        return Response()->json($newbill,201);
    }else{
        return Response()->json('badinput',401);
    }
    
     
   }

   
}
