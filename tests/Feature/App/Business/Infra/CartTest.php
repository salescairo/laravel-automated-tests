<?php

namespace Tests\Feature\App\Business\Infra;

use App\Business\Infra\Cart\CartEloquentRepository;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Tests\TestCase;

class CartTest extends TestCase
{
    public function test_all()
    {
        $repository = new CartEloquentRepository();
        $all = $repository->all();
        $this->assertIsArray($all);
    }

    public function test_create()
    {
        $repository = new CartEloquentRepository();
        $cart01 = $repository->create(Cart::factory()->make()->getAttributes());
        $this->assertNotEmpty($cart01->id);
    }

    public function test_find_by_id()
    {
        $repository = new CartEloquentRepository();
        $cart01 = $repository->create(Cart::factory()->make()->getAttributes());

        $find = $repository->findById($cart01->id);
        $this->assertEquals($cart01->id, $find->id);
    }

    public function test_delete_by_id()
    {
        $repository = new CartEloquentRepository();
        $cart01 = $repository->create(Cart::factory()->make()->getAttributes());

        $repository->deleteById($cart01->id);
        $this->assertEmpty($repository->findById($cart01->id));
    }

    public function test_is_cart_empty()
    {
        $repository = new CartEloquentRepository();
        $cart01 = $repository->create(Cart::factory()->make()->getAttributes());

        $this->assertEmpty($repository->getItems($cart01->id));
    }

    public function test_cart_items_empty()
    {
        $repository = new CartEloquentRepository();
        $cart01 = $repository->create(Cart::factory()->make()->getAttributes());
        $repository->addItem($cart01->id,CartItem::factory()->make()->getAttributes());

        $this->assertNotEmpty($repository->getItems($cart01->id));
    }

    public function test_cart_total()
    {
        $repository = new CartEloquentRepository();
        $cart01 = $repository->create(Cart::factory()->make()->getAttributes());
        $repository->addProduct($cart01->id,Product::factory()->create(['value'=>10.0]),100);
        $this->assertEquals(1000.00,$repository->getTotal($cart01->id));
    }
}

