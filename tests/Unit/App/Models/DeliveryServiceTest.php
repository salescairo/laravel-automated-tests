<?php

namespace Tests\Unit\App\Models;

use App\Models\DeliveryService;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class DeliveryServiceTest extends TestCase
{
    private function model():Model
    {
        return new DeliveryService();
    }

    public function test_fillable()
    {
        $expected = [
            'cart_id',
        ];
        $this->assertEquals([],array_diff($expected,$this->model()->getFillable()));
    }



}
