<?php namespace App\Repositories\Usuarios;
 
use App\Repositories\RepositoryInterface;
use App\Repositories\Repository;
 
class userRepository extends Repository {
 
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\user';
    }
}