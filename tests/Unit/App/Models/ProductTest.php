<?php

namespace Tests\Unit\App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_fillable()
    {
        $product = new Product();
        $fillable = [
            'name',
            'value',
        ];

        $diff = array_diff($fillable, $product->getFillable());

        $this->assertEmpty($diff);
    }



}
