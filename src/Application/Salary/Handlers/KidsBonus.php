<?php


namespace App\Application\Salary\Handlers;

use App\Application\Salary\Handler;
use App\Domain\Employee;
use Money\Money;

// If an employee has more than 2 kids we want to decrease his Tax by 2%
class KidsBonus extends Handler
{
    protected function process(Employee $employee): ?Money
    {
        if ($employee->getKidCount() > 2) {
            $employee->getSalary()->decreaseTax(2);
        }

        return null;
    }
}