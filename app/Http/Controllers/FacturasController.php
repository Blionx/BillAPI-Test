<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\Factura\FacturasRepository as Facturas;
use App\Repositories\Clientes\ClientsRepository as Client;
use App\Repositories\Productos\ProductRepository as Product;
use App\Repositories\Detalle\DetalleRepository as Detail;

class FacturasController extends Controller
{
    public function __construct(Client $clientes, Product $product, Detail $detail, Facturas $facturas)
    {
        $this->clientes= $clientes;
        $this->productos = $product;
        $this->detalle = $detail;
        $this->factura = $facturas;
    }
   public function index(request $request){
    $bill = $this->factura->all();
    $bills=[];
    foreach ($bill as $billkey) {
        $fac = (object)['cabecera'=>$billkey];
    $fac->detalle = $this->detalle->findspecial('facturas_id',$billkey->id);
    array_push($bills, $fac);
    
    }
    return Response()->json($bills,200);
    
   }
   public function creator(request $request){
    $info = $request->all();
    $total = 0;
        if(Helper::checkbill($info)){
            
        $newbill = $this->factura->create($info['cabecera']);
        foreach ($request->input('detalle') as $detail) {
            $detail['facturas_id']= $newbill->id;
            unset($detail['denominacion']);
            $newdetail = $this->detalle->create($detail);
            $subt = $newdetail->cantidad * $newdetail->precio;
            $total = $total+$subt;
            
        }
        $newbill = $this->factura->update(array('total'=>$total),$newbill->id,'id');

        return Response()->json($newbill,201);
    }else{
        return Response()->json('badinput',401);
    }
    
     
   }

   
}
