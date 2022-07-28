<?php

namespace Tests\Feature\App\Business\Infra;

use App\Business\Infra\Product\ProductEloquentRepository;
use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_all()
    {
        $repository = new ProductEloquentRepository();
        $all = $repository->all();
        $this->assertIsArray($all);
    }

    public function test_create()
    {
        $repository = new ProductEloquentRepository();
        $product01 = $repository->create(Product::factory()->make()->getAttributes());
        $this->assertNotEmpty($product01->id);
    }

    public function test_find_by_id()
    {
        $repository = new ProductEloquentRepository();
        $product01 = $repository->create(Product::factory()->make()->getAttributes());

        $find = $repository->findById($product01->id);
        $this->assertEquals($product01->id, $find->id);
    }
    public function test_find_by_name()
    {
        $repository = new ProductEloquentRepository();
        $product01 = $repository->create(Product::factory()->make()->getAttributes());

        $find = $repository->findByName($product01->name);
        $this->assertEquals($product01->name, $find->name);
    }

    public function test_delete_by_id()
    {
        $repository = new ProductEloquentRepository();
        $product01 = $repository->create(Product::factory()->make()->getAttributes());

        $repository->deleteById($product01->id);
        $this->assertEmpty($repository->findById($product01->id));
    }
}
