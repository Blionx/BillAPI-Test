<?php namespace App\Repositories\Detalle;
 
use App\Repositories\RepositoryInterface;
use App\Repositories\Repository;
 
class DetalleRepository extends Repository {
 
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Detalle';
    }
}