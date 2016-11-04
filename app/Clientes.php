<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model {
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'direccion', 'telefono',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
    protected $table = 'clientes';

    public function facturas()
    {
        return $this->hasMany('App\Facturas');
    }

}