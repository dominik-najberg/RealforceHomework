<?php

declare(strict_types=1);


namespace App\Application\Salary\Handlers;


use App\Application\Salary\Handler;
use App\Domain\Employee\Employee;
use Money\Money;

class FinalCalculation extends Handler
{
    protected function process(Employee $employee): ?Money
    {
        return $employee->getSalary()->calculate();
    }
}