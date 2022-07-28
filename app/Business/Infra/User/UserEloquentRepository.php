<?php

namespace App\Business\Infra\User;

use App\Models\Product;
use App\Models\User;

class UserEloquentRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function all(): array
    {
        return  $this->model->get()->toArray();
    }

    public function create(array $data): ?object
    {
        $this->model->fill($data);
        $this->model->save();
        return $this->model;
    }

    public function findById(int $id): ?object
    {
        return $this->model->find($id);
    }
    public function findByName(string $name): ?object
    {
        return $this->model->where('name',$name)->first();
    }
    public function deleteById(int $id): bool
    {
        return $this->model->find($id)->delete();
    }
}
