<?php

declare(strict_types=1);


namespace App\Application\Salary;


use App\Application\Salary\Handlers\AgeBonus;
use App\Application\Salary\Handlers\CarDeduction;
use App\Application\Salary\Handlers\FinalCalculation;
use App\Application\Salary\Handlers\KidsBonus;
use App\Domain\Employee\Employee;
use Money\Money;

class SalaryCalculator
{
    public function calculateSalary(Employee $employee): Money
    {
        $salaryHandler = new AgeBonus();
        $salaryHandler
            ->setNext(new KidsBonus())
            ->setNext(new CarDeduction())
            ->setNext(new FinalCalculation())
        ;

        return $salaryHandler->handle($employee);
    }
}