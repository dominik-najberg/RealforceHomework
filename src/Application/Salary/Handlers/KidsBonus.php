<?php

declare(strict_types=1);


namespace App\Application\Salary\Handlers;


use App\Application\Salary\Handler;
use App\Domain\Employee\Employee;
use App\Domain\Salary\Exception\RidiculousTaxException;
use Money\Money;
use Psr\Log\LoggerInterface;

// If an employee has more than 2 kids we want to decrease his Tax by 2%
class KidsBonus extends Handler
{
    protected function process(Employee $employee): ?Money
    {
        if ($employee->getKidCount() > 2) {
            try {
                $employee->getSalary()->decreaseTax(2);
            } catch (RidiculousTaxException $e) {
                // some domain logic
            }
        }

        return null;
    }
}