<?php

namespace Tests\Unit\App\Business\Others;

use App\Business\Others\Divisor\ThreeOrFiveAndSevenRepository;
use PHPUnit\Framework\TestCase;

class ThreeOrFiveAndSevenDivisorTest extends TestCase
{

    public function test_if_value_is_three_or_five_and_seven_divisor()
    {
        $divisor = new ThreeOrFiveAndSevenRepository();
        
        $isDivisor = $divisor->play(35);

        $this->assertTrue($isDivisor);
    }

    public function test_if_value_is_three_or_five_and_seven_not_divisor()
    {
        $divisor = new ThreeOrFiveAndSevenRepository();
        
        $isDivisor = $divisor->play(7);

        $this->assertFalse($isDivisor);
    }

    public function test_verify_list_is_three_or_five_and_seven_divisors()
    {
        $expectedValue = [21,35,42];
        $divisor = new ThreeOrFiveAndSevenRepository();
        
        $divisors = $divisor->list(50);

        $this->assertEquals($expectedValue,$divisors);
    }

    public function test_verify_sum_is_three_or_five_and_seven_divisors()
    {
        $expectedValue = 98;
        $divisor = new ThreeOrFiveAndSevenRepository();
        
        $total = $divisor->total(50);

        $this->assertEquals($expectedValue,$total);
    }


}
