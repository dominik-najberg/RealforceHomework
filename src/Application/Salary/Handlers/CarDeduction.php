<?php


namespace App\Application\Salary\Handlers;


use App\Application\Salary\Handler;
use App\Domain\Employee;
use Money\Money;

// If an employee wants to use a company car we need to deduct $500
class CarDeduction extends Handler
{
    protected function process(Employee $employee): ?Money
    {
        if ($employee->usesCompanyCar()) {
            $employee->getSalary()->deductSalaryBy(Money::USD(500));
        }

        return null;
    }
}