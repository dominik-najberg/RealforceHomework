<?php

declare(strict_types=1);


namespace App\Domain\Salary;


use App\Domain\Salary\Exception\RidiculousTaxException;
use Money\Money;

class Salary
{
    private $countryTax = 20;

    /** @var  Money */
    private $base;

    /** @var Money */
    private $deduction;

    /** @var int */
    private $bonusPercent;

    public function __construct(Money $base)
    {
        $this->base = $base;
        $this->deduction = new Money(0, $base->getCurrency());
    }

    public function increaseSalaryByPercent(int $percent): void
    {
        $this->bonusPercent += $percent;
    }

    public function decreaseTax(int $percent): void
    {
        $this->countryTax -= $percent;
        // could throw a custom exception in case tax drops below zero
    }

    public function deductSalaryBy(Money $deduction): void
    {
        $this->deduction = $this->deduction->add($deduction);
    }

    public function calculate(): Money
    {
        // Adds bonus
        $bonused = $this->base->multiply((100 + $this->bonusPercent)/100);

        // Deducts
        $deducted = $bonused->subtract($this->deduction);

        // Returns money after tax
        return $deducted->multiply((100 - $this->countryTax)/100);
    }
}