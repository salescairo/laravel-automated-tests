<?php

namespace Tests\Unit\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class UserTest extends TestCase
{
    private function model(): Model
    {
        return new User();
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_fillable()
    {
        $expected = [
            'address',
            'name',
            'email',
            'password',
        ];
        $this->assertEquals([],array_diff($expected,$this->model()->getFillable()));
    }


}
