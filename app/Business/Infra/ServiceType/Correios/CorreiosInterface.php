<?php
namespace App\Business\Infra\ServiceType\Correios;

interface CorreiosInterface
{
    public function findCostByZipCode(string $zipcode): float;
}