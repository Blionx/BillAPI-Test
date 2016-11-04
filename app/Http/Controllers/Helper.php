<?php

namespace App\Http\Controllers;

class Helper extends Controller
{
public static function checkrequest($info, $attr){
    $attributes=explode(',', $attr);
    foreach ($attributes as $atkey) {
        if(!isset($info[$atkey])){
            return false;
        }elseif($info[$atkey] == ""){
            return false;
        }
    }
    return true;
   }
   public static function checkbill($info){
    $cabecera = $info['cabecera'];
    if(!isset($cabecera['cliente_id']) || !isset($cabecera['fecha'])){
        return false;
    }elseif($cabecera['cliente_id'] =="" || $cabecera['fecha'] ==""){
        return false;
    }
    foreach ($info['detalle'] as $detalle) {
        if(!isset($detalle['producto_id']) || !isset($detalle['cantidad']) || !isset($detalle['denominacion']) || !isset($detalle['precio'])){
            return false;
        }elseif($detalle['producto_id'] == "" || $detalle['cantidad'] == "" || $detalle['denominacion'] == "" || $detalle['precio'] == "" ){
            return false;
        }
    }
    return true;
   }
}