<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model {

    protected $table = 'detalle';

    public function productos()
    {
        return $this->hasOne('App\Productos');
    }
    public function facturas()
    {
    	return $this->hasOne('App\Facturas');
    }


}