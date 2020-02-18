<?php


namespace App\Application;


use App\Domain\Employee;
use Money\Money;

class SalaryCalculator
{
    public function calculateSalary(Employee $employee): Money
    {
        return Money::USD(4000);
    }
}