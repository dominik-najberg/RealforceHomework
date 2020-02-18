<?php

declare(strict_types=1);


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
    public function testCalculateSalary($name, $age, $kidCount, $companyCar, $salaryAmount, $expectedAmount): void
    {
        $employee = new Employee(
            $name,
            $age,
            $kidCount,
            $companyCar,
            new Salary(Money::USD($salaryAmount))
        );

        $expected = Money::USD($expectedAmount);

        $actual = $this->serviceUnderTest->calculateSalary($employee);

        $this::assertTrue($expected->equals($actual));
    }

    public function employeeSalaryProvider(): array
    {
        return [
            'Jane is 25 years old, no kids, no car and her salary $5000' => ['Jane', 25, 0, false, 5000, 4000],
            'Bruce is 52 years old, no kids, no car and his salary $5000' => ['Bruce', 52, 0, false, 5000, 4280],
            'Michael is 25 years old, 3 kids, no car and his salary $5000' => ['Michael', 25, 3, false,5000, 4100],
            'Henry is 25 years old, no kids, using a company car and his salary $5000' => ['Henry', 25, 0, true, 5000, 3600],
            'Alice is 26 years old, she has 2 kids and her salary is $6000' => ['Alice', 26, 2, false, 6000, 4800],
            'Bob is 52, he is using a company car and his salary is $4000' => ['Bob', 52, 0, true, 4000, 3024],
            'Charlie is 36, he has 3 kids, company car and his salary is $5000' => ['Charlie', 36, 3, true, 5000, 3690],
        ];
    }
}
