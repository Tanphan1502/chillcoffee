<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;
    //protected $primaryKey; //them bien luu cot id

    public function __construct(Model $model)
    {
        $this->model = $model;
       // $this->primaryKey = $primaryKey; // khoi tao ten cot ID
    }
    public function find($id)
    {
        return $this->model->find($id);
    }
    public function all()
    {
        return $this->model->all();
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function update($id, array $data)
    {
        $model = $this->find($id);
        $model->update($data);
        return $model;
    }
    public function delete($id)
    {
        $item = $this->find($id);
        return $item ? $item->delete() : false;
    }
}
