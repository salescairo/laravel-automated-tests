<?php

namespace Tests\Unit\App\Models;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class CartItemTest extends TestCase
{
    private function model():Model
    {
        return new CartItem();
    }

    public function test_fillable()
    {
        $expected = [
            'cart_id',
            'product_id',
            'quantity',
        ];
        $this->assertEquals([],array_diff($expected,$this->model()->getFillable()));
    }



}
