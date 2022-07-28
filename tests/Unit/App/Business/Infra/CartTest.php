<?php

namespace Tests\Unit\App\Business\Infra;

use App\Business\Infra\Cart\CartEloquentRepository;
use App\Models\Cart;
use App\Models\Product;
use Tests\TestCase;

class CartTest extends TestCase
{
    private $repository;

    protected function setUp(): void
    {
        $this->repository = new CartEloquentRepository();
        parent::setUp();
    }

    public function test_all()
    {
        $all = $this->repository->all();
        
        $this->assertIsArray($all);
    }

    public function test_create()
    {
        $cart01 = $this->repository->create(Cart::factory()->make()->getAttributes());

        $this->assertNotEmpty($cart01->id);
    }

    public function test_find_by_id()
    {
        $cart01 = $this->repository->create(Cart::factory()->make()->getAttributes());

        $this->assertEquals($cart01->id, $this->repository->findById($cart01->id)->id);
    }

    public function test_delete_by_id()
    {
        $cart01 = $this->repository->create(Cart::factory()->make()->getAttributes());
        $this->repository->deleteById($cart01->id);

        $this->assertEmpty($this->repository->findById($cart01->id));
    }

    public function test_is_cart_empty()
    {
        $cart01 = $this->repository->create(Cart::factory()->make()->getAttributes());

        $this->assertEmpty($this->repository->getItems($cart01->id));
    }

    public function test_cart_items()
    {
        $cart01 = $this->repository->create(Cart::factory()->make()->getAttributes());
        $this->repository->addProduct($cart01->id,Product::factory()->create(['value'=>10.0]),100);

        $this->assertNotEmpty($this->repository->getItems($cart01->id));
    }

    public function test_cart_total()
    {
        $cart01 = $this->repository->create(Cart::factory()->make()->getAttributes());
        
        $product01 = Product::factory()->create(['value'=>10.0]);
        $product02 = Product::factory()->create(['value'=>10.0]);
        $product03 = Product::factory()->create(['value'=>20.0]);
        $product04 = Product::factory()->create(['value'=>5.0]);

        $this->repository->addProduct($cart01->id,$product01,100);
        $this->repository->addProduct($cart01->id,$product02,50);
        $this->repository->addProduct($cart01->id,$product03,100);
        $this->repository->addProduct($cart01->id,$product04,100);
        
        $this->assertEquals(4000.00,$this->repository->getTotal($cart01->id));
    }
    
    public function test_change_quantity_item()
    {
        $cart01 = $this->repository->create(Cart::factory()->make()->getAttributes());
        
        $product01 = Product::factory()->create(['value'=>10.0]);
        $this->repository->addProduct($cart01->id,$product01,50);
        $this->repository->addProduct($cart01->id,$product01);
        $this->repository->addProduct($cart01->id,$product01,30);

        $this->assertEquals(1,$this->repository->getCountItems($cart01->id));
    }
    public function test_total_value_change_quantity_item()
    {
        $product01 = Product::factory()->create(['value'=>10.0]);

        $cart01 = $this->repository->create(Cart::factory()->make()->getAttributes());

        $this->repository->addProduct($cart01->id,$product01,50);
        $this->repository->addProduct($cart01->id,$product01);
        $this->repository->addProduct($cart01->id,$product01,30);

        $this->assertEquals(810,$this->repository->getTotal($cart01->id));
    }

    public function test_remove_product()
    {
        $cart01 = $this->repository->create(Cart::factory()->make()->getAttributes());
        
        $product01 = Product::factory()->create(['value'=>10.0]);
        $product02 = Product::factory()->create(['value'=>10.0]);

        $this->repository->addProduct($cart01->id,$product01,100);
        $this->repository->addProduct($cart01->id,$product02,100);
        $this->repository->addProduct($cart01->id,$product02,100);

        $this->repository->removeProduct($cart01->id,$product01,true);

        $this->assertEquals(1,$this->repository->getCountItems($cart01->id));
    }
    
    public function test_remove_product_item()
    {
        $cart01 = $this->repository->create(Cart::factory()->make()->getAttributes());
        
        $product01 = Product::factory()->create(['value'=>2]);
        $product02 = Product::factory()->create(['value'=>2]);

        $this->repository->addProduct($cart01->id,$product01,2);
        $this->repository->addProduct($cart01->id,$product02,4);

        $this->repository->removeProduct($cart01->id,$product01,false);

        $this->assertEquals(10,$this->repository->getTotal($cart01->id));
    }
}

