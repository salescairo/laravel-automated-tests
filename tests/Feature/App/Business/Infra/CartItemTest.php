<?php

namespace Tests\Feature\App\Business\Infra;

use App\Business\Infra\CartItem\CartItemEloquentRepository;
use App\Models\CartItem;
use Tests\TestCase;

class CartItemTest extends TestCase
{
    public function test_all()
    {
        $repository = new CartItemEloquentRepository();
        $all = $repository->all();
        $this->assertIsArray($all);
    }

    public function test_create()
    {
        $repository = new CartItemEloquentRepository();
        $cartItem01 = $repository->create(CartItem::factory()->make()->getAttributes());
        $this->assertNotEmpty($cartItem01->id);
    }

    public function test_find_by_id()
    {
        $repository = new CartItemEloquentRepository();
        $cartItem01 = $repository->create(CartItem::factory()->make()->getAttributes());

        $find = $repository->findById($cartItem01->id);
        $this->assertEquals($cartItem01->id, $find->id);
    }

    public function test_delete_by_id()
    {
        $repository = new CartItemEloquentRepository();
        $cartItem01 = $repository->create(CartItem::factory()->make()->getAttributes());

        $repository->deleteById($cartItem01->id);
        $this->assertEmpty($repository->findById($cartItem01->id));
    }
}
