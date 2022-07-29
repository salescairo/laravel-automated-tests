<?php

namespace Tests\Unit\App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class CartTest extends TestCase
{
    private function model():Model
    {
        return new Cart();
    }

    public function test_fillable()
    {
        $expected = [
            'user_id',
        ];
        $this->assertEquals([],array_diff($expected,$this->model()->getFillable()));
    }



}
