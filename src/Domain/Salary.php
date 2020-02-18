<?php

namespace App\Domain;


use Money\Money;

class Salary
{
    private $countryTax = 20;

    /** @var  Money */
    private $base;

    public function __construct(Money $base)
    {
        $this->base = $base;
    }

    public function getCountryTax(): int
    {
        return $this->countryTax;
    }

    public function getBase(): Money
    {
        return $this->base;
    }


}