<?php

namespace Tests\Unit\App\Models;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class CartItemTest extends TestCase
{

    public function test_fillable()
    {
        $cartItem = new CartItem();
        $fillable = [
            'cart_id',
            'product_id',
            'quantity',
        ];

        
        $diff = array_diff($fillable, $cartItem->getFillable());

        $this->assertEmpty($diff);
    }
}
