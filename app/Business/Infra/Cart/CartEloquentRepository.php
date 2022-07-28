<?php

namespace App\Business\Infra\Cart;

use App\Models\Cart;
use App\Models\CartItem;
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

    public function addProduct(int $id, Product $product, int $quantity = 1): ?object
    {
        if ($this->isDuplicatedItem($id, $product->id) == false) {
            return $this->model->find($id)->item()->create(['product_id' => $product->id, 'quantity' => $quantity]);
        }
        return $this->changeQuantityItem($id, $product->id, $quantity);
    }

    public function removeProduct(int $id, Product $product, bool $all = false): bool
    {
        if ($all) {
            $this->model->find($id)->items()->where('product_id', $product->id)->delete();
        } else {
            $this->changeQuantityItem($id, $product->id, -1);
        }
        return true;
    }

    public function getItems(int $id): array
    {
        return $this->model->find($id)->items()->get()->toArray();
    }

    public function getCountItems(int $id): int
    {
        return $this->model->find($id)->items()->count();
    }

    public function getTotal(int $id): float
    {
        $sum = 0;
        foreach ($this->model->find($id)->items()->get() as $item) {
            $sum += Product::find($item->product_id)->value * $item->quantity;
        }
        return $sum;
    }


    public function isDuplicatedItem(int $cart, int $product): bool
    {
        return (CartItem::where('cart_id', $cart)->where('product_id', $product)->first() ? true : false);
    }


    public function changeQuantityItem($cart, $product, $quantity): ?object
    {
        $cartItem = CartItem::where('cart_id', $cart)->where('product_id', $product)->first();
        $cartItem->quantity += $quantity;
        $cartItem->save();
        return $cartItem;
    }
}
