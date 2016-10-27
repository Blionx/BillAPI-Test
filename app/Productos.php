<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model {

    protected $table = 'productos';

  
    public function facturas()
    {
    	return $this->hasMany('App\Detalle');
    }


}