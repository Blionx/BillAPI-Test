<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturas extends Model {

    protected $table = 'facturas';

    public function detalle()
    {
        return $this->hasMany('App\Detalle','facturas_id','id');
    }

}