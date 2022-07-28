<?php

namespace Tests\Unit\App\Business\Infra;

use App\Business\Infra\User\UserEloquentRepository;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{

    private $repository;

    protected function setUp(): void
    {
        $this->repository = new UserEloquentRepository();
        parent::setUp();
    }


    public function test_all()
    {
        $all = $this->repository->all();

        $this->assertIsArray($all);
    }

    public function test_create()
    {
        $user01 = $this->repository->create(User::factory()->make()->getAttributes());

        $this->assertNotEmpty($user01->id);
    }

    public function test_find_by_id()
    {
        $user01 = $this->repository->create(User::factory()->make()->getAttributes());

        $this->assertEquals($user01->id, $this->repository->findById($user01->id)->id);
    }
    public function test_find_by_name()
    {
        $user01 = $this->repository->create(User::factory()->make()->getAttributes());

        $this->assertEquals($user01->name, $this->repository->findByName($user01->name)->name);
    }

    public function test_delete_by_id()
    {
        $user01 = $this->repository->create(User::factory()->make()->getAttributes());
        $this->repository->deleteById($user01->id);

        $this->assertEmpty($this->repository->findById($user01->id));
    }
}
