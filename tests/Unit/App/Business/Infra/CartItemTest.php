<?php

namespace Tests\Unit\App\Business\Infra;

use App\Business\Infra\CartItem\CartItemEloquentRepository;
use App\Models\CartItem;
use Tests\TestCase;

class CartItemTest extends TestCase
{
    private $repository;

    protected function setUp(): void
    {
        $this->repository = new CartItemEloquentRepository();
        parent::setUp();
    }

    public function test_all()
    {
        $all = $this->repository->all();

        $this->assertIsArray($all);
    }

    public function test_create()
    {
        $cartItem01 = $this->repository->create(CartItem::factory()->make()->getAttributes());

        $this->assertNotEmpty($cartItem01->id);
    }

    public function test_find_by_id()
    {
        $cartItem01 = $this->repository->create(CartItem::factory()->make()->getAttributes());

        $this->assertEquals($cartItem01->id, $this->repository->findById($cartItem01->id)->id);
    }

    public function test_delete_by_id()
    {
        $cartItem01 = $this->repository->create(CartItem::factory()->make()->getAttributes());
        $this->repository->deleteById($cartItem01->id);
        
        $this->assertEmpty($this->repository->findById($cartItem01->id));
    }
}
