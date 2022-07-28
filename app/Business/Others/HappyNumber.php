<?php

namespace App\Business\Others;


class HappyNumber extends Number
{
    public array $histories = [];
    public array $digits;


    public function isHappyNumber(int $value): bool
    {
        $status = false;
        while ($value != 1 && $this->isRepeated($value) == false) {
            $value = $this->getSumNumbers($value);
        }
        ($value != 1) ?: $status = true;
        return $status;
    }

    public function getSumNumbers(int $number): int
    {
        $total = 0;
        foreach ($this->toArray($number) as $item => $value) {
            $total += ($value * $value);
        }
        $this->addHistory($number);
        return $total;
    }

    public function isRepeated($number): bool
    {
       return ((array_search($number, $this->getHistories()) != null) ? true : false);
    }

    public function addHistory($value): void
    {
        $this->histories[] = $value;
    }
    public function getHistories(): array
    {
        return $this->histories;
    }
}
