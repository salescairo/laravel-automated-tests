<?php

namespace App\Business\Infra\Cart;

use App\Models\Cart;
use App\Models\Product;

class CartEloquentRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Cart();
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

    public function addItem(int $id, array $data): ?object
    {
        return $this->model->find($id)->item()->create($data);
    }

    public function addProduct(int $id, Product $product, int $quantity): ?object
    {
        return $this->model->find($id)->item()->create(['product_id' => $product->id, 'quantity' => $quantity]);
    }

    public function getItems(int $id): array
    {
        return $this->model->find($id)->items()->get()->toArray();
    }

    public function getTotal(int $id): float
    {
        $sum = 0;
        foreach ($this->model->find($id)->items()->get() as $item) {
            $sum += Product::find($item->product_id)->value * $item->quantity;
        }
        return $sum;
    }
}
