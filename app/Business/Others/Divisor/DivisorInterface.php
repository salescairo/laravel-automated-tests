<?php
namespace App\Business\Others\Divisor;

interface DivisorInterface
{
    public function play(int $value): bool;
    public function list(int $value): array;
    public function total(int $value): int;
}