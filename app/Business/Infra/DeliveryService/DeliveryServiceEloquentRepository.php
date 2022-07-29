<?php

namespace App\Business\Infra\DeliveryService;

use App\Models\DeliveryService;

class DeliveryServiceEloquentRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new DeliveryService();
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

    public function findByCart(int $cart): ?object
    {
        return $this->model->where('cart_id',$cart)->first();
    }

    public function deleteById(int $id): bool
    {
        return $this->model->find($id)->delete();
    }
}
