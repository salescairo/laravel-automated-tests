<?php

namespace App\Business\Others;

class Number
{
    public function getTotal($collection): int
    {
        return array_sum(array_values($collection));
    }

    public function isPrimeNumber($number): bool
    {
        $status = false;
        foreach (array(2, 3, 5) as $key => $value) {
            ($number % $value === 0 && $number > 5) ? $status = false : $status = true;
        }
        return $status;
    }

    public function isMultiple(int $divisor, int $value): bool
    {
        if ($value % $divisor == 0) {
            return true;
        }
        return false;
    }

    public function integerToArray($value): array
    {
        return array_map('intval', str_split($value));
    }
}
