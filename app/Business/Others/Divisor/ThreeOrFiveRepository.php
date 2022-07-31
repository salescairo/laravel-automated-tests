<?php
namespace App\Business\Others\Divisor;

class ThreeOrFiveRepository extends DivisorRepository implements ThreeOrFiveInterface
{
    public function play(int $value): bool
    {
        return ($value  % 3 === 0 || $value % 5 === 0);
    }
}
