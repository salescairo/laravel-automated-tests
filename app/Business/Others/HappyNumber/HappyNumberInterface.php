<?php
namespace App\Business\Others\HappyNumber;

interface HappyNumberInterface
{
    public function isHappyNumber(int $value): bool;

    public function histories(): array;

}