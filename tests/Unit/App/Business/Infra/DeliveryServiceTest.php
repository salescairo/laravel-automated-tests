<?php

namespace Tests\Feature;

use App\Business\Infra\DeliveryService\DeliveryServiceEloquentRepository;
use App\Models\DeliveryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeliveryServiceTest extends TestCase
{

    private $repository;

    protected function setUp(): void
    {
        $this->repository = new DeliveryServiceEloquentRepository();
        parent::setUp();
    }

    public function test_all()
    {
        $all = $this->repository->all();

        $this->assertIsArray($all);
    }

    public function test_create()
    {
        $cartItem01 = $this->repository->create(DeliveryService::factory()->make()->getAttributes());

        $this->assertNotEmpty($cartItem01->id);
    }

    public function test_find_by_id()
    {
        $cartItem01 = $this->repository->create(DeliveryService::factory()->make()->getAttributes());

        $this->assertEquals($cartItem01->id, $this->repository->findById($cartItem01->id)->id);
    }

    public function test_delete_by_id()
    {
        $cartItem01 = $this->repository->create(DeliveryService::factory()->make()->getAttributes());
        $this->repository->deleteById($cartItem01->id);
        
        $this->assertEmpty($this->repository->findById($cartItem01->id));
    }
}
