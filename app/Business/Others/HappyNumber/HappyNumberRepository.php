<?php

namespace App\Business\Others\HappyNumber;

use App\Business\Others\Number;

class HappyNumberRepository extends Number implements HappyNumberInterface
{
    private $histories = [];

    public function isHappyNumber(int $value): bool
    {
        while ($value != 1 && $this->isRepeated($value) == false) {
            $this->addHistory($value);
            $value = $this->sum(array_values($this->integerToArray($value)));
        }
        return ($value != 1) ? false : true;
    }

    private function isRepeated($number): bool
    {
        return ((array_search($number, $this->histories()) != null) ? true : false);
    }

    private function sum(array $numbers): int
    {
        $total = 0;
        foreach ($numbers as $value) {
            $total += ($value * $value);
        }
        return $total;
    }

    public function histories():array
    {
        return $this->histories;
    }

    private function addHistory($number)
    {
        $this->histories[] = $number; 
    }
}
