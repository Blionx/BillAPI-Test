<?php namespace App\Repositories\Factura;
 
use App\Repositories\RepositoryInterface;
use App\Repositories\Repository;
 
class FacturasRepository extends Repository {
 
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Facturas';
    }
}