<?php

namespace App\Repositories;

class SupplierRepository extends AbstractRepository
{
    
    public function getPaginate($query, $paginate)
    {
        return $query->paginate($paginate);
    }

}