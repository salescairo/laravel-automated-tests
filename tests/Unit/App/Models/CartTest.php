<?php

namespace Tests\Unit\App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class CartTest extends TestCase
{

    public function test_fillable()
    {
        $cart = new Cart();
        $fillable = [
            'user_id',
        ];

        $diff = array_diff($fillable, $cart->getFillable());

        $this->assertEmpty($diff);
    }



}
