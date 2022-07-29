<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\DeliveryService;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryServiceFactory extends Factory
{
    protected $model = DeliveryService::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cart_id' => Cart::factory()->create()->id,
        ];
    }
}
