<?php

namespace App\Business\Infra\CartItem;

use App\Models\CartItem;

class CartItemEloquentRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new CartItem();
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
    public function deleteById(int $id): bool
    {
        return $this->model->find($id)->delete();
    }
}
