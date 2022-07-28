<?php

namespace Tests\Feature\App\Business\Infra;

use App\Business\Infra\User\UserEloquentRepository;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_all()
    {
        $repository = new UserEloquentRepository();
        $all = $repository->all();
        $this->assertIsArray($all);
    }

    public function test_create()
    {
        $repository = new UserEloquentRepository();
        $user01 = $repository->create(User::factory()->make()->getAttributes());
        $this->assertNotEmpty($user01->id);
    }

    public function test_find_by_id()
    {
        $repository = new UserEloquentRepository();
        $user01 = $repository->create(User::factory()->make()->getAttributes());

        $find = $repository->findById($user01->id);
        $this->assertEquals($user01->id, $find->id);
    }
    public function test_find_by_name()
    {
        $repository = new UserEloquentRepository();
        $user01 = $repository->create(User::factory()->make()->getAttributes());

        $find = $repository->findByName($user01->name);
        $this->assertEquals($user01->name, $find->name);
    }

    public function test_delete_by_id()
    {
        $repository = new UserEloquentRepository();
        $user01 = $repository->create(User::factory()->make()->getAttributes());

        $repository->deleteById($user01->id);
        $this->assertEmpty($repository->findById($user01->id));
    }
}
