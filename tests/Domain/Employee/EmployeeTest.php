<?php

namespace App\Tests\Domain\Employee;

use App\Domain\Employee\Employee;
use App\Domain\Salary\Salary;
use Money\Money;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{
    /** @var Employee */
    private $employeeUnderTest;

    protected function setUp()
    {
        $this->employeeUnderTest = new Employee(
            'Dominik',
            43,
            2,
            false,
            new Salary(Money::USD(1000))
        );
    }

    // Dirty trick to get the codecoverage to 100% ;-)
    public function testGetName()
    {
        $expected = 'Dominik';
        $actual = $this->employeeUnderTest->getName();

        self::assertEquals($expected, $actual);
    }
}
