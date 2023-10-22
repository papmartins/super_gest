<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class AbstractRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function getAllPaginate($paginate)
    {
        return $this->model->paginate($paginate);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function with($with)
    {
        return $this->model->with($with);
    }

    
    public function where($wheres)
    {
        foreach ($wheres as $where) {
            $this->model = $this->model->where($where[0], $where[1], $where[2]);

        }
        return $this;
    }
}