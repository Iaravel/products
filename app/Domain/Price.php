<?php

declare(strict_types=1);

namespace App\Domain;

use Money\Money;

/**
 * @author Michał Mleczko <michal@mleczko.waw.pl>
 */
class Price
{
    /**
     * @var Money
     */
    private $amount;

    public function __construct(Money $amount)
    {
        $this->amount = $amount;
    }
}
