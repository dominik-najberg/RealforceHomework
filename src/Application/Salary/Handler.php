<?php


namespace App\Application\Salary;


use App\Domain\Employee;
use Money\Money;

abstract class Handler
{
    /** @var Handler|null */
    private $nextHandler = null;

    public function setNext(Handler $handler): Handler
    {
        $this->nextHandler = $handler;

        return $handler;
    }

    final public function handle(Employee $employee): ?Money
    {
        $ready = $this->process($employee);

        if (null === $ready && null !== $this->nextHandler) {
            $ready = $this->nextHandler->handle($employee);
        }

        return $ready;
    }

    abstract protected function process(Employee $employee): ?Money;
}