<?php


namespace App\Domain\Salary\Exception;


use Throwable;

class RidiculousTaxException extends \Exception
{
    public function __construct(int $taxPercent)
    {
        $this->message = sprintf('tax cannot be negative (%d%%)', $taxPercent);
        parent::__construct();
    }
}