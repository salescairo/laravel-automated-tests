<?php

namespace Tests\Unit\App\Business\Others;

use App\Business\Others\HappyNumber;
use App\Business\Others\HappyNumber\HappyNumberRepository;
use PHPUnit\Framework\TestCase;

class HappyNumberTest extends TestCase
{

    public function test_if_value_is_happy_number()
    {
        $happyNumber = new HappyNumberRepository();
        
        $isHappyNumber = $happyNumber->isHappyNumber(7);

        $this->assertTrue($isHappyNumber);
    }
    
    public function test_if_value_is_not_happy_number()
    {
        $happyNumber = new HappyNumberRepository();

        $isHappyNumber = $happyNumber->isHappyNumber(9);

        $this->assertFalse($isHappyNumber);
    }    
    
    public function test_histories_verification()
    {
        $expectedValue = [7,49,97,130,10];
        $happyNumber = new HappyNumberRepository();

        $happyNumber->isHappyNumber(7);
        
        $this->assertEquals($expectedValue,$happyNumber->histories());
    }

}
