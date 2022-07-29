<?php
namespace App\Business\Service\ServiceType\Correios;

interface CorreiosInterface
{
    public function findCostByZipCode(string $zipcode): float;
}