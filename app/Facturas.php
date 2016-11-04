<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturas extends Model {
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cliente_id', 'fecha', 'total',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
    protected $table = 'facturas';

    public function detalle()
    {
        return $this->hasMany('App\Detalle','facturas_id','id');
    }

}