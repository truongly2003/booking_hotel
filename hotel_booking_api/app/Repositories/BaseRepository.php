<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\IBaseRepository;
class BaseRepository implements IBaseRepository
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function getAll()
    {
        return  $this->model->all();
    }
    public function findById($id)
    {
        return  $this->model->find($id);
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function update($id, array $data)
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->update($data);
            return $model;
        }
        return null;
    }
    public function delete($id)
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->delete();
            return true;
        }
        return false;
    }
}
