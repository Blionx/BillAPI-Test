<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model {
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'facturas_id', 'producto_id', 'cantidad', 'precio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
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