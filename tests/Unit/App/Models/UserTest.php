<?php

namespace Tests\Unit\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_fillable()
    {
        $user = new User();
        $fillable = [
            'address',
            'name',
            'email',
            'password',
        ];
        $diff = array_diff($fillable, $user->getFillable());

        $this->assertEmpty($diff);
    }


}
