<?php

namespace Tests\Unit\App\Models;

use App\Models\DeliveryService;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class DeliveryServiceTest extends TestCase
{

    public function test_fillable()
    {
        $deliveryService = new DeliveryService();
        $fillable = [
            'cart_id',
        ];

        $diff = array_diff($fillable, $deliveryService->getFillable());

        $this->assertEmpty($diff);
    }



}
