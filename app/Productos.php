<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model {
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'denominacion', 'costo', 'precio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $table = 'productos';

  
    public function facturas()
    {
    	return $this->hasMany('App\Detalle');
    }


}