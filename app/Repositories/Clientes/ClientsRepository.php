<?php namespace App\Repositories\Clientes;
 
use App\Repositories\RepositoryInterface;
use App\Repositories\Repository;
 
class ClientsRepository extends Repository {
 
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Clientes';
    }
}