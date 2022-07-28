<?php

namespace App\Business\Others;

class Multiple extends Number
{
    public int $limiter;
    public array $multiples;

    public function __construct(int $limiter = 10)
    {
        $this->limiter = $limiter;
    }

    public function getThreeAndFiveMultiples(): array
    {
        $values = [];
        for ($i = 1; $i < $this->limiter; $i++) {
            (($this->isMultiple(3, $i) && $this->isMultiple(5, $i)) == false) ?: $values[] = $i;
        }
        return $values;
    }

    public function getThreeOrFiveMultiples(): array
    {
        $values = [];
        for ($i = 1; $i < $this->limiter; $i++) {
            ($this->isThreeOrFiveMultiple($i) == false) ?: $values[] = $i;
        }
        return $values;
    }

    public function getThreeOrFiveAndSevenMultiples(): array
    {
        $values = [];
        for ($i = 1; $i < $this->limiter; $i++) {
            ($this->isThreeOrFiveAndSevenMultiple($i) == false) ?: $values[] = $i;
        }
        return $values;
    }

    public function isThreeOrFiveMultiple($value): bool
    {
        return (($this->isMultiple(3, $value) || $this->isMultiple(5, $value)) ? true : false);
    }

    public function isThreeOrFiveAndSevenMultiple($value): bool
    {
        return ($this->isThreeOrFiveMultiple($value) &&  $this->isMultiple(7, $value) ? true : false);
    }

}
