<?php

namespace Tests\Feature;

use App\Business\Infra\Cart\CartEloquentRepository;
use App\Business\Infra\DeliveryService\DeliveryServiceEloquentRepository;
use App\Business\Infra\ServiceType\Correios\CorreiosInterface;
use App\Business\Infra\ServiceType\Correios\CorreiosRepository;
use App\Models\Cart;
use App\Models\DeliveryService;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class DeliveryServiceTest extends TestCase
{

    private $repository;

    protected function setUp(): void
    {
        $service = Mockery::mock(CorreiosRepository::class,CorreiosInterface::class);
        $service->shouldReceive("findCostByZipCode")->andReturn(30.00);

        $this->repository = new DeliveryServiceEloquentRepository($service);
        parent::setUp();
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_all()
    {
        $all = $this->repository->all();

        $this->assertIsArray($all);
    }

    public function test_create()
    {
        $deliveryService01 = $this->repository->create(DeliveryService::factory()->make()->getAttributes());

        $this->assertNotEmpty($deliveryService01->id);
    }

    public function test_find_by_id()
    {
        $deliveryService01 = $this->repository->create(DeliveryService::factory()->make()->getAttributes());

        $this->assertEquals($deliveryService01->id, $this->repository->findById($deliveryService01->id)->id);
    }

    public function test_delete_by_id()
    {
        $deliveryService01 = $this->repository->create(DeliveryService::factory()->make()->getAttributes());
        $this->repository->deleteById($deliveryService01->id);
        
        $this->assertEmpty($this->repository->findById($deliveryService01->id));
    }

    public function test_cart_is_empty()
    {
        $cart = Cart::factory()->create();
        $this->repository->create(DeliveryService::factory()->make(['cart_id'=>$cart->id])->getAttributes());

        $this->assertEquals(0,$this->repository->getTotal($cart));
    }

    public function test_check_total_cart_service()
    {
        
        $cartRepository = new CartEloquentRepository();        
        $cart01 = $cartRepository->create(Cart::factory()->make()->getAttributes());

        $cartRepository->addProduct($cart01->id,Product::factory()->create(['value'=>140]));

        $this->repository->create(DeliveryService::factory()->make(['cart_id'=>$cart01->id])->getAttributes());


        $this->assertEquals(140,$this->repository->getTotalFee($cart01));
    }

    public function test_check_total_fee_cart_service()
    {
        
        $cartRepository = new CartEloquentRepository();        
        $cart01 = $cartRepository->create(Cart::factory()->make()->getAttributes());

        $cartRepository->addProduct($cart01->id,Product::factory()->create(['value'=>80]));

        $this->repository->create(DeliveryService::factory()->make(['cart_id'=>$cart01->id])->getAttributes());


        $this->assertEquals(110,$this->repository->getTotalFee($cart01));
    }
}
