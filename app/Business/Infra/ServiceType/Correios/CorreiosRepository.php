<?php
namespace App\Business\Infra\ServiceType\Correios;

class CorreiosRepository
{
    public function findCostByZipCode(string $zipcode): float
    {
        return 30.0;
    }
}