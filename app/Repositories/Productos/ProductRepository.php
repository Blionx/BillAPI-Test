<?php namespace App\Repositories\Productos;
 
use App\Repositories\RepositoryInterface;
use App\Repositories\Repository;
 
class ProductRepository extends Repository {
 
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Productos';
    }
}