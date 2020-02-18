<?php

namespace App\Tests\Domain\Salary;

use App\Domain\Salary\Salary;
use Money\Money;
use PHPUnit\Framework\TestCase;

class SalaryTest extends TestCase
{
    /** @var Salary */
    private $salaryUnderTest;

    protected function setUp()
    {
        $this->salaryUnderTest = new Salary(Money::USD(100));
    }


    public function testDecreaseTax(): void
    {
        $expected = Money::USD(80);
        $this->assertTrue($expected->equals($this->salaryUnderTest->calculate()));

        $this->salaryUnderTest->decreaseTax(10);
        $expected = Money::USD(90);
        $this->assertTrue($expected->equals($this->salaryUnderTest->calculate()));
    }

    public function testDeductSalaryBy(): void
    {
        $this->salaryUnderTest->deductSalaryBy(Money::USD(90));
        $expected = Money::USD(8);

        $this->assertTrue($expected->equals($this->salaryUnderTest->calculate()));
    }

    public function testIncreaseSalaryByPercent(): void
    {
        $this->salaryUnderTest->increaseSalaryByPercent(10);
        $expected = Money::USD(88);

        $this->assertTrue($expected->equals($this->salaryUnderTest->calculate()));
    }
}
