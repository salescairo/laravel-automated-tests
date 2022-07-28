<?php

namespace Tests\Unit\App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class ProductTest extends TestCase
{
    private function model():Model
    {
        return new Product();
    }

    public function test_fillable()
    {
        $expected = [
            'name',
            'value',
        ];
        $this->assertEquals([],array_diff($expected,$this->model()->getFillable()));
    }

    public function test_connection()
    {
        $this->assertEquals('mysql',$this->model()->getConnectionName());
    }



}
