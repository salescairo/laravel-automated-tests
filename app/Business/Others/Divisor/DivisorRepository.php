<?php
namespace App\Business\Others\Divisor;

class DivisorRepository implements DivisorInterface
{
    public function play(int $value): bool
    {
        return true;
    }

    public function list(int $value): array
    {
        $list = [];
        for ($i = 1; $i < $value; $i++) {
            ($this->play($i) == false ?: $list[] = $i);
        }
        return $list;
    }

    public function total(int $value): int
    {
       return array_sum($this->list($value)); 
    }
}
