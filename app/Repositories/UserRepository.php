<?php

namespace App\Repositories;

class UserRepository extends AbstractRepository
{
    public function getByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

}