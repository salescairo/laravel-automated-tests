<?php

namespace Tests\Unit\App\Business\Others;

use App\Business\Others\Multiple;
use PHPUnit\Framework\TestCase;

class MultipleTest extends TestCase
{
   
    public function test_if_multiple_value()
    {
        $multiple = new Multiple();
        $this->assertEquals($multiple->isMultiple(5,10),true);
    }

    public function test_values_multiples()
    {
        $multiple = new Multiple(10);
        $this->assertEquals(array_diff([3,5,6,9],$multiple->getThreeOrFiveMultiples()),[]);
    }
    

    public function test_count_third_and_five_value_multiples()
    {
        $multiple = new Multiple(1000);
        $this->assertEquals(count($multiple->getThreeAndFiveMultiples()),66);
    }
    public function test_sum_third_and_five_values_multiples()
    {
        $multiple = new Multiple(16);
        $this->assertEquals($multiple->getTotal($multiple->getThreeAndFiveMultiples()),15);
    }


    public function test_count_third_or_five_value_multiples()
    {
        $multiple = new Multiple(1000);
        $this->assertEquals(count($multiple->getThreeOrFiveMultiples()),466);
    }

    public function test_sum_third_or_five_values_multiples()
    {
        $multiple = new Multiple(10);
        $this->assertEquals($multiple->getTotal($multiple->getThreeOrFiveMultiples()),23);
    }



    public function test_count_third_or_five_and_seven_value_multiples()
    {
        $multiple = new Multiple(80);
        $this->assertEquals(count($multiple->getThreeOrFiveAndSevenMultiples()),5);
    }

    public function test_sum_third_or_five_and_seven_values_multiples()
    {
        $multiple = new Multiple(80);
        $this->assertEquals($multiple->getTotal($multiple->getThreeOrFiveAndSevenMultiples()),231);
    }
}
