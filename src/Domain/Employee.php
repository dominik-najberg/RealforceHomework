<?php


namespace App\Domain;


class Employee
{
    /** @var string */
    private $name;

    /** @var int */
    private $age;

    /** @var int */
    private $kidCount;

    /** @var bool */
    private $companyCar;

    /** @var Salary */
    private $salary;

    public function __construct(string $name, int $age, int $kidCount, bool $companyCar, Salary $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->kidCount = $kidCount;
        $this->companyCar = $companyCar;
        $this->salary = $salary;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getKidCount(): int
    {
        return $this->kidCount;
    }

    public function usesCompanyCar(): bool
    {
        return $this->companyCar;
    }

    public function getSalary(): Salary
    {
        return $this->salary;
    }
}