<?php
namespace App\Business\Others\Divisor;

class ThreeOrFiveAndSevenRepository extends DivisorRepository implements ThreeOrFiveAndSevenInterface
{
    public function play(int $value): bool
    {
        return (($value  % 3 === 0 || $value % 5 === 0) && ($value % 7 === 0));
    }

}
