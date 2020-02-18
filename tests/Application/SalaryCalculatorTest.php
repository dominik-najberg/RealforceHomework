<?php

namespace App\Tests\Application;

use App\Application\Salary\SalaryCalculator;
use App\Domain\Employee;
use App\Domain\Salary;
use Money\Money;
use PHPUnit\Framework\TestCase;

class SalaryCalculatorTest extends TestCase
{
    /** @var SalaryCalculator */
    private $serviceUnderTest;

    protected function setUp()
    {
        $this->serviceUnderTest = new SalaryCalculator();
    }

    /**
     * @dataProvider employeeSalaryProvider
     */
    public function testCalculateSalary(Employee $employee, Money $expected): void
    {
        $actual = $this->serviceUnderTest->calculateSalary($employee);

        $this::assertTrue($expected->equals($actual));
    }


    /**
        ● Jane is 25 years old, no kids, no car and her salary $5000
        ● Bruce is 52 years old, no kids, no car and his salary $5000
        ● Michael is 25 years old, 3 kids, no car and his salary $5000
        ● Henry is 25 years old, no kids, he is using a company car and his salary $5000
        ● Alice is 26 years old, she has 2 kids and her salary is $6000
        ● Bob is 52, he is using a company car and his salary is $4000
        ● Charlie is 36, he has 3 kids, company car and his salary is $5000
     */
    public function employeeSalaryProvider(): array
    {
        return [
            [new Employee('Jane', 25, 0, false, new Salary(Money::USD(5000))), Money::USD(4000)],
            [new Employee('Bruce', 52, 0, false, new Salary(Money::USD(5000))), Money::USD(4280)],
            [new Employee('Michael', 25, 3, false, new Salary(Money::USD(5000))), Money::USD(4100)],
            [new Employee('Henry', 25, 0, true, new Salary(Money::USD(5000))), Money::USD(3600)],
            [new Employee('Alice', 26, 2, false, new Salary(Money::USD(6000))), Money::USD(4800)],
            [new Employee('Bob', 52, 0, true, new Salary(Money::USD(4000))), Money::USD(3024)],
            [new Employee('Charlie', 36, 3, true, new Salary(Money::USD(5000))), Money::USD(3690)],
        ];
    }
}
