<?php


namespace App\Application\Salary\Handlers;

use App\Application\Salary\Handler;
use App\Domain\Employee;
use Money\Money;

// If an employee older than 50 we want to add 7% to his salary
class AgeBonus extends Handler
{
    protected function process(Employee $employee): ?Money
    {
        if ($employee->getAge() > 50) {
            $employee->getSalary()->increaseByPercent(7);
        }

        return null;
    }
}