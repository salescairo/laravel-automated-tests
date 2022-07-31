<?php

namespace Tests\Unit\App\Business\Others;

use App\Business\Others\Divisor\ThreeOrFiveRepository;
use PHPUnit\Framework\TestCase;

class ThreeOrFiveDivisorTest extends TestCase
{

    public function test_if_value_is_three_or_five_divisor()
    {
        $divisor = new ThreeOrFiveRepository();
        
        $isDivisor = $divisor->play(15);

        $this->assertTrue($isDivisor);
    }

    public function test_if_value_is_three_or_five_not_divisor()
    {
        $divisor = new ThreeOrFiveRepository();
        
        $isDivisor = $divisor->play(17);

        $this->assertFalse($isDivisor);
    }

    public function test_verify_list_is_three_or_five_divisors()
    {
        $expectedValue = [3,5,6,9];
        $divisor = new ThreeOrFiveRepository();
        
        $divisors = $divisor->list(10);

        $this->assertEquals($expectedValue,$divisors);
    }

    public function test_verify_sum_is_three_or_five_divisors()
    {
        $expectedValue = 23;
        $divisor = new ThreeOrFiveRepository();
        
        $total = $divisor->total(10);

        $this->assertEquals($expectedValue,$total);
    }


}
