<?php

namespace App\Business\Infra\DeliveryService;

use App\Business\Service\ServiceType\Correios\CorreiosInterface;
use App\Models\Cart;
use App\Models\DeliveryService;
use App\Models\Product;
use App\Models\User;

class DeliveryServiceEloquentRepository
{
    protected $model;
    protected $service;

    public function __construct(CorreiosInterface $service)
    {
        $this->model = new DeliveryService();
        $this->service = $service;
    }

    public function all(): array
    {
        return  $this->model->get()->toArray();
    }

    public function create(array $data): ?object
    {
        if($this->findByCart($data['cart_id'])){
            return null;
        }
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
        return $this->model->where('cart_id', $cart)->first();
    }

    public function deleteById(int $id): bool
    {
        return $this->model->find($id)->delete();
    }

    public function getTotal(Cart $cart): float
    {
        $sum = 0;
        foreach ($cart->items()->get() as $item) {
            $sum += Product::find($item->product_id)->value * $item->quantity;
        }
        return $sum;
    }

    public function getTotalFee(Cart $cart): float
    {
        $sum = $this->getTotal($cart);
        if ($sum < 100) {
            $sum +=  $this->service->findCostByZipCode(User::find($cart->user_id)->address);
        }
        return $sum;
    }

}
