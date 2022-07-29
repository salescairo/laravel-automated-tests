<?php

namespace Tests\Unit\App\Business\Infra;

use App\Business\Infra\Product\ProductEloquentRepository;
use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{

    private $repository;

    protected function setUp(): void
    {
        $this->repository = new ProductEloquentRepository();
        parent::setUp();
    }

    public function test_all()
    {
        $all = $this->repository->all();
        
        $this->assertIsArray($all);
    }

    public function test_create()
    {
        $product01 = $this->repository->create(Product::factory()->make()->getAttributes());

        $this->assertNotEmpty($product01->id);
    }

    public function test_find_by_id()
    {
        $product01 = $this->repository->create(Product::factory()->make()->getAttributes());

        $this->assertEquals($product01->id, $this->repository->findById($product01->id)->id);
    }
    public function test_find_by_name()
    {
        $product01 = $this->repository->create(Product::factory()->make()->getAttributes());

        $this->assertEquals($product01->name, $this->repository->findByName($product01->name)->name);
    }

    public function test_delete_by_id()
    {
        $product01 = $this->repository->create(Product::factory()->make()->getAttributes());
        $this->repository->deleteById($product01->id);

        $this->assertEmpty($this->repository->findById($product01->id));
    }
}
