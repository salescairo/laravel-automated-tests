<?php

namespace Tests\Unit\App\Business\Others;

use App\Business\Others\HappyNumber;
use PHPUnit\Framework\TestCase;

class HappyNumberTest extends TestCase
{

    public function test_if_value_is_happy_number()
    {
        $happyNumber = new HappyNumber();
        $this->assertEquals($happyNumber->isHappyNumber(7),true);
    }
    
    public function test_if_value_is_not_happy_number()
    {
        $happyNumber = new HappyNumber();
        $this->assertEquals($happyNumber->isHappyNumber(9),false);
    }    
    
    public function test_histories_verification()
    {
        $happyNumber = new HappyNumber();
        $happyNumber->isHappyNumber(7);
        $this->assertEquals(array_diff([7,49,97,130,10],$happyNumber->getHistories()),[]);
    }
}
