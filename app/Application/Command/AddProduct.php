<?php

declare(strict_types=1);

namespace App\Application\Command;

use Money\Money;

/**
 * @author Michał Mleczko <michal@mleczko.waw.pl>
 */
class AddProduct
{
    public string $name;
    public Money $price;

    public function __construct(string $name, Money $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}
