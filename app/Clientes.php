<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model {

    protected $table = 'clientes';

    public function facturas()
    {
        return $this->hasMany('App\Facturas');
    }

}