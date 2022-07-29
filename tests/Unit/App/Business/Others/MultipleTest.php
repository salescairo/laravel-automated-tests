<?php

namespace Tests\Unit\App\Business\Others;

use App\Business\Others\Multiple;
use PHPUnit\Framework\TestCase;

class MultipleTest extends TestCase
{

    public function test_if_multiple_value()
    {
        $multiple = new Multiple();

        $isMultiple = $multiple->isMultiple(5, 10);

        $this->assertEquals(true, $isMultiple);
    }

    public function test_values_multiples()
    {
        $multiple = new Multiple(10);

        $threeOrFiveMultiples = $multiple->getThreeOrFiveMultiples();
        $diff = array_diff([3, 5, 6, 9], $threeOrFiveMultiples);

        $this->assertEquals([], $diff);
    }


    public function test_count_third_and_five_value_multiples()
    {
        $multiple = new Multiple(1000);

        $countThreeAndFiveMultiples = count($multiple->getThreeAndFiveMultiples());

        $this->assertEquals(66, $countThreeAndFiveMultiples);
    }

    public function test_sum_third_and_five_values_multiples()
    {
        $multiple = new Multiple(16);

        $total = $multiple->getTotal($multiple->getThreeAndFiveMultiples());

        $this->assertEquals(15, $total);
    }


    public function test_count_third_or_five_value_multiples()
    {
        $multiple = new Multiple(1000);

        $countThreeOrFiveMultiples = count($multiple->getThreeOrFiveMultiples());

        $this->assertEquals(466, $countThreeOrFiveMultiples);
    }

    public function test_sum_third_or_five_values_multiples()
    {
        $multiple = new Multiple(10);

        $total = $multiple->getTotal($multiple->getThreeOrFiveMultiples());

        $this->assertEquals(23, $total);
    }


    public function test_count_third_or_five_and_seven_value_multiples()
    {
        $multiple = new Multiple(80);

        $countThreeOrFiveAndSevenMultiples = count($multiple->getThreeOrFiveAndSevenMultiples());

        $this->assertEquals(5, $countThreeOrFiveAndSevenMultiples);
    }

    public function test_sum_third_or_five_and_seven_values_multiples()
    {
        $multiple = new Multiple(80);

        $total = $multiple->getTotal($multiple->getThreeOrFiveAndSevenMultiples());

        $this->assertEquals(231,$total);
    }
}
